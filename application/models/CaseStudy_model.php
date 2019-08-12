<?php
/**
 * TechniqueFinder - CaseStudy_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class CaseStudy_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addCaseStudy(){
        $this->load->view('caseStudy/addCaseStudy');
    }

    function insertCaseStudy($caseStudyName, $caseStudyURL){
        $caseStudyData = array(
            'name' => $caseStudyName,
            'url' => $caseStudyURL,

        );

        $this->db->insert('case_study', $caseStudyData);
        return $this->db->insert_id();

    }

    function getCaseStudies(){
        $result = $this->db->get('case_study')->result();
        return $result;
    }

    function getCaseStudyData($x){
        $result = $this->db->where('id',$x)->get('case_study')->row();
        return $result;
    }

    function updateCaseStudy($x, $caseStudyName, $caseStudyURL){
        $updateName = $this->db->set('name', $caseStudyName)->where('id', $x)->update('case_study');
        $updateURL = $this->db->set('url', $caseStudyURL)->where('id', $x)->update('case_study');

    }

    function delete($x){
        if($this->db->delete('case_study',array('id'=>$x))){
            return true;
        }
        else{
            return false;
        }

    }

}