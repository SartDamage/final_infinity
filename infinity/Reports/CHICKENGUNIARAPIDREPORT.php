

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
            <div class="hmms-reprtname">CHICKUNGUNIA RAPID</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">CHICKUNGUNIA IgM</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtCHICKUNGUNIA" type="text" maxlength="100" id="ctl00_reportmaster_txtCHICKUNGUNIA" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
				<tr>
                    <td class="width-40">Sample</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtSample" type="text" maxlength="100" id="ctl00_reportmaster_txtSample" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"></td>
                </tr>
                
            </table>
        </div>
        <div class="hmms-rptnote">
            <span>Method : Qulitative Rapid Chromatographic Immunossay Screening Test<br /><br> 
			NOTE:<br>
			1. CHICKUNGUNIA IgM Rapid Test is a Qalitative detection of IgM antibodies in human serum/plasma.<br>
			2. A negative test does not exclude the possiblity of explosure to or infection wth chickungunia.<br>	
			3. A negative result can occur 	if the quantity of IgM antibodies in the specimen is below the detection limit of the <br>assay, or teh antibodies that are detected are not present during the stage of disease in which samples collected.<br>
			4. The result obtained should be interpreted in correlation with other diagnostic clinical findings.<br>	
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
	   url: "/set_p_ChickenGuniaRapidReport.php",
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
    var chickungunia = document.forms["aspnetForm"]["ctl00_reportmaster_txtCHICKUNGUNIA"].value;
	 var samples = document.forms["aspnetForm"]["ctl00_reportmaster_txtSample"].value;
   
    if (chickungunia == "" || chickungunia == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtCHICKUNGUNIA").focus();
		$("#ctl00_reportmaster_txtCHICKUNGUNIA").addClass('error').removeClass('noerror');
        return false;	
    } else if (samples == "" || samples == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtSample").focus();
		$("#ctl00_reportmaster_txtSample").addClass('error').removeClass('noerror');
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
		
		
		setSelectValue('ctl00_reportmaster_txtCHICKUNGUNIA', jsonforindividual.Chickun_Gunia_IgM);
setSelectValue('ctl00_reportmaster_txtSample', jsonforindividual.Sample);
}
	else{}
}  		
	
</script>


<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
