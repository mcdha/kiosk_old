<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/aap.ico">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mview.css">
    <script src="<?php echo base_url(); ?>assets/dev/plugins/inputmask/src/jquery.maskedinput.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/kiosk.css">
	
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   
</head>
<body >
    
<script>

$(document).ready(function() {
	$("div#second").hide();
    $("#mem").change(function () {
        var val = $(this).val();
        if (val === "REGULAR") {
            $("#plantype").html('<option value="">Please select plan type.</option>\n\
                                <option value="1">1 - YEAR REGULAR MEMBERSHIP (<span>&#8369;</span> 2,240)</option>\n\
                                <option value="5">3 - YEAR REGULAR MEMBERSHIP (<span>&#8369;</span> 5,600)</option>');
								$("div#second").show();
        }else if (val === "ASSOCIATE") {
            $("#plantype").html('<option value="">Please select plan type.</option>\n\
                                <option value="4">1 - YEAR ASSOCIATE MEMBERSHIP (<span>&#8369;</span> 1,680)</option>\n\
                                <option value="7">3 - YEAR ASSOCIATE MEMBERSHIP (<span>&#8369;</span> 4,200)</option>');
								$("div#second").hide();
        }else if (val === "LITE"){
            $("#plantype").html('<option value="2">1 - YEAR MEMBERSHIP LITE (<span>&#8369;</span> 896)</option>');
			$("div#second").hide();
            
        }else{
			$("#plantype").html('<option value="">Please select plan type.</option>');
			$("div#second").hide();
		}
       
    });
	
	function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
   }
	
	$( "#h2" ).autocomplete({
	             minLength: 1,
	             source: "<?php echo base_url();?>kiosk/getTowns",
	             focus: function( event, ui ) {
	                   return false;
	             },
	             select: function( event, ui ) {
	            	$( "#h2" ).val( decodeHtml(ui.item.town) );
	            	$( "#city" ).val( decodeHtml(ui.item.city) );
	                $( "#province" ).val( decodeHtml(ui.item.province) );
	                $( "#zip" ).val( ui.item.zipcode );
	                return false;
	             }
	             
	          })
	          .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
	             return $( "<li>" )
	             .append(item.town + " " + item.city + " " + item.province)
	             .appendTo( ul );
			};
                  
            $( "#oh2" ).autocomplete({
	             minLength: 1,
	             source: "<?php echo base_url();?>kiosk/getTowns",
	             focus: function( event, ui ) {
	                   return false;
	             },
	             select: function( event, ui ) {
	            	$( "#oh2" ).val( decodeHtml(ui.item.town) );
	            	$( "#ocity" ).val( decodeHtml(ui.item.city) );
	                $( "#oprovince" ).val( decodeHtml(ui.item.province) );
	                $( "#ozip" ).val( ui.item.zipcode );
	                return false;
	             }
	             
	          })
	          .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
	             return $( "<li>" )
	             .append(item.town + " " + item.city + " " + item.province)
	             .appendTo( ul );
			};
            
           $( "#city" ).autocomplete({
		             minLength: 1,
		             source: "<?php echo base_url();?>kiosk/getCities",
		             focus: function( event, ui ) {
		                   return false;
		             },
		             select: function( event, ui ) {
		            	
		            	$( "#city" ).val( decodeHtml(ui.item.city) );
		                $( "#province" ).val( decodeHtml(ui.item.province) );
		                $( "#zip" ).val( ui.item.zipcode );
		                return false;
		             }
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		             return $( "<li>" )
		             .append( item.city + " " + item.province)
		             .appendTo( ul );
		        }; 
                          
            $( "#ocity" ).autocomplete({
		             minLength: 1,
		             source: "<?php echo base_url();?>kiosk/getCities",
		             focus: function( event, ui ) {
		              //  $( "#city" ).val( ui.item.city );
		                   return false;
		             },
		             select: function( event, ui ) {
						 
		            	$( "#ocity" ).val( decodeHtml(ui.item.city) );
		                $( "#oprovince" ).val( decodeHtml(ui.item.province) );
		                $( "#ozip" ).val( ui.item.zipcode );
		                return false;
		             }
		             
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		             return $( "<li>" )
		             .append( item.city + " " + item.province)
		             .appendTo( ul );
		        };
	
});
</script>        
 <div class="container">
    <div class="col-xl-12 col-lg-8">
        <div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                <a href="<?php echo site_url('kiosk') ?>">HOME
                    
                </a>
				<a href="<?php echo site_url('kiosk') ?>">&times
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <h2>MEMBERSHIP RENEWAL FORM</h2><br>
            <img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" id="loader" style="display: none" class="center">
                
                <?php echo form_open('kiosk/add','id="regForm"'); ?>
                    <div class="tab" id="form1">
					<input type="hidden" name="status" id="status" value="RENEW" hidden>

                  <fieldset>
                    <legend>I would like to renew my membership to :</legend>
					<div class="row">
                        <div class="col-lg-6">
                        <div class="field-wrapper hasValue1">
                                    <select id="mem" name="mem" style="width: 100%;">
                                        <option value="">Please select type of membership.</option>
                                        <option value="REGULAR">REGULAR</option>
                                        <option value="ASSOCIATE">ASSOCIATE</option>
                                        <option value="LITE">MEMBERSHIP LITE</option>
                                    </select>
                                    <div class="field-placeholder">
                                        <span>Type of Membership</span>
                                    </div>
                                </div>    
                        <div id="main">    
                            <div class="field-wrapper hasValue1">
                                    <select id="plantype" name="plantype" style="width: 100%;" >
                                        <option value="">Please select plan type.</option>
                                    </select>
                                    <div class="field-placeholder">
                                        <span> Plan Type</span>
                                    </div>
                                </div>
                        </div>
                        </div>
					</div>
					<h5>Are you an authorized representative?</h5>
                    <div class="pradio">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="yes" name="rradio" id="rradio" value="yes">
                            <label class="custom-control-label" for="yes" style="font-size:16px;">YES</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="no" name="rradio" id="rradio" value="no">
                            <label class="custom-control-label" for="no" style="font-size:16px;">NO</label>
                        </div>
                    </div>
                    <br>
                    <div id="rep">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="field-wrapper">
                                    <input type="text" name="rname" id="rname"  required>
                                    <div class="field-placeholder"><span>Representative Name</span></div>    
                                </div> 
                            </div>
                            <div class="col-sm-4">
                                <div class="field-wrapper">
                                    <input type="text" name="rcontact" id="rcontact" required>
                                    <div class="field-placeholder"><span>Contact No.</span></div>    
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="field-wrapper">
                                    <input type="text" name="raddress" id="raddress"  required>
                                    <div class="field-placeholder"><span>Address</span></div>    
                                </div>
                            </div>
                        </div>    
                    </div>
                    <script>
                        $(document).ready(function() {
                             $("div#rep").hide();
                                $('input:radio[name="rradio"]').change(
                                    function(){
                                        if ($(this).val() === 'yes') {
                                            $("div#rep").show();
                                        }
                                        else {
                                            $("div#rep").hide();
                                        }
                                 });
                        });
                    </script>
                    <br>
					</fieldset>	
				  <fieldset>
                            <legend>Step 1 of 2 (Membership Information)</legend>
                            <div class="container-fluid"> 
                               
                    <div class="row">
                        <div class="col-lg-6">
							<input type="text" name="recordno" id="recordno" value="<?= $records['result_record']['vehicleinfohead_order']?>" hidden>
							<input type="text" name="record_id" id="record_id" value="<?= $records['result_record']['vehicleinfohead_id']?>" hidden>							
							<table class="table table-striped">
								<tr>
									<td><b>Record No. :</b></td>
									<td><?= $records['result_record']['vehicleinfohead_order']?></td>
								</tr>
								<tr>
									<td><b>Type of Membership :</b></td>
									<td><?= $records['result_record']['sponsor_name']?></td>
								</tr>
								<tr>
									<td><b>Plan Type :</b></td>
									<td><?= $records['result_record']["fee_name"]?></td>
								</tr>
								<tr>
									<td><b>Initiator :</b></td>
									<td><?= $records['result_record']["membershipinitiator_name"] ?></td>
									
								</tr>
								<tr>
									<td><b>Category :</b></td>
									<td><?= $records['result_record']["category_name"] ?></td>
									
								</tr>
							</table>
                            
                        </div>
                        <div class="col-lg-6">
							<table class="table table-striped">
								<tr>
									<td><b>Status :</b></td>
									<td><?= $records['result_record']['vehicleinfohead_status'] ?></td>
								</tr>
								<tr>
									<td><b>Activation Date :</b></td>
									<td><?= $records['result_record']['vehicleinfohead_activedate'] ?></td>
								</tr>
								<tr>
									<td><b>Expiration Date</b></td>
									<td><?= $records['result_record']['vehicleinfohead_expiredate'] ?></td>
								</tr>
								<tr>
									<td><b>Advance Renewal Activation :</b></td>
									<td><?= $records['result_record']['adv_activedate']?></td>
								</tr>
								<tr>
									<td><b>Advance Renewal Expiration :</b></td>
									<td><?= $records['result_record']['adv_expiredate'] ?></td>
								</tr>
							</table>
                        </div>
                    </div>  
                            </div>
                        </fieldset>
					
                        
                    </div>
            
					
               <?php
               $city_id = $records['result_info'][0]['members_housecityid'];
               $district_id = $records['result_info'][0]['members_housedistrictid'];
               $ocity_id = $records['result_info'][0]['members_officecityid'];
               $odistrict_id = $records['result_info'][0]['members_officedistrictid'];
                         
                          
               
												$sql_city ="SELECT city_name FROM address_city where city_id = '$city_id' ";
												$query_city = $this->db->query($sql_city);
												if ($query_city->num_rows() > 0) {
												  foreach ($query_city->result() as $r) {
													  $hcity =  $r->city_name;
												  }		
												}else{
													 $hcity = $city_id;
												}
												
												$sql_district ="SELECT district_name FROM address_district where district_id = '$district_id' ";
												$query_district =  $this->db->query($sql_district);
												if ($query_district->num_rows() > 0) {
												  foreach ($query_district->result() as $r) {
													  $hdistrict =  $r->district_name;
												  }		
												}else{
													$hdistrict = $district_id;
												}
												
												$sql_ocity ="SELECT city_name FROM address_city where city_id = '$ocity_id' ";
												$query_ocity = $this->db->query($sql_ocity);
												if ($query_ocity->num_rows() > 0) {
												  foreach ($query_ocity->result() as $r) {
													  $ocity = $r->city_name;
												  }		
												}else{
													$ocity = $ocity_id;
												}
												
												$sql_odistrict ="SELECT district_name FROM address_district where district_id = '$odistrict_id' ";
												$query_odistrict = $this->db->query($sql_odistrict);
												if ($query_odistrict->num_rows() > 0) {
												  foreach ($query_odistrict->result() as $r) {
													  $odistrict = $r->district_name;
												  }		
												}else{
													 $odistrict = $odistrict_id;
												}					
			   ?>
                    <div class="tab" id="form2">
                        <fieldset>
                            <legend>Step 2 of 2 (Personal Information)</legend>
                            <div class="container-fluid">
                                    <?php
										echo '<input type="text" name="id" value="'.$records['result_info'][0]['members_id'].'" hidden>';
										echo '<input type="text" name="pin" value="'.$records['result_info'][0]['members_pincode'].'" hidden>';
										echo '<input type="text" name="lname" value="'.$records['result_info'][0]['members_lastname'].'" hidden>';
										echo '<input type="text" name="fname" value="'.$records['result_info'][0]['members_firstname'].'" hidden>';
                                    	echo '<form name="myForm" method="post" class="myForm" >';
                                        echo '<table class="NoBorder">';
                                        echo '<tr>';
                                        echo '</tr>';
                                        echo '</table>';
                                        echo '<table id="PIinfo" class="BorderTopNone">';	
                                        echo '<tr>';
                                        echo '<td colspan="4">';
                                        echo '<h4>PERSONAL INFORMATION</h4>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>';
                                       echo '<label><strong>Title:&nbsp;</strong></label>';
                                                echo '<label><span id="salutation1">'.$records['result_info'][0]['members_title'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
                                                echo '<select id="salutation" name="salutation" style="width:100%;" class="update">
                                                <option value="">Please select title.</option>
                                                <option value="MR.">MR</option>
                                                <option value="MS.">MS</option>
                                                <option value="MRS.">MRS</option>
                                                <option value="ATTY.">ATTY</option>
                                                <option value="DR.">DR</option>
                                                <option value="ENGR.">ENGR</option>
                                            </select>';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>Last Name:&nbsp;</strong></label>';
                                                echo '<label><span id="lname1">'.$records['result_info'][0]['members_lastname'].'</span></abel>';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>First Name:&nbsp;</strong></label>';
                                                echo '<label><span id="fname1">'.$records['result_info'][0]['members_firstname'].'</span><label>';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>Middle Name:&nbsp;</strong></label>';
                                                echo '<label><span id="mname1">'.$records['result_info'][0]['members_middlename'].'</span></label>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td >';
                                        echo '<label><strong>Birth Date:&nbsp;</strong></label>';
                                                echo '<label><span id="bday1">'.$records['result_info'][0]['members_birthdate'].'</span></label>';
                                        echo '</td>';
                                        echo '<td colspan="2">';
                                        echo '<label><strong>Birth Place:&nbsp;</strong></label>';
                                                echo '<label><span id="bplace1">'.$records['result_info'][0]['members_birthplace'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<input type="text" name="bplace" class="update">';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>Gender:&nbsp;</strong></label>';
                                                echo '<label><span id="s1">'.$records['result_info'][0]['members_gender'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<select id="sex" name="sex" class="update">
                                                <option value="">Please select gender.</option>
                                                <option value="MALE">MALE</option>
                                                <option value="FEMALE">FEMALE</option>
                                            </select>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>';
                                        echo '<label><strong>Citizenship:&nbsp;</strong></label>';
                                                echo '<label><span id="c1">'.($records['result_info'][0]['nationality_id']== 1)?'FILIPINO':'FOREIGNER'.'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<select id="citizenship" name="citizenship" class="update">
                                                <option value="">Please select citizenship.</option>
                                                <option value="FILIPINO">FILIPINO</option>
                                                <option value="FOREIGNER">FOREIGNER</option>
                                            </select>';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>Civil Status:&nbsp;</strong></label>';
                                                echo '<label><span id="cstatus1">'.$records['result_info'][0]['members_civilstatus'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<select id="cstatus" name="cstatus" class="update">
                                                <option value="">Please select status.</option>
                                                <option value="SINGLE">SINGLE</option>
                                                <option value="MARRIED">MARRIED</option>
                                                <option value="WIDOWED">WIDOWED</option>
                                            </select>';
                                        echo '</td>';
                                        echo '<td colspan="2">';
                                        echo '<label><strong>Occupation:&nbsp;</strong></label>';
                                                echo '<label><span id="occupation1">'.$records['result_info'][0]['occupation_name'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<input type="text" name="occupation" class="update">';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '</table>';
                                        echo '<table id="CIinfo">';
                                        echo '<tr>';
                                        echo '<td colspan="4">';
                                        echo '<h4>CONTACT INFORMATION</h4>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td colspan="4">';
                                        echo '<label><strong>Home Address:&nbsp;</strong></label>';
																								  
                                                echo '<label>'.utf8_decode($records['result_info'][0]['members_haddress1']).' '. utf8_decode($records['result_info'][0]['members_haddress2']).' '.utf8_decode($hcity).' '.utf8_decode($hdistrict).''
                                                         .$records['result_info'][0]['members_housezipcode'].'</label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<table class="update" style="border: none;">
													<tr style="border: none;">
														<td style="border: none;"><label class="update"><strong>Building No./Street</strong></label><input type="text" name="h1" id="h1" ></td>
														<td style="border: none;"><label class="update"><strong>Barangay/Town</strong></label><input type="text" name="h2" id="h2"></td>
														<td style="border: none;"><label class="update"><strong>City/Municipality</strong></label><input type="text" name="city" id="city" ></td>
														<td style="border: none;"><label class="update"><strong>Province</strong></label><input type="text" id="province" name="province"  ></td>
														<td style="border: none;"><label class="update"><strong>Zip Code</strong></label><input type="text" id="zip" name="zip"  ></td>
													</tr>
													</table>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td colspan="4">';
                                        echo '<label><strong>Company Name:&nbsp;</strong></label>';
                                                echo '<label><span id="company1">'.$records['result_info'][0]['members_businessname'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<input type="text" name="company" class="update" >';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td colspan="4">';
                                        echo '<label><strong>Company Address:&nbsp;</strong></label>';
                                                echo '<label>'.utf8_decode($records['result_info'][0]['members_oaddress1']).' '. utf8_decode($records['result_info'][0]['members_oaddress2']).' '.utf8_decode($ocity).' '.utf8_decode($odistrict).''
                                                        .$records['result_info'][0]['members_officezipcode'].'</label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<table class="update" style="border: none;">
													<tr style="border: none;">
														<td style="border: none;"><label class="update"><strong>Building No./Street</strong></label><input type="text" name="oh1" id="oh1" ></td>
														<td style="border: none;"><label class="update"><strong>Barangay/Town</strong></label><input type="text" name="oh2" id="oh2"></td>
														<td style="border: none;"><label class="update"><strong>City/Municipality</strong></label><input type="text" name="ocity" id="ocity" ></td>
														<td style="border: none;"><label class="update"><strong>Province</strong></label><input type="text" id="oprovince" name="oprovince"  ></td>
														<td style="border: none;"><label class="update"><strong>Zip Code</strong></label><input type="text" id="ozip" name="ozip"  ></td>
													</tr>
													</table>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>';
                                        echo '<label><strong>Home Phone:&nbsp;</strong></label>';
                                                echo '<label><span id="tel1">'.$records['result_info'][0]['members_housephoneno'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<input type="text" name="tel" class="update" >';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>Company Phone:&nbsp;</strong></label>';
                                                echo '<label><span id="otel1">'.$records['result_info'][0]['members_officephoneno'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<input type="text" name="otel" class="update">';
                                        echo '</td>';
                                        echo '<td colspan="2">';
                                        echo '<label><strong>Mailing Preference:&nbsp;</strong></label>';
                                                echo '<label><span id="mailing1">'.($records['result_info'][0]['members_mailingpreference'] == 'HOUSE ADDRESS')?'HOME ADDRESS':$row->members_mailingpreference.'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<select id="mailing" name="mailing" style="width:100%" class="update">
                                                <option value="">Please select Mailing Preference</option>
                                                <option value="HOME ADDRESS">HOME ADDRESS</option>
                                                <option value="OFFICE ADDRESS">OFFICE ADDRESS</option>
                                            </select>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>';
                                        echo '<label><strong>Mobile No.:&nbsp;</strong></label>';
                                                echo '<label><span id="mobile1">'.$records['result_info'][0]['members_mobileno'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<input type="text" name="mobile" class="update" >';
                                        echo '</td>';
                                         echo '<td>';
                                        echo '<label><strong>Alternate Mobile No.:&nbsp;</strong></label>';
                                                echo '<label><span id="amobile1">'.$records['result_info'][0]['members_alternate_mobileno'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<input type="text" name="amobile" class="update">';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>Email Address:&nbsp;</strong></label>';
                                                echo '<label><span id="email1">'.$records['result_info'][0]['members_emailaddress'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<input type="text" name="email" class="update">';
                                        echo '</td>';
                                         echo '<td>';
                                        echo '<label><strong>Alternate Email Address:&nbsp;</strong></label>';
                                                echo '<label><span id="aemail1">'.$records['result_info'][0]['members_alternate_emailaddress'].'</span></label>';
												echo '<br/><label style="color:red" class="update"><strong>Change to: </strong></label>';
												echo '<input type="text" name="aemail" class="update">';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '</table>';
                                         
							
                                        echo '<table border="1">';
                                        echo '<tr>';
                                        echo '<td colspan="10">';
                                        echo '<h4>VEHICLE DETAILS</h4>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
											echo '<th>Update?</th>';
                                            echo '<th>Record No.</th>';
                                            echo '<th>Conduction Sticker</th>';
                                            echo '<th>Plate No.</th>';
                                            echo '<th>Car Make</th>';
                                            echo '<th>Model</th>';
                                            echo '<th>Year</th>';
                                            echo '<th>Color</th>';
                                            echo '<th>Fuel Type</th>';
                                       echo '</tr>';    
                                       $i=1;
                                       
                                    foreach($records['result_car'] as $r)
                                    {
                                       
                                       echo '<td>';
                                                echo '<input type="checkbox" id="v'.$i.'" name="v'.$i.'" value="" onclick="updateV'.$i.'()">';
                                                echo '<label for="v'.$i.'">'.$i.'</label>';
                                        echo '</td>';
                                        echo '<td>';
                                                echo $records['result_record']['vehicleinfohead_order'];
                                        echo '</td>';
                                        echo '<td>';
                                                if ($r['vehicleinfo_csticker']== 1) {
                                                        echo '<input type="checkbox" id="csticker'.$i.'"name="csticker" value="csticker" checked disabled>';
                                                        echo '<label for="csticker'.$i.'"></label>';
                                                }else{
                                                        echo '<input type="checkbox" id="csticker'.$i.'"name="csticker" value="csticker" disabled>';
                                                        echo '<label for="csticker'.$i.'"></label>';
                                                }	
                                        echo '</td>';
                                        echo '<td>';
                                                echo $r['vehicleinfo_plateno'];
                                        echo '</td>';
                                        echo '<td>';
                                                echo $r['vehiclebrand_name'];
                                        echo '</td>';
                                        echo '<td>';
                                                echo $r['vehiclemodel_name'];
                                        echo '</td>';
                                        echo '<td>';
                                                echo $r['vehicleinfo_year'];
                                        echo '</td>';
                                        echo '<td>';
                                                echo $r['vehiclecolor_name'];
                                        echo '</td>';
                                        echo '<td>';
                                                echo $r['vehiclefuel_name'];
                                        echo '</td>';
                                        echo '</tr>';
                                        
                                        $i++;
                                      }
                                        echo '</table>';
                                        
                                        echo '</form>';
                                    ?>
                            </div>
							<br>
							<h5>Update my personal information?</h5>
							<div class="pradio">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="uyes" name="uradio" value="1">
									<label class="custom-control-label" for="uyes" style="font-size:16px;">YES</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="uno" name="uradio" value="0">
									<label class="custom-control-label" for="uno" style="font-size:16px;">NO</label>
								</div>
							</div>
					<script>
                        $(document).ready(function() {
                             $(".update").hide();
                                $('input:radio[name="uradio"]').change(
                                    function(){
                                        if ($(this).val() === '1') {
                                            $(".update").show();
                                        }
                                        else {
                                            $(".update").hide();
                                        }
                                 });
                        });
                    </script>
							<br>
                            <div class="agree">
                                    <input type="checkbox" id="aq" name="aq" value="1" checked> 
                                    <label for="aq">I would like to receive AQ Magazine via email.</label>
                                    <input type="checkbox" id="agree" name="agree" value="agree">
                                    <label for="agree">I confirm that the information given in this form is true, complete and accurate.</label>    
                                    <input type="checkbox" id="agreeDP" name="agreeDP" value="agreeDP">
                                    <label for="agreeDP">I agree to the <a href='#' onclick='linkopen();'>Terms and Conditions</a> of the Privacy Policy of the Automobile Association Philippines which I acknowledge that I have read and understood.</label>
                            </div>
                        </fieldset>
                    </div>
                <div style="overflow:auto;">
                    
                        <div style="float:right;">
                          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                          <button type="button" id="nextBtn" onclick="nextPrev(1)" name="button" class="continue">Next</button>
                          
                        </div>
                </div>
                <?php
                echo form_close(); 
                ?> 
				<br>
        </div>
			<div class="card-footer">
				<div class="container my-auto">
							<div class="copyright text-center my-auto">
					<span>Copyright &copy; 2020 Automobile Association Philippines</span>
							</div>
				</div>
            </div>
		</div>
    </div>    
</div>
<script>
function updateV1() {
  var checkBox = document.getElementById("v1");
  if (checkBox.checked == true){
     checkBox.value = 'YES';
  } else { 
    checkBox.value =  'NO';
  }
}
function updateV2() {
  var checkBox = document.getElementById("v2");
  if (checkBox.checked == true){
     checkBox.value = 'YES';
  } else {
    checkBox.value = 'NO';
  }
}
</script>
<script>
function linkopen() {
    window.open("<?php echo site_url('kiosk/policy'); ?>", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=100, left=100, width=795, height=500px");
}
</script>
<script>
    
   var v = jQuery("#regForm").validate({
      rules: {
        plantype: {
          required: true
        },
		uradio: {
          required: true
        },
		rradio: {
          required: true
        }
 
      },
     errorElement: "span",
      messages: {
		plantype:{
				required : "Please select Plan Type"
        },
		uradio:{
				required : "Please select."
        },
		rradio:{
				required : "Please select."
        }
	  },
	  errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") || element.is(":file") ) 
            {
                error.appendTo( element.parents('.pradio') );
				console.log(element.parents());
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
            
        }
    });
    
   
    
    // Multi-Step Form
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");

      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      
      var x = document.getElementsByClassName("tab");
    
      // Exit the function if any field in the current tab is invalid:
//console.log(x);
      if (n == 1 && !v.form())return false;

      
      // Hide the current tab:
      x[currentTab].style.display = "none";
	  
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
	  
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
			if(document.getElementById('agree').checked) 
            { 
                if(document.getElementById('agreeDP').checked){
                    document.getElementById("regForm").submit();
				   // $("#nextBtn").val("save").change();
				   $("#loader").show();
				   return false;
                }else{
                    alert('Please check data privacy consent.'); 
                    currentTab = currentTab - n;
                }

            } else {
                alert('Please confirm that the information given in this form is true, complete and accurate.'); 
                currentTab = currentTab - n;
            }	
        
      }
	  
	  // Otherwise, display the correct tab:
      showTab(currentTab);
    }

            
    //label of input field        
    $(function () {
            $(".field-wrapper .field-placeholder").on("click", function () {
                $(this).closest(".field-wrapper").find("input").focus();
            });
            $(".field-wrapper input").on("keyup", function () {
                var value = $.trim($(this).val());
                if (value) {
                    $(this).closest(".field-wrapper").addClass("hasValue");
                } else {
                    $(this).closest(".field-wrapper").removeClass("hasValue");
                }
            });
			
			$.mask.definitions['~'] = "[+-]";
            $("#tel").mask("9-999-9999");
            $("#otel").mask("9-999-9999");
            $("#mobile").mask("(0999) 999-9999");
            $("#amobile").mask("(0999) 999-9999");
    });
	
	function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
   }
    
</script>
</body>
</html>