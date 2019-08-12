<?php
/**
 * TechniqueFinder - Reset.php
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

class Reset extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function resetPassword(){
        $this->load->view('reset/resetPassword');
    }

    public function password(){
        $this->load->model('User_model');
        $message = "An email to reset password will be sent to the entered email address if it exists.";

        $input_username = $this->input->post('username');

        $this->form_validation->set_rules('username', 'Email', 'required|trim|valid_email');
        extract($_POST);

        if ($this->form_validation->run()) {
            $this->load->model('User_model');
            try {
                $user = $this->User_model->find_by_username($input_username);
                if ($user == null) {
                    throw new Exception("$message");
                }

                $reset_key = md5(uniqid());

                //Store the unique key in the database and email client.

                $update_result = $this->User_model->update_reset_key($input_username, $reset_key);
                
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.tpg.com.au',
                    'smtp_port' => '25',
                    'smtp_user' =>'admin@ammrf.org.au',

//                    'smtp_host' => $this->config->item('mail_server_host'),
//                    'smtp_port' => $this->config->item('mail_server_port'),
//                    'smtp_user' => $this->config->item('mail_from_address'),
//                    'smtp_pass' => '',
                    'mailtype' => 'html',
                    'starttls' => true,
                    'newline' => "\r\n",
                    'admin_email' =>$this->config->item('admin_email')
                );
                log_message('info', 'Email Config loaded');


                $email_message = "Click on this link to reset your password \n " . base_url() . "reset/updatePassword/" . $reset_key;
                $this->load->library('email',$config);
                $this->email->from('admin@ammrf.org.au', 'Reset Password')->to($input_username)->subject('Reset Technique Finder Password')->message($email_message)->send();


                $reset_message['success_message'] = $message;
                $this->load->view('login/auth', $reset_message);

            } catch (Exception $e) {
                log_message('info', 'something went wrong');
                log_message('error', $e);
                $reset_message['message'] = $e->getMessage();
                $this->load->view('login/auth', $reset_message);
            }
        } else {
            $this->load->view('reset/resetPassword');
        }

    }

    public function updatePassword()
    {
        $reset_key = $this->uri->segment(3);
        if (!$reset_key) {
            redirect(base_url() . 'login/index');
        }
        $this->load->view('reset/updatePassword');
    }

    function validatePassword()
    {

        $this->load->model('User_model');

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|min_length[6]|matches[password]');

        $html_reset_key = $this->input->post('html_reset_key');
        $db_reset_key = $this->User_model->get_reset_key($html_reset_key);


        if ($this->form_validation->run()) {

            $db_reset_key = $this->User_model->get_reset_key($html_reset_key);

            if ($db_reset_key == '') {
                $this->session->set_flashdata('error_message', "Passwords cannot be updated without unique token.");
                redirect(base_url() . 'login/index');
            }

            $passwd = md5($this->input->post('confirm_password'));
            $this->User_model->set_user_password($passwd, $db_reset_key);
            $this->session->set_flashdata('success-message', "Password has been updated.");
            redirect(base_url() . 'login/index');


        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect(base_url() . 'reset/updatePassword/' . $html_reset_key);
        }

    }
}