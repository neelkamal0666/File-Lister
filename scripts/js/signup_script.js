function signUp(){
	var fname=    $("#fname").val();
	var lname=    $("#lname").val();
	var email=    $("#email").val();
	var password1=$("#password1").val();
	var password2=$("#password2").val();
	var gender='no';
	if($("#gender").is(':checked')) {
    	var gender = $("#gender:checked").val();
    } 
	if($("#gender1").is(':checked')) {
    	var gender = $("#gender1:checked").val();
    } 
	if(password1!=password2) {
		$("#password_status").html('<br /><div class="alert alert-danger"><center>Password Didnt match.</center></div>');
	} else if(fname == '' || email == '' || password1 == '' || gender == 'no') {
		$("#final_status").html('<br /><div class="alert alert-danger"><center>You Must Enter All The Fields.</center></div>');
	} else {
	    var dataString='fname='+fname+'&lname=' + lname+'&email=' + email+'&password=' + password1+'&gender=' + gender;
		$.ajax({
			url: 'lib/login_signup/signup.php',
			method: 'POST',
			data: dataString,
			cache: false,
         	success: function(responseData) { 
				if(responseData != 1){
					$("#final_status").html('<br /><div class="alert alert-danger"><center>'+responseData+'</center></div>');
				} else {
					window.location.href = 'Home';
					}
			}
		});
	}
 return false;
}

$(document).ready(function(){
$("#email").change(function() { 
var email = $("#email").val();

if(validateEmail(email)) {
$("#status").html('<img src="images/ajax-loader.gif" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "lib/login_signup/check_email.php",  
    data: "email="+ email,  
    success: function(msg){  
   					$("#status").html('<br />'+msg);
	                     }
	  
      });
} else {
	 $("#status").html('<br /><div class="alert alert-danger"><center>Please Enter A Valid Emaild Address</center></div>');
	}
});
});


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}