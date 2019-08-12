<?php
/**
 * TechniqueFinder - BioOptionLeft.php
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

class BioOptionLeft extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (! ($this->session->userdata('logged_in')==TRUE))
        {
            redirect(base_url().'login/index');
        }

        $this->load->model('OptionChoice_model');
    }


    function index(){
        $this->load->view('BioOptionLeft/index');
    }

    function getList(){
        $data = array();
        $results = $this->OptionChoice_model->getAllOptionChoices('BIOLOGY', 'LEFT');

        foreach ($results  as $r) {
            array_push($data, array(
                'id'=>$r->id,
                'name'=>$r->name,
                'priority'=>$r->priority,
                'actions'=>"<div style='min-width: 245px;'>"
                ."<button class='user-table-buttons' onclick=window.location='".base_url()."BioOptionLeft/edit/".$r->id."'>"
                ."<span style='background: url(../assets/images/database_edit.png) 50% no-repeat;margin-right:0.4em;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>"
                ."<span style='margin-left: 2em;'>&nbsp;</span>"
                ."<button class='user-table-buttons' onclick=\"if (confirm('Are you sure?')){ window.location='".base_url()."BioOptionLeft/delete/".$r->id."'}\">"
                ."<span style='background: url(../assets/images/database_delete.png) 50% no-repeat;margin-right:0.1em; '>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button>"
                ."<span style='float: right; margin-top: 0.5em;' class='ui-icon ui-icon-arrowthick-2-n-s'></span>"
                ."</div>",
            ));
        }

        echo json_encode(array('data' => $data));

    }


    function create_new(){
        $this->load->view('BioOptionLeft/new');
    }

    function edit($id){
        $optionChoice_data = $this->OptionChoice_model->getOptionChoiceById($id);
        $this->load->view('BioOptionLeft/edit', array('option_data'=>$optionChoice_data));
    }


    function getMediaList(){
        $this->load->model('Techniques_model');
        $media_list = $this->Techniques_model->getMediaList();
        return $media_list;
    }


    function validate($str){
        $result = $this->OptionChoice_model->getOptionChoicesByName($str, 'BIOLOGY', 'LEFT');

        if(isset($result)) {
            $this->form_validation->set_message('validate', 'Option Name '. $str .' already exists');
            return FALSE;
        }
        else{
            return TRUE;
        }

    }

    function validate_update($str, $id){
        $result = $this->OptionChoice_model->getOptionChoicesByName($str, 'BIOLOGY', 'LEFT');

        if(isset($result) && $result->id != $id) {
            $this->form_validation->set_message('validate_update', 'Option Name '. $str .' already exists');
            return FALSE;
        }
        else{
            return TRUE;
        }

    }


    ///////////////////////////////////////////////////////////
    function create(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'name', 'trim|required|max_length[64]|callback_validate');

        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $this->OptionChoice_model->createOptionChoice($name, 'BIOLOGY', 'LEFT');
            $saved = $this->OptionChoice_model->getOptionChoicesByName($name, 'BIOLOGY', 'LEFT');
            if(isset($saved)){
                $this->session->set_flashdata('success-warning-message',"Option ".$name." has been created.");
                redirect(base_url().'BioOptionLeft/index');
            }
        }
        else {
            $this->session->set_flashdata('error-warning-message',validation_errors());
            redirect(base_url().'BioOptionLeft/create_new');
        }

    }

    function update($id){
        $this->form_validation->set_rules('name', 'name', 'trim|required|max_length[64]|callback_validate_update['.$id.']');
        if ($this->form_validation->run() ) {
            $name = $this->input->post('name');
            $saved = $this->OptionChoice_model->updateNameById($id, $name);
            if(isset($saved)){
                $this->session->set_flashdata('success-warning-message',"Option ".$name." has been updated.");
                redirect(base_url().'BioOptionLeft/index');
            }
        }
        else {
            $this->session->set_flashdata('error-warning-message',validation_errors());
            redirect(base_url().'BioOptionLeft/edit/'.$id);
        }

    }

    function updatePriorities(){
        $ordered_optionIds=$this->input->post('optionIds');
        $n = $this->OptionChoice_model->setAllOptionChoicesPriority($ordered_optionIds, 'BIOLOGY','LEFT');
        echo "Re-orded ".$n." options";
    }

    function delete($id){
        $optionName = $this->OptionChoice_model->getOptionName($id);

        if($this->OptionChoice_model->deleteById($id, 'BIOLOGY','LEFT')){
            $this->session->set_flashdata('success-warning-message',"Left side option for Biological science has been deleted. ");
        }
        else{
            $this->session->set_flashdata('error-warning-message',"Option ". $optionName[0]->name." could not be deleted because it is currently used to associate one or more techniques. Please remove the technique(s) from the association first and then delete the option.");
        }
        redirect(base_url().'BioOptionLeft/index');
    }
}