<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
 if(isset($_GET['patID'])){
	 $ID = $_GET['patID'];
	 }else if(isset($_GET['ID'])){
		 $ID=$_GET['ID'];
		 }else{
			 $ID = "Test";
			 }
 if(isset($_GET['regID'])){$RegID=$_GET['regID'];}
 if(isset($_GET['RegistrationID'])){$RegID=$_GET['RegistrationID'];}
 ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
	<link rel='stylesheet' type='text/css' href='/invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='/invoice/css/print.css' media="print" />
	<script type='text/javascript' src='/invoice/js/example_opd.js'></script>
	<link href="/dist/css/report.css" rel="stylesheet"/>
	<link href="/dist/css/AdminLayout.css" rel="stylesheet"/>
<style>
body{background:#f1f1f1;}
table{border:0px}
.hmms_hdr_rgt table td, table th ,.hmms_hdr_lft table td, table th {
    border: 0px solid #808080;
    padding: 0px;
}
#items tr.item-row td {
    border: 1px solid black;
    vertical-align: top;
}
	.button_section{
		margin : 0px;
		border:0px;
	}
	.print_padding_letterhead{
		margin-top:0%;
	}
</style>

<body>
<div class="card card-outline-info mb-3 print_invisible">
			<div class="card-block heading_bar">
			<h5>Invoice</h5>
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
			<i class="fa fa-times my-float"></i>
		</a>
			</div>
		</div>
	<div id="page-wrap" class="">
	<form method="post" action="" id="aspnetForm">
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

	<div class="card card-outline-info mb-3" style="margin-bottom: 1rem!important;">
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
              <img id="image" src="<?php //echo $logourl;?>" alt="logo" />
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
                            <td>Contact</td>
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
                            <td>Bill. Date</td>
                            <td>:</td>
                            <td><span id="ctl00_lblregdate"></span></td>
                        </tr>
                        <tr>
                            <td>Report Date</td>
                            <td>:</td>
                            <td><span id="ctl00_lblreportdate"></span></td>
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
							$statement=$db->prepare("SELECT MAX(`recieptID`) FROM opd_reciepts");
							$statement->execute();
							$results=$statement->fetchColumn();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results, $matches);
							$count = $statement->rowCount();

							if( $results==null){
								$matches=1;
							}else{
								$matches = $matches[0][0]+1;
							}
							echo "OPDR".str_pad($matches, 8, "0", STR_PAD_LEFT);

							$db=null;
							?></span></td>
						</tr>
                    </table>
                </div>

<input type="hidden" name="ctl00_reportmaster_AdminID" id="ctl00_reportmaster_AdminID" value="<?php echo (base64_encode($userDetails->ID));  ?>"/>
<input type="hidden" name="ctl00_reportmaster_RegID" id="ctl00_reportmaster_RegID"  value="" />
<input type="hidden" name="ctl00_reportmaster_PatID" id="ctl00_reportmaster_PatID"  value="" />
			</div>
		<table id="items">

		  <tr class="head_table">
		      <th colspan="5">Particulars</th>
		      <!--<th >Test Cost</th>
		      <th >No of tests</th>-->
		      <!--<th >No of tests</th>-->
		      <th>Amount</th>
		  </tr>
		  <!--<tr class="item-row " >
		      <td class="item-name" colspan="5"><textarea type="text" id="particulars-0" name="particulars-0" class="particulars" value="" style="width:100%"></textarea><div class="delete-wpr"><!--<a class="delete" href="javascript:;" title="Remove row">X</a>--><!--</div></td>-->
		      <!--<td></td>-->
		      <!--<td></td>-->
		      <!--<td><span>₹</span><input type="text" id="price-0" name="price-0" class="price" value="00.00" ></td>
		  </tr>-->
		  <?php


		  if(isset($_GET["particulars_0"])){
					$tr = "";
					for ($x = 0; $x <= 4; $x++) {
						$sub_test_name ="particulars_".$x;
						$sub_test_charges ="price_".$x;
						if( ((isset($_GET[$sub_test_name])) && $_GET[$sub_test_name]!="" && $_GET[$sub_test_name]!=null ) && (isset($_GET[$sub_test_charges])) ){
						$sub_test_name=$_GET[$sub_test_name];
						$sub_test_charges=$_GET[$sub_test_charges];

						$tr = '<tr class="item-row-'.$x.'" >';
						$tr .='<td class="item-name" colspan="5"><div class="delete-wpr">
								<textarea type="text" id="particulars-'.$x.'" name="particulars-'.$x.'" class="particulars" value="$sub_test_name" style="width:100%"> Dr.'.$sub_test_name.' Consulting charges</textarea><div class="delete-wpr"><!--<a class="delete" href="javascript:;" title="Remove row">X</a>--></div></td>';
						$tr .= '<td><span>₹<span><input type="text" id="price-'.$x.'" name="price-'.$x.'" class="price" placeholder="00.00" value="'.$sub_test_charges.'" onkeyup="update_balance()" ></td>';
						$tr.='</tr>';
						echo $tr;
						}
						else{/*echo "some error occured";*/}
					}
		  }

		  ?>

		  <tr class="item-row " id="table_row_template" >
				<td class="item-name" colspan="5"><div class="delete-wpr">
						<!--<a class="delete" href="javascript:;" title="Remove row">X</a>-->
					</div><textarea type="text" id="particulars-0" name="particulars-0" class="particulars"  style="width:100%"></textarea>

				</td>
				<td><span>₹<span><input type="text" id="price-0" name="price-0" class="price" placeholder="00.00"  onkeyup="update_balance();update_total();"></td>
		  </tr>
		  <tr class="item-row " id="table_row_template" >
				<td class="item-name" colspan="5"><div class="delete-wpr">
						<!--<a class="delete" href="javascript:;" title="Remove row">X</a>-->
					</div><textarea type="text" id="particulars-1" name="particulars-1" class="particulars"  style="width:100%"></textarea>

				</td>
				<td><span>₹<span><input type="text" id="price-1" name="price-1" class="price" placeholder="00.00"  onkeyup="update_balance();update_total();"></td>
		  </tr>
		  <tr class="item-row " id="table_row_template" >
				<td class="item-name" colspan="5">
					<div class="delete-wpr">
						<!--<a class="delete" href="javascript:;" title="Remove row">X</a>-->
					</div>
					<textarea type="text" id="particulars-2" name="particulars-2" class="particulars" style="width:100%"></textarea>
				</td>
				<td><span>₹<span><input type="text" id="price-2" name="price-2" class="price" placeholder="00.00"  onkeyup="update_balance();update_total();"></td>
		  </tr>
		  <tr class="item-row " id="table_row_template" >
				<td class="item-name" colspan="5"><div class="delete-wpr">
						<!--<a class="delete" href="javascript:;" title="Remove row">X</a>-->
					</div><textarea type="text" id="particulars-3" name="particulars-3" class="particulars"  style="width:100%"></textarea>
				</td>
				<td><span>₹<span><input type="text" id="price-3" name="price-3" class="price" placeholder="00.00" onkeyup="update_balance();update_total();"></td>
		  </tr>
		  <tr class="item-row " id="table_row_template" >
				<td class="item-name" colspan="5"><div class="delete-wpr">
						<!--<a class="delete" href="javascript:;" title="Remove row">X</a>-->
					</div><textarea type="text" id="particulars-4" name="particulars-4" class="particulars"  style="width:100%"></textarea>

				</td>
				<td><span>₹<span><input type="text" id="price-4" name="price-4" class="price" placeholder="00.00"  onkeyup="update_balance();update_total();"></td>
		  </tr>
		  <!--<tr class="item-row " id="table_row_template" hidden>
				<td class="item-name" colspan="5"><div class="delete-wpr">
						<!--<a class="delete" href="javascript:;" title="Remove row">X</a>-->
	<!--				</div><textarea type="text" id="particulars" name="particulars" class="particulars" value="" style="width:100%"></textarea>

				</td>
				<td><span>₹<span><input type="text" id="price" name="price" class="price" placeholder="00.00" value="" onkeyup="update_balance();update_total();"></td>
		  </tr>-->
		  <tr id="hiderow" >
		    <td colspan="6"><a id="addrow" class="pull-right" href="javascript:;" title="Add a row" hidden><i class="fal fa-plus-square fa-2x add_row" aria-hidden="true"></i></a></td>
		  </tr>

		  <tr>
		      <td colspan="4" class="blank" style="width:100%">Payment type : </td>
		      <td class="total-line">Subtotal</td>
		      <td class="total-value"><span>₹</span><input type="text" id="subtotal"  name="subtotal" placeholder="00.00" value="" readonly></td>
		  </tr>
		  		  <tr>
		      <td colspan="4" class="blank">
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
		      <td class="total-line">Discount</td>
		      <td class="total-value"><span>₹</span><input type="text" class="discount" name="discount" id="discount" onkeypress="return isNumberKey(event)" value="0"  placeholder="00.00" value=""></td>
		  </tr>
		  <tr>
		      <td colspan="4" class="blank">
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
		      <td class="total-line">Advance</td>

		      <td class="total-value"><span>₹</span><input tabindex="-1" type="text" name="advance" id="advance" placeholder="00.00" value="" readonly></td>
		  </tr>
		  <tr>

		      <td colspan="4" class="blank"> </td>
		      <td class="total-line">Total</td>
		      <td class="total-value"><span>₹</span><input tabindex="-1" type="text" name="total" id="total" placeholder="00.00" value="" readonly="readonly"></td>
		  </tr>
		 <tr>
		      <td colspan="4" class="blank"> </td>
		      <td class="total-line">Paid</td>

		      <td class="total-value"><span>₹</span><input type="text" value="0.00" name="paid" id="paid" placeholder="00.00"   onkeypress="return isNumberKey(event)"></td>
		  </tr>
		  <tr>
		      <td colspan="4" class="blank"> </td>
		      <td class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><span>₹</span><input type="text" id="due" value='' class="due" readonly/></td>
		  </tr>

		</table>

		<div id="terms">
		  <h5>Terms</h5>
		  <textarea disabled><?php echo $opd_foot ;?></textarea>
		</div>
		</div>
	</div>
	<div class="card card-outline-info mb-3 do-not-print" style="margin-bottom: 3rem!important;margin-top: 1rem!important;">
		<div class="card-block" >
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-2">
						<button type="Submit" class="btn btn-outline-teal" id="button_save_reciept" href="javascript:void(0)" style=""> <i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Save</button>
					</div>
					<div class="col-md-2">
						<button class="btn btn-outline-danger" id="button_print" onclick="printreport('page-wrap')"> <i class="fa fa-print fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Print </button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
</div>
</body>
		      <!--<td hidden><span>₹<span><input type="test" id="cost" name="cost" class="cost" placeholder="00.00" value="" readonly="readonly"></td>
		      <td hidden><textarea class="qty">1</textarea></td>-->
<script>
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
var ID= "<?php echo base64_encode($ID);?>";
var pat_no_encodeID= "<?php echo $ID;?>";
var datafor= "<?php echo $RegID;?>";
var input = "";
<?php  if(isset($_GET['role-input-select'])){$scname=$_GET['role-input-select']; echo  "var input = '".$scname."';";}?>
$('#role-input-select').val(input);
$('#role-input-select #role option').attr('selected', false).find('[value="'+input+'"]').attr('selected', true);
	//$('#role-input-select').attr("value",input);
	//$('#role-input-select').focus(update_price());
	/* $("#button_save_reciept").on("Click",function(){
	event.preventDefault(); */
	$( "form#aspnetForm" ).on( "submit", function(event) {
		event.preventDefault();
		// alert("Clicked");
		var formData=$( this ).serialize();
		console.log("above success "+formData);
		if (validateForm()==true){
		$.ajax({
		   type: "GET",
		   url: "/invoice/set_invoice_opd.php",
		   data: formData,// serializes the form's elements.
		   success: function(data)
		   {
				console.log("success "+data);
				//var json2 = JSON.parse(data);
				parseJsonToForm2(data);
		   },error: function(xhr, textStatus, errorThrown){
		   swalError('request failed');
			},
			cache: false,
			contentType: false,
			processData: false
		});
		}else{}
	});
/* }); */

update_total();
update_balance();

function increment_print_count(){
	$.ajax({
		type: "GET",
		url: "/invoice/increment_print.php",
		data: "ID:"+ID+"",// serializes the form's elements.
		success: function(data)
		{
			parseJsonToForm2(data);
		},error: function(xhr, textStatus, errorThrown){
			swalError('request failed');
			},
		cache: false,
		contentType: false,
		processData: false
	});
}
$.get("/get_patient_detail_by_opd_ID.php",///get_patient_detail_by_patho_ID_for_report.php", //Required URL of the page on server
		{ID:pat_no_encodeID}, // Data Sending With Request To Server
function(response,status){ // Required Callback Function
			console.log(response);
			var json = JSON.parse(response);
			parseJsonToForm(json);
});

function parseJsonToForm(json){
		var name = json.FirstName+"&nbsp"+json.LastName;
		var age_sex = json.Age+" / "+json.Gender;
		var doctor_assigned = json.pathologist_name;
		var sample = json.SampleCollected;
		if(sample==1){sample="&nbsp;In lab";}else{sample="&nbsp;outside lab";}
		var date_visit = json.visit_date;
		var date_visit = date_visit.substring(0,11);
		var date_visit = date_visit.split('-').reverse().join('/');
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		if(dd<10) {dd = '0'+dd}
		if(mm<10) {mm = '0'+mm}
		today = dd + '/' + mm + '/' + yyyy;
		if(!doctor_assigned){doctor_assigned="N.A.";}else{doctor_assigned = "Dr. "+doctor_assigned;}
		console.log(name+"::"+age_sex+"::"+doctor_assigned+"::"+date_visit+"::"+json.patientID+"::"+json.RegID);
		setInnerValue('ctl00_lblpatid', json.patientID);
		setInnerValue('ctl00_lblpatientname', name);
		setInnerValue('ctl00_lbldrname',doctor_assigned);
		JsBarcode('#barcode1', json.RegID,{height:20,font:"Roboto",displayValue:true,margin:0,fontSize:10});
		setInnerValue('ctl00_lblregdate',date_visit);
		setInnerValue('ctl00_lblreportdate',today);
		setInnerValue('ctl00_lblage_sex',age_sex);
		setValue('ctl00_reportmaster_RegID',json.RegID);
		setValue('ctl00_reportmaster_PatID',json.patientID);
		update_balance();
		update_total();
}

$.ajax({
	   type: "GET",
	   url: "/invoice/get_o_reciept_data.php",
		data: "PatientId="+pat_no_encodeID+"&RegistrationID="+datafor,
	   success: function(data)
	   {
			console.log("invoice : : : "+data);
			var jsondata = JSON.parse(data);
			parseJsonToReciept(jsondata);
			console.log("reciept data : "+jsondata);
	   },
		cache: false,
		contentType: false,
		processData: false
	 });
function RadionButtonSelectedValueSet(name, SelectdValue) {
    $('input[name="' + name+ '"][value="' + SelectdValue + '"]').prop('checked', true);
    $('input[name="' + name+ '"][value="' + SelectdValue + '"]').click();
}
function parseJsonToReciept(d){

	var bill_no = d.recieptID;
	if( bill_no="undefined"){}else{setInnerValue('ctl00_lblrecid',bill_no);}
	var subtotal=roundNumber(d.subtotal,2);
	var total=roundNumber(d.TotalAmount,2);
	var discount=roundNumber(d.discount,2);
	var advance=roundNumber(d.advance,2);
	var paid=roundNumber(d.paid,2);
	var billdate=d.WhenEntered;
	var billdate = billdate.substring(0,11);
	var billdate = billdate.split('-').reverse().join('/');
	//setInnerValue('subtotal',subtotal);
	var due_fetch = subtotal-advance-paid-discount;
	var paymenttype = d.payment_type;
			if(paymenttype!=""){
				RadionButtonSelectedValueSet('paymenttype',paymenttype);
				setValue('cheque_number',d.cheque_no);
				setValue('elctronic_number',d.electronic_id);
			}
	for (i=0;i<=4;i++){
		var label="particulars_"+i;
		var price_label = "price_"+i;
		console.log("d.label : "+d[label]);
		label= d[label];
		price_label= d[price_label];
		console.log("label : "+label);
		if (label !="0"){
			 var $template = $('#items');
            //$clone    = $template.clone().removeAttr('id').removeAttr('hidden').val("").attr('data-book-index', i).insertBefore($template);
// Update the name attributes
		if(i==0){
		var particulars_label = "Doctor consultation charges.";
		}else{var particulars_label=label;}
        $template
		.find('[name="price-'+i+'"]').attr("value",price_label).prop( "readonly", true ).end()
		.find('[name="particulars-'+i+'"]').html(particulars_label).prop( "readonly", true ).end();
		}
	}
/* 	 swal({
			  title: roundNumber(due_fetch,2),

			  text: "Please reload the page",
			  icon: "success",
			  button:false,
			   timer: 2500
			});  */
	//setValue('total',total);
	if(discount!=0.00){
		setValue('discount',discount);
		make_readonly("discount");
	}

	if(advance!=0.00 || advance!=null || advance!=.00){
		console.log("advance"+advance);
		setValue('advance',advance);
	}
	make_readonly("advance");
	if(paid!=0.00){
		setValue('paid',paid);
		make_readonly("paid");
	}

	setInnerValue('ctl00_lblregdate',billdate);
	update_total();
		if(due_fetch=="" || due_fetch==0 || due_fetch==0.00 || due_fetch==null){
		//swalSuccess("hello");
		//alert("hello");
		$( "#paid" ).prop( "readonly", true );
		$( "#discount" ).prop( "readonly", true );
	}else{$("#paid").focus();}
}

function setInnerValue (id, val) {
	console.log("ID is : '"+id+"' ::: inner value is : "+val);
	document.getElementById(id).innerHTML=val;
}
function setValue (id, val) {
	console.log("ID is : '"+id+"' ::: value is : "+val);
	$("input[id="+id+"]").val(val);
	console.log("ID is : EOL'"+id+"' ::: value is : EOL "+val);
	//document.getElementById(id).value=val;
}
function validateForm() {
	var paymenttype = document.forms["aspnetForm"]["paymenttype"].value;
    var patTime = document.forms["aspnetForm"]["paid"].value;
    var total = document.forms["aspnetForm"]["total"].value;
    var discount = document.forms["aspnetForm"]["discount"].value;
    var advance = document.forms["aspnetForm"]["advance"].value;
	var balance = roundNumber(total,2)-roundNumber(paid,2)-roundNumber(discount,2)-roundNumber(advance,2);
	//swalSuccess(`Total ${total} ++ discount ${discount} ++ advance ${advance}++ paid ${patTime}`);
    if (total == "" || total == null || total == "00.00") {
        swalError("Select a Test to bill");
		$("#role-input-select").focus();
		$("#role-input-select").addClass('error').removeClass('noerror');
        return false;
    }else if (patTime == "" || patTime == null || patTime == "0.00" ) {
        swalError("Amount not entered");
		$("#paid").focus();
		$("#paid").addClass('error').removeClass('noerror');
        return false;
    }else if(paymenttype=="" && patTime !=0){
		swalError("payment type not selected");
		$("#cash").focus();
		$("#cash").addClass('error').removeClass('noerror');
	}else{ return true;}
}


function parseJsonToForm2(json2){
		swalSuccess("Reciept Saved");
}

function swalSuccess(text,title){
	if (!title){
	swal({
              title: "Success!",
              text: text,
              icon: "success",
              timer: 2000,
			  button:false
           });
	}else{
		swal({
              title: title,
              text: text,
              icon: "success",
              timer: 2000,
			  button:false
           });}
}
function swalError(text,title){
	if (!title){
	swal({
              title: "Error!",
              text: text,
              icon: "error",
              timer: 2000,
			  button:false
           });
	}else{
		swal({
              title: title,
              text: text,
              icon: "error",
              timer: 2000,
			  button:false
           });}
}

function make_readonly(id){
	document.getElementById(id).readOnly = true;
}
function revoke_readonly(id){
	document.getElementById(id).readOnly = false;
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
$pageTitle = "Reciept generation"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>
</html>
