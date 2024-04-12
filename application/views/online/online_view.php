<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $title ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
<script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
	integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
	crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/kiosk.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mview.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/online.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/breadcrumbs.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/payment.css">
<style>
    h6 {
        margin-left:25px
    }
   
</style>
</head>
<body>
<div class="container mt-3">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">NEW MEMBERSHIP</h6>
                <a href="<?php echo site_url('online/back') ?>">SIGN IN 
                    <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?php if (isset($error)) {
                    print $error;
                } ?>
                <h3 style="text-align: center;">MEMBERSHIP APPLICATION FORM</h3>
                
                <?php echo form_open_multipart('online/online_application', 'id="regForm"', 'enctype="multipart/form-data"'); ?>
                <img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" id="loader" style="display: none" class="center">
                <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
                <input type="hidden" name="unsigned_field_names" value="">
                <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
                <input type="hidden" id="paymentmethod" name="paymentmethod" value="CREDIT CARD">
                 
                <div class="tab" id="form1">
                    <h5><b>I would like to apply for?</b></h5>
                    <br/>
                    <fieldset>
                      <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                
                                <div class="field-wrapper hasValue1">
                                    <select id="branch" name="branch" style="width: 100%;">
                                        <option value="">Please select branch</option>
                                        <option value="MAIN">Main - Quezon City</option>
                                        <option value="MAKATI">Makati</option>
                                        <option value="ALABANG">Alabang</option>
                                        <option value="PAMPANGA">Pampanga</option>
                                        <option value="LIPA">Lipa Batangas</option>
                                        <option value="DAVAO">Davao</option>
                                        <option value="CEBU">Cebu</option>
                                    </select>
                                    <div class="field-placeholder">
                                        <span>Preferred Branch</span>
                                    </div>
                                </div>    
                                   
                                <div class="field-wrapper hasValue1">
                                        <select id="plantype" name="plantype" style="width: 100%;" >
                                            <option value="">Please select type of membership</option>
                                        </select>
                                        <div class="field-placeholder">
                                            <span> Type of Membership</span>
                                        </div>
                                    </div>
                               
                            </div>                          
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><span style="font-weight: bold;">Upload Image: </span><span>2x2 or passport size id picture<span></label>
                                    <div class="pradio">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="idpicture" name="idpicture"> 
                                                <label class="custom-file-label" for="idpicture">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <img id='img-upload' />
                                </div>               
                            </div>
                                
                        </div>
                      </div>
                    </fieldset>    
                                                                    <br>
                                                                    <h5>Step 1 of 5 (Personal Information)</h5>
                                                                    <br />
                                                                    <fieldset>
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="field-wrapper hasValue1">
                                                                                        <select id="salutation" name="salutation"
                                                                                                style="width: 100%;" >
                                                                                            <option value="">Please select Title</option>
                                                                                            <option value="MR.">MR</option>
                                                                                            <option value="MS.">MS</option>
                                                                                            <option value="MRS.">MRS</option>
                                                                                            <option value="ATTY.">ATTY</option>
                                                                                            <option value="DR.">DR</option>
                                                                                            <option value="ENGR.">ENGR</option>
                                                                                        </select>
                                                                                        <div class="field-placeholder">
                                                                                            <span>Title</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field-wrapper">
                                                                                        <input type="text" name="fname" id="fname"
                                                                                               onchange="document.getElementById('fname1').innerHTML = this.value">
                                                                                        <div class="field-placeholder">
                                                                                            <span>First Name</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field-wrapper">
                                                                                        <input type="text" name="mname" id="mname"
                                                                                               onchange="document.getElementById('mname1').innerHTML = this.value">
                                                                                        <div class="field-placeholder">
                                                                                            <span>Middle Name</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field-wrapper">
                                                                                        <input type="text" name="lname" id="lname"
                                                                                               onchange="document.getElementById('lname1').innerHTML = this.value">
                                                                                        <div class="field-placeholder">
                                                                                            <span>Last Name</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field-wrapper hasValue1">
                                                                                        <select id="citizenship" name="citizenship">
                                                                                            <option value="">Please select Citizenship</option>
                                                                                            <option value="FILIPINO">FILIPINO</option>
                                                                                            <option value="FOREIGNER">FOREIGNER</option>
                                                                                        </select>
                                                                                        <div class="field-placeholder">
                                                                                            <span>Citizenship</span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <script>
                                                                                        $(document).ready(function () {

                                                                                            $("#foreign").hide();
                                                                                        });

                                                                                        document.getElementById("citizenship").onchange = function () {
                                                                                            var value = document.getElementById("citizenship").value;
                                                                                            if (value === 'FOREIGNER') {
                                                                                                $("#foreign").show();
                                                                                            } else {
                                                                                                $("#foreign").hide();
                                                                                            }
                                                                                            document.getElementById('citizenship1').innerHTML = this.value
                                                                                        };

                                                                                        document.getElementById("salutation").onchange = function () {
                                                                                            var valueS = document.getElementById("salutation").value;
                                                                                            if (valueS === 'MR.') {
                                                                                                $("#sex").val("MALE").change();
                                                                                            } else if (valueS === 'MS.' || valueS === 'MRS.') {
                                                                                                $("#sex").val("FEMALE").change();
                                                                                            } else {
                                                                                                $("#sex").val("").change();
                                                                                            }
                                                                                            document.getElementById('salutation1').innerHTML = this.value
                                                                                        };
                                                                                    </script>
                                                                                    <div id="foreign">
                                                                                        <div class="field-wrapper">
                                                                                            <input type="text" name="nationality" id="nationality"
                                                                                                   onchange="document.getElementById('lname1').innerHTML = this.value">
                                                                                            <div class="field-placeholder">
                                                                                                <span>Nationality</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="field-wrapper">
                                                                                            <input type="text" name="acr" id="acr"
                                                                                                   onchange="document.getElementById('lname1').innerHTML = this.value">
                                                                                            <div class="field-placeholder">
                                                                                                <span>ACR No.</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="field-wrapper hasValue1">
                                                                                        <select id="sex" name="sex"
                                                                                                onchange="document.getElementById('s1').innerHTML = this.value">
                                                                                            <option value="">Please select Gender</option>
                                                                                            <option value="MALE">MALE</option>
                                                                                            <option value="FEMALE">FEMALE</option>
                                                                                        </select>
                                                                                        <div class="field-placeholder">
                                                                                            <span>Sex</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field-wrapper hasValue1">
                                                                                        <input type="text" class="lower" name="bday" id="bday"
                                                                                               placeholder="yyyy-mm-dd"
                                                                                               onchange="document.getElementById('bday1').innerHTML = this.value"
                                                                                               onkeyup="
                                                                                                        var v = this.value;
                                                                                                        if (v.match(/^\d{4}$/) !== null) {
                                                                                                            this.value = v + '-';
                                                                                                        } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                                                                                            this.value = v + '-';
                                                                                                        }"
                                                                                               maxlength="10">
                                                                                        <div class="field-placeholder">
                                                                                            <span>Birthdate</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field-wrapper">
                                                                                        <input type="text" name="bplace" id="bplace"
                                                                                               onchange="document.getElementById('bplace1').innerHTML = this.value">
                                                                                        <div class="field-placeholder">
                                                                                            <span>Birth Place</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field-wrapper">
                                                                                        <input type="text" name="occupation" id="occupation"
                                                                                               onchange="document.getElementById('occupation1').innerHTML = this.value">
                                                                                        <div class="field-placeholder">
                                                                                            <span>Occupation</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field-wrapper hasValue1">
                                                                                        <select id="cstatus" name="cstatus"
                                                                                                onchange="document.getElementById('cstatus1').innerHTML = this.value">
                                                                                            <option value="">Please select Status</option>
                                                                                            <option value="SINGLE">SINGLE</option>
                                                                                            <option value="MARRIED">MARRIED</option>
                                                                                            <option value="WIDOWED">WIDOWED</option>
                                                                                            <option value="SINGLE PARENT">SINGLE PARENT</option>
                                                                                            <option value="SEPARATED">SEPARATED</option>
                                                                                        </select>
                                                                                        <div class="field-placeholder">
                                                                                            <span>Civil Status </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </fieldset>


                                                                    </div>
					<div class="tab" id="form2">
						<nav>
							<ol class="cd-multi-steps text-bottom count">
								<li class="visited"><em>Personal Information</em></li>
								<li class="current"><em>Contact Information</em></li>
								<li><em>License Details</em></li>
								<li><em>Vehicle Details</em></li>
								<li><em>Information Summary</em></li>
                                                                <li><em>Payment Method</em></li>
							</ol>
						</nav>
						<h5>Step 2 of 5 (Contact Information)</h5>
						<fieldset>
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-6">
										<h5>Home Address</h5>
										<div class="field-wrapper hasValue2">
											<input type="text" name="h1" id="h1"
												onchange="document.getElementById('h11').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Building No./Street</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" name="h2" id="h2"
												onchange="document.getElementById('h21').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Barangay/Town</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" name="city" id="city" value=""
												onchange="document.getElementById('city1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>City/ Municipality</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" name="province" id="province" value="">
											<div class="field-placeholder">
												<span>Province</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" name="zip" id="zip" value="">
											<div class="field-placeholder">
												<span>Zip Code</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" name="mobile" id="mobile"
												onchange="document.getElementById('mobile1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Mobile No.</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" class="lower" name="email"
												placeholder="example@gmail.com" id="email"
												onchange="document.getElementById('email1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Email Address</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" name="tel" id="tel"
												onchange="document.getElementById('tel1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Telephone No.</span>
											</div>
										</div>

									</div>
									<div class="col-lg-6">
										<h5>Office Address (Optional)</h5>
										<div class="field-wrapper hasValue2">
											<input type="text" id="company" name="company"
												onchange="document.getElementById('company1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Company Name</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" id="oh1" name="oh1"
												onchange="document.getElementById('oh11').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Building No./Street</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" id="oh2" name="oh2"
												onchange="document.getElementById('oh21').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Barangay/Town</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" id="ocity" name="ocity"
												onchange="document.getElementById('ocity1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>City/ Municipality</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" id="oprovince" name="oprovince"
												onchange="document.getElementById('oprovince1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Province</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" id="ozip" name="ozip"
												onchange="document.getElementById('ozip1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Zip Code</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" id="amobile" name="amobile"
												onchange="document.getElementById('amobile1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Alternate Mobile No</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" class="lower" id="aemail" name="aemail"
												placeholder="example@domain.com"
												onchange="document.getElementById('aemail1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Alternate Email Address</span>
											</div>
										</div>
										<div class="field-wrapper hasValue2">
											<input type="text" id="otel" name="otel"
												onchange="document.getElementById('otel1').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Alternate Telephone No.</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</fieldset>

					</div>
					<div class="tab" id="form3">
						<nav>
							<ol class="cd-multi-steps text-bottom count">
								<li class="visited"><em>Personal Information</em></li>
								<li class="visited"><em>Contact Information</em></li>
								<li class="current"><em>License Details</em></li>
								<li><em>Vehicle Details</em></li>
								<li><em>Information Summary</em></li>
                                                                <li><em>Payment Method</em></li>
							</ol>
						</nav>
						<h5>Are you applying for PIDP?</h5>
						<div class="ispidpradio">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" name="ispidp1"
									id="pidpval" value="pidp" checked> <label class="custom-control-label"
									for="pidpval" style="font-size: 16px;">YES</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" name="ispidp1"
									id="membershipval" value="membership" checked> <label
									class="custom-control-label" for="membershipval"
									style="font-size: 16px;">NO</label>
							</div>
						</div>
                                                <br>
                                                <input type="hidden" name="ispidp" id="ispidp" value="">
						<div id="pidp">
							<h5>Step 3 of 5 (License Details)</h5>
							<fieldset>
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-6">
											<h5>License Details</h5>
											<div class="field-wrapper">
												<input type="text" name="lic" id="lic"
													onchange="document.getElementById('lic1').innerHTML = this.value">
												<div class="field-placeholder">
													<span>License No: (###-##-######)</span>
												</div>
											</div>
											<div class="field-wrapper hasValue">
												<input type="text" class="lower" name="licexp" id="licexp"
													placeholder="yyyy-mm-dd"
													onchange="document.getElementById('licexp1').innerHTML = this.value"
													onkeyup="
                                                var v = this.value;
                                                if (v.match(/^\d{4}$/) !== null) {
                                                    this.value = v + '-';
                                                } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                                    this.value = v + '-';
                                                }"
													maxlength="10">
												<div class="field-placeholder">
													<span>License Expiration Date</span>
												</div>
											</div>
											<div class="field-wrapper hasValue1">
												<select name="card" style="width: 100%"
													onchange="document.getElementById('card1').innerHTML = this.value">
													<option value="">Please select Card Type</option>
													<option value="NON-CARD">NON CARD</option>
													<option value="CARD">CARD</option>
												</select>
												<div class="field-placeholder">
													<span>Card Type</span>
												</div>
											</div>
											<div class="field-wrapper hasValue1">
												<select name="lictype" style="width: 100%"
													onchange="document.getElementById('lictype1').innerHTML = this.value">
													<option value="">Please select License Type</option>
													<option value="NON-PROFESSIONAL">NON PROFESSIONAL</option>
													<option value="PROFESSIONAL">PROFESSIONAL</option>
												</select>
												<div class="field-placeholder">
													<span>License Type</span>
												</div>
											</div>
											<div>
												<table class="restrictions">
													<tr>
														<td colspan="8">Restrictions</td>
													</tr>
													<tr>
														<td><input type="checkbox" id="1" name="restriction[]"
															value="1"
															onchange="document.getElementById('r1').innerHTML = this.value">
															<label for="1">1</label></td>
														<td><input type="checkbox" id="2" name="restriction[]"
															value="2"
															onchange="document.getElementById('r2').innerHTML = this.value">
															<label for="2">2</label></td>
														<td><input type="checkbox" id="3" name="restriction[]"
															value="3"
															onchange="document.getElementById('r3').innerHTML = this.value">
															<label for="3">3</label></td>
														<td><input type="checkbox" id="4" name="restriction[]"
															value="4"
															onchange="document.getElementById('r4').innerHTML = this.value">
															<label for="4">4</label></td>
														<td><input type="checkbox" id="5" name="restriction[]"
															value="5"
															onchange="document.getElementById('r5').innerHTML = this.value">
															<label for="5">5</label></td>
														<td><input type="checkbox" id="6" name="restriction[]"
															value="6"
															onchange="document.getElementById('r6').innerHTML = this.value">
															<label for="6">6</label></td>
														<td><input type="checkbox" id="7" name="restriction[]"
															value="7"
															onchange="document.getElementById('r7').innerHTML = this.value">
															<label for="7">7</label></td>
														<td><input type="checkbox" id="8" name="restriction[]"
															value="8"
															onchange="document.getElementById('r8').innerHTML = this.value">
															<label for="8">8</label></td>
													</tr>

												</table>
											</div>

											<div class="form-group">
												<label><span style="font-weight: bold;">Upload Image: </span><span>Copy
														of Philippine Driver's License</span></label>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="imglic"
															name="imglic" value=""> <label class="custom-file-label"
															for="imglic">Choose file</label>
													</div>
												</div>
												<img id='img-lic' />
											</div>
			<script>
			$(document).ready( function() {
					$(".custom-file-input").on("change", function() {
					  var fileName = $(this).val().split("\\").pop();
					  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
					});
					function readURL(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							
							reader.onload = function (e) {
								$('#img-lic').attr('src', e.target.result);
							}
							
							reader.readAsDataURL(input.files[0]);
						}
					}

					$("#imglic").change(function(){
						readURL(this);
					}); 	
			});	
			</script>

										</div>
										<div class="col-lg-6">
											<div>
												<div
													class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input"
														id="single" name="dradio" value="single" checked> <label
														class="custom-control-label" for="single">Single PIDP</label>
												</div>

												<div
													class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input"
														id="multiple" name="dradio" value="multiple"> <label
														class="custom-control-label" for="multiple">Multiple PIDPs
														(For Use in Japan and Other Countries)</label>
												</div>
											</div>
											<br />
											<div class="field-wrapper hasValue2">
												<input type="text" name="d" id="d"
													onchange="document.getElementById('d1').innerHTML = this.value">
												<div class="field-placeholder">
													<span>Destination</span>
												</div>
											</div>
											<div class="field-wrapper hasValue2" id="d2div">
												<input type="text" name="d2" id="d2" value="JAPAN"
													onchange="document.getElementById('d21').innerHTML = this.value"
													disabled="disabled">
												<div class="field-placeholder">
													<span>Destination #2</span>
												</div>
                                                                                                <p><b style="color:red">NOTE:</b> Additional <span>&#8369;</span> 560.00 for multiple PIDP.</p>
                                                                                                <p style="color:red">Renewal for Registered Residents in Japan: PIDP will only be valid for driving in Japan after spending 3 months or more outside Japan.</p>
											</div>
											<textarea rows="4" cols="50" id="dremarks" disabled></textarea>
											

										</div>
									</div>
								</div>
							</fieldset>
						</div>

					</div>
					<div class="tab" id="form4">
						<nav>
							<ol class="cd-multi-steps text-bottom count">
								<li class="visited"><em>Personal Information</em></li>
								<li class="visited"><em>Contact Information</em></li>
								<li class="visited"><em>License Details</em></li>
								<li class="current"><em>Vehicle Details</em></li>
								<li><em>Information Summary</em></li>
                                                                <li><em>Payment Method</em></li>
							</ol>
						</nav>
						<h5>Step 4 of 5 (Vehicle Details)</h5>
						<fieldset>
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-6">
										<h5>Vehicle 1</h5>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="cs1"
												name="cs1"
												onchange="document.getElementById('cs11').innerHTML = this.value"
												value="1"> <label class="form-check-label" for="cs1">Conduction
												Sticker</label>
										</div>
										<br />
										<div class="field-wrapper">
											<input type="text" id="plate1" name="plate1"
												onchange="document.getElementById('plate11').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Plate No</span>
											</div>
										</div>
										<div class="field-wrapper">
												<input type="text" id="make1" name="make1"
													onchange="document.getElementById('make11').innerHTML = this.value">
												<div class="field-placeholder">
													<span>Make</span>
												</div>
											</div>
										<div class="field-wrapper">
											<input type="text" id="model1" name="model1"
												onchange="document.getElementById('model11').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Model</span>
											</div>
										</div>
										<div class="field-wrapper">
											<input type="text" id="color1" name="color1"
												onchange="document.getElementById('color11').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Color</span>
											</div>
										</div>
										<div class="field-wrapper">
											<input type="text" id="year1" name="year1"
												onchange="document.getElementById('year11').innerHTML = this.value">
											<div class="field-placeholder">
												<span>Year Model</span>
											</div>
										</div>
										<div class="field-wrapper hasValue1">
											<select  id="fuel1" name="fuel1" style="width: 100%"
												onchange="document.getElementById('fuel11').innerHTML = this.value">
												<option value="">Please select Fuel Type</option>
												<option value="GAS">GAS</option>
												<option value="DIESEL">DIESEL</option>
												<option value="ELECTRIC">ELECTRIC</option>
											</select>
											<div class="field-placeholder">
												<span>Fuel Type</span>
											</div>
										</div>
										<div class="field-wrapper hasValue1">
											<select id="trans1" name="trans1" style="width: 100%"
												onchange="document.getElementById('trans11').innerHTML = this.value">
												<option value="">Please select Transmission Type</option>
												<option value="Automatic">Automatic</option>
												<option value="Manual">Manual</option>
											</select>
											<div class="field-placeholder">
												<span>Transmission Type</span>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<label><span style="font-weight: bold;">Upload: </span><span>
														Official Receipt<span></label>
												<div class="pradio">
													<div class="input-group">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="or1"
																name="or1"> <label class="custom-file-label" for="or1">Choose
																file</label>
														</div>
													</div>
												</div>
												<img id='img-upload-or' />
											</div>
											<div class="col-lg-6">
												<label><span style="font-weight: bold;">Upload: </span><span>Certificate
														of Registration<span></label>
												<div class="pradio">
													<div class="input-group">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="cr1"
																name="cr1"> <label class="custom-file-label" for="cr1">Choose
																file</label>
														</div>
													</div>
												</div>
												<img id='img-upload-cr' />
											</div>
										</div>


									</div>
									<div class="col-lg-6">
										<div id="vehicle2">
											<h5>Vehicle 2</h5>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="cs2" name="cs2"
													onchange="document.getElementById('cs21').innerHTML = this.value"
													value="1"> <label class="form-check-label" for="cs2">Conduction
													Sticker</label>
											</div>
											<br />
											<div class="field-wrapper">
												<input type="text" id="plate2" name="plate2"
													onchange="document.getElementById('plate21').innerHTML = this.value">
												<div class="field-placeholder">
													<span>Plate No.</span>
												</div>
											</div>
											<div class="field-wrapper">
												<input type="text" id="make2" name="make2"
													onchange="document.getElementById('make21').innerHTML = this.value">
												<div class="field-placeholder">
													<span>Make</span>
												</div>
											</div>
											<div class="field-wrapper">
												<input type="text" id="model2" name="model2"
													onchange="document.getElementById('model21').innerHTML = this.value">
												<div class="field-placeholder">
													<span>Model</span>
												</div>
											</div>
											<div class="field-wrapper">
												<input type="text" id="color2" name="color2"
													onchange="document.getElementById('color21').innerHTML = this.value">
												<div class="field-placeholder">
													<span>Color</span>
												</div>
											</div>
											<div class="field-wrapper">
												<input type="text" id="year2" name="year2"
													onchange="document.getElementById('year21').innerHTML = this.value">
												<div class="field-placeholder">
													<span>Year Model</span>
												</div>
											</div>
											<div class="field-wrapper hasValue1">
												<select id="fuel2" name="fuel2" style="width: 100%"
													onchange="document.getElementById('fuel21').innerHTML = this.value">
													<option value="">Please select Fuel Type</option>
													<option value="GAS">GAS</option>
                                                                                                        <option value="DIESEL">DIESEL</option>
                                                                                                        <option value="ELECTRIC">ELECTRIC</option>

												</select>
												<div class="field-placeholder">
													<span>Fuel Type</span>
												</div>
											</div>
											<div class="field-wrapper hasValue1">
												<select id="trans2" name="trans2" style="width: 100%"
													onchange="document.getElementById('trans21').innerHTML = this.value">
													<option value="">Please select Transmission Type</option>
													<option value="Automatic">Automatic</option>
													<option value="Manual">Manual</option>
												</select>
												<div class="field-placeholder">
													<span>Transmission Type</span>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<label><span style="font-weight: bold;">Upload: </span><span>
															Official Receipt<span></label>
													<div class="pradio">
														<div class="input-group">
															<div class="custom-file">
																<input type="file" class="custom-file-input" id="or2"
																	name="or2"> <label class="custom-file-label" for="or2">Choose
																	file</label>
															</div>
														</div>
													</div>
													<img id='img-upload-or2' />
												</div>
												<div class="col-lg-6">
													<label><span style="font-weight: bold;">Upload: </span><span>Certificate
															of Registration<span></label>
													<div class="pradio">
														<div class="input-group">
															<div class="custom-file">
																<input type="file" class="custom-file-input" id="cr2"
																	name="cr2"> <label class="custom-file-label" for="cr2">Choose
																	file</label>
															</div>
														</div>
													</div>
													<img id='img-upload-cr2' />
												</div>
											</div>

										</div>
									</div>
								</div>
								<br />



							</div>
						</fieldset>
					</div>
					<div class="tab" id="form5">
						<nav>
							<ol class="cd-multi-steps text-bottom count">
								<li class="visited"><em>Personal Information</em></li>
								<li class="visited"><em>Contact Information</em></li>
								<li class="visited"><em>License Details</em></li>
								<li class="visited"><em>Vehicle Details</em></li>
								<li class="current"><em>Information Summary</em></li>
                                                                <li><em>Payment Method</em></li>
							</ol>
						</nav>
                            <h5>Step 5 of 5 (Check your information)</h5>
                            <fieldset>
				<div class="container-fluid">
                                    <?php
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
                                    echo '<label><span id="salutation1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>First Name:&nbsp;</strong></label>';
                                    echo '<label><span id="fname1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Middle Name:&nbsp;</strong></label>';
                                    echo '<label><span id="mname1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Last Name:&nbsp;</strong></label>';
                                    echo '<label><span id="lname1"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td >';
                                    echo '<label><strong>Birthdate:&nbsp;</strong></label>';
                                    echo '<label><span id="bday1"></span><label>';
                                    echo '</td>';
                                    echo '<td colspan="2">';
                                    echo '<label><strong>Birth Place:&nbsp;</strong></label>';
                                    echo '<label><span id="bplace1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Gender:&nbsp;</strong></label>';
                                    echo '<label><span id="s1"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>';
                                    echo '<label><strong>Citizenship:&nbsp;</strong></label>';
                                    echo '<label><span id="citizenship1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Civil Status:&nbsp;</strong></label>';
                                    echo '<label><span id="cstatus1"></span><label>';
                                    echo '</td>';
                                    echo '<td colspan="2">';
                                    echo '<label><strong>Occupation:&nbsp;</strong></label>';
                                    echo '<label><span id="occupation1"></span><label>';
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
                                    echo '<label><span id="h11">, &nbsp</span> <span id="h21">, &nbsp</span><span id="city1">, &nbsp</span><span id="province1">, &nbsp</span><span id="zip1"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td colspan="4">';
                                    echo '<label><strong>Company Name:&nbsp;</strong></label>';
                                    echo '<label><span id="company1"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td colspan="4">';
                                    echo '<label><strong>Company Address:&nbsp;</strong></label>';
                                    echo '<label><span id="oh11">, &nbsp</span> <span id="oh21">, &nbsp</span><span id="ocity1">, &nbsp</span><span id="oprovince1">, &nbsp</span><span id="ozip1"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>';
                                    echo '<label><strong>Home Phone:&nbsp;</strong></label>';
                                    echo '<label><span id="tel1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Company Phone:&nbsp;</strong></label>';
                                    echo '<label><span id="otel1"></span><label>';
                                    echo '</td>';
                                    /*echo '<td>';
                                    echo '<label><strong>Fax No.:&nbsp;</strong></label>';
                                    echo '<label>test<label>';
                                    echo '</td>';*/
                                    echo '<td>';
                                    echo '<label><strong>Mailing Preference:&nbsp;</strong></label>';
                                    echo '<label><span id="mailing1"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>';
                                    echo '<label><strong>Mobile No.:&nbsp;</strong></label>';
                                    echo '<label><span id="mobile1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Alternate Mobile No.:&nbsp;</strong></label>';
                                    echo '<label><span id="amobile1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Email Address:&nbsp;</strong></label>';
                                    echo '<label><span id="email1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Alternate Email Address:&nbsp;</strong></label>';
                                    echo '<label><span id="aemail1"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '</table>';
                                    echo '<table>';
                                    echo '<tr>';
                                    echo '<td colspan="10">';
                                    echo '<h4>VEHICLE DETAILS</h4>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>';
                                    echo '<h4>1st</h4>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Make:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label> <span id="make11"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Model:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="model11"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Year:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label> <span id="year11"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Color:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="color11"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Fuel Type:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="fuel11"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Transmission:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="trans11"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Plate No.:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="plate11"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Conduction Sticker:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="cs11"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>';
                                    echo '<h4>2nd</h4>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Make:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="make21"> </span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Model:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="model21"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Year:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label> <span id="year21"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Color:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="color21"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Fuel Type:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="fuel21"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Transmission:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="trans21"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Plate No.:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="plate21"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Conduction Sticker:&nbsp;</strong></label>';
                                    echo '<br/>';
                                    echo '<label><span id="cs21"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
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
                                    echo '<label><strong> License No:&nbsp;</strong></label>';
                                    echo '<label><span id="lic1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>License expiration date.:&nbsp;</strong></label>';
                                    echo '<label><span id="licexp1"></span><label>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>';
                                    echo '<label><strong>License type:&nbsp;</strong></label>';
                                    echo '<label><span id="lictype1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Card Type:&nbsp;</strong></label>';
                                    echo '<label><span id="card1"></span><label>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<label><strong>Restrictions:&nbsp;</strong></label>';
                                    echo '<label><span id="r1"></span><span id="r2"></span><span id="r3"></span><span id="r4"></span><span id="r5"></span><span id="r6"></span><span id="r7"></span><span id="r8"></span><label>';
                                    echo '</td>';
                                    echo '</table>';
                                    echo '</form>';
                                    ?>
                                    
                                <div class="agree">
                                    <input type="checkbox" id="aq" name="aq" value="1" checked> 
                                    <label for="aq">Avail Online AQ Magazine</label>
                                        <input type="checkbox" id="agree" name="agree" value="agree"> 
                                        <label for="agree">I confirm that the information given in this form is true, complete and accurate.</label> 
                                        <input type="checkbox" id="agreeDP" name="agreeDP" value="agreeDP"> 
                                        <label for="agreeDP">I agree to the <a href='#' onclick='linkopen();'>Terms and Conditions</a>
										of the Privacy Policy of the Automobile Association
										Philippines, which I acknowledge that I have read and
										understood.
					</label>
				</div>
<script>
function linkopen() {
    window.open("<?php echo site_url('kiosk/policy'); ?>", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=100, left=100, width=795, height=500px");
}
</script>
							</div>
						</fieldset>
					</div>
                                        <div class="tab" id="form6">
						<nav>
							<ol class="cd-multi-steps text-bottom count">
								<li class="visited"><em>Personal Information</em></li>
								<li class="visited"><em>Contact Information</em></li>
								<li class="visited"><em>License Details</em></li>
								<li class="visited"><em>Vehicle Details</em></li>
								<li class="visited"><em>Information Summary</em></li>
                                                                <li class="current"><em>Payment Method</em></li>
							</ol>
						</nav>
                                            <div class="row">
                            
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                  <!-- Card Header - Dropdown -->
                                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Billing Summary</h6>
                                  </div>
                                  <!-- Card Body -->
                                  <div class="card-body">
                                    <div class="card card-cascade wider shadow p-3 mb-5 ">
                                        <!--Card image-->
                                        <div class="view view-cascade overlay text-center margintopbottom"> 
                                            <img class="card-img-top" src="<?php echo base_url(); ?>assets/img/payment_logos/card.png" alt="membership card"> 
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a> 
                                            <br>
                                        </div>
                                        <div class="desc">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td><b>Membership type selected:</b></td>
                                                    <td><span style="float:right" id="ptype"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Amount:</b></td>
                                                    <td><span style="float:left">&#8369; </span><span style="float:right" id="pamount"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Additional PIDP:</b></td>
                                                    <td><span style="float:left">&#8369; </span><span style="float:right" id="addl"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Discount/Promo:</b></td>
                                                    <td><span style="float:left">&#8369; </span><span style="float:right" id="promo">0.00</span></td>
                                                </tr>
                                            </table>
                                            <input type="hidden" id="tom" name="typeofmembership" value="">
                                            <input type="hidden" id="mamount" name="mamount" value="">
                                            <input type="hidden" id="paddl" name="paddl" value="">
                                            <input type="hidden" id="discount" name="discount" value="">
                                             
                                            <br>
                                            <span style="color:red" id="promostatus"> </span>
                                            <div class="row subRow">
                                                <div class="input-group mb-3 col-md">
                                    
                                                    <input type="text" id="promocode" name="promocode" class="form-control" placeholder="Promo code" aria-label="Apply Promo Code:" >
                                                    <div class="input-group-append">
                                                      <button class="btn btn-outline-success" id="applycode" type="button">APPLY</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                  </div>
                                </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                  <!-- Card Header - Dropdown -->
                                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Payment Method</h6>
                                  </div>
                                  <!-- Card Body -->
                                  <div class="card-body">
                                        <div class="col-md radio-group">     
                                            <div class="row d-flex px-3 radio mb-3" id="unionbank" > <img class="pay" src="<?php echo base_url(); ?>assets/img/payment_logos/credit_card.jpg">

                                                <p class="my-auto">Credit Card powered by CyberSource</p><br>
                                                <div id="unionbank">
                                                <p>Bank Charge: 2.8%</p>
                                                <p>Transaction Charge: <span>&#8369;</span> 5.00</p>

                                                </div>
                                            </div>
                                            <div class="row d-flex px-3 radio gray mb-3"  id="cash"> <img class="pay" src="<?php echo base_url(); ?>assets/img/payment_logos/cash.jpg">
                                                <p class="my-auto">Cash Payment</p><br>
                                                <div id="cash">
                                                    <p>Pay at your preferred AAP office.<p>
                                                </div>
                                            </div>
                                            <div class="row d-flex px-3 radio gray mb-3" id="bdo"> <img class="pay" src="<?php echo base_url(); ?>assets/img/payment_logos/bdo.jpg">
                                                <p class="my-auto" >Banco De Oro</p>
                                                <div id="bdo">
                                                    <p>Fill out the BDO Bills Payment Slip with the following:</p>
                                                    <p>a. Company name - Automobile Association Philippines</p>
                                                    <p>b. Institution code - # 0136</p>
                                                    <p>c. Subscriber's account number - Reference # generated by the website for onlineapplicationor call 705-3333 loc. 211 or 225 to get a temporary pin# for payment.</p>
                                                    <p>d. Subscriber's account name - member's full name - Upon teller's validation, the BDO Payment Slip serves as your official receipt</p>
						</div>
                                            </div>
                                            <div class="row d-flex px-3 radio gray mb-3" data-value="bpi"  id="bpi"> <img class="pay" src="<?php echo base_url(); ?>assets/img/payment_logos/bpi.jpg">
                                                <p class="my-auto" >Bank of the Philippine Islands</p>
						<div id="bpi">
                                                    <p>BPI's check free payments</p>
                                                    <p>Types of payment: online payment (Express Online); mobile payment (Express Mobile); phone payment (Express Phone); and ATM payment (Express Teller ATM)</p>
                                                    <p>How it works:</p>
                                                    <p>- Enroll your account through phone banking, BPI website or one-time visit to BPI branch of account and enroll your AAP membership number or temporary pin # as your referencenumber in BPI's Bill Payment Facility</p>
                                                    <p>- Pay your membership dues using the desired payment options mentioned above</p>
                                                    <p>Note:Applicable for renewal/old member's with alpha numeric membership number and BPI card holders only or you may call 705-3333 loc. 211 and get a temporary pin # for payment.</p>
                                                    <p>For more information on BPI payments, visit <a href="www.bpiexpressonline.com">www.bpiexpressonline.com</a> or call 89-100.</p>
                                                    <p>For online application assistance, email info@aap.org.ph or call 705-3333</p>
						</div>
                                            </div>
                                            <div class="row d-flex px-3 radio gray mb-3" data-value="cebuana" id="cebuana"> <img class="pay" src="<?php echo base_url(); ?>assets/img/payment_logos/cebuana.jpg">
                                                <p class="my-auto" >Cebuana Lhuillier</p>
						<div id="cebuana">
                                                    <p>AAP members can also pay through Cebuana Lhuillier branches by following these simple steps:</p>
                                                    <p>1. Fill out the Pera Padala Form:</p>
                                                    <p>Sender's Name: YOUR NAME</p>
                                                    <p>Receiver's Name: AUTOMOBILE ASSOCIATION OF THE PHILIPPINES INC.</p>
                                                    <p>Transaction Type: COLLECTION</p>
                                                    <p>Amount: </p>
                                                    <p>Reference No.:</p>
                                                    <p>* a. New Membership: You can get your Reference No. from the message prompt after successfully applying for AAP membership online at www.aap.org.ph</p>
                                                    <p> b. Renewal: Your AAP Member's Code (located above your name in your AAP membership card) will serve as your Reference No.</p>
                                                    <p>2. Present the Pera Padala Form and cash to the branch personnel<p>
                                                    <p>3. Get your validated Pera Padala Form to serve as your proof of payment<p>

                                                    <p>NOTE: <span>&#8369;</span> 15 will be charged for every transaction.</p>
												
						</div>
                                            </div>
                                            <div class="row d-flex px-3 radio gray mb-3" data-value="paypal" id="check"> <img class="pay" src="<?php echo base_url(); ?>assets/img/payment_logos/cheque.jpg">
                                                <p class="my-auto" >Check Payment</p>
                                                <div id="check">
                                                    <p>Check Payment payable to : "Automobile Association of the Philippines, Inc."</p>
						</div>	
                                            </div>
                                            <div class="row d-flex px-3 radio gray mb-3" data-value="paypal" id="pickup"> <img class="pay" src="<?php echo base_url(); ?>assets/img/payment_logos/collectors_pickup.jpg">
                                                <p class="my-auto" >Collector's Pick-Up</p>
						<div id="pickup">
                                                    <p>You may call 705-3333 to schedule for pick-up within Metro Manila.</p>
						</div>
								
								
                                        </div>
                                    </div>    
                                  </div>
                                </div>
                            
                        </div>
                     
                </div>
                                        </div>    

					<div style="overflow: auto;">
						<div style="float: right;">
							<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
							<button type="button" id="nextBtn" onclick="nextPrev(1)"
								name="button" class="continue">Next</button>

						</div>
					</div>
					<br>
                <?php echo form_close(); ?> 
                </div>
            <div class="card-footer">
		<div class="container my-auto">
                    <div class="copyright text-center my-auto">
			<span>Copyright &copy; 2020. Automobile Association Philippines</span>
                    </div>
		</div>
            </div>
	</div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/newValidation.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dev/plugins/inputmask/src/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/uploadImg.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/payment.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/selectPlantype.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/promo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/myScript.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autocompleteFields.js"></script>
</body>
</html>