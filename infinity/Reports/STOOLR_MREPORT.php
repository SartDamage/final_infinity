

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="" id="aspnetForm" class="section-to-print">

        <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">Stool Examination (RM)</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">Colour</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtColour" type="text" maxlength="100" id="ctl00_reportmaster_txtColour" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Form and Consistency</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtConsistency" type="text" maxlength="100" id="ctl00_reportmaster_txtConsistency" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Mucus</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtMucus" type="text" maxlength="100" id="ctl00_reportmaster_txtMucus" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Frank Blood</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtFrankBlood" type="text" maxlength="100" id="ctl00_reportmaster_txtFrankBlood" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Adult Worms</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtAdultWorms" type="text" maxlength="100" id="ctl00_reportmaster_txtAdultWorms" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Reaction</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtReaction" type="text" maxlength="100" id="ctl00_reportmaster_txtReaction" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Occult Blood</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtOccultBlood" type="text" maxlength="100" id="ctl00_reportmaster_txtOccultBlood" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Pus Cells</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtPusCell" type="text" maxlength="100" id="ctl00_reportmaster_txtPusCell" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Red Blood Cells</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtRedBlood" type="text" maxlength="100" id="ctl00_reportmaster_txtRedBlood" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Epithelial Cells</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtEpithelial" type="text" maxlength="100" id="ctl00_reportmaster_txtEpithelial" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Ova</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtOva" type="text" maxlength="100" id="ctl00_reportmaster_txtOva" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Cysts</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtCysts" type="text" maxlength="100" id="ctl00_reportmaster_txtCysts" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Trophozoites</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtTrophozoites" type="text" maxlength="100" id="ctl00_reportmaster_txtTrophozoites" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Fat Bodies</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtFat" type="text" maxlength="100" id="ctl00_reportmaster_txtFat" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Budding Yeasts</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtBudding" type="text" maxlength="100" id="ctl00_reportmaster_txtBudding" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Others</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtOthers" type="text" maxlength="100" id="ctl00_reportmaster_txtOthers" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
                
            </table>
        </div>
        <div class="hmms-rptnote">
            <span>Result Rechecked and Confirmed
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
	//alert("Clicked");
	var formData=$( this ).serialize();
	console.log(formData);
	if (validateForm()==true){
	$.ajax({
	   type: "GET",
	   url: "/set_p_StoolRMReport.php",
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
var a = document.forms["aspnetForm"]["ctl00_reportmaster_txtColour"].value;
var b = document.forms["aspnetForm"]["ctl00_reportmaster_txtConsistency"].value;
var c = document.forms["aspnetForm"]["ctl00_reportmaster_txtMucus"].value;
var d = document.forms["aspnetForm"]["ctl00_reportmaster_txtFrankBlood"].value;
var e = document.forms["aspnetForm"]["ctl00_reportmaster_txtAdultWorms"].value;
var f = document.forms["aspnetForm"]["ctl00_reportmaster_txtReaction"].value;
var g = document.forms["aspnetForm"]["ctl00_reportmaster_txtOccultBlood"].value;
var h = document.forms["aspnetForm"]["ctl00_reportmaster_txtPusCell"].value;
var i = document.forms["aspnetForm"]["ctl00_reportmaster_txtRedBlood"].value;
var j = document.forms["aspnetForm"]["ctl00_reportmaster_txtEpithelial"].value;
var k = document.forms["aspnetForm"]["ctl00_reportmaster_txtOva"].value;
var l = document.forms["aspnetForm"]["ctl00_reportmaster_txtCysts"].value;
var m = document.forms["aspnetForm"]["ctl00_reportmaster_txtTrophozoites"].value;
var o = document.forms["aspnetForm"]["ctl00_reportmaster_txtFat"].value;
var p = document.forms["aspnetForm"]["ctl00_reportmaster_txtBudding"].value;
var q = document.forms["aspnetForm"]["ctl00_reportmaster_txtOthers"].value;
if (a == "" || a == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtColour").focus();
		$("#ctl00_reportmaster_txtColour").addClass('error').removeClass('noerror');
        return false;	
    }else if (b == "" || b == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtConsistency").focus();
		$("#ctl00_reportmaster_txtConsistency").addClass('error').removeClass('noerror');
        return false;	
    }else if (c == "" || c == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtMucus").focus();
		$("#ctl00_reportmaster_txtMucus").addClass('error').removeClass('noerror');
        return false;	
    }else if (d == "" || d == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtFrankBlood").focus();
		$("#ctl00_reportmaster_txtFrankBlood").addClass('error').removeClass('noerror');
        return false;	
    }else if (e == "" || e == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtAdultWorms").focus();
		$("#ctl00_reportmaster_txtAdultWorms").addClass('error').removeClass('noerror');
        return false;	
    }else if (f == "" || f == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtReaction").focus();
		$("#ctl00_reportmaster_txtReaction").addClass('error').removeClass('noerror');
        return false;	
    }else if (g == "" || g == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtOccultBlood").focus();
		$("#ctl00_reportmaster_txtOccultBlood").addClass('error').removeClass('noerror');
        return false;	
    }else if (h == "" || h == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPusCell").focus();
		$("#ctl00_reportmaster_txtPusCell").addClass('error').removeClass('noerror');
        return false;	
    }else if (i == "" || i == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtRedBlood").focus();
		$("#ctl00_reportmaster_txtRedBlood").addClass('error').removeClass('noerror');
        return false;	
    }else if (j == "" || j == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtEpithelial").focus();
		$("#ctl00_reportmaster_txtEpithelial").addClass('error').removeClass('noerror');
        return false;	
    }else if (k == "" || k == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtOva").focus();
		$("#ctl00_reportmaster_txtOva").addClass('error').removeClass('noerror');
        return false;	
    }else if (l == "" || l == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtCysts").focus();
		$("#ctl00_reportmaster_txtCysts").addClass('error').removeClass('noerror');
        return false;	
    }else if (m == "" || m == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtTrophozoites").focus();
		$("#ctl00_reportmaster_txtTrophozoites").addClass('error').removeClass('noerror');
        return false;	
    }else if (o == "" || o == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtFat").focus();
		$("#ctl00_reportmaster_txtFat").addClass('error').removeClass('noerror');
        return false;	
    }else if (p == "" || p == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtBudding").focus();
		$("#ctl00_reportmaster_txtBudding").addClass('error').removeClass('noerror');
        return false;	
    }else if (q == "" || q == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtOthers").focus();
		$("#ctl00_reportmaster_txtOthers").addClass('error').removeClass('noerror');
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
		
		
		setSelectValue('ctl00_reportmaster_txtColour', jsonforindividual.Colour);
setSelectValue('ctl00_reportmaster_txtConsistency', jsonforindividual.Form_and_Consistency);
setSelectValue('ctl00_reportmaster_txtMucus', jsonforindividual.Mucus);
setSelectValue('ctl00_reportmaster_txtFrankBlood', jsonforindividual.Frank_Blood);
setSelectValue('ctl00_reportmaster_txtAdultWorms', jsonforindividual.Adult_Worms);
setSelectValue('ctl00_reportmaster_txtReaction', jsonforindividual.Reaction);
setSelectValue('ctl00_reportmaster_txtOccultBlood', jsonforindividual.Occult_Blood);
setSelectValue('ctl00_reportmaster_txtPusCell', jsonforindividual.Pus_Cells);
setSelectValue('ctl00_reportmaster_txtRedBlood', jsonforindividual.Red_Blood_Cells);
setSelectValue('ctl00_reportmaster_txtEpithelial', jsonforindividual.Epithelial_Cells);
setSelectValue('ctl00_reportmaster_txtOva', jsonforindividual.Ova);
setSelectValue('ctl00_reportmaster_txtCysts', jsonforindividual.Cysts);
setSelectValue('ctl00_reportmaster_txtTrophozoites', jsonforindividual.Trophozoites);
setSelectValue('ctl00_reportmaster_txtFat', jsonforindividual.Fat_Bodies);
setSelectValue('ctl00_reportmaster_txtBudding', jsonforindividual.Budding_Yeasts);
setSelectValue('ctl00_reportmaster_txtOthers', jsonforindividual.Others);
}
	else{}
}  	
	
</script>

<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
