<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/aap.ico">
    <!-- Include the above in your HEAD tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/kiosk.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mview.css">
	<script src="<?php echo base_url(); ?>assets/dev/plugins/inputmask/src/jquery.maskedinput.js" type="text/javascript"></script>

</head>
<body>  
<div class="container">
    <div class="col-xl-12 col-lg-8">
        <div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                <a href="https://qrco.de/bcsfEN">HOME
                    
                </a>
				<a href="https://qrco.de/bcsfEN"><span style="color:red">CANCEL</span>
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <h2>PIDP RENEWAL FORM</h2>
                <img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" id="loader" style="display: none" class="center">
                <?php echo form_open('kiosk/add','id="regForm"');?>
                    <div class="tab" id="form1">
                     <input type="hidden" name="status" id="status" value="RENEW" hidden>
					 <br>					
                    
                    <div class="pradio">
						<div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="no" name="rradio" id="rradio" value="no">
                            <label class="custom-control-label" for="no" style="font-size:16px;">Personal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="yes" name="rradio" id="rradio" value="yes">
                            <label class="custom-control-label" for="yes" style="font-size:16px;">Authorized Representative</label>
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
                    <h5><b>I would like to renew</b></h5>
                    <br/>    
                    <fieldset>
                      <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="field-wrapper hasValue1">
                                        <select id="plantype" name="plantype" style="width: 100%;" >
                                            <option value="">Please select plan type.</option>
                                            <option value="3">1 - YEAR PIDP MEMBERSHIP (<span>&#8369;</span> 4,144)</option>
											<option value="14">2 - YEAR PIDP MEMBERSHIP (<span>&#8369;</span> 8,064)</option>
                                            <option value="6">3 - YEAR PIDP MEMBERSHIP (<span>&#8369;</span> 9,184)</option>
                                        </select>
                                        <div class="field-placeholder">
                                            <span>Plan Type</span>
                                        </div>
                                </div>
                               
                            </div>                          
                            
                            <div class="col-lg-6">
                                        
                            </div>
                                
                        </div>
                      </div>
                    </fieldset>    
                    
					<br>
                        <fieldset>
							<h5>Step 1 of 2 (Personal Information)</h5> 
							<br>
                            <div class="container-fluid">
                                <?php $r =  unserialize($records['result_info'][0]['pidp_restriction']); ?>
							
                                <div class="row">
                                    <input type="text" name="recordno" id="recordno" value="<?= $records['result_record']['vehicleinfohead_order'] ?>" hidden>
                                    <input type="text" name="record_id" id="record_id" value="<?= $records['result_record']['vehicleinfohead_id']?>" hidden>
									<div class="col-lg-6">
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="lic" id="lic" value="<?= $records['result_info'][0]['members_licenseno'] ?>" onchange="document.getElementById('lic1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>License No.</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="licexp" id="licexp" value="<?= $records['result_info'][0]['members_licenseexpirationdate'] ?>" placeholder="Expiration Date" onchange="document.getElementById('licexp1').innerHTML = this.value" onkeyup="
                                                var v = this.value;
                                                if (v.match(/^\d{2}$/) !== null) {
                                                    this.value = v + '/';
                                                } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                                                    this.value = v + '/';
                                                }"
                                            maxlength="10" />
                                            <div class="field-placeholder"><span>License Expiration Date</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue1">
                                            <select name="card" id="card"  style="width:100%" onchange="document.getElementById('card1').innerHTML = this.value">
                                               <?php foreach($card as $c){ ?>   
                                                    <option value="<?php echo $c;?>" <?php if( $records['result_info'][0]['pidp_cardtype'] == $c){ echo set_select('card', $c, TRUE);} ?>><?php echo $c?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="field-placeholder"><span>Card Type</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue1">
                                            <select name="lictype" id="lictype"  style="width:100%" onchange="document.getElementById('lictype1').innerHTML = this.value">
                                                <?php foreach($lictype as $l){ ?>   
                                                    <option value="<?php echo $l;?>" <?php if($records['result_info'][0]['pidp_licensetype'] == $l){ echo set_select('lictype', $l, TRUE);}?>><?php echo $l;?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="field-placeholder"><span>License Type</span></div>
                                        </div>
                                        
                                        <div>
                                            <table class="restrictions">
                                                    <tr>
                                                        <td colspan="8">Restrictions</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="r1" name="restriction[1]" value="1" <?= (isset($r[1])=='1')?"checked='checked'":""?> onchange="document.getElementById('r11').innerHTML = this.value">
                                                            <label for="r1">1</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r2" name="restriction[2]" value="2" <?= (isset($r[2])=='2')?"checked='checked'":""?> onchange="document.getElementById('r21').innerHTML = this.value">
                                                            <label for="r2">2</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r3" name="restriction[3]" value="3" <?= (isset($r[3])=='3')?"checked='checked'":""?> onchange="document.getElementById('r31').innerHTML = this.value">
                                                            <label for="r3">3</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r4" name="restriction[4]" value="4" <?= (isset($r[4])=='4')?"checked='checked'":""?> onchange="document.getElementById('r41').innerHTML = this.value">
                                                            <label for="r4">4</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r5" name="restriction[5]" value="5" <?= (isset($r[5])=='5')?"checked='checked'":""?> onchange="document.getElementById('r51').innerHTML = this.value">
                                                            <label for="r5">5</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r6" name="restriction[6]" value="6" <?= (isset($r[6])=='6')?"checked='checked'":""?> onchange="document.getElementById('r61').innerHTML = this.value">
                                                            <label for="r6">6</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r7" name="restriction[7]" value="7" <?= (isset($r[7])=='7')?"checked='checked'":""?> onchange="document.getElementById('r71').innerHTML = this.value">
                                                            <label for="r7">7</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r8" name="restriction[8]" value="8" <?= (isset($r[8])=='8')?"checked='checked'":""?> onchange="document.getElementById('r81').innerHTML = this.value">
                                                            <label for="r8">8</label>
                                                        </td>
                                                    </tr>
                                                
                                            </table>
                                        </div>
                                    </div>    
                                    <div class="col-lg-6">
                                        <div>                                     
                                            <!-- Default inline 1-->
                                            <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" class="custom-control-input" id="single" name="dradio" value="SINGLE" checked>
                                              <label class="custom-control-label" for="single">Single PIDP</label>
                                            </div>

                                            <!-- Default inline 2-->
                                            <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" class="custom-control-input" id="multiple" name="dradio" value="MULTIPLE">
                                              <label class="custom-control-label" for="multiple">Multiple PIDPs (For Use in Japan and Other Countries)</label>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="d" id="d" >
                                            <div class="field-placeholder"><span>Destination 1</span></div>
                                        </div>
										<textarea rows="4" cols="50" id="dremarks" disabled ></textarea>
										<div class="acheckbox">
										<div id="jpn">
											<input type="checkbox" id="agreejpn1" name="agreejpn1" value="1" > 
											<label for="agreejpn1">I hereby declare that I have read the  and have fully understood its contents. I further declare that I voluntarily and willingly executed the <a href='#' onclick='jpn();'>WAIVER, RELEASE and QUITCLAIM</a> with full knowledge of my rights under the law.</label>			
										</div>
										<div id="others">
											<input type="checkbox" id="agreeothers" name="agreeothers" value="1" > 
											<label for="agreeothers">I hereby declare that I have read and understood the additional information. I acknowledge that I have been informed of the inherent risk of using my Philippine International Driving Permit (PIDP) with the above-mentioned provisions for this particular country and take on any and all responsibilities. By clicking ACCEPT, I WAIVE AND RELEASE to the fullest extent permitted by law the Association and/or its employees from all liability.
											</label>			
										</div>
										</div>
										<br/>
                                        <div class="field-wrapper hasValue2" id="d2div">
                                            <input type="text" name="d2" id="d2" value="JAPAN" onchange="document.getElementById('d21').innerHTML = this.value" disabled="disabled">
                                            <div class="field-placeholder"><span>Destination 2</span></div>
                                            <p><b style="color:red">NOTE:</b> Additional <span>&#8369;</span> 560.00 for multiple PIDP.</p>
                                            <p style="color:red">Renewal for Registered Residents in Japan: PIDP will only be valid for driving in Japan after spending 3 months or more outside Japan.</p>
											<input type="checkbox" id="agreejpn2" name="agreejpn2" value="1"> 
											<label for="agreejpn2">I hereby declare that I have read the  and have fully understood its contents. I further declare that I voluntarily and willingly executed the <a  href='#' onclick='jpn();' >WAIVER, RELEASE and QUITCLAIM</a> with full knowledge of my rights under the law.</label>
											
                                        </div>
										<script>
										
											document.getElementById("d").onchange =  function() {
											   var x = document.getElementById("d").value;
											   var y = document.getElementById("dremarks").value;
											   if(x === "JAPAN"){
													$("div#jpn").show();
													$("div#others").hide();
													
												}else{
													if(y === ""){
														$("div#others").hide();
													}else{
														$("div#others").show();
													}
													$("div#jpn").hide();
												}
												document.getElementById('d1').innerHTML = x;
											}
											
											$(document).ready(function() {
												$("div#jpn").hide();
												$("div#others").hide();
												
											});
																				
										</script>
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

										
                                        echo '<table>';
                                        echo '<tr>';
                                        echo '<td colspan="3">';
                                                echo '<h4>LICENSE DETAILS</h4>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>';
                                        echo '<label><strong>Destination:&nbsp;</strong></label>';
                                                echo '<label><span id="d1"></span><label>';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>Local license No:&nbsp;</strong></label>';
                                                echo '<label><span id="lic1">'.$records['result_info'][0]['members_licenseno'].'</span><label>';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>Local license expiration date.:&nbsp;</strong></label>';
                                                echo '<label><span id="licexp1">'.$records['result_info'][0]['members_licenseexpirationdate'].'</span><label>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>';
                                        echo '<label><strong>License type:&nbsp;</strong></label>';
                                                echo '<label><span id="lictype1">'.$records['result_info'][0]['pidp_licensetype'].'</span><label>';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>CARD TYPE:&nbsp;</strong></label>';
                                                echo '<label><span id="card1">'.$records['result_info'][0]['pidp_cardtype'].'</span><label>';
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<label><strong>Restrictions.:&nbsp;</strong></label>';
												 $r =  unserialize($records['result_info'][0]['pidp_restriction']);
												 
                                                echo '<label><span id="r11">'.(empty($r[1])?"":$r[1]).'</span><span id="r21">'.(empty($r[2])?"":$r[2]).'</span><span id="r31">'.(empty($r[3])?"":$r[3]).'</span><span id="r41">'.(empty($r[4])?"":$r[4]).'</span><span id="r51">'.(empty($r[5])?"":$r[5]).'</span><span id="r61">'.(empty($r[6])?"":$r[6]).'</span><span id="r71">'.(empty($r[7])?"":$r[7]).'</span><span id="r81">'.(empty($r[8])?"":$r[8]).'</span><label>';
                                        echo '</td>';
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
                <br/>
                    
                <?php echo form_close();  ?> 
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
function linkopen() {
    window.open("<?php echo site_url('kiosk/policy'); ?>", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=100, left=100, width=795, height=500px");
}

function jpn() {
    window.open("<?php echo base_url(); ?>assets/pdf_file/japan_waiver.pdf", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=100, left=100, width=795, height=500px");
}
</script>
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
    
    
    var v = jQuery("#regForm").validate({
      rules: {
        
		plantype:{
            required : true
        },
        lic:{
            required: true
        },
        licexp:{
            required: true
        },
        card:{
            required: true
        },
        lictype:{
            required: true
        },
        
        d:{
            required: true
        },
		uradio:{
				required : true
        },
		rradio:{
				required : true
        }
        
         
      },
     errorElement: "span",
     messages: {
		plantype:{
            required : "Please select Plan Type"
        },
        lic:{
            required: "License No. is required."
        },
        licexp:{
            required: "License expiration date is required."
        },
        card:{
            required: "License card type is required."
        },
        lictype:{
            required: "License type is required."
        },
        d:{
            required: "Please provide destination."
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
      if (n === 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n === (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      //fixStepIndicator(n);
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      
      var x = document.getElementsByClassName("tab");
    
      // Exit the function if any field in the current tab is invalid:
      // console.log(x);
      if (n === 1 && !v.form())return false;
      
     var r1 = document.getElementById('r1');
     var r2 = document.getElementById('r2');
     var r3 = document.getElementById('r3');
     var r4 = document.getElementById('r4');
     var r5 = document.getElementById('r5');
     var r6 = document.getElementById('r6');
     var r7 = document.getElementById('r7');
     var r8 = document.getElementById('r8');
     // if(r[1].checked === false && r[2].checked === false && r[3].checked === false && r[4].checked === false && r[5].checked === false && r[6].checked === false&& r[7].checked === false && r[8].checked === false){
       if(r1.checked === false && r2.checked === false && r3.checked === false && r4.checked === false && r5.checked === false && r6.checked === false&& r7.checked === false && r8.checked === false){
          
        alert('Please check restrictions');
            return false;
       }
       
     
      
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
                
                $("#loader").show();
                return false;
            }else{
                alert("Please check the box to acknowledge AAP's Data Privacy Policy."); 
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


   
    $(document).ready(function() {
            $("div#d2div").hide();
            $('input:radio[name="dradio"]').change(
                function(){
                    if ($(this).val() === 'MULTIPLE') {
                        $("div#d2div").show();
                    }
                    else {
                        $("div#d2div").hide();
                    }
             });
			
			$( "#d" ).autocomplete({
		            minLength: 1,
                    source: "<?php echo base_url();?>kiosk/getDestination",
		            focus: function( event, ui ) {
		                   return false;
		             },
		            select: function( event, ui ) {
		            	$( "#d" ).val( ui.item.destination );
                        $( "#dremarks" ).val( ui.item.remarks );
						$("input").trigger("select");
		                return false;
		             }
		             
		          }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		            return $( "<li>" )
		            .append(item.destination)
		            .appendTo( ul );
		          }; 
 
            $('#licexp').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '2018:2080',
                    dateFormat : 'yy-mm-dd'
                   
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
			$("#lic").mask("a99-99-999999");
    });
   
</script>
</body>
</html>