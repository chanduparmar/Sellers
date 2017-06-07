$('#login_btn').on('click',function(){
      $.post('php/scripts/login.php',$('#login_form').serializeArray(),function(data){
        console.log(data);
            switch(data){
              case '0' :
              sweetAlert("Oops...", "Fill all values!", "error");
              break;
              case '1' :
              sweetAlert("Oops...", "Error!", "error");
              break;
              case '2' :
              sweetAlert("Oops...", "Invalid user !", "error");
              break;
              case '3' :
              sweetAlert("Oops...", "Account is not active!", "error");
              break;
              case '4' :
              swal("Oops...", "Enter valid email!", "error");
              break;
              default :
              swal({   title: "Done!",   text: "Login Success",   imageUrl: "images/logo.png" });
              window.location="php/scripts/check-ver.php";
              break;
            }
      });
    });