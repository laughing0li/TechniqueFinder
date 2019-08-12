<?php $this->load->view('layout/header.php');?>
<head><title>TF Admin | Login</title></head>
<style>
    input, select, textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        margin-top: 9px;
        width: 16em;
</style>
<body>

<nav class="tf-login-navbar">
    <span class="tf-font" style="font-size: 11px;">Please login using your credentials below:<span>
</nav>

<div class="row">&nbsp;</div>



<div class="tf-login-container" style="margin:0 auto;">
    <?php if((validation_errors())){
        echo '<div class="error-message">';
        echo validation_errors();
        echo '</div>';
    }
/**
 * TechniqueFinder - auth.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

?>

    <div class="tf-login">
        <?php echo form_open('login/validate_user');?>
        <?php
            echo '<div class="error-message">';
            echo $this->session->flashdata('error_message');
            echo '</div>';
        ?>

        <?php if(isset($success_message)){
            echo '<div class="success-message">';
            echo $success_message;
            echo '</div>';
        }
        ?>

        <table>

            <tr>
                <td class="tf-font tf-login-label">Login ID</td>
                <td >
                    <input class="tf-font tf-login-input" type="text" name="username" value="" size="50" />
                </td>
            </tr>

            <tr>
                <td class="tf-font tf-login-label">Password</td>
                <td>
                    <input class="tf-font tf-login-input" type="password" name="password" value="" size="50" />
                </td>
            </tr>

            <tr style="margin-top: 1em;">
                <td class="tf-font tf-login-label" style="margin-top:0.5em; ">Remember me</td>
                <td>
                    <input class="tf-font" type="checkbox" style="margin-left: 12px; margin-top: 0.5em" name="remember_me"/>
                </td>
            </tr>

            <tr>
                <td class="tf-font">&nbsp;</td>
                <td class="tf-login-input">
                    <input class="tf-login-button" type="submit" value="Login" />
                </td>
            </tr>
            <tr>
                <td class="tf-font tf-hyperlink"><a style="margin-left: 1em;" href="<?php echo base_url();?>reset/resetPassword">Forgot your password?</a></td>
                <td>
                    &nbsp;
                </td>
            </tr>

        </table>
        <?php echo form_close();?>
    </div>
</div>



<div class="row">&nbsp;</div>
</body>

<?php $this->load->view('layout/footer.php')?>

