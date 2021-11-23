<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Elements extends CI_Controller
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
        
        $this->load->model('Elements_model');
    }

    /*
     * Loads the a view of a list of elements
     */
    function index(){
        $this->load->view('Elements/index');
    }

    /*
     * Fetches element data to be inserted into a table for display & editing
     */
    function getElementsList(){

        $data = array();
        $results = $this->Elements_model->getElementsList();

        foreach ($results  as $r) {
            array_push($data, array(
                "<div style='min-width: 245px;'>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."elements/view/".$r->id."'><span style='background: url(../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>"  ."<span style='margin-left: 2em;'>&nbsp;</span>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."elements/edit/".$r->id."'><span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>". "<span style='margin-left: 2em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick=deleteContact(".$r->id .")><span style='background: url(../assets/images/database_delete.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button></div>",
                $r->name,
                $r->symbols
            ));
        }

        echo json_encode(array('data' => $data));
    }

    /*
     * Loads the add elements view
     */
    function add(){
        $elements['elements'] = $this->Elements_model->getElementSymbols();
        $this->load->view('Elements/add', $elements);
    }

    /*
     * Validates the data posted when a new set of elements is created
     */
    function validate_new(){
        // Find element ids for the submitted elements
        $elements = $this->Elements_model->getElementSymbols();
        $element_id_list = array();
        foreach($elements as $element) {
            if (isset($_POST[$element->name])) {
                array_push($element_id_list, $element->element_id);
            }
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        $name = $_POST['name'];

        if ($this->form_validation->run()) {
            $id = $this->Elements_model->saveNewElements($name, $element_id_list);

            $this->session->set_flashdata('success-warning-message',"Element ".$name ." created");
            $this->load->view('Elements/index');

        }
        else{
            $this->session->set_flashdata('error-warning-message',validation_errors());
            $this->load->view('Elements/add',$data);

        }
    }

    /*
     * Loads the element edit view 
     * @param $x 'element_set' id
     */
    function edit($x){
        // Get the elements data from this 'element_set'
        $query = $this->Elements_model->getElementsData($x);

        // Full list of elements from which to choose
        $data['elements'] = $this->Elements_model->getElementSymbols();

        $elements_data = array(
            'id'=>$query[0]->id,
            'name'=>$query[0]->name,
            'symbols'=>$query[0]->symbols
        );

        $data['data']=$elements_data;
        $this->load->view('Elements/edit',$data);
    }

    /*
     * Initiates the elements deletion
     * @param $x element_set id
     */
    function delete($x){
        $technique_associated_contact = $this->Contact_model->getAssociatedTechniques($x);
        if(sizeof($technique_associated_contact) > 0){
            $this->session->set_flashdata('error-warning-message','This element is associated with a technique and cannot be deleted.');
            redirect(base_url().'Elements/index');
        }else{
            $this->Element_model->deleteElement($x);
            $this->session->set_flashdata('success-warning-message',"Element ". $x ." deleted");
            redirect(base_url().'Elements/index');
        }
    }

    /*
     * Validates the data posted from the edit view and submits to db
     * @param $x element_set id
     */
    function validateEdit($x){
        // Create a list of element ids from the submitted form data
        $elements = $this->Elements_model->getElementSymbols();
        $element_id_list = array();
        foreach($elements as $element) {
            if (isset($_POST[$element->name])) {
                array_push($element_id_list, $element->element_id);
            }
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $name = $_POST['name'];

        if ($this->form_validation->run()) {
            $id = $this->Elements_model->updateElements($x, $name, $element_id_list);

            if ($this->session->set_flashdata('error-warning-message')){
                unset($_SESSION['error-warning-message']);
            }
            $this->session->set_flashdata('success-warning-message',"Element ". $id ." updated");

            redirect(base_url().'Elements/index');
        } else {
            $this->session->set_flashdata('error-warning-message',validation_errors());
            redirect(base_url().'Elements/edit/'.$x,$data);
        }
    }

    /*
     * Loads a view of a set of element data
     * @param $x element_set id
     */
    function view($x){

        $elements_list = $this->Elements_model->getElementsList();

        // Assigns values for the "prev" and "next" record navigation controls
        $current= 0;
        $prev = 0;
        $next=0;
        $max = 0;
        foreach ($elements_list as $key =>$value) {
            if($value->id == $x){
                $current = $key;
            }
            $max++;
        }

        if ($current > $max) {
            $next =0;
        }
        else{
            if(isset($elements_list[$current+1]->id)){
                $next = $elements_list[$current+1]->id;
            }
        }
        if ($current == 0) {
            $prev=0;
        }
        else{
            $prev = $elements_list[$current-1]->id;
        }


        $navigation_buttons= $this->Elements_model->getElementsIds();
        $query = $this->Elements_model->getElementsData($x);
        $elements_data['data'] = array('id'=>$query[0]->id, 'name'=>$query[0]->name, 'symbols'=>$query[0]->symbols);

        $elements_data['navigation_buttons']= $navigation_buttons;
        $elements_data['prev_location'] = $prev;
        $elements_data['next_location']  =$next;
        $elements_data['max']  = $max;

        $this->load->view('Elements/view', $elements_data);
    }

}
