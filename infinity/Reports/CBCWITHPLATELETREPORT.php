

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="./CBCWithPalteletReport.aspx?RegistrationID=ugJZWGLqbChWuBS8MfgBPA%3d%3d&amp;PatientId=oJjpcnkhJJsf3kLo5%2fJc%2fA%3d%3d" id="aspnetForm" class="section-to-print">
        <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">CBC WITH PALTELET</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <tr>
                    <td class="width-40">Haemoglobin</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtHaemoglobin" type="text" maxlength="100" id="ctl00_reportmaster_txtHaemoglobin" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">male : 14 - 17 gms/dl<br />
                        Female : 12 - 15 gms/dl<br />
                    </td>
                </tr>
                <tr>
                    <td class="width-40">RBC Count</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtRBCCount" type="text" maxlength="100" id="ctl00_reportmaster_txtRBCCount" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">4.7-6.1 million/cu.mm</td>
                </tr>
                <tr>
                    <td class="width-40">RDW</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtRDW" type="text" maxlength="100" id="ctl00_reportmaster_txtRDW" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">9 - 17 fl</td>
                </tr>
                <tr>
                    <td class="width-40">Total WBC Count</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtTotalWBCCount" type="text" maxlength="100" id="ctl00_reportmaster_txtTotalWBCCount" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">5000 - 10000 / cu.mm</td>
                </tr>
                <tr style="border-top:1px">
					<td colspan="3" >
						<div class="border_bottom">
							&nbsp;
							<br>
						</div>
					</td>
                </tr>
                <tr style="border-top:1px">
					<td colspan="3" >
						<div class="">
							<center><u><strong>Differential Count</strong></u></center>
						</div>
					</td>
                </tr>
                <tr style="border-top:1px">
					<td colspan="3" >
						<div class="border_bottom">
							&nbsp;
							<br>
						</div>
					</td>
                </tr>
				<tr>
                    <td class="width-40">PCV</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtPCV" type="text" maxlength="100" id="ctl00_reportmaster_txtPCV" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">37 - 47 %</td>
                </tr>
                <tr>
                    <td class="width-40">MCV</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtMCV" type="text" maxlength="100" id="ctl00_reportmaster_txtMCV" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">78 - 92 fl</td>
                </tr>
                <tr>
                    <td class="width-40">MCH</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtMCH" type="text" maxlength="100" id="ctl00_reportmaster_txtMCH" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">28 - 32 pg</td>
                </tr>
                <tr>
                    <td class="width-40">MCHC</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtMCHC" type="text" maxlength="100" id="ctl00_reportmaster_txtMCHC" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">32 - 37 %</td>
                </tr>
				<tr>
                    <td class="width-40">Neutrophils</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtNeutrophils" type="text" maxlength="100" id="ctl00_reportmaster_txtNeutrophils" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">50 - 70 %</td>
                </tr>
                <tr>
                    <td class="width-40">Lymphocytes</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtLymphocytes" type="text" maxlength="100" id="ctl00_reportmaster_txtLymphocytes" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">20 - 40 %</td>
                </tr>
                <tr>
                    <td class="width-40">Eosinophils</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtEosinophils" type="text" maxlength="100" id="ctl00_reportmaster_txtEosinophils" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">00 - 06 %</td>
                </tr>
                <tr>
                    <td class="width-40">Monocytes</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtMonocytes" type="text" maxlength="100" id="ctl00_reportmaster_txtMonocytes" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">00 - 10 %</td>
                </tr>
                <tr>
                    <td class="width-40">Basophils</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtBasophils" type="text" maxlength="100" id="ctl00_reportmaster_txtBasophils" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">00 - 01 %</td>
                </tr>
                <tr>
                    <td class="width-40">Platelet Count </td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtPlateletCount" type="text" maxlength="100" id="ctl00_reportmaster_txtPlateletCount" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">150000 - 450000 / cu.mm</td>
                </tr>
                <tr>
                    <td class="width-40">MPV (Mean Platelet Volume)</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtMPV" type="text" maxlength="100" id="ctl00_reportmaster_txtMPV" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">6-11 fl</td>
                </tr>				
                <tr>
                    <td class="width-40">Platelets on Smear</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtPlateletsonSmear" type="text" maxlength="100" id="ctl00_reportmaster_txtPlateletsonSmear" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
                <tr>
                    <td class="width-40">RBC Morphology</td>
                    <td class="width-20 text-center">
						<!--<input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtRBCMorphology" type="text" maxlength="100" id="ctl00_reportmaster_txtRBCMorphology" class="txtbox-css width-90px margin-left-97" />-->
						<select name="ctl00_reportmaster_txtRBCMorphology" id="ctl00_reportmaster_txtRBCMorphology"  class="txtbox-css width-90px margin-left-97">
						  <option value="">Select Value</option>
						  <option value="Normal">Normal</option>
						  <option value="Abnormal">Abnormal</option>
						</select>						
					</td>
                    <td class="width-40"></td>
                </tr>
                <tr>
                    <td class="width-40">WBCs on PS</td>
                    <td class="width-20 text-center">
                        <input onkeypress="return isNumber(event)" name="ctl00_reportmaster_txtWBCsonPS" type="text" maxlength="100" id="ctl00_reportmaster_txtWBCsonPS" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>

            </table>
        </div>
        <div class="hmms-rptnote">
            <span>Note:Test done on Nihon Kohden MEK- 6420K fully automated cell counter.</span>
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
	   url: "/set_p_CBCWithPlateletReport.php",
	   data: formData,// serializes the form's elements.
	   success: function(data)
	   {	
			//console.log(data);
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
    var a = document.forms["aspnetForm"]["ctl00_reportmaster_txtHaemoglobin"].value;
    var b = document.forms["aspnetForm"]["ctl00_reportmaster_txtRBCCount"].value;
    var c = document.forms["aspnetForm"]["ctl00_reportmaster_txtPCV"].value;
    var d = document.forms["aspnetForm"]["ctl00_reportmaster_txtMCV"].value;
    var e = document.forms["aspnetForm"]["ctl00_reportmaster_txtMCH"].value;
    var f = document.forms["aspnetForm"]["ctl00_reportmaster_txtMCHC"].value;
    var g = document.forms["aspnetForm"]["ctl00_reportmaster_txtRDW"].value;
    var h = document.forms["aspnetForm"]["ctl00_reportmaster_txtTotalWBCCount"].value;
    var i = document.forms["aspnetForm"]["ctl00_reportmaster_txtNeutrophils"].value;
    var j = document.forms["aspnetForm"]["ctl00_reportmaster_txtLymphocytes"].value;
    var k = document.forms["aspnetForm"]["ctl00_reportmaster_txtEosinophils"].value;
    var l = document.forms["aspnetForm"]["ctl00_reportmaster_txtMonocytes"].value;
    var m = document.forms["aspnetForm"]["ctl00_reportmaster_txtBasophils"].value;
    var n = document.forms["aspnetForm"]["ctl00_reportmaster_txtPlateletCount"].value;
    var o = document.forms["aspnetForm"]["ctl00_reportmaster_txtMPV"].value;
    var p = document.forms["aspnetForm"]["ctl00_reportmaster_txtPlateletsonSmear"].value;
    var q = document.forms["aspnetForm"]["ctl00_reportmaster_txtRBCMorphology"].value;
    var r = document.forms["aspnetForm"]["ctl00_reportmaster_txtWBCsonPS"].value;
    //var s = document.forms["aspnetForm"]["ctl00_reportmaster_txtESR"].value;
    if (a == "" || a == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtHaemoglobin").focus();
		$("#ctl00_reportmaster_txtHaemoglobin").addClass('error').removeClass('noerror');
        return false;	
    }else if(b=="" || b==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtRBCCount").focus();
		$("#ctl00_reportmaster_txtRBCCount").addClass('error').removeClass('noerror');
	}else if(c=="" || c==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPCV").focus();
		$("#ctl00_reportmaster_txtPCV").addClass('error').removeClass('noerror');
	}else if(d=="" || d==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtMCV").focus();
		$("#ctl00_reportmaster_txtMCV").addClass('error').removeClass('noerror');
	}else if(e=="" || e==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtMCH").focus();
		$("#ctl00_reportmaster_txtMCH").addClass('error').removeClass('noerror');
	}else if(f=="" || f==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtMCHC").focus();
		$("#ctl00_reportmaster_txtMCHC").addClass('error').removeClass('noerror');
	}else if(g=="" || g==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtRDW").focus();
		$("#ctl00_reportmaster_txtRDW").addClass('error').removeClass('noerror');
	}else if(h=="" || h==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtTotalWBCCount").focus();
		$("#ctl00_reportmaster_txtTotalWBCCount").addClass('error').removeClass('noerror');
	}else if(i=="" || i==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtNeutrophils").focus();
		$("#ctl00_reportmaster_txtNeutrophils").addClass('error').removeClass('noerror');
	}else if(j=="" || j==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtLymphocytes").focus();
		$("#ctl00_reportmaster_txtLymphocytes").addClass('error').removeClass('noerror');
	}else if(k=="" || k==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtEosinophils").focus();
		$("#ctl00_reportmaster_txtEosinophils").addClass('error').removeClass('noerror');
	}else if(l=="" || l==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtMonocytes").focus();
		$("#ctl00_reportmaster_txtMonocytes").addClass('error').removeClass('noerror');
	}else if(m=="" || m==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtBasophils").focus();
		$("#ctl00_reportmaster_txtBasophils").addClass('error').removeClass('noerror');
	}else if(n=="" || n==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPlateletCount").focus();
		$("#ctl00_reportmaster_txtPlateletCount").addClass('error').removeClass('noerror');
	}else if(o=="" || o==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtMPV").focus();
		$("#ctl00_reportmaster_txtMPV").addClass('error').removeClass('noerror');
	}else if(p=="" || p==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPlateletsonSmear").focus();
		$("#ctl00_reportmaster_txtPlateletsonSmear").addClass('error').removeClass('noerror');
	}else if(q=="" || q==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtRBCMorphology").focus();
		$("#ctl00_reportmaster_txtRBCMorphology").addClass('error').removeClass('noerror');
	}else if(r=="" || r==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtWBCsonPS").focus();
		$("#ctl00_reportmaster_txtWBCsonPS").addClass('error').removeClass('noerror');
	}/*else if(s=="" || s==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtESR").focus();
		$("#ctl00_reportmaster_txtESR").addClass('error').removeClass('noerror');
	}*/else{ return true;}
}

function setSelectValue (id, val) {
	console.log("ID is : "+id+" :::  value is : "+val);
    document.getElementById(id).value = val;
}

function getMCV(){}
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
		
		
		setSelectValue('ctl00_reportmaster_txtHaemoglobin', jsonforindividual.Haemoglobin);
setSelectValue('ctl00_reportmaster_txtRBCCount', jsonforindividual.Rbc_Count);
setSelectValue('ctl00_reportmaster_txtPCV', jsonforindividual.Pcv);
setSelectValue('ctl00_reportmaster_txtMCV', jsonforindividual.Mcv);
setSelectValue('ctl00_reportmaster_txtMCH', jsonforindividual.Mch);
setSelectValue('ctl00_reportmaster_txtMCHC', jsonforindividual.Mchc);
setSelectValue('ctl00_reportmaster_txtRDW', jsonforindividual.Rdw);
setSelectValue('ctl00_reportmaster_txtTotalWBCCount', jsonforindividual.Total_wbc_count);
setSelectValue('ctl00_reportmaster_txtNeutrophils', jsonforindividual.Neutrophils);
setSelectValue('ctl00_reportmaster_txtLymphocytes', jsonforindividual.Lymphocytes);
setSelectValue('ctl00_reportmaster_txtEosinophils', jsonforindividual.Eosinophils);
setSelectValue('ctl00_reportmaster_txtMonocytes', jsonforindividual.Monocytes);
setSelectValue('ctl00_reportmaster_txtBasophils', jsonforindividual.Basophils);
setSelectValue('ctl00_reportmaster_txtPlateletCount', jsonforindividual.Platelet_count);
setSelectValue('ctl00_reportmaster_txtMPV', jsonforindividual.MPV);
setSelectValue('ctl00_reportmaster_txtPlateletsonSmear', jsonforindividual.Platelets_on_smear);
setSelectValue('ctl00_reportmaster_txtRBCMorphology', jsonforindividual.Rbc_morphology);
setSelectValue('ctl00_reportmaster_txtWBCsonPS', jsonforindividual.Wbcs_on_ps);
}
	else{}
}  	
$("#ctl00_reportmaster_txtN").on("input",function(){
	calculate.rbccount();
	calculate.mchcount();
});
$("#ctl00_reportmaster_txtRBCCount").on("input",function(){
	calculate.mcvcount();
	calculate.mchcount();
});
$("#ctl00_reportmaster_txtPCV").on("input",function(){
	calculate.mcvcount();
	calculate.mchccount();
});
$("#ctl00_reportmaster_txtHaemoglobin").on("input",function(){
	calculate.mchcount();
	calculate.mchccount();
});
var calculate={
	
	mcvcount:function(){
		var pcv = $("#ctl00_reportmaster_txtPCV").val();
		var rbcc = $("#ctl00_reportmaster_txtRBCCount").val();// in million/mm3
		if(pcv!="" && rbcc!=""){
			$("#ctl00_reportmaster_txtMCV").val(((Number(pcv)*10)/Number(rbcc)).toFixed(1));
		}
	},
	mchcount:function(){
		var hbg = $("#ctl00_reportmaster_txtHaemoglobin").val();
		var rbcc = $("#ctl00_reportmaster_txtRBCCount").val();// N
		if(hbg!="" && rbcc!=""){
			$("#ctl00_reportmaster_txtMCH").val(((Number(hbg)*10)/Number(rbcc)).toFixed(1));
		}
	},
	mchccount:function(){
		var hbg = $("#ctl00_reportmaster_txtHaemoglobin").val();
		var pcv = $("#ctl00_reportmaster_txtPCV").val();
		if(hbg!="" && pcv!=""){
			$("#ctl00_reportmaster_txtMCHC").val(((Number(hbg)/(Number(pcv)))*100).toFixed(1));
		}
	}
	
}
function tomillion (labelValue) 
	{
		// 5 Zeroes for million
		return (Number(labelValue)/ 100000);
	}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57 ) && charcode!=46) {
        return false;
    }
    return true;
}
	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
