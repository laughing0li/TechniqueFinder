<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('layout/admin_header.php'); ?>

<head>
    <title>TF Admin | Elements List</title>
</head>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Elements List</h1>
                    </div>

                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Elements/add'">
                            <span class="tf-database-add">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Add Elements</a>
                        </button>

                    </div>

                    <?php

                    if ($this->session->flashdata('success-warning-message')) {
                        echo '<div id="success-warning-message" class=" tf-font tf-font-size success-warning-message">';
                        echo $this->session->flashdata('success-warning-message');
                        echo '</div>';
                    }

                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }
                    ?>



                    <div class="table-responsive tf-font tf-font-size" style="margin-bottom: 3em;">
                        <table id="elements_data" class="table table-bordered table-striped" >
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
        console.log("Datatable loading now");

        $('#elements_data').DataTable({
            columnDefs: [{
                // "targets": 2,
            }],
            columns: [
                {
                    title: "Actions"
                },
                {
                    title: "Name"
                },
                {
                    title: "Symbols",
                }
            ],
            order: [
                [1, "asc"]
            ],
            "paging": false,
            "filter": false,
            "status": false,
            "bInfo": false,
            ajax: {
                url: "<?php echo site_url("Elements/getElementsList") ?>",

            },
        });

    });

    function deleteContact(id) {
        if (confirm("Are you sure?")) {
            window.location.assign('<?php echo site_url("Elements/delete/") ?>' + id)
        }
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>

<div class='container-md'>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <?php $this->load->view('layout/admin_footer.php') ?>

            </div>
        </div>
    </div>
</div>