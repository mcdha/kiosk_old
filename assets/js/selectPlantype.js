;
$(document).ready(function() {
    $("#branch").change(function () {
        var val = $(this).val();
        if (val === "DAVAO") {
            $("#plantype").html('<option value="">Please select type of membership</option>\n\
                                <option value="1">1 - YEAR REGULAR MEMBERSHIP (<span>&#8369;</span> 2,240)</option>\n\
                                <option value="2">1 - YEAR MEMBERSHIP LITE (<span>&#8369;</span> 896)</option>\n\
                                <option value="3">1 - YEAR PIDP MEMBERSHIP (<span>&#8369;</span> 3,920)</option>\n\
                                <option value="4">1 - YEAR ASSOCIATE MEMBERSHIP (<span>&#8369;</span> 1,680)</option>\n\
                                <option value="5">3 - YEAR REGULAR MEMBERSHIP (<span>&#8369;</span> 5,600)</option>\n\
                                <option value="6">3 - YEAR PIDP MEMBERSHIP (<span>&#8369;</span> 8960)</option>\n\
                                <option value="7">3 - YEAR ASSOCIATE MEMBERSHIP (<span>&#8369;</span> 4,200)</option>\n\
                                <option value="12">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 1 (<span>&#8369;</span> 400)</option>\n\
                                <option value="9">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 2 (<span>&#8369;</span> 900)</option>\n\
                                <option value="13">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 3 (<span>&#8369;</span> 1322.71)</option>\n\
                                <option value="11">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 4 (<span>&#8369;</span> 2550)</option>');
        } else{
            $("#plantype").html('<option value="">Please select type of membership</option>\n\
                                <option value="1">1 - YEAR REGULAR MEMBERSHIP (<span>&#8369;</span> 2,240)</option>\n\
                                <option value="2">1 - YEAR MEMBERSHIP LITE (<span>&#8369;</span> 896)</option>\n\
                                <option value="3">1 - YEAR PIDP MEMBERSHIP (<span>&#8369;</span> 3,920)</option>\n\
                                <option value="4">1 - YEAR ASSOCIATE MEMBERSHIP (<span>&#8369;</span> 1,680)</option>\n\
                                <option value="5">3 - YEAR REGULAR MEMBERSHIP (<span>&#8369;</span> 5,600)</option>\n\
                                <option value="6">3 - YEAR PIDP MEMBERSHIP (<span>&#8369;</span> 8960)</option>\n\
                                <option value="7">3 - YEAR ASSOCIATE MEMBERSHIP (<span>&#8369;</span> 4,200)</option>\n\
                                <option value="8">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 1 (<span>&#8369;</span> 600)</option>\n\
                                <option value="9">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 2 (<span>&#8369;</span> 900)</option>\n\
                                <option value="10">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 3 (<span>&#8369;</span> 1500)</option>\n\
                                <option value="11">1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 4 (<span>&#8369;</span> 2550)</option>');
            
        }
       
    });
    

    
    document.getElementById("plantype").onchange = function () {
            var selectedValue = document.getElementById("plantype").value;
             
			var amount = 2240;
                        var type;
                        var ispidp = 0;
                        var pamount = 0;
			if(selectedValue === '1'){
				amount = 2240;
                                type = '1 - YEAR REGULAR MEMBERSHIP';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
			}else if(selectedValue === '2'){
				amount = 896;
                                type = '1 - YEAR MEMBERSHIP LITE';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
                        }else if(selectedValue === '3'){
				amount = 3920;
                                type ='1 - YEAR PIDP MEMBERSHIP';
                                ispidp = 1;
                                $("div#pidp").show();
                                $("#pidpval").attr('checked', 'checked');
			}else if(selectedValue === '4'){
				amount = 1680;
                                type ='1 - YEAR ASSOCIATE MEMBERSHIP';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
			}else if(selectedValue === '5'){
				amount = 5600;
                                type ='3 - YEAR REGULAR MEMBERSHIP';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
			}else if(selectedValue === '6'){
				amount = 8960;
                                type ='3 - YEAR PIDP MEMBERSHIP';
                                ispidp = 1;
                                $("div#pidp").show();
                                $("#pidpval").attr('checked', 'checked');
			}else if(selectedValue === '7'){
				amount = 4200;
                                type ='3 - YEAR ASSOCIATE MEMBERSHIP';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
			}else if(selectedValue === '8'){
				amount = 600;
                                type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 1';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
                        }else if(selectedValue === '9'){
				amount = 900;
                                type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 2';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
                        }else if(selectedValue === '10'){
				amount = 1500;
                                type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 3';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
                        }else if(selectedValue === '11'){
				amount = 2500;
                                type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 4';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
                        }else if(selectedValue === '12'){
				amount = 400;
                                type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 1';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
                        }else if(selectedValue === '13'){
				amount = '1322.17';
                                type ='1 - YEAR MOTORCYCLE MEMBERSHIP PACKAGE 3';
                                $("div#pidp").hide();
                                $("#membershipval").attr('checked', 'checked');
                        }else{
                            amount = 0;
                            type ='Please select plan type';
                            $("div#pidp").hide();
                        }
			
                        
			document.getElementById("pamount").innerHTML = amount.toFixed(2);
                        document.getElementById("ptype").innerHTML = type;
                        
                        document.getElementById("mamount").value = amount.toFixed(2);
                        document.getElementById("tom").value = type;
                        document.getElementById("ispidp").value = ispidp;
                        document.getElementById("addl").innerHTML = pamount.toFixed(2);
                        document.getElementById("paddl").value = pamount.toFixed(2);
        };

 });   
