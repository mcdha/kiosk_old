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

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your mobile number or email address below and we'll send you an OTP to reset your account!</p>
                  </div>
                  
                    <span class="text-success" style="text-align: center;">
                        <?php 
                         echo form_open('welcome/forgot_password_auth', "class='user'"); 
                            if(isset($message_display)){
                                echo $message_display;
                            } 
                        ?>
                    </span>
                    <br/>
                    <br/>	
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="username" placeholder="Enter Mobile Number or Email Adress" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user"  aria-describedby="emailHelp" name="pword" placeholder="Enter Password"  required="" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.verifypw.pattern = this.value;">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" aria-describedby="emailHelp"  name="verifypw" placeholder="Re-enter password" required="" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');">
                    </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block" value="1" name="button">Send OTP to Email address</button>
                      <button type="submit" class="btn btn-primary btn-user btn-block" value="2" name="button">Send OTP to Mobile Number</button>
                    <?php echo form_close(); ?> 
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo site_url('welcome/registration_mobile');?>">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?php echo site_url('welcome/login');?>">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

</body>

</html>
