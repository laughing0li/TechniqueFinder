<?php

/**
 * TechniqueFinder - geochem_analysis_view.php
 *
 */

$this->load->view('layout/portal_header.php'); ?>

<head>
    <title>Analysis View</title>
</head>

<body>
    <div class="bg-color">
        <div class="container-md">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                    <?php include 'header.php'; ?>

                        <div id="content" class="container">
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <button style='float: right' class="btn outline-primary" type="submit" onclick="window.location.assign('<?php echo base_url(); ?>Portal/geochemOptionsSelection')">Back</button>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class='tf-font-14'><?php echo $theTechnique->description; ?></p>
                                </div>
                            </div>
                            <div class="border-bottom" style="margin: 50px 0"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='container-md'>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10">
                    <?php include 'footer.php'; ?>
                </div>
            </div>
        </div>
    </div>


</body>

<?php $this->load->view('layout/portal_footer.php') ?>
