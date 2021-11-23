<?php
/**
 * TechniqueFinder - User_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class User_model extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->table='user';
    }

    public function userExists($username){
        $result = $this->db->where('id',$username)->get('user')->row();
    }

    public function update_reset_key($username,$reset_key){
        $result = $this->db->set('reset_password_key', $reset_key)->where('username', $username)->update('user');
    }

    public function get_reset_key($html_reset_key){
        if($result = $this->db->where('reset_password_key',$html_reset_key)->get($this->table)->row()){
            return $result->reset_password_key;
        }
        return '';
    }

    public function set_user_password($passwd,$reset_password_key){
        $update_password = $this->db->set('passwd',$passwd)->where('reset_password_key',$reset_password_key)->update('user');
        $update_reset_password_key = $this->db->set('reset_password_key',NULL)->where('reset_password_key',$reset_password_key)->update('user');

    }

    public function get_user_data($id){
        $result = $this->db->where('id',$id)->get('user')->result_array();
        return $result;
    }

    public function update_user($x, $full_name, $email){
        $this->db->set('full_name',$full_name)->where('id',$x)->update('user');
        $this->db->set('second_email', $email)->where('id',$x)->update('user');
    }

    public function update_password($x, $password){
        if($password){
            $this->db->set('passwd',$password)->where('id',$x)->update('user');
        }
    }

    public function getUserList(){
        $query= $this->db->query('SELECT u.full_name as full_name,u.username as username,u.id as id, IF(r.description LIKE \'Administrator\',\'Yes\',\'No\') as "user_role"   FROM user u,role r,role_people rp   WHERE u.id=rp.user_id and rp.role_id=r.id');
        return $query->result_array();

    }

    public function isSuperAdmin($x){
        $query= $this->db->query('SELECT IF(r.authority LIKE \'ROLE_SUPER\',\'No\',\'Yes\') as "super_admin" FROM user u,role r,role_people rp  WHERE u.id='. $x .' and u.id=rp.user_id and rp.role_id=r.id');
        return $query->result_array();
    }

    function getUserRole($username){
        $query = $this->db->query('SELECT authority FROM user u, role r,role_people rp WHERE u.username="'. $username .'" and u.id=rp.user_id and rp.role_id=r.id')->result_array();
        return $query;
    }

    function update_username_userRole($x, $full_name, $user_role){
        $this->db->set('full_name',$full_name)->where('id',$x)->update('user');
        $this->db->set('role_id', $user_role)->where('user_id',$x)->update('role_people');
    }

    function checkIfUserExists($username){
        $result = $this->db->where('username',$username)->get('user')->row();
        return $result;
    }

    function addNewUser($username, $full_name, $second_email, $role_id){
        $passwd = "21232f297a57a5a743894a0e4a801fc3";
        $data = array(
            'username' => $username,
            'full_name' => $full_name,
            'passwd' => $passwd,
            'second_email' => $second_email,
        );

        $this->db->insert('user', $data);

        sleep(1);

        $user_id = $this->db->where('username',$username)->get('user')->row();

        $admin= array(
            'role_id' => $role_id,
            'user_id' => $user_id->id,
        );

        $this->db->insert('role_people', $admin);

    }

    function delete_user($x){
        $this->db->delete('role_people',array('user_id'=>$x));
        $this->db->delete('user',array('id'=>$x));

    }



}