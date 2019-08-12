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
            <?php echo $staticData['tf.home.quickGuide']; ?>

            <h5>Option 1: Choose your research interest</h5>
            <hr>
            <table width="100%">
            <tbody><tr>
                <td class="tf-yellow-box" style="padding:0.5em;" valign="top">
                    <span id="content"><?php if(isset($staticData['tf.home.optionsExplanation'])){echo $staticData['tf.home.optionsExplanation'];}?></span>
                  <span class="buttons">
                      <ul style='list-style: none'>
                      <li id="button_bio"><a href="<?php echo base_url();?>Portal/bioOptionsSelection"></a></li>
                        <li id="button_phys"><a href="<?php echo base_url();?>Portal/physicsOptionsSelection"></a></li>
                      </ul>
                  </span>
                  
                 </td>
            </tr>
            </tbody>
            </table>
        
            <h5>Option 2: Search by keyword</h5>
            <hr>
            <table width="100%">
            <tbody><tr>
                <td class="tf-yellow-box" style="padding:1em;" valign="top">
                    <span class="portalOptionText"><?php echo $staticData['tf.home.searchExplanation']; ?></span>
                    <form action="<?php echo base_url();?>Portal/techniqueSearch" method="get" name="searchForm" id="searchForm">
                    Search <input id="searchBox" name="q" type="text" style="width:85%;">
                    <p><span class="go_container"><span id="button_go"><a href="javascript:document.searchForm.submit()"></a></span></span></p>
                    </form>
                 </td>
            </tr>
            </tbody></table>
        
            <h5>Option 3: View list of available techniques</h5>
            <hr>
            <table width="100%">
            <tbody><tr>
                <td class="tf-yellow-box" style="padding:1em;" valign="top">
                    <span class="portalOptionText"><?php echo html_entity_decode($staticData['tf.home.allTechniquesExplanation']); ?></span>
                    <p><span class="go_container"><span id="button_viewList"><a href="<?php echo base_url();?>Portal/listTechniques"></a></span></span></p>
                 </td>
            </tr>
            </tbody></table>
            <p><span style="margin: 10px 0 10px 0;"><a class="tf-top" href="#top" title="top">TOP</a></span></p>
        </div>
            
        <div id="footer">
            <p id="attribution_ammrf" style="float:left;">© 2018 Microscopy Australia | <a href="mailto:feedback@micro.org.au" class="style1 style1">Feedback</a> | <a id="footer" href="http://ammrf.org.au/legal-notices/" title="disclaimer">Disclaimer</a></p>
            <p id="attribution_intersect" style="float:right;"> <a class="intersect_logo_link" href="http://www.intersect.org.au/" target="_blank"></a>Developed by <a href="http://www.intersect.org.au/" target="_blank">Intersect Australia</a></p>
        </div>
    
        <div style="clear: both"><!-- ff --></div>
    </div>

    <div id="infobox">
        <?php echo $staticData['tf.home.infoboxContent']; ?>
    </div>

</body>

<?php $this->load->view('layout/portal_footer.php')?>

