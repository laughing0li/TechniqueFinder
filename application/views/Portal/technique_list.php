<?php $this->load->view('layout/portal_header.php'); ?>

<head>
    <title>Technique List</title>
</head>

<body>
    <div class="bg-color">

        <div class="container-md">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <?php include 'header.php'; ?>

                        <div id="content" class="container" style="margin-bottom: 40px;">
                            <h1>List of Available Instruments</h1>
                            <h1>Order by Instrument Type</h1>
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
                                echo '<div class="accordion accordion-flush" id="accordionExample">';
                                echo '<div class="accordion-item"> ';
                                echo '<h2 class="accordion-header">';
                                echo '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target=#' . $r[0] . ' aria-expanded="false" aria-controls=' . $r[0] . '>';
                                echo $r[0];
                                echo '</button>';
                                echo '</h2>';
                                echo '<div id=' . $r[0] . ' class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent=#' . $r[0] . '>';
                                echo '<div class="accordion-body">';
                                echo '<table class="table">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th scope="col">Model</th>';
                                echo '<th scope="col">Manufacturer</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                foreach ($r[1] as $data) {

                                    echo '<tr>';
                                    echo '<td class="col-6"> <a style="text-decoration:none;" href="' . base_url() . 'Portal/viewTechnique/' . $data->id . '?nav_from=listTechniques" >' . $data->model . '</a></td>';
                                    echo '<td>' . $data->manufacturer . '</td>';
                                    echo '</tr>';
                                }
                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>
                                      </div>
                                      </div>
                                      </div>
                                      <div style="border: 1px solid black;"></div>
                                      ';
                            }


                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class='container-md'>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10">
                    <?php include 'footer.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <div style="clear: both">
        <!-- ff -->
    </div>
    <!-- <div id="infobox"></div> -->
</body>

<?php $this->load->view('layout/portal_footer.php') ?>