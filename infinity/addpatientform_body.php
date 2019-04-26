<div class="container" id="reg-form-container" >
		<div class="card card-outline-info mb-3" style="margin-top:18px;">
			<div class="card-block heading_bar">
				<h5>Add new patient</h5>
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
								<h6>Registration Form</h6>
							</div>
						</div>
						<div class="row">
							<hr class="seperator" width="97%">
						</div>
						<div class="row">
							<div class="col-3 offset-md-9 pull-right">
								<a href="/list_all_patients.php"><!--<a href="/universal_home.php">--><button class="btn btn-outline-success pull-right" ><i class="fa fa-sign-in fa-2" aria-hidden="true"></i> Go to All Patients</button></a>
							</div>
						</div>
					</div>
				</div>
				<form class="form" name="user_form"  id="patient_reg_form" enctype="multipart/form-data">
					<div class="form-group  row justify-content-md-center  " >
						<label for="fileToUpload" style="margin:auto;">
							<img id="profileimg" src="https://www.w3schools.com/howto/img_avatar.png"/>
							<div id="my_camera"></div>
						</label>
						<input id="fileToUpload" name="fileToUpload" type="file" accept="image/*" onchange="loadFile(event)"/>
					</div>
					<div class="form-group  row justify-content-md-center  ">
						<button id="take_snapshots" type="button" class="col-2 btn btn-outline-success btn-sm">capture image</button>
					</div>
					<input id="mydata" type="hidden" name="fileToUpload" value=""/>
					<br>
					<div class="form-group row justify-content-center">
						<!--name-->
						<label for="name" id="name" class="col-2 col-form-label required">Name</label>
						<div class="col-3">
							<input class="form-control" type="text" placeholder="First Name"  name="first_name" value="" id="First-name-input" onkeypress="return isalphabetonly(event)" maxlength="25" onkeyup="javascript:capitalize(this.id, this.value);">
						</div>
						<div class="col-2">
							<input class="form-control" type="text" placeholder="Middle Name" name="middle_name" value="" id="Middle-name-input" onkeypress="return isalphabetonly(event)" maxlength="25" onkeyup="javascript:capitalize(this.id, this.value);">
						</div>
						<div class="col-3">
							<input class="form-control" type="text" placeholder="Last Name"   name="last_name" value="" id="last-name-input" onkeypress="return isalphabetonly(event)"  maxlength="25" onkeyup="javascript:capitalize(this.id, this.value);">
						</div>
						<!--
							<div class="col-4">
							<input  name="patient_type" id="IPD" value="IPD"  class="form-control radio" style="width:auto;display:inline;" onclick="patienttypeipd()" type="radio">
							<label >&nbsp&nbsp&nbsp&nbsp IPD</label>&nbsp&nbsp&nbsp
							<input  name="patient_type" id="OPD" value="OPD" class="form-control radio" style="width:auto;display:inline;"  onclick="patienttypeopd()" type="radio" checked>
							<label >&nbsp&nbsp&nbsp&nbsp OPD</label>
							</div>-->

					</div>
					<div class="form-group row justify-content-center">
						<!--Email--><!--Alt Contact no-->
						<label for="age-input" class="col-2 col-form-label required">Age</label>
						<div class="col-3">
							<input name="age" class="form-control" type="text" value="" maxlength="2" onkeypress="return isNumberKey(event)"  id="age-input">
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
					<div class="form-group row justify-content-center">
						<!--Sex male--><!--Marital Status-->
						<label for="tel-input" class="col-2 col-form-label required">Contact No.<span style="position:relative;left: 225%;z-index: 1001;" id="user-result"></span></label><!--Contact no-->
						<div class="col-3">
							<input name="contact" onkeypress="return isNumberKey(event)" class="form-control" type="tel" value=""  id="tel-input" autocomplete="off"  maxlength="10">
						</div>
						<label for="tel-alt-input"  class="col-2 col-form-label " >Alternate No.</label><!--Alt Contact no-->
						<div class="col-3">
							<input class="form-control" onkeypress="return isNumberKey(event)" type="tel" value="" placeholder="" name="alt_contact" id="tel-alt-input" autocomplete="off"  maxlength="10">
						</div>
					</div>
					<div class="form-group row justify-content-center">
						<!--Date of birth--><!--Contact no-->
						<label for="email-input" class="col-2 col-form-label">Email</label>
						<div class="col-3">
							<input class="form-control" type="email" value="" name="email" id="email-input" autocomplete="off"  maxlength="35" >
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
					<div class="form-group row justify-content-center">
						<!--weight/height-->
						<label for="height-input"  class="col-2 col-form-label">Height (inches)</label>
						<div class="col-2">
							<input name="height" onkeypress="return isNumberKey(event);" class="form-control" type="number" value="" placeholder="" id="height-input" step="0.1" max="84" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3">
						</div>
						<div class="col-1">
						</div>
						<label for="weight-input" class="col-2 col-form-label">Weight (Kilogram)</label>
						<div class="col-2">
							<input name="weight" onkeypress="return isNumberKey(event);" class="form-control" type="number" value="" placeholder="" id="weight-input" step="0.1" max="500" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
						</div>
						<div class="col-1">
						</div>
					</div>
					<div class="form-group row justify-content-center">
						<!--Address-->
						<label for="address-input" class="col-2 col-form-label required">Address</label>
						<div class="col-3">
							<textarea class="form-control" id="address" placeholder="" name="address" onkeyup="javascript:capitalize(this.id, this.value);" maxLength="65"></textarea>
						</div>
						<label for="weight-input" class="col-2 col-form-label">Blood group</label>
						<div class="col-2">
							<input name="blood_group" list="bloodgroup" class="form-control" type="tel" value=""  id="blood-input" maxLength="5">
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
					<!-- <div id="ipd_display" class=""> -->
					<hr class="seperator ipd">
						<div class="form-subHeader">
							Government Identification cards
						</div>
						<br>
						<div class="form-group row justify-content-center">
							<label for="GI_type" class="col-2 col-form-label">Identification card</label>
							<div class="col">
								<select class="form-control selectpicker" id="GI_type" name="GI_type" oninput="GI_type_option(this.value,this.options[this.selectedIndex].getAttribute('data-card_name'),'GI_number')">
									<option value="" disabled selected> Select card type </option>
									<?php $db = getDB();$statement=$db->prepare("SELECT ic.`ID`,ic.`card_label` FROM `identification_card` AS ic WHERE `IsActive`=1;");$statement->execute();$results=$statement->fetchAll();
									//$json=json_encode($results);//return $json;//$str = 'In My Cart : 11 12 items';//wa in value (option) $row['ConsultingDoctorID']
									foreach($results as $row) {echo "<option value=".$row['ID']." data-card_name=".$row['card_label'].">" . $row['card_label'] . "</option>";}$db=null;?>
								</select>
							</div>
							<label for="GI_number" class="col-2 col-form-label">Identification Number</label>
							<div class="col">
								<input type="text" class="form-control" name="GI_number" id="GI_number"/>
							</div>
						</div>
						<div class="form-group row justify-content-center">
							<div class="col">
								 	<label for="doc_file" class="col-2 col-form-label">Upload Document</label>
								  <input type="file" name="doc_file" id="doc_file" accept="image/*" onchange="readFile(event)"/>
									<input type="text" name ="fileToUpload1" id="fileToUpload1" hidden/>
							</div>

						</div>
					<hr class="seperator ipd">
					<div class="form-subHeader">
						In case of emergency
					</div>
					<br>
					<div class="form-group row ipd justify-content-center">
						<!--emergency contact name--><!--emergency contact relation-->
						<label for="ICE-name-input" class="col-2 col-form-label">Name</label>
						<div class="col-3">
							<input name="ICE_name" class="form-control" type="text" value="" placeholder="" onkeypress="return isalphabetonly(event)" id="ICE-name-input" maxLength="35" onkeyup="javascript:capitalize(this.id, this.value);;">
						</div>
						<label for="ICE-relation-input" class="col-2 col-form-label">Relation</label>
						<div class="form-input col-2">
							<input name="ICE_relation" class="form-control" type="text" onkeypress="return isalphabetonly(event)" value="" placeholder="" id="ICE-relation-input" maxLength="35">
						</div>
						<div class="col-1">
						</div>
					</div>
					<div class="form-group row ipd justify-content-center">
						<!--emergency contact number-->
						<label for="ICE-tel-input" class="col-2 col-form-label required">Contact No.</label>
						<div class="col-3">
							<input name="ICE_contact" onkeypress="return isNumberKey(event)" class="form-control" type="tel" value="" placeholder="" id="ICE-tel-input" autocomplete="off"  maxlength="10">
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
					<div class="form-group row ipd justify-content-center">
						<!--Address-->
						<label for="alt-address-input" class="col-2 col-form-label required">Address</label>
						<div class="col-3">
							<textarea name="ICE_address" id="ICE_address" class="form-control" placeholder="" style="width:100%;" maxLength="65"></textarea>
						</div>
						<div class="col-offset-2  col-xs-offset-2  col-sm-offset-2 col-md-offset-2  col-3">
							<input  name="address_value"  class="form-control" style="width:auto;display:inline;"  type="checkbox"onclick="FillBilling(this.form)">
							<label >&nbsp&nbsp&nbsp&nbspaddress same as above</label>
						</div>
						<div class="col-2">
						</div>
					</div>
					<!-- </div > -->
					<hr class="seperator">
					<br>
					<div class="form-subHeader">
						<b>          Medical history</b>
					</div>
					<br>
					<div class="form-group row justify-content-center">
						<!--medical history-->
						<label for="example-time-input" class="col-2 col-form-label">Taking any current medication</label>
						<div class="col-8">
							<label class="radio-inline"><input class="form-control radio" type="radio" name="med_history" value="yes">Yes</label>
							<label class="radio-inline"><input class="form-control radio" type="radio" name="med_history" value="no" checked="checked">No</label>
						</div>
					</div>
					<div class="form-group row justify-content-center">
						<!--medical number-->
						<label for="med-history-input" class="col-2 col-form-label">If yes, please list it here.</label>
						<div class="col-6">
							<textarea name="med_history_detail" maxLength="65" class="form-control" placeholder="" style="width:50%;"></textarea>
						</div>
						<div class="col-2">
						</div>
					</div>
					<div class="row justify-content-md-center">
						<div class="col-2">
							<button id="patetient_registration" class="btn btn-success button_login button_bottom_form" name="patetient_registration" value="Save" style="height:100%;" title="Register Patient" >
								<!-- onclick="printJS({ printable: 'patient_reg_form', type: 'html', header: 'PrintJS - Form Element Selection' })" -->Save
							</button>
						</div>
						<div class="col-2">
							<button id="patetient_registration_to_ipd" class="btn btn-success button_login button_bottom_form" name="patetient_registration_to_ipd" value="Submit to IPD" style="height:100%;" title="Submit proceed to IPD" >
								<!-- onclick="printJS({ printable: 'patient_reg_form', type: 'html', header: 'PrintJS - Form Element Selection' })" -->IPD
							</button>
						</div>
						<div class="col-2">
							<button id="patetient_registration_to_opd" class="btn btn-success button_login button_bottom_form" name="patetient_registration_to_opd" style="height:100%;" value="Submit to OPD" title="Submit proceed to OPD" >OPD</button>
						</div>
						<!--<div class="col-2">
							<input id="patetient_registration_to_patho" type="submit" class="btn btn-success button_login button_bottom_form" name="patetient_registration_to_patho" value="Pathology" title="Submit proceed to Pathology">
						</div>-->
						<!--<div class="col-2">
							<input type="submit" class="btn btn-success button_login button_bottom_form" name="patetient_registration_to_radio" value="Radiology" id="patetient_registration_to_radio" title="Submit proceed to Radiology" disabled>
						</div>-->
						<input type="text" class="hidden" name="AdminID" id="AdminID" value="<?php echo $userDetails->ID;?>">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
var x_timer;
document.getElementById("tel-input").oninput = function (e){
        var user_name = $(this).val();
		//alert(user_name);
        clearTimeout(x_timer);
        x_timer = setTimeout(function(){
			//alert(`contact_no ${user_name}`);
            check_phone_ajax(user_name);
        }, 500);
    };
function check_phone_ajax(number_mob){
	if(number_mob==""){
		$("#user-result").html('');
	}else{
			//alert(`contact_no in function is  ${number_mob}`);
		$("#user-result-mumbai").html('<img src="https://www.sanwebe.com/assets/public/images/ajax-loader.gif" />');
			if(number_mob==""){
				$("#tel-input").focus();
				swalInfo("The contact number field cannot be empty");
				$("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/not-available.png" />');
			}else if(number_mob.length<10){
				$("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/not-available.png" />');
			}else{
				$.post('checkphonenumber.php', {'phoneno':number_mob,'patient':""}, function(data) {
					console.log(`data is ${data}`);
					if (data=="1"){
							$("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/not-available.png" />');
							swalWarning("Check phone number or user previous registration entry","User already exists",3000);
					}else if(data=="2"){
							$("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/available.png" />');
					}
				});
			}
	}
}

/////////////////////for save Aj/////////////////////////

$("#patetient_registration").on('click',function(e){
     e.preventDefault();
     	 debugger;

	 		var url = "/addpatient.php"; // the script where you handle the form input.
	 		var test=validateForm(e);
	 		if (test==true){
	 			debugger;
	 			$.ajax({
	 				type: "POST",
	 				url: url,
	 				data: $("#patient_reg_form").serialize(), // serializes the form's elements.
					success: function(data)
					{
					if(data!=""){
						debugger;
						var json = JSON.parse(data);
						resetform(patient_reg_form);
						swalSuccess("Patient added successfully");//alert
						console.log(data);
						console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
						send_sms.welcome("welcome",`${json[0].Mobile}`,`${json[0].FirstName} ${json[0].LastName}`);
						location.reload();
						//on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
						//var data = JSON.parse(data);
					}else{
						success_created_patient(data);
						//resetform(patient_reg_form);
					}
					}

							 });
					}else {}

					});


/////////////////////////////for Ipd button ajax//////////////////

$("#patetient_registration_to_ipd").on('click',function(e){
	debugger;
	alert("reached here ipd");
	 // $( "form#patient_reg_form" ).off('submit').on("submit",function( e ) {
	 //
		e.preventDefault();// avoid to execute the actual submit of the form.
		var url = "/addpatient.php"; // the script where you handle the form input.
		var test=validateForm(e);
		if (test==true){
			debugger;
			$.ajax({
				type: "POST",
				url: url,
				data: $("#patient_reg_form").serialize(), // serializes the form's elements.
				success: function(data)
				{

				if(data!=""){
					var json = JSON.parse(data);
					console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
					send_sms.welcome("welcome",`${json[0].Mobile}`,`${json[0].FirstName} ${json[0].LastName}`);
					window.location.href="<?php echo BASE_URL;?>addpatient_ipd_from_new.php?ID="+json[0].RegistrationID+"";
					resetform(patient_reg_form);
					//location.reload();
				 }else{
					 debugger;
					success_created_patient(data);//not created try again
				 }
				}
			});
		}else{}
	//});
 /* $( "form#patient_reg_form" ).off('submit').on('submit',function( e ) {
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
}); */
});

  ///////////////////////// opd button Ajax call/////////////////////////////

$("#patetient_registration_to_opd").on("click",function(event){
	alert("reached here opd");
	 // $( "form#patient_reg_form" ).off('submit').on("submit",function( e ) {
		event.preventDefault();// avoid to execute the actual submit of the form.
		var url = "./addpatient.php"; // the script where you handle the form input.
		var test=validateForm(event);
		if (test==true){
			$.ajax({
				type: "POST",
				url: url,
				data: $("#patient_reg_form").serialize(), // serializes the form's elements.
				success: function(data)
				{
				if(data!=""){
					var json = JSON.parse(data);
					console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
					send_sms.welcome("welcome",`${json[0].Mobile}`,`${json[0].FirstName} ${json[0].LastName}`);
					window.location.href="addpatient_opd_from_new.php?ID="+json[0].RegistrationID+"";
					resetform(patient_reg_form);
					location.reload();
				 }else{
					success_created_patient(data);//not created try again
				 }
				}
			});
		}else{}
	});

$("#patetient_registration_to_patho").on("click",function(event){
	 //$( "form#patient_reg_form" ).off('submit').on("submit",function( e ) {
		event.preventDefault();// avoid to execute the actual submit of the form.
		/* console.log("serialized(250) form : " +$("#patient_reg_form").serialize()+"" ); */
		var url = "./addpatient.php"; // the script where you handle the form input.
		var test=validateForm(event);
		var formData=new FormData("#patient_reg_form");
		if (test==true){
			$.ajax({
				type: "POST",
				url: url,

				data:formData, // serializes the form's elements.
				success: function(data)
				{
				if(data!=""){
					var json = JSON.parse(data);
					console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
					//send_sms.welcome("welcome",`${json[0].Mobile}`,`${json[0].FirstName} ${json[0].LastName}`);
					window.location.href="addpatient_pathology_from_new.php?ID="+json[0].RegistrationID+"";
					resetform(patient_reg_form);
					//location.reload();
				 }else{
					success_created_patient(data);//not created try again
				 }
				}
			});
		}else{}
	});
//});

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
	var sex = document.forms["user_form"]["sex"].value;
    //var alt_contact = document.forms["user_form"]["alt_contact"].value;
    var marital_status = document.forms["user_form"]["marital_status"].value;
    var age = document.forms["user_form"]["age"].value;
    var contact = document.forms["user_form"]["contact"].value;
    //var alt_contact = document.forms["user_form"]["ICE_contact"].value;
    var address = document.forms["user_form"]["address"].value;
    var ICE_contact = document.forms["user_form"]["ICE_contact"].value;
    var ICE_address = document.forms["user_form"]["ICE_address"].value;
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
    }else if (age == "") {
        swalError("Age must be filled out");//alert
		$("#age-input").focus();
		$("#age-input").addClass('error').removeClass('noerror');
        return false;
	}else if (sex == "") {
        swalError("Gender must be selected");//alert
		$("#sell").focus();
		$("#sex-input").addClass('error').removeClass('noerror');
        return false;
    }else if (contact == "" ) {
        swalError("Contact must be filled out");//alert
		$("#tel-input").focus();
		$("#tel-input").addClass('error').removeClass('noerror');
        return false;
    }else if (contact.length<10) {
        swalError("Numbers must be 10");//alert
		$("#tel-input").focus();
		$("#tel-input").addClass('error').removeClass('noerror');
        return false;
    }/* else if (alt_contact!="" && alt_contact.length<10) {
        swalError("Numbers must be 10");//alert
		$("#tel-alt-input").focus();
		$("#tel-alt-input").addClass('error').removeClass('noerror');
        return false;
    } */else if (marital_status == "") {
        swalError("Marital Status must be selected");//alert
		$("#marital-status-input-select").focus();
		$("#marital-status-input").addClass('error').removeClass('noerror');
        return false;
    }/* else if (alt_contact == "") {
        swalError("alternate contact must be filled out");//alert
		$("#tel-alt-input").focus();
		$("#tel-alt-input").addClass('error').removeClass('noerror');
        return false;
    } */else if (address == "") {
        swalError("Address must be filled out");//alert
		$("#address").focus();
		$("#address-input").addClass('error').removeClass('noerror');
        return false;
    }else if (ICE_contact != "" && ICE_contact.length<10) {
        swalError("ICE Contact must be filled and be 10 dgits");//alert
		$("#ICE-tel-input").focus();
		$("#ICE-tel-input").addClass('error').removeClass('noerror');
        return false;
    }else if (ICE_address == "") {
        swalError("ICE Address must be filled");//alert
		$("#ICE_address").focus();
		$("#ICE_address").addClass('error').removeClass('noerror');
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
	$("#user-result").html('');
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

 var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('profileimg');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
/////////////////////////////////converting base64_decode Aj////////////////////

function readFile() {
   debugger;
  if (this.files && this.files[0]) {

    var FR= new FileReader();

    FR.addEventListener("load", function(e) {

      document.getElementById("fileToUpload1").value = e.target.result;
    });

    FR.readAsDataURL( this.files[0] );
  }

}

document.getElementById("doc_file").addEventListener("change", readFile);


////////////////////////////////////////////////////////////////////////////////

</script>
<script type="text/javascript"><!--
//Webcam.attach( '#my_camera' );
Webcam.set({
    width: 180,
    height: 180,
    dest_width: 360,
    dest_height: 360,
    image_format: 'jpeg',
    jpeg_quality: 80,
    force_flash: false,
	flip_horiz: true
});
Webcam.attach('#my_camera');
 $("#take_snapshots").on('click',function(){
	 //swalSuccess("clicked snap");
	 Webcam.snap( function(data_uri) {
		 Webcam.freeze();
		 var data_img = data_uri;
		 //swalSuccess("clicked snap "+data_uri);
		 //document.getElementById('profileimg').src = data_img;
		 profileimg = document.getElementById('profileimg');//.src = data_img;
		 profileimg.src= data_img;
		 profileimg.style.display="block";
		 document.getElementById('my_camera').style.display = "none";
		 var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
		 Webcam.reset();
		 document.getElementById('mydata').value = raw_image_data;
		 document.getElementById('take_snapshots').disabled = true;

    //document.getElementById('myform').submit();

	});
 });

 function GI_type_option(value,card_name,child_id){
	 child_id=`#${child_id}`
	 switch (value) {
    case "1":
         $(child_id).attr('maxlength','12');
        break;
    case "2":
         $(child_id).attr('maxlength','15');
        break;
    case"3":
         $(child_id).attr('maxlength','25');
}
 }
--></script>
<?php
$pageTitle = 'Registration HMS'; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
