<?php
/**
 * TechniqueFinder - create.php
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
?>

<?php $this->load->view('layout/header.php');?>
<head><title>TF Admin | Create Reference</title></head>

<div class="nav tf-navbar">
    <button class="btn" onclick="">
        <span class="home-icon">&nbsp;</span>
        <a style="text-decoration: none;" href="<?php echo base_url();?>TechniqueFinder/index">Admin Home</a>
    </button>
    <button class="btn" onclick="">
        <span class="home-icon">&nbsp;</span>
        <a style="text-decoration: none;" href="<?php echo base_url();?>References/index">Reference List</a>
    </button>
</div>
<div class="row" style="margin-left: 1em; ">
    <h1 class="tf-heading"> Create Reference</h1>
</div>

<?php
if ($this->session->flashdata('error-warning-message')){
    echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
    echo $this->session ->flashdata('error-warning-message');
    echo '</div>';
}

?>

<?php echo form_open('References/validateCreate/');?>
<div class="tf-box" style="width: 950px;">
    <table style="text-align: left;display: block; clear: both;" >
        <tr style="width:50em;">
            <td class="tf-font-orange">Reference Names</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">

                <textarea name="referenceNames"  rows="6" cols="112"><?php if(isset($data['referenceNames'])){echo $data['referenceNames'];} ?></textarea>
            </td>
            </td>

        </tr>

        <tr><td>&nbsp;</td></tr>
        <tr style="width:50em;">
            <td class="tf-font-orange">Title</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <script type="text/javascript" src="<?php echo base_url();?>/assets/ckeditor/ckeditor.js"></script>
                <textarea name="title" class="ckeditor" id="ckeditor">
                        <html><?php if(isset($data['title'])){echo $data['title'];} ?></html>
                </textarea>
            </td>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr style="width:50em;">
            <td class="tf-font-orange">Full Reference</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <script type="text/javascript" src="<?php echo base_url();?>/assets/ckeditor/ckeditor.js"></script>
                <textarea name="fullReference" class="ckeditor" id="ckeditor">
                        <html><?php if(isset($data['fullReference'])){echo $data['fullReference'];} ?></html>
                </textarea>
            </td>
            </td>
        </tr>

        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>

        <tr style="width:50em;">
            <td class="tf-font-orange">URL</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">

                <textarea name="url"  rows="6" cols="112"><?php if(isset($data['url'])){echo $data['url'];} ?></textarea>
            </td>
            </td>

        </tr>

    </table>
</div>

<button id="update" class="tf-button" type="submit" >
    <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
    <span class="tf-button-label">Create</span>
</button>

<button id="update" class="tf-button" type="button"  onclick="window.location='<?php echo site_url("References/index");?>'">
    <span class="tf-cancel"></span>
    <span class="tf-button-label">Cancel</span>
</button>

<?php echo form_close();?>


