<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
?>

<?php include $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>
<!-- Include Editor style. -->
<link href='/frolaEditor/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
<link href='/frolaEditor/froala_style.min.css' rel='stylesheet' type='text/css' />
<!--Editor Code mirror -->
 <link rel="stylesheet" href="/frolaEditor/codemirror.min.css">
<!-- Include JS file. -->
<script type="text/javascript" src="/frolaEditor/codemirror.min.js"></script>
<script type="text/javascript" src="/frolaEditor/xml.min.js"></script>
<script type='text/javascript' src='/frolaEditor/froala_editor.pkgd.min.js'></script>
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
thead input {
        width: 100%;
    }
.center_text{
	text-align:center;
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
		<form>
		<div class="card card-outline-info mb-3 ">
			<div class="card-block">
				<input type="text" name="adminID" id="adminID" value="<?php $form=$_GET; echo base64_encode($userDetails->ID);?>" hidden>
				<input type="text" name="label" id="label" value="<?php $form=$_GET; echo base64_encode($form['label']);?>" hidden>
				<textarea id="froala-editor" name="editor_frola" class="editor">
					<?php 
						if(isset($form['label'])){
							$trial=$form['label'];
						 if($trial=="reset_email"){
							echo $reset_email;
						 }else if($trial=="welcome_email"){
							 echo $welcome_email;
						 }else if($trial=="welcome_ipd"){
							 echo $welcome_ipd;
						 }
						}
						//echo $
					
					?>
				</textarea>
			</div>
		</div>
		<div class="card card-outline-info mb-3 margin_bot_8">
			<div class="card-block center_text" >
				<button type="submit" value="submit" class="btn btn-outline-teal">Submit</button>
						&nbsp;&nbsp;&nbsp;
				<button onclick="location.reload();" class="btn btn-outline-danger">Cancel</button>
			</div>
		</div>
		</form>
	</div>
	</div>
</div>
 <script> 
 $(function() { 
	$('#froala-editor').froalaEditor({
	  codeMirror: true,
	  heightMin: 250,
	}) 
 }); </script>
<script>
/* url_to_fetch_data = "/stock/get_all_stock.php";
$.ajax({
	   type: "POST",
	   url: url_to_fetch_data,//from global_variable // serializes the form's elements.
	   success: function(data)
	   {
			var json = JSON.parse(data);
				console.log(json);
			//parseJsonToTable(json);
	   }
}); */

$( "form" ).on( "submit", function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.
	$('#update_type').prop('disabled', true);
	var formData_setial = $( "form" ).serialize();
	var formData = new FormData(this);
	console.log(formData_setial);
	//alert("hello world");
    var url = "/send_email/set_email.php"; // the script where you handle the form input.
	//validateForm(event)
	//var test=validateForm(event);
	var test=true;
	if (test==true){
			$.ajax({
				   type: "POST",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {
					   console.log("data add test :: "+data);
					   if(data==1){
						swalSuccess("New entry created.");
					   }else if(data!=1){
						   swalError("Some Error Occured, please try again later","Error");
					   }
					  //location.href = "./manage_accounts.php"
				   },
				   error: function (request, status, error) {
						swalError(request.responseText);
					},
					cache: false,
					contentType: false,
					processData: false
				 });
				 //resetform(add_ward_form)
			}else {}
			
});
// setSelectValue (id, val) {}is in footer
</script>
<?php
if(isset($form['label'])){
							$trial=$form['label'];
						 if($trial=="reset_email"){
							$pageTitle = "Edit Reset Email Template"; // Call this in your pages' files to define the page
						 }else if($trial=="welcome_email"){
							$pageTitle = "Edit Welcome Email Template"; // Call this in your pages' files to define the page
						 }else if($trial=="welcome_ipd"){
							$pageTitle = "Edit Welcome to IPD Email Template"; // Call this in your pages' files to define the page
						 }
						}

$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";?>