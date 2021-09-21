<?php

/**
 * TechniqueFinder - show.php
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
    <title>TF Admin | Show User</title>
</head>
<link href="<?php echo base_url(); ?>/assets/DataTables/datatables.min.css" rel="text/java">
<link href="<?php echo base_url(); ?>/assets/DataTables/datatables.min.js" type="text/javascript">
<link href="<?php echo base_url(); ?>/assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js" type="text/javascript">

<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row" style="margin-left: 1em; ">
                        <h1 class="tf-heading"> Show User</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
                        </button>
                    </div>


                    <?php
                    if ($this->session->flashdata('success-warning-message')) {
                        echo '<div id="success-warning-message" class="success-warning-message tf-font tf-font-size">';
                        echo $this->session->flashdata('success-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <div class="tf-background-color">
                        <table style="text-align: left;">
                            <tr>
                                <td class="tf-font-orange">User Account Email</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size"><?php echo $user_data[0]['username']; ?></td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange">Full name</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size"><?php echo $user_data[0]['full_name'] ?></td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange">Additional Email Address</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size"><?php echo $user_data[0]['second_email'] ?></td>
                            </tr>
                        </table>
                    </div>

                    <button class="tf-button" onclick="window.location='<?php echo site_url("user/edit/" . $this->session->userdata('id')) ?>'">
                        <span class="tf-edit">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Edit</span>
                    </button>
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