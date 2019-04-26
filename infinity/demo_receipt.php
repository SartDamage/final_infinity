<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
 if(isset($_GET['ID'])){$ID=$_GET['ID'];}
 if(isset($_GET['RegistrationID'])){$RegID=$_GET['RegistrationID'];}
 if(isset($_GET['recieptID'])){$recieptID=$_GET['recieptID'];}
 ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
	<link rel='stylesheet' type='text/css' href='/invoice/css/style.css'/>
	<link rel='stylesheet' type='text/css' href='/invoice/css/print.css' media="print"/>
	<script type='text/javascript' src='/invoice/js/example_ipd.js'></script>
	<link href="/dist/css/report.css" rel="stylesheet"/>
	<link href="/dist/css/AdminLayout.css" rel="stylesheet"/>
<style>
body{background:#f1f1f1;}
table{border:0px}
.hmms_hdr_rgt table td, table th ,.hmms_hdr_lft table td, table th {border: 0px solid #808080;padding: 0px;}
@media print {


	.section-notto-print, .section-notto-print * {
		visibility:none;
		display:none;
	}
	#qrcode{
		    margin-top: 5%;
	}
  .section-to-print, .section-to-print * {
    visibility: block;
  }
  .section-to-print {
	padding:10px!important;
	margin-top:5px;
    position: absolute;
    left: 0;
    top: 0;
  }
  .cke_top, .print_invisible{
		visibility:none;
		display:none!important;
	}
	.button_section{
		margin : 0px;
		border:0px;
	}
	.print_padding_letterhead{
		margin-top:15%;
	}
}
</style>

<body>
<div class="container" id="reg-form-container" style="padding-left:50px;margin-top:15px;">

                <div class="card card-outline-info mb-3 section-notto-print">
                  <div class="card-block heading_bar">
                  	<h5><!--List of all Patients--> <!--title--></h5>
                  		<a href="#" onclick="goBack()" class="float" title="Click, to go back">
                  			<i class="fa fa-times my-float"></i>
                 			</a>
                	</div>
               </div>
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
			<div id='DivIdToPrint'>
			<textarea id="header">Receipt</textarea>
         <form id="demo_form">
             <div class="card card-outline-info mb-3">
              <div class="card-block" id="print">
                <!--INSERT HERE-->
								<div class="row header_detail">
									<div class="hmms_hdr_lft col-md-6">
										<table>
											<tr>
												 <td>Patient ID</td>
												<td>:</td>
												<td class="font-RobotoBold"><span id="ctl00_lblpatid"></span></td>

											</tr>
											<tr>
												<td>Patient Name</td>
												<td>:</td>
												<td class="font-RobotoBold"><span id="ctl00_lblpatientname"></span></td>
											</tr>
											<tr>
												<td>Doctor assigned</td>
												<td>:</td>
												<td><span id="ctl00_lbldrname"></span></td>
											</tr>
											<tr>
												<td>Age/Sex</td>
												<td>:</td>
												<td><span id="ctl00_lblage_sex"></span></td>
											</tr>
										</table>
									</div>
									<div class="hmms_hdr_rgt col-md-6">
										<table>

											<tr>
												<td>Admit. Date</td>
												<td>:</td>
												<td><span id="ctl00_lblregdate"></span></td>
											</tr>
											<tr>
												<td>Bill Date</td>
												<td>:</td>
												<td><span id="ctl00_lbltodaydate"></span></td>
											</tr>
											<tr>

											</tr>
											<tr>
												<td>Reg. Label</td>
												<td>:</td>
												<td><img id="barcode1"/></td>
											</tr>
											<tr>
												<td>Receipt ID</td>
												<td>:</td>
												<td class="font-RobotoBold"><span id="ctl00_lblrecid">&nbsp;&nbsp;</span><input type="text" hidden class="reciept_id" name="reciept_id" id="reciept_id" value="<?php echo $_GET['receipt_id'];?>"/></td>
											</tr>
										</table>
									</div>
									<input type="hidden" name="ctl00_reportmaster_AdminID" id="ctl00_reportmaster_AdminID" value="<?php echo (base64_encode($userDetails->ID));  ?>"/>
									<input type="hidden" name="ctl00_RegID" id="ctl00_RegID"  value="" />
									<input type="hidden" name="ctl00_PatID" id="ctl00_PatID"  value="" />
								</div>

                <table  class="table table-bordered Main_summ">
                  <tr class="head_table">
                    <th colspan="2">&nbsp;Particulars</th>
                    <th>&nbsp;Cost</th>
                    <th>&nbsp; No.of Days </th>
                    <th>&nbsp;Amount</th>
                  </tr>
                  <tr>
                     <tr class="item-row " id="">
                        <td class="item-name" colspan="2">
                            <div class="delete-wpr">
          <!--<div id="sex-input" class="form-input col-12">-->


                             <input  name="particulars[]" list="role" class="form-control role-input-select drop_select_print_outline"  value="Bed Charges"  id="role-input-select" readonly />

          <!--</div>-->

                            </div>
                        </td>
                        <td>
                       <input  type="text" id="Bed_charges_cost" name="cost[]" class="cost form-control" placeholder="00.00" onkeypress="return isNumberKey(event);" maxLength="15"/><!--readonly="readonly" tabindex="-1"-->
                       </td>
                       <td>
                          <input type="text" name="qty[]" id="bed_charges_qty" oninput="update_the_price()" class="qty form-control" onkeypress="return isNumberKey(event);" maxLength="15"/>
                       </td>
                        <td>
                          <span>₹</span>
                            <input type="text" id="bed_chargers_price" name="price[]" class="price" placeholder="00.00" value="" onkeypress="return isNumberKey(event);" maxLength="15" readonly/>
                        </td>
                      </tr>

                     <tr class="item-row " id="">
                         <td class="item-name" colspan="2">
                            <div class="delete-wpr">
          <!--<div id="sex-input" class="form-input col-12">-->

                             <input  name="particulars[]" list="role" class="form-control role-input-select drop_select_print_outline"  value="Nursing Charges"  id="role-input-select" readonly />

                            </div>
                        </td>
                        <td>
                       <input  type="text" id="nursing_chargers_cost" name="cost[]" class="cost form-control" placeholder="00.00"onkeypress="return isNumberKey(event);" maxLength="15" /><!--readonly="readonly" tabindex="-1"-->
                       </td>
                       <td>
                          <input type="text" name="qty[]" id="nursing_chargers_qty" oninput="update_the_price()" class="qty form-control" onkeypress="return isNumberKey(event);" maxLength="15"/>
                       </td>
                        <td>
                          <span>₹</span>
                            <input type="text" id="nursing_chargers_price" name="price[]" class="price" placeholder="00.00" value="" onkeypress="return isNumberKey(event);" maxLength="15" readonly />
                        </td>
                      </tr>

                 <tr class="item-row " id="">
                        <td class="item-name" colspan="2">
                            <div class="delete-wpr">
          <!--<div id="sex-input" class="form-input col-12">-->

                             <input  name="particulars[]" list="role" class="form-control role-input-select drop_select_print_outline"  value="Doctor's Visit"  id="role-input-select" readonly />

          <!--</div>-->

                            </div>
                        </td>
                        <td>
                       <input  type="text" id="doctors_visit_cost" name="cost[]" class="cost form-control" placeholder="00.00" onkeypress="return isNumberKey(event);" maxLength="15" /><!--readonly="readonly" tabindex="-1"-->
                       </td>
                       <td>
                          <input type="text" name="qty[]" id="doctors_visit_qty" oninput="update_the_price()" class="qty form-control" onkeypress="return isNumberKey(event);" maxLength="15" />
                       </td>
                        <td>
                          <span>₹</span>
                            <input type="text" id="doctors_visit_price" class="price" name="price[]" class="price" placeholder="00.00" value="" onkeypress="return isNumberKey(event);" maxLength="15" readonly />
                        </td>
                      </tr>

                 <tr class="item-row " id="">
                        <td class="item-name" colspan="2">
                            <div class="delete-wpr">
          <!--<div id="sex-input" class="form-input col-12">-->

                             <input  name="particulars[]" list="role" class="form-control role-input-select drop_select_print_outline"  value="RMO Charges"  id="role-input-select" readonly />

          <!--</div>-->

                            </div>
                        </td>
                        <td>
                       <input  type="text" id="rmo_chargers_cost" name="cost[]" class="cost form-control" placeholder="00.00" onkeypress="return isNumberKey(event);" maxLength="15" /><!--readonly="readonly" tabindex="-1"-->
                       </td>
                       <td>
                          <input type="text" name="qty[]" id="rmo_chargers_qty" oninput="update_the_price()" class="qty form-control" onkeypress="return isNumberKey(event);" maxLength="15" />
                       </td>
                        <td>
                          <span>₹</span>
                            <input type="text" id="rmo_chargers_price" name="price[]" class="price" placeholder="00.00" value="" onkeypress="return isNumberKey(event);" maxLength="15" readonly />
                        </td>
                      </tr>

                  <tr class="item-row " id="">
                        <td class="item-name" colspan="2">
                            <div class="delete-wpr">
                             <input  name="particulars[]" list="role" class="form-control role-input-select drop_select_print_outline"  value="Admission Fees"  id="role-input-select" readonly />
                           </div>
                        </td>
                        <td>
                       <input  type="text" id="adm_fees_cost" name="cost[]" class="cost form-control" placeholder="00.00" onkeypress="return isNumberKey(event);" maxLength="15" /><!--readonly="readonly" tabindex="-1"-->
                       </td>
                       <td>
                          <input type="text" name="qty[]" id="adm_fees_qty" oninput="update_the_price()" class="qty form-control" onkeypress="return isNumberKey(event);" maxLength="15" />
                       </td>
                        <td>
                          <span>₹</span>
                            <input type="text" id="adm_fees_price" name="price[]" class="price" placeholder="00.00" value="" onkeypress="return isNumberKey(event);" maxLength="15" readonly/>
                        </td>
                      </tr>
                  </tr>


                  <tr class="item-row " id="table_row_template" hidden>
                        <td class="item-name" colspan="2">
                            <div class="delete-wpr">
          <!--<div id="sex-input" class="form-input col-12">-->

                              <a class="delete" href="javascript:;" title="Remove row">X</a>
                             <input  name="parameter" list="role" class="form-control role-input-select drop_select_print_outline"  value=""  id="role-input-select" />

          <!--</div>-->

                            </div>
                        </td>
                        <td>
                       <input  type="text" id="cost" name="cost[]" class="cost form-control" placeholder="00.00" onkeypress="return isNumberKey(event);" maxLength="15" /><!--readonly="readonly" tabindex="-1"-->
                       </td>
                       <td>
                          <input type="text" name="qty[]" oninput="update_the_price()" class="qty form-control" value="" onkeypress="return isNumberKey(event);" maxLength="15" />
                       </td>
                        <td>
                          <span>₹</span>
                            <input type="text" id="price" name="price[]" class="price" placeholder="00.00" value="" onkeypress="return isNumberKey(event);" maxLength="15"/>
                        </td>
                      </tr>
                  <!-- <tr id="hiderow">
                        <td colspan="5"><a id="addrow" class="pull-right" title="Add a row"><i class="fal fa-plus-square fa-2x add_row" aria-hidden="true"></i></a></td>
                  </tr> -->
                  <tr>
                    <td><br/><br/></td>
                  </tr>
                  <tr>
            		      <td colspan="3" class="blank">Payment type : </td>
            		      <td colspan="1" class="total-line">Subtotal</td>
            		      <td class="total-value"><div class="row" style="margin:0px;"><span>₹</span><input class="subtotal" id="subtotal" name="subtotal" placeholder="0.00" readonly/><div></td>
            		  </tr>
                  <tr>
                      <td colspan="3" class="blank">
                    <div class="form-group  row justify-content-md-center" style="margin-left:0px;margin-right:0px;margin-bottom:0px;">
                      <label class="form-check-label col-2">
                      <input class="form-check-input" type="radio" id="cash" name="paymenttype" value="cash"> Cash
                      </label>
                      <label class="form-check-label col-3">
                      <input class="form-check-input" type="radio" id="cheque" name="paymenttype" value="cheque"> Cheque
                      </label>
                      <label class="form-check-label col-6">
                      <input class="form-check-input " type="radio" id="electronic" name="paymenttype" value="electronic"> Net banking/card payment
                      </label>
                    </div>
                    </td>
                      <td colspan="1" class="total-line">Total</td>
                      <td class="total-value"><span>₹</span><input type="text" name="total" id="total" placeholder="00.00" value="" readonly="readonly"></td>
                  </tr>
                  <tr>
                      <td colspan="3" class="blank">
                    <div class="row justify-content-md-center">
                      <div class="show-me-cheque col-10" style='display:none'>
                        <div class="row justify-content-md-center">
                          <label class="col-4 col-form-label required" for="cheque_number" >cheque number</label>
                          <div class=" col-8 ">
                            <input class="form-control noerror" type="Text" value="" name="cheque_number" placeholder="enter cheque Number" id="cheque_number" autocomplete="off" onkeypress="return isNumberKey(event);" maxlength="15" >
                          </div>
                        </div>
                      </div>
                      <div class="show-me-neft col-10" style='display:none'>
                        <div class="row justify-content-md-center">
                          <label class="col-4 col-form-label required" for="elctronic_number">reference number</label>
                          <div class=" col-8">
                            <input class="form-control noerror" type="Text" value="" name="elctronic_number" placeholder="enter reference Number" id="elctronic_number" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="20" >
                          </div>
                        </div>
                      </div>
                    </div>
                    </td>
                      <td colspan="1" class="total-line">Discount</td>
                      <td class="total-value"><span>₹</span><input type="text" class="discount" name="discount" id="discount" onkeypress="return isNumberKey(event);" onkeyup="discount_function(this);"   placeholder="00.00" value="" maxLength="15"></td>
                  </tr>
                  <tr>
                      <td colspan="3" class="blank"> </td>
                      <td colspan="1" class="total-line">Advance paid</td>
                      <td class="total-value"><span>₹</span><input type="text" name="advance" id="advance" placeholder="00.00" value="" onkeypress="update_total();return isNumberKey(event)"></td>
                  </tr>
                 <tr>
                      <td colspan="3" class="blank"> </td>
                      <td colspan="1" class="total-line">Amount Paid</td>
                      <td class="total-value"><span>₹</span><input type="text" name="paid" id="paid" placeholder="00.00" value="" onkeypress="return isNumberKey(event)" maxLength="15"></td>
                  </tr>
                  <tr>
                      <td colspan="3" class="blank"> </td>
                      <td colspan="1" class="total-line balance">Balance Due</td>
                      <td class="total-value balance"><input id="due" name="due" readonly class="due" value="0.00"/></td>
                  </tr>


                </table>
        <!--INSERT HERE-->
        <div class="row">
          <div class="col-5"></div>
          <div class="col-7">
            <input type="hidden" id="pat_main_id" name="pat_main_id" value="<?php echo $ID;?>" />
            <input type="hidden" id="reg_hidden_id" name="reg_hidden_id" value="<?php echo $_GET['regid'];?>" />
            <input type="hidden" id="receipt_hidden_id" name="receipt_hidden_id" value="<?php echo $_GET['receipt_id'];?>" />
          </div>
        </div>
      </div>
      </div>

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

              <div class="col-md-1 do-not-print button_section">
                <label for="vt_remark" id="vt_remark_lable">Remark:</label>
              </div>
              <div class="col-md-5 do-not-print button_section">
              <input class="form-control noerror" type="text"  placeholder="Remark" name="vt_remark" value="" id="remark"/>
            </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card card-outline-info mb-3 section-notto-print button_section" style="margin-bottom: 1rem;">
        <div class="card-block" >
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-2">
                <button type="Submit" class="btn btn-outline-teal" id="button_save_reciept" href="javascript:void(0)" style=""> <i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Save</button>
              </div>
              <div class="col-md-2">
                <button class="btn btn-outline-danger" onclick="window.print();" id="button_print"> <i class="fa fa-print fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Print </button>
              </div>
            </div>
          </div>
        </div>
      </div>
          <br>
        </div>
        </div>
</form>
</div>
</div>
</body>
<!----------------------------------------------------------->
<!----------------------------------------------------------->
<script>

$receipt_id = "<?php echo $_GET['receipt_id'];?>"
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
// function printDiv()
// {
//
//   var divToPrint=document.getElementById('DivIdToPrint');
//
//   var newWin=window.open('','Print-Window');
//
//   newWin.document.open();
//
//   newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
//
//   newWin.document.close();
//
//   setTimeout(function(){newWin.close();},10);
//
// }
var ID='<?php echo base64_encode($ID);?>';
$.get("<?php echo BASE_URL;?>get_patient_detail_by_ipd_ID.php", /*Required URL of the page on server*/
		{ID:ID}, /* Data Sending With Request To Server*/
function(response,status){ /* Required Callback Function*/
			console.log(response);
			var json = JSON.parse(response);
			parseJsonToForm1(json);
});
/*setSelectValue (id, val) {}is in footer*/
function setInnerValue (id, val) {
	console.log("ID is : '"+id+"' ::: inner value is : "+val);
	document.getElementById(id).innerHTML=val;
}
function setValue (id, val) {
	console.log("ID is : '"+id+"' ::: value is : "+val);
	$("input[id="+id+"]").val(val)
	console.log("ID is : EOL'"+id+"' ::: value is : EOL "+val);
	/*document.getElementById(id).value=val;*/
}
function parseJsonToForm1(json){



		var name = json.FirstName+"&nbsp"+json.LastName;
		var age_sex = json.Age+" / "+json.Gender;

		var date_visit = json.admit_date_time;
		var date_visit = date_visit.substring(0,11);
		var date_visit = date_visit.split('-').reverse().join('/');
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; /*January is 0!*/
		var yyyy = today.getFullYear();
		if(dd<10) {dd = '0'+dd}
		if(mm<10) {mm = '0'+mm}
		today = dd + '/' + mm + '/' + yyyy;
		/* if(!doctor_assigned){doctor_assigned="N.A.";} *//* else{doctor_assigned = doctor_assigned;} */
		console.log(name+"::"+age_sex+"::::"+date_visit+"::"+json.patientID+"::"+json.RegID);
		/*document.getElementById(ctl00_lblpatid).innerHTML=json.patientID;*/
		setInnerValue('ctl00_lblpatid', json.patientID);
		setInnerValue('ctl00_lblpatientname', name);

		/*setInnerValue('ctl00_lblconsdr',doctor_assigned);*//*setInnerValue('ctl00_lblregID', json.RegistrationID);*/
		JsBarcode('#barcode1', json.RegID,{height:20,font:"Roboto",displayValue:true,margin:0,fontSize:10});
		setInnerValue('ctl00_lblregdate',date_visit);
		setInnerValue('ctl00_lbltodaydate',today);
		/*setInnerValue('ctl00_lblregdate1',date_visit);*/
		setInnerValue('ctl00_lblage_sex',age_sex);
		/*setInnerValue('ctl00_lblsample',sample);*/
		setValue('ctl00_RegID',json.RegID);
		setValue('ctl00_PatID',json.patientID);
		Dr_name(json.doctor_assigned);
}
function Dr_name(staffID){
	$.get("/invoice/get_drname_by_staffid.php",{ID:staffID},function(response,status){var doctor_assigned = `Dr. ${response}`;setInnerValue('ctl00_lbldrname',doctor_assigned);});
}
var hide_status = '';

function discount_function(){
  var disc = document.getElementById('discount').value;
  console.log(disc);
  if(disc == "" || disc =='0'){
  $("#hide_bar").hide();
	hide_status = '0';
}else{
  $("#hide_bar").show();
	hide_status = '1';
}
}

//for number readonly

function isNumberKey(evt){

	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
        return true;
}

var $value="<?php echo $ID?>";
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
/*$.ajax({
         type: "GET",
         url: <?php echo $get_patient_detail_by_regID; ?>,//from global_variable
         data: {ID: $value},
         success: function(data)
         {
          var json = JSON.parse(data);
          //alert(json);
          //alert("hello in ajax success loop");
          //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
          //location.href = "./home.php"
            //var json = data;
          //  console.log(json);
          parseJsonToform(json);
          //alert(data);
          //$value=$value+10;
       }



     });*/



  // the script where you handle the table input.
  /*$.ajax({
       type: "GET",
       url: <?php echo $get_registrered_patients_all_instance; ?>,//from global_variable
       data: {ID: $value}, //serializes the form's elements.
       success: function(data)
       {
        //var json = JSON.parse(data);
        //alert(json);
        //alert("hello in ajax success loop");
        //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
        //location.href = "./home.php"
          //var json = data;
        //  console.log(json);
        parseJsonToTable_registered_instance(json);
        //$value=$value+10;
     }



   });*/

//validations
function validations(){


        var cash = document.getElementById('cash');
				var cheque = document.getElementById('cheque');
				var electronic = document.getElementById('electronic');

         if(cash.checked || cheque.checked || electronic.checked){

          if(cash.checked){
						var test3 = validation_discount();
						if(test3){return false;}else { return true;}
							}
				  else	if(cheque.checked){
							 var chequre =document.getElementById('cheque_number').value;
							if(chequre!= ""){
                      var test1 = validation_discount();
											if(test1){return true;}else { return false;}
							}
							else {
								swalError("Enter the Cheque Number !!")
							}
					}else if( electronic.checked){
							 var electronic =document.getElementById('elctronic_number').value;
               if(electronic !=''){
								 var test2 = validation_discount();
								 if(test2){return true;}else { return false;}
							 }else {
							 	swalError("Enter the elctronic Number Number !!")
							 }
						}
				 }
				 else {
				 	swalError("Select the payment method !!");
				 }

}
function validation_discount(){
  debugger;
	var discountCheck=document.getElementById('discount').value;

	if(discountCheck!= "" && discountCheck!= "0" && discountCheck!= null)
    {

		var AuthorizedByDoctor =document.getElementById('doctor').value;
		var RemarkCheck =document.getElementById('remark').value;

		if(AuthorizedByDoctor != "" || RemarkCheck != ""){
			return true;
		}
		else {
			swalError("Please fill the proper input !!");
			return false;
		}


	}else {

	return false;
}

}





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

$('#myModal_report').on('hidden.bs.modal', function (e) {
  // do something...
   $(".modal-body").html("");
  location.reload();
})
function get5Words(str) {
    if (str != ("" || null))str =  str.split(/\s+/).slice(0,7).join(" ");
  //return str+"...";
}

$(document).ready(function() {

  var url="/get_all_demo_populate_data.php";
    $.ajax({
      type: "POST",
      url: url,
      data: {ID: $value}, //serializes the form's elements.
      success: function(data)
      {
        console.log(data);
        var json = JSON.parse(data);
        populate_form(json);

				var discountIn = document.getElementById('discount').value;
				console.log(discountIn);
				if(discountIn == '' || discountIn =='00.00')
				{
				  $("#hide_bar").hide();
				}
				else {
					  $("#hide_bar").show();
				}



      }
    });
});

function populate_form(json){
  document.getElementById('ctl00_lblrecid').innerHTML=$receipt_id;
  for(var i=0;i<json.length;i++){

      for(var j=0;j<json[i].Test.length;j++){

      var parti=json[i].Test[j].particulars;
      switch(json[i].Test[j].particulars){
        case "Bed Charges":
          document.getElementById('Bed_charges_cost').value=json[i].Test[j].amount;
          document.getElementById('bed_charges_qty').value=json[i].Test[j].no_of_days;
          document.getElementById('bed_chargers_price').value=(json[i].Test[j].amount)*(json[i].Test[j].no_of_days);
          break;
        case "Nursing Charges":
          document.getElementById('nursing_chargers_cost').value=json[i].Test[j].amount;
          document.getElementById('nursing_chargers_qty').value=json[i].Test[j].no_of_days;
          document.getElementById('nursing_chargers_price').value=(json[i].Test[j].amount)*(json[i].Test[j].no_of_days);
          break;

        case "Doctor's Visit":
          document.getElementById('doctors_visit_cost').value=json[i].Test[j].amount;
          document.getElementById('doctors_visit_qty').value=json[i].Test[j].no_of_days;
          document.getElementById('doctors_visit_price').value=(json[i].Test[j].amount)*(json[i].Test[j].no_of_days);
          break;
        case "RMO Charges":
          document.getElementById('rmo_chargers_cost').value=json[i].Test[j].amount;
          document.getElementById('rmo_chargers_qty').value=json[i].Test[j].no_of_days;
          document.getElementById('rmo_chargers_price').value=(json[i].Test[j].amount)*(json[i].Test[j].no_of_days);
          break;
        case "Admission Fees":
          document.getElementById('adm_fees_cost').value=json[i].Test[j].amount;
          document.getElementById('adm_fees_qty').value=json[i].Test[j].no_of_days;
          document.getElementById('adm_fees_price').value=(json[i].Test[j].amount)*(json[i].Test[j].no_of_days);
          break;
        case "" :
        document.getElementById('adm_fees_cost').value= 0.00;
        document.getElementById('adm_fees_qty').value=0.00;
        document.getElementById('adm_fees_price').value=0.00;
        break;
      }

      document.getElementById('subtotal').value=json[i].total;
      document.getElementById('discount').value=json[i].discount;
      document.getElementById('total').value=(json[i].total)-(json[i].discount);
      document.getElementById('paid').value=json[i].amount_paid;
      document.getElementById('due').value=json[i].balance;
      document.getElementById('cheque_number').value=json[i].cheque_no;
      document.getElementById('elctronic_number').value=json[i].transaction_id;
			document.getElementById('doctor').value=json[i].authorized_doctor;
			document.getElementById('remark').value=json[i].remark;
      if(json[i].payment_type=="cash"){
        document.getElementById('cash').checked=true;
      }else   if(json[i].payment_type=="cheque"){
          document.getElementById('cheque').checked=true;
					$(".show-me-cheque").show('slow');
					$(".show-me-neft").hide('slow');
        }else   if(json[i].payment_type=="electronic"){
            document.getElementById('electronic').checked=true;
						$(".show-me-cheque").hide('slow');
				    $(".show-me-neft").show('slow');
          }else{
            document.getElementById('cash').checked=true;
						$(".show-me-cheque").hide('slow');
						$(".show-me-neft").hide('slow');

          }
  }
  }
}
// $("#button_print").on("click",function(event){
// 	event.preventDefault();
//   debugger;
//  var test = validations();
//  if(test == true){
//   debugger;
// 				//var formData=$(this).serialize();
// 				var formData = new FormData($("#demo_form"));
// 				console.log("Form data is : "+formData);
// 				var url="/set_demo_receipt.php";
// 				$.ajax({
// 					type: "POST",
// 					url:url,
// 					data: formData,
// 					success: function(data){
// 						swalSuccess("success");
// 						printreport('printableArea');
// 						//printreport('DivIdToPrint');
// 						setTimeout(function(){ location.reload(); }, 3000);


// 					},
// 				 cache: false,
// 				 contentType: false,
// 				 processData: false
// 				});
// 				}
// });
$("#demo_form").on("submit",function(event){
  event.preventDefault();
 var test = validations();
 if(test == true){
        //var formData=$(this).serialize();
        var formData = new FormData(this);
        console.log("Form data is : "+formData);
        var url="/set_demo_receipt.php";
        $.ajax({
          type: "POST",
          url:url,
          data: formData,
          success: function(data){
            swalSuccess("success");
            //setTimeout(function(){ location.reload(); }, 3000);


          },
         cache: false,
         contentType: false,
         processData: false
        });
        }
      });

</script>
<?php
$pageTitle = "Demo Receipt"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
