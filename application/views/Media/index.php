<?php

/**
 * TechniqueFinder - index.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view('layout/admin_header.php'); ?>

<head>
    <title>TF Admin | Media List</title>
</head>

<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row" >
                        <h1 class="tf-heading"> Media List </h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Media/create_new_image'">
                            <span class="tf-database-add">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">New Image</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Media/create_new_movie'">
                            <span class="tf-database-add">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">New Movie</a>
                        </button>
                    </div>




                    <?php
                    if ($this->session->flashdata('success-warning-message')) {
                        echo '<div id="success-warning-message" class=" tf-font tf-font-size success-warning-message">';
                        echo $this->session->flashdata('success-warning-message');
                        echo '</div>';
                    } else {
                        echo '<div id="success-warning-message" class=" tf-font tf-font-size success-warning-message" style="display:none;"></div>';
                    }

                    ?>


                    <div class="table-responsive tf-font tf-font-size" >
                        <table id="the_datatable" class="table table-bordered table-striped" >
                            <thead class="tf-background-color">
                                <tr>

                                </tr>
                            </thead>
                        </table>
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
                <?php $this->load->view('layout/admin_footer.php') ?>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#the_datatable').DataTable({
            columnDefs: [{

            }],
            ordering: false,
            paging: false,
            filter: false,
            status: false,
            bInfo: false,
            ajax: {
                url: "<?php echo site_url("Media/getList") ?>",

            },
            columns: [{
                    title: "Thumbnail",
                    data: 'thumbnail'
                },
                {
                    title: "Name <br/>Dimensions",
                    data: 'name_dimensions'
                },
                {
                    title: "Caption",
                    data: 'caption'
                },
                {
                    title: "Actions",
                    data: 'actions',
                },
            ],
            rowId: function(data) {
                return 'id_' + data.id;
            },
            initComplete: function(settings, json) {
                //$('#the_datatable > tbody').find('td').css('padding','0px 0px 0px 0px')
            }
        });
    });
</script>

