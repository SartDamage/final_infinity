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
					<thead class="thead-teal">

						<tr class="head_row">
							<th>Staff ID</th>
							<th>Name</th>
							<!--<th>Contact</th>
							<th class="no-sort">Email</th>-->
							<th>Designation</th>
							<th>Joined On&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th class="no-sort">Is Active</th>
							<th class="no-sort">Operation</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
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

function parseJsonToTable(json)
{
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
/* 					tr.append("<td>" + json[i].contact + "</td>");
					tr.append("<td>" + json[i].email + "</td>"); */
					tr.append("<td>" + json[i].designation + "</td>");
					tr.append("<td>" + date + "</td>");
					tr.append("<td><center><label class='switch'><input type='checkbox' "+showclass+" data-on-text='1' name='value_active' data-off-text='0' data-off-color='default' data-on-color='success' onclick='toggleactive(this)' class='make-switch' data-uid="+json[i].ID+"><span class='slider round'></span></label></center></td>");
					tr.append('<td class=""><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" style="width:100px"  data-uid=' + json[i].ID + '><i class="fa fa-pencil fa-2" aria-hidden="true"></i> &nbspUpdate</button></td>');
					$('table').append(tr);
				}
				$('#myTable').DataTable({
					 "order": [[ 3, "desc" ], [ 0, 'desc' ]],
					 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
           "buttons": [
           //	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
                       {
                        extend: 'print',
                        exportOptions: {
                        columns: [0, 1, 2, 3] //Your Colume value those you want
                            }
                          },
                          {
                              extend: 'excel',
                              exportOptions: {
                              columns: [0,1, 2, 3] //Your Colume value those you want
                          }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                            columns: [0,1, 2, 3] //Your Colume value those you want
                        }
                      }
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
	//alert(btn_this);
	var url= "./update_user.php?ID="+btn_this;
	window.location.href = url;
	// Sets the new location of the current window.
	 /* $.ajax({
   type: "GET",
   url: <?php echo $url_get_update_users;?>,
   data: {"ID":btn_this},//'ID=',// serializes the form's elements.
   success: function(data)
   {
		console.log(data);
		var json = JSON.parse(data);
		console.log(json);
		parseJsonToForm(json);
		//alert(data);
		//alert("this is ajax loop  " + data);
	  //on success take form data and enter to any page you require be it IPD or OPD or Patho.
	  //location.href = "./manage_accounts.php"

   },
	cache: false,
	contentType: false,
	processData: false
 });  */
 /* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
}

function toggleactive(event){
    var checkStatus = event.checked ? '1' : '0';
	var dr_ID = event.getAttribute("data-uid");
	var data1="{value_active="+checkStatus+",dr_ID="+dr_ID+"}";
	//console.log("data"+data1);
	//console.log("dr_ID : "+dr_ID);
     $.ajax({
			   type: "GET",
			   url: "update_on_toggle_staff.php?value_active="+checkStatus+"&dr_ID="+dr_ID+"",
			   success: function(data)
			   {
						var json = JSON.parse(data);
						//console.log("toggle :: "+data);
						var tgl_status=json.isactive;
						if(tgl_status==1){
							swalSuccess("Activated successfully");
						}else if(tgl_status==0){
							swalSuccess("Deactivated successfully");
						}
						//$('#resultQuickVar1').html(data);

			   },
		});
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
