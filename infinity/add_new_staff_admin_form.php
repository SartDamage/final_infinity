<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);

?>

<?php include './include/header.php';?>
<style>
.form_header{border-bottom: dashed 1px #d1d0d0;padding-bottom: 10px;}
form{margin-bottom:5px;}
.form .seperator{border: 0px;border-bottom: 1px dashed #b5babd;	width:97%;}
#ipd_display{display:none;}
.form-control{margin-bottom: 0.5rem!important;border: 0px;border-bottom:1px solid #868e96;border-radius: .1rem;}
.form-control:focus{color: #495057;background-color: #fff;border-color: #868e96;outline: 0;box-shadow: 4px 4px 0px 0rem #dae0e5;}
.radio:focus {color: #495057;background-color: #fff;border-color: #868e96;outline: 0;box-shadow: 0px 0px 20px 0rem #dae0e5;}
a{-webkit-transition: .25s all;  transition: .25s all;}
.card {overflow: hidden;  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);  -webkit-transition: .25s box-shadow;  transition: .25s box-shadow;}
.card:focus,.card:hover {box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);}
.card-inverse .card-img-overlay {background-color: rgba(51, 51, 51, 0.85);  border-color: rgba(51, 51, 51, 0.85);}
.form .button_login:hover, .form .button_login:active, .form .button_login:focus {box-shadow: 3px 3px 3px 0.2rem #5C885C;}
.form .seperator, .seperator{border: 0px;border-bottom: 1px dashed #b5babd;}
.required {font-weight: bold;}
.required:after {color: #e32;content:'*';display:inline;}
.error select{color:red;}
.noerror select{color:#9e9e9e;}
.error::-webkit-input-placeholder {color: red;}
.noerror::-webkit-input-placeholder {color: #9e9e9e;}
input:not([type='submit']):not([type='button']), select, summary, textarea{background-color: #fff0!important; border-radius: .25rem;}
.error select{color:red;}
.noerror select{color:#9e9e9e;}
.department_parent{display:none;}
</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
<div class="container" id="reg-form-container" style="/* padding-left:50px; */margin-top:15px;">

	<div class="card card-outline-info mb-3">
	  <div class="card-block heading_bar">
		<h5><!--title--></h5>
		<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
		<i class="fa fa-times my-float"></i>
	</a>
	  </div>
	</div>
	<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
		<div class="card-block">
			<div class="form-header-group ">
				  <div class="header-text httal htvam">
					<!--<h5 id="header_1" class="form-header form_header" data-component="header">
					</h5>-->
				  </div>
			</div>


			<form method="post" action="" class="form" name="user_form"  id="staff_reg_form" enctype="multipart/form-data">
			<div class="form-group  row justify-content-md-center  " >
			   <label for="fileToUpload" style="margin:auto;">
					<img id="profileimg" src="https://www.w3schools.com/howto/img_avatar.png"/>
					<div id="my_camera"></div>
				</label>

				<!--<input id="fileToUpload" name="fileToUpload" type="file"  accept="image/*;capture=camera" onchange="loadFile(event)"/>-->

			</div>
			<div class="form-group  row justify-content-md-center  ">
				<button id="take_snapshots" type="button" class="col-2 btn btn-outline-success btn-sm">capture image</button>
			</div>
			 <input id="mydata" type="hidden" name="fileToUpload" value=""/>
<hr class="seperator">
			<div class="form-group  row justify-content-md-center  "><!--name-->

			  <label for="name" id="name" class="col-2 col-form-label required">Name</label>
			  <div class="col-3">
				<input class="form-control noerror" type="text" placeholder="first name" name="first_name" value="" id="First-name-input" onkeypress="return isalphabetonly(event)"  onkeyup="javascript:capitalize(this.id, this.value);">
			  </div>
			  <div class="col-3">
				<input class="form-control noerror" type="text" placeholder="last name" name="last_name" value="" id="last-name-input" onkeypress="return isalphabetonly(event)"  onkeyup="javascript:capitalize(this.id, this.value);">
			  </div>
			  <div class="col-2">
			  </div>
			</div>
			<div class="form-group  row justify-content-md-center  "><!--name-->

			  <label for="username" id="user-name-input" class="col-2 col-form-label required ">Username<span style="position:relative;left: 225%;z-index: 1001;" id="user-result"></span></label>
			  <div class="col-3">
				<input class="form-control" style="display:none" type="text" name="fakeusernameremembered"/>
				<input class="form-control" style="display:none" type="password" name="fakepasswordremembered"/>
				<input class="form-control" type="text" placeholder="user name" name="username" value="" id="username" autocomplete="false">
			  </div>
			   <label for="password" id="password" class="col-2 col-form-label required noerror">Password</label>
			  <div class="col-3">
				<input class="form-control" type="text" name="prevent_autofill" id="prevent_autofill" value="" style="display:none;"/>
				<input class="form-control" type="password" name="password_fake" id="password_fake" value="" style="display:none;"/>
				<input class="form-control" type="password" placeholder="password" name="password" value="" id="password-input" autocomplete="new-password">
			  </div>
			</div>
			<div class="form-group  row justify-content-md-center "><!--Email--><!--Alt Contact no-->
			  <label for="email-input" class="col-2 col-form-label">Email</label>
			  <div class="col-3">
				<input class="form-control noerror" type="email" value="" name="email" placeholder="enter email" id="email-input" autocomplete="off" >
			  </div>
			  <label for="tel-input-staff" class="col-2 col-form-label required noerror">Contact No. <span id="user-result-mumbai" style="position: relative;left: 215%;"></span></label><!--Contact no-->
			  <div class="col-3">
				<input class="form-control" type="tel" value="" placeholder="contact no." name="contact_staff" id="tel-input-staff" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
			  </div>
			</div>
			<div class="form-group  row justify-content-md-center "><!--Sex male--><!--Marital Status-->
			<label class="col-2 col-form-label required" for="sex-input "> Sex </label>
				<div id="sex-input" class="form-input col-3 noerror">
					<select name="sex" class="form-control noError" id="sel1" placeholder="select gender">
						<option value="" disabled selected>Select gender</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
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

			</div>
			<div class="form-group  row justify-content-md-center "><!--Date of birth--><!--Contact no-->
			  <label for="dob" class="col-2 col-form-label required">Age</label>
			  <div class="col-3 ">
				<input name="dob" class="form-control noerror" type="date" value="" placeholder="Age" id="age-input">
			  </div>
			  <label for="designation" class="col-2 col-form-label required">Employee Designation</label><!--Contact no-->
			  <div id="designation-input" class="form-input col-3 noerror">
					<select name="designation" class="form-control" id="designation-input-select" onchange="fill_hidden(this.options[this.selectedIndex].getAttribute('data-department_id'),this.options[this.selectedIndex].getAttribute('data-department_name'))" placeholder="designation" >
					<option value="" disabled selected> Select designation </option>
					<?php
					$db = getDB();
					$statement=$db->prepare("SELECT d.`ID`,d.`designation` FROM `designation` AS d WHERE `IsActive`=1 order by d.`designation` Asc");
					$statement->execute();
					$results=$statement->fetchAll();
					foreach($results as $row) {
					echo "<option value=".$row['designation']." data-department_id=".$row['ID']." data-department_name='".$row['designation']."'>".$row['designation']."</option>";
					}
					$db=null;
					?>
					</select>
			  </div>
			</div>
			<div class="form-group  row justify-content-md-center " id="department_parent">
				<label class="col-2 col-form-label required department_parent" for="department">Department</label>
				<div class="col-3 department_parent">
					<select name="department" class="form-control" id="department-input-select" placeholder="department">
					<option value="" disabled selected> Select Department </option>
					<?php
					$db = getDB();
					$statement=$db->prepare("SELECT d.`ID`,d.`department_name` FROM `department` AS d WHERE `IsActive`=1 order by d.`department_name` Asc");
					$statement->execute();
					$results=$statement->fetchAll();
					foreach($results as $row) {
					echo "<option value='".$row['department_name']."' data-department_id='".$row['ID']."' data-department_name='".$row['department_name']."'>".$row['department_name']."</option>";
					}
					$db=null;
					?>
					</select>
				</div>
				<div class="col-5"></div>
			</div>
			<div class="form-group  row justify-content-md-center "><!--Address-->
				<label for="address-input" class="col-2 col-form-label required">Address</label>
				<div class="col-3">

				<textarea class="form-control" id="address" placeholder="Enter address here" name="address"></textarea>
				</div>
				<label for="bloodgroup" class="col-2 col-form-label required">Blood group</label>
				<div class="col-3">
					<select name="bloodgroup" list="bloodgroup" class="form-control" id="bloodgroup-input-select" >
					<datalist id="bloodgroup">
					<option value="" disabled selected> Select Bloog group </option>
					<option value="A+"> A+ </option>
					<option value="A-"> A- </option>
					<option value="B+"> B+ </option>
					<option value="B-"> B- </option>
					<option value="O+"> O+ </option>
					<option value="O-"> O- </option>
					<option value="AB+"> AB+ </option>
					<option value="AB-"> AB- </option>
					</datalist>
					</select>
				</div>
				<input name="role" id="role-input-select" value="" hidden />
				<input name="department_hidden" id="department-input-select-hidden" value="" hidden />
				<!--<div class="col-3">
					<label for="weight-input" class="col-form-label" style="padding-top:0px">Role ID :-</label>
					<input name="role" list="role" class="form-control" id="role-input-select" />
					<datalist id="role">
					<option value="1"> Administrator </option>
					<option value="2"> Doctor </option>
					<option value="3"> Pathology </option>
					<option value="4"> Nurse </option>
					<option value="5"> Accounts </option>
					<option value="6"> Pharmacy </option>
					<option value="7"> Radiology </option>
					<option value="8"> Recption </option>
					<option value="9"> others </option>
					</datalist>
				</div>-->
				<div class="col-0">
			  </div>
			</div>
			<div id="" class="">
				<hr class="seperator">
				<div class="form-subHeader">
						  In case of emergency
				</div>
				<br>
				<div class="form-group row justify-content-md-center  "><!--emergency contact name--><!--emergency contact relation-->
				  <label for="ICE-name-input" class="col-2 col-form-label">Name</label>
				  <div class="col-3">
					<input name="ICE_name" class="form-control" type="text" value="" placeholder="Name" id="ICE-name-input">
				  </div>
				  <label for="ICE-relation-input" class="col-2 col-form-label">Relation</label>
				  <div class="form-input col-2">
					<input name="ICE_relation" class="form-control" type="text" value="" placeholder="Relation" id="ICE-relation-input">
				  </div>
				  <div class="col-1">
				  </div>
				</div>
				<div class="form-group row justify-content-md-center  "><!--emergency contact number-->
				  <label for="ICE-tel-input" class="col-2 col-form-label required" >Contact No.</label>
				  <div class="col-3">
					<input name="ICE_contact" class="form-control noerror" onkeypress="return isNumberKey(event)" type="tel" value="" placeholder="contact no." id="ICE-tel-input" autocomplete="off" maxlength="10">
				  </div>
				  <div class="col-5">
				  </div>
				</div>
				<div class="form-group row justify-content-md-center  ipd"><!--Address-->
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
			</div >
			<div class=" row justify-content-md-center ">
				<input type="text" id="maxid" name="maxid" hidden/>
				<input type="text" id="maxuid" name="maxuid" hidden/>

			<br>
			<hr class="seperator">
			<br>
			</div>
			<div class=" row justify-content-md-center ">
				<div class="col-2">
					<input type="submit" class="btn btn-success " name="staff_registration" value="Create Staff" style="width:100%"/>
				</div><!--/* button_login */-->
				<div class="col-2">
					<input type="button" class="btn btn-danger " id="reset_btn" onclick="resetform(staff_reg_form)" name="staff_registration" value="Reset" style="width:100%"/><!-- class="/* button_reset */"-->
				</div>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>

<script>
 function fill_hidden (id,department_name){
	 console.log("id is the "+id);
	 console.log("department name "+department_name);
	 $("#role-input-select").val(id);
	 if(department_name.match(/^(Doctor|RMO|Medical Specialist|MO)$/)){
		 $('.department_parent').css("display","block");
		 console.log("department name "+department_name);
		 $('#department-input-select-hidden').val("");
	 }else{
	 $('.department_parent').css("display","none");
	 $('#department-input-select-hidden').val(department_name);//department_hidden
	 }
 }
$('#designation-input-select option[value="Administration"]').attr('selected', true);
fill_hidden("1","Administration");
function resetform(formID){
	//alert("hello");
		$(formID).trigger("reset");
	Webcam.reset();
	$("#mydata").html('');
	$("#user-result").html('');
	$("#user-result-mumbai").html('');
}
function toast(){
	alert("New user Created");
}
/* ajax form submission */

$( "form#staff_reg_form" ).on( "submit", function( event ) {
				  event.preventDefault();// avoid to execute the actual submit of the form.
				  console.log( $("#staff_reg_form").serialize() );
	var formData = new FormData(this);

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
				if (data=="staff added Successfully")
				{
					resetform(staff_reg_form);swalSuccess(data);
					location.reload();
				}
				else if (data=="Some Error Occured")
				{swalError(data);}
				else{
					swalError("Error please reload the page !");
				}
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
//max id getter starts here
$(document).ready(function() {
  var url="/getter/get_max_id_getter.php";
  $.ajax({  
        
         type: "POST",
         url: url,
         //data: formData, // serializes the form's elements.
         success: function(data)
         {
            var json = JSON.parse(data);
          console.log("return Data is : "+data);
          var s=parseInt(json[0].maximum);
          var add=(s)+1;
          document.getElementById("maxid").value=add;
         },
        cache: false,
        contentType: false,
        processData: false
       });
    });
//max id getter ends here
 $(document).ready(function() {
  var url="getter/get_max_uid.php";
  $.ajax({  
        
         type: "POST",
         url: url,
         //data: formData, // serializes the form's elements.
         success: function(data)
         {
            var json = JSON.parse(data);
          console.log("return Data is : "+data);
          var s=parseInt(json[0].maximum);
          var add=(s)+1;
          document.getElementById("maxuid").value=add;

         },
        cache: false,
        contentType: false,
        processData: false
       });
    });
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

    var fileToUpload = document.forms["user_form"]["fileToUpload"].value;
    var fname = document.forms["user_form"]["first_name"].value;
    var lname = document.forms["user_form"]["last_name"].value;
    var contact_staff = document.forms["user_form"]["contact_staff"].value;
    var sex = document.forms["user_form"]["sex"].value;
    var dob = document.forms["user_form"]["dob"].value;
    var designation = document.forms["user_form"]["designation"].value;
    var department = document.forms["user_form"]["department"].value;
    var address = document.forms["user_form"]["address"].value;
	var ICE_contact = document.forms["user_form"]["ICE_contact"].value;
	var ICE_address = document.forms["user_form"]["ICE_address"].value;
    if (fname == "" ) {
        swalError("First Name must be filled out");//alert
		$("#First-name-input").focus();
		$("#First-name-input").addClass('error').removeClass('noerror');
        return false;

    }else if (lname == "" ) {
		swalError("Last Name must be filled out");//alert
		$("#last-name-input").focus();
		$("#last-name-input").addClass('error').removeClass('noerror');
        return false;
    }else if (contact_staff == "") {
        swalError("contact must be filled out");//alert
		$("#tel-input-staff").focus();
		$("#tel-input-staff").addClass('error').removeClass('noerror');
        return false;
    }else if (contact_staff.length < 10) {
        swalError("Numbers must be 10 digits");//alert
		$("#tel-input-staff").focus();
		$("#tel-input-staff").addClass('error').removeClass('noerror');
        return false;
    }else if (sex == "") {
        swalError("gender must be selected");//alert
		$("#sex-input").focus();
		$("#sex-input").addClass('error').removeClass('noerror');
        return false;
    }else if (dob == "" ) {
       swalError("date of birth must be filled out");//alert
		$("#age-input").focus();
		$("#age-input").addClass('error').removeClass('noerror');
        return false;
    }else if (designation == "" ) {
       swalError("Designation must be selected");//alert
		$("#designation-input-select").focus();
		$("#designation-input").addClass('error').removeClass('noerror');
        return false;
    }else if (designation != "" && designation.match(/^(Doctor|RMO|Medical Specialist|MO)$/) && department == "" ) {
       swalError("department must be selected");//alert
		$("#department-input-select").focus();
		//$("#designation-input").addClass('error').removeClass('noerror');
        return false;
    }else if (ICE_contact == "" ) {
       swalError("ICE contact must be filled out");//alert
		$("#ICE-tel-input").focus();
		$("#ICE-tel-input").addClass('error').removeClass('noerror');
        return false;
    }else if (ICE_address == "" ) {
       swalError("ICE address must be filled out");//alert
		$("#ICE_address").focus();
		$("#ICE_address").addClass('error').removeClass('noerror');
        return false;
    }/*else if (fileToUpload == "" ) {
       swalError("Image must be Uploaded");//alert
		/* $("#fileToUpload").focus();
		$("#fileToUpload").addClass('error').removeClass('noerror'); */
    /*    $("#mydata").focus();
		$("#mydata").addClass('error').removeClass('noerror');
        return false;
    }*/else{ return true;}

}

/*check username*/

    var x_timer;
    $("#username").blur(function (e){
        var user_name = $(this).val();
        clearTimeout(x_timer);
        x_timer = setTimeout(function(){
            check_username_ajax(user_name);
        }, 1000);

    });
    $("#tel-input-staff").blur(function (e){
        var user_name = $(this).val();
        clearTimeout(x_timer);
        x_timer = setTimeout(function(){
            check_phone_ajax(user_name);
        }, 1000);

    });



function check_username_ajax(username){

	/* if($("#tel-input-staff").val()==""){}else{ */
    $("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/ajax-loader.gif" />');
	if(username==""){
			$("#username").focus();
			swalInfo("The username cannot be empty");
			$("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/not-available.png" />');
		}else{
    $.post('checkusername.php', {'username':username}, function(data) {
      $("#user-result").html(data);
		if (data=="1"){
				$("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/not-available.png" />');
				swalWarning("Change user name","Username already exists",3000);
		}else if(data=="2")
				$("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/available.png" />');
		else {
				$("#user-result").html('<img src="https://www.sanwebe.com/assets/public/images/not-available.png" />');
				swalWarning("Change user name","Username already exists",3000);
		}
    });
		}
}
/* } */
function check_phone_ajax(number_mob){
	if(number_mob==""){
	$("#user-result-mumbai").html('');}else{
		//alert(`contact_no in function is  ${number_mob}`);
    $("#user-result-mumbai").html('<img src="https://www.sanwebe.com/assets/public/images/ajax-loader.gif" />');
		if(number_mob==""){
			$("#tel-input-staff").focus();
			swalInfo("The contact number field cannot be empty");
			$("#user-result-mumbai").html('<img src="https://www.sanwebe.com/assets/public/images/not-available.png" />');
		}else if(number_mob.length<10){
				$("#user-result-mumbai").html('<img src="https://www.sanwebe.com/assets/public/images/not-available.png" />');
				//swalInfo("The contact number should be 10 digits");
			}else{
				$.post('checkphonenumber.php', {'phoneno':number_mob}, function(data) {
					console.log(`data is ${data}`);
					if (data=="1"){
							$("#user-result-mumbai").html('<img src="https://www.sanwebe.com/assets/public/images/not-available.png" />');
							swalWarning("Check phone number or user previous registration entry","User already exists",3000);
					}else if(data=="2"){
							$("#user-result-mumbai").html('<img src="https://www.sanwebe.com/assets/public/images/available.png" />');
					}
				});
			}
	}
}

function isalphabetonly(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return true;
        return false;
}


function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
			 return false;
		 }
         return true;
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
 var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('profileimg');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };

</script>
<script type="text/javascript"><!--
//Webcam.attach( '#my_camera' );
Webcam.set({
    width: 180,
    height: 180,
    dest_width: 180,
    dest_height: 180,
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

		 document.getElementById('mydata').value = raw_image_data;
    //document.getElementById('myform').submit();
		 Webcam.reset();
	});
 });



--></script>
<?php
$pageTitle = 'New Doctor registration'; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
