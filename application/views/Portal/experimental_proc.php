<?php $this->load->view('layout/portal_header.php'); ?>
<head><title>Experimental Procedures</title></head>
<body>
<div class="container-lg">
    <?php include 'header.php'; ?>

<div id="content" class="container">

    <div class="d-flex justify-content-end">
        <div class="p-2">
            <button type="submit" class="btn outline-primary" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back</button>
        </div>
    </div>

    <?php echo $staticData['tf.expProcChoices.quickGuide']; ?>

    <div class="row card-group mt-2">
        <?php
        foreach ($techniqueList as $key => $technique_view) {
            echo "<div class='col-4'>";
            echo "<div class='card border-white h-100'>";
            echo "<div class='card-header text-white' style='background-color: #ED5D4A'>$technique_view->category</div>";
            echo "<div class='card-body'>";
            echo "<p class='card-text'>Model: $technique_view->model</p>";
            echo "<p class='card-text'>Manufacturer: $technique_view->manufacturer</p>";
            echo (empty($technique_view->volume)) ? "" : "<p class='card-text'>Volume: $technique_view->volume mm<sup>3</sup></p>";
            echo (empty($technique_view->pressure)) ? "" : "<p class='card-text'>Max. Pressure: $technique_view->pressure GPa</p>";
            echo (empty($technique_view->temperature)) ? "" : "<p class='card-text'>Max. Temperature: $technique_view->temperature K</p>";
            echo "<p class='card-text'>$technique_view->summary</p>";
            echo "<button type='submit'  class='btn outline-primary' onclick='window.location.assign(\"" . base_url() . "Portal/viewTechnique/" . $technique_view->technique_id . "\")'>Details</button>";
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
    <?php include 'footer.php'; ?>
</div>

<div style="clear: both"><!-- ff --></div>
</div>

<div id="infobox"></div>


</body>

<?php $this->load->view('layout/portal_footer.php') ?>

