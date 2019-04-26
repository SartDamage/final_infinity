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
			<div class="card card-outline-info mb-3" >
				<div class="card-block" id="print">
					<form class="form" id="add_ward_form" name="add_ward_form" action="" method="post" enctype="multipart/form-data" >
						<center>
						<div class="form-group row justify-content-md-center" style="margin-top: 1rem;"><!-- dostor assigned -->
							<label for="add_name_main" id="add_ward_form_label" class="col-2 col-form-label col-md-offset-2">Change Rates : </label>
							<div class="col-2">
								<input class="form-control noerror" type="text" placeholder="Doctor Name" name="ctl00_name" id="add_name_main" readonly="readonly">
								
								<input class="form-control noerror" type="hidden" placeholder="Test name" name="ctl00_AdminID" id="add_test_main_AdminID" value="<?php echo $userDetails->ID;?>">
								<input class="form-control noerror" type="hidden" placeholder="Test name" name="ctl00_staff_ID" id="staff_id" value="">
							</div>
							<div class="col-2">
								<input class="form-control noerror" type="text" placeholder="Charges" name="ctl00_charges" id="add_charges">
							</div>
							<div class="col-2">
								<input class="form-control btn btn-outline-danger" type="button" title="update ward" placeholder="submit" name="update_dr" id="update_dr" value="Update">
							</div>
						</div>
						</center>
					</form>
				</div>
			</div>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<div class="container">
					<div class="row justify-content-md-center">
						<a class="btn btn-outline-teal" href="./add_new_staff_form.php">Add New User</a>
					</div>
				</div>
			  </div>
			</div>

			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <table class="table table-striped table-hover" id="myTable">
			  </table>
			  </div>
		</div>
	</div>
	
	
<script>
var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
		// the script where you handle the form input.
		$.ajax({
			   type: "POST",
			   url: "/get_all_users_by_roleid.php",//from global_variable
			   data: {uid:"2"}, //serializes the form's elements.
			   success: function(data)
			   {
					var json = JSON.parse(data);
				  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
				  //location.href = "./home.php"
						console.log(json);
					parseJsonToTable(json);
			 }
},true);

$("#update_dr").on("click",function(){
	var formData = $( "form" ).serialize();
	console.log(formData);
	//alert("hello world");
    var url = "add_dr_rates.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){
			$.ajax({
				   type: "GET",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {	
						console.log(`data ${data}`);
					  //location.href = "./manage_accounts.php"
					  table_list.destroy();
					  $('#myTable').empty()
					  if(data=="1"){
						  $.ajax({
							   type: "POST",
							   url: '/get_all_users_by_roleid.php',
							   data: {uid:"2"},
							   success: function(data)
							   {
									var json = JSON.parse(data);
									console.log(json);
									parseJsonToTable(json);
									swalSuccess("Entry Updated");
							   }
						});
					  }else{
						  swalError("Some Error Occured Please Refresh and Try Again.");
					  }
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
				 resetform(add_ward_form)
			}else {}
			
});

function parseJsonToTable(json)
{
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th>Staff ID</th><th>Name</th><th>Designation</th><th>Joined On&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th class="no-sort"><center>Consultation <br> Charges</center></th><th class="no-sort">Operation</th></tr></thead><tbody>');
	$('table').append(trbl);
	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
					var date = json[i].whenentered;
					var date = date.substring(0,11);
					var date= date.split("-").reverse().join("-");
					var dob = json[i].dob;
					var dob = date.substring(0,11);
					var name= json[i].firstname + "  " + json[i].lastname;
					var isActive = json[i].isactive;
					if (isActive=="1"){var showclass="checked";}else{var showclass="";}
					tr = $('<tr class="tbl_row" id="'+json[i].ID+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].ID+'">');
					tr.append("<td>" + json[i].StaffID + "</td>");
					tr.append("<td><div class='row intable'><b>Name </b>:" + name + "</div><div class='row intable'>Contact : "+json[i].contact+"</div><div class='row intable'>Email : "+json[i].email+"</div></td>");
					/*tr.append("<td>" + json[i].contact + "</td>");tr.append("<td>" + json[i].email + "</td>"); */
					tr.append("<td>" + json[i].designation + "</td>");
					tr.append("<td>" + date + "</td>");
					tr.append("<td><center>₹ "+json[i].Consultation_charges+"</center></td>");
					tr.append('<td class=""><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" style="width:100px"  data-uid="' + json[i].ID + '" data-name="'+name+'" data-charges="'+json[i].Consultation_charges+'" ><i class="fa fa-pencil fa-2" aria-hidden="true"></i> &nbspUpdate</button></td>');
					$('table').append(tr);
				}
				table_list = $('#myTable').DataTable({
					 "order": [[ 3, "desc" ], [ 0, 'desc' ]],
					 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
					  "buttons": [
						/* 'csv','csv', */ 'excel', 'pdf', 'print'
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
	/*var json = <?php echo $json;?>
	//var tr;
	for (var i = 0; i < json.slice(0,<?php echo $no_of_entries_displayed;?>).length; i++) {
		if(json[i].PreFix=="OPD")
		{var show= "IPD"}
		else if(json[i].PreFix=="IPD"){ var show="OPD"}
		else{var show="IPD/OPD"}
		var date = json[i].WhenEntered;
		var date = date.substr(0, 11);
		tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].RegistrationID+'">');
		tr.append("<td>" + json[i].RegistrationID + "</td>");
		tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
		tr.append("<td>" + json[i].Gender + "</td>");
		tr.append("<td >" + json[i].Age + "</td>");
		tr.append("<td>" + json[i].Mobile + "</td>");
		tr.append("<td>" + json[i].Email + "</td>");
		tr.append("<td>" + date + "</td>");
		tr.append('<td class="center"><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" title="transfer to '+show+'"style="width:100px"  data-uid=' + json[i].RegistrationID + '><i class="fa fa-sign-in fa-2" aria-hidden="true"></i> &nbspSelect</button></td>');
		$('table').append(tr);
	}*/
});

function validateForm(){
	var tname = document.forms["add_ward_form"]["ctl00_name"].value;
	var bed_count = document.forms["add_ward_form"]["ctl00_charges"].value;
    if (tname == "") {
		swalError("Dr name must be filled out ");
		$("#add_name_main").focus();
        return false;
	}else if (bed_count=="" || bed_count==null){
		swalError("charges must be filled out");
		$("#add_charges").focus();
		return false;
	}else{return true;}
}
/*********************/
function getAge(dateString) {
var today = new Date();
var birthDate = new Date(dateString);
var age = today.getFullYear() - birthDate.getFullYear();
var m = today.getMonth() - birthDate.getMonth();
if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
	age--;
}
return age;
}
/**********************/
function showDetails(pat_id_row) {
var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
//var pat_type = pat_id_row.getAttribute("data-pat_id");
var Row = document.getElementById(pat_id_row);
var Cells = Row.getElementsByTagName("td");
//alert("" +Cells[1].innerText+ "'s Staff ID is " + pat_type + ".");
/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
}	
function clickedbutton(button){
	var btn_this= button.getAttribute("data-uid");
	var charges= button.getAttribute("data-charges");
	var name= button.getAttribute("data-name");
	//alert(btn_this);
	var url= "./update_user.php?ID="+btn_this;
	setSelectValue("add_name_main",name);
	setSelectValue("add_charges",charges);
	setSelectValue("staff_id",btn_this);
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
}
		

</script>
<?php
$pageTitle = "List all employee's HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>
