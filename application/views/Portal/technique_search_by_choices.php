<?php $this->load->view('layout/portal_header.php');?>
<head><title>TechFi™</title></head>
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
 * TechniqueFinder - technique_search_by_choices.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

if($science == 'BIOLOGY'){
    echo '<li id="button_backBio"><a href="'.base_url().'Portal/bioOptionsSelection"></a></li>';
}else{
    echo '<li id="button_backPhys"><a href="'.base_url().'Portal/physicsOptionsSelection"></a></li>';
}
?>
                </ul>
            </span>

            <span class="nav_buttons">
                <ul>
                    <li id="button_backStart"><a style="float:right" href="<?php echo base_url();?>Portal"></a></li>
                </ul>
            </span>

           
            <div class="clear"></div>
            <h1>Possible Techniques</h1>
            <hr>
            <p>Results for: <span class="tf-orange"><b><?php echo $leftOption->name.' and '.$rightOption->name ?></b></span></p>


        <?php

                if(count($searchResults)==0){
                    echo "No matching techniques found";
                }
                else{
                foreach ($searchResults as $r) {

                    $mediaForLIST = $Media_model->getMediaInfosByTechniqueIdAndSection($r->id, 'LIST');
                    $media_location = 'nowhere.png';
                    if (isset($mediaForLIST[0])) {
                        $media_location = $mediaForLIST[0]->location;
                    }
                    echo ' <h5>' . $r->name . '</h5>'
                        . '<hr>'
                        . '<table width="100%"> <tbody><tr>'
                        . '<td valign="top">'
                        . '<div class="summary">'
                        . $r->summary
                        . '</div>';
                            echo '<form action="'. base_url().'Portal/viewTechnique/'. $r->id .'" method="POST">'.
                                 '<input type="hidden" name="science" value="'. (isset($science)? $science : '') .'"/>'.
                                 '<input type="hidden" name="left" value="'. (isset($leftOption)? $leftOption->id : '') .'"/>'.
                                 '<input type="hidden" name="right" value="'. (isset($rightOption)? $rightOption->id : '') .'"/>'.
                                '<button class="detailed-information-button"type="submit">Detailed information and contact details</button> '.
                                '</form>';


//                    .'<a href="'.base_url().'Portal/viewTechnique/'.$r->id.'" id="Technique_'.$r->id.'">Detailed information and contact details</a></td>'


                    echo '<td width="10"><img src="' . base_url() . 'images/space.gif" width="10" height="5"></td>'
                        . '<td width="140" valign="top">'
                        . '<div style="display:block;margin-left:auto;margin-right:auto;">'
                        . '<img src="' . base_url() . 'media-dir/' . $media_location . '" width="145" height="145" alt="' . $media_location . '">'
                        . '</div>'
                        . '</td>'
                        . '</tr> </tbody></table>';
                }}

        ?>         
         
            <br><br>
            <!--            <div class="tf-paging">-->
            <!--                --><?php //echo $this->pagination->create_links();?>
            <!--            </div>-->
            <!--         -->

            <p><span style="margin: 10px 0 10px 0;"><a class="tf-top" href="#top" title="top">TOP</a></span></p>

        </div>            
        <div id="footer">
            <p id="attribution_ammrf" style="float:left;">© 2018 Microscopy Australia | <a href="mailto:feedback@micro.org.au" class="style1 style1">Feedback</a> | <a id="footer" href="http://ammrf.org.au/legal-notices/" title="disclaimer">Disclaimer</a></p>
            <p id="attribution_intersect" style="float:right;"> <a class="intersect_logo_link" href="http://www.intersect.org.au/" target="_blank"></a>Developed by <a href="http://www.intersect.org.au/" target="_blank">Intersect Australia</a></p>
        </div>
        <div style="clear: both"><!-- ff --></div>

        <div id="infobox"> </div>
    </div>

</body>

<?php $this->load->view('layout/portal_footer.php')?>

