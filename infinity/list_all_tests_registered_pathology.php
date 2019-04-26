<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
// $db = getDB();
// $statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc ");
// $statement->execute();
// $results=$statement->fetchAll(PDO::FETCH_ASSOC);
// $data_for_search=json_encode($results);
// return $json;
// $db=null;

//echo $json;
//$db=null;
?>
<style>
.modal-backdrop.fade.show {
    opacity: 1;
}
.fade {
    transition: opacity .15s cubic-bezier(0.65, 0.05, 0.36, 1);
}
#myModal_report{
	padding:0px!important;
}
.modal_for_report{
	margin:auto!important;
	width: 83%!important;
}
.close_modal{
	padding-top: 11px!important;
	padding-bottom: 13px;
	padding-right:13px;
}

</style>
<?php include './include/header.php';?>

<!--style was in line-->
 <link href="/dist/css/style_in_list_all_test_registered_pathology.css" rel="stylesheet">
<?php //include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<body style="/* background-color:#E0F2F1; */">
<div id="main">
	<?php include './nav_bartop.php';?>
	<div class="container">
		<br>
		
		<div class="card card-outline-info mb-3">
			<div class="card-block heading_bar">
			<h5>List of all pathology patients</h5>
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
			<i class="fas fa-times my-float"></i>
		</a>
			</div>
		</div>
		<div class="card card-outline-info mb-3">
		  <div class="card-block heading_bar">
			<div class="container">
				<div class="row justify-content-md-center patients_button">
					<a class="btn btn-outline-success mar-l-10" href="/addpatientform_pathology_parent.php">Add new patient</a>
					<a class="btn btn-outline-teal mar-l-10" href="/list_all_patients_patho.php">Add from existing patient</a>
				</div>
			</div>
		  </div>
		</div>

		<!--<div class="card card-outline-info mb-3">
		<div class="card-block">
		<form role="form">
		<div class="form-group">
		<input type="input" class="input-lg" id="txt-search" placeholder="Search Patients by Name/Registration ID/Number">
		</div>
		</form>
		<div id="filter-records"></div>
		</div>
		</div>-->
		<div class="card card-outline-info mb-3 margin_bot_8">
			<div class="card-block">
				<div id="exTab3" class="">
					<ul class="nav nav-pills">
					<li class="nav-item">
					<a class="nav-link active" href="#1b" data-tab="1b" data-toggle="tab">Pending reports</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#2b" data-tab="2b" data-toggle="tab" id="generate">Generated reports</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#3b" data-tab="3b" data-toggle="tab">Submitted reports</a>
					</li>
					<!--<li class="nav-item">
					<a class="nav-link " href="#4b" data-tab="4b" data-toggle="tab">All reports</a>
					</li>-->
					</ul>
					<div class="tab-content clearfix">
						<div class="tab-pane border border-teal active" id="1b">
						<br>
							<table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							</table>
						</div>
						<div class="tab-pane border border-teal" id="2b">
							<br>
						<!--<h3>Reports generated and payment may or may not be done print not taken.</h3>-->
							<table id="myTable_generated_reports" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							<!--<thead class="thead-teal">
							<tr class="head_row">
							<th>Patient ID&nbsp;</th>
							<th>Date&nbsp;</th>
							<th class="no-sort">Detail's</th>
							<th>Category&nbsp;&nbsp;&nbsp;</th>
							<th>Test<br> name&nbsp;&nbsp;&nbsp;</th>
							<th class="no-sort">Payment</th>
							<th class="no-sort">Action</th>
							</tr>
							</thead>
							<tbody>
							</tbody>-->
							</table>
						</div>
						<div class="tab-pane border border-teal" id="3b">
							<br>
							<table id="myTable_printed_report" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							</table>
						</div>
						<!--<div class="tab-pane border border-teal" id="4b">
							<h3>will contain all reports irrespective of time,payment.</h3>
						</div>-->
					</div>
				</div>
			<!------------------------------------------------------------------------------->
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
var $value=0;
 $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#exTab3 a[href="' + activeTab + '"]').tab('show');
    }
window.addEventListener('DOMContentLoaded', function() {
	//$('#myTable_filter input').focus();

	//$('div#myTable_filter input[1]').addClass('search_2_table');
	//$('div#myTable_filter input[3]').addClass('search_3_table');
console.log('window - DOMContentLoaded - capture'); // 1st

/* $('.modal').modal({
dismissible: true
}); */
// list all new tests patients
$.ajax({
type: "POST",
url: <?php echo $url_get_all_tests_registered_pathology; ?>,//from global_variable
data: {start: $value}, // serializes the form's elements. */
success: function(data)
{
var json = JSON.parse(data);
//alert(data);
//alert("hello in ajax success loop");
//on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
//location.href = "./home.php"
//var json = data;
console.log("data 1"+json);
parseJsonToTable_report(json,"#myTable","table_tab_1");
}
});
},true);
//list all generated report
$.ajax({
	type: "POST",
	url: <?php echo $url_get_all_tests_registered_pathology_report_generated; ?>,//from global_variable
	data: {start: $value}, // serializes the form's elements. */
	success: function(data){
		var json = JSON.parse(data);
		console.log("data 2 "+json);
		parseJsonToTable_report_generated(json,"#myTable_generated_reports","table_tab_2");
	}
});
// list all with report printed
$.ajax({
	type: "POST",
	url: <?php echo $url_get_all_tests_registered_pathology_report_printed; ?>,//from global_variable
	data: {start: $value}, // serializes the form's elements. */
	success: function(data)
	{
		var json = JSON.parse(data);
		console.log("data 3 "+json);
		parseJsonToTable_report_generated(json,"#myTable_printed_report","table_tab_3");
	}
});
function parseJsonToTable_report(json,myTable,table_list){
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th>Patho. ID&nbsp;</th><th>Date&nbsp;</th><th class="no-sort">Details</th><th>Category, Test name&nbsp;&nbsp;&nbsp;</th><th class="no-sort"><center>Action</center></th></tr></thead><tbody>')
	$(myTable).append(trbl);
	for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
		/* if(json[i].PreFix=="OPD")
		{var show= "IPD"}
		else if(json[i].PreFix=="IPD"){ var show="OPD"}
		else{var show="IPD/OPD"} */
		var test_category=json[i].PathologyCategoryName;
		var test_name=json[i].PathologySubCategoryName;
		var paid=json[i].payment;
		var checkpaid=json[i].payment;
		if (paid=="2") paid='<i class="far fa-check" aria-hidden="true" style="color:green"></i> Done';
		else if(paid=="1")paid='<i class="fas fa-times" aria-hidden="true" style="color:orange"></i>Partially-Paid';
		else if(paid=="0") paid='<i class="fas fa-times" aria-hidden="true" style="color:red"></i>Un-Paid';
		else {paid='<i class="fas fa-times" aria-hidden="true" style="color:red"></i>Un-Paid';}
		var date = json[i].WhenEntered;
		var time = json[i].WhenEntered;
		var date = date.substring(0,11);
		var date= date.split("-").reverse().join("-");
		var time = time.substring(11,16);
		var department =json[i].PatientId;
		var department = department.substring(0,3);
		if(department=="PL0")department="Guest";else if(department=="PL1")department="Guest";else;
		var name=json[i].FirstName +"  "+ json[i].LastName;/*onclick="showDetails(this.id)"*/
		tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'"  data-pat_id="'+json[i].PatientId+'" title="Click to view '+ name +'\'s records">');
		tr.append("<td>" + json[i].PatientId + "</td>");
		tr.append("<td><div class='row_intable'>Date : " + date + "</div><div class='row_intable'>Time :"+time+"</td>");
		/* 					tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>"); */
		tr.append("<td><div class='table_div'><div class='row intable'> <b>Name</b> : " + name+ "</div><div class='row intable'><b>Department</b> : " + department + "</div><div class='row intable'><b>Contact </b>: " + json[i].Mobile + "</div></div></td>");
		tr.append("<td>" + test_category +", "+ test_name+ "</td>");
		//tr.append("<td >" + test_name + "</td>");
		//tr.append("<td>"+paid+"</td>");
		tr.append('<td class=""><center><button type="button" onclick="clickedbutton(this)"  class="btn btn-outline-teal btn-patho-generate" style="width:100px"  data-uid=' + json[i].PatientId + ' title="Generate '+name+'\'s Test report" data-patho_scid="'+json[i].PathologySubCategoryID+'" data-patho_scname="'+test_name+'" data-patho_mcid="'+json[i].PathologyCategoryID+'" data-patho_mcname="'+test_category+'"><i class="fas fa-edit 1x" aria-hidden="true" ></i> Report</button></center></td>');
		$(myTable).append(tr);
		/* $('#myTable').DataTable(); */
/*fa fa-pencil-square-o */
}
$(myTable).DataTable({
"order": [/*[  1, "desc" ], */ [ 0, 'desc' ]],
 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				"buttons": [
					/* 'csv', */ 'excel',/*  'pdf', */ 'print'
				],
				"info":     false,
				"autoWidth": false,
				"language": {
				searchPlaceholder: "Search records",
				search:""
				},
				"oLanguage": {
				"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
				},
				/* "autoWidth": true, */
				/*    "columnDefs": [{ "width": "20%", "targets": 0 },{ "width": "10%", "targets": 4 },{ "width": "5%", "targets": 3 },{ "width": "5%", "targets": 1 },{ "width": "5%", "targets": 5 },{ "width": "10%", "targets": 6 }], */
				"columnDefs": [ {
				"targets"  : 'no-sort',
				"orderable": false,
				}/* ,{ "width": "15%", "targets": 0 },{ "width": "13%", "targets": 4 },{ "width": "18%", "targets": 3 },{ "width": "10%", "targets": 1 },{ "width": "10%", "targets": 5 },{ "width": "6%", "targets": 6 } */],
				/* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
				"pagingType":"simple_numbers",
				"lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]],
				"responsive":true
				
				
});	var activeTab = localStorage.getItem('activeTab');
	if(activeTab=="#1b"){
	$('div#myTable_filter input').focus();}
	else if(activeTab=="#2b"){$('div#myTable_generated_reports_filter input').focus();} 
	else if(activeTab=="#3b"){$('div#myTable_printed_report_filter input').focus();}
	
}


function parseJsonToTable_report_generated(json,myTable,table_list){
	if (table_list=="table_tab_3"){
		trbl=$('<thead class="thead-teal"><tr class="head_row"><th>Patho. ID&nbsp;</th><th>Report</th><th class="no-sort">Details</th><th>Category, Test name&nbsp;&nbsp;&nbsp;</th><th class="no-sort"><center>Action<center></th></tr></thead><tbody>')
	}else{
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th>Patho. ID&nbsp;</th><th>Report</th><th class="no-sort">Details</th><th>Category, Test name&nbsp;&nbsp;&nbsp;</th><th class="no-sort">Payment</th><th class="no-sort">Action</th></tr></thead><tbody>')
	}
	$(myTable).append(trbl);
	for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
		/* if(json[i].PreFix=="OPD")
		{var show= "IPD"}
		else if(json[i].PreFix=="IPD"){ var show="OPD"}
		else{var show="IPD/OPD"} */
		var test_category=json[i].PathologyCategoryName;
		var test_name=json[i].PathologySubCategoryName;
		//var paid=json[i].payment;
		var checkpaid=json[i].payment;
		//alert(paid);
		var paid=json[i].payment;
		if (paid=="2") paid='<i class="fas fa-check" aria-hidden="true" style="color:green"></i> Done';else if(paid=="1")paid='<i class="fas fa-times" aria-hidden="true" style="color:blue"></i>Part-Paid';else if (paid=="0")paid='<i class="fas fa-times" aria-hidden="true" style="color:red"></i>Un-Paid';else {paid='<i class="fas fa-times" aria-hidden="true" style="color:red"></i>Un-Paid';}
		var date = json[i].LastModified;
		var time = json[i].LastModified;
		if(date==null || date==""){date = "N.A."}else{var date = date.substring(0,11);}
		if(time==null || time==""){time = "N.A."}else{var time = time.substring(11,16);}
		var date= date.split("-").reverse().join("-").replace(" ","");
		//var time = time.substring(11,16);
		var department =json[i].PatientId;
		var department = department.substring(0,3);
		if(department=="PL0")department="Guest";else if(department=="PL1")department="Guest";else;
		var name=json[i].FirstName +"  "+ json[i].LastName;/*onclick="showDetails(this.id)"*/
		tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'"  data-pat_id="'+json[i].PatientId+'" title="Click to view '+ name +'\'s records">');
		tr.append("<td>" + json[i].PatientId + "</td>");
		tr.append("<td><div class='row_intable'>Date : " + date + "</div><div class='row_intable'>Time :"+time+"</td>");
		/* 					tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>"); */
		tr.append("<td><div class='table_div'><div class='row intable'> <b>Name</b> : " + name+ "</div><div class='row intable'><b>Department</b> : " + department + "</div><div class='row intable'><b>Contact </b>: " + json[i].Mobile + "</div></div></td>");
		tr.append("<td>" + test_category + ", " + test_name + "</td>");
		//tr.append("<td >" + test_name + "</td>");
		if (table_list=="table_tab_3"){}else{
			tr.append("<td>"+paid+"</td>");
			}
		tr.append('<td class=""><center><button type="button" onclick="clickedbutton(this)"  class="btn btn-outline-teal btn-patho-generate"   data-uid=' + json[i].PatientId + ' title="View/Print '+name+'\'s Test report" data-patho_scid="'+json[i].PathologySubCategoryID+'" data-patho_scname="'+test_name+'" data-patho_mcid="'+json[i].PathologyCategoryID+'" data-patho_mcname="'+test_category+'"><i class="fas fa-print" aria-hidden="true" ></i></button><!--&nbsp;&nbsp;<button type="button" onclick="generate_reciept(this)"  class="btn btn-outline-success btn-patho-generate-bill" style="width:41.5px"   data-uid=' + json[i].PatientId + ' title="Generate '+name+'\'s Bill" data-patho_scid="'+json[i].PathologySubCategoryID+'" data-patho_scname="'+test_name+'" data-patho_mcid="'+json[i].PathologyCategoryID+'" data-patho_mcname="'+test_category+'" data-RegistrationID="'+json[i].RegistrationID+'"><i class="far fa-rupee-sign" aria-hidden="true" ></i> </button>--></center></td>');
		$(myTable).append(tr);
		/* $('#myTable').DataTable(); *////invoice/invoice_pathology.php?ID=PL00000010
}
$(myTable).DataTable({
"order": [/* [ 1, "desc" ], */ [ 0, 'desc' ]],
"dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv', */ 'excel', /* 'pdf', */ 'print'
					],
"info":     false,
"language": {
searchPlaceholder: "Search records",
search:""
},
"oLanguage": {
				"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
				},
"autoWidth": true,
/*    "columnDefs": [{ "width": "20%", "targets": 0 },{ "width": "10%", "targets": 4 },{ "width": "5%", "targets": 3 },{ "width": "5%", "targets": 1 },{ "width": "5%", "targets": 5 },{ "width": "10%", "targets": 6 }], */
"columnDefs": [ {
"targets"  : 'no-sort',
"orderable": false,
} ,{ "width": "15%", "targets": 0 }/*,{ "width": "13%", "targets": 4 },{ "width": "18%", "targets": 3 },{ "width": "10%", "targets": 1 },{ "width": "10%", "targets": 5 },{ "width": "6%", "targets": 6 } */],
/* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
"pagingType":"simple_numbers",
"lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]],
"responsive":true
});
}


/*  $('#tab-nav > a').one('click', function() {
// event.preventDefault();
var target = $(this).attr('data-tab');
console.log("hello");
$("#" + target +"").trigger('click',function(){
alert("tab2");
}); // here you can simplify by the use the `load` function instead of triggering a `click` event.
}); */

function showDetails(pat_id_row) {
var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
//var pat_type = pat_id_row.getAttribute("data-pat_id");
var Row = document.getElementById(pat_id_row);
var Cells = Row.getElementsByTagName("td");

//alert("" +Cells[1].innerText+ "'s Registration	 ID is " + pat_type + ".");
window.location="./registered_patient_all.php?ID="+pat_type+"";
}
function clickedbutton(button){

var ID= button.getAttribute("data-uid");
var patho_scid= button.getAttribute("data-patho_scid");
var patho_mcid= button.getAttribute("data-patho_mcid");
var patho_mcname= button.getAttribute("data-patho_mcname");
patho_mcname= patho_mcname.replace(/[\s]/g, "_");
var patho_scname= button.getAttribute("data-patho_scname");
/* patho_scname= patho_scname.replace(/[&\/\\#,+.()$~%--'":*?<>{}]+/g, "_");
patho_scnamerevised=patho_scname.replace(/[\s]+/g, ""); */
patho_scname= patho_scname.replace(/[\s]+/g, "");
patho_scname= patho_scname.replace(/[\+\/]+/g, "_");
patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.\-'":*?<>{}\s]+/g, "");
//var ID="12";
console.log("ID : "+ID);
console.log("patho_scid : "+patho_scid);
console.log("patho_mcid : "+patho_mcid);
console.log("patho_mcname : "+patho_mcname);
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

function generate_reciept(button){

var ID= button.getAttribute("data-uid");
var patho_scid= button.getAttribute("data-patho_scid");
var patho_mcid= button.getAttribute("data-patho_mcid");
var patho_mcname= button.getAttribute("data-patho_mcname");
patho_mcname= patho_mcname.replace(/\s/g, "");
var patho_scname= button.getAttribute("data-patho_scname");
var RegID= button.getAttribute("data-RegistrationID");
//patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.'":*?<>{}\s]+/g, "");
//var ID="12";
console.log("ID : "+ID);
console.log("patho_scid : "+patho_scid);
console.log("patho_mcid : "+patho_mcid);
console.log("patho_mcname : "+patho_mcname);
console.log("patho_mcid : "+patho_scname);
//window.location="./update_patient_form.php?ID="+ID+"";
/* for bubble propogation */
var url="/invoice/invoice_pathology.php?ID="+ID+"&role-input-select="+patho_scname+"&RegistrationID="+RegID;
window.location=url;
//var win = window.open(url, '_blank');
//$("#myModal_report").modal('show');
//$('.modal-body').load(url,function(){

//}
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
</script>
<?php
$pageTitle = "list Patient's pathology HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>