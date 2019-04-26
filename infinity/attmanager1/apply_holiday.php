<?php
include  $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
//$useridfgt=$_GET['ID'];


?>

<?php include  $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
<style>
a {
  -webkit-transition: .25s all;
  transition: .25s all;
}
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
.form .seperator, .seperator{
    border: 0px;
    border-bottom: 1px dashed #b5babd;}
form{margin-bottom:5px;}
#ipd_display{display:none;}
.form-control{
	margin-bottom: 0.5rem!important;
	border: 0px;
	border-bottom: 1px solid #868e96;
	border-radius: .1rem;}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 1px 2px 8px 0.2rem #dae0e5;}

.form .button_login:hover, .form .button_login:active, .form .button_login:focus {
    box-shadow: 3px 3px 3px 0.2rem #5C885C;}
.form .button_reset:hover, .form .button_reset:active, .form .button_reset:focus {
        box-shadow: 3px 3px 3px 0.2rem #8c6361;}
.form .seperator{
    border: 0px;
    border-bottom: 1px dashed #b5babd;}
.required {
    font-weight: bold;
}
.required:after {
    color: #e32;
    content: ' *';
    display:inline;
}
#profile_img{border-radius: 50%;width:150px;height:150px;margin:auto;}
.wrapper{display:none;}
#fileToUpload{display:none;}
.error select{
color:red;}
.noerror select{
color:#9e9e9e;}
.error::-webkit-input-placeholder {
    color: red;
}
.noerror::-webkit-input-placeholder {
    color: #9e9e9e;
}
@media print {
 
  .section-to-print, .section-to-print * {
    visibility: visible;
  }
  .section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
.hr_seperator{
 	margin-right: 9%;
    margin-left: 9%; 
}
.item-row{
	display:none;
}
div#hiderow {
    display: inline-block;
    position: relative;
    bottom: 48px;
    float: right;
}

a.delete {
    position: relative;
    right: 6%;
    float: right;
    bottom: 150px;
}

.form-group.row.last_row {
    width: -webkit-fill-available;
}
input:not([type='submit']), select, summary, textarea {

    background-color: #fff0!important;
    border-radius: .25rem;
	}
hr.style3 {
	border-top: 1px dashed #8c8b8b;
}	
.easy-autocomplete input {
    border-color: #ccc0;
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-bottom: 1px solid black;
    box-shadow: 0 0px 0px rgba(0,0,0,0.1) inset;
    color: #555;
    float: none;
    padding: 5px;
}
</style>
<?php //include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include  $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
<div class="container" id="reg-form-container" >
	
	<div class="card card-outline-info mb-3" style="margin-top:18px;">
	  <div class="card-block heading_bar">
		<h5><!--title--></h5>
		<a href="#" onclick="goBack()" class="float" title="Click, to go back">
		<i class="fa fa-times my-float"></i>
	</a>
	  </div>
	</div>
	<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
		<div class="card-block" id="print">
			<div class="form-header-group ">
				  <div class="header-text httal htvam">
				  <div class="row">
					<hr class="seperator" width="97%">
					</div>
					<div class="row justify-content-md-center">
						<div class="col-lg-auto">
						<h6>Apply New Holiday</h6>
						</div>
					</div>
					<div class="row">
					<hr class="seperator" width="97%">
					</div>
				  </div>
			</div>
			<br>
			
			<form method="post" action="" class="form " name="add_stock_form"  id="add_stock_form" enctype="multipart/form-data" style="">
				<div class="form-group row ">
				<div class="col-lg-1"></div><label for="date" id="category_type_label" class="col-lg-2 col-form-label " style="/* display:none; */">Has multiple days</label><center><label class="switch"><input type="checkbox"   name="value_active"  data-off-color="default" data-on-color="success" data-on-text="1" onclick="toggleactive(this)" class="make-switch" "><span class="slider round"></span></label></center>
				
				</div>
				
				<div class="form-group row "><!--date-->
					<div class="col-lg-1"></div>
					<label for="date" id="category_type_label" class="col-lg-2 col-form-label " style="/* display:none; */">Date</label>
				  <div class="col-lg-3" style="/* display:none; */">
					<input type="date" class="form-control" id="date" name="date">
					<script>
						var today = new Date();
						var dd = today.getDate();
						var mm = today.getMonth()+1; //January is 0!
						var yyyy = today.getFullYear();
						if(dd<10){
							dd='0'+dd
						} 
						if(mm<10){
							mm='0'+mm
						} 

						today = yyyy+'-'+mm+'-'+dd;
						//document.getElementById("date").setAttribute("max", today);
						document.getElementById("date").setAttribute("min", today);
						document.getElementById("date").value = today;
					</script>
				  </div>
				 
					<label for="date" id="category_type_label1" class="col-lg-2 col-form-label " style="/* display:none; */">To Date</label>
				  <div class="col-lg-3" style="/* display:none; */" id="fromdated">
					<input type="date" class="form-control" id="date1" name="date2">
					<script>
						var today = new Date();
						var dd = today.getDate();
						var mm = today.getMonth()+1; //January is 0!
						var yyyy = today.getFullYear();
						if(dd<10){
							dd='0'+dd
						} 
						if(mm<10){
							mm='0'+mm	
						} 

						today = yyyy+'-'+mm+'-'+dd;
						//document.getElementById("date1").setAttribute("max", today);
						document.getElementById("date1").setAttribute("min", today);
						document.getElementById("date1").value = today;
					</script>
				  </div>
				</div>
				
				
				<div class="form-group row justify-content-center"><!--Brand-->
				  <label for="brand" id="staffname" class="col-lg-2 col-form-label required">Employee Name</label>
				  <div class="col-lg-5">
				  <?php
					  	/* $db = getDB();
											$stmt = $db->prepare("SELECT * from staff_ledger where ID=:userid ");
											$stmt->bindParam(':userid', $useridfgt, PDO::PARAM_STR); */
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
										/* 	$stmt->execute();
											$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
											$count=$stmt->rowCount();
											
											foreach ($results as $resultu)
											{
											$usernameleave= $resultu['firstname'];
											$userlstleave=$resultu['lastname'];
												} */
											
					  ?>
					<input class="form-control noerror" type="text"  placeholder="Employee Name" name="holidayname" value="<?php echo $userDetails->firstname." ".$userDetails->lastname ;?>" id="holidayname"  >
					
				  </div>
				  <div class="col-lg-3">
				  </div>
				</div>
				
				<div class="form-group row justify-content-center"><!--Brand-->
				  <label for="leave_reason" id="leave_reason" class="col-lg-2 col-form-label required">Leave reason</label>
				  <div class="col-lg-5">
					<input class="form-control noerror" type="text"  placeholder="Holiday Name" name="leavereason" value="" id="leavereason"  >
					<input class="form-control noerror" type="text"  placeholder="Holiday Name" name="idforprimary" value="<?php echo $userDetails->user_id; ?>" id="leavereason" hidden >
					
				  </div>
				  <div class="col-lg-3">
				  </div>
				</div>
				
				
				<div class="form-group row justify-content-center"><!--Comment-->
				 <label for="comment" class="col-lg-2 col-form-label ">Comment</label>
					<div class="col-lg-5">
						<textarea class="form-control" id="comment" placeholder="Enter Any additional information here" name="comment" style="width: 100%; resize: none;" maxlength="300"></textarea>
					</div>
					<div class="col-lg-3">
					
					</div>
				</div>
			
				<!------------------->
				<br>
			<div class="row justify-content-center">
				<div class="col-lg-2">
					<input type="submit" class="btn btn-success " name="staff_registration" value="Submit" style="width:150px; "/>
				</div>
				<!--<div class="col-lg-6">
				<center>
					<input type="button" class="btn btn-danger " id="reset_btn" onclick="resetform(add_stock_form)" name="staff_registration" value="Reset" style="width:50%;"/>
				</center>
				</div>-->
			</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
  var labeltodate=document.getElementById('category_type_label1');
  labeltodate.style.display="none";
    var todate=document.getElementById('fromdated');
	 todate.style.display = "none";
  });
	/*------------------------*/
// setSelectValue (id, val) {}is in footer
function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
}	
/* ajax form submission */
/* aData list generator */

                var vendor_list = {
                url: '/stock/get_all_vendors.php',
                list: {
                        match: {
                                enabled: true
                        },sort: {
                                enabled: true
                        }
                    }
            };
            $("#vendor").easyAutocomplete(vendor_list);


/*end data list generator*/
$( "form#add_stock_form" ).on( "submit", function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.
	var formData = new FormData(this);
	console.log("Form data is : "+$(this).serialize());
	var get_url=$(this).serialize();
	//alert("hello world");
    var url = "/attmanager/apply_holiday_setter.php"; // the script where you handle the form input.
	//validateForm(event)
	var test=validateForm(event);
	if (test==true){				//alert("hello in if loop");
			$.ajax({
				   type: "POST",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {	
						console.log("return Data is : "+data);
						if(data!="unsuccesful" && data !="" && data =="1"){
							//swalSuccess(data);//alert
							var todayclear=  new Date();
							var dd = todayclear.getDate();
						var mm = todayclear.getMonth()+1; //January is 0!
						var yyyy = todayclear.getFullYear();
						if(dd<10){
							dd='0'+dd
						} 
						if(mm<10){
							mm='0'+mm	
						} 

						todayclear = yyyy+'-'+mm+'-'+dd;
							document.getElementById("add_stock_form").reset();
							document.getElementById("date").setAttribute("min", todayclear);
							
							
						document.getElementById("date").value = todayclear;
						document.getElementById("date1").setAttribute("min", today);
						document.getElementById("date1").value = todayclear; 
						
							swalSuccess("Leave Assigned Succesfully");//alert
							//on success take form data and enter to any page you require be it IPD or OPD or Patho.
							
							//location.href = "/list_all_tests_registered_pathology.php#1b"
						}else{
							swalError('Some error occured, please try again after some time.');
						}
				   },
					cache: false,
					contentType: false,
					processData: false
				 });
			}else {}
});


/* form submission end here  */
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
var yyyy = today.getFullYear()-14;
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
today = yyyy+'-'+mm+'-'+dd;
//document.getElementById("age-input").setAttribute("max", today);
/*            ----------------------------                      */

function printDiv(divName) {
 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}
/* function validateForm()
{

	return true;
		
} */

 function validateForm() {
    //var patID = document.forms["add_stock_form"]["patID"].value;
   /*   var main_category = document.forms["add_stock_form"]["holidayname"].value;
    
    if (main_category == "" ) {
        swalError("Holiday name must be selected");//alert
		$("#holidayname").focus();
		$("#holidayname").addClass('error').removeClass('noerror');
        return false;
    }
	else{ return true;} */
	return true;
} 


function dropdown_sub_test(parentselect,childselect){
	/* document.querySelector(parentselect).onchange = function(){   
	   alert(this.selectedOptions[0].getAttribute('data-attr')); 
	}; */
parentselect=`#${parentselect}`;
//childselect=`#${childselect}`;
	console.log(`value of ${parentselect}`);
	var amount=$(parentselect).find(':selected').attr('data-amount');
	console.log(`value of ${parentselect} :::::: amount is ${amount} :::: childselectvalue ${childselect}`);
	setValue(childselect,`${amount}`)
	update_price();
	update_balance();
}


function dropdown_sub(parentselect,childselect){
$( "select[name='"+parentselect+"']" ).change(function () {
    var main_test_name = $(this).val();
	console.log(main_test_name);

     if(main_test_name) {
        $.ajax({
			
            url: "/stock/get_type_from_category_id.php",
            Type: 'GET',
            data: {'dr_ID':main_test_name},
            success: function(data) {
                $('select[name="'+childselect+'"]').empty();
				if(data=="[]" || data==""){
					$('select[name="'+childselect+'"]').append('<option value="" disabled selected> No Type Created</option>');
				}else{
					$('select[name="'+childselect+'"]').append('<option value="" disabled selected> Select Type</option>');
					var json = JSON.parse(data);
					for (var i = 0; i < json.length; i++) {
						$('select[name="'+childselect+'"]').append('<option  data-type_id="'+json[i].ID+'" value="'+json[i].type+'">'+json[i].type+'</option>');
					}
				}
				
			}
        });

    }else{
        $('select[name="'+childselect+'"]').empty();
		$('select[name="'+childselect+'"]').append('<option value="" disabled selected> Select test</option>');
    } 
});
}

function setValue (id, val) {
	console.log(`ID is : ${id} ::: value is : ${val}`);
	var test = $("input[id="+id+"]");
	test.val(`${val}`);
	//test.data("Value",`${val}` );
	console.log("ID is : EOL'"+id+"' ::: value is : EOL "+val);
	//document.getElementById(id).value=val;
}
function toggleactive(event){
	var todate=document.getElementById('fromdated');
	 todate.style.display = "none";
	var checkStatus = event.checked ? '1' : '0';
	if(checkStatus==1)
	{
		
		  var labeltodate=document.getElementById('category_type_label1');
  labeltodate.style.display="block";
    var todate=document.getElementById('fromdated');
	 todate.style.display = "block";
		
		}
		else{
		var labeltodate=document.getElementById('category_type_label1');
			labeltodate.style.display= "none";
			todate.style.display = "none";
			
			}
}


</script>

<?php
$pageTitle = "Assign leave"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include  $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>