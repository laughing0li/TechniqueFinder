<?php $this->load->view('layout/portal_header.php');?>
<head><title>AGN Laboratory Finder</title></head>
<body>
        
    <div id="main">
        <div id="content" class="container">
            <span class="d-flex justify-content-end">
                <div class="p-2">
                    <button class="btn btn-primary" type="submit" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back</button>
                </div>
            </span>
           
            <div class="clear"></div>
            <h1>List of Available Techniques</h1>
            <table class="table table-striped">
                 <thead>
                     <tr class="tf-font-14">
                          <th scope="col">Model</th>
                          <th scope="col">Instrument Type</th>
                          <th scope="col">Manufacturer</th>
                     </tr>
                </thead>
                <tbody>
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
                        echo '<tr class="tf-font-14"><th scope="row"><a href="'.base_url().'Portal/viewTechnique/'.$r->id.'?nav_from=listTechniques" >'.$r->model.'</a></th><td>'.$r->instrument_name.'</td><td>'.$r->manufacturer.'</td></tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>            



        <div id="footer">
            <?php include 'footer.php';?>
        </div>
        <div style="clear: both"><!-- ff --></div>
    </div>

    <div id="infobox"> </div>

</body>

<?php $this->load->view('layout/portal_footer.php')?>

