<?php
/**
 * TechniqueFinder - MY_Model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class MY_Model extends CI_Model{

    public $table;

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function find_by_id($id){
        $result = $this->db->where('id',$id)->get($this->table)->row();
        return $result;
    }

    public function find_by_username($username){
        $result = $this->db->where('username',$username)->get($this->table)->row();
        return $result;
    }


}