<?php
/**
 * TechniqueFinder - select.php
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
    <head><title>TF Admin | Technique Finder - Options association</title></head>
    <div class="nav tf-navbar">
        <button class="btn" onclick="window.location='<?php echo base_url();?>TechniqueFinder/index'">
            <span class="home-icon">&nbsp;</span>
            <a class="tf-font-orange" style="text-decoration: none;">Admin Home</a>
        </button>
    </div>

    <div class="row" style="margin-left: 1em; ">
        <h1 class="tf-heading">Options associations for Biological sciences </h1>
    </div>

<?php
    if ($this->session->flashdata('error-warning-message')){
        echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
        echo $this->session ->flashdata('error-warning-message');
        echo '</div>';
    }

    if ($this->session->flashdata('success-warning-message')){
        echo '<div id="success-warning-message" class=" tf-font tf-font-size success-warning-message">';
        echo $this->session ->flashdata('success-warning-message');
        echo '</div>';
    }
    else{
        echo '<div id="success-warning-message" class=" tf-font tf-font-size success-warning-message" style="display:none;"></div>';
    }

?>

<div style="float:left;margin-left:15px;">
    <div style="float:left;">
        <table style="text-align: left;">
            <tr>
                <td class="tf-yellow-box" valign="top">
                <div class="tf-setp-title">Step 1: Choose a sample </div>
                    <ul style="padding-left:15px;">
                        <?php
                        foreach($left_list as $r){
                            echo '<li _id="'.$r->id.'" _type="leftOption" class="tf-buttonDiv" onclick="onSelect(this)">'.$r->name.'</li>';
                        }
                        ?>
                    </ul>                
                </td>
                <td style="width:100px; vertical-align:top;" >
                    <img src="<?php echo base_url().'assets/images/space.gif'?>" width="20" height="5" />
                    <span style="text-align:center;"><h1 class="tf-heading">AND </h1></span>
                </td>
                <td class="tf-yellow-box" valign="top">
                    <div class="tf-setp-title">Step 2: Choose another sample </div>
                    <ul style="padding-left:15px;">
                        <?php
                        foreach($right_list as $r){
                            echo '<li _id="'.$r->id.'" _type="rightOption" class="tf-buttonDiv" onclick="onSelect(this)">'.$r->name.'</li>';
                        }
                        ?>
                    </ul> 
                </td>
            </tr>

        </table>
    </div>

    <div id="step3" style="display:none;float:right; padding-left: 5em;" >

        <div>
            <div class="tf-setp-title" >Step 3: Add/remove/order associated techniques</div>
            <ul id="associatedTechniques" class="tf-associatedTechniques">
            </ul>
        </div>
    
        <div>
            <button id="save" class="tf-button" type="button" onclick="onOpenAddTechniqueDialog()">
                <span class="tf-database-add"></span>
                <span class="tf-button-label">Add technique</span>
            </button>
    
            <button id="save" class="tf-button" type="button" onclick="onSave()">
                <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
                <span class="tf-button-label">Save</span>
            </button>
            <button type="button" class="tf-button" onclick="onSelect($('.tf-select-right'))">
                <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
                <span class="tf-button-label">Cancel</span>
            </button>
        </div>
    
    </div>
    
</div>

<div id="techniquesDialog" title="Available Techniques"></div>

    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>


<script type="text/javascript">
function onSelect(e){
    var left_id = null;
    var right_id = null;
    var element = $(e);
    if(element.attr('_type') == 'leftOption'){
        $('.tf-select-left').removeClass('tf-select-left');
        element.addClass('tf-select-left');
        left_id = element.attr('_id');
        right_id = $('.tf-select-right').attr('_id');
    }
    else if(element.attr('_type') == 'rightOption'){
        $('.tf-select-right').removeClass('tf-select-right');
        element.addClass('tf-select-right');
        right_id = element.attr('_id');
        left_id = $('.tf-select-left').attr('_id');
    }
    else{
       ; 
    }
    if(left_id && right_id){
        $('#success-warning-message').hide();
        var selection_str = "left="+left_id+"&right="+right_id;
        $.ajax({
            url: "<?php echo site_url('BioOptionAssociation/onSelect');?>",
            type:'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: selection_str,
            success: function(data) {
                //console.log(data);
                if(data && data !=''){
                    $('#associatedTechniques').html(data);
                    $('#associatedTechniques').sortable( {
                        update:function(){}
                    });
                    $('#step3').show();
                }
                else{
                    $('#step3').hide();
                }
            }
        });
    
    }
}

function onSave(){
    var left_id = $('.tf-select-left').attr('_id');
    var right_id = $('.tf-select-right').attr('_id');

    if(left_id && right_id){
        var selection_str = "left="+left_id+"&right="+right_id;
        var techniqueIds_seq = $('#associatedTechniques').sortable('serialize', {key:'techniqueIds[]'});

        $.ajax({
            url: "<?php echo site_url('BioOptionAssociation/onSave');?>",
            type:'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: selection_str + '&'+ techniqueIds_seq,
            success: function(data) {
                $('#success-warning-message').text(data).show();
            }
        });
    
    }

}

function onOpenAddTechniqueDialog(){
    var techniqueIds = $("#associatedTechniques").sortable('serialize', {key:'techniqueIds[]'});
        $.ajax({
               type: "GET",
               url: "getTechniqueCandidates",
               data: techniqueIds,
               success: function(data){
                    $("#techniquesDialog").html(data).dialog('open');
                  }
        });
}

function addTechniques() {
    $('#no_matching_message').remove();
    var $checkedTechniques = $("#allTechniques").find("input[name=technique_candidate]:checked");// 
    $checkedTechniques.each(function(){
        $('<li id="id_' + this.value + '" class="ui-state-default">'
                + '<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' 
                + $(this).parent().text() 
                + '<a href="#" style="float:right;" onclick="$(\'#id_'+this.value+'\').remove()">'
                + '<img border="0" src="<?php echo base_url().'assets/images/database_delete.png'?>" alt="Remove" title="Remove"/>'
                + '</a></li>').insertBefore("#associatedTechniquesEnd");
    });
}

(function(){
    var $dailog = $("#techniquesDialog").dialog({
            width: 640, 
            height: 480,
            autoOpen: false,
            modal: true,
            buttons: {"Add":function(){$(this).dialog("close"); addTechniques(); $(this).empty();}, "Cancel":function(){$(this).empty().dialog("close");}}
        });
})();
</script>

<?php $this->load->view('layout/footer.php');?>