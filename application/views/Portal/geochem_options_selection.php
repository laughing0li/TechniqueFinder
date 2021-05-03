<?php $this->load->view('layout/portal_header.php');?>
<head>
    <title>AGN Instrument Finder</title>
</head>
<body>
        
        <div id="content" class="container">
	    <div class="d-flex justify-content-end">
                <div class="p-2">
		    <button type="submit" class="btn btn-primary" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back</button>
                </div>
            </div>
           
            <div class="clear"></div>
         
            <div class="alert alert-primary">
<?php echo $staticData['tf.geochemChoices.quickGuide']; ?>
            </div>

            <!-- LHS COLUMN -->
            <div class="col-5">
                <div class="row">
                    <!-- STEP 1 -->
                    <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.left.title']);?> </h3>
                    <div class="btn-group" role="group">
                        <?php
                          foreach($left_list as $r){
                                 echo '<input _id="'.$r->id.'" _type="leftOption"  type="radio" class="btn-check" name="btnradio-1" id="btnradio-'.$r->id.'" autocomplete="off" onclick="onClick(this)">';
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
                    <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.centre.title']);?> </h3>
                    <input id="step2" class="form-control" style="font-size: 12px" type="text" placeholder="Type here element interested in"></input>
                </div>
                <div class="row">
                    <!-- THEN -->
                    <img src="<?php echo base_url().'assets/images/space.gif'?>" width="20" height="5" />
                    <span style="text-align:center;"><h1 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.comparison.title']);?> </h1></span>
                </div>
                <div class="row">
                    <!-- STEP 3 -->
                    <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.right.title']);?> </h3>
                    <div class="btn-group" role="group">
                        <?php
                        foreach($right_list as $r){
                            echo '<input _id="'.$r->id.'" _type="rightOption" type="radio" class="btn-check" name="btnradio-2" id="btnradio-'.$r->id.'" autocomplete="off" onclick="onClick(this);">';
                            echo '<label class="btn btn-primary" for="btnradio-'.$r->id.'">'.$r->name.'</label>';
                        }
                        ?>
		    </div>
                </div>

    
            </div> <!-- END col-4 -->

            <!-- RHS COLUMN -->
            <div class="col-7"></div>

            <br>
            <br>

            <div class="d-flex justify-content-end">
                <div class="p-2">
                    <form action="<?php echo base_url().'Portal/getTechniqueByOptionCombination';?>" method="get" name="choiceForm" id="choiceForm">
                        <input type="hidden" id="science" name="science" value="GEOCHEM">
                        <input type="hidden" id="leftOptionVal" name="leftOption" value="">
                        <input type="hidden" id="centreTextVal" name="centreText" value="">
                        <input type="hidden" id="rightOptionVal" name="rightOption" value="">
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
    var left_id = null;
    var right_id = null;
    var element = $(e);
    if (element.attr('_type') == 'leftOption'){
        left_id = element.attr('_id');
        $('#leftOptionVal').val(left_id);
    }
    else if (element.attr('_type') == 'rightOption'){
        right_id = element.attr('_id');
        $('#rightOptionVal').val(right_id);
    }
}

/* This assigns text form values to the submit form when the user clicks on submit button */
function onSubmit() {
    $('#centreTextVal').val($('#step2').val());
}
</script>

</body>

