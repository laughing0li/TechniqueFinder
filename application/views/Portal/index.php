<?php $this->load->view('layout/portal_header.php'); ?>

<head>
    <title>AGN Laboratory Finder</title>
</head>

<body>



    <div class="bg-color">

        <div class="container-md">

            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <?php include 'header.php'; ?>
                        <div class="container" id="content">

                            <div class="row">
                                <div class="col-5" style="color: #f2f2f1;">
                                    <br>
                                    <?php echo $staticData['tf.home.quickGuide']; ?>

                                    <!-- <p style="font-size: 16px;" class="tf-font-color">
                                        Use AGN Laborarory Finder to identify and understand the analysis techniques available to researchers
                                        through Australian Geochemistry Network. You will find the contact details of our expert staff for each technique.
                                        They can provide you with all the information you need and guide you through the planning, training,
                                        data collection and interpretation stages of your experiments.
                                    </p> -->

                                    <div class="border-bottom" style="margin: 50px 0"></div>

                                    <h3 class="tf-heading">Option 1: Select your research interest</h3>
                                    <!-- <?php if (isset($staticData['tf.home.optionsExplanation'])) {
                                                echo "<div class='alert alert-primary' role='alert'>" . $staticData['tf.home.optionsExplanation'] . "</div";
                                            } ?> -->
                                    <div class="d-grid gap-2 col-10">

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
                                </div>
                                <div class="col-7">
                                    <img style="height: 400px; max-width:500px; margin: 27px 0 0 76px" src="/assets/images/korieno_phd_auscopejdlc.jpg" alt="">
                                </div>
                            </div>


                            <div class="border-bottom" style="margin: 50px 0"></div>

                            <h3 class="tf-heading">Option 2: Search by single keyword</h3>


                            <form action="<?php echo base_url(); ?>Portal/techniqueSearch" method="get" name="searchForm" id="searchForm">

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
                                    <!-- <p class="lh-lg tf-font-color" style="font-size: 15px;">
                                        Search by single keyword
                                    </p> -->
                                </div>

                            </form>


                            <div class="border-bottom" style="margin: 50px 0"></div>

                            <h3 class="tf-heading">Option 3: View list of available instruments</h3>


                            <div class="container" style="margin-left: -25px; padding-bottom: 30px">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="lh-lg tf-font-color" style="font-size: 15px;">
                                            This list shows the techniques currently available at Australian Geochemistry Network.
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="d-grid gap-2 col-4" style="margin-bottom: 20px;">
                                <button class="btn outline-primary" type="button" onclick="window.location.assign('<?php echo base_url(); ?>Portal/listTechniques');">View List
                                </button>
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