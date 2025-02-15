<?php $this->load->view('layout/portal_header.php'); ?>

<head>
    <title>Sample Preparation</title>
</head>

<body>
    <div class="bg-color">

        <div class="container-md">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                    <?php include 'header.php'; ?>

                        <div id="content" class="container" style="padding-bottom: 20px;">

                            <div class="d-flex justify-content-end">
                                <div class="p-2">
                                    <button type="submit" class="btn outline-primary" onclick="window.location.assign('<?php echo base_url(); ?>Portal')">Back</button>
                                </div>
                            </div>
                            <div class="row featurette">
                               <?php 
                                $old_name = "XXXX";
                                foreach ($sample_prep_list as $key => $technique_view) {
                                    if ($old_name != $technique_view[0]->name) {
                                        echo '<div class="col-12 tf-heading">'.$technique_view[0]->name.'</div>';
                                        $old_name = $technique_view[0]->name;
                                    }
                                    echo '<div class="col-md-6" style="color:#282572; margin-bottom: 20px">';
                                    echo '<div class="card" style="min-height: 175px">';
                                    echo '<div class="card-body">';
                                    echo '<h4 class="card-title">'. $technique_view[0]->category.'</h4>';
                                    echo '<p class="card-text">Model: '. $technique_view[0]->model.'</p>';
                                    echo '<p class="card-text">Manufacturer: '.$technique_view[0]->manufacturer.'</p>';
                                    echo '<p class="card-text">'. $technique_view[0]->summary.'</p>';
                                    echo '<p class="card-text">Contact Detail: </p>';
                                    echo '<p class="card-text">Institution: '.$technique_view[1][0]['center_name'] .' at '. $technique_view[1][0]['institution'].'</p>';
                                    echo '<p class="card-text">Email: '. $technique_view[1][0]['email'].'</p>';
                                    echo '<p class="card-text">Phone: '. $technique_view[1][0]['telephone'].'</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-md-6" >';
                                    $mediaForLIST = $Media_model->getMediaInfosByTechniqueIdAndSection($technique_view[0]->technique_id, 'LIST');
                                    if (isset($mediaForLIST[0])) {
                                        $media_location = $mediaForLIST[0]->location;
                                        echo '<div class="col"><img src="'.storage_url() . $media_location . '" width="300" height="300" alt="' . $media_location . '"></div>';
                                    } else {
                                        echo '<div class="col"></div>';
                                    }
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
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10">
                    <?php include 'footer.php'; ?>
                </div>
            </div>
        </div>
    </div>


    <div style="clear: both">
        <!-- ff -->
    </div>

    <!-- <div id="infobox"></div> -->


</body>

<?php $this->load->view('layout/portal_footer.php') ?>
