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
   
   
 <div class="row">
  <div class="column">
       <!--     <div class="zoom">
                <a href="<?php echo site_url('kiosk/dataprivacy');?>">
                    <img src = "<?php echo base_url(); ?>assets/img/membership.png" alt="membership" >
                </a>
            </div>-->
            <div class="clearfix"></div>
  </div>
  
  <div class="column">
            <div class="zoom">
                <a href="<?php echo site_url('kiosk/dataprivacy_pidp');?>">
                    <img src = "<?php echo base_url(); ?>assets/img/pidp.png" alt="pidp"  >
                </a>
            </div>
            <div class="clearfix"></div>
  </div>
  <div class="column">
        <!--    <div class="zoom">
                <a href="<?php echo site_url('kiosk/dataprivacy_motorcycle');?>">
                    <img src = "<?php echo base_url(); ?>assets/img/motorcycle.png" alt="motorcycle" >
                </a>
            </div>-->
            <div class="clearfix"></div>
  </div>
  
</div>
    
  </div>
</div>
    
</body>
</html>
