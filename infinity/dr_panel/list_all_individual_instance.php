<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(!$_GET['ID']){}else{$ID=$_GET['ID'];}
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
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
input:not([type='submit'],[type='button']), select, summary, textarea {

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
.break_word{
    white-space: pre-wrap;
    word-break: keep-all; /*this stops the word breaking*/
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'].'/nav_sidebar.php';?>
<div id="main">
<?php include $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
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
				
				  <label for="regID" id="regID_label" class="col-1 col-form-label ">Reg. ID <b style="color:red;">:</b></label>
				  <div class="col-3">
					<input class="form-control noerror" type="text" placeholder="regID" name="first_name" value=<?php echo $ID?> id="regID"  readonly>
				  </div>
				  <label for="tel-input" class="col-1 col-form-label  noerror" >Contact  <b style="color:red;">:</b> No. </label><!--Contact no-->
				  <div class="col-3">
					<input class="form-control" type="text" value="" placeholder="contact no." name="contact_staff" id="tel-input" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" readonly>
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
							<!--<th>Amount bill</th>-->
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
 $(document).ready(function () {
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
		   url: "/get_registered_patients_all_instances_with_out_reg_id.php",//from global_variable
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
				parseJsonToTable(json);
				//$value=$value+10;
		 }



        });
function parseJsonToform(json){
	//document.getElementById("tel-input").value=json.Mobile;
	setSelectValue("tel-input",json.Mobile);
	document.getElementById("header_1").innerHTML = ""+json.FirstName+"&nbsp" +json.LastName;
	var date = json.WhenEntered;
				var time = date.substring(12,20);
				var date = date.substring(0,11);
				var date= date.split("-").reverse().join("-");
				var date= date.split(" ").join("")
	document.getElementById("date_registered").innerHTML = "Date Registered :&nbsp" +date+ " on "+time;
	//setSelectValue("header_1",json.FirstName+json.LastName);
}
// setSelectValue (id, val) {}is in footer
function parseJsonToTable(json)
	{
		if(json!=""){	
		 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
				var update_url_dependency="#";
				var patient_type=json[i].patientID;
				var patient_type = patient_type.slice(0,3);
				if (patient_type=="PL0"){
					patient_type="Pathology";
					var button_text ="&nbspReport";
					var button_fa ="fas fa-edit 1x";
					var button_width="width:100px";
					}else{}
				if (patient_type=="OPD"){
					var discharge="N.A.";
					var update_url_dependency="<?php echo $update_patient_opd ;?>";
					var button_text ="Select";
					var button_fa="far fa-stethoscope fa-2";
					var button_width="width:100px";
					}else if(patient_type=="IPD"){
						var discharge=json[i].discharge_date_time;
						var discharge_time = discharge.substring(12,20);
						var discharge = discharge.substring(0,11);
						var discharge= discharge.split("-").reverse().join("-");
						var discharge= discharge.split(" ").join("");
						discharge = `Date : ${discharge} <br> Time : ${discharge_time}`;// discharge string 
						var update_url_dependency="<?php echo $update_patient_ipd ;?>";
						var button_text ="Select";
						var button_fa = "far fa-bed fa-2";
						var button_width="width:100px";
						}else{var discharge="N.A.";}
				var symptom_column=json[i].symptoms;
				symptom_column = symptom_column.split(/((?:\w+ ){5})/g).filter(Boolean).join("\n");
				var date =json[i].whenentered;
				var time = date.substring(12,20);
				var date = date.substring(0,11);
				var date= date.split("-").reverse().join("-");
				var date= date.split(" ").join("");
				var date_last_visit = json[0].whenentered;
				var time_last_visited = date_last_visit.substring(12,16);
				var date_last_visit = date_last_visit.substring(0,11);
				var date_last_visit= date_last_visit.split("-").reverse().join("/");
				var date_last_visit= date_last_visit.split(" ").join("");
				var department_latest = json[0].patientID;
				var department_latest = department_latest.substring(0,3);
				if (department_latest=="PL0"){department_latest="Pathology";}else{}
				//var department = json[i].patientID;
				//var department = department.substring(0,3);
				var charges =json[i].charges;
				if (charges==null||charges==""){charges="N.A.";}
		//		if()
	document.getElementById("last_visit").innerHTML = "Last visit on :&nbsp" +date_last_visit+", at "+time_last_visited+", in "+department_latest+" section, with patient ID : "+json[0].patientID;
				tr = $('<tr class="tbl_row" id="'+json[i].patientID+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].patientID+'" title="Click to update patient details/payment/scheduling/assigning Dr.">');
				tr.append("<td>" + json[i].patientID + "</td>");
				tr.append("<td> Date : " + date + " <br> Time : "+time+"</td>");
				tr.append("<td> "+discharge+"</td>");
				tr.append("<td><div class='symptom_cell break_word' style='width:200px;'>" +  get5Words(symptom_column) + "</div></td>");/* .substring(0,50) */
				tr.append("<td>" + patient_type + "</td>");
				/* tr.append("<td> ₹ " + charges + "</td>"); */
				tr.append('<td class=""><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal"  style="'+button_width+'" data-patho_scname="' +json[i].symptoms+ '"  data-uid=' + json[i].patientID + ' data-pat_type='+patient_type+' title="'+patient_type+' patient"><i class="'+button_fa+'" aria-hidden="true"></i> '+button_text+'</button></td>');
				$('#table_list_patients').append(tr);
			}
		}
		/********------<a href="patient_update.php?ID='+ json[i].patientID +'"></a>-----***********/
		else{
			tr = $('<tr class="tbl_row" id="Empty" onclick="#" data-pat_id=null>');
			tr.append ("<td colspan='7'><b>No Patient data entered</b></td>");
			$('#table_list_patients').append(tr);
		}
		////data table 
		$('#table_list_patients').DataTable({
				"order": [[ 1, "desc" ], [ 0, 'desc' ]],
				/* "order": [], */
				 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv',  */'excel', 'pdf', 'print'
					],
				  "info":     false,
				  "autoWidth": true,
				  "language": {
									searchPlaceholder: "Search records",
									search:""
								},
				  "oLanguage": {
								"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
								},
				  "columnDefs": [ {
									  "targets"  : 'no-sort',
									  "orderable": false,
									}],
				  //"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,{ "bSortable": false },],
					"pagingType":"simple_numbers",
					 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
			});
			$('div.dataTables_filter input').focus();
		///////////////////////////////////////
	}
 });
 
function showDetails(pat_id_row) {
	var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(pat_id_row);
	var Cells = Row.getElementsByTagName("td");
	//var ID= button.getAttribute("data-uid");
	//var ID="12";
	//alert(ID);
	// window.location="<?php echo $update_patient_opd;?>ID="+pat_type+"";
}	
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

/////////////print report
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
var url="/Reports/"+patho_scname+"REPORTS.php?ID="+ID;
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
	location.reload();
})
function get5Words(str) {
    str =  str.split(/\s+/).slice(0,7).join(" ");
	return str+"...";
}
</script>
<?php
$pageTitle = "list Patient's history HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
