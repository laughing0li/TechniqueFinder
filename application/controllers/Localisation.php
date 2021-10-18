<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localisation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('auth0__user') == null){
            redirect(base_url() . 'login/index');
        }
        $this->load->model('Localisation_model');

    }

    /**
     * Set up localisation index view
     */
    function index(){
        $this->load->view('Localisation/index');
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
                "<div style='min-width: 245px;'>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."localisation/view/".$r->id."'><span style='background: url(../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>"  ."<span style='margin-left: 2em;'>&nbsp;</span>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."localisation/edit/".$r->id."'><span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>". "<span style='margin-left: 2em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick=deleteLocalisation(".$r->id .")><span style='background: url(../assets/images/database_delete.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button></div>",
            ));
        }

        echo json_encode(array('data' => $data));
    }

    /**
     * Set up the add localisation view
     */
    function add(){
        $localisations['localisations'] = $this->Localisation_model->getLocalisations();
        $this->load->view('Localisation/add', $localisations);
    }

    /**
     * Validate the data for a new localisation and add it to the database
     */
    function validate_new(){
        $data['data']=$_POST;

        $data['localisation'] = $this->Localisation_model->getLocalisations();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('yr_commissioned', 'Year Commissioned', 'trim|required');
        $this->form_validation->set_rules('applications', 'Applications', 'trim|required');

        $yr_commissioned = $_POST['yr_commissioned'];
        $applications = $_POST['applications'];

        if ($this->form_validation->run()) {
            $id = $this->Localisation_model->saveNewLocalisation($yr_commissioned, $applications);

            $this->session->set_flashdata('success-warning-message',"Localisation created");
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
     * @param $x technique id
     */
    function edit($x){
        $query = $this->Localisation_model->getLocalisationData($x);

        $localisation_data = array(
            'id'=>$query[0]->id,
            'yr_commissioned'=>$query[0]->yr_commissioned,
            'applications'=>$query[0]->applications,
        );

        $data['data']=$localisation_data;
        $this->load->view('Localisation/edit',$data);

    }

    /**
     * Deletes localisation data for technique
     *
     * @param $x technique id
     */
    function delete($x){
        $this->Localisation_model->deleteLocalisation($x);
        $this->session->set_flashdata('success-warning-message',"Localisation for technique ". $x ." deleted");
        redirect(base_url().'Localisation/index');
    }

    /**
     * Checks incoming edit form and performs changes to localisation in database
     *
     * @param $x technique id
     */
    function validateEdit($x){
        $data['data']=$_POST;

        $data['localisation'] = $this->Localisation_model->getLocalisation();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('yr_commissioned', 'Year Commissioned', 'trim|required');
        $this->form_validation->set_rules('applications', 'Applications', 'trim|required');

        $yr_commissioned = $_POST['yr_commissioned'];
        $applications = $_POST['applications'];

        if ($this->form_validation->run()) {
            $id = $this->Localisation_model->updateLocalisation($x, $yr_commissioned, $applications);

            if($this->session->set_flashdata('error-warning-message')){
                unset($_SESSION['error-warning-message']);
            }
            $this->session->set_flashdata('success-warning-message',"Localisation ".$id ." updated");

            redirect(base_url().'Localisation/index');

        }
        else{
            $this->session->set_flashdata('error-warning-message',validation_errors());
            redirect(base_url().'Localisation/edit/'.$x,$data);

        }

    }

    /**
     * Setup the localisation view
     *
     * @param $x technique id
     */
    function view($x){

        $localisation_list = $this->Localisation_model->getLocalisationList();

        $current= 0;
        $prev = 0;
        $next=0;
        $max = 0;
        foreach ($localisation_list as $key =>$value) {
            if($value->id == $x){
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
        $query = $this->Localisation_model->getLocalisationData($x);
        foreach($query as $q){
            $localisation_data['center_name'] = $q->center_name;
        }
        // $associated_techniques = $this->Localisation_model->getAssociatedTechniques($x);

        $technique_list = array();
        //foreach($associated_techniques as $row){
        //    $var = "<a href='".base_url()."Techniques/View/".$row['technique_id']."'>".$this->Localisation_model->getTechniqueName($row['technique_id'])->name."</a>";
        //    array_push($technique_list,$var);
        //}
        $localisation_data['data'] = array('id'=>$query[0]->id, 'yr_commissioned'=>$query[0]->yr_commissioned, 'applications'=>$query[0]->applications);
        $localisation_data['location'] = "<a href='" . base_url() ."/View/". "</a>"; /*$query[0]->lid ."'>". $query[0]->institution."</a>"; */
        $localisation_data['navigation_buttons'] = $navigation_buttons;
        $localisation_data['prev_location'] = $prev;
        $localisation_data['next_location'] = $next;
        $localisation_data['max'] = $max;


        $this->load->view('Localisation/view', $localisation_data);
    }


}
