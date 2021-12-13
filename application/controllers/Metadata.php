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

defined('BASEPATH') or exit('No direct script access allowed');

class Metadata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // auth0 config
        if ($this->session->userdata('auth0__user') == null){
            redirect(base_url() . 'login');
        }

        $this->load->model('Metadata_model');
    }

    function index()
    {
        $this->load->view('Metadata/index');
    }

    function getMetadataList()
    {
        $data = array();
        $results = $this->Metadata_model->getAllMetadata();
        foreach ($results  as $r) {
            array_push($data, array(
                'id' => $r->id,
                'category' => $r->category,
                'category_type' => $r->category_type,
                'analysis_type' => $r->analysis_type,
                'actions' => "<div style='min-width: 245px;'>"
                    . "<button class='user-table-buttons' onclick=window.location='" . base_url() . "Metadata/view/" . $r->id . "'>"
                    . "<span style='background: url(../assets/images/database_view.png) 50% no-repeat;margin-right:0.1em;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>"
                    . "<span style='margin-left: 2em;'>&nbsp;</span>"
                    . "<button class='user-table-buttons' onclick=window.location='" . base_url() . "Metadata/edit/" . $r->id . "'>"
                    . "<span style='background: url(../assets/images/database_edit.png) 50% no-repeat;margin-right:0.1em;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>"
                    . "<span style='margin-left: 2em;'>&nbsp;</span>"
                    . "<button class='user-table-buttons' onclick=\"if (confirm('Are you sure?')){ window.location='" . base_url() . "Metadata/delete/" . $r->id . "'}\">"
                    . "<span style='background: url(../assets/images/database_delete.png) 50% no-repeat; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button>" . "<span style='float: right; margin-top: 0.5em;' ></span>"
                    . "</div>",
            ));
        }
        echo json_encode(array('data' => $data));
    }

    function view($id)
    {
        $results = $this->Metadata_model->getMetadataById($id);
        $this->load->view('Metadata/view', array(
            'metadata' => $results
        ));
    }

    function edit($id)
    {
        $record = $this->Metadata_model->getMetadataById($id);
        $c_type = $this->Metadata_model->getCategoryType();
        $a_type = $this->Metadata_model->getAnalysisType();
        $this->load->view('Metadata/edit', array('metadata' => $record, 'c_type' => $c_type, 'a_type' => $a_type));
    }

    function update($id)
    {
        $this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[256]');
        $this->form_validation->set_rules('category_type', 'Category Type', 'trim|required|max_length[256]');
        $this->form_validation->set_rules('analysis_type', 'Analysis Type', 'trim|required|max_length[256]');

        if ($this->form_validation->run()) {

            $category = $this->input->post('category');
            $category_type = $this->input->post('category_type');
            $analysis_type = $this->input->post('analysis_type');

            $success = $this->Metadata_model->updateMetadata($id, $category, $category_type, $analysis_type);
            if ($success) {
                $this->session->set_flashdata('success-warning-message', "Metadata " . $category . " has been updated.");
                redirect(base_url() . 'Metadata/index');
            }
        } else {
            $this->session->set_flashdata('error-warning-message', validation_errors());
            redirect(base_url() . 'Metadata/edit/' . $id);
        }
    }

    function create_new()
    {
        $c_type = $this->Metadata_model->getCategoryType();
        $a_type = $this->Metadata_model->getAnalysisType();
        $this->load->view('Metadata/new', array('c_type' => $c_type, 'a_type' => $a_type));
    }

    function create()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[256]');
        $this->form_validation->set_rules('category_type', 'Category Type', 'trim|required|max_length[256]');
        $this->form_validation->set_rules('analysis_type', 'Analysis Type', 'trim|required|max_length[256]');

        if ($this->form_validation->run()) {
            $category = $this->input->post('category');
            $category_type = $this->input->post('category_type');
            $analysis_type = $this->input->post('analysis_type');

            if ($this->Metadata_model->create($category, $category_type, $analysis_type)) {
                $this->session->set_flashdata('success-warning-message', "Location " . $category . " has been created.");
                redirect(base_url() . 'Metadata/index');
            }
        } else {
            $this->session->set_flashdata('error-warning-message', validation_errors());
            redirect(base_url() . 'Metadata/create_new');
        }
    }

    function delete($id)
    {
        $this->Metadata_model->deleteById($id);
        $this->session->set_flashdata('success-warning-message', "Metadata " . $id . " has been deleted. ");
        redirect(base_url() . 'Metadata/index');
    }
}
