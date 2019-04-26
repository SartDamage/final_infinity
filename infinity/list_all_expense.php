<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$UID = $userDetails->roleid;
$ID = $userDetails->ID;
$staffid = $userDetails->StaffID;
$db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc ");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$data_for_search=json_encode($results);
//return $json;
$db=null;

//echo $json;
//$db=null;
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>

<style>
a {  -webkit-transition: .25s all;transition: .25s all;}
.table td, .table th{vertical-align:middle!important;padding: 0.25rem!important;}
.table .center{text-align:  center;}
.card {overflow: hidden;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);-webkit-transition: .25s box-shadow;transition: .25s box-shadow;}
.card:focus,.card:hover {box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);}
.card-inverse .card-img-overlay {background-color: rgba(51, 51, 51, 0.85);border-color: rgba(51, 51, 51, 0.85);}
.accord{width: -webkit-fill-available;width:100%;border-radius: 0px;}
#accordion .panel{padding:5 0 5 0;}
#accordion .panel-body{padding:5px;border-style: none ridge none ridge;margin: 0 8 0 8;}
#accordion .panel-body-last{padding:5px;border-style: none ridge ridge ridge;margin: 0 8 0 8;}
.panel-default>.panel-heading a:after {content: "";position: relative;top: 1px;display: inline-block;font-family: 'Glyphicons Halflings';font-style: normal;font-weight: 400;line-height: 1;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;float: right;transition: transform .25s linear;-webkit-transition: -webkit-transform .25s linear;}
.panel-default>.panel-heading a[aria-expanded="true"] {/*background-color: #eee;*/}
.panel-default>.panel-heading a[aria-expanded="true"]:after {content: "\2212";-webkit-transform: rotate(180deg);transform: rotate(180deg);}
.panel-default>.panel-heading a[aria-expanded="false"]:after {content: "\002b";-webkit-transform: rotate(90deg);transform: rotate(90deg);}
#txt-search{border-radius:24px;}
.thead-teal{height:45px;}
input[type=search]::-webkit-search-cancel-button {-webkit-appearance: searchfield-cancel-button;}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link{color: #fff!important;
    background-color: #8BC34A;}
	#exTab3 .nav-pills>li>a {
    border-radius: 5px 5px 0 0;
    padding: 15px;
}
.nav-item a {color: #8BC34A!important;}
table{
  margin: 0 auto;
  width: 100%;
  clear: both;
  border-collapse: collapse;
  table-layout: fixed;
  word-wrap:break-word;
}
table.dataTable.nowrap td {
    white-space: normal;
}
</style>
<?php/* include $_SERVER['DOCUMENT_ROOT'].'/nav_sidebar.php';*/?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>

<body style="background-color:#E0F2F1;">
	<div id="main">
		<?php include  $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
		<div class="container">
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		<br>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5>Expense section <?php // echo $userDetails->username; ?> <!--(To be used in admin)--></h5>
			  </div>
			</div>
			<div class="card card-outline-info mb-3">
				<div class="card-block">
					<div class="row justify-content-md-center">
						<a  href="/add_expense.php/" class="btn btn-outline-info mar-l-10 btn_addto" id="opd">Add Expense</a>
					</div>
				</div>
			</div>
			<!--<div class="card card-outline-info mb-3">
				<div class="card-block">
					<form role="form">
						<div class="form-group">
							<input type="search" class="input-lg" id="txt-search" placeholder="Search Patients by Name/Registration ID/Number">
						</div>
					</form>
					<div id="filter-records"></div>
				</div>
			</div>-->
			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">

							<table id="myTable" class="table table-striped table-hover dt-responsive nowrap" >
							</table>

						<!--<div class="tab-pane border border-teal" id="4b">
							<h3>will contain all reports irrespective of time,payment.</h3>
						</div>-->

			  </div>
		</div>
	</div>
<script>
var uid ="<?php echo base64_encode($ID);?>";
var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
	$.ajax({
		   type: "GET",
		   url: "/get_list_all_expense.php",/*from global_variable<?php //echo $url_get_all_patients_ipd; ?> */
		   <?php if($UID == "2" ){echo "data:{UID:uid},";}?>
		   /*serializes the form's elements.*/
		   success: function(data)
		   {
				var json = JSON.parse(data);
			 /* on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
			  location.href = "./home.php"
					var json = data;*/
					console.log(json);
				parseJsonToTable(json,"#myTable");
				$value=$value+10;

			}
		});
},true);


function parseJsonToTable(json,myTable)
{
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th class="no-sort" >Sr.<br> No.</th><th>Date</th><th>Detail</th><!--<th>Particulars</th>--><th class="no-sort">Payment <br> Details</th><th>Department<br>alloted to</th><th class="no-sort" >Amount in ₹</th></tr></thead><tbody>');
	$(myTable).append(trbl);

	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
					var name_autho="";

					var date = json[i].date;
					//var date = date.substring(0,11);
					var date= date.split("-").reverse().join("-");
					/* var time = json[i].WhenEntered;
					var time = time.substring(11,16); */
					amount = Number(json[i].amount);
					amount = amount.toLocaleString('en-US', {minimumFractionDigits: 2});

					var assigned_to =json[i].authorized_for;

					console.log ("data from uid_get _name out"+name_autho);
					var reference = json[i].payment_type;
					if (reference=="cash"){
						reference="";
						}else if(reference=="cheque"){
							reference="cheque no. :"+ json[i].cheque_number;
						}else if(reference=="electronic"){
							reference="reference no. :"+ json[i].electronic_number;
						}

					tr = $('<tr class="tbl_row" id="'+json[i].ID+'" data-pat_id="'+json[i].ID+'">');
					tr.append("<td></td>");
					tr.append("<td><div class='row intable'> " + date + "</div></td>");
					/* $.ajax({type: "GET",
							url: "/get_all_user_by_ID.php",
							data:{ID:assigned_to},
							async: false,
							success: function(data){
								console.log ("data from uid_get _name "+data); */
								tr.append('<td>Vendor Name : '+json[i].vendor_name+' <br> contact : '+json[i].vendor_contact+' <br> authorized for :'+json[i].firstname+' '+json[i].lastname+'<br> particulars : '+json[i].particulars+'</td>');
								/* }
							}); */

					//tr.append("<td>" + json[i].particulars + "</td>");
					tr.append("<td> paymet mode : "+json[i].payment_type+" <br> "+reference+"</td>");
					/*tr.append("<td >" + json[i].RegistrationID + "</td>"); */
					/*tr.append("<td>" + json[i].Mobile + "</td>");
					tr.append("<td>" + json[i].Email + "</td>"); */
					tr.append("<td>" + json[i].department + "</td>");
					tr.append('<td class=""> '+amount+'</td>');
					$(myTable).append(tr);
				}
			$.fn.dataTable.moment( 'DD-MM-YYYY' );
			$.fn.dataTable.moment( 'MM-DD-YYYY' );
			 table_name = $(myTable).DataTable({
			 "order": [[ 1, "desc" ]],/*  [[ 0, "asc" ], [ 1, 'desc' ]], */
			  "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
			 "buttons": [
				/* 'csv',  */'excel',/*  'pdf', */ 'print'
				],
			  "info":     false,
			  "autoWidth": false,
			  "language": {searchPlaceholder: "Search records",search:""},
			  "oLanguage": {"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;"},
			  "columnDefs": [{"targets":'no-sort',"orderable":false},
				 ],
			  "columns": [{width:'2%'},{width:'8%'},{ width: '23%'},{width:'12%'},{width:"15%"},{width:"10%"}],
			   //"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,null,{ "bSortable": false },],
				"pagingType":"simple_numbers",
				"lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
		});

		table_name.on( 'order.dt search.dt', function () {
			table_name.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
            table_name.cell(cell).invalidate('dom');
			} );
		} ).draw();
		$('div.dataTables_filter input').focus();
			$('[data-toggle="tooltip"]').tooltip();
}
</script>
<?php
$pageTitle = "All Expenses"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include  $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
