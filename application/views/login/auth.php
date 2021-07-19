<?php $this->load->view('layout/portal_header.php');?>
<head>
    <title>AGN Lab Finder Admin Login</title>
</head>

<body>

<div class="container-md">

    <div class="container" style="margin-top: 30px; margin-bottom: 80px">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/Portal"><img src="/assets/images/AGN-Logo.png" width=300 height="60"></a>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8">

                <p class="tf-font" style="font-size: 11px;">Please login using your credentials below:<p>

                <div class="row">&nbsp;</div>



                <div class="tf-login-container" style="margin:0 auto;">
                    <?php if((validation_errors())){
                        echo '<div class="error-message">';
                        echo validation_errors();
                        echo '</div>';
                    }
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
            </div>

            <div class="col-4">
                <div class="d-flex justify-content-end">
                    <div class="p-2">
                        <button type="submit" class="btn outline-primary" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>


