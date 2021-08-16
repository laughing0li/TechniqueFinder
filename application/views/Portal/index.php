<?php $this->load->view('layout/portal_header.php'); ?>

<head>
    <title>AGN Laboratory Finder</title>
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
                        <div class="container" id="content">

                            <br>
                            <!-- <div class="border-bottom" style="margin: 50px 0"></div> -->

                            <p class="fs-6 lh-lg" style="color: #f2f2f1;">
                                Use AGN Laborarory Finder to identify and understand the analysis techniques available to researchers
                                through Australian Geochemistry Network. You will find the contact details of our expert staff for each technique.
                                They can provide you with all the information you need and guide you through the planning, training,
                                data collection and interpretation stages of your experiments.
                            </p>


                            <div class="border-bottom" style="margin: 50px 0"></div>

                            <h3 class="tf-heading">Option 1: Choose your research interest</h3>
                            <!-- <?php if (isset($staticData['tf.home.optionsExplanation'])) {
                                        echo "<div class='alert alert-primary' role='alert'>" . $staticData['tf.home.optionsExplanation'] . "</div";
                                    } ?> -->
                            <div class="d-grid gap-2 col-4">

                                <button class="btn outline-primary" type="button" onclick="window.location.assign('<?php echo base_url(); ?>Portal/geochemOptionsSelection');">
                                    Geochemical Analysis and Age Determination
                                </button>
                                <button class="btn outline-primary" type="button" onclick="window.location.assign('<?php echo base_url(); ?>Portal/expProcOptionsSelection');">
                                    Experimental Procedure
                                </button>
                                <button class="btn outline-primary" type="button" onclick="window.location.assign('<?php echo base_url(); ?>Portal/samplePrepOptionsSelection');">
                                    Sample Preparation
                                </button>
                            </div>

                            <div class="border-bottom" style="margin: 50px 0"></div>

                            <h3 class="tf-heading">Option 2: Search by keyword</h3>


                            <form  action="<?php echo base_url(); ?>Portal/techniqueSearch" method="get" name="searchForm" id="searchForm">

                                <div class="container" style='margin-left: -28px'>
                                    <div class="row">
                                        <div class="col-md-8" style="margin-bottom: 10px;">
                                            <input id="myAutocomplete" type="text" class="form-control" name="q" placeholder="Please type search term here" autocomplete="off">
                                        </div>
                                        <br>
                                        <div class="col-md-4">
                                            <button class="btn outline-primary" type="button" onclick="document.searchForm.submit()">Search</button>
                                        </div>
                                    </div>
                                </div>

                            </form>


                            <div class="border-bottom" style="margin: 50px 0"></div>

                            <h3 class="tf-heading">Option 3: View list of available techniques</h3>


                            <div class="container" style="margin-left: -25px">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="lh-lg" style="font-size: 15px;color: #f2f2f1">
                                            This list shows the techniques currently available at Australian Geochemistry Network.
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn outline-primary" type="button" onclick="window.location.assign('<?php echo base_url(); ?>Portal/listTechniques');">View List
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="border-bottom" style="margin: 30px 0"></div>

                            <div class="container-md" style="color: #7e7caa; margin: 0 0 40px -25px">
                                <div class="row ">
                                    <div class="col-md-4" style="margin-bottom: 10px;">
                                        <button class='btn outline-primary' onclick="window.location='<?php echo base_url(); ?>Portal/adminLogin'">Admin Login</button>

                                    </div>
                                    <div class="col-md-8" style='font-size: 14px; color: #f2f2f1; '>
                                        <p >ABOUT THE AGN</p>
                                        <a style="color: #f2f2f1" href="https://www.auscope.org.au/agn">
                                            The AuScope Geochemistry Network
                                        </a>
                                        <br>
                                        (AGN) s a team of expert geochemists
                                        from across Australia, <br>aims to create,
                                        coordinate, promote and develop national
                                        geochemistry <br>research infrastructure and
                                        maximise its use by the Australian
                                        research community.
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <!-- <div class="col" style="color: #7e7caa"> -->

            </div>


        </div>
    </div>


    <div class='container-md'>
        <?php include 'footer.php'; ?>
    </div>


    <div style="clear: both">
        <!-- ff -->
    </div>

    <!-- <div style='z-index: -1' class="container" id="infobox">
        <?php echo $staticData['tf.home.infoboxContent']; ?>
    </div> -->
    <script>
        var datasrc = [
            <?php $keyword_list = $this->Techniques_model->getKeywordList();
            foreach ($keyword_list as $keyword) {
                echo "{label: '" . $keyword->name . "', value: '" . $keyword->name . "'},\n";
            }
            ?>
        ];
        const ac = new Autocomplete(document.getElementById('myAutocomplete'), {
            data: datasrc
        })
    </script>
</body>

<?php $this->load->view('layout/portal_footer.php') ?>
