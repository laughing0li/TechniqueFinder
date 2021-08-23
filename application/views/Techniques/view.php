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
    <title>TF Admin | Show Technique</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Show Technique</h1>
                    </div>

                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>/Techniques/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Technique List</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Techniques/createTechnique'">
                            <span class="tf-database-add">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">New Technique</a>
                        </button>
                    </div>




                    <?php
                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <body class="tf-font">
                        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/ckeditor/ckeditor.js"></script>

                        <?php echo form_open("techniques/validateEditTechnique/" . $id); ?>
                        <div style="background-color: #f2f2f1">
                            <table style="text-align: left;">

                                <tr>
                                    <td class="tf-font-orange  " style="position: absolute;">Name</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <div class="" name="technique_name"><?php if (isset($technique_name)) {
                                                                                echo $technique_name;
                                                                            }; ?></div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="tf-font-orange  " style="position: absolute;">Alternative names</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <div class="" name="alternative_names"><?php if (isset($alternative_names)) {
                                                                                    echo $alternative_names;
                                                                                }; ?></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="tf-font-orange  ">Short Description</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <div name="short_description" class="" id="short_description">
                                            <?php if (isset($short_description)) {
                                                echo $short_description;
                                            }; ?></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="tf-font-orange  ">Long Description</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <div name="long_description" class="" id=""><?php if (isset($long_description)) {
                                                                                        echo $long_description;
                                                                                    }; ?></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="tf-font-orange  ">Keywords</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <div class="" name="keywords"><?php if (isset($keywords)) {
                                                                            echo $keywords;
                                                                        }; ?></div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="tf-font-orange  ">Contacts</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <div class="" name="contacts"><?php if (isset($contacts)) {
                                                                            foreach ($contacts as $c) {
                                                                                echo "<li>" . $c['name'] . "-" . $c['institution'] . "</li>";
                                                                            }
                                                                        } else {
                                                                            echo "There are no associated Contacts";
                                                                        } ?></div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="tf-font-orange  ">Case Studies</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <div name="case">
                                            <?php if (isset($case)) {
                                                foreach ($case as $c) {
                                                    echo "<li>" . strip_tags($c['name']) . "</li>";
                                                }
                                            } else {
                                                echo "There are no associated Case Studies";
                                            } ?></div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <tr>
                                    <td class="tf-font-orange  ">References Studies</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <div class="" name="references"><?php if (isset($references) and count($references) > 0) {
                                                                            foreach ($references as $c) {
                                                                                echo "<li>" . $c['reference_names'] . "</li>";
                                                                            }
                                                                        } else {
                                                                            echo "There are no associated references";
                                                                        } ?></div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="tf-font-orange  ">Associated Options</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <div class="" name="associated"><?php if (isset($associated)) {
                                                                            if (isset($associated['biologyArray'])) {
                                                                                if (count($associated['biologyArray']) > 0) {
                                                                                    echo "<br><strong>Biology</strong><br>";
                                                                                }

                                                                                foreach ($associated['biologyArray'] as $ba) {
                                                                                    echo "<li>" . $ba . "</li>";
                                                                                }
                                                                            }
                                                                            if (isset($associated['physicsArray'])) {
                                                                                if (count($associated['physicsArray']) > 0) {
                                                                                    echo "<br><strong>Physics</strong><br>";
                                                                                }
                                                                                foreach ($associated['physicsArray'] as $pa) {
                                                                                    echo "<li>" . $pa . "</li>";
                                                                                }
                                                                            }
                                                                        } else {
                                                                            echo "There are no associated options.";
                                                                        }; ?></div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>&nbsp;</td>
                                </tr>



                                <tr>
                                    <td class="tf-font-orange  ">Media examples for LIST</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td>
                                        <div class="table-responsive tf-font tf-font-size">
                                            <input type="hidden" id="media_items_selected_hidden" name="media_items_selected_hidden" value="" />
                                            <div id="list_images"></div>
                                    </td>


                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="tf-font-orange  ">Media examples for OUTPUT</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td>
                                        <div class="table-responsive tf-font tf-font-size">
                                            <input type="hidden" id="media_output_items_selected_hidden" name="media_output_items_selected_hidden" value="" />
                                            <div id="output_images"></div>
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="tf-font-orange  ">Media examples for Instrument</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td>
                                        <div class="table-responsive tf-font tf-font-size">
                                            <input type="hidden" id="media_instrument_items_selected_hidden" name="media_instrument_items_selected_hidden" value="" />
                                            <div id="instrument_images"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>

                        <div class="container" style="margin-bottom: 30px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <button id="update" class="tf-button" type="button" onclick="window.location='<?php echo site_url("Techniques/edit/") . $id; ?>'">
                                        <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                                        <span class="tf-button-label">Edit</span>
                                    </button>
                                    <button id="update" type="button" class="tf-button" type="button" onclick="deleteTechnique(<?php echo $id; ?>)">
                                        <span class="tf-delete">&nbsp;&nbsp;&nbsp;</span>
                                        <span class="tf-button-label">Delete</span>
                                    </button>
                                </div>
                                <div class="col-md-6" style="margin: auto;">
                                    <?php
                                    if ($prev_location == 0) {
                                        echo '<a style="color: #f2f2f1" href="' . base_url() . 'Techniques/view/' . $next_location . '">next &gt;</a>';
                                    } else if ($next_location == 0) {
                                        echo '<a style="color: #f2f2f1" href="' . base_url() . 'Techniques/view/' . $prev_location . '">&lt;  prev </a>';
                                    } else {
                                        echo '<a style="color: #f2f2f1" href="' . base_url() . 'Techniques/view/' . $prev_location . '">&lt; previous </a> |
                                        <a style="color: #f2f2f1" href="' . base_url() . 'Techniques/view/' . $next_location . '">next &gt;</a>';
                                    }

                                    ?>
                                </div>
                            </div>
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

<script>
    var mediaSelected = [];
    var outputSelected = [];
    var instrumentSelected = [];
    var contactSelected = [];
    var caseSelected = [];
    var referencesSelected = [];


    /////////////////////////////////////////////////////////////////////---POSTBACKS FROM PHP---///////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Postback Media List
    <?php if (isset($media_items_selected_hidden) && $media_items_selected_hidden != '') { ?>
        mediaSelected = <?php echo $media_items_selected_hidden; ?>;

        document.getElementById('media_items_selected_hidden').value = mediaSelected
    <?php } else { ?>
        mediaSelected = []
    <?php } ?>

    //Postback Output List
    <?php if (isset($media_output_items_selected_hidden) && $media_output_items_selected_hidden != '') { ?>
        outputSelected = [<?php echo $media_output_items_selected_hidden; ?>];
        document.getElementById('media_output_items_selected_hidden').value = outputSelected

    <?php } else { ?>
        outputSelected = []
    <?php } ?>

    //Postback Instrument List
    <?php if (isset($media_instrument_items_selected_hidden) && $media_instrument_items_selected_hidden != '') { ?>
        instrumentSelected = [<?php echo $media_instrument_items_selected_hidden; ?>];
        document.getElementById('media_instrument_items_selected_hidden').value = instrumentSelected
    <?php } else { ?>
        instrumentSelected = []
    <?php } ?>

    /////////////////////////////////////////////////////////////////////////////-------BUILD TABLES FROM POSTBACK-------////////////////////////////////////////////////////////////////////////////////////////


    if (mediaSelected != []) {
        <?php foreach ($media_list as $media_item) { ?>
            if (mediaSelected == <?php echo $media_item->id; ?>) {
                $('#list_images').append("<img height=100 width=100  style='margin-left:0.3em;' src='<?php echo base_url('/media-dir/' . $media_item->location); ?>' alt='No Image Uploaded'/>");
            }
        <?php } ?>
    }

    if (outputSelected != []) {
        <?php foreach ($media_list as $media_item) { ?>

            outputSelected.forEach(function(element) {
                if (element == <?php echo $media_item->id; ?>) {
                    $('#output_images').append("<img height=100 width=100 style='margin-left:0.3em;' src='<?php echo base_url('/media-dir/' . $media_item->location); ?>' alt='No Image Uploaded'/>");
                }
            })

        <?php } ?>

    }

    if (instrumentSelected != []) {
        <?php foreach ($media_list as $media_item) { ?>
            instrumentSelected.forEach(function(element) {
                if (element == <?php echo $media_item->id; ?>) {

                    $('#instrument_images').append("<img height=100 width=100 style='margin-left:0.3em;' src='<?php echo base_url('/media-dir/' . $media_item->location); ?>' alt='No Image Uploaded'/>");
                }
            })

        <?php } ?>

    }


    function arrayRemove(arr, value) {

        return arr.filter(function(ele) {
            return ele != value;
        });

    }


    function deleteTechnique(id) {
        if (confirm("Are you sure?")) {
            window.location.assign('<?php echo site_url("Techniques/delete/") ?>' + id)
        }

    }
</script>