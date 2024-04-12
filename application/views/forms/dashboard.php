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

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('dashboard/home');?>">
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
            <a class="collapse-item" href="<?php echo site_url('history/ers_benefits');?>">ERS Benefits</a>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php 
                    foreach($details as $r){
                        echo $r['members_lastname'].', '.$r['members_firstname'];
                    }
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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rewards Points</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $rewards['total_available'] ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">ERS Benefits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php 
                          $sum_km = 0;
                          $sum_int = 0;
                          
                          foreach ($ersHistory as $e){
                              if($e['status'] == 'ACTIVE'){
                                $sum_km += $e['mileage_available'];
                                $sum_int += $e['intervention_available'];
                              }
                          }
                          echo $sum_km.' kms<br> '.$sum_int.' Intervention/s';
                          ?>
                      </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-car-crash fa-2x text-gray-300"></i><br>
                        <a href="<?php echo site_url('history/ers_benefits');?>"> Details </a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Expired Membership</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                           <?php
                           $countExpired = 0;
                           $c = 1;
                            foreach($members_record as $row){
                                if($row['vehicleinfohead_status'] == 'REINSTATEMENT'){
                                    $countExpired += $c;
                                }
                            }
                            echo $countExpired;
                           ?>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form>
                        <?php
                            foreach ($details as $d){
                        ?>
                       <div class="form-row">
                           <div class="form-group col-md-1">
                               <label for="title">Title</label>
                               <input type="text" class="form-control" id="title"  value="<?= $d['members_title']?>" disabled>
                           </div>
                           <div class="form-group col-md-3">
                               <label for="firstname">First Name</label>
                               <input type="text" class="form-control" id="firstname"  value="<?= $d['members_firstname']?>" disabled>
                           </div>
                           <div class="form-group col-md-3">
                               <label for="midname">Middle Name</label>
                               <input type="text" class="form-control" id="midname"  value="<?= $d['members_middlename']?>" disabled>
                           </div>
                           <div class="form-group col-md-3">
                               <label for="lastname">Last Name</label>
                               <input type="text" class="form-control" id="lastname"  value="<?= $d['members_lastname']?>" disabled>
                           </div>
                           <div class="form-group col-md-1">
                               <label for="sex">Gender</label>
                               <input type="text" class="form-control" id="sex"  value="<?= $d['members_gender']?>" disabled>
                           </div>
                           <div class="form-group col-md-1">
                             <label for="age">Age</label>
                               <input type="text" class="form-control" id="age" value="<?= $d['members_age']?>" disabled>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-2">
                               <label for="bday">Birthdate</label>
                               <input type="text" class="form-control" id="bday" value="<?= $d['members_birthdate']?>" disabled>
                           </div>
                           <div class="form-group col-md-4">
                               <label for="bplace">Birth Place</label>
                               <input type="text" class="form-control" id="bplace" value="<?= $d['members_birthplace']?>" disabled>
                           </div>
                           <div class="form-group col-md-2">
                               <label for="citizenship">Citizenship</label>
                               <input type="text" class="form-control" id="citizenship" value="<?= $d['nationality_name']?>" disabled>
                           </div>
                          <div class="form-group col-md-2">
                               <label for="cstatus">Civil Status</label>
                               <input type="text" class="form-control" id="cstatus" value="<?= $d['members_civilstatus']?>" disabled>
                           </div>
                           <div class="form-group col-md-2">
                             <label for="occupation">Occupation</label>
                               <input type="text" class="form-control" id="occupation" value="<?= $d['members_employment']?>" disabled>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-4">
                               <label for="mobile">Mobile No.</label>
                               <input type="text" class="form-control" id="mobile" value="<?= $d['members_mobileno']?>" disabled>
                           </div>
                           <div class="form-group col-md-4">
                               <label for="email">Email Address</label>
                               <input type="text" class="form-control" id="email" value="<?= $d['members_emailaddress']?>" disabled>
                           </div>
                           <div class="form-group col-md-4">
                             <label for="tel">Telephone No.</label>
                               <input type="text" class="form-control" id="tel" value="<?= $d['members_housephoneno']?>" disabled>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6">
                             <label for="address1">Address 1</label>
                             <input type="text" class="form-control" id="address1" value="<?= $d['members_haddress1']?>" disabled>
                           </div>
                           <div class="form-group col-md-6">
                             <label for="address2">Address 2</label>
                             <input type="text" class="form-control" id="address2" value="<?= $d['members_haddress2']?>" disabled>
                           </div>
                       </div>    
                       <div class="form-row">
                           <div class="form-group col-md-6">
                             <label for="inputCity">City</label>
                             <input type="text" class="form-control" id="inputCity" value="<?= $d['house_city_name']?>" disabled>
                           </div>
                           <div class="form-group col-md-4">
                             <label for="inputProv">Province</label>
                              <input type="text" class="form-control" id="inputProv" value="<?= $d['house_district_name']?>" disabled>
                           </div>
                           <div class="form-group col-md-2">
                             <label for="inputZip">Zip Code</label>
                             <input type="text" class="form-control" id="inputZip" value="<?= $d['members_housezipcode']?>" disabled>
                           </div>
                       </div>
                       <a class="btn btn-primary editRecord" style="width:100%" href="#" data-toggle="modal" data-target="#editModal" id="<?= $d['members_id'] ?>" data-rec='<?= $d["members_id"] ?>'>UPDATE</a>
                   </form>   
                    <?php }?>
                </div>
              </div>
            </div>
  <!--- update modal-->
  <div id="editModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header"> 
                    <h4 class="modal-title">Update Contact Information</h4> 				
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                      
                </div>  
                <div class="modal-body">  
                    <form>
                       <div class="form-row">
                           <div class="form-group col-md-6">
                               <label for="mobile">Mobile No.</label>
                               <input type="text" class="form-control" id="mobile" value="<?= $d['members_mobileno']?>" disabled>
                           </div>
                           <div class="form-group col-md-6">
                             <label for="tel">Telephone No.</label>
                               <input type="text" class="form-control" id="tel" value="<?= $d['members_housephoneno']?>" disabled>
                           </div>
                       </div>
                        <div class="form-row">
                           <div class="form-group col-md-12">
                               <label for="email">Email Address</label>
                               <input type="text" class="form-control" id="email" value="<?= $d['members_emailaddress']?>" disabled>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-12">
                             <label for="address1">Address 1</label>
                             <input type="text" class="form-control" id="address1" value="<?= $d['members_haddress1']?>" disabled>
                           </div>
                       </div>  
                        <div class="form-row">
                           <div class="form-group col-md-12">
                             <label for="address2">Address 2</label>
                             <input type="text" class="form-control" id="address2" value="<?= $d['members_haddress2']?>" disabled>
                           </div>
                       </div> 
                       <div class="form-row">
                           <div class="form-group col-md-6">
                             <label for="inputCity">City</label>
                             <input type="text" class="form-control" id="inputCity" value="<?= $d['house_city_name']?>" disabled>
                           </div>
                           <div class="form-group col-md-4">
                             <label for="inputProv">Province</label>
                              <input type="text" class="form-control" id="inputProv" value="<?= $d['house_district_name']?>" disabled>
                           </div>
                           <div class="form-group col-md-2">
                             <label for="inputZip">Zip Code</label>
                             <input type="text" class="form-control" id="inputZip" value="<?= $d['members_housezipcode']?>" disabled>
                           </div>
                       </div>
                          <br>
                          <input type="submit" name="button" value="UPDATE" class="btn btn-success" style="width:100%"/>  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>             
            <!-- Begin Page Content -->
        <div class="col-xl-12 col-lg-7">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Membership Records</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Record #</th>
                      <th>Type of Membership</th>
                      <th>Initiator</th>
                      <th>Activation Date</th>
                      <th>Expiration Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($members_record as $row){
                    ?>
                    <tr>
                        <td><?= $row['vehicleinfohead_order']?></td>
                        <td><?= $row['sponsor_name'];?></td>
                        <td><?= $row['membershipinitiator_name']?></td> 
                        <td><?= $row['vehicleinfohead_activedate']?></td>
                        <td><?= $row['vehicleinfohead_expiredate']?></td> 
                        <?php $_SESSION['vehicleinfohead'] = $row['vehicleinfohead_id']; ?>
                        <td><a href="<?php echo site_url('dashboard/renew');?>">View Membership</a></td> 
                    </tr>
                     <?php 
                        
                        }
                     ?> 
                  </tbody>
                </table>
              </div>
            </div>
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
          <a class="btn btn-primary" href="<?php echo site_url('welcome/logout');?>">Logout</a>
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
</body>
</html>
