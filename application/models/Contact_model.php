<?php
/**
 * TechniqueFinder - Contact_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class Contact_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getContactList(){
      //$query= $this->db->query('SELECT  c.name as name, l.institution as institution, IF(c.technique_contact LIKE \'1\',\'Yes\',\'No\')  as technique_contact,c.id as id  from contact c, location l where c.location_id=l.id;');
      $query= $this->db->query('SELECT  c.name as name, l.institution as institution, IF(c.technique_contact+0 LIKE \'1\',\'Yes\',\'No\')  as technique_contact,c.id as id  from contact c, location l where c.location_id=l.id;');

      return $query->result();
    }

    public function getLocations(){
        $query= $this->db->query('SELECT id, institution from location;');
        return $query->result();
    }

    public function saveNewContact($name, $telephone, $email, $position, $location, $technique_contact, $title){

        $query= $this->db->query("select id from location where institution='".trim($location)."';");
        $id = $query->result_array();

        $contactData = array(
            'name' => $name,
            'telephone' => $telephone,
            'email' => $email,
            'title' => $title,
            'location_id' => $id[0]['id'],
            'contact_position' => $position,
            'technique_contact' => $technique_contact,

        );
        $this->db->insert('contact', $contactData);
        $this->db->query("UPDATE contact set technique_contact=b'".$technique_contact."' where id=".$this->db->insert_id());
        return $this->db->insert_id();
    }

    function getContactDataWithBit($x){
        $query= $this->db->query('SELECT c.id, c.title, c.name ,c.contact_position, c.telephone, c.email , l.id as lid, l.institution, c.technique_contact+0 as technique_contact from contact c, location l where c.location_id=l.id and c.id='.$x);
        return $query->result();

    }
    function getContactData($x){
        $query= $this->db->query('SELECT c.id, c.title, c.name ,c.contact_position, c.telephone, c.email , l.id as lid, l.institution,IF (technique_contact+0 LIKE \'1\',\'Yes\',\'No\')  as technique_contact from contact c, location l where c.location_id=l.id and c.id='.$x);
        return $query->result();

    }

    function updateContact($x,$name, $telephone, $email, $position, $location, $technique_contact,$title){
        $query= $this->db->query("select id from location where institution='".trim($location)."';");
        $id = $query->result_array();

        $this->db->set('name', $name)->where('id', $x)->update('contact');
        $this->db->set('telephone', $telephone)->where('id', $x)->update('contact');
        $this->db->set('email', $email)->where('id', $x)->update('contact');
        $this->db->set('contact_position', $position)->where('id', $x)->update('contact');
        $this->db->set('location_id', $id[0]['id'])->where('id', $x)->update('contact');
        $this->db->query("UPDATE contact set technique_contact=b'".$technique_contact."' where id=".$x);
        $this->db->set('title', $title)->where('id', $x)->update('contact');
    }

    function deleteContact($x){
        $this->db->delete('technique_contact',array('contact_id'=>$x));
        $this->db->delete('contact',array('id'=>$x));
    }
    function getAssociatedTechniques($x){
        $result = $this->db->where('contact_id',$x)->get('technique_contact')->result_array();
        return $result;
    }

    function getTechniqueName($x){
        $result = $this->db->where('id',$x)->get('technique')->row();
        return $result;
    }

    function getContactIds(){
        $ids = array();
        $result = $this->db->query('SELECT id from contact;');
         foreach ($result->result() as $id){
             array_push($ids,$id->id);
         }
         return $ids;
    }


    function getLocationById($id){
        return $this->db->from('contact')->where('id', $id)->get()->row();
    }

    function getLocationByPriority($priority){
        return $this->db->from('contact')->where('id', $priority)->get()->row();
    }




}

