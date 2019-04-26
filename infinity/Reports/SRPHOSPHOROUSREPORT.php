

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?><body>
    <form method="post" action="./SrPhosphorousReport.aspx" id="aspnetForm" class="section-to-print">
</div>
        <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">SR. PHOSPHOROUS</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">S.Phosphourus</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtPhosphourus" type="text" maxlength="100" id="ctl00_reportmaster_txtPhosphourus" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40">2.5 - 4.5 mg / dl
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
	   url: "/set_p_SrPhosphorousReport.php",
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
    var a = document.forms["aspnetForm"]["ctl00_reportmaster_txtPhosphourus"].value;
    if(a == "" || a == null){
		alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtPhosphourus").focus();
		$("#ctl00_reportmaster_txtPhosphourus").addClass('error').removeClass('noerror');
	}else{ return true;}
}

function parseJsonToForm2(json2){
		/* $('#First-name-input').val(json.firstname); */
		//setSelectValue('ctl00_reportmaster_txtPatientTime', json.RegID);
		//setSelectValue('patID', json.patientID)
		if(json2=="no insert"){alert(json2);}else{swalSuccess(json2);setTimeout(function () {if(window.location=="http://localhost/list_all_tests_registered_pathology.php" || window.location =="http://localhost/list_all_tests_registered_pathology.php#1b"){ window.location='/list_all_tests_registered_pathology.php#2b';$("#myModal_report .close").click();}else if(window.location =="http://localhost/list_all_tests_registered_pathology.php#2b"){ window.location='/list_all_tests_registered_pathology.php#3b';$("#myModal_report .close").click();}else if(window.location =="http://localhost/list_all_tests_registered_pathology.php#3b"){ window.location='/list_all_tests_registered_pathology.php#1b';$("#myModal_report .close").click();}else{$("#myModal_report .close").click();}}, 500);/* console.log(window.location); */}
}

function setSelectValue (id, val) {
	console.log("ID is : "+id+" :::  value is : "+val);
    document.getElementById(id).value = val;
}
function parseJsonToFormIndividual(jsonforindividual){
	console.log("json for ind in parse "+jsonforindividual);
	if (jsonforindividual){
		setSelectValue("ctl00_reportmaster_btnSave","Update");
		
		
		setSelectValue('ctl00_reportmaster_txtPhosphourus', jsonforindividual.S_phosphourus);
}
	else{}
}  	

	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
