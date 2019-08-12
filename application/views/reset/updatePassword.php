<?php $this->load->view('layout/header.php');?>
<head><title>TF Admin | Update password</title></head>
<body>

<nav class="tf-login-navbar">
    <span class="tf-font" style="font-size: 11px;">Update password form<span>
</nav>

<div class="row">&nbsp;</div>



<div class="tf-login-container" style="height: 15em;padding-left: 1em;">
    <div class="error-message"><?php echo $this->session->flashdata('message'); ?> </div>

    <div class="tf-login">
        <?php echo form_open('reset/validatePassword');?>
        <div class="error-message"><?php if(isset($message)){echo $message;}?> </div>

        <table>

            <tr>
                <td class="tf-font tf-login-label">Password</td>
                <td >
                    <input class="tf-font tf-login-input" type="password" name="password" value="" size="50" />
                    <input id="html_reset_key" type="hidden" name="html_reset_key" value="">
                </td>

            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td class="tf-font tf-login-label">Confirm Password</td>
                <td>
                    <input class="tf-font tf-login-input" type="password" name="confirm_password" value="" size="50" />
                </td>
            </tr>

            <tr><td>&nbsp;</td></tr>
            <tr>
                <td class="tf-font">&nbsp;</td>
                <td class="tf-login-input">
                    <input class="tf-login-button" style="width: 7em !important;" type="submit" value="Confirm" />
                </td>
            </tr>

        </table>
        <?php echo form_close();?>
    </div>
</div>



<div class="row">&nbsp;</div>
<script>
    $('document').ready(function(){
        document.getElementById('html_reset_key').value = window.location.href.split('/')[5];
        console.log("Ok");
    });

</script>
</body>


<?php $this->load->view('layout/footer.php')?>

