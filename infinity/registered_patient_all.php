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
input:not([type='submit']), select, summary, textarea {

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

.float{}
.my-float{}
</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
	<div class="container" id="reg-form-container" style="padding-left:50px;margin-top:15px;">
<br>

			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5><!--List of all Patients--> <!--title--></h5>
				<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
			  </div>
			</div>
		<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
			<div class="card-block" id="print">
				<div class="form-header-group ">
					<div class="header-text httal htvam">
						<h5 id="header_1" class="form-header " data-component="header">
						  Patient's Name
						</h5>
					</div>
					<div>
					<br>
					<br>
						<p id="date_registered" class="" style="margin-top: -3%;">Date Registered : </p>
					<br>
					<p id="last_visit"	class="" style="margin-top: -4%"></p>
					</div>
				</div>
				<hr class="seperator">
				<br>
				<br>
				<div class="form-group row justify-content-center"><!--name-->
	        <label for="regID" id="regID_label" class="col-1 col-form-label ">UHID<b style="color:red;">:</b></label>
          <div class="col-3">
					<input class="form-control noerror" type="text" placeholder="" name="UHID" value="" id="UHID"  readonly>
				  </div>

				  <label for="regID" id="regID_label" class="col-1 col-form-label ">Reg. ID <b style="color:red;">:</b></label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" placeholder="regID" name="first_name" value=<?php echo $ID?> id="regID"  readonly>
				  </div>
				  <label for="tel-input" class="col-1 col-form-label  noerror" >Contact  <b style="color:red;">:</b> No. </label><!--Contact no-->
				  <div class="col-3">
          <input  type="text" name="image_Doc" id="image_Doc" value="" hidden/>
        	<input class="form-control" type="text" value="" placeholder="contact no." name="contact_staff" id="tel-input" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" readonly>
				  </div>
				</div>
        <div class="form-group row justify-content-center"><!--name-->
          Click Here For Document
          <div class="col-3">
          <button type="button" class="btn btn-success" id="view_doc" name="view_doc" onclick="getMyImage();">View </button>
        </div>
      </div>
				<br>
				<hr class="seperator">
				<br>
				 <table class="table table-hover table-striped" id="table_list_patients">
					<thead class="thead-teal">
						<tr class="head_row">
							<th>Patient ID</th>
							<th>Admit Date</th>
							<th>Discharge &nbsp;&nbsp; <br> Date </th>
							<th>Case</th>
							<th>Department</th>
							<th>Amount bill</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
				</table>



			</div>
		</div>
	</div>
</div>
<!----------------------------------------------------------->
	<div class="modal fade" id="myModal_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
		<div class="modal-dialog modal-lg modal_for_report" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				</div>
			<!--<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Send message</button>-->
			</div>
		</div>
	</div>
</div>
<!----------------------------------------------------------->
<script>
var $value="<?php echo $ID?>";

////////////////////////////for getting image Aj////////////////////////
function getMyImage(){
  var nameofimage = document.getElementById('image_Doc').value;
  var win=window.open("upload/patient_doc/"+nameofimage,'_blank');
    win.focus();
}

$.ajax({
			   type: "GET",
			   url: <?php echo $get_patient_detail_by_regID; ?>,//from global_variable
			   data: {ID: $value},
			   success: function(data)
			   {
					var json = JSON.parse(data);
					//alert(json);
					//alert("hello in ajax success loop");
				  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
				  //location.href = "./home.php"
						//var json = data;
					//	console.log(json);
					parseJsonToform(json);
					//alert(data);
					//$value=$value+10;
			 }



        });



	// the script where you handle the table input.
	$.ajax({
		   type: "GET",
		   url: <?php echo $get_registrered_patients_all_instance; ?>,//from global_variable
		   data: {ID: $value}, //serializes the form's elements.
		   success: function(data)
		   {
				var json = JSON.parse(data);
				//alert(json);
				//alert("hello in ajax success loop");
			  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
			  //location.href = "./home.php"
					//var json = data;
				//	console.log(json);
				parseJsonToTable_registered_instance(json);
				//$value=$value+10;
		 }



        });
function parseJsonToform(json){
	//document.getElementById("tel-input").value=json.Mobile;
  debugger;
	setSelectValue("tel-input",json.Mobile);
  setSelectValue("UHID", json.UHID);
  setSelectValue("image_Doc",json.avatar1);
	document.getElementById("header_1").innerHTML = ""+json.FirstName+"&nbsp" +json.LastName;
	var date = json.WhenEntered;
				var time = date.substring(11,20);
				var date = date.substring(0,11);
				var date= date.split("-").reverse().join("-");
				var date= date.split(" ").join("")
	document.getElementById("date_registered").innerHTML = "Date Registered :&nbsp" +date+ " on "+time;
	//setSelectValue("header_1",json.FirstName+json.LastName);
}
// setSelectValue (id, val) {}is in footer



/*function showDetails(pat_id_row) {
	var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(pat_id_row);
	var Cells = Row.getElementsByTagName("td");
	//var ID= button.getAttribute("data-uid");
	//var ID="12";
	//alert(ID);
	window.location="<?php// echo $update_patient_opd;?>ID="+pat_type+"";
}*/
/* function clickedbutton(button){
	var ID= button.getAttribute("data-uid");
	var patient_type= button.getAttribute("data-pat_type");
	if(patient_type=="OPD"){
		window.location="./OPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="IPD"){
		window.location="./IPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="Pathology"){
		window.location="./IPD_patient_detail_printable.php?ID="+ID;
	}
		if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
} */
function clickedbutton(button){
	var ID= button.getAttribute("data-uid");
	var patient_type= button.getAttribute("data-pat_type");
	if(patient_type=="OPD"){
		window.location="/OPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="IPD"){
		window.location="/IPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="Pathology"){
		var patho_scname= button.getAttribute("data-patho_scname");
		//window.location="/IPD_patient_detail_printable.php?ID="+ID;
		view_report(patho_scname,ID)
	}
		if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
}
function view_report(patho_scname,ID){
/* patho_scname= patho_scname.replace(/[&\/\\#,+.()$~%--'":*?<>{}]+/g, "_");
patho_scnamerevised=patho_scname.replace(/[\s]+/g, ""); */
patho_scname= patho_scname.replace(/[\s]+/g, "");
patho_scname= patho_scname.replace(/[\+\/]+/g, "_");
patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.\-'":*?<>{}\s]+/g, "");
//var ID="12";
console.log("ID : "+ID);
console.log("patho_mcid : "+patho_scname);
console.log("patho_scnamerevised : "+patho_scname);
//window.location="./update_patient_form.php?ID="+ID+"";
/* for bubble propogation */
var url="/Reports/"+patho_scname+"REPORT.php?ID="+ID;
console.log(url);
//var win = window.open(url, '_blank');
$("#myModal_report").modal('show');
$('.modal-body').load(url,function(){

});
//win.focus();
if (!e) var e = window.event;
e.cancelBubble = true;
if (e.stopPropagation) e.stopPropagation();
/* end stopping bubble propogation */
}

$('#myModal_report').on('hidden.bs.modal', function (e) {
	// do something...
	 $(".modal-body").html("");
	location.reload();
})
function get5Words(str) {
    if (str != ("" || null))str =  str.split(/\s+/).slice(0,7).join(" ");
	//return str+"...";
}
</script>
<?php
$pageTitle = "list Patient's history HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
