<?php
class Element_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // TODO: Use technique table instrument type, not elements_set name
    function getAllElementsByInstrumentType($instrumentType){
        return $this->db->select('elements.name, elements.symbol')
            ->from('elements_elements_set')->join('elements', 'elements_elements_set.elements_id = elements.id')
            ->join('elements_set', 'elements_elements_set.elements_set_id = elements_set.id')
            ->where('elements_set.name',$instrumentType)
            ->get()->result();
    }

}
