<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/aap.ico">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.css">
  <style>
      label {
          color:#4e73df;
          font-weight: bold;
      }
      h3{
          color:#808080;
          font-weight: bold;
      }
   </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('encoder/home');?>">
        <div class="sidebar-brand-icon">
		<!-- <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-laugh-wink"></i>-->
		  <img src="<?php echo base_url(); ?>assets/img/aaplogo.png"  style="width:100%;" class="center"/>
        </div>
        <div class="sidebar-brand-text mx-3">AAP</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('encoder/home');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('encoder/onlineDashboard');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Online</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('encoder/kioskDashboard');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Kiosk</span></a>
      </li>
	  
	  <!-- Divider -->
      <hr class="sidebar-divider">
	  
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
              <h1>AAP - Encoder Portal</h1>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php echo $bname?>
                </span>
              </a>
              
            </li>
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php echo $lname.', '.$fname?>
                <i class="fas fa-user-circle"></i>
                </span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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

          <!-- Online Applicant-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Membership Application On Process....</h6>
            </div>
            <div class="card-body">
                <?php echo form_open('encoder/change_status','id="regForm"'); 
                        if (isset($result_info)) {
                           foreach($result_info->result() as $row)
                           { 
                ?>
                    <input type="hidden" class="form-control"  name="id" value="<?= $row->application_id ?>">
                       <h3>Personal Information</h3>
                       <div class="form-row">
                           <div class="form-group col-md-1">
                               <label for="title">Title</label>
                               <input type="text" class="form-control" id="title" name="salutation" value="<?= $row->members_title ?>">
                           </div>
                           <div class="form-group col-md-3">
                               <label for="fname">First Name</label>
                               <input type="text" class="form-control" id="fname"  name="fname" value="<?= utf8_decode($row->members_firstname)?>">
                           </div>
                           <div class="form-group col-md-2">
                               <label for="mname">Middle Name</label>
                               <input type="text" class="form-control" id="mname" name="mname" value="<?= utf8_decode($row->members_middlename)?>">
                           </div>
                           <div class="form-group col-md-3">
                               <label for="lname">Last Name</label>
                               <input type="text" class="form-control" id="lname" name="lname" value="<?= utf8_decode($row->members_lastname)?>">
                           </div>
                           <div class="form-group col-md-1">
                               <label for="sex">Gender</label>
                               <input type="text" class="form-control" id="sex" name="sex" value="<?= $row->members_gender ?>">
                           </div>

                          <div class="form-group col-md-2">
                               <label for="bday">Birth Date</label>
                               <input type="text" class="form-control" id="bday" name="bday" value="<?= $row->members_birthdate ?>" >
                           </div>
                           
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-5">
                               <label for="bplace">Birth Place</label>
                               <input type="text" class="form-control" id="bplace" name="bplace" value="<?= utf8_decode($row->members_birthplace) ?>" >
                           </div>
                           <div class="form-group col-md-2">
                               <label for="citizenship">Citizenship</label>
                               <input type="text" class="form-control" id="citizenship" name="citizenship" value="<?= $row->citizenship?>" >
                           </div>
                           <div class="form-group col-md-2">
                               <label for="nationality">Nationality</label>
                               <input type="text" class="form-control" id="nationality" name="nationality" value="<?= $row->nationality?>" >
                           </div>
                           <div class="form-group col-md-2">
                               <label for="acr">ACR No.</label>
                               <input type="text" class="form-control" id="acr" name="acr" value="<?= $row->members_acrno ?>" >
                           </div>
                          <div class="form-group col-md-2">
                               <label for="cstatus">Civil Status</label>
                               <input type="text" class="form-control" id="cstatus" name="cstatus" value="<?= $row->members_civilstatus ?>" >
                           </div>
                           <div class="form-group col-md-3">
                             <label for="occupation">Occupation</label>
                               <input type="text" class="form-control" id="occupation" name="occupation" value="<?= $row->occupation_name ?>" >
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-4">
                               <label for="mobile">Mobile Number</label>
                               <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $row->members_mobileno ?>" >
                           </div>
                           <div class="form-group col-md-4">
                               <label for="email">Email Address</label>
                               <input type="text" class="form-control" id="email" name="email" value="<?= $row->members_emailaddress ?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="tel">Telephone Number</label>
                               <input type="text" class="form-control" id="tel"  name="tel" value="<?= $row->members_housephoneno ?>" >
                           </div>
                       </div>
					   <div class="form-row">
                           <div class="form-group col-md-4">
                               <label for="amobile">Alternate Mobile Number</label>
                               <input type="text" class="form-control" id="amobile" name="amobile" value="<?= $row->members_alternate_mobileno ?>" >
                           </div>
                           <div class="form-group col-md-4">
                               <label for="aemail">Alternate Email Address</label>
                               <input type="text" class="form-control" id="aemail" name="aemail" value="<?= $row->members_alternate_emailaddress ?>" >
                           </div>
                           <div class="form-group col-md-4">
                               <label for="atel">Office Phone Number</label>
                               <input type="text" class="form-control" id="atel" name="atel" value="<?= $row->members_alternate_tel ?>" >
                           </div>
                       </div>
                       <h6>Home Address</h6>
                       <div class="form-row">
                           <div class="form-group col-md-6">
                             <label for="address1">Address 1</label>
                             <input type="text" class="form-control" id="address1" name="h1" value="<?= utf8_decode($row->members_haddress1) ?>" >
                           </div>
                           <div class="form-group col-md-6">
                             <label for="address2">Address 2</label>
                             <input type="text" class="form-control" id="h2" name="h2"  value="<?= utf8_decode($row->members_haddress2) ?>" >
                           </div>
                       </div>    
                       <div class="form-row">
                            <div class="form-group col-md-6">
                             <label for="city">City</label>
                             <input type="text" class="form-control" id="city" name="city" value="<?= ($row->members_housecity == $city)?$city:''?>" required>
                           </div>
                          
                           <div class="form-group col-md-4">
                             <label for="province">Province</label>
                              <input type="text" class="form-control" id="province" name="province" value="<?= ($row->members_housedistrict == $province)?$province:''?>" required>
                           </div>
                           <div class="form-group col-md-2">
                             <label for="zip">Zip</label>
                             <input type="text" class="form-control" id="zip" name="zip" value="<?= utf8_decode($row->members_housezipcode) ?>" >
                           </div>
                       </div>
                       <h6>Office Address</h6>
                       <div class="form-row">
                           <div class="form-group col-md-4">
                             <label for="company">Company Name</label>
                             <input type="text" class="form-control" id="company" name="company" value="<?= utf8_decode($row->members_businessname) ?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="oaddress2">Address 2</label>
                             <input type="text" class="form-control" id="oaddress2" name="oh1"  value="<?= utf8_decode($row->members_oaddress1) ?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="oaddress2">Address 2</label>
                             <input type="text" class="form-control" id="oh2" name="oh2"  value="<?= utf8_decode($row->members_oaddress2) ?>" >
                           </div>
                       </div>    
                       <div class="form-row">
                           <div class="form-group col-md-6">
                             <label for="ocity">City</label>
                             <input type="text" class="form-control" id="ocity" name="ocity" value="<?= utf8_decode($row->members_officecity) ?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="oprovince">Province</label>
                              <input type="text" class="form-control" id="oprovince" name="oprovince" value="<?= utf8_decode($row->members_officedistrict) ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="ozip">Zip</label>
                             <input type="text" class="form-control" id="ozip" name="ozip" value="<?= $row->members_officezipcode ?>" >
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-3">
                             <label for="mailing">Mailing Preference</label>
                             <input type="text" class="form-control" id="mailing" name="mailing" value="<?= $row->mailing_preference ?>" >
                           </div>
                           <div class="form-group col-md-3">
                             <label for="aq">Avail Online AQ Magazine</label>
                              <input type="text" class="form-control" id="aq" name="aq" value="<?= ($row->is_aq==1)?'YES':'NO'?>" >
                           </div>
                           
                       </div>
                       <br>
                       <h3>Vehicle Details</h3>
                       <div class="form-row">
                           <div class="form-check col-md-1">
                             <label class="form-check-label" for="customCheck">Conduction Sticker</label>
                             <input type="checkbox"  id="customCheck" name="cs1" value="<?= $row->v1e ?>" <?= (isset($row->v1e)=='1')?"checked='checked'":""?> >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="plate1">Plate Number</label>
                             <input type="text" class="form-control" id="plate1" name="plate1" value="<?= $row->vehicle_plate1 ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="make1">Car Make</label>
                              <input type="text" class="form-control" id="make1" name="make1" value="<?= $row->vehicle_make1?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="model1">Car Model</label>
                             <input type="text" class="form-control" id="model1" name="model1" value="<?= $row->vehicle_model1 ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="color1">Color</label>
                             <input type="text" class="form-control" id="color1" name="color1" value="<?= $row->vehicle_color1  ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="year1">Year</label>
                             <input type="text" class="form-control" id="year1" name="year1" value="<?= $row->vehicle_year1  ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="fuel1">Fuel Type</label>
                             <input type="text" class="form-control" id="fuel1" name="fuel1" value="<?= $row->vehicle_fuel1  ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="transmission1">Transmission Type</label>
                             <input type="text" class="form-control" id="transmission1" name="transmission1" value="<?= $row->vehicle_transmission1  ?>" >
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-check col-md-1">
                             <label class="form-check-label" for="customCheck2">Conduction Sticker</label>
                             <input type="checkbox"  id="customCheck2" name="cs1" value="<?= $row->v2e ?>" <?= (isset($row->v2e)=='1')?"checked='checked'":""?> >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="plate2">Plate Number</label>
                             <input type="text" class="form-control" id="plate2" name="plate2" value="<?= $row->vehicle_plate2 ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="make2">Car Make</label>
                              <input type="text" class="form-control" id="make2" name="make2" value="<?= $row->vehicle_make2?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="model2">Car Model</label>
                             <input type="text" class="form-control" id="model2" name="model2" value="<?= $row->vehicle_model2 ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="color2">Color</label>
                             <input type="text" class="form-control" id="color2" name="color2" value="<?= $row->vehicle_color2  ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="year2">Year</label>
                             <input type="text" class="form-control" id="year2" name="year2" value="<?= $row->vehicle_year2 ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="fuel2">Fuel Type</label>
                             <input type="text" class="form-control" id="fuel2" name="fuel2" value="<?= $row->vehicle_fuel2  ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="transmission2">Transmission Type</label>
                             <input type="text" class="form-control" id="transmission2" name="transmission2" value="<?= $row->vehicle_transmission2  ?>" >
                           </div>
                       </div>
                       <br>
                       <h3>Representative Details</h3>
                       <div class="form-row">
                           <div class="form-group col-md-4">
                             <label for="rname">Name</label>
                             <input type="text" class="form-control" id="rname" name="rname" value="<?= $row->representative_name ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="rcontact">Contact</label>
                              <input type="text" class="form-control" id="rcontact" name="rcontact" value="<?= $row->representative_contactno?>" >
                           </div>
                           <div class="form-group col-md-6">
                             <label for="raddress">Address</label>
                              <input type="text" class="form-control" id="raddress" name="raddress" value="<?= $row->representative_address?>" >
                           </div>
                          
                       </div>
                       
                       <br>
                       <h3>Insured or Beneficiaries</h3>
                       <div class="form-row">
                           <div class="form-group col-md-3">
                             <label for="insuered1">Insured or Beneficiaries</label>
                             <input type="text" class="form-control" id="insuered1" name="insuered1" value="<?= $row->insured1 ?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="beneficiary1">Full name</label>
                              <input type="text" class="form-control" id="beneficiary1" name="beneficiary1" value="<?= utf8_decode($row->beneficiary1)?>" >
                           </div>
                           <div class="form-group col-md-3">
                             <label for="relation1">Relationship</label>
                              <input type="text" class="form-control" id="relation1" name="relation1" value="<?= $row->relation1?>" >
                           </div>
                          <div class="form-group col-md-2">
                             <label for="bday_insured1">Birth Date</label>
                              <input type="text" class="form-control" id="bday_insured1" name="bday_insured1" value="<?= $row->bday_insured1 ?>" >
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-3">
                             <label for="insured2">Insured or Beneficiaries</label>
                             <input type="text" class="form-control" id="insured2" name="insured2" value="<?= $row->insured2 ?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="beneficiary2">Full Name</label>
                              <input type="text" class="form-control" id="beneficiary2" name="beneficiary2" value="<?= utf8_decode($row->beneficiary2)?>" >
                           </div>
                           <div class="form-group col-md-3">
                             <label for="relation2">Relationship</label>
                              <input type="text" class="form-control" id="relation2" name="relation2" value="<?= $row->relation2?>" >
                           </div>
                          <div class="form-group col-md-2">
                             <label for="bday_insured2">Birth Date</label>
                              <input type="text" class="form-control" id="bday_insured2" name="bday_insured2" value="<?= $row->bday_insured2 ?>" >
                           </div>
                       </div>
                       <br>
                       <h3>PIDP</h3>
                       <div class="form-row">
                           <div class="form-group col-md-4">
                             <label for="lic">Local License No.</label>
                              <input type="text" class="form-control" name="lic" id="lic" value="<?= $row->members_licenseno ?>">
                           </div>
                           <div class="form-group col-md-2">
                             <label for="licexp">License Expiration Date</label>
                              <input type="text" class="form-control" name="licexp" id="licexp" value="<?= $row->members_licenseexpirationdate ?>"  onchange="document.getElementById('licexp1').innerHTML = this.value" onkeyup="
                                                var v = this.value;
                                                if (v.match(/^\d{2}$/) !== null) {
                                                    this.value = v + '/';
                                                } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                                                    this.value = v + '/';
                                                }"
                                            maxlength="10" />
                           </div>
                           <div class="form-group col-md-3">
                             <label for="card">Card Type</label>
                              <select name="card" class="form-control" id="card"  style="width:100%">
                                  <option value=''>Please select.</option>
                                               <?php foreach($card as $c){ ?>  
                                  
                                                    <option value="<?php echo $c;?>" <?php if( $row->members_licensecard == $c){ echo set_select('card', $c, TRUE);} ?>><?php echo $c?></option>
                                                <?php } ?>
                                            </select>
                           </div>
                           <div class="form-group col-md-3">
                             <label for="lic">License Type</label>
                              <select name="lictype" id="lictype" class="form-control" style="width:100%" >
                                  <option value=''>Please select.</option>
                                                <?php foreach($lictype as $l){ ?>   
                                                    <option value="<?php echo $l;?>" <?php if($row->members_licensetype == $l){ echo set_select('lictype', $l, TRUE);}?>><?php echo $l;?></option>
                                                <?php } ?>
                                            </select>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-4">
                             <label for="rest">Restrictions</label>
                             <table class="restrictions">
                                <input type="text" name="res" value="<?= $row->members_licenserest ?>" hidden> 
                                 <?php $r =  unserialize($row->members_licenserest);?>
                                   <tr>
                                                        <td><input type="checkbox" id="r1" name="restriction[1]" value="1" <?= (isset($r[1])=='1')?"checked='checked'":""?> onchange="document.getElementById('r1').innerHTML = this.value">
                                                            <label for="r1">1</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r2" name="restriction[2]" value="2" <?= (isset($r[2])=='2')?"checked='checked'":""?> onchange="document.getElementById('r2').innerHTML = this.value">
                                                            <label for="r2">2</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r3" name="restriction[3]" value="3" <?= (isset($r[3])=='3')?"checked='checked'":""?> onchange="document.getElementById('r3').innerHTML = this.value">
                                                            <label for="r3">3</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r4" name="restriction[4]" value="4" <?= (isset($r[4])=='4')?"checked='checked'":""?> onchange="document.getElementById('r4').innerHTML = this.value">
                                                            <label for="r4">4</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r5" name="restriction[5]" value="5" <?= (isset($r[5])=='5')?"checked='checked'":""?> onchange="document.getElementById('r5').innerHTML = this.value">
                                                            <label for="r5">5</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r6" name="restriction[6]" value="6" <?= (isset($r[6])=='6')?"checked='checked'":""?> onchange="document.getElementById('r6').innerHTML = this.value">
                                                            <label for="r6">6</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r7" name="restriction[7]" value="7" <?= (isset($r[7])=='7')?"checked='checked'":""?> onchange="document.getElementById('r7').innerHTML = this.value">
                                                            <label for="r7">7</label>
                                                        </td>
                                                        <td><input type="checkbox" id="r8" name="restriction[8]" value="8" <?= (isset($r[8])=='8')?"checked='checked'":""?> onchange="document.getElementById('r8').innerHTML = this.value">
                                                            <label for="r8">8</label>
                                                        </td>
                                                    </tr>
                            </table>
                           </div>
                           <div class="form-group col-md-4">
                             <label for="d">Destination 1</label>
                             <input type="text"  class="form-control" name="d" id="d" value="<?= $row->members_destination ?>">
                           </div>
                           <div class="form-group col-md-4">
                             <label for="d2">Destination 2</label>
                             <input type="text"  class="form-control" name="d2" id="d2" value="<?= $row->members_destination2 ?>">
                           </div>
                          
                       </div>
                       <br>
                       <input type="hidden" class="form-control"  name="id" value="<?= $row->application_id ?>">
                       <h3>Membership Application</h3>
                       <div class="form-row">
                           <div class="form-group col-md-2">
                             <label for="types">Type of Application</label>
                             <input type="text" class="form-control" id="types" name="types" value="<?= $row->typesofapplication ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="mem">Type of Membership</label>
                              <input type="text" class="form-control" id="mem" name="mem" value="<?= $row->membership_type?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="plan">Plan Type</label>
                              <input type="text" class="form-control" id="plan" name="plan" value="<?= $row->plan_type?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="pidp_plantype">PIDP Plan Type</label>
                              <input type="text" class="form-control" id="pidp_plantype" name="pidp_plantype" value="<?= $row->pidp_plantype?>" >
                           </div>
                          
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-2">
                             <label for="activedate">Activation Date</label>
                             <input type="text" class="form-control" id="activedate" name="activedate" value="<?= $row->application_date?>" >
                           </div>
                           <div class="form-group col-md-3">
                             <label for="pin">PIN Code</label>
                              <input type="text" class="form-control" id="pin" name="pin" required>
                           </div>
                          <div class="form-group col-md-3">
                                <label for="initiator">Initiator</label>
                                
                               <select name="initiator" class="form-control" id="initiator" required>
                                   <?php 
												$c = 'PIDP';
												foreach($initiator as $i){ ?>  
                                  
                                                    <option value="<?= $i->membershipinitiator_name ?>" <?php if( $i->membershipinitiator_name == $c){ echo set_select( $c,$i->membershipinitiator_name,  TRUE);} ?>><?php echo $i->membershipinitiator_name?></option>
                                                <?php } ?>
                                </select>
                           </div>
                           <div class="form-group col-md-4">
                             <label for="insurance">Insurance</label>
                              <input type="text" class="form-control" id="insurance" name="insurance" required>
                           </div>
                       </div>
                       <br>
                       <h3>Application Status</h3>
                       <div class="form-row">
                           
                           <div class="form-group col-md-3">
                             <label for="adate">Application Date</label>
                              <input type="text" class="form-control" id="adate" name="adate" value="<?= $row->application_date?>">
                           </div>
                           <div class="form-group col-md-3">
                             <label for="inputProv">Reference No.</label>
                              <input type="text" class="form-control" id="inputProv" value="<?= $row->refnum ?>" disabled >
                           </div>
                           <div class="form-group col-md-3">
                             <label for="inputstatus">Status From</label>
                             <input type="text" class="form-control" id="inputstatus" value="<?= $row->status ?>" disabled="disabled">
                           </div>
                           <div class="form-group col-md-3">
                            <label for="getstatus">Current Status</label>
                            <select class="form-control" id="getstatus" name="getstatus" onchange="getSelectValue();">
                                <option value="ON HOLD" selected="selected">ON HOLD</option>
                              <option value="ON PROCESS">ON PROCESS</option>
							  <option value="CANCELLED">CANCELLED</option>
                            </select>
                           </div>
                       </div>
                       <br>
                       <div id="hold">
                           <div class="form-group">
                            <label for="comment">Reason/s:</label>
                            <textarea class="form-control" rows="5" id="comment" name="remarks" ><?php  if(isset($row->remarks)){
                            echo $row->remarks;}
                               ?></textarea>
                            
                          </div>
                            <button type="submit" name="button" value="SAVE" class="btn btn-primary" style="width:100%">SAVE</button>
                       </div>
                       <div id="process">
                           <button type="submit"  name="button" value="SUBMIT" class="btn btn-primary" style="width:100%">SUBMIT</button>
                       </div>
                      
                <?php
                           }
                        }
                echo form_close(); 
                ?>                       
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;2020 Automobile Association of the Philippines </span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo site_url('encoder/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/jquery/jquery.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/js/demo/datatables-demo.js"></script>
<script>
function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
   }
    $(document).ready(function() {
        $("div#process").hide();
        $("div#hold").show();
		
		$( "#d" ).autocomplete({
		            minLength: 1,
		            source: "<?php echo base_url();?>encoder/getDestination",
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
            
        
        $( "#h2" ).autocomplete({
	             minLength: 1,
	               source: "<?php echo base_url();?>encoder/getTowns",
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
	             source: "<?php echo base_url();?>encoder/getTowns",
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
		            source: "<?php echo base_url();?>encoder/getCities",
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
		             source: "<?php echo base_url();?>encoder/getCities",
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
        function getSelectValue()
        {
            var selectedValue = document.getElementById("getstatus").value;
            if(selectedValue === 'ON PROCESS'){
				$("div#process").show();
                $("div#hold").hide();
		
            }else{
			
				$("div#process").hide();
                $("div#hold").show();				
            }
			
        }
</script>
</body>
</html>
