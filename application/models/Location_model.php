<?php
/**
 * TechniqueFinder - Location_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class Location_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getAllLocations(){
        return $this->db ->order_by('priority','ASC')->get('location')->result();
    }

    function getLocationById($id){
        return $this->db->from('location')
            ->where('id', $id)->get()->row();
    }

    function getLocationByPriority($priority){
        return $this->db->from('location')
            ->where('priority', $priority)->get()->row();
    }

    function getLocationByInstitution($institution){
        return $this->db->from('location')
            ->where('institution', $institution)->get()->row();
    }



    function getLinkedTechniques($location_id){
        //select location.institution, contact.name, technique.name from 
        //location join contact on location.id=contact.location_id 
        //join technique_contact on technique_contact.contact_id=contact.id 
        //join technique on technique.id=technique_contact.technique_contacts_id where location.id=2;
        return $this->db->distinct()
            ->select('technique.id as id, technique.name as name')
            ->from('location')
            ->join('contact', 'location.id=contact.location_id')
            ->join('technique_contact', 'contact.id = technique_contact.contact_id')
            ->join('technique', 'technique_contact.technique_contacts_id = technique.id')
            ->where('location.id', $location_id)
            ->get()->result();

    }

    function setAllLocationsPriority($ordered_locationIds){
        //get current order in db
        $result = $this->db->select('id')->from('location')
            ->order_by('priority','ASC')
            ->get()->result();
        $current_order = [];
        foreach($result as $r){
            $current_order[] = $r->id;
        }

        //sort out new order
        $new_order = [];
        $flipped_current_order = array_flip($current_order);
        foreach($ordered_locationIds as $id){
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
            $this->db->set('priority',($idx+1))->where('id',$id)->update('location');
        }
        $this->db->trans_complete();
        return  $this->db->trans_status()?count($new_order):0;
    }


    function updateAllLocationsPriority(){
        $result = $this->db->select('id,priority')->from('location')
            ->order_by('priority','ASC')
            ->get()->result();

        $pri_seq = 0;
        foreach ( $result as $r){
            $pri_seq= $pri_seq +1;//priority sequence starts with 1
            if($r->priority != $pri_seq){
                $this->db->set('priority',$pri_seq)->where('id',$r->id)->update('location');
            }
        }
        return $pri_seq;
    }

    function createLocation( $institution, $state, $status, $address, $center_name) {
        $this->db->trans_start();
        $priority = $this->updateAllLocationsPriority() + 1;
        $result = $this->db->insert('location',
            array(
                'institution' => $institution,
                'state' => $state,
                'status' => $status,
                'address' => $address,
                'center_name'=>$center_name,
                'priority' =>$priority
            ));

        $this->db->trans_complete();
        return  $this->db->trans_status();
    }

    function updateById($id, $institution, $state, $status, $address, $center_name){

        $this->db->set( array(
            'institution' => $institution,
            'state' => $state,
            'status' => $status,
            'address' => $address,
            'center_name' => $center_name
            ))
            ->where('id',$id)->update('location');

        return  $this->db->trans_status();
    }


    function deleteById($id){
        $this->db->trans_start();


        $query= $this->db->query('SELECT * FROM contact where location_id="'.$id.'"');
        $contact_id = $query->result();

        foreach($contact_id as $c){
            $this->db->where('contact_id',$c->id)->delete('technique_contact');
            $this->db->where('id',$c->id)->delete('contact');

        }

        $this->db->where('id',$id)->delete('location');
        $this->updateAllLocationsPriority();

        $this->db->trans_complete();
        return $this->db->trans_status();
    }


}