<?php
include  $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include  $_SERVER['DOCUMENT_ROOT']."/session.php";
$userDetails=$userClass->userDetails($session_id);
?>

<?php include  $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>
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
				<form class="form" id="add_category_form" name="add_category_form" action="" method="post" enctype="multipart/form-data" >
					<center>
					<div class="form-group row justify-content-md-center" style="margin-top: 1rem;"><!-- dostor assigned -->
						<label for="add_category_name_main" id="add_category_form_label" class="col-2 col-form-label col-md-offset-2">Add Category : </label>
						<div class="col-4">
							<input class="form-control noerror" type="text" placeholder="Category Name" name="ctl00_category_name" id="add_category_name_main">
							
							<input class="form-control noerror" type="hidden" name="ctl00_AdminID" id="add_category_AdminID" value="<?php echo $userDetails->ID;?>">
							<input class="form-control noerror" type="hidden" name="ctl00_category_ID" id="add_category_ID" value="">
						</div>
						<!--<div class="col-2">
							<input class="form-control noerror" type="text" placeholder="Bed Count" name="ctl00_bed_count" id="add_ward_bed_count">
						</div>-->
						<div class="col-2">
							<input class="form-control btn btn-outline-info" type="Submit" title="Add Ward" name="add_category" id="add_category" value="Create">
						</div>
						<div class="col-2">
							<input class="form-control btn btn-outline-danger" type="button" title="update ward" placeholder="submit" name="update_category" id="update_category" value="Update">
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
$('#update_category').prop('disabled', true),
$("#update_category").on("click",function(){
	$("#add_category").prop( "disabled", false );
	$("#update_category").prop( "disabled", true );
	//alert("update clicked");
		var formData = $( "form" ).serialize();
		console.log("form data 86 :: "+formData);
	//alert("hello world");
    var url = "add_stock_category.php"; // the script where you handle the form input.
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
						   url: "/stock/get_all_categories_stock.php",//from global_variable // serializes the form's elements. */
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
				 resetform(add_category_form)
			}else {}
});

$.ajax({
	   type: "POST",
	   url: "/stock/get_all_categories_stock.php",//from global_variable // serializes the form's elements. */
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
	$('#update_category').prop('disabled', true);
	var formData = $( "form" ).serialize();
	console.log(formData);
	//alert("hello world");  
    var url = "/stock/add_stock_category.php"; // the script where you handle the form input.
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
					  if(data==="1"){
						  table_list.destroy();
						  $('#myTable').empty()
						  $.ajax({
							   type: "POST",
							   url: "/stock/get_all_categories_stock.php",
							   success: function(data)
							   {
									var json = JSON.parse(data);
									console.log(json);
									parseJsonToTable(json);
									swalSuccess("New entry created.");
							   }
						});
					  }else{
						  swalError("No entry created.");
					  }
					  
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
				 resetform(add_category_form)
			}else {}
			
});

function parseJsonToTable(json){
	trbl=$('<thead class="thead-teal"><tr class="head_row "><th >Sr. No.&nbsp;&nbsp;&nbsp;</th><th>Category Name</th><th>date added</th><th class="no-sort"><center>Is Active</center></th><th class="no-sort"><center>Options</center></th></tr></thead><tbody>');
	$('table').append(trbl);
		 for (var i = 0; i < json.length; i++) {	
			var charges="";
			var date = json[i].WhenEntered;
			var date = date.substring(0,11);
			var date = date.split('-').reverse().join('-');
			var bed_available = json[i].bed_available;
			if ((Number(bed_available))>0){
				bed_available="<span style='color:green'><b>"+bed_available+"</b><span>";
			}else{
				bed_available="<span style='color:red'><b>"+bed_available+"</b><span>";
			}
			var isActive = json[i].isactive;
			if (isActive=="1"){var showclass="checked";}else{var showclass="";}
			tr=$(`<tr class="tbl_row" id="${json[i].ID}">`);
			tr.append("<td>&nbsp;&nbsp;&nbsp;" + json[i].ID + "</td>");
			tr.append("<td>" + json[i].category+ "</td>");
			/* tr.append("<td>&nbsp;&nbsp;&nbsp;" + json[i].bed_count+ "</td>");
			tr.append("<td>&nbsp;&nbsp;&nbsp;" + bed_available+ "</td>"); */
			tr.append("<td>" + date + "</td>");
			tr.append("<td><center><label class='switch'><input type='checkbox' "+showclass+" data-on-text='1' name='value_active' data-off-text='0' data-off-color='default' data-on-color='success' onclick='toggleactive(this)' class='make-switch' data-uid="+json[i].ID+"><span class='slider round'></span></label></center></td>");
			tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="Update entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
			$('table').append(tr);
			
			}
		table_list = $('#myTable').DataTable({
				 "order": [[ 0, "asc" ]],
				  "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv', */ 'excel',/* 'pdf'*/, 'print'
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
				  /* "aoColumns": [null,null,null,{ "bSortable": false },{ "bSortable": false },], */
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
	var tname = document.forms["add_category_form"]["ctl00_category_name"].value;
	//var bed_count = document.forms["add_category_form"]["ctl00_bed_count"].value;
    if (tname == "") {
		swalError("Ward name must be filled out");
		$("#add_category_name_main").focus();
        return false;
	}/* else if (bed_count=="" || bed_count==null){
		swalError("Bed count must be filled out");
		$("#add_ward_bed_count").focus();
		return false;
	} */else{return true;}
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
		$('#update_category').prop('disabled', false);
		//var ID="12";  
		//alert(ID);
		$.ajax({
			 type: "GET",
			 url: "/stock/get_stock_category.php",
			 data:{"dr_ID":dr_ID},
			   success: function(data)
			   {		 debugger;
						console.log("got data : "+data);
						var json = JSON.parse(data);
						//console.log("got data : "+json);
						console.log("got data json :"+json);
						var ward_name=json[0].category;
						//var bed_count=json[0].bed_count;
						//alert("sub test name : "+subtest_name);
						setSelectValue("add_category_name_main",ward_name);
						//setSelectValue("add_ward_bed_count",bed_count);
						setSelectValue("add_category_ID",dr_ID);
						//$('#resultQuickVar1').html(data);
						$("#add_category").prop( "disabled", true );
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
			   url: "/stock/update_on_toggle_stock_category.php?value_active="+checkStatus+"&dr_ID="+dr_ID+"&stock_category="+true,
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
$pageTitle = "ADD / UPDATE Category in Stock"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";?>