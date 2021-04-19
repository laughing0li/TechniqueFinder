<?php $this->load->view('layout/portal_header.php');?>
<head><title>AGN Instrument Finder</title></head>
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
            <h1>List of available techniques</h1>
            <ul>
                <?php
/**
 * TechniqueFinder - technique_list.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

foreach($allTechniques as $r){
                        echo '<li><a style="font-size:12px;font-weight:500;" href="'.base_url().'Portal/viewTechnique/'.$r->id.'?nav_from=listTechniques" >'.$r->name.'</a></li>';
                    }
                ?>
            </ul>
        </div>            



        <div id="footer">
            <?php include 'footer.php';?>
        </div>
        <div style="clear: both"><!-- ff --></div>
    </div>

    <div id="infobox"> </div>

</body>

<?php $this->load->view('layout/portal_footer.php')?>

