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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('welcome/dashboard');?>">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url(); ?>assets/img/logo.png"  style="width:100%;" class="center"/>
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
            <a class="collapse-item" href="#">Membership History</a>
            <a class="collapse-item" href="#">Pidp History</a>
            <a class="collapse-item" href="#">ERS History</a>
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
                        echo $r['members_lastname'].','.$r['members_firstname'];
                    }
                ?>
                </span>
                <i class="fas fa-user-circle fa-fw"></i>
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

         
        <!-- Begin Page Content -->
        <div class="col-xl-12 col-lg-7">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rewards Program</h6>
            </div>
            <div class="card-body">
    <div class="w3-twothird">
      <div class="w3-container w3-card w3-white w3-margin-bottom">
      	<h2 style="background-color:#151848; color:white; ">REWARDS PROGRAM</h2>
      	<p>As a way of thanking its loyal members, Automobile Association Philippines (AAP) -the national auto club- offers a new program called AAP Rewards Program. 
      	Since May 2015, members can earn points that may be redeemed when availing AAP products and services like Tires, Insurance, Caravan, Travel Services, Towing service, Repairs and for paying the renewal and additional membership, PIDP new and renewal.</p>
  		<div class="well">
  			<h3 style="background-color:#f6d400; color:black;">How to Earn Points</h3>
  			<p>There are different ways for members to earn points. Just like any rewards program, the AAP Rewards Program has its rules and corresponding points a member can earn.</p>
  			<p>Non-use of Emergency Roadside Service (ERS): Non-use of ERS points given differ according to their membership category.</p>
  		</div>
                <div class="row">
  		   <div class="col-lg-6">
  			<div class="w3-container w3-card w3-white w3-margin-bottom">
		  		<p style="font-weight: bold;">REGULAR INDVIDUAL</p>
		  		<p>2 Consecutive Years -------------- 400 pts.</p>
		  		<p>3 Consecutive Years -------------- 450 pts.</p>
		  		<p>4 Consecutive Years -------------- 500 pts.</p>
		  		<p>5 Consecutive Years -------------- 550 pts.</p>
  			</div>
	  	   </div>
	  	   <div class="col-lg-6">
	  			<div class="w3-container w3-card w3-white w3-margin-bottom">
			  	<p style="font-weight: bold;">ASSOCIATE INDIVIDUAL</p>
			  	<p>2 Consecutive Years -------------- 200 pts.</p>
		  		<p>3 Consecutive Years -------------- 225 pts.</p>
		  		<p>4 Consecutive Years -------------- 250 pts.</p>
		  		<p>5 Consecutive Years -------------- 275 pts.</p>
	  			</div>
	  	   </div>
                </div>    
	  	<div class="well">
  			<p>Members can also earn points when availing of products in AAP Autocare Service Center. </p>
			<p>&nbsp; &nbsp; &nbsp;Lubricants  -------------------- 1 pt. for every P200</p>
			<p>&nbsp; &nbsp; &nbsp;Tires -------------------------- 1 pt. for every P200</p>
			<br/>
		    <p>Another way of earning points from AAP Travel when you join caravan and avail of travel services. </p>
		    <p>&nbsp; &nbsp; &nbsp;Caravan ----------------------- 1 pt. for every P200</p>
		    <p>&nbsp; &nbsp; &nbsp;Travel Services --------------- 1 pt. for every P200</p>
		    <br/>
		    <p>You can also earn points when you buy any souvenir items from AAP boutique.</p>
		    <p>&nbsp; &nbsp; &nbsp;Boutique Items ---------------- 1 pt. for every P200</p>
		    <br/>
		    <p>Members who choose the online version of AQ magazine rather than the printed copy upon registration/renewal of membership will be given corresponding points.</p>
            <p>&nbsp; &nbsp; &nbsp;Online AQ Magazine ------------ 100 pts. per year </p>
		</div>
  		<div class="well">
  			<h3 style="background-color:#f6d400; color:black;">How to Redeem Points</h3>
  			<p>Points can be redeemed by availing of the products and services of AAP like Tires, Insurance, Caravan, Travel Services, Towing service, Repairs and for paying the renewal and additional membership, PIDP new and renewal.</p>
			<p>Membership should be active to redeem points.</p>
  			
  		</div>
  		<div class="well">
  			<h3 style="background-color:#f6d400; color:black;">How to Transfer Points</h3>
  			<p>Points are transferable to another person's membership account provided that the member will sign the transfer of points form in any AAP office.</p>

  		</div>
	  </div>
	  
	  <!-- 2nd container -->
	  <div class="w3-container w3-card w3-white w3-margin-bottom">
      	<h2 style="background-color:#151848; color:white;">MEMBER GET MEMBER PROGRAM</h2>
      	<div class="well">
  			<p>Members who referred another individual to join AAP will be given points depending on the number of referral and their membership category.</p>
  		</div>
                <div class="row">
                    <div class="col-lg-6">
  			<div class="w3-container w3-card w3-white w3-margin-bottom">
		  		<p style="font-weight: bold;">REGULAR INDVIDUAL</p>
		  		<p>1 Year ---------------------- 200 pts. </p>
		  		<p>3 Years --------------------- 500 pts.</p>
  			</div>
                    </div>
                    <div class="col-lg-6">
  			<div class="w3-container w3-card w3-white w3-margin-bottom">
		  		<p style="font-weight: bold;">ASSOCIATE INDIVIDUAL</p>
		  		<p>1 Year ---------------------- 100 pts.</p>
		  		<p>3 Years --------------------- 250 pts.</p>
  			</div>
                    </div>
                </div>
	  </div>
	  
	  <!-- 3rd container -->
	  <div class="w3-container w3-card w3-white w3-margin-bottom">
            <h2 style="background-color:#151848; color:white;">TERMS & CONDITIONS</h2>
            <div class="well">
  			<p>1. "Non-Use of ERS" points are applicable for REGULAR, PIDP, MOTORSPORT and ASSOCIATE INDIVIDUAL membership only.</p>
  			<p>2. 1 point is equivalent to 1 Peso.</p>
  			<p>3. Not convertible to cash.</p>
  			<p>4. Minimum of 50 points to redeem.</p>
  			<p>5. Points are valid as long as the membership is active; once expired, a member will be given 7 days grace period to renew, otherwise points will be forfeited. </p>
  			<p>6. Points will be given only on the cash portion  of the availment or purchased items (points redeemed will no longer earn points).</p>
  			<p>7. Points for online AQ magazine will be generated on the anniversary date of membership and can be redeemed upon renewal.</p>
  			<p>8. AAP Employees who are members are not allowed to be given points for the member-get-member program.</p>
  		</div>
	  </div>
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
