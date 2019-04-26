

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="./UrineRMReport.aspx" id="aspnetForm" class="section-to-print">
</div>
        <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                

    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">URINE R/M</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">PHYSICAL EXAMINATION</td>
                    <td class="font-RobotoBold width-20 text-center"></td>
                    <td class="font-RobotoBold width-40"></td>
                </tr>
                <tr>
                    <td class="width-40">Quantity</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtQuantity" type="text" maxlength="100" id="ctl00_reportmaster_txtQuantity" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Colour</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtColour" type="text" maxlength="100" id="ctl00_reportmaster_txtColour" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				 <tr>
                    <td class="width-40">Appearance</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtAppearance" type="text" maxlength="100" id="ctl00_reportmaster_txtAppearance" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Deposit</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtDeposit" type="text" maxlength="100" id="ctl00_reportmaster_txtDeposit" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">pH</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtPh" type="text" maxlength="100" id="ctl00_reportmaster_txtPh" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Specific Gravity</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSpecificgravity" type="text" maxlength="100" id="ctl00_reportmaster_txtSpecificgravity" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				 <tr>
                    <td class="font-RobotoBold width-40">CHEMICAL EXAMINATION</td>
                    <td class="font-RobotoBold width-20 text-center"></td>
                    <td class="font-RobotoBold width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Proteins</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtProteins" type="text" maxlength="100" id="ctl00_reportmaster_txtProteins" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Sugar</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSugar" type="text" maxlength="100" id="ctl00_reportmaster_txtSugar" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Ketone</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtKetone" type="text" maxlength="100" id="ctl00_reportmaster_txtKetone" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Bile Pigment</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtBilepigment" type="text" maxlength="100" id="ctl00_reportmaster_txtBilepigment" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Bile Salts</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtBilesalts" type="text" maxlength="100" id="ctl00_reportmaster_txtBilesalts" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Occult Blood</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtOccultblood" type="text" maxlength="100" id="ctl00_reportmaster_txtOccultblood" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Urobilinogen</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txUrobilinogen" type="text" maxlength="100" id="ctl00_reportmaster_txUrobilinogen" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				 <tr>
                    <td class="font-RobotoBold width-40">MICROSCOPIC EXAMINATION OF CENTRIFUGALISED DEPOSIT</td>
                    <td class="font-RobotoBold width-20 text-center"></td>
                    <td class="font-RobotoBold width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Pus Cells</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txPuscells" type="text" maxlength="100" id="ctl00_reportmaster_txPuscells" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Epithelial Cells</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txEpithelialcells" type="text" maxlength="100" id="ctl00_reportmaster_txEpithelialcells" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Red Blood Cells</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txRedbloodcells" type="text" maxlength="100" id="ctl00_reportmaster_txRedbloodcells" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Casts</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txCasts" type="text" maxlength="100" id="ctl00_reportmaster_txCasts" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Crystals</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txCrystals" type="text" maxlength="100" id="ctl00_reportmaster_txCrystals" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Other Findings</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txOtherfindings" type="text" maxlength="100" id="ctl00_reportmaster_txOtherfindings" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">
                    </td>
                </tr>
				<tr>
                    <td class="width-40">Comments</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txComments" type="text" maxlength="100" id="ctl00_reportmaster_txComments" class="txtbox-css width-90px margin-left-97" /></td>
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
	   url: "/set_p_UrineRMReport.php",
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
    var a = document.forms["aspnetForm"]["ctl00_reportmaster_txtQuantity"].value;
    var b = document.forms["aspnetForm"]["ctl00_reportmaster_txtColour"].value;
    var c = document.forms["aspnetForm"]["ctl00_reportmaster_txtAppearance"].value;
    var d = document.forms["aspnetForm"]["ctl00_reportmaster_txtDeposit"].value;
    var e = document.forms["aspnetForm"]["ctl00_reportmaster_txtPh"].value;
    var f = document.forms["aspnetForm"]["ctl00_reportmaster_txtSpecificgravity"].value;
    var g = document.forms["aspnetForm"]["ctl00_reportmaster_txtProteins"].value;
    var h = document.forms["aspnetForm"]["ctl00_reportmaster_txtSugar"].value;
    var i = document.forms["aspnetForm"]["ctl00_reportmaster_txtKetone"].value;
    var j = document.forms["aspnetForm"]["ctl00_reportmaster_txtBilepigment"].value;
    var k = document.forms["aspnetForm"]["ctl00_reportmaster_txtOccultblood"].value;
    var l = document.forms["aspnetForm"]["ctl00_reportmaster_txUrobilinogen"].value;
    var m = document.forms["aspnetForm"]["ctl00_reportmaster_txPuscells"].value;
    var n = document.forms["aspnetForm"]["ctl00_reportmaster_txEpithelialcells"].value;
    var o = document.forms["aspnetForm"]["ctl00_reportmaster_txRedbloodcells"].value;
    var p = document.forms["aspnetForm"]["ctl00_reportmaster_txCasts"].value;
    var q = document.forms["aspnetForm"]["ctl00_reportmaster_txCrystals"].value;
    var r = document.forms["aspnetForm"]["ctl00_reportmaster_txOtherfindings"].value;
    var s = document.forms["aspnetForm"]["ctl00_reportmaster_txComments"].value;
    if (a == "" || a == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtQuantity").focus();
		$("#ctl00_reportmaster_txtQuantity").addClass('error').removeClass('noerror');
        return false;	
    }else if(b=="" || b==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtColour").focus();
		$("#ctl00_reportmaster_txtColour").addClass('error').removeClass('noerror');
	}else if(c=="" || c==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtAppearance").focus();
		$("#ctl00_reportmaster_txtAppearance").addClass('error').removeClass('noerror');
	}else if(d=="" || d==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtDeposit").focus();
		$("#ctl00_reportmaster_txtDeposit").addClass('error').removeClass('noerror');
	}else if(e=="" || e==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPh").focus();
		$("#ctl00_reportmaster_txtPh").addClass('error').removeClass('noerror');
	}else if(f=="" || f==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSpecificgravity").focus();
		$("#ctl00_reportmaster_txtSpecificgravity").addClass('error').removeClass('noerror');
	}else if(g=="" || g==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtProteins").focus();
		$("#ctl00_reportmaster_txtProteins").addClass('error').removeClass('noerror');
	}else if(h=="" || h==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSugar").focus();
		$("#ctl00_reportmaster_txtSugar").addClass('error').removeClass('noerror');
	}else if(i=="" || i==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtKetone").focus();
		$("#ctl00_reportmaster_txtKetone").addClass('error').removeClass('noerror');
	}else if(j=="" || j==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtBilepigment").focus();
		$("#ctl00_reportmaster_txtBilepigment").addClass('error').removeClass('noerror');
	}else if(k=="" || k==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtOccultblood").focus();
		$("#ctl00_reportmaster_txtOccultblood").addClass('error').removeClass('noerror');
	}else if(l=="" || l==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txUrobilinogen").focus();
		$("#ctl00_reportmaster_txUrobilinogen").addClass('error').removeClass('noerror');
	}else if(m=="" || m==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txPuscells").focus();
		$("#ctl00_reportmaster_txPuscells").addClass('error').removeClass('noerror');
	}else if(n=="" || n==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txEpithelialcells").focus();
		$("#ctl00_reportmaster_txEpithelialcells").addClass('error').removeClass('noerror');
	}else if(o=="" || o==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txRedbloodcells").focus();
		$("#ctl00_reportmaster_txRedbloodcells").addClass('error').removeClass('noerror');
	}else if(p=="" || p==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txCasts").focus();
		$("#ctl00_reportmaster_txCasts").addClass('error').removeClass('noerror');
	}else if(q=="" || q==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txCrystals").focus();
		$("#ctl00_reportmaster_txCrystals").addClass('error').removeClass('noerror');
	}else if(r=="" || r==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txOtherfindings").focus();
		$("#ctl00_reportmaster_txOtherfindings").addClass('error').removeClass('noerror');
	}else if(s=="" || s==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txComments").focus();
		$("#ctl00_reportmaster_txComments").addClass('error').removeClass('noerror');
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
		
		
		setSelectValue('ctl00_reportmaster_txtQuantity', jsonforindividual.Quantity);
setSelectValue('ctl00_reportmaster_txtColour', jsonforindividual.Colour);
setSelectValue('ctl00_reportmaster_txtAppearance', jsonforindividual.Appearance);
setSelectValue('ctl00_reportmaster_txtDeposit', jsonforindividual.Deposit);
setSelectValue('ctl00_reportmaster_txtPh', jsonforindividual.pH);
setSelectValue('ctl00_reportmaster_txtSpecificgravity', jsonforindividual.Specific_gravity);
setSelectValue('ctl00_reportmaster_txtProteins', jsonforindividual.Proteins);
setSelectValue('ctl00_reportmaster_txtSugar', jsonforindividual.Sugar);
setSelectValue('ctl00_reportmaster_txtKetone', jsonforindividual.Ketone);
setSelectValue('ctl00_reportmaster_txtBilepigment', jsonforindividual.Bile_salts);
setSelectValue('ctl00_reportmaster_txtOccultblood', jsonforindividual.Occult_blood);
setSelectValue('ctl00_reportmaster_txUrobilinogen', jsonforindividual.Urobilinogen);
setSelectValue('ctl00_reportmaster_txPuscells', jsonforindividual.Pus_cells);
setSelectValue('ctl00_reportmaster_txEpithelialcells', jsonforindividual.Epithelial_cells);
setSelectValue('ctl00_reportmaster_txRedbloodcells', jsonforindividual.Red_blood_cells);
setSelectValue('ctl00_reportmaster_txCasts', jsonforindividual.Casts);
setSelectValue('ctl00_reportmaster_txCrystals', jsonforindividual.Crystals);
setSelectValue('ctl00_reportmaster_txOtherfindings', jsonforindividual.Other_findings);
setSelectValue('ctl00_reportmaster_txComments', jsonforindividual.Comments);
}
	else{}
}  	

	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
