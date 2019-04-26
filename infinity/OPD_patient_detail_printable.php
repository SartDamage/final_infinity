<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
 if(isset($_GET['ID'])){$ID=$_GET['ID'];}else{$ID="0";}
?>

<?php include './include/header.php';?>
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
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 1px 2px 8px 0.2rem #dae0e5;}
.card-block:hover{    box-shadow: 3px 3px 3px 0.2rem #868e96;}
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
body{background-color:#ffffff!important;}
@media print {
	body * { visibility: hidden; }
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
}
.main div.content {
  all: revert;
}
</style>
<link href="./dist/css/patient_consulting_form.css" rel="stylesheet" />
<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
<div class="container section-to-print" id="reg-form-container" style="/* padding-left:50px; */margin-top:15px;">
	<form method="post" action="" id="opd_patient_detail_Form">
<!--<div class="aspNetHidden">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTQzNDAxMTA0Nw8WAh4TVmFsaWRhdGVSZXF1ZXN0TW9kZQIBZGQd2lJur4DW7GoAkDrLrc2rVNfd4J3194YVWYOc3verbw==" />
</div>-->

<!--<div class="aspNetHidden">

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="" />
</div>-->
			<div class="row justify-content-between"style="padding-left:50px;padding-right:50px;">

				<div id="previous" class="col-md-1 section-notto-print btn btn-outline-primary">Previous</div>
				<div id="next" class="col-md-1 section-notto-print btn btn-outline-primary">Next</div>
			</div>
			<hr>
			<br>
        <div class="hmms_report section-to-print" id="get_text_qr">
            <div class="hmms_hdr row justify-content-center ">
                <div class="hmms_hdr_lft col-md-6">
                    <div class="row justify-content-center ">
                        <div class="col-md-12">
							<div class="row justify-content-center">
								<div class="col-md-4">Patient ID</div>
								<div class="col-md-1"> : </div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblpatid"><?php echo $ID;?></span></div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-4">Patient Name</div>
								<div class="col-md-1"> : </div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblptname"><?php echo $ID;?></span></div>
							</div>
							<!--<tr>
								<td>Ref. By</td>
								<td>:</td>
								<td class="font-RobotoBold"><span id="ctl00_lblrefdr"></span></td>
							</tr> -->
							<div class="row justify-content-center">
								<div class="col-md-4">Cons. Dr.</div>
								<div class="col-md-1"> : </div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lbldr"><?php echo $ID;?></span></div>
							</div>
                        </div>
                    </div>
                </div>
                <div class="hmms_hdr_rgt col-md-6">
                   <div class="row justify-content-center ">
                        <div class="col-md-12">
							<div class="row justify-content-center">
								<div class="col-md-4">Reg. ID</div>
								<div class="col-md-1">:</div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblregID"></span></div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-4">Date</div>
								<div class="col-md-1">:</div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblvisitdate"></span></div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-4">Age/Sex</div>
								<div class="col-md-1">:</div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblage_sex"></span></div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-4">Patient Label</div>
								<div class="col-md-1">:</div>
								<div class="col-md-7 font-RobotoLight"><img id="barcode1"/></div>
							</div>
							<div class="row justify-content-center">
								<!--<br>-->
							</div>
						</div>
					</div>
				</div>

				<input type="hidden" name="ctl00_AdminID" id="AdminID" value="<?php echo $userDetails->ID;?>"/>
				<input type="hidden" name="ctl00_ptID" id="ctl00_ptID" value="<?php echo $ID; ?>" />
				<div class="hmms_hdr col-md-12">
					<div class="">
						<div class="hmms_title">OPD</div>
					</div>
					<div class="row justify-content-center " style="margin:0px!important;"><!--/* profile_tbl */-->
						<div class="col-md-12/* width-100 */">
							<div class="row justify-content-center ">
								<div class="col-md-4 font-RobotoBold /* width-30 */">Symptoms</div>
								<div class="col-md-4 font-RobotoBold /* width-30 */">Diagnosis</div>
								<div class="col-md-4 font-RobotoBold /* width-30 */">Prescription</div>
							</div>
							<div class="row justify-content-center ">
								<div class="col-md-4"  id="ct100_lblptsymptoms">
									<textarea name="ctl00_ptsymptoms" rows="6" type="text"  id="ctl00_ptsymptoms" class="text-area-opd-detail  width-100 clearable" ></textarea></div>
								<div class="col-md-4" ><!--class="width-30"-->
									<textarea name="ctl00_diagnosis" rows="6" type="text"  id="ctl00_diagnosis" class="text-area-opd-detail /* width-100 */ clearable" ></textarea></div>
								<div class="col-md-4" >
									<textarea name="ctl00_ptprescription" rows="6" type="text"  id="ctl00_ptprescription" class="text-area-opd-detail /* width-100 */ clearable"></textarea>
								</div>
							</div>
              	<div class="row justify ">
                  <div class="col-md-4 font-RobotoBold /* width-30 */">Add Procedure</div>
                  <div class="col-md-4 font-RobotoBold /* width-30 */">Investigation Advice</div>
                </div>
                <div class="row justify-content-center ">
                  <div class="col-md-4" >
                  	<textarea name="Add_Procedure" rows="6" type="text"  id="Add_Procedure" class="text-area-opd-detail /* width-100 */ clearable"></textarea>
                  </div>
                  <div class="col-md-4" >
                    <textarea name="Investigation_Advice" rows="6" type="text"  id="Investigation_Advice" class="text-area-opd-detail /* width-100 */ clearable"></textarea>
                  </div>
                  <div class="col-md-4" >
                  </div>
                </div>
						</div>
					</div>
					<div class="row justify-content-center section-notto-print" style="margin:0px!important;">
						<div class="hmms-rptnote">
							<span></span>
						</div>
						<div class="hmms-click section-notto-print">
							<input type="submit" name="ctl00_btnSave" value="Save" id="ctl00_btnSave" class="btn btn-primary section-notto-print" />
						</div>
						<div class="hmms-reset section-notto-print">
							<input class="btn btn-danger section-notto-print" type="button" id="ctl00_btnReset" value="Clear" onclick="javascript: functionName();">
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div id="qrcode"></div>
			</div>
		</div>
    </form>


					<br><br>
</div>
</div>
<script src="/ckeditor/ckeditor.js"></script>
<script>
/*CKEDITOR.replace( 'ctl00_ptsymptoms', {
    customConfig: '/ckeditor/config.js'
});CKEDITOR.replace( 'ctl00_diagnosis', {
    customConfig: '/ckeditor/config.js'
});CKEDITOR.replace( 'ctl00_ptprescription', {
    customConfig: '/ckeditor/config.js'
});*/
/**------set patient data symptom,diagnosis,prescription according to patID------**/

var ID= "<?php echo $ID;?>";
function pad(number, length) {

    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
    return str;
}
$("#next").on('click',function(){
	//var string = "border-radius:10px 20px 30px 40px";
	var numbers = ID.match(/\d+/g).map(Number);
	numbers = Number(numbers)+1;
	numbers = pad(numbers,8);
	numbers =`OPD${numbers}`;
	console.log(`the numbers are ${numbers}`);
	var url_next=`/OPD_patient_detail_printable.php?ID=${numbers}`;
	$.ajax({
		   type: "GET",
		   url: <?php echo $url_get_update_patient_by_ID;?>,
		   data: 'ID='+numbers+'',
		   success: function(data)
		   {
				if(data!=""){
					window.location.replace(url_next);
				}else{swalError("Patient list finished");}
			},
			cache: false,
			contentType: false,
			processData: false
		 });
	//window.location=`/OPD_patient_detail_printable.php?ID=${incrementID}`;
});
$("#previous").on('click',function(){
	//var string = "border-radius:10px 20px 30px 40px";
	var numbers = ID.match(/\d+/g).map(Number);
	numbers = Number(numbers)-1;
	numbers = pad(numbers,8);
	numbers =`OPD${numbers}`;
	console.log(`the numbers are ${numbers}`);
	var url_next=`/OPD_patient_detail_printable.php?ID=${numbers}`;
	$.ajax({
		   type: "GET",
		   url: <?php echo $url_get_update_patient_by_ID;?>,
		   data: 'ID='+numbers+'',
		   success: function(data)
		   {
				if(data!=""){
					window.location.replace(url_next);
					//window.location=url_next;
				}else{swalError("Patient list finished");}
			},
			cache: false,
			contentType: false,
			processData: false
		 });
	//window.location=`/OPD_patient_detail_printable.php?ID=${incrementID}`;
});
if (ID=="0"){swal({
              title: "Patient data not available",
              text: "Please reload the page, to try again",
              icon: "warning",
              //timer: 2000,
			  button:false
	});}
else{
	$("#ctl00_btnSave").on('click',function(){
		$("form#opd_patient_detail_Form").off('submit').on("submit",function(e){
			e.preventDefault();
			var formData = $("#opd_patient_detail_Form").serialize();
			//var formData = $("form#opd_patient_detail_Form").serialize()
			console.log("formData : "+formData);
			//alert("Submitted");
			var symptom = $('textarea#ctl00_ptsymptoms').val();
			var diagnosis = $('textarea#ctl00_diagnosis').val();
			var prescription = $('textarea#ctl00_ptprescription').val();
			if( (symptom == "" )){
				swalInfo("Symtoms not noted","Fields Empty");
				$( "textarea#ctl00_ptsymptoms" ).focus();
			}else if((diagnosis == "" )){
				swalInfo("diagnosis not noted","Fields Empty");
				$( "textarea#ctl00_diagnosis" ).focus();
			}else if( (prescription=="") ){
				swalInfo("Prescription not noted,\n Enter N.A. if not applicable","Fields Empty");
				$( "textarea#ctl00_ptprescription" ).focus();
			}else{
				$.ajax({
			   type: "POST",
			   url:"set_opd_patient_diagnosis_by_dr.php",
			   data: formData,
			   success: function(data)
			   {
				console.log("data : "+data);
				swalSuccess("Patient Data Updated.");
			   },
			   error: function(xhr, status, error) {
				  var err = eval("(" + xhr.responseText + ")");
				  alert(err.Message);
				}
			 });
			}

		});
	});
/**----- get patient data from patientregistrationmaster+patientopd+patientdetails -----**/

	$.ajax({
		   type: "GET",
		   url: <?php echo $url_get_update_patient_by_ID;?>,
		   data: 'ID='+ID+'',
		   success: function(data)
		   {
				console.log("data :: "+data);
				if(data!=""){
					var json = JSON.parse(data);
					parseJsonToForm(json);
				}else{
					console.log("hello");
					window.location="/gibberish.php";
				}

		   },error: function (error) {
			alert('error; ' + eval(error));
			},
			cache: false,
			contentType: false,
			processData: false
		 });
		 function parseJsonToForm(json){

			var name = json.FirstName+"&nbsp"+json.LastName;
			var age_sex = json.Age+" / "+json.Gender;
			var doctor_assigned = "";
			var date_visit = json.visit_date;
			//var date_visit = date_visit.substring(0,11);
			//var date = json[i].WhenEntered;
			var time = date_visit.substring(11,19);
			var date_visit = date_visit.substring(0,11);
			var date_visit= date_visit.split("-").reverse().join("-");
			if(!(json.doctor_assigned)){doctor_assigned="N.A.";}else{doctor_assigned = json.doctor_assigned;}
			if(isNaN(doctor_assigned)){
							setInnerValue('ctl00_lbldr',doctor_assigned);
			}else{
				var doctor_assigned = get_dr_name(doctor_assigned);
			}
			console.log(name+"::"+age_sex+"::"+doctor_assigned+"::"+date_visit+"::"+json.patientID);
			//document.getElementById(ctl00_lblpatid).innerHTML=json.patientID;
			setInnerValue('ctl00_lblpatid', json.patientID);
			setInnerValue('ctl00_lblptname', name);

			setInnerValue('ctl00_lblregID', json.RegID);
			JsBarcode('#barcode1', json.RegID,{height:20,font:"Roboto",displayValue:true,margin:0,fontSize:10});
			setInnerValue('ctl00_lblvisitdate', date_visit);
			setInnerValue('ctl00_lblage_sex', age_sex);
			var symptom_for_qr ="";
			var diagnosis_for_qr ="";
			var prescription_for_qr ="";
      var Add_Procedure_for_qr="";
      var Investigation_Advice_for_qr="";
			if(!(json.symptom)){}else{
			setSelectValue('ctl00_ptsymptoms',json.symptom);
			symptom_for_qr = json.symptom;
			}
			if(!(json.diagnosis)){}else{
			setSelectValue('ctl00_diagnosis',json.diagnosis);
			diagnosis_for_qr = json.diagnosis;
			}
			if(!(json.prescription)){}else{
			setSelectValue('ctl00_ptprescription',json.prescription);
			prescription_for_qr = json.prescription;
			}
      if(!(json.Add_Procedure)){}else {
        setSelectValue('Add_Procedure',json.Add_Procedure);
        Add_Procedure_for_qr = json.Add_Procedure;
      }
      if(!(json.Investigation_Advice)){}else {
        setSelectValue('Investigation_Advice',json.Investigation_Advice);
        Investigation_Advice_for_qr = json.Investigation_Advice;
      }
			var textContent = "Patient Name : "+json.FirstName+" "+json.LastName+" ::: Registration ID : "+json.RegID+"\n Dr. Assigned : "+doctor_assigned+"  ::: Date : "+date_visit+"\n Symptom : "+symptom_for_qr+"\n Diagnosis : "+diagnosis_for_qr+"\n Prescription : "+prescription_for_qr;
			console.log("value is : "+textContent);

/* var qrcode = new QRCode("qrcode", {
    text: textContent,
    width: 200,
    height: 200,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
}); */
	}
/* 	function parseJsonToForm(json){
			var name = json.FirstName+"&nbsp"+json.LastName;
			var age_sex = json.Age+" / "+json.Gender;
			var doctor_assigned = "";
			var date_visit = json.visit_date;
			//var date_visit = date_visit.substring(0,11);
			//var date = json[i].WhenEntered;
			var time = date_visit.substring(11,19);
			var date_visit = date_visit.substring(0,11);
			var date_visit= date_visit.split("-").reverse().join("-");
			if(!(json.doctor_assigned)){doctor_assigned="N.A.";}else{doctor_assigned = json.doctor_assigned;}
			console.log(name+"::"+age_sex+"::"+doctor_assigned+"::"+date_visit+"::"+json.patientID);
			//document.getElementById(ctl00_lblpatid).innerHTML=json.patientID;
			setInnerValue('ctl00_lblpatid', json.patientID);
			setInnerValue('ctl00_lblptname', name);
			setInnerValue('ctl00_lbldr',doctor_assigned);
			setInnerValue('ctl00_lblregID', json.RegID);
			JsBarcode('#barcode1', json.RegID,{height:20,font:"Roboto",displayValue:true,margin:0,fontSize:10});
			setInnerValue('ctl00_lblvisitdate', date_visit);
			setInnerValue('ctl00_lblage_sex', age_sex);
			if(!(json.symptom)){}else{
			setSelectValue('ctl00_ptsymptoms',json.symptom);
			}
			if(!(json.diagnosis)){}else{
			setSelectValue('ctl00_diagnosis',json.diagnosis);
			}
			if(!(json.prescription)){}else{
			setSelectValue('ctl00_ptprescription',json.prescription);
			}
			var body = document.getElementById("get_text_qr");
var textContent =  body.innerText;
console.log(textContent);
//console.log("value is : "+$("#get_text_qr textarea").val());

var qrcode = new QRCode("qrcode", {
    text: textContent,
    width: 250,
    height: 250,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});
	} */

	// setSelectValue (id, val) {}is in footer

	function setInnerValue (id, val) {
		console.log("ID is : '"+id+"' ::: inner value is : "+val);
		document.getElementById(id).innerHTML=val;
	}

	function functionName()
	{
		$("#ctl00_ptsymptoms").val("");
		$("#ctl00_diagnosis").val("");
		$("#ctl00_ptprescription").val("");
	}

	/**
	 * Clearable text inputs
	 */
	function tog(v){return v?'addClass':'removeClass';}
		$(document).on('input', '.clearable', function(){
			$(this)[tog(this.value)]('x');
		}).on('mousemove', '.x', function( e ){
			$(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
		}).on('touchstart click', '.onX', function( ev ){
			ev.preventDefault();
			$(this).removeClass('x onX').val('').change();
		});

// $('.clearable').trigger("input");
// Uncomment the line above if you pre-fill values from LS or server
		function get_dr_name(doctor_name){
			var dr_name = "";
			console.log("doctoe_name  :: "+doctor_name);
			$.ajax({
							   type: "GET",
							   url:"/get_dr_name_by_dr_id.php",
							   data: { 'dr_ID' : doctor_name},
							   success: function(data)
							   {
								data = JSON.parse(data);
								//console.log("data : "+data);
								//swalSuccess("Patient Data Updated.");
									dr_name = "Dr. "+data.firstname+" "+data.lastname;
								console.log("Dr. "+data.firstname+" "+data.lastname);
								setInnerValue('ctl00_lbldr',dr_name);
							   },
							   error: function(xhr, status, error) {
								  var err = eval("(" + xhr.responseText + ")");
								  alert(err.Message);
								}
							 });

		}
}
<?php
 	$userDetails=$userClass->userDetails($session_id);
	$var = $userDetails->roleid;
	if($var == "8" || $var == "15"){
		echo '$("form :input").attr("readonly", true);';
		echo "\n";
		}
	?>
</script>

<?php
$pageTitle = "Report OPD Patient HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>
<script>
$(document).ready(function() {

});</script>
<?php include './include/footer.php';?>
