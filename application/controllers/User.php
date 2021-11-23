<?php
/**
 * TechniqueFinder - User.php
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

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
            if (! ($this->session->userdata('logged_in')==True))
            {
                redirect(base_url().'login/index');
            }

        $this->load->model('User_model');
    }

    public function index(){
        $this->load->view('user/index');
    }

    public function user_list(){
        $this->load->model('User_model');
        $results=$this->User_model->getUserList();

        $data = array();

        foreach ($results  as $r) {

            //Do not display delete option for Super User
            if($r['username']=='admin@ammrf.org.au'){
                array_push($data, array(
                    $r['full_name'],
                    $r['username'],
                    $r['user_role'],
                    "<div style='min-width: 245px;'><button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."user/view/".$r['id']."'><span style='background: url(../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>". "<span style='margin-left: 5em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."user/editUser/".$r['id']."'><span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button></div>"
                ));
            }
            else {
                array_push($data, array(
                    $r['full_name'],
                    $r['username'],
                    $r['user_role'],
                    "<div style='min-width: 245px;'>". "<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."user/view/".$r['id']."'><span style='background: url(../assets/images/database_view.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>". "<span style='margin-left: 5em;'>&nbsp;</span>"."<button id='userIndexButtons' class='user-table-buttons' onclick=window.location='".base_url()."user/editUser/".$r['id']."'><span style='background: url(../assets/images/database_edit.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>". "<span style='margin-left: 5em;'>&nbsp;</span>" ."<button class='user-table-buttons' onclick=deleteUser(". $r['id']. ")><span style='background: url(../assets/images/database_delete.png) 50% no-repeat;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>" . 'Delete'."</button></div>"
                ));
            }

        }

        echo json_encode(array('data' => $data));
    }
    public function show($x){
        $current_user = $this->session->userdata();
        if($x == $current_user['id']){
            $user_data = $this->User_model->get_user_data($x);
            $user_data['user_data']=$user_data;
            $this->load->view('user/show', $user_data);
        }
        else{
            $this->load->view('tf/index');
        }
    }

    public function manage_my_account(){
        $current_user = $this->session->userdata();
        redirect(base_url().'user/edit_my_account/'.$current_user['id']);

    }

    public function edit($x){
        $current_user = $this->session->userdata();
        if($x == $current_user['id']) {
            $user_data = $this->User_model->get_user_data($x);
            $user_data['user_data'] = $user_data;
            $this->load->view('user/edit', $user_data);
        }
    }

    public function validate_edit($x){

        $this->load->model('User_model');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|min_length[6]|matches[password]');
        $this->form_validation->set_rules('second_email', 'Additional Email Address', 'trim|valid_email');
        $this->form_validation->set_rules('confirm_second_email', 'Confirm Additional Email Address', 'trim|valid_email|matches[second_email]');


        if ($this->form_validation->run()) {
            $this->session->set_flashdata('success-warning-message',"User ". $this->session->userdata('username') ." updated");

            $full_name=$_POST['full_name'];
            $email=$_POST['second_email'];
            $password=$_POST['password'];

            if($password){
                $password=md5($_POST['password']);
                $this->User_model->update_password($x, $password);
            }

            if(!$email){
                $email='';
            }

            $this->User_model->update_user($x, $full_name, $email);
            redirect(base_url().'user/show/'.$x);
        }


        $user_data = $this->User_model->get_user_data($x);
        $user_data['user_data'] = $user_data;

        $this->session->set_flashdata('error-warning-message',validation_errors());
        $this->load->view('user/edit', $user_data);

    }

    public function view($x){

        if (!is_numeric($x)){
            $this->session->set_flashdata('success-warning-message', 'User not found with id ' . $x);
            redirect(base_url().'user/index');
        }

        $this->load->model('User_model');

        if($user_data = $this->User_model->get_user_data($x) ){
            array_push($user_data, $this->User_model->isSuperAdmin($x));

            $user_data['user_data'] = $user_data;
            $this->load->view('user/view',$user_data);

        }
        else{
            $this->session->set_flashdata('success-warning-message', 'User not found with id ' . $x);
            redirect(base_url().'user/index');
        }
    }

    public function create(){
        $this->load->view('user/create');
    }

    public function editUser($x){
        $this->load->model('User_model');
        $user_data = $this->User_model->get_user_data($x);

        array_push($user_data, $this->User_model->isSuperAdmin($x));

        $user_data['user_data'] = $user_data;
        $this->load->view('user/editUser', $user_data);

    }


    public function update_editUser($x){

        $super_administrator = false;

        $this->load->model('User_model');

        $this->load->library('form_validation');

        if(isset($_POST['super_administrator'])){
            $user_role =2;
        }
        else{
            $user_role =1;
        }

        $full_name=$_POST['full_name'];

        $this->User_model->update_username_userRole($x, $full_name, $user_role);
        $this->session->set_flashdata('success-warning-message',"User ". $this->User_model->get_user_data($x)[0]['username'] ." updated");
        redirect(base_url().'user/view/'.$x);

    }


    public function delete($x){
        $username = $this->User_model->get_user_data($x)[0]['username'];
        $this->User_model->delete_user($x);

        $this->session->set_flashdata('success-warning-message',"User ". $username ." deleted");
        redirect(base_url().'user/index');
    }

    function new_user(){
        $this->load->view('user/new');

    }

    function validate_username($str){

        $this->load->model('User_model');
        $result = $this->User_model->checkIfUserExists($str);

        if(isset($result)) {
            $this->form_validation->set_message('validate_username', 'Username '. $str .' must be unique');
            return False;
        }
        else{
            return True;
        }

    }

    function validate_new(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|valid_email|required|min_length[6]|valid_email|callback_validate_username');
        $this->form_validation->set_rules('second_email', 'Additional Email Address', 'trim|valid_email');
        $this->form_validation->set_rules('confirm_second_email', 'Confirm Additional Email Address', 'trim|valid_email|matches[second_email]');

        if(isset($_POST['super_administrator'])){
            $role_id = 2;
        }
        else{
            $role_id = 1;
        }

        if ($this->form_validation->run()) {
          $username=$_POST['username'];
          $full_name=$_POST['full_name'];
          $second_email = $_POST['second_email'];
          $this->User_model->addNewUser($username, $full_name, $second_email, $role_id);
            $this->session->set_flashdata('success-warning-message',"A new account <strong>".  $username. "</strong>has been created with password <strong>admin</strong>.</br>
            Please ask the new account holder to login using these account details and to change the password as soon as possible by going to Manage my account, then Edit and providing a new password there.");
            $id = $this->User_model->checkIfUserExists($username);
            redirect(base_url().'user/view/'.$id->id);
        }
        else {
            $this->session->set_flashdata('error-warning-message',validation_errors());
            $this->load->view('user/new',$_POST);
        }



    }

}