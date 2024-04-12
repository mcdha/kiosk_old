<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?></title>
    <!-- Include the above in your HEAD tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <style>
.center-block {
  display: block;
  margin-right: auto;
  margin-left: auto;
}
.otp-input{
text-align: center;
height: calc(1.5em + .75rem + 2px);
padding: .375rem .75rem;
font-size: 1rem;
font-weight: 400;
line-height: 1.5;
color: #495057;
background-color: #fff;
background-clip: padding-box;
border: 1px solid #ced4da;
border-radius: .25rem;
}
.error{
    color:red;
    text-align: center
}
    </style>
</head>
<body>
<div class="container mt-3">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-center" >One-Time Password Verification
                  </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <div style="text-align: center;">
                            <span class="error">
                            <?php 
                            echo $this->session->flashdata('email_sent'). '<br/>'; 
                            if(isset($message_display)){
		  		echo $message_display;
                            }
                            $_SESSION['otp'] = $otp;
                            $_SESSION['pword'] = $pword;
                            $_SESSION['start'] = time();
                            ?>
                            </span>
                        </div>
                        <span class="success">
                            <p> Your One-Time Password (OTP) has been sent to your email address <b>
                                <?php if(isset($username)){
                                       echo $username;
                                       $_SESSION['username'] = $username;
                                }?></b>. Please enter the OTP within ten minutes to complete the registration.</p>
                        </span>
                        <div style="text-align: center;">
                        <?php echo form_open('welcome/forgot_password_auth'); ?> 
                            <div class="center-block">
                                <input type="text" class="otp-input" placeholder="Enter OTP" id="otp" name="otp" style="width:50%;" required/>
                            </div>
                            <br/>
                            <span>
                            <button id="submit" class="btn btn-success" name="button" value="6" >VERIFY OTP</button>
                            </span>
                            <span>
                            <a href="<?php echo site_url('welcome/forgot_password');?>"> <button type="button"  class="btn btn-primary">CANCEL</button> </a>
                            </span>
                            <?php echo form_close(); ?>
                            <?php echo form_open('welcome/forgot_password_auth'); ?>
                            <br/>
                            <button class="btn btn-info" id="resend" name="button" value="4" >RESEND OTP</button>
                            <?php echo form_close(); ?>
                        </div>    
                </div>
                <div class="card-footer">
                        <div class="container my-auto">
                          <div class="copyright text-center my-auto">
                            <span>Copyright &copy; 2020. Automobile Association Philippines</span>
                          </div>
                        </div>
                </div>
        </div>
    </div>
</div>
</div>
</body>
</html>

