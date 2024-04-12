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
</head>
<body>
 <div class="container">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
           <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                <a href="<?php echo site_url('kiosk') ?>">HOME
                    <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                </a>
				<a href="<?php echo site_url('kiosk') ?>">&times
                    <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                </a>
            </div>-->
            <!-- Card Body -->
            <div class="card-body">
		<img src = "<?php echo base_url(); ?>assets/img/aaplogo.png" class="center" style="width:25%">
                <p>Dear Member,</p>

                <p>The personal data that you are providing us are confidential and important that is why the <strong>Automobile Association of the Philippines, Inc.</strong>, here and after referred to as AAP, would like to inform you on how we handle and protect your personal information. Your trust and confidence in AAP truly matter to us.</p>

                <p>In compliance with Republic Act 10173, also known as the Data Privacy Act of 2012, AAP is presenting you this letter to ask for your voluntary consent in giving us the required information for your membership or Philippine International Driving Permit.</p>

                <p>If you wish to access, update, or correct certain personal information, or withdraw consent to the use of any of your information as set out in this letter, you may let us know through <a href = "mailto: info@aap.org.ph">info@aap.org.ph</a> or you may call us at Tel: (63 2) 8705.3333.</p>

                <h5 style="text-align: center"><strong>DATA PRIVACY CONSENT</strong></h5>

                <p>By providing your personal information, you allow and authorize Automobile Association of the Philippines, Inc., (AAP)</p>

                <p>(i) to continue to use my personal and sensitive information to process the services stated in my membership policy;</p>

                <p>(ii) to store my information for a period of five years from the date of termination of my policy, or at such time that I notify to AAP a cancellation of my consent, whichever comes first. I agree that my information will be deleted/destroyed after this period;</p>

                <p>(iii) to share my information to affiliates and necessary third parties for any legitimate purpose in connection with my membership. Provided, that AAP complied with the National Privacy Commission's Data Sharing Agreement;</p>

                <p>(iv) to inform me of news and other related advertisement of the company and base its offer using the personal and sensitive information that I provided.</p>

                <p>In consideration with the foregoing, I hereby acknowledge that my personal and sensitive information will be processed by the <strong>AUTOMOBILE ASSOCIATION OF THE PHILIPPINES, INC.</strong> through its authorized employees for purposes included in the Data Protection Policy; that I have voluntarily given my consent to process my personal and sensitive information; and I have read and understood all of the above terms stipulated in this document.</p>

               
                <p>Done this <strong> <?php echo date("l, jS \of F Y ")."."; ?></strong> </p>
                <h6 style="text-align:center"><strong>Should you agree on our terms, please click "Agree". Thank you!</strong></h6>
                <div style="text-align:center">
                <a href="<?php echo site_url('kiosk/membership') ?>" class="btn btn-success">AGREE
                </a>
                <a href="https://qrco.de/bcsfEN" class="btn btn-danger">CANCEL
                </a>
                </div>
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
