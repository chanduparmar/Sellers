
	$('#compnay_name_error_msg').hide();
	$('#compnay_pan_no_error_msg').hide();
	$('#name_error_msg').hide();
	$('#select_error_msg').hide();
	$('#pickup_add_error_msg').hide();
	$('#pin_code_error_msg').hide();
	$('#city_error_msg').hide();
	$('#state_error_msg').hide();
	$('#vattin_error_msg').hide();
	$('#cst_error_msg').hide();
	$('#beneficiary_name_error_msg').hide();
	$('#current_account_numbe_error_msg').hide();
	$('#confirm_current_account_number_error_msg').hide();
	$('#isfc_code_error_msg').hide();
		var error_company_name = false;
		var error_pan_no = false;
		var error_name = false;
		var error_select_cate = false;
		var error_pickup_address = false;
		var error_pin_code = false;
		var error_city = false;
		var error_state = false;
		var error_vattin = false;
		var error_cst = false;
		var error_beneficiary_name = false;
		var error_current_acc_no = false;
		var error_confirm_acc_no = false;
		var error_isfc_code = false;

		
			$('#company_name').keyup(function(){
					check_company_name();
			});
			$('#company_pan_no').keyup(function(){
					check_company_pan_no();
			});

			$('#name').keyup(function(){
					check_name();
			});
			$('#select_cate').keyup(function(){
				check_select_cate();
			});
			$('#product_pickup_address').keyup(function(){
					check_pickup_address();
			});

			$('#pin_code').keyup(function(){
					check_pin_code();
			});

			$('#city').keyup(function(){
					check_city();
						});

			$('#state').keyup(function(){
					check_state();
			});

			$('#vattin_number').keyup(function(){
					check_vattin_number();
			});

			$('#yes,#no').click(function(){
				check_cst();
			});
			$('#beneficiary_name').keyup(function(){
					check_beneficiary_name();
			});

			$('#current_account_number').keyup(function(){
						check_current_acc_num();
			});

			$('#confirm_current_account_number').keyup(function(){
						check_confirm_num();
			});

			$('#isfc').keyup(function(){
					check_isfc();
			});


				function check_company_name(){
					var company_name = $('#company_name').val();
					var len =  $('#company_name').val().length;
					if(company_name == "" || len == 0 ){
						$('#compnay_name_error_msg').text('(Enter the value!)');
						$('#compnay_name_error_msg').show();
						error_company_name = true;
					}else{
						$('#compnay_name_error_msg').hide();
					}
				}





					function check_company_pan_no(){
					var pan_number = $('#company_pan_no').val();
					var len =  $('#company_pan_no').val().length;
					if(pan_number == "" || len == 0 || len<10 || len >10 ){
						$('#compnay_pan_no_error_msg').text('(Enter the 10 Digit Pan No!)');
						$('#compnay_pan_no_error_msg').show();
						error_pan_no = true;
					}else{
						$('#compnay_pan_no_error_msg').hide();
					}
				}
				function check_name(){
					var name_name = $('#name').val();
					var len = $('#name').val().length;
					if(name_name == "" ){
						$('#name_error_msg').text('(Enter the name )');
						$('#name_error_msg').show();
						error_name = true;
					}else{
						$('#name_error_msg').hide();
					}
				}
				function check_select_cate(){
					var select_cate_val = $('#select_cate option:selected').length;
					var len = $('#select_cate').val();
					console.log(select_cate_val);
					console.log(len);
					/*var len = $('#select_cate').val().length;*/
				
				
					if(select_cate_val > 2  ){
						$('#select_error_msg').text('(Max limit is 2 )');
						$('#select_error_msg').show();
						error_select_cates = true;
					}else if(select_cate_val == 0){
						$('#select_error_msg').text('(Please Select the category )');
						$('#select_error_msg').show();
						error_select_cates = true;
					}else{
						$('#select_error_msg').hide();
					}
				}
					function check_pickup_address(){
					var pickup_address = $('#product_pickup_address').val();
					var len = $('#product_pickup_address').val().length;
					if(pickup_address == "" ){
						$('#pickup_add_error_msg').text('(Enter the address! )');
						$('#pickup_add_error_msg').show();
						error_pickup_address = true;
					}else{
						$('#pickup_add_error_msg').hide();
					}
				}
					function check_pin_code(){
					var pin_code = $('#pin_code').val();
					var len = $('#pin_code').val().length;
					if(pin_code == "" ){
						$('#pin_code_error_msg').text('(Enter the pin code! )');
						$('#pin_code_error_msg').show();
						error_pin_code = true;
					}else{
						$('#pin_code_error_msg').hide();
					}
				}
					function check_city(){
					var city = $('#city').val();
					var len = $('#city').val().length;
					if(city == "" ){
						$('#city_error_msg').text('(Enter the name )');
						$('#city_error_msg').show();
						error_city = true;
					}else{
						$('#city_error_msg').hide();
					}
				}
					function check_state(){
					var state = $('#state').val();
					var len = $('#state').val().length;
					if(state == "" ){
						$('#state_error_msg').text('(Enter the state)');
						$('#state_error_msg').show();
						error_state = true;
					}else{
						$('#state_error_msg').hide();
					}
				}
					function check_vattin_number(){
					var vattin_number = $('#vattin_number').val();
					var len = $('#vattin_number').val().length;
					if(vattin_number == "" ){
						$('#vattin_error_msg').text('(Enter the VAT/TIN number )');
						$('#vattin_error_msg').show();
						error_vattin = true;
					}else{
						$('#vattin_error_msg').hide();
					}
				}
				function check_cst(){
					var cst_check = $('input[name=cst]:checked').length;
				
					if(cst_check == 0 ){
						$('#cst_error_msg').text('(Please select the value )');
						$('#cst_error_msg').show();
						error_cst = true;
					}else{
						$('#cst_error_msg').hide();
					}
				}
				function check_beneficiary_name(){
					var beneficiary_name = $('#beneficiary_name').val();
					var len = $('#beneficiary_name').val().length;
					if(beneficiary_name == "" ){
						$('#beneficiary_name_error_msg').text('(Enter the value ! )');
						$('#beneficiary_name_error_msg').show();
						error_beneficiary_name = true;
					}else{
						$('#beneficiary_name_error_msg').hide();
					}
				}
				function check_current_acc_num(){
					var current_account_number = $('#current_account_number').val();
					var len = $('#current_account_number').val().length;
					if(current_account_number == "" ){
						$('#current_account_numbe_error_msg').text('(Enter the account number )');
						$('#current_account_numbe_error_msg').show();
						error_current_acc_no = true;
					}else{
						$('#current_account_numbe_error_msg').hide();
					}
				}
				function check_confirm_num(){
					var confirm_current_account_number = $('#confirm_current_account_number').val();
					var len = $('#confirm_current_account_number').val().length;
					if(confirm_current_account_number == "" ){
						$('#confirm_current_account_number_error_msg').text('(Enter the account number )');
						$('#confirm_current_account_number_error_msg').show();
						error_confirm_acc_no = true;
					}else{
						$('#confirm_current_account_number_error_msg').hide();
					}
				}
				function check_isfc(){
					var isfc = $('#isfc').val();
					var len = $('#isfc').val().length;
					if(isfc == "" ){
						$('#isfc_code_error_msg').text('(Enter the ISFC number )');
						$('#isfc_code_error_msg').show();
						error_isfc_code = true;
					}else{
						$('#isfc_code_error_msg').hide();
					}
				}
					
					$('#next1').click(function(e){
						e.preventDefault();
						 error_company_name = false;
						 error_pan_no = false;
						 error_name = false;
						 error_select_cates = false;
						 check_company_name();
						 check_company_pan_no();
						 check_name();
						 check_select_cate();
						 if(error_company_name == false && error_pan_no == false && error_name == false && error_select_cates == false){
						 	$('#business_details').show();
							$('#basic_details').hide();
						 	return true;

						 }else{
						 	return false;

						 	
						 }
					});
					$('#next2').click(function(e){
						e.preventDefault();
						 error_pickup_address = false;
						 error_pin_code = false;
						 error_city = false;
						 error_state = false;
						 error_vattin = false;
						 error_cst = false;
						check_pickup_address();
						check_pin_code();
						check_city();
						check_state();
						check_vattin_number();
						check_cst();
						 if(error_pickup_address == false && error_pin_code == false && error_city == false && error_state == false && error_vattin == false && error_cst==false ){
						 	$('#bank_details').show();
						$('#business_details').hide();
						 	return true;

						 }else{
						 	return false;

						 	
						 }
					});
					$('#next3').click(function(e){
						e.preventDefault();
						error_beneficiary_name = false;
						error_current_acc_no = false;
						error_confirm_acc_no = false;
						error_isfc_code = false;
						check_beneficiary_name();
						check_current_acc_num();
						check_confirm_num();
						check_isfc();
						 if(error_beneficiary_name == false && error_current_acc_no == false && error_confirm_acc_no == false && error_isfc_code == false){
						 		$.post('php/scripts/approve_test.php',$('#form1,#form2,#form3').serializeArray(),function(data){
    								
    								if(data==3){
    									
											$('#confirm_current_account_number_error_msg').text('(Numbers are not matching)');
									$('#confirm_current_account_number_error_msg').show();
										error_confirm_acc_no = true;
    								}else if(data==1){
    										alert("Error!");

    								}else if(data==2){
    								$('#isfc_code_error_msg').text('(Enter valid ISFC number )');
										$('#isfc_code_error_msg').show();
										error_isfc_code = true;
    								}else{
    									alert("verification success");
    									window.location="login-after.php";
    								}
									

    								});
						 	return true;

						 }else{
						 	return false;

						 	
						 }
					});


		