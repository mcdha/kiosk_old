<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title><?=$title?></title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/aap.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/global.css">
  <!-- for bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/w3.css">
  
</head>
<body>
 <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#151848; padding-top:35px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	  <div class="navbar-brand">
		<img  style="width: 250px; position: relative; margin-top: -50px" src="<?php echo base_url(); ?>assets/img/aaplogo.png" >
	  </div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="<?php echo site_url('dashboard/home');?>">HOME</a></li>
      <li class="dropdown"><a class="dropdown-toggle active" data-toggle="dropdown" href="#">BENEFITS <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('benefits/availment');?>">MEMBERSHIP BENEFITS</a></li>
          <li><a href="<?php echo site_url('benefits/aq');?>">AQ MAGAZINE</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">REWARDS <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('dashboard/rewards');?>">REWARDS HISTORY</a></li>
          <li><a href="<?php echo site_url('dashboard/aboutRewards');?>">ABOUT REWARDS PROGRAM</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">HISTORY<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('history/history_home');?>">MEMBERSHIP HISTORY</a></li>
          <li><a href="<?php echo site_url('history/pidpHistory');?>">PIDP HISTORY</a></li>
          <li><a href="<?php echo site_url('benefits/ersHistory');?>">ERS HISTORY</a></li>
        </ul>
      </li>
	  </ul>
      <ul class="nav navbar-nav navbar-right">
         <li><a href="<?php echo site_url('welcome/logout');?>"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav> 
<div style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding" style="margin-top:150px;">
  
    <!-- Left Column -->
    <div class="w3-third">
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">
          <div id="divImage">
				<?php 
			//$ServerPath = $_SERVER['SCRIPT_FILENAME']; // getting server path
			/*$ServerPath = $_SERVER['DOCUMENT_ROOT']; // getting server path
       			$uploaddir = substr($ServerPath, 0 , strrpos($ServerPath,"/") + 1);
			$image = $uploaddir ."html/aaptest/resources/member_pictures/". $result_info->members_id.".jpg";
			*/
			$image = "http://58.71.17.148/aaptest/resources/member_pictures/". $result_info->members_id.".jpg";
			
			 
			if(@getimagesize($image)){			
			?>
				<img src = "http://58.71.17.148/aaptest/resources/member_pictures/<?php echo $result_info->members_id;?>.jpg">
			<?php 
			}else {
			?>
				<img src = "<?php echo base_url(); ?>assets/img/no_image.png">
			<?php 		
			}
			?>
		  </div>
		  <div id="divImgInfo">
		    <p><b><?php echo $result_info->members_code ?></b></p>
		  	<p><b><?php echo $result_info->members_firstname.' '. $result_info->members_middlename.' '.$result_info->members_lastname; ?></b></p>   
		   	<p><b>Points Earned</b></p>
			<p><a href="<?php echo site_url('dashboard/rewards');?>">
		   		<?php $total = 0;
		   		$total = $result_points->points - ($result_redeem->redeem + $result_transfer->transfer);
		   		echo $total;
		   		?>
		   </a>
		   <p><b>ERS Benefits</b></p>
		  <p style="text-align: left;font-size: 12px;">Available no. of Tow Distance:  <?php echo $result_benefits->membershipbenefit_mileage;?></p>
		   <p style="text-align: left;font-size: 12px;">Available no. Intervention:   <?php echo $result_benefits->membershipbenefit_towing;?></p>
		  </div>
		  <div id="divButton">
		  	<a href="<?php echo site_url('dashboard/editProfile');?>" class="btn btn-primary" style="width: 100%" role="button">UPDATE PROFILE</a>
		  </div>
     
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
      <div class="w3-container w3-card w3-white w3-margin-bottom">
		<fieldset>
		   <legend style="font-family: Times New Roman; font-size: 20px;">Emergency Roadside Service Benefits</legend>
		  <p>Available no. of Tow Distance:  <?php echo $result_benefits->membershipbenefit_mileage;?></p>
		  <p>Available no. Intervention:   <?php echo $result_benefits->membershipbenefit_towing;?></p>
		  <br/>
		 <p><span style="color: red;">Note: </span>Whichever comes first</p>
		</fieldset>
		<br>
		<p style="font-weight: bold;">GLASS ETCHING</p>
		<p>Two (2) FREE Glass Etching</p><br/>
		<p style="font-weight: bold;">LTO VEHICLE REGISTRATION ASSISTANCE</p>
		<p>All cars registered under your membership.</p><br/>
		
		<!-- insert code per record -->
		<p style="font-weight: bold;">PERSONAL ACCIDENT INSURANCE</p>
		<?php 
		 foreach ($result_recordsIns->result() as $row){
		 	echo "<p> Record #";
		 	echo $row->vehicleinfohead_order." - ";
		 	echo $row->sponsor_name." ";
		 	if($row->sponsor_id == 7 || $row->sponsor_id ==3){
		 		echo '(300,000)';
		 	}else if($row->sponsor_id == 5){
		 		echo '(200,000)';
		 	}else if(($row->sponsor_id == 15 ||$row->sponsor_id == 16) AND $assignee == 1){
		 		echo '(200,000)';
		 	}else{
		 		echo 'No Personal Accident Insurance';
		    }
		    echo "</p>";
		 } 
		?>
		  <!--END w3-container -->
	  </div>	
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>
<div class="footer" style="background-color:#151848; padding: 10px;text-align: center; color:white;">
	<div class="container">
		<span class="glyphicon glyphicon-copyright-mark"></span> 2018 Automobile Association Philippines
	</div>
</div>
</body>
</html>
