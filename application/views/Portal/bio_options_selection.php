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
                    <li id="button_backStart"><a style="float: right;" href="<?php echo base_url();?>Portal"></a></li>
                </ul>
            </span>
           
            <div class="clear"></div>
         
            <?php echo $staticData['tf.biologyChoices.quickGuide']; ?>

<div style="float:left;margin-left:15px;">
    <div style="float:left;">
        <table style="text-align: left;">
            <tr>
                <td class="tf-yellow-box" valign="top">
                <div class="tf-setp-title"><?php echo strip_tags($staticData['tf.biologyChoices.left.title']);?> </div>
                    <ul style="padding-left:15px;">
                        <?php
/**
 * TechniqueFinder - bio_options_selection.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

foreach($left_list as $r){
                            echo '<li _id="'.$r->id.'" _type="leftOption" class="tf-buttonDiv" onclick="onSelect(this)">'.$r->name.'</li>';
                        }
                        ?>
                    </ul>                
                </td>
                <td style="width:100px; vertical-align:center;" >
                    <img src="<?php echo base_url().'assets/images/space.gif'?>" width="20" height="5" />
                    <span style="text-align:center;"><h1 class="tf-heading"><?php echo strip_tags($staticData['tf.biologyChoices.comparison.title']);?> </h1></span>
                </td>
                <td class="tf-yellow-box" valign="top">
                    <div class="tf-setp-title"><?php echo strip_tags($staticData['tf.biologyChoices.right.title']);?> </div>
                    <ul style="padding-left:15px;">
                        <?php
                        foreach($right_list as $r){
                            echo '<li _id="'.$r->id.'" _type="rightOption" class="tf-buttonDiv" onclick="onSelect(this)">'.$r->name.'</li>';
                        }
                        ?>
                    </ul> 
                </td>
            </tr>

        </table>
    </div>

    
</div>
<br>
<br>

            <span style="margin: 10px 0 10px 0;"><a class="tf-top" href="#top" title="top">TOP</a></span>
            <span class="nav_buttons">
	        	<form action="<?php echo base_url().'Portal/getTechniqueByOptionCombination';?>" method="get" name="choiceForm" id="choiceForm">
	              <ul style="float:right">
	              	<input type="hidden" id="science" name="science" value="BIOLOGY">
	              	<input type="hidden" id="leftOptionVal" name="leftOption" value="">
	              	<input type="hidden" id="rightOptionVal" name="rightOption" value="">
	                <li id="button_showPosTech" style="display: none;"><a style="float: right;" href="javascript:document.choiceForm.submit()"></a></li>
	                <li id="disabled_showPosTech" ><a style="float: right;" href="#"></a></li>
                    </ul>
	            </form>  
	        </span>

            <br>

        </div>            



        <div id="footer">
             <p id="attribution_ammrf" style="float:left;">© 2018 Microscopy Australia | <a href="mailto:feedback@micro.org.au" class="style1 style1">Feedback</a> | <a id="footer" href="http://ammrf.org.au/legal-notices/" title="disclaimer">Disclaimer</a></p>
             <p id="attribution_intersect" style="float:right;"> <a class="intersect_logo_link" href="http://www.intersect.org.au/" target="_blank"></a>Developed by <a href="http://www.intersect.org.au/" target="_blank">Intersect Australia</a></p>
        </div>
        <div style="clear: both"><!-- ff --></div>
    </div>

    <div id="infobox"> </div>

    

</body>

<script type="text/javascript">
function onSelect(e){
    var left_id = null;
    var right_id = null;
    var element = $(e);
    if(element.attr('_type') == 'leftOption'){
        $('.tf-select-left').removeClass('tf-select-left');
        element.addClass('tf-select-left');
        left_id = element.attr('_id');
        right_id = $('.tf-select-right').attr('_id');
    }
    else if(element.attr('_type') == 'rightOption'){
        $('.tf-select-right').removeClass('tf-select-right');
        element.addClass('tf-select-right');
        right_id = element.attr('_id');
        left_id = $('.tf-select-left').attr('_id');
    }
    else{
       ; 
    }
    if(left_id && right_id){
        $('#leftOptionVal').val(left_id);
        $('#rightOptionVal').val(right_id);
        $('#disabled_showPosTech').hide();
        $('#button_showPosTech').show();
    }
}

</script>

<?php $this->load->view('layout/portal_footer.php')?>

