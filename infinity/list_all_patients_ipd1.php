<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc ");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$data_for_search=json_encode($results);
//return $json;
$db=null;

//echo $json;
//$db=null;
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>

<style>
a {  -webkit-transition: .25s all;transition: .25s all;}
.table td, .table th{vertical-align:middle!important;padding: 0.25rem!important;}
.table .center{text-align:  center;}
.card {overflow: hidden;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);-webkit-transition: .25s box-shadow;transition: .25s box-shadow;}
.card:focus,.card:hover {box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);}
.card-inverse .card-img-overlay {background-color: rgba(51, 51, 51, 0.85);border-color: rgba(51, 51, 51, 0.85);}
.accord{width: -webkit-fill-available;width:100%;border-radius: 0px;}
#accordion .panel{padding:5 0 5 0;}
#accordion .panel-body{padding:5px;border-style: none ridge none ridge;margin: 0 8 0 8;}
#accordion .panel-body-last{padding:5px;border-style: none ridge ridge ridge;margin: 0 8 0 8;}
.panel-default>.panel-heading a:after {content: "";position: relative;top: 1px;display: inline-block;font-family: 'Glyphicons Halflings';font-style: normal;font-weight: 400;line-height: 1;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;float: right;transition: transform .25s linear;-webkit-transition: -webkit-transform .25s linear;}
.panel-default>.panel-heading a[aria-expanded="true"] {/*background-color: #eee;*/}
.panel-default>.panel-heading a[aria-expanded="true"]:after {content: "\2212";-webkit-transform: rotate(180deg);transform: rotate(180deg);}
.panel-default>.panel-heading a[aria-expanded="false"]:after {content: "\002b";-webkit-transform: rotate(90deg);transform: rotate(90deg);}
#txt-search{border-radius:24px;}
.thead-teal{height:45px;}
input[type=search]::-webkit-search-cancel-button {-webkit-appearance: searchfield-cancel-button;}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link{color: #fff!important;
    background-color: #8BC34A!important;}
	#exTab3 .nav-pills>li>a {
    border-radius: 5px 5px 0 0;
    padding: 15px;
}
.nav-item a {color: #8BC34A!important;}
</style>
<?php/* include $_SERVER['DOCUMENT_ROOT'].'/nav_sidebar.php';*/?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>

<body style="background-color:#E0F2F1;">
	<div id="main">
		<?php include  $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
		<div class="container">

		<br>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5>Welcome <?php if( $userDetails->roleid == "8"){}else{echo "Dr. ";}echo $userDetails->firstname;/* (To be used in admin) */ ?> </h5>
				<?php
					$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

						if (strpos($url,'/list_all_patients_ipd.php') !== false) {
							echo '<a href="#" onclick="goBack()" class="float" title="Click, to go back">
					<i class="fa fa-times my-float"></i>
				</a>';
						} else {}
				?>

			  </div>
			</div>
			<div class="card card-outline-info mb-3">
				<div class="card-block">
					<div class="row justify-content-md-center">
						<button  type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="register_pat">Register Patient</button>
					</div>
				</div>
			</div>

			<div class="card card-outline-info mb-3">
				<div class="card-block">
					<form role="form" action="" method="post">
						<div class="form-group">
								<h6>Click to Transfer patient to</h6>
								<br>
								<div class="row justify-content-md-center">
									<button  type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="opd">OPD	</button>
									<!--<button   type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="ipd">IPD	</button>-->
									<button   type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="O_T">O.T.	</button>
									<!--<button  type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="patho">Pathology	</button>-->
									<!--<button   type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="radio">Radiology	</button>-->
								</div>
						</div>
					</form>
					<div id="filter-records"></div>
				</div>
			</div>
			<div class="card card-outline-info mb-3">
				<div class="card-block">
					<div class="row justify-content-md-center">
					  <div class="row">
                                <div class="col-1"></div>
                                <div class="col-1">
                                  <label for="from_date" id="date_label" class="col-form-label"><b>From:</b></label>
                                </div>
                                    <div id="from_date_1" class="col-3 input-group date">
                                    <input class="" type="text" id="from_date" name="from_date" oninput="myFunction()" autocomplete="off" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>


                                <div class="col-2"></div>
                                <div class="col-1">
                                    <label for="to_date" id="date_label" class="col-form-label"><b>To:</b></label>
                                </div>

                                <div id="to_date_1" class="col-3 input-group date">
                                    <input class="" type="text" id="to_date" name="to_date" oninput="myFunction()" autocomplete="off" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>

                    	</div>
					</div>
				</div>
			</div>
			<!--<div class="card card-outline-info mb-3">
				<div class="card-block">
					<form role="form">
						<div class="form-group">
							<input type="search" class="input-lg" id="txt-search" placeholder="Search Patients by Name/Registration ID/Number">
						</div>
					</form>
					<div id="filter-records"></div>
				</div>
			</div>-->
			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  	<div class="col-sm-2">
			  		  <input class="option-input_radio checkbox"  type="checkbox" id="filter_record_ipd" class="filter_record_ipd" name="filter_record_ipd" />
			  		  <label id="show_all">Show all records</label>
			  	</div>
					<div id="exTab3" class="">
						<ul class="nav nav-pills">
							<li class="nav-item">
								<a class="nav-link active" href="#1b" data-tab="1b" data-toggle="tab">Active  patients</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#2b" data-tab="2b" data-toggle="tab" id="generate">Discharged patients</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#3b" data-tab="3b" data-toggle="tab">All patients</a>
							</li>
							<!--<li class="nav-item">
							<a class="nav-link " href="#4b" data-tab="4b" data-toggle="tab">All reports</a>
							</li>-->
						</ul>
						<div class="tab-content clearfix">
						<div class="tab-pane border border-teal active" id="1b">
						<br>
							<table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							</table>
						</div>
						<div class="tab-pane border border-teal" id="2b">
							<br>
							<table id="myTable_discharged" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							</table>

						</div>
						<div class="tab-pane border border-teal" id="3b">
							<br>
							<table id="myTable_all" class="table table-striped table-hover dt-responsive nowrap" width="100%">
							</table>

						</div>
						<!--<div class="tab-pane border border-teal" id="4b">
							<h3>will contain all reports irrespective of time,payment.</h3>
						</div>-->
					</div>
					</div>

			  </div>
		</div>
	</div>
<!----------------------------------------------------------->
	<div class="modal fade" id="myModal_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
		<div class="modal-dialog modal-lg modal_for_report" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				</div>
			<!--<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Send message</button>-->
			</div>
		</div>
	</div>
</div>
<!----------------------------------------------------------->

<script>
	$(document).ready(function(){
    var date_input=$('input[name="from_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    };
    date_input.datepicker(options);
    })
$(document).ready(function(){

    var date_input=$('input[name="to_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    };
    date_input.datepicker(options);
 })
var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
  /**********@@@@@@@@@@@@@@@@@@@@@@***************/  /*List of all active admitted patients*/
	$.ajax({
		   type: "POST",
		   url: "/get_all_patients_ipd_active.php",//from global_variable    <?php //echo $url_get_all_patients_ipd; ?>
		   data: {start: $value}, // serializes the form's elements. */
		   success: function(data)
		   {
			   console.log(`active patients ${data}`);
				var json = JSON.parse(data);
			 /* on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
			  location.href = "./home.php"
					var json = data;*/
				parseJsonToTable(json,"#myTable");
				$value=$value+10;
			}
		});
		/**********@@@@@@@@@@@@@@@@@@@@@@***************/  /*List of all patients*/
	$.ajax({
		   type: "POST",
		   url: <?php echo $url_get_all_patients_ipd; ?>,
		   data: {start: $value}, // serializes the form's elements. */
		   success: function(data)
		   {
			   console.log(`all patients ${data}`);
				var json = JSON.parse(data);
			 /* on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
			  location.href = "./home.php"
					var json = data;*/
				parseJsonToTable_all(json,"#myTable_all");
				$value=$value+10;
			}
		});
		/**********@@@@@@@@@@@@@@@@@@@@@@@@@@@**************/  /*List of all discharged patients*/
		$.ajax({
		   type: "POST",
		   url: "/get_all_patients_ipd_inactive.php",
		   data: {start: $value}, // serializes the form's elements. */
		   success: function(data)
		   {
			   console.log(`all inactive patients ${data}`);
				var json = JSON.parse(data);
			 /* on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
			  location.href = "./home.php"
					var json = data;*/

				parseJsonToTable_discharged(json,"#myTable_discharged");
				$value=$value+10;

			}
		});
		/**********@@@@@@@@@@@@@@@@@@@@@@@@@@@**************/
	$("#register_pat").on('click',function(){
				window.location.href="/addpatientform.php";
		});
	$("#opd").on('click',function(){if (!$("input[name='selection']:checked").val()){
			 swalInfo("Select a patient first to add to OPD!!","No patient selected");
	}else{
		var radioValue = $("input[name='selection']:checked").val();
		if(radioValue){
			window.location.href="/addpatient_opd_from_new.php?ID="+radioValue+"";
		 }
		}
	});
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
        $("#O_T").on('click',function(){
			  //alert("Select a patient !!");
			 if (!$("input[name='selection']:checked").val()){
				 swalWarning("Select a patient first to add to O.T. !!","No patient selected");
			 }else{
            var radioValue = $("input[name='selection']:checked").val();
             var radioPat_id = $("input[name='selection']:checked").attr("data-patientID_send");
            if(radioValue){
				window.location.href="./addpatient_ot_from_new.php?ID="+radioValue+"&pat_id="+radioPat_id;
			 }
			 }
        });
},true);

function parseJsonToTable_all(json,myTable){
 trbl=$(`<thead class="thead-teal">
            <tr class="head_row">
              <th>id</th>
              <th>Select</th>
              <th class="no-sort">Patient ID</th>
              <th>UHID</th>
              <th class="no-sort" hidden>isUHID</th>
              <th>Name</th>
              <th>Age</th>
              <th>Sex</th>
              <th>Date<br> Admitted</th>
              <th>Discharge<br> date</th>
              <th>Bill No.<br> Date & Time</th>
              <th>Diagnosis</th>
              <th class="no-sort">Charges</th>
              <th>Transferred <br>/ Referred to </th>
              <th>Stable/Unstable</th>
              <th>Planned/Unplanned</th>
              <th>Death</th>
              <th>MLC/ non MLC</th>
              <th>Remark</th>
              <th>Option</th>
              <th class="no-sort" > Receipt List</th>
            </tr>
          </thead>
          <tbody>`)
	$(myTable).append(trbl);
	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
					var for_test_cell ="N.A.";
					var PreFix= (json[i].patientID).substring(0,3);
					//var date = date.substring(0,11);
					if(PreFix=="OPD")
					{var show= "IPD";var width = "110px";}
					else if(PreFix=="IPD"){
						var discharge=json[i].discharge_date_time;
						if (discharge==null){
							discharge=`--Admited--`;
							var show="Discharge";
							var width = "110px";
							var button_class_name = "btn btn-outline-teal";
							}
						else{
						var show="Discharged";
						var discharge_time = discharge.substring(11,20);
						var discharge = discharge.substring(0,11);
						var discharge= discharge.split("-").reverse().join("-");
						var discharge= discharge.split(" ").join("");
						discharge = `Date : ${discharge} <br> Time : ${discharge_time}`;// discharge string
						var width = "110px";
						var button_class_name = "btn btn-outline-danger";
						}
					}
					else{var show="IPD/OPD"}
					if(json[i].advance_record_ipd != ""){
						for_test_cell="";
					for(var j=0;j<json[i].advance_record_ipd.length;j++){
						var PatientId= json[i].advance_record_ipd[j].PatientId;
						var avd_recieptID=json[i].advance_record_ipd[j].avd_recieptID;
						var avd_amount_paid = json[i].advance_record_ipd[j].avd_amount_paid;
						if(PatientId){
							for_test_cell += "<div title='Advance Paid' data-patientID='"+`${PatientId}`+"' onclick='list_advance(this)' style='padding-bottom:2px;cursor: pointer;' class='row intable sub_test_id' data-avd_recieptID='"+`${avd_recieptID}`+"' data-avd_amount_paid='"+`${avd_amount_paid}`+"' data-amount_test='"+avd_amount_paid+"' >"+`${avd_recieptID}`+"</div>"
							}
						else{
							for_test_cell="N.A.";
						}
					}
					}else{
						for_test_cell="N.A.";
					}
					if(!(json[i].charges)){var charges="N.A";}else{var charges=json[i].charges;}
					var date = json[i].admit_date_time;
					var date = date.substring(0,11);
					var date= date.split("-").reverse().join("-");
					var time = json[i].WhenEntered;
					var time = time.substring(11,16);
					var UHID = json[i].UHID;
					tr = $('<tr class="tbl_row" id="'+json[i].patientID+'" data-pat_id="'+json[i].RegistrationID+'">');
					tr.append("<td>" + json[i].ID+ "</td>");
					tr.append("<td><input class='form-control mar-l-15' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"' data-patientID_send='"+json[i].patientID+"'></td>");
					tr.append("<td>"+ json[i].patientID + "</td>");
					tr.append("<td>" + UHID + "</td>");
					tr.append("<td hidden>" + json[i].isUHID + "</td>");

					tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
					tr.append("<td>"  + json[i].Age + "</td>");
					tr.append("<td>"  + json[i].Gender + "</td>");
					tr.append("<td><div class='row intable'> Date : " + date + "</div><div class='row intable'> Time : "+ time+"</div></td>");
					tr.append("<td>" + discharge + "</td>");
					tr.append("<td><div class='row intable'> Date & Time : " + json[i].recieptwhenentered + "</div><div class='row intable'> Bill no. : "+ json[i].reciept_id_invoice +"</div></td>");
					tr.append("<td>" + json[i].diagnosis + "</td>");
					tr.append("<td>" + json[i].charges + "</td>");



					tr.append("<td>" + json[i].Address + "</td>");
					tr.append("<td><div class='table_div'><div class='row intable'> Email : " + json[i].Email + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div></div></td>");
					/*tr.append("<td >" + json[i].RegistrationID + "</td>"); */
					/*tr.append("<td>" + json[i].Mobile + "</td>");
					tr.append("<td>" + json[i].Email + "</td>"); */
					tr.append("<td></td>");
					tr.append("<td></td>");
					tr.append(`<td>${json[i].isMLC}</td>`);
					tr.append("<td></td>");
          tr.append(`<td class="">
<button type="button" onclick="case_form(this)" class="btn btn-outline-teal" title="Enter patient case form"  data-patientID="${json[i].patientID}" data-uid="${json[i].patientID}"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
<button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal white-on-hover" data-patientID="${json[i].patientID}"  data-RegistrationID="${json[i].RegistrationID}" title="Generate Invoice" ><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i><i class=" fal fa-bars fa-stack-1x"></i></i> </button>
<button type="button" onclick="click_discharge(this)" class="${button_class_name}" title="${show}" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID}"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
<button type="button" onclick="add_expense(this)" class="${button_class_name}" title="Add Advance reciept" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID }"><i class="fal fa-rupee-sign" aria-hidden="true"></i></button>
<button type="button" onclick="show_discharge_summary(this)" class="${button_class_name}" title="Add Discharge Note" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID }"><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i><i class=" fal fa-bars fa-stack-1x"></i></i></button>
<button type="button" onclick="show_receipt(this)" class="${button_class_name}" title="Receipt" data-patientID="${json[i].patientID}" data-uid="${ json[i].RegistrationID }"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
</td>`);
          tr.append(`<td class=""><button type="button" onclick="list_receipt(this)" class="btn btn-outline-teal white-on-hover" data-patientID="${json[i].patientID}"  data-RegistrationID="${json[i].RegistrationID}" title="Generate Invoice" ><i class="fa fa-list-alt" aria-hidden="true"></i></button>
          </td>`);
    /*
					/* tr.append('<td class=""><button type="button" data-prefix="'+PreFix+'" onclick="clickedbutton(this)" class="'+button_class_name+'" title="'+show+' patient"style="width:'+width+'" data-bed_id="'+json[i].ID+'" data-patientID="'+json[i].patientID+'" data-status="'+show+'"  data-uid=' + json[i].RegistrationID + '><!--<i class="fa fa-share-square-o fa-2" aria-hidden="true"></i> -->&nbsp'+ show+'</button></td>');*/
					$(myTable).append(tr);
				}
				 $('#myTable_all thead th').each( function () {

			        var title = $(this).text();
			        if(title == 'isUHID')
			        $(this).html( '<input type="text" id="isUHID_1_2" value = "" placeholder="Search '+title+'" />' );
			    } );

			 var my_table_active = $(myTable).DataTable({

			 "order": [[ 5, "desc" ], [ 2, 'desc' ]],
			  "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
			 "buttons": [
				/* 'csv',  */'excel',/*  'pdf', */ 'print'
				],
	   	    	"responsive": true,
			  "info":     false,
			  "autoWidth": false,
			  "language": {searchPlaceholder: "Search records",search:""},
			  "oLanguage": {"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;"},
			  "columnDefs": [{ "width": "5%", "targets": 1 },
							 { "width": "15%", "targets": 4 },
							 { "width": "15%", "targets": 2 },
							 { "width": "15%", "targets": 3 },
							 {"targets":'no-sort',"orderable":false},
							 {
								"targets": [ 0 ],
								"visible": false,
							 },
				  ],

			  /* "columns": [null,null,{ width: '5%' },null,null,null], */
			   //"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,null,{ "bSortable": false },],
				"pagingType":"simple_numbers",
				"lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
		});
			 my_table_active.columns().every( function () {
        var that = this;

        $( 'input', this.header() ).on( 'keyup change input', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

		$('div.dataTables_filter input').focus();
			$('[data-toggle="tooltip"]').tooltip();


     $('#isUHID_1_2').val(1);
     $("#isUHID_1_2").keyup();
    $( "#filter_record_ipd").change(function() {
    	  var ischecked= $(this).is(':checked');
                  $('#isUHID_1_2').val(" ");
                  $("#isUHID_1_2").keyup();
                  if(!ischecked)
                  {
            	 $('#isUHID_1_2').val(1);
                 $("#isUHID_1_2").keyup();

                  }

            });




}
function parseJsonToTable(json,myTable)
{
	trbl=$(`<thead class="thead-teal">
            <tr class="head_row">
              <th>id</th>
              <th>Select</th>
              <th class="no-sort">Patient ID</th>
              <th>UHID</th>
              <th class="no-sort" hidden>isUHID</th>
              <th>Name</th>
              <th>Address</th>
              <th class="no-sort">Details</th>
              <th>Date<br> Admitted</th>
              <th>Discharge<br> date</th>
              <th>Bill No.<br> Date & Time</th>
              <th>Diagnosis</th>
              <th class="no-sort">Charges</th>
              <th class="no-sort" >Options</th>
              <th class="no-sort" > Receipt List</th>
            </tr>
          </thead>
          <tbody>`)
	$(myTable).append(trbl);
	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
					var for_test_cell ="N.A.";
					var PreFix= (json[i].patientID).substring(0,3);
					//var date = date.substring(0,11);
					if(PreFix=="OPD")
					{var show= "IPD";var width = "110px";}
					else if(PreFix=="IPD"){
						var discharge=json[i].discharge_date_time;
						if (discharge==null){
							discharge=`--Admited--`;
							var show="Discharge";
							var width = "110px";
							var button_class_name = "btn btn-outline-teal";
							}
						else{
						var show="Discharged";
						var discharge_time = discharge.substring(11,20);
						var discharge = discharge.substring(0,11);
						var discharge= discharge.split("-").reverse().join("-");
						var discharge= discharge.split(" ").join("");
						discharge = `Date : ${discharge} <br> Time : ${discharge_time}`;// discharge string
						var width = "110px";
						var button_class_name = "btn btn-outline-danger";
						}
					}
					else{var show="IPD/OPD"}
					if(json[i].advance_record_ipd != ""){
						for_test_cell="";
					for(var j=0;j<json[i].advance_record_ipd.length;j++){
						var PatientId= json[i].advance_record_ipd[j].PatientId;
						var avd_recieptID=json[i].advance_record_ipd[j].avd_recieptID;
						var avd_amount_paid = json[i].advance_record_ipd[j].avd_amount_paid;
						if(PatientId){
							for_test_cell += "<div title='Advance Paid' data-patientID='"+`${PatientId}`+"' onclick='list_advance(this)' style='padding-bottom:2px;cursor: pointer;' class='row intable sub_test_id' data-avd_recieptID='"+`${avd_recieptID}`+"' data-avd_amount_paid='"+`${avd_amount_paid}`+"' data-amount_test='"+avd_amount_paid+"' >"+`${avd_recieptID}`+"</div>"
							}
						else{
							for_test_cell="N.A.";
						}
					}
					}else{
						for_test_cell="N.A.";
					}
					if(!(json[i].charges)){var charges="N.A";}else{var charges=json[i].charges;}
					var date = json[i].admit_date_time;
					var date = date.substring(0,11);
					var date= date.split("-").reverse().join("-");
					var time = json[i].WhenEntered;
					var time = time.substring(11,16);
					var UHID = json[i].UHID;
					tr = $('<tr class="tbl_row" id="'+json[i].patientID+'" data-pat_id="'+json[i].RegistrationID+'">');
					tr.append("<td>" + json[i].ID+ "</td>");
						tr.append("<td><input class='form-control mar-l-15' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"' data-patientID_send='"+json[i].patientID+"'></td>");
					tr.append("<td>"+ json[i].patientID + "</td>");
					tr.append("<td>" + UHID + "</td>");
					tr.append("<td hidden>" + json[i].isUHID + "</td>");

					tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
					tr.append("<td>" + json[i].Address + "</td>");
					tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Email : " + json[i].Email + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div><div class='row intable'> Age.: " + json[i].Age + "</div></div></td>");
					/*tr.append("<td >" + json[i].RegistrationID + "</td>"); */
					/*tr.append("<td>" + json[i].Mobile + "</td>");
					tr.append("<td>" + json[i].Email + "</td>"); */
					tr.append("<td><div class='row intable'> Date : " + date + "</div><div class='row intable'> Time : "+ time+"</div></td>");


					tr.append("<td>" + discharge + "</td>");
					tr.append("<td><div class='row intable'> Date & Time: " + json[i].recieptwhenentered + "</div><div class='row intable'> Bill no. : "+ json[i].reciept_id_invoice +"</div></td>");
					tr.append("<td>" + json[i].diagnosis + "</td>");
					tr.append("<td>" + json[i].charges + "</td>");
					tr.append(`<td class=""><button type="button" onclick="case_form(this)" class="btn btn-outline-teal" title="Enter patient case form"  data-patientID="${json[i].patientID}" data-uid="${json[i].patientID}"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                    <button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal white-on-hover" data-patientID="${json[i].patientID}"  data-RegistrationID="${json[i].RegistrationID}" title="Generate Invoice" ><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i><i class=" fal fa-bars fa-stack-1x"></i></i> </button>
    <button type="button" onclick="click_discharge(this)" class="${button_class_name}" title="${show}" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID}"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
    <button type="button" onclick="add_expense(this)" class="${button_class_name}" title="Add Advance reciept" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID }"><i class="fal fa-rupee-sign" aria-hidden="true"></i></button>
    <button type="button" onclick="show_discharge_summary(this)" class="${button_class_name}" title="Add Discharge Note" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID }"><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i><i class=" fal fa-bars fa-stack-1x"></i></i></button>
    <button type="button" onclick="show_receipt(this)" class="${button_class_name}" title="Receipt" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID }"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
</td>`);
          tr.append(`<td class=""><button type="button" onclick="list_receipt(this)" class="btn btn-outline-teal white-on-hover" data-patientID="${json[i].patientID}"  data-RegistrationID="${json[i].RegistrationID}" title="Generate Invoice" ><i class="fa fa-list-alt" aria-hidden="true"></i></button>
          </td>`);
/*
					/* tr.append('<td class=""><button type="button" data-prefix="'+PreFix+'" onclick="clickedbutton(this)" class="'+button_class_name+'" title="'+show+' patient"style="width:'+width+'" data-bed_id="'+json[i].ID+'" data-patientID="'+json[i].patientID+'" data-status="'+show+'"  data-uid=' + json[i].RegistrationID + '><!--<i class="fa fa-share-square-o fa-2" aria-hidden="true"></i> -->&nbsp'+ show+'</button></td>');*/
					$(myTable).append(tr);
				}
				 $('#myTable thead th').each( function () {
              debugger;
			        var title = $(this).text();
			        if(title == 'isUHID')
			        $(this).html( '<input type="text" id="isUHID_1" value = "" placeholder="Search '+title+'" />' );
			    } );

			 var my_table_active = $(myTable).DataTable({

			 "order": [[ 5, "desc" ], [ 2, 'desc' ]],
			  "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
			 "buttons": [
				/* 'csv',  */'excel'/*  'pdf', */ /*'print'*/
				],
				"responsive": true,
			  "info":     false,
			  "autoWidth": false,
			  "language": {searchPlaceholder: "Search records",search:""},
			  "oLanguage": {"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;"},
			  "columnDefs": [{ "width": "5%", "targets": 1 },
							 { "width": "15%", "targets": 4 },
							 { "width": "15%", "targets": 2 },
							 { "width": "15%", "targets": 3 },
							 {"targets":'no-sort',"orderable":false},
							 {
								"targets": [ 0 ],
								"visible": false,
							 },
				  ],
			  /* "columns": [null,null,{ width: '5%' },null,null,null], */
			   //"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,null,{ "bSortable": false },],
				"pagingType":"simple_numbers",
				"lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
		});
			 my_table_active.columns().every( function () {
        var that = this;

        $( 'input', this.header() ).on( 'keyup change input', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

		$('div.dataTables_filter input').focus();
			$('[data-toggle="tooltip"]').tooltip();


     $('#isUHID_1').val(1);
     $("#isUHID_1").keyup();
    $( "#filter_record_ipd").change(function() {
      debugger;
    	  var ischecked= $(this).is(':checked');
                  $('#isUHID_1').val(" ");
                  $("#isUHID_1").keyup();
                  if(!ischecked)
                  {
            	 $('#isUHID_1').val(1);
                 $("#isUHID_1").keyup();

                  }

            });

}
function parseJsonToTable_discharged(json,myTable)
{
	trbl=$(`<thead class="thead-teal">
          <tr class="head_row">
            <th>Select</th>
            <th class="no-sort">Patient Id</th>
            <th>UHID</th>
            <th class="no-sort" hidden>isUHID</th>
            <th>Name</th><th>Address</th>
            <th class="no-sort">Details</th>
            <th>Date<br> Admitted</th>
            <th>Discharge<br> date</th>
            <th>Bill No.<br> date & Time </th>
            <th>Diagnosis</th>
            <th class="no-sort">Charges</th>
            <th class="no-sort" >Options</th>
            <th class="no-sort" > Receipt List</th>
            </tr>
            </thead>
            <tbody>`)
	      $(myTable).append(trbl);
	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
					var for_test_cell ="N.A.";
					var PreFix= (json[i].patientID).substring(0,3);
					//var date = date.substring(0,11);
					if(PreFix=="OPD")
					{var show= "IPD";var width = "110px";}
					else if(PreFix=="IPD"){
						var discharge=json[i].discharge_date_time;
						if (discharge==null){
							discharge=`--Admited--`;
							var show="Discharge";
							var width = "110px";
							var button_class_name = "btn btn-outline-teal";
							}
						else{
						var show="Discharged";
						var discharge_time = discharge.substring(10,20);
						var discharge = discharge.substring(0,11);
						var discharge= discharge.split("-").reverse().join("-");
						var discharge= discharge.split(" ").join("");
						discharge = `Date : ${discharge} <br> Time : ${discharge_time}`;// discharge string
						var width = "110px";
						var button_class_name = "btn btn-outline-danger";
						}
					}
					else{var show="IPD/OPD"}
					if(json[i].advance_record_ipd != ""){
						for_test_cell="";
					for(var j=0;j<json[i].advance_record_ipd.length;j++){
						var PatientId= json[i].advance_record_ipd[j].PatientId;
						var avd_recieptID=json[i].advance_record_ipd[j].avd_recieptID;
						var avd_amount_paid = json[i].advance_record_ipd[j].avd_amount_paid;
						if(PatientId){
							for_test_cell += "<div title='Advance Paid' data-patientID='"+`${PatientId}`+"' onclick='list_advance(this)' style='padding-bottom:2px;cursor: pointer;' class='row intable sub_test_id' data-avd_recieptID='"+`${avd_recieptID}`+"' data-avd_amount_paid='"+`${avd_amount_paid}`+"' data-amount_test='"+avd_amount_paid+"' >"+`${avd_recieptID}`+"</div>"
							}
						else{
							for_test_cell="N.A.";
						}
					}
					}else{
						for_test_cell="N.A.";
					}
					if(!(json[i].charges)){var charges="N.A";}else{var charges=json[i].charges;}
					var date = json[i].admit_date_time;
					var date = date.substring(0,11);
					var date= date.split("-").reverse().join("-");
					var time = json[i].WhenEntered;
					var time = time.substring(11,16);
					tr = $('<tr class="tbl_row" id="'+json[i].patientID+'" data-pat_id="'+json[i].RegistrationID+'">');
					tr.append("<td><input class='form-control mar-l-15' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"' data-patientID_send='"+json[i].patientID+"'></td>");
					tr.append("<td>" + json[i].patientID + "</td>");
					tr.append("<td>" + json[i].UHID + "</td>");
					tr.append("<td hidden>" + json[i].isUHID + "</td>");
					tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
					tr.append("<td>" + json[i].Address + "</td>");
					tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Email : " + json[i].Email + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div><div class='row intable'> Reg ID.: " + json[i].RegistrationID + "</div></div></td>");
					/*tr.append("<td >" + json[i].RegistrationID + "</td>"); */
					/*tr.append("<td>" + json[i].Mobile + "</td>");
					tr.append("<td>" + json[i].Email + "</td>"); */
					tr.append("<td><div class='row intable'> Date : " + date + "</div><div class='row intable'> Time : "+time+"</div></td>");
					tr.append("<td>" + discharge + "</td>");
					tr.append("<td><div class='row intable'> Date & Time: " + json[i].recieptwhenentered + "</div><div class='row intable'> Bill no : " + json[i].reciept_id_invoice + "</div></td>");

					tr.append("<td>" + json[i].diagnosis + "</td>");
					tr.append("<td>" + json[i].charges + "</td>");
					tr.append(`<td class=""><button type="button" onclick="case_form(this)" class="btn btn-outline-teal" title="Enter patient case form"  data-patientID="${json[i].patientID}" data-uid="${json[i].patientID}"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                    <button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal white-on-hover" data-patientID="${json[i].patientID}"  data-RegistrationID="${json[i].RegistrationID}" title="Generate Invoice" ><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i><i class=" fal fa-bars fa-stack-1x"></i></i> </button>
    <button type="button" onclick="click_discharge(this)" class="${button_class_name}" title="${show}" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID}"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
    <button type="button" onclick="add_expense(this)" class="${button_class_name}" title="Add Advance reciept" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID }"><i class="fal fa-rupee-sign" aria-hidden="true"></i></button>
    <button type="button" onclick="show_discharge_summary(this)" class="${button_class_name}" title="Add Discharge Note" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID }"><i class=" fa-stack "><i class=" fal fa-sticky-note fa-stack-2x"></i><i class=" fal fa-bars fa-stack-1x"></i></i></button>
    <button type="button" onclick="show_receipt(this)" class="${button_class_name}" title="Receipt" data-bed_id="${json[i].bedno}" data-prefix="${PreFix}" data-patientID="${json[i].patientID}" data-status="${show}" data-uid="${ json[i].RegistrationID }"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
</td>`);/*

        /* tr.append('<td class=""><button type="button" data-prefix="'+PreFix+'" onclick="clickedbutton(this)" class="'+button_class_name+'" title="'+show+' patient"style="width:'+width+'" data-bed_id="'+json[i].ID+'" data-patientID="'+json[i].patientID+'" data-status="'+show+'"  data-uid=' + json[i].RegistrationID + '><!--<i class="fa fa-share-square-o fa-2" aria-hidden="true"></i> -->&nbsp'+ show+'</button></td>');--*/
        tr.append(`<td class=""><button type="button" onclick="list_receipt(this)" class="btn btn-outline-teal white-on-hover" data-patientID="${json[i].patientID}"  data-RegistrationID="${json[i].RegistrationID}" title="Generate Invoice" ><i class="fa fa-list-alt" aria-hidden="true"></i></button>
        </td>`);
					$(myTable).append(tr);
				}
				$('#myTable_discharged thead th').each( function () {

			        var title = $(this).text();
			        if(title == 'isUHID')
			        $(this).html( '<input type="text" id="isUHID_1_1" value = "" placeholder="Search '+title+'" />' );
			    } );


			var my_table_discharged = $(myTable).DataTable({
			 "order": [[ 5, "desc" ], [ 1, 'desc' ]],
			  "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
			 "buttons": [
				/* 'csv',  */'excel'/*  'pdf','print'*/
				],
		    	"responsive": true,

			  "info":     false,
			  "autoWidth": false,
			  "language": {searchPlaceholder: "Search records",search:""},
			  "oLanguage": {"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;"},
			  "columnDefs": [{ "width": "5%", "targets": 0 },
							 { "width": "15%", "targets": 3 },
							 { "width": "15%", "targets": 1 },
							 { "width": "15%", "targets": 2 },
							 {"targets":'no-sort',"orderable":false}
				  ],
			  /* "columns": [null,null,{ width: '5%' },null,null,null], */
			   //"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,null,{ "bSortable": false },],
				"pagingType":"simple_numbers",
				"lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
		});

         	my_table_discharged.columns().every( function () {
                            var that = this;
                   $( 'input', this.header() ).on( 'keyup change input', function () {
                      if ( that.search() !== this.value ) {
                           that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
			 $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
              $($.fn.dataTable.tables(true)).DataTable()
              .columns.adjust()
             .responsive.recalc();
              });

		$('div.dataTables_filter input').focus();
		$('[data-toggle="tooltip"]').tooltip();
		 $('#isUHID_1_1').val(1);
		  $("#isUHID_1_1").keyup();

		    $( "#filter_record_ipd").change(function() {

		    	  var ischecked= $(this).is(':checked');
		                  $('#isUHID_1_1').val(" ");
		                  $("#isUHID_1_1").keyup();
		                  if(!ischecked)
		                  {
		            	 $('#isUHID_1_1').val(1);
		                 $("#isUHID_1_1").keyup();

		                  }

            });

}
table_click('#myTable');
table_click('#myTable_discharged');
table_click('#myTable_all');

function table_click(myTable){/*table click*/
$(myTable).on('click', 'tr', function (event) {
	var pat_type = document.getElementById(this.id).getAttribute("data-pat_id");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(this.id);
	var Cells = Row.getElementsByTagName("td");
	window.location="./registered_patient_all.php?ID="+pat_type+"";
});

$(myTable).delegate('tr td:first-child', 'click', function(event) {
	event.stopPropagation();
});
}
function showDetails(pat_id_row) {
	////redundant
	var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(pat_id_row);
	var Cells = Row.getElementsByTagName("td");

    //alert("" +Cells[1].innerText+ "'s Registration	 ID is " + pat_type + ".");
	window.location="./registered_patient_all.php?ID="+pat_type+"";
}

function clickedbutton(button){
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
function case_form(button){
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
		var patientID = button.getAttribute("data-patientID");
		//alert(patientID);
		window.open("/IPD_patient_detail_printable.php?ID="+patientID);
}
function add_expense(context){
	/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
	var ID= context.getAttribute("data-uid");
	var prefix= context.getAttribute("data-prefix");
	var patientID= context.getAttribute("data-patientID");
	var bed_id= context.getAttribute("data-bed_id");
	var status= context.getAttribute("data-status");
	//swalSuccess(`${ID} \n ${patientID}`);

	var url="/invoice/advance_invoice.php?ID="+patientID;/* change to add_invoice*/
	console.log(url);
	//var win = window.open(url, '_blank');
	$("#myModal_report").modal('show');
	$('.modal-body').load(url,function(){

	});
}
function show_discharge_summary(context){
	/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
	var ID= context.getAttribute("data-uid");
	var prefix= context.getAttribute("data-prefix");
	var patientID= context.getAttribute("data-patientID");
	var bed_id= context.getAttribute("data-bed_id");
	var status= context.getAttribute("data-status");
	//swalSuccess(`${ID} \n ${patientID}`);

	var url="<?php echo BASE_URL;?>discharge_summary.php?ID="+ID+"&pat_id="+patientID;/* change to add_invoice*/
	console.log(url);
        window.open(url);
	//var win = window.open(url, '_blank');
}

function show_receipt(context)
{
var RegID= context.getAttribute("data-uid");
var patientID= context.getAttribute("data-patientID");
//alert(RegID+"eijhikw"+patientID);

      url="receipt.php?ID="+patientID+"&Reg_id="+RegID;
      window.open(url,"_blank");


}

function list_receipt(context)
{
var RegID= context.getAttribute("data-uid");
var patientID= context.getAttribute("data-patientID");
//alert(RegID+"eijhikw"+patientID);

      url="list_all_receipt.php?pat_Id="+patientID;
      window.open(url,"_blank");


}

$('.close').on('click', function (e) {
	// do something...
	 $(".modal-body").html("");
	 $(this).removeData();
	//location.reload();
})
$('.modal').on('hide.bs.modal', function (e) {
	// do something...
	 $(".modal-body").html("");
	 $(".modal").removeData();
	//location.reload();
})
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
			type:"GET",
			url:"/ipd_check_payment.php",
			data:{bed_number_id:bed_id,patID:patientID},
			 success: function(data)
		   {
			   //console.log("386/475 data is "+data);
			if(data=="1"){
				swalError("Balance payment is pending");
			}else if(data=="2"){
				swalError("Generate invoice first");
			}else if(data=="0"){
				/**************/
				swal({
					  title: "Are you sure?",
					  text: "The Patient shall be discharged from the system.",
					  icon: "warning",
					  buttons: [
						'No, cancel it!',
						'Yes, I am sure!'
					  ],
					  dangerMode: true,
					}).then(function(isConfirm) {
					  if (isConfirm) {
						$.ajax({
							type:"GET",
							url:"discharge_ipd_patient.php",//from global_variable
							data:{bed_number_id: bed_id,patID:patientID,ID:ID},  // serializes the form's elements. */
							success: function(data){
								//var json = JSON.parse(data);
								//location.href = "./home.php";
							console.log(`in discharge  :::: ${data}`);
								substring = "Some error occured";
								if(data.indexOf(substring) === -1){
									//alert("hello");
								}

								/* table_add_charges.destroy();
								$("#myTable tbody").empty();
								table_data_fetch_parse(); */
								console.log(`in contains index ${data}`);
								var today = new Date();
								var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
								var json = JSON.parse(data);
								console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
								USER_NAME=`${json[0].FirstName} ${json[0].LastName}`;
								USER_CONTACT=`${json[0].Mobile}`;
								$.ajax({
									type:"GET",
									url:"/invoice/get_ipd_individual_bill_amount.php",
									data:{reciept_id:patientID,sms:true},
									success: function (data){
										var bill = JSON.parse(data);
										console.log(` test ${bill[0].total_paid} , ${bill.total_paid}`);
										send_sms.discharge_user("billdischarged",USER_CONTACT,USER_NAME,`${patientID}`,`${date}`,`${bill[0].total_paid}`);
										location.reload();
									}
								})


							}
						});
					  } else {
						swalInfo( "Your Patient is still Admitted","Cancelled", 1200);
					  }
					})
			}else{
				swalError(data);
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
	/* search function*/
	//var json=<?php //echo $data_for_search;?>;
function list_advance(context){
	/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
	var recieptID= context.getAttribute("data-avd_recieptID");
	var patientID= context.getAttribute("data-patientID");
	//alert("hello");
	var url="/invoice/advance_invoice.php?ID="+patientID+"&recieptID="+recieptID;/* change to add_invoice*/
	console.log(url);
	//var win = window.open(url, '_blank');
	$("#myModal_report").modal('show');
	$('.modal-body').load(url,function(){

	});
}
</script>
<?php
$pageTitle = "IPD patient's list HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include  $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
