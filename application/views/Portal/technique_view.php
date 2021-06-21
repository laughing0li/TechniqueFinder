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

$this->load->view('layout/portal_header.php');?>
<head><title>AGN Laboratory Finder</title></head>
<link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/4.12/video.js"></script>


<body>

    <div id="content" class="container">
	<div class="d-flex mb-2">
            <div class="p-2 me-auto">
<?php

if($prevPage=='listTechniques'){
    echo '<div class="p-2"><button class="btn btn-primary" type="submit" onclick="window.location.assign(\''.base_url().'Portal/listTechniques\')">Back to list of available techniques</button></div>';
}
?>
            </div>   
            <div class="p-2">
                <button class="btn btn-primary" type="submit" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back to start</button>
            </div>
        </div>


        <h1><?php echo $theTechnique->name; ?></h1>

        <h5>About this technique</h5>
        <hr>
        <?php echo $theTechnique->description; ?>
        <hr>
        <div class='row card-group'>

        <?php
        foreach($localisationItems as $key=>$localisation) {
            echo "<div class='col-4'>";
            echo "<div class='card border-primary h-100'>";
            echo "<div class='card-header text-white bg-primary'>".$locationItems[$key][0]." at ".$locationItems[$key][1]."</div>";
            echo "<div class='card-body'>";
	    echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr class='tf-font-14'>";
                    echo (empty($theTechnique->model)) ? "":"<th scope='col'>Model</th>";
                    echo (empty($theTechnique->manufacturer)) ? "":"<th scope='col'>Manufacturer</th>";
                    echo (empty($theTechnique->sample_type)) ? "":"<th scope='col'>Sample Type</th>";
                    echo (empty($theTechnique->analysis_type)) ? "":"<th scope='col'>Analysis Type</th>";
                    echo (empty($theTechnique->wavelength)) ? "":"<th scope='col'>Wavelength</th>";
                    echo (empty($theTechnique->beam_diameter)) ? "":"<th scope='col'>Beam Diameter</th>";
                    echo (empty($theTechnique->min_conc)) ? "":"<th scope='col'>Min Conc.</th>";
                    echo (empty($theTechnique->technique)) ? "":"<th scope='col'>Technique</th>";
                    echo (empty($theTechnique->mass)) ? "":"<th scope='col'>Mass</th>";
                    echo (empty($theTechnique->volume)) ? "":"<th scope='col'>Volume (mm<sup>3</sup>)</th>";
                    echo (empty($theTechnique->pressure)) ? "":"<th scope='col'>Pressure (GPa)</th>";
                    echo (empty($theTechnique->temperature)) ? "":"<th scope='col'>Temp. (K)</th>";
                    echo (empty($theTechnique->ext_reference)) ? "":"<th scope='col'>Reference</th>";
                    
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr class='tf-font-14'>";
                    echo (empty($theTechnique->model)) ? "":"<th scope='row'>$theTechnique->model</th>";
                    echo (empty($theTechnique->manufacturer)) ? "":"<td>$theTechnique->manufacturer</td>";
                    echo (empty($theTechnique->sample_type)) ? "":"<td>$theTechnique->sample_type</td>";
                    echo (empty($theTechnique->analysis_type)) ? "":"<td>$theTechnique->analysis_type</td>";
                    echo (empty($theTechnique->wavelength)) ? "":"<td>$theTechnique->wavelength</td>";
                    echo (empty($theTechnique->beam_diameter)) ? "":"<td>$theTechnique->beam_diameter</td>";
                    echo (empty($theTechnique->min_conc)) ? "":"<td>$theTechnique->min_conc</td>";
                    echo (empty($theTechnique->technique)) ? "":"<td>$theTechnique->technique</td>";
                    echo (empty($theTechnique->mass)) ? "":"<td>$theTechnique->mass</td>";
                    echo (empty($theTechnique->volume)) ? "":"<td>$theTechnique->volume</td>";
                    echo (empty($theTechnique->pressure)) ? "":"<td>$theTechnique->pressure</td>";
                    echo (empty($theTechnique->temperature)) ? "":"<td>$theTechnique->temperature</td>";
                    echo (empty($theTechnique->ext_reference)) ? "":"<td>$theTechnique->ext_reference</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<p class='card-text'>Year Commissioned: ".$localisation[0]."</p>";
            echo "<p class='card-text'>Applications: ";
            foreach(array_slice($localisation, 1) as $application) {
                echo $application.", ";
            }
            echo "</p>";
            echo "<p class='card-text'>Address: ".$locationItems[$key][2]."</p>";
            echo "<p class='card-text'>State: ".$locationItems[$key][3]."</p>";
            echo "<p class='card-text'>Contact: ".$locationItems[$key][4]."</p>";
            echo "</div>"; /* card-body */
            echo "</div>"; /* card */
            echo "</div>"; /* col-4 */
        }
        echo "</div>"; /* card-group */
        ?>
<!--
        <div>
            <?php
            if(count($caseStudies)){
                echo '<h5>Case Studies</h5><hr>';
            }

            foreach($caseStudies as $cs){

                echo '<ul>';
                    echo '<li>';
                        echo "<a href=". $cs->url .">".strip_tags($cs->name) ."</a>";
                    echo '</li>';
                echo '</ul>';

            }
            ?>
        </div>

        <div>
            <?php
            if(count($references)){
                echo '<h5>References</h5><hr>';
            }

            foreach((array)$references as $r){

                echo '<ul>';
                echo '<li>';
                echo $r->reference_names;
                echo '<a class="reference" href="'.$r->url.'" target="_blank">';
                echo $r->title;
                echo '</a>';
                echo '</li>';
                echo '</ul>';

            }
            ?>
        </div>


        <div>
            <?php
            if(count($outputExamples)){
                echo '<h5>Output examples</h5><hr>';
            }

            foreach((array)$outputExamples as $r){
                if(substr($r->location, -3)== 'flv'){
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<video id="MY_VIDEO_1" class="video-js vjs-default-skin" controls
                                        width="225" height="189" 
                                         data-setup="{}">                                        
                                         <source src="'.base_url().'media-dir/'.$r->location.'" type=\'video/flv\'>
                                         <param name="wmode" value="transparent">
                                         <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                      </video>';

                    echo '</div>';
                    echo '<span class="tf-caption">'.$r->caption.'</span>';
                    echo '</div>';
                    echo '</div>';

                }
                else if(substr($r->location, -3)== 'f4v'){
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<video id="MY_VIDEO_1" class="video-js vjs-default-skin" controls
                                       preload="auto" width="225" height="189"
                                         data-setup="{ "controlBar": { "volumeMenuButton": false } }">                                        
                                         <source src="'.base_url().'media-dir/'.$r->location.'" type=\'video/mp4\'>
                                         <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                      </video>';

                    echo '</div>';
                    echo '<span class="tf-caption">'.$r->caption.'</span>';
                    echo '</div>';
                    echo '</div>';

                }else{echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<img src="'.base_url().'media-dir/'.$r->location.'" width="'.$r->width.'" height="'.$r->height.'" alt="['.$r->name.']">';
                    echo '</div>';
                    echo '<span class="tf-caption">'.$r->caption.'</span>';
                    echo '</div>';
                    echo '</div>';

                }


            }
            ?>
        </div>

        <div>
            <?php
            if(count($instrumentExamples)){
                echo '<h5>Instrument examples</h5><hr>';
            }

            foreach((array)$instrumentExamples as $r){
                if(substr($r->location, -3)== 'flv'){
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<video id="MY_VIDEO_2" class="video-js vjs-default-skin" controls
                                        width="225" height="189" 
                                         data-setup="{}">                                        
                                         <source src="'.base_url().'media-dir/'.$r->location.'" type=\'video/flv\'>
                                         <param name="wmode" value="transparent">
                                         <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                      </video>';

                    echo '</div>';
                    echo '<span class="tf-caption">'.$r->caption.'</span>';
                    echo '</div>';
                    echo '</div>';

                }
                else if(substr($r->location, -3)== 'f4v'){
                    echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<video id="MY_VIDEO_1" class="video-js vjs-default-skin" controls
                                       preload="auto" width="225" height="189"
                                         data-setup="{ "controlBar": { "volumeMenuButton": false } }">                                        
                                         <source src="'.base_url().'media-dir/'.$r->location.'" type=\'video/mp4\'>
                                         <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                      </video>';

                    echo '</div>';
                    echo '<span class="tf-caption">'.$r->caption.'</span>';
                    echo '</div>';
                    echo '</div>';

                }else{echo '<div style="width:250px;display:inline-block;overflow:auto;vertical-align:top">';

                    echo '<div style="width:225px;">';
                    echo '<div style="display:block;margin-left:auto;margin-right:auto;">';
                    echo '<img src="'.base_url().'media-dir/'.$r->location.'" width="'.$r->width.'" height="'.$r->height.'" alt="['.$r->name.']">';
                    echo '</div>';
                    echo '<span class="tf-caption">'.$r->caption.'</span>';
                    echo '</div>';
                    echo '</div>';

                }


            }
            ?>
        </div>
        <br><br>

-->

    </div>
    <div id="footer">
        <?php include 'footer.php';?>
    </div>
    <div style="clear: both"><!-- ff --></div>

<!--   <div id="infobox">
        <table cellpadding="0" border="0" width="100%" style="padding-top: 12em;"><tbody>
            <tr>
                <td>
                    <h5 class="contact-an-expert">Contact an expert</h5>
                    <hr class="hr-style">

                    <div align="center" class="content">
                        <h2 align="left" class="content">If you are interested in this technique please contact one of our experts at the most suitable location.</h2>

                        <?php
                        foreach((array)$theContacts as $contact) {
                            echo '<p align="left">'
                                .'<strong>'.$contact->institution.'</strong><br>'
                                .$contact->title.' '.$contact->name.'<br>'
                                .'T: '.$contact->telephone.'<br>'
                                .'E: <a href="mailto:'.$contact->email.'">'.$contact->email.'</a>'
                                .'<br>'
                                .'</p>';
                        }
                        ?>

                    </div>
                </td>
            </tr>
            </tbody></table>
    </div> -->

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
    $(document).ready(function () {

        $('.vjs-volume-control vjs-control').hide();
        $('.vjs-big-play-button').hide();
        $('.vjs-control').hide();
        $('.vjs-volume-control').hide()
    })






</script>

<?php $this->load->view('layout/portal_footer.php')?>

