<?php
class SamplePrep_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function getSamplePrepList(){
        // return array
        $result = $this->db->where('category_type','Sample Preparation')->order_by('name ASC, category ASC, manufacturer ASC, model ASC')->get('technique_view')->result();
        $data = array();
        foreach($result as $row => $technique_view){
            $technique_id = $technique_view->technique_id;
            $query = $this->db->query("SELECT lc.center_name, lc.institution, c.email, c.telephone from location lc, localisation ls, contact c where lc.id = ls.location_id and ls.technique_id = ".$technique_id." and c.location_id = lc.id;");
            $ret_list = $query->result_array();
            array_push($data, array($technique_view, $ret_list));
        }
        return $data;
    }
}
