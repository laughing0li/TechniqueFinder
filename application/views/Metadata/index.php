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
    <title>TF Admin | Metadata List</title>
</head>

<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Metadata List </h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Metadata/create_new'">
                            <span class="tf-database-add">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">New Metadata</a>
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

                    <div class="table-responsive tf-font tf-font-size" style="margin-bottom: 3em;">
                        <table id="the_datatable" class="table table-bordered table-striped">
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
                url: "<?php echo site_url("Metadata/getMetadataList") ?>",

            },
            columns: [
                {
                    title: "Category",
                    data: 'category'
                },
                {
                    title: "Category Type",
                    data: 'category_type'
                },
                {
                    title: "Analysis Type",
                    data: 'analysis_type'
                },
                {
                    title: "Actions",
                    data: 'actions'
                },
            ],
            rowId: function(data) {
                return 'id_' + data.id;
            },
            initComplete: function(settings, json) {
                //jquery sortable
                //$('#the_datatable > tbody').find('td').css('padding','0px 0px 0px 0px')
            }
        });
    });
</script>


<div class='container-md'>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <?php $this->load->view('layout/admin_footer.php') ?>

            </div>
        </div>
    </div>
</div>