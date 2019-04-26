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
	<div class="card card-outline-info mb-3 print_invisible">
		<div class="card-block heading_bar print_invisible">
			<h5 class="print_invisible">Invoice</h5>
			<a href="#" onclick="goBack()" class="float print_invisible" title="Click, to go back">
				<i class="fa fa-times my-float print_invisible"></i>
			</a>
		</div>
	</div>
	<div id="page-wrap" class="">
		<form method="post" action="" id="aspnetForm" autocomplete="off">
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
			<div class="container print_padding_letterhead section-to-print" id="reg-form-container" >
				<textarea id="header">INVOICE</textarea>
				<div class="card card-outline-info mb-3 section-to-print" style="padding: 5px;margin-bottom: 1rem!important;">
					<div class="card-block card-block-main" id="print">
						<div id="identity">
						</div>
						<div style="clear:both"></div>
						<div id="customer">
							<!--<div id="logo">
								  <div id="logoctr">
									<a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
									<a href="javascript:;" id="save-logo" title="Save changes">Save</a>
									|
									<a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
									<a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
								  </div>

								  <div id="logohelp">
									<input id="imageloc" type="text" size="50" value="" /><br />
									(max width: 540px, max height: 100px)
								  </div>
								  <img id="image" src="<?php// echo $logourl;?>" alt="logo" />
								</div>-->
						</div>
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
										<td class="font-RobotoBold"><span id="ctl00_lblrecid">&nbsp;&nbsp;<?php
										$db = getDB();
										if(isset($_GET['recieptID'])){echo $_GET['recieptID'];}
										else{
										$state=$db->prepare("select `recieptID` FROM advance_ipd_record WHERE `patientID`=:patid limit 1");
										$state->bindParam(':patid', $ID, PDO::PARAM_INT);
										$state->execute();
										$count=$state->rowCount();
										if($count<> "" || null){
										$result=$state->fetchAll(PDO::FETCH_ASSOC );
											foreach ($result as $row1){
															$statement=$db->prepare("SELECT MAX(`recieptID`) FROM advance_ipd_record");
													$statement->execute();
													$results=$statement->fetchColumn();
													//$json=json_encode($results);
													//return $json;
													//$str = 'In My Cart : 11 12 items';
													preg_match_all('!\d+!', $results, $matches);
													if( $results==null){
														$matches=1;
													}else{
														$matches = $matches[0][0]+1;
													}
													$reciept_id="AVD".str_pad($matches, 8, "0", STR_PAD_LEFT);
													echo "AVD".str_pad($matches, 8, "0", STR_PAD_LEFT);
											}
										}
										else{
										$statement=$db->prepare("SELECT MAX(`recieptID`) FROM advance_ipd_record");
										$statement->execute();
										$results=$statement->fetchColumn();
										//$json=json_encode($results);
										//return $json;
										//$str = 'In My Cart : 11 12 items';
										preg_match_all('!\d+!', $results, $matches);
										if( $results==null){
											$matches=1;
										}else{
											$matches = $matches[0][0]+1;
										}
										$reciept_id="AVD".str_pad($matches, 8, "0", STR_PAD_LEFT);
										echo "AVD".str_pad($matches, 8, "0", STR_PAD_LEFT);
										}
										}
										$db=null;
										?></span><input type="text" hidden class="reciept_id" name="reciept_id" id="reciept_id" value="<?php if(isset($_GET['recieptID'])){}else{echo $reciept_id;} ?>"/></td>
									</tr>
								</table>
							</div>
							<input type="hidden" name="ctl00_reportmaster_AdminID" id="ctl00_reportmaster_AdminID" value="<?php echo (base64_encode($userDetails->ID));  ?>"/>
							<input type="hidden" name="ctl00_RegID" id="ctl00_RegID"  value="" />
							<input type="hidden" name="ctl00_PatID" id="ctl00_PatID"  value="" />
						</div>
						<table id="items">
						  <tr class="head_table">
							  <th colspan="2">&nbsp;Particulars</th>
							  <th> &nbsp;Cost</th>
							  <th>&nbsp; No.of Days </th>
							  <th>&nbsp;Amount</th>
						  </tr>
						  <!--<tr class="item-row">
							  <td class="item-name"><div class="delete-wpr"><textarea>Hematology</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
							  <td class="description"><textarea>APTT</textarea></td>
							  <td><textarea class="cost">₹650.00</textarea></td>
							  <td><textarea class="qty">1</textarea></td>
							  <td><span class="price">₹650.00</span></td>
						  </tr>-->
						  <!--<tr class="item-row " >
							  <td class="item-name" colspan="2">
								<div class="delete-wpr">
									<div id="sex-input" class="form-input col-12">
										<input name="particulars[]"  list="role" class="form-control role-input-select drop_select_print_outline" id="role-input-select" value="" />
										<datalist id="role">
										</datalist>
									</div>--><!--<a class="delete" href="javascript:;" title="Remove row">X</a>-->
								<!--</div>
							  </td>
							  <td>
								<input type="test" id="cost" name="cost[]" class="cost" tabindex="-1" value="₹50.00" readonly="readonly" hidden>
							  </td>
							  <td>
								<input type="text" name="qty[]" class="qty form-control" oninput="update_the_price()" value="1">
							  </td>
							  <td>
								<span>₹</span>
								<input type="text" id="price" name="price[]" class="price" value="00.00" readonly="readonly">
							  </td>
						  </tr>-->
						  <?php
						  $db = getDB();
						  if(isset($_GET['recieptID'])){
							  $statement=$db->prepare("SELECT ibp.particulars,ibp.amount,ibp.amount,ibp.no_of_days FROM `advance_ipd_record_particular` AS ibp
														WHERE ibp.reciept_id=:ipd_bill_recieptID;");
							$statement->bindParam(':ipd_bill_recieptID',$recieptID , PDO::PARAM_STR );
							$statement->execute();
							$result=$statement->fetchAll(PDO::FETCH_ASSOC );
							$i=90;
							foreach ($result as $row1){
								$state=$db->prepare("SELECT charge_title,amount FROM ( SELECT charge_title,sc.amount FROM `standard_charges` AS sc WHERE `IsActive`='1'
									UNION
									SELECT bt.bed_type,bt.bed_charges FROM `bed_type` as bt WHERE `IsActive`='1') AS RESULTS ORDER BY charge_title");
									$state->execute();
									$data_state=$state->fetchAll(PDO::FETCH_ASSOC );
									$option_tag_append = "";
									foreach ($data_state as $row){
											$option_tag = "";
											if (in_array($row['charge_title'], array('general','Delux','S-Delux','A/C'))){
												$title_value = "Bed type ".$row['charge_title'];
											}else{ $title_value=$row['charge_title']; }
											$option_tag = "<option value='".$title_value."' data-charges='".$row['amount']."'>'".$row['charge_title']."'</option>";
											$option_tag_append .= $option_tag;
									};
								echo '<tr class="item-row " id="table_row" ><td class="item-name" colspan="2"><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X</a><input name="particulars[]" list="role-'.$i.'" class="form-control role-input-select " oninput="set_cost(this)" value="'.$row1['particulars'].'" id="role-input-select"  /><datalist id="role-'.$i.'">'.$option_tag_append.'</datalist></div></td><td><input  type="test" id="cost" name="cost[]" class="form-control cost" placeholder="00.00" value="'.substr($row1['amount']/$row1['no_of_days'],0,10).'" maxLength="10"></td><td><input type="text" name="qty[]" value="'.$row1['no_of_days'].'"  class="qty form-control" ></td><td><span>₹<span><input type="text" id="price" name="price[]" class="price" placeholder="00.00" value="'.$row1['amount'].'" readonly="readonly"></td></tr>';
								$i++;
								}
							if($statement){
								$query=$db->prepare("UPDATE `ipd_bill` SET `WhenEntered_Advance`=NOW() WHERE `recieptID`=:ipd_bill_recieptID");
								$query->bindParam(':ipd_bill_recieptID',$recieptID , PDO::PARAM_STR );
								$query->execute();
								//$result=$statement->fetchAll(PDO::FETCH_ASSOC );
							}
						  }
						  else{

							//$statement=$db->prepare("SELECT ibp.particulars,ibp.amount,ibp.amount,ibp.no_of_days FROM `advance_ipd_record_particular` AS ibp WHERE ibp.patientID=:ID;");
							//$statement->bindParam(':ID',$ID , PDO::PARAM_STR );
						 }

						  ?>
						  <tr class="item-row " id="table_row_template" hidden>
							  <td class="item-name" colspan="2">
								<div class="delete-wpr">
									<!--<div id="sex-input" class="form-input col-12">-->
									<a class="delete" href="javascript:;" title="Remove row">X</a>
										<input  name="particulars[]" list="role" class="form-control role-input-select drop_select_print_outline"   oninput="set_cost(this)"  id="role-input-select" />
										<datalist id="role">
									<?php
									$state=$db->prepare("SELECT charge_title,amount FROM ( SELECT charge_title,sc.amount FROM `standard_charges` AS sc WHERE `IsActive`='1'
									UNION
									SELECT bt.bed_type,bt.bed_charges FROM `bed_type` as bt WHERE `IsActive`='1') AS RESULTS ORDER BY charge_title");
									$state->execute();
									$data_state=$state->fetchAll(PDO::FETCH_ASSOC );
									foreach ($data_state as $row){
											if (in_array($row['charge_title'], array('general','Delux','S-Delux','A/C'))){
												$title_value = "Bed type ".$row['charge_title'];
											}else{ $title_value=$row['charge_title']; }
											echo "<option value='".$title_value."' data-charges='".$row['amount']."'>'".$row['charge_title']."'</option>";
									}
									?>
										</datalist>
									<!--</div>-->

								</div>
							  </td>
							  <td>
								<input  type="text" id="cost" name="cost[]" class="cost form-control" placeholder="00.00" ><!--readonly="readonly" tabindex="-1"-->
							  </td>
							  <td >
								<input type="text" name="qty[]" oninput="update_the_price()" class="qty form-control">
							  </td>
							  <td>
								<span>₹</span>
								<input type="text" id="price" name="price[]" class="price" placeholder="00.00" value="" />
							  </td>
						  </tr>
						  <tr id="hiderow">
							<td colspan="5"><a id="addrow" class="pull-right" href="javascript:;" title="Add a row"><i class="fa fa-plus-square fa-2x add_row" aria-hidden="true"></i></a></td>
						  </tr>
						  <tr>
							  <td colspan="3" class="blank">Payment type : </td>
							  <td colspan="1" class="total-line">Subtotal</td>
							  <td class="total-value">
								<div class="row" style="margin:0px;">
									<span>₹</span>
									<input class="subtotal" id="subtotal" name="subtotal" placeholder="0.00"/>
								</div>
							  </td>
						  </tr>

						  <tr>
							  <td colspan="3" class="blank">
								<div class="form-group  row justify-content-md-center" style="margin-left:0px;margin-right:0px;margin-bottom:0px;">
									<label class="form-check-label col-2">
									<input class="form-check-input" type="radio" id="cash" name="paymenttype" value="cash"> Cash
									</label>
									<label class="form-check-label col-3">
									<input class="form-check-input" type="radio" name="paymenttype" value="cheque"> Cheque
									</label>
									<label class="form-check-label col-6">
									<input class="form-check-input " type="radio" name="paymenttype" value="electronic"> Net banking/card payment
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
												<input class="form-control noerror" type="Text" value="" name="cheque_number" placeholder="enter cheque Number" id="cheque_number" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="15" >
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
							  <td class="total-value"><span>₹</span><input type="text" class="discount" name="discount" id="discount" onkeypress="return isNumberKey(event)" placeholder="00.00" value="" maxLength="15"></td>
						  </tr>
						  <tr hidden>
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

						<div id="terms">
						  <h5>Terms</h5>
						  <textarea disabled>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
						</div>
					</div>
				</div>
				<div class="card card-outline-info mb-3 Authorized_by button_section" style="margin-bottom: 3rem;margin-top: 1rem">
					<div class="card-block" >
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-md-4">
                  <select name="tl_doctor" class="form-control col-6" id="tl_doctor" style="height: 44px;">
                        <option value="" disabled selected>Select Doctor</option>
                        <?php
        				$db = getDB();
        				$statement=$db->prepare("SELECT DISTINCT ID,firstname,lastname FROM  staff_ledger WHERE NOT designation = 'Nurse'");
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
								<div class="col-md-1">
                  <label for="vt_remark" id="vt_remark_lable">Remark :</label>

								</div>
                <div class="col-md-5">
                <input class="form-control noerror" type="text"  placeholder="Remark" name="vt_remark" value="" id="vt_remark"/>
              </div>
							</div>
						</div>
					</div>
				</div>
        <div class="card card-outline-info mb-3 do-not-print button_section" style="margin-bottom: 3rem;margin-top: 1rem">
          <div class="card-block" >
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-2">
                  <button type="Submit" class="btn btn-outline-teal" id="button_save_reciept" style=""> <i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Save</button>
                </div>
                <div class="col-md-2">
                  <button class="btn btn-outline-danger" id="button_print" onclick="printDiv('page-wrap')"> <i class="fa fa-print fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Print </button>
                </div>
              </div>
            </div>
          </div>
        </div>
			</div>
		</form>
	</div>
</body>
<script>
	bind();
	document.getElementById("cost").blur();
	update_total();

$('input[name=paymenttype]').click(function(){
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

var ID = "<?php echo base64_encode($ID);?>";
var recieptID = "<?php if(isset($_GET['recieptID'])) echo base64_encode($recieptID);?>";
var input = "";
<?php  if(isset($_GET['role-input-select'])){$scname=$_GET['role-input-select']; echo  "var input = '".$scname."';";}?>
/* $('#role-input-select').val(input);
$('#role-input-select #role option').attr('selected', false).find('[value="'+input+'"]').attr('selected', true); */
/* $('#role-input-select').attr("value",input);$('#role-input-select').focus(update_price()); *//* $("#button_save_reciept").on("Click",function(){event.preventDefault(); */
function set_cost(event){  /* for selected option charges retrival */
	var option = event.value; /* get value selected in input */
	var list = $(event).attr('list'); /* get list name from list attribute */
	list = `#${list}`; /* append # to list for jquery */
	var Charges = $(list).find(`[value='${option}']`).data(`charges`); /* find charges by finding value equivalent in option list and then find its charge attr value */
	var row = $(event).parents('.item-row'); /* find parent row */
	if(option ==`Registration Charges`){
			row.find('.qty').val('1');
	}
	row.find('.cost').val(Charges); /* set cost per day in the same row */
}

	$( "form#aspnetForm" ).on( "submit", function(event) {
		event.preventDefault();

		//var formData=$( this ).serialize();
		var formData=new FormData(this);
		var this_data = $(this).serialize();
		/*console.log("hello 	"+this_data);*/
		console.log(formData);
		if (validateForm()==true){
		$.ajax({
		   type: "POST",
		   url: "/invoice/set_invoice_advance.php",
		   data: formData,/* serializes the form's elements. */
		   success: function(data)
		   {
				swalSuccess(data);
				console.log("set_invoice_ipd :: "+data);
		   },error: function(xhr, textStatus, errorThrown){
		   alert('request failed');
			},
			cache: false,
			contentType: false,
			processData: false
		});
		}else{}
	});

function increment_print_count(){
	$.ajax({
		type: "GET",
		url: "/invoice/increment_print.php",
		data: "ID:"+ID+"",/* serializes the form's elements. */
		success: function(data)
		{parseJsonToForm2(data);},
		error: function(xhr, textStatus, errorThrown){alert('request failed');},
		cache: false,
		contentType: false,
		processData: false
	});
}
$.get("/get_patient_detail_by_ipd_ID.php", /*Required URL of the page on server*/
		{ID:ID}, /* Data Sending With Request To Server*/
function(response,status){ /* Required Callback Function*/
			console.log(response);
			var json = JSON.parse(response);
			parseJsonToForm(json);
});
function Dr_name(staffID){
	$.get("/invoice/get_drname_by_staffid.php",{ID:staffID},function(response,status){var doctor_assigned = `Dr. ${response}`;setInnerValue('ctl00_lbldrname',doctor_assigned);});
}
function parseJsonToForm(json){



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

$.get("/invoice/get_ipd_individual_bill_amount_advance.php", /*Required URL of the page on server*/
		{reciept_id:recieptID}, /* Data Sending With Request To Server*/
function(response,status){ /* Required Callback Function*/
			console.log("response "+response);
			var json = JSON.parse(response);
			<?php if(isset($_GET['recieptID']))
			        echo "parse_individual_particulars(json);";?>
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
function validateForm() {
    var paymenttype = document.forms["aspnetForm"]["paymenttype"].value;
    var patTime = document.forms["aspnetForm"]["paid"].value;
    var total = document.forms["aspnetForm"]["total"].value;
    var advance = document.forms["aspnetForm"]["advance"].value;
	if(advance =="" || advance==null){
		setValue('advance','0.00')
	}
    if (total == "" || total == null || total == "00.00") {
        swalInfo("Select a Test to bill");
		$("#role-input-select").focus();
		$("#role-input-select").addClass('error').removeClass('noerror');
        return false;
    }else if (patTime == "" || patTime == null || patTime == "00.00" ) {
        swalInfo("Amount not entered");
		$("#paid").focus();
		$("#paid").addClass('error').removeClass('noerror');
        return false;
    }else if(paymenttype==""){
		swalInfo("payment type not selected");
		$("#cash").focus();
		$("#cash").addClass('error').removeClass('noerror');
	}else{ return true;}
}


function parseJsonToForm2(json2){
/* $('#First-name-input').val(json.firstname); *//*setSelectValue('ctl00_reportmaster_txtPatientTime', json.RegID);*//*setSelectValue('patID', json.patientID)*/
console.log("parseJsonToForm2 :: "+json2);
}
function RadionButtonSelectedValueSet(name, SelectdValue) {
    $('input[name="' + name+ '"][value="' + SelectdValue + '"]').prop('checked', true);
    $('input[name="' + name+ '"][value="' + SelectdValue + '"]').click();
}
function parse_individual_particulars(json){
		if(json[0].amount=="0" || json[0].amount==null){/*swalSuccess("in null");*/}
		else{
			//swalSuccess("else loop");
			setValue('subtotal',json[0].amount);
			setValue('total',json[0].amount_sub);
			setValue('discount',json[0].discount);
			var paymenttype = json[0].payment_type;
			if(paymenttype!=""){
				RadionButtonSelectedValueSet('paymenttype',paymenttype);
				setValue('cheque_number',json[0].cheque_no);
				setValue('elctronic_number',json[0].transaction_id);
			}
			//setValue('advance',json[0].advance);
			setValue('paid',json[0].paid);
			setValue('due',json[0].due);
			$("#advance").prop("readonly", true);

	bind();
	$(".cost").blur(update_price);
	$(".qty").blur(update_price);
	$(".price").blur(update_price);
	update_price();
	update_total();
		}
}

function goBack() {
    window.history.back()
}

function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
        return true;
}
</script>
<?php
$pageTitle = "Reciept generation";/* Call this in your pages' files to define the page title*/
$pageContents = ob_get_contents ();/* Get all the page's HTML into a string*/
ob_end_clean (); /* Wipe the buffer*/

/* Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML*/
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>
</html>
