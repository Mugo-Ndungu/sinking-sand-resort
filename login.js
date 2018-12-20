$(document).ready(function(){
    $("#btn_submit").click(function(){
        var username = $("#txt_uname").val();
        var password = $("#txt_pwd").val();

        if( username != "Mugo Ndungu" && password != "123456" ){
          alert("Invalid Username Or Password");
        } else {
          location='signup.html';
        }
    });
});
