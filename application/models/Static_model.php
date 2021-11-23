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
          CASE WHEN name='tf.home.quickGuide' THEN  'Quick guide on the home page'
              WHEN name='tf.home.optionsExplanation' THEN  'Options explanation on the home page'
              WHEN name='tf.home.searchExplanation' THEN  'Search explanation on the home page'
                WHEN name='tf.home.allTechniquesExplanation' THEN  'List all techniques explanation on the home page'
                WHEN name='tf.home.infoboxContent' THEN  'Infobox (right hand side bar) content on the home page'
              WHEN name='tf.geochemChoices.quickGuide' THEN  'Quick guide on the choices for geochemistry page'
              WHEN name='tf.geochemChoices.comparison.title' THEN  'Comparison text on the choices for geochemistry page'
              WHEN name='tf.geochemChoices.left.title' THEN  'Title for left side options on the choices for geochemistry page'
              WHEN name='tf.geochemChoices.right.title' THEN  'Title for right side options on the choices for geochemistry page'
                WHEN name='tf.biologyChoices.quickGuide' THEN  'Quick guide on the choices for biological sciences page'
                WHEN name='tf.biologyChoices.comparison.title' THEN  'Comparison text on the choices for biological sciences page'
                WHEN name='tf.biologyChoices.left.title' THEN  'Title for left side options on the choices for biological sciences page'
                WHEN name='tf.biologyChoices.right.title' THEN  'Title for right side options on the choices for biological sciences page'
                WHEN name='tf.physicsChoices.quickGuide' THEN  'Quick guide on the choices for physical sciences page'
                WHEN name='tf.physicsChoices.comparison.title' THEN  'Comparison text on the choices for physical sciences page'
                WHEN name='tf.physicsChoices.left.title' THEN  'Title for left side options on the choices for physical sciences page'
                WHEN name='tf.physicsChoices.right.title' THEN  'Title for right side options on the choices for physical sciences page'
                WHEN name='tf.menu' THEN 'Main menu on public site'
                WHEN name='tf.tracking.ammrf' THEN 'Tracking AMMRF'
                WHEN name='tf.tracking.intersect' THEN 'Tracking Intersect'
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
