<?php
/**
 * TechniqueFinder - Contact.php
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

class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // if (!($this->session->userdata('logged_in') == True)) {
        //     redirect(base_url() . 'login/index');
        // }

        // auth0 config
        if ($this->session->userdata('auth0__user') == null){
            redirect(base_url() . 'authLogin');
        }
        
        $this->load->model('Contact_model');

    }

    function index(){
        $this->load->view('Contact/index');
    }

    function getContactList(){

        $data = array();
        $results = $this->Contact_model->getContactList();

        foreach ($results  as $r) {
            array_push($data, array(
                $r->name,
                $r->institution,
                $r->technique_contact,
                "<div style='min-width: 245px;'>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."contact/view/".$r->id."'><span style='background: url(../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>"  ."<span style='margin-left: 2em;'>&nbsp;</span>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."contact/edit/".$r->id."'><span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>". "<span style='margin-left: 2em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick=deleteContact(".$r->id .")><span style='background: url(../assets/images/database_delete.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button></div>",
            ));
        }

        echo json_encode(array('data' => $data));
    }

    function add(){
        $locations['locations'] = $this->Contact_model->getLocations();
        $this->load->view('Contact/add', $locations);
    }

    function validate_new(){
        $data['data']=$_POST;

        $data['locations'] = $this->Contact_model->getLocations();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if(isset($_POST['technique_contact'])){
            $data['technique_contact']= 'checked';
            $technique_contact= b'1';
        }
        else{
            $technique_contact = b'0';
        }


        $name = $_POST['name'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $location = $_POST['location'];
        $title = $_POST['title'];

        if ($this->form_validation->run()) {
            $id = $this->Contact_model->saveNewContact($name, $telephone, $email, $position, $location, $technique_contact,$title);

            $this->session->set_flashdata('success-warning-message',"Contact ".$name ." created");
            $this->load->view('Contact/index');

        }
        else{
            $this->session->set_flashdata('error-warning-message',validation_errors());
            $this->load->view('Contact/add',$data);

        }
    }

    function edit($x){
        $query = $this->Contact_model->getContactDataWithBit($x);

        $contact_data = array(
            'id'=>$query[0]->id,
            'title'=>$query[0]->title,
            'name'=>$query[0]->name,
            'contact_position'=>$query[0]->contact_position,
            'telephone'=>$query[0]->telephone,
            'email'=>$query[0]->email,
            'lid'=>$query[0]->lid,
            'institution'=>$query[0]->institution,
        );

        if($query[0]->technique_contact == 1){
            $data['technique_contact'] = 'checked';
        }
        $data['locations'] = $this->Contact_model->getLocations();

        $data['data']=$contact_data;
        $this->load->view('Contact/edit',$data);

    }

    function delete($x){
        $technique_associated_contact = $this->Contact_model->getAssociatedTechniques($x);
        if(sizeof($technique_associated_contact) > 0){
            $this->session->set_flashdata('error-warning-message','This contact is associated with a technique and cannot be deleted.');
            redirect(base_url().'Contact/index');
        }else{
            $this->Contact_model->deleteContact($x);
            $this->session->set_flashdata('success-warning-message',"Case Contact ". $x ." deleted");
            redirect(base_url().'Contact/index');
        }
    }

    function validateEdit($x){
        $data['data']=$_POST;

        $data['locations'] = $this->Contact_model->getLocations();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');



        $technique_contact= b'0';

        if(isset($_POST['technique_contact'])){
            $data['technique_contact']= 'checked';
            $technique_contact= b'1';
        }


        $name = $_POST['name'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $location = $_POST['location'];
        $title = $_POST['title'];

        if ($this->form_validation->run()) {
            $id = $this->Contact_model->updateContact($x,$name, $telephone, $email, $position, $location, $technique_contact,$title);

            if($this->session->set_flashdata('error-warning-message')){
                unset($_SESSION['error-warning-message']);
            }
            $this->session->set_flashdata('success-warning-message',"Contact ".$id ." updated");

            redirect(base_url().'Contact/index');

        }
        else{
            $this->session->set_flashdata('error-warning-message',validation_errors());
            redirect(base_url().'Contact/edit/'.$x,$data);

        }

    }

    function view($x){

        $contact_list = $this->Contact_model->getContactList();

        $current= 0;
        $prev = 0;
        $next=0;
        $max = 0;
        foreach ($contact_list as $key =>$value) {
            if($value->id == $x){
                $current = $key;
            }
            $max++;
        }

        if($current >$max ){
            $next =0;
        }
        else{
            if(isset($contact_list[$current+1]->id)){
                $next = $contact_list[$current+1]->id;
            }
        }
        if($current == 0 ){
            $prev=0;
        }
        else{
            $prev =$contact_list[$current-1]->id;
        }


        $navigation_buttons= $this->Contact_model->getContactIds();
        $query = $this->Contact_model->getContactData($x);
        foreach($query as $q){
            $contact_data['technique_contact']= $q->technique_contact;
        }
        $associated_techniques = $this->Contact_model->getAssociatedTechniques($x);

        $technique_list = array();
        foreach($associated_techniques as $row){
            $var = "<a href='".base_url()."Techniques/View/".$row['technique_contacts_id']."'>".$this->Contact_model->getTechniqueName($row['technique_contacts_id'])->name."</a>";
            array_push($technique_list,$var);
        }
        if(count($associated_techniques)>0) {
            foreach ($associated_techniques as $row) {
            }
        }
        $contact_data['data'] = array('id'=>$query[0]->id, 'title'=>$query[0]->title, 'telephone'=>$query[0]->telephone,'name'=>$query[0]->name,'contact_position'=>$query[0]->contact_position,'email'=>$query[0]->email,'associatedTechniques'=>$technique_list);
        $contact_data['location'] = "<a href='" . base_url() ."Location/View/". $query[0]->lid ."'>". $query[0]->institution."</a>";
        $contact_data['navigation_buttons']= $navigation_buttons;
        $contact_data['prev_location'] = $prev;
        $contact_data['next_location']  =$next;
        $contact_data['max']  =$max;


        $this->load->view('Contact/view',$contact_data);
    }


}
