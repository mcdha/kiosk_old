<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/aap.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/kiosk.css">
<style>
.block {
  display: block;
  width: 75%;
  border: none;
  color: #0264d6;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.block:hover {
  background-color:#0264d6;
  color: yellow;
}
.container{
	margin-top:100px
}
</style>
</head>
<body>
 <div class="container">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                <a href="https://qrco.de/bcsfEN">HOME
                    
                </a>
				<a href="https://qrco.de/bcsfEN"><span style="color:red">CANCEL</span>
                   
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
				<img src = "<?php echo base_url(); ?>assets/img/aaplogo.png" class="center" style="width:25%">
				<br>
				<br>
				<h1 style="text-align:center">What would you like to do?</h1>
				<br>
				<br>
				<div class="row justify-content-md-center">
                    <div class="col-lg-6">
						  <center>
						  <a href="<?php echo site_url('kiosk/pidp_new') ?>" class="block btn btn-warning">APPLY FOR NEW PIDP</a>
						  </center>
						<div style="background-color:white;height: 10px; margin: 20px;"> </div>
					</div>
					<div class="col-lg-6">
						  <center>
						  <a href="<?php echo site_url('kiosk/pidp_search') ?>" class="block btn btn-warning">RENEW PIDP</a>
						  </center>
						
					</div>
				</div>	
				<br>
				<br>
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
</body>
</html>
