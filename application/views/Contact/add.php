<?php

/**
 * TechniqueFinder - add.php
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
    <title>TF Admin | Create Contact</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Create Contact</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Contact/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Contact list</a>
                        </button>
                    </div>





                    <?php
                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <?php echo form_open("contact/validate_new/"); ?>

                    <div style="background-color: #f2f2f1 ">
                        <table style="text-align: left;">
                            <tr>
                                <td class="tf-font-orange">Title</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="title" value="<?php if (isset($data['title'])) {
                                                                                echo $data['title'];
                                                                            } ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            <tr>
                                <td class="tf-font-orange">Name</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="name" value="<?php if (isset($data['name'])) {
                                                                                echo $data['name'];
                                                                            } ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            <tr>
                                <td class="tf-font-orange">Position</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="position" value="<?php if (isset($data['position'])) {
                                                                                    echo $data['position'];
                                                                                } ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>


                            <tr>
                                <td class="tf-font-orange">Telephone</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="telephone" value="<?php if (isset($data['telephone'])) {
                                                                                    echo $data['telephone'];
                                                                                } ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>


                            <tr>
                                <td class="tf-font-orange">Email</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="email" value="<?php if (isset($data['email'])) {
                                                                                echo $data['email'];
                                                                            } ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>


                            <tr>
                                <td class="tf-font-orange">Technique Contact</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input name="technique_contact" type="checkbox" <?php if (isset($data['technique_contact'])) {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo 'unchecked';
                                                                                    } ?>>
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>


                            <tr>
                                <td class="tf-font-orange">Location</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <select name="location" style="width:95%; background-color: #fcfcfc;">
                                        <?php
                                        foreach ($locations as $locations) {
                                            echo '<option id="' . $locations->id . '">' . $locations->institution . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>

                    <button id="update" class="tf-button" type="submit">
                        <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Create</span>
                    </button>

                    <button id="update" type="button" class="tf-button" type="submit" onclick="window.location='<?php echo site_url("Contact/index"); ?>'">
                        <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Cancel</span>
                    </button>

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