/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    var v = jQuery("#regForm").validate({
      rules: {
       idpicture:{
            required : true
        },
	plantype:{
            required : true
        },
	branch:{
            required : true
        },
	ispidp:{
            required : true
        },  
        rradio:{
            required : true
        },
        salutation: {
          required: true
        },
        fname: {
          required: true
        },
        lname: {
          required: true
        },
        citizenship: {
          required: true
        },
        nationality:{
            required : true
        },
        acr:{
            required : true
        },
        sex: {
          required: true
        },
        bday: {
          required: true
        },
        bplace: {
          required: true
        },
        occupation: {
          required: true
        },
        cstatus: {
          required: true
        },
        city: {
          required: true
        },
        province: {
          required: true
        },
        zip: {
          required: true
        },
        mobile: {
            required : true
        },
        email:{
            email: true
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
        },
        imglic:{
            required: true
        },
        or1:{
            required: true
        }
         
      },
     errorElement: "span",
     messages: {
        idpicture:{
            required : "Please upload ID picture."
        },
	plantype:{
            required : "Please select Plan Type"
        },
	branch:{
        required : "Please select Branch"
        },
        salutation: {
          required: "Please select Title"
        },
        fname: {
          required: "First Name is required."
        },
        lname: {
          required: "Last Name is required."
        },
        citizenship: {
          required: "Citizenship is required."
        },
        nationality:{
            required : "Nationality is required."
        },
        acr:{
            required : "ACR is required."
        },
        sex: {
          required: "Please select Gender."
        },
        bday: {
          required: "Birthdate is required."
        },
        bplace: {
          required: "Birthplace is required."
        },
        occupation: {
          required: "Occupation is required."
        },
        cstatus: {
          required: "Civil status is required."
        },
        city: {
          required: "City is required."
        },
        province: {
          required: "Province is required."
        },
        zip: {
          required: "Zip Code is required."
        },
        mobile: {
            required : "Mobile No. is required."
        },
        email:{
            email: "Please enter a valid email address."
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
        },
        imglic:{
            required: "Please upload copy of your Philippine Driver's License."
        },
        or1:{
            required: "Please upload OR/CR of your vehicle."
        },
        or2:{
            required: "Please upload OR/CR of your vehicle."
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
    
      // Exit the function if any field in the current tab is invalid:
      //if (n == 1 && !validateForm()) return false;

      if (n === 1 && !v.form())return false;
      
      // Hide the current tab:
      x[currentTab].style.display = "none";
      
     
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      if(currentTab === 3){
		var r = document.getElementsByName('restriction[]');
		var ispidp = document.getElementById('ispidp').value;
			if(ispidp === '1') 
			{ 
                            
				if(r[0].checked === false && r[1].checked === false && r[2].checked === false && r[3].checked === false && r[4].checked === false && r[5].checked === false&& r[6].checked === false && r[7].checked === false){
					alert('Please check restrictions');
					currentTab = currentTab - n;
				}
			}else{
				currentTab === 3;
			}	
						
      } 
      if(currentTab === 5){
            if(document.getElementById('agree').checked) 
            { 
                if(document.getElementById('agreeDP').checked){
                    currentTab === 5;
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
                    // $("#nextBtn").val("save").change();
             $("#loader").show();
            return false;
      }
       
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }
    
 $(document).ready(function() {
       
            $("div#d2div").hide();
            $('input:radio[name="dradio"]').change(
                function(){
                    if ($(this).val() === 'multiple') {
                        $("div#d2div").show();
                    }
                    else {
                        $("div#d2div").hide();
                    }
             });      
            //for nav tab
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
  });
   

