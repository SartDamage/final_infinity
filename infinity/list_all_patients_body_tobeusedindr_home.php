<style>
.custom_badge {
    right: -9%!important;top: -10%!important;position: absolute!important;
}
#loading img{
/* 	width: -webkit-fill-available;
    height: -webkit-fill-available;
    width: 100%;
    height: 100%; */
}
#loading{height: 100%;top: 0;bottom: 0;left: 0;right: 0;display: flex;justify-content: center;align-items: center;background-color: #ADD8E6;animation-name: color;animation-duration: 1s;animation-iteration-count: infinite;
}
/* @keyframes color {
	0%{background-color: #031944;}
	16%{background-color: #1350a8;}
	33%{background-color: #031944;}
	49%{background-color: #031944;}
	67%{background-color: #1350a8;}
	83%{background-color: #031944;}
	100%{background-color: #031944;}
} */
@keyframes color {
  0% {background-color: #ADD8E6;}
  50% {background-color: #ADD8E6;}
  100% {background-color: #ADD8E6;}
}
.flesh_color{color:#ffd0b6;}
.life_jacket{color:#FF7900;}
</style>
<body style="background-color:#E0F2F1;">

	<div id="main">
	<div id="loading" >
		<!--<i class="fal fa-ambulance fa-6x" style="color:blue" ></i>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<!--<i class="fal fa-stethoscope fa-6x" style="color:black" ></i>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<!--<i class="fal fa-band-aid fa-6x  flesh_color"></i>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<i class="fas fa-plus fa-6x fa-spin" style="color:red"></i>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<!--<i class="far fa-x-ray fa-6x " style="color:gery"></i>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<!--<i class="far fa-pills fa-6x " style="color:blue"></i>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<!--<i class="far fa-syringe fa-6x " style="color:grey"></i>
		<!--<center><image src="/img/ld_animated.gif"></center>-->
		<!--<center><image src="/img/medical_app.gif"></center>-->
	</div>
		<?php include $_SERVER['DOCUMENT_ROOT']."/nav_bartop.php";?>
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
			<!--<div class="card card-outline-info mb-3">
				<div class="card-block row justify-content-md-center">
					<div class="row justify-content-around button_notification w-50" style="width:auto">
						<div class="btn btn-info col-md-auto pill" title="Outpatient Count"><span class="custom_badge badge badge-pill badge-danger">51</span><i class="fal fa-stethoscope fa-4x "></i></div>
						<div class="btn btn-danger col-md-auto pill" title="Inpatient count"><span class="custom_badge badge badge-pill badge-primary">15</span><i class="fal fa-procedures fa-4x"></i></div>
						<div class="btn btn-success col-md-auto pill" title="Doctor count"><span class="custom_badge badge badge-pill badge-secondary">5</span><i class="fas fa-user-md fa-4x"></i></div>
					</div>
				</div>
			</div>-->
			<div class="card card-outline-info mb-3">
				<div class="card-block">
					<div class="row justify-content-md-center">
						<button type="button" class="btn btn-outline-teal" id="addpatients" >Register new patients</button>
					</div>
				</div>
			</div>
			<div class="card card-outline-info mb-3">
				<div class="card-block">
					<form role="form" action="" method="post">
						<div class="form-group">
								<h6>Click to add patient to</h6>
								<br>
								<div class="row justify-content-md-center patients_button">
									<button  type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="opd">OPD	</button>
									<button  type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="ipd">IPD	</button>
									<!--<button  type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="patho">Pathology	</button>-->
									<!--<button  type="button" class="btn btn-outline-teal mar-l-10 btn_addto" id="radio">Radiology	</button>-->
								</div>
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
							<!--<th class="no-sort"><center>Options</center></th>-->
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
					parseJsonToTable(json);
					$value=$value+10;
			 }
		});

	/////////////////////for checking IPD/OPD patient already present/////////

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
  				//window.location.href="/addpatient_opd_from_new.php?ID="+radioValue+"";
  			 }
  			}
  		});

    $("#ipd").on('click',function(){if (!$("input[name='selection']:checked").val()){
         swalInfo("Select a patient first to add to IPD!!","No patient selected");
    }else{var radioValue = $("input[name='selection']:checked").val();
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

///////////////////////////////////////////////////////////////////////////
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
			tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'" data-pat_id="'+json[i].RegistrationID+'" title="Click to view '+ json[i].FirstName +"  "+ json[i].LastName +'\'s records">');
			tr.append("<td title='select patient for creating instance' ><input class='form-control mar-l-15 radio_form' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"'></td>");
			tr.append("<td>" + date + "</td>");
			tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
			tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Age : " + json[i].Age + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div></div></td>");
			tr.append("<td>" + json[i].RegistrationID + "</td>");

			$('table').append(tr);
			/* $('#myTable').DataTable(); */
			}
			$('#myTable').DataTable({
				 "order": [[ 4, "desc" ], [ 1, 'desc' ]],
				 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv',  */'excel'/*, 'pdf'*/, 'print'
					],
				  "info":     false,
				  "autoWidth": false,
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
}
$('#addpatients').on('click', function (event) {
	window.location="/addpatientform.php";
});
$('#myTable').on('click', 'tr', function (event) {
	var pat_type = document.getElementById(this.id).getAttribute("data-pat_id");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(this.id);
	var Cells = Row.getElementsByTagName("td");

    //alert("" +Cells[1].innerText+ "'s Registration	 ID is " + pat_type + ".");
	window.location="/dr_panel/registered_patient_all_body_dr_home.php?ID="+pat_type+"";
});
// function clickedbutton(button){

		// var ID= button.getAttribute("data-uid");
		// var ID="12";
		// alert(ID);
		// window.location="/update_patient_form.php?ID="+ID+"";
		// /* for bubble propogation */
		// if (!e) var e = window.event;
		// e.cancelBubble = true;
		// if (e.stopPropagation) e.stopPropagation();
		// /* end stopping bubble propogation */
// }
	/* search function*/
</script>
<?php
$pageTitle = "List of all registered patient's"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";?>
