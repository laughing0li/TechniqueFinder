<?php $this->load->view('layout/portal_header.php'); ?>
<head>
    <title>AGN Laboratory Finder</title>
</head>
<body>
<div class="container-md">

    <?php include 'header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="container" id="content">

                    <!-- <p  style="font-size: 34px; color: #282572; font-family: 'Open Sans', sans-serif">AGN Laboratory Finder</p> -->
                    <br>
                    <div class="border-bottom" style="margin: 50px 0"></div>

                    <p class="fs-6 lh-lg fw-bold" style="font-family: 'Open Sans', sans-serif;">
                        Use AGN Laborarory Finder to identify and understand the analysis techniques available to researchers
                        through Australian Geochemistry Network. You will find the contact details of our expert staff for each technique.
                        They can provide you with all the information you need and guide you through the planning, training,
                        data collection and interpretation stages of your experiments.
                    </p >


                    <div class="border-bottom" style="margin: 50px 0"></div>

                    <h3 class="tf-heading">Option 1: Choose your research interest</h3>
                    <!-- <?php if (isset($staticData['tf.home.optionsExplanation'])) {
                        echo "<div class='alert alert-primary' role='alert'>" . $staticData['tf.home.optionsExplanation'] . "</div";
                    } ?> -->
                    <div class="d-grid gap-2 col-4">

                        <button class="btn outline-primary"  type="button"
                                onclick="window.location.assign('<?php echo base_url(); ?>Portal/geochemOptionsSelection');">
                            Geochemical Analysis
                        </button>
                        <button class="btn outline-primary" type="button"
                                onclick="window.location.assign('<?php echo base_url(); ?>Portal/expProcOptionsSelection');">
                            Experimental Procedure
                        </button>
                        <button class="btn outline-primary" type="button"
                                onclick="window.location.assign('<?php echo base_url(); ?>Portal/samplePrepOptionsSelection');">
                            Sample Preparation
                        </button>
                    </div>

                    <div class="border-bottom" style="margin: 50px 0"></div>

                    <h3 class="tf-heading">Option 2: Search by keyword</h3>

<!--                    <h5 >--><?php //echo $staticData['tf.home.searchExplanation']; ?><!--</h5>-->
<!--                    <div>-->
<!--                        <p>If you know what you want to explore, type it into the search box and click 'go'.-->
<!--                        </p>-->
<!--                    </div>-->
                        <form action="<?php echo base_url(); ?>Portal/techniqueSearch" method="get" name="searchForm"
                              id="searchForm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <input id="myAutocomplete" type="text" class="form-control" name="q"
                                               placeholder="Please type search term here" autocomplete="off">
                                    </div>
                                    <div class="col">
                                        <button class="btn outline-primary" type="button" onclick="document.searchForm.submit()">Search</button>
                                    </div>
                                </div>
                            </div>

                        </form>


                    <div class="border-bottom" style="margin: 50px 0"></div>

                    <h3 class="tf-heading">Option 3: View list of available techniques</h3>

<!--                            <h5 class="card-title">--><?php //echo html_entity_decode($staticData['tf.home.allTechniquesExplanation']); ?><!--</h5>-->
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <p class="lh-lg" style="font-size: 15px;color: #7e7caa">
                                    This list shows the techniques currently available at Australian Geochemistry Network.
                                </p>
                            </div>
                            <div class="col-4">
                                <button class="btn outline-primary" type="button"
                                        onclick="window.location.assign('<?php echo base_url(); ?>Portal/listTechniques');">View List
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-4" style="color: #7e7caa">
                <a class="nav-link" href="<?php echo base_url(); ?>Portal/adminLogin">Admin Login</a>
                <div class="border-bottom" style="margin: 28px 0"></div>
                <p>NEED SOME HELP?</p>
                if you cannot find what you are looking
                <br>
                for, <a href="mailto:alexander.prent@curtin.edu.au" >
                    <em>please reach out</em></a>
                    and we can help
                <div class="border-bottom" style="margin: 112px  0 28px 0"></div>
                <p>ABOUT THE AGN</p>
                <a href="https://www.auscope.org.au/agn">
                    The AuScope Geochemistry Network
                </a>
                <br>
                (AGN) s a team of expert geochemists
                from across Australia, aims to create,
                coordinate, promote and develop national
                geochemistry research infrastructure and
                maximise its use by the Australian
                research community.
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

</div>




<div style="clear: both"><!-- ff --></div>

<div style='z-index: -1' class="container" id="infobox">
    <?php echo $staticData['tf.home.infoboxContent']; ?>
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

