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
      $query= $this->db->query('SELECT  ls.id, ls.yr_commissioned, ls.applications, lc.center_name, lc.institution, t.name as technique_name, t.instrument_name, t.manufacturer, t.model from localisation ls, location lc, technique t where ls.location_id=lc.id and ls.technique_id=t.id;');
      return $query->result();
    }

    public function getLocalisations(){
        $query= $this->db->query('SELECT id, yr_commissioned, applications from localisation;');
        return $query->result();
    }

    /**
     * Returns list of basic location information (center_name & institution)
     */
    public function getLocations(){
        $query= $this->db->query('SELECT id, center_name, institution from location;');
        return $query->result();
    }
        

    /**
     * Get list of techniques
     */
    public function getTechniqueList() {
        $result = $this->db->get('technique')->result();
        return $result;
    }

    /**
     * Get list of application names
     */
    public function getApplicationList() {
        $result = $this->db->get('applications')->result();
        return $result;
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
        $id = $this->db->insert_id();
        $this->db->query("UPDATE localisation set technique_id='".$technique_id."' where id=".$id);
        $this->db->query("UPDATE localisation set location_id='".$location_id."' where id=".$id);
        return $id;
    }

    /**
     * Gets row of localisation table given localisation id
     *
     * @param $localisation_id localisation id
     */
    function getLocalisationData($localisation_id){
        $query= $this->db->query('SELECT ls.id, t.id as technique_id, lc.id as location_id, ls.yr_commissioned, ls.applications, lc.center_name, lc.institution, t.name as technique_name, t.model, t.instrument_name, t.manufacturer from localisation ls, location lc, technique t where ls.location_id=lc.id and t.id=ls.technique_id and ls.id='.$localisation_id);
        return $query->result();
    }

    /**
     * Update row in localisation table
     *
     */
    function updateLocalisation($localisation_id, $yr_commissioned, $applications, $location_id, $technique_id){
        $this->db->query("UPDATE localisation set location_id='".$location_id."' where id=".$localisation_id);
        $this->db->query("UPDATE localisation set technique_id='".$technique_id."' where id=".$localisation_id);
        $this->db->query("UPDATE localisation set yr_commissioned='".$yr_commissioned."' where id=".$localisation_id);
        $data = $this->getLocalisationData($localisation_id);
        // need to find out whether this is a new application or an existing one
        $result = explode(',',$applications);
        if (json_decode($data[0]->applications) != ($result)) {
            $this->db->query("UPDATE localisation set applications='".$applications."' where id=".$localisation_id);
        }
        
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


    /**
     * Gets 
     */
    function getAssociatedTechnique($localisation_id) {
    }

}

