<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href='https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css' rel='stylesheet'>
    <link href="<?php echo base_url();?>/assets/css/technique-finder.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico" type="image/gif">

    <title>TF Admin | Reset password request</title>
    
</head>

<body class='text-center' style='background-image: linear-gradient(180deg,#282572,#4b4b88);  font-family: Calibre-Light'>

    <div style="margin: auto" >
        <div class="error-message"><?php echo validation_errors(); ?> </div>
        <div class="tf-login">
            <?php echo form_open('reset/password'); ?>
            <main class="form-signin">
                <form>
                <a href="/Portal" style="margin-left: -20px">
                        <img class="mb-4" src="/assets/images/LabFinder-logo.png" alt="" width="350" height="75">
                    </a>
                    <h1 style="color: #f2f2f1" class="h3 mb-3 fw-normal">Reset password form</h1>

                    <div class="form-floating">
                        <input style="box-shadow: none;" type="text" name="username" class="form-control" id="floatingInput" placeholder="Login ID">
                        <label for="floatingInput">Login ID</label>
                    </div>
                    <div class="checkbox mb-3">
                    </div>
                    <button class="w-100 btn btn-lg outline-primary" type="submit" value="Reset">Reset</button>
                    <p class="mt-5 mb-3 text-muted">© AuScope Limited 2021   |   All rights reserved</p>
                </form>
            </main>

            <?php echo form_close(); ?>
        </div>
    </div>
</body>

</html>