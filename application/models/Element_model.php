<?php
class Element_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns an array of element name and symbol, given an instrument type
     *
     * @param       string  $instrumentType    instrument type
     * @return      array                      array of db results, keys are 'name' & 'symbol'
     */
    function getAllElementsByInstrumentType($instrumentType){
        return $this->db->select('elements_view.name, elements_view.symbol')
            ->from('elements_view')->join('technique', 'technique.elements_set_id = elements_view.elements_set_id')
            ->where('technique.instrument_name',$instrumentType)
            ->get()->result();
    }

}
