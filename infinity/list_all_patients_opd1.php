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
<?php include './include/header.php';?>

<style>
a {
  -webkit-transition: .25s all;
  transition: .25s all;
}
.table td, .table th{vertical-align:middle!important;padding: 0.25rem!important;}
.table .center{text-align:  center;}
.card {
  overflow: hidden;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -webkit-transition: .25s box-shadow;
  transition: .25s box-shadow;
}

.card:focus,
.card:hover {
  box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
}

.card-inverse .card-img-overlay {
  background-color: rgba(51, 51, 51, 0.85);
  border-color: rgba(51, 51, 51, 0.85);
}
.accord{
		width: -webkit-fill-available;
		width:100%;
		border-radius: 0px;}
#accordion .panel{padding:5 0 5 0;}
#accordion .panel-body{padding:5px;border-style: none ridge none ridge;margin: 0 8 0 8;}
#accordion .panel-body-last{padding:5px;border-style: none ridge ridge ridge;margin: 0 8 0 8;}

.panel-default>.panel-heading a:after {
  content: "";
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .25s linear;
}

.panel-default>.panel-heading a[aria-expanded="true"] {
  /*background-color: #eee;*/
}

.panel-default>.panel-heading a[aria-expanded="true"]:after {
  content: "\2212";
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

.panel-default>.panel-heading a[aria-expanded="false"]:after {
  content: "\002b";
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}
.btn_addto{
	width:100px;
}



</style>
<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>

<body style="background-color:#E0F2F1;">
	<div id="main">
		<?php include './nav_bartop.php';?>
		<div class="container">

		<br>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5>List all patient's in OPD</h5><a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a><!--<?php/* echo $userDetails->username;*/ ?>-->
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
									<button type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="ipd">IPD	</button>
									<button type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="O_T">O.T.	</button>
									<!--<button type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="patho">Pathology	</button>-->
									<!--<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="radio" disabled>Radiology	</button>-->
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
			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
          <div class="col-sm-2">
              <input class="option-input_radio checkbox"  type="checkbox" id="filter_record_ipd" class="filter_record_ipd" name="filter_record_ipd" />
              <label id="show_all">Show all records</label>
          </div>
			  <table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
					<thead class="thead-teal">

						<!-- <tr class="head_row">
							<th class="no-sort">select</th>
							<th>Patient ID</th>
							<th>Name</th>
							<th class="no-sort">Details</th>
							<!--<th>Registration ID</th>
							<th>Contact</th>
							<th>Email</th>-->
							<!-- <th>Date Visit</th>
							<th>Remark</th>
							<th class="no-sort">Charges</th>
							<th class="no-sort">Options</th>
						</tr> -->

            <tr class="head_row">
            <th class="no-sort">select</th>
              <th>UHID</th>
              <th class="no-sort" hidden>isUHID</th>
              <th>Date</th>
              <th>Name</th>
              <th>Age</th>
              <th>Gender</th>
              <th>First Visit</th>
              <th>Follow UP</th>
              <th>Referred By</th>
              <th>Referred To IPD</th>
              <th>Remark</th>
              <th class="no-sort">Charges</th>
							<th class="no-sort">Options</th>
            </tr>
						</thead>
						<tbody>
						</tbody>
					</table>
			  </div>
		</div>
	</div>


<script>
$(document).ready(function(){
    var date_input=$('input[name="from_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
      format: 'dd-mm-yyyy',
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
      format: 'dd-mm-yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    };
    date_input.datepicker(options);
 })


var t2;
var $value=0;
window.addEventListener('DOMContentLoaded', function() {

    $.fn.dataTable.moment( 'DD -MM-YYYY' );
    $.fn.dataTable.moment( 'dddd, MMMM Do, YYYY' );

console.log('window - DOMContentLoaded - capture'); // 1st
				$.ajax({
					   type: "POST",
					   url: <?php echo $url_get_all_patients_opd; ?>,//from global_variable
					   data: {start: $value}, // serializes the form's elements. */
					   success: function(data)
					   {
							var json = JSON.parse(data);
							//alert(data);
							//alert("hello in ajax success loop");
						  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
						  //location.href = "./home.php"
								//var json = data;
								console.log(json);
							parseJsonToTable(json,"#myTable");
							$value=$value+10;
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

function parseJsonToTable(json,table)
{
	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
						var PreFix= (json[i].patientID).substring(0,3);
						//var date = date.substring(0,11);
						if(PreFix=="OPD")
						{var show= "Select"}
						else if(PreFix=="IPD"){ var show="OPD"}
						else{var show="IPD/OPD"}
						var charges="";

						if(( !json[i].charges)){charges="N.A";}else{charges= json[i].charges;}
					//	var date = json[i].visit_date;
						//var date = date.substring(0,11);
            var date=((json[i].visit_date).split(" ")[0]).split("-").reverse().join("-");
					//	var date= date.split("-").reverse().join("-");
						var time = json[i].visit_date;
						var time = time.substring(11,16);
						console.log(`Time is ${time}`);
						tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'" data-RegID="'+json[i].RegistrationID+'" data-pat_id="'+json[i].patientID+'">');
						// tr.append("<td><input class='form-control mar-l-15' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"' data-patientID_send='"+json[i].patientID+"'></td>");
						// tr.append("<td>" + json[i].patientID + "</td>");
						// tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
						// tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Email : " + json[i].Email + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div><div class='row intable'> Reg ID.: " + json[i].RegistrationID + "</div></div></td>");
						// tr.append("<td><div class='row intable'> Date : " + date + "</div><div class='row intable'> Time : "+time+"</div></td>");
						// tr.append("<td>" +json[i].remark + "</td>");
						// tr.append("<td>" + charges + "</td>");
						// tr.append('<td class=""><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" title="Enter patient case form"  data-uid=' + json[i].patientID + '><i class="fa fa-sign-in" aria-hidden="true"></i></button>&nbsp;&nbsp;<button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal white-on-hover" data-PathoIndividualID="'+json[i].patientID+'"  data-RegistrationID="' +json[i].RegistrationID + '" title="Generate Invoice" ><i class=" fa-stack "><i class=" fa fa-sticky-note fa-stack-2x"></i>							<i class=" fal fa-bars fa-stack-1x"></i></i> </button></td>');/* &nbsp&nbsp&nbsp'+ show+' */

            tr.append("<td><input class='form-control mar-l-15' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"' data-patientID_send='"+json[i].patientID+"'></td>");
            tr.append("<td>" + json[i].UHID + "</td>");
            tr.append("<td hidden>" + json[i].isUHID + "</td>");
            tr.append("<td>"+ date + "</td>");
            tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
            tr.append("<td>" + json[i].Age + "</td>");
            tr.append("<td>"+ json[i].Gender +"</td>");
            tr.append("<td>" + date  +"</td>");
            tr.append("<td>"+ " " +"</td>");
            tr.append("<td>"+ " " +"</td>");
            tr.append("<td>"+" " +"</td>");
            tr.append("<td>" +json[i].remark + "</td>");
						tr.append("<td>" + charges + "</td>");
						tr.append('<td class=""><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" title="Enter patient case form"  data-uid=' + json[i].patientID + '><i class="fa fa-sign-in" aria-hidden="true"></i></button>&nbsp;&nbsp;<button type="button" onclick="generate_reciept(this)" class="btn btn-outline-teal white-on-hover" data-PathoIndividualID="'+json[i].patientID+'"  data-RegistrationID="' +json[i].RegistrationID + '" title="Generate Invoice" ><i class=" fa-stack "><i class=" fa fa-sticky-note fa-stack-2x"></i><i class=" fal fa-bars fa-stack-1x"></i></i> </button></td>');

        		$('table').append(tr);
					}


          $('#myTable thead th').each( function () {
            debugger;
  			        var title = $(this).text();
  			        if(title == 'isUHID')
  			        $(this).html( '<input type="text" id="isUHID_1_1" value = "" placeholder="Search '+title+'" />' );
  			    } );


			 var my_table_active = $(myTable).DataTable({
			 "order": [[2, "desc" ]],
			"dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
			 "buttons": [
				/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
				],
			 "language": {
								searchPlaceholder: "Search records",search:""
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

    $('#isUHID_1_1').val(1);
     $("#isUHID_1_1").keyup();

       $( "#filter_record_ipd").change(function() {
         //alert("Swati");
         debugger;
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
	window.location="./registered_patient_all.php?ID="+pat_type+"";
});

$('#myTable').delegate('tr td:first-child', 'click', function(event) {
	event.stopPropagation();
});

function clickedbutton(button){
	var ID= button.getAttribute("data-uid");
	//var ID="12";
	//alert(ID);
	window.location="./OPD_patient_detail_printable.php?ID="+ID;
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
				$.ajax({
					   type: "GET",
					   url: '<?php echo BASE_URL;?>get_if_any_patients_ipd_active.php',//from global_variable
					   data: {id: radioValue}, // serializes the form's elements. */
					   success: function(data)
					   {
							console.log(data);
							if(data=="0"){
								window.location.href="<?php echo BASE_URL;?>addpatient_opd_from_new.php?ID="+radioValue+"";
								}else{
									swalError("Patient already Exists in IPD, discharge to add new");
								}
					 }
				});
				//window.location.href="./addpatient_opd_from_new.php?ID="+radioValue+"";
			 }
			}
		});

		$("#ipd").on('click',function(){if (!$("input[name='selection']:checked").val()){
				 swalInfo("Select a patient first to add to IPD!!","No patient selected");
		}else{
			var radioValue = $("input[name='selection']:checked").val();
            var radioPat_id = $("input[name='selection']:checked").attr("data-patientID_send");
            if(radioValue){
				$.ajax({
						   type: "GET",
						   url: '<?php echo BASE_URL;?>get_if_any_patients_ipd_active.php',//from global_variable
						   data: {id: radioValue}, // serializes the form's elements. */
						   success: function(data)
						   {
								console.log(data);
								if(data=="0"){
									window.location.href="/addpatient_ipd_from_new.php?ID="+radioValue+"";
									}else{
									swalError("Patient already Exists in IPD.");
								}
						   }
					});
				//window.location.href="./addpatient_ipd_from_new.php?ID="+radioValue+"&pat_id="+radioPat_id;
			 }}});

		$("#radio").on('click',function(){if (!$("input[name='selection']:checked").val()){
				 swalInfo("Select a patient first to add to Radiology!!","No patient selected");
		}else{}});

		 $("#patho").on('click',function(){
			  //alert("Select a patient !!");
			 if (!$("input[name='selection']:checked").val()){
				 swalWarning("Select a patient first to add to Pathology!!","No patient selected");
			 }else{
            var radioValue = $("input[name='selection']:checked").val();
             var radioPat_id = $("input[name='selection']:checked").attr("data-patientID_send");
            if(radioValue){
				window.location.href="./addpatient_pathology_from_new.php?ID="+radioValue+"&pat_id="+radioPat_id;
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

function goBack() {
    window.history.back()
}
</script>
<?php
$pageTitle = "OPD patient's list HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
