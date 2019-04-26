<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if (isset($_GET['ID'])) {
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
.form-control:focus{
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 4px 4px 0px 0rem #dae0e5;}
.radio:focus {
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 0px 0px 20px 0rem #dae0e5;}

a {
  -webkit-transition: .25s all;
  transition: .25s all;
}

.card {
  overflow: hidden;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -webkit-transition: .25s box-shadow;
  transition: .25s box-shadow;
}

.card:focus,
.card:hover {
  box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
}

.card-inverse .card-img-overlay {
  background-color: rgba(51, 51, 51, 0.85);
  border-color: rgba(51, 51, 51, 0.85);
}
	
.form .button_login:hover, .form .button_login:active, .form .button_login:focus {
    box-shadow: 3px 3px 3px 0.2rem #5C885C;}
.form .seperator, .seperator{
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
input:not([type='submit']):not([type=button]):not([type=reset]), select, summary, textarea {

    background-color: #fff0!important;
    border-radius: .25rem;
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
</style>

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
<div class="container" id="reg-form-container" style="padding-left:50px;margin-top:15px;">
	
	<div class="card card-outline-info mb-3">
	  <div class="card-block heading_bar">
		<h5> Update staff details</h5>
		<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
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
							<h6> Update Staff Detail</h6>
						</div>
					  </div>
					  <div class="row">
						<hr class="seperator" width="97%">
					  </div>
				  </div>
			</div>

			
			<form method="post" action="" class="form" name="user_form"  id="staff_reg_form" enctype="multipart/form-data">
			<br>
			<div class="form-group row " >
			   <label for="fileToUpload" style="margin:auto;">
					<img id="profile_img" src="https://www.w3schools.com/howto/img_avatar.png"/>
				</label>

				<input id="fileToUpload" name="fileToUpload" type="file"  onchange="document.getElementById('profile_img').src = window.URL.createObjectURL(this.files[0])"/>
			</div>
			<br>
			<div class="form-group row justify-content-md-center "><!--name-->
			
			  <label for="name" id="name" class="col-md-2 col-form-label required">Name</label>
			  <div class="col-md-3">
				<input class="form-control noerror" type="text" placeholder="first name" name="first_name" value="" id="First-name-input"  >
			  </div>
			  <div class="col-md-3">
				<input class="form-control noerror" type="text" placeholder="last name" name="last_name" value="" id="last-name-input" >
			  </div>
			  <div class="col-md-2">
			  </div>
			</div>
			<div class="form-group row justify-content-md-center "><!--name-->
			
			  <label for="username" id="user-name-input" class="col-md-2 col-form-label required ">Username</label>
			  <div class="col-md-3">
				<input class="form-control" type="text" placeholder="user name" name="username" value="" id="username" autocomplete="off" readonly>
			  </div>
			   <!--<div class="col-5">
			   </div>-->
			   <label for="password" id="password" class="col-md-2 col-form-label required noerror" >Password</label>
			  <div class="col-md-3" >
				<input class="form-control" type="password" placeholder="password" name="password" value="" id="password-input" autocomplete="off" >
			  </div>
			</div>
			<div class="form-group row justify-content-md-center"><!--Email--><!--Alt Contact no-->
			  <label for="email-input" class="col-md-2 col-form-label">Email</label>
			  <div class="col-md-3">
				<input class="form-control noerror" type="email" value="" name="email" placeholder="enter email" id="email-input" autocomplete="off" >
			  </div>
			  <label for="tel-input-staff" class="col-md-2 col-form-label required noerror">Contact No.</label><!--Contact no-->
			  <div class="col-md-3">
				<input class="form-control" type="text" value="" placeholder="contact no." name="contact_staff" id="tel-input-staff" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
			  </div>
			</div>
			
			<div class="form-group row justify-content-md-center"><!--Sex male--><!--Marital Status-->
			<label class="col-md-2 col-form-label required" for="sex-input" > Sex </label>
			<div id="sex-input" class="form-input col-md-3 noerror">
                            <select name="gender" class="form-control noError" id="gender">
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                            </select>
                        </div>
			<label for="marital-status-input" class="col-md-2 col-form-label">Marital Status</label>
			<div id="marital-status-input" class="form-input col-md-3 noerror">
				<select name="martial_status" class="form-control" id="marital-status-input-select" >
				<option value="" disabled selected> Select marital status </option>
				<option value="Single"> Single </option>
				<option value="Married"> Married </option>
				<option value="Divorced"> Divorced </option>
				<option value="Legally separated"> Legally separated </option>
				<option value="Widowed"> Widowed </option>
				</select>
			</div>
			  
			</div>
			<div class="form-group row justify-content-md-center"><!--Date of birth--><!--Contact no-->
			  <label for="dob" class="col-md-2 col-form-label required">D.O.B</label>
			  <div class="col-md-3 ">
				<input name="dob" class="form-control noerror" type="date" value="" placeholder="Age" id="age-input" >
			  </div>
			  <label for="designation" class="col-md-2 col-form-label required">Employee Designation</label><!--Contact no-->
			  <div id="designation-input" class="form-input col-md-3 noerror">
					<select name="designation" class="form-control" id="designation-input-select" oninput="fill_hidden(this.options[this.selectedIndex].getAttribute('data-department_id'),this.options[this.selectedIndex].getAttribute('data-department_name'))">
					<option value="" disabled selected> Select designation </option>
					<?php 
					$db = getDB();
					$statement=$db->prepare("SELECT d.`ID`,d.`designation` FROM `designation` AS d WHERE `IsActive`=1 order by d.`designation` Asc");
					$statement->execute();
					$results=$statement->fetchAll();
					foreach($results as $row) {
						echo "<option value=".$row['ID']." data-department_id=".$row['ID']." data-department_name='".$row['designation']."' >".$row['designation']."</option>";
					}
					$db=null;
					?>
					</select>
			  </div>
			</div>
			<div class="form-group  row justify-content-md-center " id="department_parent">
				<label class="col-md-2 col-form-label required department_parent" for="department">Department</label>
				<div class="col-md-3 department_parent">
                                    <select name="department" class="form-control" id="department-input-select" >
					<option value="" disabled selected> Select Department </option>
					<?php 
					$db = getDB();
					$statement=$db->prepare("SELECT d.`ID`,d.`department_name` FROM `department` AS d WHERE `IsActive`=1 order by d.`department_name` Asc");
					$statement->execute();
					$results=$statement->fetchAll();
					foreach($results as $row) {
					echo "<option value='".$row['ID']."' data-department_id='".$row['department_name']."' data-department_name='".$row['department_name']."' >".$row['department_name']."</option>";
					}
					$db=null;
					?>
					</select>
				</div>
				<input name="role" id="role-input-select"  hidden />
				<input name="department_hidden" id="department-input-select-hidden"  hidden />
				
				<label for="name" id="name" class="col-md-2 col-form-label required">Active</label>
			  <div id="user-status-input" class="form-input col-md-3 noerror">
				<select name="user_status" class="form-control" id="user-status-input-select">
					<option value="" disabled selected>Select user status</option>
					<option value="1"> Yes </option>
					<option value="2"> No </option>
				</select>
			  </div>
			  <div class="col-5 department_parent_alternate">
			  
				</div>
				
			</div>
			<div class="form-group row justify-content-md-center ">
			<!--	<label for="name" id="name" class="col-md-2 col-form-label required">Active</label>
			  <div id="user-status-input" class="form-input col-md-2 noerror">
				<select name="user_status" class="form-control" id="user-status-input-select" placeholder="Select marital status">
					<option value="" disabled selected>Select user status</option>
					<option value="1"> Yes </option>
					<option value="2"> No </option>
				</select>
			  </div>
			  <div class="col-1">
			  </div>-->
			  <!--<label for="weight-input" class="col-1 col-form-label required">Role ID</label>
			  <div class="col-md-2">
					<input name="role" list="role" class="form-control" id="role-input-select" />
					<datalist id="role">
					<option value="1"> 1 </option>
					<option value="2"> 2 </option>
					<option value="3"> 3 </option>
					<option value="4"> 4 </option>
					</datalist>
				</div>-->
				<!--<div class="col-md-2">
			  </div>-->
			</div>	
			
			<div class="form-group row justify-content-md-center"><!--Address-->
			  <label for="address-input" class="col-md-2 col-form-label required">Address</label>
				<div class="col-md-3">
				<textarea class="form-control" id="address" placeholder="Enter address here" name="address"></textarea>
				</div>
					<label for="weight-input" class="col-md-2 col-form-label ">Blood group</label>
				<div class="col-md-2">
					<input name="bloodgroup" list="bloodgroup" class="form-control" id="bloodgroup-input-select" />
					<datalist id="bloodgroup">
					<option value="A"> A </option>
					<option value="B"> B </option>
					<option value="AB"> AB </option>
					<option value="A+"> A+ </option>
					<option value="A-"> A- </option>
					<option value="B+"> B+ </option>
					<option value="B-"> B- </option>
					<option value="AB+"> AB+ </option>
					<option value="AB-"> AB- </option>
					<option value="O+"> O+ </option>
					<option value="O-"> O- </option>
					</datalist>
				</div>
				<div class="col-1">
			  </div>
			</div>
			<div class="form-group row justify-content-md-center "><!--emergency contact number-->
				  <label for="ICE-tel-input" class="col-md-2 col-form-label required" >Biometric ID:</label>
				  <div class="col-md-3">
					<input class="form-control noerror" onkeypress="return isNumberKey(event)"  value="" placeholder="Biometric ID." id="bio_id" name="bio_id" autocomplete="off" maxlength="10">
				  </div>
				  <div class="col-5">
				  </div>
				</div>
			
			<div id="ICE_elements" class="ICE_elements">
				<hr class="seperator">
				<div class="form-group row justify-content-md  form-subHeader">
					<div class="col  align-self-start">
						  In case of emergency
					</div>
				</div>
				<br>
				<div class="form-group row justify-content-md-center "><!--emergency contact name--><!--emergency contact relation-->
				  <label for="ICE-name-input" class="col-md-2 col-form-label">Name</label>
				  <div class="col-md-3">
					<input name="ICE_name" class="form-control" type="text" value="" placeholder="Name" id="ICE-name-input">
				  </div>
				  <label for="ICE-relation-input" class="col-md-2 col-form-label">Relation</label>
				  <div class="form-input col-md-2">
					<input name="ICE_relation" class="form-control" type="text" value="" placeholder="Relation" id="ICE-relation-input">
				  </div>
				  <div class="col-1">
				  </div>
				</div>
				<div class="form-group row justify-content-md-center "><!--emergency contact number-->
				  <label for="ICE-tel-input" class="col-md-2 col-form-label required" >Contact No.</label>
				  <div class="col-md-3">
					<input name="ICE_contact" class="form-control noerror" onkeypress="return isNumberKey(event)" type="tel" value="" placeholder="contact no." id="ICE-tel-input" autocomplete="off" maxlength="10">
				  </div>
				  <div class="col-5">
				  </div>
				</div>
				<div class="form-group row justify-content-md-center ipd"><!--Address-->
				   <label for="alt-address-input" class="col-md-2 col-form-label required">Address</label>
					<div class="col-md-3">
					<textarea name="ICE_address" id="ICE_address" class="form-control" placeholder="Enter address here" style="width:100%;"></textarea>
					</div>
					<div class="col-offset-2  col-xs-offset-2  col-sm-offset-2 col-md-offset-2  col-md-3">
					<input  name="address_value"  class="form-control" style="width:auto;display:inline;"  type="checkbox" onclick="FillBilling(this.form)">
					<label >&nbsp;address same as above</label>
					</div>
					<div class="col-md-2">
				  </div>
				</div>
			</div >
			<div class="row justify-content-md-center">
				<div class="col-6">
					<center>
					<input type="submit" class="btn btn-success button_login" name="staff_registration" value="Update" style="width:50%;height:50px"/>
					</center>
				</div>
				<div class="col-6">
				<center>
					<input type="text" hidden id="staffid" name="staffid">
					<input type="button" class="btn btn-danger button_reset" id="reset_btn" onclick="resetform(staff_reg_form)" name="staff_registration" value="Discard Changes" style="width:50%;"/>
				</center>
				</div>
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
	   url: <?php echo $url_get_update_users;?>,
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
		setSelectValue('staffid', json.StaffID);
		setSelectValue('First-name-input', json.firstname);
		setSelectValue('last-name-input', json.lastname);
		setSelectValue('username', json.username);
		//var keyword= base64_decode(json.password)
		//setSelectValue('password-input',json.password);
		setSelectValue('email-input', json.email);
		setSelectValue('tel-input-staff', json.contact);
		setSelectValue('gender', json.gender);
		setSelectValue('marital-status-input-select', json.matitalstatus);
		setSelectValue('age-input', json.dob);
		setSelectValue('designation-input-select', json.roleid);
		//alert(json.roleid);
		setSelectValue('role-input-select', json.roleid);
		fill_hidden(json.roleid,json.designation);
		setSelectValue('department-input-select', json.designation);
		$('#department-input-select option[data-department_name="'+json.designation+'"]').prop('selected', true);
		setSelectValue('gender', json.gender);
		setSelectValue('address', json.address);
		setSelectValue('bloodgroup-input-select', json.bloodgroup);
		//setSelectValue('role-input-select', json.roleid);
		setSelectValue('ICE-name-input', json.ice_name);
		setSelectValue('ICE-relation-input', json.ice_relation);
		setSelectValue('ICE-tel-input', json.ice_contact);
		setSelectValue('ICE_address', json.ice_address);
		setSelectValue('user-status-input-select', json.isactive);
		setSelectValue('bio_id', json.bio_id);
		//alert(json.avatar);
		$('#profile_img').attr('src',<?php echo $profile_img_path?>+json.avatar);
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
function toast(){
	alert("New user Created");
}
/* ajax form submission */



$( "form#staff_reg_form" ).on( "submit", function( event ) {
				  event.preventDefault();// avoid to execute the actual submit of the form.
				  //console.log( $("#patient_reg_form").serialize() );
	var formData = new FormData(this);
	console.log( $("#staff_reg_form").serialize() );
	//alert("hello world");
    var url = "update_staff_redundant.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){				//alert("hello in if loop");
									$.ajax({
										   type: "POST",
										   url: url,
										   data: formData, // serializes the form's elements.
										   success: function(data)
										   {console.log(data);
										   
												swalSuccess(data);/*location.href = "./manage_accounts.php"*/
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
{var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))return false;return true;}

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
    var sex = document.forms["user_form"]["gender"].value;
    var dob = document.forms["user_form"]["dob"].value;
    var designation = document.forms["user_form"]["designation"].value;
    var department = document.forms["user_form"]["department"].value;
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
		$("#gender").focus();
		$("#gender").addClass('error').removeClass('noerror');
        return false;
    }else if (dob == "" ) {
       alert("date of birth must be filled out");
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
 function fill_hidden (id,department_name){
	 console.log("id is the "+id);
	 console.log("department name "+department_name);
	 $("#role-input-select").val(id);
	 if(department_name.match(/^(Doctor|RMO|Medical Specialist|MO)$/)){
		 $('.department_parent').css("display","block");
		 $('.department_parent_alternate').css("display","none");
		 console.log("department name "+department_name);
		 $('#department-input-select-hidden').val("");
	 }else{ 
	 $('.department_parent').css("display","none");
	 $('.department_parent_alternate').css("display","block");
	 $('#department-input-select-hidden').val(department_name);//department_hidden
	 }
 }
</script>


<?php
}
else{echo "<script>script('No User selected');</script>";}
$pageTitle = 'Update Users HMS'; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>