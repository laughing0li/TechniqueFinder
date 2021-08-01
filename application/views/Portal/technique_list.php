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
?>

<?php $this->load->view('layout/portal_header.php'); ?>
<head><title>Technique List</title></head>
<body>

<div class="container-lg">
    <?php include 'header.php'; ?>

    <div class="row">
        <div class="col-lg-10">
                <div id="content">
                    <h1>List of Available Techniques</h1>
                    <table class="table table-striped">
                        <thead>
                        <tr class="tf-font-14">
                            <th scope="col">Instrument Type</th>
                            <th scope="col">Model</th>
                            <th scope="col">Manufacturer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($allTechniques as $r) {
                            echo '<tr class="tf-font-14"><th scope="row"><a href="' . base_url() . 'Portal/viewTechnique/' . $r->id . '?nav_from=listTechniques" >' . $r->instrument_name . '</a></th><td>' . $r->model . '</td><td>' . $r->manufacturer . '</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div style="clear: both"><!-- ff --></div>

        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>


<div id="infobox"></div>

</body>

<?php $this->load->view('layout/portal_footer.php') ?>

