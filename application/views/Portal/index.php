<?php $this->load->view('layout/portal_header.php'); ?>

<head>
    <title>AGN Laboratory Finder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/css/autoComplete.min.css">
</head>

<body>



    <div class="bg-color">

        <div class="container-md">

            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <?php include 'header.php'; ?>
                        <div class="container" id="content">

                            <br>
                            <!-- <div class="border-bottom" style="margin: 50px 0"></div> -->

                            <p style="font-size: 16px;" class="tf-font-color">
                                Use AGN Laborarory Finder to identify and understand the analysis techniques available to researchers
                                through Australian Geochemistry Network. You will find the contact details of our expert staff for each technique.
                                They can provide you with all the information you need and guide you through the planning, training,
                                data collection and interpretation stages of your experiments.
                            </p>


                            <div class="border-bottom" style="margin: 50px 0"></div>

                            <h3 class="tf-heading">Option 1: Choose your research interest</h3>
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="lh-lg tf-font-color" style="font-size: 15px;" >
                                        <?php if (isset($staticData['tf.home.optionsExplanation'])) {
                                            echo $staticData['tf.home.optionsExplanation'];
                                        } ?>
                                    </p>
                                </div>
                            </div>
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

                            <h3 class="tf-heading">Option 2: Search by single keyword</h3>

                            <form action="<?php echo base_url(); ?>Portal/techniqueSearch" method="get" name="searchForm" id="searchForm">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="lh-lg tf-font-color" style="font-size: 15px;" >
                                            <?php if (isset($staticData['tf.home.searchExplanation'])) {
                                                echo $staticData['tf.home.searchExplanation'];
                                            } ?>
                                        </p>
                                    </div>
                                </div>
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
                                        <?php echo $staticData['tf.home.allTechniquesExplanation']; ?>
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

    <!-- <div style='z-index: -1' class="container" id="infobox">
        <?php echo $staticData['tf.home.infoboxContent']; ?>
    </div> -->

    <!-- Autocomplete -->
    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/autoComplete.min.js"></script>

    <script>
        var datasrc = [
            <?php $keyword_list = $this->Techniques_model->getKeywordList();
            foreach ($keyword_list as $keyword) {
                echo "'" . $keyword->name . "',\n";
            }
            ?>
        ];
        const autoCompleteJS = new autoComplete({ selector: "#myAutocomplete",
                                                  resultItem: {
                                                      highlight: {
                                                          render: true
                                                      }
                                                  },
                                                  data: { src: datasrc },
                                                  events: {
                                                      input: {
                                                          selection: (event) => {
                                                              const selection = event.detail.selection.value;
                                                              autoCompleteJS.input.value = selection;
                                                          }
                                                      }
                                                 }
                                                 });
    </script>
</body>

<?php $this->load->view('layout/portal_footer.php') ?>
