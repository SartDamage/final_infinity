<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
 if(isset($_GET['PathoRegID'])){$PathoRegID=$_GET['PathoRegID'];//used to be patientID now is PathoRegID
  if (isset($_GET['RegistrationID'])){$RegID=$_GET['RegistrationID'];
 ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
	<link rel='stylesheet' type='text/css' href='/invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='/invoice/css/print.css' media="print" />
	<script type='text/javascript' src='/invoice/js/example.js'></script>
	<link href="/dist/css/report.css" rel="stylesheet" />
	<link href="/dist/css/AdminLayout.css" rel="stylesheet" />
<style>
body{background:#f1f1f1;}
table{border:0px}
.hmms_hdr_rgt table td, table th ,.hmms_hdr_lft table td, table th {
    border: 0px solid #808080;
    padding: 0px;
}
.cell_noborder{
	border-left:0px;
	border-right:0px;
}
.cell_noborder_right{
	border-right:0px;
}
.form-control:disabled, .form-control[readonly]{
	border: 0px;
    background-color: #ffffff00!important;
}
input[type="text"]{
    -webkit-appearance: textfield;
background-color: #ffffff00!important;}

@media print {
.print_invisible{
	display:none;
}

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
              <img id="image" src="<?php echo $logourl;?>" alt="logo" />
            </div>-->
		
		</div>
		<div class="row header_detail">	
				<div class="hmms_hdr_lft col-md-6">
                    <table>
                        <tr>
                             <td>Patient ID</td>
                            <td>:</td>
                            <td class="font-RobotoBold"><span id="ctl00_lblpatid"><?php echo $PathoRegID;?></span></td>
							
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
							
							$stat=$db->prepare("Select reportID FROM pathology_reciepts WHERE PatientId=:PathoRegID");
							$stat->bindParam(':PathoRegID', $PathoRegID, PDO::PARAM_INT);
							$res=$stat->execute();
							$resu = $stat->fetchColumn();
							$c = $stat->rowCount();
							if($c>0){
									echo $resu;
									}else{
							$statement=$db->prepare("SELECT MAX(`reportID`) FROM pathology_reciepts");
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
							echo "R".str_pad($matches, 8, "0", STR_PAD_LEFT);
							}
							$db=null;
							?></span></td>
						</tr>
                    </table>
                </div>
				
<input type="hidden" name="ctl00_reportmaster_AdminID" id="ctl00_reportmaster_AdminID" value="<?php echo (base64_encode($userDetails->ID));  ?>"/>
<input type="hidden" name="ctl00_reportmaster_RegID" id="ctl00_reportmaster_RegID"  value="" />
<input type="hidden" name="ctl00_reportmaster_PatID" id="ctl00_reportmaster_PatID"  value="<?php echo $PathoRegID;?>" />
			</div>
		<table id="items">
		
		  <tr class="head_table">
		      <th colspan="2">Test Category</th>
		      <th ><!--Test Cost--></th>
		      <th ><!--No of tests--></th>
		      <th>Amount</th>
		  </tr>
		  
		  <!----------------------------------------------------------->
		  <?php
					$tr = "";
					for ($x = 0; $x <= 4; $x++) {
						$sub_test_name ="sub_test_name_".$x;
						$sub_test_charges ="sub_test_charges_".$x;
						if( ((isset($_GET[$sub_test_name])) && $_GET[$sub_test_name]!="" && $_GET[$sub_test_name]!=null ) && (isset($_GET[$sub_test_charges])) ){
						$sub_test_name=$_GET[$sub_test_name];
						$sub_test_charges=$_GET[$sub_test_charges];
						
						$tr = '<tr class="item-row-'.$x.'" >';
						$tr .='<td class="item-name cell_noborder_right" colspan="2"><div class="delete-wpr">
								<div id="sex-input" class="form-input col-12">
								<input name="sub_test_name_'.$x.'" list="role" class="form-control role-input-select drop_select_print_outline" id="role-input-select" value="'.$sub_test_name.'" readonly/>
								</div></div>
								</td>';
						$tr .= '<td class="cell_noborder"><input type="test" id="cost" name="cost-'.$x.'" class="cost" value="₹00.00" readonly="readonly" hidden></td>';
						$tr .= '<td class="cell_noborder"><textarea class="qty" hidden>1</textarea></td>';
						$tr .='<td><span>₹</span><input type="text" id="price" name="price-'.$x.'" class="price" value="'.$sub_test_charges.'" readonly="readonly"></td>';
						$tr.='</tr>';
						echo $tr;
						}
						else{/*echo "some error occured";*/}
					}
		  
		  ?>
		  
		  
		  
		  <!--<tr class="item-row " >
		  </tr>-->
		  
		  <!------------------------------------------------------------->
		   <tr class="item-row " id="table_row_template" hidden>
		      <td class="item-name" colspan="2"><div class="delete-wpr">
			  <div id="sex-input" class="form-input col-12">
					<input name="role-input-select" list="role" class="form-control role-input-select drop_select_print_outline"  id="role-input-select" />
				</div><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>


		      <td hidden><span>₹<span><input type="test" id="cost" name="cost" class="cost" placeholder="00.00" value="" readonly="readonly"></td>
		      <td hidden><textarea class="qty">1</textarea></td>
		      <td><span>₹<span><input type="text" id="price" name="price" class="price" placeholder="00.00" value="" readonly="readonly"></td>
		  </tr>
		  <tr id="hiderow">
		    <td colspan="5"><!--<a id="addrow" class="pull-right" href="javascript:;" title="Add a row"><i class="fa fa-plus-square-o fa-2x add_row" aria-hidden="true"></i></a>--></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank">Payment type :</td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><span>₹</span><input type="text" name="subtotal" class="subtotal" id="subtotal" placeholder="00.00" value="00.00" readonly></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank">				
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
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><span>₹</span><input type="text" name="total" id="total" placeholder="00.00" value="" readonly="readonly"></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank">
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
		      <td colspan="2" class="total-line">Discount</td>
		      <td class="total-value"><span>₹</span><input type="text" class="discount" name="discount" id="discount"  placeholder="00.00" value=""></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Advance</td>

		      <td class="total-value"><span>₹</span><input type="text" name="advance" class="advance" id="advance" placeholder="00.00"  readonly ></td>
		  </tr>
		 <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Paid</td>

		      <td class="total-value"><span>₹</span><input type="text" name="paid" id="paid" placeholder="00.00" value=""></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><span style="color:red">₹</span><input type="text" name="due" class="due" id="due" placeholder="00.00" readonly></td>
		  </tr>
		 
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea disabled><?php echo $patho_foot ;?></textarea>
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
						<button type="button" class="btn btn-outline-danger" id="button_print"> <i class="fa fa-print fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Print </button>
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
var RegID= "<?php echo base64_encode($RegID);?>";
var datafor= "<?php echo $RegID;?>";
var PathoRegID= "<?php echo $PathoRegID;?>";
var input = "";
<?php  if(isset($_GET['role-input-select'])){$scname=$_GET['role-input-select'];
			echo  "var input = '".$scname."';";}?>
//$('#role-input-select').val(input);
//$('#role-input-select #role option').attr('selected', false).find('[value="'+input+'"]').attr('selected', true);
//$('#role-input-select').attr("value",input);
//$('#role-input-select').focus(update_price());
/* $("#button_save_reciept").on("Click",function(){
	event.preventDefault(); */
	$( "form#aspnetForm" ).off("submit").on( "submit", function(event) {
		event.preventDefault();
		// alert("Clicked");
		var formData=$( this ).serialize();
		console.log(formData);
		if (validateForm()==true){
		$.ajax({
		   type: "GET",
		   url: "/invoice/set_invoice.php",
		   data: formData,// serializes the form's elements.
		   success: function(data)
		   {	
				//console.log(data);
				//var json2 = JSON.parse(data);
				parseJsonToForm2(data); 
		   },error: function(xhr, textStatus, errorThrown){
		   //alert('request failed');
		   swal({
			   
			  icon: "success",
			  button:false,
			});
			},
			cache: false,
			contentType: false,
			processData: false
		});
		}else{}
	});
/* }); */

$('#button_print').on("click",function(){
		var formData=$( "form#aspnetForm" ).serialize();
		console.log(formData);
		if (validateForm()==true){
		$.ajax({
		   type: "GET",
		   url: "/invoice/set_invoice.php",
		   data: formData,// serializes the form's elements.
		   success: function(data)
		   {	
				//console.log(data);
				//var json2 = JSON.parse(data);
				printDiv();
				parseJsonToForm2(data); 
		   },error: function(xhr, textStatus, errorThrown){
		   //alert('request failed');
		   swal({
			   
			  icon: "success",
			  button:false,
			});
			},
			cache: false,
			contentType: false,
			processData: false
		});
		}else{}
	//increment_print_count();

})

    function printDiv(divname) {    

     window.print();

    }
	
/* 	$("#aspnetForm").printThis({
  debug: false,               // show the iframe for debugging
  importCSS: true,            // import page CSS
  importStyle: false,         // import style tags
  printContainer: true,       // grab outer container as well as the contents of the selector
  //loadCSS: "path/to/my.css",  // path to additional css file - use an array [] for multiple
  pageTitle: "Report",              // add title to print page
  removeInline: false,        // remove all inline styles from print elements
  //printDelay: 333,            // variable print delay
  //header: null,               // prefix to html
  //footer: null,               // postfix to html
  //base: false ,               // preserve the BASE tag, or accept a string for the URL
  formValues: true,           // preserve input/form values
  //canvas: false,              // copy canvas elements (experimental)
  //doctypeString: "...",       // enter a different doctype for older markup
  removeScripts: false,       // remove script tags from print content
  copyTagClasses: false       // copy classes from the html & body tag
}); */
function increment_print_count(){
	$.ajax({
		type: "GET",
		url: "/invoice/increment_print.php",
		data: "ID:"+PathoRegID+"",// serializes the form's elements.
		success: function(data)
		{	
			//console.log(data);
			//var json2 = JSON.parse(data);
			//parseJsonToForm2(data); 
		},error: function(xhr, textStatus, errorThrown){
			//alert('request failed');
			swal({
			  title: "Error" ,
			  
			  text: "Request failed",
			  icon: "error",
			  button:false,
			   timer: 1500
			});
			},
		cache: false,
		contentType: false,
		processData: false
	});
}
update_total();
$.get("/get_patient_detail_by_patho_ID_for_report.php",//"/get_patient_detail_by_regID.php", //Required URL of the page on server
		{ID:RegID}, // Data Sending With Request To Server
function(response,status){ // Required Callback Function
			console.log(response);
			var json = JSON.parse(response);
			parseJsonToForm(json); 
});


$.ajax({
	   type: "GET",
	   url: "/invoice/get_p_recipt_data.php",
		data: "PatientId="+PathoRegID+"&RegistrationID="+datafor,
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
	var paymenttype = d.payment_type;
		if(paymenttype!=""){
			RadionButtonSelectedValueSet('paymenttype',paymenttype);
			setValue('cheque_number',d.cheque_no);
			setValue('elctronic_number',d.electronic_id);
		}
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
/* 	 swal({
			  title: roundNumber(due_fetch,2),
			  
			  text: "Please reload the page",
			  icon: "success",
			  button:false,
			   timer: 2500
			});  */
	setValue('total',total);
	if(discount!=0.00){
		setValue('discount',discount);
	}
	if(advance!=0.00 || advance!=null || advance!=.00){
		console.log("advance"+advance);
		setValue('advance',advance);
	}
	if(paid!=0.00){
		setValue('paid',paid);
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
	 
	 
function parseJsonToForm(json){
		var name = json.FirstName+"&nbsp"+json.LastName;
		var age_sex = json.Age+" / "+json.Gender;
		var doctor_assigned = "Dr. "+json.pathologist_name;
		var sample = json.SampleCollected;
		if(sample==1){sample="&nbsp;In lab";}else{sample="&nbsp;outside lab";}
		var date_visit = json.WhenEntered;
		var date_visit = date_visit.substring(0,11);
		var date_visit = date_visit.split('-').reverse().join('/');
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		if(dd<10) {dd = '0'+dd}
		if(mm<10) {mm = '0'+mm}
		today = dd + '/' + mm + '/' + yyyy;
		if(!doctor_assigned){doctor_assigned="N.A.";}else{doctor_assigned = doctor_assigned;}
		console.log(name+"::"+age_sex+"::"+doctor_assigned+"::"+date_visit+"::"+json.PatientId+"::"+json.RegistrationID);
		//document.getElementById(ctl00_lblpatid).innerHTML=json.patientID;
		//setInnerValue('ctl00_lbllabid', json.LabName);
		//setInnerValue('ctl00_lblpatid', json.PatientId);
		setInnerValue('ctl00_lblpatientname', name);
		setInnerValue('ctl00_lbldrname',doctor_assigned);
		//setInnerValue('ctl00_lblconsdr',doctor_assigned);
		//setInnerValue('ctl00_lblregID', json.RegistrationID);
		JsBarcode('#barcode1', json.RegistrationID,{height:20,font:"Roboto",displayValue:true,margin:0,fontSize:10});
		//setInnerValue('ctl00_lblregdate',date_visit);
		setInnerValue('ctl00_lblreportdate',date_visit);
		//setInnerValue('ctl00_lblregdate1',date_visit);
		setInnerValue('ctl00_lblage_sex',age_sex);
		//setInnerValue('ctl00_lblsample',sample);
		setValue('ctl00_reportmaster_RegID',json.RegistrationID);
		//setValue('ctl00_reportmaster_PatID',json.PatientId);
		var patTime = document.forms["aspnetForm"]["paid"].value;
		if(patTime==""){
			setValue('paid',0);
		}
}

// setSelectValue (id, val) {}is in footer

function setInnerValue (id, val) {
	console.log("ID is : '"+id+"' ::: inner value is : "+val);
	document.getElementById(id).innerHTML=val;
}
function setValue (id, val) {
	console.log("ID is : '"+id+"' ::: value is : "+val);
	$("input[id="+id+"]").val(val)
	console.log("ID is : EOL'"+id+"' ::: value is : EOL "+val);
	//document.getElementById(id).value=val;
}	
function validateForm() {
	var paymenttype = document.forms["aspnetForm"]["paymenttype"].value;
    var patTime = document.forms["aspnetForm"]["paid"].value;
    var total = document.forms["aspnetForm"]["total"].value;
	var due = document.forms["aspnetForm"]["due"].value;
	if(patTime==""){
		setValue('paid',0);
	}
    if (total == "" || total == null || total == "00.00") {
        //alert("Select a Test to bill");
		swal({
			  title: "Some Error occured" ,
			  
			  text: "Please reload the page",
			  icon: "error",
			  button:false,
			   timer: 2500
			});
		$("#role-input-select").focus();
		$("#role-input-select").addClass('error').removeClass('noerror');
        return false;
    }else if ((patTime == "" || patTime == null || patTime == "00.00" ) && ( due !="0.00")) {
		swal({
			  title: "Amount not entered" ,
			  
			  text: "Enter Amount paid",
			  icon: "error",
			  button:false,
			   timer: 1500
			});
        //alert("Amount not entered");
		$("#paid").focus();
		$("#paid").addClass('error').removeClass('noerror');
        return false;		
    }else if(paymenttype=="" && patTime !=0){
		swal({
			  title: "Payment Type Not Selected" ,
			  
			  text: "Select a Payment type",
			  icon: "error",
			  button:false,
			   timer: 1500
			});
		$("#cash").focus();
		$("#cash").addClass('error').removeClass('noerror');
	}else{ return true;}
}


function parseJsonToForm2(json2){
		/* $('#First-name-input').val(json.firstname); */
		//setSelectValue('ctl00_reportmaster_txtPatientTime', json.RegID);
		//setSelectValue('patID', json.patientID)
		//alert(json2);
		console.log("json2"+json2)
		if (json2==" Reciept Saved"){
			var title="Success";
			var text="Reciept successfully saved";
			var icon="success"
		}else{
			var title="Error";
			var text="Reciept not saved";
			var icon="error"
		}
		swal({
			  title: json2,
			  
			  text: text,
			  icon: icon,
			  button:false,
			   timer: 1500
			});
}
function goBack() {
    window.history.back()
}
</script>
<?php
  }else{header("Location:/error.php");
die();}
 }
 else{header("Location:/error.php");
die();}
$pageTitle = "Reciept generation"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	
</html>