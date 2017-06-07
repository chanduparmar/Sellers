
	$('#error_company_name').hide();
	$('#error_email').hide();
	$('#error_mobile_no').hide();
	$('#error_pickup_pincode').hide();
	$('#error_pan_no').hide();
	$('#error_vattin').hide();
		var error_company_name = false;
		var error_email = false;
		var error_mobile_no = false;
		var error_pickup_pincode = false;
		var error_pan_no = false;
		var error_vattin = false;
		var flag = false;
			$('#company_name').keyup(function(){
					check_company_name();
			});
		/*s*/

			$('#mobile_no').keyup(function(){
					check_mobile_no();
			});
			$('#pickup_pincode').keyup(function(){
				check_pickup_pincode();
			});
			$('#pan_no').keyup(function(){
					check_pan_no();
			});

			$('#vattin').keyup(function(){
					check_vattin();
			});


				function check_company_name(){
					var company_name = $('#company_name').val();
					console.log(company_name);
					var len =  $('#company_name').val().length;
					console.log(len);
					if($.trim(company_name) == "" || $.trim(len) == 0 ){
						
						$('#error_company_name').text('(Enter the value!)');
						$('#error_company_name').show();
						error_company_name = true;
						flag = true;
					
					}else{
						$('#error_company_name').hide();
					}
				}
					/*function check_email(){
					var email = $('#email').val();
					var len =  $('#email').val().length;
				
					if(email == ""){
						$('#error_email').text('(Enter the 10 Digit Pan No!)');
						$('#error_email').show();
						error_email = true;
						flag = true;
					}else{
						$('#error_email').hide();
					}
				}*/
				function check_mobile_no(){
					var mobile_no = $('#mobile_no').val();
					var len = $('#mobile_no').val().length;
					if($.trim(mobile_no) == "" || !$.isNumeric( mobile_no )  || len == 0 ){

						$('#error_mobile_no').text('(Enter the valid mobile no )');
						$('#error_mobile_no').show();
						error_mobile_no = true;
					}else if(len>10 || len <10){
						$('#error_mobile_no').text('(10 Digit mobile no)');
						$('#error_mobile_no').show();
						error_mobile_no = true;
						flag = true;

					} else{
						$('#error_mobile_no').hide();
					}
				}
				function check_pickup_pincode(){
					var pickup_pincode = $('#pickup_pincode').val().length;
					var len = $('#pickup_pincode').val();
					if($.trim(pickup_pincode) == "" || $.trim(len) == 0 ){
						$('#error_pickup_pincode').text('(Enter PIN Code please ! )');
						$('#error_pickup_pincode').show();
						error_pin_code = true;
						flag = true;
					}else{
						$('#error_pickup_pincode').hide();
					}
				}


						function check_pan_no(){
					var pan_number = $('#pan_no').val();
					var len = $('#pan_no').val().length;
					if($.trim(pan_number) == "" || $.trim(len) == 0  ){
						$('#error_pan_no').text('(Enter the 10 Digit Pan No!)');
						$('#error_pan_no').show();
						flag = true;
						error_pan_no = true;
					}else if($.trim(len)>10 || $.trim(len)<10){
						$('#error_pan_no').text('(Only 10 Digit Allowed!)');
						$('#error_pan_no').show();
						flag = true;
					}else{
						$('#error_pan_no').hide();
					}
				}
					function check_vattin(){
					var vattin = $('#vattin').val();
					var len = $('#vattin').val().length;
					if(vattin == "" || len == 0){
						$('#error_vattin').text('(Enter the pin code! )');
						$('#error_vattin').show();
						error_vattin = true;
						flag = true;
					}else{
						$('#error_vattin').hide();
					}
				}
					
				
					$('#signup_btn').click(function(e){
						/*e.preventDefault();
						error_company_name = false;
						error_email = false;
						error_mobile_no = false;
						error_pickup_pincode = false;
						error_pan_no = false;
						error_vattin = false;
						check_company_name();
						check_email();
						check_mobile_no();
						check_pickup_pincode();
						check_pan_no();
						check_vattin();
						 if(error_company_name == false && error_email == false && error_mobile_no == false && 	error_pickup_pincode == false && error_pan_no == false &&
						error_vattin == false ){*/
							
										
							 	 		$.post('php/scripts/signup.php',$('#signup_form').serializeArray(),function(data){
						 			console.log(data);
    												switch(data){
							
							
              case '0' :
              swal("Oops...", "Fill all values!", "error");
              break;
              case '1' :
              swal("Oops...", "Error!", "error");
              break;
              case '2' :
              swal("Oops...", "Connection Error !", "error");
              break;
              case '3' :
              swal("Oops...", "Email already exist!", "error");
              break;
              case '4' :
              swal("Oops...", "Enter valid email!", "error");
              break;
              case '5' :
              swal("Oops...","Enter Valid Pan Number","error");
              break;
              case '6' :
              swal("Oops...", "Enter valid VAT/TIN number", "error");
              break;
              default :
              swal({   title: "Check your email and activate your account",   text: "Welcome "+data+"!", imageUrl: "images/logo.png", confirmButtonColor: "#DD6B55",   confirmButtonText: "OK",   closeOnConfirm: false}, function(isConfirm){if(isConfirm){location.reload()}});
              break;
            }
    								}); 
					/*	 	return true;

						 }else{
						 	return false;

						 	
						 }*/
					});


	