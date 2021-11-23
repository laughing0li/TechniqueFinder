<?php
class ExperimentalProc_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getTechniqueList() {
	    return $this->db->select('*')->from('technique_view')
                ->where('category_type', 'Experimental Instrument')->get()->result();
    }

}
