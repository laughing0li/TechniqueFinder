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
    <title>TF Admin | User List</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                <div class="row" style="margin-left: 1em; ">
                        <h1 class="tf-heading"> User List</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>user/new_user'">
                            <span class="tf-database-add">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">New user</a>
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
                        <table id="user_data" class="table table-bordered table-striped" >
                            <thead class="tf-background-color">
                                <tr>
                                    <th style="text-align: center;">Full Names</th>
                                    <th style="text-align: center;">Username</th>
                                    <th style="text-align: center;">Super Admin</th>
                                    <th style="text-align: center;">Actions </th>
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
        console.log('Loaded');
        $('#user_data').DataTable({
            columnDefs: [{
                "targets": 3,
                "orderable": false,
            }],

            columns: [{
                    title: "Full Name"
                },
                {
                    title: "Username"
                },
                {
                    title: "Super Admin"
                },
                {
                    title: "Actions"
                },
            ],
            order: [
                [1, "asc"]
            ],
            "paging": false,
            "filter": false,
            "status": false,
            "bInfo": false,
            ajax: {
                url: "<?php echo site_url("user/user_list") ?>",

            },
        });
    });


    function deleteUser(id) {
        if (confirm("Are you sure?")) {
            window.location.assign('<?php echo site_url("user/delete/") ?>' + id)
        }


    }
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