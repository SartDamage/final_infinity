

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
            <div class="hmms-reprtname">ABG ANALYSIS</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">P<sub>a</sub>O<sub>2</sup></td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txt_pao2" type="text" maxlength="100" id="ctl00_reportmaster_txt_pao2" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">10–13 kPa || 75–100 mmHg</td>
                </tr>
                <tr>
                    <td class="width-40">P<sub>a</sub>CO<sub>2</sup></td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtpaco2" type="text" maxlength="100" id="ctl00_reportmaster_txtpaco2" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">4.7–6.0 kPa || 35–45 mmHg</td>
                </tr>
                <tr>
                    <td class="width-40">HCO<sub>3</sup></td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txthco3" type="text" maxlength="100" id="ctl00_reportmaster_txthco3" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">22–26 mEq/L</td>
                </tr>
                <tr>
                    <td class="width-40">pH</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtph" type="text" maxlength="100" id="ctl00_reportmaster_txtph" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">7.34–7.44</td>
                </tr>
                <tr>
                    <td class="width-40">O2 Content (CaO2, CvO2, CcO2)</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txto2" type="text" maxlength="100" id="ctl00_reportmaster_txto2" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">vol% (mL O2/dL blood)</td>
                </tr>
                
            </table>
        </div>
        <div class="hmms-rptnote">
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
	   url: "/get_p_ReportData.php?ID="+ID+"&test="+str,
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




$( "#ctl00_reportmaster_txthco3" ).on( "input", function(event) {
	calculate.ph();
});
$( "#ctl00_reportmaster_txtpaco2" ).on( "input", function(event) {
	calculate.ph();
});
var calculate={
	
	ph:function(){
			var paco2 = $("#ctl00_reportmaster_txtpaco2").val();
			var hco3 = $("#ctl00_reportmaster_txthco3").val();
			if(paco2 != "" && hco3 != ""){
				var ph="";
				ph = (6.1+Math.log10(Number(hco3)/((0.03) * Number(paco2))));
				console.log(ph);
				$("#ctl00_reportmaster_txtph").val(ph.toFixed(2));
			}
	}
}
$( "form#aspnetForm" ).on( "submit", function(event) {
	event.preventDefault();
	// alert("Clicked");
	var formData=$( this ).serialize();
	console.log(formData);
	if (validateForm()==true){
	$.ajax({
	   type: "GET",
	   url: "/set_p_ABG_AnalysisReport.php",
	   data: formData,// serializes the form's elements.
	   success: function(data)
	   {	
			console.log(data);
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
    var pao2 = document.forms["aspnetForm"]["ctl00_reportmaster_txt_pao2"].value;
    var paco2 = document.forms["aspnetForm"]["ctl00_reportmaster_txtpaco2"].value;
    var hco3 = document.forms["aspnetForm"]["ctl00_reportmaster_txthco3"].value;
    var ph = document.forms["aspnetForm"]["ctl00_reportmaster_txtph"].value;
    var o2 = document.forms["aspnetForm"]["ctl00_reportmaster_txto2"].value;
    if (pao2 == "" || pao2 == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txt_pao2").focus();
		$("#ctl00_reportmaster_txt_pao2").addClass('error').removeClass('noerror');
        return false;	
    }else if (paco2 == "" || paco2 == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtpaco2").focus();
		$("#ctl00_reportmaster_txtpaco2").addClass('error').removeClass('noerror');
        return false;	
    }else if (hco3 == "" || hco3 == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txthco3").focus();
		$("#ctl00_reportmaster_txthco3").addClass('error').removeClass('noerror');
        return false;	
    }else if (ph == "" || ph == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtph").focus();
		$("#ctl00_reportmaster_txtph").addClass('error').removeClass('noerror');
        return false;	
    }else if (o2 == "" || o2 == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txto2").focus();
		$("#ctl00_reportmaster_txto2").addClass('error').removeClass('noerror');
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
		if(json2=="no insert"){alert(json2);}else{$("#myModal_report .close").click()/*;window.location='/list_all_tests_registered_pathology.php#2b';*/}
}	

function parseJsonToFormIndividual(jsonforindividual){
	console.log("json for ind in parse "+jsonforindividual);
	if (jsonforindividual){
		setSelectValue("ctl00_reportmaster_btnSave","Update");
		
		
		//setSelectValue('ctl00_reportmaster_txtB-HCG', jsonforindividual.B_HCG);
		setSelectValue('ctl00_reportmaster_txt_pao2',jsonforindividual.pao2 );
		setSelectValue('ctl00_reportmaster_txtpaco2',jsonforindividual.paco2 );
		setSelectValue('ctl00_reportmaster_txthco3',jsonforindividual.hco3 );
		//setSelectValue('ctl00_reportmaster_txtph',jsonforindividual.ph );
		setSelectValue('ctl00_reportmaster_txto2',jsonforindividual.oxygen_saturation );
		
	}
	else{}
}  	
</script>

<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
