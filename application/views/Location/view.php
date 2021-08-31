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
    <title>TF Admin | Show Location</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Show Location</h1>

                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Location/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Location List</a>
                        </button>
                    </div>

                    <?php
                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <div style="background-color: #f2f2f1 ">
                        <table style="text-align: left; width:90%;">
                            <tr>
                                <td class="tf-font-orange tf-td-name-col">Institution</td>
                                <td class="tf-font tf-font-size">
                                    <?php echo $location_data->institution; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col">State</td>
                                <td class="tf-font tf-font-size">
                                    <?php echo $location_data->state; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col">Status</td>
                                <td class="tf-font tf-font-size">
                                    <?php echo array('ND' => 'Node', 'LL' => 'Linked Lab')[$location_data->status]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col">Address</td>
                                <td class="tf-font tf-font-size">
                                    <pre style="background-color: transparent; border: 0px; border-radius: 0px;"><?php echo $location_data->address; ?></pre>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange tf-td-name-col">Center Name</td>
                                <td class="tf-font tf-font-size">
                                    <?php echo $location_data->center_name; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;" class="tf-font-orange tf-td-name-col">Associated Techniques</td>
                                <td class="tf-font tf-font-size">
                                    <ul>
                                        <?php
                                        foreach ($associated_techniques as $tech) {
                                            echo '<li><a href="' . base_url() . 'Techniques/view/' . $tech->id . '" >' . $tech->name . '</a></li>';
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
                                <button id="edit" class="tf-button" type="button" onclick="window.location='<?php echo base_url() ?>Location/edit/<?php echo $location_data->id ?>'; ">
                                    <span class="tf-edit">&nbsp;&nbsp;&nbsp;</span>
                                    <span class="tf-button-label">Edit</span>
                                </button>

                                <button type="button" class="tf-button" onclick="if (confirm('Are you sure?')){ window.location='<?php echo base_url() ?>Location/delete/<?php echo $location_data->id ?>'; }">
                                    <span class="tf-delete">&nbsp;&nbsp;&nbsp;</span>
                                    <span class="tf-button-label">Delete</span>
                                </button>
                            </div>
                            <div class="col-md-6" style="margin: auto;">
                                <?php
                                if ($prev_location && $next_location) {
                                    echo '<a href="' . base_url() . 'Location/view/' . $prev_location->id . '">&lt; previous</a>'
                                        . ' | '
                                        . '<a href="' . base_url() . 'Location/view/' . $next_location->id . '">next &gt;</a>';
                                } else if ($prev_location) {
                                    echo '<a href="' . base_url() . 'Location/view/' . $prev_location->id . '">&lt; previous</a>';
                                } else if ($next_location) {
                                    echo '<a href="' . base_url() . 'Location/view/' . $next_location->id . '">next &gt;</a>';
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

<div class='container-md'>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <?php $this->load->view('layout/admin_footer.php') ?>

            </div>
        </div>
    </div>
</div>