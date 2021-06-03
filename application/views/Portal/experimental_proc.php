<?php $this->load->view('layout/portal_header.php');?>
<head><title>AGN Laboratory Finder</title></head>
<body>
        
        <div id="content" class="container">
	    <div class="d-flex justify-content-end">
                <div class="p-2">
		    <button type="submit" class="btn btn-primary" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back</button>
                </div>
            </div>
         
            <div class="alert alert-primary">
                <?php echo $staticData['tf.expProcChoices.quickGuide']; ?>
            </div>

            <div class="row card-group mt-2">
            <?php
            foreach($techniqueList as $key => $technique) {
            echo "<div class='col-4'>";
            echo "<div class='card border-primary h-100'>";
            echo "<div class='card-header text-white bg-primary'>$technique->instrument_name</div>";
            echo "<div class='card-body'>";
            echo "<p class='card-text'>Model: $technique->model</p>";
            echo "<p class='card-text'>Manufacturer: $technique->manufacturer</p>";
            echo (empty($technique->volume))? "":"<p class='card-text'>Volume: $technique->volume mm<sup>3</sup></p>";
            echo (empty($technique->pressure))? "":"<p class='card-text'>Max. Pressure: $technique->pressure GPa</p>";
            echo (empty($technique->temperature))? "":"<p class='card-text'>Max. Temperature: $technique->temperature K</p>";
            echo "<p class='card-text'>$technique->summary</p>";
	    echo "<button type='submit' class='btn btn-primary' onclick='window.location.assign(\"".base_url()."Portal/viewTechnique/".$technique->id."\")'>Details</button>";
            echo "</div>"; /* card-body */
            echo "</div>"; /* card */
            echo "</div>"; /* col-4 */
            if ($key % 3 == 2) {
                echo "</div><div class='row card-group mt-2'>";
            } 
            }
            ?>
            </div>
                
        </div>            



        <div id="footer" class="container">
            <?php include 'footer.php';?> 
        </div>
        <div style="clear: both"><!-- ff --></div>
    </div>

    <div id="infobox"> </div>

    

</body>

<?php $this->load->view('layout/portal_footer.php')?>

