	

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
            <div class="hmms-reprtname">PROTHROMBIN TIME</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">Prothrombin TIme Test</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtProthrombin" type="text" maxlength="100" id="ctl00_reportmaster_txtProthrombin" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">13 to 15 seconds</td>
                </tr>
                <tr>
                    <td class="width-40">Mean Normal Prothrombin TIme</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtNMPT" type="text" maxlength="100" id="ctl00_reportmaster_txtNMPT" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Prothrombin Ratio</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtProthrombinRatio" type="text" maxlength="100" id="ctl00_reportmaster_txtProthrombinRatio" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Prothrombin Index</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtProthrombinIndex" type="text" maxlength="100" id="ctl00_reportmaster_txtProthrombinIndex" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">INR<br>(International Normalized Ratio)</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtINR" type="text" maxlength="100" id="ctl00_reportmaster_txtINR" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"> 0.8 to 1.1 seconds</td>
                </tr>
				<tr>
                    <td class="width-40">ISI Value of Prothrombin Used <br> (International sensitivity index <br>assigned to each kit system)</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtISI" type="text" maxlength="100" id="ctl00_reportmaster_txtISI" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				
            </table>
        </div>
        <div class="hmms-rptnote">
            <span>Note:<br>
			Causes for prolongat orf Prothrombin time are oral anticogulant therapy. liver disease, vit K Dificiency, DIC, Inherited <br>
			deficiency of clotting factors of extrinsic and common pathway<br>
			- It is advisable to follow INR value rather than prothrombin time in seconds<br>
			- Normal INR  = 0.64 - 1.17<br>
			- Thereapeutic Refrence range for INR <br>
			a) Deep vain thrombosis pulmonary embolism <br> Arterial  diseases including myocardial infarction  :  2.0 - 3.0<br>
			b) Artificial cardiac valves recurrent systemic embolism  :  2.5 - 3.5<br>
			Please stop anti therapy if INR is more than 4.5
			<br><br>CBC Done Only On Fully Automated (SYSMEX XP 100) Cell Counter.</span>
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

str=str.replace(/[^a-zA-Z\d0-9\/-\s]/g, "");
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
	   url: "/set_p_PTINRReport.php",
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
    var Prothrombin = document.forms["aspnetForm"]["ctl00_reportmaster_txtProthrombin"].value;
    var NMPT = document.forms["aspnetForm"]["ctl00_reportmaster_txtNMPT"].value;
    var ProthrombinRatio = document.forms["aspnetForm"]["ctl00_reportmaster_txtProthrombinRatio"].value;
    var ProthrombinIndex = document.forms["aspnetForm"]["ctl00_reportmaster_txtProthrombinIndex"].value;
    var INR = document.forms["aspnetForm"]["ctl00_reportmaster_txtINR"].value;
    var ISI = document.forms["aspnetForm"]["ctl00_reportmaster_txtISI"].value;
    if (Prothrombin == "" || Prothrombin == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtProthrombin").focus();
		$("#ctl00_reportmaster_txtProthrombin").addClass('error').removeClass('noerror');
        return false;	
    } else if (NMPT == "" || NMPT == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtNMPT").focus();
		$("#ctl00_reportmaster_txtNMPT").addClass('error').removeClass('noerror');
        return false;	
    }else if (ProthrombinRatio == "" || ProthrombinRatio == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtProthrombinRatio").focus();
		$("#ctl00_reportmaster_txtProthrombinRatio").addClass('error').removeClass('noerror');
        return false;	
    }else if (ProthrombinIndex == "" || ProthrombinIndex == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtProthrombinIndex").focus();
		$("#ctl00_reportmaster_txtProthrombinIndex").addClass('error').removeClass('noerror');
        return false;	
    }else if (INR == "" || INR == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtINR").focus();
		$("#ctl00_reportmaster_txtINR").addClass('error').removeClass('noerror');
        return false;	
    }else if (ISI == "" || ISI == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtISI").focus();
		$("#ctl00_reportmaster_txtISI").addClass('error').removeClass('noerror');
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
		
		
		setSelectValue('ctl00_reportmaster_txtProthrombin', jsonforindividual.Prothrombin_TIme_Test);
setSelectValue('ctl00_reportmaster_txtNMPT', jsonforindividual.Mean_Normal_Prothrombin_TIme);
setSelectValue('ctl00_reportmaster_txtProthrombinRatio', jsonforindividual.Prothrombin_Ratio);
setSelectValue('ctl00_reportmaster_txtProthrombinIndex', jsonforindividual.Prothrombin_Index);
setSelectValue('ctl00_reportmaster_txtINR', jsonforindividual.INR);
setSelectValue('ctl00_reportmaster_txtISI', jsonforindividual.ISI);
}
	else{}
}  	

</script>

<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
