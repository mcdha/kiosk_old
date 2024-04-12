/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Upload image
 * -Rosa
 */
$(document).ready( function() {
    $(".custom-file-input").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
                                        
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#idpicture").change(function () {
            readURL(this);
    });
                                        
    function readURLlic(input) {
	if (input.files && input.files[0]) {
            var reader = new FileReader();
							
            reader.onload = function (e) {
		$('#img-lic').attr('src', e.target.result);
            }
							
            reader.readAsDataURL(input.files[0]);
	}
    }

    $("#imglic").change(function(){
	readURLlic(this);
    }); 
    
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload-or').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#or1").change(function () {
            readURL1(this);
    });
    
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload-cr').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#cr1").change(function () {
            readURL2(this);
    });
    
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload-or2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#or2").change(function () {
            readURL3(this);
    });
    
    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload-cr2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#cr2").change(function () {
            readURL4(this);
    });
                                          
});

