<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>

<!-- Include the above in your HEAD tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dev/bootstrap-4.3.1/js/bootstrap.min.js"></script>

    <style>
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
            font-size: 16px;
            position: absolute;
            /* background: #fff; */
            bottom: 17px;
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
        
        /*for multi step form*/
       
main {
/*	margin-top: 4.5em; */
}
#section1 {
	height: 30em;
}


/* Multi-Step Form 
* {
  box-sizing: border-box;
}

#regForm {
  background-color: #fff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 100%;
  min-width: 600px;
}
*/
h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that get errors during validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Step marker: Place in the form. */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
      
    </style>
</head>
<body>
    
<div class="container mt-3">
  <h2>PIDP Application Form</h2>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="#menu1">PIDP ONLY</a>
    </li>
  </ul>

  <!-- Tab panes -->
 
    <div class="tab-content border mb-3">
        <div id="home" class="container tab-pane active">
         
            <div>
              <h3>Please check your information</h3>
            </div>
            <div class="panel-body">
                <form action="/submit_page.php">

                    <div class="tab">
                        <fieldset>
                        <legend>PIDP Details</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3>LOCAL LICENSE</h3><br>
                                        <div class="field-wrapper">
                                            <select name="Card Type" form="carform" style="width:100%">
                                                <option value="volvo">Please select</option>
                                                <option value="volvo">NON CARD</option>
                                                <option value="saab">CARD</option>
                                            </select>
                                            <div class="field-placeholder"><span>Card Type</span></div>
                                        </div>
                                        <div class="field-wrapper">
                                            <select name="Card Type" form="carform" style="width:100%">
                                                <option value="volvo">Please select</option>
                                                <option value="volvo">NON PROFESSIONAL</option>
                                                <option value="saab">PROFESSIONAL</option>
                                            </select>
                                            <div class="field-placeholder"><span>License Type</span></div>
                                        </div>
                                        <div class="field-wrapper">
                                            <input type="text" placeholder="License #" id="salutation">
                                            <div class="field-placeholder"><span>License #</span></div>
                                        </div>
                                        <div class="field-wrapper">
                                            <input type="text" placeholder="License #" id="salutation">
                                            <div class="field-placeholder"><span>Expiration Date</span></div>
                                        </div>
                                        
                                        
                                        <div class="field-wrapper">
                                            <input type="text" placeholder="Restrictions" id="sex">
                                            <div class="field-placeholder"><span>Restrictions</span></div>
                                        </div>
                                        
                                    </div>
                                </div>    
                                    
                            </div>
                        </fieldset>
                    </div>

                </form> 
            </div>        
        </div>              

    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});

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
 
    });
  

  
  // Multi-Step Form
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
</script>

</body>
</html>