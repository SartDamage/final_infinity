<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* $db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//echo $json;
$db=null; */
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>

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


</style>
<?php// include 'nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>

<body style="background-color:#E0F2F1;">
	<div id="main">
		<?php include 'nav_bartop.php';?>
		<div class="container">
		<br>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5><!--title--></h5>
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
			  </div>
			</div>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<div class="container">
					<div class="row justify-content-md-center">
						<div class="row">
                                <div class="col-1"></div>
                                <div class="col-1">
                                  <label for="from_date" id="date_label" class="col-form-label"><b>From:</b></label>
                                </div>
                                    <div id="from_date" class="col-3 input-group date">
                                    <input class="" type="text" id="from_date" name="from_date" oninput="myFunction()" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>


                                <div class="col-2"></div>
                                <div class="col-1">
                                    <label for="to_date" id="date_label" class="col-form-label"><b>To:</b></label>
                                </div>

                                <div id="to_date" class="col-3 input-group date">
                                    <input class="" type="text" id="to_date" name="to_date" oninput="myFunction()" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>

                            </div>
					</div>
				</div>
			  </div>
			</div>

			<div class="card card-outline-info mb-3" id="update_block" >
			<div class="card-block" id="print">
				<form class="form" id="update_ot_details" name="update_ot_details" action="" method="post" enctype="multipart/form-data" >
					<center>
					<div class="form-group row justify-content-md-center" style="margin-top: 1rem;">
          <input class="form-control noerror" type="hidden" name="pid" id="pid">
					<div class="col-md-5"><label> Patient Name: <b><span id="name_of_brand"><label id=pname></label></span></b></label></div>
					<div class="col-md-5"><label> Surgery Name: <b><span  id="Name_of_model"></span><lable id=sname></lable></b></label></div>
					</div>
					<div class="form-group row justify-content-md-center" style="margin-top: 1rem;"><!-- dostor assigned -->
						<label for="add_stock_type_main" id="add_ward_form_label" class="col-2 col-form-label">Type of Anaesthesia : </label>
						<div class="col-md-2">
							<!--<input class="form-control noerror" type="text" placeholder="Ward Name" name="ctl00_ward_name" id="add_stock_type_main">-->
							<select class="form-control" name="anaesthesia_type" id="anaesthesia_type">
                <option value="" id="anaesthesia_type_D"></option>
    							<option value="GA">GA</option>
								  <option value="SA">SA</option>
								  <option value="LA">LA</option>
								  <option value="EA">EA</option>
							</select>
							<input class="form-control noerror" type="hidden" name="add_stock_type_AdminID" id="add_stock_type_AdminID" value="<?php echo $userDetails->ID;?>">
							<input class="form-control noerror"  placeholder="Type name" name="add_type_ID" id="add_type_ID" value="" hidden>
						</div>
						<label for="add_stock_type_main" id="add_ward_form_label" class="col-2 col-form-label">Duration of Surgery : </label>
						<div class="col-md-3" >
							<div class="row">
							<div class="col-6">

						 <input class="" type="text" id="start_date" name="start_date" oninput="myFunction();"/>

							<!--<input class="form-control noerror" type="text" placeholder="Current Quantity" name="add_quantity_upd" id="add_quantity_upd" readonly>-->
						</div>
						<div class="col-6">
						 <input class="" type="time" id="star_time" name="star_time"/>

							<!--<input class="form-control noerror" type="text" placeholder="Current Quantity" name="add_quantity_upd" id="add_quantity_upd" readonly>-->
						</div>
						</div>
						</div>



						<div class="col-md-3" >
							<div class="row">
							<div class="col-6">
						 <input class="" type="text" id="end_date" name="end_date"/>

						<!--<input class="form-control noerror" type="text" placeholder="New stock" name="add_new_quan" id="add_new_quan">-->
						</div>
						<div class="col-6">
						 <input class="" type="time" id="end_time" name="end_time"/>

							<!--<input class="form-control noerror" type="text" placeholder="Current Quantity" name="add_quantity_upd" id="add_quantity_upd" readonly>-->
						</div>
						</div>
						</div>

						</div>

						<div class="form-group row justify-content-md-center" style="margin-top: 1rem;">
							<label for="add_stock_type_main" id="add_ward_form_label" class="col-2 col-form-label">Material of H.P.E. : </label>
						<div class="col-md-2">
							<!--<input class="form-control noerror" type="text" placeholder="Ward Name" name="ctl00_ward_name" id="add_stock_type_main">-->
							<select class="form-control" name="material_of_hpe" id="material_of_hpe">
                  <option id="material_of_hpe_D"></option>
								  <option value="Yes">Yes</option>
								  <option value="NO">No</option>
							</select>
							<input class="form-control noerror" type="hidden" name="add_stock_type_AdminID" id="add_stock_type_AdminID" value="<?php echo $userDetails->ID;?>">
							<input class="form-control noerror"  placeholder="Type name" name="add_type_ID" id="add_type_ID" value="" hidden>
						</div>

							<label for="add_stock_type_main" id="add_ward_form_label" class="col-1 col-form-label">Remark : </label>
						<div class="col-md-3">
							<!--<input class="form-control noerror" type="text" placeholder="Ward Name" name="ctl00_ward_name" id="add_stock_type_main">-->
							<input class="form-control noerror" type="text" name="remarkID" id="remarkID">
							<input class="form-control noerror" type="hidden" name="add_stock_type_AdminID" id="add_stock_type_AdminID" value="<?php echo $userDetails->ID;?>">
							<input class="form-control noerror"  placeholder="Type name" name="add_type_ID" id="add_type_ID" value="" hidden>
						</div>

						<label for="add_stock_type_main" id="add_ward_form_label" class="col-1 col-form-label">Diagnosis : </label>
						<div class="col-md-3">
							<!--<input class="form-control noerror" type="text" placeholder="Ward Name" name="ctl00_ward_name" id="add_stock_type_main">-->
							<input class="form-control noerror" type="text" name="final_diagnosis" id="final_diagnosis">
							<input class="form-control noerror" type="hidden"  name="add_stock_type_AdminID" id="add_stock_type_AdminID" value="<?php echo $userDetails->ID;?>">
							<input class="form-control noerror"  placeholder="Final Diagnosis" name="add_type_ID" id="add_type_ID" value="" hidden>
						</div>



						</div>

					<div class="form-group row justify-content-md-center" style="margin-top: 1rem;">
						<div class="col-md-2">

							<div class="form-group row justify-content-md-center" style="margin-bottom:0">

								<div class="col-md">
									<input class="form-control btn btn-outline-danger" type="Submit" title="update" placeholder="submit" name="update_type" id="update_type" value="Update">
								</div>
							</div>
						</div>


					</div>
					</center>
				</form>
			</div>
		</div>

			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <table class="table table-striped table-hover display nowrap" id="myTable" style="width:100%">
					<thead class="thead-teal">

						<tr class="head_row">
              <th rowspan="2"  style="border:1px solid white">Sr.NO</th>
							<th rowspan="2"  style="border:1px solid white">OT ID</th>
							<th rowspan="2"  style="border:1px solid white">Date</th>
              <th rowspan="2"  style="border:1px solid white">Name</th>
              <th rowspan="2"  style="border:1px solid white">Age</th>
              <th rowspan="2"  style="border:1px solid white">Gender</th>
              <th colspan="2" style="border:1px solid white">Signature</th>
              <th colspan="3"  style="border:1px solid white">Anathesia</th>
              <th rowspan="2" style="border:1px solid white">Performed at</th>
							<th rowspan="2" style="border:1px solid white">Antibiotic Prophylaxis given</th>
							<th rowspan="2" style="border:1px solid white" >Remark</th>
							<th rowspan="2" style="border:1px solid white">Action</th>
						</tr>
            <tr>
              <th  style="border:1px solid white">Anaesthetics</th>
              <th  style="border:1px solid white" >Surgeon</th>
              <th  style="border:1px solid white">Planned</th>
              <th  style="border:1px solid white">Actual</th>
              <th  style="border:1px solid white">performed</th>

            </tr>
						</thead>
						<tbody>
						</tbody>
					</table>
			  </div>
		</div>
	</div>


<script>
var t='';
 $(".from_date").datepicker({
        format: "dd MM yyyy - hh:ii"
    });

	 $(document).ready(function(){
      var date_input=$('input[name="from_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);

      var date_input=$('input[name="to_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };

      date_input.datepicker(options);
      var date_input=$('input[name="start_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
      var date_input=$('input[name="end_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })


$(document).ready(function() {
    $("#update_block").hide();
});

//update ajax Call

$( "#update_ot_details" ).on( "submit", function( event ) {

	event.preventDefault();// avoid to execute the actual submit of the form.
	//$('#update_type').prop('disabled', true);
	var formData = $( "form" ).serialize();
	console.log(formData);
    var url = "set_list_all_update_ot.php"; // the script where you handle the form input.
			$.ajax({

				   type: "POST",
				   url: url,
				   data: formData, // serializes the form's elements.
				   success: function(data)
				   {
					   console.log("data add test :: "+data);
					   if(data==1){
						swalSuccess("Record Updated success");
           setTimeout(function(){location.reload();},2000);
					   }else{
						   swalError("Record NOt updated");
					   }


					  //location.href = "./manage_accounts.php"
				   },
				   error: function (request, status, error) {
						swalError(request.responseText);
					},

				 });
});


$.fn.dataTable.moment( 'DD-MM-YYYY' );
$.fn.dataTable.moment( 'dddd, MMMM Do, YYYY' );


var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
		// the script where you handle the form input.
		$.ajax({
			   type: "POST",
			   url: "get_list_all_ot.php",//from global_variable
			   data: {uid:"2"}, //serializes the form's elements.
			   success: function(data)
			   {
					var json = JSON.parse(data);
				  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
				  //location.href = "./home.php"
						console.log(json);
					parseJsonToTable(json);
			 }
},true);

function parseJsonToTable(json)
{
	 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
		 var iconfal="";
	 if(json[i].type==="Capsule")
            {
                var iconfal="<i class='fas fa-capsules'></i>";
            }else if ( json[i].type==="Tablet"){
                var iconfal="<i class='fas fa-tablets'></i>";
            }else{
                var iconfal="<i class='fas fa-prescription-bottle'></i>";
            }

            var endtime=json[i].EndTime;

         if( endtime != "" && endtime !="null" && endtime != null){
             color_row = "";
         }else if(endtime=="null"){
             color_row="style='background-color: #ff7d7d7a;'";
         }else{
             color_row="style='background-color: #ff7d7d7a;'";
         }
					var date=((json[i].admit_date_time).split(" ")[0]).split("-").reverse().join("-");;
					//var date = date.substring(0,11);
					//var date= date.split("-").reverse().join("-");
					//var dob = json[i].dob;
					//var dob = date.substring(0,11);
					//var name= json[i].firstname + "  " + json[i].lastname;
					tr = $('<tr class="tbl_row" id="'+json[i].type+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].type+'" '+color_row+' >');
          tr.append("<td>" +  + "</td>");
          tr.append("<td>" + json[i].ot_id + "</td>");
					tr.append("<td>" + date + "</td>");
          tr.append("<td>" + json[i].patientFirstName + ' '+ json[i].patientLastName +"</td>");
          tr.append("<td>" + json[i].Age + " </td>");
          tr.append("<td>" + json[i].gender+ "</td>");
          tr.append("<td>" + json[i].anaesthetist + " </td>");
          tr.append("<td>" + json[i].operatingSurgeon + " </td>");
          tr.append("<td>" +   + " </td>");
          tr.append("<td>" + json[i].typeOfAnaesthesia+ " </td>");
          tr.append("<td>" + json[i].typeOfAnaesthesia+ " </td>");
          tr.append("<td>" + json[i].typeOfAnaesthesia+ " </td>");
          tr.append("<td>" + json[i].typeOfAnaesthesia+ " </td>");

					tr.append("<td>" + json[i].remark + " </td>");
					tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="Update entry" style="width:100px"  data-pid="' + json[i].pID + '" data-pNmae="' + json[i].patientFirstName + ' '+ json[i].patientLastName +'" data-sName="'+ json[i].surgeryName +'" data-TAnaesthesia="' + json[i].typeOfAnaesthesia+'" data-sdate="'+ json[i].startDate +'" data-stime="'+ json[i].StartTime +'" data-edate="'+
          json[i].endDate +'" data-etime="'+ json[i].EndTime +'" data-material="'+ json[i].materialOfHpe +'" data-remark="'+ json[i].remark +'" data-Diagnosis="'+ json[i].finalDiagnosis +'"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button>');
					$('table').append(tr);
				}
				t =$('#myTable').DataTable({

					 "scrollX": true,
					"scrollCollapse": true,
					 "order": [[ 2, "desc" ]],
					 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
					  "buttons": [
						/* 'csv','csv', */ 'excel', /*'pdf'*/, 'print'
						],
					  "info":     false,
					  "language": {
								searchPlaceholder: "Search records"
							},
						"oLanguage": {
								"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
								},
					  /* "autoWidth": true, */
					   /* "columnDefs": [{ "width": "15%", "targets": 0 },{ "width": "5%", "targets": 1 },{ "width": "5%", "targets": 2 },{ "width": "5%", "targets": 3 },], */
					  "columnDefs": [ {
								  "targets"  : 'no-sort',
								  "orderable": false,
                },
      					{ "width": "25%", "targets": 0 },
      					],
            "fixedColumns": true,
					  /* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
						"pagingType":"simple_numbers",
						 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
				});
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
               cell.innerHTML = i+1;
            } );
            } ).draw();
				$('div.dataTables_filter input').focus();
}

	/****************************************************************/

});
/*********************/

/**********************/


function clickedupdate(e){
	$(document).ready(function() {
    $("#update_block").show();
});
   debugger;
		var pID = e.getAttribute("data-pid");
    var pname= e.getAttribute("data-pNmae");
    var sname= e.getAttribute("data-sName");
    var TAnaesthesia= e.getAttribute("data-TAnaesthesia");
    var startDate= e.getAttribute("data-sdate");
    var starTime= e.getAttribute("data-stime");
    var endDate= e.getAttribute("data-edate");
    var endTime= e.getAttribute("data-etime");
    var material= e.getAttribute("data-material");
    var remark= e.getAttribute("data-remark");
    var Diagnosis= e.getAttribute("data-Diagnosis");

		document.getElementById("pid").value =pID;
    document.getElementById("pname").innerHTML =pname;
    document.getElementById("sname").innerHTML =sname;
    document.getElementById("anaesthesia_type_D").innerHTML =TAnaesthesia;
    document.getElementById("start_date").value =startDate;
    document.getElementById("star_time").value =starTime;
    document.getElementById("end_date").value =endDate;
    document.getElementById("end_time").value =endTime;
    document.getElementById("material_of_hpe_D").innerHTML =material;
    document.getElementById("remarkId").value =remark;
    document.getElementById("final_diagnosis").value =Diagnosis;



		$('#update_type').prop('disabled', false);
		//var ID="12";
		//alert(ID);

		/* for bubble propogation */
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
		/* end stopping bubble propogation */
}

</script>
<?php
$pageTitle = "List of all OT Registrations"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
