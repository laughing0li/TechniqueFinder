<?php

/**
 * TechniqueFinder - technique_view.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

$this->load->view('layout/portal_header.php'); ?>

<head>
    <title>Experimental instrument</title>
    <style>
        .tf-font-14 {
            color: #282572 !important;
        }
    </style>
</head>
<link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/4.12/video.js"></script>


<body>
    <div style='background: #282572'>
        <div class='container-md'>
            <?php include 'header.php'; ?>
        </div>
        <div class='row card-group'>
            <?php
            foreach ($localisationItems as $key => $localisation) {
                echo "<div class='col-lg-6' style='margin: auto'> ";
                echo "<div class='card h-100'>";
                echo "<div style='background-color: #ED5D4A' class='card-header text-white'>" . $locationItems[$key][0] . " at " . $locationItems[$key][1] . "</div>";
                echo "<div class='card-body' >";
                echo "<p class='card-text'>Applications: ";
                foreach (array_slice($localisation, 1) as $application) {
                    echo $application . ";&nbsp&nbsp";
                }
                echo "</p>";
                echo "<p class='card-text'>Year Commissioned: " . $localisation[0] . "</p>";
                echo "<p class='card-text'>Address: " . $locationItems[$key][2] . "</p>";
                echo "<p class='card-text'>State: " . $locationItems[$key][3] . "</p>";
                echo "<p class='card-text'>Contact: " . $locationItems[$key][4] . "</p>";
                echo "<table class='table table-striped'>";
                echo "<thead>";
                echo "<tr class='tf-font-14'>";
                echo (empty($theTechnique->model)) ? "" : "<th scope='col'>Model</th>";
                echo (empty($theTechnique->manufacturer)) ? "" : "<th scope='col'>Manufacturer</th>";
                echo (empty($theTechnique->sample_type)) ? "" : "<th scope='col'>Sample Type</th>";
                echo (empty($theTechnique->analysis_type)) ? "" : "<th scope='col'>Analysis Type</th>";
                echo (empty($theTechnique->wavelength)) ? "" : "<th scope='col'>Wavelength</th>";
                echo (empty($theTechnique->beam_diameter)) ? "" : "<th scope='col'>Beam Diameter</th>";
                echo (empty($theTechnique->min_conc)) ? "" : "<th scope='col'>Min Conc.</th>";
                echo (empty($theTechnique->technique)) ? "" : "<th scope='col'>Technique</th>";
                echo (empty($theTechnique->mass)) ? "" : "<th scope='col'>Mass</th>";
                echo (empty($theTechnique->volume)) ? "" : "<th scope='col'>Volume (mm<sup>3</sup>)</th>";
                echo (empty($theTechnique->pressure)) ? "" : "<th scope='col'>Pressure (GPa)</th>";
                echo (empty($theTechnique->temperature)) ? "" : "<th scope='col'>Temp. (K)</th>";
                echo (empty($theTechnique->ext_reference)) ? "" : "<th scope='col'>Reference</th>";

                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                echo "<tr class='tf-font-14'>";
                echo (empty($theTechnique->model)) ? "" : "<th scope='row'>$theTechnique->model</th>";
                echo (empty($theTechnique->manufacturer)) ? "" : "<td>$theTechnique->manufacturer</td>";
                echo (empty($theTechnique->sample_type)) ? "" : "<td>$theTechnique->sample_type</td>";
                echo (empty($theTechnique->analysis_type)) ? "" : "<td>$theTechnique->analysis_type</td>";
                echo (empty($theTechnique->wavelength)) ? "" : "<td>$theTechnique->wavelength</td>";
                echo (empty($theTechnique->beam_diameter)) ? "" : "<td>$theTechnique->beam_diameter</td>";
                echo (empty($theTechnique->min_conc)) ? "" : "<td>$theTechnique->min_conc</td>";
                echo (empty($theTechnique->technique)) ? "" : "<td>$theTechnique->technique</td>";
                echo (empty($theTechnique->mass)) ? "" : "<td>$theTechnique->mass</td>";
                echo (empty($theTechnique->volume)) ? "" : "<td>$theTechnique->volume</td>";
                echo (empty($theTechnique->pressure)) ? "" : "<td>$theTechnique->pressure</td>";
                echo (empty($theTechnique->temperature)) ? "" : "<td>$theTechnique->temperature</td>";
                echo (empty($theTechnique->ext_reference)) ? "" : "<td>$theTechnique->ext_reference</td>";
                echo "</tr>";
                echo "</tbody>";
                echo "</table>";
                echo "</div>"; /* card-body */
                echo "</div>"; /* card */
                echo "</div>"; /* col-4 */
            }
            echo "</div>"; /* card-group */
            ?>
            <!--
        <div>
            <?php
            if (count($caseStudies)) {
                echo '<h5>Case Studies</h5><hr>';
            }

            foreach ($caseStudies as $cs) {

                echo '<ul>';
                echo '<li>';
                echo "<a href=" . $cs->url . ">" . strip_tags($cs->name) . "</a>";
                echo '</li>';
                echo '</ul>';
            }
            ?>
        </div>

        <div>
            <?php
            if (count($references)) {
                echo '<h5>References</h5><hr>';
            }

            foreach ((array)$references as $r) {

                echo '<ul>';
                echo '<li>';
                echo $r->reference_names;
                echo '<a class="reference" href="' . $r->url . '" target="_blank">';
                echo $r->title;
                echo '</a>';
                echo '</li>';
                echo '</ul>';
            }
            ?>
        </div>


        <div>
            <?php
            if (count($outputExamples)) {
                echo '<h5>Output examples</h5><hr>';
            }

            foreach ((array)$outputExamples as $r) {
                if (substr($r->location, -3) == 'flv') {
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<video id="MY_VIDEO_1" class="video-js vjs-default-skin" controls
                                        width="225" height="189" 
                                         data-setup="{}">                                        
                                         <source src="' . base_url() . 'media-dir/' . $r->location . '" type=\'video/flv\'>
                                         <param name="wmode" value="transparent">
                                         <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                      </video>';

                    echo '</div>';
                    echo '<span class="tf-caption">' . $r->caption . '</span>';
                    echo '</div>';
                    echo '</div>';
                } else if (substr($r->location, -3) == 'f4v') {
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<video id="MY_VIDEO_1" class="video-js vjs-default-skin" controls
                                       preload="auto" width="225" height="189"
                                         data-setup="{ "controlBar": { "volumeMenuButton": false } }">                                        
                                         <source src="' . base_url() . 'media-dir/' . $r->location . '" type=\'video/mp4\'>
                                         <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                      </video>';

                    echo '</div>';
                    echo '<span class="tf-caption">' . $r->caption . '</span>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<img src="' . base_url() . 'media-dir/' . $r->location . '" width="' . $r->width . '" height="' . $r->height . '" alt="[' . $r->name . ']">';
                    echo '</div>';
                    echo '<span class="tf-caption">' . $r->caption . '</span>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <div>
            <?php
            if (count($instrumentExamples)) {
                echo '<h5>Instrument examples</h5><hr>';
            }

            foreach ((array)$instrumentExamples as $r) {
                if (substr($r->location, -3) == 'flv') {
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<video id="MY_VIDEO_2" class="video-js vjs-default-skin" controls
                                        width="225" height="189" 
                                         data-setup="{}">                                        
                                         <source src="' . base_url() . 'media-dir/' . $r->location . '" type=\'video/flv\'>
                                         <param name="wmode" value="transparent">
                                         <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                      </video>';

                    echo '</div>';
                    echo '<span class="tf-caption">' . $r->caption . '</span>';
                    echo '</div>';
                    echo '</div>';
                } else if (substr($r->location, -3) == 'f4v') {
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<video id="MY_VIDEO_1" class="video-js vjs-default-skin" controls
                                       preload="auto" width="225" height="189"
                                         data-setup="{ "controlBar": { "volumeMenuButton": false } }">                                        
                                         <source src="' . base_url() . 'media-dir/' . $r->location . '" type=\'video/mp4\'>
                                         <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                      </video>';

                    echo '</div>';
                    echo '<span class="tf-caption">' . $r->caption . '</span>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<img src="' . base_url() . 'media-dir/' . $r->location . '" width="' . $r->width . '" height="' . $r->height . '" alt="[' . $r->name . ']">';
                    echo '</div>';
                    echo '<span class="tf-caption">' . $r->caption . '</span>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>

        </div>
        <br><br>

-->

                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <div class='container-md'>
        <?php include 'footer.php'; ?>
    </div>


    <div style="clear: both">
        <!-- ff -->
    </div>
</body>
<script type="text/javascript">
    var player = videojs('MY_VIDEO_1', {
        controlBar: {
            muteToggle: false
        }
    });

    var player = videojs('MY_VIDEO_2', {
        controlBar: {
            muteToggle: false
        }
    });
    $(document).ready(function() {

        $('.vjs-volume-control vjs-control').hide();
        $('.vjs-big-play-button').hide();
        $('.vjs-control').hide();
        $('.vjs-volume-control').hide()
    })
</script>

<?php $this->load->view('layout/portal_footer.php') ?>