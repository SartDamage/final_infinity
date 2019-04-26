

<?php include $_SERVER['DOCUMENT_ROOT']."/include/include_in_patho_report.php"; ?>

<body>
    <form method="post" action="./WIDALReport.aspx" id="aspnetForm" class="section-to-print">
</div>
        <div class="hmms_report">
            <div class="hmms_hdr">
                <?php include $_SERVER['DOCUMENT_ROOT']."/include/patho_report_header_lbl.php";?>
            </div>
            <div>
                
    <div class="hmms_hdr">
        <div class="">
            <div class="hmms-reprtname">BETA HCG</div>
        </div>
        <div class="profile_tbl">
            <table class="width-100">
                <tr>
                    <td class="font-RobotoBold width-40">TEST DESCRIPTION</td>
                    <td class="font-RobotoBold width-20 text-center">RESULT</td>
                    <td class="font-RobotoBold width-40">REFERENCE RANGE</td>
                </tr>
                <tr>
                    <td class="width-40">B-HCG</td>
                    <td class="width-20 text-center">
                        <input name="ctl00_reportmaster_txtB-HCG" type="text" maxlength="100" id="ctl00_reportmaster_txtB-HCG" class="txtbox-css width-90px margin-left-97" /></td>
                    <td class="width-40"><!--1st Week : 10 - 15 mlu/ml--></td>
                </tr>
                
            </table>
        </div>
        <div class="hmms-rptnote">
            <span>
			<table class="ref_range_tab">
				<thead>
					<th>
						Weeks of Pregnancy
					</th>
					<th>
						HCG level miu/mm
					</th>
				</thead>
				<tbody>
					<tr><td>1</td><td>5-50 (avg. 14)</td></tr>
					<tr><td>2</td><td>5-50 (avg. 21)</td></tr>
					<tr><td>3</td><td>5-50 (avg. 42)</td></tr>
					<tr><td>4</td><td>10-425</td></tr>
					<tr><td>5</td><td>19-7340</td></tr>
					<tr><td>6</td><td>1080-56500</td></tr>
					<tr><td>7-8</td><td>7650-229000</td></tr>
					<tr><td>9-10</td><td>25700-288000</td></tr>
					<tr><td>13-16</td><td>13300-254000</td></tr>
					<tr><td>17-24</td><td>4060-165400</td></tr>
					<tr><td>24-40</td><td>3640-117000</td></tr>
				<tbody>
			</table>
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
	   url: "/set_p_BetaHCGReport.php",
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
    var patTime = document.forms["aspnetForm"]["ctl00_reportmaster_txtB-HCG"].value;
    if (patTime == "" || patTime == null) {
        alert("Parameters must be filled must be filled out");
		$("#ctl00_reportmaster_txtB-HCG").focus();
		$("#ctl00_reportmaster_txtB-HCG").addClass('error').removeClass('noerror');
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
		if(json2=="no insert"){alert(json2);}else{$("#myModal_report .close").click()/*;window.location='/list_all_tests_registered_pathology.php#2b';*/}
}	

function parseJsonToFormIndividual(jsonforindividual){
	console.log("json for ind in parse "+jsonforindividual);
	if (jsonforindividual){
		setSelectValue("ctl00_reportmaster_btnSave","Update");
		
		
		setSelectValue('ctl00_reportmaster_txtB-HCG', jsonforindividual.B_HCG);
	}
	else{}
}  	
</script>

<?php include $_SERVER["DOCUMENT_ROOT"]."/include/include_in_patho_report_footer.php";?>
