<?php
/**
 * TechniqueFinder - Location.php
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

class Location extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (! ($this->session->userdata('logged_in')==True))
        {
            redirect(base_url().'login/index');
        }

        $this->load->model('Location_model');

    }


    function index(){
        $this->load->view('Location/index');
    }

    function getList(){
        $data = array();
        $results = $this->Location_model->getAllLocations();

        foreach ($results  as $r) {
            array_push($data, array(
                'id'=>$r->id,
                'priority'=>$r->priority,
                'institution'=>$r->institution,
                'center_name'=>$r->center_name,
                'address'=>$r->address,
                'actions'=>"<div style='min-width: 245px;'>"
                ."<button class='user-table-buttons' onclick=window.location='".base_url()."Location/view/".$r->id."'>"
                ."<span style='background: url(../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>"
                ."<span style='margin-left: 2em;'>&nbsp;</span>"
                ."<button class='user-table-buttons' onclick=window.location='".base_url()."Location/edit/".$r->id."'>"
                ."<span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>"
                ."<span style='margin-left: 2em;'>&nbsp;</span>"
                ."<button class='user-table-buttons' onclick=\"if (confirm('Are you sure?')){ window.location='".base_url()."Location/delete/".$r->id."'}\">"
                ."<span style='background: url(../assets/images/database_delete.png) 50% no-repeat; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button>"
                ."<span style='float: right; margin-top: 0.5em;' class='ui-icon ui-icon-arrowthick-2-n-s'></span>"
                ."</div>",
            ));
        }

        echo json_encode(array('data' => $data));

    }


    function updatePriorities(){
        $ordered_locationIds=$this->input->post('locationIds');
        $n = $this->Location_model->setAllLocationsPriority($ordered_locationIds);
        echo "Re-orded ".$n." options";
    }


    function create_new(){
        $this->load->view('Location/new', array(
            'all_states' =>array( "NSW", "VIC", "SA", "QLD", "ACT", "WA", "TAS"),
            'all_statuses' =>array( 
                'ND'=>'Node',
                'LL'=>'Linked Lab'
            ))
        );
    }

    function edit($id){
        $record = $this->Location_model->getLocationById($id);
        $this->load->view('Location/edit', array(
            'location_data'=>$record,
            'all_states' =>array( "NSW", "VIC", "SA", "QLD", "ACT", "WA", "TAS"),
            'all_statuses' =>array( 
                'ND'=>'Node',
                'LL'=>'Linked Lab'
            ))
        );
    }

    function view($id){
        $record = $this->Location_model->getLocationById($id);
        $prev_location = $this->Location_model->getLocationByPriority($record->priority - 1);
        $next_location = $this->Location_model->getLocationByPriority($record->priority + 1);

        $associated_techniques= $this->Location_model->getLinkedTechniques($id);
        $this->load->view('Location/view', array( 
            'location_data'=>$record, 
            'associated_techniques'=>$associated_techniques,
            'prev_location' =>$prev_location,
            'next_location' =>$next_location
            )
        );
    }


    function getMediaList(){
        $this->load->model('Techniques_model');
        $media_list = $this->Techniques_model->getMediaList();
        return $media_list;
    }


    function validate($str){
        $result = $this->Location_model->getLocationByInstitution($str);

        if(isset($result)) {
            $this->form_validation->set_message('validate', 'Institution '. $str .' already exists');
            return False;
        }
        else{
            return True;
        }

    }

    function validate_update($str, $id){
        $result = $this->Location_model->getLocationByInstitution($str);

        if(isset($result) && $result->id !=$id) {
            $this->form_validation->set_message('validate_update', 'Institution '. $str .' already exists');
            return False;
        }
        else{
            return True;
        }

    }


    ///////////////////////////////////////////////////////////
    function create(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('institution', 'Institution', 'trim|required|max_length[128]|callback_validate');
        $this->form_validation->set_rules('state', 'State', 'trim|required|max_length[3]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|min_length[2]|max_length[2]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[256]');
        $this->form_validation->set_rules('center_name', 'Center Name', 'trim|required|max_length[256]');

        if ($this->form_validation->run()) {
            $institution=$this->input->post('institution');
            $state=$this->input->post('state');
            $status=$this->input->post('status');
            $address=$this->input->post('address');
            $center_name = $this->input->post('center_name');

            if($this->Location_model->createLocation($institution, $state, $status, $address, $center_name)){
                $this->session->set_flashdata('success-warning-message',"Location ".$institution." has been created.");
                redirect(base_url().'Location/index');
            }
        }
        else {
            $this->session->set_flashdata('error-warning-message',validation_errors());
            redirect(base_url().'Location/create_new');
        }

    }


    function update($id){
        $this->form_validation->set_rules('institution', 'Institution', 'trim|required|max_length[128]|callback_validate_update['.$id.']');
        $this->form_validation->set_rules('state', 'State', 'trim|required|max_length[3]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|min_length[2]|max_length[2]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[256]');
        $this->form_validation->set_rules('center_name', 'Center Name', 'trim|required|max_length[256]');
       
        if ($this->form_validation->run() ) {

            $institution=$this->input->post('institution');
            $state=$this->input->post('state');
            $status=$this->input->post('status');
            $address=$this->input->post('address');
            $center_name = $this->input->post('center_name');

            $success = $this->Location_model->updateById($id, $institution, $state, $status, $address, $center_name);
            if($success){
                $this->session->set_flashdata('success-warning-message',"Location ".$institution." has been updated.");
                redirect(base_url().'Location/index');
            }
        }
        else {
            $this->session->set_flashdata('error-warning-message',validation_errors());
            redirect(base_url().'Location/edit/'.$id);
        }

    }

    function delete($id){
        $this->Location_model->deleteById($id);
        $this->session->set_flashdata('success-warning-message',"Location has been deleted. ");
        redirect(base_url().'Location/index');
    }
}