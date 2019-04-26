<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/userClass.php";

$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';?>
<?php
ob_start (); // Buffer output
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
include $_SERVER['DOCUMENT_ROOT']."/include/header.php";
?>
<!-- login-->
	<style>
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #008B8B; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #008B8B, #008B8B);
  background: -moz-linear-gradient(right, #008B8B,#008B8B);
  background: -o-linear-gradient(right, #008B8B, #008B8B);
  background: linear-gradient(to left, #008B8B, #008B8B);
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form .button_login {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .button_login:hover,.form .button_login:active,.form .button_login:focus {
  background: #43A047;
}
.form .button_reset {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .button_reset:hover,.form .button_reset:active,.form .button_reset:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #F5F5F5;
  font-size: 12px;
}
.form .message a {
  color: #f8f9fa;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background-color: #f8f9fa!important;
  /*font-family: "Roboto", sans-serif;*/
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
.errorMsg{color:red;}
.header{
	color:#8b0000;
}
	</style>
	<!--end style for login-->
	<div class="login-page">
		<center><img src="<?php echo $logourl;?>" alt="Avatar" style="width:100px;border-radius: 50%;" ></center>
		<br>
		<br>	
		<form class="login-form form" method="post" action="" name="login">
			<div>
				<h4 class="header">Reset Password</h4>
				<br>
			</div>
			<input type="text" placeholder="Username" name="usernameEmail" id="usernameEmail" autocomplete="off"/>
			<input type="password" id="password" placeholder="Enter new password" name="password" autocomplete="off"/>				
			<input type="password" placeholder="Re-enter password" id="cnfrm_password" name="password_confirmation" autocomplete="off"/>
			<input type="button" id="button_login" class="button_login" name="loginSubmit" value="Reset Password">
			<div class="errorMsg"><p id="output"></p><br><p id="output2"></p><br><p id="output3"></p><br><p id="output4" style="word-wrap: break-word;"></p><?php echo $errorMsgLogin; ?></div>
		</form>
	</div>
		<script>
    
		var encode = document.getElementById('button_login')
			usernameEmail = document.getElementById('usernameEmail'),
			input = document.getElementById('password'),
			output = document.getElementById('output');
			output2 = document.getElementById('output2');
			output3 = document.getElementById('output3');
			output4 = document.getElementById('output4');

		encode.onclick = function() {
			if(validate()==true){
			var abs = Base64.encode(input.value);
			output.innerHTML = Base64.encode(input.value);
			output2.innerHTML = Base64.decode(abs);
			output3.innerHTML = base64url(input.value);
			output4.innerHTML = create_jwt(input.value,usernameEmail.value);
			}else{}
		}
		
		function create_jwt(id,password){
		var header = {
					  "alg": "HS256",
					  "typ": "JWT"
					};
		var encodedHeader = base64url(JSON.stringify(header));
		var data = {
					  "id": id,
					  "username": password
					};
		var encodedData = base64url(JSON.stringify(data));
		var token = encodedHeader + "." + encodedData;
		return token;
		}
		
		function base64url(source) {
		  // Encode in classical base64
		  encodedSource = Base64.encode(source);

		  // Remove padding equal characters
		  encodedSource = encodedSource.replace(/=+$/, '');

		  // Replace characters according to base64url specifications
		  encodedSource = encodedSource.replace(/\+/g, '-');
		  encodedSource = encodedSource.replace(/\//g, '_');

		  return encodedSource;
		}
		
		/* $("#usernameEmail").focus();
	$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
}); */


		function validate(){
				var usernameEmail = document.getElementById('usernameEmail'),
					password = document.getElementById('password');
				
				if(usernameEmail.value=="" || usernameEmail.value==null){
					swalInfo("Enter Username");
					usernameEmail.focus();
					return false;
				}else if (password.value=="" || password.value ==null){
					swalInfo("Enter Password");
					password.focus();
					return false;
				}else{return true;}
		}

var Base64 = {
    characters: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=" ,

    encode: function( string )
    {
        var characters = Base64.characters;
        var result     = '';

        var i = 0;
        do {
            var a = string.charCodeAt(i++);
            var b = string.charCodeAt(i++);
            var c = string.charCodeAt(i++);

            a = a ? a : 0;
            b = b ? b : 0;
            c = c ? c : 0;

            var b1 = ( a >> 2 ) & 0x3F;
            var b2 = ( ( a & 0x3 ) << 4 ) | ( ( b >> 4 ) & 0xF );
            var b3 = ( ( b & 0xF ) << 2 ) | ( ( c >> 6 ) & 0x3 );
            var b4 = c & 0x3F;

            if( ! b ) {
                b3 = b4 = 64;
            } else if( ! c ) {
                b4 = 64;
            }

            result += Base64.characters.charAt( b1 ) + Base64.characters.charAt( b2 ) + Base64.characters.charAt( b3 ) + Base64.characters.charAt( b4 );

        } while ( i < string.length );

        return result;
    } ,

    decode: function( string )
    {
        var characters = Base64.characters;
        var result     = '';

        var i = 0;
        do {
            var b1 = Base64.characters.indexOf( string.charAt(i++) );
            var b2 = Base64.characters.indexOf( string.charAt(i++) );
            var b3 = Base64.characters.indexOf( string.charAt(i++) );
            var b4 = Base64.characters.indexOf( string.charAt(i++) );

            var a = ( ( b1 & 0x3F ) << 2 ) | ( ( b2 >> 4 ) & 0x3 );
            var b = ( ( b2 & 0xF  ) << 4 ) | ( ( b3 >> 2 ) & 0xF );
            var c = ( ( b3 & 0x3  ) << 6 ) | ( b4 & 0x3F );

            result += String.fromCharCode(a) + (b?String.fromCharCode(b):'') + (c?String.fromCharCode(c):'');

        } while( i < string.length );

        return result;
    }
};








/*******************************************************************************************/

function swalInfo(text,title){
	if (!title){
			swal({
					  title: "info!",
					  text: text,
					  icon: "info",
					  timer: 2000,
					  button:false
				   });
	}else{
			swal({
					  title: title,
					  text: text,
					  icon: "info",
					  timer: 2000,
					  button:false
				   });
	}
}

function swalWarning(text,title){
	if (!title){
	swal({
              title: "warning",
              text: text,
              icon: "warning",
              timer: 2000,
			  button:false
	});}
	else{swal({
              title: title,
              text: text,
              icon: "warning",
              timer: 2000,
			  button:false
	});}
}

function swalError(text,title){
	if (!title){
	swal({
			  title: "Error!",
			  text: text,
			  icon: "error",
			  timer: 2000,
			  button:false
	});
	}else{
		swal({
			  title: title,
			  text: text,
			  icon: "error",
			  timer: 2000,
			  button:false
	});}
}

function swalSuccess(text,title){
	if (!title){
	swal({
              title: "Success!",
              text: text,
              icon: "success",
              timer: 2000,
			  button:false
           });
	}else{
		swal({
              title: title,
              text: text,
              icon: "success",
              timer: 2000,
			  button:false
           });}
}


/*******************************************************************************************/
</script>
  <!-- end Login-->
  <!--
  <div id="signup">
<h3>Registration</h3>
<form method="post" action="" name="signup">
<label>Email</label>
<input type="text" name="emailReg" autocomplete="off" />
<label>Username</label>
<input type="text" name="usernameReg" autocomplete="off" />
<label>Password</label>
<input type="password" name="passwordReg" autocomplete="off"/>
<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
<input type="submit" class="button" name="signupSubmit" value="Signup">
</form>
</div>-->
<?php
$pageTitle = 'Password Reset'; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>