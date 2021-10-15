<?php

/**
 * TechniqueFinder - Media_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class Metadata_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getAllMetadata(){
        return $this->db ->order_by('category','ASC')->get('technique_metadata')->result();

    }

    function getMetadataById($id) {
        return $this->db->from('technique_metadata')->where('id', $id)->get()->row();
    }

    function updateMetadata($id, $category, $category_type, $analysis_type) {
        $this->db->trans_start();
        $this->db->set( array(
            'category' => $category,
            'category_type' => $category_type,
            'analysis_type' => $analysis_type,
        ))->where('id',$id)->update('technique_metadata');

        $this->db->trans_complete();
        return  $this->db->trans_status();   
    }

    function create($category, $category_type, $analysis_type) {
        $this->db->trans_start();
        $this->db->insert('technique_metadata',
            array(
                'category' => $category,
                'category_type' => $category_type,
                'analysis_type' => $analysis_type,
            ));

        $this->db->trans_complete();
        return  $this->db->trans_status();
    }


}
