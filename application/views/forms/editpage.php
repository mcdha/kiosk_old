<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
  <title><?=$title?></title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/aap.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-inputmasked/src/jquery.SimpleMask.js"></script>
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/global.css">
  <!-- for bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/w3.css">
  
  <script type="text/javascript">
  	var $jq1 = jQuery.noConflict(true);
  	
		$(document).ready(function() {
			$('#mobile' ).simpleMask( { 'mask': 'ddd-tel9' } );
			$('#mobile').simpleMask
			(
				{
					'mask': '(####) ###-####',
					'onComplete': function(element)
					{
						console.log('onComplete', element);
					}
				}
			);
			$('#mobile').focus();

			// for tel nos.
			
			$('#phone' ).simpleMask( { 'mask': 'tel9' } );
			$('#phone').simpleMask
			(
				{
					'mask': '###-####',
					'onComplete': function(element)
					{
						console.log('onComplete', element);
					}
				}
			);
			$('#phone').focus();
			//for autocomplete
                $( "#town" ).autocomplete({
	             minLength: 1,
	             source: "getTowns",
	             focus: function( event, ui ) {
	              //  $( "#town" ).val( ui.item.town );
	                   return false;
	             },
	             select: function( event, ui ) {
	            	$( "#town" ).val( ui.item.town );
	            	$( "#city" ).val( ui.item.city );
	                $( "#province" ).val( ui.item.province );
	                $( "#zipcode" ).val( ui.item.zipcode );
	                $( "#province_id" ).val( ui.item.district_id );
	                $( "#city_id" ).val( ui.item.city_id );
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
		              //  $( "#city" ).val( ui.item.city );
		                   return false;
		             },
		             select: function( event, ui ) {
		            	//$( "#town" ).val( ui.item.town );
		            	$( "#city" ).val( ui.item.city );
		                $( "#province" ).val( ui.item.province );
		                $( "#zipcode" ).val( ui.item.zipcode );
		                $( "#province_id" ).val( ui.item.district_id );
		                $( "#city_id" ).val( ui.item.city_id );
		                return false;
		             }
		             
		          }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		             return $( "<li>" )
		             .append( item.city + " " + item.province)
		             .appendTo( ul );
		          };
			
		}); 
	</script>
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
      <li><a href="<?php echo site_url('dashboard/home');?>" class="active">HOME</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">BENEFITS <span class="caret"></span></a>
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

<!-- Page Container -->
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
<div class="table-responsive">

		<?php echo form_open('dashboard/update_info'); 
	    	if (isset($message)){
	    		echo '<h3 style="color:red;">'.$message.'</h3>';
	    	}
	    ?>  
<p style="font-family: Times New Roman; font-size: 20px;">PERSONAL INFORMATION</p>      
  <table class="table">
    <tbody>
      <tr>
        <td class="tableHead">Salutation</td>
        <td class="tableHead">Firstname</td>
        <td class="tableHead">Middlename</td>
        <td class="tableHead">Lastname</td>
      </tr>
      <tr>
	<td><input type="text" name="mtitle"  value="<?php echo $result_info->members_title; ?>" disabled/></td>	   
        <td><input type="text" name="mfirst_name"  value="<?php echo $result_info->members_firstname; ?>" disabled/></td>
        <td><input type="text" name="mmiddle_name"  value="<?php echo $result_info->members_middlename;?>" disabled/></td>
        <td><input type="text"  name="mlast_name" value="<?php echo $result_info->members_lastname;?>" disabled /></td>
      </tr>
      <tr>
        <td class="tableHead">Birth Date</td>
        <td class="tableHead" colspan="2">Birth Place</td>
        <td class="tableHead">Sex</td>
      </tr>
      <tr>
        <td><input type="text" name="mbirth_date" value="<?php echo date('F d,Y', strtotime($result_info->members_birthdate));?>" disabled/></td>
        <td colspan="2"><input type="text" name="mbirth_place"  value="<?php echo $result_info->members_birthplace;?>" disabled /></td>
		<td><input type="text" name="sex"  value="<?php echo $result_info->members_gender;?>" disabled /></td>		
      </tr>
      <tr>
       <td class="tableHead">Age</td>
       <td class="tableHead">Citizenship</td>
       <td class="tableHead">Civil Status</td>
       <td class="tableHead">Occupation</td>
      </tr> 
      <tr>
       <td><input type="text" name="mage"  value=" <?php echo $result_info->members_age; ?>" disabled/></td>
       <td><input type="text" name="mcitizenship"  value=" <?php if ($result_info->nationality_id == 1){echo "FILIPINO";}else {echo "FOREIGNER";}?>" disabled/></td>
       <td><input type="text" name="mcivil_status"  value=" <?php echo $result_info->members_civilstatus; ?>" disabled/></td>
       <td><input type="text" name="moccupation"  value="<?php echo $result_info->occupation_name;?>"/></td>
      </tr> 
    </tbody>
  </table>
  
  <p style="font-family: Times New Roman; font-size: 20px;">CONTACT INFORMATION</p>
  
    <table class="table">
    <tbody>
      <tr>
        <td class="tableHead">Email Address</td>
        <td class="tableHead">Mobile Nos.</td>
        <td class="tableHead">Phone Nos.</td>
      </tr>
      <tr>
        <td><input type="email" name="eadd"  value="<?php echo $result_info->members_emailaddress ?>"/></td>
        <td><input type="text" name="mobile"  id = "mobile" value="<?php echo $result_info->members_mobileno ?>"/></td>
        <td><input type="text" name="phone" id="phone" value="<?php echo$result_info->members_housephoneno ?>"/></td>
      </tr>
      <tr>
        <td class="tableHead">Building No./Street</td>
        <td class="tableHead">Barangay/Town</td>
        <td class="tableHead">City/Municipality</td>
      </tr>
      <tr>
        <td><input type="text" name="street"  value="<?php echo $result_info->members_haddress1 ?>"/></td>
        <td><input type="text" name="town" id="town" value="<?php echo $result_info->members_haddress2 ?>"/></td>
        <td><input type="text" name="city" id="city" value="<?php echo $result_info->city_name ?>"/>
			<input type="hidden" name="cid" id="city_id" value="<?php echo $result_info->city_id ?>"/></td>
      </tr>
      <tr>
       <td class="tableHead">Province</td>
       <td class="tableHead" colspan="2">Zip Code</td>
      </tr> 
      <tr>
       <td><input type="text" name="province" id="province" value="<?php echo $result_info->district_name ?>"/>
			<input type="hidden" name="pid" id="province_id" value="<?php echo $result_info->district_id ?>" /></td>
       <td><input type="text" name="zipcode" id="zipcode" value="<?php echo $result_info->members_housezipcode ?>"/></td>
      </tr> 
    </tbody>
  </table>
  
  <p style="font-family: Times New Roman; font-size: 20px;">CAR DETAILS</p>
  <p style="color:red; font-style: italic;" >Note: To update vehicle details, please call MEMBERSHIP DEPARTMENT Tel.# 705-33-33 loc. 225</p>
  <table class="table" style="text-align: center;" border="1">
    <tbody>
      			<tr style="background-color: #787d7f;">
			    <td class="tableHeadCar">Record #</td>
			    <td class="tableHeadCar">Conduction Sticker</td>
			    <td class="tableHeadCar">Plate #</td>
			    <td class="tableHeadCar">Car Make</td> 
			    <td class="tableHeadCar">Model</td>
			    <td class="tableHeadCar">Year</td>
			    <td class="tableHeadCar">Color</td>
			    <td class="tableHeadCar">Fuel Type</td>
			  </tr>
	  	 <?php  foreach($result_car->result() as $row)
	        {
			echo '<td>';
				echo $row->vehicleinfohead_order;
			echo '</td>';
			echo '<td style="width:15px;">';
				if ($row->vehicleinfo_csticker == 1) {
					echo '<input type="checkbox" name="csticker" value="csticker" checked disabled>';
				}else{
					echo '<input type="checkbox" name="csticker" value="csticker" disabled>';
				}	
			echo '</td>';
			echo '<td>';
				echo $row->vehicleinfo_plateno;
			echo '</td>';
			echo '<td>';
				echo $row->vehiclebrand_name;
			echo '</td>';
			echo '<td>';
				echo $row->vehiclemodel_name;
			echo '</td>';
			echo '<td>';
				echo $row->vehicleinfo_year;
			echo '</td>';
			echo '<td>';
				echo $row->vehiclecolor_name;
			echo '</td>';
			echo '<td>';
				echo $row->vehiclefuel_name;
			echo '</td>';
			echo '</tr>';
			 }?>
    </tbody>
  </table>
  <button type="submit" style="width: 100%"  class="btn btn-primary"> UPDATE</button>
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
