<?php
/**
 * TechniqueFinder - Media_model.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

class Media_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getMediaById($id){
        return $this->db->from('media')->where('id', $id)->get()->row();
    }

    function getMediaThumbnailLocationByMediaId($media_id){
        return $this->db->select('thumbnail.id as thumbnail_id, thumbnail.location as thumbnail_location')
            ->from('media')->join('media_file as thumbnail', 'media.thumbnail_id=thumbnail.id' )
            ->where('media.id', $media_id)->get()->row()->thumbnail_location;
    }

    function getMediaFileLocationByMediaId($media_id){
        return $this->db->select('media_file.id as media_file_id, media_file.location as media_file_location')
            ->from('media')->join('media_file', 'media.original_id=media_file.id' )
            ->where('media.id', $media_id)->get()->row()->media_file_location;
    }

    function getMediaByName($name){
        return $this->db->from('media')->where('name', $name)->get()->row();
    }

    function getAllMediaInfos(){
        //select thumbnail.location as thumbnail_location, media.name, media_file.location, media.caption, media_file.width, media_file.height 
        //from media join media_file on media.original_id=media_file.id join media_file as thumbnail on media.thumbnail_id=thumbnail.id
        return $this->db
            ->select('thumbnail.width as thumbnail_width, thumbnail.height as thumbnail_height, thumbnail.location as thumbnail_location,'
                .' media.id, media.media_type, media.name, media.caption,'
                .' media_file.mime, media_file.size, media_file.location as file_location, media_file.width, media_file.height')
            ->from('media')
            ->join('media_file', 'media.original_id=media_file.id')
            ->join('media_file as thumbnail', 'media.thumbnail_id=thumbnail.id')
            ->order_by('name','ASC')->get()->result();

            //thumbnail_width, thumbnail_height, thumbnail_location,
            //id, media_type, name, caption,
            //mime, size, location, width, height
    }

    function getAssociatedTechniquesByMediaId($media_id){
        return $this->db
            ->select('technique.id, technique.name')
            ->from('media')
            ->join('media_in_section', 'media.id=media_in_section.media_id')
            ->join('technique', 'media_in_section.technique_id=technique.id')
            ->where('media.id',$media_id)->get()->result();
    }

    function getMediaInfosByTechniqueIdAndSection($id, $section){
        return $this->db
            ->select('thumbnail.width as thumbnail_width, thumbnail.height as thumbnail_height, thumbnail.location as thumbnail_location,'
                .' media.id, media.media_type, media.name, media.caption,'
                .' media_file.mime, media_file.size, media_file.location, media_file.width, media_file.height')
            ->from('media')
            ->join('media_file', 'media.original_id=media_file.id')
            ->join('media_file as thumbnail', 'media.thumbnail_id=thumbnail.id')
            ->join('media_in_section', 'media.id=media_in_section.media_id')
            ->join('technique', 'media_in_section.technique_id=technique.id')
            ->where('technique.id',$id)
            ->where('media_in_section.section',$section)
            ->get()->result();

    }


    function getMediaInfoById($id){
        //select thumbnail.location as thumbnail_location, media.name, media_file.location, media.caption, media_file.width, media_file.height 
        //from media join media_file on media.original_id=media_file.id join media_file as thumbnail on media.thumbnail_id=thumbnail.id
        return $this->db
            ->select('thumbnail.width as thumbnail_width, thumbnail.height as thumbnail_height, thumbnail.location as thumbnail_location,'
                .' media.id, media.media_type, media.name, media.caption,'
                .' media_file.mime, media_file.size, media_file.location, media_file.width, media_file.height')
            ->from('media')
            ->join('media_file', 'media.original_id=media_file.id')
            ->join('media_file as thumbnail', 'media.thumbnail_id=thumbnail.id')
            ->where('media.id',$id)->get()->row();

            //thumbnail_width, thumbnail_height, thumbnail_location,
            //id, media_type, name, caption,
            //mime, size, location, width, height
    }

    function getNextMediaInfo($id){
        return $this->db
            ->select('thumbnail.width as thumbnail_width, thumbnail.height as thumbnail_height, thumbnail.location as thumbnail_location,'
                .' media.id, media.media_type, media.name, media.caption,'
                .' media_file.mime, media_file.size, media_file.location, media_file.width, media_file.height')
            ->from('media')
            ->join('media_file', 'media.original_id=media_file.id')
            ->join('media_file as thumbnail', 'media.thumbnail_id=thumbnail.id')
            ->join('media as media_this', 'media.name>media_this.name')
            ->where('media_this.id',$id)
            ->order_by('name','ASC')->limit(1)
            ->get()->row();
    }

    function getPrevMediaInfo($id){
        return $this->db
            ->select('thumbnail.width as thumbnail_width, thumbnail.height as thumbnail_height, thumbnail.location as thumbnail_location,'
                .' media.id, media.media_type, media.name, media.caption,'
                .' media_file.mime, media_file.size, media_file.location, media_file.width, media_file.height')
            ->from('media')
            ->join('media_file', 'media.original_id=media_file.id')
            ->join('media_file as thumbnail', 'media.thumbnail_id=thumbnail.id')
            ->join('media as media_this', 'media.name<media_this.name')
            ->where('media_this.id',$id)
            ->order_by('name','DESC')->limit(1)
            ->get()->row();
    }


    function createMediaInfo(
        $media_name, $media_caption, $media_type, 
        $file_location, $file_mime, $file_width, $file_height, 
        $thumbnail_location, $thumbnail_width, $thumbnail_height, $thumbnail_mime
     ){
        $this->db->trans_start();

        $this->db->insert('media_file', array(
            'location' =>$thumbnail_location,
            'width' =>$thumbnail_width,
            'height' =>$thumbnail_height,
            'mime'=>$thumbnail_mime,
        ));
        $thumbnail_id = $this->db->insert_id();

        $this->db->insert('media_file', array(
            'location' =>$file_location,
            'width' =>$file_width,
            'height' =>$file_height,
            'mime'=>$file_mime,
        ));
        $original_id = $this->db->insert_id();

        $this->db->insert('media', array(
            'name' => $media_name,
            'caption' => $media_caption,
            'media_type' => $media_type,
            'thumbnail_id' => $thumbnail_id,
            'original_id' => $original_id,
        ));

        $this->db->trans_complete();
        return  $this->db->trans_status();
    }


    function updateMediaInfo( $media_id,
        $media_name, $media_caption, $media_type, 
        $file_location, $file_mime, $file_width, $file_height, 
        $thumbnail_location, $thumbnail_width, $thumbnail_height, $thumbnail_mime
     ){
        $this->db->trans_start();

        $this->db->set( array(
            'name' => $media_name,
            'caption' => $media_caption,
            'media_type' => $media_type,
        ))->where('id',$media_id)->update('media');

        $media_file_ids = $this->db->select('thumbnail_id, original_id')
            ->from('media')->where('id',$media_id)->get()->row();

        $this->db->set(array(
            'location' =>$thumbnail_location,
            'width' =>$thumbnail_width,
            'height' =>$thumbnail_height,
            'mime'=>$thumbnail_mime,
        ))->where('id', $media_file_ids->thumbnail_id)->update('media_file');

        $this->db->set( array(
            'location' =>$file_location,
            'width' =>$file_width,
            'height' =>$file_height,
            'mime'=>$file_mime,
        ))->where('id', $media_file_ids->original_id)->update('media_file');

        $this->db->trans_complete();
        return  $this->db->trans_status();
    }

    function deleteById($id){
        $this->db->trans_start();
        $media = $this->db->from('media')->where('id', $id)->get()->row();
        $this->db->where('id',$id)->delete('media');
        $this->db->where('id',$media->thumbnail_id)->delete('media_file');
        $this->db->where('id',$media->original_id)->delete('media_file');

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

}