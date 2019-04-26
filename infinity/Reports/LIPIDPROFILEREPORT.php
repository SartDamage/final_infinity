

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="./LipidProfileReport.aspx?RegistrationID=K1HxGPLeTM5O0sszgRdaIQ%3d%3d&amp;PatientId=XxAcvK3DpVyQ3ZEf0bg6EQ%3d%3d" id="aspnetForm" class="section-to-print">
        <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">LIPID PROFILE</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">CHOLESTROL</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtcholtrol" type="text" maxlength="100" id="ctl00_reportmaster_txtcholtrol" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">Desirable: < 200 mg/dl<br />
                        Boderline-high: 200-239 mg/dl<br />
                        High: > 240 mg/dl</td>
                </tr>
                <tr>
                    <td class="width-40">TRIGLYCERIDE</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txttrigly" type="text" maxlength="100" id="ctl00_reportmaster_txttrigly" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">low risk:< 150 mg/dl <br />
                        Boderline : 150-200 mg/dl<br />
                        High risk> 200 mg/dl
                    <!--very High:>= 500 mg/dl--></td>
                </tr>
                <tr>
                    <td class="width-40">HDL CHOLESTROL</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txthdl" type="text" maxlength="100" id="ctl00_reportmaster_txthdl" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">Desirable:>60 mg/dl<br />
                        Boderline-high: 40-60 mg/dl<br />
                        Low(High risk):< 40 mg/dl </td>
                </tr>
                <tr>
                    <td class="width-40">LDL CHOLESTROL</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtldl" type="text" maxlength="100" id="ctl00_reportmaster_txtldl" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">Desirable:< 100 mg/dl<br />
                        Boderline-high: 100-150 mg/dl<br />
                        Low(High risk):> 150 mg/dl</td>
                </tr>
                <tr>
                    <td class="width-40">VLDL CHOLESTROL</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtvldl" type="text" maxlength="100" id="ctl00_reportmaster_txtvldl" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">2 to 30 mg/dl</td>
                </tr>
                <tr>
                    <td class="width-40">CHOL/HDL</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtchol_hdl" type="text" maxlength="100" id="ctl00_reportmaster_txtchol_hdl" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">Up to 3.5 mg/dl</td>
                </tr>
                <tr>
                    <td class="width-40">LDL/HDL</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtldl_hdl" type="text" maxlength="100" id="ctl00_reportmaster_txtldl_hdl" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">Up to 2.5 mg/dl</td>
                </tr>
            </table>
        </div>
        <div class="hmms-rptnote">
            <span>Note:Various Cholesterol Love% recommended lot adults by NCEP.<br />
                ChoemterOlEdsubon Ploomenmel May.2001.</span>
            <span>SCLITARY PATHOLOGY TESTS HAVE THIER LIMITATIONS. THE FINAL DIAGNOSIS MUST BE
BASED IN CONJUNCTION MIN CLINICAL F1/4004133 AND/OR OTHER INVESTIGATIONS</span>
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
	   url: "/set_p_LipidProfileReport.php",
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
    var a = document.forms["aspnetForm"]["ctl00_reportmaster_txtcholtrol"].value;
    var b = document.forms["aspnetForm"]["ctl00_reportmaster_txttrigly"].value;
    var c = document.forms["aspnetForm"]["ctl00_reportmaster_txthdl"].value;
    var d = document.forms["aspnetForm"]["ctl00_reportmaster_txtldl"].value;
    var e = document.forms["aspnetForm"]["ctl00_reportmaster_txtvldl"].value;
    var f = document.forms["aspnetForm"]["ctl00_reportmaster_txtchol_hdl"].value;
    var g = document.forms["aspnetForm"]["ctl00_reportmaster_txtldl_hdl"].value;
    if (a == "" || a == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtcholtrol").focus();
		$("#ctl00_reportmaster_txtcholtrol").addClass('error').removeClass('noerror');
        return false;	
    }else if(b=="" || b==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txttrigly").focus();
		$("#ctl00_reportmaster_txttrigly").addClass('error').removeClass('noerror');
	}else if(c=="" || c==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txthdl").focus();
		$("#ctl00_reportmaster_txthdl").addClass('error').removeClass('noerror');
	}else if(d=="" || d==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtldl").focus();
		$("#ctl00_reportmaster_txtldl").addClass('error').removeClass('noerror');
	}else if(e=="" || e==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtvldl").focus();
		$("#ctl00_reportmaster_txtvldl").addClass('error').removeClass('noerror');
	}else if(f=="" || f==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtchol_hdl").focus();
		$("#ctl00_reportmaster_txtchol_hdl").addClass('error').removeClass('noerror');
	}else if(g=="" || g==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtldl_hdl").focus();
		$("#ctl00_reportmaster_txtldl_hdl").addClass('error').removeClass('noerror');
	}else{ return true;}
}

function parseJsonToForm2(json2){
		/* $('#First-name-input').val(json.firstname); */
		//setSelectValue('ctl00_reportmaster_txtPatientTime', json.RegID);
		//setSelectValue('patID', json.patientID)
		if(json2=="no insert"){alert(json2);}else{$("#myModal_report .close").click();/*;window.location='/list_all_tests_registered_pathology.php#2b';*/}
}

function setSelectValue (id, val) {
	console.log("ID is : "+id+" :::  value is : "+val);
    document.getElementById(id).value = val;
}

function parseJsonToFormIndividual(jsonforindividual){
	console.log("json for ind in parse "+jsonforindividual);
	if (jsonforindividual){
		setSelectValue("ctl00_reportmaster_btnSave","Update");
		
		
		setSelectValue('ctl00_reportmaster_txtcholtrol', jsonforindividual.Cholesterol);
setSelectValue('ctl00_reportmaster_txttrigly', jsonforindividual.Triglyceride);
setSelectValue('ctl00_reportmaster_txthdl', jsonforindividual.Hdl_cholesterol);
setSelectValue('ctl00_reportmaster_txtldl', jsonforindividual.Idl_cholesterol);
setSelectValue('ctl00_reportmaster_txtvldl', jsonforindividual.Vldl_cholesterol);
setSelectValue('ctl00_reportmaster_txtchol_hdl', jsonforindividual.Chol_hdl);
setSelectValue('ctl00_reportmaster_txtldl_hdl', jsonforindividual.Idl_hdl);
}
	else{}
}  	

	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
