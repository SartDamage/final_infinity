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

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
<div class="container" id="reg-form-container" >
	<div class="card card-outline-info mb-3" style="margin-bottom: 1rem!important;">
		<a href="#" onclick="goBack()" class="float" title="Click, to go back">
			<i class="fa fa-times my-float"></i>
		</a>
		<div class="card-block" id="print">
			<div class="form-header-group ">
				  <div class="header-text httal htvam">
					<h5 id="header_1" class="form-header form_header" data-component="header">
					  Pathology patient registration
					</h5>
				  </div>
			</div>
		</div>
	</div>
	<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
		<div class="card-block" id="print">
			<div class="form-header-group ">
				  <div class="header-text httal htvam">
					<h5 id="header_1" class="form-header form_header" data-component="header">
					  Patient's Detail
					</h5>
				  </div>
			</div>

			
			<form method="post" action="" class="form " name="pat_update_form"  id="pat_update_form" enctype="multipart/form-data" style="padding: 0 0 0 13%;">
				<div class="form-group row "><!--ID-->
				  <label for="regID" id="regID_label" class="col-2 col-form-label ">Reg. ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" placeholder="regID" name="regID" value="<?php echo $ID?>" id="regID"  readonly>
				  </div>
				  <label for="patID" id="patID_label" class="col-2 col-form-label " style="/* display:none; */">Pat. ID</label>
				  <div class="col-3" style="/* display:none; */">
					<input class="form-control noerror" type="text" placeholder="patID" name="patID" value="" id="patID"  >
					<input class="form-control noerror" type="text" placeholder="" name="ctl00_AdminID" value="" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
				  </div>
				</div>
				<div class="form-group row "><!--name-->
				  <label for="name" id="name" class="col-2 col-form-label required">Name</label>
				  <div class="col-8">
					<input class="form-control noerror" type="text" placeholder="name" name="first_name" value="" id="First-name-input"  readonly>
				  </div>
				</div>
				<div class="form-group row"><!--gender--><!--age-->
					<label class="col-2 col-form-label required" for="sex-input " > Sex </label>
					<div class="col-3">
						<input class="form-control" type="text" value="" name="gender" id="gender" autocomplete="off" readonly >
					</div>
					<label for="dob" class="col-2 col-form-label required">Age</label>
					<div class="col-3 ">
						<input name="dob" class="form-control noerror" type="text" value="" placeholder="Age" id="age-input" readonly>
					</div>
				</div>
				<div class="form-group row"><!--Marital Status--><!--Contact no-->
				 <label for="address-input" class="col-2 col-form-label required">Address</label>
					<div class="col-3">
						<textarea class="form-control" id="address" placeholder="Enter address here" name="address" style="width: 100%;" readonly></textarea>
					</div>
				  <label for="tel-input-staff" class="col-2 col-form-label required noerror">Contact No.</label><!--Contact no-->
				  <div class="col-3">
					<input class="form-control" type="text" value="" placeholder="contact no." name="contact_staff" id="tel-input-staff" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" readonly>
				  </div>
				</div>
				<div class="form-group row">
					<label class="col-2 col-form-label required" for="doctor_assigned" >Test category :</label>
					<div class="col-3">
					<select name="main_test" class="form-control" id="main-test-input-select" placeholder="main test" style="height: 44px;">
								<option value="" disabled selected> Select main test</option>
<?php $con=mysqli_connect("localhost","root","","hmsdb");if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$result = mysqli_query($con,"SELECT * FROM pathologycategorymaster");
	while($row = mysqli_fetch_array($result)){
		echo "<option value=" . $row['PathologyCategoryID'] . ">" . $row['PathologyCategoryName'] . "</option>";
		}mysqli_close($con);?>
					</select>
					</div>
					<label class="col-2 col-form-label required" for="doctor_assigned required" >Test name :</label>
					<div class="col-3">
					<select name="sub_test" class="form-control" id="sub_test" placeholder="main test" style="height: 44px;">
								<option value="" disabled selected> Select main test first</option>
					</select>
					</div>
				</div>
				<div class="form-group row"><!--Date of birth--><!--Contact no-->
					<label class="col-2 col-form-label required" for="dr_assigned" >Dr. Assigned :</label>
					<div class="col-3">
						<select name="dr_assigned" class="form-control" id="dr_assigned" style="height: 44px;">
								<option value="" disabled selected> Select option</option>
								<?php $con=mysqli_connect("localhost","root","","hmsdb");if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$result = mysqli_query($con,"SELECT pdr.`pathologist_name`,pdr.`pathodrID` FROM `pathology_dr_assigned` AS pdr WHERE `IsActive`=1;");
	while($row = mysqli_fetch_array($result)){
		echo "<option value=" . $row['pathodrID'] . "> Dr. " . $row['pathologist_name'] . "</option>";
		}mysqli_close($con);?>
						</select>
					</div>
					<label class="col-2 col-form-label required" for="sample_status" >Sample collected :</label>
					<div class="col-3">
						<select name="sample_status" class="form-control" id="sample_status" style="height: 44px;">
								<option value="" disabled selected> Select option</option>
								<option value="1" > In lab</option>
								<option value="0" > Out of lab</option>
						</select>
					</div>
				</div>
			
			<div class="row">
				<div class="col-6">
					<center>
					<input type="submit" class="button_login" name="staff_registration" value="Submit" style="width:50%; "/>
					</center>
				</div>
				<div class="col-6">
				<center>
					<input type="button" class="button_reset" id="reset_btn" onclick="resetform(pat_update_form)" name="staff_registration" value="Reset" style="width:50%;"/>
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
	   url: <?php echo $get_patient_detail_by_regID;?>,
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
		//setSelectValue('patID', json.patientID);
		setSelectValue('First-name-input', json.FirstName+" "+ json.LastName);
		setSelectValue('tel-input-staff', json.Mobile);
		setSelectValue('gender', json.Gender);
		setSelectValue('age-input', json.Age);	
		setSelectValue('address', json.Address);	
}
	/*------------------------*/
function setSelectValue (id, val) {
	console.log("ID is : "+id+" :::  value is : "+val);
    document.getElementById(id).value = val;
}
function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
}	
function toast(){
	alert("New user Created");
}

/* ajax form submission */
$( "form#pat_update_form" ).on( "submit", function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.
	var formData = new FormData(this);
	console.log("Form data is : "+formData);
	//alert("hello world");
    var url = "addpatient_pathology.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){				//alert("hello in if loop");
			$.ajax({
				   type: "POST",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {	
						console.log("return Data is : "+data);
						alert(data);
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
    var patID = document.forms["pat_update_form"]["patID"].value;
    var main_test = document.forms["pat_update_form"]["main_test"].value;
    var sub_test = document.forms["pat_update_form"]["sub_test"].value;
    var dr_assigned = document.forms["pat_update_form"]["dr_assigned"].value;
    var sample_status = document.forms["pat_update_form"]["sample_status"].value;
    if (patID == "" ) {
        alert("First patID must be filled out");
		$("#patID").focus();
		$("#patID").addClass('error').removeClass('noerror');
        return false;
		
    }else if (main_test == "") {
        alert("main test must be selected");
		$("#main-test-input-select").focus();
		$("#main-test-input-select").addClass('error').removeClass('noerror');
        return false;
    }else if (sub_test == "") {
        alert("sub test must be selected");
		$("#sub_test").focus();
		$("#sub_test").addClass('error').removeClass('noerror');
        return false;
    }else if (dr_assigned == "" ) {
       alert("dr. assigned must be selected");
		$("#dr_assigned").focus();
		$("#dr_assigned").addClass('error').removeClass('noerror');
        return false;
    }else if (sample_status == "" ) {
       alert("sample status must be selected");
		$("#sample_status").focus();
		$("#sample_status").addClass('error').removeClass('noerror');
        return false;
    }else{ return true;}
}

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

$( "select[name='main_test']" ).change(function () {
    var main_test_name = $(this).val();


    if(main_test_name) {
        $.ajax({
			
            url: "get_all_patho_sub_category_by_main_category.php",
            Type: 'GET',
            data: {'dr_ID':main_test_name},
            success: function(data) {
                $('select[name="sub_test"]').empty();
				$('select[name="sub_test"]').append('<option value="" disabled selected> Select test</option>');
				var json = JSON.parse(data);
				for (var i = 0; i < json.length; i++) {
					$('select[name="sub_test"]').append('<option value="'+json[i].PathologySubCategoryID+'">'+json[i].PathologySubCategoryName+'</option>');
				}
			}
        });


    }else{
        $('select[name="sub_test"]').empty();
		$('select[name="sub_test"]').append('<option value="" disabled selected> Select test</option>');
    }
});
</script>

<?php
$pageTitle = "Pathology patient registration HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>