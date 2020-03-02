    <?php 
        session_start();
        $host = "localhost";
        $username = "maycloud_usr";
        $password = "";
        $db = "maycloud_db";
    
        $conn = mysqli_connect($host, $username, $password, $db);    
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
                
    ?>

<!DOCTYPE html>
<html lang="en" >

<head>

<style>

.button {
  background: #1eb858;
  box-shadow: #1eb818;
  border-radius: 2px;
  border: none;
  color: #fff;
  cursor: pointer;
  display: block;
  font-size: 2em;
  line-height: 1.6em;
  margin: 2em 0 0;
  outline: none;
  padding: .8em 0;
  text-shadow: 0 1px #68B25B;
}
</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
	       
    <script>
                
                
        $(document).ready(function() {           
                
            $(".register-button").click(function() {   
                var nameValue = $('.register-name').val();
                var surnameValue = $('.register-surname').val();
                var emailValue = $('.register-email').val();
                var passwordValue = $('.register-password').val();
                var password2Value = $('.register-password2').val(); 

                var isEmailValid = validateEmail(emailValue);                
                var passwordLength;
                var passwordIsCorrect;
                
                var checkRegister;

                if(passwordValue.length < 6) {
                    passwordLength = false;
                }
                else {
                    passwordLength = true;
                }

                if(passwordValue != password2Value) {
                    passwordIsCorrect = false;
                }
                else {
                    passwordIsCorrect = true;
                }
                            
               if(nameValue == "") {
                $(".alertMessageName").html("Name cannot be empty!"); 

               } 
               else {
                    $(".alertMessageName").html(""); 
                    if(surnameValue == "") {
                        $(".alertMessageSurname").html("Surname cannot be empty!");
                    }
                    else {
                        $(".alertMessageSurname").html("");
                        if(emailValue == "") {
                            $(".alertMessageEmail").html("Email cannot be empty!");
                        }                        
                        else {
                            $(".alertMessageEmail").html("");
                            if(!isEmailValid) {
                                $(".alertMessageEmail").html("Email address is not valid!");
                            }
                            else {
                                $(".alertMessageEmail").html("");
                                if(passwordValue == "") {
                                    $(".alertMessagePassword").html("Password cannot be empty!");
                                }
                                else {
                                    $(".alertMessagePassword").html("");
                                    if(!passwordLength) {
                                        $(".alertMessagePassword").html("Password must be at least 6 digits");
                                    }
                                    else {
                                        $(".alertMessagePassword").html(""); 
                                        if(password2Value == "") {
                                            $(".alertMessagePassword2").html("Re-Password cannot be empty!");
                                        }
                                        else {
                                            $(".alertMessagePassword2").html("");
                                            if(!passwordIsCorrect) {
                                                $(".alertMessagePassword2").html("Passwords doesn't match!");
                                            }
                                            else {
                                                $(".alertMessagePassword2").html("");

                                                $.ajax({
                                                   url:"http://maycloud.space/register-validate.php",
                                                   type:"post",
                                                   data:{
                                                       sendName:nameValue,
                                                       sendSurname:surnameValue,
                                                       sendEmail:emailValue,
                                                       sendPassword:passwordValue,
                                                       sendPassword2:password2Value
                                                   },     
                                                    success: function(result) { 
                                                        checkRegister = result;                                                       
                                                        // if user exists.
                                                        if(checkRegister == true) {
                                                            $(".alertMessage").html("User Exists!");
                                                            $(".register-name").val("");
                                                            $(".register-surname").val("");
                                                            $(".register-email").val("");
                                                            $(".register-password").val("");
                                                            $(".register-password2").val("");
                                                        }
                                                        
                                                        // if it's a new user.                                                     
                                                        if(checkRegister == false) {    
                                                            alert("Register Completed!");
                                                            var url = "http://maycloud.space/profile.php";
                                                            $(location).attr('href',url);  
                                                        }                                                        
                                                   }, 
                                                 });
                                            }
                                        }
                                    }
                                }
                            } 
                        }
                    }
                }               
             })                           
         })
        
         
         function validateEmail(isEmail) {
             var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

             if (filter.test(isEmail)) {
                 return true;
             }
             else {
                 return false;
             }
         }

         
    </script>
  
  <meta charset="UTF-8">
  <title>Sign Up</title>
  
  
  
      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>

  	

<form action="#" method="post">
  <h2>Sign Up</h2>

		<p>
			<label for="Name" class="floatLabel">Name</label>
<input name="name" class="register-input register-name" type="text">
			   <div class="register-space alertMessageName messageAlerts"></div>
		</p>
		<p>
			<label for="Surname" class="floatLabel">Surname</label>
			 <input name="surname" class="register-input register-surname" type="text">
			<div class="register-space alertMessageSurname messageAlerts"></div>
		</p>
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input name="email" class="register-input register-email" type="text">
			    <div class="register-space alertMessageEmail messageAlerts" ></div>
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			   <input name="password" class="register-input register-password" type="password">
      <div class="register-space alertMessagePassword messageAlerts" ></div>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input name="password2" class="register-input register-password2" type="password">
	  <div class="register-space alertMessagePassword2 messageAlerts"></div>
		</p>
		<p>
			
	    <div><input value="Create My Account" id="submit" class="button register-button" name="submit" type="button"></div> 
			
		</p>
		
		     <div class="alertMessage"></div>


       <div class="col-xs-4"></div>                               
       <div class="register-space"></div>
       <div class="register-space"></div>
	</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
