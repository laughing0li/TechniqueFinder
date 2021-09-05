<?php $this->load->view('layout/portal_header.php'); ?>

<head>
    <title>AGN Lab Finder Admin Login</title>
    <link href='https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css' rel='stylesheet'>
</head>

<body class='text-center' style='background-image: linear-gradient(180deg,#282572,#4b4b88);  font-family: Calibre; '>

    <div style="margin: auto;">
        <?php if ((validation_errors())) {
            echo '<div class="error-message">';
            echo validation_errors();
            echo '</div>';
        }
        ?>
        <div class="tf-login">
            <?php echo form_open('login/validate_user'); ?>
            <?php
            echo '<div class="error-message">';
            echo $this->session->flashdata('error_message');
            echo '</div>';
            ?>

            <?php if (isset($success_message)) {
                echo '<div class="success-message">';
                echo $success_message;
                echo '</div>';
            }
            ?>

            <main class="form-signin">
                <table>
                    <a href="/Portal" style="margin-left: -20px">
                        <img class="mb-4" src="/assets/images/LabFinder-logo.png" alt="" width="350" height="75">
                    </a>
                    <h1 class="h3 tf-font-color mb-3 fw-normal">Please sign in</h1>
                    

                    <div class="form-floating" style='margin-top: 30px'>
                        <input style='box-shadow: none' type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input style='box-shadow: none' type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label class="tf-font-color">
                            <input  type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    

                    <button class="w-100 btn btn-lg outline-primary" type="submit" value='Login'>Sign in</button>
                    <div style='margin-top: 20px;'>
                        <a class="tf-font-color" style="margin-left: 1em;" href="<?php echo base_url(); ?>reset/resetPassword">Forgot your password?</a>

                    </div>

                    <p class="mt-5 mb-3 text-muted">© AuScope Limited 2021   |   All rights reserved</p>
                </table>
            </main>
            <?php echo form_close(); ?>
        </div>
    </div>

</body>