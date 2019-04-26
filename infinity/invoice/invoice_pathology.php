<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
 if(isset($_GET['ID'])){$ID=$_GET['ID'];}
 if(isset($_GET['RegistrationID'])){$RegID=$_GET['RegistrationID'];}
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
</style>

<body>

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
		<div class="row">
		<div class="col-sm-6">
		<input type="text" name="scanner" id="scanner" />
		<script type="text/javascript">
			$(function() {
  $("#scanner").focus();
});
			$(document).scannerDetection({

			//https://github.com/kabachello/jQuery-Scanner-Detection

			timeBeforeScanTest: 200, // wait for the next character for upto 200ms
			avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
			preventDefault: true,

			endChar: [13],
			onComplete: function(barcode, qty){
			validScan = true;
            barcode_ajax(barcode);

			$('#scanner').val (barcode);

			} // main callback function	,
			,
			onError: function(string, qty) {

			$('#userInput').val ($('#userInput').val()  + string);


			}


			});
			function barcode_ajax(barcode){
				var temp_barcode=barcode;
					//alert("reached here");
							 $.ajax({
		   type: "POST",
		   url: "/getter/barcode_details.php",
		   data: {"barcode":temp_barcode},/* serializes the form's elements. */
		   success: function(data)
		   {	

			
		   },error: function(xhr, textStatus, errorThrown){
	
			},
	
		}); 
			}
		</script>

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
							$statement=$db->prepare("SELECT MAX(`reportID`) FROM hmsdb.pathology_reciepts");
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
							echo "R".str_pad($matches, 8, "0", STR_PAD_LEFT);;
							
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
		      <th colspan="2">Test Category</th>
		      <th ><!--Test Cost--></th>
		      <th ><!--No of tests--></th>
		      <th>Amount</th>
		  </tr>
		  
		  <!--<tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea>Hematology</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea>APTT</textarea></td>
		      <td><textarea class="cost">₹650.00</textarea></td>
		      <td><textarea class="qty">1</textarea></td>
		      <td><span class="price">₹650.00</span></td>
		  </tr>-->
		  
		  <tr class="item-row " >
		      <td class="item-name" colspan="2"><div class="delete-wpr"><div id="sex-input" class="form-input col-12">
					<input name="role-input-select-0" list="role" class="form-control role-input-select drop_select_print_outline" id="role-input-select" value="" />
					<datalist id="role">
					<?php 
					
					$db = getDB();
							$statement=$db->prepare("SELECT pscm.PathologySubCategoryName,pscm.PathologySubCategoryID,pscm.PathologyTestCharges,pcm.PathologyCategoryName FROM pathologysubcategorymaster as pscm left join pathologycategorymaster  as pcm on pscm.PathologyCategoryID = pcm.PathologyCategoryID");
							$statement->execute();
							$results=$statement->fetchAll();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							foreach($results as $row) {
								echo "<option value='".$row['PathologySubCategoryName']."' data-test_amount='".$row['PathologyTestCharges']."' data-Test_category='".$row['PathologyCategoryName']."'>".$row['PathologyCategoryName']."&nbsp;&nbsp;&nbsp;".$row['PathologyTestCharges']."</option>";
							}
							$db=null;
					
					/* $con=mysqli_connect("localhost","root","","hmsdb");if (mysqli_connect_errno()){
						echo "Failed to connect to MySQL: " . mysqli_connect_error();}
						$result = mysqli_query($con,"SELECT pscm.PathologySubCategoryName,pscm.PathologySubCategoryID,pscm.PathologyTestCharges,pcm.PathologyCategoryName FROM pathologysubcategorymaster as pscm left join pathologycategorymaster  as pcm on pscm.PathologyCategoryID = pcm.PathologyCategoryID");
						while($row = mysqli_fetch_array($result)){
							echo "<option value='".$row['PathologySubCategoryName']."' data-test_amount='".$row['PathologyTestCharges']."' data-Test_category='".$row['PathologyCategoryName']."'>".$row['PathologyCategoryName']."&nbsp;&nbsp;&nbsp;".$row['PathologyTestCharges']."</option>";
							}mysqli_close($con); */
						?>
					</datalist>
				</div><!--<a class="delete" href="javascript:;" title="Remove row">X</a>--></div></td>


		      <td><input type="test" id="cost" name="cost-0" class="cost" value="₹00.00" readonly="readonly" hidden></td>
		      <td><textarea class="qty" hidden>1</textarea></td>
		      <td><span>₹</span><input type="text" id="price" name="price-0" class="price" value="00.00" readonly="readonly"></td>
		  </tr>
		   <tr class="item-row " id="table_row_template" hidden>
		      <td class="item-name" colspan="2"><div class="delete-wpr"><div id="sex-input" class="form-input col-12">
					<input name="role-input-select" list="role" class="form-control role-input-select drop_select_print_outline"  id="role-input-select" />
					<datalist id="role">
					<?php $con=mysqli_connect("localhost","root","","hmsdb");if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$result = mysqli_query($con,"SELECT pscm.PathologySubCategoryName,pscm.PathologySubCategoryID,pscm.PathologyTestCharges,pcm.PathologyCategoryName FROM pathologysubcategorymaster as pscm left join pathologycategorymaster  as pcm on pscm.PathologyCategoryID = pcm.PathologyCategoryID");
	while($row = mysqli_fetch_array($result)){
		echo "<option value='".$row['PathologySubCategoryName']."' data-test_amount='".$row['PathologyTestCharges']."' data-Test_category='".$row['PathologyCategoryName']."'>".$row['PathologyCategoryName']."&nbsp;&nbsp;&nbsp;".$row['PathologyTestCharges']."</option>";
		}mysqli_close($con);?>
					</datalist>
				</div><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>


		      <td hidden><span>₹<span><input type="test" id="cost" name="cost" class="cost" placeholder="00.00" value="" readonly="readonly"></td>
		      <td hidden><textarea class="qty">1</textarea></td>
		      <td><span>₹<span><input type="text" id="price" name="price" class="price" placeholder="00.00" value="" readonly="readonly"></td>
		  </tr>
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" class="pull-right" href="javascript:;" title="Add a row"><i class="fal fa-plus-square fa-2x add_row" aria-hidden="true"></i></a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div class="row" style="margin:0px;"><span>₹</span><div id="subtotal">00.00</div><div></td>
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
		      <td colspan="2" class="blank"><div class="row justify-content-md-center">
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
				</div></td>
		      <td colspan="2" class="total-line">Discount</td>
		      <td class="total-value"><span>₹</span><input type="text" class="discount" name="discount" id="discount"  placeholder="00.00" value=""></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Advance paid</td>

		      <td class="total-value"><span>₹</span><input type="text" name="paid" id="paid" placeholder="00.00" value=""></td>
		  </tr>
		 <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><span>₹</span><input type="text" name="paynow" id="paynow" placeholder="00.00" value=""></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due">₹00.00</div></td>
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
		console.log(formData);
		if (validateForm()==true){
		$.ajax({
		   type: "POST",
		   url: "/invoice/set_invoice.php",
		   data: formData,// serializes the form's elements.
		   success: function(data)
		   {	
				console.log("success "+data);
				//var json2 = JSON.parse(data);
				parseJsonToForm2(data); 
		   },error: function(xhr, textStatus, errorThrown){
		   alert('request failed');
			},
			cache: false,
			contentType: false,
			processData: false
		});
		}else{}
	});
/* }); */


function increment_print_count(){
	$.ajax({
		type: "GET",
		url: "/invoice/increment_print.php",
		data: "ID:"+ID+"",// serializes the form's elements.
		success: function(data)
		{	
			//console.log(data);
			//var json2 = JSON.parse(data);
			parseJsonToForm2(data); 
		},error: function(xhr, textStatus, errorThrown){
			alert('request failed');
			},
		cache: false,
		contentType: false,
		processData: false
	});
}
$.get("/get_patient_detail_by_patho_ID_for_report.php", //Required URL of the page on server
		{ID:ID}, // Data Sending With Request To Server
function(response,status){ // Required Callback Function
			console.log(response);
			var json = JSON.parse(response);
			parseJsonToForm(json); 
});
/* $.ajax({
	   type: "GET",
	   url: "/get_patient_detail_by_patho_ID_for_report.php",
	   data: "ID=PL00000010" ,
	   success: function(data)
	   {	
			console.log(data);
			var json = JSON.parse(data);
			parseJsonToForm(json); 
	   },
		cache: false,
		contentType: false,
		processData: false
	 }); */
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
		setInnerValue('ctl00_lblpatid', json.PatientId);
		setInnerValue('ctl00_lblpatientname', name);
		setInnerValue('ctl00_lbldrname',doctor_assigned);
		//setInnerValue('ctl00_lblconsdr',doctor_assigned);
		//setInnerValue('ctl00_lblregID', json.RegistrationID);
		JsBarcode('#barcode1', json.RegistrationID,{height:20,font:"Roboto",displayValue:true,margin:0,fontSize:10});
		setInnerValue('ctl00_lblregdate',date_visit);
		setInnerValue('ctl00_lblreportdate',today);
		//setInnerValue('ctl00_lblregdate1',date_visit);
		setInnerValue('ctl00_lblage_sex',age_sex);
		//setInnerValue('ctl00_lblsample',sample);
		setValue('ctl00_reportmaster_RegID',json.RegistrationID);
		setValue('ctl00_reportmaster_PatID',json.PatientId);
		
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
    var patTime = document.forms["aspnetForm"]["paid"].value;
    var total = document.forms["aspnetForm"]["total"].value;
    var due = document.forms["aspnetForm"]["due"].value;
    if (total == "" || total == null || total == "00.00") {
        swal("Select a Test to bill");
		$("#role-input-select").focus();
		$("#role-input-select").addClass('error').removeClass('noerror');
        return false;
    }else if ((patTime == "" || patTime == null || patTime == "00.00" ) && (due != 0 || due !="0.00" || due != "00.00")) {
        swal("Amount not entered");
		$("#paid").focus();
		$("#paid").addClass('error').removeClass('noerror');
        return false;		
    }else{ return true;}
}


function parseJsonToForm2(json2){
		/* $('#First-name-input').val(json.firstname); */
		//setSelectValue('ctl00_reportmaster_txtPatientTime', json.RegID);
		//setSelectValue('patID', json.patientID)
		alert(json2);
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