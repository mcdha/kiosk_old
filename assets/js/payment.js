/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $(document).ready(function() {
        
        //payment method
	$("div#unionbank").show();
	$("div#bpi").hide();
	$("div#bdo").hide();
	$("div#cash").hide();
	$("div#cebuana").hide();
	$("div#check").hide();
	$("div#pickup").hide();
	
	$('.radio-group #unionbank.radio').click(function(){
		$("div#unionbank").show();
		$("div#bpi").hide();
		$("div#bdo").hide();
		$("div#cash").hide();
		$("div#cebuana").hide();
		$("div#check").hide();
		$("div#pickup").hide();
                document.getElementById('paymentmethod').value = 'CREDIT CARD';
	
	});
	$('.radio-group #bdo.radio').click(function(){
		$("div#unionbank").hide();
		$("div#bpi").hide();
		$("div#bdo").show();
		$("div#cash").hide();
		$("div#cebuana").hide();
		$("div#check").hide();
		$("div#pickup").hide();
                document.getElementById('paymentmethod').value = 'BDO';
	
	});
	$('.radio-group #bpi.radio').click(function(){
		$("div#unionbank").hide();
		$("div#bpi").show();
		$("div#bdo").hide();
		$("div#cash").hide();
		$("div#cebuana").hide();
		$("div#check").hide();
		$("div#pickup").hide();
                document.getElementById('paymentmethod').value = 'BPI';
	
	});
	$('.radio-group #cash.radio').click(function(){
		$("div#unionbank").hide();
		$("div#bpi").hide();
		$("div#bdo").hide();
		$("div#cash").show();
		$("div#cebuana").hide();
		$("div#check").hide();
		$("div#pickup").hide();
                document.getElementById('paymentmethod').value = 'CASH';
	
	});
	$('.radio-group #cebuana.radio').click(function(){
		$("div#unionbank").hide();
		$("div#bpi").hide();
		$("div#bdo").hide();
		$("div#cash").hide();
		$("div#cebuana").show();
		$("div#check").hide();
		$("div#pickup").hide();
                document.getElementById('paymentmethod').value = 'CEBUANA';
	
	});
	$('.radio-group #check.radio').click(function(){
		$("div#unionbank").hide();
		$("div#bpi").hide();
		$("div#bdo").hide();
		$("div#cash").hide();
		$("div#cebuana").hide();
		$("div#check").show();
		$("div#pickup").hide();
                document.getElementById('paymentmethod').value = 'CHECK';
	
	});
	$('.radio-group #pickup.radio').click(function(){
		$("div#unionbank").hide();
		$("div#bpi").hide();
		$("div#bdo").hide();
		$("div#cash").hide();
		$("div#cebuana").hide();
		$("div#check").hide();
		$("div#pickup").show();
                document.getElementById('paymentmethod').value = 'PICK-UP';
	
	});
	
  
    $('.radio-group .radio').click(function(){
           $('.radio').addClass('gray');
           $(this).removeClass('gray');
   });

 });

