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
<head><title>AGN Instrument Finder</title></head>
<link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/4.12/video.js"></script>


<body>

<div id="main">

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


        <div class="clear"></div>
        <h1><?php echo $theTechnique->name; ?></h1>

        <h5>About this technique</h5>
        <hr>
        <?php echo $theTechnique->description; ?>
<!--
-->
        <hr>
	<table class="table table-striped">
            <thead>
                <tr class="tf-font-14">
                    <th scope="col">Model</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Sample Type</th>
                    <th scope="col">Analysis Type</th>
                    <th scope="col">Wavelength</th>
                    <th scope="col">Beam Diameter</th>
                    <th scope="col">Min Conc.</th>
                    <th scope="col">Technique</th>
                    <th scope="col">Mass</th>
                    <th scope="col">Volume (mm<sup>3</sup>)</th>
                    <th scope="col">Pressure (GPa)</th>
                    <th scope="col">Temp. (K)</th >
                    <th scope="col">Reference</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tf-font-14">
		    <th scope="row"><?php echo $theTechnique->model; ?></th>
		    <td><?php echo $theTechnique->manufacturer; ?></td>
		    <td><?php echo $theTechnique->sample_type; ?></td>
		    <td><?php echo $theTechnique->analysis_type; ?></td>
		    <td><?php echo $theTechnique->wavelength; ?></td>
		    <td><?php echo $theTechnique->beam_diameter; ?></td>
		    <td><?php echo $theTechnique->min_conc; ?></td>
		    <td><?php echo $theTechnique->technique; ?></td>
		    <td><?php echo $theTechnique->mass; ?></td>
		    <td><?php echo $theTechnique->volume; ?></td>
		    <td><?php echo $theTechnique->pressure; ?></td>
		    <td><?php echo $theTechnique->temperature; ?></td>
		    <td><?php echo $theTechnique->ext_reference; ?></td>
                </tr>
            </tbody>
        </table>
        <div>
        <?php
        echo '<ul>';
        foreach($localisationItems as $localisation) {
            echo "<li>Year Commissioned: ".$localisation[0]."&nbsp;&nbsp;&nbsp;";
            echo "Applications: ";
            foreach(array_slice($localisation, 1) as $application) {
                echo $application.", ";
            }
            echo "</li>";
        }
        echo '</ul>';
        echo '</br>';
        foreach($locationItems as $location) {
            echo '<ul>';
            echo "<li>Name: ".$location[0]."</li>";
            echo "<li>Institution: ".$location[1]."</li>";
            echo "<li>Address: ".$location[2]."</li>";
            echo "<li>State: ".$location[3]."</li>";
            echo '</ul>';
        }
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
    $(document).ready(function () {

        $('.vjs-volume-control vjs-control').hide();
        $('.vjs-big-play-button').hide();
        $('.vjs-control').hide();
        $('.vjs-volume-control').hide()
    })






</script>

<?php $this->load->view('layout/portal_footer.php')?>

