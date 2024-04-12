/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * -Rosa
 */

$("#applycode").click(function(){
		if($('#promocode').val()!=''){
			$.ajax({
						type: "POST",
						url: "applypromocode",
						data:{
							promocode: $('#promocode').val()
						},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
                                                            if(dataResult.now < dataResult.start){
                                                                $('#promostatus').html("Promocode not yet started.");
                                                            }else if(dataResult.now > dataResult.end){
                                                                $('#promostatus').html("Promocode is already expired.");
                                                            }else{
                                                                var amount = dataResult.value;
                                                                
                                                                if(dataResult.type === 'AMOUNT'){
                                                                    
                                                                    document.getElementById("promo").innerHTML = '- '+ amount;
                                                                    document.getElementById("discount").value =  amount;
                                                                }else{
                                                                    var mamount = document.getElementById("mamount").value;
                                                                    var paddl = document.getElementById("paddl").value;
                                                                    var add = Number(mamount) + Number(paddl);
                                                                    var dprice = add * amount / 100;
                                                                    document.getElementById("promo").innerHTML = '- '+ dprice.toFixed(2);
                                                                    document.getElementById("discount").value =  dprice.toFixed(2);
                                                                }
                                                                $('#promostatus').html("Promocode applied successfully.");
                                                            }
							}
							else if(dataResult.statusCode==201){
								$('#promostatus').html("Invalid promocode.");
							}
						}
			});
		}
		else{
			$('#promostatus').html("You didn't enter a promocode. Please enter a valid promo code.");
		}
	});
