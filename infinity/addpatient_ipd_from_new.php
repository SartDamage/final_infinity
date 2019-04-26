<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(isset($_GET['ID'])){$ID=$_GET['ID'];}else{$ID="";}
if(isset($_GET['pat_id'])){$patient_id=$_GET['pat_id'];}else{$patient_id="";}
?>
<?php include './include/header.php';?>
<style>
a{-webkit-transition:.25s all;transition:.25s all}.card{overflow:hidden;box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);-webkit-transition:.25s box-shadow;transition:.25s box-shadow}.card:focus,.card:hover{box-shadow:0 5px 11px 0 rgba(0,0,0,.18),0 4px 15px 0 rgba(0,0,0,.15)}.card-inverse .card-img-overlay{background-color:rgba(51,51,51,.85);border-color:rgba(51,51,51,.85)}.form .seperator,.seperator{border:0;border-bottom:1px dashed #b5babd}form{margin-bottom:5px}#ipd_display{display:none}.form-control{margin-bottom:.5rem!important;border:0;border-bottom:1px solid #868e96;border-radius:.1rem}.form-control:focus{color:#495057;background-color:#fff;border-color:#868e96;outline:0;box-shadow:1px 2px 8px .2rem #dae0e5}.form .button_login:active,.form .button_login:focus,.form .button_login:hover{box-shadow:3px 3px 3px .2rem #5C885C}.form .button_reset:active,.form .button_reset:focus,.form .button_reset:hover{box-shadow:3px 3px 3px .2rem #8c6361}.form .seperator{border:0;border-bottom:1px dashed #b5babd}.required{font-weight:700}.required:after{color:#e32;content:' *';display:inline}#profile_img{border-radius:50%;width:150px;height:150px;margin:auto}#fileToUpload,.wrapper{display:none}.error select{color:red}.noerror select{color:#9e9e9e}.error::-webkit-input-placeholder{color:red}.noerror::-webkit-input-placeholder{color:#9e9e9e}@media print{.section-to-print,.section-to-print *{visibility:visible}.section-to-print{position:absolute;left:0;top:0}}.hr_seperator{margin-right:9%;margin-left:9%}.form-group.row.last_row{width:-webkit-fill-available}input:not([type=submit]),select,summary,textarea{background-color:#fff0!important;border-radius:.25rem}hr.style3{border-top:1px dashed #8c8b8b}.MLC_div{display:none;}
</style>
<?php
							$db = getDB();
							$statement=$db->prepare("SELECT MAX(`patientID`) FROM `patientipd`");
							$statement->execute();
							$results=$statement->fetchColumn();
							$json=json_encode($results);
							/*//return $json;
							//$str = 'In My Cart : 11 12 items';*/
							preg_match_all('!\d+!', $results, $matches);
							if (preg_match_all('!\d+!', $results, $matches)) {
								$matches = $matches[0][0]+1;
							}else{$matches = 1; }
							$patient_id= "IPD".str_pad($matches, 8, "0", STR_PAD_LEFT);
							$db=null;
							?>
<?php /*//include './nav_sidebar.php';*/?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<?php /*/include $_SERVER['DOCUMENT_ROOT'].'/nav_sidebar.php';*/?>
<div id="main">
<?php include './nav_bartop.php';?>
<div class="container" id="reg-form-container" >
	<div class="card card-outline-info mb-3" style="margin-top:18px;">
	  <div class="card-block heading_bar">
		<h5>Add new IPD entry</h5>
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
							<h6>In patient entry Form</h6>
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
					<input class="form-control noerror" type="text" tabindex="-1" placeholder="patID" name="patID" value="<?php echo $patient_id ?>" id="patID"  readonly>
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
					<label class="col-2 col-form-label required" tabindex="-1" for="gender" > Sex </label>
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

				<div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
				 <label for="UHID_number" class="col-2 col-form-label required">UHID</label>
					<div class="col-3">
						<input class="form-control" type="text" value="" tabindex="-1" placeholder="contact no." name="UHID_number" id="UHID_number" autocomplete="off"  readonly>
					</div>
				  <label for="use_UHID" class="col-2 col-form-label required noerror">Use UHID</label><!--Contact no-->
				  <div class="col-1">
					<input class="form-control" type="checkbox" value="yes" tabindex="0" name="use_UHID" id="use_UHID" >
				  </div>
                                  <div class="col-2">

                                  </div>
				</div>

				<hr class="style3">
				<!-------------------->
				<div class="form-group row justify-content-left">
					<div class="col-1">
					</div>
					<div class="col-5">
						<div class="row" style="height:45px">
							<label for="MLC_check" class="col-5 col-form-label  required">Is Medico Legal Case ?</label>
							<div class="col-6" style="display:table-cell;vertical-align:middle;">
								<input id="MLC_check" name="MLC_check" type="checkbox" onchange="check_check(this);" tabindex="1">
								<input id='MLC_check_hidden' type='hidden' value='No' name='MLC_check_hidden'>
							</div>
						</div>
						<div class="row">
							<label for="MLC_station" class="col-5 col-form-label MLC_div required" >Police station informed</label>
							<div class="col-7 MLC_div" style="display:table-cell;vertical-align:middle;">
								<input class="form-control MLC_div" id="MLC_station" name="MLC_station" type="text" tabindex="3">
							</div>
						</div>
					</div>
					<div class="col-5 MLC_div" id="MLC_div">
						<div class="row">
							<label for="MLC_type" class="col-5 col-form-label MLC_div  required" >MLC type </label>
							<div class="col-7 MLC_div" style="display:table-cell;vertical-align:middle;">
								<input class="form-control MLC_div" id="MLC_type" name="MLC_type" type="text" tabindex="2">
							</div>
						</div>
						<div class="row" >
							<label for="MLC_place" class="col-5 col-form-label  required MLC_div" >Incident Place</label>
							<div class="col-7 MLC_div" style="display:table-cell;vertical-align:middle;">
								<input class="form-control MLC_div" id="MLC_place" name="MLC_place" type="text" tabindex="4">
							</div>
						</div>
					</div>
				</div>
				<!-------------------->
				<hr class="style3">
				<div class="form-group row justify-content-center"><!--Date of birth--><!--Contact no-->
					<label class="col-2 col-form-label required" for="department_select" >Department :</label>
					<div class="col-3">
						<select tabindex="5" name="department_select" class="form-control" id="department_select" style="height: 44px;" oninput="Select_doctor(this.value,this.options[this.selectedIndex].getAttribute('data-department_id'),'dr_assigned-0')" >
						<option id="Department" disabled selected> Select option</option>
						<?php
								$db = getDB();
							$statement=$db->prepare("SELECT d.`department_name`,d.`ID` FROM `department` AS d WHERE `IsActive`=1 order by d.`department_name` Asc");
							$statement->execute();
							$results=$statement->fetchAll();
							foreach($results as $row) {
								echo "<option value='" . $row['department_name'] . "' data-department_id='" . $row['ID'] . "' data-department_name='".$row['department_name']."'> " . $row['department_name'] . "</option>";
							}
							$db=null;
							?>
								</select>
					</div>
					<label class="col-2 col-form-label required" for="dr_assigned-0" >Duty Dr. :</label>
					<div class="col-3">
						<select name="dr_assigned-0" class="form-control" id="dr_assigned-0" style="height: 44px;" oninput="dropdown_dr_price()" tabindex="6">
							<option id="Dr.Name" disabled selected> Select option</option>
								<?php
								/* $db = getDB();
							$statement=$db->prepare("SELECT cdm.`ConsultingDoctorFees`,cdm.`ConsultingDoctorName`,cdm.`ConsultingDoctorID` FROM `consultingdoctormaster` AS cdm WHERE `IsActive`=1 order by cdm.`ConsultingDoctorName` asc");
							$statement->execute();
							$results=$statement->fetchAll();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							///wa in value (option) $row['ConsultingDoctorID']
							foreach($results as $row) {
								echo "<option value=" . $row['ConsultingDoctorName'] . " data-charges=" . $row['ConsultingDoctorFees'] . " data-dr_name=".$row['ConsultingDoctorName']."> Dr. " . $row['ConsultingDoctorName'] . "</option>";
							}
							$db=null; */
								/* */?>
								<?php
								/* $db = getDB();
							$statement=$db->prepare("SELECT st.`ID`,st.`firstname`,st.`lastname`,st.`designation`,st.`roleid` FROM `staff_ledger` AS st WHERE `IsActive`=1 order by st.`firstname` Asc");
							$statement->execute();
							$results=$statement->fetchAll();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							///wa in value (option) $row['ConsultingDoctorID']
							foreach($results as $row) {
								echo "<option value=" . $row['designation'] . " data-id=" . $row['ID'] . " data-dr_name='".$row['firstname']." ".$row['lastname']."'> Dr. ".$row['firstname']." ".$row['lastname']."</option>";
							}
							$db=null; */
								/* */?>
						<!--</datalist>-->
						</select>
					</div>
					<div class="col-5">
					</div>
				</div>
				<div class="form-group row justify-content-center">
					<div class="col-1">
					</div>
					<label class="col-2 col-form-label required small_font" for="bed_type_select" >Bed Type:</label>
					<div class="col-2">
						<select name="bed_type_select" class="form-control" id="bed_type_select" style="height: 44px;" tabindex="7" oninput="dropdown_sub(this.name,bed_number_ID,ward_no_select)">
							<option id="bet_type" disabled selected> Select Bed Type</option>
							<?php
							$db = getDB();
							$statement=$db->prepare("SELECT bt.`ID`,bt.`bed_type`,bt.`bed_charges` FROM `bed_type` AS bt WHERE `IsActive`=1;");
							$statement->execute();
							$results=$statement->fetchAll();
							/*//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							///wa in value (option) $row['ConsultingDoctorID']*/
							foreach($results as $row) {
								echo "<option value=".$row['ID']." data-charges=" . $row['bed_charges'] . " data-bed_type_no=".$row['ID'].">" . $row['bed_type'] . "</option>";
							}
							$db=null;
						/* */?>
						</select>
					</div>
					<!--<label class="col-2 col-form-label required small_font" for="dr_assigned-0" >Bed No:</label>-->
					<div class="col-3">
					<input type="text" id="ward_no_select_hidden" name="ward_no_select_hidden" hidden value="" />
						<select name="bed_number_ID" class="form-control" id="bed_number_ID" style="height: 44px;" tabindex="8" oninput="var sub_value=this.options[this.selectedIndex].getAttribute('data-ward_name');ward_ID=this.options[this.selectedIndex].getAttribute('data-ward_ID');bed_type_select_price(this.name,sub_value,ward_no_select,ward_ID);">
							<option id="bet_type" disabled selected> Select bed type first.</option>
						</select>
					</div>
					<!--<label class="col-2 col-form-label required small_font" for="ward_no_select" >Ward No:</label>-->
					<div class="col-3">
						<select name="ward_no_select" class="form-control" id="ward_no_select" style="height: 44px;background: #75af7700!important" tabindex="0" oninput="ward_no_select_price()" disabled>
							<option id="ward_no" disabled selected>Ward No.</option>
								<?php
								$db = getDB();
								$statement=$db->prepare("SELECT wd.`ID`,wd.`ward_name`,wd.`bed_count`,wd.`bed_available` FROM `ward_details` AS wd WHERE `IsActive`=1;");
								$statement->execute();
								$results=$statement->fetchAll();
								/*//$json=json_encode($results);
								//return $json;
								//$str = 'In My Cart : 11 12 items';
								///wa in value (option) $row['ConsultingDoctorID']*/
								foreach($results as $row) {
									if($row['bed_available']>0){
										echo "<option value='".$row['ward_name']."'>" . $row['ward_name'] . "</option>";
									}else{
										echo "<option >no select room type available in ".$row['ward_name']." ward</option>";
									}
								}
								$db=null;
							/* */?>
						</select>
					</div>
					<div class="col-1">
					</div>
				</div>
				<div class="form-group row justify-content-center">
					<div class="col-1">
					</div>
					<label class="col-2 col-form-label  small_font" for="referred_by" >Referred By:</label>
					<div class="col-3">
						<input type="text" tabindex="9" class="form-control" name="referred_by" id="referred_by"/>
					</div>
					<label class="col-2 col-form-label  small_font" for="case" >Case :</label>
					<div class="col-3">
						<input type="text" tabindex="10" class="form-control" id="case"  name="case"/>
					</div>
					<div class="col-1">
					</div>
				</div>
				<!------------------->
				<!------------------->
				<hr class="style3">
				<div class="row justify-content-center">
					<div class="col-md-2">
						<input type="submit" tabindex="11" class="btn btn-success " name="opd_registration" value="Submit" style="width:150px; "/>
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
	   data: 'ID='+ID+'',/* serializes the form's elements.*/
	   success: function(data)
	   {
			var json = JSON.parse(data);
			parseJsonToForm(json);
	   },
		cache: false,
		contentType: false,
		processData: false
	 });
});
function parseJsonToForm(json){
		setSelectValue('regID', json.RegID);
		setSelectValue('First-name-input', json.FirstName+" "+ json.LastName);
		setSelectValue('tel-input-staff', json.Mobile);
		setSelectValue('gender', json.Gender);
		setSelectValue('age-input', json.Age);
		setSelectValue('address', json.Address);
		setSelectValue('UHID_number', json.UHID);
}
	/*------------------------*/
/* setSelectValue (id, val) {}is in footer*/
function resetform(formID){
	$(formID).trigger("reset");
}
function toast(){
	swalSuccess("New user Created");
}
/* ajax form submission */
$( "form#pat_opd_reg_form" ).on( "submit", function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.
	var formData = new FormData(this);
	console.log("Form data is : "+$(this).serialize());
	patientid = document.getElementById('patID').value;
	var today = new Date();
	var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
	var get_url=$(this).serialize();
	/*//alert("hello world");
	//validateForm(event)*/
    var url = "addpatient_ipd.php"; // the script where you handle the form input.
	var test=validateForm(event);
	//var test=true;/**********************************remove this line after testing**************************/
	if (test=true){
			$.ajax({
				   type: "POST",
				   url: url,
				   data: formData, /* serializes the form's elements.*/
				   success: function(data)
				   {
						console.log("return Data is : "+data);
						if(data!="unsuccesful" && data!="" && data!='Patient already exists, Discharge before creating new in-patient'){
							swalSuccess("Patient Added Successfully");
							var json = JSON.parse(data);
							console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
							send_sms.welcome_ipd("welcome_ipd",`${json[0].Mobile}`,`${json[0].FirstName} ${json[0].LastName}`,`${patientid}`,`${date}`);
							//resetform(pat_opd_reg_form);
							setTimeout(function(){window.location.href = "/list_all_patients_ipd.php";},1000);
							//window.location.href("/index.php");
						}else{swalError(data);}
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
			}else {}
});
/* form submission end here  */
function validateForm() {
    var patID = document.forms["pat_opd_reg_form"]["patID"].value;
    var dr_assigned = document.forms["pat_opd_reg_form"]["dr_assigned-0"].value;
    //var advance = document.forms["pat_opd_reg_form"]["advance"].value;
	var MLC_check_hidden = document.forms["pat_opd_reg_form"]["MLC_check_hidden"].value;
    var department = document.forms["pat_opd_reg_form"]["department_select"].value;
    var ward_no_hidden = document.forms["pat_opd_reg_form"]["ward_no_select_hidden"].value;
    var bed_type = document.forms["pat_opd_reg_form"]["bed_type_select"].value;

	var MLC_type = document.forms["pat_opd_reg_form"]["MLC_type"].value;
	var MLC_station = document.forms["pat_opd_reg_form"]["MLC_station"].value;
	var MLC_place = document.forms["pat_opd_reg_form"]["MLC_place"].value;
    if (patID == "" ) {
        swalError("First patID must be filled out");/*alert*/
		$("#patID").focus();
		$("#patID").addClass('error').removeClass('noerror');
        return false;
    }else if (department == "" || department==null || department=="Select option") {
        swalError("Department must be selected");/*alert*/
		$("#department_select").focus();
		$("#department_select").addClass('error').removeClass('noerror');
        return false;
    }else if (dr_assigned == "" || dr_assigned==null || dr_assigned=="Select option") {
        swalError("First Dr. must be selected");/*alert*/
		$("#dr_assigned-0").focus();
		$("#dr_assigned-0").addClass('error').removeClass('noerror');
        return false;
    }else if (bed_type == "" || bed_type==null || bed_type=="Select Bed Type") {
        swalError(" bed type must be selected");/*alert*/
		$("#bed_type_select").focus();
		$("#bed_type_select").addClass('error').removeClass('noerror');
        return false;
    }else if (ward_no_hidden == "" || ward_no_hidden==null || ward_no_hidden=="Select option") {
        swalError(" bed number must be selected");/*alert*/
		$("#bed_number_ID").focus();
		$("#bed_number_ID").addClass('error').removeClass('noerror');
        return false;
    }else if(MLC_check_hidden=="yes"){
		if(MLC_station == "" || MLC_station ==null ){
			swalError("Enter MLC type");/*alert*/
			$("#MLC_type").focus();
			$("#MLC_type").addClass('error').removeClass('noerror');
			return false;
		}else if(MLC_station == "" || MLC_station == null){
			swalError("Enter MLC station complaint registered");/*alert*/
			$("#MLC_station").focus();
			$("#MLC_station").addClass('error').removeClass('noerror');
			 return false;
		}else if(MLC_place == "" || MLC_place == null){
			swalError("Enter MLC Place complaint Occured");/*alert*/
			$("#MLC_place").focus();
			$("#MLC_place").addClass('error').removeClass('noerror');
			 return false;
		}else { return true;}
	}else{return true;}
}
function dropdown_dr_price(){}
/* function dropdown_sub(parentselect,childselect){
$( "select[name='"+parentselect+"']" ).change(function () {
    var dr_assigned = $(this).val();
    if(dr_assigned) {
        $.ajax({
            url: "get_all_patho_sub_category_by_main_category.php",
            Type: 'GET',
            data: {'dr_ID':dr_assigned},
            success: function(data) {
                /*add stuff to fetch dr consulting amount @/
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
	/*test.data("Value",`${val}` );*/
	console.log("ID is : EOL'"+id+"' ::: value is : EOL "+val);
	/*document.getElementById(id).value=val;*/
}
function dropdown_sub(parentselect,childselect,child_ward_2){
$( "select[name='"+parentselect+"']" ).change(function () {
    var main_test_name = $(this).val();
	console.log('bed_type '+main_test_name);
    if(main_test_name) {
		console.log("data from dropdown_sub parent : "+parentselect+" :: child : "+childselect);
		var someNumbers = [];
        $.ajax({
            url: "get_all_available_beds_in_selected_type.php",
            Type: 'GET',
            data: {'dr_ID':main_test_name},
            success: function(data) {
                $(childselect).empty();
                $(child_ward_2).empty();
				$(childselect).append('<option value="" disabled selected> Select Bed no.</option>');
				$(child_ward_2).append('<option value="" disabled selected>Ward No</option>');
				var json = JSON.parse(data);
				console.log("data from  :: data : "+data);
				if (json.length==0){
					$(childselect).empty();
					$(child_ward_2).empty();
					$(childselect).append('<option value="" disabled selected> No Bed available</option>');
					$(child_ward_2).append('<option value="" disabled selected>No Ward available</option>');
				}else{
					for (var i = 0; i < json.length; i++) {
						$(childselect).append('<option  data-charges="'+json[i].charges+'" data-ward_ID="'+json[i].ward_id+'" data-ward_name="'+json[i].ward_name+'" value="'+json[i].ID+'">'+json[i].bed_name+'</option>');
						var select_option_value = '<option  data-charges="'+json[i].charges+'"  value="'+json[i].ward_name+'">'+json[i].ward_name+'</option>';
						someNumbers.push(select_option_value);
						/*$(child_ward_2).append('<option  data-charges="'+json[i].charges+'" value="'+json[i].ID+'">'+json[i].ward_name+'</option>');*/
					}
				someNumbers = $.unique(someNumbers);
				for (var i = 0; i < someNumbers.length; i++) {
				$(child_ward_2).append(someNumbers[i]);
				}
				}
			}
        });
    }else{
        $('select[name="'+childselect+'"]').empty();
		$('select[name="'+childselect+'"]').append('<option value="" disabled selected> Select test</option>');
        $('select[name="'+child_ward_2+'"]').empty();
		$('select[name="'+child_ward_2+'"]').append('<option value="" disabled selected> Select test</option>');
    }
});
}
function Select_doctor (department_name_value,department_id,child_id){
	if(department_name_value) {
		console.log("data from dropdown_sub value : "+department_name_value+" :: child : "+child_id);
		var someNumbers = [];
		child_id = `#${child_id}`
        $.ajax({
            url: "get_all_doctors_by_designation.php",
            Type: 'GET',
            data: {'designation_get':department_name_value},
            success: function(data) {
                $(child_id).empty();
				$(child_id).append('<option value="" disabled selected>Select Dr.</option>');
				var json = JSON.parse(data);
				console.log("data from  :: data : "+data);
				if (json.length==0){
					$(child_id).empty();
					$(child_id).append('<option value="" disabled selected>No Dr. found</option>');
				}
				for (var i = 0; i < json.length; i++) {
				$(child_id).append("<option value='"+json[i].ID+"' data-designation='"+json[i].designation+"' data-dr_name='"+json[i].name+"'> Dr. "+json[i].name+"</option>");
				}
			}
        });
    }else{
        $(child_id).empty();
		$(child_id).append('<option value="" disabled selected>No Department Dr. found</option>');
    }
}
function check_check(event){
	if( event.checked){
		//alert("checked");
		$('.MLC_div').css("display","block");
			document.getElementById('MLC_check_hidden').value = "yes";
		}else if(!event.checked){
			//alert("unchecked");
			$('.MLC_div').css("display","none");
			document.getElementById('MLC_check_hidden').value = "no";
			}
}
function bed_type_select_price(name,value,child_name,ward_ID){
	console.log("name : "+name);
	console.log("value : "+value);
	$(child_name).val(value);
	setSelectValue('ward_no_select_hidden', ward_ID);
}
</script>
<?php
$pageTitle = "In Patient registration HMS"; /* Call this in your pages' files to define the page title*/
$pageContents = ob_get_contents (); /* Get all the page's HTML into a string*/
ob_end_clean (); /* Wipe the buffer*/
/* Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML*/
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>
<?php include './include/footer.php';?>
