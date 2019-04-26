<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$db = getDB();

?>
<style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
/* .active, .accordion:hover , .main-menu>li>a{
    background-color: #5fa2db;
	color:white!important;
} */



/* Style the accordion panel. Note: hidden by default */
.panel {
    padding: 0 18px;
    background-color: white;
    display: none;
    overflow: hidden;
}
.modal-header {
    background-color: #689F38;
}
.modal-backdrop.show{
	opacity: 1!important;
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
<?php include  $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
  <link href="/dist/css/style_list_all_patients.css" rel="stylesheet">
  <script>

 $('a').click(function(){
        $('a').removeClass("active");
        $(this).addClass("active");
    });
  </script>
<body style="/* background-color:#E0F2F1; */">
	<div id="main">
		<?php include './nav_bartop.php';?>
		<div class="container">
		
		<br>
			<!--<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>-->
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5><!--List of all Patients--> <!--title--></h5>
				<a href="#" onclick="goBack()" class="float" title="Click, to go back">
		<i class="fa fa-times my-float"></i>
		</a>
			  </div>
			</div>
				<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<div class="container">
					<div class="row justify-content-md-center">
						<a class="btn btn-outline-teal" href="./invoice/new_pharmacyp.php">Add New Billing</a>
					</div>
				</div>
			  </div>
			</div>
		
			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <form name="selected_patient" id="selected_patient">
			  <table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
					<thead class="thead-teal">
						<tr class="head_row">
							<!--<th class="no-sort">Select&nbsp;</th>-->
							<th>ID</th>
							<th>Date</th>
							<th>Name&nbsp;</th>
							<th class="no-sort">Details</th>
							
							<!--<th>Registration ID&nbsp;</th>-->
							<th class="no-sort">Bill status</th>
							<th class="no-sort"><center>Options</center></th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					</form>
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
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
  $.ajax({
			   type: "POST",
			   url: "/get_pharmacy_receiptlist.php",//from global_variableused to be /raw_reciept_list.php
			   data: {start: $value}, // serializes the form's elements. */
			   success: function(data)
			   {
					var json = JSON.parse(data);
				  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
				  //location.href = "./home.php"
						//var json = data;
						console.log(json);
					parseJsonToTable(json);
					$value=$value+10;
			 }
		});
		 
		
		 /* $("#patho").on('click',function(){     //was used removed on recommendation of Tanuj Surve
            var radioValue = $("input[name='selection']:checked").val();
            if(radioValue){
				window.location.href="./addpatient_pathology_from_new.php?ID="+radioValue+"";
            }
        }); */
}, true);

$('#myTable').delegate('tr td:first-child', 'click', function(event) { //to stop rowclick on first column of table
	event.stopPropagation();
});
function parseJsonToTable(json){
	
	
	for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
		var pid=json[i].id;
	var recieptidP=json[i].recieptID;
	var patient_name=json[i].patient_name;
	var ph_age=json[i].age;
	var ph_sex=json[i].sex;
	var ph_amount=json[i].amount;
	var ph_paid=json[i].paid;
	var ph_payment_type=json[i].payment_type;
	var ph_WhenModified=json[i].WhenModified;
			var Payment=ph_amount-ph_paid;
			if(Payment==ph_amount){Paymeny_status="<span style='color:red'>Un-paid</span>";}
			else if(Payment==0){Paymeny_status="<span style='color:green'>Paid</span>";}
			else if(Payment>0){Paymeny_status="<span style='color:blue'>Partially-paid</span>";}
			else{Paymeny_status="Un-paid";};
			
			var date = json[i].WhenEntered;
			
			var time = date.substring(11,19);
			var date = date.substring(0,11);
			var date= date.split("-").reverse().join("-");
			tr = $('<tr class="tbl_row" id="'+pid+'" data-pat_id="'+pid+'" title="Click to view '+ patient_name +'\'s records">');
			//tr.append("<td><input class='form-control mar-l-15 radio_form' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"'></td>");
			tr.append("<td>"+pid+"</td><td><div class='table_div'><div class='row intable'> "+ date + "</div></div></td>");
			tr.append("<td>" + patient_name + "</td>");
			tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + ph_sex + "</div><div class='row intable'> Age : " + ph_age + "</div><div class='row intable'>Contact : " + patient_name + "</div></div></td>");
			tr.append("<td > ₹ " +  `${Paymeny_status}`  + "</td>");
			//tr.append("<td>" + json[i].RegistrationID + "</td>");
			
			tr.append('<td ><center><button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal" style="width:100px" data-PathoIndividualID="'+recieptidP+'" title="Generate Invoice"><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i><i class="fal fa-bars fa-stack-1x"></i></i> Invoice</button></center></td>');/* `${BAmount} */
			//tr.append('<td class="table_row"><center><button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal" style="width:100px" data-PathoIndividualID="'+recieptidP+'" data-Tests_list="''" data-Test_amount="''"  data-RegistrationID='  ' title="Generate Invoice" ><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i>							<i class="fal fa-bars fa-stack-1x"></i></i> Invoice</button></center></td>');
			$('#myTable').append(tr);
			/* $('#myTable').DataTable(); */
			}
		/* 	$('#myTable').dataTable( {
			  "drawCallback": function( settings ) {
				   var api = new $.fn.dataTable( settings );

					// Output the data for the visible rows to the browser's console
					// You might do something more useful with it!
					console.log( api.rows( {page:'current'} ).data() );
				}
			}); */
			$('#myTable').DataTable({
				 "order": [ [ 0, 'desc' ],[ 1, "desc" ]],
				 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv', */ 'excel',/* 'pdf'*/, 'print'
					],
					"bStateSave": true,
					"bProcessing": true, // shows 'processing' label
					//"bServerSide": true,
					//"sAjaxSource": "/cds/",
					//"bStateSave": true, // presumably saves state for reloads
				  "info":     false,
				  "autoWidth": true,
				  "language": {
									searchPlaceholder: "Search records",
									search:""
								},
				  "columnDefs": [ {	  "targets"  : 'no-sort',
									  "orderable": false,
									},
									 { 'sortable': true, 'searchable': false, 'visible': false, 'type': 'num', 'targets': [0] }],
				  //"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,{ "bSortable": false },],
					"pagingType":"simple_numbers",
					 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]],
					 "responsive": true,
			});
			$('div.dataTables_filter input').focus();
}
$('#myTable').on('click', 'tr', function (event) {
	var pat_type = document.getElementById(this.id).getAttribute("data-pat_id");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(this.id);
	var Cells = Row.getElementsByTagName("td");
	//var radioValue = $("input[name='selection']:checked").val();
            if(pat_type){
				//window.location.href="./addpatient_pathology_from_new.php?ID="+pat_type+"";
            }
    //alert("" +Cells[1].innerText+ "'s Registration	 ID is " + pat_type + ".");
	//patient history on this link
	//window.location="./registered_patient_all.php?ID="+pat_type+"";
});	


function generate_report(button){

var ID= button.getAttribute("data-PID");
var patho_scid= button.getAttribute("data-patho_scid");
var patho_scname= button.getAttribute("data-patho_scname");
/* patho_scname= patho_scname.replace(/[&\/\\#,+()$~%--'":*?<>{}]+/g, "_");
patho_scnamerevised=patho_scname.replace(/[\s.]+/g, ""); */
patho_scname= patho_scname.replace(/[\s]+/g, "");
patho_scname= patho_scname.replace(/[\+\/]+/g, "_");
patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.\-'":*?<>{}\s]+/g, "");
//var ID="12";
console.log("ID : "+ID);
console.log("patho_mcid : "+patho_scname);
console.log("patho_mcid : "+patho_scname);
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

var regpid= button.getAttribute("data-PathoIndividualID");
var subTestName= button.getAttribute("data-Tests_list");
var subTestAmount= button.getAttribute("data-Test_amount");
var patho_scid= button.getAttribute("data-patho_scid");
var patho_scname= button.getAttribute("data-patho_scname");
var RegID= button.getAttribute("data-RegistrationID");
//patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.'":*?<>{}\s]+/g, "");
//var ID="12";
//console.log("ID : "+PathoRegID);
//console.log("patho_scid : "+patho_scid);
//console.log("patho_mcid : "+patho_scname);
//window.location="./update_patient_form.php?ID="+ID+"";
/* for bubble propogation */
var url="/invoice/new_pharmacyp.php?ID="+`${regpid}`;
console.log(url);
window.location=url;
//openInNewTab(url);
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
function openInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}
</script>
<?php
$pageTitle = "Pharmacy Invoice"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>