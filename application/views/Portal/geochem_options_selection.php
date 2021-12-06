<?php $this->load->view('layout/portal_header.php'); ?>

<head>
    <title>Geochemical Analysis</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/css/autoComplete.min.css">
</head>

<body>
    <div class=' header-bg-color'>
        <div class="container-md">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <?php include 'header.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-color">
        <div class="container-md">
            <div id="content" class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10" style="padding: 0 38px">
                        <!-- <div class="d-flex justify-content-end">
                            <div class="p-2">
                                <button type="submit" class="btn outline-primary" onclick="window.location.assign('<?php echo base_url(); ?>Portal')">Back</button>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-6" style="margin: auto;">
                            <strong class="tf-font-color">
                                <?php echo $staticData['tf.geochemChoices.quickGuide']; ?>
                            </strong>
                            </div>
                            <div class="col-6">
                                <img style="height: 200px; width:350px; margin: 27px 0 0 135px" src="/assets/images/lores_shrimpii.jpg" alt="">
                            </div>
                            
                        </div>
                        <div class="border-bottom" style="margin: 50px 0"></div>

                        <div class="row">
                            <!-- LHS COLUMN -->
                            <div class="col-md-5">
                                <div class="row">
                                    <!-- STEP 1 -->
                                    <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step1.title']); ?> </h3>
                                    <div class="btn-group" role="group">
                                        <?php
                                        foreach ($step1_list as $r) {
                                            echo '<input _id="' . $r->id . '" _type="step1Option"  type="radio" class="btn-check" name="btnradio-1" id="btnradio-' . $r->id . '" autocomplete="off" onclick="onClick(this)">';
                                            echo '<label style="box-shadow:none" class="btn outline-primary" for="btnradio-' . $r->id . '">' . $r->name . '</label>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px;">
                                    <!-- THEN -->
                                    <img src="<?php echo base_url() . 'assets/images/space.gif' ?>" width="20" height="5" />
                                    <span style="text-align:center;">
                                    </span>
                                </div>
                                <div class="row">
                                    <!-- STEP 2 -->
                                    <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step2.title']); ?> </h3>
                                    <div class="btn-group" role="group">
                                        <?php
                                        foreach ($step2_list as $r) {
                                            echo '<input _id="' . $r->id . '" _type="step2Option" type="radio" class="btn-check" name="btnradio-2" id="btnradio-' . $r->id . '" autocomplete="off" disabled="disabled" onclick="onClick(this);">';
                                            echo '<label style="box-shadow:none; "  class="btn outline-primary disabled" for="btnradio-' . $r->id . '">' . $r->name . '</label>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- THEN -->
                                    <img src="<?php echo base_url() . 'assets/images/space.gif' ?>" width="20" height="5" />
                                    <span style="text-align:center;">
                                    </span>
                                </div>
                                <div class="row" style="margin-top: 30px;">
                                    <!-- STEP 3 -->
                                    <h3 id="step3-title" style="display: none" class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step3.title']); ?> </h3>
                                    <div style="padding-left: 12px;">
                                        <input id="step3" _type="step3Option" class="tf-disabled form-control" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off" disabled="disabled">
                                    </div>
                                </div>
                            </div> <!-- END LHS COLUMN -->

                            <!-- RHS COLUMN -->
                            <div class="col-md-7">
                                <div class="row">
                                    <span id="display-area"></span>
                                </div>
                            </div> <!-- END RHS COLUMN -->

                        </div> <!-- END class="row" -->

                        <br>
                        <br>
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

    <!-- <div id="infobox"> </div> -->
    <div class="container">
        <?php $this->load->view('layout/portal_footer.php') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/autoComplete.min.js"></script>


    <script type="text/javascript">
        /*
         * Activate tooltips on cards
         */
        function activateToolTips() {
            $('div[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                placement: 'top'
            });
        }

        /*
         * This updates the cards on the right hand side as the user makes choices
         */
        function onClick(e) {
            var element = $(e);
            // Update RHS display
            if (element.attr('type') == 'radio') {
                if (element.attr('_type') == 'step1Option') {
                    // User clicked on "Step1" button
                    step1_id = element.attr('_id');
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("display-area").innerHTML = this.responseText;
                            console.log(this.responseText);

                        }
                        activateToolTips();
                    };
                    xmlhttp.open("GET", "<?php echo base_url() . 'Portal/getTechniqueChoices/'; ?>" + step1_id + "/0/Notspecified", true);
                    xmlhttp.send();
                    // Enable step 2 radio buttons
                    $('input[name="btnradio-2"]').removeAttr('disabled');
                    $(".btn-group label").removeClass('disabled');

                    // Reset step 2 radio buttons
                    $('input[name="btnradio-2"]').prop('checked', false);
                    // Reset step 3 input
                    $('#step3').attr('disabled', 'disabled');
                    $('#step3-title').css('display', 'none');

                } else if (element.attr('_type') == 'step2Option') {
                    // User clicked on "Step2" button
                    step2_id = element.attr('_id');
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("display-area").innerHTML = this.responseText;
                        }
                        activateToolTips();
                    };
                    var step1_id = $('input[name="btnradio-1"]:checked').attr('_id');
                    xmlhttp.open("GET", "<?php echo base_url() . 'Portal/getTechniqueChoices/'; ?>" + step1_id + "/" + step2_id + "/Notspecified", true);
                    xmlhttp.send();
                    // Set up autocomplete keywords for step 3
                    autoKeywordUpdate(step1_id, step2_id);
                }
            }
        }

        /* Called when user selects an element in Step 3 */
        function elementClick(e) {
            var step1_id = $('input[name="btnradio-1"]:checked').attr('_id');
            var step2_id = $('input[name="btnradio-2"]:checked').attr('_id');
            var step3_val = $('#step3').val();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("display-area").innerHTML = this.responseText;
                }
                activateToolTips();
            };
            xmlhttp.open("GET", "<?php echo base_url() . 'Portal/getTechniqueChoices/'; ?>" + step1_id + "/" + step2_id + "/" + step3_val, true);
            xmlhttp.send();
        }

        /* This updates the set of autocomplete keywords in Step 3 */
        function autoKeywordUpdate(step1_id, step2_id) {
            var me = this;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const jsonResp = JSON.parse(this.responseText);
                    if (jsonResp.length === 0) {
                        $('#step3').attr('disabled', 'disabled');
                        $('#step3-title').css('display', 'none');
                    } else {
                        $('#step3').removeAttr('disabled');
                        $('#step3-title').css('display', 'block');
                        const autoCompleteJS = new autoComplete({ selector: "#step3",
                                                                  placeHolder: "Search for elements...",
                                                                  resultItem: {
                                                                      highlight: {
                                                                          render: true
                                                                      }
                                                                  },
                                                                  data: { src: jsonResp,
                                                                          keys: ['label'],
                                                                        },
                                                                  events: {
                                                                      input: {
                                                                          selection: (event) => {
                                                                              const selection = event.detail.selection.value;
                                                                              autoCompleteJS.input.value = selection['label'];
                                                                              me.elementClick(event.target)
                                                                          }
                                                                      }
                                                                 }
                                                                 });
                    }
                }
            };
            xmlhttp.open("GET", "<?php echo base_url() . 'Portal/getTechniqueKeywords/'; ?>" + step1_id + "/" + step2_id, true);
            xmlhttp.send();
        }
    </script>

</body>
