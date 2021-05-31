<?php $this->load->view('layout/portal_header.php');?>
<head>
    <title>AGN Laboratory Finder</title>
</head>
<body>
        
        <div id="content" class="container">
	    <div class="d-flex justify-content-end">
                <div class="p-2">
		    <button type="submit" class="btn btn-primary" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back</button>
                </div>
            </div>
           
            <!-- <div class="clear"></div> -->
         
            <div class="alert alert-primary">
<?php echo $staticData['tf.geochemChoices.quickGuide']; ?>
            </div>

            <div class="row">
                <!-- LHS COLUMN -->
                <div class="col-6">
                    <div class="row">
                        <!-- STEP 1 -->
                        <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step1.title']);?> </h3>
                        <div class="btn-group" role="group">
                            <?php
                              foreach($step1_list as $r){
                                     echo '<input _id="'.$r->id.'" _type="step1Option"  type="radio" class="btn-check" name="btnradio-1" id="btnradio-'.$r->id.'" autocomplete="off" onclick="onClick(this)">';
                                     echo '<label class="btn btn-primary" for="btnradio-'.$r->id.'">'.$r->name.'</label>';
                              }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <!-- THEN -->
                        <img src="<?php echo base_url().'assets/images/space.gif'?>" width="20" height="5" />
                        <span style="text-align:center;"><h1 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.comparison.title']);?> </h1></span>
                    </div>
                    <div class="row">
                        <!-- STEP 2 -->
                        <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step2.title']);?> </h3>
                        <div class="btn-group" role="group">
                            <?php
                            foreach($step2_list as $r){
                                echo '<input _id="'.$r->id.'" _type="step2Option" type="radio" class="btn-check" name="btnradio-2" id="btnradio-'.$r->id.'" autocomplete="off" onclick="onClick(this);">';
                                echo '<label class="btn btn-primary" for="btnradio-'.$r->id.'">'.$r->name.'</label>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <!-- THEN -->
                        <img src="<?php echo base_url().'assets/images/space.gif'?>" width="20" height="5" />
                        <span style="text-align:center;"><h1 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.comparison.title']);?> </h1></span>
                    </div>
                    <div class="row">
                        <!-- STEP 3 -->
                        <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step3.title']);?> </h3>
                        <input id="step3" class="form-control" style="font-size: 12px; max-width: 32rem" type="text" placeholder="Type here element interested in"></input>
                    </div>
                </div> <!-- END LHS COLUMN -->

                <!-- RHS COLUMN -->
	        <div class="col-6">
                    <div class="row">
                        <span id="display-area"></span>
                    </div>
		</div> <!-- END RHS COLUMN -->

            </div> <!-- END class="row" -->

            <br>
            <br>

            <div class="d-flex justify-content-end">
                <div class="p-2">
                    <form action="<?php echo base_url().'Portal/getTechniqueByOptionCombination';?>" method="get" name="choiceForm" id="choiceForm">
                        <input type="hidden" id="science" name="science" value="GEOCHEM">
                        <input type="hidden" id="step1OptionVal" name="step1Option" value="">
                        <input type="hidden" id="step2OptionVal" name="step2Option" value="">
                        <input type="hidden" id="step3TextVal" name="step3Text" value="">
                        <button type="submit" class="btn btn-primary" onclick="onSubmit()">Submit</button>
                    </form>
                </div>
            </div>

            <br>

      </div>            



    <div id="footer" class="container">
        <?php include 'footer.php';?>
    </div>
    <div style="clear: both"><!-- ff --></div>

    <div id="infobox"> </div>
    <div class="container">
        <?php $this->load->view('layout/portal_footer.php')?>
    </div>

    

<script type="text/javascript">
/* This assigns radio button values to the submit form when user clicks on buttons */
function onClick(e){
    var element = $(e);
    // Update RHS display
    if (element.attr('type') == 'radio') {
        if (element.attr('_type') == 'step1Option') {
            step1_id = element.attr('_id');
	    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("display-area").innerHTML = this.responseText;
                }
            };
	    xmlhttp.open("GET", "<?php echo base_url().'Portal/getTechniqueChoices/';?>"+step1_id+"/0", true);
            xmlhttp.send();

        } else if (element.attr('_type') == 'step2Option') {
            step2_id = element.attr('_id');
	    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("display-area").innerHTML = this.responseText;
                }
            };
	    var step1_id = $('#step1OptionVal').val();
	    xmlhttp.open("GET", "<?php echo base_url().'Portal/getTechniqueChoices/';?>"+step1_id+"/"+step2_id, true);
            xmlhttp.send();
        }
    }

    // Fill out submit form
    var step1_id = null;
    var step2_id = null;
    if (element.attr('_type') == 'step1Option'){
        step1_id = element.attr('_id');
        $('#step1OptionVal').val(step1_id);
    }
    else if (element.attr('_type') == 'step2Option'){
        step2_id = element.attr('_id');
        $('#step2OptionVal').val(step2_id);
    }
}

/* This assigns text form values to the submit form when the user clicks on submit button */
function onSubmit() {
    $('#step3TextVal').val($('#step3').val());
}
</script>

</body>

