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
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mview.css">
    <script src="<?php echo base_url(); ?>assets/dev/plugins/inputmask/src/jquery.maskedinput.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/kiosk.css">
	 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/breadcrumbs.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<style>
.BorderTopNone span {
	text-transform: uppercase;
}

#CIinfo span {
	text-transform: uppercase;
}

</style>
<body >                
               
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
            <h2>MOTORCYCLE MEMBERSHIP APPLICATION FORM</h2>
			<img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" id="loader" style="display: none" class="center">
                <?php echo form_open('kiosk/add','id="regForm"'); ?>
                <input type="hidden" name="status" id="status" value="NEW" hidden>
                    <div class="tab" id="form1">
					<nav>
                        <ol class="cd-multi-steps text-bottom count">
                            <li class="current"><em>Personal Information</em></li>
                            <li><em>Contact Information</em></li>
                            <li><em>Insured or Beneficiaries</em></li>
                            <li><em>Vehicle Details</em></li>
                            <li><em>Information Summary</em></li>
                        </ol>
                    </nav>
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
                        <h5><b>I would like to apply for?</b></h5><br>
                        <fieldset>
                      <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="field-wrapper hasValue1">
                                        <select id="plantype" name="plantype" style="width: 100%;" >
                                            <option value="">Please select type of plan type.</option>
                                            <option value="8">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 1 (<span>&#8369;</span> 600)</option>
                                            <option value="9">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 2 (<span>&#8369;</span> 900)</option>
											<option value="10">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 3 (<span>&#8369;</span> 1500)</option>
											<option value="11">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 4 (<span>&#8369;</span> 2550)</option>
                                        </select>
                                        <div class="field-placeholder">
                                            <span> Plan Type</span>
                                        </div>
                                </div>
                               
                            </div>                          
                            
                            <div class="col-lg-6">
                                        
                            </div>
                                
                        </div>
                      </div>
                    </fieldset> 
                    <br/>
                    <br>	
                        <legend>Step 1 of 5 (Personal Information)</legend>
                        <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="field-wrapper hasValue1">
                                            <select id="salutation" name="salutation" style="width:100%;" >
                                                <option value="">Please select title.</option>
                                                <option value="MR.">MR</option>
                                                <option value="MS.">MS</option>
                                                <option value="MRS.">MRS</option>
                                                <option value="MISS.">MISS</option>
                                                <option value="ATTY.">ATTY</option>
                                                <option value="DR.">DR</option>
                                                <option value="ENGR.">ENGR</option>
                                            </select>
                                            <div class="field-placeholder"><span>Title</span></div>
                                        </div>
                                        
                                        <div class="field-wrapper">
                                            <input type="text" name="fname" id="fname" onchange="document.getElementById('fname1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>First Name</span></div>
                                                                         
                                        </div>
                                        
                                        <div class="field-wrapper">
                                            <input type="text" name="mname" id="mname" onchange="document.getElementById('mname1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Middle Name</span></div>
                                        </div>
                                        <div class="field-wrapper">
                                            <input type="text" name="lname" id="lname" onchange="document.getElementById('lname1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Last Name</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue1">
                                            <select id="citizenship" name="citizenship">
                                                <option value="">Please select citizenship</option>
                                                <option value="FILIPINO">FILIPINO</option>
                                                <option value="FOREIGNER">FOREIGNER</option>
                                            </select>
                                            <div class="field-placeholder"><span>Citizenship</span></div>
                                        </div>
                                         
                                    <script>
                                         $(document).ready(function(){

                                          $("#foreign").hide();
                                        });

                                        document.getElementById("citizenship").onchange = function(){
                                           var value = document.getElementById("citizenship").value;
                                           if(value == 'FOREIGNER'){
                                                $("#foreign").show();
                                           }else{
                                               $("#foreign").hide();
                                           }
										   document.getElementById('c1').innerHTML = this.value;
                                        };

                                        document.getElementById("salutation").onchange = function(){
                                           var valueS = document.getElementById("salutation").value;
                                           if(valueS == 'MR.'){
                                               $("#sex").val("MALE").change();
                                           }else if(valueS == 'MISS.' || valueS == 'MS.' || valueS == 'MRS.'){
                                               $("#sex").val("FEMALE").change();
                                           }else{
                                               $("#sex").val("").change();
                                           }
                                           document.getElementById('salutation1').innerHTML = this.value
                                        };
                                    </script>  
                                    <div id="foreign">   
                                        <div class="field-wrapper">
                                                <input type="text" name="nationality" id="nationality" onchange="document.getElementById('nationality1').innerHTML = this.value">
                                                <div class="field-placeholder"><span>Nationality</span></div>
                                        </div>                                    
                                        <div class="field-wrapper">
                                                <input type="text" name="acr" id="acr" onchange="document.getElementById('acr1').innerHTML = this.value">
                                                <div class="field-placeholder"><span>ACR No.</span></div>
                                        </div>
                                    </div>
     
                                    </div>
                                   <div class="col-lg-6">
                                         <div  class="field-wrapper hasValue1">
                                            <select id="sex" name="sex" onchange="document.getElementById('s1').innerHTML = this.value">
                                                <option value="">Please select gender.</option>
                                                <option value="MALE">MALE</option>
                                                <option value="FEMALE">FEMALE</option>
                                            </select>
                                            <div class="field-placeholder"><span>Gender</span></div>
                                        </div>

    
                                        <div class="field-wrapper hasValue">
                                            <input type="text" name="bday" id="bday" placeholder="yyyy-mm-dd" onchange="document.getElementById('bday1').innerHTML = this.value" onkeyup="
                                                var v = this.value;
                                                if (v.match(/^\d{4}$/) !== null) {
                                                    this.value = v + '-';
                                                } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                                    this.value = v + '-';
                                                }"
                                            maxlength="10">
                                            <div class="field-placeholder"><span>Birth Date</span></div>
                                        </div>
                                        <div class="field-wrapper">
                                            <input type="text" name="bplace" id="bplace" onchange="document.getElementById('bplace1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Birth Place</span></div>
                                        </div>
                                        <div class="field-wrapper">
                                            <input type="text" name="occupation" id="occupation" onchange="document.getElementById('occupation1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Occupation</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue1">
                                            <select id="cstatus" name="cstatus" onchange="document.getElementById('cstatus1').innerHTML = this.value">
                                                <option value="">Please select civil status.</option>
                                                <option value="SINGLE">SINGLE</option>
                                                <option value="MARRIED">MARRIED</option>
                                                <option value="WIDOWED">WIDOWED</option>
                                            </select>
                                            <div class="field-placeholder"><span>Civil Status </span></div>
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
							<li><em>Insured or Beneficiaries</em></li>
                            <li><em>Vehicle Details</em></li>
                            <li><em>Information Summary</em></li>
                        </ol>
                    </nav> 
                        <legend>Step 2 of 4 (Contact Information)</legend><br>
						
                        <fieldset>
                            <div class="container-fluid">
								<div class="row">
                                    <div class="col-lg-6">
										<div class="field-wrapper hasValue1">
                                            <select id="mailing" name="mailing" style="width:100%" onchange="document.getElementById('mailing1').innerHTML = this.value">
                                                <option value="">Please select mailing preference.</option>
                                                <option value="HOME ADDRESS">HOME ADDRESS</option>
                                                <option value="OFFICE ADDRESS">OFFICE ADDRESS</option>
                                            </select>
                                            <div class="field-placeholder"><span>Mailing Preference</span></div>
                                        </div>
									</div>
									<div class="col-lg-6">
									</div>
								</div>
								<h5>Home Address</h5>								
                                <div class="row">
                                    <div class="col-lg-6">
										
                                        
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="h1" id="h1" onchange="document.getElementById('h11').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Building No./Street</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="h2" id="h2" onchange="document.getElementById('h21').innerHTML = this.value" >
                                            <div class="field-placeholder"><span>Barangay/Town</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="city" id="city" onchange="document.getElementById('city1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>City/Municipality</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="province" id="province" onchange="document.getElementById('province1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Province</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="zip" id="zip" onchange="document.getElementById('zip1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Zip Code</span></div>
                                        </div>
                                        
                                        
                                    </div>
									<div class="col-lg-6">
										<div class="field-wrapper hasValue2">
                                            <input type="text" name="mobile" id="mobile" onchange="document.getElementById('mobile1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Mobile No.</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" class="lower" name="email" placeholder="example@domain.com" id="email" onchange="document.getElementById('email1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Email Address</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="tel" id="tel" onchange="document.getElementById('tel1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Telephone No.</span></div>
                                        </div>
										<div class="field-wrapper hasValue2">
                                            <input type="text" name="amobile" id="amobile" onchange="document.getElementById('amobile1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Alternate Mobile No. (Optional)</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" class="lower" name="aemail" id="aemail" placeholder="example@domain.com" onchange="document.getElementById('aemail1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Alternate Email Address (Optional)</span></div>
                                        </div>
									</div>
								</div>	
								<br>
								<div id="office">
								<h5>Office Address</h5>
								<div class="row">
                                    <div class="col-lg-6">
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" name="oh1" id="oh1" onchange="document.getElementById('oh11').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Building No./Street</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" id="oh2" name="oh2" onchange="document.getElementById('oh21').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Barangay/Town</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" id="ocity" name="ocity"  onchange="document.getElementById('ocity1').innerHTML = this.value" >
                                            <div class="field-placeholder"><span>City/Municipality</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" id="oprovince"  name="oprovince" onchange="document.getElementById('oprovince1').innerHTML = this.value" >
                                            <div class="field-placeholder"><span>Province</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" id="ozip" name="ozip" onchange="document.getElementById('ozip1').innerHTML = this.value" >
                                            <div class="field-placeholder"><span>Zip Code</span></div>
                                        </div>
                                        
                                    </div>
									<div class="col-lg-6">
										<div class="field-wrapper hasValue2">
                                            <input type="text" id="company" name="company" onchange="document.getElementById('company1').innerHTML = this.value" >
                                            <div class="field-placeholder"><span>Company Name</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue2">
                                            <input type="text" id="otel" name="otel" onchange="document.getElementById('otel1').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Telephone No.</span></div>
                                        </div>
									</div>
                                </div>
								<script>
											document.getElementById("h2").onchange =  function() {
											   var a = document.getElementById("h2").value;
											   var x = document.getElementById("city").value;
											   var y = document.getElementById("province").value;
											   var z = document.getElementById("zip").value;
											   
												document.getElementById("city1").innerHTML = x;
												document.getElementById("province1").innerHTML = y;
												document.getElementById("zip1").innerHTML = z;
												document.getElementById('h21').innerHTML = a;
											}
											document.getElementById("city").onchange =  function() {
											   var x = document.getElementById("city").value;
											   var y = document.getElementById("province").value;
											   var z = document.getElementById("zip").value;
											   
												document.getElementById("city1").innerHTML = x;
												document.getElementById("province1").innerHTML = y;
												document.getElementById("zip1").innerHTML = z;
											}
											
											document.getElementById("province").onchange =  function() {
											   
											   var y = document.getElementById("province").value;
											   var z = document.getElementById("zip").value;
											   
												
												document.getElementById("province1").innerHTML = y;
												document.getElementById("zip1").innerHTML = z;
											}
											
											document.getElementById("oh2").onchange =  function() {
											   var a = document.getElementById("oh2").value;
											   var x = document.getElementById("ocity").value;
											   var y = document.getElementById("oprovince").value;
											   var z = document.getElementById("ozip").value;
											   
												document.getElementById("ocity1").innerHTML = x;
												document.getElementById("oprovince1").innerHTML = y;
												document.getElementById("ozip1").innerHTML = z;
												document.getElementById('oh21').innerHTML = a;
											}
											document.getElementById("ocity").onchange =  function() {
											   var x = document.getElementById("ocity").value;
											   var y = document.getElementById("oprovince").value;
											   var z = document.getElementById("ozip").value;
											   
												document.getElementById("ocity1").innerHTML = x;
												document.getElementById("oprovince1").innerHTML = y;
												document.getElementById("ozip1").innerHTML = z;
											}
											
											document.getElementById("oprovince").onchange =  function() {
											   
											   var y = document.getElementById("oprovince").value;
											   var z = document.getElementById("ozip").value;
											   
												
												document.getElementById("oprovince1").innerHTML = y;
												document.getElementById("ozip1").innerHTML = z;
											}
											
										</script>
								</div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tab" id="form3">
					<nav>
                        <ol class="cd-multi-steps text-bottom count">
                            <li class="visited" ><em>Personal Information</em></li>
                            <li class="visited"><em>Contact Information</em></li>
                            <li class="current"><em>Insured or Beneficiaries</em></li>
                            <li><em>Vehicle Details</em></li>
                            <li><em>Information Summary</em></li>
                        </ol>
                    </nav>
                        <legend>Step 3 of 5 (Others Insured or Beneficiaries)</legend>
                        <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
										<div class="field-wrapper hasValue1">
                                            <select id="insured1" name="insured1" >
                                                <option value="">Please select</option>
                                                <option value="INSURED">INSURED</option>
                                                <option value="BENEFIARIES">BENEFIARIES</option>
                                            </select>
                                            <div class="field-placeholder"><span>Insureds or Beneficiaries</span></div>
                                        </div>
										<div class="field-wrapper">
                                            <input type="text" name="beneficiary1" id="beneficiary1" >
                                            <div class="field-placeholder"><span>Full Name</span></div>
                                        </div>
										<div class="field-wrapper">
                                            <input type="text" name="relation1" id="relation1" >
                                            <div class="field-placeholder"><span>Relationship</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue">
                                            <input type="text" name="bday_insured1" id="bday_insured1" placeholder="yyyy-mm-dd" onkeyup="
                                                var v = this.value;
                                                if (v.match(/^\d{4}$/) !== null) {
                                                    this.value = v + '-';
                                                } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                                    this.value = v + '-';
                                                }"
                                            maxlength="10">
                                            <div class="field-placeholder"><span>Birth Date</span></div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="field-wrapper hasValue1">
                                            <select id="insured2" name="insured2" >
                                                <option value="">Please select</option>
                                                <option value="INSURED">INSURED</option>
                                                <option value="BENEFIARIES">BENEFIARIES</option>
                                            </select>
                                            <div class="field-placeholder"><span>Insureds or Beneficiaries</span></div>
                                        </div>
										<div class="field-wrapper">
                                            <input type="text" name="beneficiary2" id="beneficiary2" >
                                            <div class="field-placeholder"><span>Full Name</span></div>
                                        </div>
										<div class="field-wrapper">
                                            <input type="text" name="relation2" id="relation2" >
                                            <div class="field-placeholder"><span>Relationship</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue">
                                            <input type="text" name="bday_insured2" id="bday_insured2" placeholder="yyyy-mm-dd" onkeyup="
                                                var v = this.value;
                                                if (v.match(/^\d{4}$/) !== null) {
                                                    this.value = v + '-';
                                                } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                                    this.value = v + '-';
                                                }"
                                            maxlength="10">
                                            <div class="field-placeholder"><span>Birth Date</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tab" id="form4">
					<nav>
                        <ol class="cd-multi-steps text-bottom count">
                            <li class="visited"><em>Personal Information</em></li>
                            <li class="visited"><em>Contact Information</em></li>
                            <li class="visited"><em>Insured or Beneficiaries</em></li>
                            <li class="current"><em>Vehicle Details</em></li>
                            <li><em>Information Summary</em></li>
                        </ol>
                    </nav>
                        <legend>Step 4 of 5 (Vehicle Details)</legend>
						<h5>Vehicle 1</h5>
                        <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
										<div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="cs1" name="cs1" onchange="document.getElementById('cs11').innerHTML = this.value" value="YES">
                                            <label class="form-check-label" for="cs1">Conduction Sticker</label>
                                        </div>
                                        <br/>
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
										
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                            <input type="text" id="color1" name="color1" onchange="document.getElementById('color11').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Color</span></div>
                                        </div>
                                        <div class="field-wrapper">
                                            <input type="text" id="year1" name="year1" onchange="document.getElementById('year11').innerHTML = this.value">
                                            <div class="field-placeholder"><span>Year Model</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue1">
                                            <select name="fuel1" style="width:100%" onchange="document.getElementById('fuel11').innerHTML = this.value">
                                                <option value="">Please select fuel type.</option>
                                                <option value="GAS">GAS</option>
                                                <option value="DIESEL">DIESEL</option>
												<option value="ELECTRIC">ELECTRIC</option>
                                            </select>
                                            <div class="field-placeholder"><span>Fuel Type</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue1">
                                            <select name="trans1" style="width:100%" onchange="document.getElementById('trans1').innerHTML = this.value">
                                                <option value="">Please select transmission type.</option>
                                                <option value="AUTOMATIC">AUTOMATIC</option>
                                                <option value="MANUAL">MANUAL</option>
                                            </select>
                                            <div class="field-placeholder"><span>Transmission Type</span></div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tab" id="form5">
					<nav>
                        <ol class="cd-multi-steps text-bottom count">
                            <li class="visited"><em>Personal Information</em></li>
                            <li class="visited"><em>Contact Information</em></li>
                            <li class="visited"><em>Insureds or Beneficiaries</em></li>
                            <li class="visited"><em>Vehicle Details</em></li>
                            <li class="current"><em>Information Summary</em></li>
                        </ol>
                    </nav>
                        <legend>Step 5 of 5 (Check your information)</legend>
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
                                        echo '<label><strong>Birth Date:&nbsp;</strong></label>';
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
                                                echo '<label><span id="c1"></span><label>';
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
                                             echo '<label><span id="h11"></span>&nbsp<span id="h21"></span>&nbsp<span id="city1"></span>&nbsp<span id="province1"> </span>&nbsp<span id="zip1"></span><label>';
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
                                              echo '<label><span id="oh11"></span>&nbsp<span id="oh21"></span>&nbsp<span id="ocity1"></span>&nbsp<span id="oprovince1"> </span>&nbsp<span id="ozip1"></span><label>';
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
                                       
                                        echo '<td colspan="2">';
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
                                        echo '<td colspan="2">';
                                        echo '<label><strong>Plate No.:&nbsp;</strong></label>';
                                                echo '<br/>';
                                                echo '<label><span id="plate11"></span><label>';
                                        echo '</td>';
                                        echo '<td colspan="2">';
                                        echo '<label><strong>Conduction Sticker:&nbsp;</strong></label>';
                                                echo '<br/>';
                                                echo '<label><label>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '</tr>';
                                        echo '</table>';
                                        echo '</form>';
                                    ?>
                                    
								<div class="agree">
                                    <input type="checkbox" id="agree" name="agree" value="agree">
                                    <label for="agree">I confirm that the information given in this form is true, complete and accurate.</label>    
                                    <input type="text" id="agreeDP" name="agreeDP" value="1" hidden>
									<input type="text" id="aq" name="aq" value="0" hidden>
                                    
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    
                    <div style="overflow:auto;">
                        <div style="float:right;">
                          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                          <button type="button" id="nextBtn" onclick="nextPrev(1)" name="button" class="continue">Next</button>
                          
                        </div>
                    </div>
                <?php echo form_close(); ?> 
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
function linkopen() {
    window.open("<?php echo site_url('kiosk/policy'); ?>", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=100, left=100, width=795, height=500px");
}
</script>
<script>
    var v = jQuery("#regForm").validate({
     rules: {
       
		plantype:{
            required : true
        }, 
        salutation: {
          required: true
        },
        fname: {
          required: true
        },
        lname: {
          required: true
        },
        citizenship: {
          required: true
        },
        nationality:{
            required : true
        },
        acr:{
            required : true
        },
        sex: {
          required: true
        },
        bday: {
          required: true
        },
        bplace: {
          required: true
        },
        occupation: {
          required: true
        },
        cstatus: {
          required: true
        },
        city: {
          required: true
        },
        province: {
          required: true
        },
        zip: {
          required: true
        },
		ocity: {
          required: true
        },
        oprovince: {
          required: true
        },
        ozip: {
          required: true
        },
        mobile: {
            required : true
        },
        email:{
            email: true,
			required : true
        },
		insured1: {
          required: true
        },
        beneficiary1: {
          required: true
        },
        relation1: {
            required : true
        },
        bday_insured1:{
            required: true
        },
		rradio: {
          required: true
        },
		mailing: {
          required: true
        },
		plate1:{
				required : true
        },
		make1:{
				required : true
        },
		model1:{
				required : true
        },
		color1:{
				required : true
        },
		fuel1:{
				required : true
        }
        
         
      },
     errorElement: "span",
     messages: {
        
		plantype:{
            required : "Please select plan type."
        },
		
        salutation: {
          required: "Please select title."
        },
        fname: {
          required: "First Name is required."
        },
        lname: {
          required: "Last Name is required."
        },
        citizenship: {
          required: "Citizenship is required."
        },
        nationality:{
            required : "Nationality is required."
        },
        acr:{
            required : "ACR is required."
        },
        sex: {
          required: "Please select gender."
        },
        bday: {
          required: "Birthdate is required."
        },
        bplace: {
          required: "Birthplace is required."
        },
        occupation: {
          required: "Occupation is required."
        },
        cstatus: {
          required: "Civil status is required."
        },
        city: {
          required: "City is required."
        },
        province: {
          required: "Province is required."
        },
        zip: {
          required: "Zip Code is required."
        },
		ocity: {
          required: "City is required."
        },
        oprovince: {
          required: "Province is required."
        },
        ozip: {
          required: "Zip Code is required."
        },
        mobile: {
            required : "Mobile No. is required."
        },
        email:{
            email: "Please enter a valid email address.",
			required : "Email Address is required."
        },
		insured1: {
          required : "Please select."
        },
        beneficiary1: {
          required : "Name is required."
        },
        relation1: {
            required : "Relation is required."
        },
        bday_insured1:{
            required : "Birth date is required."
        },
		rradio:{
				required : "Please select."
        },
		mailing: {
          required: 'Please select mailing preference.'
        },
		plate1:{
				required : "Plate No. is required."
        },
		make1:{
				required : "Car Make is required."
        },
		model1:{
				required : "Car Model is required."
        },
		color1:{
				required : "Color is required."
        },
		fuel1:{
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
    var currentTab = 0;// Current tab is set to be the first tab (0)
    showTab(currentTab); 

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      var steps = jQuery(".step");
      //... and fix the Previous/Next buttons:
      if (n === 0) {
        document.getElementById("prevBtn").style.display = "none";
        if (jQuery(steps[n]).hasClass('done') && jQuery(steps[n + 1]).hasClass('current')) {
					jQuery(steps[n + 1]).removeClass('current');
					jQuery(steps[n]).removeClass('done').addClass('current');
					return false;
				}
      } else {
        document.getElementById("prevBtn").style.display = "inline";
        if (jQuery(steps[n]).hasClass('done') && jQuery(steps[n + 1]).hasClass('current')) {
					jQuery(steps[n + 1]).removeClass('current');
					jQuery(steps[n]).removeClass('done').addClass('current');
					return false;
				}
      }
      if (n === (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
        if (!jQuery(steps[n]).hasClass('current') && !jQuery(steps[n]).hasClass('done')) {
					jQuery(steps[n]).addClass('current');
					jQuery(steps[n - 1]).removeClass('current').addClass('done');
					return false;
                                    }
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
        if (!jQuery(steps[n]).hasClass('current') && !jQuery(steps[n]).hasClass('done')) {
					jQuery(steps[n]).addClass('current');
					jQuery(steps[n - 1]).removeClass('current').addClass('done');
					return false;
                                    }
      }
      //... and run a function that will display the correct step indicator:
     // fixStepIndicator(n)
    
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      
      var x = document.getElementsByClassName("tab");
    
      // Exit the function if any field in the current tab is invalid:
      //if (n == 1 && !validateForm()) return false;

      if (n === 1 && !v.form())return false;
 
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
	  
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
			if(document.getElementById('agree').checked) 
            { 
                
                    document.getElementById("regForm").submit();
				   // $("#nextBtn").val("save").change();
				   $("#loader").show();
				   return false;
                

            } else {
                alert('Please confirm that the information given in this form is true, complete and accurate.'); 
                currentTab = currentTab - n;
            }	
        
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace("active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += "active";
    }
   
   function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
   }
   
    $(document).ready(function() {
 
			$("p#ta").hide();
			$("div#office").hide();
            $("#mailing").change(function () {
				var val = $(this).val();
				if(val=== 'OFFICE ADDRESS'){
					 $("div#office").show();
				}else{
					$("div#office").hide();
				}
			});
			
			$('#bday').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1920:2018',
                    dateFormat : 'yy-mm-dd',
                    defaultDate: '1985-01-01'
                });
			
            $( "#h2" ).autocomplete({
	             minLength: 1,
	             source: "getTowns",
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
	             source: "getTowns",
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
		             source: "getCities",
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
		             source: "getCities",
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
                        
             
                
            $( "#make1" ).autocomplete({
		            minLength: 1,
                            source: "getCarMake",
		            focus: function( event, ui ) {
		                   return false;
		             },
		            select: function( event, ui ) {
		            	$( "#make1" ).val( ui.item.brand);
		                return false;
		            }
		             
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		            return $( "<li>" )
		            .append(item.brand)
		            .appendTo( ul );
		        }; 
                       
            $( "#model1" ).autocomplete({
		            minLength: 1,
                            source: "getCarModel",
		            focus: function( event, ui ) {
		                   return false;
		             },
		            select: function( event, ui ) {
		            	$( "#model1" ).val( ui.item.model);
		                return false;
		            }
		             
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		            return $( "<li>" )
		            .append(item.model)
		            .appendTo( ul );
		        };
				
			//additional for motorcycle
            $('#bday_insured1').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1920:2018',
                    dateFormat : 'yy-mm-dd',
                    defaultDate: '1985-01-01'
                });
                
            $('#bday_insured2').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1920:2018',
                    dateFormat : 'yy-mm-dd',
                    defaultDate: '1985-01-01'
                });	
            
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
    });
    
</script>
</body>
</html>