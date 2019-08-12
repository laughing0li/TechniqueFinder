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
<head><title>TF Admin | Option List</title></head>
<div class="nav tf-navbar">
    <button class="btn" onclick="window.location='<?php echo base_url();?>TechniqueFinder/index'">
        <span class="home-icon">&nbsp;</span>
        <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
    </button>
    <button class="btn" onclick="window.location='<?php echo base_url();?>PhyOptionRight/create_new'">
        <span class="tf-database-add">&nbsp;</span>
        <a class="tf-font-orange" style="text-decoration: none;">New Option</a>
    </button>
</div>

<div class="row" style="margin-left: 1em; ">
    <h1 class="tf-heading"> Right side option list for Physical sciences </h1>
</div>


<?php
    if ($this->session->flashdata('success-warning-message')){
        echo '<div id="success-warning-message" class=" tf-font tf-font-size success-warning-message">';
        echo $this->session ->flashdata('success-warning-message');
        echo '</div>';
    }
    else{
        echo '<div id="success-warning-message" class=" tf-font tf-font-size success-warning-message" style="display:none;"></div>';
    }

    if ($this->session->flashdata('error-warning-message')){
        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
        echo $this->session ->flashdata('error-warning-message');
        echo '</div>';
    }
    else{
        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message" style="display:none;"></div>';
    }


?>


<div class="table-responsive tf-font tf-font-size" style="margin-bottom: 3em;">
    <table id="the_datatable" class="table table-bordered table-striped" style="width: 60%;float: left;margin-left: 1em;">
        <thead>
        <tr>

        </tr>
        </thead>
    </table>
</div>



<script type="text/javascript">
    $(document).ready(function(){
        $('#the_datatable').DataTable({
            columnDefs: [{

            }],
            ordering: false,
            paging: false,
            filter:false,
            status:false,
            bInfo : false,
            ajax: {
                url : "<?php echo site_url("PhyOptionRight/getList") ?>",

            },
            columns: [
                { title: "Name", data:'name'},
                { title: "Actions", data:'actions', width: '20%' },
            ],
            rowId: function(data) {
                return 'id_' + data.id;
            },
            initComplete: function( settings, json ) {
                //jquery sortable
                $('#the_datatable > tbody').sortable({
                    update:function(){
                        var id_seq = $(this).sortable('serialize', {key:'optionIds[]'});
                        //console.log(id_seq);

                        $.ajax({
                            url: "<?php echo site_url('PhyOptionRight/updatePriorities');?>",
                            type:'POST',
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                            data: id_seq,
                            success: function(data) {
                                $('#success-warning-message').text('List order has been updated.').show();
                                console.log(data);
                            }
                        });

                    },
                })
                //$('#the_datatable > tbody').find('td').css('padding','0px 0px 0px 0px')
            }
        });
    });


</script>


<?php $this->load->view('layout/footer.php');?>
