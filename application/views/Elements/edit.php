<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('layout/admin_header.php'); ?>

<head>
    <title>TF Admin | Edit Elements</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Update Elements</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="">Admin Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Elements/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Elements list</a>
                        </button>
                    </div>

                    <?php
                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <?php echo form_open("elements/validateEdit/" . $data['id']); ?>

                    <div class="tf-background-color">
                        <table style="text-align: left;">
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
                                <td class="tf-font-orange">Elements</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <?php
                                    // Display tick boxes for each element with current values 'checked'
                                    $sym_array = str_split($data['symbols']);
                                    foreach($elements as $idx=>$element) {
                                        echo "<input type='checkbox'";
                                        if (in_array($element->symbol, $sym_array)) {
                                            echo " checked";
                                        }
                                        echo " name='" . $element->name . "'>". $element->name . "</input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                        // Tickboxes in rows of 10
                                        if ($idx % 10 == 9) {
                                            echo "<br/>";
                                        }
                                    }
                                    ?>
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

                    <button id="update" class="tf-button" type="button" onclick="deleteElements()">
                        <span class="tf-delete">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Delete</span>
                    </button>

                    <button id="update" type="button" class="tf-button" type="submit" onclick="window.location='<?php echo site_url("Elements/index"); ?>'">
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
    function deleteElements() {
        if (confirm("Are you sure?")) {
            window.location.assign('<?php echo site_url("Elements/delete/") . $data['id'] ?>')
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
