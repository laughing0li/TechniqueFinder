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
    <div id="header" class="tf-main-heading">AGN Instrument Finder<img style="float: right;" src="assets/images/AGN-Logo.png" width=200></div>
        
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
                        <!-- <li id="button_bio"><a href="<?php echo base_url();?>Portal/geochemOptionsSelection"></a></li> -->
		        <!-- <li id="button_phys"><a href="<?php echo base_url();?>Portal/physicsOptionsSelection"></a></li> -->
                        <li id="button_geochem"><a href="<?php echo base_url();?>Portal/geochemOptionsSelection"></a></li>
                        <li id="button_exp_proc"><a href="<?php echo base_url();?>Portal/expProcOptionsSelection"></a></li>
                        <li id="button_sample_prep"><a href="<?php echo base_url();?>Portal/samplePrepOptionsSelection"></a></li>
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
        </div>
            
        <div id="footer">
            <?php include 'footer.php';?>
        </div>
    
        <div style="clear: both"><!-- ff --></div>
    </div>

    <div id="infobox">
        <?php echo $staticData['tf.home.infoboxContent']; ?>
    </div>

</body>

<?php $this->load->view('layout/portal_footer.php')?>

