<?php

/**
 * TechniqueFinder - new.php
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
    <title>TF Admin | Create User</title>
</head>

<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row" style="margin-left: 1em; ">
                        <h1 class="tf-heading"> Create User</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>user/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">User list</a>
                        </button>
                    </div>

                    <?php
                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <?php echo form_open("user/validate_new/"); ?>

                    <div class="tf-background-color">
                        <table style="text-align: left;">
                            <tr>
                                <td class="tf-font-orange">User Account Email</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="username" value="<?php if (isset($_POST['username'])) {
                                                                                    echo $_POST['username'];
                                                                                } ?>" />
                                    &nbsp;&nbsp;&nbsp;Please ensure the username is a valid email address.
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            <tr>
                                <td class="tf-font-orange">Full Name</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="full_name" value="<?php if (isset($_POST['full_name'])) {
                                                                                    echo $_POST['full_name'];
                                                                                } ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            <tr>
                                <td class="tf-font-orange">Super administrator</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="checkbox" name="super_administrator" <?php if (isset($_POST['super_administrator'])) {
                                                                                            echo "checked";
                                                                                        } else {
                                                                                            echo "unchecked";
                                                                                        } ?> />
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>



                            <tr>
                                <td class="tf-font-orange">Additional Email Address</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="second_email" value="<?php if (isset($_POST['second_email'])) {
                                                                                        echo $_POST['second_email'];
                                                                                    } ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            <tr>
                                <td class="tf-font-orange">Confirm additional email addresss</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="confirm_second_email" value="<?php if (isset($_POST['confirm_second_email'])) {
                                                                                                echo $_POST['confirm_second_email'];
                                                                                            } ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange"></td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <br />
                                    <strong>Remember:</strong> A new user account will be created with password=admin. Please inform the new user how to access the system.
                                </td>
                            </tr>

                        </table>
                    </div>

                    <button id="update" class="tf-button" type="submit">
                        <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Create</span>
                    </button>

                    <?php echo form_close(); ?>

                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#update').click(function(e) {
            e.preventDefault();

            var username = $("input[name='username']").val();
            var full_name = $("input[name='full_name']").val();
            var super_administrator = $("input[name='super_administrator']").val()
            var second_email = $("input[name='second_email']").val();
            var confirm_second_email = $("input[name='confirm_second_email']").val();

            $.ajax({
                url: "<?php echo base_url(); ?>/user/validate_new",
                type: 'POST',
                dataType: "json",
                data: {
                    username: username full_name: full_name,
                    super_administrator: super_administrator,
                    second_email: second_email,
                    confirm_second_email: confirm_second_email
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        //alert(data.success);
                        //window.location.href = "<?php echo base_url() ?>/user/show <?php echo '/' . $this->session->id; ?>"
                    } else {
                        //$( ".message" ).addClass( "message_error" );
                        //$(".message").html(data.error);
                    }
                }
            });
        });

    });
</script>

<div class='container-md'>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <?php $this->load->view('layout/admin_footer.php') ?>

            </div>
        </div>
    </div>
</div>