<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include$_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);?>
<!--  -->
<?php if(!$_GET['ID']){}else{$ID=$_GET['ID'];}?>
<!--  -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
<style>
.form_header{border-bottom: dashed 1px #d1d0d0;padding-bottom: 10px;}
form{margin-bottom:5px;}
#ipd_display{display:none;}
.form-control{margin-bottom: 0.5rem!important;border: 0px;border-bottom: 1px solid #868e96;border-radius: .1rem;}
.form-control:focus{color: #495057;background-color: #fff;border-color: #868e96;outline: 0;box-shadow: 4px 4px 0px 0rem #dae0e5;}
.radio:focus {color: #495057;background-color: #fff;border-color: #868e96;outline: 0;box-shadow: 0px 0px 20px 0rem #dae0e5;}
a {-webkit-transition: .25s all;transition: .25s all;}
.card {overflow: hidden;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);-webkit-transition: .25s box-shadow;transition: .25s box-shadow;}
.card:focus,.card:hover {box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);}
.card-inverse .card-img-overlay {background-color: rgba(51, 51, 51, 0.85);border-color: rgba(51, 51, 51, 0.85);}
.form .button_login:hover, .form .button_login:active, .form .button_login:focus {box-shadow: 3px 3px 3px 0.2rem #5C885C;}
.form .seperator, .seperator{border: 0px;border-bottom: 1px dashed #b5babd;}
.required {font-weight: bold;}
.required:after {color: #e32;content: ' *';display:inline;}
.error select{color:red;}
.noerror select{color:#9e9e9e;}
.error::-webkit-input-placeholder {color: red;}
.noerror::-webkit-input-placeholder {color: #9e9e9e;}
input:not([type='submit']), select, summary, textarea {background-color: #fff0!important;border-radius: .25rem;}
</style>

<?php //include 'nav_sidebar.php';
	include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';	?>
<div id="main">
<?php include 'nav_bartop.php';?>
<div class="container" id="reg-form-container"  style="margin-top:18px;">

	<div class="card card-outline-info mb-3">
	  <div class="card-block heading_bar">
		<h5>Update patient's information</h5>
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
		<i class="fa fa-times my-float"></i>
	</a>
	  </div>
	</div>
	<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
		<div class="card-block">
			<div class="form-header-group ">
				  <div class="header-text httal htvam">
				  <div class="row">
					<hr class="seperator" width="97%">
					</div>
					<div class="row justify-content-md-center">
						<div class="col-md-auto">
						<h6>Patient Form</h6>
						</div>
					</div>
					<div class="row">
					<hr class="seperator" width="97%">
					</div>
					<div class="row">
						<div class="col-3 offset-md-9 pull-right">
							<!--<a href="/list_all_patients.php">--><a href="/universal_home.php"><button class="btn btn-outline-success pull-right" ><i class="fa fa-sign-in fa-2" aria-hidden="true"></i> Go to All Patients</button></a>
						</div>
					</div>
				  </div>
			</div>
			<form method="post" action=""  class="form" name="user_form"  id="patient_reg_form">
			<div class="form-group row justify-content-md-center "><!--name-->
			<!--<input type="text" id="regID" name="regID" value="" hidden>-->
			  <label for="name" id="name" class="col-2 col-form-label required">Name</label>
			  <div class="col-3">
				<input class="form-control" type="text" placeholder="first name" name="first_name" value="" id="First-name-input" onkeypress="return isalphabetonly(event)"  onkeyup="javascript:capitalize(this.id, this.value);">
			  </div>
			  <div class="col-3">
				<input class="form-control" type="text" placeholder="last name" name="last_name" value="" id="last-name-input" onkeypress="return isalphabetonly(event)" onkeyup="javascript:capitalize(this.id, this.value);">
			  </div>
			  <div class="col-2">
			  </div>
			  <!--
			  <div class="col-4">
				<input  name="patient_type" id="IPD" value="IPD"  class="form-control radio" style="width:auto;display:inline;" onclick="patienttypeipd()" type="radio">
				<label >&nbsp&nbsp&nbsp&nbsp IPD</label>&nbsp&nbsp&nbsp
				<input  name="patient_type" id="OPD" value="OPD" class="form-control radio" style="width:auto;display:inline;"  onclick="patienttypeopd()" type="radio" checked>
				<label >&nbsp&nbsp&nbsp&nbsp OPD</label>
			  </div>-->
			</div>
			<div class="form-group row justify-content-md-center"><!--Age--><!--gender-->
			  <label for="age-input" class="col-2 col-form-label required">Age</label>
			  <div class="col-3">
				<input name="age" class="form-control" type="text" value="" placeholder="Age" id="age-input">
			  </div>
			  <label class="col-2 col-form-label required" for="sex-input "> Sex </label>
				<div id="sex-input" class="form-input col-3">
					<select name="sex" class="form-control" id="sel1" placeholder="select gender">
						<option value="" disabled selected>Select gender</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>

			</div>
			<div class="form-group row justify-content-md-center"><!--Contact--><!--alt contact-->
				<label for="tel-input" class="col-2 col-form-label required">Contact No.</label><!--Contact no-->
					<div class="col-3">
						<input name="contact" onkeypress="return isNumberKey(event)" class="form-control" type="tel" value="" placeholder="contact no." id="tel-input" autocomplete="off"  maxlength="10">
					</div>
				<label for="tel-alt-input"  class="col-2 col-form-label " >Alternate No.</label><!--Alt Contact no-->
					  <div class="col-3">
						<input class="form-control" onkeypress="return isNumberKey(event)" type="tel" value="" placeholder="alternate contact no." name="alt_contact" id="tel-alt-input" autocomplete="off"  maxlength="10">
					  </div>
			</div>
			<div class="form-group row justify-content-md-center"><!--Email--><!--marital status-->
			  <label for="email-input" class="col-2 col-form-label">Email</label>
			  <div class="col-3">
				<input class="form-control" type="email" value="" name="email" placeholder="enter email" id="email-input" autocomplete="off" >
			  </div>
				<label class="col-2 col-form-label required" for="marital-status-input ">Marital Status</label>
				  <div id="marital-status-input" class="form-input col-3">
						<select name="marital_status" class="form-control" id="marital-status-input-select" placeholder="Select marital status">
						<option value="" disabled selected> Select marital status </option>
						<option value="Single"> Single </option>
						<option value="Married"> Married </option>
						<option value="Divorced"> Divorced </option>
						<option value="Legally separated"> Legally separated </option>
						<option value="Widowed"> Widowed </option>
						</select>
					</div>


			</div>
			<div class="form-group row justify-content-md-center"><!--weight/height-->
			  <label for="height-input"  class="col-2 col-form-label">Height (inches)</label>
			  <div class="col-3">
				<input name="height" onkeypress="return isNumberKey(event)" class="form-control" type="number"  value="" placeholder="0.00"  id="height-input" step="0.01" min="0"  max="120">
			  </div>

			  <label for="weight-input" class="col-2 col-form-label">Weight (Kilogram)</label>
			  <div class="col-3">
				<input name="weight" onkeypress="return isNumberKey(event)" class="form-control" type="number" value="" placeholder="0.0" id="weight-input" step="0.1" min="0" max="100">
			  </div>
			</div>
			<div class="form-group row justify-content-md-center"><!--Address-->
			  <label for="address-input" class="col-2 col-form-label required">Address</label>
				<div class="col-3">
				<textarea class="form-control" id="address" placeholder="Enter address here" name="address" onkeyup="javascript:capitalize(this.id, this.value);" rows="4"></textarea>
				</div>
				<label for="weight-input" class="col-2 col-form-label">Blood group</label>
				  <div class="col-2">
					<input name="blood_group" list="bloodgroup" class="form-control" type="tel" value=""  id="blood-input">
					</label>
					<datalist id="bloodgroup">
					<option value="A+"> A+ </option>
					<option value="A-"> A- </option>
					<option value="B+"> B+ </option>
					<option value="B-"> B- </option>
					<option value="O+"> O+ </option>
					<option value="O-"> O- </option>
					<option value="AB+"> AB+ </option>
					<option value="AB-"> AB- </option>
					</datalist>
				  </div>
			  <div class="col-1">
			  </div>
			</div>
				<hr class="seperator ipd">
						<div class="form-subHeader">
							Government Identification cards
						</div>
						<br>
						<div class="form-group row justify-content-center">
							<label for="GI_type" class="col-2 col-form-label">Identification card</label>
							<div class="col-3">
								<select class="form-control selectpicker" id="GI_type" name="GI_type" oninput="GI_type_option(this.value,this.options[this.selectedIndex].getAttribute('data-card_name'),'GI_number')">
									<option value="" disabled selected> Select Card type </option>
									<?php $db = getDB();$statement=$db->prepare("SELECT ic.`ID`,ic.`card_label` FROM `identification_card` AS ic WHERE `IsActive`=1;");$statement->execute();$results=$statement->fetchAll();
									//$json=json_encode($results);//return $json;//$str = 'In My Cart : 11 12 items';//wa in value (option) $row['ConsultingDoctorID']
									foreach($results as $row) {echo "<option value=".$row['ID']." data-card_name=".$row['card_label'].">" . $row['card_label'] . "</option>";}$db=null;?>
								</select>
							</div>
							<label for="GI_number" class="col-2 col-form-label">Identification Number</label>
							<div class="col-3">
								<input type="text" class="form-control" name="GI_number" id="GI_number"/>
							</div>
						</div>
					<hr class="seperator ipd">
			<!-- <div id="ipd_display" class=""> -->

				<div class="form-subHeader">
						  In case of emergency
				</div>
				<br>
				<div class="form-group row justify-content-md-center ipd"><!--emergency contact name--><!--emergency contact relation-->
				  <label for="ICE-name-input" class="col-2 col-form-label">Name</label>
				  <div class="col-3">
					<input name="ICE_name" class="form-control" type="text" value="" placeholder="Name" id="ICE-name-input" onkeypress="return isalphabetonly(event)" onkeyup="javascript:capitalize(this.id, this.value);">
				  </div>
				  <label for="ICE-relation-input" class="col-2 col-form-label">Relation</label>
				  <div class="form-input col-2">
					<input name="ICE_relation" onkeypress="return isalphabetonly(event)" class="form-control" type="text" value="" placeholder="Relation" id="ICE-relation-input">
				  </div>
			  <div class="col-1">
			  </div>
				</div>
				<div class="form-group row justify-content-md-center ipd"><!--emergency contact number-->
				  <label for="ICE-tel-input" class="col-2 col-form-label required">Contact No.</label>
				  <div class="col-3">
					<input name="ICE_contact" onkeypress="return isNumberKey(event)" class="form-control" type="tel" value="" placeholder="contact no." id="ICE-tel-input" autocomplete="off"  maxlength="10">
				  </div>
				  <div class="col-5">
				  </div>
				  <!--
				  <label for="ward_no" class="col-1 col-form-label required" style="padding-right: 0px;">Ward No</label>
				  <div class="col-1">
					<input name="ward_no" class="form-control" type="tel" value="null" placeholder="ward no." id="ward_no" autocomplete="off" >
				  </div>
				  <label for="bed_no" class="col-1 col-form-label required">Bed No</label>
				  <div class="col-1">
					<input name="bed_no" class="form-control" type="tel" value="" placeholder="Bed no." id="bed_no" autocomplete="off" >
				  </div>
				  <label for="amount_deposit" class="col-1 col-form-label required">Advance deposit</label>
				  <div class="col-2">
					<input name="amount_deposit" class="form-control" type="tel" value="null" placeholder="Amount" id="amount_deposit" autocomplete="off" >
				  </div>
				  -->
				</div>
				<div class="form-group row justify-content-md-center ipd"><!--Address-->
				  <label for="alt-address-input" class="col-2 col-form-label required">Address</label>
					<div class="col-3">
					<textarea name="ICE_address" id="ICE_address" class="form-control" placeholder="Enter address here" style="width:100%;"></textarea>
					</div>
					<div class="col-offset-2  col-xs-offset-2  col-sm-offset-2 col-md-offset-2  col-3">
					<input  name="address_value"  class="form-control" style="width:auto;display:inline;"  type="checkbox"onclick="FillBilling(this.form)">
					<label >&nbsp&nbsp&nbsp&nbspaddress same as above</label>
					</div>
			  <div class="col-2">
			  </div>
				</div>
			<!-- </div > -->
			<br>
			<div class="form-subHeader">
			<b>          Medical history</b>
			</div>
			<br>
			<div class="form-group row justify-content-md-center"><!--medical history-->
			  <label for="example-time-input" class="col-2 col-form-label">Taking any current medication</label>
			  <div class="col-10">
				<label class="radio-inline"><input class="form-control radio" type="radio" name="med_history" value="yes">Yes</label>
				<label class="radio-inline"><input class="form-control radio" type="radio" name="med_history" value="no" checked="checked">No</label>
			  </div>
			</div>
			<div class="form-group row justify-content-md-center"><!--medical number-->
			  <label for="med-history-input" class="col-2 col-form-label">If yes, please list it here.</label>
			  <div class="col-6">
				<textarea name="med_history_detail"  id="med_history_detail" class="form-control" placeholder="" style="width:50%;"></textarea>
			  </div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col-2">
					<input type="submit" class="btn btn-success button_login button_bottom_form" name="patetient_registration_update" id="patetient_registration_update" value="Save" >
				</div>
				<!--<div class="col-2">
					<input type="submit" class="btn btn-success button_login button_bottom_form" name="patetient_registration_to_ipd" id="patetient_registration_to_ipd" value="IPD" disabled> <!-- onclick="printJS({ printable: 'patient_reg_form', type: 'html', header: 'PrintJS - Form Element Selection' })" -->
				<!--</div>
				<div class="col-2">
					<input type="submit" class="btn btn-success button_login button_bottom_form" name="patetient_registration_to_opd" id="patetient_registration_to_opd" value="OPD" disabled>
				</div>-->
				<div class="col-2" hidden>
					<input type="submit" class="btn btn-success button_login button_bottom_form" name="patetient_registration_to_patho" id="patetient_registration_to_patho" value="Pathology" hidden>
				</div>
				<!--<div class="col-2">
					<input type="submit" class="btn btn-success button_login button_bottom_form" name="patetient_registration_to_radio" id="patetient_registration_to_radio"  value="Radiology" disabled>
				</div>-->
					<input type="text" class="hidden" name="AdminID" id="AdminID" value="<?php echo $userDetails->ID;?>">
					<input type="text" class="hidden" name="RegID" id="RegID" value="<?php echo $ID;?>">
			</div>
			</form>
			</div>
		</div>
	</div>
</div>

<script>
/****************Form Fetch*************************/
var ID= "<?php echo $ID;?>";
$(document).ready( function () {
$.ajax({
	   type: "GET",
	   url: <?php echo $get_patient_detail_by_regID;?>,
	   data: 'ID='+ID+'',// serializes the form's elements.
	   success: function(data)
	   {
			console.log(data);
			var json = JSON.parse(data);
			parseJsonToForm(json);
			//alert(data);
			//alert("this is ajax loop  " + data);
		  //on success take form data and enter to any page you require be it IPD or OPD or Patho.
		  //location.href = "./manage_accounts.php"

	   },
		cache: false,
		contentType: false,
		processData: false
	 });
});
function parseJsonToForm(json){
		/* $('#First-name-input').val(json.firstname); */
		setSelectValue('First-name-input', json.FirstName);
		setSelectValue('last-name-input', json.LastName);
		/*setSelectValue('username', json.username);
		setSelectValue('password-input', json.password);*/
		setSelectValue('email-input', json.Email);
		setSelectValue('tel-input', json.Mobile);
		setSelectValue('sel1', json.Gender);
		setSelectValue('marital-status-input-select', json.marital_status);/*get from pat_detail*/
		setSelectValue('age-input', json.Age);
		setSelectValue('tel-alt-input', json.alternate_contact);
		setSelectValue('height-input', json.height);
		setSelectValue('weight-input', json.weight);
		if(json.GI_type==""){
		    var GI_type= Base64.decode(json.GI_type);
		}
		if(json.GI_type==""){
		    var GI_number= Base64.decode(json.GI_number);    
		}
		
		setSelectValue('GI_type', GI_type);
		setSelectValue('GI_number', GI_number);
		//setSelectValue('designation-input-select', json.designation);
		//setSelectValue('gender', json.gender);
		//setSelectValue('age-input', json.age);
		debugger;
		setSelectValue('address', json.Address);
		setSelectValue('blood-input', json.bloodgroup);
		//setSelectValue('role-input-select', json.roleid);
		setSelectValue('ICE-name-input', json.ice_name);
		setSelectValue('ICE-relation-input', json.ice_relation);
		setSelectValue('ICE-tel-input', json.ice_contact);
		setSelectValue('ICE_address', json.ice_address);
		setSelectValue('ICE_address', json.ice_address);
		setSelectValue('med_history_detail', json.med_history_detail);

		//setSelectValue('user-status-input-select', json.isactive);
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

/**********************************************/
// setSelectValue (id, val) {}is in footer
function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
}

/**********-------------------------************/
$("#patetient_registration_update").on("click",function(event){
	 $( "form#patient_reg_form" ).off('submit').on( "submit", function( event ) {
		event.preventDefault();// avoid to execute the actual submit of the form.
		var url = "./addpatient_redundant_test.php"; /* the script where you handle the form input.*/
		console.log("form data : "+$("#patient_reg_form").serialize());
		var test=validateForm(event);
		if (test==true){
				$.ajax({
					   type: "POST",
					   url: url,
					   data: $("#patient_reg_form").serialize(), /* serializes the form's elements.*/
					   success: function(data)
					   {
					   //alert(data);
					   if(data=="Patient updated successfully"){
						   var icon = "success";
						   var title = icon;
						   var text = data;
					   }else{
						   var icon = "error";
						   var title = "Error";
						   var text = data;
						   console.log(data);
					   }
					   swal({
						  title: title,

						  text: text,
						  icon: icon,
						  button:false,
						   timer: 1500
						});
						/*alert("Patient Updated successfully");
						//alert(data);
						//console.log(data);
						//on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
						//location.href = "./manage_accounts.php#headingOne"*/
					   }
					 });
				}else {}
	});

});

$("#patetient_registration_to_ipd").on("click",function(event){
	 $( "form#patient_reg_form" ).off('submit').on( "submit", function( event ) {
		event.preventDefault();/* avoid to execute the actual submit of the form.*/
		/*alert("hello world");*/
		var url = "./addpatient_redundant_test.php"; /*the script where you handle the form input.*/
		/*validateForm(event)*/
		var test=validateForm(event);
		if (test==true){				/*alert("hello in if loop");*/
				$.ajax({
					   type: "POST",
					   url: url,
					   data: $("#patient_reg_form").serialize(), /* serializes the form's elements.*/
					   success: function(data)
					   {
						alert("Patient added successfully");
						 swal({
						  title: "Success",

						  text: "Patient added successfully",
						  icon: "success",
						  button:false,
						   timer: 1500
						});
						/*alert(data);
						//console.log(data);
						//on success take form data and enter to any pafe you require be it IPD or OPD or Patho.*/
						location.href = "./manage_accounts.php#headingOne"
					   }
					 });
				}else {}
	});
});

$("#patetient_registration_to_opd").on("click",function(event){
	alert("Patient registered to OPD");
	event.preventDefault();/* avoid to execute the actual submit of the form.*/
});

$("#patetient_registration_to_patho").on("click",function(event){
	/*alert("inhere");*/
	event.preventDefault();/* avoid to execute the actual submit of the form.*/

					window.location.href="addpatient_pathology_from_new.php?ID="+ID+"";
});

$("#patetient_registration_to_radio").on("click",function(event){
		event.preventDefault();/* avoid to execute the actual submit of the form.*/
	alert("Patient registered to radiology");

});

function isalphabetonly(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return true;
        return false;
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
  /*Female radio button is checked*/
}

function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
			 return false;
		 }
         return true;
}
/**/

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
    var alt_contact = document.forms["user_form"]["alt_contact"].value;
    var sex = document.forms["user_form"]["sex"].value;
    var marital_status = document.forms["user_form"]["marital_status"].value;
    var age = document.forms["user_form"]["age"].value;
    var contact = document.forms["user_form"]["contact"].value;
    var address = document.forms["user_form"]["address"].value;
    var ICE_contact = document.forms["user_form"]["ICE_contact"].value;
    if (fname == "") {
		swalError("First Name must be filled out");/*alert*/
		$("#First-name-input").focus();
		$("#First-name-input").addClass('error').removeClass('noerror');
        return false;

    }else if (lname == "") {
        swalError("Last Name must be filled out");/*alert*/
		$("#last-name-input").focus();
		$("#last-name-input").addClass('error').removeClass('noerror');
        return false;
    }else if (contact == "") {
        swalError("contact must be filled out");/*alert*/
		$("#tel-input").focus();
		$("#tel-input").addClass('error').removeClass('noerror');
        return false;
    }else if (sex == "") {
        swalError("gender must be selected");/*alert*/
		$("#sell").focus();
		$("#sex-input").addClass('error').removeClass('noerror');
        return false;
    }else if (marital_status == "") {
        swalError("marital status must be selected");/*alert*/
		$("#marital-status-input-select").focus();
		$("#marital-status-input").addClass('error').removeClass('noerror');
        return false;
    }else if (age == "") {
        swalError("age must be filled out");/*alert*/
		$("#age-input").focus();
		$("#age-input").addClass('error').removeClass('noerror');
        return false;
	}/*else if (alt_contact == "") {
        swalError("alternate contact must be filled out");/*alert*/
	/*	$("#tel-alt-input").focus();
		$("#tel-alt-input").addClass('error').removeClass('noerror');
        return false;
    }*/else if (address == "") {
        swalError("address must be filled out");/*alert*/
		$("#address").focus();
		$("#address-input").addClass('error').removeClass('noerror');
        return false;
    }else if (ICE_contact == "") {
        swalError("ICE contact must be filled");/*alert*/
		$("#ICE-tel-input").focus();
		$("#ICE-tel-input").addClass('error').removeClass('noerror');
        return false;
    }else{return true;}
}
/* --Capitalize First letter function-- */
function capitalize(textboxid, str) {
      /* string with alteast one character*/
      if (str && str.length >= 1)
      {
          var firstChar = str.charAt(0);
          var remainingStr = str.slice(1);
          str = firstChar.toUpperCase() + remainingStr;
      }
      document.getElementById(textboxid).value = str;
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
</script>

<?php
$pageTitle = 'update patient form HMS'; /*Call this in your pages' files to define the page title*/
$pageContents = ob_get_contents (); /* Get all the page's HTML into a string*/
ob_end_clean (); /* Wipe the buffer*/

/* Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML*/
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
