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
  <script src='//pubhtml5.com/plugin/LightBox/js/pubhtml5-light-box-api-min.js'></script>
  <!-- for bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/w3.css">
  
  <style>
  table tr td img {
    height: 200px;
    width: 170px;
}
table tr td{
    text-align: center;
    border: none;
    height: 250px;
    width: 220px;
}
  </style>
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
      	<br/>
		<div class="table-responsive">
      	    <div class="table">
				<legend style="font-family: Times New Roman; font-size: 20px;">AQ MAGAZINE</legend>
					<?php
					
					$v = 9;// volume#
					$i = 1;//issue#
					$base = base_url();
					$aq[9][1] = "<img src='http://online.pubhtml5.com/zleg/btrk/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/btrk/' data-width='1100' data-height='700' data-title='AQ9_1'>
							<br/><a href='".$base."assets/aqmagazine/AQ9_1.pdf'>VOLUME 9 ISSUE 1</a>";
					
					$aq[8][4] = "<img src='http://online.pubhtml5.com/zleg/tbzp/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/tbzp/' data-width='1100' data-height='700' data-title='AQ8_4'>
							<br/><a href='".$base."assets/aqmagazine/AQ8_4.pdf'>VOLUME 8 ISSUE 4</a>";
					
					$aq[8][3] = "<img src='http://online.pubhtml5.com/zleg/yjsk/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/yjsk/' data-width='1100' data-height='700' data-title='AQ8_3'>
							<br/><a href='".$base."assets/aqmagazine/AQ8_3.pdf'>VOLUME 8 ISSUE 3</a>";
					$aq[8][2] = "<img src='http://online.pubhtml5.com/zleg/lirx/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/lirx/' data-width='1100' data-height='700' data-title='AQ8_2'>
							<br/><a href='".$base."assets/aqmagazine/AQ8_2.pdf'>VOLUME 8 ISSUE 2</a>";
					$aq[8][1] = "<img src='http://online.pubhtml5.com/zleg/clms/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/clms/' data-width='1100' data-height='700' data-title='AQ8_1'>
							<br/><a href='".$base."assets/aqmagazine/AQ8_1.pdf'>VOLUME 8 ISSUE 1</a>";
					
					$aq[7][4] = "<img src='http://online.pubhtml5.com/zleg/dton/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/dton/' data-width='1100' data-height='700' data-title='AQ7_4'>
							<br/><a href='".$base."assets/aqmagazine/AQ7_4.pdf'>VOLUME 7 ISSUE 4</a>";
					$aq[7][3] = "<img src='http://online.pubhtml5.com/zleg/sbov/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/sbov/' data-width='1100' data-height='700' data-title='AQ7_3'>
							<br/><a href='".$base."assets/aqmagazine/AQ7_3.pdf'>VOLUME 7 ISSUE 3</a>";
					$aq[7][2] = "<img src='http://online.pubhtml5.com/zleg/nxqj/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/nxqj/' data-width='1100' data-height='700' data-title='AQ7_2'>
							<br/><a href='".$base."assets/aqmagazine/AQ7_2.pdf'>VOLUME 7 ISSUE 2</a>";
					$aq[7][1] = "<img src='http://online.pubhtml5.com/zleg/wejk/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/wejk/' data-width='1100' data-height='700' data-title='AQ7_1'>
							<br/><a href='".$base."assets/aqmagazine/AQ7_1.pdf'>VOLUME 7 ISSUE 1</a>";
					
					$aq[6][4] = "<img src='http://online.pubhtml5.com/zleg/anyp/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/anyp/' data-width='1100' data-height='700' data-title='AQ6_4'>
							<br/><a href='".$base."assets/aqmagazine/AQ6_4.pdf'>VOLUME 6 ISSUE 4</a>";
					$aq[6][3] = "<img src='http://online.pubhtml5.com/zleg/piyt/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/piyt/' data-width='1100' data-height='700' data-title='AQ6_2'>
							<br/><a href='".$base."assets/aqmagazine/AQ6_3.pdf'>VOLUME 6 ISSUE 3</a>";
					$aq[6][2] = "<img src='http://online.pubhtml5.com/zleg/kbto/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/kbto/' data-width='1100' data-height='700' data-title='AQ6_3'>
							<br/><a href='".$base."assets/aqmagazine/AQ6_2.pdf'>VOLUME 6 ISSUE 2</a>";
					$aq[6][1] = "<img src='http://online.pubhtml5.com/zleg/erkn/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/erkn/' data-width='1100' data-height='700' data-title='AQ6_1'>
							<br/><a href='".$base."assets/aqmagazine/AQ6_1.pdf'>VOLUME 6 ISSUE 1</a>";
					
					$aq[5][4] = "<img src='http://online.pubhtml5.com/zleg/hrvi/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/hrvi/' data-width='1100' data-height='700' data-title='AQ5_4'>
							<br/><a href='".$base."assets/aqmagazine/AQ5_4.pdf'>VOLUME 5 ISSUE 4</a>";
					$aq[5][3] = "<img src='http://online.pubhtml5.com/zleg/luyu/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/luyu/' data-width='1100' data-height='700' data-title='AQ5_3'>
							<br/><a href='".$base."assets/aqmagazine/AQ5_3.pdf'>VOLUME 5 ISSUE 3</a>";
					$aq[5][2] = "<img src='http://online.pubhtml5.com/zleg/kukq/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/kukq/' data-width='1100' data-height='700' data-title='AQ5_2'>
							<br/><a href='".$base."assets/aqmagazine/AQ5_2.pdf'>VOLUME 5 ISSUE 2</a>";
					$aq[5][1] = "<img src='http://online.pubhtml5.com/zleg/mhko/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/mhko/' data-width='1100' data-height='700' data-title='AQ5_1'>
							<br/><a href='".$base."assets/aqmagazine/AQ5_1.pdf'>VOLUME 5 ISSUE 1</a>";
					
					$aq[4][4] = "<img src='http://online.pubhtml5.com/zleg/tban/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/tban/' data-width='1100' data-height='700' data-title='AQ4_4'>
							<br/><a href='".$base."assets/aqmagazine/AQ4_4.pdf'>VOLUME 4 ISSUE 4</a>";
					$aq[4][3] = "<img src='http://online.pubhtml5.com/zleg/nqmm/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/nqmm/' data-width='1100' data-height='700' data-title='AQ4_3'>
							<br/><a href='".$base."assets/aqmagazine/AQ4_3.pdf'>VOLUME 4 ISSUE 3</a>";
					$aq[4][2] = "<img src='http://online.pubhtml5.com/zleg/bewa/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/bewa/' data-width='1100' data-height='700' data-title='AQ4_2'>
							<br/><a href='".$base."assets/aqmagazine/AQ4_2.pdf'>VOLUME 4 ISSUE 2</a>";
					$aq[4][1] = "<img src='http://online.pubhtml5.com/zleg/wnjo/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/wnjo/' data-width='1100' data-height='700' data-title='AQ4_1'>
							<br/><a href='".$base."assets/aqmagazine/AQ4_1.pdf'>VOLUME 4 ISSUE 1</a>";
					
					$aq[3][4] = "<img src='http://online.pubhtml5.com/zleg/eydj/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/eydj/' data-width='1100' data-height='700' data-title='AQ3_4'>
							<br/><a href='".$base."assets/aqmagazine/AQ3_4.pdf'>VOLUME 3 ISSUE 4</a>";
					$aq[3][3] = "<img src='http://online.pubhtml5.com/zleg/zetl/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/zetl/' data-width='1100' data-height='700' data-title='AQ3_3'>
							<br/><a href='".$base."assets/aqmagazine/AQ3_3.pdf'>VOLUME 3 ISSUE 3</a>";
					$aq[3][2] = "<img src='http://online.pubhtml5.com/zleg/wtdl/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/wtdl/' data-width='1100' data-height='700' data-title='AQ3_2'>
							<br/><a href='".$base."assets/aqmagazine/AQ3_2.pdf'>VOLUME 3 ISSUE 2</a>";
					$aq[3][1] = "<img src='http://online.pubhtml5.com/zleg/ymqk/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/ymqk/' data-width='1100' data-height='700' data-title='AQ3_1'>
							<br/><a href='".$base."assets/aqmagazine/AQ3_1.pdf'>VOLUME 3 ISSUE 1</a>";					
					
					$aq[2][4] = "<img src='http://online.pubhtml5.com/zleg/yfqx/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/yfqx/' data-width='1100' data-height='700' data-title='AQ2_4'>
					    	<br/><a href='".$base."assets/aqmagazine/AQ2_4.pdf'>VOLUME 2 ISSUE 4</a>";
					$aq[2][3] = "<img src='http://online.pubhtml5.com/zleg/maux/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/maux/' data-width='1100' data-height='700' data-title='AQ2_3'>
					    	<br/><a href='".$base."assets/aqmagazine/AQ2_3.pdf'>VOLUME 2 ISSUE 3</a>";
					$aq[2][2] = "<img src='http://online.pubhtml5.com/zleg/pbae/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/pbae/' data-width='1100' data-height='700' data-title='AQ2_2'>
					    	<br/><a href='".$base."assets/aqmagazine/AQ2_2.pdf'>VOLUME 2 ISSUE 2</a>";
					$aq[2][1] = "<img src='http://online.pubhtml5.com/zleg/twby/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/twby/' data-width='1100' data-height='700' data-title='AQ2_1'>
					    	<br/><a href='".$base."assets/aqmagazine/AQ2_1.pdf'>VOLUME 2 ISSUE 1</a>";
					
					$aq[1][4] = "Volume 1 Issue 4";
					$aq[1][3] = "<img src='http://online.pubhtml5.com/zleg/asyi/files/shot.jpg' data-rel='fh5-light-box-demo' data-href='http://online.pubhtml5.com/zleg/asyi/' data-width='1100' data-height='700' data-title='AQ1_3'>
					    		<br/><a href='".$base."assets/aqmagazine/AQ1_3.pdf'>VOLUME 1 ISSUE 3</a>";				
					$aq[1][2] = "Volume 1 Issue 2";
					$aq[1][1] = "Volume 1 Issue 1";	
									
					$aq[0][4] = "Nothing to display";
					$aq[0][3] = "Nothing to display";
					$aq[0][2] = "Nothing to display";
					$aq[0][1] = "Nothing to display";
					
					if ($i == 1) {
						echo '<table border="1">';	
							for ($vol = $v; $vol >= 1; $vol--) {
							  echo '<tr>';
							  	echo '<td>'.$aq[$vol][1].'</td>';
							  	echo '<td>'.$aq[$vol-1][4].'</td>';
							  	echo '<td>'.$aq[$vol-1][3].'</td>';
							  	echo '<td>'.$aq[$vol-1][2].'</td>';			
							  }
							 echo '</tr>';
						echo '</table>';
					}elseif ($i == 2){
						echo '<table>';	
							for ($vol = $v; $vol >= 1; $vol--) {
							  echo '<tr>';
							  	echo '<td>'.$aq[$vol][2].'</td>';
							  	echo '<td>'.$aq[$vol][1].'</td>';
							  	echo '<td>'.$aq[$vol-1][4].'</td>';
							  	echo '<td>'.$aq[$vol-1][3].'</td>';			
							  }
							 echo '</tr>';
						echo '</table>';	 
					}elseif ($i == 3){
						echo '<table>';	
							for ($vol = $v; $vol >= 1; $vol--) {
							  echo '<tr>';
							  	echo '<td>'.$aq[$vol][3].'</td>';
							  	echo '<td>'.$aq[$vol][2].'</td>';
							  	echo '<td>'.$aq[$vol][1].'</td>';
							  	echo '<td>'.$aq[$vol-1][4].'</td>';			
							  }
							 echo '</tr>';
						echo '</table>';	 
					}else{
						echo '<table>';	
							for ($vol = $v; $vol >= 1; $vol--) {
							  echo '<tr>';
								for ($iss = $i; $iss >=1 ; $iss--) {
								  		echo '<td>'.$aq[$vol][$iss].'</td>';
								}
							}	
							 echo '</tr>';
						echo '</table>';
					}
					?>
      		</div>
		</div>	
      		
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
