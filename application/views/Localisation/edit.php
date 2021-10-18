<?php

defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view('layout/admin_header.php'); ?>

<head>
    <title>TF Admin | Edit Localisation</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Update Localisation</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="">Admin Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Localisation/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Localisation List</a>
                        </button>
                    </div>




                    <?php
                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <?php echo form_open("localisation/validateEdit/" . $data['id']); ?>

                    <div class="tf-background-color">
                        <table style="text-align: left;">
                            <tr>
                                <td class="tf-font-orange">Location</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <select name="location">
                                        <?php
                                        if (isset($data['institution'])) {
                                            foreach ($locations as $locations) {
                                                echo '<option id="' . $locations->id . '">' . $locations->institution . '</option>';
                                            }
                                            echo '<option id="' . $data['lid']->id . '" selected>' . $data['institution'] . '</option>';
                                        }

                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange">Year Commissioned</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="title" value="<?php if (isset($data['yr_commissioned'])) {
                                                                                echo $data['yr_commissioned'];
                                                                            } ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tf-font-orange">Applications</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="name" value="<?php if (isset($data['applications'])) {
                                                                                echo $data['applications'];
                                                                            } ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>

                    <button id="update" class="tf-button" type="submit">
                        <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Update</span>
                    </button>

                    <button id="update" class="tf-button" type="button" onclick="deleteLocalisation()">
                        <span class="tf-delete">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Delete</span>
                    </button>

                    <button id="update" type="button" class="tf-button" type="submit" onclick="window.location='<?php echo site_url("Localisation/index"); ?>'">
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

<script>
    ////'
    function deleteLocalisation() {
        if (confirm("Are you sure?")) {
            window.location.assign('<?php echo site_url("Localisation/delete/") . $data['id'] ?>')
        }

    }
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
