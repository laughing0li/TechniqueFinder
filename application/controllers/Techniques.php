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

        // if (!($this->session->userdata('logged_in') == True)) {
        //     redirect(base_url() . 'login/index');
        // }

        // auth0 config
        if ($this->session->userdata('auth0__user') == null){
            redirect(base_url() . 'authLogin');
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
                substr($r->description, 0, 200),
                $r->model,
                $r->manufacturer,
                "<div style='min-width: 300px;'><button id='userIndexButtons' class='user-table-buttons' onclick=window.location='" . base_url() . "Techniques/view/" . $r->id . "'><span style='background: url(../../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>" . "<span style='margin-left: 2em;'>&nbsp;</span>" . "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='" . base_url() . "Techniques/edit/" . $r->id . "'><span style='background: url(../../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>". "<span style='margin-left: 2em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick='deleteTechnique(".$r->id.")'><span style='background: url(../../assets/images/database_delete.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button>" ."</div>",

            ));
        }

        echo json_encode(array('data' => $data));

    }


    /*
     * Used to setup a view of technique in the Admin page
     *
     * @param $x technique id
     */
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

        // Adjust next and prev page navigation links for first and last page
        if($current+1 >= $max ){
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
        $data['next_location'] = $next;
        $data['max'] = $max;

        $data['media_list'] = $this->Techniques_model->getTechniqueDataAll();
        $data['metadata_list'] = $this->Techniques_model->getMetadataList();


        $data['contacts'] = $this->Techniques_model->getContactsForTechnique($x);
        $data['localisations'] = $this->Techniques_model->getLocalisationItems($x);
        $data['case'] = $this->Techniques_model->getTechniqueCase($x);

        $data['references'] = $this->Techniques_model->getTechniqueReferences($x);
        $data['associated'] = $this->Techniques_model->getAssociatedTechniques($x);


        $data['selected_option_choices'] = $this->Techniques_model->getOptionChoices($x);
        $data['selected_elements'] = $this->Techniques_model->getElements($x);

        // Get data for this  Technique for display in view

        $technique_data = $this->Techniques_model->getTechniqueData($x);
        $data['technique_name'] = $technique_data->name;
        $data['id'] = $technique_data->id;
        $data['short_description'] = $technique_data->summary;
        $data['long_description'] = $technique_data->description;
        $data['alternative_names'] = $technique_data->alternative_names;
        $data['keywords'] = $technique_data->keywords;

        $data['instrument_name'] = $technique_data->instrument_name;
        $data['model'] = $technique_data->model;
        $data['manufacturer'] = $technique_data->manufacturer;
        $data['sample_type'] = $technique_data->sample_type;
        $data['wavelength'] = $technique_data->wavelength;
        $data['beam_diameter'] = $technique_data->beam_diameter;
        $data['min_conc'] = $technique_data->min_conc;
        $data['mass'] = $technique_data->mass;
        $data['volume'] = $technique_data->volume;
        $data['pressure'] = $technique_data->pressure;
        $data['temperature'] = $technique_data->temperature;


        $media_items  = $this->Techniques_model->getMediaItems($x);
        $output_items = $this->Techniques_model->getOutputItems($x);
        $instrument_items = $this->Techniques_model->getInstrumentItems($x);
        $contact_items = $this->Techniques_model->getContactItems($x);
        $getCaseItems = $this->Techniques_model->getCaseItems($x);
        $referenceItems = $this->Techniques_model->getReferencesItems($x);
        $metadataItems = $this->Techniques_model->getMetadataItems($x);
        


        if (isset($media_items[0]['media_id'])) {
            $media_items = $media_items[0]['media_id'];
        } else {
            $media_items='';
        }

        // These 'hidden' values are used to display contacts, media etc. 
        // that have already been added to the technique
        $data['media_items_selected_hidden'] = $media_items;
        $data['media_output_items_selected_hidden'] = $output_items;
        $data['media_instrument_items_selected_hidden'] = $instrument_items;
        $data['contact_items_selected_hidden'] = $contact_items;
        $data['case_items_selected_hidden'] = $getCaseItems;
        $data['references_items_selected_hidden'] = $referenceItems;
        $data['metadata_items_selected_hidden'] = $metadataItems;

        $this->load->view('Techniques/view', $data);
    }

    /*
     * Used to setup the data to add a new technique
     */
    function createTechnique()
    {
        $this->load->library('CKEditor');
        $this->load->library('CKFinder');

	// Used to create lists that a user can choose from when creating a new technique
        $data['media_list'] = $this->Techniques_model->getTechniqueDataAll();
        $data['contact_list'] = $this->Techniques_model->getContactList();
        $data['case_list'] = $case_list = $this->Techniques_model->getCaseList();
        $data['references_list'] = $this->Techniques_model->getReferencesList();
        $data['metadata_list'] = $this->Techniques_model->getMetadataList();
        $data['elements_list'] = $this->Techniques_model->getElementsList();
        $data['option_choices_list'] = $this->Techniques_model->getOptionChoicesList(); 
        $data['localisations_list'] = $this->Techniques_model->getLocalisationList();
	

        $this->load->view('Techniques/addTechnique', $data);

    }

    function getMediaList()
    {
        $media_list = $this->Techniques_model->getMediaList();
        echo json_encode($media_list);
    }

    /*
     * This gets called after a new technique is added
     */
    function validateCreateTechnique()
    {
        $this->load->model('Techniques_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('technique_name', 'Name', 'required');
        $this->form_validation->set_rules('long_description', 'Long Description', 'required');
        $this->form_validation->set_rules('short_description', 'Summary', 'required');
        $this->form_validation->set_rules('instrument_name', 'Instrument Name', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('manufacturer', 'Manufacturer', 'required');

        // Check if technique name exists
        $technique_name_list = $this->Techniques_model->getTechniqueNameList();
        foreach ($technique_name_list as $new_technique_name) {
            if ($new_technique_name->name == $_POST['technique_name']) {
                $technique_data['technique_data'] = $_POST;
                $this->session->set_flashdata('error-warning-message', 'Technique with this name already exists.');
	        // Used to create lists that a user can choose from when creating a new technique
                $technique_data['media_list'] = $this->Techniques_model->getTechniqueDataAll();
                $technique_data['contact_list'] = $this->Techniques_model->getContactList();
                $technique_data['case_list'] = $case_list = $this->Techniques_model->getCaseList();
                $technique_data['references_list'] = $this->Techniques_model->getReferencesList();
                $technique_data['metadata_list'] = $this->Techniques_model->getMetadataList();
                $technique_data['elements_list'] = $this->Techniques_model->getElementsList();
                $technique_data['option_choices_list'] = $this->Techniques_model->getOptionChoicesList(); 
                $technique_data['localisations_list'] = $this->Techniques_model->getLocalisationList();
                $this->load->view('Techniques/addTechnique', $technique_data);
                return;
            }
        }

        // Extract values from $POST
        $short_description = $_POST['short_description'];
        $long_description = $_POST['long_description'];
        $technique_name = $_POST['technique_name'];

        if (isset($_POST['media_items_selected_hidden'])) {
            $list_media_items = $_POST['media_items_selected_hidden'];
        } else {
            $list_media_items = "";
        }

        if (isset($_POST['media_output_items_selected_hidden'])) {
            $output_media_items = $_POST['media_output_items_selected_hidden'];
        }else {
            $output_media_items = "";
        }
        if (isset($_POST['media_instrument_items_selected_hidden'])) {
            $instrument_media_items = $_POST['media_instrument_items_selected_hidden'];
        }else {
            $instrument_media_items = "";
        }

        if (isset($_POST['contact_items_selected_hidden'])) {
            $contact_items = $_POST['contact_items_selected_hidden'];
        }else {
            $contact_items = "";
        }
        if (isset($_POST['case_items_selected_hidden'])) {
            $case_studies_list = $_POST['case_items_selected_hidden'];
        }else {
            $case_studies_list = "";
        }

        if (isset($_POST['references_items_selected_hidden'])) {
            $references_items = $_POST['references_items_selected_hidden'];
        }else {
            $references_items = "";
        }

        if (isset($_POST['localisations_items_selected_hidden'])) {
            $localisations_ids = $_POST['localisations_items_selected_hidden'];
        }else {
            $localisations_ids = "";
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

        // If a new metadata value was selected
        if (isset($_POST['metadata_ids_selected_hidden'])) {
            $metadata_ids = $_POST['metadata_ids_selected_hidden'];
        }else {
            $metadata_ids = '';
        }

        // If a new chemical elements set was selected
        if (isset($_POST['elementsset-id']) && $_POST['elementsset-id'] != '-1') {
            $elementsset_id = $_POST['elementsset-id'];
        }else {
            $elementsset_id = '';
        }

        // If any option choices (geochem analysis choices) were updated
        if (isset($_POST['geochem-analysis-meta-id'])) {
            $geochem_analysis_meta_id = $_POST['geochem-analysis-meta-id'];
        } else {
            $geochem_analysis_meta_id = '';
        }

        // Names of excess parameters
        $input_names = array('instrument_name', 'model', 'manufacturer', 'sample_type', 'wavelength', 'beam_diameter', 'min_conc', 'mass', 'volume', 'pressure', 'temperature');
        
        if ($this->form_validation->run()) {
            // There are too many 'Technique' fields for simple parameter passing so pass in as an assoc array
            $extras = array();
            foreach ($input_names as $input_name) {
                if (isset($_POST[$input_name])) {
                    $extras[$input_name] = $_POST[$input_name];
                }
            }

            // First, add new technique to database
            $id = $this->Techniques_model->saveNewTechnique($technique_name, $alternative_names, $short_description, $long_description, $keywords, $list_media_items, $output_media_items, $instrument_media_items, $contact_items, $case_studies_list, $references_items, $extras);
            $this->session->set_flashdata('success-warning-message', "Technique " . $id . " created");
            $this->load->view('Techniques/index');

            // Next, update metadata
            if ($metadata_ids != '') {
                foreach (explode(",", $metadata_ids) as $metadata_id) {
                    $this->Techniques_model->updateMetadata($id, $metadata_id); 
                }
            }

            // Next, update set of chemical elements associated with this technique
            if ($elementsset_id != '') {
                $this->Techniques_model->updateElementsSet($id, $elementsset_id); 
            }

            // Next, update options (geochem analysis choices)
            if ($geochem_analysis_meta_id != '') {
		$this->Techniques_model->updateOptionCombination($id, $geochem_analysis_meta_id);
            }

            // Next, update localisations
            if ($localisations_ids != '') {
		$this->Techniques_model->saveNewLocalisation($id, $localisations_ids);
            }

        } else {
            // Parameter error: redisplay parameters with an error message
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
            $data['localisations_list'] = $this->Techniques_model->getLocalisationList();
            $data['metadata_list'] = $this->Techniques_model->getMetadataList();

            // Assign excess parameters
            foreach ($input_names as $input_name) {
                $data[$input_name] = $_POST[$input_name];
            }

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

            if (isset($_POST['localisations_items_selected_hidden'])) {
                $data['localisations_items_selected_hidden'] = $_POST['localisations_items_selected_hidden'];
            }

            if (isset($_POST['metadata_ids_selected_hidden'])) {
                $data['metadata_ids_selected_hidden'] = $_POST['metadata_ids_selected_hidden'];
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



    /*
     * This sets up all the data for the edit view in the Admin page
     *
     * @param $x technique id
     */
    function edit($x)
    {
        // These are complete lists that the user can choose from when adding new things to techniques
        //
        $data['media_list'] = $this->Techniques_model->getTechniqueDataAll();
        $data['contact_list'] = $this->Techniques_model->getContactList();
        $data['case_list'] = $case_list = $this->Techniques_model->getCaseList();
        $data['references_list'] = $this->Techniques_model->getReferencesList();
        $data['metadata_list'] = $this->Techniques_model->getMetadataList();
        $data['elements_list'] = $this->Techniques_model->getElementsList();
        $data['option_choices_list'] = $this->Techniques_model->getOptionChoicesList(); 
        $data['localisations_list'] = $this->Techniques_model->getLocalisationList();

        // Get data for Technique
        // 
        $technique_data = $this->Techniques_model->getTechniqueData($x);
        $data['technique_name'] = $technique_data->name;
        $data['id'] = $technique_data->id;
        $data['short_description'] = $technique_data->summary;
        $data['long_description'] = $technique_data->description;
        $data['alternative_names'] = $technique_data->alternative_names;
        $data['keywords'] = $technique_data->keywords;

        $data['instrument_name'] = $technique_data->instrument_name;
        $data['model'] = $technique_data->model;
        $data['manufacturer'] = $technique_data->manufacturer;
        $data['sample_type'] = $technique_data->sample_type;
        $data['wavelength'] = $technique_data->wavelength;
        $data['beam_diameter'] = $technique_data->beam_diameter;
        $data['min_conc'] = $technique_data->min_conc;
        $data['mass'] = $technique_data->mass;
        $data['volume'] = $technique_data->volume;
        $data['pressure'] = $technique_data->pressure;
        $data['temperature'] = $technique_data->temperature;

        // These are the current media, contacts, references etc. for this technique
        //
        $media_items  = $this->Techniques_model->getMediaItems($x);
        $output_items = $this->Techniques_model->getOutputItems($x);
        $instrument_items = $this->Techniques_model->getInstrumentItems($x);
        $contact_items = $this->Techniques_model->getContactItems($x);
        $getCaseItems = $this->Techniques_model->getCaseItems($x);
        $referenceItems = $this->Techniques_model->getReferencesItems($x);
        $localisationItems = $this->Techniques_model->getLocalisationItems($x);
        $metadataItems = $this->Techniques_model->getMetadataItems($x);

        // Pass the current values for media, contacts, references etc. to the form via vars
        $data['selected_option_choices'] = $this->Techniques_model->getOptionChoices($x);
        $data['selected_elements'] = $this->Techniques_model->getElements($x);


        if (isset($media_items[0]['media_id']))
        {
            $media_items = $media_items[0]['media_id'];
        } else {
            $media_items='';
        }

        $data['media_items_selected_hidden'] = $media_items;
        $data['media_output_items_selected_hidden'] = $output_items;
        $data['media_instrument_items_selected_hidden'] = $instrument_items;
        $data['contact_items_selected_hidden'] = $contact_items;
        $data['case_items_selected_hidden'] = $getCaseItems;
        $data['references_items_selected_hidden'] = $referenceItems;
        $data['localisations_items_selected_hidden'] = $localisationItems;
        $data['metadata_items_selected_hidden'] = $metadataItems;
         

        $this->load->view('Techniques/edit', $data);
    }


    /*
     * This is called after a technique is edited.
     * This checks the technique edit parameters and initiates the database update
     *
     * @param $technique_id technique id
     */
    function validateEditTechnique($technique_id){
        $this->load->model('Techniques_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('technique_name', 'Name', 'required');
        $this->form_validation->set_rules('long_description', 'Long Description', 'required');
        $this->form_validation->set_rules('short_description', 'Short Description', 'required');
        $this->form_validation->set_rules('instrument_name', 'Instrument Name', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('manufacturer', 'Manufacturer', 'required');

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
            $output_media_items = "";
        }
        if (isset($_POST['media_instrument_items_selected_hidden'])) {
            $instrument_media_items = $_POST['media_instrument_items_selected_hidden'];
        }else {
            $instrument_media_items = "";
        }

        if (isset($_POST['contact_items_selected_hidden'])) {
            $contact_items = $_POST['contact_items_selected_hidden'];
        }else {
            $contact_items = Array();
        }
        if (isset($_POST['case_items_selected_hidden'])) {
            $case_studies_list = $_POST['case_items_selected_hidden'];
        }else {
            $case_studies_list = "";
        }

        if (isset($_POST['references_items_selected_hidden'])) {
            $references_items = $_POST['references_items_selected_hidden'];
        }else {
            $references_items = "";
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

        // Fetch metadata id values
        if (isset($_POST['metadata_items_selected_hidden'])) {
            $metadata_ids = $_POST['metadata_items_selected_hidden'];
        }else {
            $metadata_ids = '';
        }

        // If a new chemical elements set was selected
        if (isset($_POST['elementsset-id']) && $_POST['elementsset-id'] != '-1') {
            $elementsset_id = $_POST['elementsset-id'];
        }else {
            $elementsset_id = '';
        }

        // If any option choices (geochem analysis choices) were updated
        if (isset($_POST['option_choice1_hidden']) && isset($_POST['option_choice1_hidden'])) {
            $option_choice1_id = $_POST['option_choice1_hidden'];
            $option_choice2_id = $_POST['option_choice2_hidden'];
        } else {
            $option_choice1_id = '';
            $option_choice2_id = '';
        }

        // If any localisations were changed
        if (isset($_POST['localisations_items_selected_hidden'])) {
            $localisations_ids = $_POST['localisations_items_selected_hidden'];
        }else {
            $localisations_ids = "";
        }


        // Names of excess parameters
        $input_names = array('instrument_name', 'model', 'manufacturer', 'sample_type', 'wavelength', 'beam_diameter', 'min_conc', 'mass', 'volume', 'pressure', 'temperature');
        
        if ($this->form_validation->run()) {

            // There are too many 'Technique' fields for simple parameter passing so pass in as an assoc array
            $extras = array();
            foreach ($input_names as $input_name) {
                if (isset($_POST[$input_name])) {
                    $extras[$input_name] = $_POST[$input_name];
                }
            }

            // Update metadata
            if ($metadata_ids != '') {
                // Delete all metadata for a technique
                $this->Techniques_model->deleteMetadata($technique_id);
                foreach (explode(",", $metadata_ids) as $metadata_id) {
                    $metadata_list = $this->Techniques_model->getMetadataList();
                    foreach ($metadata_list as $m) {
                        if ($metadata_id == $m->id) {
                            $this->Techniques_model->updateMetadata($technique_id, $metadata_id);
                        }
                    }
                }
            }

            // Update set of chemical elements associated with this technique
            if ($elementsset_id != '') {
                $this->Techniques_model->updateElementsSet($technique_id, $elementsset_id); 
            }

            // Update options (geochem analysis choices)
            if ($option_choice1_id != '' && $option_choice2_id != '') {
		$this->Techniques_model->editOptionCombination($technique_id, $option_choice1_id, $option_choice2_id);
            }

            // Update localisations
            if ($localisations_ids != '') {
		$this->Techniques_model->updateLocalisations($technique_id, $localisations_ids);
            }

            // Update the database
            $id = $this->Techniques_model->updateTechnique($technique_id,$technique_name, $alternative_names, $short_description, $long_description, $keywords, $list_media_items, $output_media_items, $instrument_media_items, $contact_items, $case_studies_list, $references_items, $extras);
            $this->session->set_flashdata('success-warning-message', "Technique " . $id . " updated");
            $this->load->view('Techniques/index');
        } else {
            $this->load->library('CKEditor');
            $this->load->library('CKFinder');

            $data['technique_name'] = $_POST['technique_name'];
            $data['id'] = $technique_id;
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

            if (isset($_POST['localisations_items_selected_hidden'])) {
                $data['localisations_items_selected_hidden'] = $_POST['localisations_items_selected_hidden'];
            }

            $this->session->set_flashdata('error-warning-message', validation_errors());
            $this->session->keep_flashdata('error-warning-message', validation_errors());
            $this->load->view('Techniques/edit', $data);
        }

    }

    /**
     * Deletes a technique
     * @param $technique_id technique_id
     */
    function delete($technique_id){
        if ($this->Techniques_model->deleteTechnique($technique_id)) {
            $this->session->set_flashdata('success-warning-message',"Technique ". $technique_id ." deleted");
        } else {
            $this->session->set_flashdata('success-warning-message',"!! Technique ". $technique_id ." could not be deleted");
        } 
        redirect(base_url().'Techniques/index');
    }

    // AJAX CALLS

    function getAjaxContactList(){
        $contact_list= $this->Techniques_model->getContactList();
        return json_encode($contact_list);
    }

}
