<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Checkout</title>
    <!-- Include the above in your HEAD tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container mt-3">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-center" >Review Payment
                  </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
   <form id="payment_confirmation" action="https://testsecureacceptance.cybersource.com/pay" method="post"/> 

  
                    <div class="row">
                    <div class="col-lg-2"></div>            
                        <div class="col-lg-8">
                             <div class="card card-cascade wider shadow p-3 mb-5 ">
                                 <!--Product Description-->
                                 <div class="desc">
                                     <!-- 1st Row for title-->
                                      <!-- 2nd Row for title-->
                                     <div class="row subRow">
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><b>PAYMENT METHOD:</b></p>
                                         </div>
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><span style="float:right"><?= $info['payment'] ?></span></p>
                                         </div>
                                     </div>
                                      <div class="row subRow">
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><b>BRANCH:</b></p>
                                         </div>
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><span style="float:right"><?= $info['branch'] ?></span></p>
                                         </div>
                                     </div>
                                     <div class="row subRow">
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><b>REFERENCE CODE:</b></p>
                                         </div>
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><span style="float:right"><?= $info['refnum'] ?></span></p>
                                         </div>
                                     </div>
                                     <div class="row subRow">
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><b>MEMBERSHIP TYPE SELECTED:</b></p>
                                         </div>
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><span style="float:right"><?= $info['types'] ?></span></p>
                                         </div>
                                     </div>
                                     <div class="row subRow">
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><b>BANK CHARGE:</b></p>
                                         </div>
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><span style="float:left">&#8369; </span><span style="float:right"><?= number_format($info['bankcharge'],2) ?></span></p>
                                         </div>
                                     </div>
                                     <div class="row subRow">
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><b>TRANSACTION FEE:</b></p>
                                         </div>
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><span style="float:left">&#8369; </span><span style="float:right"><?= number_format($info['transaction_fee'],2) ?></span></p>
                                         </div>
                                     </div>
                                     <div class="row subRow">
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><b>TOTAL AMOUNT TO PAY:</b></p>
                                         </div>
                                         <!--Column for Data-->
                                         <div class="col-md">
                                             <p class="text-muted row1"><span style="float:left">&#8369; </span><span style="float:right"><?= number_format($info['amount'], 2) ?></span></p>
                                         </div>
                                     </div>
                                      <div class="row subRow">
                                        <div class="col-md">
                                             <p class="text-muted row1"><b>Click confirm to proceed with the payment.</b></p>
                                         </div>
                                     </div>
                                 </div>
                                 <input type="hidden" id="ref" name="ref"  value="<?= $info['refnum'] ?>">
                                 <input type="hidden" id="payment" name="payment"  value="<?= $info['payment'] ?>">
                                 <input type="hidden" id="amount" name="amount"  value="<?= $info['amount'] ?>">
                                 <p style="text-align:center"><span> <button type="submit" id="submit" class="btn btn-primary" />Confirm</button></span>&nbsp<span><a  class="btn btn-danger deleteRecord"  href="#" data-toggle="modal" data-target="#deleteModal" data-rec='<?= $info['refnum'] ?>'>Cancel Online Application</a></span></p>
                             </div>
                         </div>
                    <div class="col-lg-2"></div>
                    </div>
<?php
foreach($params as $name => $value) {
	echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
}
?>
                </form>
 

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
<script>

    
$(document).ready(function(){
  $("#submit").click(function(){
        var amount = $("#amount").val();
        var ref = $("#ref").val();
	var pm = $("#payment").val();
    $.post("insert_union_paymentmethod",
    {
      amount: amount,
      ref: ref,
      pm: pm
    },
    function(data,status){
      //alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
										
</script>

<!-- Delete Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
	<?php echo form_open('dashboard/cancelled')?>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to cancel your online application?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
		<p>Once you click <b> Yes</b>, all the information you provided on the online form, including the uploaded requirements, will not be saved and your application will be cancelled.</p><br>
		<p>Please click <b>No</b>instead if you wish to proceed with your application.</p>
	</div>
        <div class="modal-footer">
		<input type="hidden" name="id" value="" />
		<input type="hidden" name="email" value="<?= $info['email'] ?>" />
		 
          <button class="btn btn-secondary" type="button" data-dismiss="modal">NO</button>
          <input type="submit" name="button"  class="btn btn-primary"  id="confirm-button" value="YES" />
        </div>
	<?php echo form_close()?>
      </div>
    </div>
  </div>
 
 <script>
		$(function () {
			$('.deleteRecord').click(function (e) {
				e.preventDefault();
				var link = this;
				var deleteModal = $("#deleteModal");
				deleteModal.find('input[name=id]').val(link.dataset.rec);
				
			});
			
		});
</script>

</body>
</html>



