<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
	
?>

<?php include './include/header.php';?>
<style>
.form_header{border-bottom: dashed 1px #d1d0d0;padding-bottom: 10px;}
form{margin-bottom:5px;}
.form .seperator{border: 0px;border-bottom: 1px dashed #b5babd;	width:97%;}
#ipd_display{display:none;}
.form-control{margin-bottom: 0.5rem!important;border: 0px;border-bottom:1px solid #868e96;border-radius: .1rem;}
.form-control:focus{color: #495057;background-color: #fff;border-color: #868e96;outline: 0;box-shadow: 4px 4px 0px 0rem #dae0e5;}
.radio:focus {color: #495057;background-color: #fff;border-color: #868e96;outline: 0;box-shadow: 0px 0px 20px 0rem #dae0e5;}
a{-webkit-transition: .25s all;  transition: .25s all;}
.card {overflow: hidden;  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);  -webkit-transition: .25s box-shadow;  transition: .25s box-shadow;}
.card:focus,.card:hover {box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);}
.card-inverse .card-img-overlay {background-color: rgba(51, 51, 51, 0.85);  border-color: rgba(51, 51, 51, 0.85);}
.form .button_login:hover, .form .button_login:active, .form .button_login:focus {box-shadow: 3px 3px 3px 0.2rem #5C885C;}
.form .seperator, .seperator{border: 0px;border-bottom: 1px dashed #b5babd;}
.required {font-weight: bold;}
.required:after {color: #e32;content:'*';display:inline;}
.error select{color:red;}
.noerror select{color:#9e9e9e;}
.error::-webkit-input-placeholder {color: red;}
.noerror::-webkit-input-placeholder {color: #9e9e9e;}
input:not([type='submit']):not([type='button']), select, summary, textarea{background-color: #fff0!important; border-radius: .25rem;}
.error select{color:red;}
.noerror select{color:#9e9e9e;}
.department_parent{display:none;}
</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
<div class="container" id="reg-form-container" style="/* padding-left:50px; */margin-top:15px;">
	
	<div class="card card-outline-info mb-3">
	  <div class="card-block heading_bar">
		<h5><!--title--></h5>
		<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
		<i class="fa fa-times my-float"></i>
	</a>
	  </div>
	</div>
	<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
		<div class="card-block">
			<div class="form-header-group ">
				  <div class="header-text httal htvam">
					<!--<h5 id="header_1" class="form-header form_header" data-component="header">
					</h5>-->
				  </div>
			</div>

			
			<form method="post" action="" class="form" name="expense_form"  id="expense_form" enctype="multipart/form-data">
<br>
<!--<hr class="seperator">			-->
			<div class="form-group  row justify-content-md-center">
				<div class="col-md-6"></div>
				<label for="vendor_name" id="date_lbl" class="col-md-1 col-form-label required">Date :</label>
				<input class="form-control noerror col-md-3" type="date" name="date_bill"  id="date_bill" >
			</div>
			<div class="form-group  row justify-content-md-center  "><!--name-->
			
			  <label for="vendor_name" id="name_lbl" class="col-md-2 col-form-label required">Vendor name</label>
			  <div class="col-md-4">
				<input class="form-control noerror" type="text" placeholder="Vendor name" name="vendor_name" value="" id="vendor_name" onkeypress="return isalphabetonly(event)"  onkeyup="javascript:capitalize(this.id, this.value);">
			  </div>
			  <label for="rID" id="user-name-input" class="col-md-1 col-form-label required ">Exp-id<span style="position:relative;left: 225%;z-index: 1001;" id="user-result"></span></label>
			  <div class="col-md-3">
				<input class="form-control" type="text" placeholder="voucher id" name="rID" value="" id="rID" autocomplete="false">				
			  </div>
			</div>
			<div class="form-group  row justify-content-md-center  "><!--name-->
			
			  <label for="particulars" id="particulars-input" class="col-md-2 col-form-label required ">Particulars</label>
			  <div class="col-md-8">
				<input class="form-control" type="text" placeholder="particulars of expense" name="particulars" value="" id="particulars" autocomplete="false">				
			  </div>
			</div>
			<div class="form-group  row justify-content-md-center "><!--Email--><!--Alt Contact no-->
				<label for="vendor_contact" class="col-md-2 col-form-label">Vendor Contact No.</label>
				<div class="col-md-3">
					<input class="form-control noerror" type="Text" value="" name="vendor_contact" placeholder="enter vendor contact number" id="vendor_contact" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
				</div>
				<label class="col-md-2 col-form-label required " for="autho">Authorized by/For</label>
				<div class="col-md-3 ">
					<select name="autho" id="autho" class="form-control" oninput="set_autoh(this.options[this.selectedIndex].getAttribute('data-staffID'))">
					<option value="" disabled selected> Select User </option>
					<?php 
					$db = getDB();
					$statement=$db->prepare("SELECT d.`ID`,d.`firstname`,d.`lastname`,d.`StaffID` FROM `staff_ledger` AS d WHERE `isactive`=1 order by d.`firstname` Asc");
					$statement->execute();
					$results=$statement->fetchAll();
					foreach($results as $row) {
					echo "<option value='".$row['firstname']." ".$row['lastname']."' data-ID='".$row['ID']."' data-staffID='".$row['ID']."'>".$row['firstname']." ".$row['lastname']."</option>";
					}
					$db=null;
					?>
					</select>
					<input type="text" name='autho_real' id="authorized_for" hidden>
				</div>
			</div>
			<div class="form-group  row justify-content-md-center  "><!--amount department-->
				<label for="Amount" id="particulars-input" class="col-md-2 col-form-label required ">Amount</label>
				<div class="col-md-3">
					<input class="form-control" type="text" placeholder="Amount for expense" name="Amount" value="" id="Amount" autocomplete="false" onkeypress="return isNumberKey(event)" maxlength="20">		
				</div>
				<label class="col-md-2 col-form-label required " for="department">Department tagged</label>
				<div class="col-md-3 ">
					<select name="department" id="department"  class="form-control" placeholder="department">
					<option value="" disabled selected> Select Department </option>
					<?php 
					$db = getDB();
					$statement=$db->prepare("SELECT d.`ID`,d.`department_name` FROM `department` AS d WHERE `IsActive`=1 order by d.`department_name` Asc");
					$statement->execute();
					$results=$statement->fetchAll();
					foreach($results as $row) {
					echo "<option value='".$row['department_name']."' data-department_id='".$row['ID']."' data-department_name='".$row['department_name']."'>".$row['department_name']."</option>";
					}
					$db=null;
					?>
					</select>
				</div>
			</div>
			<div class="form-group  row justify-content-md-center">
				  
				  <label class="col-md-3 col-form-label required " for="department">Payment type</label> 
				  <label class="form-check-label col-md-2">
					<input class="form-check-input" type="radio" id="cash" name="paymenttype" value="cash"> Cash
				  </label> 
				  <label class="form-check-label col-md-2">
					<input class="form-check-input" type="radio" name="paymenttype" value="cheque"> Cheque
				  </label> 
				  <label class="form-check-label col-md-3">
					<input class="form-check-input " type="radio" name="paymenttype" value="electronic"> Net banking/card payment
				  </label>
				  
			</div>
			<div class="row justify-content-md-center">
				<div class="show-me-cheque col-md-10" style='display:none'>
					<div class="row justify-content-md-center">
						<label class="col-md-2 col-form-label required" for="cheque_number" >cheque number</label> 
						<div class=" col-md-8 ">
							<input class="form-control noerror" type="Text" value="" name="cheque_number" placeholder="enter cheque Number" id="cheque_number" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="15" >
						</div>
						<div class="col-md-2">
						</div>
					</div>
				</div>
				<div class="show-me-neft col-md-10" style='display:none'>
					<div class="row justify-content-md-center">
						<label class="col-md-2 col-form-label required" for="elctronic_number">reference number</label> 
						<div class=" col-md-8">
							<input class="form-control noerror" type="Text" value="" name="elctronic_number" placeholder="enter reference Number" id="elctronic_number" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="20" >
						</div>
						<div class="col-md-2">
						</div>
					</div>
				</div>
			</div>
				<hr class="seperator">
			<div class=" row justify-content-md-center ">
				<div class="col-md-2">
					<input type="submit" class="btn btn-success " name="add_expense" value="Add Expense" style="width:100%"/>
				</div><!--/* button_login */-->
				<div class="col-md-2">
					<input type="button" class="btn btn-danger " id="reset_btn" onclick="resetform(expense_form)" name="staff_registration_reset" value="Reset" style="width:100%"/><!-- class="/* button_reset */"-->
				</div>
			</div>
			
			</form>
			</div>
		</div>
	</div>
</div>

<script>
$( "form#expense_form" ).on( "submit", function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.
	var formData = new FormData(this);
	console.log("Form data is : "+$(this).serialize());
	var get_url=$(this).serialize();
	//alert("hello world");
    var url_label = "/set_expense.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){			 //alert("hello in if loop");
			$.ajax({
				   type: "POST",
				   url: url_label,
				   data: formData, // serializes the form's elements.
				   success: function(response)
				   {	
						console.log("return Data is : "+response);
						resetform(expense_form);
						document.getElementById('date_bill').valueAsDate = new Date();
						swalSuccess(response);//alert
						//save_reciept(get_url,data);
						//alert("this is ajax loop  " + data);
						//on success take form data and enter to any page you require be it IPD or OPD or Patho.
						//location.href = "/"
						//goBack();
						
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
			}else {}
});
$('input[name=paymenttype]').click(function () {
    if (this.value == "electronic") {
        $(".show-me-cheque").hide('slow');
		$(".show-me-neft").show('slow');
    } else if(this.value=="cheque"){
        $(".show-me-cheque").show('slow');
        $(".show-me-neft").hide('slow');
    } else if(this.value=="cash"){
        $(".show-me-cheque").hide('slow');
        $(".show-me-neft").hide('slow');		
	}
});
function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
}	
function toast(){
	alert("New user Created");
}
function FillBilling(f) {
  if(f.address_value.checked == true) {
    f.ICE_address.value = f.address.value;
  }
}
/* allow only numbers in input */

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

/*end*/
/*date constraints for child labour*/
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
//var yyyy = today.getFullYear()-14;
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById('date_bill').valueAsDate = new Date();
document.getElementById("date_bill").setAttribute("max", today);
/*            ----------------------------                      */

function printDiv(divName) {

 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}

function validateForm() {
	
    var vendor_name = document.forms["expense_form"]["vendor_name"].value;
    var rID = document.forms["expense_form"]["rID"].value;
    var particulars = document.forms["expense_form"]["particulars"].value;
    var autho = document.forms["expense_form"]["autho"].value;
    var Amount = document.forms["expense_form"]["Amount"].value;
    var department = document.forms["expense_form"]["department"].value;
    var paymenttype = document.forms["expense_form"]["paymenttype"].value;
	console.log("1 "+paymenttype);
	if(paymenttype=="cheque"){
		var cheque_number = document.forms["expense_form"]["cheque_number"].value;
	}else if(paymenttype=="electronic"){
		var cheque_number = document.forms["expense_form"]["elctronic_number"].value;
	}else{ var cheque_number = "";}
    if (vendor_name == "" ) {
        swalError("Vendor Name must be filled out");//alert
		$("#vendor_name").focus();
		$("#vendor_name").addClass('error').removeClass('noerror');
        return false;
		
    }else if (rID == "" ) {
		swalError("Some error occured please reload the page");//alert
		//$("#last-name-input").focus();
		//$("#last-name-input").addClass('error').removeClass('noerror');
        return false;
    }else if (particulars == "") {
        swalError("particulars must be filled");//alert
		$("#particulars").focus();
		$("#particulars").addClass('error').removeClass('noerror');
        return false;
    }else if (autho == "") {
        swalError("authorized by/for must be selected");//alert
		$("#autho").focus();
		$("#autho").addClass('error').removeClass('noerror');
        return false;
    }else if (Amount == "" ) {
       swalError("Amount must be entered");//alert
		$("#Amount").focus();
		$("#Amount").addClass('error').removeClass('noerror');
        return false;
    }else if (department == "" ) {
       swalError("department for which payment was made must be selected");//alert
		$("#department").focus();
		$("#department").addClass('error').removeClass('noerror');
        return false;
    }else if (paymenttype == "" ) {
       swalError("payment type must be selected");//alert
		$("#cash").focus();
		$("#cash").addClass('error').removeClass('noerror');
        return false;
	}else if((paymenttype == "cheque" ) && cheque_number==""){
		 swalError("Enter cheque number");//alert
		$("#cheque_number").focus();
		$("#cheque_number").addClass('error').removeClass('noerror');
		return false;
	}else if((paymenttype == "electronic" ) && cheque_number==""){
		 swalError("Enter payment reference number");//alert
		$("#elctronic_number").focus();
		$("#elctronic_number").addClass('error').removeClass('noerror');
		return false;
	}else{ return true;}
	
}

function set_autoh(autho_id){
	setSelectValue('authorized_for',autho_id);
}

function isalphabetonly(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return true;
        return false;
}


function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
			 return false;
		 }
         return true;
}
/* --Capitalize First letter function-- */
function capitalize(textboxid, str) {
      // string with alteast one character
      if (str && str.length >= 1)
      {       
          var firstChar = str.charAt(0);
          var remainingStr = str.slice(1);
          str = firstChar.toUpperCase() + remainingStr;
      }
      document.getElementById(textboxid).value = str;
  }
</script>
<?php
$pageTitle = 'Add Expense'; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>




