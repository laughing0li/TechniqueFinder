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
        $staticData['tf.home.quickGuide']= $this->Static_model->getSaticDataByName('tf.home.quickGuide')->text;
        $staticData['tf.home.searchExplanation']= $this->Static_model->getSaticDataByName('tf.home.searchExplanation')->text;
        $staticData['tf.home.allTechniquesExplanation']= $this->Static_model->getSaticDataByName('tf.home.allTechniquesExplanation')->text;
        $staticData['tf.home.infoboxContent']= $this->Static_model->getSaticDataByName('tf.home.infoboxContent')->text;
        $staticData['tf.home.optionsExplanation']= $this->Static_model->getSaticDataByName('tf.home.optionsExplanation')->text;

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
        $staticData['tf.geochemChoices.quickGuide'] = $this->Static_model->getSaticDataByName('tf.geochemChoices.quickGuide')->text;
        $staticData['tf.geochemChoices.comparison.title'] = $this->Static_model->getSaticDataByName('tf.geochemChoices.comparison.title')->text;
        $staticData['tf.geochemChoices.left.title'] = $this->Static_model->getSaticDataByName('tf.geochemChoices.left.title')->text;
        $staticData['tf.geochemChoices.right.title'] = $this->Static_model->getSaticDataByName('tf.geochemChoices.right.title')->text;


        $this->load->model('OptionChoice_model');
        $left_list = $this->OptionChoice_model->getAllOptionChoices('BIOLOGY', 'LEFT');
        $right_list = $this->OptionChoice_model->getAllOptionChoices('BIOLOGY', 'RIGHT');

        $this->load->view('Portal/bio_options_selection', array(
            'staticData' => $staticData,
                'left_list'=>$left_list,
                'right_list'=>$right_list
        ));
    }

    public function expProcOptionsSelection(){
        $staticData = array();
        $staticData['tf.physicsChoices.quickGuide'] = $this->Static_model->getSaticDataByName('tf.physicsChoices.quickGuide')->text;;
        $staticData['tf.physicsChoices.comparison.title'] = $this->Static_model->getSaticDataByName('tf.physicsChoices.comparison.title')->text;;
        $staticData['tf.physicsChoices.left.title'] = $this->Static_model->getSaticDataByName('tf.physicsChoices.left.title')->text;
        $staticData['tf.physicsChoices.right.title'] = $this->Static_model->getSaticDataByName('tf.physicsChoices.right.title')->text;

        $this->load->model('OptionChoice_model');
        $left_list = $this->OptionChoice_model->getAllOptionChoices('PHYSICS', 'LEFT');
        $right_list = $this->OptionChoice_model->getAllOptionChoices('PHYSICS', 'RIGHT');

        $this->load->view('Portal/phys_options_selection', array(
            'staticData' => $staticData,
                'left_list'=>$left_list,
                'right_list'=>$right_list
        ));
    }

    public function samplePrepOptionsSelection(){
        $staticData = array();
        $staticData['tf.physicsChoices.quickGuide'] = $this->Static_model->getSaticDataByName('tf.physicsChoices.quickGuide')->text;;
        $staticData['tf.physicsChoices.comparison.title'] = $this->Static_model->getSaticDataByName('tf.physicsChoices.comparison.title')->text;;
        $staticData['tf.physicsChoices.left.title'] = $this->Static_model->getSaticDataByName('tf.physicsChoices.left.title')->text;
        $staticData['tf.physicsChoices.right.title'] = $this->Static_model->getSaticDataByName('tf.physicsChoices.right.title')->text;

        $this->load->model('OptionChoice_model');
        $left_list = $this->OptionChoice_model->getAllOptionChoices('PHYSICS', 'LEFT');
        $right_list = $this->OptionChoice_model->getAllOptionChoices('PHYSICS', 'RIGHT');

        $this->load->view('Portal/phys_options_selection', array(
            'staticData' => $staticData,
                'left_list'=>$left_list,
                'right_list'=>$right_list
        ));
    }



    public function getTechniqueByOptionCombination(){
        $science = $this->input->get('science');
        $left = $this->input->get('leftOption');
        $right = $this->input->get('rightOption');
        $this->load->model('OptionChoice_model');
        $leftOption = $this->OptionChoice_model->getOptionChoiceById($left);
        $rightOption = $this->OptionChoice_model->getOptionChoiceById($right);

        $this->load->model('OptionCombination_model');
        $searchResults = $this->OptionCombination_model->getAllTechniquesByOptionCombination($left, $right);

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

        $this->load->model('Media_model');
        $this->load->view('Portal/technique_search_by_choices', array(
            'science' => $science,
            'leftOption' => $leftOption,
            'rightOption' => $rightOption,
            'searchResults'=>array_slice($searchResults, $offset?$offset:0, self::PAGE_LENGTH),
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
            )
        );
    }


}
