<?php $this->load->view('layout/header.php');?>

<body>
<head><title>TF Admin | Reset password request</title></head>
<nav class="tf-login-navbar">
    <span class="tf-font" style="font-size: 11px;">Reset password form<span>
</nav>

<div class="row">&nbsp;</div>


<div class="tf-login-container" style="margin:0 auto; height: 11em !important;">
    <div class="error-message"><?php echo validation_errors();?> </div>
    <div class="tf-login">
        <?php echo form_open('reset/password');?>

        <p class="tf-font" style="margin-left: 1em;font-size:11px;">Please provide your username (email):</p>


                <span class="tf-font tf-login-label" style="margin-left: 5em; font-size: 1.1em;">Login ID</span>

                <input class="tf-font tf-login-input" type="text" name="username" value="" size="50" />

            </tr>
            <tr>
                <td class="tf-font">&nbsp;</td>
                <td class="tf-login-input">
                    <input  id="id_login_button" class="btn-default tf-font tf-login-button"  style="margin-right: 1em;margin-top: 1em;" type="submit" value="Reset" />
                </td>
            </tr>
            <tr><td>&nbsp;</td></tr>

        <?php echo form_close();?>
    </div>
</div>



<div class="row">&nbsp;</div>
</body>

<?php $this->load->view('layout/footer.php')?>

