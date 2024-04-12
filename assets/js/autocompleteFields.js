/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        $(document).ready(function() {
       
            $('#bday').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1920:2018',
                    dateFormat : 'yy-mm-dd',
                    defaultDate: '1985-01-01'
                });
                
            $('#sbday').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1920:2018',
                    dateFormat : 'yy-mm-dd',
                    defaultDate: '1985-01-01'
                    //dateFormat : 'mm/dd/yy',
                    //defaultDate: '01/01/1985'
                });
                
            $('#licexp').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '2018:2080',
                    dateFormat : 'yy-mm-dd'
                    //dateFormat : 'mm/dd/yy',
                    //defaultDate: '01/01/1985'
                   
                }); 
                
             $( "#h2" ).autocomplete({
	             minLength: 1,
	             source: "get_towns",
	             focus: function( event, ui ) {
	              //  $( "#town" ).val( ui.item.town );
	                   return false;
	             },
	             select: function( event, ui ) {
	            	$( "#h2" ).val( ui.item.town );
	            	$( "#city" ).val( ui.item.city );
	                $( "#province" ).val( ui.item.province );
	                $( "#zip" ).val( ui.item.zipcode );
                        $( "#zip1" ).innerHtml =  ui.item.zipcode ;
                        
	                //$( "#province_id" ).val( ui.item.district_id );
	               // $( "#city_id" ).val( ui.item.city_id );
	                return false;
	             }
	             
	          })
	          .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
	             return $( "<li>" )
	             .append(item.town + " " + item.city + " " + item.province)
	             .appendTo( ul );
	    };
                  
            $( "#oh2" ).autocomplete({
	             minLength: 1,
	             source: "get_towns",
	             focus: function( event, ui ) {
	              //  $( "#town" ).val( ui.item.town );
	                   return false;
	             },
	             select: function( event, ui ) {
	            	$( "#oh2" ).val( ui.item.town );
	            	$( "#ocity" ).val( ui.item.city );
	                $( "#oprovince" ).val( ui.item.province );
	                $( "#ozip" ).val( ui.item.zipcode );
	                return false;
	             }
	             
	          })
	          .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
	             return $( "<li>" )
	             .append(item.town + " " + item.city + " " + item.province)
	             .appendTo( ul );
	    };
            
           $( "#city" ).autocomplete({
		             minLength: 1,
		             source: "get_cities",
		             focus: function( event, ui ) {
		              //  $( "#city" ).val( ui.item.city );
		                   return false;
		             },
		             select: function( event, ui ) {
		            	//$( "#town" ).val( ui.item.town );
		            	$( "#city" ).val( ui.item.city );
		                $( "#province" ).val( ui.item.province );
		                $( "#zip" ).val( ui.item.zipcode );
		                return false;
		             }
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		             return $( "<li>" )
		             .append( item.city + " " + item.province)
		             .appendTo( ul );
		        }; 
                          
            $( "#ocity" ).autocomplete({
		             minLength: 1,
		             source: "get_cities",
		             focus: function( event, ui ) {
		              //  $( "#city" ).val( ui.item.city );
		                   return false;
		             },
		             select: function( event, ui ) {
		            	//$( "#town" ).val( ui.item.town );
		            	$( "#ocity" ).val( ui.item.city );
		                $( "#oprovince" ).val( ui.item.province );
		                $( "#ozip" ).val( ui.item.zipcode );
		                return false;
		             }
		             
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		             return $( "<li>" )
		             .append( item.city + " " + item.province)
		             .appendTo( ul );
		        };
                        
            $( "#d" ).autocomplete({
		            minLength: 1,
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
                
            $( "#make1" ).autocomplete({
		            minLength: 1,
                            source: "getCarMake",
		            focus: function( event, ui ) {
		                   return false;
		             },
		            select: function( event, ui ) {
		            	$( "#make1" ).val( ui.item.brand);
		                return false;
		            }
		             
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		            return $( "<li>" )
		            .append(item.brand)
		            .appendTo( ul );
		        }; 
            $( "#make2" ).autocomplete({
		            minLength: 1,
                            source: "getCarMake",
		            focus: function( event, ui ) {
		                   return false;
		             },
		            select: function( event, ui ) {
		            	$( "#make2" ).val( ui.item.brand);
		                return false;
		            }
		             
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		            return $( "<li>" )
		            .append(item.brand)
		            .appendTo( ul );
		        };             
            $( "#model1" ).autocomplete({
		            minLength: 1,
                            source: "getCarModel",
		            focus: function( event, ui ) {
		                   return false;
		             },
		            select: function( event, ui ) {
		            	$( "#model1" ).val( ui.item.model);
		                return false;
		            }
		             
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		            return $( "<li>" )
		            .append(item.model)
		            .appendTo( ul );
		        };
            $( "#model2" ).autocomplete({
		            minLength: 1,
                            source: "getCarModel",
		            focus: function( event, ui ) {
		                   return false;
		             },
		            select: function( event, ui ) {
		            	$( "#model2" ).val( ui.item.model);
		                return false;
		            }
		             
		        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		            return $( "<li>" )
		            .append(item.model)
		            .appendTo( ul );
		        };               
            
         }); 
