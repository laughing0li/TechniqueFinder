<?php $this->load->view('layout/portal_header.php');?>
<head>
    <title>AGN Laboratory Finder</title>
</head>
<body>
    <div id="header" class="container tf-main-heading">&nbsp;AGN Laboratory Finder<img style="float: left;" src="assets/images/AGN-Logo.png" width=200></div>
        

    <div class="container" id="content">
        <div class="alert alert-primary" role="alert">
            <?php echo $staticData['tf.home.quickGuide']; ?>
        </div>

        <h3 class="tf-heading">Option 1: Choose your research interest</h3>
        <hr>
        <!-- <?php if(isset($staticData['tf.home.optionsExplanation'])){
            echo "<div class='alert alert-primary' role='alert'>".$staticData['tf.home.optionsExplanation']."</div";
        }?> -->
        <div class="d-grid gap-2 col-6 mx-auto">

            <button class="btn btn-primary" type="button" onclick="window.location.assign('<?php echo base_url();?>Portal/geochemOptionsSelection');">Geochemical Analysis</button>
            <button class="btn btn-primary" type="button" onclick="window.location.assign('<?php echo base_url();?>Portal/expProcOptionsSelection');">Experimental Procedure</button>
            <button class="btn btn-primary" type="button" onclick="window.location.assign('<?php echo base_url();?>Portal/samplePrepOptionsSelection');">Sample Preparation</button>
        </div>
        <hr>
        <h3 class="tf-heading">Option 2: Search by keyword</h3>
        <hr>
	<div class="card">
            <div class="card-body">
		<h5 class="card-title"><?php echo $staticData['tf.home.searchExplanation']; ?></h5>
                <form action="<?php echo base_url();?>Portal/techniqueSearch" method="get" name="searchForm" id="searchForm">
                    <input id="myAutocomplete" type="text" class="form-control" name="q" placeholder="Please type search term here" autocomplete="off">
                    <p></p>
                    <button class="btn btn-primary" type="button" onclick="document.searchForm.submit()">Go</button>
                </form>
            </div>
        </div>
        
        <h3 class="tf-heading">Option 3: View list of available techniques</h3>
        <hr>
	<div class="card">
            <div class="card-body">
		<h5 class="card-title"><?php echo html_entity_decode($staticData['tf.home.allTechniquesExplanation']); ?></h5>
                <p></p>
		<button class="btn btn-primary" type="button" onclick="window.location.assign('<?php echo base_url();?>Portal/listTechniques');">View List</button>
                </form>
            </div>
        </div>
    </div>
            
    <div class="container" id="footer">
        <?php include 'footer.php';?>
    </div>

    <div style="clear: both"><!-- ff --></div>

    <div class="container" id="infobox">
        <?php echo $staticData['tf.home.infoboxContent']; ?>
    </div>
<script>
var datasrc = [
<?php $keyword_list = $this->Techniques_model->getKeywordList();
foreach($keyword_list as $keyword) {
    echo "{label: '".$keyword->name."', value: '".$keyword->name."'},\n";
}
?>
];
const ac = new Autocomplete(document.getElementById('myAutocomplete'), {
      data: datasrc
})
</script>
</body>

<?php $this->load->view('layout/portal_footer.php')?>

