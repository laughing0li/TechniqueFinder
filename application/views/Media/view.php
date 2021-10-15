<?php

/**
 * TechniqueFinder - view.php
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
                            if ($media_data->media_type == 'IMAGE') {
                                echo 'Show IMAGE';
                            } else {
                                echo 'Show MOVIE';
                            }
                            ?>
                        </h1>

                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
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
                    <div class="tf-background-color">
                        <table style="text-align: left; width:90%;">
                            <tr>
                                <td class="tf-font-orange tf-td-name-col">Name</td>
                                <td class="tf-font tf-font-size">
                                    <?php echo $media_data->name; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col">Caption</td>
                                <td class="tf-font tf-font-size">
                                    <?php echo $media_data->caption; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col">Media Type</td>
                                <td class="tf-font tf-font-size">
                                    <?php echo $media_data->media_type; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col">Dimensions</td>
                                <td class="tf-font tf-font-size">
                                    <?php echo $media_data->width . 'x' . $media_data->height; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col"> Location </td>
                                <td class="tf-font tf-font-size">
                                    <?php echo $media_data->location; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col"> <?php echo $media_data->media_type == 'IMAGE' ? 'Image' : 'Movie'; ?> </td>
                                <td class="tf-font tf-font-size">
                                    <?php
                                    if ($media_data->media_type == 'IMAGE') {
                                        echo '<img id="media_' . $media_data->id . '" src="' . base_url() . 'media-dir/' . $media_data->location . '" width="' . $media_data->width . '" height="' . $media_data->height . '" alt="[' . $media_data->name . ']">';
                                    } else {
                                        echo '<p>You need <a href="http://www.adobe.com/go/getflashplayer">Flash Player</a> installed to play this media.</p>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col"> Associated techniques </td>`
                                <td class="tf-font tf-font-size">
                                    <ul>
                                        <?php
                                        foreach ($associated_medias as $media) {
                                            echo '<li>' . $media->name . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </td>
                            </tr>

                        </table>
                    </div>

                    <div class="container" style="margin-bottom: 30px;">
                        <div class="row">
                            <div class="col-md-6">
                                <button id="update" class="tf-button" onclick="window.location='<?php echo base_url() . 'Media/edit_media/' . $media_data->id; ?>'">
                                    <span class="tf-edit">&nbsp;&nbsp;&nbsp;</span>
                                    <span class="tf-button-label">Edit</span>
                                </button>
                                <button type="button" class="tf-button" onclick="if (confirm('Are you sure?')){ window.location='<?php echo base_url() . 'Media/delete/' . $media_data->id; ?>'}">
                                    <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
                                    <span class="tf-button-label">Delete</span>
                                </button>
                            </div>
                            <div class="col-md-6" style="margin: auto;">
                                <?php
                                if ($prev_media && $next_media) {
                                    echo '<a class="tf-font-color" href="' . base_url() . 'Media/view/' . $prev_media->id . '">&lt; previous</a>'
                                        . ' | '
                                        . '<a class="tf-font-color" href="' . base_url() . 'Media/view/' . $next_media->id . '">next &gt;</a>';
                                } else if ($prev_media) {
                                    echo '<a class="tf-font-color" href="' . base_url() . 'Media/view/' . $prev_media->id . '">&lt; previous</a>';
                                } else if ($next_media) {
                                    echo '<a class="tf-font-color" href="' . base_url() . 'Media/view/' . $next_media->id . '">next &gt;</a>';
                                } else {
                                    echo 'haha';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                </div>
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
