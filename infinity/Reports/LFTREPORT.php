

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="" id="aspnetForm" class="section-to-print">
      <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">LIVER FUNCTION TESTS</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">Bilirubin Total</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtBilirubinTotal" type="text" maxlength="100" id="ctl00_reportmaster_txtBilirubinTotal" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">0 – 1 mg/dl
                    </td>
                </tr>
                <tr>
                    <td class="width-40">Bilirubin Direct</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtBilirubinDirect" type="text" maxlength="100" id="ctl00_reportmaster_txtBilirubinDirect" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">0 – 0.3 mg/dl
                    </td>
                </tr>
                <tr>
                    <td class="width-40">Bilirubin Indirect</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtBilirubinIndirect" type="text" maxlength="100" id="ctl00_reportmaster_txtBilirubinIndirect" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">0 - 0.7 mg / dl
                    </td>
                </tr>
                <tr>
                    <td class="width-40">S.G.O.T.</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSgot" type="text" maxlength="100" id="ctl00_reportmaster_txtSgot" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">Up to 45 i.U / L
                    </td>
                </tr>
                <tr>
                    <td class="width-40">S.G.P.T</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSgpt" type="text" maxlength="100" id="ctl00_reportmaster_txtSgpt" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">Up to 45 i.U / L
                    </td>
                </tr>
                <tr>
                    <td class="width-40">Alkaline Phosphatase</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtAlkalinePhosphatase" type="text" maxlength="100" id="ctl00_reportmaster_txtAlkalinePhosphatase" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">5 - 306 i.U/M.L
                    </td>
                </tr>
                <tr>
                    <td class="width-40">Total Proteins</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtTotalProteins" type="text" maxlength="100" id="ctl00_reportmaster_txtTotalProteins" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">6 – 7.8 gm/dl
                    </td>
                </tr>
                <tr>
                    <td class="width-40">Albumin</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtAlbumin" type="text" maxlength="100" id="ctl00_reportmaster_txtAlbumin" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">3.2 - 4.5 gm / dl
                    </td>
                </tr>
                <tr>
                    <td class="width-40">Globulin</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtGlobulin" type="text" maxlength="100" id="ctl00_reportmaster_txtGlobulin" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">2.0 - 3.5 gm / dl
                    </td>
                </tr>
                <tr>
                    <td class="width-40">A / G Ratio</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtAGRatio" type="text" maxlength="100" id="ctl00_reportmaster_txtAGRatio" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">1.0 - 2.3
                    </td>
                </tr>
                <tr>
                    <td class="width-40">G.G.T.P</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtGgtp" type="text" maxlength="100" id="ctl00_reportmaster_txtGgtp" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">25 - 43 IU/L
                    </td>
                </tr>
                <tr>
                    <td class="width-40">Comments</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtComment" type="text" maxlength="100" id="ctl00_reportmaster_txtComment" class="txtbox-css width-90px margin-left-97" /></td>
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
	   url: "/set_p_LFTReport.php",
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
    var a = document.forms["aspnetForm"]["ctl00_reportmaster_txtBilirubinTotal"].value;
    var b = document.forms["aspnetForm"]["ctl00_reportmaster_txtBilirubinDirect"].value;
    var c = document.forms["aspnetForm"]["ctl00_reportmaster_txtBilirubinIndirect"].value;
    var d = document.forms["aspnetForm"]["ctl00_reportmaster_txtSgot"].value;
    var e = document.forms["aspnetForm"]["ctl00_reportmaster_txtSgpt"].value;
    var f = document.forms["aspnetForm"]["ctl00_reportmaster_txtAlkalinePhosphatase"].value;
    var g = document.forms["aspnetForm"]["ctl00_reportmaster_txtTotalProteins"].value;
    var h = document.forms["aspnetForm"]["ctl00_reportmaster_txtAlbumin"].value;
    var i = document.forms["aspnetForm"]["ctl00_reportmaster_txtGlobulin"].value;
    var j = document.forms["aspnetForm"]["ctl00_reportmaster_txtAGRatio"].value;
    var k = document.forms["aspnetForm"]["ctl00_reportmaster_txtGgtp"].value;
    var l = document.forms["aspnetForm"]["ctl00_reportmaster_txtComment"].value;
    if (a == "" || a == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtBilirubinTotal").focus();
		$("#ctl00_reportmaster_txtBilirubinTotal").addClass('error').removeClass('noerror');
        return false;	
    }else if(b=="" || b==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtBilirubinDirect").focus();
		$("#ctl00_reportmaster_txtBilirubinDirect").addClass('error').removeClass('noerror');
	}else if(c=="" || c==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtBilirubinIndirect").focus();
		$("#ctl00_reportmaster_txtBilirubinIndirect").addClass('error').removeClass('noerror');
	}else if(d=="" || d==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSgot").focus();
		$("#ctl00_reportmaster_txtSgot").addClass('error').removeClass('noerror');
	}else if(e=="" || e==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSgpt").focus();
		$("#ctl00_reportmaster_txtSgpt").addClass('error').removeClass('noerror');
	}else if(f=="" || f==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtAlkalinePhosphatase").focus();
		$("#ctl00_reportmaster_txtAlkalinePhosphatase").addClass('error').removeClass('noerror');
	}else if(g=="" || g==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtTotalProteins").focus();
		$("#ctl00_reportmaster_txtTotalProteins").addClass('error').removeClass('noerror');
	}else if(h=="" || h==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtAlbumin").focus();
		$("#ctl00_reportmaster_txtAlbumin").addClass('error').removeClass('noerror');
	}else if(i=="" || i==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtGlobulin").focus();
		$("#ctl00_reportmaster_txtGlobulin").addClass('error').removeClass('noerror');
	}else if(j=="" || j==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtAGRatio").focus();
		$("#ctl00_reportmaster_txtAGRatio").addClass('error').removeClass('noerror');
	}else if(k=="" || k==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtGgtp").focus();
		$("#ctl00_reportmaster_txtGgtp").addClass('error').removeClass('noerror');
	}else if(l=="" || l==null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtComment").focus();
		$("#ctl00_reportmaster_txtComment").addClass('error').removeClass('noerror');
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
		
		setSelectValue('ctl00_reportmaster_txtBilirubinTotal', jsonforindividual.Bilirubin_total);
setSelectValue('ctl00_reportmaster_txtBilirubinDirect', jsonforindividual.Bilirubin_direct);
setSelectValue('ctl00_reportmaster_txtBilirubinIndirect', jsonforindividual.Bilirubin_indirect);
setSelectValue('ctl00_reportmaster_txtSgot', jsonforindividual.S_G_O_T);
setSelectValue('ctl00_reportmaster_txtSgpt', jsonforindividual.S_G_P_T);
setSelectValue('ctl00_reportmaster_txtAlkalinePhosphatase', jsonforindividual.Alkaline_phosphatase);
setSelectValue('ctl00_reportmaster_txtTotalProteins', jsonforindividual.Total_proteins);
setSelectValue('ctl00_reportmaster_txtAlbumin', jsonforindividual.Albumin);
setSelectValue('ctl00_reportmaster_txtGlobulin', jsonforindividual.Globulin);
setSelectValue('ctl00_reportmaster_txtAGRatio', jsonforindividual.A_g_ratio);
setSelectValue('ctl00_reportmaster_txtGgtp', jsonforindividual.G_G_T_P);
setSelectValue('ctl00_reportmaster_txtComment', jsonforindividual.Comments);
}
	else{}
}  	
	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
