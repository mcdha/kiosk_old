<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Member Portal - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/css/sb-admin-2.min.css" rel="stylesheet">
  <style type="text/css">
      ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #D3D3D3;
            opacity: 1; /* Firefox */
          }

          :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #D3D3D3;
          }

          ::-ms-input-placeholder { /* Microsoft Edge */
            color: #D3D3D3;
          }
  /* input type field wrapper */
        .field-wrapper{
            position: relative;
            margin-bottom: 15px;
        }
		
        .field-wrapper input{
            border: 1px solid #DADCE0;
            padding: 15px;
            border-radius: 4px;
            width: 100%;
        }
 
        .field-wrapper .field-placeholder{
            font-size: 18px;
            position: absolute;
            /* background: #fff; */
            top: 17px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #80868b;
            left: 8px;
            padding: 0 8px;
            -webkit-transition: transform 150ms cubic-bezier(0.4,0,0.2,1),opacity 150ms cubic-bezier(0.4,0,0.2,1);
            transition: transform 150ms cubic-bezier(0.4,0,0.2,1),opacity 150ms cubic-bezier(0.4,0,0.2,1);
            z-index: 1;
            text-align: left;
            width: 100%;
        }        
        
        .field-wrapper .field-placeholder span{
            /*background: #f2f2f2;*/
            background: #ffffff;
            padding: 0px 8px;
        }
 
        .field-wrapper input:not([disabled]):focus~.field-placeholder
        {
            color:#1A73E8;
        }
		
        .field-wrapper input:not([disabled]):focus~.field-placeholder,
        .field-wrapper.hasValue input:not([disabled])~.field-placeholder
        {
            -webkit-transform: scale(.75) translateY(-39px) translateX(-60px);
            transform: scale(.75) translateY(-39px) translateX(-60px);
            
        }
        .field-wrapper.hasValue .field-placeholder span{
            
            background: #ffffff;
            padding: 0px 8px;
        }
        
        
        
       
    /*end field wrapper*/  
    /*image animation*/
#cf {
  position:relative;
  height:650px;
  width:100%;
  margin:0 auto;
}

#cf img {
  position:absolute;
  left:0;
  -webkit-transition: opacity 1s ease-in-out;
  -moz-transition: opacity 1s ease-in-out;
  -o-transition: opacity 1s ease-in-out;
  transition: opacity 1s ease-in-out;
}

/*#cf img.top:hover {
  opacity:0;
}*/

#cf img { 
                width:100%; 
                height:100%; 
} 
            
@keyframes cf3FadeInOut {
  0% {
  opacity:1;
}
45% {
opacity:1;
}
55% {
opacity:0;
}
100% {
opacity:0;
}
}

#cf img.top {
animation-name: cf3FadeInOut;
animation-timing-function: ease-in-out;
animation-iteration-count: infinite;
animation-duration: 10s;
animation-direction: alternate;
}            
  </style>

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
                <!--<div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-repeat: no-repeat;">-->
                <div class="col-lg-6 d-none d-lg-block" > 
                    <div id="cf">
                       <img class="bottom" src="<?php echo base_url(); ?>assets/img/slide2.jpg" />
                       <img class="top" src="<?php echo base_url(); ?>assets/img/slide1.jpg" />
                    </div>
                </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                  	<img src="<?php echo base_url(); ?>assets/img/aap_logo.png" style="width:100px"/>
                    <h1 class="h4 text-gray-900 mb-4">AAP Member Portal</h1>
                  </div>
                    <span class="text-success" style="text-align: center;">
                        <?php 
                         echo form_open('welcome/auth'); 
                            if (isset($username)){
                                     if(isset($message_display)){
                                            echo $username.', '.$message_display;
                                     }
                            }	 
                            else {
                                    if(isset($message_display)){
                                            echo $message_display;
                                     }
                            }	 
                        ?>
                    </span>
                    <br/>
                    <br/>		
                    <div class="row">
                        <div class="col-lg">
                            <div class="field-wrapper hasValue">
                                <input type="text" name="username" id="username" placeholder="Enter Email Address or Mobile No." required>
                                <div class="field-placeholder"><span>Email Address/ Mobile No.</span></div>    
                            </div>
                            <div class="field-wrapper">
                                <input type="password" name="password" id="password" required>
                                <div class="field-placeholder"><span>Password</span></div>
                            </div>
                        </div>
                    </div>
                   <form class="user">
                        <button type="submit" class="btn btn-primary btn-user btn-block" style="width:100%">Log in</button>
                         <?php echo form_close(); ?>  
                        <hr>
                    </form>
                   <!--      <a href="<?php echo site_url('online/soon');?>" class="btn btn-google btn-user btn-block">
                          <i class="fab fa-google fa-fw"></i> Log in with Google
                        </a>
                        <a href="<?php echo site_url('online/soon');?>" class="btn btn-facebook btn-user btn-block">
                          <i class="fab fa-facebook-f fa-fw"></i> Log in with Facebook
                        </a>
                    
                    <hr>-->
                    <div class="text-center">
                      <a class="small" href="<?php echo site_url('welcome/forgot_password');?>">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="<?php echo site_url('welcome/forgot_mobile');?>">Log in with one-time password (OTP) via registered number.</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="<?php echo site_url('welcome/registration_mobile');?>">Create an account!</a>
                    </div>
                    <hr>
                    <a href="<?php echo site_url('online/applicationform');?>" class="btn btn-info btn-user btn-block">
                      Not yet an AAP Member? Sign Up Now!
                    </a>
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
<script>
 $(function () {
            //label of input field  
            $(".field-wrapper .field-placeholder").on("click", function () {
                $(this).closest(".field-wrapper").find("input").focus();
            });
            $(".field-wrapper input").on("keyup", function () {
                var value = $.trim($(this).val());
                
                if (value) {
                    $(this).closest(".field-wrapper").addClass("hasValue");
                } else {
                    $(this).closest(".field-wrapper").removeClass("hasValue");
                }
            });
        });        
</script>
</body>

</html>