

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="./WIDALReport.aspx" id="aspnetForm" class="section-to-print">
</div>
        <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">BLOOD SUGAR PP</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">Fasting Plasma Glucose</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtFastingPlasmaGlucose" type="text" maxlength="100" id="ctl00_reportmaster_txtFastingPlasmaGlucose" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">70 To 110 mg/dl</td>
                </tr>
				 <tr>
                    <td class="width-40">Fasting Urine Glucose</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtFastingUrineGlucose" type="text" maxlength="100" id="ctl00_reportmaster_txtFastingUrineGlucose" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">70 To 110 mg/dl</td>
                </tr>
                <tr>
                    <td class="width-40">Fasting Urine Ketone</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtFastingUrineKetone" type="text" maxlength="100" id="ctl00_reportmaster_txtFastingUrineKetone" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
                <tr>
                    <td class="width-40">Post Prandial Plasma Glucose <Br>(2 hrs. after Lunch)</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtPostPrandialPlasmaGlucose" type="text" maxlength="100" id="ctl00_reportmaster_txtPostPrandialPlasmaGlucose" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">70 To 140 mg/dl</td>
                </tr>
                <tr>
                    <td class="width-40">PP Urine Glucose</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtPPUrineGlucose" type="text" maxlength="100" id="ctl00_reportmaster_txtPPUrineGlucose" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
                <tr>
                    <td class="width-40">PP Urine Ketone</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtPPUrineKetone" type="text" maxlength="100" id="ctl00_reportmaster_txtPPUrineKetone" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
                
            </table>
        </div>
        <div class="hmms-rptnote">
			<table>
		<tr>
			<!--<td>
				<span>Method : GOD - POD Enzymatic<br /><br />
						Test Done on Semi automated analyserMicro Lab RX-50<br /><br />
						Urine Sugar Interpretation:<br />
						Trace : 0.1 g/dl<br />
						+ : 0.25 g/dl<br />
						++ : 0.5 g/dl<br />
						+++ : 1.0 g/dl<br />
						++++ : 2.0 g/dl<br />
				</span>
			</td>-->
			<td>
				<center>
				<table class="ref_range_tab">
					<thead><th>Status</th><th>Range Fasting (mg/dl)</th></thead>
					<tbody>
						<tr><td>Normal</td><td>70 - 100</td></tr>
						<tr><td>Impaired fasting Glucose</td><td>70 - 140</td></tr>
						<tr><td>Impaired Glucose Tolerance</td><td>141- 199</td></tr>
						<tr><td>Pre diabetes</td><td>141 – 199</td></tr>
						<tr><td>Diabetes mellitus</td><td> > 200</td></tr>
					</tbody>
				</table>
				</center>
			</td>
		</tr>
		</table>
			
            <span><br />
               </span>
            <span class="text-center margin-bottom-60 ">--END OF REPORT--</span>

        </div>
        <div class="hmms-click section-notto-print"><input type="submit" name="ctl00_reportmaster_btnSave" value="Save" id="ctl00_reportmaster_btnSave" class="btn-css primry-colr" /><?php $db = getDB();  $statement=$db->prepare("SELECT  *  FROM `pathopatientregistrationmaster`  WHERE  `PatientId`=:PathoRegID  AND `payment`=0" );  $statement->bindParam(':PathoRegID', $ID, PDO::PARAM_INT); $statement->execute();  if ( $statement->rowCount() <= 0){ echo '<input type="button"   name="ctl00_reportmaster_btnPrint" value="Print" id="ctl00_reportmaster_btnPrint" class="btn-css primry-colr pull-right" />';}?>
        </div>
    </div>

            </div>
        </div>
    </form>
</body>

<script>

	
var ID = "<?PHP echo $ID ?>";
var str = $( ".hmms-reprtname" ).text();

str=str.replace(/[^a-zA-Z\d0-9\s]/g, "");
str = str.toLowerCase();

str=str.replace(/[^a-zA-Z\d0-9]/g, "_");
str = "p_"+str;

console.log("str name :"+str);
str= encode(str);
//var url="";
$.ajax({
	   type: "GET",
	   url: "/get_p_ReportData.php?ID="+ID+"&test="+str+"",
	   //data: 'ID='+ID+'',// serializes the form's elements.
	   success: function(data)
	   {	
			console.log(" jsonforindividual :"+data);
			jsonforindividual = JSON.parse(data);
			parseJsonToFormIndividual(jsonforindividual);  
	   },
		cache: false,
		contentType: false,
		processData: false
	 });


$( "form#aspnetForm" ).on( "submit", function(event) {
	event.preventDefault();
	// alert("Clicked");
	var formData=$( this ).serialize();
	console.log(formData);
	if (validateForm()==true){
	$.ajax({
	   type: "GET",
	   url: "/set_p_BloodSugarPpReport.php",
	   data: formData,// serializes the form's elements.
	   success: function(data)
	   {	
			//console.log(data);
			//var json2 = JSON.parse(data);
			parseJsonToForm2(data); 
	   },
		cache: false,
		contentType: false,
		processData: false
	});
	}else{}
});


function validateForm() {
    var a = document.forms["aspnetForm"]["ctl00_reportmaster_txtFastingPlasmaGlucose"].value;
	var f = document.forms["aspnetForm"]["ctl00_reportmaster_txtFastingUrineGlucose"].value;
	
    var b = document.forms["aspnetForm"]["ctl00_reportmaster_txtFastingUrineKetone"].value;
    var c = document.forms["aspnetForm"]["ctl00_reportmaster_txtPostPrandialPlasmaGlucose"].value;
    var d = document.forms["aspnetForm"]["ctl00_reportmaster_txtPPUrineGlucose"].value;
    var e = document.forms["aspnetForm"]["ctl00_reportmaster_txtPPUrineKetone"].value;
    if (a == "" || a == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtFastingPlasmaGlucose").focus();
		$("#ctl00_reportmaster_txtFastingPlasmaGlucose").addClass('error').removeClass('noerror');
        return false;	
    }else if (b == "" || b == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtFastingUrineKetone").focus();
		$("#ctl00_reportmaster_txtFastingUrineKetone").addClass('error').removeClass('noerror');
        return false;	
    }else if (f == "" || f == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtFastingUrineGlucose").focus();
		$("#ctl00_reportmaster_txtFastingUrineGlucose").addClass('error').removeClass('noerror');
        return false;	
    }else if (c == "" || c == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPostPrandialPlasmaGlucose").focus();
		$("#ctl00_reportmaster_txtPostPrandialPlasmaGlucose").addClass('error').removeClass('noerror');
        return false;	
    }else if (d == "" || d == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPPUrineGlucose").focus();
		$("#ctl00_reportmaster_txtPPUrineGlucose").addClass('error').removeClass('noerror');
        return false;	
    }else if (e == "" || e == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPPUrineKetone").focus();
		$("#ctl00_reportmaster_txtPPUrineKetone").addClass('error').removeClass('noerror');
        return false;	
    }else{ return true;}
}

function setSelectValue (id, val) {
	console.log("ID is : "+id+" :::  value is : "+val);
    document.getElementById(id).value = val;
}

function parseJsonToForm2(json2){
		/* $('#First-name-input').val(json.firstname); */
		//setSelectValue('ctl00_reportmaster_txtPatientTime', json.RegID);
		//setSelectValue('patID', json.patientID)
		if(json2=="no insert"){alert(json2);}else{$("#myModal_report .close").click();/*;window.location='/list_all_tests_registered_pathology.php#2b';*/}
}

function parseJsonToFormIndividual(jsonforindividual){
	console.log("json for ind in parse "+jsonforindividual);
	if (jsonforindividual){
		setSelectValue("ctl00_reportmaster_btnSave","Update");
		
		
		setSelectValue('ctl00_reportmaster_txtFastingPlasmaGlucose', jsonforindividual.Fasting_Plasma_Glucose);
setSelectValue('ctl00_reportmaster_txtFastingUrineGlucose', jsonforindividual.Fasting_Urine_Glucose_IFCC);
setSelectValue('ctl00_reportmaster_txtFastingUrineKetone', jsonforindividual.Fasting_Urine_Ketone);
setSelectValue('ctl00_reportmaster_txtPostPrandialPlasmaGlucose', jsonforindividual.Fasting_Plasma_Glucose_hrs);
setSelectValue('ctl00_reportmaster_txtPPUrineGlucose', jsonforindividual.PP_Urine_Glucose);
setSelectValue('ctl00_reportmaster_txtPPUrineKetone', jsonforindividual.PP_Urine_Ketone);
}
	else{}
}  	
	
</script>

<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
