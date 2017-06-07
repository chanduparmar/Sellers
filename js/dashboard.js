 $('#already_listed_cont').hide();

 $('#sales_panel_cont').hide();
 $('#order_history_cont').hide();
 $('#new_order_cont').hide();
 $('#returns_cont').hide();
 $('#upload_prod_cont').hide();
 $('#upload_images_cont').hide();
 $('#order_completed_cont').hide();

 $('#upload_product,#upload_product_nav').click(function(){
  $('#dashboard_cont,#already_listed_cont,#order_history_cont,#new_order_cont,#returns_cont,#upload_images_cont,#order_completed_cont').hide();
  $('#upload_prod_cont').show();

});
 $('#upload_images,#upload_images_nav').click(function(){
  $('#dashboard_cont,#already_listed_cont,#order_history_cont,#new_order_cont,#returns_cont,#upload_prod_cont,#order_completed_cont').hide();
  $('#upload_images_cont').show();

});
 $('#already_list,#already_list_nav').click(function(){
   $('#dashboard_cont,#sales_panel_cont,#order_history_cont,#new_order_cont,#returns_cont,#upload_images_cont,#upload_prod_cont,#order_completed_cont').hide();
   $('#already_listed_cont').show();
 });
 $('#order_history,#order_history_nav,#order_history_dash').click(function(){
  $('#dashboard_cont,#sales_panel_cont,#already_listed_cont,#new_order_cont,#returns_cont,#upload_images_cont,#upload_prod_cont,#order_completed_cont').hide();
  $('#order_history_cont').show();
});
 $('#new_order,#new_order_nav,#order_pending_dash').click(function(){
  $('#dashboard_cont,#sales_panel_cont,#already_listed_cont,#order_history_cont,#returns_cont,#upload_images_cont,#upload_prod_cont,#order_completed_cont').hide();
  $('#new_order_cont').show();

});
 $('#returns,#returns_nav').click(function(){
  $('#dashboard_cont,#sales_panel_cont,#already_listed_cont,#order_history_cont,#new_order_cont,#upload_images_cont,#upload_prod_cont,#order_completed_cont').hide();
  $('#returns_cont').show();

});
 $('#dashboard,#dashboard_nav').click(function(){
  $('#sales_panel_cont,#already_listed_cont,#order_history_cont,#returns_cont,#new_order_cont,#returns,#upload_images_cont,#upload_prod_cont').hide();
  $('#dashboard_cont').show();

});
  $('#order_completed_nav,#order_completed').click(function(){
  $('#dashboard_cont,#sales_panel_cont,#already_listed_cont,#order_history_cont,#returns_cont,#new_order_cont,#returns,#upload_images_cont,#upload_prod_cont,#order_complete_cont').hide();
  $('#order_completed_cont').show();

});


 $('#edit-prod').click(function(){

   Materialize.toast('Click on field for editing', 2000);
 });
 $('#delete-prod').click(function(){
  if ($('.checkdata').is(':checked')) {
  var conf = confirm("Are you sure ?");
}else{
  alert("Select Product Please!");
}
  if(conf){
  $.post('php/scripts/delete-prod.php',$('.checkdata').serializeArray(),function(data){
    alert("Products  Deleted!");
      location.reload();
  });
  }
 });

 var message_status = $("#status");
 $("td[contenteditable=true]").blur(function(){
    var field_prod_id = $(this).attr("id");
    var value = $(this).text();
    $('#save-prod').click(function(){
    $.post('php/scripts/updateprod.php',field_prod_id + "=" + value, function(data){
     
          if(data != ""){
            
              Materialize.toast('Information Edited!', 2000);
              location.reload();

          }
          });
    });
 });
/*
 <td> <select id="order_status" name="order_status">
      <option value="" disabled >Choose your option</option>
      <option value="2" <?php if ($getHistOrderData['order_status_id'] == 2) echo 'selected="selected"' ?>>Processing</option>
      <option value="3" <?php if ($getHistOrderData['order_status_id'] == 3) echo 'selected="selected"' ?>>Shipped</option>
      <option value="7" <?php if ($getHistOrderData['order_status_id'] == 7) echo 'selected="selected"' ?>>Canceled</option>
      <option value="5" <?php if ($getHistOrderData['order_status_id'] == 5) echo 'selected="selected"' ?>>Complete</option>
      <option value="8" <?php if ($getHistOrderData['order_status_id'] == 8) echo 'selected="selected"' ?>>Denied</option>
      <option value="9" <?php if ($getHistOrderData['order_status_id'] == 9) echo 'selected="selected"' ?>>Canceled Reversal</option>
      <option value="10" <?php if ($getHistOrderData['order_status_id'] == 10) echo 'selected="selected"' ?>>Failed</option>
      <option value="11" <?php if ($getHistOrderData['order_status_id'] == 11) echo 'selected="selected"' ?>>Refunded</option>
      <option value="12" <?php if ($getHistOrderData['order_status_id'] == 12) echo 'selected="selected"' ?>>Reversed</option>
      <option value="13" <?php if ($getHistOrderData['order_status_id'] == 13) echo 'selected="selected"' ?>>ChargeBack</option>
      <option value="1" <?php if ($getHistOrderData['order_status_id'] == 1) echo 'selected="selected"' ?>>Pending</option>
      <option value="16" <?php if ($getHistOrderData['order_status_id'] == 16) echo 'selected="selected"' ?>>Voided</option>
      <option value="15" <?php if ($getHistOrderData['order_status_id'] == 15) echo 'selected="selected"' ?>>Processed</option>
      <option value="14" <?php if ($getHistOrderData['order_status_id'] == 14) echo 'selected="selected"' ?>>Expired</option>
    </select></td>
*/

 $(".mybtn").click(function(){
   var id = $(this).attr("value");
   $.post('php/scripts/changeStatus.php',{id : id},function(data){
    console.log(data);
    $('#'+id).text("Shipped");
  });
   
 });
$('#update_status').hide();
$('#update_btn').click(function(){
  $('#update_status').toggle();
});


 $('.collapsible').collapsible();


    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    $('.dropdown-button').dropdown({

      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover


      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
    );
    
    $('select').material_select();
    $('.button-collapse').sideNav({
       // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
    );
    