<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(isset($_GET['ID'])){$ID=$_GET['ID'];}else{$ID="";}
if(isset($_GET['pat_id'])){$patient_id=$_GET['pat_id'];}else{$patient_id="";}
?>

<?php include './include/header.php';?>
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
							$statement=$db->prepare("SELECT MAX(`patientID`) FROM `patientopd`");
							$statement->execute();
							$results=$statement->fetchColumn();
							$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results, $matches);
							if (preg_match_all('!\d+!', $results, $matches)) {
								$matches = $matches[0][0]+1;
							}else{$matches = 1; }
							$patient_id= "OPD".str_pad($matches, 8, "0", STR_PAD_LEFT);

							$db=null;
							?>
<?php //include './nav_sidebar.php';?>
<?php //include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<?php //include $_SERVER['DOCUMENT_ROOT'].'/nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
<div class="container" id="reg-form-container" >

	<div class="card card-outline-info mb-3" style="margin-top:18px;">
	  <div class="card-block heading_bar">
		<h5>Add new OPD entry</h5>
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
							<h6>OPD Form</h6>
						</div>
					</div>
					<div class="row">
						<hr class="seperator" width="97%">
					</div>
				  </div>
			</div>
			<br>
			<!--pat_update_form-->
			<form method="post" action="" class="form " name="pat_opd_reg_form"  id="pat_opd_reg_form" enctype="multipart/form-data" style="">
				<div class="form-group row justify-content-center"><!--ID-->
				  <label for="regID" id="regID_label" class="col-2 col-form-label ">Reg. ID</label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="regID" value="<?php echo $ID?>" id="regID"  readonly>
				  </div>
				  <label for="patID" id="patID_label" class="col-2 col-form-label " style="/* display:none; */">Pat. ID</label>
				  <div class="col-3" style="/* display:none; */">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="patID" name="patID" value="<?php echo $patient_id ?>" id="patID"  readonly="true">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
				  </div>
				</div>

				<div class="form-group row justify-content-center"><!--name-->
				  <label for="name" id="name" class="col-2 col-form-label required">Name</label>
				  <div class="col-8">
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="name" name="first_name" value="" id="First-name-input"  readonly>
				  </div>
				</div>
				<div class="form-group row justify-content-center"><!--gender--><!--age-->
					<label class="col-2 col-form-label required" tabindex="-1" for="sex-input " > Sex </label>
					<div class="col-3">
						<input class="form-control" tabindex="-1" type="text" value="" name="gender" id="gender" autocomplete="off" readonly >
					</div>
					<label for="dob" class="col-2 col-form-label required">Age</label>
					<div class="col-3 ">
						<input name="dob" class="form-control noerror" tabindex="-1" type="text" value="" placeholder="Age" id="age-input" readonly>
					</div>
				</div>
				<div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
				 <label for="address-input" class="col-2 col-form-label required">Address</label>
					<div class="col-3">
						<textarea class="form-control" id="address" tabindex="-1" placeholder="Enter address here" name="address" style="width: 100%; resize: none;" readonly></textarea>
					</div>
				  <label for="tel-input-staff" class="col-2 col-form-label required noerror">Contact No.</label><!--Contact no-->
				  <div class="col-3">
					<input class="form-control" type="text" value="" tabindex="-1" placeholder="contact no." name="contact_staff" id="tel-input-staff" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" readonly>
				  </div>
				</div>
				<!-------------------->

				<div class="form-group row justify-content-center"><!--Date of birth--><!--Contact no-->
					<label class="col-2 col-form-label required" for="dr_assigned-0" >Consulting Dr. :</label>
					<div class="col-3">
						<select type="text" list="Dr.Name" name="dr_assigned-0" class="form-control" id="dr_assigned-0" style="height: 44px;" tabindex="0" oninput="dropdown_dr_price()">
							<option id="Dr.Name" disabled selected> Select option</option>
								<?php
								$db = getDB();
							$statement=$db->prepare("SELECT cdm.`Consultation_charges`,cdm.`firstname`,cdm.`lastname`,cdm.`ID` FROM `staff_ledger` AS cdm WHERE `IsActive`=1 AND `roleid`=2;");
							$statement->execute();
							$results=$statement->fetchAll();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							///wa in value (option) $row['ConsultingDoctorID']
							foreach($results as $row) {
								echo "<option value=" . $row['ID'] . " data-charges=" . $row['Consultation_charges'] . " data-dr_name='".$row['firstname']." ".$row['lastname']."'> Dr. " . $row['firstname'] . " ".$row['lastname']. "</option>";
							}
							$db=null;
								/* */?>
						</datalist>
						<select>
					</div>

                        <label for="mtp_address" class="col-2 col-form-label">Remark</label>
					            <div class="col-3">
						<textarea class="form-control" id="opd_remark" tabindex="-1" placeholder="Enter remark here" name="opd_remark" style="width: 100%; resize: none;" ></textarea>
					</div>


					</div>
          <div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
           <label for="UHID_number" class="col-2 col-form-label required">UHID</label>
            <div class="col-3">
              <input class="form-control" type="text" value="" tabindex="-1" placeholder="UHID" name="UHID_number" id="UHID_number" autocomplete="off"  readonly>
            </div>
            <label for="use_UHID" class="col-2 col-form-label required noerror">Use UHID</label><!--Contact no-->
            <div class="col-1">
            <input class="form-control" type="checkbox" value="yes" tabindex="0" name="use_UHID" id="use_UHID" >
            </div>
                                    <div class="col-2">

                                    </div>
          </div>
				</div>
				</div>
				<!------------------->
				<!------------------->
				<!------------------->
				<!------------------->
				<!------------------->
				<!------------------->
				<hr class="style3">
			<div class="row justify-content-center">
				<div class="col-md-8" style="padding:50px">
				</div>
				<div class="col-md-4" style="">
				<table id="Amount_table">
					<tr>
						<td>Total</td>
						<td>:</td>
						<td><span>₹</span></td>
						<td><input class="form-control noerror" type="number" placeholder=" 00.00" name="total" value="" id="total" maxlength="15"  tabindex="-1"></td><!--readonly-->
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
			</div>
			<div class="row justify-content-center">
				<div class="col-md-2">
					<input type="submit" class="btn btn-success " name="opd_registration" value="Submit" style="width:150px; "/>
				</div>
				<!--<div class="col-6">
				<center>
					<input type="button" class="btn btn-danger " id="reset_btn" onclick="resetform(pat_opd_reg_form)" name="staff_registration" value="Reset" style="width:50%;"/>
				</center>
				</div>-->
			</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script>
var counter=0;
/*----------------Form Fetch*************************/
var ID= "<?php echo $ID;?>";
var amount;
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
		setSelectValue('UHID_number', json.UHID);

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
$( "#pat_opd_reg_form" ).on( "submit", function( event ) {


	event.preventDefault();// avoid to execute the actual submit of the form.
	var formData = new FormData(this);
	console.log("Form data is : "+$(this).serialize());
	var get_url=$(this).serialize();
	//alert("hello world");


    var url = "addpatient_opd.php"; // the script where you handle the form input.
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
							swalSuccess("Out Patient entered successfully.");//alert
							patientid = document.getElementById('patID').value;
							var today = new Date();
							date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear()+' at '+ today.getHours() + ":" + today.getMinutes();
							save_reciept(get_url,data);
							var json = JSON.parse(data);
							console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
							send_sms.welcome_opd("welcome_opd",`${json[0].Mobile}`,`${json[0].FirstName} ${json[0].LastName}`,`${patientid}`,`${date}`);
						}else{
							swalError('Some error occured, please try again after some time.');
						}

						//alert("this is ajax loop  " + data);
						//on success take form data and enter to any page you require be it IPD or OPD or Patho.
						      location.href = "<?php echo BASE_URL; ?>list_all_patients_opd.php"

				   },
					cache: false,
					contentType: false,
					processData: false
				 });
			}else {}
});
function save_reciept(formData,data123){
							console.log("in save reciept ::: :: ::: "+formData);
							;//alert
							//swalSuccess("test_added");//alert
							$.ajax({
							   type: "GET",
							   url: "/invoice/set_invoice_opd.php",
							   data: formData,// serializes the form's elements.
							   success: function(trial)
							   {
									swalSuccess(trial);
									console.log("invoice"+ trial);
									swalSuccess(trial);
									//var json = JSON.parse(data);
									//parseJsonToForm(json);
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

/* function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      } */

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


function validateForm() {
    var patID = document.forms["pat_opd_reg_form"]["patID"].value;
    var dr_assigned = document.forms["pat_opd_reg_form"]["dr_assigned-0"].value;
    var advance = document.forms["pat_opd_reg_form"]["advance"].value;
    if (patID == "" ) {
        swalError("First patID must be filled out");//alert
		$("#patID").focus();
		$("#patID").addClass('error').removeClass('noerror');
        return false;
    }else if (dr_assigned == "" || dr_assigned==null || dr_assigned=="Select option") {
        swalError("First Dr. must be selected");//alert
		$("#dr_assigned-0").focus();
		$("#dr_assigned-0").addClass('error').removeClass('noerror');
        return false;
    }else if(advance==""){
		swal({
              title: "Error",
              text: "Advance amount is empty enter '0'",
              icon: "error",
              timer: 3000,
			  button : false
           });
		   console.log("the dr_is : "+dr_assigned);
		//setSelectValue('advance',"0.00")
		$("#advance").focus();
		$("#advance").addClass('error').removeClass('noerror');
		return false;
	}else{ return true;}
}



function dropdown_dr_price(){
	/* document.querySelector(parentselect).onchange = function(){
	   alert(this.selectedOptions[0].getAttribute('data-attr'));
	}; */
	var amount = $("#dr_assigned-0").find(':selected').attr('data-charges')
	//var dr_selected = " dr name"+$("#dr_assigned-0").val()+" vharges : "+amount;
	setValue("total",amount);
	update_price();

	//swalSuccess(dr_selected);
/* parentselect=`#${parentselect}`;
//childselect=`#${childselect}`;
	console.log(`value of ${parentselect}`);
	var amount=$(parentselect).find(':selected').attr('data-amount');
	console.log(`value of ${parentselect} :::::: amount is ${amount} :::: childselectvalue ${childselect}`);
	setValue(childselect,`${amount}`) */
	/* update_price();
	update_balance(); */
}


/* function dropdown_sub(parentselect,childselect){
$( "select[name='"+parentselect+"']" ).change(function () {
    var dr_assigned = $(this).val();


    if(dr_assigned) {
        $.ajax({

            url: "get_all_patho_sub_category_by_main_category.php",
            Type: 'GET',
            data: {'dr_ID':dr_assigned},
            success: function(data) {
                //add stuff to fetch dr consulting amount
			}
        });

    }else{
        $('select[name="'+childselect+'"]').empty();
		$('select[name="'+childselect+'"]').append('<option value="" disabled selected> Select test</option>');
    }
});
} */

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
$pageTitle = "Pathology patient registration HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
