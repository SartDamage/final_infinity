		<div class="container">
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		<br>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5><!--title--> <!--(make according to dr id (on completion line *98))--></h5><!--<?php/* echo $userDetails->username;*/ ?>-->
			  </div>
			</div>
			<div class="card card-outline-info mb-3">
				<div class="card-block">
					<form role="form" action="" method="post">
						<div class="form-group">
								<h6>Click to Transfer patient to</h6>
								<br>
								<div class="row justify-content-md-center">
									<!--<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="opd" disabled>OPD	</button>-->
									<button   type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="ipd" >IPD	</button>
									<button   type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="O_T">O.T.	</button>
									<!--<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="radio" >Radiology	</button>-->
								</div>
						</div>
					</form>
					<div id="filter-records"></div>
				</div>
			</div>
			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <!----------------------@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-------------------------------->
			  <div id="exTab3" class="">
					<ul class="nav nav-pills">
					<li class="nav-item">
					<a class="nav-link active" href="#1b" data-tab="1b" data-toggle="tab">Pending patients</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#2b" data-tab="2b" data-toggle="tab" id="generate">Consulted patients</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#3b" data-tab="3b" data-toggle="tab">All OPD patients</a>
					</li>
					<!--<li class="nav-item">
					<a class="nav-link " href="#4b" data-tab="4b" data-toggle="tab">All reports</a>
					</li>-->
					</ul>
					<div class="tab-content clearfix">
						<div class="tab-pane border border-teal active" id="1b">
						<br>
						<table id="myTable_pending_patients" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							</table>
						</div>
						<div class="tab-pane border border-teal" id="2b">
							<br>
						<!--<h3>Reports generated and payment may or may not be done print not taken.</h3>-->
							<table id="myTable_counsulted" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							</table>
						</div>
						<div class="tab-pane border border-teal" id="3b">
							<br>
							<table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							<!--<thead class="thead-teal">

								<tr class="head_row">
									<th class="no-sort">select</th>
									<th>Patient ID</th>
									<th>Name</th>
									<th class="no-sort">Details</th>-->
									<!--<th>Registration ID</th>
									<th>Contact</th>
									<th>Email</th>-->
									<!--<th>Date Visit</th>
									<th class="no-sort">Charges</th>
									<th class="no-sort">Options</th>
								</tr>
								</thead>
								<tbody>
								</tbody>-->
							</table>
						</div>
						<!--<div class="tab-pane border border-teal" id="4b">
							<h3>will contain all reports irrespective of time,payment.</h3>
						</div>-->
					</div>
				</div>
			  <!----------------------@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-------------------------------->

			  </div>
		</div>
	</div>


<script>
var value=<?php echo $userDetails->ID;?>;
window.addEventListener('DOMContentLoaded', function() {
console.log('window - DOMContentLoaded - capture'); // 1st
				$.ajax({
					   type: "POST",
					   url: <?php echo $url_get_all_patients_opd_by_dr; ?>,//from global_variable /*******for dr specific**/
					   <?php if($_SESSION['uid']=="2") {echo ' data: {dr_id:'. $userDetails->ID.'}';}else{}?>,
					  /*  url: <?php echo $url_get_all_patients_opd; ?>, *///from global_variable
					   // serializes the form's elements. */
					   success: function(data)
					   {
							var json = JSON.parse(data);
							//alert(data);
							//alert("hello in ajax success loop");
						  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
						  //location.href = "./home.php"
								//var json = data;
								console.log(json);
							parseJsonToTable(json,'#myTable_pending_patients',"1");
							parseJsonToTable(json,'#myTable_counsulted',"2");
							//parseJsonToTable(json,'#myTable',"3");
						},
				});
				$.ajax({
					   type: "POST",
					   url: <?php echo $url_get_all_patients_opd; ?>,
					   success: function(data)
					   {
							//console.log(`data ${data}`);
							var json = JSON.parse(data);
							parseJsonToTable(json,'#myTable',"3");
						},
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
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){
    dd='0'+dd;
}
//if(mm<10){ mm='0'+mm ;}else{}
mm<10 ? mm='0'+mm  : mm;
var today = dd+'-'+mm+'-'+yyyy;
function parseJsonToTable(json,table_name,resolve)
{
	var table_header=$('<thead class="thead-teal"><tr class="head_row"><th class="no-sort">select</th><th>Patient ID</th><th>Name</th><th class="no-sort">Details</th><th class="no-sort">Consulting <br>Doctor Name</th><th>Date Visit</th><th class="no-sort">Charges <br> in (₹)</th><th class="no-sort">Options</th></tr></thead>    <!--<tfoot class="thead-teal"><tr class="head_row"><th class="no-sort">select</th><th>Patient ID</th><th>Name</th><th class="no-sort">Details</th><th class="no-sort">Consulting <br>Doctor Name</th><th>Date Visit</th><th class="no-sort">Charges <br> in (₹)</th><th class="no-sort">Options</th></tr></tfoot>--><tbody>');
	$(table_name).append(table_header);

	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
						var date = json[i].visit_date;
						var date = date.substring(0,11);
						var date= date.split("-").reverse().join("-").replace(" ", "");
						console.log(`today is ${today} and date fetched is ${date}`);
						var doctor_assigned = "";
						if(!(json[i].doctor_assigned)){doctor_assigned="N.A.";}else{doctor_assigned = json[i].doctor_assigned;}
						console.log(`this is doctors after if loop ${doctor_assigned}`);
						if(isNaN(doctor_assigned)){
										//setInnerValue('ctl00_lbldr',doctor_assigned);
										doctor_assigned = json[i].doctor_assigned;
										console.log(`this is doctors number ${json[i].doctor_assigned}`);
						}else{
							doctor_assigned = get_dr_name(doctor_assigned);
							console.log(`this is doctors name from function ${doctor_assigned}`);
						}
			if(resolve=="1" && date==today)
			{
					console.log(`resolve is :: ${resolve}`);
					if(json[i].diagnosis == null ){
						console.log(json[i].diagnosis);
						var PreFix= (json[i].patientID).substring(0,3);
						//var date = date.substring(0,11);
						if(PreFix=="OPD")
						{var show= "Select"}
						else if(PreFix=="IPD"){ var show="OPD"}
						else{var show="IPD/OPD"}
						var charges="";
						if(( !json[i].charges)){charges="N.A";}else{charges= json[i].charges;}

						var time = json[i].WhenEntered;
						var time = time.substring(11,16);
						tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'" data-RegID="'+json[i].RegistrationID+'" data-pat_id="'+json[i].patientID+'">');
						tr.append("<td><input class='form-control mar-l-15' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"' data-patientID_send='"+json[i].patientID+"'></td>");
						tr.append("<td>" + json[i].patientID + "</td>");
						tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
						tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Email : " + json[i].Email + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div><div class='row intable'> Reg ID.: " + json[i].RegistrationID + "</div></div></td>");
						tr.append("<td>Dr. " + doctor_assigned+ "</td>");
						tr.append("<td><div class='row intable'> Date : " + date + "</div><div class='row intable'> Time : "+time+"</div></td>");
						tr.append("<td>" + charges + "</td>");
						tr.append('<td class=""><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" title="Enter patient case form"  data-uid=' + json[i].patientID + '><i class="fa fa-sign-in" aria-hidden="true"></i></button>&nbsp;&nbsp;<button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal white-on-hover" data-PathoIndividualID="'+json[i].patientID+'"  data-RegistrationID="' +json[i].RegistrationID + '" title="Generate Invoice" ><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i>							<i class=" fal fa-bars fa-stack-1x"></i></i> </button></td>');/* &nbsp&nbsp&nbsp'+ show+' */
						$(table_name).append(tr);
					}
				}else if(resolve=="2" && date==today){console.log(`resolve is :: ${resolve}`);
					if(json[i].diagnosis != null){
						console.log(json[i].diagnosis);
						var PreFix= (json[i].patientID).substring(0,3);
						//var date = date.substring(0,11);
						if(PreFix=="OPD")
						{var show= "Select"}
						else if(PreFix=="IPD"){ var show="OPD"}
						else{var show="IPD/OPD"}
						var charges="";
						if(( !json[i].charges)){charges="N.A";}else{charges= json[i].charges;}
						var time = json[i].WhenEntered;
						var time = time.substring(11,16);
						tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'" data-RegID="'+json[i].RegistrationID+'" data-pat_id="'+json[i].patientID+'">');
						tr.append("<td><input class='form-control mar-l-15' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"' data-patientID_send='"+json[i].patientID+"'></td>");
						tr.append("<td>" + json[i].patientID + "</td>");
						tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
						tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Email : " + json[i].Email + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div><div class='row intable'> Reg ID.: " + json[i].RegistrationID + "</div></div></td>");
						tr.append("<td>Dr. " +doctor_assigned + "</td>");
						tr.append("<td><div class='row intable'> Date : " + date + "</div><div class='row intable'> Time : "+time+"</div></td>");
						tr.append("<td>" + charges + "</td>");
						tr.append('<td class=""><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" title="Enter patient case form"  data-uid=' + json[i].patientID + '><i class="fa fa-sign-in" aria-hidden="true"></i></button>&nbsp;&nbsp;<button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal white-on-hover" data-PathoIndividualID="'+json[i].patientID+'"  data-RegistrationID="' +json[i].RegistrationID + '" title="Generate Invoice" ><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i>							<i class=" fal fa-bars fa-stack-1x"></i></i> </button></td>');/* &nbsp&nbsp&nbsp'+ show+' */
						$(table_name).append(tr);
					}}else if(resolve=="3"){
						console.log(json[i].diagnosis);
						var PreFix= (json[i].patientID).substring(0,3);
						//var date = date.substring(0,11);
						if(PreFix=="OPD")
						{var show= "Select"}
						else if(PreFix=="IPD"){ var show="OPD"}
						else{var show="IPD/OPD"}
						var charges="";
						if(( !json[i].charges)){charges="N.A";}else{charges= json[i].charges;}
						var time = json[i].WhenEntered;
						var time = time.substring(11,16);
						tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'" data-RegID="'+json[i].RegistrationID+'" data-pat_id="'+json[i].patientID+'">');
						tr.append("<td><input class='form-control mar-l-15' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"' data-patientID_send='"+json[i].patientID+"'></td>");
						tr.append("<td>" + json[i].patientID + "</td>");
						tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
						tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Email : " + json[i].Email + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div><div class='row intable'> Reg ID.: " + json[i].RegistrationID + "</div></div></td>");
						tr.append("<td>Dr. " + doctor_assigned + "</td>");
						tr.append("<td><div class='row intable'> Date : " + date + "</div><div class='row intable'> Time : "+time+"</div></td>");
						tr.append("<td>" + charges + "</td>");
						tr.append('<td class=""><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" title="Enter patient case form"  data-uid=' + json[i].patientID + '><i class="fa fa-sign-in" aria-hidden="true"></i></button>&nbsp;&nbsp;<button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal white-on-hover" data-PathoIndividualID="'+json[i].patientID+'"  data-RegistrationID="' +json[i].RegistrationID + '" title="Generate Invoice" ><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i>							<i class=" fal fa-bars fa-stack-1x"></i></i> </button></td>');/* &nbsp&nbsp&nbsp'+ show+' */
						$(table_name).append(tr);
					}
	 }
				if(resolve == "1" || resolve == "2"){ $(table_name).DataTable({
			 "order": [[ 1, "asc" ], [ 5	, 'asc' ]],
			"dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
			 "buttons": [
			//	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
                   {
                    extend: 'print',
                    exportOptions: {
                    columns: [ 1, 2, 3, 4,5,6,7,8,9 ] //Your Colume value those you want
                        }
                      },
                      {
                          extend: 'excel',
                          exportOptions: {
                          columns: [1, 2, 3, 4,5,6,7,8,9 ] //Your Colume value those you want
                      }
                    }
				           ],
				//"responsive": true,
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
					{ "width": "10%", "targets": 4 },
					{ "width": "10%", "targets": 2 },
					{ "width": "20%", "targets": 3 },
					{"targets"  : 'no-sort',"orderable": false,}
				  ],
					

			  /* "columns": [null,null,{ width: '5%' },null,null,null], */
			   /* "aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,null,{ "bSortable": false */
				"pagingType":"simple_numbers",
				 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]],
				 initComplete: function () {
            this.api().columns([4]).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
		});}else{ $(table_name).DataTable({
			 "order": [[ 1, "asc" ], [ 5	, 'asc' ]],
			"dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
			  "buttons": [
			//	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
                   {
                    extend: 'print',
                    exportOptions: {
                    columns: [ 1, 2, 3, 4,5,6 ] //Your Colume value those you want
                        }
                      },
                      {
                          extend: 'excel',
                          exportOptions: {
                          columns: [1, 2, 3, 4,5,6] //Your Colume value those you want
                      }
                    }
				           ],
				"responsive": true,
				
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
					{ "width": "10%", "targets": 4 },
					{ "width": "15%", "targets": 2 },
					{ "width": "20%", "targets": 3 },
					{"targets"  : 'no-sort',"orderable": false,}
				  ],
					
			  /* "columns": [null,null,{ width: '5%' },null,null,null], */
			   /* "aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,null,{ "bSortable": false */
				"pagingType":"simple_numbers",
				 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]],
				 initComplete: function () {
            this.api().columns([4]).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
		});

		}

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
	window.location="/OPD_patient_detail_printable.php?ID="+ID;
	/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
}
function generate_reciept(button){
	var patID= button.getAttribute("data-PathoIndividualID");
	var regID= button.getAttribute("data-RegistrationID");
	//var ID="12";
	//alert(ID);
	//
	window.location="/invoice/invoice_opd.php?regID="+regID+"&patID="+patID;
	/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
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
		}else{var radioValue = $("input[name='selection']:checked").val();
				if(radioValue){
					window.location.href="/addpatient_ipd_from_new.php?ID="+radioValue;
				 }
			}
		});

		$("#radio").on('click',function(){if (!$("input[name='selection']:checked").val()){
				 swalInfo("Select a patient first to add to Radiology!!","No patient selected");
		}else{
			if(radioValue){
					swalInfo("radiology module not added yet");
					//window.location.href="/addpatient_ipd_from_new.php?ID="+radioValue;
				 }
		}});

		 $("#O_T").on('click',function(){
			  //alert("Select a patient !!");
			 if (!$("input[name='selection']:checked").val()){
				 swalWarning("Select a patient first to add to O.T. !!","No patient selected");
			 }else{
            var radioValue = $("input[name='selection']:checked").val();
             var radioPat_id = $("input[name='selection']:checked").attr("data-patientID_send");
            if(radioValue){
				window.location.href="/addpatient_ot_from_new.php?ID="+radioValue+"&pat_id="+radioPat_id;
			 }
			 }
        });

	function goBack() {
    window.history.back()
}
function get_dr_name(doctor_name){
			var dr_name = "";
			//console.log("doctoe_name  :: "+doctor_name);
			$.ajax({
							   type: "GET",
							   url:"/get_dr_name_by_dr_id.php",
							   data: { 'dr_ID' : doctor_name},
							   async: false,
							   success: function(data)
							   {
								data = JSON.parse(data);
								//console.log("data : "+data);
								//swalSuccess("Patient Data Updated.");
									dr_name = /* "Dr. "+ */data.firstname+" "+data.lastname;
								//console.log("Dr. "+data.firstname+" "+data.lastname);
								//setInnerValue('ctl00_lbldr',dr_name);

							   },
							   error: function(xhr, status, error) {
								  var err = eval("(" + xhr.responseText + ")");
								  alert(err.Message);
								}
							 });
							 return dr_name;

		}
</script>
