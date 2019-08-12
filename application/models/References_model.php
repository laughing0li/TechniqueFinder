<?php
/**
 * TechniqueFinder - References_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class References_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function insertReferenceWithURL($referenceName,$title,$fullReference,$url){
        $referenceData = array(
            'title' => $title,
            'reference_names' => $referenceName,
            'full_reference' => $fullReference,
            'url' => $url,
        );

        $this->db->insert('review', $referenceData);
        return $this->db->insert_id();


    }

    function insertReferenceWithoutURL($referenceName, $title, $fullReference){
        $referenceData = array(
            'title' => $title,
            'reference_names' => $referenceName,
            'full_reference' => $fullReference,
        );

        $this->db->insert('review', $referenceData);
        return $this->db->insert_id();
    }

    function getRefernceData($x){
        $result = $this->db->where('id',$x)->get('review')->row();
        return $result;
    }

    function getAssociatedTechniques($x){
        $result = $this->db->where('review_id',$x)->get('technique_review')->result_array();
        return $result;
    }

    function getTechniqueName($x){
        $result = $this->db->where('id',$x)->get('technique')->row();
        return $result;
    }

    function getReferencesList(){
        $result = $this->db->get('review')->result();
        return $result;
    }

    function delete($x){
        $this->db->delete('review',array('id'=>$x));
    }

    function removeAssociatedTechnique($x){
        $this->db->delete('technique_review',array('review_id'=>$x));
    }


    function updateWithURL($x, $referenceName, $title, $fullReference, $url){
        $updateTitle = $this->db->set('title', $title)->where('id', $x)->update('review');
        $updateReferenceName = $this->db->set('reference_names', $referenceName)->where('id', $x)->update('review');
        $updateFullReference = $this->db->set('full_reference', $fullReference)->where('id', $x)->update('review');
        $updateURL = $this->db->set('url', $url)->where('id', $x)->update('review');

    }

    function updateWithoutURL($x, $referenceName, $title, $fullReference, $url){
        $updateTitle = $this->db->set('title', $title)->where('id', $x)->update('review');
        $updateReferenceName = $this->db->set('reference_names', $referenceName)->where('id', $x)->update('review');
        $updateFullReference = $this->db->set('full_reference', $fullReference)->where('id', $x)->update('review');

    }



}

