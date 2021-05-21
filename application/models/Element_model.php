<?php
class Element_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getAllElementsByInstrumentType($instrumentType){
        return $this->db->select('elements.name, elements.symbol')
            ->from('element_instrument_type')->join('elements', 'element_instrument_type.element_id = elements.id')
            ->join('instrument_type', 'element_instrument_type.instrument_type_id = instrument_type.id')
            ->where('instrument_type.name',$instrumentType)
            ->get()->result();
    }

}
