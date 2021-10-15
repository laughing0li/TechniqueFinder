<?php

class Localisation_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get list of localisation data
     */
    public function getLocalisationList(){
      $query= $this->db->query('SELECT  ls.id, ls.yr_commissioned, ls.applications, lc.center_name from localisation ls, location lc where ls.location_id=lc.id;');

      return $query->result();
    }

    public function getLocalisations(){
        $query= $this->db->query('SELECT id, yr_commissioned, applications from localisation;');
        return $query->result();
    }

    /**
     * Save a new localisation to database
     *
     * @return new localisation id
     */
    public function saveNewLocalisation($yr_commissioned, $applications, $technique_id, $location_id){

        $localisationData = array(
            'yr_commissioned' => $yr_commissioned,
            'applications' => $applications,
        );
        $this->db->insert('localisation', $localisationData);
        $this->db->query("UPDATE localisation set technique_id=b'".$technique_id."' where id=".$this->db->insert_id());
        $this->db->query("UPDATE localisation set location_id=b'".$location_id."' where id=".$this->db->insert_id());
        return $this->db->insert_id();
    }

    /**
     * Gets row of localisation table given localisation id
     *
     * @param $localisation_id localisation id
     */
    function getLocalisationData($localisation_id){
        $query= $this->db->query('SELECT ls.id, ls.yr_commissioned, ls.applications, lc.center_name from localisation ls, location lc where ls.location_id=lc.id and ls.id='.$localisation_id);
        return $query->result();
    }

    /**
     * Update row in localisation table
     *
     */
    function updateLocalisation($yr_commissioned, $application, $technique_id, $location_id){
        $this->db->set('yr_commissioned', $yr_commissioned);
        $this->db->set('applications', $applications);
        $this->db->where('technique_id', $technique_id)->update('localisation');
        $this->db->query("UPDATE localisation set location_id = b'".$location_id."' where technique_id=".$technique_id);
    }

    /**
     * Removes a row of localisation table
     *
     * @param $localisation_id localisation id
     */
    function deleteLocalisation($localisation_id){
        $this->db->delete('localisation',array('id'=>$localisation_id));
    }

    /*
     * Get a row of technique table given its id
     *
     * @param $x technique id
     *
     * @return row of technique table
     */
    function getTechniqueName($x){
        $result = $this->db->where('id',$x)->get('technique')->row();
        return $result;
    }

    /**
     * Get a list of ids for all localisation table rows
     *
     * @return list of localisation ids
     */
    function getLocalisationIds(){
        $ids = array();
        $result = $this->db->query('SELECT id from localisation;');
         foreach ($result->result() as $id){
             array_push($ids,$id->id);
         }
         return $ids;
    }

}

