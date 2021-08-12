<?php $this->load->view('layout/portal_header.php'); ?>

<head>
    <title>Sample Preparation</title>
</head>

<body>
    <div class="header-bg-color">
        <div class='container-md'>
            <?php include 'header.php'; ?>
        </div>
    </div>
    <div class="bg-color">

        <div class="container-md">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <div id="content" class="container" style="padding-bottom: 20px;">

                            <div class="d-flex justify-content-end">
                                <div class="p-2">
                                    <button type="submit" class="btn outline-primary" onclick="window.location.assign('<?php echo base_url(); ?>Portal')">Back</button>
                                </div>
                            </div>
                            <div class="row featurette">
                               <?php 
                                foreach ($sample_prep_list as $key => $technique_view) {
                                    echo '<div class="col-md-6" style="color:#282572; margin-bottom: 20px">';
                                    echo '<div class="card" >';
                                    echo '<div class="card-body">';
                                    echo '<h4 class="card-title">Category Name: '. $technique_view->name.'</h4>';
                                    echo '<h4 class="card-title">'. $technique_view->category.'</h4>';
                                    echo '<p class="card-text">Model: '. $technique_view->model.'</p>';
                                    echo '<p class="card-text ">Manufacturer: '.$technique_view->manufacturer.'</p>';
                                    echo '<p class="card-text">'. $technique_view->summary.'</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-md-6" style="margin: auto;">';
                                    // please add the image here
                                    echo '<img src="/assets/images/csiro_logo.png" style="max-width: 100%; height:auto" alt="">';
                                    echo '</div>';
                                }
                                    ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='container-md'>
        <?php include 'footer.php'; ?>
    </div>


    <div style="clear: both">
        <!-- ff -->
    </div>

    <!-- <div id="infobox"></div> -->


</body>

<?php $this->load->view('layout/portal_footer.php') ?>