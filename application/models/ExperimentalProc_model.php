<?php
class ExperimentalProc_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getTechniqueList() {
	    return $this->db->select('technique.*')->from('technique')
                ->join('technique_metadata', 'technique.technique_metadata_id = technique_metadata.id')
                ->where('technique_metadata.category_type', 'Experimental Instrument')->get()->result();
    }

}
