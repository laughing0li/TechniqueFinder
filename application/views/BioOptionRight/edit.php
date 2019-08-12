<?php
/**
 * TechniqueFinder - edit.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('layout/header.php');?>
    <head><title>TF Admin | Edit Option</title></head>
    <div class="nav tf-navbar">
        <button class="btn" onclick="window.location='<?php echo base_url();?>TechniqueFinder/index'">
            <span class="home-icon">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
        </button>
        <button class="btn" onclick="window.location='<?php echo base_url();?>BioOptionRight/index'">
            <span class="tf-database-table">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">Option list</a>
        </button>
    </div>


    <div class="row" style="margin-left: 1em; ">
        <h1 class="tf-heading"> Edit Option</h1>
    </div>

<?php
if ($this->session->flashdata('error-warning-message')){
    echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
    echo $this->session ->flashdata('error-warning-message');
    echo '</div>';
}

?>

<?php echo form_open("BioOptionRight/update/".$option_data->id);?>

    <div class="tf-box">
        <table style="text-align: left;">

            <tr>
                <td class="tf-font-orange">Name</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <input type="text" name="name" value="<?php echo $option_data->name;?>" />
                </td>
            </tr>


        </table>
    </div>

    <div>
        <button id="update" class="tf-button" type="submit">
            <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
            <span class="tf-button-label">Update</span>
        </button>

        <button type="button" class="tf-button" onclick="window.location='<?php echo base_url();?>BioOptionRight/index'">
            <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
            <span class="tf-button-label">Cancel</span>
        </button>
    </div>

<?php echo form_close();?>

    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>


<?php $this->load->view('layout/footer.php');?>