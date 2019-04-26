

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="" id="aspnetForm" class="section-to-print">
        <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">RFT</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">Blood Urea</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtBloodurea" type="text" maxlength="100" id="ctl00_reportmaster_txtBloodurea" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">10 - 50 mg/dl
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Blood Urea Nitrogen</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtBloodureanitrogen" type="text" maxlength="100" id="ctl00_reportmaster_txtBloodureanitrogen" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">07 - 25 mg/dl
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">S. Creatinine</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtScreatinine" type="text" maxlength="100" id="ctl00_reportmaster_txtScreatinine" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">0.7 - 1.25 mg/dl<!--Male : 0.7 - 1.45 mg/dl&nbsp;Female : 0.6 - 1.25 mg/dl-->
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">S. Uric Acid</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSuricacid" type="text" maxlength="100" id="ctl00_reportmaster_txtSuricacid" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">2.4 - 7.0 mg/dl<!--Male : 3.4 - 7.0 mg/dl&nbsp;Female : 2.4 - 5.7 mg/dl-->
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">S. Phosphorus</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSphosphorus" type="text" maxlength="100" id="ctl00_reportmaster_txtSphosphorus" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">2.5 - 7.0 mg/dl<!--Adults : 2.5 - 5.0 mg/dl.&nbsp;Children : 4.0 - 7.0 mg/dl-->
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">S. Calcium</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtScalcium" type="text" maxlength="100" id="ctl00_reportmaster_txtScalcium" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">8.5 - 10.5 mg/dl
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Total Proteins</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtTotalproteins" type="text" maxlength="100" id="ctl00_reportmaster_txtTotalproteins" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">6.2 - 8.0 gm/dl
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">S. Albumin</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSalbumin" type="text" maxlength="100" id="ctl00_reportmaster_txtSalbumin" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">3.5 - 5.5 gm/dl
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Globumin</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtGlobumin" type="text" maxlength="100" id="ctl00_reportmaster_txtGlobumin" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">2 - 3.5 gm/dl
                    </td>
                </tr>
				<tr>
                    <td class="width-40">A.G Ratio</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtAgratio" type="text" maxlength="100" id="ctl00_reportmaster_txtAgratio" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">1.0 - 2.3
                    </td>
                </tr>
				<tr>
                    <td class="width-40">S.SODIUM</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSsodium" type="text" maxlength="100" id="ctl00_reportmaster_txtSsodium" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">136 – 145 mEq/L
                    </td>
                </tr>
				<tr>
                    <td class="width-40">S.POTASSIUM</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSpotassium" type="text" maxlength="100" id="ctl00_reportmaster_txtSpotassium" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">3.6 – 5.2 mEq/L
                    </td>
                </tr>
				<tr>
                    <td class="width-40">S.CHLORIDES</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSchlorides" type="text" maxlength="100" id="ctl00_reportmaster_txtSchlorides" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">100 – 108 mEq/L
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Comments</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtComments" type="text" maxlength="100" id="ctl00_reportmaster_txtComments" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				

            </table>
        </div>
        <div class="hmms-rptnote">
            <span></span>
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
	   url: "/set_p_RftReport.php",
	   data: formData,// serializes the form's elements.
	   success: function(data)
	   {	
			// console.log(data);
			//var json2 = JSON.parse(data);
			parseJsonToForm2(data);
			alert("test");
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
    var a = document.forms["aspnetForm"]["ctl00_reportmaster_txtBloodurea"].value;
    var b = document.forms["aspnetForm"]["ctl00_reportmaster_txtBloodureanitrogen"].value;
    var c = document.forms["aspnetForm"]["ctl00_reportmaster_txtScreatinine"].value;
    var d = document.forms["aspnetForm"]["ctl00_reportmaster_txtSuricacid"].value;
    var e = document.forms["aspnetForm"]["ctl00_reportmaster_txtSphosphorus"].value;
    var f = document.forms["aspnetForm"]["ctl00_reportmaster_txtScalcium"].value;
    var g = document.forms["aspnetForm"]["ctl00_reportmaster_txtTotalproteins"].value;
    var h = document.forms["aspnetForm"]["ctl00_reportmaster_txtSalbumin"].value;
    var i = document.forms["aspnetForm"]["ctl00_reportmaster_txtGlobumin"].value;
    var j = document.forms["aspnetForm"]["ctl00_reportmaster_txtAgratio"].value;
    var k = document.forms["aspnetForm"]["ctl00_reportmaster_txtSsodium"].value;
    var l = document.forms["aspnetForm"]["ctl00_reportmaster_txtSpotassium"].value;
    var m = document.forms["aspnetForm"]["ctl00_reportmaster_txtSchlorides"].value;
    var n = document.forms["aspnetForm"]["ctl00_reportmaster_txtComments"].value;
    if(a == "" || a == null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtBloodurea").focus();
		$("#ctl00_reportmaster_txtBloodurea").addClass('error').removeClass('noerror');
	}else if(b=="" || b==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtBloodureanitrogen").focus();
		$("#ctl00_reportmaster_txtBloodureanitrogen").addClass('error').removeClass('noerror');
	}else if(c=="" || c==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtScreatinine").focus();
		$("#ctl00_reportmaster_txtScreatinine").addClass('error').removeClass('noerror');
	}else if(d=="" || d==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSuricacid").focus();
		$("#ctl00_reportmaster_txtSuricacid").addClass('error').removeClass('noerror');
	}else if(e=="" || e==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSphosphorus").focus();
		$("#ctl00_reportmaster_txtSphosphorus").addClass('error').removeClass('noerror');
	}else if(f=="" || f==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtScalcium").focus();
		$("#ctl00_reportmaster_txtScalcium").addClass('error').removeClass('noerror');
	}else if(g=="" || g==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtTotalproteins").focus();
		$("#ctl00_reportmaster_txtTotalproteins").addClass('error').removeClass('noerror');
	}else if(h=="" || h==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSalbumin").focus();
		$("#ctl00_reportmaster_txtSalbumin").addClass('error').removeClass('noerror');
	}else if(i=="" || i==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtGlobumin").focus();
		$("#ctl00_reportmaster_txtGlobumin").addClass('error').removeClass('noerror');
	}else if(j=="" || j==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtAgratio").focus();
		$("#ctl00_reportmaster_txtAgratio").addClass('error').removeClass('noerror');
	}else if(k=="" || k==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSsodium").focus();
		$("#ctl00_reportmaster_txtSsodium").addClass('error').removeClass('noerror');
	}else if(l=="" || l==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSpotassium").focus();
		$("#ctl00_reportmaster_txtSpotassium").addClass('error').removeClass('noerror');
	}else if(m=="" || m==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSchlorides").focus();
		$("#ctl00_reportmaster_txtSchlorides").addClass('error').removeClass('noerror');
	}else if(n=="" || n==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtComments").focus();
		$("#ctl00_reportmaster_txtComments").addClass('error').removeClass('noerror');
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
		
		
setSelectValue('ctl00_reportmaster_txtBloodurea', jsonforindividual.Blood_urea);
setSelectValue('ctl00_reportmaster_txtBloodureanitrogen', jsonforindividual.Blood_urea_nitrogen);
setSelectValue('ctl00_reportmaster_txtScreatinine', jsonforindividual.S_creatinine);
setSelectValue('ctl00_reportmaster_txtSuricacid', jsonforindividual.S_uric_acid);
setSelectValue('ctl00_reportmaster_txtSphosphorus', jsonforindividual.S_phosphorus);
setSelectValue('ctl00_reportmaster_txtScalcium', jsonforindividual.S_calcium);
setSelectValue('ctl00_reportmaster_txtTotalproteins', jsonforindividual.Total_proteins);
setSelectValue('ctl00_reportmaster_txtSalbumin', jsonforindividual.S_albumin);
setSelectValue('ctl00_reportmaster_txtGlobumin', jsonforindividual.Globumin);
setSelectValue('ctl00_reportmaster_txtAgratio', jsonforindividual.A_g_ratio);
setSelectValue('ctl00_reportmaster_txtSsodium', jsonforindividual.S_sodium);
setSelectValue('ctl00_reportmaster_txtSpotassium', jsonforindividual.S_potassium);
setSelectValue('ctl00_reportmaster_txtSchlorides', jsonforindividual.S_chlorides);
setSelectValue('ctl00_reportmaster_txtComments', jsonforindividual.Comments);
}
	else{}
}  	

	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
