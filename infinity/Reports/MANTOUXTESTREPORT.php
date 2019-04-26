

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="" id="aspnetForm" class="section-to-print">
        <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
      <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">MANTOUX TEST</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">Date Of Inoculation</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtdateInoculation" type="text" maxlength="100" id="ctl00_reportmaster_txtdateInoculation" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
                 <tr>
                    <td class="width-40">Time of Inoculation</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtTimeInoculation" type="text" maxlength="100" id="ctl00_reportmaster_txtTimeInoculation" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
                 <tr>
                    <td class="width-40">Date of Reporting</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtDateofReporting" type="text" maxlength="100" id="ctl00_reportmaster_txtDateofReporting" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
                 <tr>
                    <td class="width-40">PPD Given</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtPPDGiven" type="text" maxlength="100" id="ctl00_reportmaster_txtPPDGiven" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Reading Time</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtReadingTime" type="text" maxlength="100" id="ctl00_reportmaster_txtReadingTime" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Erythema in (mm)</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtErythema" type="text" maxlength="100" id="ctl00_reportmaster_txtErythema" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Induration in (mm)</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtInduration" type="text" maxlength="100" id="ctl00_reportmaster_txtInduration" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Result</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtResult" type="text" maxlength="100" id="ctl00_reportmaster_txtResult" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Interpretation of Result</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtInterpretation" type="text" maxlength="100" id="ctl00_reportmaster_txtInterpretation" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
                
               </table>
        </div>
        <div class="hmms-rptnote">
            <span>Positive Reaction :  Induration and erythema is of 10 mm and above<br />
Negative Reaction :  Induration and erythema is less than 4 mm<br />
Doughtfull case :  Induration and erythema is in between 5 to 9 mm<br /><br />
INTERPRETATION :<br />
NEGATIVE : 00 - 06 mm.<br /><br />
INTERMEDIATE : 06 - 10 mm.<br /><br />
POSITIVE : >10 mm.<br /></span>
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
	   url: "/set_p_MantouxTestReport.php",
	   data: formData,// serializes the form's elements.
	   success: function(data)
	   {	
			// console.log(data);
			//var json2 = JSON.parse(data);
			parseJsonToForm2(data);
	   },
	   error: function(xhr, textStatus, errorThrown){
       alert('request failed');
		},
		cache: false,
		contentType: false,
		processData: false
	});
	}else{}
});
function validateForm() {
    var a = document.forms["aspnetForm"]["ctl00_reportmaster_txtdateInoculation"].value;
    var b = document.forms["aspnetForm"]["ctl00_reportmaster_txtTimeInoculation"].value;
    var c = document.forms["aspnetForm"]["ctl00_reportmaster_txtDateofReporting"].value;
    var d = document.forms["aspnetForm"]["ctl00_reportmaster_txtPPDGiven"].value;
    var e = document.forms["aspnetForm"]["ctl00_reportmaster_txtReadingTime"].value;
    var f = document.forms["aspnetForm"]["ctl00_reportmaster_txtErythema"].value;
    var g = document.forms["aspnetForm"]["ctl00_reportmaster_txtInduration"].value;
    var h = document.forms["aspnetForm"]["ctl00_reportmaster_txtResult"].value;
    var i = document.forms["aspnetForm"]["ctl00_reportmaster_txtInterpretation"].value;
    
    if (a == "" || a == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtdateInoculation").focus();
		$("#ctl00_reportmaster_txtdateInoculation").addClass('error').removeClass('noerror');
        return false;	
    }else if (b == "" || b == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtTimeInoculation").focus();
		$("#ctl00_reportmaster_txtTimeInoculation").addClass('error').removeClass('noerror');
        return false;	
    }else if (c == "" || c == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtDateofReporting").focus();
		$("#ctl00_reportmaster_txtDateofReporting").addClass('error').removeClass('noerror');
        return false;	
    }else if (d == "" || d == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPPDGiven").focus();
		$("#ctl00_reportmaster_txtPPDGiven").addClass('error').removeClass('noerror');
        return false;	
    }else if (e == "" || e == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtReadingTime").focus();
		$("#ctl00_reportmaster_txtReadingTime").addClass('error').removeClass('noerror');
        return false;	
    }else if (f == "" || f == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtErythema").focus();
		$("#ctl00_reportmaster_txtErythema").addClass('error').removeClass('noerror');
        return false;	
    }else if (g == "" || g == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtInduration").focus();
		$("#ctl00_reportmaster_txtInduration").addClass('error').removeClass('noerror');
        return false;	
    }else if (h == "" || h == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtResult").focus();
		$("#ctl00_reportmaster_txtResult").addClass('error').removeClass('noerror');
        return false;	
    }else if (i == "" || i == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtInterpretation").focus();
		$("#ctl00_reportmaster_txtInterpretation").addClass('error').removeClass('noerror');
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
		
		
		setSelectValue('ctl00_reportmaster_txtdateInoculation', jsonforindividual.Date_Of_Inoculation);
setSelectValue('ctl00_reportmaster_txtTimeInoculation', jsonforindividual.Time_of_Inoculation);
setSelectValue('ctl00_reportmaster_txtDateofReporting', jsonforindividual.Date_of_Reporting);
setSelectValue('ctl00_reportmaster_txtPPDGiven', jsonforindividual.PPD_Given);
setSelectValue('ctl00_reportmaster_txtReadingTime', jsonforindividual.Reading_Time);
setSelectValue('ctl00_reportmaster_txtErythema', jsonforindividual.Erythema);
setSelectValue('ctl00_reportmaster_txtInduration', jsonforindividual.Induration);
setSelectValue('ctl00_reportmaster_txtResult', jsonforindividual.Result);
setSelectValue('ctl00_reportmaster_txtInterpretation', jsonforindividual.Interpretation_of_Result);
}
	else{}
}  
	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
