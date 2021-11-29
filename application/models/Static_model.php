<?php
/**
 * TechniqueFinder - Static_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class Static_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getAllStaticData(){
        //$result = $this->db->get('static_content')->result();
        //return $result;


        $query = $this->db->query("    SELECT id,text,
          CASE WHEN name='tf.home.optionsExplanation' THEN  'Research interest explanation on the home page'
               WHEN name='tf.geochemChoices.quickGuide' THEN  'Text at the top of \"Geochemical Analysis and Age Determination\" page'
               WHEN name='tf.home.searchExplanation' THEN  'Search explanation on the home page'
               WHEN name='tf.geochemChoices.step1.title' THEN  'Title for first step for \"Geochemical Analysis and Age Determination\" page'
               WHEN name='tf.geochemChoices.step2.title' THEN  'Title for second step for \"Geochemical Analysis and Age Determination\" page'
               WHEN name='tf.geochemChoices.step3.title' THEN  'Title for third step for \"Geochemical Analysis and Age Determination\" page'
               WHEN name='tf.expProcChoices.quickGuide' THEN 'Text at the top of \"Experimental Procedures\" page'
               ELSE name='Undefined'
               END as name1
         from static_content;");
        return $query->result_array();



    }

    function getStaticData($x){
        $result = $this->db->where('id',$x)->get('static_content')->row();
        return $result;
    }

    function updateData($x,$data){
        $result = $this->db->set('text', $data)->where('id', $x)->update('static_content');
    }

    function getStaticDataByName($name){
        $result = $this->db->where('name',$name)->get('static_content')->row();
        return $result;
    }

}
