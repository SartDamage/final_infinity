<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(!$_GET['ID']){$ID="";}else{$ID=$_GET['ID'];}
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
</style>
<?php
							$db = getDB();
							$statement=$db->prepare("SELECT MAX(`ot_id`) FROM patientot");
							$statement->execute();
							$results=$statement->fetchColumn();
							$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results, $matches);
							if (preg_match_all('!\d+!', $results, $matches)) {
								$matches = $matches[0][0]+1;
							}else{$matches = 1; }
							$ot_id= "OT".str_pad($matches, 5, "0", STR_PAD_LEFT);

							$db=null;
							?>
<?php //include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include  $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
<div class="container" id="reg-form-container" >

	<div class="card card-outline-info mb-3" style="margin-top:18px;">
	  <div class="card-block heading_bar">
		<h5>Add new OT Details</h5>
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
						<h6>OT Registration</h6>
						</div>
					</div>
					<div class="row">
					<hr class="seperator" width="97%">
					</div>
				  </div>
			</div>
			<br>

			<form method="post" action="" class="form " name="pat_update_form"  id="pat_update_form" enctype="multipart/form-data" style="">
      <div id="no_pop_up">
				<div class="form-group row justify-content-center"><!--ID-->
				  <label for="regID" id="regID_label" class="col-2 col-form-label ">Reg. ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="regID" value="<?php echo $ID?>" id="regID"  readonly>
				  </div>
				  <label for="patID" id="patID_label" class="col-2 col-form-label " style="/* display:none; */">Pat. OT ID</label>
				  <div class="col-3" style="/* display:none; */">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="OT_id" name="patID" value="<?php echo $ot_id;?>" id="OT_id"  readonly>
					<input class="form-control noerror" type="text" tabindex="-1"  name="is_ipd_patient" value="<?php
					if (isset($_GET['pat_id'])){echo $_GET['pat_id'];}else {echo "";}?>" id="is_ipd_patient"  hidden>
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
				  </div>
				</div>

				<div class="form-group row justify-content-center"><!--ID-->
				  <label for="regID" id="regID_label" class="col-2 col-form-label ">IPD/OPD ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text"  name="patient_id" value="<?php echo $patient_id?>" id="patient_id"  readonly>
				  </div>
				  <label for="UHID" id="UHID_label" class="col-2 col-form-label " style="/* display:none; */">UHID</label>
				  <div class="col-3" style="/* display:none; */">
					<input class="form-control noerror" type="text" tabindex="-1" name="UHID" value="" id="UHID"  readonly>
				  </div>
				</div>

				<div class="form-group row justify-content-center"><!--name-->
				  <label for="name" id="name" class="col-2 col-form-label required">Name</label>
				  <div class="col-8">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="name" name="first_name" value="" id="First-name-input"  readonly>
				  </div>
				</div>
        <div class="form-group row justify-content-center">
           <label for="address" class="col-2 col-form-label required">Select Surgery</label>
          	<div class="col-3">
               <button type="button" class="btn cancel" onclick="openForm()">Click here</button>
            </div>
					<label for="age_input" class="col-2 col-form-label required">Age</label>
					<div class="col-3">
						<input name="age_input" class="form-control noerror" tabindex="-1" type="text" value="" placeholder="Age" id="age_input" readonly>
					</div>
				</div>
      </div>
      <!-- This div is for multiple Surgery selection AJ -->

      <div>
       <div class=" text-center">
         <div class="form-popup border border-secondary" id="myForm">
            <br>
              <br>
                  <?php
                  $db = getDB();
                  $statement=$db->prepare("SELECT ID, surgery  FROM surgery_list;");
                  $statement->execute();
                  $results=$statement->fetchAll();
                  //$json=json_encode($results);
                  //return $json;
                  //$str = 'In My Cart : 11 12 items';
                  foreach($results as $row) {

                  echo "<input type='checkbox' value=". $row['ID'] . " name='surgery_name[]' id=" . $row['surgery'] . "/>" . $row['surgery'] . "<label for=" . $row['surgery'] . "></label>&nbsp &nbsp &nbsp";
                  }
                  $db=null;
                    ?>
               <br>
               <br>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

              <br>
              <br>

           </div>
         </div>
        </div>
        <br>
				<div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
				 <label for="address" class="col-2 col-form-label required">Address</label>
					<div class="col-3">
						<textarea class="form-control" id="address" tabindex="-1" placeholder="Enter address here" name="address" style="width: 100%; resize: none;" readonly></textarea>
					</div>
				  <label for="tel-input-staff" class="col-2 col-form-label required noerror">Contact No.</label><!--Contact no-->
				  <div class="col-3">
					<input class="form-control" type="text" value="" tabindex="-1" placeholder="contact no." name="tel-input-staff" id="tel-input-staff" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" readonly>
				  </div>
				</div>
				<!-------------------->
				<div class="">
				<div class="form-group row justify-content-center">
					<label class="col-2 col-form-label required" for="operating_surgeon" >Operating Surgeon :</label>
					<div class="col-3">
					<select name="operating_surgeon" class="form-control" id="operating_surgeon" style="height: 44px;" >
								<option value="" disabled selected> Select Operating Surgeon</option>
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
					<label class="col-2 col-form-label required" for="anaesthetist" >Anaesthetist :</label>
					<div class="col-3">
					<select name="anaesthetist" class="form-control" onchange="dropdown_sub_test(this.id,'sub_test_amount-0')" id="anaesthetist" style="height: 44px;" data-amount="500">
                                            <option value="" disabled selected> Select Anaesthetist</option>
                                            <?php
                                                $db = getDB();
                                                $statement=$db->prepare("SELECT ID,firstname,lastname FROM staff_ledger WHERE designation = 'Anaesthesia' OR designation = 'Anaesthetist' ;");
                                                $statement->execute();
                                                $results=$statement->fetchAll();
                                                foreach($results as $row) {
                                                    echo "<option value=" . $row['ID'] . ">" . $row['firstname'].' '.$row['lastname'] . "</option>";
                                                }
                                                $db=null;
                                            ?>
					</select>
					</div>
				</div>
				<div class="form-group row justify-content-center"><!--Date of birth--><!--Contact no-->
					<label class="col-2 col-form-label required" for="assisting_doctor" >Assisting Doctor/s :</label>
					<div class="col-3">
					<select name="assisting_doctor" class="form-control" id="assisting_doctor" style="height: 44px;" onclick='dropdown_sub(this.name,"sub_test-0")'  multiple>
								<option value="" disabled selected> Select Assisting Doctor/s</option>
				<?php
				$db = getDB();
				$statement=$db->prepare("SELECT ID,firstname,lastname FROM staff_ledger WHERE designation = 'Assisting Doctor';");
				$statement->execute();
				$results=$statement->fetchAll();
				foreach($results as $row) {
				echo "<option value=" . $row['ID'] . ">" . $row['firstname'].' '.$row['lastname'] . "</option>";
				}
				$db=null;
        ?>
					</select>
					</div>
					<label class="col-2 col-form-label required" for="assisting_nurse" >Assisting Nurse/s :</label>
					<div class="col-3">
						<select name="assisting_nurse"  class="form-control" id="assisting_nurse" style="height: 44px;" multiple>
								<option value="" disabled selected> Select Assisting Nurse/s</option>
								<?php
								$db =getDB();
								$statement =$db->prepare("SELECT ID,firstname,firstname FROM staff_ledger WHERE designation ='Assisting Nurse';");
								$statement->execute();
								$results=$statement->fetchAll();
								foreach ($results as $row) {
									echo "<option value=" . $row['ID'] .">".$row['firstname'].' '.$row['lastname'] . "</option>" ;
								}
								$db=null;
								?>
						</select>
					</div>
				</div>
				<div class="form-group row justify-content-center"><!--name-->
				  <label for="remark" class="col-2 col-form-label required">Remark</label>
				  <div class="col-8">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="Remark" name="remark" value="" id="remark"  >
				  </div>
				</div>
				</div>
				<div class="form-group row justify-content-center"><!--name-->

            <label class="col-2 col-form-label required" for="date_time" >Date/Time :</label>
  					<div class="col-3">
  						<div class="row">
  							<div class="col-6">
  								<input class="form-control" type="text" value="" name="ot_date" id="ot_date" placeholder="Date" autocomplete="off" maxlength="10"/>
  								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  							</div>
  							<div class="col-6">
  								<input class="form-control" type="time" value="" name="ot_time" id="ot_time" autocomplete="off" maxlength="10" style="font-size: 12px">
  							</div>
  						</div>
  				</div>
          <div class="col-5">
          </div>
				</div>
			<div class="row justify-content-center">
				<div class="col-md-2"><br>
					<input type="submit" class="btn btn-success " name="staff_registration" value="Submit" style="width:150px; "/>
				</div>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>


<script>
var date_input=$('input[name="ot_date"]'); //our date input has the name "date"
var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
var options={
  format: 'yyyy-mm-dd',
  container: container,
  todayHighlight: true,
  autoclose: true,
};
date_input.datepicker(options);

  document.getElementById("myForm").style.display = "none";
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

var counter=0;
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
///////////////////////validation///////////////////////
function validateForm(){

var test1 = document.getElementById("regID").value;
var test2 = document.getElementById("OT_id").value;
var test4 = document.getElementById("patient_id").value;
var test5 = document.getElementById("First-name-input").value;

///validation for surgery selection Aj///////
  var length_surgery = document.getElementsByName("surgery_name[]").length;
  test6=false;
  for (i = 0; i < length_surgery; i++) {
        var value_check =document.getElementsByName("surgery_name[]")[i].checked;
         if( value_check){
           test6=true;
           break;
         }
       }
/////////////////////////////////////////////////////////////////////////
//var test6 = document.getElementById("surgery_name").value;
var test7 = document.getElementById("age_input").value;
var test8 = document.getElementById("operating_surgeon").value;
var test9 = document.getElementById("anaesthetist").value;
var test10 = document.getElementById("assisting_doctor").value;
var test11 = document.getElementById("assisting_nurse").value;
var test12 = document.getElementById("ot_date").value;
var test13 = document.getElementById("ot_time").value;


if (test1 == "" ){
    swalError("First regID must be filled out");//alert
$("#regID").focus();
$("#regID").addClass('error').removeClass('noerror');
    return false;
}else if (test2 == ""){
    swalError(" OT_id field is required!");//alert
    $("#OT_id").focus();
    $("#OT_id").addClass('error').removeClass('noerror');
     return false;
}else if (test4 == "") {
    swalError("patient_id field is required!");//alert
$("#mtp_uhid_ID").focus();
$("#mtp_uhid_ID").addClass('error').removeClass('noerror');
    return false;
}else if (test5 == "" ) {
   swalError("Patient Name field is required!");//alert
$("#First-name-input").focus();
$("#First-name-input").addClass('error').removeClass('noerror');
    return false;
}else if (test6 == "" ) {
     swalError("Surgery Name field is required!");//alert
  $("#surgery_name").focus();
  $("#surgery_name").addClass('error').removeClass('noerror');
      return false;
}else if (test7 == "" ) {
         swalError("Age field required!");//alert
      $("#age_input").focus();
      $("#age_input").addClass('error').removeClass('noerror');
          return false;
}else if (test8 == "" ) {
        swalError("Operating Surgeon field is required!");//alert
        $("#mtp_address").focus();
        $("#mtp_address").addClass('error').removeClass('noerror');
                  return false;
}else if (test9 == "" ) {
    swalError("Anaesthetist No field is required!");//alert
    $("#operating_surgeon").focus();
    $("#operating_surgeon").addClass('error').removeClass('noerror');
      return false;
}else if (test10 == "" ) {
   swalError("Assisting Doctor field is required!");//alert
   $("#assisting_doctor").focus();
   $("#assisting_doctor").addClass('error').removeClass('noerror');
          return false;
}else if (test11 == "" ) {
    swalError("Assisting Nurse field is required!");//alert
    $("#assisting_nurse").focus();
    $("#assisting_nurse").addClass('error').removeClass('noerror');
      return false;
}
else if(test12=="" || test13==""){
   swalError("Date/Time Field is require!");
  $("#ot_date").focus();
  $("#ot_date").addClass('error').removeClass('noerror');
}else{ return true;}
}

//////////////////////////////////////////////////////






function parseJsonToForm(json){
		/* $('#First-name-input').val(json.firstname); */
		setSelectValue('regID', json.RegistrationID);

		//setSelectValue('patID', json.patientID);
		setSelectValue('First-name-input', json.FirstName+" "+ json.LastName);
		setSelectValue('tel-input-staff', json.Mobile);
		setSelectValue('UHID', json.UHID);

		setSelectValue('age_input', json.Age);
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
    var url = "addpatient_ot.php"; // the script where you handle the form input.
	//validateForm(event)

	var test=validateForm();
	if (test==true){				//alert("hello in if loop");
			$.ajax({
				   type: "POST",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {
             debugger;
						console.log("return Data is : "+data);
						if(data!="unsuccesful" && data !="" ){
							//swalSuccess(data);//alert
							swalSuccess("Successfully registered Patient for O.T");//alert
							//save_reciept(get_url)
							var patient_id = document.getElementById('patient_id').value;
							var regID = document.getElementById('regID').value;
              var ot_id=document.getElementById('OT_id').value;
              console.log(ot_id);
							//var test1 = document.forms["pat_update_form"]["sub_test-0"];
							var today = new Date();
							date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear()+' at '+ today.getHours() + ":" + today.getMinutes();
							var json = JSON.parse(data);
							console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
					send_sms.welcome_ot("welcome_ot",`${json[0].Mobile}`,`${json[0].FirstName} ${json[0].LastName}`,`${patient_id}`,`${json[0].date_surgery}`,`${json[0].time_surgery}`);

            ///for multiple surgery AJ ///////////////

            var length_surgery = document.getElementsByName("surgery_name[]").length;
            var surgery_name="";

            for (i = 0; i < length_surgery; i++) {
                  var value_check =document.getElementsByName("surgery_name[]")[i].checked;
                   if( value_check){
                   var Ans= document.getElementsByName("surgery_name[]")[i].value;
                   surgery_name += Ans.concat(",");
                 }
               }

             /////for passing the surgery value in url///////////////

                 var surgery_name_trim =surgery_name.substr(3);


             ///////////////////////////////////////////////////////

                        debugger;
                    var surgery_name_check = surgery_name.split(",");
                    var test=surgery_name_check[0]
                    var url_for_redirect="";
                    if(test == "41"){
                      url_for_redirect = `/add_delivery_details.php?ID=${regID}&pat_id=${patient_id}&opt_id=${ot_id}&surgery_ID=${surgery_name_trim}`;
                    }else if (test == "42") {
                        url_for_redirect = `/add_vt_details.php?ID=${regID}&pat_id=${patient_id}&opt_id=${ot_id}`;
                    }else if (test == "43") {
                         url_for_redirect = `/add_tl_details.php?ID=${regID}&pat_id=${patient_id}&opt_id=${ot_id}`;
                    }else if (test =="44") {
                        url_for_redirect = `/add_mtp_details.php?ID=${regID}&pat_id=${patient_id}&opt_id=${ot_id}`;
                    }else {
                          setTimeout(function(){location.reload();},3000);
                    }
                    setTimeout(function(){  window.location = url_for_redirect;},3000);



						//alert("this is ajax loop  " + data);
						//on success take form data and enter to any page you require be it IPD or OPD or Patho.

							//location.href = "/list_all_tests_registered_pathology.php#1b";
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
//document.getElementById("age-input").setAttribute("max", today);
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
