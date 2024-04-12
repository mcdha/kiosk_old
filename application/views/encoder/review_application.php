<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
        img {
            max-width: 180px;
        }
      


figcaption {
  background-color: black;
  color: white;
  font-style: italic;
  padding: 2px;
  text-align: center;
  max-width: 180px;
}
      
    </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
        <a class="nav-link" href="<?php echo site_url('encoder/loginAuth');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('encoder/onlineDashboard');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Online</span></a>
      </li>
	  <li class="nav-item">
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
              <h1>Automobile Association Philippines</h1>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
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

          <!-- Online Applicant-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Application On Process....</h6>
            </div>
            <div class="card-body">
                <?php echo form_open('encoder/review_result','id="regForm"'); 
                        if (isset($result_info)) {
                           var_dump($result_info->result());
                           foreach($result_info->result() as $row)
                           { 
                ?>
                    <input type="hidden" class="form-control"  name="id" value="<?= $row->application_id ?>">
                       <h3>Personal Information</h3>
                       <div class="form-row">
                           <div class="form-group col-md-1">
                               <label for="inputAddress">Title</label>
                               <input type="text" class="form-control" id="inputAddress"  value="<?= $row->members_title ?>">
                           </div>
                           <div class="form-group col-md-3">
                               <label for="inputAddress">First Name</label>
                               <input type="text" class="form-control" id="inputAddress"  value="<?= $row->members_firstname?>">
                           </div>
                           <div class="form-group col-md-2">
                               <label for="inputAddress">Middle Name</label>
                               <input type="text" class="form-control" id="inputAddress"  value="<?= $row->members_lastname?>">
                           </div>
                           <div class="form-group col-md-3">
                               <label for="inputAddress">Last Name</label>
                               <input type="text" class="form-control" id="inputAddress"  value="<?= $row->members_lastname?>">
                           </div>
                           <div class="form-group col-md-1">
                               <label for="inputAddress">Sex</label>
                               <input type="text" class="form-control" id="inputAddress"  value="<?= $row->members_gender ?>">
                           </div>

                          <div class="form-group col-md-2">
                               <label for="inputAddress2">Birthday</label>
                               <input type="text" class="form-control" id="inputAddress2" value="<?= $row->members_birthdate ?>" >
                           </div>
                           
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-5">
                               <label for="inputAddress2">Birth Place</label>
                               <input type="text" class="form-control" id="inputAddress2" value="<?= $row->members_birthplace ?>" >
                           </div>
                           <div class="form-group col-md-2">
                               <label for="inputAddress2">Citzenship</label>
                               <input type="text" class="form-control" id="inputAddress2" value="<?= $row->nationality?>" >
                           </div>
                          <div class="form-group col-md-2">
                               <label for="inputAddress2">Civil Status</label>
                               <input type="text" class="form-control" id="inputAddress2" value="<?= $row->members_civilstatus ?>" >
                           </div>
                           <div class="form-group col-md-3">
                             <label for="inputAddress2">Occupation</label>
                               <input type="text" class="form-control" id="inputAddress2" value="<?= $row->occupation_name ?>" >
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-4">
                               <label for="inputAddress2">Mobile Number</label>
                               <input type="text" class="form-control" id="inputAddress2" value="<?= $row->members_mobileno ?>" >
                           </div>
                           <div class="form-group col-md-4">
                               <label for="inputAddress2">Email Address</label>
                               <input type="text" class="form-control" id="inputAddress2" value="<?= $row->members_emailaddress ?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="inputAddress2">Telephone Number</label>
                               <input type="text" class="form-control" id="inputAddress2" value="<?= $row->members_housephoneno ?>" >
                           </div>
                       </div>
					   
                       <div class="form-row">
                           <div class="form-group col-md-6">
                             <label for="inputAddress">Address 1</label>
                             <input type="text" class="form-control" id="inputAddress" value="<?= $row->members_haddress1 ?>" >
                           </div>
                           <div class="form-group col-md-6">
                             <label for="inputAddress2">Address 2</label>
                             <input type="text" class="form-control" id="inputAddress2" value="<?= $row->members_haddress2 ?>" >
                           </div>
                       </div>    
                       <div class="form-row">
                           <div class="form-group col-md-6">
                             <label for="inputCity">City</label>
                             <input type="text" class="form-control" id="inputCity" value="<?= $row->members_housecity?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="inputProv">Province</label>
                              <input type="text" class="form-control" id="inputProv" value="<?= $row->members_housedistrict?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="inputZip">Zip</label>
                             <input type="text" class="form-control" id="inputZip" value="<?= $row->members_housezipcode ?>" >
                           </div>
                       </div>
                       <br>
                       <h3>Vehicle Details</h3>
                       <div class="form-row">
                           <div class="form-check col-md-1">
                             <label class="form-check-label" for="customCheck">Conduction Sticker</label>
                             <input type="checkbox"  id="customCheck" name="cs1" value="<?= $row->v1e ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="plate1">Plate Number</label>
                             <input type="text" class="form-control" id="plate1" value="<?= $row->vehicle_plate1 ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="make1">Car Make</label>
                              <input type="text" class="form-control" id="make1" value="<?= $row->vehicle_make1?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="model1">Car Model</label>
                             <input type="text" class="form-control" id="model1" value="<?= $row->vehicle_model1 ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="color1">Color</label>
                             <input type="text" class="form-control" id="color1" value="<?= $row->vehicle_color1  ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="year1">Year</label>
                             <input type="text" class="form-control" id="year1" value="<?= $row->vehicle_year1  ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="fuel1">Fuel Type</label>
                             <input type="text" class="form-control" id="fuel1" value="<?= $row->vehicle_fuel1  ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="transmission1">Transmission Type</label>
                             <input type="text" class="form-control" id="transmission1" value="<?= $row->vehicle_transmission1  ?>" >
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-check col-md-1">
                             <label class="form-check-label" for="customCheck2">Conduction Sticker</label>
                             <input type="checkbox"  id="customCheck2" name="cs1" value="<?= $row->v2e ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="plate2">Plate Number</label>
                             <input type="text" class="form-control" id="plate2" value="<?= $row->vehicle_plate2 ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="make2">Car Make</label>
                              <input type="text" class="form-control" id="make2" value="<?= $row->vehicle_make2?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="model2">Car Model</label>
                             <input type="text" class="form-control" id="model2" value="<?= $row->vehicle_model2 ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="color2">Color</label>
                             <input type="text" class="form-control" id="color2" value="<?= $row->vehicle_color2  ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="year2">Year</label>
                             <input type="text" class="form-control" id="year2" value="<?= $row->vehicle_year2 ?>" >
                           </div>
                           <div class="form-group col-md-1">
                             <label for="fuel2">Fuel Type</label>
                             <input type="text" class="form-control" id="fuel2" value="<?= $row->vehicle_fuel2  ?>" >
                           </div>
                           <div class="form-group col-md-2">
                             <label for="transmission2">Transmission Type</label>
                             <input type="text" class="form-control" id="transmission2" value="<?= $row->vehicle_transmission2  ?>" >
                           </div>
                       </div>
                       <br>
                       <h3>Attachments</h3>
                       <?php 
                       if(isset($row->idpicture)){
                            echo "<div>";
                            echo "<figure>";
                            echo '<img src="'. base_url() . 'assets/uploads/'.$row->idpicture .'" /> ';
                            echo "<figcaption>ID Picture</figcaption>";
                            echo "</figure>";
                            echo "</div>";
                       }
                       if(isset($row->imglic)){
                            echo "<div>";
                            echo "<figure>";
                            echo '<img src="'. base_url() . 'assets/uploads/'.$row->imglic .'" />';
                            echo "<figcaption>Copy of Philippine Driver's License</figcaption>";
                            echo "</figure>";
                            echo "</div>";
                       }
                       

                       if(isset($row->or1)){
                            echo "<div>";
                            echo "<figure>";
                            echo '<img src="'. base_url() . 'assets/uploads/'.$row->or1 .'" /> ';
                            echo "<figcaption>Copy of OR 1st Vehicle</figcaption>";
                            echo "</figure>";
                            echo "</div>";
                       }
                       if(isset($row->cr1)){
                           
                            echo "<div>";
                            echo "<figure>";
                            echo '<img src="'. base_url() . 'assets/uploads/'.$row->cr1 .'" /> ';
                            echo "<figcaption>Copy of CR 1st Vehicle</figcaption>";
                            echo "</figure>";
                            echo "</div>";
                           
                       }
                       if(isset($row->or2)){
                           
                            echo "<div>";
                            echo "<figure>";
                            echo '<img src="'. base_url() . 'assets/uploads/'.$row->or2 .'" /> ';
                            echo "<figcaption>Copy of OR 2nd Vehicle</figcaption>";
                            echo "</figure>";
                            echo "</div>";
                          
                       }
                       if(isset($row->cr2)){
                            echo "<div>";
                            echo "<figure>";
                            echo '<img src="'. base_url() . 'assets/uploads/'.$row->cr2 .'" /> ';
                            echo "<figcaption>Copy of CR 2nd Vehicle</figcaption>";
                            echo "</figure>";
                            echo "</div>";
                           
                       }
                       
                       ?>
                       
                       
                       <br><br>
                       <h3>Membership Application</h3>
                       <div class="form-row">
                           <div class="form-group col-md-4">
                             <label for="inputCity">Type of Application</label>
                             <input type="text" class="form-control" id="inputCity" value="<?= $row->typesofapplication ?>" >
                           </div>
                           <div class="form-group col-md-4">
                             <label for="inputProv">Type of Membership</label>
                              <input type="text" class="form-control" id="inputProv" value="<?= $row->plan_type?>" >
                           </div>
                          
                       </div>
                       <br>
                       
                       <h3>Application Status</h3>
                       <div class="form-row">
                           <div class="form-group col-md-6">
                             <label for="inputstatus">Status From</label>
                             <input type="text" class="form-control" id="inputstatus" value="<?= $row->status ?>" disabled="disabled">
                           </div>
                           <div class="form-group col-md-6">
                            <label for="status">Current Status</label>
                            <select class="form-control" id="status" name="status" onchange="getSelectValue();">
                                <option value="ON HOLD" selected="selected">ON HOLD</option>
                              <option value="ON PROCESS">ON PROCESS</option>
                            </select>
                           </div>
                       </div>
                       <div id="hold">
                           <div class="form-group">
                            <label for="comment">Reason/s why the application is on hold:</label>
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
            <span>Copyright &copy; Automobile Association of the Philippines 2020</span>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/jquery/jquery.min.js"></script>
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
    $(document).ready(function() {
        $("div#process").hide();
        $("div#hold").show();
    });
        function getSelectValue()
        {
            var selectedValue = document.getElementById("status").value;
            if(selectedValue === 'ON HOLD'){
		$("div#process").hide();
                $("div#hold").show();
            }else{
		$("div#process").show();
                $("div#hold").hide();		
            }
			
        }
       
    
</script>

</body>

</html>
