<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
 if(isset($_GET['ID'])){$ID=$_GET['ID'];}
 if(isset($_GET['RegistrationID'])){$RegID=$_GET['RegistrationID'];}
 ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
	<link rel='stylesheet' type='text/css' href='/invoice/css/style.css'/>
	<link rel='stylesheet' type='text/css' href='/invoice/css/print.css' media="print"/>
	<script type='text/javascript' src='/invoice/js/invoice_pharmacy.js'></script>
	<link href="/dist/css/report.css" rel="stylesheet"/>
	<link href="/dist/css/adminlayout.css" rel="stylesheet"/>
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
    visibility: visible;
  }
  .section-to-print {
	padding:10px!important;
	margin-top:5px;
    position: absolute;
    left: 0;
    top: 0;
  }
  .cke_top,.print_invisible{
		visibility:none;
		display:none!important;
	}
	.button_section{
		margin : 0px;
		border:0px;
	}
	.print_padding_letterhead{
		margin-top:0%;
	}
}
</style>

<body>
	<div class="card card-outline-info mb-3 print_invisible section-notto-print">
		<div class="card-block heading_bar">
			<h5>Invoice</h5>
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
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
<div class="container print_padding_letterhead" id="reg-form-container" >
		<textarea id="header">INVOICE</textarea>
	
	<div class="card card-outline-info mb-3" style="padding: 5px;margin-bottom: 1rem!important;">
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
                       <!-- <tr>
                             <td>Patient ID</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><span id="ctl00_lblpatid"></span></td>
							
                        </tr>--->
                        <tr>
                            <td>Patient Name</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><input id="pname" name="pname"  placeholder="Enter Name"/></td>
                        </tr>
                     
                        <tr>
                            <td>Age</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><input id="p_age" name="p_age" onkeypress="return isNumberKey(event)"  placeholder="Enter Age" maxLength="3" /></td>
                        </tr>
						   <tr>
                            <td>Sex</td>
                            <td>:</td>
                            <td><select name="sex" id='sex'>
                         <option value="male">Male</option>
                           <option value="female">Female</option>
                             </select>
                                 </td>
                        </tr>
                    </table>
                </div>
                <div class="hmms_hdr_rgt col-md-6">
                    <table>
                        
                        
                        <tr>
                            <td>Bill Date</td>
                            <td>:</td>
                            <td id="date_of_bill"><?php echo  "&nbsp;&nbsp;".date("d/m/Y"); ?></td>
                        </tr>
                        <tr>
                            
                        </tr>
                        
						<tr>
							<td>Receipt ID</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><span id="ctl00_lblrecid">&nbsp;&nbsp;<?php
							$db = getDB();
							$state=$db->prepare("select `recieptID` FROM pharmacy_bill WHERE `recieptID`=:patid limit 1");
							$state->bindParam(':patid', $ID, PDO::PARAM_STR);
							$state->execute();
							$count=$state->rowCount();
							if($count<> "" || null){
							$result=$state->fetchAll(PDO::FETCH_ASSOC );
								foreach ($result as $row1){
									$reciept_id=$row1['recieptID'];
									echo $row1['recieptID'];
								}
							}
							else{
							$statement=$db->prepare("SELECT MAX(`recieptID`) FROM pharmacy_bill");
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
							$reciept_id="PDR".str_pad($matches, 8, "0", STR_PAD_LEFT);
							echo "PDR".str_pad($matches, 8, "0", STR_PAD_LEFT);
							}
							$db=null;
							?></span><input type="text" hidden class="reciept_id" name="reciept_id" id="reciept_id" value="<?php echo $reciept_id; ?>"/></td>
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
		      <th> &nbsp;Exp date</th>
		      <th> &nbsp;Batch</th>
		      <th> &nbsp;Cost</th>
		      <th>&nbsp; Quantity </th>
		      <th>&nbsp;Amount</th>
		  </tr>
		  <?php 
			$db = getDB();
			
			$statement=$db->prepare("SELECT ibp.particulars,ibp.amount,ibp.no_of_days FROM `pharmacy_bill_particulars` AS ibp
										WHERE ibp.reciept_id=:pharmacy_bill_recieptID;");
			$statement->bindParam(':pharmacy_bill_recieptID',$ID , PDO::PARAM_STR );
			$statement->execute();
			$result=$statement->fetchAll(PDO::FETCH_ASSOC );
			$i=90;
			foreach ($result as $row1){
				$state=$db->prepare("SELECT model_no FROM `stock_individual` where category= 4");
					$state->execute();
					$data_state=$state->fetchAll(PDO::FETCH_ASSOC );
					$option_tag_append = "";
					foreach ($data_state as $row){
							$option_tag = "";
							$title_value=$row['model_no'];
							$option_tag = "<option value='".$title_value."'>'".$row['model_no']."'</option>";
							$option_tag_append .= $option_tag;
					};
					if($row1['particulars']== null || $row1['particulars']==""){}
					else if($row1['particulars']<>""){
						echo '<tr class="item-row " id="table_row" ><td class="item-name" colspan="2"><div class="delete-wpr"><a class="delete"  title="Remove row">X</a><input name="particulars[]" list="role-'.$i.'" class="form-control role-input-select " oninput="set_cost(this)" value="'.$row1['particulars'].'" id="role-input-select"  /><datalist id="role-'.$i.'">'.$option_tag_append.'</datalist></div></td><td><input  type="text" id="cost" name="cost[]" class="form-control cost" placeholder="00.00" value="'.substr((int)$row1['amount']/(int)$row1['no_of_days'],0,10).'" maxLength="10"></td><td><input type="text" name="qty[]" value="'.(int)$row1['no_of_days'].'"  class="qty form-control" ></td><td><span>₹<span><input type="text" id="price" name="price[]" class="price" placeholder="00.00" value="'.(int)$row1['amount'].'" readonly="readonly"></td></tr>';
						$i++;
					}
				}
				$stat=$db->prepare("SELECT si.*,sc.category FROM `stock_individual` as si JOIN stock_category as sc on sc.ID=si.category WHERE 1");
				$stat->execute();
				$results=$stat->fetchAll(PDO::FETCH_ASSOC);
				$json_php=json_encode($results);
				
		  ?>
                    <tr class="item-row " >
		      <td class="item-name" colspan="2">
				<div class="delete-wpr">
					<!--<div id="sex-input" class="form-input col-12">-->
					<a class="delete" tabindex="-1" title="Remove row">X</a>
						<input  name="particulars[]" list="role" class="form-control role-input-select drop_select_print_outline"   oninput="set_cost(this);"  id="role-input-select" autofocus/>
						<datalist id="role">
					<?php 
					$state=$db->prepare("SELECT model_no FROM `stock_individual` where category= 4");
					$state->execute();
					$data_state=$state->fetchAll(PDO::FETCH_ASSOC );
					
					foreach ($data_state as $row){
					if(in_array($row['model_no']))
					{
					$title_value = " number ".$row['model_no'];
					}
					else{ $title_value=$row['model_no']; }
					echo "<option value='".$title_value."'>'".$row['model_no']."'</option>";
							
					}
					?>
						</datalist>
					<!--</div>-->
					
				</div>
			  </td>
		      <td>
				<input tabindex="-1" type="text" id="mnf" name="mnf[]" class="mnf form-control" placeholder="0000" ><!--readonly="readonly" tabindex="-1"-->
			  </td>
		      <td>
				<input tabindex="-1" type="text" id="batch" name="batch[]" class="mnf form-control" placeholder="0000" ><!--readonly="readonly" tabindex="-1"-->
			  </td>
                          <td>
				<input  type="text" id="cost" tabindex="-1" name="cost[]" class="cost form-control" placeholder="00.00" ><!--readonly="readonly" tabindex="-1"-->
			  </td>
		      <td >
				<input type="text" name="qty[]" oninput="update_the_price()" value="1" class="qty form-control">
			  </td>
		      <td>
				<span>₹</span>
				<input type="text" id="price" tabindex="-1" name="price[]" class="price" placeholder="00.00" value="" />
			  </td>
		  </tr>
                  <!--@@@@@@@@@@@@@@@@@@@@@@below is hidden tab@@@@@@@@@@@@-->
		   <tr class="item-row " id="table_row_template" hidden>
		      <td class="item-name" colspan="2">
				<div class="delete-wpr">
					<!--<div id="sex-input" class="form-input col-12">-->
					<a class="delete" tabindex="-1" title="Remove row">X</a>
						<input  name="particulars[]" list="role" class="form-control role-input-select drop_select_print_outline"   oninput="set_cost(this);"  id="role-input-select" autofocus/>
						<datalist id="role">
					<?php 
					$state=$db->prepare("SELECT model_no FROM `stock_individual` where category= 4");
					$state->execute();
					$data_state=$state->fetchAll(PDO::FETCH_ASSOC );
					
					foreach ($data_state as $row){
					if(in_array($row['model_no']))
					{
					$title_value = " number ".$row['model_no'];
					}
					else{ $title_value=$row['model_no']; }
					echo "<option value='".$title_value."'>'".$row['model_no']."'</option>";
							
					}
					?>
						</datalist>
					<!--</div>-->
					
				</div>
			  </td>
		      <td>
				<input tabindex="-1"  type="text"  id="mnf" name="mnf[]" class="mnf form-control" placeholder="0000" ><!--readonly="readonly" tabindex="-1"-->
			  </td>
                          <td>
				<input tabindex="-1" type="text" id="batch" name="batch[]" class="mnf form-control" placeholder="0000" ><!--readonly="readonly" tabindex="-1"-->
			  </td>
		      <td>
				<input  type="text" tabindex="-1" id="cost" name="cost[]" class="cost form-control" placeholder="00.00" ><!--readonly="readonly" tabindex="-1"-->
			  </td>
		      <td >
				<input type="text" name="qty[]" oninput="update_the_price()" value="1" class="qty form-control">
			  </td>
		      <td>
				<span>₹</span>
				<input type="text" tabindex="-1" id="price" name="price[]" class="price" placeholder="00.00" value="" />
			  </td>
		  </tr>
		  <tr id="hiderow">
		    <td colspan="7"><a id="addrow" class="pull-right" title="Add a row"><i class="fal fa-plus-square fa-2x add_row" aria-hidden="true"></i></a></td>
		  </tr>
		  <tr>
		      <td colspan="5" class="blank">Payment type : </td>
		      <td colspan="1" class="total-line">Subtotal</td>
		      <td class="total-value"><div class="row"  style="margin:0px;"><span>₹</span><input class="subtotal" id="subtotal" name="subtotal" placeholder="0.00" tabindex="-1"/><div></td>
		  </tr>
		  <tr>
		      <td colspan="5" class="blank">
				<div class="form-group  row justify-content-md-center" style="margin-left:0px;margin-right:0px;margin-bottom:0px;">
					<label class="form-check-label col-2">
					<input class="form-check-input" tabindex="-1" checked type="radio" id="cash" name="paymenttype" value="cash"> Cash
					</label> 
					<label class="form-check-label col-3">
					<input class="form-check-input" tabindex="-1" type="radio"  name="paymenttype" value="cheque"> Cheque
					</label> 
					<label class="form-check-label col-6">
					<input class="form-check-input " tabindex="-1" type="radio" name="paymenttype" value="electronic"> Net banking/card payment
					</label>
				</div>
			  </td>
		      <td colspan="1" class="total-line">Total</td>
		      <td class="total-value"><span>₹</span><input tabindex="-1" type="text" name="total" id="total" placeholder="00.00" value="" readonly="readonly"></td>
		  </tr>
		  <tr>
		      <td colspan="5" class="blank"><!--@@ for other than cash payment-->
				<div class="row justify-content-md-center">
					<div class="show-me-cheque col-10" style='display:none'>
						<div class="row justify-content-md-center">
							<label class="col-4 col-form-label required" for="cheque_number" >Cheque Number</label>
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
		
		 <tr>
		      <td colspan="5" class="blank"> </td>
		      <td colspan="1" class="total-line">Amount Paid</td>
		      <td class="total-value"><span>₹</span><input type="text" name="paid" id="paid" placeholder="00.00" value="" onkeypress="return isNumberKey(event)" maxLength="15"></td>
		  </tr>
		  <tr>
		      <td colspan="5" class="blank"> </td>
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
	<div class="card card-outline-info mb-3 do-not-print button_section" style="margin-bottom: 3rem;margin-top: 1rem;">
		<div class="card-block" >
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-2">			
						<button type="Submit" class="btn btn-outline-teal" id="button_save_reciept"  style=""> <i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Save</button>
					</div>
					<div class="col-md-2">
						<button class="btn btn-outline-danger" id="button_print" onclick="printDiv('page-wrap')"> <i class="fa fa-print fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Print </button>
					</div>
				</div>	
			</div>
		</div>
	</div>
	</form>
</div>
</div>
</body>
<script>
var json_stock = <?php echo $json_php;?>;
	bind();
	document.getElementById("cost").blur();
	update_total();

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

var ID = "<?php echo base64_encode($ID);?>";
var input = "";
<?php  if(isset($_GET['role-input-select'])){$scname=$_GET['role-input-select']; echo  "var input = '".$scname."';";}?>
/* $('#role-input-select').val(input);
$('#role-input-select #role option').attr('selected', false).find('[value="'+input+'"]').attr('selected', true); */
/* $('#role-input-select').attr("value",input);$('#role-input-select').focus(update_price()); *//* $("#button_save_reciept").on("Click",function(){event.preventDefault(); */
function set_cost(event){  /* for selected option charges retrival */	
	var option = event.value; /* get value selected in input */
	for(var i=0; i<json_stock.length; i++){
		if(json_stock[i].model_no == option){
			$(event).parents('.item-row').find('.cost').val(json_stock[i].price);
		}
	}
}

	

document.onkeydown = KeyPress;
function KeyPress(e) {
	  
      var evtobj = window.event? event : e
      if (evtobj.keyCode == 107 && evtobj.ctrlKey){
		  e.preventDefault();
			if ($(".delete").length < 24){
			counter++;
			var $template = $('#table_row_template'),
				$clone    = $template
								.clone()
								.removeAttr('id')
								.removeAttr('hidden')
								.val("")
								.attr('data-book-index', counter)
								.insertAfter($template);
				$clone
					.find('[list="role"]').attr('list', 'role-' + counter).end()
					.find('[id="role"]').attr('id', 'role-' + counter).end();
	/* 			$clone
					.find('[name="role-input-select"]').attr('name', 'role-input-select-' + counter).end()
					.find('[name="cost"]').attr('name', 'cost-' + counter).end()
					.find('[name="price"]').attr('name', 'price-' + counter).end(); */

			if ($(".delete").length > 0) $(".delete").show();  bind(); 
			update_total();
			}
	  }
      if (evtobj.keyCode == 109 && evtobj.ctrlKey){
		  e.preventDefault();
		  if($('.delete').length>2)$('.delete:last').trigger( "click" );
	  }
      if (evtobj.keyCode == 83 && evtobj.ctrlKey){
		  e.preventDefault();
		  //alert("saved");
		  $( "form#aspnetForm" ).submit();
	  }
}

	$( "form#aspnetForm" ).on( "submit", function(event) {
		event.preventDefault();
		
		//var formData=$( this ).serialize();
		var formData=new FormData(this);
		var this_data = $(this).serialize();
		/*console.log("hello 	"+this_data);*/
		console.log(this_data);
		submit_form(formData);
	});
function submit_form(formData){
	if (validateForm()==true){
		 $.ajax({
		   type: "POST",
		   url: "/invoice/set_invoice_pharmacy.php",
		   data: formData,/* serializes the form's elements. */
		   success: function(data)
		   {	
				swalSuccess(data);
				console.log("set_invoice_pharmacy :: "+data); 
		   },error: function(xhr, textStatus, errorThrown){
		   swalError('request failed');
			},
			cache: false,
			contentType: false,
			processData: false
		}); 
		}else{}
}
function increment_print_count(){
	$.ajax({
		type: "GET",
		url: "/invoice/increment_print.php",
		data: "ID:"+ID+"",/* serializes the form's elements. */
		success: function(data)
		{parseJsonToForm2(data);},
		error: function(xhr, textStatus, errorThrown){swalError('request failed');},
		cache: false,
		contentType: false,
		processData: false
	});
}
$.get("/get_patient_detail_by_pharmacy.php", /*Required URL of the page on server*/
		{ID:ID}, /* Data Sending With Request To Server*/
function(response,status){ /* Required Callback Function*/
			console.log(`This is  form ${response}`);
			//console.log(response);
			var json = JSON.parse(response);
			parseJsonToForm(json);
			
});
function Dr_name(staffID){
	$.get("/invoice/get_drname_by_staffid.php",{ID:staffID},function(response,status){var doctor_assigned = `Dr. ${response}`;setInnerValue('ctl00_lbldrname',doctor_assigned);});
}
function parseJsonToForm(json){
		
		
		
		var name = json.patient_name;
		var age = json.age;
		var p_sex = json.sex;
		var recieptidjson=json.recieptID;ctl00_lblrecid
        
		document.getElementById("p_age").value=json.age;
		document.getElementById("pname").value=json.patient_name;
		document.getElementById("sex").value=json.sex;
		document.getElementById("ctl00_lblrecid").value=json.recieptID;
		document.getElementById("paid").value=json.paid;
		var date_of_billp=json.WhenEntered;
		var splitbilldate=date_of_billp.substring(0,11);
		document.getElementById("date_of_bill").innerHTML=splitbilldate;
		
		bind();
		document.getElementById("cost").blur();
		update_total();
}

$.get("/invoice/get_ipd_individual_bill_amount.php", /*Required URL of the page on server*/
		{reciept_id:ID}, /* Data Sending With Request To Server*/
function(response,status){ /* Required Callback Function*/
			console.log("response is this "+response);
			var json = JSON.parse(response);
			parse_individual_particulars(json);
			check_if_patient_discharged(json);
			update_total();
});
$.get("/invoice/get_ipdl_bill_amount_advance.php", /*Required URL of the page on server*/
		{reciept_id:ID}, /* Data Sending With Request To Server*/
function(response,status){ /* Required Callback Function*/ /* advance paid */
			console.log("response advance"+response);
			setValue("advance",response);
			bind();
			document.getElementById("cost").blur();
			update_total();
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
    }else if(paymenttype=="" && patTime !=0){
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
		if(json.paid=="0" || json.paid==null || json.paid=="0.00" ){/*swalSuccess("in null");*/
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; /*January is 0!*/
		var yyyy = today.getFullYear();
		if(dd<10) {dd = '0'+dd}
		if(mm<10) {mm = '0'+mm}
		today = dd + '/' + mm + '/' + yyyy;
		
		console.log(`this is todays date ${today}`);
		$.ajax({
	   type: "GET",
	   url: "/invoice/check_if_patient_discharged.php",
	   data:{patientID:ID},
	   success: function(data)
	   {
			var json = JSON.parse(data);
			console.log(json);
			
			check_if_patient_discharged(json);
			$(".qty").blur();
			
		}
	});}
		else{
			//swalSuccess("else loop");
			setValue('subtotal',json[0].amount);
			setValue('total',json[0].amount_sub);
			setValue('discount',json[0].discount);
			setValue('advance',json[0].advance);
			setValue('paid',json[0].paid);
			setValue('due',json[0].due);
			setInnerValue('ctl00_lbltodaydate',today);
			var paymenttype = json[0].payment_type;
			if(paymenttype!=""){
				RadionButtonSelectedValueSet('paymenttype',paymenttype);
				setValue('cheque_number',json[0].cheque_no);
				setValue('elctronic_number',json[0].electronic_id);
			}
			$("#advance").prop("readonly", true);
			/*for(i=0;i<json.length;i++){ *//*tr = $('<tr class="item-row " id="table_row_template" >');
			tr.append('<td class="item-name" colspan="2"><div class="delete-wpr"><div id="sex-input" class="form-input col-12"><input  name="role-input-select" list="role" class="form-control role-input-select drop_select_print_outline"  id="role-input-select" value="'+json[i].particulars+'"/><datalist id="role">');
			tr.append('</datalist></div><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>');
			tr.append('');
			tr.append('<td ><input hidden type="text" id="cost" name="cost[]" class="cost" placeholder="00.00"  readonly="readonly" tabindex=-1><input type="text" name="qty[]" value="'+json[i].days+'"  class="qty form-control" ></td>');
			tr.append('<td><span>₹<span><input type="text" id="price" name="price[]" class="price" placeholder="00.00" value="'+json[i].amount+'" readonly="readonly"></td>');
			tr.append('</tr>');*/
			/*$('#items').first().prepend(tr);*//*  onchange="update_the_price()" oninput="update_the_price()" */
			//$('#items > tbody > tr:eq('+1+')').after(tr);
			/* } */
	bind();
	$(".cost").blur();
	$(".qty").blur();
	$(".price").blur();
	update_price();
	update_total();
	$.ajax({
	   type: "GET",
	   url: "/invoice/check_if_patient_discharged.php",
	   data:{patientID:ID},
	   success: function(data)
	   {
			var json = JSON.parse(data);
				console.log(json);
			
			check_if_patient_discharged(json);
			$(".qty").blur();
		}
	});
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