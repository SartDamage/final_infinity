<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
?>

<?php include './include/header.php';?>
<style>
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
.table td{padding: 0.25rem;}
</style>

<?php //include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
	<div class="container" id="test-form-container" style="padding-left:50px;margin-top:15px;">
		<div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 1rem!important;">
			<div class="card-block" id="header">
				<h5><!--title--></h5>
				<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
					<i class="fa fa-times my-float"></i>
				</a>
			</div>
		</div>
		<input class="form-control noerror" type="hidden" placeholder="Test name" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID;?>">
		<!--<div class="card card-outline-info mb-3" >
			
			<div class="card-block" id="print">
				<form class="form" id="add_test_main_form" name="add_test_main_form" action="" method="post" enctype="multipart/form-data" >
					<center>
					<div class="form-group row justify-content-md-center"><!-- dostor assigned -->
		<!--				<label for="ctl00_test_name" id="add_test_main_label" class="col-2 col-form-label col-md-offset-2">Add/Update Test : </label>
						<div class="col-3">
							<input class="form-control noerror" type="text" placeholder="Test name" name="ctl00_test_name" id="ct100_test_name">
							<input class="form-control noerror" type="hidden" placeholder="Test name" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php //echo $userDetails->ID;?>">
							<input class="form-control noerror" type="hidden" placeholder="Test name" name="ctl00_test_ID" id="ctl00_test_ID" value="">
						</div>
						<div class="col-2">
							<input class="form-control btn btn-outline-info" type="Submit" placeholder="Test name" name="add_test" id="add_test" value="Save test">
						</div>
						<div class="col-2">
							<input type="submit" class="form-control btn btn-outline-danger"  placeholder="Test name" name="update_test_main" id="update_test_main" value="Update"><script>/* onclick="resetform(add_test_main_form)" */</script>
						</div>
					</div>
					</center>
				</form>
			</div>
		</div>-->
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
$('#update_test_main').prop('disabled', true);

$.ajax({
	   type: "POST",
	   url: <?php echo $get_all_pathomastercategory; ?>,//from global_variable // serializes the form's elements. */
	   success: function(data)
	   {
			var json = JSON.parse(data);
				console.log(json);
			parseJsonToTable(json);
	   }
});

$("#update_test_main").on("click",function(event){
	event.preventDefault();
	var formData = $( "form" ).serialize();
	console.log("formDAta "+formData);
    var url = "update_patho_category_main.php"; // the script where you handle the form input.
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
							   url: <?php echo $get_all_pathomastercategory; ?>,//from global_variable // serializes the form's elements. */
							   success: function(data)
							   {
									var json = JSON.parse(data);
										console.log(json);
									parseJsonToTable(json);
							   }
						});
					if (data==true){
						alert("Entry updated");
					}else if(data==false){
						alert("Entry not updated");
						}else{}
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
				 resetform(add_test_main_form)
			}else {}
			$('#update_test_main').prop('disabled', true);
});

$( "form" ).on( "submit", function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.
	var formData = new FormData(this);
	//alert("hello world");
    var url = "add_patho_category_master.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){
			$.ajax({
				   type: "POST",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {	
						console.log(data);
					  //location.href = "./manage_accounts.php"
					  table_list.destroy();
					  $('#myTable').empty()
					  $.ajax({
						   type: "POST",
						   url: <?php echo $get_all_pathomastercategory; ?>,
						   success: function(data)
						   {
								var json = JSON.parse(data);
								console.log(json);
								parseJsonToTable(json);
								alert("New entry created.");
						   }
					});
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
				 resetform(add_test_main_form)
			}else {}
			
});

function parseJsonToTable(json){
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th>Category ID</th><th>Test name</th><th>date</th><th>Is Active</th>		<!--<th>Options</th>--></tr></thead><tbody>');
	$('table').append(trbl);
		 for (var i = 0; i < json.length; i++) {	
			var charges="";
			var date = json[i].WhenEntered;
			var date = date.substring(0,11);
			var date = date.split('-').reverse().join('-')
			var isActive = json[i].IsActive;
			if (isActive=="1"){var showclass="checked";}else{var showclass="";}
			tr=$('<tr class="tbl_row" id="'+json[i].PathologyCategoryID+'"  data-pat_id="'+json[i].PathologyCategoryID+'">');/*onclick="showDetails(this.id)"*/
			tr.append("<td>" + json[i].PathologyCategoryID + "</td>");
			tr.append("<td>" + json[i].PathologyCategoryName + "</td>");
			tr.append("<td>" + date + "</td>");
			tr.append("<td><center><label class='switch'><input type='checkbox' "+showclass+" data-on-text='1' name='value_active' data-off-text='0' data-off-color='default' data-on-color='success' onclick='toggleactive(this)' class='make-switch' data-uid="+json[i].PathologyCategoryID+"><span class='slider round'></span></label></center></td");
			//tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="transfer to"style="width:100px"  data-uid="' + json[i].PathologyCategoryID + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].PathologyCategoryID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
			$('table').append(tr);
			}
		table_list = $('#myTable').DataTable({
				 "order": [[ 0, "desc" ]],
				  "info":     false,
				  "autoWidth": false,
				  "aoColumns": [
					  null,
					  null,
					  null,
					  { "bSortable": false },
					  ],
					"pagingType":"simple_numbers",
					 "lengthMenu": [[10, 15, 20, 25, 50, -1], [10, 15, 20, 25, 50, "All"]]
			});
}

function validateForm(){
	var tname = document.forms["add_test_main_form"]["ctl00_test_name"].value;
    if (tname == "") {
		alert("Test name must be filled out");
		$("#ctl00_test_name").focus();
        return false;
	}else{return true;}
}

function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
}

function RefreshTable() {
       $( "#mytable" ).load( "pathology_add_test_main.php#mytable" );
   }

function clickedupdate(button){
		var ID= button.getAttribute("data-uid");
		//window.location="./OPD_patient_detail_printable.php?ID="+ID;
		var dr_ID= button.getAttribute("data-uid");
		$('#update_test_main').prop('disabled', false);
		$.ajax({
			 type: "GET",
			 url: "get_patho_individual_test_main_detail.php",
			 data:{"dr_ID":dr_ID},
			   success: function(data)
			   {		
						console.log("got data : "+data);
						var json = JSON.parse(data);
						console.log("got data json :"+json);
						var test_name=json[0].PathologyCategoryName;
						var test_ID=json[0].PathologyCategoryID;
						setSelectValue("ct100_test_name",test_name);
						setSelectValue("ctl00_test_ID",test_ID);
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
			$.ajax({
		   type: "POST",
		   url: "<?php echo $delete_patho_category; ?>",
		   data:{"ID":ID},
		   success: function(data)
		   {
				RefreshTable();
		   }});
		}else{/* They clicked no*/}
		
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
		/* end stopping bubble propogation */
}


function toggleactive(event){
    var checkStatus = event.checked ? '1' : '0';
	var dr_ID = event.getAttribute("data-uid"); 
	var AdminID = $( "#ctl00_AdminID" ).val();
	var data1="{value_active="+checkStatus+",test_ID="+dr_ID+",AdminID="+AdminID+"}";
	console.log("data"+data1);
	console.log("dr_ID : "+dr_ID);
	console.log("AdminID : "+AdminID);
     $.ajax({
			   type: "GET",
			   url: "update_on_toggle_add_test_main.php?value_active="+checkStatus+"&dr_ID="+dr_ID+"&AdminID="+ctl00_AdminID+"",
			   success: function(data)
			   {		
						//var json = JSON.parse(data);
						console.log(data);
						swalSuccess("Status changed successfully");
						//$('#resultQuickVar1').html(data);
			   },
					cache: false,
					contentType: false,
					processData: false
		});
	if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
}
</script>
<?php
$pageTitle = "List / Deactivate Test's"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>