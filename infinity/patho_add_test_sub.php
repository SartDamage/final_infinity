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

input[type="button" i]:disabled, input[type="submit" i]:disabled, input[type="reset" i]:disabled, input[type="file" i]:disabled::-webkit-file-upload-button, button:disabled, select:disabled, optgroup:disabled, option:disabled, select[disabled] > option {
    color: graytext!important;
    background: #ced4da!important;
}
.show_on_update{
	display:block;
}
.hide_on_update{
	display:none;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #dcdcdc!important;
    opacity: 1;
    color: #afafaf;
}
</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<div id="main">
<?php include './nav_bartop.php';?>

	<div class="container" id="test-form-container" style="padding-left:50px;margin-top:15px;">
		<div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 1rem!important;">
			<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
			<div class="card-block" id="header">
				<h5>Update Sub-category charges in Pathology.</h5>
			</div>
		</div>
		<form class="form" id="add_test_main_form" name="add_test_main_form" action="" method="post" enctype="multipart/form-data" >
		<div class="card card-outline-info mb-3 hide_on_update" id="update_block">
			<div class="card-block" >
					<center>
					<div class="form-group row justify-content-md-center " ><!-- dostor assigned -->
						<label class="col-2 col-form-label" for="main-test-input-select_alt" style="padding-left:0px;padding-right:0px">Update Test : </label>
						<div id="main-test-input" class="form-input col-3">
							<select name="main_test_alt" class="form-control" id="main-test-input-select_alt" style="height: 44px;"  disabled>
								<option value="" disabled selected> Select main test</option>
			<?php 
					$db = getDB();
				$statement=$db->prepare("SELECT * FROM pathologycategorymaster;");
				$statement->execute();
				$results=$statement->fetchAll();
				//$json=json_encode($results);
				//return $json;
				//$str = 'In My Cart : 11 12 items';
				foreach($results as $row) {
				echo "<option value=" . $row['PathologyCategoryID'] . ">" . $row['PathologyCategoryName'] . "</option>";
				}
				$db=null;
				?>
							</select>
						</div>
						<input type="hidden" name="main_test" id="main-test-input-select" value=""/>
						<input class="form-control noerror col-md-3" type="text" placeholder="sub category name" name="ctl00_subtest_name" id="add_test_sub" readonly="readonly">&nbsp;&nbsp;&nbsp;&nbsp;
						<input class="form-control noerror col-md-3" type="text" placeholder="sub category cost in ₹" name="ctl00_subtest_price" id="add_test_sub_cost"/>
					</div>
					<div class="form-group row justify-content-md-center">
						<!--<div class="col-3">
							<input class="form-control btn btn-outline-info" type="Submit" placeholder="submit" name="add_test" id="add_test" value="Add Sub category">
						</div>-->
						<div class="col-md-3">
							<button  class="form-control btn btn-outline-danger" type="button" name="update_test" id="update_test" value="Update Sub category" >Update Sub category</button>
						</div>
					</div>
					</center>
					<input class="form-control noerror" type="hidden"  name="ctl00_AdminID" id="add_test_main_AdminID" value="<?php echo $userDetails->ID;?>">
					<input class="form-control noerror" type="hidden"  name="ctl00_cat_ID" id="ctl00_cat_ID" value="">
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
$.ajax({
	   type: "POST",
	   url: <?php echo $get_all_patho_sub_category; ?>,//from global_variable // serializes the form's elements. */
	   success: function(data)
	   {
			var json = JSON.parse(data);
				console.log(json);
			parseJsonToTable(json);
	   }
});

$("#update_test").on("click",function(){
	
	//$('#update_block').toggleClass('.show_on_update');
	//alert("update clicked");
	event.preventDefault();
	var formData = $( "form" ).serialize();
	console.log("formData "+formData);
	//alert("hello world");
    var url = "update_pathology_sub_category.php"; // the script where you handle the form input.
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
					  $('#myTable').empty()
					  $.ajax({
						   type: "POST",
						   url: <?php echo $get_all_patho_sub_category; ?>,//from global_variable // serializes the form's elements. */
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
			$('#update_test').prop('disabled', true);
	});

$( "form#add_test_main_form" ).on( "submit", function( event ) {
	var formData = new FormData(this);
	//alert("hello world");
    var url = "add_patho_category_sub.php"; // the script where you handle the form input.
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
						   url: <?php echo $get_all_patho_sub_category; ?>,//from global_variable // serializes the form's elements. */
						   success: function(data_table)
						   {
								var json = JSON.parse(data_table);
									console.log(json);
								parseJsonToTable(json);
						   }
					});
					if (data==true){
						swalSuccess("New entry created");
					}else if(data==false){
						swalError("new entry not created");
						}else{}
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
				 resetform(add_test_main_form)
			}else {}
			event.preventDefault();// avoid to execute the actual submit of the form.
});

function parseJsonToTable(json){
	trbl=$('<thead class="thead-teal"><tr class="head_row"><th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Main category</th><th>Test name</th><th>Charges in ₹</th><th class="no-sort"><center>Options</center></th></tr></thead><tbody>');<!--<th>date added</th><th>Is Active</th>-->
	$('table').append(trbl);
		 for (var i = 0; i < json.length; i++) {
			if (json[i].PathologyTestCharges==""||json[i].PathologyTestCharges==null){var charges="---";}else{var charges=json[i].PathologyTestCharges;}
			var date = json[i].WhenEntered;
			var date = date.substring(0,11);
			var date = date.split('-').reverse().join('-');
			var isActive = json[i].IsActive;
			if (isActive=="1"){var showclass="checked";}else{var showclass="";}
			tr=$('<tr class="tbl_row" id="'+json[i].PathologySubCategoryID+'"  data-pat_id="'+json[i].PathologySubCategoryID+'">');
			var cat_id=Number(json[i].PathologySubCategoryID );
			tr.append(`<td> ${cat_id} </td>`);
			tr.append("<td>" + json[i].PathologyCategoryName + "</td>");
			tr.append("<td>" + json[i].PathologySubCategoryName + "</td>");
			//tr.append("<td>" + date + "</td>");
			//tr.append("<td><center><label class='switch'><input type='checkbox' "+showclass+" data-on-text='1' name='value_active' data-off-text='0' data-off-color='default' data-on-color='success' onclick='toggleactive(this)' class='make-switch' data-uid="+json[i].PathologySubCategoryID+"><span class='slider round'></span></label></center><div id='resultQuickVar1'></div></td>");
			tr.append("<td> ₹ " +charges+ "</td>");
			tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="click to update Price ₹"style="width:100px"  data-uid="' + json[i].PathologySubCategoryID + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].PathologySubCategoryID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
			$('table').append(tr);
			}
		table_list = $('#myTable').DataTable({
				 "order": [[ 0, "desc" ]],
				  "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv', */ 'excel'/* , 'pdf' */, 'print'
					],
"info":     false,
"language": {
searchPlaceholder: "Search records",
search:""
},
				  "autoWidth": false,
				  "aocolumnDefs": [ {
									  "targets"  : 'no-sort',
									  "orderable": false,
									},
									{ "sType": "num", "aTargets": [ 0 ] }],
				  /* "aoColumns": [
					  null,
					  null,
					  null,
					  null,
					  { "bSortable": false }
					  ], */
					"pagingType":"simple_numbers",
					 "lengthMenu": [[10, 15, 20, 25, 50, -1], [10, 15, 20, 25, 50, "All"]]
			});
			$('div.dataTables_filter input').focus();
}

function validateForm(){
	var tname = document.forms["add_test_main_form"]["ctl00_subtest_name"].value;
	var maintest = document.forms["add_test_main_form"]["main_test"].value;
	var subtest = document.forms["add_test_main_form"]["ctl00_subtest_price"].value;
    if (tname == "") {
		swalError("sub test name must be filled out");
		$("#add_test_main").focus();
        return false;
	}else if(maintest==""){
		swalError("main test name must be Selected");
		$("#main-test-input-select").focus();
	}else if(subtest==""){
		swalError("main test name must be Selected");
		$("#add_test_sub_cost").focus();
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
		show_once();//run show_on_update only once
		//var ID= button.getAttribute("data-uid");
		var dr_ID= button.getAttribute("data-uid");
		setSelectValue("ctl00_cat_ID",dr_ID);
		$('#update_test').prop('disabled', false);
		//var ID="12";
		//alert(ID);
		$.ajax({
			 type: "GET",
			 url: "get_patho_individual_sub_detail.php",
			 data:{"dr_ID":dr_ID},
			   success: function(data)
			   {		
						console.log("got data : "+data);
						var json = JSON.parse(data);
						//console.log("got data : "+json);
						console.log("got data json :"+json);
						var subtest_name=json[0].PathologySubCategoryName;
						//alert("sub test name : "+subtest_name);
						setSelectValue("add_test_sub",json[0].PathologySubCategoryName);
						setSelectValue("main-test-input-select",json[0].PathologyCategoryID);
						setSelectValue("main-test-input-select_alt",json[0].PathologyCategoryID);
						setSelectValue("add_test_sub_cost",json[0].PathologyTestCharges);
						
						
						//setSelectValue("add_test_sub_ID",json[0].PathologySubCategoryID);
						//$('#resultQuickVar1').html(data);			
			   },
		});
		//window.location="./OPD_patient_detail_printable.php?ID="+ID;
		/* for bubble propogation */
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
		/* end stopping bubble propogation */
}

function setSelectValue (id, val) {
    document.getElementById(id).value = val;
	console.log("ID : "+id+"; Value : "+val);
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
	var admin_ID="<?php echo $userDetails->ID;?>";
	var dr_ID = event.getAttribute("data-uid"); 
	var data1="{value_active="+checkStatus+",dr_ID="+dr_ID+",admin_ID="+admin_ID+"}";
	console.log("data"+data1);
	console.log("dr_ID : "+dr_ID);
     $.ajax({
			 type: "POST",
			 url: "update_on_toggle_add_sub_test.php?value_active="+checkStatus+"&dr_ID="+dr_ID+"&admin_ID="+admin_ID+"",
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
var show_once = function(){
     show_once = function(){}; // kill it as soon as it was called
     console.log('call once and never again!'); // your stuff here
	 $("#update_block").toggleClass("show_on_update hide_on_update");
};
</script>
<?php
$pageTitle = "ADD/UPDATE Doctor's"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>