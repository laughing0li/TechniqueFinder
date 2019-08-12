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

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('layout/header.php');?>
    <head><title>TF Admin | Show User</title></head>
    <link href="<?php echo base_url();?>/assets/DataTables/datatables.min.css" rel="text/java">
    <link href="<?php echo base_url();?>/assets/DataTables/datatables.min.js" type="text/javascript">
    <link href="<?php echo base_url();?>/assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js" type="text/javascript">


    <div class="nav tf-navbar">
        <button class="btn" onclick="window.location='<?php echo base_url();?>TechniqueFinder/index'">
            <span class="home-icon">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
        </button>
        <button class="btn" onclick="window.location='<?php echo base_url();?>user/index'">
            <span class="tf-database-table">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">User List</a>
        </button>
        <button class="btn" onclick="window.location='<?php echo base_url();?>user/new_user'">
            <span class="tf-database-add">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">New User</a>
        </button>
    </div>

    <div class="row" style="margin-left: 1em; ">
        <h1 class="tf-heading"> Show User</h1>
    </div>

<?php
if($this->session->flashdata('success-warning-message')){
    echo '<div id="success-warning-message" style="padding-left: 3em;text-indent: initial;" class="success-warning-message tf-font tf-font-size">';
    echo $this->session->flashdata('success-warning-message');
    echo '</div>';
}

?>



    <div class="tf-box">
        <table style="text-align: left;">
            <tr>
                <td class="tf-font-orange">User Account Email</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size"><?php echo $user_data[0]['username'];?></td>
            </tr>
            <tr>
                <td class="tf-font-orange">Full name</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size"><?php echo $user_data[0]['full_name']?></td>
            </tr>
            <tr>
                <td class="tf-font-orange">Additional Email Address</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size"><?php echo $user_data[0]['second_email']?></td>
            </tr>
            <tr>
                <td class="tf-font-orange">Super admin</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size"><?php echo $user_data[1][0]['super_admin']?></td>
            </tr>
        </table>
    </div>

    <button class="tf-button" onclick="window.location='<?php echo site_url("user/editUser/".$user_data[0]['id'])?>'">
        <span class="tf-edit">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span class="tf-button-label">Edit</span>
    </button>
    <?php if ($user_data[0]['username'] != 'admin@ammrf.org.au'){
    echo '<button id="delete-button" class="tf-button" onclick="deleteUser()">
        <span class="tf-delete">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span class="tf-button-label">Delete</span>
    </button>';
    }?>

    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>


<script>
    ////'
    function deleteUser(){
        if (confirm("Are you sure?")){
            window.location.assign('<?php echo site_url("user/delete/").$user_data[0]['id']?>')
        }

    }
</script>
<?php $this->load->view('layout/footer.php');?>