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
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/kiosk.css">
</head>
<body>

<div class="container mt-3">
    <!-- Tab panes -->
    <div class="tab-content border mb-3" style="background-color: white;">
        
            
                <br/>
		<?php
                    date_default_timezone_set('Asia/Manila');
                    echo '<p  style="margin-left:50px">'. date('l, jS F Y g:ia').'</p>';
                    ?>
                <br/>
				<!--Please take the number and check on the screen for your turn. (Use if the process includes a monitor flashing the next applicant)-->
                <h1 style="text-align:center">
				
				Please have a seat and
				</h1>
				<h1 style="text-align:center">
				wait for your name to be called.
				</h1>
                <br/>
		<br>
                <h1 style="text-align:center;  font-size: 50px;">Ticket No.</h1>
                <br>
               
		<h1 style="text-align:center; font-size: 150px;">
              
                  <?php echo $ref;?>
                </h1>
                <br>
				<h3 style="text-align:center;  font-size: 50px;"><?= $typecat ?></h3>
		<br>
		<br>
		<br>
		<br>
				
        <a style="text-align:center" href="<?php echo site_url('kiosk') ?>"> <h1 >NEXT >>>>></h1> </a>
  
</div>
</body>
</html>
