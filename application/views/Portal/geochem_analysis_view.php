<?php

/**
 * TechniqueFinder - geochem_analysis_view.php
 *
 */

$this->load->view('layout/portal_header.php'); ?>

<head>
    <title>Analysis View</title>
</head>


<body>
    <div class="header-bg-color">
        <div class='container-md'>
            <?php include 'header.php'; ?>
        </div>
    </div>
    <div class="bg-color">

        <div class="container-md">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <div id="content" class="container">
                            <div class="row">
                                <div class="col">

                                    <h1><?php echo $theTechnique->name; ?></h1>
                                    <p class='tf-font-14'><?php echo $theTechnique->description; ?></p>
                                </div>
                                <div class="col">
                                    <button style='float: right' class="btn outline-primary" type="submit" onclick="window.location.assign('<?php echo base_url(); ?>Portal/geochemOptionsSelection')">Back</button>

                                </div>
                            </div>
                            <div class="border-bottom" style="margin: 50px 0"></div>

                            <br>
                            <div class='row tf-font-14'>

                                <?php
                                foreach ($localisationItems as $key => $localisation) {
                                    echo "<div class='col'>";
                                    echo "<div style='border: 1px solid #ED5D4A; width: 400px; padding: 20px 20px;'>";

                                    echo "<span class='tf-font-18' font-weight: bold'>" . $locationItems[$key][1] . "</span>";

                                    echo "<table class='table ' style='margin-top: 20px' >";
                                    echo "<thead>";
                                    echo "<tr class='tf-font-14' style='color: white !important'>";
                                    echo (empty($theTechnique->model)) ? "" : "<th scope='col'>Instrument</th>";
                                    echo (empty($theTechnique->model)) ? "" : "<th scope='col'>Model</th>";
                                    echo (empty($theTechnique->sample_type)) ? "" : "<th scope='col'>Elements analysed</th>";

                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    echo "<tr class='tf-font-14'>";
                                    echo (empty($theTechnique->model)) ? "" : "<td scope='row'>$theTechnique->model</td>";
                                    echo (empty($theTechnique->model)) ? "" : "<td scope='row'>$theTechnique->model</td>";
                                    echo (empty($theTechnique->sample_type)) ? "" : "<td>$theTechnique->sample_type</td>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "<p style='text-decoration: underline; font-weight: bold'>Contact Details</p>";
                                    echo "<p>" . $locationItems[$key][6] . "</p>";
                                    echo "<p>T: " . $locationItems[$key][5] . "</p>";
                                    echo "<p>E: " . $locationItems[$key][4] . "</p>";
                                    echo "<p>Address: " . $locationItems[$key][2] . "</p>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "<br>";
                                }
                                ?>

                            </div> <!-- end 'row' -->
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='container-md'>
        <?php include 'footer.php'; ?>
    </div>


</body>

<?php $this->load->view('layout/portal_footer.php') ?>