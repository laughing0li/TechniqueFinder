<?php $this->load->view('layout/portal_header.php'); ?>

<head>
    <title>Technique List</title>
    <style>
        th a:hover {
           color: grey !important
        }
    </style>
</head>

<body>
    <div style='background: #282572'>
        <div class='container-md'>
            <?php include 'header.php'; ?>
        </div>
    </div>
    <div style='background-image: linear-gradient(180deg,#282572,#4b4b88);  font-family: Calibre-Light; '>

        <div class="container-md">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <div id="content" class="container">
                            <h1>List of Available Techniques</h1>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="tf-font-14">
                                        <th scope="col" >Model</th>
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

                                    foreach ($allTechniques as $r) {
                                        echo '<tr class="tf-font-14"><th scope="row"><a style="color: #f2f2f1";  href="' . base_url() . 'Portal/viewTechnique/' . $r->id . '?nav_from=listTechniques" >' . $r->model . '</a></th><td>' . $r->instrument_name . '</td><td>' . $r->manufacturer . '</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class='container-md'>
        <?php include 'footer.php'; ?>
    </div>

    <div style="clear: both">
        <!-- ff -->
    </div>
    <div id="infobox"></div>
</body>

<?php $this->load->view('layout/portal_footer.php') ?>