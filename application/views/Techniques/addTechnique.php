<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view('layout/admin_header.php'); ?>

<head>
    <title>TF Admin | Add Technique</title>
</head>
<style>
    table {
        border-spacing: 3px;
        border-collapse: unset;
    }

    ui-dialog ui-corner-all ui-widget ui-widget-content ui-front ui-dialog-buttons ui-draggable ui-resizable {
        position: absolute !important;
        height: 500px !important;
        width: 500px !important;
        top: 1160px !important;
        left: 647.5px !important;
        z-index: 101 !important;
    }

    add-media-list-dialog-form {
        width: 500px !important;
        min-height: 30.062px !important;
        max-height: 500px !important;
        height: 500px !important;
    }
</style>

<div class="bg-color">
    <div class="container-md">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10" style="margin-left: 50px;">
                <div class="row" >
                        <h1 class="tf-heading"> Create Technique</h1>
                    </div>
                    <div class="nav tf-navbar">
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>TechniqueFinder/index'">
                            <span class="home-icon">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
                        </button>
                        <button class="btn" onclick="window.location='<?php echo base_url(); ?>/Techniques/index'">
                            <span class="tf-database-table">&nbsp;</span>
                            <a class="tf-font-orange" style="text-decoration: none;">Technique List</a>
                        </button>
                        <div class="my-2">
    <span class="tf-font-orange">&nbsp;&nbsp;Note: * - indicates mandatory fields, these fields must contain text</span>
                        </div>
                    </div>


                    

                    <?php
                    if ($this->session->flashdata('error-warning-message')) {
                        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
                        echo $this->session->flashdata('error-warning-message');
                        echo '</div>';
                    }

                    ?>

                    <body>
                        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/ckeditor/ckeditor.js"></script>

                        <?php echo form_open("techniques/validateCreateTechnique/"); ?>
                        <div class="tf-background-color">
                            <table style="text-align: left;">

                                <!-- NAME -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Name *</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="technique_name"><?php if (isset($technique_name)) {
                                                                                                    echo $technique_name;
                                                                                                }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- ALTERNATIVE NAMES -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Alternative names</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="alternative_names"><?php if (isset($alternative_names)) {
                                                                                                    echo $alternative_names;
                                                                                                }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- INSTRUMENT NAME -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Instrument Name *</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="instrument_name"><?php if (isset($instrument_name)) {
                                                                                                    echo $instrument_name;
                                                                                                }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- MODEL -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Model *</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="model"><?php if (isset($model)) {
                                                                                        echo $model;
                                                                                    }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- MANUFACTURER -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Manufacturer *</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="manufacturer"><?php if (isset($manufacturer)) {
                                                                                                echo $manufacturer;
                                                                                            }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- SAMPLE_TYPE -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Sample Type</td>
                                    <input type="hidden" id="sample_type" name="sample_type" value=""/>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <select id="sample-type-select">
                                            <option selected value="">[Leave Blank]</option>
                                            <option value="Polished Section">Polished Section</option>
                                            <option value="Thin Polished Section">Thin Polished Section</option>
                                            <option value="Solid">Solid</option>
                                            <option value="Liquid">Liquid</option>
					    <option value="Introduction system">Introduction system</option>
					</select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- WAVELENGTH -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Wavelength</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="wavelength"><?php if (isset($wavelength)) {
                                                                                                echo $wavelength;
                                                                                            }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- BEAM DIAMETER -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Beam Diameter</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="beam_diameter"><?php if (isset($beam_diameter)) {
                                                                                                echo $beam_diameter;
                                                                                            }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- MIN CONC -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Minimum Conc.</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="min_conc"><?php if (isset($min_conc)) {
                                                                                            echo $min_conc;
                                                                                        }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- MASS -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Mass</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="mass"><?php if (isset($mass)) {
                                                                                        echo $mass;
                                                                                    }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- VOLUME -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Volume</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="volume"><?php if (isset($volume)) {
                                                                                            echo $volume;
                                                                                        }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- PRESSURE -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Pressure</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="pressure"><?php if (isset($pressure)) {
                                                                                            echo $pressure;
                                                                                        }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- TEMPERATURE -->
                                <tr>
                                    <td class="tf-font-orange" style="position: absolute;">Temperature</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="temperature"><?php if (isset($temperature)) {
                                                                                                echo $temperature;
                                                                                            }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- SUMMARY -->
                                <tr>
                                    <td class="tf-font-orange">Summary *</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea name="short_description" class="ckeditor" id="short_description">
                        <?php if (isset($short_description)) {
                            echo $short_description;
                        }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- DESCRIPTION -->
                                <tr>
                                    <td class="tf-font-orange">Long Description *</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea name="long_description" class="ckeditor" id="ckeditor"><?php if (isset($long_description)) {
                                                                                                                echo $long_description;
                                                                                                            }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- KEYWORDS -->
                                <tr>
                                    <td class="tf-font-orange">Keywords</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td class="tf-font tf-font-size input-col">
                                        <textarea class="tf-input-small" name="keywords"><?php if (isset($keywords)) {
                                                                                            echo $keywords;
                                                                                        }; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


                                <!-- MEDIA -->
                                <tr>
                                    <td class="tf-font-orange">Media examples</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td>
                                        <div class="table-responsive tf-font tf-font-size">
                                            <input type="hidden" id="media_items_selected_hidden" name="media_items_selected_hidden" value="" />
                                            <table id="static_data" class="table table-bordered table-striped" cellspacing="3" style="width: 60%;float: left;">

                                                <thead class="table-headings tf-font-11 tf-font">
                                                    <td>Thumbnail</td>
                                                    <td>
                                                        Name<br /> Dimensions
                                                    </td>
                                                    <td>
                                                        Caption
                                                    </td>
                                                    <td>
                                                        Action
                                                    </td>
                                                </thead>
                                                <tbody id="table_list_media_selected">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <button type="button" id="add-media-list-submit" class="tf-button">
                    <span class=" tf-database-add"></span>
                                                <span class="tf-font create-technique-dialog-button ">Add Media</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>


            <!-- Media examples for OUTPUT -->
                           <!--
            <tr>
            <td class="tf-font-orange">Media examples for OUTPUT</td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <div class="table-responsive tf-font tf-font-size">
                    <input type="hidden" id="media_output_items_selected_hidden" name="media_output_items_selected_hidden" value=""/>
                    <table id="static_data" class="table table-bordered table-striped" style="width: 60%;float: left;">
                        <thead>
                        <tr class="table-headings tf-font-11 tf-font">
                            <td>Thumbnail</td>
                            <td>
                                Name<br/> Dimensions
                            </td>
                            <td>
                                Caption
                            </td>
                            <td>
                                Action
                            </td>
                        </tr>
                        </thead>
                        <tbody id="table_output_media_selected">

                        </tbody>
                    </table>
                </div>
                <div>
                    <button type="button" id="add-media-output-submit" class="tf-button">
                    <span class="tf-database-add"></span>
                    <span class="tf-font create-technique-dialog-button ">Add Media for OUTPUT</span>
                    </button>
                </div>
            </td>
        </tr> -->
                                <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->


                                <!-- Media examples for INSTRUMENT -->
                                <!-- <tr>
            <td class="tf-font-orange">Media examples for Instrument</td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <div class="table-responsive tf-font tf-font-size">
                    <input type="hidden" id="media_instrument_items_selected_hidden" name="media_instrument_items_selected_hidden" value=""/>
                    <table id="static_data" class="table table-bordered table-striped" style="width: 60%;float: left;">
                        <thead>
                        <tr class="table-headings tf-font-11 tf-font">
                            <td>Thumbnail</td>
                            <td>
                                Name<br/> Dimensions
                            </td>
                            <td>
                                Caption
                            </td>
                            <td>
                                Action
                            </td>
                        </tr>
                        </thead>
                        <tbody id="table_instrument_media_selected">

                        </tbody>
                    </table>
                </div>
                <div>
                    <button type="button" id="add-media-instrument-submit" class="tf-button">
                    <span class="tf-database-add"></span>
                    <span class="tf-font create-technique-dialog-button ">Add Media for INSTRUMENT</span>
                    </button>
                </div>
            </td>
        </tr> -->
                                <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->


                                <!-- CONTACTS -->
                                <!-- <tr>
                                    <td class="tf-font-orange">Contacts</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td>
                                        <div class="table-responsive tf-font tf-font-size">
                                            <input type="hidden" id="contact_items_selected_hidden" name="contact_items_selected_hidden" value="" />
                                            <table id="static_data" class="table table-bordered table-striped" style="width: 60%;float: left;">
                                                <thead>
                                                    <tr class="table-headings tf-font-11 tf-font">

                                                        <td>
                                                            Name
                                                        </td>
                                                        <td>
                                                            Centre Name
                                                        </td>
                                                        <td>
                                                            Institution
                                                        </td>
                                                        <td>
                                                            Action
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_contacts_selected">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <button type="button" id="add-contacts-submit" class="tf-button">
                                                <span class="tf-database-add"></span>
                                                <span class="tf-font create-technique-dialog-button ">Add contacts</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

        <!-- LOCALISATION: INSTITUTION, APPLICATIONS & AGE -->
        <tr>
            <td class="tf-font-orange">Machine Localisation</td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <div class="table-responsive tf-font tf-font-size">
                    <input type="hidden" id="localisations_items_selected_hidden" name="localisations_items_selected_hidden" value=""/>
                    <table id="static_data" class="table table-bordered table-striped" style="width: 60%;float: left;">
                        <thead>
                        <tr class="table-headings tf-font-11 tf-font">
                            <td>
                                Centre Name
                            </td>
                            <td>
                                Applications
                            </td>
                            <td>
                                Year Commissioned
                            </td>
                            <td>
                                Action
                            </td>
                        </tr>
                        </thead>
                        <tbody id="table_localisations_selected">

                        </tbody>
                    </table>
                </div>
                <div>
                    <button type="button" id="add-localisations-submit" class="tf-button">
                    <span class="tf-database-add"></span>
                    <span class="tf-font create-technique-dialog-button ">Add machine localisation</span>
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>


        <!-- METADATA AND GEOCHEM ANALYSIS CHOICES -->
        <tr>
            <td class="tf-font-orange">Metadata and Geochem Analysis Choices</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size input-col">
                <div>
                    <select id="metadata-selector">
                    <?php
                        /*  Possible metadata selections */
                        foreach ($metadata_list as $md) {
                              echo "<option value='". $md->id . "'>CATEGORY:&nbsp;". $md->category . "&nbsp;&nbsp;&nbsp;CATEGORY TYPE:&nbsp;" . $md->category_type . "&nbsp;&nbsp;&nbsp;ANALYSIS TYPE:&nbsp;" . $md->analysis_type . "</option>";
                        }
                    ?>
                    </select>
                    <!-- A button to add the new metadata line -->
                    <button type="button" id="add-metadata" class="tf-button">
                        <span class="tf-database-add"></span>
                        <span class="tf-font create-technique-dialog-button" style="font-size: 1em">Add Metadata</span>
                    </button>
                </div>
                <!-- A table to display current metadata -->
                <div class="table-responsive tf-font tf-font-size">
                    <input type="hidden" id="metadata_ids_selected_hidden" name="metadata_ids_selected_hidden" value=""/>
                    <table id="static_data" class="table table-bordered table-striped" style="width: 70%;float: left;">
                        <thead>
                        <tr class="table-headings tf-font-11 tf-font">
                            <td>
                               Metadata 
                            </td>
                            <td>
                               Geochemical Analysis Choices
                            <td>
                               Action
                            </td>
                        </tr>
                        </thead>
                        <tbody id="table_metadata_selected">
                        </tbody>
                    </table>
                </div>

            </td>
        </tr>

        <tr><td>&nbsp;</td></tr>


        <!-- ELEMENTS -->
        <tr>
            <td class="tf-font-orange  ">Elements</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size input-col">
                <input type="hidden" id="elementsset-id" name="elementsset-id" value="-1"/>
                Select a set of elements to copy from:
                <select id='elementsset-selector' style="width: 80em;">
                <!-- Remove elements -->
                <option selected value='0'>This technique has no elements</option>
                <!-- Pick a new set of elements -->
                <? foreach ($elements_list as $ele) {
                      echo "<option value='". $ele['id'] . "'>" . $ele['name'] . "&nbsp;Model:&nbsp;" . $ele['model'] . "&nbsp;Manufacturer:&nbsp;" . $ele['manufacturer'] . "&nbsp;[" . substr($ele['symbols'], 0, 150) . "]</option>";
                   }
                ?>
                </select>
            </td>
        </tr>

        <tr><td>&nbsp;</td></tr>





        <!-- CASE STUDIES -->
        <!-- <tr>
            <td class="tf-font-orange">Case Studies</td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <div class="table-responsive tf-font tf-font-size">
                    <input type="hidden" id="case_items_selected_hidden" name="case_items_selected_hidden" value=""/>
                    <table id="static_data" class="table table-bordered table-striped" style="width: 60%;float: left;">
                        <thead>
                        <tr class="table-headings tf-font-11 tf-font">
                            <td>
                                Name
                            </td>
                            <td>
                                URL
                            </td>
                            <td>
                                Action
                            </td>
                        </tr>
                        </thead>
                        <tbody id="table_case_selected">

                        </tbody>
                    </table>
                </div>
                <div>
                    <button type="button" id="add-case-submit" class="tf-button">
                    <span class="tf-database-add"></span>
                    <span class="tf-font create-technique-dialog-button ">Add Case study</span>
                    </button>
                </div>
            </td>
        </tr> -->
                                <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->


                                <!-- REFERENCES -->
                                <!-- <tr>
            <td class="tf-font-orange">References</td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <div class="table-responsive tf-font tf-font-size">
                    <input type="hidden" id="references_items_selected_hidden" name="references_items_selected_hidden" value=""/>
                    <table id="static_data" class="table table-bordered table-striped" style="width: 60%;float: left;">
                        <thead>
                        <tr class="table-headings tf-font-11 tf-font">
                            <td>
                                Authors
                            </td>
                            <td>
                                Title
                            </td>
                            <td>
                                Action
                            </td>
                        </tr>
                        </thead>
                        <tbody id="table_references_selected">

                        </tbody>
                    </table>
                </div>
                <div>
                    <button type="button" id="add-references-submit" class="tf-button">
                        <span class="tf-database-add"></span>
                        <span class="tf-font create-technique-dialog-button ">Add References</span>
                    </button>
                </div>
            </td>
        </tr> -->
                                <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->


                            </table>
                        </div>

                        <!-- Create button -->
                        <button id="update" name="submit" class="tf-button" type="submit">
                            <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                            <span class="tf-button-label">Create</span>
                        </button>

                        <!-- Cancel button -->
                        <button id="cancel" type="button" class="tf-button" type="submit" onclick="window.location='<?php echo site_url("Techniques/index");?>'">
                            <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
                            <span class="tf-button-label">Cancel</span>
                        </button>
                        <br>
                        <br>

                        <div id="add-media-list-dialog-form" title="">
                            <label><strong>Selection: LIST</strong></label>


                            <table class="add-media-list-dialog-table" width="100%" cellspacing="3">
                                <thead>
                                    <tr class="tf-font-11 tf-font table-headings">
                                        <td></td>
                                        <td style="text-align: center; font-weight: bold; ">Thumbnail</td>
                                        <td style="text-align: center; font-weight: bold;">Name <br /> Dimensions</td>
                                    </tr>
                                </thead>
                                <form>
                                    <tbody id="media-list-table">


                                    </tbody>
                                </form>
                            </table>
                        </div>


                        <!-- This is the popup table used to select & add media output -->
                        <div id="add-media-output-dialog-form" title="">

                            <label><strong>Selection: OUTPUT</strong></label>

                            <table class="add-media-output-dialog-table" width="100%" cellspacing="3">
                                <thead>
                                    <tr class="tf-font-11 tf-font table-headings">
                                        <td></td>
                                        <td style="text-align: center; font-weight: bold; ">Thumbnail</td>
                                        <td style="text-align: center; font-weight: bold;">Name <br /> Dimensions</td>
                                    </tr>
                                </thead>
                                <tbody id="media-output-table">

                                </tbody>
                            </table>
                        </div>

                        <!-- This is the popup table used to select & add instruments --> 
                        <div id="add-media-instrument-dialog-form" title="">

                            <label><strong>Selection: INSTRUMENT</strong></label>

                            <table class="add-media-output-dialog-table" width="100%" cellspacing="3">
                                <thead>
                                    <tr class="tf-font-11 tf-font table-headings">
                                        <td></td>
                                        <td style="text-align: center; font-weight: bold; ">Thumbnail</td>
                                        <td style="text-align: center; font-weight: bold;">Name <br /> Dimensions</td>
                                    </tr>
                                </thead>
                                <tbody id="media-instrument-table">

                                </tbody>
                            </table>
                        </div>


                        <!-- This is the popup table used to select & add contacts -->
                        <div id="add-contacts-dialog-form" title="Add Contacts">

                            <label><strong>Contacts</strong></label>

                            <table class="add-contacts-dialog-table" width="100%" cellspacing="3">
                                <thead>
                                    <tr class="tf-font-11 tf-font table-headings">
                                        <td></td>
                                        <td style="text-align: center; font-weight: bold; ">Name</td>
                                        <td style="text-align: center; font-weight: bold; ">Centre Name</td>
                                        <td style="text-align: center; font-weight: bold;">Institution</td>
                                    </tr>
                                </thead>
                                <tbody id="contacts-table">

                                </tbody>
                            </table>
                        </div>


		        <!-- This is the popup table used to select & add cases -->
                        <div id="add-case-dialog-form" title="Add Contacts">

                            <label><strong>Case Studies</strong></label>

                            <table class="add-case-dialog-table" width="100%" cellspacing="3">
                                <thead>
                                    <tr class="tf-font-11 tf-font table-headings">
                                        <td></td>
                                        <td style="text-align: center; font-weight: bold; ">Name</td>
                                        <td style="text-align: center; font-weight: bold;">URL</td>
                                    </tr>
                                </thead>
                                <tbody id="case-table">

                                </tbody>
                            </table>
                        </div>


                        <!-- This is the popup table used to select & add references -->
                        <div id="add-references-dialog-form" title="Add References">

                            <label><strong>References</strong></label>

                            <table class="add-references-dialog-table" width="100%" cellspacing="3">
                                <thead>
                                    <tr class="tf-font-11 tf-font table-headings">
                                        <td></td>
                                        <td style="text-align: center; font-weight: bold; ">Authors</td>
                                        <td style="text-align: center; font-weight: bold;">Title</td>
                                    </tr>
                                </thead>
                                <tbody id="references-table">

                                </tbody>
                            </table>
                        </div>

                        <!-- This is the popup table used to select & add localisations -->
                        <div id="add-localisations-dialog-form" title="Add Localisations">

                            <label><strong>Localisations</strong></label>

                            <table class="add-localisations-dialog-table" width="100%" cellspacing="3">
                                <thead>
                                <tr class="tf-font-11 tf-font table-headings">
                                    <td></td>
                                    <td style="text-align: center; font-weight: bold; ">Centre Name</td>
                                    <td style="text-align: center; font-weight: bold;">Applications</td>
                                    <td style="text-align: center; font-weight: bold; ">Year Commissioned</td>
                                </tr>
                                </thead>
                                <tbody id="localisations-table">

                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function hideDialogs() {
        $('#add-media-list-dialog-form').hide();
        $('#add-media-output-dialog-form').hide();
        $('#add-media-instrument-dialog-form').hide();
        $('#add-contacts-dialog-form').hide();
        $('#add-case-dialog-form').hide();
        $('#add-references-dialog-form').hide();
        $('#add-localisations-dialog-form').hide();
    }

    $(document).ready(function() {
        hideDialogs();

    });

    var mediaSelected = [];
    var outputSelected = [];
    var instrumentSelected = [];
    var contactSelected = [];
    var caseSelected = [];
    var referencesSelected = [];
    var metadataSelected = [];
    var localisationsSelected = [];


    /////////////////////////////////////////////////////////////////////---POSTBACKS FROM PHP---///////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Postback Media List
    <?php if (isset($media_items_selected_hidden) && $media_items_selected_hidden != '') { ?>
        mediaSelected = <?php echo $media_items_selected_hidden; ?>;
        document.getElementById('media_items_selected_hidden').value = mediaSelected
    <?php } else { ?>
        mediaSelected = []
    <?php } ?>

    //Postback Output List
    <?php if (isset($media_output_items_selected_hidden) && $media_output_items_selected_hidden != '') { ?>
        outputSelected = [<?php echo $media_output_items_selected_hidden; ?>];
        document.getElementById('media_output_items_selected_hidden').value = outputSelected

    <?php } else { ?>
        outputSelected = []
    <?php } ?>

    //Postback Instrument List
    <?php if (isset($media_instrument_items_selected_hidden) && $media_instrument_items_selected_hidden != '') { ?>
        instrumentSelected = [<?php echo $media_instrument_items_selected_hidden; ?>];
        document.getElementById('media_instrument_items_selected_hidden').value = instrumentSelected
    <?php } else { ?>
        instrumentSelected = []
    <?php } ?>

    //Postback Contact List
    <?php if (isset($contact_items_selected_hidden) && $contact_items_selected_hidden != '') { ?>
        contactSelected = [<?php echo $contact_items_selected_hidden; ?>];
        document.getElementById('contact_items_selected_hidden').value = contactSelected

    <?php } else { ?>
        contactSelected = []
    <?php } ?>

    //Postback Case List
    <?php if (isset($case_items_selected_hidden) && $case_items_selected_hidden != '') { ?>
        caseSelected = [<?php echo $case_items_selected_hidden; ?>];
        document.getElementById('case_items_selected_hidden').value = caseSelected

    <?php } else { ?>
        caseSelected = []
    <?php } ?>

    //Postback References List
    <?php if (isset($references_items_selected_hidden) && $references_items_selected_hidden != '') { ?>
        referencesSelected = [<?php echo $references_items_selected_hidden; ?>];
        document.getElementById('references_items_selected_hidden').value = referencesSelected

    <?php } else { ?>
        referenceSelected = []
    <?php } ?>

    // Postback metadata list
    <?php if (isset($metadata_ids_selected_hidden) && $metadata_ids_selected_hidden != '') { ?>
        metadataSelected = [<?php echo $metadata_ids_selected_hidden; ?>];
        document.getElementById('metadata_ids_selected_hidden').value = metadataSelected;

    <?php } else { ?>
        metadataSelected = [];
    <?php } ?>

    /////////////////////////////////////////////////////////////////////////////-------BUILD TABLES FROM POSTBACK-------////////////////////////////////////////////////////////////////////////////////////////


    if (mediaSelected != []) {
        <?php foreach ($media_list as $media_item) { ?>
            if (mediaSelected == <?php echo $media_item->id; ?>) {
                $('#table_list_media_selected').append("<tr class=\"table-background-color-techniques\">" +
                    "<td><img height=100 width=100 src='<?php echo (storage_url() . $media_item->location); ?>' alt='No Image Uploaded'/></td>" +
                    '<td><?php echo $media_item->name;
                            echo "<br>";
                            echo $media_item->height . "x" . $media_item->width;
                            ?></td>' +
                    "<td><p><?php echo str_replace("\r\n", '', $media_item->caption); ?></p></td>" +
                    "<td><button type='button' id='media-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                    "</tr>");
            }
        <?php } ?>
    }

    if (outputSelected != []) {
        <?php foreach ($media_list as $media_item) { ?>
            if (outputSelected.includes(<?php echo $media_item->id; ?>)) {
                $('#table_output_media_selected').append("<tr class=\"table-background-color-techniques\" id=\"<?php echo $media_item->id; ?>\">" +
                    "<td><img height=100 width=100 src='<?php echo (storage_url()  . $media_item->location); ?>' alt='No Image Uploaded'/></td>" +
                    '<td><?php echo $media_item->name;
                            echo "<br>";
                            echo $media_item->height . "x" . $media_item->width;
                            ?></td>' +
                    "<td><p><?php echo str_replace("\r\n", '', $media_item->caption); ?></p></td>" +
                    "<td><button type='button' id='media-output-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                    "</tr>");
            }

        <?php } ?>
    }

    if (instrumentSelected != []) {
        <?php foreach ($media_list as $media_item) { ?>
            if (instrumentSelected.includes(<?php echo $media_item->id; ?>)) {
                $('#table_instrument_media_selected').append("<tr class=\"table-background-color-techniques\" id=\"<?php echo $media_item->id; ?>\">" +
                    "<td><img height=100 width=100 src='<?php echo (storage_url() . $media_item->location); ?>' alt='No Image Uploaded'/></td>" +
                    '<td><?php echo $media_item->name;
                            echo "<br>";
                            echo $media_item->height . "x" . $media_item->width;
                            ?></td>' +
                    "<td><p><?php echo str_replace("\r\n", '', $media_item->caption); ?></p></td>" +
                    "<td><button type='button' id='media-instrument-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                    "</tr>");
            }

        <?php } ?>
    }

    if (contactSelected != []) {
        <?php foreach ($contact_list as $contact_item) { ?>
            if (contactSelected.includes(<?php echo $contact_item['id']; ?>)) {

                $('#table_contacts_selected').append("<tr class=\"table-background-color-techniques\" id=\"<?php echo $contact_item['id']; ?>\">" +
                    "<td><?php echo $contact_item['name'] ?></td>" +
                    "<td><?php echo $contact_item['center_name'] ?></td>" +
                    "<td><?php echo $contact_item['institution'] ?></td>" +
                    "<td><button type='button' id='contact-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                    "</tr>");
            }

        <?php } ?>
    }



    if (caseSelected != []) {
        <?php foreach ($case_list as $case_item) { ?>
            if (caseSelected.includes(<?php echo $case_item->id; ?>)) {

                $('#table_case_selected').append('<tr class=\"table-background-color-techniques\" id=\"<?php echo $case_item->id; ?>\">' +
                    '<td><?php echo str_replace("\r\n", '', $case_item->name); ?></td>' +
                    '<td><?php echo $case_item->url; ?></td>' +
                    "<td><button type='button' id='case-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                    "</tr>");
            }

        <?php } ?>

    }

    if (referencesSelected != []) {
        <?php foreach ($references_list as $references_item) { ?>
            if (referencesSelected.includes(<?php echo $references_item->id; ?>)) {
                $('#table_references_selected').append("<tr class=\"table-background-color-techniques\" id=\"<?php echo $references_item->id; ?>\">" +
                    "<td><?php echo str_replace("\r\n", '', htmlspecialchars($references_item->full_reference)); ?></td>" +
                    "<td><?php echo str_replace("\r\n", '', $references_item->title) ?></td>" +
                    "<td><button type='button' id='references-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                    "</tr>");
            }

        <?php } ?>

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //For Loading Dialogs and Table

    //Media show and select
    $('#add-media-list-submit').click(function(e) {
        if ($('#media-list-table tr').length == 0) {
            <?php foreach ($media_list as $media_item) { ?>
                $('#media-list-table').append('<tr class=\"table-background-color-techniques\">' +
                    '<td><input type=\'radio\' name=\'media_list\' value=\'<?php echo $media_item->id; ?>\'/></td>' +
                    "<td><img height=100 width=100 src='<?php echo (storage_url() . $media_item->location); ?>' alt='No Image Uploaded'/></td>" +
                    '<td><?php echo $media_item->name;
                            echo "<br>";
                            echo $media_item->height . "x" . $media_item->width;
                            ?></td>' +
                    '</tr>');
            <?php } ?>
        }

        $("#add-media-list-dialog-form").dialog({
            height: 500,
            width: 500,
            modal: true,
            resizable: true,
            position: {
                my: " top",
                at: " top",
                of: window,
                collision: "none"
            },

            modal: true,
            title: "Available Resources",
            buttons: {
                "Cancel": function() {
                    $(this).dialog("close");
                },

                "Select": function() {
                    $(this).dialog("close");

                    mediaSelected = []


                    $('input[name="media_list"]:checked').each(function() {
                        if (!mediaSelected.includes($(this).attr('value'))) {
                            mediaSelected.push($(this).attr('value'));
                        }
                    });
                    $('#table_list_media_selected').empty();

                    <?php foreach ($media_list as $media_item) { ?>
                        if (mediaSelected == <?php echo $media_item->id; ?>) {
                            $('#table_list_media_selected').append("<tr class=\"table-background-color-techniques\">" +
                                "<td><img height=100 width=100 src='<?php echo (storage_url() . $media_item->location); ?>' alt='No Image Uploaded'/></td>" +
                                '<td><?php echo $media_item->name;
                                        echo "<br>";
                                        echo $media_item->height . "x" . $media_item->width;
                                        ?></td>' +
                                "<td><p><?php echo str_replace("\r\n", '', $media_item->caption); ?></p></td>" +
                                "<td><button type='button' id='media-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                                "</tr>");
                        }
                    <?php } ?>
                    document.getElementById('media_items_selected_hidden').value = mediaSelected

                },
            }
        });
    });

    $('body').on('click', '#media-selected-item', function() {
        $(this).attr('id');
        mediaSelected = 0;
        $(this).parent().parent().remove();
        document.getElementById('media_items_selected_hidden').value = mediaSelected;

    })


    // Output List show and select
    $('#add-media-output-submit').click(function(e) {
        $('#media-output-table').empty();

        if ($('#media-output-table tr').length == 0) {
            <?php foreach ($media_list as $media_item) { ?>
                if (!outputSelected.includes(<?php echo $media_item->id; ?>)) {
                    $('#media-output-table').append('<tr class="table-background-color-techniques">' +
                        '<td><input type=\'checkbox\' name=\'media_output\' value=\'<?php echo $media_item->id; ?>\'/></td>' +
                        "<td><img height=100 width=100 src='<?php echo (storage_url() . $media_item->location); ?>' alt='No Image Uploaded'/></td>" +
                        '<td><?php echo $media_item->name;
                                echo "<br>";
                                echo $media_item->height . "x" . $media_item->width;
                                ?></td>' +
                        '</tr>');
                }
            <?php } ?>
        }
        $("#add-media-output-dialog-form").dialog({
            height: 500,
            width: 500,
            modal: true,
            resizable: true,
            position: {
                my: " top",
                at: " top",
                of: window,
                collision: "none"
            },

            modal: true,
            title: "Available Resources",
            buttons: {
                "Cancel": function() {
                    $(this).dialog("close");
                },

                "Select": function() {
                    $(this).dialog("close");

                    //outputSelected = []

                    toAddOutput = [];
                    $('input[name="media_output"]:checked').each(function() {
                        if (!outputSelected.includes($(this).attr('value'))) {
                            outputSelected.push(parseInt($(this).attr('value')));
                            toAddOutput.push($(this).attr('value'));
                        }
                    });

                    <?php foreach ($media_list as $media_item) { ?>
                        toAddOutput.forEach(function(element) {
                            if (element == <?php echo $media_item->id; ?>) {
                                $('#table_output_media_selected').append("<tr class=\"table-background-color-techniques\" id='" + element + "'>" +
                                    "<td><img height=100 width=100 src='<?php echo (storage_url()  . $media_item->location); ?>' alt='No Image Uploaded'/></td>" +
                                    '<td><?php echo $media_item->name;
                                            echo "<br>";
                                            echo $media_item->height . "x" . $media_item->width;
                                            ?></td>' +
                                    "<td><p><?php echo str_replace("\r\n", '', $media_item->caption); ?></p></td>" +
                                    "<td><button type='button' id='media-output-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                                    "</tr>");
                            }
                        })
                    <?php } ?>
                    document.getElementById('media_output_items_selected_hidden').value = outputSelected

                },
            }
        });

    });

    $('body').on('click', '#media-output-selected-item', function() {
        selectedElement = $(this).parent().parent().attr('id')
        outputSelected = outputSelected.filter(function(value) {
            return value != selectedElement
        });
        $(this).parent().parent().remove();
        document.getElementById('media_output_items_selected_hidden').value = outputSelected

    })


    // Instrument List show and select
    $('#add-media-instrument-submit').click(function(e) {
        $('#media-instrument-table').empty();

        if ($('#media-instrument-table tr').length == 0) {
            <?php foreach ($media_list as $media_item) { ?>
                if (!instrumentSelected.includes(<?php echo $media_item->id; ?>)) {
                    $('#media-instrument-table').append('<tr class="table-background-color-techniques">' +
                        '<td><input type=\'checkbox\' name=\'media_instrument\' value=\'<?php echo $media_item->id; ?>\'/></td>' +
                        "<td><img height=100 width=100 src='<?php echo (storage_url()  . $media_item->location); ?>' alt='No Image Uploaded'/></td>" +
                        '<td><?php echo $media_item->name;
                                echo "<br>";
                                echo $media_item->height . "x" . $media_item->width;
                                ?></td>' +
                        '</tr>');
                }
            <?php } ?>
        }
        $("#add-media-instrument-dialog-form").dialog({
            height: 500,
            width: 500,
            modal: true,
            resizable: true,
            position: {
                my: " top",
                at: " top",
                of: window,
                collision: "none"
            },

            modal: true,
            title: "Available Resources",
            buttons: {
                "Cancel": function() {
                    $(this).dialog("close");
                },

                "Select": function() {
                    $(this).dialog("close");

                    //instrumentSelected = []

                    toAddInsturments = []
                    $('input[name="media_instrument"]:checked').each(function() {
                        if (!instrumentSelected.includes($(this).attr('value'))) {
                            instrumentSelected.push(parseInt($(this).attr('value')));
                            toAddInsturments.push($(this).attr('value'));
                        }
                    });

                    <?php foreach ($media_list as $media_item) { ?>

                        toAddInsturments.forEach(function(element) {
                            if (element == <?php echo $media_item->id; ?>) {
                                $('#table_instrument_media_selected').append("<tr class=\"table-background-color-techniques\" id='" + element + "'>" +
                                    "<td><img height=100 width=100 src='<?php echo (storage_url()  . $media_item->location); ?>' alt='No Image Uploaded'/></td>" +
                                    '<td><?php echo $media_item->name;
                                            echo "<br>";
                                            echo $media_item->height . "x" . $media_item->width;
                                            ?></td>' +
                                    "<td><p><?php echo str_replace("\r\n", '', $media_item->caption); ?></p></td>" +
                                    "<td><button type='button' id='media-instrument-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                                    "</tr>");
                            }
                        })
                    <?php } ?>
                    document.getElementById('media_instrument_items_selected_hidden').value = instrumentSelected

                },
            }
        });

    });

    $('body').on('click', '#media-instrument-selected-item', function() {
        selectedElement = $(this).parent().parent().attr('id')
        instrumentSelected = instrumentSelected.filter(function(value) {
            return value != selectedElement
        });
        $(this).parent().parent().remove();
        document.getElementById('media_instrument_items_selected_hidden').value = instrumentSelected

    })


    // Localisations List show and select
    $('#add-localisations-submit').click(function (e) {
        $('#localisations-table').empty();

        if($('#localisations-table tr').length == 0 )
        {
            // Create a table of localisations to view
            <?php if (isset($localisations_list)) {
          foreach($localisations_list as $localisations_item){?>
            if(!localisationsSelected.includes(<?php echo $localisations_item['id']?>)) {
                $('#localisations-table').append('<tr class="table-background-color-techniques">' +
                    '<td><input type=\'checkbox\' name=\'localisation\' value=\'<?php echo $localisations_item['id']; ?>\'/></td>' +
                    '<td><?php echo $localisations_item["center_name"]; ?></td>' +
                    '<td><?php echo str_replace("\"", "", $localisations_item["applications"]); ?></td>' + 
                    '<td><?php echo $localisations_item["yr_commissioned"];?></td>' +
                    '</tr>');
            }
            <?php } } ?>
        }
        // Create a dialog box of localisations
        $("#add-localisations-dialog-form").dialog({
            height: 600,
            width: 900,
            modal: true,
            resizable: true,
            position: {
                my: " top",
                at: " top",
                of: window,
                collision: "none"
            },

            modal: true,
            title: "Localisations available for copying",
            buttons: {
                "Cancel": function () {
                    $(this).dialog("close");
                },

                "Copy": function () {
                    $(this).dialog("close");

                    // Compile a list of selected items
                    toAddLocalisations= []
                    $('input[name="localisation"]:checked').each(function () {
                        if (!localisationsSelected.includes($(this).attr('value'))) {
                            localisationsSelected.push(parseInt($(this).attr('value')));
                            toAddLocalisations.push($(this).attr('value'));
                        }
                    });

                    // Copy selected items from dialog to the table displayed on the form
                    <?php if (isset($localisations_list)) {
                foreach ($localisations_list as $localisations_item){?>
                    toAddLocalisations.forEach(function(element){
                        if(element == <?php echo (isset($localisations_item['id']))? $localisations_item['id']: '-9999999';?>)
                        {
                            $('#table_localisations_selected').append("<tr class=\"table-background-color-techniques\" id='"+ element + "'>"+
                                "<td><?php echo $localisations_item['center_name'];?></td>" +
                                "<td><?php echo str_replace('"', '', $localisations_item['applications']); ?></td>" +
                                "<td><?php echo $localisations_item['yr_commissioned'];?></td>" + 
                                "<td><button type='button' id='localisations-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                                "</tr>");
                        }
                    })
                    <?php } } ?>
                    document.getElementById('localisations_items_selected_hidden').value = localisationsSelected

                },
            }
        });

    });

    // User clicks on button to remove localisations from table and the form
    $('body').on('click', '#localisations-selected-item', function () {
        selectedElement = $(this).parent().parent().attr('id')
        localisationsSelected = localisationsSelected.filter(function(value) { return value != selectedElement });
        $(this).parent().parent().remove();
        document.getElementById('localisations_items_selected_hidden').value = localisationsSelected
    })


    // Contact List show and select
    $('#add-contacts-submit').click(function(e) {
        $('#contacts-table').empty();

        if ($('#contacts-table tr').length == 0) {
            <?php foreach ($contact_list as $contact_item) { ?>
                if (!contactSelected.includes(<?php echo $contact_item['id'] ?>)) {
                    //alert('Check :'+ contactSelected + ':' + <?php echo $contact_item['id'] ?>);
                    $('#contacts-table').append('<tr class="table-background-color-techniques">' +
                        '<td><input type=\'checkbox\' name=\'contact\' value=\'<?php echo $contact_item['id']; ?>\'/></td>' +
                        "<td><?php echo $contact_item['name']; ?></td>" +
                        "<td><?php echo $contact_item['center_name']; ?></td>" +
                        '<td><?php echo $contact_item['institution']; ?></td>' +
                        '</tr>');
                }
            <?php } ?>
        }
        $("#add-contacts-dialog-form").dialog({
            height: 500,
            width: 500,
            modal: true,
            resizable: true,
            position: {
                my: " top",
                at: " top",
                of: window,
                collision: "none"
            },

            modal: true,
            title: "Available Resources",
            buttons: {
                "Cancel": function() {
                    $(this).dialog("close");
                },

                "Select": function() {
                    $(this).dialog("close");

                    //contactSelected = []


                    toAddContacts = []
                    $('input[name="contact"]:checked').each(function() {
                        if (!contactSelected.includes($(this).attr('value'))) {
                            contactSelected.push(parseInt($(this).attr('value')));
                            toAddContacts.push($(this).attr('value'));
                        }
                    });




                    <?php foreach ($contact_list as $contact_item) { ?>
                        toAddContacts.forEach(function(element) {
                            if (element == <?php echo $contact_item['id']; ?>) {
                                $('#table_contacts_selected').append("<tr class=\"table-background-color-techniques\" id='" + element + "'>" +
                                    "<td><?php echo $contact_item['name']; ?></td>" +
                                    "<td><?php echo $contact_item['center_name']; ?></td>" +
                                    "<td><?php echo $contact_item['institution']; ?></td>" +
                                    "<td><button type='button' id='contact-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                                    "</tr>");
                            }
                        })
                    <?php } ?>
                    document.getElementById('contact_items_selected_hidden').value = contactSelected

                },
            }
        });

    });

    $('body').on('click', '#contact-selected-item', function() {
        selectedElement = $(this).parent().parent().attr('id')
        contactSelected = contactSelected.filter(function(value) {
            return value != selectedElement
        });
        $(this).parent().parent().remove();
        document.getElementById('contact_items_selected_hidden').value = contactSelected

    })

    // Case Study  show and select

    $('#add-case-submit').click(function(e) {
        $('#case-table').empty();

        if ($('#case-table tr').length == 0) {
            <?php foreach ($case_list as $case_item) { ?>
                if (!caseSelected.includes(<?php echo $case_item->id; ?>)) {
                    $('#case-table').append('<tr class="table-background-color-techniques">' +
                        '<td><input type=\'checkbox\' name=\'case\' value=\'<?php echo $case_item->id; ?>\'/></td>' +
                        '<td><?php echo str_replace("\r\n", '', $case_item->name); ?></td>' +
                        '<td><?php echo $case_item->url; ?></td>' +
                        '</tr>');
                }
            <?php } ?>
        }

        $("#add-case-dialog-form").dialog({
            height: 500,
            width: 500,
            modal: true,
            resizable: true,
            position: {
                my: " top",
                at: " top",
                of: window,
                collision: "none"
            },

            modal: true,
            title: "Available Resources",
            buttons: {
                "Cancel": function() {
                    $(this).dialog("close");
                },

                "Select": function() {
                    $(this).dialog("close");

                    //caseSelected = []

                    toAddCase = []
                    $('input[name="case"]:checked').each(function() {
                        if (!caseSelected.includes($(this).attr('value'))) {
                            caseSelected.push(parseInt($(this).attr('value')));
                            toAddCase.push($(this).attr('value'));
                        }
                    });



                    <?php foreach ($case_list as $case_item) { ?>
                        toAddCase.forEach(function(element) {
                            if (element == <?php echo $case_item->id; ?>) {
                                $('#table_case_selected').append("<tr class=\"table-background-color-techniques\" id='" + element + "'>" +
                                    '<td><?php echo str_replace("\r\n", '', $case_item->name); ?></td>' +
                                    '<td><?php echo $case_item->url; ?></td>' +
                                    "<td><button type='button' id='case-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                                    "</tr>");
                            }
                        })
                    <?php } ?>
                    document.getElementById('case_items_selected_hidden').value = caseSelected

                },
            }
        });

    });

    $('body').on('click', '#case-selected-item', function() {
        selectedElement = $(this).parent().parent().attr('id')
        caseSelected = caseSelected.filter(function(value) {
            return value != selectedElement
        });
        $(this).parent().parent().remove();
        document.getElementById('case_items_selected_hidden').value = caseSelected

    })

    //Reference List show and select
    $('#add-references-submit').click(function(e) {
        $('#add-references-dialog-form').empty();

        if ($('#add-references-dialog-form tr').length == 0) {
            <?php foreach ($references_list as $references_item) { ?>

                if (!referencesSelected.includes(<?php echo $references_item->id; ?>)) {
                    $('#add-references-dialog-form').append('<tr class="table-background-color-techniques">' +
                        '<td><input type=\'checkbox\' name=\'references\' value=\'<?php echo $references_item->id; ?>\'/></td>' +
                        '<td><?php echo str_replace("\r\n", '', $references_item->full_reference); ?></td>' +
                        '<td><?php echo str_replace("\r\n", '', $references_item->title) ?></td>' +
                        '</tr>');
                }
            <?php } ?>
        }

        $("#add-references-dialog-form").dialog({
            height: 500,
            width: 500,
            modal: true,
            resizable: true,
            position: {
                my: " top",
                at: " top",
                of: window,
                collision: "none"
            },

            modal: true,
            title: "Available Resources",
            buttons: {
                "Cancel": function() {
                    $(this).dialog("close");
                },

                "Select": function() {
                    $(this).dialog("close");

                    toAddReferences = []

                    $('input[name="references"]:checked').each(function() {
                        if (!referencesSelected.includes($(this).attr('value'))) {
                            referencesSelected.push(parseInt($(this).attr('value')));
                            toAddReferences.push($(this).attr('value'));
                        }
                    });

                    <?php foreach ($references_list as $references_item) { ?>
                        toAddReferences.forEach(function(element) {
                            if (element == <?php echo $references_item->id; ?>) {
                                $('#table_references_selected').append("<tr class=\"table-background-color-techniques\" id='" + element + "'>" +
                                    "<td><?php echo str_replace("\r\n", '', htmlspecialchars($references_item->full_reference)); ?></td>" +
                                    '<td><?php echo str_replace("\r\n", '', $references_item->title); ?></td>' +
                                    "<td><button type='button' id='references-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                                    "</tr>");
                            }
                        })
                    <?php } ?>
                    document.getElementById('references_items_selected_hidden').value = referencesSelected
                },
            }
        });

    });


    // User clicks on button to remove a reference from the table and form
    $('body').on('click', '#references-selected-item', function() {
        selectedElement = $(this).parent().parent().attr('id')
        referencesSelected = referencesSelected.filter(function(value) {
            return value != selectedElement
        });
        $(this).parent().parent().remove();
        document.getElementById('references_items_selected_hidden').value = referencesSelected;
    });

    // Update sample type hidden input
    $("#sample-type-select").change(function() {
           var str = $("#sample-type-select option:selected").first().val();
           $("#sample_type").val(str);
    }).trigger("change");

    // User clicks on button to remove metadata row from the table and form
    $('body').on('click', '#metadata-selected-item', function() {
        selectedId = $(this).attr('metadata_id');
        metadataSelected = metadataSelected.filter(function(value) {
            return value != selectedId
        });
        $(this).parent().parent().remove();
        document.getElementById('metadata_ids_selected_hidden').value = metadataSelected;
    });

    // Update the form input when a set of elements is selected
    $('#elementsset-selector').change(function() {
        var str = $("#elementsset-selector option:selected").first().val();
        $("#elementsset-id").val(str);
    }).trigger("change");

    // Update the metadata table when a set of metadata is added
    $('body').on('click', '#add-metadata', function() {
        // Update the table
        var metadata_txt = $("#metadata-selector option:selected").text(); 
        var metadata_id = $("#metadata-selector option:selected").val();
        $('#table_metadata_selected').append("<tr class='table-background-color-techniques'>"+
                                             "<td>" + metadata_txt + "</td>" +
                                             "<td><input type='radio' id='geochem-analysis-meta-id' name='geochem-analysis-meta-id' value='" + metadata_id + "' checked/></td>" +
                                             "<td><button type='button' metadata_id='" + metadata_id + "' id='metadata-selected-item' class='tf-delete'>&nbsp;&nbsp;&nbsp;</td>" +
                                             "</tr>");
        var metadata_int = parseInt(metadata_id);
        if (!metadataSelected.includes(metadata_int)) {
            metadataSelected.push(parseInt(metadata_int));
        }
        $('#metadata_ids_selected_hidden').val(metadataSelected); 
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
