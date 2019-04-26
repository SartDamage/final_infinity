<script>
$('<div class="row justify-content-between signature"><div class="col-2"></div><div class="col-2"><div class="row"><img src="/img/302_UserSign_DR_Pravin.jpg" class="pull-right" style="height:50px;"></div><div class="row"><strong>Dr Pravin Shinde</strong><br>MD Path.<br>MMC Reg:2000/03/1557</div></div></div>').insertAfter('.hmms-rptnote');

<?php 
 	$userDetails=$userClass->userDetails($session_id);
	$var = $userDetails->roleid;
	if($var == "8" || $var == "15"){
		echo '$("form :input").attr("readonly", true);';
		echo "\n";
		}
	?>

$("#ctl00_reportmaster_btnPrint").on("click",function(){
	
	var ID = "<?php echo $ID;?>";
	//alert("print.php");
	//swalSuccess("Printed!");
	$.ajax({
		type: "GET",
		url: "/Reports/check_if_report_set.php",//from global_variable
		data: {ID:ID}, // serializes the form's elements. 
		success: function(data){
			swalSuccess(data);//alert
			if(data=="Report Set"){
			
				$.ajax({
					type: "GET",
					url: "/invoice/increment_print.php",//from global_variable
					data: {ID:ID}, // serializes the form's elements. 
					success: function(data)
					{
					swalSuccess(data);//alert
					}
				});
			
				$("#aspnetForm").printThis({
					debug: false,               // show the iframe for debugging
					importCSS: true,            // import page CSS
					importStyle: false,         // import style tags
					printContainer: true,       // grab outer container as well as the contents of the selector
					//loadCSS: "path/to/my.css",  // path to additional css file - use an array [] for multiple
					pageTitle: "Report",              // add title to print page
					removeInline: false,        // remove all inline styles from print elements
					//printDelay: 333,            // variable print delay
					//header: null,               // prefix to html
					//footer: null,               // postfix to html
					//base: false ,               // preserve the BASE tag, or accept a string for the URL
					formValues: true,           // preserve input/form values
					//canvas: false,              // copy canvas elements (experimental)
					//doctypeString: "...",       // enter a different doctype for older markup
					removeScripts: false,       // remove script tags from print content
					copyTagClasses: false       // copy classes from the html & body tag
				});
			}else{
				swalError("Save The Report First.");
			}
		}
	});

});
function printreport(divname) {    
/*     var printContents = document.getElementById(divname).innerHTML;
    var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents; */
     //window.print();
	 var divname ="#"+divname;
	$(divname).printThis({
  debug: false,               // show the iframe for debugging
  importCSS: true,            // import page CSS
  importStyle: false,         // import style tags
  printContainer: true,       // grab outer container as well as the contents of the selector
  //loadCSS: "path/to/my.css",  // path to additional css file - use an array [] for multiple
  pageTitle: "Report",              // add title to print page
  removeInline: false,        // remove all inline styles from print elements
  //printDelay: 333,            // variable print delay
  //header: null,               // prefix to html
  //footer: null,               // postfix to html
  //base: false ,               // preserve the BASE tag, or accept a string for the URL
  formValues: true,           // preserve input/form values
  //canvas: false,              // copy canvas elements (experimental)
  //doctypeString: "...",       // enter a different doctype for older markup
  removeScripts: false,       // remove script tags from print content
  copyTagClasses: false       // copy classes from the html & body tag
});
/*      document.body.innerHTML = originalContents; */
    }
	
	
	
/**------set patient data symptom,diagnosis,prescription according to patID------**/
function focusFirstInput() {
  var inputElements = document.getElementsByTagName('input');
  try {
    for (var i = 0; i < inputElements.length; i++) {
      var e = inputElements[i];
      // uses jQuery for hasClass()
      if (e.tagName == 'INPUT' &&
          !$(e).hasClass('nofocus') &&
          (e.type == "text" || e.type == "password") &&
          e.value === '') {
        e.focus();
        return;
      }
    }
  } catch (e) {} // in case IE gets angry
}
window.onload = focusFirstInput;
$('input:text[value=""]').first().focus();
$("#ctl00_btnSave").on('click',function(){
$("form#opd_patient_detail_Form").off('submit').on("submit",function(e){
	e.preventDefault();
	var formData = $("#opd_patient_detail_Form").serialize();
	//var formData = $("form#opd_patient_detail_Form").serialize()
	console.log("formData : "+formData);
	//alert("Submitted");
	var symptom = $('textarea#ctl00_ptsymptoms').val();
	var diagnosis = $('textarea#ctl00_diagnosis').val();
	var prescription = $('textarea#ctl00_ptprescription').val();
	if( (symptom == "" )){
		swalError("Symtoms not noted");//alert
		$( "textarea#ctl00_ptsymptoms" ).focus();
	}else if((diagnosis == "" )){
		swalError("diagnosis not noted");//alert
		$( "textarea#ctl00_diagnosis" ).focus();
	}else if( (prescription=="") ){
		swalError("Prescription not noted");//alert
		$( "textarea#ctl00_ptprescription" ).focus(); 
	}else{
		$.ajax({
	   type: "POST",
	   url:"set_opd_patient_diagnosis_by_dr.php",
	   data: formData,
	   success: function(data)
	   {
		console.log("data : "+data);
		swalSuccess("Patient Data Updated.");//alert
	   },
	   error: function(xhr, status, error) {
		  var err = eval("(" + xhr.responseText + ")");
		  swalError(err.Message);//alert
		}
	 });
	}
	
});
});
/**----- get patient data from patientregistrationmaster+patientopd+patientdetails -----**/
var ID= "<?php echo base64_encode($ID);?>";

$.get("/get_patient_detail_by_patho_ID_for_report.php", //Required URL of the page on server
		{ID:ID}, // Data Sending With Request To Server
function(response,status){ // Required Callback Function
			console.log(response);
			var json = JSON.parse(response);
			parseJsonToForm(json); 
});

/* $.ajax({
	   type: "GET",
	   url: "/get_patient_detail_by_patho_ID_for_report.php",
	   data: "ID=PL00000010" ,
	   success: function(data)
	   {	
			console.log(data);
			var json = JSON.parse(data);
			parseJsonToForm(json); 
	   },
		cache: false,
		contentType: false,
		processData: false
	 }); */
function parseJsonToForm(json){
	if(json.ConsultedBy=="" || json.ConsultedBy==null)var consultedby="--NA--";
		var name = json.FirstName+"&nbsp"+json.LastName;
		var age_sex = json.Age+" / "+json.Gender;
		var doctor_assigned = ""+consultedby;
		var sample = json.SampleCollected;
		if(sample==1){sample="&nbsp;In lab";}else{sample="&nbsp;outside lab";}
		var date_visit = json.WhenEntered;
		if(date_visit=="" || date_visit == null){}else{var date_visit = date_visit.substring(0,11);}
		if(date_visit=="" || date_visit == null){}else{var date_visit = date_visit.split('-').reverse().join('/');}
		
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		if(dd<10) {dd = '0'+dd}
		if(mm<10) {mm = '0'+mm}
		today = dd + '/' + mm + '/' + yyyy;
		if(doctor_assigned=="" || doctor_assigned==null || doctor_assigned=="undefined"){doctor_assigned="--N.A.--";}else{doctor_assigned = "Dr. "+consultedby;}
		console.log(name+"::"+age_sex+"::"+doctor_assigned+"::"+date_visit+"::"+json.PatientId+"::"+json.RegistrationID);
		//document.getElementById(ctl00_lblpatid).innerHTML=json.patientID;
		setInnerValue('ctl00_lbllabid', json.LabID);
		setInnerValue('ctl00_lblpatid', json.PatientId);
		setInnerValue('ctl00_lblpatientname', name);
		setInnerValue('ctl00_lbldrname',doctor_assigned);
		setInnerValue('ctl00_lblconsdr',doctor_assigned);
		setInnerValue('ctl00_lblregID', json.RegistrationID);
		JsBarcode('#barcode1', json.RegistrationID,{height:20,font:"Roboto",displayValue:false,margin:0});
		setInnerValue('ctl00_lblregdate',date_visit);
		setInnerValue('ctl00_lblreportdate',today);
		//setInnerValue('ctl00_lblregdate1',date_visit);
		setInnerValue('ctl00_lblage_sex',age_sex);
		setInnerValue('ctl00_lblsample',sample);
		setValue('ctl00_reportmaster_RegID',json.RegistrationID);
		setValue('ctl00_reportmaster_PatID',json.PatientId);
		
}

// setSelectValue (id, val) {}is in footer

function setInnerValue (id, val) {
	//console.log("ID is : '"+id+"' ::: inner value is : "+val);
	document.getElementById(id).innerHTML=val;
}
function setValue (id, val) {
	//console.log("ID is : '"+id+"' ::: value is : "+val);
	$("input[id="+id+"]").val(val)
	//console.log("ID is : EOL'"+id+"' ::: value is : EOL "+val);
	//document.getElementById(id).value=val;
}	

function functionName()
{
    $("#ctl00_ptsymptoms").val("");
    $("#ctl00_diagnosis").val("");
    $("#ctl00_ptprescription").val("");
}

/**
 * Clearable text inputs
 */
function tog(v){return v?'addClass':'removeClass';} 
$(document).on('input', '.clearable', function(){
    $(this)[tog(this.value)]('x');
}).on('mousemove', '.x', function( e ){
    $(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
}).on('touchstart click', '.onX', function( ev ){
    ev.preventDefault();
    $(this).removeClass('x onX').val('').change();
});
// $('.clearable').trigger("input");
// Uncomment the line above if you pre-fill values from LS or server

	modal.onload = function(){ document.getElementById("loading").style.display = "none" } 

</script>
<script>
if(window.attachEvent) {
    window.attachEvent('onload', get_text_from_page("#aspnetForm"));
} else {
    if(window.onload) {
        var curronload = window.onload;
        var newonload = function(evt) {
            curronload(evt);
            get_text_from_page("#aspnetForm");
        };
        window.onload = newonload;
    } else {
        window.onload = get_text_from_page("#aspnetForm");
    }
}

function get_text_from_page(ID){
var text = $(ID).text() || $('#aspnetForm').find('input').val();
//console.log(text);
}

function swalError(text){
	swal({
              title: "Error!",
              text: text,
              icon: "error",
              timer: 2000,
			  button:false
           });
}
function swalSuccess(text){
	swal({
              title: "Success!",
              text: text,
              icon: "success",
              timer: 2000,
			  button:false
           });
}


</script>
<?php
$pageTitle = "Reports Pathology Patients"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	
<?php //include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
</body>
</html>
