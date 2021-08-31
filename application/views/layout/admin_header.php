<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!--  google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- autocomplete -->
    <script src="<?php echo base_url(); ?>/assets/js/autocomplete.js"></script>


    <!-- Local CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/technique-finder.css" rel="stylesheet">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="icon" href="/assets/images/favicon.ico" type="image/gif">

    <!-- Google Analytics -->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-XXXXXXX-Y']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>

<body>
    <div class="header-bg-color">
        <div class="container-md">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <div class="container" style="padding: 30px 0">
                            <nav class="navbar navbar-expand-lg"style="color: #F2F2F1; font-size: 18px">
                                <div class="container-fluid">
                                    <a class="navbar-brand" href="/Portal"><img src="/assets/images/LabFinder-logo.png" width=280 height=60></a>
                                    <!-- <a class="navbar-brand" href="/Portal"><img src="/assets/images/AGN-Logo.png" width=300 height="60"></a> -->
                                    <div style="margin-left: 50px;  color: #F2F2F1;" class="collapse navbar-collapse" id="navbarNavDropdown">
                                        <ul class="navbar-nav" >
                                            <li  class="nav-item">
                                                <a class="nav-link" style="color: #f2f2f1" href="/Techniques/index">Techniques</a>
                                            </li>
                                            <li  class="nav-item">
                                                <a class="nav-link" style="color: #f2f2f1" href="/Media/index">Media</a>
                                            </li>
                                            <li  class="nav-item">
                                                <a class="nav-link" style="color: #f2f2f1" href="/Location/index"> Locations</a>
                                            </li>
                                            <li  class="nav-item">
                                                <a class="nav-link" style="color: #f2f2f1" href="/Contact/index"> Contacts</a>
                                            </li>
                                            <li  class="nav-item">
                                                <a class="nav-link" style="color: #f2f2f1" href="/staticContent/index"> Static content</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            if ($this->session->userdata('logged_in') == 1) {
                                echo "<span>You are logged in as </span>";
                                echo "<span>" . $this->session->userdata('username') . "</span>";
                                echo "<span>&nbsp;|&nbsp;</span>";
                                echo '<a style="color: #f2f2f1" href="' . base_url() . 'login/logout">Logout</a>';
                            }
                            ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>