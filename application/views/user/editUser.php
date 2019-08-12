<?php
/**
 * TechniqueFinder - editUser.php
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
    <head><title>TF Admin | Edit User</title></head>
    <div class="nav tf-navbar">
        <button class="btn" onclick="window.location='<?php echo base_url();?>TechniqueFinder/index'">
            <span class="home-icon">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
        </button>
    </div>


    <div class="row" style="margin-left: 1em; ">
        <h1 class="tf-heading"> Edit User</h1>
    </div>

<?php
if ($this->session->flashdata('error-warning-message')){
    echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
    echo $this->session ->flashdata('error-warning-message');
    echo '</div>';
}

?>

<?php echo form_open("user/update_editUser/".$user_data[0]['id']);?>

    <div class="tf-box">
        <table style="text-align: left;">
            <tr>
                <td class="tf-font-orange">User Account Email</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size"><?php echo $user_data[0]['username'];?></td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr>
                <td class="tf-font-orange">Full Name</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <input type="text" name="full_name" value="<?php echo $user_data[0]['full_name'];?>" />
                </td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr>
                <td class="tf-font-orange">Super administrator</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <input type="checkbox" id="super_administrator" name="super_administrator" <?php if ($user_data[0]['username']=='admin@ammrf.org.au'){ echo " onClick='return false;' checked";}
                    else if($user_data[1][0]['super_admin'] == 'Yes'){echo "checked";}else{echo "unchecked";}  ?> />
                </td>
            </tr>

        </table>
    </div>

    <button id="update" class="tf-button" type="submit">
        <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
        <span class="tf-button-label">Update</span>
    </button>

<?php echo form_close();?>

    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>


<?php $this->load->view('layout/footer.php');?>