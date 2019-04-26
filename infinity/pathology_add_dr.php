<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
?>

<?php include './include/header.php';?>
<style>
.table td{padding: 0.25rem;}
input:checked + .slider {
    background-color: #4caf50;
}
.slider{
	background-color: #c00;
}
.dataTables_wrapper .row{
	width:100%;
	margin-left:0px;
	margin-right:0px;
}
.pagination {
    display: -webkit-inline-box;
}
.table td, .table th{vertical-align: middle;}
.row .dataTables_length{
	    float: left;
}
</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<div id="main">
<?php include './nav_bartop.php';?>
	<div class="container" id="test-form-container" style="padding-left:50px;margin-top:15px;">
		<div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 1rem!important;">
			<div class="card-block heading_bar" id="header">
				<h5>Add/Update Assigned doctor in Pathology.</h5>
			</div>
			<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		</div>
		<div class="card card-outline-info mb-3" >
			<div class="card-block" id="print">
				<form class="form" id="add_test_main_form" name="add_test_main_form" action="" method="post" enctype="multipart/form-data" >
					<center>
					<div class="form-group row justify-content-md-center"><!-- dostor assigned -->
						<label for="add_test_main" id="add_test_main_label" class="col-2 col-form-label col-md-offset-2">Add Doctor : </label>
						<div class="col-3">
							<input class="form-control noerror" type="text" placeholder="Dr. name" name="ctl00_drname" id="add_test_main">
							<input class="form-control noerror" type="hidden" placeholder="Test name" name="ctl00_AdminID" id="add_test_main_AdminID" value="<?php echo $userDetails->ID;?>">
							<input class="form-control noerror" type="hidden" placeholder="Test name" name="ctl00_dr_ID" id="add_test_main_dr_ID" value="">
						</div>
						<div class="col-2">
							<input class="form-control btn btn-outline-info" type="Submit" title="Add Doctor" placeholder="Dr. name" name="add_test" id="add_test" value="Save Dr.">
						</div>
						<div class="col-2">
							<input class="form-control btn btn-outline-danger" type="button" title="update doctor" placeholder="submit" name="update_dr" id="update_dr" value="Update">
						</div>
					</div>
					</center>
				</form>
			</div>
		</div>
		<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
					
					</table>
			  </div>
		</div>
	</div>
	</div>
</div>
<script>
$('#update_dr').prop('disabled', true);
$("#update_dr").on("click",function(){
   
    location.href = "./pathology_Add_dr.php";

	$("#add_test").prop( "disabled", false );
	$("#update_dr").prop( "disabled", true );
	//alert("update clicked");
		var formData = $( "form" ).serialize();
	//alert("hello world");
    var url = "update_patho_dr.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){
			$.ajax({
				   type: "GET",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {	
						console.log("this is it"+data);
					  //location.href = "./manage_accounts.php"
					  table_list.destroy();
					  $('#myTable').empty()
					  $.ajax({
						   type: "POST",
						   url: <?php echo $get_all_patho_dr; ?>,//from global_variable // serializes the form's elements. */
						   success: function(data_table)
						   {
								var json = JSON.parse(data_table);
									console.log(json);
								parseJsonToTable(json);
								
						   }
					});
					if (data==true){
						swalSuccess("Entry updated");
					}else if(data==false){
						swalError("Entry not updated");
						}else{}
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
				 resetform(add_test_main_form)
			}else {}
});

$.ajax({
	   type: "POST",
	   url: <?php echo $get_all_patho_dr; ?>,//from global_variable // serializes the form's elements. */
	   success: function(data)
	   {
			var json = JSON.parse(data);
				console.log(json);
			parseJsonToTable(json);
	   }
});

$('#setQuickVar1').on('click', function() {
    var checkStatus = this.checked ? '1' : '0';

    $.post("quickRightSidebarDBUpdate.php", {"quickVar1a": checkStatus}, 
    function(data) {
        $('#resultQuickVar1').html(data);
    });
});

$( "form" ).on( "submit", function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.
	$('#update_dr').prop('disabled', true);
	var formData = $( "form" ).serialize();
	
	console.log(formData);
	//alert("hello world");
    var url = "add_patho_dr.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){
			$.ajax({
				   type: "GET",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {	
						console.log(data);
					  //location.href = "./manage_accounts.php"
					  table_list.destroy();
					  $('#myTable').empty();
					  $.ajax({
						   type: "POST",
						   url: <?php echo $get_all_patho_dr; ?>,
						   success: function(data)
						   {
								var json = JSON.parse(data);
								console.log(json);
								parseJsonToTable(json);
								swalSuccess("New entry created.");
								resetform(add_test_main_form)
						   }
					});
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
				 
			}else {}
			
});

function parseJsonToTable(json){
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th>Sr. No.</th><th>Test name</th><th>date</th><th><center>Is Active</center></th>		<th><center>Options</center></th></tr></thead><tbody>');
	$('table').append(trbl);
		 for (var i = 0; i < json.length; i++) {	
			var charges="";
			var date = json[i].WhenEntered;
			var date = date.substring(0,11);
			var date = date.split('-').reverse().join('-')
			var isActive = json[i].IsActive;
			if (isActive=="1"){var showclass="checked";}else{var showclass="";}
			tr=$('<tr class="tbl_row" id="'+json[i].pathodrID+'"  data-pat_id="'+json[i].pathodrID+'">');
			tr.append("<td>" + json[i].pathodrID + "</td>");
			tr.append("<td> Dr. " + json[i].pathologist_name + "</td>");
			tr.append("<td>" + date + "</td>");
			tr.append("<td><center><label class='switch'><input type='checkbox' "+showclass+" data-on-text='1' name='value_active' data-off-text='0' data-off-color='default' data-on-color='success' onclick='toggleactive(this)' class='make-switch' data-uid="+json[i].pathodrID+"><span class='slider round'></span></label></center></td>");
			tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="Update entry" style="width:100px"  data-uid="' + json[i].pathodrID + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].pathodrID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
			$('table').append(tr);
			
			}
		table_list = $('#myTable').DataTable({
				 "order": [[ 0, "desc" ]],
				  "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv', */ 'excel',/*  'pdf', */ 'print'
					],
				"info":     false,
				"language": {
				searchPlaceholder: "Search records",
				search:""
				},
				"oLanguage": {
				"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
				},
				  "autoWidth": false,
				  "aoColumns": [
					  null,
					  null,
					  null,
					  { "bSortable": false },
					  { "bSortable": false },
					  ],
					"pagingType":"simple_numbers",
					 "lengthMenu": [[10, 15, 20, 25, 50, -1], [10, 15, 20, 25, 50, "All"]]
			});
			$('div.dataTables_filter input').focus();
}


function validateForm(){
	var tname = document.forms["add_test_main_form"]["ctl00_drname"].value;
    if (tname == "") {
		swalError("Dr. name must be filled out");
		$("#add_test_main").focus();
        return false;
	}else{return true;}
}

/* function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
} */

function RefreshTable() {
       $( "#mytable" ).load( "pathology_add_test_main.php#mytable" );
   }

function clickedupdate(e){
	
		var dr_ID= e.getAttribute("data-uid");
		//var ID="12";
		$('#update_dr').prop('disabled', false);
		//var ID="12";
		//alert(ID);
		$.ajax({
			 type: "GET",
			 url: "get_patho_individual_dr_detail.php",
			 data:{"dr_ID":dr_ID},
			   success: function(data)
			   {		
						console.log("got data : "+data);
						var json = JSON.parse(data);
						//console.log("got data : "+json);
						console.log("got data json :"+json);
						var dr_name=json[0].pathologist_name;
						//alert("sub test name : "+subtest_name);
						setSelectValue("add_test_main",dr_name);
						setSelectValue("add_test_main_dr_ID",dr_ID);
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

function clickeddelete(button){
		var ID= button.getAttribute("data-uid");
		/* for bubble propogation */
		if (window.confirm('Delete the test category')){
			// They clicked Yes
			/* $.ajax({
		   type: "POST",
		   url: "<?php echo $delete_patho_category; ?>",
		   data:{"ID":ID},
		   success: function(data)
		   {
				RefreshTable();
		   }}); */
		}else{/* They clicked no*/}
		
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
		/* end stopping bubble propogation */
}
function toggleactive(event){
    var checkStatus = event.checked ? '1' : '0';
	var dr_ID = event.getAttribute("data-uid"); 
	var data1="{value_active="+checkStatus+",dr_ID="+dr_ID+"}";
	console.log("data"+data1);
	console.log("dr_ID : "+dr_ID);
     $.ajax({
			   type: "GET",
			   url: "update_on_toggle_add_dr.php?value_active="+checkStatus+"&dr_ID="+dr_ID+"",
			   success: function(data)
			   {		
						var json = JSON.parse(data);
						console.log(json);
						swalSuccess("Status changed successfully");
						//$('#resultQuickVar1').html(data);
				
			   },
		});
	if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
}

// setSelectValue (id, val) {}is in footer
</script>
<?php
$pageTitle = "ADD/UPDATE Doctor's"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>