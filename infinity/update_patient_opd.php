<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(!$_GET['ID']){}else{$ID=$_GET['ID'];}
?>

<?php include './include/header.php';?>
<style>
.form_header{
    border-bottom: dashed 1px #d1d0d0;
    padding-bottom: 10px;}
form{margin-bottom:5px;}
#ipd_display{display:none;}
.form-control{
	margin-bottom: 0.5rem!important;
	border: 0px;
	border-bottom: 1px solid #868e96;
	border-radius: .1rem;}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 1px 2px 8px 0.2rem #dae0e5;}
.card-block:hover{    box-shadow: 3px 3px 3px 0.2rem #868e96;}
.form .button_login:hover, .form .button_login:active, .form .button_login:focus {
    box-shadow: 3px 3px 3px 0.2rem #5C885C;}
.form .button_reset:hover, .form .button_reset:active, .form .button_reset:focus {
        box-shadow: 3px 3px 3px 0.2rem #8c6361;}
.form .seperator{
    border: 0px;
    border-bottom: 1px dashed #b5babd;}
.required {
    font-weight: bold;
}
.required:after {
    color: #e32;
    content: ' *';
    display:inline;
}
#profile_img{border-radius: 50%;width:150px;height:150px;margin:auto;}
.wrapper{display:none;}
#fileToUpload{display:none;}
.error select{
color:red;}
.noerror select{
color:#9e9e9e;}
.error::-webkit-input-placeholder {
    color: red;
}
.noerror::-webkit-input-placeholder {
    color: #9e9e9e;
}
@media print {
 
  .section-to-print, .section-to-print * {
    visibility: visible;
  }
  .section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
<div class="container" id="reg-form-container" style="padding-left:50px;margin-top:15px;">
	<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		<div class="card-block" id="print">
			<div class="form-header-group ">
				  <div class="header-text httal htvam">
					<h5 id="header_1" class="form-header form_header" data-component="header">
					  Patient's Detail
					</h5>
				  </div>
			</div>

			
			<form method="post" action="" class="form " name="user_form"  id="pat_update_form" enctype="multipart/form-data" style="padding: 0 0 0 13%;">
				<div class="form-group row "><!--ID-->
				
				  <label for="regID" id="regID_label" class="col-2 col-form-label ">Reg. ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" placeholder="regID" name="regID" value="" id="regID"  readonly>
				  </div>
				  <label for="patID" id="patID_label" class="col-2 col-form-label ">Pat. ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" placeholder="patID" name="patID" value="" id="patID"  readonly>
				  </div>
				</div>
				<div class="form-group row "><!-- dostor assigned -->
					<label for="doctor_assigned" id="doctor_assigned_label" class="col-2 col-form-label">Doctor assigned</label>
					<div class="col-8">
						<input class="form-control noerror" type="text" placeholder="Doctor assigned" name="doctor_assigned" id="doctor_assigned">
					</div>
				</div>
				<div class="form-group row "><!--name-->
				
				  <label for="name" id="name" class="col-2 col-form-label required">Name</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" placeholder="first name" name="first_name" value="" id="First-name-input"  readonly>
				  </div>
				  <div class="col-3">
					<input class="form-control noerror" type="text" placeholder="last name" name="last_name" value="" id="last-name-input" readonly>
				  </div>
				</div>
				<div class="form-group row"><!--Marital Status--><!--Contact no-->
				 <label for="marital-status-input" class="col-2 col-form-label">Marital Status</label>
				<div id="marital-status-input" class="form-input col-3 noerror">
					<select name="martial_status" class="form-control" id="marital-status-input-select" placeholder="Select marital status">
					<option value="" disabled selected> Select marital status </option>
					<option value="Single"> Single </option>
					<option value="Married"> Married </option>
					<option value="Divorced"> Divorced </option>
					<option value="Legally separated"> Legally separated </option>
					<option value="Widowed"> Widowed </option>
					</select>
				</div>
				  <label for="tel-input-staff" class="col-2 col-form-label required noerror">Contact No.</label><!--Contact no-->
				  <div class="col-3">
					<input class="form-control" type="text" value="" placeholder="contact no." name="contact_staff" id="tel-input-staff" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
				  </div>
				</div>
				<div class="form-group row"><!--gender--><!--age-->
					<label class="col-2 col-form-label required" for="sex-input " > Sex </label>
					<div class="col-3">
						<input class="form-control" type="text" value="" name="gender" id="gender" autocomplete="off" readonly >
					</div>
					<label for="dob" class="col-2 col-form-label required">Age</label>
					<div class="col-3 ">
						<input name="dob" class="form-control noerror" type="text" value="" placeholder="Age" id="age-input" >
					</div>
				</div>	
				<div class="form-group row"><!--Address-->
				  <label for="address-input" class="col-2 col-form-label required">Address</label>
					<div class="col">
						<textarea class="form-control" id="address" placeholder="Enter address here" name="address" style="width: 80%;"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-2 col-form-label" for="doctor_assigned" >Diagnosis.</label>
					<div class="col-3">
						<textarea class="form-control" type="text" value="" name="diagnosis" id="diagnosis" autocomplete="off"readonly></textarea>
					</div>
					<label class="col-2 col-form-label" for="prescription" >Prescription.</label>
					<div class="col-3">
						<textarea class="form-control" type="text" value="" name="prescription" id="prescription" autocomplete="off"  readonly></textarea>
					</div>
				</div>
				<div class="form-group row"><!--Date of birth--><!--Contact no-->
				  
				</div>
			
			<div class="row">
				<div class="col-6">
					<center>
					<input type="submit" class="button_login" name="staff_registration" value="Update" style="width:50%; "/>
					</center>
				</div>
				<div class="col-6">
				<center>
					<input type="button" class="button_reset" id="reset_btn" onclick="printDiv('print')" name="staff_registration" value="Discard Changes" style="width:50%;"/>
				</center>
				</div>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script>
/*----------------Form Fetch*************************/
var ID= "<?php echo $ID;?>";
$(document).ready( function () {
$.ajax({
	   type: "GET",
	   url: <?php echo $url_get_update_patient_by_ID;?>,
	   data: 'ID='+ID+'',// serializes the form's elements.
	   success: function(data)
	   {	
			//console.log(data);
			var json = JSON.parse(data);
			parseJsonToForm(json); 
	   },
		cache: false,
		contentType: false,
		processData: false
	 });
});
function parseJsonToForm(json){
		/* $('#First-name-input').val(json.firstname); */
		setSelectValue('regID', json.RegID);
		setSelectValue('patID', json.patientID);
		setSelectValue('First-name-input', json.FirstName);
		setSelectValue('last-name-input', json.LastName);
		//setSelectValue('username', json.username);
		//setSelectValue('password-input', json.password);
		//setSelectValue('email-input', json.email);
		setSelectValue('tel-input-staff', json.Mobile);
		setSelectValue('gender', json.Gender);
		//console.log("marital status is : "+json.marital_status);
		setSelectValue('marital-status-input-select', json.marital_status);
		
		setSelectValue('age-input', json.Age);
		//setSelectValue('designation-input-select', json.designation);
		//setSelectValue('gender', json.gender);
		setSelectValue('address', json.Address);
		if (!(json.diagnosis)){var diagnosis="Not done yet";}else if(json.diagnosis){var diagnosis=json.diagnosis;}else{var diagnosis="Not done yet";}
		setSelectValue('diagnosis', diagnosis);
		if (!(json.prescription)){var prescription="Not done yet";}else if(json.prescription){var prescription=json.prescription;}else{var prescription="Not done yet";}
		setSelectValue('prescription', prescription);
		setSelectValue('bloodgroup-input-select', json.bloodgroup);
		setSelectValue('role-input-select', json.roleid);
		setSelectValue('ICE-name-input', json.ice_name);
		setSelectValue('ICE-relation-input', json.ice_relation);
		setSelectValue('ICE-tel-input', json.ice_contact);
		setSelectValue('ICE_address', json.ice_address);
		setSelectValue('user-status-input-select', json.isactive);
		//alert(json.avatar);
		//$('#profile_img').attr('src',<?php echo $profile_img_path?>+json.avatar);
		/* $('#last-name-input').val(json.lastname);
		$('#username').val(json.username);
		$('#password-input').val(json.password);
		$('#email-input').val(json.email);
		$('#tel-input-staff').val(json.contact);
		document.getElementById('gender').value = json.gender;
		$('#marital-status-input-select').val(json.gender); */
		
}

	/*------------------------*/
// setSelectValue (id, val) {}is in footer
function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
}	
function toast(){
	alert("New user Created");
}
/* ajax form submission */



$( "form#staff_reg_form" ).on( "submit", function( event ) {
				  event.preventDefault();// avoid to execute the actual submit of the form.
				  //console.log( $("#patient_reg_form").serialize() );
	var formData = new FormData(this);
	//alert("hello world");
    var url = "addstaff.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){				//alert("hello in if loop");
									$.ajax({
										   type: "POST",
										   url: url,
										   data: formData, // serializes the form's elements.
										   success: function(data)
										   {	
												console.log(data);
												//alert(data);
												//alert("this is ajax loop  " + data);
											  //on success take form data and enter to any page you require be it IPD or OPD or Patho.
											  //location.href = "./manage_accounts.php"
										   },
											cache: false,
											contentType: false,
											processData: false
										 });
									}else {}
});
/* form submission end here  */
function FillBilling(f) {
  if(f.address_value.checked == true) {
    f.ICE_address.value = f.address.value;
  }
}
/* allow only numbers in input */

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

/*end*/
/*date constraints for child labour*/
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear()-14;
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("age-input").setAttribute("max", today);
/*            ----------------------------                      */

function printDiv(divName) {

 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}

function validateForm() {
	
    var fname = document.forms["user_form"]["first_name"].value;
    var lname = document.forms["user_form"]["last_name"].value;
    var contact_staff = document.forms["user_form"]["contact_staff"].value;
    var sex = document.forms["user_form"]["sex"].value;
    var dob = document.forms["user_form"]["dob"].value;
    var designation = document.forms["user_form"]["designation"].value;
    var address = document.forms["user_form"]["address"].value;
	var ICE_contact = document.forms["user_form"]["ICE_contact"].value;
	var ICE_address = document.forms["user_form"]["ICE_address"].value;
    if (fname == "" ) {
        alert("First Name must be filled out");
		$("#First-name-input").focus();
		$("#First-name-input").addClass('error').removeClass('noerror');
        return false;
		
    }else if (lname == "" ) {
		alert("Last Name must be filled out");
		$("#last-name-input").focus();
		$("#last-name-input").addClass('error').removeClass('noerror');
        return false;
    }else if (contact_staff == "") {
        alert("contact must be filled out");
		$("#tel-input-staff").focus();
		$("#tel-input-staff").addClass('error').removeClass('noerror');
        return false;
    }else if (sex == "") {
        alert("gender must be selected");
		$("#sex-input").focus();
		$("#sex-input").addClass('error').removeClass('noerror');
        return false;
    }else if (dob == "" ) {
       alert("date of birth must be filled out");
		$("#age-input").focus();
		$("#age-input").addClass('error').removeClass('noerror');
        return false;
    }else if (designation == "" ) {
       alert("Designation must be selected");
		$("#designation-input-select").focus();
		$("#designation-input").addClass('error').removeClass('noerror');
        return false;
    }else if (ICE_contact == "" ) {
       alert("ICE contact must be filled out");
		$("#ICE-tel-input").focus();
		$("#ICE-tel-input").addClass('error').removeClass('noerror');
        return false;
    }else if (ICE_address == "" ) {
       alert("ICE address must be filled out");
		$("#ICE_address").focus();
		$("#ICE_address").addClass('error').removeClass('noerror');
        return false;
    }else{ return true;}
	
}

/*check username*/
$(document).ready(function() {
    var x_timer;    
    $("#username").keyup(function (e){
        var user_name = $(this).val();
        clearTimeout(x_timer);
        x_timer = setTimeout(function(){
            check_username_ajax(user_name);
        }, 1000);
    }); 


	
function check_username_ajax(username){
    $("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/ajax-loader.gif" />');
    $.post('checkusername.php', {'username':username}, function(data) {
      $("#user-result").html(data);
    });
}
});

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<?php
$pageTitle = "Update Patient's HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>