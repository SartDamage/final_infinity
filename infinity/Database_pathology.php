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

<!--style was in line-->
 <link href="/dist/css/style_in_list_all_test_registered_pathology.css" rel="stylesheet">
<?php //include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<body style="background-color:#E0F2F1;">
<div id="main">
	<?php include './nav_bartop.php';?>
	<div class="container">
		<br>
		
		<div class="card card-outline-info mb-3">
			<div class="card-block heading_bar">
				<h5>List of all pathology patients</h5>
				<a href="#" onclick="goBack()" class="float" title="Click, to go back">
		<i class="fa fa-times my-float"></i>
		</a>
			</div>
		</div>
		<div class="card card-outline-info mb-3">
		  <div class="card-block heading_bar">
			<div class="container">
				<div class="row justify-content-md-center patients_button">
					<a class="btn btn-outline-success mar-l-10" href="/addpatientform_pathology_parent.php">Add new patient</a>
					<a class="btn btn-outline-teal mar-l-10" href="/universal_home.php">Add from existing patient</a>
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
						<table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
						</table>
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
window.addEventListener('DOMContentLoaded', function() {
console.log('window - DOMContentLoaded - capture'); // 1st
$.ajax({
type: "POST",
url: <?php echo $url_get_all_tests_registered_pathology_all; ?>,//from global_variable
data: {start: $value}, // serializes the form's elements. */
success: function(data)
{
var json = JSON.parse(data);
console.log("data 1"+json);
parseJsonToTable_report(json,"#myTable","table_tab_1");
}
});
},true);

function parseJsonToTable_report(json,myTable,table_list){
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th>Patho. ID&nbsp;</th><th>Date&nbsp;</th><th class="no-sort">Detail\'s</th><th>Category, Test name&nbsp;&nbsp;&nbsp;</th><th class="no-sort">Payment</th><th class="no-sort"><center>Action</center></th></tr></thead><tbody>')
	$(myTable).append(trbl);
	for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
		/* if(json[i].PreFix=="OPD")
		{var show= "IPD"}
		else if(json[i].PreFix=="IPD"){ var show="OPD"}
		else{var show="IPD/OPD"} */
		var test_category=json[i].PathologyCategoryName;
		var test_name=json[i].PathologySubCategoryName;
		var paid=json[i].payment;
		if (paid=="2") paid='<i class="fa fa-check" aria-hidden="true" style="color:green"></i> Done';else if(paid=="1")paid='<i class="fa fa-times" aria-hidden="true" style="color:blue"></i>Part-Paid';else if (paid=="0")paid='<i class="fa fa-times" aria-hidden="true" style="color:red"></i>Un-Paid';else {paid='<i class="fa fa-times" aria-hidden="true" style="color:red"></i>Un-Paid';}
		var date = json[i].WhenEntered;
		var time = json[i].WhenEntered;
		var date = date.substring(0,11);
		var time = time.substring(11,16);
		var department =json[i].PatientId;
		var department = department.substring(0,3);
		console.log(" "+i+" "+department);
		if(department=="PL0")department="Guest";else if(department=="PL1")department="Guest";else if(department=="OPD")department="OPD";
		var name=json[i].FirstName +"  "+ json[i].LastName;/*onclick="showDetails(this.id)"*/
		tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'"  data-pat_id="'+json[i].PatientId+'" title="Click to view '+ name +'\'s records">');
		tr.append("<td>" + json[i].PatientId + "</td>");
		tr.append("<td><div class='row_intable'>Date : " + date + "</div><div class='row_intable'>Time :"+time+"</td>");
		/* 					tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>"); */
		tr.append("<td><div class='table_div'><div class='row intable'> <b>Name</b> : " + name+ "</div><div class='row intable'><b>Department</b> : " + department + "</div><div class='row intable'><b>Contact </b>: " + json[i].Mobile + "</div></div></td>");
		tr.append("<td>" + test_category + ", " + test_name + "</td>");
		//tr.append("<td >" + test_name + "</td>");
		tr.append("<td>"+paid+"</td>");
		tr.append('<td class=""><center><button type="button" onclick="clickedbutton(this)"  class="btn btn-outline-teal btn-patho-generate" style="width:100px"  data-uid=' + json[i].PatientId + ' title="Generate '+name+'\'s Test report" data-patho_scid="'+json[i].PathologySubCategoryID+'" data-patho_scname="'+test_name+'" data-patho_mcid="'+json[i].PathologyCategoryID+'" data-patho_mcname="'+test_category+'"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> &nbspReport</button></center></td>');
		$(myTable).append(tr);
		/* $('#myTable').DataTable(); */
}
$(myTable).DataTable({
"order": [[ 1, "desc" ], [ 0, 'desc' ]],
"dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv', */ 'excel', 'pdf', 'print'
					],
"info":     false,
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
},{ "width": "15%", "targets": 0 }/* ,{ "width": "13%", "targets": 4 },{ "width": "18%", "targets": 3 },{ "width": "10%", "targets": 1 },{ "width": "10%", "targets": 5 },{ "width": "6%", "targets": 6 } */],
/* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
"pagingType":"simple_numbers",
"lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
});
$('div.dataTables_filter input').focus();
}

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
patho_mcname= patho_mcname.replace(/\s/g, " ");
var patho_scname= button.getAttribute("data-patho_scname");
patho_scname= patho_scname.replace(/[\s]+/g, "");
patho_scname= patho_scname.replace(/[\+\/]+/g, "_");
patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.\-'":*?<>{}\s]+/g, "");
//var ID="12";
console.log("ID : "+ID);
console.log("patho_scid : "+patho_scid);
console.log("patho_mcid : "+patho_scname);
//window.location="./update_patient_form.php?ID="+ID+"";
/* for bubble propogation */
var url="/Reports/"+patho_scname+"REPORT.php?ID="+ID;
//var win = window.open(url, '_blank');
console.log("url  : "+url);
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
$pageTitle = "Patient's pathology Records HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
