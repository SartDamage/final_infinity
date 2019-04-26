<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
<style>
.table_div{font-size:11px;}
</style>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<div id="main">
<?php include './nav_bartop.php';?>
	<div class="container" id="test-form-container" style="padding-left:50px;margin-top:15px;">
		<div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 1rem!important;">
			<div class="card-block heading_bar" id="header">
				<h5><!--title--> <!--*( to be used in Admin )--></h5>
			</div>
			<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		</div>
		<div class="card card-outline-info mb-3" >
			<div class="card-block" id="print">
				<form class="form" id="add_charges_form" name="add_charges_form" action="" method="post" enctype="multipart/form-data" >
					<center>
					<div class="form-group row justify-content-md-center"><!-- dostor assigned -->
						<label for="ctl00_charge_name" id="add_test_main_label" class="col-1 col-form-label">Add Charges : </label>
						<div class="col-2">
							<select id="ct100_charge_department" name="ct100_charge_department" class="form-control">
								<option selected disabled>Department</option>
								<option value="all">General</option>
								<option value="ipd">IPD</option>
								<option value="opd">OPD</option>
							</select>
						</div>
						<div class="col-5">
							<div Class="row">
								<div class="col-6">
									<input class="form-control noerror" type="text" placeholder="Charge description" name="ctl00_charge_name" id="ctl00_charge_name" maxLength="80">
								</div>
								<div class="col-6">
									<input class="form-control noerror"  type="text" placeholder="Amount in ₹" name="ctl00_charge_amount" id="ctl00_charge_amount" maxLength="10" onkeypress="return isNumberKey(event)">
								</div>
							</div>
							<input class="form-control noerror" type="hidden" placeholder="Test name" name="ctl00_AdminID" id="add_test_main_AdminID" value="<?php echo $userDetails->ID;?>">
							<input class="form-control noerror" type="hidden" placeholder="Test name" name="ctl00_charge_ID" id="ctl00_charge_ID" value="">
						</div>
						<div class="col-2">
							<input class="form-control btn btn-outline-info" type="Submit" title="Add Charges"  name="charges_submit" id="charges_submit" value="Create Charges">
						</div>
						<div class="col-2">
							<input class="form-control btn btn-outline-danger" type="button" title="update doctor" placeholder="submit" name="update_charge" id="update_charge" value="Update">
						</div>
					</div>
					</center>
				</form>
			</div>
		</div>
		<div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 5rem!important;">
			<div class="card-block">
			<table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
					<thead class="thead-teal">
						<tr class="head_row">
						<!--<th>Sr no.</th>-->
						<th>Entry Detail</th>
						<th>Department</th>
						<th>Charge Description</th>
						<th>Charge</th>
						<th  class="no-sort">include in <br>IPD bill</th>
						<th class="no-sort"><center>Options</center></th>
						</tr>
					</thead>
				<tbody>
				</tbody>
			</table>
			</div>
			</form>
		</div>
	</div>
</div>
<script>
$('#update_charge').prop('disabled', true);
$("#update_charge").on("click",function(){
	var formData = $( "form" ).serialize();
	var url="add_charges_hms.php"
	var test=validateForm(event);
	if (test==true){
		$.ajax({
			type: "GET",
			url: url,
			data: formData, /* serializes the form's elements.*/
			success: function(data)
			{	
				console.log(data);
				if(data == 'Charges added'){
					swalSuccess(data);
					table_add_charges.destroy();
					$("#myTable tbody").empty();
					table_data_fetch_parse();
				}else if(data=="Changes Made"){
					swalSuccess(data)
				}else{
					swalError(data);
				}
			},
			cache: false,
			contentType: false,
			processData: false
		 });
		 resetform(add_charges_form)/* custom function in footer jQuery for form reset .trigger("reset"); */
	}else {}
});
table_data_fetch_parse();
function table_data_fetch_parse (){
 $.ajax({
			   type: "POST",
			   url: "get_all_standard_items_bill.php",
			   success: function(data)
			   {
					var json = JSON.parse(data);
				  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
				  //location.href = "./home.php"
						console.log(json);
					parseJsonToTable(json);
			 }
		});
}
$( "form#add_charges_form" ).off("submit").on( "submit", function( event ) {
	event.preventDefault();/* avoid to execute the actual submit of the form.*/
	var formData = $(this).serialize();
	console.log(formData);
	/*formData = new FormData(this);*/
	/*console.log(formData);*/
	var url = "add_charges_hms.php";
	var test=validateForm(event);
	if (test==true){
		$.ajax({
			type: "GET",
			url: url,
			data: formData, /* serializes the form's elements.*/
			success: function(data)
			{	
				console.log(data);
				if(data == 'Charges added'){
					swalSuccess(data);
					table_add_charges.destroy();
					$("#myTable tbody").empty();
					table_data_fetch_parse();
				}else{
					swalError(data)
				}
			},
			cache: false,
			contentType: false,
			processData: false
		 });
		 resetform(add_charges_form)/* custom function in footer jQuery for form reset .trigger("reset"); */
	}else {}
			
});
function parseJsonToTable(json){
	for (var i = 0; i < json.length; i++) {
			var author = `${json[i].firstname} ${json[i].lastname}`;
			var date = json[i].WhenEntered;
			var time = date.substring(11,19);
			var date = date.substring(0,11);
			var date= date.split("-").reverse().join("-");
			//var isActive = json[i].is_constant;
			var isActive = json[i].IsActive;
			var showclass = "";
			if (isActive=="1"){ showclass="checked";}else{ showclass="";}
			console.log(showclass);
			tr = $('<tr class="tbl_row"  data-toggle="tooltip" >'); /* <td>"+json[i].ID+"</td> */
			tr.append("<td><div class='table_div'><div class='row intable'>created by : "+ author+"</div><div class='row intable'> on : "+ date + "</div><div class='row intable'> at : "+ time+"</div></div></td>");
			tr.append("<td>" + json[i].department+ "</td>");
			tr.append("<td>" + json[i].charge_title +"</td>");
			tr.append("<td> ₹ " + json[i].amount + "</td>");
			tr.append("<td><center><label class='switch'><input type='checkbox' "+showclass+" data-on-text='1' name='value_active' data-off-text='0' data-off-color='default' data-on-color='success' onclick='toggleactive(this)' class='make-switch' data-uid="+json[i].ID+"><span class='slider round'></span></label></center></td>");
			tr.append('<td class="table_row"><center><button type="button" onclick="clicked_edit(this)" class="btn btn-outline-teal" style="width:100px"  data-uid="'+json[i].ID+'" data-department="'+json[i].department+'" data-charge_title="'+json[i].charge_title+'" data-amount="'+json[i].amount+'" title="Edit patient details"><i class="fal fa-pencil fa-2" aria-hidden="true" ></i> &nbspEdit</button></center></td>');
			$('table').append(tr);
			}
			var buttonCommon = {
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    // Strip $ from salary column to make it numeric
                    return column === 5 ?
                        data.replace( /[$,]/g, '' ) :
                        data;
                }
            }
        }
    };
			table_add_charges = $('#myTable').DataTable({
				 "order": [[ 2, 'asc' ]],
				 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv', */ 'excel', 'print'
					],
				  "info":     false,
				  "autoWidth": false,
				  "language": {searchPlaceholder: "Search records",search:""},
				  "oLanguage": {"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",},
				  "columnDefs": [ {"targets"  : 'no-sort',"orderable": false,},
								  { 'sortable': true, 'searchable': false, 'visible': true, 'type': 'num', 'targets': [0] }
								  ],
				  /*"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,{ "bSortable": false },],*/
				  "pagingType":"simple_numbers",
				  "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
			});
			$('div.dataTables_filter input').focus();
}
function clicked_edit(e){
		var dr_ID= e.getAttribute("data-uid");
		var department= e.getAttribute("data-department");
		var charge_title= e.getAttribute("data-charge_title");
		var amount= e.getAttribute("data-amount");
		
		$('#update_charge').prop('disabled', false);
		setSelectValue ("ctl00_charge_ID", `${dr_ID}`);
		setSelectValue ("ct100_charge_department", `${department}`);
		setSelectValue ("ctl00_charge_name", `${charge_title}`);
		setSelectValue ("ctl00_charge_amount", `${amount}`);
		$('#ctl00_charge_name').focus();
		$('#charges_submit').prop('disabled', true);
		/* for bubble propogation */
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
		/* end stopping bubble propogation */
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function validateForm(){
	var department = document.forms["add_charges_form"]["ct100_charge_department"].value;
	var name = document.forms["add_charges_form"]["ctl00_charge_name"].value;
	var amount = document.forms["add_charges_form"]["ctl00_charge_amount"].value;
	if (department == "" || department=="Department"){
		swalError("Department must be selected");
		$("#ct100_charge_department").focus();
        return false;
	}else if(name == ""){
		swalError("charge Description must be filled");
		$("#ctl00_charge_name").focus();
        return false;		
	}else if(amount==""){
		swalError("charge amount must be filled");
		$("#ctl00_charge_amount").focus();
        return false;
	}else{return true}
}
function toggleactive(event){
    var checkStatus = event.checked ? '1' : '0';
	var dr_ID = event.getAttribute("data-uid"); 
	var data1="{value_active="+checkStatus+",dr_ID="+dr_ID+"}";
	//console.log("data"+data1);
	//console.log("dr_ID : "+dr_ID);
     $.ajax({
			   type: "GET",
			   url: "update_on_toggle_add_bill_item.php?value_active="+checkStatus+"&dr_ID="+dr_ID+"",
			   success: function(data)
			   {		
						var json = JSON.parse(data);
						//console.log("toggle :: "+data);
						var tgl_status=json.IsActive;
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
$pageTitle = "Manage IPD rates"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>