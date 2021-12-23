<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localisation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // auth0 config
        if ($this->session->userdata('auth0__user') == null){
            redirect(base_url() . 'login');
        }
        
        $this->load->model('Localisation_model');
        $this->load->model('Location_model');

    }

    /**
     * Set up localisation index view
     */
    function index(){
        $this->load->view('Localisation/index');
    }


    /**
     * Retrieves a list of applications for dropdown selector
     */
    function getApplicationList(){
        $results = $this->Localisation_model->getApplicationList();
        return $results; 
    } 

    /**
     * Get localisation data to fill up a table 
     */
    function getLocalisationList(){

        $data = array();
        $results = $this->Localisation_model->getLocalisationList();

        foreach ($results  as $r) {
            array_push($data, array(
                $r->yr_commissioned,
                $r->applications,
                $r->center_name,
                $r->institution,
                $r->instrument_name,
                "<div style='min-width: 245px;'>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."localisation/view/".$r->id."'><span style='background: url(../../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>"  ."<span style='margin-left: 2em;'>&nbsp;</span>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."localisation/edit/".$r->id."'><span style='background: url(../../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>". "<span style='margin-left: 2em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick=deleteLocalisation(".$r->id .")><span style='background: url(../../assets/images/database_delete.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button></div>",
            ));
        }

        echo json_encode(array('data' => $data));
    }

    /**
     * Set up the add localisation view
     */
    function add(){
        $data['localisations'] = $this->Localisation_model->getLocalisations();
        $data['locations'] = $this->Localisation_model->getLocations();
        $data['applications'] = $this->Localisation_model->getApplicationList();
        $data['techniques'] = $this->Localisation_model->getTechniqueList();
        $this->load->view('Localisation/add', $data);
    }

    /**
     * Validate the data for a new localisation and add it to the database
     */
    function validate_new(){
        $data['data']=$_POST;

        $this->load->library('form_validation');

        $this->form_validation->set_rules('yr_commissioned', 'Year Commissioned', 'trim|required');
        $this->form_validation->set_rules('applications', 'Applications', 'trim|required');

        if (isset($_POST['location_id_selected_hidden'])) {
            $location_id = $_POST['location_id_selected_hidden'];
        } else {
            $location_id = "";
        }

        if (isset($_POST['technique_id_selected_hidden'])) {
            $technique_id = $_POST['technique_id_selected_hidden'];
        } else {
            $technique_id = "";
        }

        $yr_commissioned = $_POST['yr_commissioned'];
        $applications = $_POST['applications_items_selected_hidden'];


        if ($this->form_validation->run()) {
            $id = $this->Localisation_model->saveNewLocalisation($yr_commissioned, $applications, $technique_id, $location_id);

            $this->session->set_flashdata('success-warning-message',"Localisation " . $id . " created");
            $this->load->view('Localisation/index');
        }
        else {
            $this->session->set_flashdata('error-warning-message',validation_errors());
            $this->load->view('Localisation/add',$data);
        }
    }

    /**
     * Edit localisation data for technique
     *
     * @param $localisation_id  localisation id
     */
    function edit($localisation_id){
        $query = $this->Localisation_model->getLocalisationData($localisation_id);
        $localisation_data = array();
        if (isset($query[0])) {
            $q = $query[0];

            $localisation_data = array(
                'id'=>$query[0]->id,
                'technique_id'=>$q->technique_id,
                'location_id'=>$q->location_id,
                'yr_commissioned'=>$q->yr_commissioned,
                'applications'=>$q->applications,
                'model'=>$q->model,
                'manufacturer'=>$q->manufacturer,
                'technique_name'=>$q->technique_name,
                'instrument_name'=>$q->instrument_name,
                'center_name'=>$q->center_name,
                'institution'=>$q->institution,
            );
            $data['applications_items_selected_hidden'] = $q->applications;
        }
        $data['data'] = $localisation_data;

        $data['localisations'] = $this->Localisation_model->getLocalisations();
        $data['locations'] = $this->Localisation_model->getLocations();
        $data['applications'] = $this->Localisation_model->getApplicationList();
        $data['techniques'] = $this->Localisation_model->getTechniqueList();


        $this->load->view('Localisation/edit',$data);
    }

    /**
     * Deletes localisation data for technique
     *
     * @param $localisation_id localisation id
     */
    function delete($localisation_id){
        $this->Localisation_model->deleteLocalisation($localisation_id);
        $this->session->set_flashdata('success-warning-message',"Localisation for localisation ". $localisation_id ." deleted");
        redirect(base_url().'Localisation/index');
    }

    /**
     * Checks incoming edit form and performs changes to localisation in database
     *
     * @param $localisation_id localisation id
     */
    function validateEdit($localisation_id){
        $data['data']=$_POST;
        $this->load->library('form_validation');

        $this->form_validation->set_rules('yr_commissioned', 'Year Commissioned', 'trim|required');
        $this->form_validation->set_rules('applications', 'Applications', 'trim|required');
        if (isset($_POST['applications_items_selected_hidden'])) {
            $applications = $_POST['applications_items_selected_hidden'];
        } else {
            $applications = "";
        }
        $location = $this->Location_model->getLocationByName($data['data']['location']);
        $location_id = intval($location->id);

        if (isset($_POST['technique_id_selected_hidden'])) {
            $technique_id = $_POST['technique_id_selected_hidden'];
        } else {
            $technique_id = "";
        }

        $yr_commissioned = $_POST['yr_commissioned'];

        if ($this->form_validation->run()) {
            $this->Localisation_model->updateLocalisation($localisation_id, $yr_commissioned, $applications, $location_id, $technique_id);

            if($this->session->set_flashdata('error-warning-message')){
                unset($_SESSION['error-warning-message']);
            }
            $this->session->set_flashdata('success-warning-message',"Localisation ". $localisation_id ." updated");

            redirect(base_url().'Localisation/index');
        } else {
            $this->session->set_flashdata('error-warning-message',validation_errors());
            redirect(base_url().'Localisation/edit/'.$localisation_id,$data);
        }

    }

    /**
     * Setup the localisation view
     *
     * @param $localisation_id localisation id
     */
    function view($localisation_id){

        $localisation_list = $this->Localisation_model->getLocalisationList();

        $current= 0;
        $prev = 0;
        $next=0;
        $max = 0;
        foreach ($localisation_list as $key =>$value) {
            if($value->id == $localisation_id){
                $current = $key;
            }
            $max++;
        }

        if($current >$max ){
            $next =0;
        }
        else{
            if(isset($localisation_list[$current+1]->id)){
                $next = $localisation_list[$current+1]->id;
            }
        }
        if($current == 0 ){
            $prev=0;
        }
        else{
            $prev =$localisation_list[$current-1]->id;
        }


        $navigation_buttons= $this->Localisation_model->getLocalisationIds();
        $query = $this->Localisation_model->getLocalisationData($localisation_id);
        if (isset($query[0])) {
            $q = $query[0];
            $localisation_data['data'] = array('id'=>$localisation_id,
                                               'yr_commissioned'=>$q->yr_commissioned,
                                               'applications'=>$q->applications,
                                               'model'=>$q->model,
                                               'manufacturer'=>$q->manufacturer,
                                               'technique_name'=>$q->technique_name,
                                               'instrument_name'=>$q->instrument_name,
                                               'center_name'=>$q->center_name,
                                               'institution'=>$q->institution);
        }
        $localisation_data['navigation_buttons'] = $navigation_buttons;
        $localisation_data['prev_location'] = $prev;
        $localisation_data['next_location'] = $next;
        $localisation_data['max'] = $max;
        $this->load->view('Localisation/view', $localisation_data);
    }


}
