<?php
/**
 * TechniqueFinder - Techniques_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class Techniques_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getAllTechniques(){
        $result = $this->db->order_by('instrument_name','ASC')->get('technique')->result();
        return $result;
    }

    function getTechniqueData($x){
        $result = $this->db->where('id',$x)->get('technique')->row();
        return $result;
    }

    function getMediaList(){
        $result = $this->db->get('media')->result();
        return $result;
    }

    function getContactList(){
        $query= $this->db->query('select c.id, c.name, l.institution from contact c, location l where c.location_id = l.id AND c.technique_contact+0=1 ORDER BY l.institution,c.name;');
        return $query->result_array();
    }

    function getTechniqueNameList(){
        $result = $this->db->get('technique')->result();
        return $result;
    }

    function getCaseList(){
        $result = $this->db->get('case_study')->result();
        return $result;
    }

    function getReferencesList(){
        $result = $this->db->get('review')->result();
        return $result;
    }

    function save_new_technique($technique_name,$alternative_names,$short_description,$long_description,$keywords,$list_media_items,$output_media_items,$instrument_media_items,$contact_items,$case_studies_list, $references_items )
    {

        $technique_data = array(
            'name' => $technique_name,
            'alternative_names' => $alternative_names,
            'summary' => $short_description,
            'description' => $long_description,
            'keywords' => $keywords,
        );


        $this->db->insert('technique', $technique_data);
        $technique_id = $this->db->insert_id();
        if (strlen($output_media_items) > 0) {
            $output_list = explode(',',$output_media_items);

            $get_media_items = array('technique_id'=>$technique_id, 'section'=> 'OUTPUT');
            $existing_media_ids = $this->db->select('media_id')->from('media_in_section')->where($get_media_items)->get();

            foreach($output_list as $ol){
                $where_array = array(
                    'technique_id' => $technique_id,
                    'media_id'=> $ol,
                    'section' => 'OUTPUT',
                );
                $this->db->select('*');
                $this->db->from('media_in_section');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_id' => $technique_id,
                    'media_id' => $ol,
                    'section' => 'OUTPUT',
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_id', $technique_id)->insert('media_in_section', $list_array);
                }
            }


            foreach ($existing_media_ids->result_array() as $emi){
                $delete_array = array('technique_id'=>$technique_id, 'media_id'=>$emi['media_id'],'section'=>'OUTPUT');
                if(!(in_array($emi['media_id'], $output_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('media_in_section');

                }

            }
        }

        if (strlen($instrument_media_items) > 0) {
            $instrument_list = explode(',',$instrument_media_items);

            $get_media_items = array('technique_id'=>$technique_id, 'section'=> 'INSTRUMENT');
            $existing_media_ids = $this->db->select('media_id')->from('media_in_section')->where($get_media_items)->get();

            foreach($instrument_list as $ol){
                $where_array = array(
                    'technique_id' => $technique_id,
                    'media_id'=> $ol,
                    'section' => 'INSTRUMENT',
                );
                $this->db->select('*');
                $this->db->from('media_in_section');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_id' => $technique_id,
                    'media_id' => $ol,
                    'section' => 'INSTRUMENT',
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_id', $technique_id)->insert('media_in_section', $list_array);
                }
            }


            foreach ($existing_media_ids->result_array() as $emi){
                $delete_array = array('technique_id'=>$technique_id, 'media_id'=>$emi['media_id'],'section'=>'INSTRUMENT');
                if(!(in_array($emi['media_id'], $instrument_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('media_in_section');

                }
            }
        }

        if (strlen($contact_items) > 0) {

            $contact_list = explode(',',$contact_items);
            $existing_contact_ids = $this->db->select('contact_id')->from('technique_contact')->where('technique_contacts_id',$technique_id)->get();

            foreach($contact_list as $cl){
                $where_array = array(
                    'technique_contacts_id' => $technique_id,
                    'contact_id'=> $cl,
                );
                $this->db->select('*');
                $this->db->from('technique_contact');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_contacts_id' => $technique_id,
                    'contact_id' => $cl,
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_contacts_id', $technique_id)->insert('technique_contact', $list_array);
                }
            }


            foreach ($existing_contact_ids->result_array() as $eci){

                $delete_array = array('technique_contacts_id'=>$technique_id, 'contact_id'=>$eci['contact_id']);
                if(!(in_array($eci['contact_id'], $contact_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('technique_contact');
                }
            }
        }

        if (strlen($case_studies_list) > 0) {
            $case_list = explode(',',$case_studies_list);


            $existing_case_ids = $this->db->select('case_study_id')->from('technique_case_study')->where('technique_case_studies_id',$technique_id)->get();

            foreach($case_list as $cl){
                $where_array = array(
                    'technique_case_studies_id' => $technique_id,
                    'case_study_id'=> $cl,
                );
                $this->db->select('*');
                $this->db->from('technique_case_study');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_case_studies_id' => $technique_id,
                    'case_study_id' => $cl,
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_case_studies_id', $technique_id)->insert('technique_case_study', $list_array);
                }
            }


            foreach ($existing_case_ids->result_array() as $ecai){

                $delete_array = array('technique_case_studies_id'=>$technique_id, 'case_study_id'=>$ecai['case_study_id']);
                if(!(in_array($ecai['case_study_id'], $case_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('technique_case_study');
                }
            }
        }

        if (strlen($references_items) > 0) {
            $references_list = explode(',',$references_items);
            $existing_references_ids = $this->db->select('review_id')->from('technique_review')->where('technique_reviews_id',$technique_id)->get();

            foreach($references_list as $cl){
                $where_array = array(
                    'technique_reviews_id' => $technique_id,
                    'review_id'=> $cl,
                );
                $this->db->select('*');
                $this->db->from('technique_review');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_reviews_id' => $technique_id,
                    'review_id' => $cl,
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_reviews_id', $technique_id)->insert('technique_review', $list_array);
                }
            }


            foreach ($existing_references_ids->result_array() as $eri){

                $delete_array = array('technique_reviews_id'=>$technique_id, 'review_id'=>$eri['review_id']);
                if(!(in_array($eri['review_id'], $references_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('technique_review');
                }
            }
        }


        return $technique_id;
    }


    function getTechniqueDataAll(){
        $query = $this->db->query("SELECT m.id as id, m.name as name, m.caption as caption, m.media_type, mf.id as tid, mf.height as height, mf.width as width, mf.location
                FROM media m, media_file mf
                WHERE m.thumbnail_id= mf.id
                ORDER BY m.name;");
        return $query->result();
    }

    function getMediaItems($x){
        $query= $this->db->query("SELECT media_id from media_in_section where technique_id='".$x."' and section='LIST';");
        return $query->result_array();
    }

    function getOutputItems($x){
        $query= $this->db->query("SELECT media_id as output_id from media_in_section where technique_id='".$x."' and section='OUTPUT';");
        $output_items = "";
        $count = 0;
        $item_list = $query->result_array();
        foreach($item_list as $each_item){
            if($count == 0){
                $output_items .= $each_item['output_id'];
                $count++;
            }
            else{
                $output_items .= "," . $each_item['output_id'];
            }
        }
        return($output_items);
    }

    function getInstrumentItems($x){
        $query= $this->db->query("SELECT media_id as instrument_id from media_in_section where technique_id='".$x."' and section='INSTRUMENT';");
        $instrument_items = "";
        $count = 0;
        $item_list = $query->result_array();
        foreach($item_list as $each_item){
            if($count == 0){
                $instrument_items .= $each_item['instrument_id'];
                $count++;
            }
            else{
                $instrument_items .= "," . $each_item['instrument_id'];
            }
        }
        return($instrument_items);
    }

    function getContactItems($x){
        $query= $this->db->query("SELECT contact_id  from technique_contact where technique_contacts_id=".$x.";");
        $contact_items = "";
        $count = 0;
        $item_list = $query->result_array();
        foreach($item_list as $each_item){
            if($count == 0){
                $contact_items .= $each_item['contact_id'];
                $count++;
            }
            else{
                $contact_items .= "," . $each_item['contact_id'];
            }
        }
        return($contact_items);
    }


    function getCaseItems($x){
        $query= $this->db->query("SELECT case_study_id  from technique_case_study where technique_case_studies_id=".$x.";");
        $case_items = "";
        $count = 0;
        $item_list = $query->result_array();
        foreach($item_list as $each_item){
            if($count == 0){
                $case_items .= $each_item['case_study_id'];
                $count++;
            }
            else{
                $case_items .= "," . $each_item['case_study_id'];
            }
        }
        return($case_items);
    }

    function getReferencesItems($x){
        $query= $this->db->query("SELECT review_id  from technique_review where technique_reviews_id=".$x.";");
        $reference_items = "";
        $count = 0;
        $item_list = $query->result_array();
        foreach($item_list as $each_item){
            if($count == 0){
                $reference_items .= $each_item['review_id'];
                $count++;
            }
            else{
                $reference_items .= "," . $each_item['review_id'];
            }
        }
        return($reference_items);
    }

    function getLocalisationItems($technique_id) {
        $query = $this->db->query("SELECT localisation.yr_commissioned, localisation.applications from localisation where technique_id=".$technique_id.";");
        $ret_list = array();
        $item_list = $query->result_array();
        foreach($item_list as $item) {
            $line = array();
            array_push($line, $item['yr_commissioned']);
            $app_list = json_decode($item['applications']);
            foreach($app_list as $app) {
                array_push($line, $app);
            }
            array_push($ret_list, $line);
        }
        return($ret_list);
    }

    function getLocationItems($technique_id) {
        $query = $this->db->query("SELECT location.center_name, location.institution, location.address, location.state, contact.email, contact.telephone, contact.name from location, localisation, contact where location.id = localisation.location_id and localisation.technique_id = ".$technique_id." and contact.location_id = location.id;");
        $item_list = $query->result_array();
        $ret_list = array();
        foreach($item_list as $item) {
            $line = array();
            array_push($line, $item['center_name'], $item['institution'], $item['address'], $item['state'], $item['email'], $item['telephone'], $item['name']);
            array_push($ret_list, $line);
        }
        return($ret_list);
    }

    function update_technique($x,$technique_name, $alternative_names, $short_description, $long_description, $keywords, $list_media_items, $output_media_items, $instrument_media_items, $contact_items, $case_studies_list, $references_items){
        $technique_data = array(
            'name' => $technique_name,
            'alternative_names' => $alternative_names,
            'summary' => $short_description,
            'description' => $long_description,
            'keywords' => $keywords,
        );

        $this->db->where('id', $x);
        $this->db->update('technique', $technique_data);

        if ($list_media_items == 0){
            $where_array = array(
                'technique_id' => $x,
                'section' => 'LIST',
            );
            $this->db->where($where_array);
            $this->db->delete('media_in_section');
        }

        if ($output_media_items == 0){
            $where_array = array(
                'technique_id' => $x,
                'section' => 'OUTPUT',
            );
            $this->db->where($where_array);
            $this->db->delete('media_in_section');
        }

        if ($instrument_media_items == 0){
            $where_array = array(
                'technique_id' => $x,
                'section' => 'INSTRUMENT',
            );
            $this->db->where($where_array);
            $this->db->delete('media_in_section');
        }

        if ($contact_items == 0){
            $where_array = array(
                'technique_contacts_id' => $x,
            );
            $this->db->where($where_array);
            $this->db->delete('technique_contact');
        }

        if ($case_studies_list == 0){
            $where_array = array(
                'technique_case_studies_id' => $x,
            );
            $this->db->where($where_array);
            $this->db->delete('technique_case_study');
        }

        if ($case_studies_list == 0){
            $where_array = array(
                'technique_case_studies_id' => $x,
            );
            $this->db->where($where_array);
            $this->db->delete('technique_case_study');
        }

        if ($references_items == 0){
            $where_array = array(
                'technique_reviews_id' => $x,
            );
            $this->db->where($where_array);
            $this->db->delete('technique_review');
        }

        if ($list_media_items) {
            $list_array = array(
                'technique_id' => $x,
                'media_id' => $list_media_items,
                'section' => 'LIST',
            );

            $where_array = array(
                'technique_id' => $x,
                'section' => 'LIST',
            );

            $this->db->where($where_array);
            $this->db->delete('media_in_section');
            $this->db->insert('media_in_section', $list_array);
        }

        if (strlen($output_media_items) > 0) {
            $output_list = explode(',',$output_media_items);

            $get_media_items = array('technique_id'=>$x, 'section'=> 'OUTPUT');
            $existing_media_ids = $this->db->select('media_id')->from('media_in_section')->where($get_media_items)->get();

            foreach($output_list as $ol){
                $where_array = array(
                    'technique_id' => $x,
                    'media_id'=> $ol,
                    'section' => 'OUTPUT',
                );
                $this->db->select('*');
                $this->db->from('media_in_section');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_id' => $x,
                    'media_id' => $ol,
                    'section' => 'OUTPUT',
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_id', $x)->insert('media_in_section', $list_array);
                }
            }


            foreach ($existing_media_ids->result_array() as $emi){
                $delete_array = array('technique_id'=>$x, 'media_id'=>$emi['media_id'],'section'=>'OUTPUT');
                if(!(in_array($emi['media_id'], $output_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('media_in_section');

                }

            }
        }

        if (strlen($instrument_media_items) > 0) {
            $instrument_list = explode(',',$instrument_media_items);

            $get_media_items = array('technique_id'=>$x, 'section'=> 'INSTRUMENT');
            $existing_media_ids = $this->db->select('media_id')->from('media_in_section')->where($get_media_items)->get();

            foreach($instrument_list as $ol){
                $where_array = array(
                    'technique_id' => $x,
                    'media_id'=> $ol,
                    'section' => 'INSTRUMENT',
                );
                $this->db->select('*');
                $this->db->from('media_in_section');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_id' => $x,
                    'media_id' => $ol,
                    'section' => 'INSTRUMENT',
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_id', $x)->insert('media_in_section', $list_array);
                }
            }


            foreach ($existing_media_ids->result_array() as $emi){
                $delete_array = array('technique_id'=>$x, 'media_id'=>$emi['media_id'],'section'=>'INSTRUMENT');
                if(!(in_array($emi['media_id'], $instrument_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('media_in_section');

                }
            }
        }

        if (strlen($contact_items) > 0) {

            $contact_list = explode(',',$contact_items);
            $existing_contact_ids = $this->db->select('contact_id')->from('technique_contact')->where('technique_contacts_id',$x)->get();

            foreach($contact_list as $cl){
                $where_array = array(
                    'technique_contacts_id' => $x,
                    'contact_id'=> $cl,
                );
                $this->db->select('*');
                $this->db->from('technique_contact');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_contacts_id' => $x,
                    'contact_id' => $cl,
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_contacts_id', $x)->insert('technique_contact', $list_array);
                }
            }


            foreach ($existing_contact_ids->result_array() as $eci){

                $delete_array = array('technique_contacts_id'=>$x, 'contact_id'=>$eci['contact_id']);
                if(!(in_array($eci['contact_id'], $contact_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('technique_contact');
                }
            }
        }

        if (strlen($case_studies_list) > 0) {
            $case_list = explode(',',$case_studies_list);


            $existing_case_ids = $this->db->select('case_study_id')->from('technique_case_study')->where('technique_case_studies_id',$x)->get();

            foreach($case_list as $cl){
                $where_array = array(
                    'technique_case_studies_id' => $x,
                    'case_study_id'=> $cl,
                );
                $this->db->select('*');
                $this->db->from('technique_case_study');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_case_studies_id' => $x,
                    'case_study_id' => $cl,
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_case_studies_id', $x)->insert('technique_case_study', $list_array);
                }
            }


            foreach ($existing_case_ids->result_array() as $ecai){

                $delete_array = array('technique_case_studies_id'=>$x, 'case_study_id'=>$ecai['case_study_id']);
                if(!(in_array($ecai['case_study_id'], $case_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('technique_case_study');
                }
            }
        }

        if (strlen($references_items) > 0) {
            $references_list = explode(',',$references_items);
            $existing_references_ids = $this->db->select('review_id')->from('technique_review')->where('technique_reviews_id',$x)->get();

            foreach($references_list as $cl){
                $where_array = array(
                    'technique_reviews_id' => $x,
                    'review_id'=> $cl,
                );
                $this->db->select('*');
                $this->db->from('technique_review');
                $this->db->where($where_array);
                $q = $this->db->get();

                $list_array = array(
                    'technique_reviews_id' => $x,
                    'review_id' => $cl,
                );

                if (! ($q->num_rows() > 0) )
                {
                    $this->db->set('technique_reviews_id', $x)->insert('technique_review', $list_array);
                }
            }


            foreach ($existing_references_ids->result_array() as $eri){

                $delete_array = array('technique_reviews_id'=>$x, 'review_id'=>$eri['review_id']);
                if(!(in_array($eri['review_id'], $references_list))){
                    $this->db->where($delete_array);
                    $this->db->delete('technique_review');
                }
            }
        }
    }


    function getTechniqueContacts($x){
        $query= $this->db->query("SELECT c.name, l.institution FROM contact c, location l, technique_contact t WHERE t.contact_id = c.id AND t.contact_id AND c.location_id = l.id AND t.technique_contacts_id ='". $x."';");
        return $query->result_array();

    }

    function getTechniqueCase($x){
        $query= $this->db->query("SELECT cs.id, cs.name, cs.url FROM case_study cs, technique_case_study tcs WHERE tcs.case_study_id = cs.id AND tcs.technique_case_studies_id='". $x."';");
        return $query->result_array();
    }

    function getTechniqueReferences($x){
        $query= $this->db->query("SELECT r.reference_names from review r, technique_review rw WHERE rw.review_id=r.id AND rw.technique_reviews_id='".$x."';");
        return $query->result_array();

    }
    function getAssociatedTechniques($x){
        $physicsArray = array();
        $biologyArray = array();
        $list = $this->db->query("SELECT left_id as leftID, right_id as rightID from option_combination where technique_id='".$x."'");
        foreach ($list->result_array() as $i ){
            $leftPhyQuery = $this->db->query("SELECT name from option_choice where id='".$i['leftID']."' AND science='PHYSICS';")->result_array();
            $rightPhyQuery = $this->db->query("SELECT name from option_choice where id='".$i['rightID']."' AND science='PHYSICS';")->result_array();


            $leftBioQuery = $this->db->query("SELECT name from option_choice where id='".$i['leftID']."' AND science='BIOLOGY';")->result_array();
            $rightBioQuery = $this->db->query("SELECT name from option_choice where id='".$i['rightID']."' AND science='BIOLOGY';")->result_array();

            if(isset($leftPhyQuery[0]['name']) && isset($rightPhyQuery[0]['name'])){
                array_push($physicsArray,$leftPhyQuery[0]['name']."-".$rightPhyQuery[0]['name']);
            }
            if(isset($leftBioQuery[0]['name']) && isset($rightBioQuery[0]['name'])) {
                array_push($biologyArray, $leftBioQuery[0]['name'] . "-" . $rightBioQuery[0]['name']);
            }
        }
        return array('physicsArray'=>$physicsArray, 'biologyArray'=>$biologyArray);

    }

    function deleteTechnique($x){
        $this->db->delete('technique_review',array('technique_reviews_id'=>$x));
        $this->db->delete('technique_contact',array('technique_contacts_id'=>$x));
        $this->db->delete('media_in_section',array('technique_id'=>$x));
        $this->db->delete('option_combination',array('technique_id'=>$x));

        $this->db->delete('technique',array('id'=>$x));
    }

    function getKeywordList() {
        $r1 = $this->db->query('select distinct name from technique')->result();
        $r2 = $this->db->query('select distinct center_name as name from location')->result();
        $r3 = $this->db->query('select distinct institution as name from location')->result();
        $r4 = $this->db->query('select distinct address as name from location')->result();
        $r5 = $this->db->query('select distinct state as name from location')->result();
        $r6 = $this->db->query('select distinct name from option_choice')->result();
        $r7 = $this->db->query('select distinct name from elements')->result();
        $r8 = $this->db->query('select distinct symbol as name from elements')->result();
        return array_merge($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8);
    }



    function searchByKeywords($q){
        /*
        ******************************** Execute the following code in MYSQL database manually if the search is not working. ***********************************

        alter table technique add fulltext index fulltext_index (`name` ASC, alternative_names ASC, summary ASC, `description` ASC, keywords ASC);
        alter table contact add fulltext index fulltext_index (`name` ASC, contact_position ASC, telephone ASC, email ASC);
        alter table `location` add fulltext index fulltext_index (institution ASC, center_name ASC, `address` ASC, `state` ASC);
        alter table case_study add fulltext index fulltext_index (`name` ASC, `url` ASC);
        alter table review add fulltext index fulltext_index (reference_names ASC, title ASC, full_reference, `url` ASC);
        alter table option_choice add fulltext index fulltext_index (`name` ASC);
        alter table media add fulltext index fulltext_index (caption ASC);
        */
        if($q == '*'){
            $q= '';
        }
        // Literal search in technique
        $r1 = $this->db->query('SELECT * from technique where MATCH(name, instrument_name, model, manufacturer, sample_type) AGAINST(? IN NATURAL LANGUAGE MODE)',
            array('q' => '"'.$q.'"'))->result();

        // Word search in technique
        $r1_2 = $this->db->query('SELECT * from technique where MATCH(alternative_names, summary, description, keywords) AGAINST(? IN NATURAL LANGUAGE MODE)',
            array($q))->result();

        // Literal search in location and contact
        $r2 = $this->db->query(
            'select technique.* from location inner join localisation on location.id=localisation.location_id'
            .' inner join technique on localisation.technique_id=technique.id'
            .' where MATCH(location.institution, location.center_name, location.`address`, location.state) AGAINST(? IN NATURAL LANGUAGE MODE); ',
            array('q' => '"'.$q.'"'))->result();

        // Search in case_study
        $r4 = $this->db->query(
            'SELECT technique.* from case_study'
            .' join technique_case_study on case_study.id=technique_case_study.case_study_id join technique on technique_case_study.technique_case_studies_id=technique.id'
            .' where MATCH(case_study.`name`, case_study.`url`) AGAINST(? IN NATURAL LANGUAGE MODE);',
            array($q))->result();

        // Search in review
        $r5 = $this->db->query(
            'SELECT technique.* from review'
            .' join technique_review on review.id=technique_review.review_id join technique on technique_review.technique_reviews_id =technique.id'
            .' where MATCH(review.reference_names, review.title, review.full_reference, review.`url`) AGAINST(? IN NATURAL LANGUAGE MODE);',
            array($q))->result();

        // Search in option_choice
        $r6 = $this->db->query(
            'SELECT technique.* from option_choice '.
            ' join option_combination on option_choice.id in (option_combination.left_id, option_combination.right_id ) join technique on option_combination.technique_id =technique.id'
            .' where MATCH( option_choice.`name`) AGAINST(? IN NATURAL LANGUAGE MODE) group by option_combination.technique_id ;',
            array($q))->result();

        // Search in media
        $r7 = $this->db->query(
            'SELECT technique.* from media '
            .' join media_in_section on media.id=media_in_section.media_id join technique on media_in_section.technique_id=technique.id '
            .' where MATCH(media.caption) AGAINST(? IN NATURAL LANGUAGE MODE)',
            array($q))->result();

        // Search in elements
        $r8 = $this->db->query(
            'SELECT technique.* from elements'
            .' join elements_elements_set on elements_elements_set.elements_id=elements.id'
            .' join elements_set on elements_elements_set.elements_set_id=elements_set.id'
            .' join technique on technique.elements_set_id = elements_set.id'
            .' where MATCH(elements.`name`, elements.`symbol`) AGAINST(? IN NATURAL LANGUAGE MODE);',
            array($q))->result();

        $results = array();
        $merged = array_merge($r1,$r1_2,$r2,$r4,$r5,$r6,$r7,$r8);
        foreach($merged as $r){
            if(!isset($results[$r->id])){
                $results[$r->id] = $r;
            }
        }
        return $results;
    }

    function getContactsForTechnique($x){
        return $this->db->query(
            'select location.institution, contact.title, contact.name, contact.telephone, contact.email, contact.contact_position'
            .' from technique join technique_contact on technique.id=technique_contact.technique_contacts_id '
            .'join contact on technique_contact.contact_id = contact.id join location on contact.location_id =location.id '
            .' where technique.id=?' ,
            array($x))->result();
    }

    function getMediasForTechniqueSection($x,$instrument){
        return $this->db->query(
            'select media.id, media.media_type, media.name, media.caption '
            .', media_file.location,media_file.width, media_file.height '
            .' from technique '
            .' join media_in_section on media_in_section.technique_id = technique.id '
            .' join media on media_in_section.media_id =media.id '
            .' join media_file on media.original_id = media_file.id '
            .' where technique.id=? and media_in_section.section =?',
            array($x, $instrument))->result();
    }

    function getReferencesForTechnique($x){
        return $this->db->query(
            'select review.* from technique_review '
            .' join review on review.id=technique_review.review_id '
            .' where technique_review.technique_reviews_id =?',
            array($x))->result();
    }

    function getCaseStudiesforTechnique($x){
        return $this->db->query(
            'select case_study.* from technique_case_study '
            .' join case_study on case_study.id=technique_case_study.case_study_id '
            .' where technique_case_study.technique_case_studies_id =?',
            array($x))->result();
    }
}
