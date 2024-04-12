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
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/kiosk.css">
    
<style>
* {
  box-sizing: border-box;
}

.zoom {
  padding: 50px;
  transition: transform .2s;
  width: 200px;
  height: 200px;
}

.zoom:hover {
  -ms-transform: scale(1.4); /* IE 9 */
  -webkit-transform: scale(1.4); /* Safari 3-8 */
  transform: scale(1.4); 
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 35%;
  
}

.column {
  width: 33.33%;
  padding: 5px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}
.zoom img { 
        width:250%; 
} 


.buttons {
  background-color: #ffdd00;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.buttons:hover {
  background-color: #002d6a;
}
</style>
</head>
<body>  
<div class="main">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col">
				<img src = "<?php echo base_url(); ?>assets/img/aaplogo.png" class="center" style="width:50%">
			</div> 
			<div class="clearfix"></div>
		</div> 
		<div class="row justify-content-md-center">
			<div class="col-sm-4">
				<a href="<?php echo site_url('kiosk/dataprivacy');?>" class="buttons">
						   MEMBERSHIP
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?php echo site_url('kiosk/dataprivacy_pidp');?>" class="buttons" >
							PIDP
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?php echo site_url('kiosk/dataprivacy_motorcycle');?>" class="buttons" >
							MOTORCYCLE
				</a>
			</div>
		</div> 
	</div>
</div>
    
</body>
</html>
