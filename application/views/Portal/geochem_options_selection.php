<?php $this->load->view('layout/portal_header.php'); ?>
<head>
    <title>Geochemical Analysis</title>
</head>
<body>

<div class="container-lg">
    <?php include 'header.php'; ?>
    <div id="content" class="container">
        <div class="alert alert-info">
            <?php echo $staticData['tf.geochemChoices.quickGuide']; ?>
        </div>

        <div class="row">
            <!-- LHS COLUMN -->
            <div class="col-5">
                <div class="row">
                    <!-- STEP 1 -->
                    <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step1.title']); ?> </h3>
                    <div class="btn-group" role="group">
                        <?php
                        foreach ($step1_list as $r) {
                            echo '<input _id="' . $r->id . '" _type="step1Option"  type="radio" class="btn-check" name="btnradio-1" id="btnradio-' . $r->id . '" autocomplete="off" onclick="onClick(this)">';
                            echo '<label style="margin-left: 5px"  class="btn outline-primary" for="btnradio-' . $r->id . '">' . $r->name . '</label>';
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <!-- THEN -->
                    <img src="<?php echo base_url() . 'assets/images/space.gif' ?>" width="20" height="5"/>
                    <span style="text-align:center;">
                        <h1 class="tf-heading">
                            <?php echo strip_tags($staticData['tf.geochemChoices.comparison.title']); ?>
                        </h1>
                    </span>
                </div>
                <div class="row">
                    <!-- STEP 2 -->
                    <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step2.title']); ?> </h3>
                    <div class="btn-group" role="group">
                        <?php
                        foreach ($step2_list as $r) {
                            echo '<input _id="' . $r->id . '" _type="step2Option" type="radio" class="btn-check" name="btnradio-2" id="btnradio-' . $r->id . '" autocomplete="off" onclick="onClick(this);">';
                            echo '<label style="margin-left: 5px" class="btn outline-primary" for="btnradio-' . $r->id . '">' . $r->name . '</label>';
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <!-- THEN -->
                    <img src="<?php echo base_url() . 'assets/images/space.gif' ?>" width="20" height="5"/>
                    <span style="text-align:center;"><h1
                                class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.comparison.title']); ?> </h1></span>
                </div>
                <div class="row">
                    <!-- STEP 3 -->
                    <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step3.title']); ?> </h3>
                    <input id="step3" class="form-control" style="font-size: 12px; max-width: 32rem" type="text"
                           placeholder="Type here element interested in" autocomplete="off"></input>
                </div>
            </div> <!-- END LHS COLUMN -->

            <!-- RHS COLUMN -->
            <div class="col-7">
                <div class="row">
                    <span id="display-area"></span>
                </div>
            </div> <!-- END RHS COLUMN -->

        </div> <!-- END class="row" -->

        <br>
        <br>

        <div class="d-flex justify-content-end">
            <div class="p-2">
                <form action="<?php echo base_url() . 'Portal/getTechniqueByOptionCombination'; ?>" method="get"
                      name="choiceForm" id="choiceForm">
                    <input type="hidden" id="science" name="science" value="GEOCHEM">
                    <input type="hidden" id="step1OptionVal" name="step1Option" value="">
                    <input type="hidden" id="step2OptionVal" name="step2Option" value="">
                    <input type="hidden" id="step3TextVal" name="step3Text" value="">
                    <button type="submit" class="btn outline-primary" onclick="onSubmit()">Submit</button>
                </form>
            </div>
        </div>

        <br>

    </div>
    <?php include 'footer.php'; ?>
</div>




<div style="clear: both"><!-- ff --></div>

<div id="infobox"></div>
<div class="container">
    <?php $this->load->view('layout/portal_footer.php') ?>
</div>


<script type="text/javascript">
    /* This does two things:
       1. Updates the cards on the right hand side as the user makes choices
       2. Assigns radio button values to the submit form when user clicks on buttons
    */
    function onClick(e) {
        var element = $(e);
        // Update RHS display
        if (element.attr('type') == 'radio') {
            if (element.attr('_type') == 'step1Option') {
                step1_id = element.attr('_id');
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display-area").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "<?php echo base_url() . 'Portal/getTechniqueChoices/';?>" + step1_id + "/0", true);
                xmlhttp.send();
                // Reset step 2 radio buttons
                $('input[name="btnradio-2"]').prop('checked', false);

            } else if (element.attr('_type') == 'step2Option') {
                step2_id = element.attr('_id');
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display-area").innerHTML = this.responseText;
                    }
                };
                var step1_id = $('#step1OptionVal').val();
                xmlhttp.open("GET", "<?php echo base_url() . 'Portal/getTechniqueChoices/';?>" + step1_id + "/" + step2_id, true);
                xmlhttp.send();
                // Set up autocomplete keywords for step 3
                autoKeywordUpdate(step1_id, step2_id);
            }
        }

        // Fill out submit form
        var step1_id = null;
        var step2_id = null;
        if (element.attr('_type') == 'step1Option') {
            step1_id = element.attr('_id');
            $('#step1OptionVal').val(step1_id);
        } else if (element.attr('_type') == 'step2Option') {
            step2_id = element.attr('_id');
            $('#step2OptionVal').val(step2_id);
        }
    }

    /* This assigns text form values to the submit form when the user clicks on submit button */
    function onSubmit() {
        $('#step3TextVal').val($('#step3').val());
    }

    /* This updates the set of autocomplete keywords in Step 3 */
    function autoKeywordUpdate(step1_id, step2_id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const ac = new Autocomplete(document.getElementById('step3'), {data: JSON.parse(this.responseText)});
            }
        };
        xmlhttp.open("GET", "<?php echo base_url() . 'Portal/getTechniqueKeywords/';?>" + step1_id + "/" + step2_id, true);
        xmlhttp.send();
    }
</script>

</body>

