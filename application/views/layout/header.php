<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/css/technique-finder.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico" type="image/gif">



    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-16581643-3']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-16667092-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>



</head>
<body>
<div style="display: block;">
<a href="<?php echo base_url(); ?>" title="Home" tabindex="0"><img src="<?php echo base_url(); ?>assets/images/MicroscopyAustralia-Logo-596px.png" border="0" alt="AMMRF"></a>
</div>
<nav style="text-align: right;padding-right: 1em;">
<?php

if($this->session->userdata('logged_in') == 1){
    echo "<span style='font:11px verdana, arial, helvetica, sans-serif;'>You are logged in as </span>";
    echo "<span style='font:11px verdana, arial, helvetica, sans-serif; font-weight:bold;'>".$this->session->userdata('username')."</span>";
    echo "<span style='font:11px verdana, arial, helvetica, sans-serif; font-weight:bold;font-weight: bold;font-size: 11px;'>&nbsp;|&nbsp;</span>";
    echo '<a style="font-size:13px;" href="'.base_url().'login/logout">Logout</a>';
}
?>
</nav>
<!--<script type="text/javascript" src="--><?php //echo base_url();?><!--/assets/js/jquery-1.9.0.min.js"></script>-->
</body>
</html>
