<?php

defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view('layout/admin_header.php'); ?>

<head>
    <title>TF Admin | Edit Localisation</title>
</head>
<body>
<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                    <div class="row">
                        <h1 class="tf-heading"> Update Localisation</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="">Admin Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>Localisation/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Localisation List</a>
                        </button>
                    </div>




                    <?php
                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <?php echo form_open("localisation/validateEdit/" . $data['id']); ?>

                    <div class="tf-background-color">
                        <table style="text-align: left;">
                            <!-- YEAR COMMISSIONED -->
                            <tr>
                                <td class="tf-font-orange">Year Commissioned</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="text" name="yr_commissioned" value="<?php if (isset($data['yr_commissioned'])) {
                                                                                echo $data['yr_commissioned'];
                                                                            } ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            <!-- APPLICATIONS -->
                            <tr>
                                <td class="tf-font-orange">Applications</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <div>
                                        <select id="applications-selector" name="applications">
                                            <?php
                                                foreach ($applications as $application) {
                                                    echo '<option id="' . $application->name . '">' . $application->name . '</option>';
                                                }
                                            ?>
                                        </select>
                                        <button type="button" id="application-add-item" class="tf-button">
                                            <span class="tf-database-add"></span>
                                            <span class="tf-font create-technique-dialog-button">Add Applications</span>
                                        </button>
                                    </div>
                                    <div class="table-responsive tf-font tf-font-size">
                                        <input type="hidden" id="applications_items_selected_hidden" name="applications_items_selected_hidden" value=""/>
                                        <table id="static_data" class="table table-bordered table-striped" style="width: 60%;float: left;">
                                            <thead>
                                                <tr class="table-headings tf-font-11 tf-font">
                                                    <td>Application Name</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody id="table_applications_selected">

                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            <!-- LOCATION -->
                            <tr>
                                <td class="tf-font-orange">Location</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <select id="location-selector" name="location">
                                        <?php
                                            foreach ($locations as $location) {
                                                if ($data['location_id'] != $location->id) {
                                                    echo '<option id="' . $location->id . '">' . $location->institution . '</option>';                                  
                                                }
                                            }
                                            echo '<option id="' . $data['location_id'] . '" selected>' . $data['institution'] . '</option>';
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            <!-- TECHNIQUE -->
                            <tr>
                                <td class="tf-font-orange">Technique</td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tf-font tf-font-size">
                                    <input type="hidden" id="technique_id_selected_hidden" name="technique_id_selected_hidden" value=""/>
                                    <select id="technique-selector" name="techniques">
                                        <?php
                                            foreach ($techniques as $technique) {
                                                if ($data['technique_id'] != $technique->id) {

                                                    echo '<option id="' . $technique->id . '">' . $technique->instrument_name . ' MODEL: ' . $technique->model . ' MANUFACTURER: ' . $technique->manufacturer . '</option>';
                                                } else {
                                                    echo '<option id="' . $data['technique_id'] . '" selected>' . $technique->instrument_name . ' MODEL: ' . $technique->model . ' MANUFACTURER: ' . $technique->manufacturer . '</option>';
                                                }
                                             }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                        </table>
                    </div>

                    <button id="update" class="tf-button" type="submit">
                        <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Update</span>
                    </button>

                    <button id="update" class="tf-button" type="button" onclick="deleteLocalisation()">
                        <span class="tf-delete">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Delete</span>
                    </button>

                    <button id="update" type="button" class="tf-button" type="submit" onclick="window.location='<?php echo site_url("Localisation/index"); ?>'">
                        <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
                        <span class="tf-button-label">Cancel</span>
                    </button>

                    <?php echo form_close(); ?>

                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Delete localisation
function deleteLocalisation() {
    if (confirm("Are you sure?")) {
        window.location.assign('<?php echo site_url("Localisation/delete/") . $data['id'] ?>')
    }
}

// List of currently selected applications
var applicationsSelected = [];

// Postback applications list
<?php if (isset($applications_items_selected_hidden) && $applications_items_selected_hidden != '') { ?>
    applicationsSelected = <?php echo $applications_items_selected_hidden; ?>;
    document.getElementById('applications_items_selected_hidden').value = applicationsSelected;

<?php } else { ?>
    applicationsSelected = [];
<?php } ?>

// Build application table from posted data
if (applicationsSelected != []) {
    <?php foreach ($applications as $application){?>
    if(applicationsSelected.includes('<?php echo $application->name;?>'))
    {
        $('#table_applications_selected').append("<tr class='table-background-color-techniques' id='<?php echo $application->name; ?>'>" +
        "<td><?php echo $application->name ?></td>" +
        "<td><button type='button' id='application-delete-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
        "</tr>");
    }
    <?php }?>
}

// User clicks on button to remove an application from the table and form
$('body').on('click', '#application-delete-item', function () {
    selectedElement = $(this).parent().parent().attr('id');
    applicationsSelected = applicationsSelected.filter(function(value) { return value != selectedElement });
    $(this).parent().parent().remove();
    document.getElementById('applications_items_selected_hidden').value = JSON.stringify(applicationsSelected);
});

// User clicks on button to add an application to table and form
$('body').on('click', '#application-add-item', function () {
    var app_name = $("#applications-selector option:selected").val();
    if (!applicationsSelected.includes(app_name)) {
        $('#table_applications_selected').append("<tr class=\"table-background-color-techniques\" id='"+ app_name + "'>"+
            "<td>" + app_name + "</td>" +
            "<td><button type='button' id='application-delete-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
            "</tr>");
        applicationsSelected.push(app_name);
        document.getElementById('applications_items_selected_hidden').value = JSON.stringify(applicationsSelected);
    }
});

// User selects a location, copy selected value to form input
$('#location-selector').change(function() {
    var id = $("#location-selector option:selected").first().attr('id');
    $("#location_id_selected_hidden").val(id);
    // console.log($("#location_id_selected_hidden"));
    // console.log(id)
}).trigger("change");


// User selects a technique, copy selected value to form input
$('#technique-selector').change(function() {
    var id = $("#technique-selector option:selected").first().attr('id');
    $("#technique_id_selected_hidden").val(id);
}).trigger("change");

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
</body>
