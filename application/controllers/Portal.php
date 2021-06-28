<?php
/**
 * TechniqueFinder - Portal.php
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
class Portal extends CI_Controller {
    const PAGE_LENGTH = 10;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Static_model');
    }


    public function index(){
        $staticData = array();
        $staticData['tf.home.quickGuide']= $this->Static_model->getStaticDataByName('tf.home.quickGuide')->text;
        $staticData['tf.home.searchExplanation']= $this->Static_model->getStaticDataByName('tf.home.searchExplanation')->text;
        $staticData['tf.home.allTechniquesExplanation']= $this->Static_model->getStaticDataByName('tf.home.allTechniquesExplanation')->text;
        $staticData['tf.home.infoboxContent']= $this->Static_model->getStaticDataByName('tf.home.infoboxContent')->text;
        $staticData['tf.home.optionsExplanation']= $this->Static_model->getStaticDataByName('tf.home.optionsExplanation')->text;

        $this->load->view('Portal/index', array(
            'staticData' => $staticData
        ));
    }

    public function techniqueSearch(){
        $q=$this->input->get('q');
        $this->load->model('Techniques_model');
        $this->load->model('Media_model');

        $searchResults= $this->Techniques_model->searchByKeywords($q);


        $this->load->library('pagination');

        $config['base_url'] = base_url().'Portal/techniqueSearch';
        $config['total_rows'] = count($searchResults);
        $config['num_links'] = 4;
        $config['per_page'] = self::PAGE_LENGTH;
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['next_link'] = 'next &gt;';
        $config['prev_link'] = 'previous &lt;';
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['query_string_segment'] = 'offset';
        $this->pagination->initialize($config);

        $offset=$this->input->get('offset');

        $this->load->view('Portal/technique_search', array(
            'searchedKeyword' => $q,
            'searchResults'=>array_slice($searchResults, $offset?$offset:0, self::PAGE_LENGTH),
            'Media_model'=>$this->Media_model
        ));
    }

    public function geochemOptionsSelection(){
        $staticData = array();
        $staticData['tf.geochemChoices.quickGuide'] = $this->Static_model->getStaticDataByName('tf.geochemChoices.quickGuide')->text;
        $staticData['tf.geochemChoices.comparison.title'] = $this->Static_model->getStaticDataByName('tf.geochemChoices.comparison.title')->text;
        $staticData['tf.geochemChoices.step1.title'] = $this->Static_model->getStaticDataByName('tf.geochemChoices.step1.title')->text;
        $staticData['tf.geochemChoices.step2.title'] = $this->Static_model->getStaticDataByName('tf.geochemChoices.step2.title')->text;
        $staticData['tf.geochemChoices.step3.title'] = $this->Static_model->getStaticDataByName('tf.geochemChoices.step3.title')->text;


        $this->load->model('OptionChoice_model');
        $step1_list = $this->OptionChoice_model->getAllOptionChoices('GEOCHEM', 'STEP1');
        $step2_list = $this->OptionChoice_model->getAllOptionChoices('GEOCHEM', 'STEP2');

        $this->load->view('Portal/geochem_options_selection', array(
            'staticData' => $staticData,
                'step1_list' => $step1_list,
                'step2_list' => $step2_list
        ));
    }

    public function expProcOptionsSelection(){
        $staticData = array();
        $staticData['tf.expProcChoices.quickGuide'] = $this->Static_model->getStaticDataByName('tf.expProcChoices.quickGuide')->text;;

        $this->load->model('ExperimentalProc_model');
        $technique_list = $this->ExperimentalProc_model->getTechniqueList();

        $this->load->view('Portal/experimental_proc', array(
            'staticData' => $staticData,
            'techniqueList' => $technique_list
        ));
    }

    public function samplePrepOptionsSelection(){
        die; /* TEMPORARY */
        $staticData = array();
        $staticData['tf.physicsChoices.quickGuide'] = $this->Static_model->getStaticDataByName('tf.physicsChoices.quickGuide')->text;
        $staticData['tf.physicsChoices.comparison.title'] = $this->Static_model->getStaticDataByName('tf.physicsChoices.comparison.title')->text;
        $staticData['tf.physicsChoices.left.title'] = $this->Static_model->getStaticDataByName('tf.physicsChoices.left.title')->text;
        $staticData['tf.physicsChoices.right.title'] = $this->Static_model->getStaticDataByName('tf.physicsChoices.right.title')->text;

        $this->load->model('OptionChoice_model');
        $left_list = $this->OptionChoice_model->getAllOptionChoices('PHYSICS', 'LEFT');
        $right_list = $this->OptionChoice_model->getAllOptionChoices('PHYSICS', 'RIGHT');

        $this->load->view('Portal/phys_options_selection', array(
            'staticData' => $staticData,
                'left_list'=>$left_list,
                'right_list'=>$right_list
        ));
    }

    public function getTechniqueChoices($id1, $id2){
        $this->load->model('OptionChoice_model');
	$chosen1 = $this->OptionChoice_model->getOptionChoiceById($id1);
	if ($id2 == "0") {
            // User has selected first step only
	    $tech_meta_arr = $this->OptionChoice_model->getTechniqueCatByCatTyp($chosen1->name);
	    if ($tech_meta_arr) {
	        $this->printTechniqueCards($tech_meta_arr);
	    }
	} else {
	    $chosen2 = $this->OptionChoice_model->getOptionChoiceById($id2);
	    $tech_meta_arr = $this->OptionChoice_model->getTechniqueCatByAnalysis($chosen1->name, $chosen2->name);
	    if ($tech_meta_arr) {
		$this->printTechniqueCards($tech_meta_arr);
	    }
        }
    }

    public function getTechniqueKeywords($step1OptionId, $step2OptionId) {
        $this->load->model('OptionCombination_model');
        $searchResults = $this->OptionCombination_model->getAllTechniquesByOptionCombination($step1OptionId, $step2OptionId);
        $this->load->model('Element_model');
        $elemResults = array();
        foreach($searchResults as $res_idx => $result) {
            $elements = $this->Element_model->getAllElementsByInstrumentType($result->name);
            foreach($elements as $e_idx => $e) {
                array_push($elemResults, $e->name);
                array_push($elemResults, $e->symbol);
            }
        }

        echo "[";
        $elemResultsUniq = array_values(array_unique($elemResults));
        $arr_e_len = count($elemResultsUniq);
        foreach($elemResultsUniq as $e_idx => $elem) {
            echo '{"label": "'.$elem.'", "value": "'.$elem.'"}';
            if ($e_idx < $arr_e_len  - 1) {
                echo ',';
            }
        }
        echo "]";
    }

    private function printTechniqueCards($tech_meta_arr) {
        /* Print out cards in two columns */
        $array_pairs = array_chunk($tech_meta_arr, 3);
        foreach ($array_pairs as $tech_meta_pair) {
             echo "<div class='row'>";
             foreach ($tech_meta_pair as $tech_meta) { 
                 echo "<div class='col-sm-4'>".
                      "<div class='card mb-3 tf-card'>".
                      "<div class='card-header text-white bg-primary'>$tech_meta->category</div>".
                      "<div class='card-body'>";
                 echo ($tech_meta->model!='')? "<b>Models:</b> $tech_meta->model":"";
                 echo ($tech_meta->beam_diameter!='')? "<br/><b>Beam Diam.:</b> $tech_meta->beam_diameter":"";
                 echo ($tech_meta->min_conc!='')? "<br/><b>Min. Conc.:</b> $tech_meta->min_conc":"";
                 echo "</div></div></div>";
             }
             echo "</div>";
        }
    }

    public function getTechniqueByOptionCombination(){
        $science = $this->input->get('science');
        $step1OptionId = $this->input->get('step1Option');
	$step3Text = $this->input->get('step3Text');
        $step2OptionId = $this->input->get('step2Option');
        $this->load->model('OptionChoice_model');
        $step1Option = $this->OptionChoice_model->getOptionChoiceById($step1OptionId);
        $step2Option = $this->OptionChoice_model->getOptionChoiceById($step2OptionId);

        $this->load->model('OptionCombination_model');
        $searchResults = $this->OptionCombination_model->getAllTechniquesByOptionCombination($step1OptionId, $step2OptionId);
	$newSearchResults = array();
	$this->load->model('Element_model');
	foreach($searchResults as $result) {
		$elements = $this->Element_model->getAllElementsByInstrumentType($result->name);
		foreach($elements as $e) {
			if ($e->name == $step3Text || $e->symbol == $step3Text) {
				array_push($newSearchResults, $result);
			}
		}

	}
        $this->load->library('pagination');

        $config['base_url'] = base_url().'Portal/techniqueSearch';
        $config['total_rows'] = count($newSearchResults);
        $config['num_links'] = 4;
        $config['per_page'] = self::PAGE_LENGTH;
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['next_link'] = 'next &gt;';
        $config['prev_link'] = 'previous &lt;';
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['query_string_segment'] = 'offset';
        $this->pagination->initialize($config);

        $offset=$this->input->get('offset');

        $this->load->model('Media_model');
        $this->load->view('Portal/technique_search_by_choices', array(
            'science' => $science,
            'leftOption' => $step1Option,
	    'centreText' => $step3Text,
            'rightOption' => $step2Option,
            'searchResults'=>array_slice($newSearchResults, $offset?$offset:0, self::PAGE_LENGTH),
            'Media_model'=>$this->Media_model
        ));

    }

    public function listTechniques(){
        $this->load->model('Techniques_model');
        $this->load->view(
            'Portal/technique_list',
            array(
                'allTechniques'=> $this->Techniques_model->getAllTechniques(),
            )
        );
    }

    public function viewTechnique($x){

        $science = '';
        $left = '';
        $right = '';
        if(isset($_POST['science'])){
            $science=$_POST['science'];
        }
        if(isset($_POST['left'])){
            $left=$_POST['left'];
        }
        if(isset($_POST['right'])){
            $right=$_POST['right'];
        }


        $this->load->model('Techniques_model');
        $this->load->view(
            'Portal/technique_view',
            array(
                'science'=>$science,
                'right' => $right,
                'left' => $left,
                'prevPage'=> $this->input->get('nav_from'),
                'theTechnique'=> $this->Techniques_model->getTechniqueData($x),
                'caseStudies'=> $this->Techniques_model->getCaseStudiesforTechnique($x),
                'theContacts' => $this->Techniques_model->getContactsForTechnique($x),
                'references' => $this->Techniques_model->getReferencesForTechnique($x),
                'outputExamples' => $this->Techniques_model->getMediasForTechniqueSection($x,'OUTPUT'),
                'instrumentExamples' =>$this->Techniques_model->getMediasForTechniqueSection($x,'INSTRUMENT'),
                'localisationItems' =>$this->Techniques_model->getLocalisationItems($x),
                'locationItems' =>$this->Techniques_model->getLocationItems($x)
            )
        );
    }


}
