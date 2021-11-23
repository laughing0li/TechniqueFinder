<?php
/**
 * TechniqueFinder - References.php
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

class References extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!($this->session->userdata('logged_in') == True)) {
            redirect(base_url() . 'login/index');
        }

        $this->load->model('References_model');
    }

    function index(){
        $this->load->view('review/index');
    }
    function create(){
        $this->load->view('review/create');
    }

    function validateCreate(){

        $this->load->library('form_validation');

        $referenceName = $_POST['referenceNames'];
        $title = $_POST['title'];
        $fullReference = $_POST['fullReference'];
        $url = trim($_POST['url']);


        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('fullReference', 'Full reference', 'required');

        $data['data'] = $_POST;

        if ($this->form_validation->run()) {

            if(strlen($url)>0) {

                if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
                    $id = $this->References_model->insertReferenceWithURL($referenceName, $title, $fullReference, $url);
                    $this->session->set_flashdata('success-warning-message', 'Reference ' . $id . ' created');
                    $this->load->view('review/index');
                } else {

                    $this->session->set_flashdata('error-warning-message', 'Enter a valid URL');
                    $this->load->view('review/create', $data);

                }

            } else{
                $id = $this->References_model->insertReferenceWithoutURL($referenceName, $title, $fullReference);
                $this->session->set_flashdata('success-warning-message','Reference '.$id .' created');
                $data = $this->References_model->getReferenceData($id);
                $this->load->view('review/view/'.$id,$data);


            }
        }


        else{
            $this->session->set_flashdata('error-warning-message',validation_errors());
            $this->load->view('review/create',$data);
        }
    }


    function view($x){

        $references_list = $this->References_model->getReferencesList();

        $current= 0;
        $prev = 0;
        $next=0;
        $max = 0;
        foreach ($references_list as $key =>$value) {
            if($value->id == $x){
                $current = $key;
            }
            $max++;
        }

        if($current >$max ){
            $next =0;
        }
        else{
            if(isset($references_list[$current+1]->id)){
                $next = $references_list[$current+1]->id;
            }

        }
        if($current == 0 ){
            $prev=0;
        }
        else{
            $prev =$references_list[$current-1]->id;
        }


        $query = $this->References_model->getRefernceData($x);
        $associated_techniques = $this->References_model->getAssociatedTechniques($x);

        $technique_list = array();
        foreach($associated_techniques as $row){
            $var = "<a href='".base_url()."Techniques/View/".$row['technique_reviews_id']."'>".$this->References_model->getTechniqueName($row['technique_reviews_id'])->name."</a>";
            array_push($technique_list,$var);
        }

        $reference_data['data'] = array('id'=>$query->id, 'title'=>$query->title,'full_reference'=>$query->full_reference,'reference_names'=>$query->reference_names,'url'=>$query->url, 'associatedTechniques'=>$technique_list);
        $reference_data['prev_location'] = $prev;
        $reference_data['next_location']  =$next;
        $this->load->view('review/view',$reference_data);
    }

    function getReferenceList(){
        $data = array();
        $results = $this->References_model->getReferencesList();

        foreach ($results  as $r) {
            array_push($data, array(
                $r->reference_names,
                $r->title,
                "<div style='min-width: 245px;'>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."references/view/".$r->id."'><span style='background: url(../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>"  ."<span style='margin-left: 2em;'>&nbsp;</span>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."references/edit/".$r->id."'><span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>". "<span style='margin-left: 2em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."references/delete/".$r->id."'><span style='background: url(../assets/images/database_delete.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button></div>",

            ));
        }

        echo json_encode(array('data' => $data));
    }

    function edit($x){
        $query = $this->References_model->getRefernceData($x);
        $reference_data['data'] = array('id'=>$query->id, 'title'=>$query->title,'full_reference'=>$query->full_reference,'reference_names'=>$query->reference_names,'url'=>$query->url);
        $this->load->view('review/edit',$reference_data);


    }

    function validateEdit($x){



        $this->load->library('form_validation');

        $referenceName = $_POST['referenceNames'];
        $title = $_POST['title'];
        $fullReference = $_POST['fullReference'];
        $url = trim($_POST['url']);


        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('fullReference', 'Full reference', 'required');

        $data['data'] = $_POST;

        if ($this->form_validation->run()) {

            if(strlen($url)>0) {

                if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
                    $id = $this->References_model->updateWithURL($x, $referenceName, $title, $fullReference, $url);
                    $this->session->set_flashdata('success-warning-message', 'Reference ' . $id . ' updated');
                    $data = $this->References_model->getRefernceData($x);
                    //$this->load->view('References/view/'.$x,$data);
                    redirect(base_url().'References/view/'.$x);
                } else {

                    $this->session->set_flashdata('error-warning-message', 'Enter a valid URL');
                    //$this->load->view('review/edit/'.$x, $data);
                    redirect(base_url().'References/edit/'.$x);

                }

            } else{
                $id = $this->References_model->updateWithoutURL($x, $referenceName, $title, $fullReference, $url);
                $this->session->set_flashdata('success-warning-message','Reference '.$x .' Updated');
                $data = $this->References_model->getRefernceData($x);
                //$this->load->view('review/view/'.$x,$data);
                redirect(base_url().'References/view/');


            }
        }


        else{
            $this->session->set_flashdata('error-warning-message',validation_errors());
            $this->load->view('review/create',$data);
        }
    }

    function delete($x){
        $this->References_model->removeAssociatedTechnique($x);
        $this->References_model->delete($x);
        $this->session->set_flashdata('success-warning-message',"Reference study ". $x ." deleted");
        redirect(base_url().'references/index');
    }



}