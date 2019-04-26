
<body style="/* background-color:#E0F2F1; */">
	<div id="main">
		<?php include  $_SERVER['DOCUMENT_ROOT']."/nav_bartop.php";?>
		<div class="container">

		<br>
			<!--<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>-->
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5><!--List of all Patients--> <!--title--></h5>
			  </div>
			</div>

			<div class="card card-outline-info mb-3">
				<div class="card-block">
					<div class="container">
						<div class="row justify-content-md-center patients_button">
							<a class="btn btn-outline-success mar-l-10" href="/addpatientform_pathology_parent.php">Add new patient</a>
							<!--<a class="btn btn-outline-teal mar-l-10" href="/list_all_patients_patho.php">Add from existing patient</a>-->
						</div>
					<!--<form role="form" action="" method="post">
						<div class="form-group">
								<h6>Click to add patient to</h6>
								<br>
								<div class="row justify-content-md-center patients_button">
									<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="opd">OPD	</button>
									<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="ipd">IPD	</button>
									<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="patho">Pathology	</button>
									<button  href="javascript:void(0)" type="button" class="btn btn-outline-info mar-l-10 btn_addto" id="radio">Radiology	</button>
								</div>
						</div>
					</form>-->
					</div>
					<div id="filter-records"></div>
				</div>
			</div>
			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <form name="selected_patient" id="selected_patient">
			  <table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
					<thead class="thead-teal">
						<tr class="head_row">
							<th >ID</th>
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
var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); /*1st*/
  $.ajax({
			   type: "POST",
			   url: <?php echo $url_get_all_patients; ?>,/*from global_variable*/
			   data: {start: $value}, /* serializes the form's elements. */
			   success: function(data)
			   {
					var json = JSON.parse(data);
				  /*on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
					location.href = "./home.php"
							var json = data;*/
						console.log(json);
					parseJsonToTable(json);
					$value=$value+10;
			 }
		});


		 /* $("#patho").on('click',function(){     //was used removed on recommendation of Tanuj Surve
            var radioValue = $("input[name='selection']:checked").val();
            if(radioValue){
				window.location.href="./addpatient_pathology_from_new.php?ID="+radioValue+"";
            }
        }); */
}, true);

$('#myTable').delegate('tr td:first-child', 'click', function(event) {/*to stop rowclick on first column of table*/
	event.stopPropagation();
});

function parseJsonToTable(json){
	for (var i = 0; i < json.length; i++) {
			if(json[i].PreFix=="OPD")
			{var show= "IPD"}
			else if(json[i].PreFix=="IPD"){ var show="OPD"}
			else{var show="IPD/OPD"}
			var date = json[i].WhenEntered;
			var time = date.substring(11,19);
			var date = date.substring(0,11);
			var date= date.split("-").reverse().join("-");
			tr = $('<tr class="tbl_row" id="'+json[i].RegistrationID+'" data-pat_id="'+json[i].RegistrationID+'" data-toggle="tooltip" title="Click to view '+ json[i].FirstName +"  "+ json[i].LastName +'\'s records">');
			/*tr.append("<td><input class='form-control mar-l-15 radio_form' type='radio' name='selection' id='selection_id' value='"+json[i].RegistrationID+"'></td>");*/
			tr.append("<td>"+json[i].ID+"</td><td><div class='table_div'><div class='row intable'>Date : "+ date + "</div><div class='row intable'> Time : "+ time+"</div></div></td>");
			tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
			tr.append("<td><div class='table_div'><div class='row intable'>Gender : " + json[i].Gender + "</div><div class='row intable'> Age : " + json[i].Age + "</div><div class='row intable'>Contact : " + json[i].Mobile + "</div></div></td>");
			tr.append("<td>" + json[i].RegistrationID + "</td>");
			tr.append('<td class="table_row"><center><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" style="width:100px"  data-uid=' + json[i].RegistrationID + ' title="Edit patient details"><i class="fal fa-pencil fa-2" aria-hidden="true" ></i> &nbspEdit</button></center></td>');
			$('table').append(tr);
			/* $('#myTable').DataTable(); */
			}
			var buttonCommon = {
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    /* Strip $ from salary column to make it numeric */
                    return column === 5 ?
                        data.replace( /[$,]/g, '' ) :
                        data;
                }
            }
        }
    };
			$('#myTable').DataTable({
				 "order": [[ 4, "desc" ], [ 1, 'desc' ]],
				 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
				 //	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
										 {
											extend: 'print',
											exportOptions: {
											columns: [1, 2, 3] //Your Colume value those you want
													}
												},
												{
														extend: 'excel',
														exportOptions: {
														columns: [1, 2, 3] //Your Colume value those you want
												}
											}
										 ],
				  "info":     false,
				  "autoWidth": false,
				  "language": {searchPlaceholder: "Search records",search:""},
				  "oLanguage": {"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",},
				  "columnDefs": [ {"targets"  : 'no-sort',"orderable": false,},
									 { 'sortable': true, 'searchable': false, 'visible': false, 'type': 'num', 'targets': [0] }],
				  /*"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,{ "bSortable": false },],*/
					"pagingType":"simple_numbers",
					 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
			});
			$('div.dataTables_filter input').focus();
}
$('#myTable').on('click', 'tr', function (event) {
	var pat_type = document.getElementById(this.id).getAttribute("data-pat_id");
    /*var pat_type = pat_id_row.getAttribute("data-pat_id");*/
	var Row = document.getElementById(this.id);
	var Cells = Row.getElementsByTagName("td");
	/*var radioValue = $("input[name='selection']:checked").val();*/
            if(pat_type){
				window.location.href="/addpatient_pathology_from_new.php?ID="+pat_type+"";
            }
    /*	alert("" +Cells[1].innerText+ "'s Registration	 ID is " + pat_type + ".");
		patient history on this link
		window.location="./registered_patient_all.php?ID="+pat_type+"";*/
});
function clickedbutton(button){

		var ID= button.getAttribute("data-uid");
		/*	var ID="12";
			alert(ID);*/
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
$pageTitle = "List of all registered patient's"; /*Call this in your pages' files to define the page title*/
$pageContents = ob_get_contents (); /*Get all the page's HTML into a string*/
ob_end_clean (); /*Wipe the buffer*/

/*Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML*/
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include  $_SERVER['DOCUMENT_ROOT']."/include/footer.php";?>
