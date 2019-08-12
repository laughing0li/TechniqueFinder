<?php
/**
 * TechniqueFinder - OptionCombination_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class OptionCombination_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getAllTechniquesByOptionCombination($left, $right){
        return $this->db->select('technique.*')
            ->from('option_combination')->join('technique', 'option_combination.technique_id = technique.id')
            ->where('option_combination.left_id', $left)
            ->where('option_combination.right_id', $right)
            ->order_by('option_combination.priority','ASC')
            ->get()->result();
    }

    function saveOptionCombination($left, $right, $techniqueIds){

        $this->db->trans_start();

        $this->db->where('left_id', $left)
            ->where('right_id', $right)
            ->delete('option_combination');

        foreach($techniqueIds as $idx => $id){
            $this->db ->insert('option_combination', array(
                'left_id'=>$left,
                'right_id'=>$right,
                'technique_id'=>$id,
                'priority' =>($idx +1)
                ));
        }

        $this->db->trans_complete();

        return  $this->db->trans_status();
    }

}