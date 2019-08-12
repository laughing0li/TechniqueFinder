<?php
/**
 * TechniqueFinder - Login.php
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

class Login extends CI_Controller {

    public function index(){
        if ($this->session->userdata('logged_in') == 1){
            $this->load->view('tf/index');
        }
        else{
            $this->load->view('login/auth');
        }


    }

    public function validate_user(){
        $this->load->library('form_validation');

        $remember_me = null;

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password');


        extract($_POST);

        $param['remember_me'] = $remember_me;

        if ($this->form_validation->run()) {

            $input_username = trim($this->input->post('username'));
            $input_password = trim($this->input->post('password'));

            $this->load->model('User_model');
            extract($_POST);

            try {
                $user = $this->User_model->find_by_username($input_username);
                if ($user == null){
                    throw new Exception("[ $input_username ] wrong username/password.");
                }

                $user_password = $user->passwd;
                $input_password = md5($input_password);

                if($user_password != $input_password){
                    throw new Exception("[ $input_username ] wrong username/password.");
                }

                $user_role = $this->User_model->getUserRole($user->username);

                $user_session_data = array('username' => $user->username,
                    'id' => $user->id,
                    'isAdmin' => $user_role[0]['authority'],
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($user_session_data);
                redirect(base_url().'techniqueFinder/index');

            } catch (Exception $e) {
                $this->session->set_flashdata('error_message',$e->getMessage());
                redirect(base_url().'login/index');
            }

        }

        else{
            //ToDo: Add a valid error message here.
            #$this->form_validation->set_message('username', 'Hello world');
            $this->load->view('login/auth');
        }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url() . 'login/index');
    }


}