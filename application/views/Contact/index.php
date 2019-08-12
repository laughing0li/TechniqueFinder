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

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('layout/header.php');?>
    <head><title>TF Admin | Contact List</title></head>
    <div class="nav tf-navbar">
        <button class="btn" onclick="window.location='<?php echo base_url();?>TechniqueFinder/index'">
            <span class="home-icon">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">Home</a>
        </button>
        <button class="btn" onclick="window.location='<?php echo base_url();?>Contact/add'">
            <span class="tf-database-add">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">Add Contact</a>
        </button>

    </div>


    <div class="row" style="margin-left: 1em; ">
        <h1 class="tf-heading"> Contact List</h1>
    </div>


<?php

if ($this->session->flashdata('success-warning-message')){
    echo '<div id="success-warning-message" class=" tf-font tf-font-size success-warning-message">';
    echo $this->session ->flashdata('success-warning-message');
    echo '</div>';
}

if ($this->session->flashdata('error-warning-message')){
    echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
    echo $this->session ->flashdata('error-warning-message');
    echo '</div>';
}
?>



    <div class="table-responsive tf-font tf-font-size" style="margin-bottom: 3em;">
        <table id="contact_data" class="table table-bordered table-striped" style="width: 60%;float: left;margin-left: 1em;">
            <thead>
            <tr>

            </tr>
            </thead>
        </table>
    </div>


    <script type="text/javascript">

        $(document).ready(function(){
            console.log("Datatable loading now");

            $('#contact_data').DataTable({
                columnDefs: [{
                    // "targets": 2,
                }],
                columns: [
                    { title: "Name"},
                    { title: "Institution",},
                    { title: "Technique Contact"},
                    { title: "Actions"},
                ],
                order: [[ 0, "asc" ]],
                "paging": false,
                "filter":false,
                "status":false,
                "bInfo" : false,
                ajax: {
                    url : "<?php echo site_url("Contact/getContactList") ?>",

                },
            });

        });

        function deleteContact(id){
            if (confirm("Are you sure?")){
                window.location.assign('<?php echo site_url("Contact/delete/")?>'+id)
            }

        }


    </script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>

<?php $this->load->view('layout/footer.php');?>