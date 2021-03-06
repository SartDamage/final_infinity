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
<?php include './include/header.php';?>

<style>
a {
-webkit-transition: .25s all;
transition: .25s all;
}
.table td, .table th{vertical-align:middle!important;padding: 0.25rem!important;}
.table .center{text-align:  center;}
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
.accord{
width: -webkit-fill-available;
width:100%;
border-radius: 0px;}
#accordion .panel{padding:5 0 5 0;}
#accordion .panel-body{padding:5px;border-style: none ridge none ridge;margin: 0 8 0 8;}
#accordion .panel-body-last{padding:5px;border-style: none ridge ridge ridge;margin: 0 8 0 8;}


.panel-default>.panel-heading a:after {
content: "";
position: relative;
top: 1px;
display: inline-block;
font-family: 'Glyphicons Halflings';
font-style: normal;
font-weight: 400;
line-height: 1;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
float: right;
transition: transform .25s linear;
-webkit-transition: -webkit-transform .25s linear;
}

.panel-default>.panel-heading a[aria-expanded="true"] {
/*background-color: #eee;*/
}

.panel-default>.panel-heading a[aria-expanded="true"]:after {
content: "\2212";
-webkit-transform: rotate(180deg);
transform: rotate(180deg);
}

.panel-default>.panel-heading a[aria-expanded="false"]:after {
content: "\002b";
-webkit-transform: rotate(90deg);
transform: rotate(90deg);
}

#txt-search{
border-radius:24px;

}
div.container {
width: 100%;
}
.dataTables_wrapper  .row,col-sm-12{
width:100%;
margin-right: 0px;
margin-left: 0px;
}
.dataTables_wrapper .col-sm-12{
padding-right: 0px;
padding-left: 0px;
}
.dataTables_length{
float: left !important;
}
.pagination {
display: -webkit-inline-box;
}
table.dataTable td{
vertical-align: center;
text-align: left;
}
/*************************************************************************************/

// variables
$fab-close-line-length: 1.64rem;
$fab-close-line-thickness: 2px;
$fab-close-animation-time: .3s;
$fab-close-spins: 1;

// button
.fixed-action-btn{
	&.spin-close{
		.btn-large {
			position: relative;
			i {
			opacity: 1;
			transition: transform $fab-close-animation-time,
			opacity $fab-close-animation-time;
			}
			&:before {
			transition: transform $fab-close-animation-time,
			opacity $fab-close-animation-time;
			content: ' ';
			position: absolute;
			top: 50%;
			left: 50%;
			width: $fab-close-line-length;
			height: $fab-close-line-thickness;
			background: white;
			margin-top: -2px;
			margin-left: -$fab-close-line-length/2;
			transform: rotate(0);
			opacity: 0;

			}
			&:after {
			transition: transform $fab-close-animation-time,
			opacity $fab-close-animation-time;
			content: ' ';
			position: absolute;
			top: 50%;
			left: 50%;
			width: $fab-close-line-length;
			height: $fab-close-line-thickness;
			background: white;
			margin-top: -2px;
			margin-left: -$fab-close-line-length/2;
			transform: rotate(0);
			opacity: 0;
			}
		}
		&.active{
			.btn-large{
				i{
					opacity: 0;
				}
				&:before{
					opacity: 1;
					transform: rotate(($fab-close-spins*2+1)*45deg);
				}
				&:after{
					opacity: 1;
					transform: rotate(($fab-close-spins*2+1)*135deg);
				}
			}
		}
	}
}
#exTab3 .nav-pills > li > a {
border-radius: 5px 5px 0 0 ;
padding:15px;
}

#exTab3 .tab-content {
padding : 0px 0px;
}
#myTable_wrapper{
margin:1px;
padding-top:10px;
}
.border-teal {
border-color: #009788!important;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
color: #fff!important;
background-color: #009788;
}
.nav-item a {
color: #009688!important;
text-decoration: none;
background-color: transparent;
-webkit-text-decoration-skip: objects;
}
/*************************************************************************************/
.modal {
position: fixed;
top: 0;
right: auto;
bottom: 0;
left: auto;
overflow: hidden;
}

.modal-dialog {
position: fixed;
margin: 0;
width: 100%;
height: 100%;
padding: 0;
}

.modal-content {
position: absolute;
top: 0;
right: 0;
bottom: 0;
left: 0;
border: 2px solid #3c7dcf;
border-radius: 0;
box-shadow: none;
}

.modal-header {
position: absolute;
top: 0;
right: 0;
left: 0;
height: 50px;
padding: 10px;
background: #6598d9;
border: 0;
}

.modal-title {
font-weight: 300;
font-size: 2em;
color: #fff;
line-height: 30px;
}

.modal-body {
position: absolute;
top: 50px;
/*bottom: 60px;*/
width: 100%;
font-weight: 300;
overflow: auto;
}

.modal-footer {
position: absolute;
right: 0;
bottom: 0;
left: 0;
height: 60px;
padding: 10px;
background: #f1f3f5;
}
.MyTable{
	table-layout: fixed; // ***********add this
  word-wrap:break-word; // ***********and this
}
/************************************************************************************/
</style>
<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>

<body style="background-color:#E0F2F1;">
<div id="main">
	<?php include './nav_bartop.php';?>
	<div class="container">
		<br>
		<a href="#" onclick="goBack()" class="float" title="Click, to go back">
		<i class="fa fa-times my-float"></i>
		</a>
		<div class="card card-outline-info mb-3">
			<div class="card-block heading_bar">
			<h5>List of all pathology patients</h5>
			</div>
		</div>
		<div class="card card-outline-info mb-3">
		  <div class="card-block heading_bar">
			<div class="container">
				<div class="row justify-content-md-center">
					<a class="btn btn-outline-success mar-l-10" href="/addpatientform.php.php">Add new patient</a>
					<a class="btn btn-outline-teal mar-l-10" href="/list_all_patients.php">Add from existing patient</a>
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
					<li class="nav-item">
					<a class="nav-link " href="#4b" data-tab="4b" data-toggle="tab">All reports</a>
					</li>
					</ul>
					<div class="tab-content clearfix">
						<div class="tab-pane border border-teal active" id="1b">
							<table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							</table>
						</div>
						<div class="tab-pane border border-teal" id="2b">
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
							<h3>Reports generated and payment done print taken.</h3>
							<table id="myTable_printed_report" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							</table>
						</div>
						<div class="tab-pane border border-teal" id="4b">
							<h3>will contain all reports irrespective of time,payment.</h3>
							<table id="myTable_all" class="table table-striped table-hover dt-responsive nowrap" width="100%">
                                                        </table>
						</div>
					</div>
				</div>
			<!------------------------------------------------------------------------------->
			</div>
		</div>
	</div>
	<!----------------------------------------------------------->

	<div class="modal fade" id="myModal_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal_for_report" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
//same tab on refresh
$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
		$('#exTab3 a[href="' + activeTab + '"]').tab('show');
    }

window.addEventListener('DOMContentLoaded', function() {
	console.log('window - DOMContentLoaded - capture'); // 1st
	// list all with no report
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

//list all with report 
$.ajax({
	type: "POST",
	url: <?php echo $url_get_all_tests_registered_pathology_report_generated; ?>,//from global_variable
	data: {start: $value}, // serializes the form's elements. */
	success: function(data)
	{
		var json = JSON.parse(data);
		console.log("data 2 "+json);
		parseJsonToTable_report_generated(json,"#myTable_generated_reports","table_tab_3");
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
// list all *
$.ajax({
	type: "POST",
	url: <?php echo $url_get_all_tests_registered_pathology_all; ?>,//from global_variable
	data: {start: $value}, // serializes the form's elements. */
	success: function(data)
	{
		var json = JSON.parse(data);
		console.log("data 4 "+json);
		parseJsonToTable_report_generated(json,"#myTable_all","table_tab_4");
	}
});

function parseJsonToTable_report(json,myTable,table_list){
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th>Patho. ID&nbsp;</th><th>Date&nbsp;</th><th class="no-sort">Detail\'s</th><th>Category&nbsp;&nbsp;&nbsp;</th><th>Test<br> name&nbsp;&nbsp;&nbsp;</th><th class="no-sort">Payment</th><th class="no-sort">Action</th></tr></thead><tbody>')
	$(myTable).append(trbl);
	for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
		/* if(json[i].PreFix=="OPD")
		{var show= "IPD"}
		else if(json[i].PreFix=="IPD"){ var show="OPD"}
		else{var show="IPD/OPD"} */
		var test_category=json[i].PathologyCategoryName;
		var test_name=json[i].PathologySubCategoryName;
		var paid=json[i].payment;
		if (paid=="1") paid='<i class="fa fa-check" aria-hidden="true" style="color:green"></i> Done';else paid='<i class="fa fa-times" aria-hidden="true" style="color:red"></i>Un-Paid';
		var date = json[i].WhenEntered;
		var time = json[i].WhenEntered;
		var date = date.substring(0,11);
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
		tr.append("<td>" + test_category + "</td>");
		tr.append("<td >" + test_name + "</td>");
		tr.append("<td>"+paid+"</td>");
		tr.append('<td class=""><center><button type="button" onclick="clickedbutton(this)"  class="btn btn-outline-teal btn-patho-generate" style="width:100px"  data-uid=' + json[i].PatientId + ' title="Generate '+name+'\'s Test report" data-patho_scid="'+json[i].PathologySubCategoryID+'" data-patho_scname="'+test_name+'" data-patho_mcid="'+json[i].PathologyCategoryID+'" data-patho_mcname="'+test_category+'"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> &nbspReport</button></center></td>');
		$(myTable).append(tr);
		/* $('#myTable').DataTable(); */
}
$(myTable).DataTable({
"order": [[ 1, "desc" ], [ 0, 'desc' ]],
"info":     false,
"language": {
searchPlaceholder: "Search records"
},
/* "autoWidth": true, */
/*    "columnDefs": [{ "width": "20%", "targets": 0 },{ "width": "10%", "targets": 4 },{ "width": "5%", "targets": 3 },{ "width": "5%", "targets": 1 },{ "width": "5%", "targets": 5 },{ "width": "10%", "targets": 6 }], */
"columnDefs": [ {
"targets"  : 'no-sort',
"orderable": false,
},{ "width": "15%", "targets": 0 },{ "width": "13%", "targets": 4 },{ "width": "18%", "targets": 3 },{ "width": "10%", "targets": 1 },{ "width": "10%", "targets": 5 },{ "width": "6%", "targets": 6 }],
/* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
"pagingType":"simple_numbers",
"lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
});
}


function parseJsonToTable_report_generated(json,myTable,table_list){
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th>Patho. ID&nbsp;</th><th>Report<br> Report&nbsp;</th><th class="no-sort">Detail\'s</th><th>Category&nbsp;&nbsp;&nbsp;</th><th>Test<br> name&nbsp;&nbsp;&nbsp;</th><th class="no-sort">Payment</th><th class="no-sort">Action</th></tr></thead><tbody>')
	$(myTable).append(trbl);
	for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
		/* if(json[i].PreFix=="OPD")
		{var show= "IPD"}
		else if(json[i].PreFix=="IPD"){ var show="OPD"}
		else{var show="IPD/OPD"} */
		var test_category=json[i].PathologyCategoryName;
		var test_name=json[i].PathologySubCategoryName;
		var paid=json[i].payment;
		//alert(paid);
		if (paid=="1") paid='<i class="fa fa-check" aria-hidden="true" style="color:green"></i> Done';else paid='<i class="fa fa-times" aria-hidden="true" style="color:red"></i>Un-Paid';
		var date = json[i].LastModified;
		var time = json[i].LastModified;
		if(date==null || date==""){date = "N.A."}else{var date = date.substring(0,11);}
		if(time==null || time==""){time = "N.A."}else{var time = time.substring(11,16);}
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
		tr.append("<td>" + test_category + "</td>");
		tr.append("<td >" + test_name + "</td>");
		tr.append("<td>"+paid+"</td>");
		tr.append('<td class=""><center><button type="button" onclick="clickedbutton(this)"  class="btn btn-outline-teal btn-patho-generate"   data-uid=' + json[i].PatientId + ' title="View/Print '+name+'\'s Test report" data-patho_scid="'+json[i].PathologySubCategoryID+'" data-patho_scname="'+test_name+'" data-patho_mcid="'+json[i].PathologyCategoryID+'" data-patho_mcname="'+test_category+'"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button>&nbsp;&nbsp;<button type="button" onclick="generate_reciept(this)"  class="btn btn-outline-success btn-patho-generate-bill" style="width:41.5px"   data-uid=' + json[i].PatientId + ' title="Generate '+name+'\'s Bill" data-patho_scid="'+json[i].PathologySubCategoryID+'" data-patho_scname="'+test_name+'" data-patho_mcid="'+json[i].PathologyCategoryID+'" data-patho_mcname="'+test_category+'"><i class="fa fa-inr" aria-hidden="true" ></i> </button></center></td>');
		$(myTable).append(tr);
		/* $('#myTable').DataTable(); *////invoice/invoice_pathology.php?ID=PL00000010
}
$(myTable).DataTable({
"order": [[ 1, "desc" ], [ 0, 'desc' ]],
"info":     false,
"language": {
searchPlaceholder: "Search records"
},
/* "autoWidth": true, */
/*    "columnDefs": [{ "width": "20%", "targets": 0 },{ "width": "10%", "targets": 4 },{ "width": "5%", "targets": 3 },{ "width": "5%", "targets": 1 },{ "width": "5%", "targets": 5 },{ "width": "10%", "targets": 6 }], */
"columnDefs": [ {
"targets"  : 'no-sort',
"orderable": false,
},{ "width": "15%", "targets": 0 },{ "width": "13%", "targets": 4 },{ "width": "18%", "targets": 3 },{ "width": "10%", "targets": 1 },{ "width": "10%", "targets": 5 },{ "width": "6%", "targets": 6 }],
/* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
"pagingType":"simple_numbers",
"lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
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
patho_mcname= patho_mcname.replace(/\s/g, "");
var patho_scname= button.getAttribute("data-patho_scname");
patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.'":*?<>{}\s]+/g, "");
//var ID="12";
console.log("ID : "+ID);
console.log("patho_scid : "+patho_scid);
console.log("patho_mcid : "+patho_mcid);
console.log("patho_mcname : "+patho_mcname);
console.log("patho_mcid : "+patho_scname);
//window.location="./update_patient_form.php?ID="+ID+"";
/* for bubble propogation */
var url="/reports/"+patho_scname+"Report.php?ID="+ID;
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
//patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.'":*?<>{}\s]+/g, "");
//var ID="12";
console.log("ID : "+ID);
console.log("patho_scid : "+patho_scid);
console.log("patho_mcid : "+patho_mcid);
console.log("patho_mcname : "+patho_mcname);
console.log("patho_mcid : "+patho_scname);
//window.location="./update_patient_form.php?ID="+ID+"";
/* for bubble propogation */
var url="/invoice/invoice_pathology.php?ID="+ID+"&role-input-select="+patho_scname;
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
