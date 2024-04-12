/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// form validation
    var v = jQuery("#regForm").validate({
      rules: {
        imglic:{
            required : true
        },
        idpicture:{
            required : true
        },
	plantype:{
            required : true
        },
	branch:{
            required : true
        },
        lic:{
            required: true
        },
        licexp:{
            required: true
        },
        card:{
            required: true
        },
        lictype:{
            required: true
        },
        d:{
            required: true
        }
 
      },
     errorElement: "span",
     messages: {
        imglic:{
            required : "Please upload copy of your Philippine Driver's License."
        },
        idpicture:{
            required : "Please upload ID."
        },
	plantype:{
            required : "Please select Plantype."
        },
	branch:{
            required : "Please select Branch."
        },
        lic:{
            required: "License No. is required."
        },
        licexp:{
            required: "License expiration date is required."
        },
        card:{
            required: "License card type is required."
        },
        lictype:{
            required: "License type is required."
        },
        d:{
            required: "Please provide destination."
        }
       
     },
     errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") || element.is(":file") ) 
            {
                error.appendTo( element.parents('.pradio') );
				console.log(element.parents());
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
            
        }
		
    
    });
	
    
    // Multi-Step Form
    var currentTab = 0;// Current tab is set to be the first tab (0)
    
    showTab(currentTab); 

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      
      
      //... and fix the Previous/Next buttons:
      if (n === 0) {
        document.getElementById("prevBtn").style.display = "none";
        
      } else {
        document.getElementById("prevBtn").style.display = "inline";
        

      }
      if (n === (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
       
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
       
      }
      
      //fixStepIndicator(n)
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
    

      if (n === 1 && !v.form())return false;
      
      // Hide the current tab:
      x[currentTab].style.display = "none";
      
     
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      if(currentTab === 1){
			
        if(document.getElementById('agree').checked) 
        { 
            if(document.getElementById('agreeDP').checked){
                var r = document.getElementsByName('restriction[]');
		var ispidp = document.getElementById('ispidp').value;
			if(ispidp === '1') 
			{ 
				if(r[0].checked === false && r[1].checked === false && r[2].checked === false && r[3].checked === false && r[4].checked === false && r[5].checked === false&& r[6].checked === false && r[7].checked === false){
					alert('Please check restrictions');
					currentTab = currentTab - n;
				}
			}else{
				currentTab === 1;
			}
                
            }else{
                alert('Please check data privacy consent.'); 
                currentTab = currentTab - n;
            }
           
        } else {
            alert('Please confirm that the information given in this form is true, complete and accurate.'); 
            currentTab = currentTab - n;
        }
						
      } 
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
            document.getElementById("regForm").submit();
            $("#loader").show();
            return false;
      }
       
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }
    
    
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
            
            //input mask        
            $.mask.definitions['~'] = "[+-]";
            $("#lic").mask("a99-99-999999");
});


$(document).ready(function() {
      
            //for nav tab
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
            
            $("div#pidp").hide();
            $("div#d2div").hide();
            $('input:radio[name="dradio"]').change(
                function(){
                    var amount = 0;
                    if ($(this).val() === 'MULTIPLE') {
                        $("div#d2div").show();
                        
                    }
                    else {
                        $("div#d2div").hide();
                       
                    }
                    document.getElementById("addl").innerHTML = amount.toFixed(2);
             });
             
          
             
             $( "#d" ).autocomplete({
		            minLength: 1,
		           // source: "getDestination",
                            source: "getDestination",
		            focus: function( event, ui ) {
		                   return false;
		             },
		            select: function( event, ui ) {
		            	$( "#d" ).val( ui.item.destination );
                                $( "#dremarks" ).val( ui.item.remarks );
		                return false;
		            }
		             
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		            return $( "<li>" )
		            .append(item.destination)
		            .appendTo( ul );
		        };
                        
            $('#licexp').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '2018:2080',
                    dateFormat : 'yy-mm-dd'
                    //dateFormat : 'mm/dd/yy',
                    //defaultDate: '01/01/1985'
                   
                });             
            
         
     });  

