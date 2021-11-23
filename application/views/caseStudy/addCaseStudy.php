<?php
/**
 * TechniqueFinder - addCaseStudy.php
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
<head><title>TF Admin | Create Case study</title></head>
<div class="nav tf-navbar">
    <button class="btn" onclick="window.location='<?php echo base_url();?>TechniqueFinder/index'">
        <span class="home-icon">&nbsp;</span>
        <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
    </button>
    <button class="btn" onclick="window.location='<?php echo base_url();?>caseStudy/index'">
        <span class="tf-database-table">&nbsp;</span>
        <a class="tf-font-orange" style="text-decoration: none;">Case study List</a>
    </button>
</div>

<div class="row" style="margin-left: 1em; ">
    <h1 class="tf-heading"> Create Case study </h1>
</div>

<?php

if ($this->session->flashdata('error-warning-message')){
    echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
    echo $this->session ->flashdata('error-warning-message');
    echo '</div>';
}

?>

<?php echo form_open('caseStudy/validateNew/');?>
<div class="tf-box" style="width: 883px;">
    <table style="text-align: left;display: block; clear: both;" >
        <tr style="width:50em;">
            <td class="tf-font-orange">Name</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <script type="text/javascript" src="<?php echo base_url();?>/assets/ckeditor/ckeditor.js"></script>

                <textarea name="caseStudyName" class="ckeditor" id="ckeditor">
                        <html><?php if(isset($data['caseStudyName'])){echo $data['caseStudyName'];}{} ?></html>
                </textarea>
            </td>
            </td>
        </tr>

        <tr><td>&nbsp;</td></tr>

        <tr style="width:50em;">
            <td class="tf-font-orange">URL</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">

                <textarea name="caseStudyURL"  rows="6" cols="112"><?php if(isset($data['caseStudyURL'])){echo $data['caseStudyURL'];}{} ?></textarea>
            </td>
            </td>

        </tr>

    </table>
</div>

<button id="update" class="tf-button" type="submit" >
    <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
    <span class="tf-button-label">Create</span>
</button>

<button id="update" class="tf-button"  type="button" onclick="window.location='<?php echo site_url("caseStudy/index");?>'">
    <span class="tf-delete">&nbsp;&nbsp;&nbsp;</span>
    <span class="tf-button-label">Cancel</span>
</button>

<?php echo form_close();?>







<?php $this->load->view('layout/footer.php');?>
