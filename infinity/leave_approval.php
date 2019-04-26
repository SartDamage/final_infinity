<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* $db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//echo $json;
$db=null; */
$idfromget=$_GET['ID'];

?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>

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


</style>
<?php// include 'nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>

<body style="background-color:#E0F2F1;">
	<div id="main">
		<?php include 'nav_bartop.php';?>
		<div class="container">
		<br>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5><!--title--></h5>
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
			  </div>
			</div>
			
			
			

			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <table class="table table-striped table-hover" id="myTable">
					<thead class="thead-teal">
					
						<tr class="head_row">
						<th class="no-sort">&nbsp;&nbsp;&nbsp;</th>
						
							
							<th>User ID</th>
							
							<th>Name</th>
							<th>Leave reason</th>
							<th>Date</th>
							<th>Comment</th>
							<!--<th>Update</th>-->
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
			  </div>
		</div>
	</div>
	
	
<script>
	var idfrmgt= <?php echo $idfromget;?>;
	
$(document).ready(function() {
    $("#update_block").hide();
});
$( "#add_ward_form" ).on( "submit", function( event ) {
	$(document).ready(function() {
    $("#update_block").hide();
});	

	event.preventDefault();// avoid to execute the actual submit of the form.
	//$('#update_type').prop('disabled', true);
	var formData = $( "form" ).serialize();
	console.log(formData);
    var url = "/stock/update_stock_type.php"; // the script where you handle the form input.
			$.ajax({
				   type: "GET",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {
					   console.log("data add test :: "+data);
					   if(data==1){
						swalSuccess("New Stock has been added");
					   }else if(data!=1){
						   swalError("Type already exists in selected Category","Change Category.");
					   }
					   location.reload();
					  //location.href = "./manage_accounts.php"
				   },
				   error: function (request, status, error) {
						swalError(request.responseText);
					},
					cache: false,
					contentType: false,
					processData: false
				 });
});	
	
var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
		// the script where you handle the form input.
		$.ajax({
			   type: "POST",
			   url: "/attmanager/usersleavetillnow.php",//from global_variable
			   data: {uid:idfrmgt}, //serializes the form's elements.
			   success: function(data)
			   {
					var json = JSON.parse(data);
				  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
				  //location.href = "./home.php"
						console.log(json);
					parseJsonToTable(json);
			 }
},true);

function parseJsonToTable(json)
{
	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
		 var iconfal="";
	 if(json[i].type==="Capsule")
	 {
       var iconfal="<i class='fas fa-capsules'></i>";
		 }
		 else if ( json[i].type==="Tablet"){
		 
			 var iconfal="<i class='fas fa-tablets'></i>";
			 }
			 else{
				 var iconfal="<i class='fas fa-user'></i>";
				 }
					//var date = json[i].whenentered;
					//var date = date.substring(0,11);
					//var date= date.split("-").reverse().join("-");
					//var dob = json[i].dob;
					//var dob = date.substring(0,11);
					//var name= json[i].firstname + "  " + json[i].lastname;
					
					tr = $('<tr class="tbl_row" id="'+json[i].useridl+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].useridl+'">');
				
					tr.append("<td align='center'>"+iconfal+"</td>");
				
					tr.append("<td>" + json[i].id + "</td>");
					tr.append("<td>" + json[i].name+ "</td>");
/* 					tr.append("<td>" + json[i].contact + "</td>");
					tr.append("<td>" + json[i].email + "</td>"); */
					tr.append("<td>" + json[i].leave_reason+ "</td>");
					
					
					tr.append("<td>" + json[i].fromdate + "</td>");
					
					tr.append("<td>" + json[i].comment + "</td>");
				
					//tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="Update entry" style="width:100px"  data-uid="' + json[i].id + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
					$('table').append(tr);
					
				}
				$('#myTable').DataTable({
					 "order": [[ 3, "desc" ], [ 0, 'desc' ]],
					 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
					  "buttons": [
						/* 'csv','csv', */ 'excel', /*'pdf'*/, 'print'
						],
					  "info":     false,
					  "language": {
								searchPlaceholder: "Search records"
							},
						"oLanguage": {
								"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
								},
					  /* "autoWidth": true, */
					   /* "columnDefs": [{ "width": "15%", "targets": 0 },{ "width": "5%", "targets": 1 },{ "width": "5%", "targets": 2 },{ "width": "5%", "targets": 3 },], */
					  "columnDefs": [ {
								  "targets"  : 'no-sort',
								  "orderable": false,
								}],
					  /* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
						"pagingType":"simple_numbers",
						 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
				});
				$('div.dataTables_filter input').focus();
}
	
	/****************************************************************/
	
});
/*********************/

/**********************/



function clickedupdate(e){
	$(document).ready(function() {
    $("#update_block").show();
});
	
		var dr_ID= e.getAttribute("data-uid");
		//var ID="12";
		$('#update_type').prop('disabled', false);
		//var ID="12";
		//alert(ID);
		$.ajax({
			 type: "GET",
			 url: "/stock/get_all_stock_pharmacy_indi.php",
			 data:{"dr_ID":dr_ID},
			   success: function(data)
			   {		
						console.log("got data : "+data);
						var json = JSON.parse(data);
						//console.log("got data : "+json);
						console.log("got data json :"+json);
						//var bed_name=json.bed_name;
						//var bed_type=json.type;
						//var category_update=json[0].category;
						var price_update=json[0].price;
						var last_cost=json[0].number_stock;
						var id_od_element=json[0].id;
						var brand_name=json[0].brand;
						var model_name_p=json[0].model_no;
					  
						//alert(last_cost);
						document.getElementById("add_price_up").value=price_update;
						document.getElementById("add_quantity_upd").value=last_cost;
						document.getElementById("add_type_ID").value=id_od_element;
						document.getElementById("name_of_brand").innerHTML=brand_name;
						document.getElementById("Name_of_model").innerHTML=model_name_p;
						//alert("sub test name : "+subtest_name);
						//setSelectValue("add_stock_type_main",category);
						//setSelectValue("add_type_name",bed_type);
						//setSelectValue("add_type_name",bed_type);
						//setSelectValue("add_type_ID",bed_id);
						//$('#resultQuickVar1').html(data);
						$("#add_test").prop( "disabled", true );
			   },
		});
		/* for bubble propogation */
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
		/* end stopping bubble propogation */
}

</script>
<?php
$pageTitle ="All leaves of ".$userDetails->firstname; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>
