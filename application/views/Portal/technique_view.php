<?php $this->load->view('layout/portal_header.php');?>
<head><title>TechFi™</title></head>
<link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/4.12/video.js"></script>


<style>
    input, select, textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        margin-top: 9px;
        width: 16em;
</style>
<body>

<div id="main">

    <div id="content">
            <span class="nav_buttons">
                <ul>
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

if($prevPage=='listTechniques'){
    echo '<li id="button_backAllTech"><a href="'.base_url().'Portal/listTechniques"></a></li>';
}
?>
                </ul>
            </span>

        <span class="nav_buttons">
                <ul>
                    <li id="button_backStart"><a style="float:right" href="<?php echo base_url();?>Portal"></a></li>
                    <?php if(isset($science) && isset($left) && isset($right)){?>
                        <?php if($science!='' && $left!='' && $right!=''){?>
                        <?php if($science =='BIOLOGY'){ ?>
                            <li id="button_backShowPosTech"><a style="float:left;" href="<?php echo base_url().'Portal/getTechniqueByOptionCombination?science='.$science.'&leftOption='.$left.'&rightOption='.$right;?>"></a></li>
                        <?php }else{?>
                            <li id="button_backShowPosTech"><a style="float:left;" href="<?php echo base_url().'Portal/getTechniqueByOptionCombination?science='.$science.'&leftOption='.$left.'&rightOption='.$right;?>"></a></li>
                        <?php }?>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </span>


        <div class="clear"></div>
        <h1><?php echo $theTechnique->name; ?></h1>

        <h5>About this technique</h5>
        <hr>
        <?php echo $theTechnique->description; ?>

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


        <p><span style="margin: 10px 0 10px 0;"><a class="tf-top" href="#top" title="top">TOP</a></span></p>

    </div>
    <div id="footer">
        <p id="attribution_ammrf" style="float:left;">© 2018 Microscopy Australia | <a href="mailto:feedback@ammrf.org.au" class="style1 style1">Feedback</a> | <a id="footer" href="http://www.ammrf.org.au/disclaimer.php" title="disclaimer">Disclaimer</a></p>
        <p id="attribution_intersect" style="float:right;"> <a class="intersect_logo_link" href="http://www.intersect.org.au/" target="_blank"></a>Developed by <a href="http://www.intersect.org.au/" target="_blank">Intersect Australia</a></p>
    </div>
    <div style="clear: both"><!-- ff --></div>

    <div id="infobox">
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
    </div>
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

