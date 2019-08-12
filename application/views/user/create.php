<?php
/**
 * TechniqueFinder - create.php
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
    <head><title>TF Admin | Home</title></head>

    <div class="nav tf-navbar">
        <button class="btn" onclick="">
            <span class="home-icon">&nbsp;</span>
            <a style="text-decoration: none;" href="<?php echo base_url();?>TechniqueFinder/index">Home</a>
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

<?php echo form_open("user/validate_edit/".$user_data[0]['id']);?>

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
                <td class="tf-font-orange">Password</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <!--<input type="password" name="password" value="<?php echo set_value('confirm_password');?>"/>-->
                    <input type="password" name="password" value=""/>
                </td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr>
                <td class="tf-font-orange">Confirm Password</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <!--                    <input type="password" name="confirm_password" value="--><?php //echo set_value('confirm_password');?><!--"/>-->
                    <input type="password" name="confirm_password" value=""/>
                </td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr>
                <td class="tf-font-orange">Additional Email Address</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <input type="text" name="second_email" value="<?php
                    if(isset($user_data[0]['second_email'])){
                        echo $user_data[0]['second_email'];
                    }
                    else{
                        echo set_value('confirm_password');
                    }
                    ?>"/>
                </td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr>
                <td class="tf-font-orange">Confirm additional email addresss</td>
                <td>&nbsp;&nbsp;</td>
                <td class="tf-font tf-font-size">
                    <input type="text" name="confirm_second_email" value="<?php echo $user_data[0]['second_email'];?>"/>
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


    <script>
        $(document).ready(function() {
            $('#update').click(function (e) {
                e.preventDefault();

                var full_name = $("input[name='full_name']").val();
                var password = $("input[name='password']").val();
                var confirm_password = $("input[name='confirm_password']").val();
                var second_email = $("input[name='second_email']").val();
                var confirm_second_email = $("input[name='confirm_second_email']").val();

                $.ajax({
                    url: "<?php echo base_url();?>/user/validate_edit/".<?php echo $user_data[0]['id'];?>,
                    type:'POST',
                    dataType: "json",
                    data: { full_name: full_name ,password: password, confirm_password: confirm_password, second_email: second_email, confirm_second_email:confirm_second_email},
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            //alert(data.success);
                            //window.location.href = "<?php echo base_url()?>/user/show <?php echo '/'.$this->session->id; ?>"
                        }else{
                            //$( ".message" ).addClass( "message_error" );
                            //$(".message").html(data.error);
                        }
                    }
                });
            });

        });

    </script>

<?php $this->load->view('layout/footer.php');?>