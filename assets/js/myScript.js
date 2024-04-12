/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
            $("#slic").mask("a99-99-999999");
            $("#lic").mask("a99-99-999999");
            $("#tel").mask("9-999-9999");
            $("#otel").mask("9-999-9999");
            $("#mobile").mask("(0999) 999-9999");
            $("#amobile").mask("(0999) 999-9999");
});


