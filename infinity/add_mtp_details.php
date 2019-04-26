<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(isset($_GET['ID'])){$ID=$_GET['ID'];}else{$ID="";}
if(isset($_GET['pat_id'])){$patient_id=$_GET['pat_id'];}else{$patient_id="";}
?>

<?php include  $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
<style>
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
.form .seperator, .seperator{
    border: 0px;
    border-bottom: 1px dashed #b5babd;}
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
input[type=date]::-webkit-inner-spin-button {
		-webkit-appearance: none;
		display: none;
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
.hr_seperator{
 	margin-right: 9%;
    margin-left: 9%;
}
.item-row{
	display:none;
}
div#hiderow {
    display: inline-block;
    position: relative;
    bottom: 48px;
    float: right;
}

a.delete {
    position: relative;
    right: 6%;
    float: right;
    bottom: 150px;
}

.form-group.row.last_row {
    width: -webkit-fill-available;
}
input:not([type='submit']), select, summary, textarea {

    background-color: #fff0!important;
    border-radius: .25rem;
	}
hr.style3 {
	border-top: 1px dashed #8c8b8b;
}

input[type=date]::-webkit-inner-spin-button {
		-webkit-appearance: none;
		display: none;
		}
</style>
<?php
							$db = getDB();
							$statement=$db->prepare("SELECT MAX(`PatID`) FROM add_mtp_details");
							$statement->execute();
							$results=$statement->fetchColumn();
							$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results, $matches);
							if (preg_match_all('!\d+!', $results, $matches)) {
								$matches = $matches[0][0]+1;
							}else{$matches = 1; }
							$add_mtp_details= "MTP".str_pad($matches, 5, "0", STR_PAD_LEFT);

							$db=null;
							?>
<?php //include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include  $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
<div class="container" id="reg-form-container" >

	<div class="card card-outline-info mb-3" style="margin-top:18px;">
	  <div class="card-block heading_bar">
		<h5>Add new MTP Details</h5>
		<a href="#" onclick="goBack()" class="float" title="Click, to go back">
		<i class="fa fa-times my-float"></i>
	</a>
	  </div>
	</div>
	<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
		<div class="card-block" id="print">
			<div class="form-header-group ">
				  <div class="header-text httal htvam">
				  <div class="row">
					<hr class="seperator" width="97%">
					</div>
					<div class="row justify-content-md-center">
						<div class="col-md-auto">
						<h6>MTP Details</h6>
						</div>
					</div>
					<div class="row">
					<hr class="seperator" width="97%">
					</div>
				  </div>
			</div>
			<br>

			<form method="post" action="" class="form " name="mtp_submit_form"  id="mtp_submit_form" enctype="multipart/form-data" style="">
				<div class="form-group row justify-content-center"><!--ID-->
				  <label for="regID" id="regID_label" class="col-2 col-form-label ">
				  Reg. ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="regID" value="<?php echo $ID?>" id="regID"  readonly>
				  </div>

				  <label for="mtp_patID" id="mtp_patID_label" class="col-2 col-form-label " >Pat. ID</label>
				  <div class="col-3" style="/* display:none; */">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="patID" name="mtp_patID" value="<?php echo $add_mtp_details;

                                        ?>" id="mtp_patID"  readonly>
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
				  </div>
				</div>

				<div class="form-group row justify-content-center"><!--ID-->

				  <label for="mtp_ipd_opd_ID" id="mtp_ipd_opd_ID_label" class="col-2 col-form-label ">IPD/OPD ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="mtp_ipd_opd_ID"  id="mtp_ipd_opd_ID" value="<?php
					if (isset($_GET['pat_id'])){echo $_GET['pat_id'];}
					else {echo $patient_id;}?>" readonly>
				  </div>

				  <label for="mtp_uhid_ID" id= "mtp_uhid_ID_label" class="col-2 col-form-label " style="/* display:none; */">UHID</label>
				  <div class="col-3" style="/* display:none; */">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="patID" name="mtp_uhid_ID" value="<?php
					if (isset($_GET['pat_id'])){echo $_GET['pat_id'];}
					else {echo $patient_id;}?>" id="mtp_uhid_ID"  readonly>
				  </div>

				</div>

				<div class="form-group row justify-content-center"><!--name-->

				  <label for="mtp_name" id="mtp_name_label" class="col-2 col-form-label required ">Patient Name :</label>
				  <div class="col-8">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="Name" name="mtp_name" value="" id="mtp_name"  >
				  </div>

				</div>
                    <!----------------MTP wife/Daughter of and Age---------------------->
				<div class="form-group row justify-content-center">

					<label class="col-2 col-form-label required" for="mtp_wife_daughter_of" >Wife/Daughter of:</label>
					<div class="col-3">
						<input class="form-control" type="text" value="" tabindex="-1" placeholder="Wife/Daughter of" name="mtp_wife_daughter_of" id="mtp_wife_daughter_of" maxlength="100" >
					</div>

					<label for="mtp_age" class="col-2 col-form-label required">Age</label>
					<div class="col-3 ">
						<input name="mtp_age" class="form-control noerror" tabindex="-1" type="number" value="" placeholder="Age" id="mtp_age"  >
					</div>

				</div>
				  <!-------------------------------------->

				<div class="form-group row justify-content-center"><!--MTP Address--><!--Contact no-->

				 <label for="mtp_address" class="col-2 col-form-label required">Address</label>
					<div class="col-3">
						<textarea class="form-control" id="mtp_address" tabindex="-1" placeholder="Enter address here" name="mtp_address" style="width: 100%; resize: none;" ></textarea>
					</div>

				  <label for="mtp_contact_no" class="col-2 col-form-label required noerror">Contact No.</label><!--Contact no-->
				  <div class="col-3">
					<input class="form-control" type="text" value="" tabindex="-1" placeholder="contact no." name="mtp_contact_no" id="mtp_contact_no" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
				  </div>

				</div>
				<!-------------Religion && Dop------>

				<div class="form-group row justify-content-center">

					<label class="col-2 col-form-label " for="mtp_religion" >Religion:</label>
					<div class="col-3">


            <select name="mtp_religion" class="form-control" id="mtp_religion" style="height: 44px;">
  								<option value="" disabled selected>Select Religion</option>
  								<option value="Hindu">Hindu</option>
  								<option value="Muslim">Muslim</option>
                  <option value="Christian">Christian</option>
                  <option value="Sikh">Sikh</option>
                  <option value="Buddhist">Buddhist</option>
                  <option value="Jain">Jain</option>
                  <option value="Other Religion">Other Religion</option>
  					</select>
					</div>

					<label for="mtp_dop" class="col-2 col-form-label required">Duration of Pregnancy</label>
					<div class="col-3 ">
						<input name="mtp_dop" class="form-control noerror" tabindex="-1" type="text" value="" placeholder="In Weeks" id="mtp_dop">

					</div>
				</div>
				<!----------reason of MTP && Date of MTP-------->

				<div class="form-group row justify-content-center">

					<label class="col-2 col-form-label required" for="mtp_reason" >Reason of MTP:</label>
					<div class="col-3">
						<input class="form-control" type="text" value="" tabindex="-1" placeholder="Reason" name="mtp_reason" id="mtp_reason" autocomplete="off" maxlength="100" >
					</div>

					<label for="mtp_date" class="col-2 col-form-label required">Date of MTP</label>

                                    <div id="mtp_date_label" class="col-3 input-group date">
                                    <input class="form-control" type="text" id="mtp_date" name="mtp_date" oninput="myFunction()" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>

				</div>
				<!-----------Date of discharge result and remark--------->

				<div class="form-group row justify-content-center">

					<label for="mtp_date_discharge" class="col-2 col-form-label">Date of Discharge</label>

                                    <div id="mtp_date_discharge" class="col-3 input-group date">
                                    <input class="form-control" type="text" id="mtp_date_discharge" name="mtp_date_discharge" oninput="myFunction()" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>


                   <label class="col-2 col-form-label" for="mtp_result" >Reuslt & Remark</label>
					<div class="col-3">
						<input class="form-control" type="text" value="" tabindex="-1" placeholder="Reuslt & Remark" name="mtp_result" id="mtp_result" autocomplete="off" maxlength="100" >
					</div>

				</div>
				<!-------------------->

				<div class="form-group row justify-content-center">
					<label for="mtp_opini_on_by" class="col-2 col-form-label required">Opinion Formed by</label>

          <!-- <select name="mtp_opini_on_by" class="form-control col-3" id="mtp_opini_on_by" style="height: 44px;" >
								<option value="" disabled selected>Select Name</option>
								<option value="DR.1">DR.1</option>
								<option value="DR.1">DR.2</option>
					</select> -->
          <input class="form-control col-3" name="mtp_opini_on_by_input" id="mtp_opini_on_by_input" list="mtp_opini_on_by">
            <datalist id="mtp_opini_on_by">
                    <?php
                    $db = getDB();
                    $statement=$db->prepare("SELECT ID,firstname,lastname FROM  staff_ledger WHERE roleid = '2' or roleid = '27' or roleid = '28' ");
                    $statement->execute();
                    $results=$statement->fetchAll();
                    //$json=json_encode($results);
                    //return $json;
                    //$str = 'In My Cart : 11 12 items';
                    foreach($results as $row) {
                      $fullname ="";
                      $fullname = $row['firstname']."&nbsp;".$row['lastname'] ;
                    echo "<option value=".$fullname.">";
                    }
                    $db=null;
            /* */?>
                  </datalist>
                    <label class="col-2 col-form-label required" for="mtp_terminated_by" >Pregnancy Terminated by</label>
                    <input class="form-control col-3"  name="mtp_terminated_by_input" id="mtp_terminated_by_input" list="mtp_terminated_by">
                      <datalist id="mtp_terminated_by">
                        <?php
                        $db = getDB();
                        $statement=$db->prepare("SELECT ID,firstname,lastname FROM  staff_ledger WHERE roleid = '2' or roleid = '27' or roleid = '28' ");
                        $statement->execute();
                        $results=$statement->fetchAll();
                        //$json=json_encode($results);
                        //return $json;
                        //$str = 'In My Cart : 11 12 items';
                        foreach($results as $row) {
                          $fullname ="";
                          $fullname = $row['firstname']."&nbsp;".$row['lastname'] ;
                        echo "<option value=" .$fullname. ">";
                        }
                        $db=null;
                /* */?>
                 </datalist>
          <input type="text" id="ot_id" name="ot_id" value="<?php echo $_GET['opt_id']?>" hidden/>
				</div>
				<!-------------------->



				<!------------------->

				<!------------------->
				<!--<hr class="style3">
			<div class="row justify-content-center">
				<div class="col-md-8" style="padding:50px">
				</div>
				<div class="col-md-4" style="">
				<table id="Amount_table">
					<tr>
						<td>Total</td>
						<td>:</td>
						<td><span>₹</span></td>
						<td><input class="form-control noerror" type="number" placeholder=" 00.00" name="total" value="" id="total" maxlength="15" readonly tabindex="-1"></td>
					</tr>
					<tr>
						<td>Advance</td>
						<td>:</td>
						<td><span>₹</span></td>
						<td><input class="form-control noerror" type="number" placeholder=" 00.00" name="advance" value="" id="advance" maxlength="10" min="0.00" max="10000000.00" step="0.01" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);update_balance();"></td>
					</tr>
					<tr>
						<td>Balance</td>
						<td>:</td>
						<td><span>₹</span></td>
						<td><input class="form-control noerror" type="number" placeholder="₹ 00.00" name="balance" value="" id="balance" maxlength="15" readonly tabindex="-1"></td>
					</tr>
				</table>
				</div>
			</div>-->
			<div class="row justify-content-center">
				<div class="col-md-2"><br>
					<input type="submit" class="btn btn-success " name="staff_registration" value="Submit" style="width:150px; "/>
				</div>
				<!--<div class="col-6">
				<center>
					<input type="button" class="btn btn-danger " id="reset_btn" onclick="resetform(pat_update_form)" name="staff_registration" value="Reset" style="width:50%;"/>
				</center>
				</div>-->
			</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script>

	 $(".dateofmtp").datepicker({
        format: "dd MM yyyy"
    });

	 $(document).ready(function(){
      var date_input=$('input[name="mtp_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

var counter=0;
$(document).ready(function(){
      var date_input=$('input[name="mtp_date_discharge"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
$(".addrow").on("click",function(){
		 if (counter < 5){
			 //alert(counter);
	  counter++;
	 //$('.item-row').css("display", "block");
	 //$(this).parents('.item-row').next('.item-row').css("display", "block");
	$(this).parents(".item-row").find(".addrow").css("display","none");
	}else{swalSuccess("Creat new pathology form.")}
	//$(this).closest('form').next('.item-row').css('color','red');
	$(this).parents('.item-row').next('.item-row').css("display", "block");
	next(this)
	});

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
debugger;
		/* $('#First-name-input').val(json.firstname); */
		setSelectValue('regID', json.RegID);
		//setSelectValue('mtp_ipd_opd_ID', json.patientID);
		setSelectValue('mtp_name', json.FirstName+" "+ json.LastName);
		setSelectValue('mtp_contact_no', json.Mobile);
		setSelectValue('mtp_uhid_ID', json.UHID);
		setSelectValue('mtp_age', json.Age);
		setSelectValue('mtp_address', json.Address);
}
	/*------------------------*/
// setSelectValue (id, val) {}is in footer
function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
}
function toast(){
	swalSuccess("New user Created");
}

/* ajax form submission */
$( "#mtp_submit_form" ).on( "submit", function( event ) {
	//alert("reached here");
	event.preventDefault();// avoid to execute the actual submit of the form.
	var formData = new FormData(this);
	console.log("Form data is : "+$(this).serialize());
	var get_url=$(this).serialize();
	//alert("hello world");
  var url = "addpatient_mtp.php"; // the script where you handle the form input.
	var test=validateForm(event);

	if (test==true){				//alert("hello in if loop");
			$.ajax({
				   type: "POST",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {
						console.log("return Data is : "+data);
						if(data!="unsuccesful" && data !="" ){
							//swalSuccess(data);//alert
							swalSuccess("MTP Entry Successfully added");
              ////for redirecting next surgery page if exist ///////////////////
             var regID = "<?php echo $_GET['ID']?>";
             var patient_id ="<?php echo $_GET['pat_id']?>";
             var ot_id="<?php echo $_GET['opt_id']?>";
             var surgery_name= "<?php echo $_GET['surgery_ID']?>";
             var test =surgery_name.substring(0,2);//for redirecting next surgery page
             var surgery_trim = surgery_name.substr(3);//for geting next surgery ID

             if(test == "41"){
               url_for_redirect = `/add_delivery_details.php?ID=${regID}&pat_id=${patient_id}&opt_id=${ot_id}&surgery_ID=${surgery_trim}`;
             }else if (test == "42") {
                 url_for_redirect = `/add_vt_details.php?ID=${regID}&pat_id=${patient_id}&opt_id=${ot_id}&surgery_ID=${surgery_trim}`;
             }else if (test == "43") {
                  url_for_redirect = `/add_tl_details.php?ID=${regID}&pat_id=${patient_id}&opt_id=${ot_id}&surgery_ID=${surgery_trim}`;
             }else if (test =="44") {
                 url_for_redirect = `/add_mtp_details.php?ID=${regID}&pat_id=${patient_id}&opt_id=${ot_id}&surgery_ID=${surgery_trim}`;
             }else {
                   setTimeout(function(){window.location.href = "<?php BASE_URL?>list_all_patients.php";},3000)
             }
             setTimeout(function(){  window.location = url_for_redirect;},3000);

              /////////////////////////////////////////////////////////////////
						}else{
							swalError('Some error occured, please try again after some time.');
						}
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
			}else {}
});

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
//document.getElementById("age-input").setAttribute("max", today);
/*            ----------------------------                      */

function printDiv(divName) {
 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}

//validation for form

function validateForm(){
debugger;
var mtp_patID = document.getElementById("mtp_patID").value;
var test1 = document.getElementById("mtp_ipd_opd_ID").value;
var test2 = document.getElementById("mtp_uhid_ID").value;
var test3 = document.getElementById("mtp_name").value;
var test4 = document.getElementById("mtp_wife_daughter_of").value;
var test5 = document.getElementById("mtp_age").value;
var test6 = document.getElementById("mtp_address").value;
var test7 = document.getElementById("mtp_contact_no").value;
var test8 = document.getElementById("mtp_dop").value;
var test9 = document.getElementById("mtp_reason").value;
var test10 = document.getElementById("mtp_date").value;
var test11 = document.getElementById("mtp_opini_on_by_input").value;
var test12 = document.getElementById("mtp_terminated_by_input").value;
var test13 = document.getElementById("ctl00_AdminID").value;


if (mtp_patID == "" ){
    swalError("First patID must be filled out");//alert
$("#mtp_patID").focus();
$("#mtp_patID").addClass('error').removeClass('noerror');
    return false;
}else if (test1 == ""){
    swalError("IPD/UPD No field is required!");//alert
    $("#mtp_ipd_opd_ID").focus();
    $("#mtp_ipd_opd_ID").addClass('error').removeClass('noerror');
     return false;
}else if (test2 == " ") {
    swalError("UHID field is required!");//alert
$("#mtp_uhid_ID").focus();
$("#mtp_uhid_ID").addClass('error').removeClass('noerror');
    return false;
}else if (test3 == "" ) {
   swalError("Patient Name field is required!");//alert
$("#mtp_name").focus();
$("#mtp_name").addClass('error').removeClass('noerror');
    return false;
}else if (test4 == "" ) {
     swalError("Wife/Daughter field is required!");//alert
  $("#mtp_wife_daughter_of").focus();
  $("#mtp_wife_daughter_of").addClass('error').removeClass('noerror');
      return false;
}else if (test5 == "" ) {
         swalError("Age field required!");//alert
      $("#mtp_age").focus();
      $("#mtp_age").addClass('error').removeClass('noerror');
          return false;
}else if (test6 == "" ) {
        swalError("Address field is required!");//alert
        $("#mtp_address").focus();
        $("#mtp_address").addClass('error').removeClass('noerror');
                  return false;
}else if (test7 == "" ) {
    swalError("Contact No field is required!");//alert
    $("#mtp_contact_no").focus();
    $("#mtp_contact_no").addClass('error').removeClass('noerror');
      return false;
}else if (test8 == "" ) {
   swalError("Duration of Pregnancy field is required!");//alert
   $("#mtp_dop").focus();
   $("#mtp_dop").addClass('error').removeClass('noerror');
          return false;
}else if (test9 == "" ) {
    swalError("MTP reason field is required!");//alert
    $("#mtp_reason").focus();
    $("#mtp_reason").addClass('error').removeClass('noerror');
      return false;
}else if (test10 == "" ) {
    swalError("MTP date field is required!");//alert
    $("#mtp_date").focus();
    $("#mtp_date").addClass('error').removeClass('noerror');
          return false;
}else if (test11=="" || test11==null || test11=="Select Name") {
    swalError("Opinion Formed By field is required!");//alert
    $("#mtp_opini_on_by").focus();
    $("#mtp_opini_on_by").addClass('error').removeClass('noerror');
                  return false;
}else if (test12=="" || test12==null || test11=="Select Name"){
     swalError("Pregnancy Terminated By field is required!");//alert
     $("#mtp_Pregnancy_terminated_by").focus();
     $("#mtp_Pregnancy_terminated_by").addClass('error').removeClass('noerror');
         return false;
}else if (test13 == "" ) {
      swalError("AdminID Not found!");//alert
      $("#ctl00_AdminID").focus();
      $("#ctl00_AdminID").addClass('error').removeClass('noerror');
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

function dropdown_sub_test(parentselect,childselect){
	/* document.querySelector(parentselect).onchange = function(){
	   alert(this.selectedOptions[0].getAttribute('data-attr'));
	}; */
parentselect=`#${parentselect}`;
//childselect=`#${childselect}`;
	console.log(`value of ${parentselect}`);
	var amount=$(parentselect).find(':selected').attr('data-amount');
	console.log(`value of ${parentselect} :::::: amount is ${amount} :::: childselectvalue ${childselect}`);
	setValue(childselect,`${amount}`)
	update_price();
	update_balance();
}


function dropdown_sub(parentselect,childselect){
$( "select[name='"+parentselect+"']" ).change(function () {
    var main_test_name = $(this).val();


    if(main_test_name) {
        $.ajax({

            url: "get_all_patho_sub_category_by_main_category.php",
            Type: 'GET',
            data: {'dr_ID':main_test_name},
            success: function(data) {
                $('select[name="'+childselect+'"]').empty();
				$('select[name="'+childselect+'"]').append('<option value="" disabled selected> Select test</option>');
				var json = JSON.parse(data);
				for (var i = 0; i < json.length; i++) {
					$('select[name="'+childselect+'"]').append('<option  data-amount="'+json[i].PathologyTestCharges+'" value="'+json[i].PathologySubCategoryID+'" data-subtestname="'+json[i].PathologySubCategoryName+'">'+json[i].PathologySubCategoryName+'</option>');
				}
			}
        });

    }else{
        $('select[name="'+childselect+'"]').empty();
		$('select[name="'+childselect+'"]').append('<option value="" disabled selected> Select test</option>');
    }
});
}

function setValue (id, val) {
	console.log(`ID is : ${id} ::: value is : ${val}`);
	var test = $("input[id="+id+"]");
	test.val(`${val}`);
	//test.data("Value",`${val}` );
	console.log("ID is : EOL'"+id+"' ::: value is : EOL "+val);
	//document.getElementById(id).value=val;
}

function update_price() {
 var price=0;
 var amount=0;
 for(i=0;i<=4;i++){
	 var name=`#sub_test_amount-${i}`;
  var len = $(`${name}`);
  //console.log(`${name}`);
  var price = Number(len.val());
 //console.log("price is "+Number(price));
  //price = roundNumber(price,2);
  //isNaN(price) ? row.find('.price').val("N/A") : row.find('.price').val(price);

  amount += price;
 }
 amount=roundNumber(amount,2);
 setValue("total",amount);
}

function update_balance() {
  var due = $("#total").val().replace("₹","") - $("#advance").val().replace("₹","");
  due = roundNumber(due,2);
  $('#balance').val(due);
  //$('.due').html(due);
}

function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    }
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}
</script>

<?php
$pageTitle = "Add MTP Details"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include  $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
