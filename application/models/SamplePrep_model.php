<?php
class SamplePrep_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function getSamplePrepList(){
        $result = $this->db->where('category_type','Sample Preparation')->order_by('name ASC, category ASC, manufacturer ASC, model ASC')->get('technique_view')->result();
        return $result;
    }
}
