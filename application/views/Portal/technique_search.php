<?php

/**
 * TechniqueFinder - technique_search.php
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

<head>
    <title>Technique Search</title>
    <style>
        h1, a {
            color: #f2f2f1 !important
        }

        .col a:hover {
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
    <div style='background-image: linear-gradient(180deg,#282572,#4b4b88);  font-family: Calibre-Light; height: 520px'>

        <div class="container-md">

            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <div id="content" class="container" style="color: #f2f2f1 !important">


                            <div class="clear"></div>
                            <h1 >Possible Techniques</h1>
                            <br>

                            <form action="<?php echo base_url(); ?>Portal/techniqueSearch" method="get" name="searchForm" id="searchForm">

                                <div class="container" style="margin-left: -24px">
                                    <div class="row">
                                        <div class="col-4">
                                            <input id="myAutocomplete" type="text" class="form-control" name="q" placeholder="Search by keyword" autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <button class="btn outline-primary" type="button" onclick="document.searchForm.submit()">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>

                            <p class="fs-6">Results for: <span class="tf-orange"><b><?php echo $searchedKeyword ?></b></span></p>

                            <?php if (count($searchResults) == 0) {
                                echo 'No matching techniques found';
                            } else {
                                foreach ($searchResults as $r) {
                                    $mediaForLIST = $Media_model->getMediaInfosByTechniqueIdAndSection($r->id, 'LIST');
                                    $media_location = 'nowhere.png';
                                    if (isset($mediaForLIST[0])) {
                                        $media_location = $mediaForLIST[0]->location;
                                    }
                                    echo
                                    '<div class="border-bottom" style="margin: 50px 0"></div>
'
                                        . '<div class="container">'
                                        . '<div class="row">'
                                        . '<div class="col" style="margin-left: -25px"><h1>' . $r->name . '</h1>'
                                        //                    . '<p>' . $r->summary . '</p>'
                                        . '<a href="' . base_url() . 'Portal/viewTechnique/' . $r->id . '" id="Technique_' . $r->id . '">' . $r->summary . '</a>'
                                        . '</div>'
                                        . '<div class="col"><img src="' . base_url() . 'media-dir/' . $media_location . '" width="145" height="145" alt="' . $media_location . '"></div>'
                                        . '</div>'
                                        . '</div>';
                                }
                            }
                            ?>

                            <br><br>
                            <div class="tf-paging">
                                Page:
                                <?php echo $this->pagination->create_links(); ?>
                            </div>


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
    <script>
        var datasrc = [
            <?php $keyword_list = $this->Techniques_model->getKeywordList();
            foreach ($keyword_list as $keyword) {
                echo "{label: '" . $keyword->name . "', value: '" . $keyword->name . "'},\n";
            }
            ?>
        ];
        const ac = new Autocomplete(document.getElementById('myAutocomplete'), {
            data: datasrc
        })
    </script>

</body>

<?php $this->load->view('layout/portal_footer.php') ?>