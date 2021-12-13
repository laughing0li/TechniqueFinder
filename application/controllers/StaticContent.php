<?php
/**
 * TechniqueFinder - StaticContent.php
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

class StaticContent extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // auth0 config
        if ($this->session->userdata('auth0__user') == null){
            redirect(base_url() . 'login');
        }

        $this->load->model('Static_model');

    }

    function index(){
        $this->load->view('static/index');
    }

    function getStaticContentList(){
        $data = array();
        $results = $this->Static_model->getAllStaticData();

        foreach ($results  as $r) {
            array_push($data, array(
                $r['name1'],
                $r['text'],
                "<div style='min-width: 245px;'><button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."StaticContent/view/".$r['id']."'><span style='background: url(../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>". "<span style='margin-left: 2em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."StaticContent/edit/".$r['id']."'><span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button></div>",

            ));
        }

        echo json_encode(array('data' => $data));

    }

    function view($x){
        $query = $this->Static_model->getStaticData($x);
        $static_data = array('id'=>$query->id, 'name'=>$query->name,'text'=>$query->text);

        $static_data['static_data']=$static_data;
        $this->load->view('static/view',$static_data);
    }

    function edit($x){
        $query = $this->Static_model->getStaticData($x);
        $static_data = array('id'=>$query->id, 'name'=>$query->name,'text'=>$query->text);


        $this->load->library('CKEditor');
        $this->load->library('CKFinder');

        $static_data['static_data']=$static_data;
        $this->load->view('static/edit',$static_data);
    }

    function update($x){

        $data = html_entity_decode($_POST['static_text']);
        $this->Static_model->updateData($x,$data);

        $this->session->set_flashdata('success-warning-message',"StaticContent ". $x ." updated");
        redirect(base_url().'staticContent/view/'.$x);


    }


}