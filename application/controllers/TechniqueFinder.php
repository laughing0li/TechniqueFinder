<?php
/**
 * TechniqueFinder - TechniqueFinder.php
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

class TechniqueFinder extends CI_Controller {

    public function index(){
        if ($this->session->userdata('logged_in') == 1){
            $current_user = $this->session->userdata();
            $this->load->view('tf/index');
        }
        else{
            redirect(base_url().'login/index');
        }


    }

}