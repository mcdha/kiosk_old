<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $title ?></title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/aap.ico">
    <!-- Include the above in your HEAD tag -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/kiosk.css">
    <script src="<?php echo base_url(); ?>assets/dev/plugins/inputmask/src/jquery.maskedinput.js" type="text/javascript"></script>
<!-- Custom styles for this page -->
  <link href="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body >                
               
 <div class="container mt-3">
    <div class="col-xl-12 col-lg-8">
        <div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                <a href="https://qrco.de/bcsfEN">HOME
                    
                </a>
				<a href="https://qrco.de/bcsfEN">&times
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <?php echo form_open('kiosk/pidp_search','id="searchForm"'); ?>
                    <fieldset>
                        <legend>Search Membership Record</legend>
                        <p style="color:red" id="ta"> Please fill in all fields marked with an asterisk (*).</p>
                           
                            <div class="row">
                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                            <input type="text" name="spin" id="spin" onkeyup="countChar(this)" >
                                            <div class="field-placeholder"><span id='tp'>* PIN CODE</span></div>
                                        </div>
										<p style="text-align:center;color:red" id='tor'>OR</p>
										<div class="field-wrapper">
                                            <input type="text" id="slname" name="slname" onkeyup="countCharN(this)" >
                                            <div class="field-placeholder"><span id = 'tn'>* Last Name</span></div>
                                        </div>
                                        <div class="field-wrapper">
                                            <input type="text" id="sfname" name="sfname"  onkeyup="countCharN(this)" >
                                            <div class="field-placeholder"><span id = 'tn'>* First Name</span></div>
                                        </div>
                                        <div class="field-wrapper hasValue">
                                            <input type="text" name="sbday" id="sbday" placeholder="yyyy-mm-dd" onkeyup="
                                                var v = this.value;
                                                if (v.match(/^\d{4}$/) !== null) {
                                                    this.value = v + '-';
                                                } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                                    this.value = v + '-';
                                                }"
                                            maxlength="10" >
                                            <div class="field-placeholder"><span id = 'tn'>* Birth Date</span></div>
                                        </div>
										 <!--<div class="field-wrapper">
                                            <input type="text" name="slic" id="slic" style="text-transform: uppercase;" >
                                            <div class="field-placeholder"><span id = 'tn'>* Local License No.</span></div>
                                        </div>-->
										<button class="btn btn-primary" type="submit" style="width:100%">SEARCH</button>
                                    </div>
                            </div>
                    </fieldset>
					<br>
					<br>
            <?php echo form_close();      ?> 
                    <div class="container"><br>
                        <h2>Results</h2>
                        <div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                  <th>Record No.</th>
								  <th>Vehicle</th>
                                  <th>Membership Category</th>
                                  <th>Last Name</th>
                                  <th>First Name</th>
                                  <th>Activation Date</th>
                                  <th>Expiration Date</th>
								  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
					if (isset($result_info)) { 
                                        
                                            foreach($result_info as $row)
                                            {     
                                            echo '<tr>';	
                                                    echo '<td>';
                                                            echo $row['vehicleinfohead_order'];
                                                    echo '</td>';
													echo '<td>';
                                                    foreach($row['car_details'] as $rc) {
														echo '<p>'.$rc.'</p><br>';
													}  
                                                    echo '</td>';
                                                    echo '<td>';
                                                            echo $row['sponsor_name'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                            echo $row['members_lastname'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                            echo $row['members_firstname'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                            echo $row['vehicleinfohead_activedate'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                            echo $row['vehicleinfohead_expiredate'];
                                                    echo '</td>';
													echo '<td>';
                                                            echo ($row['vehicleinfohead_status'] == 'ACTIVE')?$row['vehicleinfohead_status']:'<span style="color:red">'.$row['vehicleinfohead_status'].'</span>';
                                                    echo '</td>';
                                                    echo '<td>';
                                                            echo '<a href="'.site_url('kiosk/pidp_renew/'.$row['members_id'].'/'.$row['vehicleinfohead_id']).'">RENEW</a>';
                                                    echo '</td>';
                                            echo '</tr>';
                                        }
                                    }else{
                                           echo '<tr>';
                                                    echo '<td colspan="9">';
                                                    echo '<label style=" display: block;color:red;  text-align: center;"> NO RECORDS FOUND </label>';
                                                    echo '</td>';
                                            echo '</tr>';
                                    }
                                 ?>
                                
                            </tbody>
							</table>
						</div>
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
	<!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
 <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/theme/sb-admin2/js/demo/datatables-demo.js"></script>
<script>
	function countChar(val){
         var len = val.value.length;
         if (len > 0) {
            $("input#sfname").hide();
            $("input#slname").hide();
            $("input#sbday").hide();
            $("input#slic").hide();
            $("span#tn").hide();
            $("p#ta").hide();
			$("p#tor").hide();
           } else {
            $("input#sfname").show();
            $("input#slname").show();
            $("input#sbday").show();
            $("input#slic").show();
            $("span#tn").show();
            $("p#ta").show();
			$("p#tor").show();
            $('#slname').attr('required', true);
            $('#sfname').attr('required', true);
            $('#sbday').attr('required', true);
			$('#slic').attr('required', true);
           }
    }
    
    function countCharN(val){
         var len = val.value.length;
         if (len > 0) {
            $("input#spin").hide();
            $("span#tp").hide();
            $("p#ta").show();
			$("p#tor").hide();
            $('#slname').attr('required', true);
            $('#sfname').attr('required', true);
            $('#sbday').attr('required', true);
            $('#slic').attr('required', true);
           } else {
            $("input#spin").show();
            $("span#tp").show();
            $("p#ta").hide();
			$("p#tor").show();
            $('#slname').attr('required', false);
            $('#sfname').attr('required', false);
            $('#sbday').attr('required', false);
            $('#slic').attr('required', true);
           }
    }
    $(document).ready(function() {
 
			 $("p#ta").hide();
			$("p#tor").show();
			$('#sbday').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1920:2018',
                    dateFormat : 'yy-mm-dd',
                    defaultDate: '1985-01-01'
                });	          
    });         
            
    //label of input field        
    $(function () {
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
            
             $.mask.definitions['~'] = "[+-]";
            $("#slic").mask("a99-99-999999");
    });
    
</script>
</body>
</html>