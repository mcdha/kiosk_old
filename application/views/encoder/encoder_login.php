<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Encoder - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?php echo base_url(); ?>assets/img/aaplogo.png" style="width:100px"/>
                    <h1 class="h4 text-gray-900 mb-4">Encoder Portal</h1>
                  </div>
                    <?php echo form_open('encoder/loginAuth','class="user"'); ?>
                    <?php if(! is_null($msg)) echo $msg;?>  
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password"  placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login"/>
                  
                  <?php echo form_close(); ?> 
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
