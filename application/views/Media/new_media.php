<?php

/**
 * TechniqueFinder - new_media.php
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
    <title>TF Admin | Media List</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading">
                            <?php
                            if ($media_type == 'IMAGE') {
                                echo 'Create IMAGE';
                            } else {
                                echo 'Create MOVIE';
                            }
                            ?>
                        </h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Media/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Media List</a>
                        </button>
                    </div>

                    <?php
                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <?php
                    if ($media_type == 'IMAGE') {
                        echo form_open_multipart('Media/create_image');
                    } else {
                        echo form_open_multipart('Media/create_movie');
                    }
                    ?>

                    <div class="tf-background-color">
                        <table style="text-align: left; width:90%;">
                            <tr>
                                <td class="tf-font-orange">Caption</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <textarea name="caption" class="tf-input-big"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange">File</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input class='tf-file-input' type="file" name="userfile" />
                                </td>
                            </tr>

                            <tr style="<?php if ($media_type != 'MOVIE') {
                                            echo 'display:none';
                                        } ?>">
                                <td class="tf-font-orange">Frame Image</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input class='tf-file-input' type="file" name="thumbnailfile" />
                                </td>
                            </tr>

                        </table>
                    </div>

                    <div>
                        <button id="save" class="tf-button" type="submit">
                            <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                            <span class="tf-button-label">Create</span>
                        </button>
                        <button type="button" class="tf-button" onclick="window.location='<?php echo base_url(); ?>Media/index'">
                            <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
                            <span class="tf-button-label">Cancel</span>
                        </button>
                    </div>



                    <?php echo form_close(); ?>

                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class='container-md'>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <?php $this->load->view('layout/admin_footer.php') ?>

            </div>
        </div>
    </div>
</div>