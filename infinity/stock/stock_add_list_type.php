<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
$userDetails=$userClass->userDetails($session_id);
?>

<?php include $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>
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
<?php include $_SERVER['DOCUMENT_ROOT']."/nav_bartop.php";?>
	<div class="container" id="test-form-container" style="padding-left:50px;margin-top:15px;">
		<div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 1rem!important;">
			<div class="card-block heading_bar" id="header">
				<h5><!--title--></h5>
			</div>
			<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		</div>
		<div class="card card-outline-info mb-3" >
			<div class="card-block" id="print">
				<form class="form" id="add_ward_form" name="add_ward_form" action="" method="post" enctype="multipart/form-data" >
					<center>
					<div class="form-group row justify-content-md-center" style="margin-top: 1rem;"><!-- dostor assigned -->
						<label for="add_stock_type_main" id="add_ward_form_label" class="col-1 col-form-label">Add Type : </label>
						<div class="col-3">
							<!--<input class="form-control noerror" type="text" placeholder="Ward Name" name="ctl00_ward_name" id="add_stock_type_main">-->
							<select name="add_stock_type_main" class="form-control" id="add_stock_type_main" style=""  >
								<option value="" disabled selected> Select Category</option>
								<?php 
									$db = getDB();
									$statement=$db->prepare("SELECT * FROM `stock_category` WHERE `isactive`='1'");
									$statement->execute();
									$results=$statement->fetchAll(PDO::FETCH_ASSOC);
									//$json=json_encode($results);
									//return $json;
									//$str = 'In My Cart : 11 12 items';
									foreach($results as $row) {
									echo "<option value=".$row['ID']." data-category_name='".$row['category']."'>".$row['category']."</option>";
									}
									$db=null;
								?>
							</select>
							<input class="form-control noerror" type="text" placeholder="Type name" name="ctl00_AdminID" id="add_stock_type_AdminID" value="<?php echo $userDetails->ID;?>" hidden>
							<input class="form-control noerror" type="text" placeholder="Type name" name="ctl00_type_ID" id="add_type_ID" value="" hidden>
						</div>
						<!--<div class="col-2">-->
							<!--<input class="form-control noerror" type="text" placeholder="Bed Type" name="ctl00_bed_type" id="add_bed_type">-->
							<!--<select name="add_bed_type" class="form-control" id="add_bed_type" style=""  >
								<option value="" disabled selected>Bed type</option>-->
								<?php 
									/* $db = getDB();
									$statement=$db->prepare("SELECT * FROM `bed_type` WHERE `IsActive`='1'");
									$statement->execute();
									$results=$statement->fetchAll(PDO::FETCH_ASSOC);
									foreach($results as $row) {
									echo "<option value=".$row['ID']." data-bed-charges=".$row['bed_charges'].">".$row['bed_type']."</option>";
									}
									$db=null; */
								?>
							<!--</select>
						</div>-->
						<div class="col-2" style="border-right: 3px ridge #CDCDCD;">
							<input class="form-control noerror" type="text" placeholder="Type Name" name="ctl00_type_name" id="add_type_name">
						</div>
						<div class="col-3">
							<div class="form-group row justify-content-md-center" style="margin-bottom:0">
								<div class="col-6">
									<input class="form-control btn btn-outline-info" type="Submit" title="Add Bed" name="add_test" id="add_test" value="Create">
								</div>
								<div class="col-6">
									<input class="form-control btn btn-outline-danger" type="button" title="update Bed" placeholder="submit" name="update_type" id="update_type" value="Update">
								</div>
							</div>
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
<!--</div>-->
<script>
$('#update_type').prop('disabled', true);
$("#update_type").on("click",function(){
	$("#add_test").prop( "disabled", false );
	$("#update_type").prop( "disabled", true );
	//alert("update clicked");
		var formData = $( "form" ).serialize();
		console.log("form data 86 :: "+formData);
	//alert("hello world");
    var url = "/stock/add_stock_type.php"; // the script where you handle the form input.
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
						   url: "/stock/get_all_type_stock.php",//from global_variable // serializes the form's elements. */
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
				 location.reload();
			}else {}
});

$.ajax({
	   type: "POST",
	   url: "/stock/get_all_type_stock.php",//from global_variable // serializes the form's elements. */
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
	$('#update_type').prop('disabled', true);
	var formData = $( "form" ).serialize();
	console.log(formData);
	//alert("hello world");
    var url = "/stock/add_stock_type.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){
			$.ajax({
				   type: "GET",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {
					   console.log("data add test :: "+data);
					   if(data==1){
						swalSuccess("New entry created.");
					   }else if(data!=1){
						   swalError("Type already exists in selected Category","Change Category.");
					   }
					  //location.href = "./manage_accounts.php"
					  table_list.destroy();
					  $('#myTable').empty()
					  $.ajax({
						   type: "POST",
						   url: "/stock/get_all_type_stock.php",
						   success: function(data)
						   {
							   console.log("in add data :: "+data);
								var json = JSON.parse(data);
								console.log("in add json :: "+json);
								parseJsonToTable(json);
						   }
					});
				   },
				   error: function (request, status, error) {
						swalError(request.responseText);
					},
					cache: false,
					contentType: false,
					processData: false
				 });
				 resetform(add_ward_form)
			}else {}
			
});

function parseJsonToTable(json){
	trbl=$('<thead class="thead-teal"><tr class="head_row "><th >Sr. No.&nbsp;&nbsp;&nbsp;</th><th>Category&nbsp;&nbsp;</th><th>Type</th><th>date added</th><th class="no-sort"><center>Is Active</center></th>		<th class="no-sort"><center>Options</center></th></tr></thead><tbody>');
	$('table').append(trbl);
		 for (var i = 0; i < json.length; i++) {	
			var charges="";
			var date = json[i].WhenEntered;
			var date = date.substring(0,11);
			var date = date.split('-').reverse().join('-');
			//var bed_available = json[i].bed_status;
			//var bed_name_short = json[i].ward_name;
			//bed_name_short = bed_name_short.substring(0,3);
			//if ((Number(bed_available))==0){
			//	bed_available="<span style='color:green'><b>Vacant</b><span>";
			//}else{
			//	bed_available="<span style='color:red'><b>Occupied</b><span>";
			//}
			var isActive = json[i].isactive;
			if (isActive=="1"){var showclass="checked";}else{var showclass="";}
			tr=$('<tr class="tbl_row" id="'+json[i].ID+'" >');
			tr.append("<td>" + json[i].ID + "</td>");
			tr.append("<td>"+json[i].category+ "</td>");
			tr.append("<td>&nbsp;&nbsp;&nbsp;" + json[i].type+ "</td>");
			
			
			tr.append("<td>" + date + "</td>");
			tr.append("<td><center><label class='switch'><input type='checkbox' "+showclass+" data-on-text='1' name='value_active' data-off-text='0' data-off-color='default' data-on-color='success' onclick='toggleactive(this)' class='make-switch' data-uid="+json[i].ID+"><span class='slider round'></span></label></center></td>");
			tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="Update entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
			$('table').append(tr);
			
			}
		table_list = $('#myTable').DataTable({
				 "order": [[ 0, "asc" ]],
				  "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv', */ 'excel', /*'pdf',*/ 'print'
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
				  /* "aoColumns": [
					  null,
					  null,
					  null,
					  { "bSortable": false },
					  { "bSortable": false },
					  ], */
				  "columnDefs": [ {
									  "targets"  : 'no-sort',
									  "orderable": false,
									}],
				  "pagingType":"simple_numbers",
				  "lengthMenu": [[10, 15, 20, 25, 50, -1], [10, 15, 20, 25, 50, "All"]]
			});
			$('div.dataTables_filter input').focus();
}


function validateForm(){
	var stock_category = document.forms["add_ward_form"]["add_stock_type_main"].value;
	//console.log('ward_value :: '+tname);
	//var bed_count = document.forms["add_ward_form"]["add_bed_type"].value;
	var type_name = document.forms["add_ward_form"]["ctl00_type_name"].value;
    if (stock_category == "") {
		swalError("Category name must be selected out");
		$("#add_stock_type_main").focus();
        return false;
	}else if (type_name=="" || type_name==null){
		swalError("Type Name must be filled out");
		$("#add_type_name").focus();
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

function clickedupdate(e){
	
		var dr_ID= e.getAttribute("data-uid");
		//var ID="12";
		$('#update_type').prop('disabled', false);
		//var ID="12";
		//alert(ID);
		$.ajax({
			 type: "GET",
			 url: "/stock/get_individual_stock_type_details.php",
			 data:{"dr_ID":dr_ID},
			   success: function(data)
			   {		
						console.log("got data : "+data);
						var json = JSON.parse(data);
						//console.log("got data : "+json);
						console.log("got data json :"+json);
						//var bed_name=json.bed_name;
						var bed_type=json.type;
						var category=json.category;
						var bed_id=json.ID;
						//alert("sub test name : "+subtest_name);
						setSelectValue("add_stock_type_main",category);
						setSelectValue("add_type_name",bed_type);
						//setSelectValue("add_type_name",bed_type);
						setSelectValue("add_type_ID",bed_id);
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
	//console.log("data"+data1);
	//console.log("dr_ID : "+dr_ID);
     $.ajax({
			   type: "GET",
			   url: "/stock/update_on_toggle_stock_category.php?value_active="+checkStatus+"&dr_ID="+dr_ID+"",
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

// setSelectValue (id, val) {}is in footer
</script>
<?php
$pageTitle = "ADD / UPDATE Type in Stock"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";?>