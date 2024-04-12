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
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-repeat: no-repeat;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                  	<img src="<?php echo base_url(); ?>assets/img/aaplogo.png" style="width:100px"/>
                    <h1 class="h4 text-gray-900 mb-4">AAP Member Portal</h1>
                  </div>
                  <?php echo form_open('welcome/mobile_registration'); ?> 
            
                    <div style="text-align: center;">
                        <span class="text-danger">
                         <?php 
                            if(isset($message_display)){
                                echo $message_display;
                            }
                        ?>
                        </span>
                    </div>		 
                    <br/>
                        <div class="row">
                                    <div class="col-lg">
                                        <div class="field-wrapper hasValue">
                                            <input type="text" class="input" placeholder="0999XXXXXXX" name="mobile"  id = "mobile" value="<?php echo isset($_POST["mobile"]) ? $_POST["mobile"] : ''; ?>"  maxlength="11" pattern="\d{11}" title="Please enter 11 digits mobile number" required>
                                            <div class="field-placeholder"><span>Mobile Number</span></div>    
                                        </div>
                                        <div class="field-wrapper hasValue">
                                            <input type="text" class="input" placeholder="PIN Code" name="memberscode" value="<?php echo isset($_POST["memberscode"]) ? $_POST["memberscode"] : ''; ?>" required >
                                            <div class="field-placeholder"><span>Member's PIN Code</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue">
                                            <input type="text" class="lower" name="birthday" id="birthday" value="<?php echo isset($_POST["birthday"]) ? $_POST["birthday"] : ''; ?>"
                                                    placeholder="yyyy-mm-dd"
                                                    onkeyup=" var v = this.value;
                                                            if (v.match(/^\d{4}$/) !== null) {
                                                               this.value = v + '-';
                                                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                                               this.value = v + '-';
                                                            }"
                                                                 maxlength="10" required="">
                                            <div class="field-placeholder">
                                                <span>Birth Date</span>
                                            </div>
                                        </div>
                                        <div class="field-wrapper">
                                            <input type="password" class="input" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.verifypw.pattern = this.value;" placeholder="Password" name="pword" required>
                                            <div class="field-placeholder"><span>Password</span></div>
                                        </div>
                                        
                                        <div class="field-wrapper">
                                            <input type="password" class="input" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Re-enter Password" name="verifypw" required>
                                            <div class="field-placeholder"><span>Re-enter Password</span></div>
                                        </div>  
                                    </div>
                    </div>
            <button class="btn btn-primary btn-user btn-block" id="submit" name="button">SIGN UP</button>
        <?php echo form_close(); ?>
            <hr>
                  <div class="text-center">
                      <a class="small" href="<?php echo site_url('welcome/registration_email');?>">Sign up via Email</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?php echo site_url('welcome/login');?>">Already have an account? Log in.</a>
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

 <!-- date picker -->
<script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
<script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
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
<script>
        
   $(document).ready(function() {     
       
        $('#birthday').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1920:2018',
                    dateFormat : 'yy-mm-dd',
                    defaultDate: '1985-01-01'
                });
   });
</script>
</body>
</html>
