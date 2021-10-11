<?php
/**
 * TechniqueFinder - Media.php
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

class Media extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('auth0__user') == null){
            redirect(base_url() . 'login');
        }
        $this->load->model('Media_model');
        $this->media_folder = 'media-dir/';
        $this->max_thumbnail_box = 100;

    }


    function index(){
        $this->load->view('Media/index');
    }

    function getList(){
        $data = array();
        $results = $this->Media_model->getAllMediaInfos();

        foreach ($results as $r) {
            $thumbnail_width = $r->thumbnail_width;
            $thumbnail_height = $r->thumbnail_height;
            if($r->media_type == 'MOVIE'){
                if ($thumbnail_width > $this->max_thumbnail_box) {
                    $thumbnail_width = $this->max_thumbnail_box;
                    $thumbnail_height = ($thumbnail_height * $this->max_thumbnail_box) / $r->thumbnail_width;
                }
                if ($thumbnail_height > $this->max_thumbnail_box) {
                    $thumbnail_width = ($thumbnail_width * $this->max_thumbnail_box) / $thumbnail_height;
                    $thumbnail_height = $this->max_thumbnail_box;
                }

            }
            array_push($data, array(
                'id'=>$r->id,
                'thumbnail'=> '<img id="media_'.$r->id.'" class="sortHandle" src="'.base_url().$this->media_folder.$r->thumbnail_location
                .'" width="'.$thumbnail_width.'" height="'.$thumbnail_height.'" alt="[AFM_01_TF.jpg]">',
                'name_dimensions'=>$r->name.'<br>'.$r->width.'x'.$r->height,
                'caption'=>$r->caption,
                'actions'=>"<div style='min-width: 245px;'>"
                ."<button class='user-table-buttons' onclick=window.location='".base_url()."Media/view/".$r->id."'>"
                ."<span style='background: url(../assets/images/database_view.png) 50% no-repeat;margin-right:0.1em;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>"
                ."<span style='margin-left: 2em;'>&nbsp;</span>"
                ."<button class='user-table-buttons' onclick=window.location='".base_url()."Media/edit_media/".$r->id."'>"
                ."<span style='background: url(../assets/images/database_edit.png) 50% no-repeat;margin-right:0.1em;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>"
                ."<span style='margin-left: 2em;'>&nbsp;</span>"
                ."<button class='user-table-buttons' onclick=\"if (confirm('Are you sure?')){ window.location='".base_url()."Media/delete/".$r->id."'}\">"
                ."<span style='background: url(../assets/images/database_delete.png) 50% no-repeat;margin-right:0.1em; '>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button>"
                ."<span style='float: right; margin-top: 0.5em;' ></span>"
                ."</div>",
            ));
        }

        echo json_encode(array('data' => $data));

    }


    function create_new_image(){
        $this->load->view('Media/new_media', array('media_type'=>'IMAGE'));
    }

    function create_new_movie(){
        $this->load->view('Media/new_media', array('media_type'=>'MOVIE'));
    }


    function edit_media($id){
        $record = $this->Media_model->getMediaById($id);
        $this->load->view('Media/edit', array('media_data'=>$record));
    }

    function view($id){
        $record = $this->Media_model->getMediaInfoById($id);
        $associated_medias = $this->Media_model->getAssociatedTechniquesByMediaId($id);
        $prev_media = $this->Media_model->getPrevMediaInfo($id);
        $next_media = $this->Media_model->getNextMediaInfo($id);

        $this->load->view('Media/view', array(
            'media_data'=>$record,
            'prev_media' =>$prev_media,
            'next_media' =>$next_media,
            'associated_medias' =>$associated_medias
        ));

    }



    function validate_update($str, $id){
        $result = $this->Location_model->getLocationByInstitution($str);

        if(isset($result) && $result->id !=$id) {
            $this->form_validation->set_message('validate_update', 'Institution '. $str .' already exists');
            return False;
        }
        else{
            return True;
        }

    }

    ///////////////////////////////////////////////////////////
    function create_image(){
        $this->create_or_update_image('create', null);
    }

    function update_image($media_id){
        $this->create_or_update_image('update', $media_id);
    }

    private function create_or_update_image($action, $media_id){
        $this->load->library('upload',array(
            'upload_path' => $this->media_folder,//777
            'overwrite'=>FALSE,
            'allowed_types' => 'jpg|png',
            'max_size' => '2048',
        ));

        if($action == 'create'){
            $current_action_url = 'create_new_image';
        }else{
            $current_action_url = 'edit_media/'.$media_id;
        }

        /**array(14) { 
         * ["file_name"]=> string(21) "SEMspec_01_TF_sq5.jpg" 
         * ["file_type"]=> string(10) "image/jpeg" 
         * ["file_path"]=> string(15) "/www/media-dir/" 
         * ["full_path"]=> string(36) "/www/media-dir/SEMspec_01_TF_sq5.jpg" 
         * ["raw_name"]=> string(17) "SEMspec_01_TF_sq5" 
         * ["orig_name"]=> string(20) "SEMspec_01_TF_sq.jpg" 
         * ["client_name"]=> string(20) "SEMspec_01_TF_sq.jpg" 
         * ["file_ext"]=> string(4) ".jpg" 
         * ["file_size"]=> float(38.99) 
         * ["is_image"]=> bool(true) 
         * ["image_width"]=> int(145) 
         * ["image_height"]=> int(145) 
         * ["image_type"]=> string(4) "jpeg" 
         * ["image_size_str"]=> string(24) "width="145" height="145"" 
         * }
         * 
         */
        if($this->upload->do_upload('userfile')){
            $uploaded_data = $this->upload->data();
            $media_name = $uploaded_data['client_name'];
            $uploaded_file_full_path = $uploaded_data['full_path'];

            $media_with_same_name = $this->Media_model->getMediaByName($media_name);
            if($media_with_same_name && $media_with_same_name->id != $media_id){
                unlink($uploaded_file_full_path);
                $this->session->set_flashdata('error-warning-message', 'An IMAGE with the same name ['.$media_name.'] already exist.');
                redirect(base_url().'Media/'.$current_action_url);
            }

            $media_caption = $this->input->post('caption');

            $file_location = $uploaded_data['file_name'];
            $file_mime =  $uploaded_data['file_type'];
            $file_width = $uploaded_data['image_width'];
            $file_height = $uploaded_data['image_height']; 

            $thumbnail_location = '.THUM_'.$uploaded_data['file_name'];
            if ($file_width > $this->max_thumbnail_box) {
                $thumbnail_width = $this->max_thumbnail_box;
                $thumbnail_height = ($file_height * $this->max_thumbnail_box) / $file_width;
            } else {
                $thumbnail_width = $file_width;
                $thumbnail_height = $file_height;
            }
            if ($thumbnail_height > $this->max_thumbnail_box) {
                $thumbnail_width = ($thumbnail_width * $this->max_thumbnail_box) / $thumbnail_height;
                $thumbnail_height = $this->max_thumbnail_box;
            }
            $this->load->library('image_lib', array(
                'image_library' => 'gd2',
                'source_image' => $uploaded_file_full_path,
                'thumb_marker' =>'',
                'new_image' => $uploaded_data['file_path'].$thumbnail_location,
                'create_thumb' => TRUE,
                'maintain_ratio' => FALSE,
                'width'         => $thumbnail_width,
                'height'       => $thumbnail_height,
            ));
            if($this->image_lib->resize()){
                if($action == 'create'){
                    if($this->Media_model->createMediaInfo(
                        $media_name, $media_caption, 'IMAGE', 
                        $file_location, $file_mime, $file_width, $file_height, 
                        $thumbnail_location, $thumbnail_width, $thumbnail_height, $file_mime
                    )){
                        $this->session->set_flashdata('success-warning-message',"IMAGE ". $media_name." has been uploaded.");
                        redirect(base_url().'Media/index');
                    } else{
                        unlink($uploaded_file_full_path);
                        $this->session->set_flashdata('error-warning-message', 'Error when creating a new IMAGE.');
                        redirect(base_url().'Media/'.$current_action_url);
                    }
                }else if($action == 'update'){
                    $cur_thumbnail_location = $this->Media_model->getMediaThumbnailLocationByMediaId($media_id);
                    $media_file_location = $this->Media_model->getMediaFileLocationByMediaId($media_id);
                    if($this->Media_model->updateMediaInfo($media_id,
                        $media_name, $media_caption, 'IMAGE', 
                        $file_location, $file_mime, $file_width, $file_height, 
                        $thumbnail_location, $thumbnail_width, $thumbnail_height, $file_mime
                    )){//OK
                        unlink('./'.$this->media_folder.$cur_thumbnail_location);
                        unlink('./'.$this->media_folder.$media_file_location);
                        $this->session->set_flashdata('success-warning-message',"IMAGE ". $media_name." has been uploaded.");
                        redirect(base_url().'Media/index');
                    }
                    else{
                        unlink($uploaded_file_full_path);
                        $this->session->set_flashdata('error-warning-message', 'Error when creating a new IMAGE.');
                        redirect(base_url().'Media/'.$current_action_url);
                    }
                }
                else{
                    unlink($uploaded_file_full_path);
                    $this->session->set_flashdata('error-warning-message', 'Invalid action on IMAGE.');
                    redirect(base_url().'Media/index');
                }
            }else{
                unlink($uploaded_file_full_path);
                $this->session->set_flashdata('error-warning-message', $this->image_lib->display_errors());
                redirect(base_url().'Media/'.$current_action_url);
            }
        }else{
            $this->session->set_flashdata('error-warning-message', $this->upload->display_errors());
            redirect(base_url().'Media/'.$current_action_url);
        }
    }

    function create_movie(){
        $this->create_or_update_movie('create', null);
    }

    function update_movie($media_id){
        $this->create_or_update_movie('update', $media_id);
    }


    private function create_or_update_movie($action, $media_id){
        $upload_config = array(
            'upload_path' => $this->media_folder,//777
            'overwrite'=>FALSE,
            'allowed_types' => 'jpg|png',
            'max_size' => '2048',
        );
        $this->load->library('upload');

        if($action == 'create'){
            $current_action_url = 'create_new_movie';
        }else{
            $current_action_url = 'edit_media/'.$media_id;
        }

        /**array(14) { 
         * ["file_name"]=> string(21) "SEMspec_01_TF_sq5.jpg" 
         * ["file_type"]=> string(10) "image/jpeg" 
         * ["file_path"]=> string(15) "/www/media-dir/" 
         * ["full_path"]=> string(36) "/www/media-dir/SEMspec_01_TF_sq5.jpg" 
         * ["raw_name"]=> string(17) "SEMspec_01_TF_sq5" 
         * ["orig_name"]=> string(20) "SEMspec_01_TF_sq.jpg" 
         * ["client_name"]=> string(20) "SEMspec_01_TF_sq.jpg" 
         * ["file_ext"]=> string(4) ".jpg" 
         * ["file_size"]=> float(38.99) 
         * ["is_image"]=> bool(true) 
         * ["image_width"]=> int(145) 
         * ["image_height"]=> int(145) 
         * ["image_type"]=> string(4) "jpeg" 
         * ["image_size_str"]=> string(24) "width="145" height="145"" 
         * }
         * 
         */

        if($this->upload->initialize($upload_config)->do_upload('userfile')){
            $uploaded_data = $this->upload->data();
            $media_name = $uploaded_data['client_name'];
            $uploaded_file_full_path = $uploaded_data['full_path'];
            $file_location = $uploaded_data['file_name'];
            $file_mime =  $uploaded_data['file_type'];
            $file_width = $uploaded_data['image_width'];
            $file_height = $uploaded_data['image_height']; 
            $media_caption = $this->input->post('caption');

            $media_with_same_name = $this->Media_model->getMediaByName($media_name);
            if($media_with_same_name && $media_with_same_name->id != $media_id){
                unlink($uploaded_file_full_path);
                $this->session->set_flashdata('error-warning-message', 'A MOVIE with the same name ['.$media_name.'] already exist.');
                redirect(base_url().'Media/'.$current_action_url);
            }

            if($this->upload->initialize($upload_config)->do_upload('thumbnailfile')){
                $uploaded_thumbnailfile = $this->upload->data();
                $thumbnail_location = $uploaded_thumbnailfile['file_name']; 
                $thumbnail_width = $uploaded_thumbnailfile['image_width'];
                $thumbnail_height = $uploaded_thumbnailfile['image_height'];
                $thumbnail_mime = $uploaded_thumbnailfile['file_type'];
    
                if($action == 'create'){
                    if($this->Media_model->createMediaInfo(
                            $media_name, $media_caption, 'MOVIE', 
                            $file_location, $file_mime, $file_width, $file_height, 
                            $thumbnail_location, $thumbnail_width, $thumbnail_height, $thumbnail_mime)){
                        $this->session->set_flashdata('success-warning-message',"MOVIE ". $media_name." has been uploaded.");
                        redirect(base_url().'Media/index');
                    }
                    else{
                        unlink($uploaded_file_full_path);
                        $this->session->set_flashdata('error-warning-message', 'Error when creating a new MOVIE.');
                        redirect(base_url().'Media/'.$current_action_url);
                    }
                } else if($action == 'update'){
                    $cur_thumbnail_location = $this->Media_model->getMediaThumbnailLocationByMediaId($media_id);
                    $media_file_location = $this->Media_model->getMediaFileLocationByMediaId($media_id);
                    if($this->Media_model->updateMediaInfo($media_id,
                        $media_name, $media_caption, 'MOVIE', 
                        $file_location, $file_mime, $file_width, $file_height, 
                        $thumbnail_location, $thumbnail_width, $thumbnail_height, $thumbnail_mime
                    )){//OK
                        unlink('./'.$this->media_folder.$cur_thumbnail_location);
                        unlink('./'.$this->media_folder.$media_file_location);
                        $this->session->set_flashdata('success-warning-message',"MOVIE ". $media_name." has been uploaded.");
                        redirect(base_url().'Media/index');
                    }
                    else{
                        unlink($uploaded_file_full_path);
                        $this->session->set_flashdata('error-warning-message', 'Error when creating a new MOVIE.');
                        redirect(base_url().'Media/'.$current_action_url);
                    }
                } else{
                    unlink($uploaded_file_full_path);
                    $this->session->set_flashdata('error-warning-message', 'Invalid action on MOVIE.');
                    redirect(base_url().'Media/index');
                }
            }else{//thumbnail
                $this->session->set_flashdata('error-warning-message', $this->upload->display_errors());
                redirect(base_url().'Media/'.$current_action_url);
            }

        }else{//movie
            $this->session->set_flashdata('error-warning-message', $this->upload->display_errors());
            redirect(base_url().'Media/'.$current_action_url);
        }

    }


    function delete($id){
        $thumbnail_location = $this->Media_model->getMediaThumbnailLocationByMediaId($id);
        $media_file_location = $this->Media_model->getMediaFileLocationByMediaId($id);

        if($this->Media_model->deleteById($id)){
            unlink('./'.$this->media_folder.$thumbnail_location);
            unlink('./'.$this->media_folder.$media_file_location);
            $this->session->set_flashdata('success-warning-message',"Media has been deleted. ");
        }else{
            $this->session->set_flashdata('error-warning-message',"Media ". $id ." could not be deleted");
        }

        redirect(base_url().'Media/index');
    }
}