<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('layout/admin_header.php'); ?>

<head>
    <title>TF Admin | Show Elements</title>
</head>

<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Show Elements</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="">
                            <span class="home-icon">&nbsp;</span>
                            <a style="text-decoration: none;" href="<?php echo base_url(); ?>TechniqueFinder/index">Admin Home</a>
                        </button>
                        <button class="btn" onclick="">
                            <span class="home-icon">&nbsp;</span>
                            <a style="text-decoration: none;" href="<?php echo base_url(); ?>Elements/index">Elements List</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Elements/add'">
                            <span class="tf-database-add">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">New Elements</a>
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
                        <table style="text-align: left;display: block; clear: both;">
                            <tr style="width:50em;">
                                <td class="tf-font-orange">Name</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <?php
                                    if (isset($data['name'])) {
                                        echo $data['name'];
                                    }
                                    ?>
                                </td>
                                </td>

                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr style="width:50em;">
                                <td class="tf-font-orange">Symbols</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <?php
                                    if (isset($data['symbols'])) {
                                        echo $data['symbols'];
                                    }
                                    ?>

                                </td>
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
                                <button id="update" class="tf-button" onclick="window.location='<?php echo site_url("Elements/edit/") . $data['id']; ?>'">
                                    <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                                    <span class="tf-button-label">Edit</span>
                                </button>
                                <button id="update" type="button" class="tf-button" type="submit" onclick="window.location='<?php echo site_url("Elements/index"); ?>'">
                                    <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
                                    <span class="tf-button-label">Cancel</span>
                                </button>
                            </div>
                            <div class="col-md-6" style="margin: auto;">
                                <?php
                                if ($prev_location == 0) {
                                    echo '<a class="tf-font-color" href="' . base_url() . 'Elements/view/' . $next_location . '">next &gt;</a>';
                                } else if ($next_location == 0) {
                                    echo '<a class="tf-font-color" href="' . base_url() . 'Elements/view/' . $prev_location . '">&lt;  prev </a>';
                                } else {
                                    echo '<a class="tf-font-color" href="' . base_url() . 'Elements/view/' . $prev_location . '">&lt; previous </a> |
                                <a class="tf-font-color" href="' . base_url() . 'Elements/view/' . $next_location . '">next &gt;</a>';
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
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
