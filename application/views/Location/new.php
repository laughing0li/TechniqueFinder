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

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('layout/header.php');?>
    <head><title>TF Admin | Create Location</title></head>
    <div class="nav tf-navbar">
        <button class="btn" onclick="window.location='<?php echo base_url();?>TechniqueFinder/index'">
            <span class="home-icon">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
        </button>
        <button class="btn" onclick="window.location='<?php echo base_url();?>Location/index'">
            <span class="tf-database-table">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">Location List</a>
        </button>
    </div>



    <div class="row" style="margin-left: 1em; ">
        <h1 class="tf-heading"> Create Location</h1>
    </div>

<?php
if ($this->session->flashdata('error-warning-message')){
    echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
    echo $this->session ->flashdata('error-warning-message');
    echo '</div>';
}

?>

<?php echo form_open("Location/create");?>

    <div class="tf-box">
        <table style="text-align: left; width:90%;">
            <tr>
                <td class="tf-font-orange">Institution</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <input type="text" name="institution" value="<?php ?>" />
                </td>
            </tr>
            <tr>
                <td class="tf-font-orange">State</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                <select name="state" style="width:95%; background-color: #fcfcfc;">
                    <?php 
                        foreach($all_states as $state){
                            echo '<option value="'.$state.'">'.$state.'</option>';
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td class="tf-font-orange">Status</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                <select name="status" style="width:95%; background-color: #fcfcfc;">
                    <?php 
                        foreach($all_statuses as $statusi_id => $status_name){
                            echo '<option value="'.$statusi_id.'">'.$status_name.'</option>';
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td class="tf-font-orange">Address</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <textarea name="address" class="tf-input-big"></textarea>
                </td>
            </tr>
            <tr>
                <td class="tf-font-orange">Center Name</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <input type="text" name="center_name" value="<?php ?>" />
                </td>
            </tr>

        </table>
    </div>

    <div>
        <button id="save" class="tf-button" type="submit">
            <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
            <span class="tf-button-label">Create</span>
        </button>
        <button type="button" class="tf-button" onclick="window.location='<?php echo base_url();?>Location/index'">
            <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
            <span class="tf-button-label">Cancel</span>
        </button>
    </div>


<?php echo form_close();?>

    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>


<?php $this->load->view('layout/footer.php');?>