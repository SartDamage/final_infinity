  
		var encode = document.getElementById('button_login')
			usernameEmail = document.getElementById('usernameEmail'),
			input = document.getElementById('password_forgot_pass'),
			input_cnfrm = document.getElementById('cnfrm_password'),
			output = document.getElementById('output');
			output2 = document.getElementById('output2');
			output3 = document.getElementById('output3');
			output4 = document.getElementById('output4');
			document.getElementById("usernameEmail").readOnly = true;
		encode.onclick = function() {
			if(validate()==true){
			var abs = Base64.encode(input.value);
			output.innerHTML = Base64.encode(input.value);
			output2.innerHTML = Base64.decode(abs);
			output3.innerHTML = base64url(input.value);
			output4.innerHTML = create_jwt(input.value,usernameEmail.value);
			
			
			/*********************************************************************************************/
			// Header
			var oHeader = {alg: 'HS256', typ: 'JWT'};
			// Payload
			var oPayload = {};
			var tNow = KJUR.jws.IntDate.get('now');
			var tEnd = KJUR.jws.IntDate.get('now + 1hour');
			oPayload.heading = "hms_password_reset";
			oPayload.subject = "password reset for "+usernameEmail.value;
			oPayload.nbf = tNow;
			oPayload.iat = tNow;
			oPayload.exp = tEnd;
			oPayload.jti = "id1";
			oPayload.aud = "http://localhost/test/forgot_pass.php";
			// Sign JWT, password=616161
			var sHeader = JSON.stringify(oHeader);
			var sPayload = JSON.stringify(oPayload),
			sKey = Base64.encode("616161")
			var sJWT = KJUR.jws.JWS.sign("HS256", sHeader, sPayload, sKey);
			//var verifysJWT = KJUR.jws.JWS.verifyJWT(sJWT, key, acceptField)
			isValid = KJUR.jws.JWS.verifyJWT(sJWT, sKey, {alg: ["HS256"]}),
			console.log("sJWT is :::"+sJWT+"  ::::::::: "+isValid+"   ::::   tNOW "+tNow+"  ::  exp : "+tEnd+"  :::  Key :"+sKey);
			/*********************************************************************************************/
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
					password = document.getElementById('password_forgot_pass');
				
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
