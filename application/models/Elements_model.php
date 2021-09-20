<?php
/**
 * Interface with the "elements_set", "elements_elements_set" and "elements" tables in the db
 * These elements tables are used to assign a list of chemical elements that a technique can detect
 */
  
class Elements_model extends MY_Model
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

    /**
     * Returns an array of element set id, name and concatenated list of chemical symbols
     *
     * @return      array                      array of db results, keys are 'id', 'name' & 'symbols'
     */
    function getElementsList() {
        return $this->db->query('select es.id, es.name, group_concat(e.symbol) as symbols from elements_elements_set ees join elements e on ees.elements_id = e.id join elements_set es on es.id = ees.elements_set_id group by id,name')->result();
        // return $this->db->query('select es.id, es.name, group_concat(e.symbol) as symbols from elements_elements_set ees join elements e on ees.elements_id = e.id join elements_set es on es.id = ees.elements_set_id group by id,name')->result();
    }

    /**
     * Returns a list of element_set ids
     *
     * @return      array           array of distinct ordered ids from element_set table
     */
    function getElementsIds() {
        return $this->db->select('elements_set_id')->distinct()
                        ->order_by('elements_set_id', 'asc')
                        ->from('elements_view')
                        ->get()->result();
 
    }

    /**
     * Returns elements data
     * @param  string $x    element_set_id
     * @return array, members are 'name', 'symbols'
     */
    function getElementsData($x) {
        return $this->db->query('select es.id, es.name, group_concat(e.symbol) as symbols from elements_elements_set ees join elements e on ees.elements_id = e.id join elements_set es on es.id = ees.elements_set_id where es.id = ? group by name, id', $x)->result();
    }

    /**
     * Returns a list of element symbols, names and atomic numbers
     * @return array, members are 'element_id', 'symbol', 'name', 'atomic_number'
     */
    function getElementSymbols() {
        return $this->db->select('id as element_id, symbol, name, atomic_number')->from('elements')->get()->result();
    }

    /**
     * Saves a new set of elements
     * @param $name name of this new set of elements
     * @param $element_id_list  list of element ids
     * @returns new 'element_set' id
     */
    function saveNewElements($name, $element_id_list) {
        // Get next 'elements_set' id
        $next_id = $this->db->query('select max(id)+1 as id from elements_set')->result()[0]->id; 
        $this->db->insert('elements_set', array('id'=>$next_id, 'name'=>$name));
        // Insert new link table 'elements_elements_set' rows
        foreach($element_id_list as $elements_id) {
            $row = array('elements_id'=>$elements_id, 'elements_set_id'=>$next_id);
            $this->db->insert('elements_elements_set', $row);
        }
        return $next_id;
    }
   

    /**
     * Updates a set of elements with a new name or new elements
     * @param $x 'element_set' id
     * @param $name name of this new set of elements
     * @param $element_id_list  list of element ids
     * @returns 'element_set' id
     */
   function updateElements($x, $name, $element_id_list) {
        // Update name
        $this->db->set('name', $name)->where('id', $x)->update('elements_set');
        // Remove all old link table 'elements_elements_set' rows
        $this->db->delete('elements_elements_set', array('elements_set_id', $x));
        // Insert new link table 'elements_elements_set' rows
        foreach($element_id_list as $elements_id) {
            $this->db->insert('elements_elements_set', array('elements_id'=>$elements_id, 'elements_set_id'=>$x));
        }
        return $x;
   }
}
