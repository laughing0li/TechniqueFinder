<?php
/**
 * TechniqueFinder - OptionChoice_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class OptionChoice_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getOptionChoiceById($id){
        return $this->db->from('option_choice')
            ->where('id', $id)->get()->row();
    }

    function getTechniqueCatByCatTyp($category_type) {
            return $this->db->query("select technique_view.category, group_concat(distinct technique_view.model separator '; ') as model, group_concat(distinct technique_view.beam_diameter separator '; ') as beam_diameter, group_concat(distinct technique_view.min_conc separator '; ') as min_conc from technique_view where technique_view.category_type = ? group by technique_view.category", array($category_type))->result();
    }

    function getTechniqueCatByAnalysis($category_type, $analysis_type) {
	// If user doesn't know then select all
	if ($analysis_type == 'I don\'t know') {
            return $this->getTechniqueCatByCatTyp($category_type);
        } else {
            return $this->db->query("select technique_view.category, group_concat(distinct technique_view.model separator '; ') as model, group_concat(distinct technique_view.beam_diameter separator '; ') as beam_diameter, group_concat(distinct technique_view.min_conc separator '; ') as min_conc from technique_view where technique_view.category_type = ? and technique_view.analysis_type = ? group by technique_view.category", array($category_type, $analysis_type))->result();
	}
    }

    /////////////////////////////////////////////////////////////////////////////////////
    function createOptionChoice($name, $science, $type){
        $this->db->trans_start();
        $priority = $this->updateAllOptionChoicesPriority($science, $type) + 1;
        $result = $this->db->insert('option_choice',
            array(
            'science'=>$science,
            'type'=>$type,
            'name'=>$name,
            'priority'=>$priority
            ));

        $this->db->trans_complete();
        return  $this->db->trans_status();
    }

    function getAllOptionChoices($science, $type){
        return $this->db
            ->where('science', $science)->where('type', $type)
            ->order_by('priority','ASC')->get('option_choice')->result();
    }


    function getOptionChoicesByName($name, $science, $type){
        return $this->db->from('option_choice')
            ->where('science', $science)->where('type', $type)
            ->where('name', $name)->get()->row();
    }


    function getOptionChoicesLowestPriority($science, $type){
        $result = $this->db->select_max('priority')->from('option_choice')
            ->where('science', $science)->where('type', $type)
            ->get()->row();
        return (int)$result->priority;
    }

    function updateNameById($id, $name){
        return $this->db->set('name',$name)->where('id',$id)->update('option_choice');
    }

    function updateAllOptionChoicesPriority($science, $type){
        $result = $this->db->select('id,priority')->from('option_choice')
            ->where('science', $science)->where('type', $type)
            ->order_by('priority','ASC')
            ->get()->result();

        $pri_seq = 0;
        foreach ( $result as $r){
            $pri_seq= $pri_seq +1;//priority sequence starts with 1
            if($r->priority != $pri_seq){
                $this->db->set('priority',$pri_seq)->where('id',$r->id)->update('option_choice');
            }
        }
        return $pri_seq;
    }

    function setAllOptionChoicesPriority($ordered_optionIds, $science, $type){
        //get current order in db
        $result = $this->db->select('id')->from('option_choice')
            ->where('science', $science)->where('type', $type)
            ->order_by('priority','ASC')
            ->get()->result();
        $current_order = [];
        foreach($result as $r){
            $current_order[] = $r->id;
        }

        //sort out new order
        $new_order = [];
        $flipped_current_order = array_flip($current_order);
        foreach($ordered_optionIds as $id){
            if(isset($flipped_current_order[$id])){
                unset($flipped_current_order[$id]);//take out the match
                $new_order[]=$id;
            }
            else{
                ;//skip the ones not in db
            }
        }
        //append ones in db but not in given ids
        foreach($flipped_current_order as $id=>$idx){
            $new_order[]=$id;
        }

        $this->db->trans_start();
        foreach($new_order as $idx =>$id){
            $this->db->set('priority',($idx+1))->where('id',$id)->update('option_choice');
        }
        $this->db->trans_complete();
        return  $this->db->trans_status()?count($new_order):0;
    }

    function deleteById($id, $science, $type){

        $this->db->trans_start();

        if($this->db->where('id',$id)->delete('option_choice')){
            $this->updateAllOptionChoicesPriority($science, $type);
            $this->db->trans_complete();
            return True;
        }
        else{
            $this->db->trans_complete();
            return False;
        }


    }

    function getOptionName($id){
        $query = $this->db->query('SELECT * from option_choice where id="'.$id.'";');
        return $query->result();

    }

    /////////////////////////////////////////////////////////////////////////////////////

}
