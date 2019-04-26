		<div class="container">
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		<br>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5><!--title--> *( According to Doctor)</h5><!--<?php/* *( make according to Dr id afterword) echo $userDetails->username;*/ ?>-->
			  </div>
			</div>
			<div class="card card-outline-info mb-3">
				<div class="card-block">
					<form role="form" action="" method="post">
						<div class="form-group">
								<h6>Click to Transfer patient to</h6>
								<br>
								<div class="row justify-content-md-center">
									<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="opd" >OPD	</button>
									<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="ipd" disabled>IPD	</button>
									<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="patho">Pathology	</button>
									<!--<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="radio" disabled>Radiology	</button>-->
								</div>
						</div>
					</form>
					<div id="filter-records"></div>
				</div>
			</div>
			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">

			  <table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
					<thead class="thead-teal">

						<tr class="head_row">
							<th class="no-sort">select</th>
							<th>Patient ID</th>
							<th>Name</th>
							<th class="no-sort">Details</th>
							<!--<th>Registration ID</th>
							<th>Contact</th>
							<th>Email</th>-->
							<th>Date Visit</th>
							<th>Date discharge</th>
							<th class="no-sort">Charges</th>
							<th class="no-sort"><center>Options</center></th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
			  </div>
		</div>
	</div>


<script>
var value= "<?php $staff_id = $userDetails->ID;echo "$staff_id";?>"
window.addEventListener('DOMContentLoaded', function() {
console.log('window - DOMContentLoaded - capture'); // 1st
				$.ajax({
					   type: "POST",
					   url: "/get_list_all_patients_ipd_by_dr.php",//from global_variable
					   //url: "/get_all_patients_ipd.php",//from global_variable
					   data: {staff_id: value}, // serializes the form's elements. */
					   success: function(data)
					   {
						   console.log(data);
							var json = JSON.parse(data);
							//alert(data);
							//alert("hello in ajax success loop");
						  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
						  //location.href = "./home.php"
								//var json = data;
								console.log(json);
							parseJsonToTable(json);
							//$value=$value+10;
						}
				});
				/* $("#patho").on('click',function(){
            var radioValue = $("input[name='selection']:checked").val();
            var radioPat_id = $("input[name='selection']:checked").attr("data-patientID_send");
			console.log("radio attr : "+radioPat_id);
            if(radioValue){
				window.location.href="./addpatient_pathology_from_new.php?ID="+radioValue+"&pat_id="+radioPat_id+"";
            } */
    /*     }); */
},true);

function parseJsonToTable(json)
{
	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
						var PreFix= (json[i].patientID).substring(0,3);
						//var date = date.substring(0,11);
						if(PreFix=="OPD")
						{var show= "Select"}
						else if(PreFix=="IPD"){
						var show="IPD"
						var discharge=json[i].discharge_date_time;
						if (discharge==null){
							discharge=`--Admited--`;
							var show="Discharge";
							var width = "110px";
							var button_class_name = "btn btn-outline-teal";
							}
						else{
						var show="Discharged";
						var discharge_time = discharge.substring(12,20);
						var discharge = discharge.substring(0,11);
						var discharge= discharge.split("-").reverse().join("-");
						var discharge= discharge.split(" ").join("");
						discharge = `Date : ${discharge} <br> Time : ${discharge_time}`;// discharge string
						var width = "110px";
						var button_class_name = "btn btn-outline-danger";
						}						}
						else{var show="IPD/OPD"}
						var charges="";
						if(( !json[i].charges)){charges="N.A";}else{charges= `₹ ${json[i].charges} /-`;}
						var date = json[i].admit_date_time;
						var date = date.substring(0,11);
						var date= date.split("-").reverse().join("-");
						var time = json[i].admit_date_time;
						var time = time.substring(11,16);
						tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'" data-RegID="'+json[i].RegistrationID+'" data-pat_id="'+json[i].patientID+'">');
						tr.append("<td><input class='form-control mar-l-15' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"' data-patientID_send='"+json[i].patientID+"'></td>");
						tr.append("<td>" + json[i].patientID + "</td>");
						tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
						tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Email : " + json[i].Email + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div><div class='row intable'> Reg ID.: " + json[i].RegistrationID + "</div></div></td>");
						tr.append("<td><div class='row intable'> Date : " + date + "</div><div class='row intable'> Time : "+time+"</div></td>");
						tr.append("<td>" + discharge + "</td>");
						tr.append("<td>" + charges + "</td>");
						tr.append('<td class=""><button type="button" onclick="case_form(this)" class="btn btn-outline-teal" title="Enter patient case form"  data-patientID=' + json[i].patientID +  'data-uid=' + json[i].patientID + '><i class="fa fa-sign-in" aria-hidden="true"></i></button>&nbsp;<button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal white-on-hover" data-patientID="'+json[i].patientID+'"  data-RegistrationID="' +json[i].RegistrationID + '" title="Generate Invoice" ><i class=" fa-stack "><i class=" fa fa-sticky-note-o fa-stack-2x"></i><i class=" fa fa-reorder fa-stack-1x"></i></i> </button>&nbsp;<button type="button" onclick="click_discharge(this)" class="btn btn-outline-teal" title="Discharge" data-patientID="'+json[i].patientID+'" data-uid="'+ json[i].RegistrationID +'"><i class="fa fa-sign-out" aria-hidden="true"></i></button></td>');/* &nbsp&nbsp&nbsp'+ show+' */
						$('table').append(tr);
					}
					$('#myTable').DataTable({
			 "order": [[ 1, "desc" ], [ 4	, 'desc' ]],
			"dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
			 "buttons": [
				/* 'csv','csv', */ 'excel',/*  'pdf', */ 'print'
				],
			 "language": {
								searchPlaceholder: "Search records"
							},
			 "oLanguage": {
								"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
								},
			  "info":     false,
			  "autoWidth": false,
			  "columnDefs": [
					{ "width": "5%", "targets": 0 },
					{ "width": "15%", "targets": 1 },
					{ "width": "15%", "targets": 4 },
					{ "width": "15%", "targets": 2 },
					{ "width": "25%", "targets": 3 },
					{"targets"  : 'no-sort',"orderable": false,}
				  ],

			  /* "columns": [null,null,{ width: '5%' },null,null,null], */
			   /* "aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,null,{ "bSortable": false */
				"pagingType":"simple_numbers",
				 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
		});
		$('div.dataTables_filter input').focus();

}

function showDetails(pat_id_row) {
	//////redundant
var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
//var pat_type = pat_id_row.getAttribute("data-pat_id");
var Row = document.getElementById(pat_id_row);
var Cells = Row.getElementsByTagName("td");
//var ID= button.getAttribute("data-uid");
	//var ID="12";
	//alert(ID);
	window.location="<?php echo $update_patient_opd;?>ID="+pat_type+"";
}

$('#myTable').on('click', 'tr', function (event) {
	var pat_type = document.getElementById(this.id).getAttribute("data-RegID");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(this.id);
	var Cells = Row.getElementsByTagName("td");
	window.location="/registered_patient_all.php?ID="+pat_type+"";
});

$('#myTable').delegate('tr td:first-child', 'click', function(event) {
	event.stopPropagation();
});

function clickedbutton(button){
	var ID= button.getAttribute("data-uid");
	//var ID="12";
	//alert(ID);
	swalWarning("No case page system created yet for inpatient");
			//window.location="/OPD_patient_detail_printable.php?ID="+ID;
	/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
}
function generate_reciept(button){
	var patID= button.getAttribute("data-patientID");
	var regID= button.getAttribute("data-RegistrationID");
	//var ID="12";
	//swalWarning("No invoicing system created yet for inpatient");
	window.location="/invoice/invoice_ipd.php?ID="+patID;
	/* window.location="/invoice/invoice_ipd.php?regID="+regID+"&patID="+patID; */
	/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
}
function click_discharge(button){
	/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
	var ID= button.getAttribute("data-uid");
	var prefix= button.getAttribute("data-prefix");
	var patientID= button.getAttribute("data-patientID");
	var bed_id= button.getAttribute("data-bed_id");
	var status= button.getAttribute("data-status");
	//var ID="12";
	//alert(ID);
	javascript:void(0)
	if(prefix=="IPD" && status=="Discharge"){
		//swalSuccess(ID);
		$.ajax({
		   type: "GET",
		   url: "discharge_ipd_patient.php",//from global_variable
		    data: {bed_number_id: bed_id,patID:patientID},  // serializes the form's elements. */
		   success: function(data)
		   {
				//var json = JSON.parse(data);
				//location.href = "./home.php";
				console.log(data);
				if(data=="Discharged Successfully"){
				/* table_add_charges.destroy();
				$("#myTable tbody").empty();
				table_data_fetch_parse(); */
				swalSuccess(data);
		   }else{
			   swalInfo(data);
		   }
			}
		});
		}else if(prefix=="IPD" && status=="Discharged"){
			swalInfo("Patient already discharged ");
		}else if(prefix=="OPD"){
			swalSuccess(ID);
			}
	//window.location="./patient_update.php?ID="+ID+"";
}
$("#opd").on('click',function(){if (!$("input[name='selection']:checked").val()){
				 swalInfo("Select a patient first to add to OPD!!","No patient selected");
		}else{
			var radioValue = $("input[name='selection']:checked").val();
            if(radioValue){
				window.location.href="/addpatient_opd_from_new.php?ID="+radioValue+"";
			 }
			}
		});
		$("#ipd").on('click',function(){if (!$("input[name='selection']:checked").val()){
				 swalInfo("Select a patient first to add to IPD!!","No patient selected");
		}else{}});

		$("#radio").on('click',function(){if (!$("input[name='selection']:checked").val()){
				 swalInfo("Select a patient first to add to Radiology!!","No patient selected");
		}else{}});

		 $("#patho").on('click',function(){
			  //alert("Select a patient !!");
			 if (!$("input[name='selection']:checked").val()){
				 swalInfo("Select a patient first to add to Pathology!!","No patient selected");
			 }else{
            var radioValue = $("input[name='selection']:checked").val();
             var radioPat_id = $("input[name='selection']:checked").attr("data-patientID_send");
            if(radioValue){
				window.location.href="/addpatient_pathology_from_new.php?ID="+radioValue+"&pat_id="+radioPat_id;
			 }
			 }
        });

	function goBack() {
    window.history.back()
}
</script>
