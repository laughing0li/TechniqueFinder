<?php
/**
 * TechniqueFinder - PhyOptionAssociation.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class PhyOptionAssociation extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (! ($this->session->userdata('logged_in')==True))
        {
            redirect(base_url().'login/index');
        }

    }


    function select(){
        $this->load->model('OptionChoice_model');
        $left_list = $this->OptionChoice_model->getAllOptionChoices('PHYSICS', 'LEFT');
        $right_list = $this->OptionChoice_model->getAllOptionChoices('PHYSICS', 'RIGHT');
        $this->load->view('PhyOptionAssociation/select', 
            array(
                'left_list'=>$left_list,
                'right_list'=>$right_list
        ));
    }

    function onSelect(){
        $this->load->model('OptionCombination_model');
        $left = $this->input->post('left');
        $right = $this->input->post('right');
        $technique_arr = $this->OptionCombination_model->getAllTechniquesByOptionCombination($left, $right);

        if(count($technique_arr)){
		    echo '<br style="">';
            foreach($technique_arr as $r) {
		        echo '<li id="id_'.$r->id.'" class="ui-state-default">'
               .'<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.$r->name
               .'<a href="#" style="float:right;" onclick="$(\'#id_'.$r->id.'\').remove()">'
               .'<img border="0" src="'.base_url().'assets/images/database_delete.png" alt="Remove" title="Remove">'
               .'</a> </li>';

            }
		    echo '<br style="" id="associatedTechniquesEnd">';
        }
        else{
		    echo '<br style="">';
		    echo '<div id="no_matching_message">No matching techniques found</div>';
		    echo '<br style="" id="associatedTechniquesEnd">';
        }
    }

    function onSave(){
        $this->load->model('OptionCombination_model');
        $left = $this->input->post('left');
        $right = $this->input->post('right');
        $right = $this->input->post('right');
        $techniqueIds = $this->input->post('techniqueIds');

        if($techniqueIds === [""]){//empty techniqueIds
            $techniqueIds = [];
        }
        $this->OptionCombination_model->saveOptionCombination($left, $right, $techniqueIds);
        echo 'Associated techniques have been updated.';
    }

    function getTechniqueCandidates(){
        $this->load->model('Techniques_model');

        $current_techniqueIds = $this->input->get('techniqueIds', TRUE);
        $all_techniqueIds = $this->Techniques_model->getAllTechniques();

        $flipped_current_techniqueIds = array_flip($current_techniqueIds);
        $candidates = array_filter($all_techniqueIds, function($r) use (&$flipped_current_techniqueIds){
            return !isset($flipped_current_techniqueIds[$r->id]);
        });

        if(count($candidates)){
            echo '<ul id="allTechniques" style="list-style-type: none;">';
            foreach($candidates as $e){
                echo '<li><input type="checkbox" name="technique_candidate" value="'.$e->id.'" style="margin-right:15px;"/>'.$e->name.'</label></li>';
            }
            echo '</ul>';
        }else{
            echo 'Nothing found.';
        }
    }

}