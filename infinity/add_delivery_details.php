<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(isset($_GET['ID'])){$ID=$_GET['ID'];}else{$ID="";}
if(isset($_GET['pat_id'])){$patient_id=$_GET['pat_id'];}else{$patient_id="";}
if(isset($GET['surgery_ID'])){$surgery_ID=$GET['surgery_ID'];}else{$surgery_ID="";}

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
              $statement=$db->prepare("SELECT MAX(`pat_id`) FROM add_delivery_details");
              $statement->execute();
              $results=$statement->fetchColumn();
              $json=json_encode($results);
              //return $json;
              //$str = 'In My Cart : 11 12 items';
              preg_match_all('!\d+!', $results, $matches);
              if (preg_match_all('!\d+!', $results, $matches)) {
                $matches = $matches[0][0]+1;
              }else{$matches = 1; }
              $TL_ID= "DL".str_pad($matches, 5, "0", STR_PAD_LEFT);

              $db=null;
              $db = getDB();
              $statement=$db->prepare("SELECT MAX(`id`) FROM add_delivery_details");
              $statement->execute();
              $results=$statement->fetchColumn();
              $json=json_encode($results);
              //return $json;
              //$str = 'In My Cart : 11 12 items';
              $results = (int)$results+1;
              $anually_no= $results."/".date("y");

              $db=null;
              ?>
<?php //include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include  $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
<div class="container" id="reg-form-container" >

	<div class="card card-outline-info mb-3" style="margin-top:18px;">
	  <div class="card-block heading_bar">
		<h5>Add new Delivery Details</h5>
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
						<h6>Delivery Details</h6>
						</div>
					</div>
					<div class="row">
					<hr class="seperator" width="97%">
					</div>
				  </div>
			</div>
			<br>

			<form method="post" action="" class="form " name="pat_update_form"  id="pat_update_form" enctype="multipart/form-data" style="">
				<div class="form-group row justify-content-center"><!--ID-->
				  <label for="regID" id="regID_label" class="col-2 col-form-label ">Reg. ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="regId" value="<?php echo $ID?>" id="regId"  readonly>
				  </div>
				  <label for="patID" id="patID_label" class="col-2 col-form-label " style="/* display:none; */">Pat. ID</label>
				  <div class="col-3" style="/* display:none; */">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="patID" name="delivery_patID" value="<?php echo $TL_ID;?>" id="delivery_patID"  readonly>
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
				  </div>
				</div>

				<div class="form-group row justify-content-center"><!--ID-->
				  <label for="regID" id="regID_label" class="col-2 col-form-label ">IPD/OPD ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="ipd_opd_id" name="ipd_opd_id" value="<?php echo $patient_id?>" id="ipd_opd_id"  readonly>
				  </div>
				  <label for="patID" id="patID_label" class="col-2 col-form-label " style="/* display:none; */">UHID</label>
				  <div class="col-3" style="/* display:none; */">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="UHID" name="UHID" value="" id="UHID"  readonly>
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
				  </div>
				</div>

				<div class="form-group row justify-content-center"><!--name-->
				  <label for="name" id="name" class="col-2 col-form-label required">Patient Name :</label>
				  <div class="col-8">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="name" name="patient_name" value="" id="patient_name" readonly/>
				  </div>
				</div>
				<div class="form-group row justify-content-center">
					<label class="col-2 col-form-label required" for="sample_status" >Gravida :</label>
					<div class="col-3">
						<input class="form-control" type="text" value="" tabindex="-1" placeholder="gravida" name="delivery_gravida" id="delivery_gravida" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
					</div>
					<label for="dob" class="col-2 col-form-label required">Age</label>
					<div class="col-3 ">
						<input name="delivery_age" class="form-control noerror" tabindex="-1" type="text" value="" placeholder="Age" id="delivery_age"  >
					</div>
				</div>
				<div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
				 <label for="address-input" class="col-2 col-form-label required">Address</label>
					<div class="col-3">
						<textarea class="form-control" id="address" tabindex="-1" placeholder="Enter address here" name="address" style="width: 100%; resize: none;" ></textarea>
					</div>
				  <label for="tel-input-staff" class="col-2 col-form-label required noerror">Contact No.</label><!--Contact no-->
				  <div class="col-3">
					<input class="form-control" type="text" value="" tabindex="-1" placeholder="contact no." name="contact_staff" id="contact_staff" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
				  </div>
				</div>
				<!-------------------->
				<div class="">
				<div class="form-group row justify-content-center">
				 	<label class="col-2 col-form-label required" for="wks" >Weeks :</label>
					<div class="col-3">
           <input class="form-control" type="text" value=""  placeholder="wks" name="wks" id="wks" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="5" >
					</div>
					<label class="col-2 col-form-label required" for="method_delivery" >Method Delivery :</label>
					<div class="col-3">
					<select name="method_delivery" class="form-control" onchange="dropdown_sub_test(this.id,'sub_test_amount-0')" id="method_delivery" style="height: 44px;" data-amount="500">
								<option value="" disabled selected> Select Method</option>
								<option>Caesarean</option>
								<option>FTND</option>
					</select>
					</div>
				</div>

      				<div class="form-group row justify-content-center">
                <label class="col-2 col-form-label required" for="doctor_assigned" >Doctor by :</label>
      					<div class="col-3">
                  <select name="dr_name" class="form-control" id="dr_name" style="height: 44px;" onclick='dropdown_sub(this.name,"sub_test-0")' >
        								<option value="" disabled selected> Select Assisting Doctor/s</option>
        <?php
            $db = getDB();
            $statement=$db->prepare("SELECT ID,firstname,lastname FROM  staff_ledger WHERE designation = 'Operating Surgeon'");
            $statement->execute();
            $results=$statement->fetchAll();
            //$json=json_encode($results);
            //return $json;
            //$str = 'In My Cart : 11 12 items';
            foreach($results as $row) {
            echo "<option value=" . $row['ID'] . ">".$row['firstname'].' '. $row['lastname'] . "</option>";
            }
            $db=null;
        /* */?>

  					</select>
					</div>
					<label class="col-2 col-form-label required" for="date_time" >Date/Time :</label>
					<div class="col-3">
						<div class="row">
							<div class="col-6">
								<input class="form-control" type="text" value="" name="delivery_date" id="delivery_date" placeholder="Date" autocomplete="off" maxlength="10"/>
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
							<div class="col-6">
								<input class="form-control" type="time" value="" name="delivery_time" id="delivery_time" autocomplete="off" maxlength="10" style="font-size: 12px">
							</div>
						</div>
				</div>
				</div>

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

          <input type="text" id="ot_id" name="ot_id" value="<?php echo $_GET['opt_id']?>" hidden/>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script>
///////////////////////validation_Aj///////////////////////
function validateForm(){

var test1 = document.getElementById("regId").value;
var test2 = document.getElementById("delivery_patID").value;
var test3 = document.getElementById("ctl00_AdminID").value;
var test4 = document.getElementById("ipd_opd_id").value;
var test5 = document.getElementById("patient_name").value;
var test6 = document.getElementById("delivery_gravida").value;
var test7 = document.getElementById("delivery_age").value;
var test8 = document.getElementById("wks").value;
var test9 = document.getElementById("method_delivery").value;
var test10 = document.getElementById("dr_name").value;
var test11 = document.getElementById("delivery_date").value;
var test12 = document.getElementById("delivery_time").value;

if (test1 == "" ){
    swalError("First regID must be filled out");//alert
$("#regId").focus();
$("#regId").addClass('error').removeClass('noerror');
    return false;
}else if (test2 == ""){
    swalError(" patID field is required!");//alert
    $("#delivery_patID").focus();
    $("#delivery_patID").addClass('error').removeClass('noerror');
     return false;
   }else if (test3 == ""){
       swalError("Admin login  is required!");//alert
       $("#ctl00_AdminID").focus();
       $("#ctl00_AdminID").addClass('error').removeClass('noerror');
        return false;
}else if (test4 == " ") {
    swalError("Opd/Ipd field is required!");//alert
$("#ipd_opd_id").focus();
$("#ipd_opd_id").addClass('error').removeClass('noerror');
    return false;
}else if (test5 == "" ) {
   swalError("Patient Name field is required!");//alert
$("#patient_name").focus();
$("#patient_name").addClass('error').removeClass('noerror');
    return false;
}else if (test6 == "" ) {
     swalError("Gravida field is required!");//alert
  $("#delivery_gravida").focus();
  $("#delivery_gravida").addClass('error').removeClass('noerror');
      return false;
}else if (test7 == "" ) {
         swalError("Age field required!");//alert
      $("#delivery_age").focus();
      $("#delivery_age").addClass('error').removeClass('noerror');
          return false;
}else if (test8 == "" ) {
        swalError("Weeks field is required!");//alert
        $("#wks").focus();
        $("#wks").addClass('error').removeClass('noerror');
                  return false;
}else if (test9 == "" ) {
    swalError("Method Delivery field is required!");//alert
    $("#method_delivery").focus();
    $("#method_delivery").addClass('error').removeClass('noerror');
      return false;
}else if (test10 == "" ) {
   swalError("Doctor by field is required!");//alert
   $("#dr_name").focus();
   $("#dr_name").addClass('error').removeClass('noerror');
          return false;
}else if (test11 == "" ) {
    swalError("Delivery Date field is required!");//alert
    $("#delivery_date").focus();
    $("#delivery_date").addClass('error').removeClass('noerror');
      return false;
}else if (test12 == "" ) {
    swalError("Delivery Time field is required!");//alert
    $("#delivery_time").focus();
    $("#delivery_time").addClass('error').removeClass('noerror');
      return false;
}else{ return true;}
}

//////////////////////////////////////////////////////

///////////////////////docunent.ready////////////////
var counter=0;
$(document).ready(function(){
      var date_input=$('input[name="delivery_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
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
function next(event) {
   var list = $('.item-row');    //all containers
   //alert("item row"+list.length);
   var index = list.index($(event.target));  //current container
   //alert("current "+index);
   prev_index=index-1
   //list.eq(index).parents(".item-row").find(".addrow").css("display", "none");
   index = (index + 1) % list.length;        //increment with wrap
   var nextAmountCalculationContainer = list.eq(index);
   list.eq(index).css("display", "block");

   }

	 $( document ).on( "click", ".delete", function(){
		 counter--
		 //$(this).parents('.item-row');
		 $(this).parents('.item-row').css("display", "none");
		 $(this).parents('.item-row').find('.addrow').css("display", "block");
		 //$(this).find("input").val("");
		 $(this).parents('.item-row').find("input[type='text']").val("0");

		 $(this).parents(".item-row").find('select').val("");//.css( "color", "red" )
		 		 update_price();
		 update_balance();
		// $('#baba').val($(this).find('option:first').val());
    if ($(".delete").length < 2) $(".delete").hide(); });
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
                debugger;
		setSelectValue('UHID', json.UHID);
		//setSelectValue('patID', json.patientID);
		setSelectValue('patient_name', json.FirstName+" "+ json.LastName);
		setSelectValue('contact_staff', json.Mobile);
		//setSelectValue('gender', json.Gender);
		setSelectValue('delivery_age', json.Age);
		setSelectValue('address', json.Address);

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

$( "form#pat_update_form" ).on( "submit", function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.
	var formData = new FormData(this);
	console.log("Form data is : "+$(this).serialize());
	var get_url=$(this).serialize();
	//alert("hello world");

    var url = "<?php echo BASE_URL;?>/addpatient_delivery.php"; // the script where you handle the form input.
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
						if(data!="unsuccesful" && data !="" ){
							//swalSuccess(data);//alert
              debugger;
							swalSuccess("Delivery details Successfully added");
               debugger;
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

							patientid = document.getElementById('patID').value;
							//var test1 = document.forms["pat_update_form"]["sub_test-0"];
							var test1 = "";
							var test2 = "";
							var test3 = "";
							var test4 = "";
							var test5 = "";
							var today = new Date();
							date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear()+' at '+ today.getHours() + ":" + today.getMinutes();
							var json = JSON.parse(data);
							console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
							send_sms.welcome_patho("welcome_patho",`${json[0].Mobile}`,`${json[0].FirstName} ${json[0].LastName}`,`${patientid}`,`${date}`,`${test1}`,`${test2}`,`${test3}`,`${test4}`,`${test5}`);
                                                        //setTimeout(function(){ location.href = "<?php echo BASE_URL;?>index.php"; }, 3000);
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
function save_reciept(formData){
							console.log("in save reciept ::: :: ::: "+formData);
							swalSuccess("New test Registered.");//alert
							$.ajax({
							   type: "GET",
							   url: "/invoice/set_invoice.php",
							   data: formData,// serializes the form's elements.
							   success: function(data)
							   {
									console.log("invoice"+data);
									//var json = JSON.parse(data);
									//parseJsonToForm(json);
									location.href = "/list_all_tests_registered_pathology.php#1b";
							   },
								cache: false,
								contentType: false,
								processData: false
							 });
}

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
$pageTitle = "Operation Theatre patient registration"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include  $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
