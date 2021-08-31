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
    <title>TF Admin | Technique List</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Technique List</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Techniques/createTechnique'">
                            <span class="tf-database-add">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">New Technique</a>
                        </button>
                    </div>



                    <?php
                    if ($this->session->flashdata('success-warning-message')) {
                        echo '<div id="success-warning-message" class=" tf-font tf-font-size success-warning-message">';
                        echo $this->session->flashdata('success-warning-message');
                        echo '</div>';
                    }
                    ?>
                    <div class="table-responsive tf-font tf-font-size" style="margin-bottom: 3em;">
                        <table id="techniques_datatable" class="table table-bordered table-striped">
                            <thead style="background-color: #f2f2f1 ">
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
        $('#techniques_datatable').DataTable({
            columnDefs: [{

            }],
            columns: [{
                    title: "Name"
                },
                {
                    title: "Text",
                    render: function(data, type, row) {
                        return '<xmp style="white-space:normal;">' + data + '</xmp>'
                    }
                },
                { title: "Model"},
                { title: "Manufacturer"},
                { title: "Actions"},
            ],
            "paging": false,
            "filter": false,
            "status": false,
            "bInfo": false,
            ajax: {
                url: "<?php echo site_url("techniques/getTechniqueList") ?>",

            },
        });

    });

    function deleteTechnique(id) {
        if (confirm("Are you sure?")) {
            window.location.assign('<?php echo site_url("Techniques/delete/") ?>' + id)
        }

    }
</script>