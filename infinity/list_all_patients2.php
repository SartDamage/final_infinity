<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$db = getDB();

?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>
  <link href="/dist/css/style_list_all_patients.css" rel="stylesheet">
<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<body style="background-color:#E0F2F1;">
	<div id="main">
		<?php include  $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>

    <body style="background-color:#E0F2F1;">

    		<?php //include $_SERVER['DOCUMENT_ROOT']."/nav_bartop.php";?>
    		<?php// include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
    		<div class="container">
    		<br>
    			<div class="card card-outline-info mb-3">
    			  <div class="card-block heading_bar">
    				<h5><!--List of all Patients--> <!--title--></h5>
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
                                         <div id="from_date_1" class="col-3 input-group date">
                                         <input class="" type="text" id="from_date" name="from_date" oninput="myFunction()" />
                                         <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                     </div>


                                     <div class="col-2"></div>
                                     <div class="col-1">
                                         <label for="to_date" id="date_label1" class="col-form-label"><b>To:</b></label>
                                     </div>

                                     <div id="to_date_1" class="col-3 input-group date">
                                         <input class="" type="text" id="to_date" name="to_date" oninput="myFunction()" />
                                         <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                     </div>

                                 </div>
               </div>
             </div>
             </div>
           </div>
    			<div class="card card-outline-info mb-3">
    				<div class="card-block">
    					<form role="form" action="" method="post"><br>
    						<div class="form-group">
    							<fieldset  class="fieldset">
          <legend style="color:blue;font-weight:bold;font-size: 12px;">Click to add patient to</legend>

    								<br>
    								<div class="row justify-content-md-center patients_button">
    									<button  href="javascript:void(0)" type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="opd">OPD	</button>
    									<button  href="javascript:void(0)" type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="ipd">IPD	</button>
    									<!--<button  href="javascript:void(0)" type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="patho">Pathology	</button>-->
    									<!--<button  href="javascript:void(0)" type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="radio">Radiology	</button>-->
    								</div>
    								 </fieldset>
    						</div>



    					</form>
    					<div id="filter-records"></div>
    				</div>
    			</div>
    			<div class="card card-outline-info mb-3 margin_bot_8">
    			  <div class="card-block">
    			  <form name="selected_patient" id="selected_patient">
    			  <table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
    					<thead class="thead-teal">
    						<tr class="head_row">
    							<th class="no-sort">Select&nbsp;</th>
    							<th>Registration date</th>
    							<th>Name&nbsp;</th>
    							<th class="no-sort">Details</th>
    							<!--<th>Email</th>-->
    							<th>Registration ID&nbsp;</th>
    							<th class="no-sort"><center>Options</center></th>
    						</tr>
    						</thead>
    						<tbody>
    						</tbody>
    					</table>
    					</form>
    			  </div>
    		</div>
    	</div>


<script>

//////////////date wise  datatable ini /////////////////////
$.fn.dataTable.moment( 'DD -MM-YYYY' );
$.fn.dataTable.moment( 'dddd, MMMM Do, YYYY' );

//////////////////////////////////////////
///////ajax call for data sort form and to///////////////////////////////

function ajaxcall(from_date,to_date){
//var url="getter/get_dates.php";
//to_date="test";
debugger;
var url="<?php echo BASE_URL;?>get_all_patients.php";
$.ajax({  url: url,
          data: {'from_date':from_date,'to_date':to_date},
          type: 'POST',
          dataType:'json',
          success: function(output) {
                    if ( $.fn.DataTable.isDataTable('#myTable') ) {
                      $('#myTable').DataTable().destroy();
                    }

                    $('#myTable tbody').empty();
                    parseJsonToTable(output);

               },
  error: function(request, status, error){
    console.log(error);
  }


});
}
//////////////////////////////////////////

$("#to_date").on("change",function(){
 debugger;
  var to_date = document.getElementById("to_date").value;
  var from_date = document.getElementById("from_date").value;
 //var from_date = $("#from_date").datepicker('getDate');
//  $.datepicker.formatDate('yy-mm-dd', from_date);
 //var to_date = $("#to_date").datepicker('getDate');
 //$.datepicker.formatDate('yy-mm-dd', to_date);

   //from_date += " 00:00:00.000";
   if(to_date=="")
   {
   //  to_date += " 23:59:59.997";
   }
   console.log(from_date);
     ajaxcall(from_date,to_date);


});


$("#from_date").on("change",function(){
 //debugger;
  var to_date = document.getElementById("to_date").value;
  var from_date = document.getElementById("from_date").value;
 //var from_date = $("#from_date").datepicker('getDate');
 //$.datepicker.formatDate('yy-mm-dd', from_date);
 //var to_date = $("#to_date").datepicker('getDate');
 //$.datepicker.formatDate('yy-mm-dd', to_date);
   //from_date += " 00:00:00.000";
   if(to_date=="")
   {
   //  to_date += " 23:59:59.997";
   }
   console.log(from_date);
     ajaxcall(from_date,to_date);


});


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

    var $value=0;
window.addEventListener('DOMContentLoaded', function() {
      console.log('window - DOMContentLoaded - capture'); // 1st
      $.ajax({
    			   type: "POST",
    			   url: <?php echo $url_get_all_patients; ?>,//from global_variable
    			   data: {start: $value}, // serializes the form's elements. */
    			   success: function(data)
    			   {
    					var json = JSON.parse(data);
    				  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
    				  //location.href = "./home.php"
    						//var json = data;
    						console.log(json);
    					parseJsonToTable(json);
    					$value=$value+10;
    			 }
    		});

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

    				 }
    				}
    		});

$("#ipd").on('click',function(){if (!$("input[name='selection']:checked").val()){
    				 swalInfo("Select a patient first to add to IPD!!","No patient selected");
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
    									window.location.href="/addpatient_ipd_from_new.php?ID="+radioValue+"";
    									}else{
    									swalError("Patient already Exists in IPD.");
    								}
    						   }
    					});
    				}
    		}
    		});

    		$("#radio").on('click',function(){if (!$("input[name='selection']:checked").val()){
    				 swalInfo("Select a patient first to add to Radiology!!","No patient selected");
    		}else{}});

    		 $("#patho").on('click',function(){
    			  //alert("Select a patient !!");
    			 if (!$("input[name='selection']:checked").val()){
    				 swalInfo("Select a patient first to add to Pathology!!","No patient selected");
    			 }else{
                var radioValue = $("input[name='selection']:checked").val();
                if(radioValue){
    				window.location.href="/addpatient_pathology_from_new.php?ID="+radioValue+"";
    			 }
    			 }
            });
    }, true);

    $('#myTable').delegate('tr td:first-child', 'click', function(event) {
    	event.stopPropagation();
    });

function parseJsonToTable(json){
    	for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
    			if(json[i].PreFix=="OPD")
    			{var show= "IPD"}
    			else if(json[i].PreFix=="IPD"){ var show="OPD"}
    			else{var show="IPD/OPD"}
    			var date = json[i].WhenEntered;
    			var date = date.substring(0,11);
    			var date= date.split("-").reverse().join("-");
    			tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'" data-pat_id="'+json[i].RegistrationID+'" data-toggle="tooltip" title="Click to view '+ json[i].FirstName +"  "+ json[i].LastName +'\'s records">');
    			tr.append("<td><input class='form-control mar-l-15 radio_form' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"'></td>");
    			tr.append("<td>" + date + "</td>");
    			tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
    			tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Age : " + json[i].Age + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div></div></td>");
    			tr.append("<td>" + json[i].RegistrationID + "</td>");
    			tr.append('<td class="table_row"><center><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" style="width:100px"  data-uid=' + json[i].RegistrationID + ' title="Edit patient details"><i class="fa fa-pencil fa-2" aria-hidden="true" ></i> &nbspEdit</button></center></td>');
    			$('table').append(tr);
    			/* $('#myTable').DataTable(); */
    			}
    			$('#myTable').DataTable({
    				 "order": [ 1, 'desc' ],
    				 "dom": "<'row'<'col-lg-2'><'col-md-7'f><'col-md-1'><'col-md-2'B>>" +"<'row'<'col-md-12'tr>>" +"<'row'<'col-md-3'l><'col-md-3'i><'col-md-6'p>>",
             "buttons": [
             //	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
                         {
                          extend: 'print',
                          exportOptions: {
                          columns: [ 1, 2, 3, 4] //Your Colume value those you want
                              }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                columns: [1, 2, 3, 4 ] //Your Colume value those you want
                            }
                          }
                         ],
    				  "info":     false,
    				  "autoWidth": true,
    				  "language": {
    									searchPlaceholder: "Search records",
    									search:""
    								},
    				  "oLanguage": {
    								"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
    								},
    				  "columnDefs": [ {
    									  "targets"  : 'no-sort',
    									  "orderable": false,
    									}],
    				  //"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,{ "bSortable": false },],
    					"pagingType":"simple_numbers",
    					 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
    			});
    			$('div.dataTables_filter input').focus();
    			$('[data-toggle="tooltip"]').tooltip();
    }

    $('#myTable').on('click', 'tr', function (event) {
    	var pat_type = document.getElementById(this.id).getAttribute("data-pat_id");
        //var pat_type = pat_id_row.getAttribute("data-pat_id");
    	var Row = document.getElementById(this.id);
    	var Cells = Row.getElementsByTagName("td");

        //alert("" +Cells[1].innerText+ "'s Registration	 ID is " + pat_type + ".");
    	window.location="/registered_patient_all.php?ID="+pat_type+"";
    });
    function clickedbutton(button){

    		var ID= button.getAttribute("data-uid");
    		//var ID="12";
    		//alert(ID);
    		window.location="/update_patient_form.php?ID="+ID+"";
    		/* for bubble propogation */
    		if (!e) var e = window.event;
    		e.cancelBubble = true;
    		if (e.stopPropagation) e.stopPropagation();
    		/* end stopping bubble propogation */
    }
    	/* search function*/
    </script>
    <?php
    $pageTitle = "List Of All Registered Patients"; // Call this in your pages' files to define the page title
    $pageContents = ob_get_contents (); // Get all the page's HTML into a string
    ob_end_clean (); // Wipe the buffer

    // Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
    echo str_replace ('<!--title-->', $pageTitle, $pageContents);
    ?>

    <?php include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";?>
