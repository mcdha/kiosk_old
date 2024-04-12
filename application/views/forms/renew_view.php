<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <!--additional -->
  <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
<script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/kiosk.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/online.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/payment.css">

<style>
.error {
    color: #5a5c69;
    font-size: 1rem;
    position: relative;
    line-height: 1;
}
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('welcome/dashboard');?>">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url(); ?>assets/img/aaplogo.png"  style="width:100%;" class="center"/>
        </div>
        <div class="sidebar-brand-text mx-3">AAP</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('dashboard/home');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-car-side"></i>
          <span>Benefits</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Membership Benefits</a>
            <a class="collapse-item" href="#">AQ Magazine</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Rewards</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('benefits/rewards');?>">Rewards Summary</a>
            <a class="collapse-item" href="<?php echo site_url('benefits/rewardsprogram');?>">About Rewards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHistory" aria-expanded="true" aria-controls="collapseHistory">
          <i class="fas fa-fw fa-table"></i>
          <span>History</span>
        </a>
        <div id="collapseHistory" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('history/membership_history');?>">Membership History</a>
            <a class="collapse-item" href="<?php echo site_url('history/pidp_history');?>">PIDP History</a>
            <a class="collapse-item" href="<?php echo site_url('history/ers_history');?>">ERS History</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 ">
              <h1>Automobile Association Philippines</h1>
          </div>
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php 
                    foreach($details as $r){
                         echo $r['members_lastname'].', '.$r['members_firstname'];
                    }
                    $_SESSION['fn'] = $r['members_firstname'];
                    $_SESSION['ln'] = $r['members_lastname'];
                    
                ?>
                </span>
                <i class="fas fa-fw"><img class="rounded" src='data:image/png;base64,<?= $img ?>' style="width:100%"/></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo site_url('welcome/profile');?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <!--<a class="dropdown-item" href="">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>-->
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Membership Information</h6>
                  <a href="<?php echo site_url('dashboard/home') ?>">BACK
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                </a>
                </div>              
                <!-- Card Body -->
                <div class="card-body">
 <?php echo form_open_multipart('dashboard/renewal', 'id="regForm"', 'enctype="multipart/form-data"'); ?>
    
    <input type="hidden" name="record" value="<?= $membership['vehicleinfohead_id']?>">
    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
    <input type="hidden" name="unsigned_field_names" value="">
    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>Record No. :</b> <?= $membership['vehicleinfohead_order']?></p>
                            <p><b>Type of Membership :</b> <?= $membership['sponsor_name']?></p>
                            <p><b>Plan Type :</b> <?= $membership['fee_name']?></p>
                            <p><b>Initiator :</b> <?= $membership['membershipinitiator_name']?></p>
                            <p><b>Category :</b> <?= $membership['category_name']?></p>
                            
                        </div>
                        <div class="col-lg-6">
                            <p><b>Status :</b> <?= $membership['vehicleinfohead_status']?></p>
                            <p><b>Activation Date :</b> <?= $membership['vehicleinfohead_activedate']?></p>
                            <p><b>Expiration Date :</b> <?= $membership['vehicleinfohead_expiredate']?></p>
                            <p><b>Advance Renewal Activation :</b> <?= $membership['adv_activedate']?></p>
                            <p><b>Advance Renewal Expiration  :</b> <?= $membership['adv_expiredate']?></p>
                        </div>
                    </div>    
                    
                     
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                          <thead class="thead-light">
                            <tr>
                              <th>Conduction Sticker</th>
                              <th>Plate No.</th>
                              <th>Car Make</th>
                              <th>Car Model</th>
                              <th>Year</th>
                              <th>Color</th>
                              <th>Fuel</th>
                              <th colspan="2" style="text-align:center">Request</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                foreach($vehicle as $row){
                            ?>
                            <tr>
                                <td style="width:15px;">
                                <?php
                                    if ($row['vehicleinfo_csticker'] == 1) {
                                            echo '<input type="checkbox" name="csticker" value="csticker" checked disabled>';
                                            echo '<label for="csticker"></label>';
                                    }else{
                                            echo '<input type="checkbox" name="csticker" value="csticker" disabled>';
                                            echo '<label for="csticker"></label>';
                                    }
                                ?>    
                                </td>
                                <td><?= $row['vehicleinfo_plateno'];?></td>
                                <td><?= $row['vehiclebrand_name'];?></td> 
                                <td><?= $row['vehiclemodel_name'];?></td>
                                <td><?= $row['vehicleinfo_year'];?></td>
                                <td><?= $row['vehiclecolor_name'];?></td>
                                <td><?= $row['vehiclefuel_name'];?></td>
                                <td><a class="editRecord" href="#" data-toggle="modal" data-target="#editModal" id="<?= $row["vehicleinfohead_id"] ?>" data-rec='<?= $row["vehicleinfohead_id"] ?>'>UPDATE</a></td>
				<td><a class="deleteRecord" href="#" data-toggle="modal" data-target="#deleteModal" data-rec='<?= $row["vehicleinfohead_id"] ?>'>DELETE</a></td>	 
                            </tr>
                            <?php }?>
                          </tbody>
                        </table>
                    </div>
                    <h5>Would you like to renew this membership?</h5>
                    <div>
			<div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="torenew" id="yes" value="yes"> 
                            <label class="custom-control-label" for="yes" style="font-size: 16px;">YES</label>
			</div>
			<div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="torenew" id="no" value="no" checked> 
                            <label class="custom-control-label" for="no" style="font-size: 16px;">NO</label>
			</div>
                    </div>
                    <br/>
                <script>
                        $(document).ready(function() {
				$("div#renew").hide();
                                $('input:radio[name="torenew"]').change(
                                    function(){
                                        if ($(this).val() === 'yes') {
                                            $("div#renew").show();
                                        }
                                        else {
                                            $("div#renew").hide();
                                        }
                                 });							 
                        });
		</script>
             <img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" id="loader" style="display: none" class="center">       
            <div  id="renew"> 
                
                <div class="tab" id="form1">    
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
                        <div id="main">    
                            <div class="field-wrapper hasValue1">
                                    <select id="plantype" name="plantype" style="width: 100%;" >
                                        <option value="">Please select type of membership</option>
                                    </select>
                                    <div class="field-placeholder">
                                        <span> Type of Membership</span>
                                    </div>
                                </div>
                        </div>

<?php  foreach($details as $r){ ?>
<input type="hidden" id="email" name="email" value="<?= $r['members_emailaddress']?>">
<input type="hidden" id="pin" name="pin" value="<?= $r['members_pincode']?>">
                        </div>
                    </div>
                    <div id="pidp">
                        <input type="hidden" name="ispidp" id="ispidp" value="">
			<div class="row">
                            <div class="col-lg-6">
                                
				<h5>License Details</h5>
				<div class="field-wrapper hasValue">
                                    <input type="text" name="lic" id="lic" value="<?= $r['members_licenseno']?>">
					<div class="field-placeholder">
                                            <span>License No: (###-##-######)</span>
					</div>
				</div>
                                
				<div class="field-wrapper hasValue1">
                                    <input type="text" class="lower" name="licexp" id="licexp" placeholder="yyyy-mm-dd" value="<?=  $r['members_licenseexpirationdate'] ?>"
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
                                    <select name="card" style="width: 100%" >
					<option value="">Please select Card Type</option>
					<option value="NON CARD">NON CARD</option>
					<option value="CARD">CARD</option>
                                    </select>
                                    <div class="field-placeholder">
					<span>Card Type</span>
                                    </div>
				</div>
				<div class="field-wrapper hasValue1">
                                    <select name="lictype" style="width: 100%" >
					<option value="">Please select License Type</option>
					<option value="NON PROFESSIONAL">NON PROFESSIONAL</option>
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
					<td><input type="checkbox" id="1" name="restriction[]" value="1" >
                                            <label for="1">1</label></td>
					<td><input type="checkbox" id="2" name="restriction[]" value="2" >
                                            <label for="2">2</label></td>
					<td><input type="checkbox" id="3" name="restriction[]" value="3" >
                                            <label for="3">3</label></td>
                                        <td><input type="checkbox" id="4" name="restriction[]" value="4" >
                                            <label for="4">4</label></td>
					<td><input type="checkbox" id="5" name="restriction[]" value="5" >
                                            <label for="5">5</label></td>
					<td><input type="checkbox" id="6" name="restriction[]" value="6" >
                                            <label for="6">6</label></td>
                                        <td><input type="checkbox" id="7" name="restriction[]" value="7" >
                                            <label for="7">7</label></td>
					<td><input type="checkbox" id="8" name="restriction[]" value="8" >
                                            <label for="8">8</label></td>
                                    </tr>
                                    </table>
				</div>
                                <?php }    ?>
                                <br/>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span style="font-weight: bold;">Upload: </span><span>Copy of Philippine Driver's License</span></label>
                                            <div class="pradio">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="imglic" name="imglic" value=""> 
                                                        <label class="custom-file-label" for="imglic">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <img id='img-lic' />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span style="font-weight: bold;">Upload: </span><span>2x2 or passport size ID picture<span></label>
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
                            <div class="col-lg-6">
                            <div>
				<div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="single" name="dradio" value="SINGLE" checked> 
                                    <label class="custom-control-label" for="single">Single PIDP</label>
				</div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input"   id="multiple" name="dradio" value="MULTIPLE"> 
                                    <label class="custom-control-label" for="multiple">Multiple PIDPs (For Use in Japan and Other Countries)</label>
				</div>
                            </div>
                            <br/>
                            <div class="field-wrapper hasValue2">
				<input type="text" name="d" id="d" >
                                    <div class="field-placeholder">
					<span>Destination 1</span>
                                    </div>
                            </div>
                            <div class="field-wrapper hasValue2" id="d2div">
				<input type="text" name="d2" id="d2" value="JAPAN" disabled="disabled">
				<div class="field-placeholder">
                                    <span>Destination 2</span>
				</div>
                                <br>
                                <p><b style="color:red">NOTE:</b> Additional <span>&#8369;</span> 560.00 for multiple PIDP.</p>
                                <p style="color:red">Renewal for Registered Residents in Japan: PIDP will only be valid for driving in Japan after spending 3 months or more outside Japan.</p>
                            </div>
                            <textarea rows="4" cols="50" id="dremarks" disabled></textarea>
                         </div>
                        </div>
                    </div>
                    <input type="checkbox" id="aq" name="aq" value="1" checked> 
                    <label for="aq">Avail Online AQ Magazine</label> 
                    <input type="checkbox" id="agree" name="agree" value="agree"> 
                    <label for="agree">I confirm that the information given in this form is true, complete and accurate.</label> 
                    <input type="checkbox" id="agreeDP" name="agreeDP" value="agreeDP"> 
                    <label for="agreeDP">I agree to the <a href='#' onclick='linkopen();'>Terms and Conditions</a>
			of the Privacy Policy of the Automobile Association Philippines, which I acknowledge that I have read and
			understood.
		    </label>
 
            </div>
            <div class="tab" id="form2">    
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

                                        <!--Product Description-->
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
                                                    <td><span style="float:left">&#8369; </span><span style="float:right" id="promo"></span></td>
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
                            <input type="hidden" id="paymentmethod" name="paymentmethod" value="CREDIT CARD">
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

        </div>
        <!-- end of renew div-->
    <?php form_close() ?>            
                    </div>
                  </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->

     
        </div>
      <!-- End of Main Content -->
<script>
		$(function () {
			$('.deleteRecord').click(function (e) {
				e.preventDefault();
				var link = this;
				var deleteModal = $("#deleteModal");
				deleteModal.find('input[name=id]').val(link.dataset.rec);
				
			});
			
		});
</script>


      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020 Automobile Association Philippines</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo site_url('welcome/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
   <!-- Delete Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
	  <form action="#" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this vehicle?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div class="form-group">
            <label for="comment">Reason:</label>
            <textarea class="form-control" rows="3" id="comment"></textarea>
          </div>
            <br>
            Select "Delete" below if you are ready delete this vehicle.</div>
        <div class="modal-footer">
		 <input type="hidden" name="id" value="" />
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" name="button"  class="btn btn-primary"  id="confirm-button" value="DELETE" />
        </div>
	</form>	
      </div>
    </div>
  </div>
  <!--- update modal-->
  <div id="editModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header"> 
                    <h4 class="modal-title">Update Vehicle Details</h4> 				
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                      
                </div>  
                <div class="modal-body">  
                     <form method="post" action="#"  
                          <label>Plate No</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          
                          <label>Make</label>  
                          <input type="text" name="email" id="email" class="form-control" /> 
                           
                          <label>Model</label>  
                          <input type="text" name="phone" id="phone" class="form-control" />  
                            
                          <label>Year</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          
                          <label>Color</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          
                          <label>Fuel Type</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          
                          <label>Transmission</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          
                          <input type="hidden" name="id" id="id" />
                          <br>
                          <input type="submit" name="button" value="UPDATE" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/js/sb-admin-2.min.js"></script>
  

<script>
function linkopen() {
    window.open("<?php echo site_url('kiosk/policy'); ?>", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=100, left=100, width=795, height=500px");
}
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dev/plugins/inputmask/src/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/uploadImg.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/payment.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/selectPlantype.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/renewValidation.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/promo.js"></script>
</body>
</html>
