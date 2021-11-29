<?php

/**
 * TechniqueFinder - edit.php
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
?>

<?php $this->load->view('layout/admin_header.php'); ?>

<head>
    <title>TF Admin | Edit StaticContent</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Edit StaticContent</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>staticContent/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">StaticContent List</a>
                        </button>
                    </div>




                    <?php

                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>


                    <?php echo form_open('staticContent/update/' . $static_data['id']); ?>
                    <div class="tf-background-color">
                        <table style="text-align: left;">
                            <tr>
                                <td class="tf-font-orange">Name</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <?php if ($static_data['name'] == 'tf.home.quickGuide') {
                                        echo "Quick guide on the home page";
                                    }
                                    if ($static_data['name'] == 'tf.home.optionsExplanation') {
                                        echo "Options explanation on the home page";
                                    }
                                    if ($static_data['name'] == 'tf.home.searchExplanation') {
                                        echo "Search explanation on the home page";
                                    }
                                    if ($static_data['name'] == 'tf.home.allTechniquesExplanation') {
                                        echo "List all techniques explanation on the home page";
                                    }
                                    if ($static_data['name'] == 'tf.home.infoboxContent') {
                                        echo "Infobox (right hand side bar) content on the home page";
                                    }
                                    if ($static_data['name'] == 'tf.geochemChoices.quickGuide') {
                                        echo "Text at the top of \"Geochemical Analysis and Age Determination\" page";
                                    }
                                    if ($static_data['name'] == 'tf.geochemChoices.comparison.title') {
                                        echo "Comparison text on the choices for geochemistry page (not used)";
                                    }
                                    if ($static_data['name'] == 'tf.geochemChoices.step1.title') {
                                        echo "Title for first step for \"Geochemical Analysis and Age Determination\" page";
                                    }
                                    if ($static_data['name'] == 'tf.geochemChoices.step2.title') {
                                        echo "Title for second step for \"Geochemical Analysis and Age Determination\" page";
                                    }
                                    if ($static_data['name'] == 'tf.geochemChoices.step3.title') {
                                        echo "Title for third step for \"Geochemical Analysis and Age Determination\" page";
                                    }
                                    if ($static_data['name'] == 'tf.expProcChoices.quickGuide') {
                                        echo "Text at the top of \"Experimental Procedures\" page";
                                    }
                                    if ($static_data['name'] == 'tf.menu') {
                                        echo "Main menu on public site";
                                    }
                                    if ($static_data['name'] == 'tf.tracking.ammrf') {
                                        echo "Tracking AMMRF (not used)";
                                    }
                                    if ($static_data['name'] == ' tf.tracking.intersect') {
                                        echo "Tracking Intersect (not used)";
                                    }
                                    ?></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr style="width:50em;">
                                <td class="tf-font-orange">Text</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/ckeditor/ckeditor.js"></script>
                                    <textarea name="static_text" class="ckeditor" id="ckeditor"><?php if (isset($static_data['text'])) {
                                                                                                    echo $static_data['text'];
                                                                                                }; ?></textarea>
                                </td>
                                </td>
                            </tr>

                        </table>
                    </div>

                    <button id="update" class="tf-button" type="submit">
                        <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Update</span>
                    </button>

                    <?php echo form_close(); ?>

                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #ckeditor {
        position: ;
        left: 30px;
        top: 45px;
    }
</style>
<link href="<?php echo base_url(); ?>/assets/js/jquery-1.9.0.min.js" rel="text/javascript">
<div class='container-md'>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <?php $this->load->view('layout/admin_footer.php') ?>

            </div>
        </div>
    </div>
</div>
