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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/css/autoComplete.min.css">
</head>

<body>
    <div class="bg-color">

        <div class="container-md">

            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <?php include 'header.php'; ?>

                        <div id="content" class="container tf-font-color" >


                            <div class="clear"></div>
                            <h1>Possible Techniques</h1>
                            <br>

                            <form action="<?php echo base_url(); ?>Portal/techniqueSearch" method="get" name="searchForm" id="searchForm">

                                <div class="container" style="margin-left: -24px">
                                    <div class="row">
                                        <div class="col-6">
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
            </form>
            <br>

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

    <!-- Autocomplete -->
    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/autoComplete.min.js"></script>
    <script>
        var datasrc = [
            <?php $keyword_list = $this->Techniques_model->getKeywordList();
            foreach ($keyword_list as $keyword) {
                echo "'" . $keyword->name . "',\n";
            }
            ?>
        ];
        const autoCompleteJS = new autoComplete({ selector: "#myAutocomplete",
                                                  resultItem: {
                                                      highlight: {
                                                          render: true
                                                      }
                                                  },
                                                  data: { src: datasrc },
                                                  events: {
                                                      input: {
                                                          selection: (event) => {
                                                              const selection = event.detail.selection.value;
                                                              autoCompleteJS.input.value = selection;
                                                          }
                                                      }
                                                 } 
                                                 });
    </script>

</body>

<?php $this->load->view('layout/portal_footer.php') ?>
