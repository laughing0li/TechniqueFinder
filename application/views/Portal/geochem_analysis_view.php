<?php
/**
 * TechniqueFinder - geochem_analysis_view.php
 *
 */

$this->load->view('layout/portal_header.php');?>
<head><title>AGN Laboratory Finder</title></head>


<body>

    <div id="content" class="container">
	<div class="d-flex mb-2">
            <div class="p-2">
                <button class="btn btn-primary" type="submit" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back to start</button>
            </div>
        </div>


        <h1><?php echo $theTechnique->name; ?></h1>

        <hr>
        <p class='tf-font-14'><?php echo $theTechnique->description; ?></p>
        <hr>
        <br>
        <div class='row tf-font-14'>

        <?php
        foreach($localisationItems as $key=>$localisation) {
            echo "<span class='tf-font-18' style='text-decoration: underline; font-weight: bold'>".$locationItems[$key][1]."</span>";

            echo "<table class='table w-50 p-3'>";
            echo "<thead>";
            echo "<tr class='tf-font-14'>";
                    echo (empty($theTechnique->model)) ? "":"<th scope='col'>Instrument</th>";
                    echo (empty($theTechnique->model)) ? "":"<th scope='col'>Model</th>";
                    echo (empty($theTechnique->sample_type)) ? "":"<th scope='col'>Elements analysed</th>";
                    
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr class='tf-font-14'>";
                    echo (empty($theTechnique->model)) ? "":"<td scope='row'>$theTechnique->model</td>";
                    echo (empty($theTechnique->model)) ? "":"<td scope='row'>$theTechnique->model</td>";
                    echo (empty($theTechnique->sample_type)) ? "":"<td>$theTechnique->sample_type</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<hr>";
            echo "<span style='text-decoration: underline; font-weight: bold'>Contact Details</span>";
            echo "<span>".$locationItems[$key][6]."</span>";
            echo "<span>T: ".$locationItems[$key][5]."</span>";
            echo "<span>E: ".$locationItems[$key][4]."</span>";
            echo "<span>Address: ".$locationItems[$key][2]."</span>";
            echo "<hr>";
            echo "<br>";
        }
        ?>
        </div> <!-- end 'row' -->
        <br>

    </div>
    <div id="footer">
        <?php include 'footer.php';?>
    </div>

</body>

<?php $this->load->view('layout/portal_footer.php')?>

