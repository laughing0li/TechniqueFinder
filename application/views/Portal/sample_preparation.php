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

                            <div class="row mt-2">
                                <?php
                                /* var_dump($sample_prep_list); */
                                foreach ($sample_prep_list as $key => $technique_view) {
                                    echo "<div style='color: white'>";
                                    echo "<div>Category Name: $technique_view->name</div>";
                                    echo "<div>$technique_view->category</div>";
                                    echo "<p>Model: $technique_view->model</p>";
                                    echo "<p>Manufacturer: $technique_view->manufacturer</p>";
                                    echo "<p>$technique_view->summary</p>";
                                    echo "</div>";
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
