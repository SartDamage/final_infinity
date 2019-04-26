<script>
$("#patetient_registration_to_ipd").on('click',function(){
 $( "form#patient_reg_form" ).off('submit').on('submit',function( e ) {
	e.preventDefault();// avoid to execute the actual submit of the form.
	console.log("serialized(250) form : " +$("#patient_reg_form").serialize()+"" );
    var url = "/addpatient.php"; // the script where you handle the form input.
	var test=validateForm(e);
	if (test==true){
		$.ajax({
		type: "POST",
		url: url,
		data: $("#patient_reg_form").serialize(), // serializes the form's elements.
		success: function(data)
		{	
		if(data!=""){
			swalSuccess("Patient added successfully");//alert
			console.log(data);
			//on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
			//var data = JSON.parse(data);
		}else{
			success_created_patient(data)
		}
		}
	});
}else {}
});
});

$("#patetient_registration_to_opd").on("click",function(event){
	alert("button OPD clicked");
	 $( "form#patient_reg_form" ).submit(function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.
	/* console.log("serialized(250) form : " +$("#patient_reg_form").serialize()+"" ); */
    var url = "./addpatient.php"; // the script where you handle the form input.
	//validateForm(event)
	//var event=$("#patient_reg_form");
	var test=validateForm(event);
	 });
});

$("#patetient_registration_to_patho").on("click",function(event){
	 $( "form#patient_reg_form" ).off('submit').on("submit",function( e ) {
		e.preventDefault();// avoid to execute the actual submit of the form.
		/* console.log("serialized(250) form : " +$("#patient_reg_form").serialize()+"" ); */
		var url = "./addpatient.php"; // the script where you handle the form input.
		var test=validateForm(e);
		if (test==true){
			$.ajax({
				type: "POST",
				url: url,
				data: $("#patient_reg_form").serialize(), // serializes the form's elements.
				success: function(data)
				{
				if(data!=""){ 
					//alert("Patient added successfully");
					var json = JSON.parse(data);
					//console.log(json.RegistrationID);
					console.log(json[0].RegistrationID);
					//parseJsonToForm(json); 
					window.location.href="addpatient_pathology_from_new.php?ID="+json[0].RegistrationID+"";
					swalSuccess(data);//alert
					resetform(patient_reg_form);
					//on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
					//var data = JSON.parse(data);
				 }else{ 
					success_created_patient(data);//not created try again
				 } 
				}
			});
		}else{}
	});
});

$("#patetient_registration_to_radio").on("click",function(event){
	alert("Patient registered to radio");
	event.preventDefault();// avoid to execute the actual submit of the form.
});

function success_created_patient(data){
	swalError("Some error occured, reload the page and try again.");//alert
	console.log("data in function success_created_patient data == "+data);
	//location.href = "./manage_accounts.php#headingOne"
}

function FillBilling(f) {
  if(f.address_value.checked == true) {
    f.ICE_address.value = f.address.value;
  }
}
function patienttypeopd(){
  document.getElementById("ipd_display").style.display = "none";
}
function patienttypeipd(){
	document.getElementById("ipd_display").style.display = "block";
  //Female radio button is checked
}

function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
        return true;
}

function isalphabetonly(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return true;
        return false;
}


function validateForm() {
    var fname = document.forms["user_form"]["first_name"].value;
    var lname = document.forms["user_form"]["last_name"].value;
    var alt_contact = document.forms["user_form"]["alt_contact"].value;
    var sex = document.forms["user_form"]["sex"].value;
    var marital_status = document.forms["user_form"]["marital_status"].value;
    var age = document.forms["user_form"]["age"].value;
    var contact = document.forms["user_form"]["contact"].value;
    var address = document.forms["user_form"]["address"].value;
    var ICE_contact = document.forms["user_form"]["ICE_contact"].value;
    if (fname == "") {
		swalError("First Name must be filled out");//alert
		$("#First-name-input").focus();
		$("#First-name-input").addClass('error').removeClass('noerror');
        return false;
    }else if (lname == "") {
        swalError("Last Name must be filled out");//alert
		$("#last-name-input").focus();
		$("#last-name-input").addClass('error').removeClass('noerror');
        return false;
    }else if (contact == "") {
        swalError("contact must be filled out");//alert
		$("#tel-input").focus();
		$("#tel-input").addClass('error').removeClass('noerror');
        return false;
    }else if (sex == "") {
        swalError("gender must be selected");//alert
		$("#sell").focus();
		$("#sex-input").addClass('error').removeClass('noerror');
        return false;
    }else if (marital_status == "") {
        swalError("marital status must be selected");//alert
		$("#marital-status-input-select").focus();
		$("#marital-status-input").addClass('error').removeClass('noerror');
        return false;
    }else if (age == "") {
        swalError("age must be filled out");//alert
		$("#age-input").focus();
		$("#age-input").addClass('error').removeClass('noerror');
        return false;
	}else if (alt_contact == "") {
        swalError("alternate contact must be filled out");//alert
		$("#tel-alt-input").focus();
		$("#tel-alt-input").addClass('error').removeClass('noerror');
        return false;
    }else if (address == "") {
        swalError("address must be filled out");//alert
		$("#address").focus();
		$("#address-input").addClass('error').removeClass('noerror');
        return false;
    }else if (ICE_contact == "") {
        swalError("ICE contact must be filled");//alert
		$("#ICE-tel-input").focus();
		$("#ICE-tel-input").addClass('error').removeClass('noerror');
        return false;
    }else{return true;}
}
/* --Capitalize First letter function-- */
function capitalize(textboxid, str) {
      // string with alteast one character
      if (str && str.length >= 1)
      {       
          var firstChar = str.charAt(0);
          var remainingStr = str.slice(1);
          str = firstChar.toUpperCase() + remainingStr;
      }
      document.getElementById(textboxid).value = str;
}

function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
}

function swalError(text){
	swal({
              title: "Error!",
              text: text,
              icon: "error",
              timer: 2000,
			  button:false
           });
}

function swalSuccess(text){
	swal({
              title: "Success!",
              text: text,
              icon: "success",
              timer: 2000,
			  button:false
           });
}
	
</script>

<?php
$pageTitle = 'Registration HMS'; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>