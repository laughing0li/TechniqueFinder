<?php
/**
 * TechniqueFinder - CaseStudy.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class CaseStudy extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!($this->session->userdata('logged_in') == True)) {
            redirect(base_url() . 'login/index');
        }

        // auth0 config
        // if ($this->session->userdata('auth0__user') == null){
        //     redirect(base_url() . 'authLogin');
        // }

        $this->load->model('CaseStudy_model');
    }

    function index(){
        $this->load->view('caseStudy/index');
    }

    function addCaseStudy(){
        $this->load->view('caseStudy/addCaseStudy');
    }


    function validateNew(){
        $this->load->library('form_validation');

        $caseStudyName = $_POST['caseStudyName'];
        $caseStudyURL = $_POST['caseStudyURL'];

        $this->form_validation->set_rules('caseStudyName', 'Case study name', 'required');
        $this->form_validation->set_rules('caseStudyURL', 'Case study URL', 'trim|required');

        $data['data'] = $_POST;

        if ($this->form_validation->run()) {
                if(filter_var($caseStudyURL, FILTER_VALIDATE_URL) !== false){
                    $id = $this->CaseStudy_model->insertCaseStudy($caseStudyName, $caseStudyURL);

                    $this->session->set_flashdata('success-warning-message','Case study '.$id .' created');
                    $this->load->view('caseStudy/index');
                }

                else{
                    $this->session->set_flashdata('error-warning-message','Please enter a valid URL');
                    $this->load->view('caseStudy/addCaseStudy',$data);
                }

        }
        else{
            $this->session->set_flashdata('error-warning-message',validation_errors());
            $this->load->view('caseStudy/addCaseStudy',$data);
        }

    }

    function getCaseStudies(){

        $data = array();
        $results = $this->CaseStudy_model->getCaseStudies();

        foreach ($results  as $r) {
            array_push($data, array(
                $r->name,
                $r->url,
                "<div style='min-width: 245px;'><button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."caseStudy/caseStudyEdit/".$r->id."'><span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>". "<span style='margin-left: 2em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."caseStudy/delete/".$r->id."'><span style='background: url(../assets/images/database_delete.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button></div>",

            ));
        }

        echo json_encode(array('data' => $data));
    }

    function caseStudyEdit($x){
        $query = $this->CaseStudy_model->getCaseStudyData($x);
        $case_study_data = array('id'=>$query->id, 'name'=>$query->name,'url'=>$query->url);


        $this->load->library('CKEditor');
        $this->load->library('CKFinder');

        $caseStudyData['case_study_data']=$case_study_data;
        $this->load->view('caseStudy/edit',$caseStudyData);
    }

    function update($x){

        $this->load->library('form_validation');

        $caseStudyName = $_POST['caseStudyName'];
        $caseStudyURL = $_POST['caseStudyURL'];

        $this->form_validation->set_rules('caseStudyName', 'Case study name', 'required');
        $this->form_validation->set_rules('caseStudyURL', 'Case study URL', 'trim|required');

        $data['data'] = $_POST;

        if ($this->form_validation->run()) {
            if(filter_var($caseStudyURL, FILTER_VALIDATE_URL) !== false){
                $this->CaseStudy_model->updateCaseStudy($x, $caseStudyName, $caseStudyURL);
                $this->session->set_flashdata('success-warning-message','Case study '. $x . ' updated');
                $this->load->view('caseStudy/index');
            }

            else{
                $this->session->set_flashdata('error-warning-message','Please enter a valid URL');
                redirect(base_url().'caseStudy/caseStudyEdit/'.$x,$data);

            }

        }
        else{
            $this->session->set_flashdata('error-warning-message',validation_errors());
            redirect(base_url().'caseStudy/caseStudyEdit/'.$x,$data);
            #$this->load->view('caseStudy/caseStudyEdit/'.$x,$data);
        }

    }

    function delete($x){
        $delete = $this->CaseStudy_model->delete($x);
        if($delete == true){
            $this->session->set_flashdata('success-warning-message',"Case study ". $x ." deleted");
            redirect(base_url().'caseStudy/index');
        }
        $this->session->set_flashdata('error-warning-message',"Case study ". $x ." could not be deleted");
        redirect(base_url().'caseStudy/index');

    }
}
