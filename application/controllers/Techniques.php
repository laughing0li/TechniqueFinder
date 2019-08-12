<?php
/**
 * TechniqueFinder - Techniques.php
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

class Techniques extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!($this->session->userdata('logged_in') == True)) {
            redirect(base_url() . 'login/index');
        }

        $this->load->model('Techniques_model');
    }


    function index()
    {
        $this->load->view('Techniques/index');
    }

    function getTechniqueList()
    {
        $data = array();
        $results = $this->Techniques_model->getAllTechniques();

        foreach ($results as $r) {
            array_push($data, array(
                $r->name,
                $r->description,
                $r->keywords,
                $r->alternative_names,
                "<div style='min-width: 300px;'><button id='userIndexButtons' class='user-table-buttons' onclick=window.location='" . base_url() . "Techniques/view/" . $r->id . "'><span style='background: url(../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>" . "<span style='margin-left: 2em;'>&nbsp;</span>" . "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='" . base_url() . "Techniques/edit/" . $r->id . "'><span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>". "<span style='margin-left: 2em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick='deleteTechnique(".$r->id.")'><span style='background: url(../assets/images/database_delete.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button>" ."</div>",

            ));
        }

        echo json_encode(array('data' => $data));

    }

    function view($x)
    {

        $technique_list = $this->Techniques_model->getAllTechniques();

        $current= 0;
        $prev = 0;
        $next=0;
        $max = 0;
        foreach ($technique_list as $key =>$value) {
            if($value->id == $x){
                $current = $key;
            }
            $max++;
        }

        if($current >$max ){
            $next =0;
        }
        else{
            $next = $technique_list[$current+1]->id;
        }
        if($current == 0 ){
            $prev=0;
        }
        else{
            $prev =$technique_list[$current-1]->id;
        }

        $data['prev_location'] = $prev;
        $data['next_location']  =$next;
        $data['max']  =$max;

        $data['media_list'] = $this->Techniques_model->getTechniqueDataAll();


        $data['contacts'] = $this->Techniques_model->getTechniqueContacts($x);
        $data['case'] = $this->Techniques_model->getTechniqueCase($x);

        $data['references'] = $this->Techniques_model->getTechniqueReferences($x);
        $data['associated'] = $this->Techniques_model->getAssociatedTechniques($x);


        // Get data for Technique

        $technique_data = $this->Techniques_model->getTechniqueData($x);
        $data['technique_name'] = $technique_data->name;
        $data['id'] = $technique_data->id;
        $data['short_description'] = $technique_data->summary;
        $data['long_description'] = $technique_data->description;
        $data['alternative_names'] = $technique_data->alternative_names;
        $data['keywords'] = $technique_data->keywords;


        $media_items  = $this->Techniques_model->getMediaItems($x);
        $output_items = $this->Techniques_model->getOutputItems($x);
        $instrument_items = $this->Techniques_model->getInstrumentItems($x);
        $contact_items = $this->Techniques_model->getContactItems($x);
        $getCaseItems = $this->Techniques_model->getCaseItems($x);
        $referenceItems = $this->Techniques_model->getReferencesItems($x);


        if(isset($media_items[0]['media_id'])){$media_items = $media_items[0]['media_id'];}else{$media_items='';}
        $data['media_items_selected_hidden'] = $media_items;
        $data['media_output_items_selected_hidden'] = $output_items;
        $data['media_instrument_items_selected_hidden'] = $instrument_items;
        $data['contact_items_selected_hidden'] = $contact_items;
        $data['case_items_selected_hidden'] = $getCaseItems;
        $data['references_items_selected_hidden'] = $referenceItems;

        $this->load->view('Techniques/view', $data);
    }

    function createTechnique()
    {
        $this->load->library('CKEditor');
        $this->load->library('CKFinder');

        $data['media_list'] = $this->Techniques_model->getTechniqueDataAll();
        $data['contact_list'] = $this->Techniques_model->getContactList();
        $data['case_list'] = $case_list = $this->Techniques_model->getCaseList();
        $data['references_list'] = $this->Techniques_model->getReferencesList();

        $this->load->view('Techniques/addTechnique', $data);

    }

    function getMediaList()
    {
        $media_list = $this->Techniques_model->getMediaList();
        echo json_encode($media_list);

    }

    function validateCreateTechnique()
    {
        $this->load->model('Techniques_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('technique_name', 'Name', 'required');
        $this->form_validation->set_rules('long_description', 'Long Description', 'required');
        $this->form_validation->set_rules('short_description', 'Short Description', 'required');

        $technique_name_list = $this->Techniques_model->getTechniqueNameList();
        foreach ($technique_name_list as $new_technique_name) {
            if ($new_technique_name->name == $_POST['technique_name']) {
                $technique_data['technique_data'] = $_POST;
                $this->session->set_flashdata('error-warning-message', 'Technique with this name already exists.');
                $this->load->view('Techniques/addTechnique', $technique_data);
                return;
            }
        }

        $short_description = $_POST['short_description'];
        $long_description = $_POST['long_description'];
        $technique_name = $_POST['technique_name'];

        if (isset($_POST['media_items_selected_hidden'])) {
            $list_media_items = $_POST['media_items_selected_hidden'];
        } else {
            $list_media_items = Array();
        }

        if (isset($_POST['media_output_items_selected_hidden'])) {
            $output_media_items = $_POST['media_output_items_selected_hidden'];
        }else {
            $output_media_items = Array();
        }
        if (isset($_POST['media_instrument_items_selected_hidden'])) {
            $instrument_media_items = $_POST['media_instrument_items_selected_hidden'];
        }else {
            $instrument_media_items = Array();
        }

        if (isset($_POST['contact_items_selected_hidden'])) {
            $contact_items = $_POST['contact_items_selected_hidden'];
        }else {
            $contact_items = Array();
        }
        if (isset($_POST['case_items_selected_hidden'])) {
            $case_studies_list = $_POST['case_items_selected_hidden'];
        }else {
            $case_studies_list = Array();
        }

        if (isset($_POST['references_items_selected_hidden'])) {
            $references_items = $_POST['references_items_selected_hidden'];
        }else {
            $references_items = Array();
        }

        if (isset($_POST['alternative_names'])) {
            $alternative_names = $_POST['alternative_names'];
        }else{
            $alternative_names = '';
        }
        if (isset($_POST['keywords'])) {
            $keywords = $_POST['keywords'];
        }else {
            $keywords = '';
        }


        if ($this->form_validation->run()) {
            $id = $this->Techniques_model->save_new_technique($technique_name, $alternative_names, $short_description, $long_description, $keywords, $list_media_items, $output_media_items, $instrument_media_items, $contact_items, $case_studies_list, $references_items);
            $this->session->set_flashdata('success-warning-message', "Technique " . $id . " created");
            $this->load->view('Techniques/index');
        } else {
            $this->load->library('CKEditor');
            $this->load->library('CKFinder');


            $data['technique_name'] = $_POST['technique_name'];

            $data['short_description'] = $_POST['short_description'];
            $data['long_description'] = $_POST['long_description'];
            $data['alternative_names'] = $_POST['alternative_names'];
            $data['keywords'] = $_POST['keywords'];
            $data['media_list'] = $this->Techniques_model->getTechniqueDataAll();
            $data['contact_list'] = $this->Techniques_model->getContactList();
            $data['case_list'] = $case_list = $this->Techniques_model->getCaseList();
            $data['references_list'] = $this->Techniques_model->getReferencesList();

            if (isset($_POST['media_items_selected_hidden'])) {
                $data['media_items_selected_hidden'] = $_POST['media_items_selected_hidden'];
            }
            if (isset($_POST['media_output_items_selected_hidden'])) {
                $data['media_output_items_selected_hidden'] = $_POST['media_output_items_selected_hidden'];
            }
            if (isset($_POST['media_instrument_items_selected_hidden'])) {
                $data['media_instrument_items_selected_hidden'] = $_POST['media_instrument_items_selected_hidden'];
            }

            if (isset($_POST['contact_items_selected_hidden'])) {
                $data['contact_items_selected_hidden'] = $_POST['contact_items_selected_hidden'];

            }
            if (isset($_POST['case_items_selected_hidden'])) {
                $data['case_items_selected_hidden'] = $_POST['case_items_selected_hidden'];
            }

            if (isset($_POST['references_items_selected_hidden'])) {
                $data['references_items_selected_hidden'] = $_POST['references_items_selected_hidden'];
            }

            $this->session->set_flashdata('error-warning-message', validation_errors());
            $this->session->keep_flashdata('error-warning-message', validation_errors());
            $this->load->view('Techniques/addTechnique', $data);
        }

    }

    function getContactList()
    {
        $contact_list = $this->Techniques_model->getContactList();
        echo json_encode($contact_list);
    }

    function getCaseList()
    {
        $case_list = $this->Techniques_model->getCaseList();
        echo json_encode($case_list);
    }

    function getReferencesList()
    {
        $references_list = $this->Techniques_model->getReferencesList();
        echo json_encode($references_list);
    }



    function edit($x)
    {
        $data['media_list'] = $this->Techniques_model->getTechniqueDataAll();
        $data['contact_list'] = $this->Techniques_model->getContactList();
        $data['case_list'] = $case_list = $this->Techniques_model->getCaseList();
        $data['references_list'] = $this->Techniques_model->getReferencesList();

        // Get data for Technique

        $technique_data = $this->Techniques_model->getTechniqueData($x);
        $data['technique_name'] = $technique_data->name;
        $data['id'] = $technique_data->id;
        $data['short_description'] = $technique_data->summary;
        $data['long_description'] = $technique_data->description;
        $data['alternative_names'] = $technique_data->alternative_names;
        $data['keywords'] = $technique_data->keywords;


        $media_items  = $this->Techniques_model->getMediaItems($x);
        $output_items = $this->Techniques_model->getOutputItems($x);
        $instrument_items = $this->Techniques_model->getInstrumentItems($x);
        $contact_items = $this->Techniques_model->getContactItems($x);
        $getCaseItems = $this->Techniques_model->getCaseItems($x);
        $referenceItems = $this->Techniques_model->getReferencesItems($x);


        if(isset($media_items[0]['media_id'])){$media_items = $media_items[0]['media_id'];}else{$media_items='';}
        $data['media_items_selected_hidden'] = $media_items;
        $data['media_output_items_selected_hidden'] = $output_items;
        $data['media_instrument_items_selected_hidden'] = $instrument_items;
        $data['contact_items_selected_hidden'] = $contact_items;
        $data['case_items_selected_hidden'] = $getCaseItems;
        $data['references_items_selected_hidden'] = $referenceItems;

        $this->load->view('Techniques/edit', $data);
    }

    function validateEditTechnique($x){
        $this->load->model('Techniques_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('technique_name', 'Name', 'required');
        $this->form_validation->set_rules('long_description', 'Long Description', 'required');
        $this->form_validation->set_rules('short_description', 'Short Description', 'required');

        $technique_name_list = $this->Techniques_model->getTechniqueNameList();

        $short_description = $_POST['short_description'];
        $long_description = $_POST['long_description'];
        $technique_name = $_POST['technique_name'];

        if (isset($_POST['media_items_selected_hidden'])) {
            $list_media_items = $_POST['media_items_selected_hidden'];
        } else {
            $list_media_items = Array();
        }

        if (isset($_POST['media_output_items_selected_hidden'])) {
            $output_media_items = $_POST['media_output_items_selected_hidden'];
        }else {
            $output_media_items = Array();
        }
        if (isset($_POST['media_instrument_items_selected_hidden'])) {
            $instrument_media_items = $_POST['media_instrument_items_selected_hidden'];
        }else {
            $instrument_media_items = Array();
        }

        if (isset($_POST['contact_items_selected_hidden'])) {
            $contact_items = $_POST['contact_items_selected_hidden'];
        }else {
            $contact_items = Array();
        }
        if (isset($_POST['case_items_selected_hidden'])) {
            $case_studies_list = $_POST['case_items_selected_hidden'];
        }else {
            $case_studies_list = Array();
        }

        if (isset($_POST['references_items_selected_hidden'])) {
            $references_items = $_POST['references_items_selected_hidden'];
        }else {
            $references_items = Array();
        }

        if (isset($_POST['alternative_names'])) {
            $alternative_names = $_POST['alternative_names'];
        }else{
            $alternative_names = '';
        }
        if (isset($_POST['keywords'])) {
            $keywords = $_POST['keywords'];
        }else {
            $keywords = '';
        }


        if ($this->form_validation->run()) {
            $id = $this->Techniques_model->update_technique($x,$technique_name, $alternative_names, $short_description, $long_description, $keywords, $list_media_items, $output_media_items, $instrument_media_items, $contact_items, $case_studies_list, $references_items);
            $this->session->set_flashdata('success-warning-message', "Technique " . $id . " updated");
            $this->load->view('Techniques/index');
        } else {
            $this->load->library('CKEditor');
            $this->load->library('CKFinder');


            $data['technique_name'] = $_POST['technique_name'];
            $data['id'] = $x;
            $data['short_description'] = $_POST['short_description'];
            $data['long_description'] = $_POST['long_description'];
            $data['alternative_names'] = $_POST['alternative_names'];
            $data['keywords'] = $_POST['keywords'];
            $data['media_list'] = $this->Techniques_model->getTechniqueDataAll();
            $data['contact_list'] = $this->Techniques_model->getContactList();
            $data['case_list'] = $case_list = $this->Techniques_model->getCaseList();
            $data['references_list'] = $this->Techniques_model->getReferencesList();

            if (isset($_POST['media_items_selected_hidden'])) {
                $data['media_items_selected_hidden'] = $_POST['media_items_selected_hidden'];
            }
            if (isset($_POST['media_output_items_selected_hidden'])) {
                $data['media_output_items_selected_hidden'] = $_POST['media_output_items_selected_hidden'];
            }
            if (isset($_POST['media_instrument_items_selected_hidden'])) {
                $data['media_instrument_items_selected_hidden'] = $_POST['media_instrument_items_selected_hidden'];
            }

            if (isset($_POST['contact_items_selected_hidden'])) {
                $data['contact_items_selected_hidden'] = $_POST['contact_items_selected_hidden'];

            }
            if (isset($_POST['case_items_selected_hidden'])) {
                $data['case_items_selected_hidden'] = $_POST['case_items_selected_hidden'];
            }

            if (isset($_POST['references_items_selected_hidden'])) {
                $data['references_items_selected_hidden'] = $_POST['references_items_selected_hidden'];
            }

            $this->session->set_flashdata('error-warning-message', validation_errors());
            $this->session->keep_flashdata('error-warning-message', validation_errors());
            $this->load->view('Techniques/edit', $data);
        }

    }

    function delete($x){
        $this->Techniques_model->deleteTechnique($x);
        $this->session->set_flashdata('success-warning-message',"Technique ". $x ." deleted");
        redirect(base_url().'Techniques/index');
    }

    // AJAX CALLS

    function getAjaxContactList(){
        $contact_list= $this->Techniques_model->getContactList();
        return json_encode($contact_list);
    }

}