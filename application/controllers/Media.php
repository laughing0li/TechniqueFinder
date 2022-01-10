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

defined('BASEPATH') or exit('No direct script access allowed');
// require './application/third_party/vendor/autoload.php';
// (Dotenv\Dotenv::createImmutable('application/third_party/'))->load();

use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Storage\StorageObject;

class Media extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // auth0 config
        if ($this->session->userdata('auth0__user') == null) {
            redirect(base_url() . 'login');
        }

        $this->load->model('Media_model');
        $this->media_folder = 'media-dir/';
        $this->max_thumbnail_box = 100;
    }


    function index()
    {
        $this->load->view('Media/index');
    }

    function getList()
    {
        $data = array();
        $results = $this->Media_model->getAllMediaInfos();

        foreach ($results as $r) {
            $thumbnail_width = $r->thumbnail_width;
            $thumbnail_height = $r->thumbnail_height;
            $file_width = $r->width;
            $file_height = $r->height;
            if ($r->media_type == 'MOVIE') {
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
                'id' => $r->id,
                'location' => $r->file_location,
                'thumbnail' => '<img id="media_' . $r->id . '" class="sortHandle" src="'.storage_url() . $r->file_location
                    . '" width="' . $file_width . '" height="' . $file_height . '" alt="[AFM_01_TF.jpg]">',
                'name_dimensions' => $r->name . '<br>' . $r->width . 'x' . $r->height,
                'caption' => $r->caption,
                'actions' => "<div style='min-width: 245px;'>"
                    . "<button class='user-table-buttons' onclick=window.location='" . base_url() . "Media/view/" . $r->id . "'>"
                    . "<span style='background: url(../assets/images/database_view.png) 50% no-repeat;margin-right:0.1em;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>View</button>"
                    . "<span style='margin-left: 2em;'>&nbsp;</span>"
                    . "<button class='user-table-buttons' onclick=window.location='" . base_url() . "Media/edit_media/" . $r->id . "'>"
                    . "<span style='background: url(../assets/images/database_edit.png) 50% no-repeat;margin-right:0.1em;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Edit</button>"
                    . "<span style='margin-left: 2em;'>&nbsp;</span>"
                    . "<button class='user-table-buttons' onclick=\"if (confirm('Are you sure?')){ window.location='" . base_url() . "Media/delete/" . $r->id . "'}\">"
                    . "<span style='background: url(../assets/images/database_delete.png) 50% no-repeat;margin-right:0.1em; '>&nbsp;&nbsp;&nbsp;&nbsp;</span>Delete</button>"
                    . "<span style='float: right; margin-top: 0.5em;' ></span>"
                    . "</div>",
            ));
        }

        echo json_encode(array('data' => $data));
    }


    function create_new_image()
    {
        $this->load->view('Media/new_media', array('media_type' => 'IMAGE'));
    }

    function create_new_movie()
    {
        $this->load->view('Media/new_media', array('media_type' => 'MOVIE'));
    }


    function edit_media($id)
    {
        $record = $this->Media_model->getMediaById($id);
        $this->load->view('Media/edit', array('media_data' => $record));
    }

    function view($id)
    {
        $record = $this->Media_model->getMediaInfoById($id);
        $associated_medias = $this->Media_model->getAssociatedTechniquesByMediaId($id);
        $prev_media = $this->Media_model->getPrevMediaInfo($id);
        $next_media = $this->Media_model->getNextMediaInfo($id);

        $this->load->view('Media/view', array(
            'media_data' => $record,
            'prev_media' => $prev_media,
            'next_media' => $next_media,
            'associated_medias' => $associated_medias
        ));
    }



    function validate_update($str, $id)
    {
        $result = $this->Location_model->getLocationByInstitution($str);

        if (isset($result) && $result->id != $id) {
            $this->form_validation->set_message('validate_update', 'Institution ' . $str . ' already exists');
            return False;
        } else {
            return True;
        }
    }

    ///////////////////////////////////////////////////////////
    function create_image()
    {
        $this->create_or_update_image('create', null);
    }

    function update_image($media_id)
    {
        $this->create_or_update_image('update', $media_id);
    }

    private function create_or_update_image($action, $media_id)
    {
        if ($action == 'create') {
            $current_action_url = 'create_new_image';
        } else {
            $current_action_url = 'edit_media/' . $media_id;
        }

        $storage =  new StorageClient([
            'keyFilePath' => $_ENV['CLOUD_STORAGE_CONFIG_FILE'],
            'projectId' => $_ENV['PROJECT_ID'],
        ]);

        $file_location = $_FILES['userfile']['name'];
        // to get the file's name excluding the extension
        $media_name = substr($file_location, 0, strrpos($file_location, '.'));
        $file_mime = $_FILES['userfile']['type'];
        $file = $_FILES['userfile']['tmp_name'];
        $media_caption = $this->input->post('caption');
        $file_width = 400;
        $file_height = 288;
        $uploaded_file_full_path = $file;

        // to verify the file does upload or not
        if ($_FILES['userfile']['error'] > 0) {
            $this->session->set_flashdata('error-warning-message', 'Please select a file to upload');
            redirect(base_url() . 'Media/' . $current_action_url);
        }
        // to verify the file is image or not
        if (
            $_FILES['userfile']['type'] != 'image/jpeg' &&
            $_FILES['userfile']['type'] != 'image/jpg' &&
            $_FILES['userfile']['type'] != 'image/png'
        ) {
            $this->session->set_flashdata('error-warning-message', 'Only JPEG or PNG images are allowed');
            redirect(base_url() . 'Media/' . $current_action_url);
        }
        // to make sure the caption is not empty
        $media_caption = $this->input->post('caption');
        if ($media_caption == '') {
            $this->session->set_flashdata('error-warning-message', 'Please enter a caption');
            redirect(base_url() . 'Media/' . $current_action_url);
        }

        // check if the media is already exist
        $media_with_same_name = $this->Media_model->getMediaByName($media_name);
        if ($media_with_same_name && $media_with_same_name->id != $media_id) {
            unlink($uploaded_file_full_path);
            $this->session->set_flashdata('error-warning-message', 'An IMAGE with the same name [' . $media_name . '] already exist.');
            redirect(base_url() . 'Media/' . $current_action_url);
        }

        $thumbnail_location = $file_location;
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
        // create media info and store it in database
        if ($action == 'create') {
            // upload the file to the cloud storage
            $file = fopen($_FILES["userfile"]["tmp_name"], 'r');
            $bucket = $storage->bucket($_ENV['BUCKETNAME']);
            $bucket->upload($file, [
                'name' => 'static/' . $_FILES["userfile"]["name"],
            ]);
            if ($this->Media_model->createMediaInfo(
                $media_name,
                $media_caption,
                'IMAGE',
                $file_location,
                $file_mime,
                $file_width,
                $file_height,
                $thumbnail_location,
                $thumbnail_width,
                $thumbnail_height,
                $file_mime
            )) {
                $this->session->set_flashdata('success-warning-message', "IMAGE " . $media_name . " has been uploaded.");
                redirect(base_url() . 'Media/index');
            } else {
                unlink($uploaded_file_full_path);
                $this->session->set_flashdata('error-warning-message', 'Error when creating a new IMAGE.');
                redirect(base_url() . 'Media/' . $current_action_url);
            }
            // update media info and store it in database
            // because the cloud storage does not support update, 
            // we need to delete the old file and upload the new file
        } else if ($action == 'update') {
            // first delete the old file from the cloud storage

            // get to be deleted media info
            $del_object = $this->Media_model->getMediaInfoById($media_id);
            // the path of the file to be deleted
            $name = 'static/' . $del_object->location;
            // config cloud storage
            $storage =  new StorageClient([
                'keyFilePath' => $_ENV['CLOUD_STORAGE_CONFIG_FILE'],
                'projectId' => $_ENV['PROJECT_ID'],
            ]);
            $bucket = $storage->bucket($_ENV['BUCKETNAME']);
            $object = $bucket->object($name);
            $object->delete();

            // then upload the new file to the cloud storage
            $file = fopen($_FILES["userfile"]["tmp_name"], 'r');
            $bucket->upload($file, [
                'name' => 'static/' . $_FILES["userfile"]["name"],
            ]);

            // $cur_thumbnail_location = $this->Media_model->getMediaThumbnailLocationByMediaId($media_id);
            // $media_file_location = $this->Media_model->getMediaFileLocationByMediaId($media_id);
            if ($this->Media_model->updateMediaInfo(
                $media_id,
                $media_name,
                $media_caption,
                'IMAGE',
                $file_location,
                $file_mime,
                $file_width,
                $file_height,
                $thumbnail_location,
                $thumbnail_width,
                $thumbnail_height,
                $file_mime
            )) { //OK
                $this->session->set_flashdata('success-warning-message', "IMAGE " . $media_name . " has been uploaded.");
                redirect(base_url() . 'Media/index');
            } else {
                unlink($uploaded_file_full_path);
                $this->session->set_flashdata('error-warning-message', 'Error when creating a new IMAGE.');
                redirect(base_url() . 'Media/' . $current_action_url);
            }
        } else {
            unlink($uploaded_file_full_path);
            $this->session->set_flashdata('error-warning-message', 'Invalid action on IMAGE.');
            redirect(base_url() . 'Media/index');
        }
    }

    function create_movie()
    {
        $this->create_or_update_movie('create', null);
    }

    function update_movie($media_id)
    {
        $this->create_or_update_movie('update', $media_id);
    }


    private function create_or_update_movie($action, $media_id)
    {
        $upload_config = array(
            'upload_path' => $this->media_folder, //777
            'overwrite' => FALSE,
            'allowed_types' => 'jpg|png',
            'max_size' => '2048',
        );
        $this->load->library('upload');

        if ($action == 'create') {
            $current_action_url = 'create_new_movie';
        } else {
            $current_action_url = 'edit_media/' . $media_id;
        }


        if ($this->upload->initialize($upload_config)->do_upload('userfile')) {
            $uploaded_data = $this->upload->data();
            $media_name = $uploaded_data['client_name'];
            $uploaded_file_full_path = $uploaded_data['full_path'];
            $file_location = $uploaded_data['file_name'];
            $file_mime =  $uploaded_data['file_type'];
            $file_width = $uploaded_data['image_width'];
            $file_height = $uploaded_data['image_height'];
            $media_caption = $this->input->post('caption');

            $media_with_same_name = $this->Media_model->getMediaByName($media_name);
            if ($media_with_same_name && $media_with_same_name->id != $media_id) {
                unlink($uploaded_file_full_path);
                $this->session->set_flashdata('error-warning-message', 'A MOVIE with the same name [' . $media_name . '] already exist.');
                redirect(base_url() . 'Media/' . $current_action_url);
            }

            if ($this->upload->initialize($upload_config)->do_upload('thumbnailfile')) {
                $uploaded_thumbnailfile = $this->upload->data();
                $thumbnail_location = $uploaded_thumbnailfile['file_name'];
                $thumbnail_width = $uploaded_thumbnailfile['image_width'];
                $thumbnail_height = $uploaded_thumbnailfile['image_height'];
                $thumbnail_mime = $uploaded_thumbnailfile['file_type'];

                if ($action == 'create') {
                    if ($this->Media_model->createMediaInfo(
                        $media_name,
                        $media_caption,
                        'MOVIE',
                        $file_location,
                        $file_mime,
                        $file_width,
                        $file_height,
                        $thumbnail_location,
                        $thumbnail_width,
                        $thumbnail_height,
                        $thumbnail_mime
                    )) {
                        $this->session->set_flashdata('success-warning-message', "MOVIE " . $media_name . " has been uploaded.");
                        redirect(base_url() . 'Media/index');
                    } else {
                        unlink($uploaded_file_full_path);
                        $this->session->set_flashdata('error-warning-message', 'Error when creating a new MOVIE.');
                        redirect(base_url() . 'Media/' . $current_action_url);
                    }
                } else if ($action == 'update') {
                    $cur_thumbnail_location = $this->Media_model->getMediaThumbnailLocationByMediaId($media_id);
                    $media_file_location = $this->Media_model->getMediaFileLocationByMediaId($media_id);
                    if ($this->Media_model->updateMediaInfo(
                        $media_id,
                        $media_name,
                        $media_caption,
                        'MOVIE',
                        $file_location,
                        $file_mime,
                        $file_width,
                        $file_height,
                        $thumbnail_location,
                        $thumbnail_width,
                        $thumbnail_height,
                        $thumbnail_mime
                    )) { //OK
                        // unlink('./' . $this->media_folder . $cur_thumbnail_location);
                        // unlink('./' . $this->media_folder . $media_file_location);
                        $this->session->set_flashdata('success-warning-message', "MOVIE " . $media_name . " has been uploaded.");
                        redirect(base_url() . 'Media/index');
                    } else {
                        unlink($uploaded_file_full_path);
                        $this->session->set_flashdata('error-warning-message', 'Error when creating a new MOVIE.');
                        redirect(base_url() . 'Media/' . $current_action_url);
                    }
                } else {
                    unlink($uploaded_file_full_path);
                    $this->session->set_flashdata('error-warning-message', 'Invalid action on MOVIE.');
                    redirect(base_url() . 'Media/index');
                }
            } else { //thumbnail
                $this->session->set_flashdata('error-warning-message', $this->upload->display_errors());
                redirect(base_url() . 'Media/' . $current_action_url);
            }
        } else { //movie
            $this->session->set_flashdata('error-warning-message', $this->upload->display_errors());
            redirect(base_url() . 'Media/' . $current_action_url);
        }
    }

    function delete($id)
    {
        // get to be deleted media info
        $del_object = $this->Media_model->getMediaInfoById($id);
        // the path of the file to be deleted
        $name = 'static/' . $del_object->location;
        // config cloud storage
        $storage =  new StorageClient([
            'keyFilePath' => $_ENV['CLOUD_STORAGE_CONFIG_FILE'],
            'projectId' => $_ENV['PROJECT_ID'],
        ]);
        $bucket = $storage->bucket($_ENV['BUCKETNAME']);
        $object = $bucket->object($name);
        $object->delete();
        if ($this->Media_model->deleteById($id)) {
            $this->session->set_flashdata('success-warning-message', "Media has been deleted. ");
        } else {
            $this->session->set_flashdata('error-warning-message', "Media " . $id . " could not be deleted");
        }

        redirect(base_url() . 'Media/index');
    }
}
