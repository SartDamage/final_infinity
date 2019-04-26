<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(!$_GET['ID']){}else{$ID=$_GET['ID'];}
?>

<?php include './include/header.php';?>
<script type='text/javascript' src='/invoice/js/example_ipd.js'></script>


<style>

.form_header{
    border-bottom: dashed 1px #d1d0d0;
    padding-bottom: 10px;}
form{margin-bottom:5px;}
#ipd_display{display:none;}
.form-control{
	margin-bottom: 0.5rem!important;
	border: 0px;
	border-bottom: 1px solid #868e96;
	border-radius: .1rem;}
.form-control:focus{
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 4px 4px 0px 0rem #dae0e5;}
.radio:focus {
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 0px 0px 20px 0rem #dae0e5;}

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

.form .button_login:hover, .form .button_login:active, .form .button_login:focus {
    box-shadow: 3px 3px 3px 0.2rem #5C885C;}
.form .seperator, .seperator{
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
input:not([type='submit']), select, summary, textarea {

    background-color: #fff0!important;
    border-radius: .25rem;
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

.float{}
.my-float{}
.textbox{
  width:170px;
}
.button_section{
  margin : 0px;
  border:0px;
}



</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
  <?php include './nav_bartop.php';?>
  <div class="container" id="reg-form-container" style="padding-left:50px;margin-top:15px;">
    <br>
    <form id="cashless_form">

    			<div class="card card-outline-info mb-3">
    			  <div class="card-block heading_bar">
    				      <h5><!--List of all Patients--> <!--title--></h5>
    				    <a href="#" onclick="goBack()" class="float" title="Click, to go back"><i class="fa fa-times my-float"></i></a>
    			  </div>
    			</div>

    		<div class="card card-outline-info mb-3">
    			<div class="card-block" id="print">

    				<!--INSERT HERE-->

                    <div >
                        <br>
                        <center>
                            <h3 class="hr_special"><?PHP ECHO $hos_name;?></h3>
                        </center>
                        <hr class="hr_special">
                        <center><?PHP ECHO $hos_add;?>, <br>  Mob.: <?PHP ECHO $contact;?></center>
                        <hr>
                        <br>
                    </div>

                    <table  class=" table table-borderless" class="Main_summ">
                         <tr>
                            <td>Patient Name:&nbsp;&nbsp;<label id="patient_name_CR"></label></td>
                            <td><input type="text" id="company_name" name="company_name"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Policy NO :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  id="Policy_No_CR" name="Policy_No_CR" class="textbox" /></td>
                            <td><input type="text" id="company_details" name="company_details" maxlength="19" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Card No gmc: &nbsp;&nbsp;<input type="text"  id="card_no_CR" name="card_no_CR" class="textbox"  maxlength="19"/></td>
                            <td>Patient Name:<label  id="patient_name_CR1"></label></td>
                            <td></td>
                        </tr>
                         <tr>
                            <td>AI NO: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="AI_no_CR" name="AI_no_CR" class="textbox" maxlength="19" /></td>
                            <td>Reg. No.&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="Reg_No_CR" name="Reg_No_CR" class="textbox"  maxlength="19"/></td>
                            <td></td>
                        </tr>
                         <tr>
                            <td>DOA:&nbsp;&nbsp;<label  id="DOA_CR"></label>&nbsp;&nbsp;&nbsp; TOA:<label  id="TOA_CR" class="col-2 col-form-label "></label></td>
                            <td>Lot No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="lot_no" name="lot_no" class="textbox" maxlength="19" /></td>
                            <td></td>
                        </tr>
                         <tr>
                            <td>DOD:<label  id="DOD_CR"></label></td>
                            <td>Mfg Dt:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" id="mfg_date" name="mfg_date" class="textbox"></td>
                            <td></td>
                        </tr>
                         <tr>
                            <td>Hospital Reg. No.<input type="text"  id="Hospital_reg_No_CR" name="Hospital_reg_No_CR" class="textbox" maxlength="19"/></td>
                            <td>Expiry Dt: &nbsp;&nbsp;<input type="date" id="exp_date" name="exp_date" class="textbox"></td>
                            <td></td>
                        </tr>
                </table>
                <br>
                <br>
                 <table  class="table table-bordered" class="Main_summ">
                     <tr>
                        <td><input type="text" id="role-input-select" name="patient_name" class="form-control drop_select_print_outline" readonly value="Patient Name"/></td>
                        <td><label for="patient_name_CR" id="regID_label" class="col-2 col-form-label "></td>
                        <td><input type="text" class="form-control-plaintext" name="patient_name_CR2" id="patient_name_CR2" readonly/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="name_of_surgery" class="form-control drop_select_print_outline" readonly value="Name Of Surgery/level"/></td>
                        <td></td>
                        <td><input type="text" class="form-control-plaintext" name="name_of_surgery" id="name_of_surgery/level_CR" readonly/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="Room_type" class="form-control drop_select_print_outline" readonly value="Room Type"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext" name="Room_type" id="Room_type_CR" readonly/></td>
                    </tr>
                     <tr>
                        <th class="text-dark"><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly  value="Package Charges" /></th>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="packgae_charges_CR" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Approx value of consumable to be used" /></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="consumable_used_CR"onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Approx value of investigation/procedures" /></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="investigation_value_CR" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Approx value of pharmacy/medicine"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="pharmacy/medicine_value_CR" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="ICU stay(per day cost)"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="ICU_stay_CR" onkeypress="return isNumberKey(event);"></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Room stay"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="Room_stay_CR" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Nursing Charges"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="Nursing_charges" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Doctors visit"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="doctors_charges" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Associate surgeon charges"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="associate_charges" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Anesthesia charges"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="Anesthesia_charges_CR" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="OT charges"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="OT_charges_CR" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Assistant charges"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="Assistant_charges_CR" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Scope & Harmonic charges"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="Scope_Harmonic_charges_CR" onkeypress="return isNumberKey(event);"/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Medicines charges"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="Medicines_charges_CR" onkeypress="return isNumberKey(event);" /></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Non-medical"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="Non_medical_CR" onkeypress="return isNumberKey(event);" /></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="role-input-select" name="particulars[]" class="form-control drop_select_print_outline" readonly value="Instrument charges"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext price" name="cost[]" id="Instrument_charges_CR" onkeypress="return isNumberKey(event);" /></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="subtotal1" name="subtotal1" class="form-control drop_select_print_outline" readonly value="Estimated cost(Approx in Rs)"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext subtotal" name="subtotal" id="subtotal" readonly/></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="service_tax1" name="service_tax1" class="form-control drop_select_print_outline" readonly value="Service tax @10.3"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext" name="service_tax" id="service_tax" readonly /></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="total_cost1" name="total_cost1" class="form-control drop_select_print_outline" readonly value="Total Approx cost"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext" name="total_cost" id="total_cost" readonly /></td>
                    </tr>
                     <tr>
                        <td><input type="text" id="Amount_in_words1" name="Amount_in_words1" class="form-control drop_select_print_outline" readonly value="Amount in words"/></td>
                        <td></td>
                        <td><input type="text"  class="form-control-plaintext" name="Amount_in_words" id="Amount_in_words" readonly /></td>
                    </tr>
                     <tr >
                        <td>Patient's Sign</td>
                        <td></td>
                        <td>Hospital Stamp and Seal</td>
                    </tr>
                     <tr>
                        <td rowspan="2"><br><div></div></td>
                        <td rowspan="2"><br><dir></dir></td>
                        <td rowspan="2"><br><dir></dir></td>
                        <input type="hidden" id="pat_main_id" name="pat_main_id" value="<?php echo $ID;?>" />
                        <input type="hidden" id="reg_hidden_id" name="reg_hidden_id" value="<?php echo $_GET['regid'];?>" />
                        <input type="hidden" id="receipt_hidden_id" name="receipt_hidden_id" value="<?php echo $_GET['receipt_id'];?>" />
                        <input type="hidden" id="hidden_discount" name="hidden_discount" value="0.00" class="discount" />
                        <input type="hidden" id="advance" name="hidden_advance" value="0.00" class="advance" />
                        <input type="hidden" id="paid" name="hidden_paid" value="0.00" class="paid" />
                    </tr>
                    <tr>
                    </tr>

                    </table>

    				<!--INSERT HERE-->

    			</div>
        </div>
     <!--insert here-->
     <div class="card card-outline-info mb-3 section-notto-print  Authorized_by button_section" style="margin-bottom: 3rem;margin-top: 1rem" id="hide_bar">
       <div class="card-block" >
         <div class="container">
           <div class="row justify-content-center">
               <div class="col-md-2">
               <div id='page-wrap'>
               <label>Discount Authorized by</label>
             </div>
             </div>
             <div class="col-md-4">
               <select name="tl_doctor" class="form-control col-6" id="doctor" style="height: 44px;">
                     <option value="" disabled selected>Select Doctor</option>
                     <?php
             $db = getDB();
             $statement=$db->prepare("SELECT ID,firstname,lastname FROM  staff_ledger  WHERE `roleid`=2 order by WhenEntered desc");

             $statement->execute();
             $results=$statement->fetchAll();
             //$json=json_encode($results);
             //return $json;
             //$str = 'In My Cart : 11 12 items';
             foreach($results as $row) {
             echo "<option value=" . $row['ID'] . ">".$row['firstname'].' '. $row['lastname'] . "</option>";
             }
             $db=null;
               /* */?>
               </select>
             </div>

             <div class="col-md-2 do-not-print button_section">
               <label for="vt_remark" id="vt_remark_lable"> Discount Amount:</label>
             </div>
             <div class="col-md-4 do-not-print button_section price">
             <input class="form-control noerror" type="text"  placeholder="Remark" name="vt_remark" value="" id="remark"/ onkeypress="return isNumberKey(event);">
           </div>
           </div>
         </div>
       </div>
     </div>


        <div class="card card-outline-info mb-3 do-not-print button_section" style="margin-bottom: 3rem;margin-top: 1rem;">
          <div class="card-block" >
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-2">
                  <button type="Submit" class="btn btn-outline-teal" id="button_save_reciept" href="javascript:void(0)" style=""> <i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Save</button>
                </div>
                <div class="col-md-2">
                  <button class="btn btn-outline-danger" id="button_print" onclick="printreport('print')" > <i class="fa fa-print fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Print </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
      </form>
    </div>
</div>


<!----------------------------------------------------------->
<!----------------------------------------------------------->
<script>

var $value="<?php echo $ID?>";

// $.ajax({
// 			   type: "GET",
// 			   url: <?php echo $get_patient_detail_by_regID; ?>,//from global_variable
// 			   data: {ID: $value},
// 			   success: function(data)
// 			   {
// 					var json = JSON.parse(data);
// 					//alert(json);
// 					//alert("hello in ajax success loop");
// 				  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
// 				  //location.href = "./home.php"
// 						//var json = data;
// 					//	console.log(json);
// 					parseJsonToform(json);
// 					//alert(data);
// 					//$value=$value+10;
// 			 }
//
//
//
//         });

	// the script where you handle the table input.
	$.ajax({
		   type: "GET",
		   url: <?php echo $get_registrered_patients_all_instance; ?>,//from global_variable
		   data: {ID: $value}, //serializes the form's elements.
		   success: function(data)
		   {
				var json = JSON.parse(data);
				//alert(json);
				//alert("hello in ajax success loop");
			  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
			  //location.href = "./home.php"
					//var json = data;
				//	console.log(json);
				parseJsonToTable_registered_instance(json);
				//$value=$value+10;
		 }



        });
function parseJsonToform(json){
	//document.getElementById("tel-input").value=json.Mobile;
	setSelectValue("tel-input",json.Mobile);
	document.getElementById("header_1").innerHTML = ""+json.FirstName+"&nbsp" +json.LastName;
	var date = json.WhenEntered;
				var time = date.substring(11,20);
				var date = date.substring(0,11);
				var date= date.split("-").reverse().join("-");
				var date= date.split(" ").join("")
	document.getElementById("date_registered").innerHTML = "Date Registered :&nbsp" +date+ " on "+time;
	//setSelectValue("header_1",json.FirstName+json.LastName);
}
// setSelectValue (id, val) {}is in footer



/*function showDetails(pat_id_row) {
	var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(pat_id_row);
	var Cells = Row.getElementsByTagName("td");
	//var ID= button.getAttribute("data-uid");
	//var ID="12";
	//alert(ID);
	window.location="<?php// echo $update_patient_opd;?>ID="+pat_type+"";
}*/
/* function clickedbutton(button){
	var ID= button.getAttribute("data-uid");
	var patient_type= button.getAttribute("data-pat_type");
	if(patient_type=="OPD"){
		window.location="./OPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="IPD"){
		window.location="./IPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="Pathology"){
		window.location="./IPD_patient_detail_printable.php?ID="+ID;
	}
		if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
} */
function clickedbutton(button){
	var ID= button.getAttribute("data-uid");
	var patient_type= button.getAttribute("data-pat_type");
	if(patient_type=="OPD"){
		window.location="/OPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="IPD"){
		window.location="/IPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="Pathology"){
		var patho_scname= button.getAttribute("data-patho_scname");
		//window.location="/IPD_patient_detail_printable.php?ID="+ID;
		view_report(patho_scname,ID)
	}
		if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
}
function view_report(patho_scname,ID){
/* patho_scname= patho_scname.replace(/[&\/\\#,+.()$~%--'":*?<>{}]+/g, "_");
patho_scnamerevised=patho_scname.replace(/[\s]+/g, ""); */
patho_scname= patho_scname.replace(/[\s]+/g, "");
patho_scname= patho_scname.replace(/[\+\/]+/g, "_");
patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.\-'":*?<>{}\s]+/g, "");
//var ID="12";
console.log("ID : "+ID);
console.log("patho_mcid : "+patho_scname);
console.log("patho_scnamerevised : "+patho_scname);
//window.location="./update_patient_form.php?ID="+ID+"";
/* for bubble propogation */
var url="/Reports/"+patho_scname+"REPORT.php?ID="+ID;
console.log(url);
//var win = window.open(url, '_blank');
$("#myModal_report").modal('show');
$('.modal-body').load(url,function(){

});
//win.focus();
if (!e) var e = window.event;
e.cancelBubble = true;
if (e.stopPropagation) e.stopPropagation();
/* end stopping bubble propogation */
}


$(document).ready(function() {
  var url="/get_patient_details_in_cashless.php";
    $.ajax({
      type: "POST",
      url: url,
      data: {ID: $value}, //serializes the form's elements.
      success: function(data)
      {
        console.log(data);
        var json = JSON.parse(data);
        populate_form(json);
      }
    });

    var url="/get_patient_particulars_details.php";
      $.ajax({
        type: "POST",
        url: url,
        data: {ID: $value}, //serializes the form's elements.
        success: function(data)
        {
          console.log(data);
          var json = JSON.parse(data);

          populate_form_details(json);
        }
      });
});

function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
        return true;
}

function populate_form_details(json){
  for(var i=0;i<json.length;i++){

      for(var j=0;j<json[i].Test.length;j++){

      switch(json[i].Test[j].particulars){
        case "Package Charges":
          document.getElementById('packgae_charges_CR').value=json[i].Test[j].amount;
          break;
        case "Approx value of consumable to be used":
          document.getElementById('consumable_used_CR').value=json[i].Test[j].amount;
          break;

        case "Approx value of investigation/procedures":
          document.getElementById('investigation_value_CR').value=json[i].Test[j].amount;
          break;
        case "Approx value of pharmacy/medicine":
          document.getElementById('pharmacy/medicine_value_CR').value=json[i].Test[j].amount;
          break;
        case "ICU stay(per day cost)":
          document.getElementById('ICU_stay_CR').value=json[i].Test[j].amount;
          break;
        case "Room stay":
          document.getElementById('Room_stay_CR').value=json[i].Test[j].amount;
          break;
        case "Nursing Charges":
          document.getElementById('Nursing_charges').value=json[i].Test[j].amount;
          break;
        case "Doctors visit":
          document.getElementById('doctors_charges').value=json[i].Test[j].amount;
          break;
        case "Associate surgeon charges":
          document.getElementById('associate_charges').value=json[i].Test[j].amount;
          break;
        case "Anesthesia charges":
          document.getElementById('Anesthesia_charges_CR').value=json[i].Test[j].amount;
          break;
        case "OT charges":
          document.getElementById('OT_charges_CR').value=json[i].Test[j].amount;
          break;
        case "Assistant charges":
          document.getElementById('Assistant_charges_CR').value=json[i].Test[j].amount;
          break;
        case "Scope & Harmonic charges":
          document.getElementById('Scope_Harmonic_charges_CR').value=json[i].Test[j].amount;
          break;
        case "Medicines charges":
          document.getElementById('Medicines_charges_CR').value=json[i].Test[j].amount;
          break;
        case "Non-medical":
          document.getElementById('Non_medical_CR').value=json[i].Test[j].amount;
          break;
        case "Instrument charges":
          document.getElementById('Instrument_charges_CR').value=json[i].Test[j].amount;
          break;
      }

      document.getElementById('subtotal').value=json[i].cost;
      var subtotal=document.getElementById('subtotal').value;
      var service_tax = (subtotal*10.3)/100;
      var main_service_tax=parseFloat(service_tax.toFixed(2));
      //alert(service_tax);
      document.getElementById('service_tax').value=main_service_tax;
      var total=parseFloat(service_tax)+parseInt(subtotal);

      document.getElementById('total_cost').value=Math.round(total);
      var amount=document.getElementById('total_cost').value;
      //alert(amount);
      //debugger;
      convertNumberToWords(amount);
       document.getElementById('company_name').value=json[i].comapny_name;
       document.getElementById('company_details').value=json[i].company_detail;
       document.getElementById('Reg_No_CR').value=json[i].reg_no;
       document.getElementById('lot_no').value=json[i].lot_no;
       document.getElementById('mfg_date').value=json[i].mfg_dt;
       document.getElementById('exp_date').value=json[i].exp_dt;
       document.getElementById('Policy_No_CR').value=json[i].policy_no;
       document.getElementById('card_no_CR').value=json[i].card_no_gmc;
       document.getElementById('AI_no_CR').value=json[i].AI_no;
       document.getElementById('Hospital_reg_No_CR').value=json[i].Hospital_reg_no;
       document.getElementById('doctor').value=json[i].authorized_doctor;
       document.getElementById('remark').value=json[i].remark;

  }
  }
}


$(".price").change(function(){
  //debugger;
  update_total_for_cashless();
 //  debugger;
  var subtotal=document.getElementById('subtotal').value;
  var service_tax = (subtotal*10.3)/100;
  var main_service_tax=parseFloat(service_tax.toFixed(2));
  var discount = document.getElementById('remark').value;
  if(discount == '' || discount == null || discount == undefined){
    discount = '0';
  }
  //alert(service_tax);
  document.getElementById('service_tax').value=main_service_tax;
  var total=parseFloat(service_tax)+parseInt(subtotal)-parseInt(discount);

  document.getElementById('total_cost').value=Math.round(total);
  var amount=document.getElementById('total_cost').value;
  //alert(amount);
  //debugger;
  convertNumberToWords(amount);
});

function convertNumberToWords(amount) {
        var words = new Array();
        words[0] = '';
        words[1] = 'One';
        words[2] = 'Two';
        words[3] = 'Three';
        words[4] = 'Four';
        words[5] = 'Five';
        words[6] = 'Six';
        words[7] = 'Seven';
        words[8] = 'Eight';
        words[9] = 'Nine';
        words[10] = 'Ten';
        words[11] = 'Eleven';
        words[12] = 'Twelve';
        words[13] = 'Thirteen';
        words[14] = 'Fourteen';
        words[15] = 'Fifteen';
        words[16] = 'Sixteen';
        words[17] = 'Seventeen';
        words[18] = 'Eighteen';
        words[19] = 'Nineteen';
        words[20] = 'Twenty';
        words[30] = 'Thirty';
        words[40] = 'Forty';
        words[50] = 'Fifty';
        words[60] = 'Sixty';
        words[70] = 'Seventy';
        words[80] = 'Eighty';
        words[90] = 'Ninety';
        amount = amount.toString();
        var atemp = amount.split(".");
        var number = atemp[0].split(",").join("");
        var n_length = number.length;
        var words_string = "";
        if (n_length <= 9) {
            var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
            var received_n_array = new Array();
            for (var i = 0; i < n_length; i++) {
                received_n_array[i] = number.substr(i, 1);
            }
            for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
                n_array[i] = received_n_array[j];
            }
            for (var i = 0, j = 1; i < 9; i++, j++) {
                if (i == 0 || i == 2 || i == 4 || i == 7) {
                    if (n_array[i] == 1) {
                        n_array[j] = 10 + parseInt(n_array[j]);
                        n_array[i] = 0;
                    }
                }
            }
            value = "";
            for (var i = 0; i < 9; i++) {
                if (i == 0 || i == 2 || i == 4 || i == 7) {
                    value = n_array[i] * 10;
                } else {
                    value = n_array[i];
                }
                if (value != 0) {
                    words_string += words[value] + " ";
                }
                if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Crores ";
                }
                if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Lakhs ";
                }
                if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Thousand ";
                }
                if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                    words_string += "Hundred and ";
                } else if (i == 6 && value != 0) {
                    words_string += "Hundred ";
                }
            }
            words_string = words_string.split("  ").join(" ");
            document.getElementById('Amount_in_words').value=words_string;
        }
        return words_string;
    }

function populate_form(json){
  for(var i=0;i<json.length;i++){
    document.getElementById('patient_name_CR').innerHTML=json[i].FirstName+'&nbsp;'+json[i].LastName;
    document.getElementById('DOA_CR').innerHTML=json[i].admit_date_time;
    document.getElementById('DOD_CR').innerHTML=json[i].discharge_date_time;
    document.getElementById('patient_name_CR1').innerHTML=json[i].FirstName+'&nbsp;'+json[i].LastName;
    document.getElementById('patient_name_CR2').value=json[i].FirstName+"  "+json[i].LastName;
    document.getElementById('Room_type_CR').value=json[i].bed_type;
    var surgery_name=json[i].surgery;
    //alert(surgery_name)
    if(surgery_name==null || surgery_name == ""){
      document.getElementById('name_of_surgery/level_CR').value="";
    }else{

      document.getElementById('name_of_surgery/level_CR').value=surgery_name;
    }
  }
}
$("#cashless_form").on("submit",function(event){
  event.preventDefault();
  //var formData=$(this).serialize();
  var formData = new FormData(this);
  console.log("Form data is : "+formData);
  var url="/set_cashless_receipt.php";
  $.ajax({
    type: "POST",
    url:url,
    data: formData,
    success: function(data){

      //swalSuccess("success");

    },
   cache: false,
   contentType: false,
   processData: false
  });
});
</script>
<?php
$pageTitle = "Cashless Receipt"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
