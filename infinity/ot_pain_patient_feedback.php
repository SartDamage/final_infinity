<?php
include  $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include  $_SERVER['DOCUMENT_ROOT']."/session.php";
$userDetails=$userClass->userDetails($session_id);
?>

<?php include  $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>
<style>
.table td{padding: 0.25rem;}
input:checked + .slider {
    background-color: #4caf50;
}
.slider{
	background-color: #c00;
}
.dataTables_wrapper .row{
	width:100%;
	margin-left:0px;
	margin-right:0px;
}
.pagination {
    display: -webkit-inline-box;
}
.table td, .table th{vertical-align: middle;}
.row .dataTables_length{
	    float: left;
}
</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<div id="main" class="main">
<?php include $_SERVER['DOCUMENT_ROOT']."/nav_bartop.php";?>
	<div class="container" id="test-form-container" style="padding-left:50px;margin-top:15px;">
		<div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 1rem!important;">
			<div class="card-block heading_bar" id="header">
				<h5><!--title--></h5>
			</div>
			<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		</div>
		<div class="card card-outline-info mb-3" id="updateFeedback">
			<div class="card-block" id="print">
				<form class="form" id="update_ot_feedback" name="update_ot_feedback" method="post" enctype="multipart/form-data" >
					<center>
					<div class="form-group row justify-content-md-center" style="margin-top: 1rem;"><!-- dostor assigned -->
						<label for="add_surgery_name_main" id="patientNameUpdateLable" >Patient Name : </label>
						<div class="col-4">

							<input class="form-control noerror" type="text" name="patientNameUpdate" id="patientNameUpdate" readonly>
							<input class="form-control noerror" type="hidden" name="ot_id" id="ot_id"/>
            <input class="form-control noerror" type="hidden" name="AdminID" id="AdminID" value="<?php echo $userDetails->ID;?>">

						</div>
            <label for="feedback1" id="feedback1_label"  >Feedback I:</label>
            <div class="col-1">
              <input  class="form-control noerror" type="number" name="feedback1" id="feedback1" min="0" max="10">


            </div>
            <label for="feedback2" id="feedback2_label" >Feedback II:</label>
            <div class="col-1">
              <input class="form-control noerror" type="number" name="feedback2" id="feedback2" min="0" max="10">


            </div>
            <label for="feedback3" id="feedback3_label" >Feedback III:</label>
            <div class="col-1">
              <input class="form-control noerror" type="number" name="feedback3" id="feedback3" min="0" max="10">


            </div>
						<!--<div class="col-2">
							<input class="form-control noerror" type="text" placeholder="Bed Count" name="ctl00_bed_count" id="add_ward_bed_count">
						</div>-->

					</div>
          <br>
          <br>
          <div class="col-2">

          	<input class="form-control btn btn-outline-danger" type="submit" title="update feedback " name="update_feedback_main" id="update_feedback_main" value="Update">
          </div>
					</center>
				</form>
			</div>
		</div>
		<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">

					</table>
			  </div>
		</div>
	</div>
    </div>

<script>
  //hide the update bolck
 $("#updateFeedback").hide();

 $( "#update_ot_feedback" ).on("submit",function(event) {
   event.preventDefault();
   var formData = new FormData(this);
   console.log("Form data is : "+$(this).serialize());
   var get_url=$(this).serialize();
     var url = "<?php echo BASE_URL;?>set_all_ot_feedback_update.php";

       $.ajax({
            type: "POST",
            url: url,
            data: formData, // serializes the form's elements.
            success: function(data)
            {

              console.log("data add test :: "+data);
              if(data==1){
             swalSuccess("Update Successfull.");
             setTimeout(function(){ location.reload();}, 1000);
              }else if(data!=1){
                swalError("Error Occured!");
              }

            },
            error: function (request, status, error) {
             swalError(request.responseText);
           },
            cache: false,
            contentType: false,
            processData: false
          });


 });

$.ajax({
	   type: "POST",
	   url: "/get_ot_pain_patient_feedback.php",//from global_variable // serializes the form's elements. */
	   success: function(data)
	   {
			var json = JSON.parse(data);
				console.log(json);
			parseJsonToTable(json);
	   }
});


function parseJsonToTable(json){
	trbl=$('<thead class="thead-teal"><tr class="head_row "><th >Sr. No.&nbsp;&nbsp;&nbsp;</th><th>Patient Name</th><th>Feedback I</th><th>Feedback II</th><th>Feedback III</th><th><center>Update</center></t</tr></thead><tbody>');
	$('table').append(trbl);
		 for (var i = 0; i < json.length; i++) {
			var charges="";
			var SrNo=i+1;
      var feedback1 = json[i].feedback1;
      var feedback2 = json[i].feedback2;
      var feedback3 = json[i].feedback3;

  if(feedback1 =='' || feedback1 == null){
    feedback1="N.A";
    }
    if(feedback2 =='' || feedback2 == null){
      feedback2="N.A";
    }
    if(feedback3 =='' || feedback3 == null){
      feedback3="N.A";
      }

  var feedback1_emoti='';
  var feedback2_emoti='';
  var feedback3_emoti='';

//for smily in feedback1
  if(feedback1 == '1' || feedback1 == '2'||feedback1 == '3' ){
    feedback1_emoti = '😐';
  }

  if(feedback1 == '4' || feedback1 == '5'||feedback1 == '6' ){
    feedback1_emoti = '😄';
  }
  if(feedback1 == '7' || feedback1 == '8'||feedback1 == '9' ){
    feedback1_emoti = '😀';
  }
  if(feedback1 == '10' ){
    feedback1_emoti = '😍';
  }

  //for smily in feedback2
    if(feedback2 == '1' || feedback2 == '2'||feedback2 == '3' ){
      feedback2_emoti = '😐';
    }

    if(feedback2 == '4' || feedback2 == '5'||feedback2 == '6' ){
      feedback2_emoti = '😄';
    }
    if(feedback2 == '7' || feedback2 == '8'||feedback2 == '9' ){
      feedback2_emoti = '😀';
    }
    if(feedback2 == '10' ){
      feedback2_emoti = '😍';
    }
    //for smily in feedback3
      if(feedback3 == '1' || feedback3 == '2'||feedback3 == '3' ){
        feedback3_emoti = '😐';
      }

      if(feedback3 == '4' || feedback3 == '5'||feedback3 == '6' ){
        feedback3_emoti = '😄';
      }
      if(feedback3 == '7' || feedback3 == '8'||feedback3 == '9' ){
        feedback3_emoti = '😀';
      }
      if(feedback3 == '10' ){
        feedback3_emoti = '😍';
      }



			tr=$(`<tr class="tbl_row" id="${json[i].ID}">`);
			tr.append("<td>&nbsp;&nbsp;&nbsp;" + SrNo + "</td>");
			tr.append("<td>" + json[i].patientName+ "</td>");
			/* tr.append("<td>&nbsp;&nbsp;&nbsp;" + json[i].bed_count+ "</td>");
			tr.append("<td>&nbsp;&nbsp;&nbsp;" + bed_available+ "</td>"); */
			tr.append("<td>" + feedback1 + feedback1_emoti + "</td>");
			tr.append("<td>" + feedback2 + feedback2_emoti +"</td>");
      	tr.append("<td>" + feedback3 + feedback3_emoti +"</td>");
			tr.append('<td class=""><center><button type="button"  onclick="clickedupdate(this)"data-feedback1="'+ feedback1 +'" data-feedback2="'+ feedback2 +'" data-feedback3="'+ feedback3 +'" data-ot_id="'+ json[i].ot_id + '" data-patientName="'+ json[i].patientName +'" data-ot_id="'+json[i].ot_id +'" class="btn btn-outline-info" title="Update entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
			$('table').append(tr);

			}
		table_list = $('#myTable').DataTable({
				 "order": [[ 0, "asc" ]],
				  "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv', */ 'excel',/* 'pdf'*/, 'print'
					],
				"info":     false,
				"language": {
				searchPlaceholder: "Search records",
				search:""
				},
				"oLanguage": {
				"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
				},
				  "autoWidth": false,
				  /* "aoColumns": [null,null,null,{ "bSortable": false },{ "bSortable": false },], */
				  "columnDefs": [ {
									  "targets"  : 'no-sort',
									  "orderable": false,
									}],
				  "pagingType":"simple_numbers",
				  "lengthMenu": [[10, 15, 20, 25, 50, -1], [10, 15, 20, 25, 50, "All"]]
			});
			$('div.dataTables_filter input').focus();
}





function clickedupdate(e){

    $('html, body').animate({
      scrollTop: $("div.main").offset().top
    }, 500)

   $("#updateFeedback").show();

		var ot_id = e.getAttribute("data-ot_id");
    var patientName = e.getAttribute("data-patientName");
    var feedback1 = e.getAttribute("data-feedback1");
    var feedback2 = e.getAttribute("data-feedback2");
    var feedback3 = e.getAttribute("data-feedback3");
    var ot_id = e.getAttribute("data-ot_id");
		//var ID="12";
		$('#update_surgery').prop('disabled', false);

    document.getElementById("patientNameUpdate").value = patientName;
    document.getElementById("feedback1").value = feedback1;
    document.getElementById("feedback2").value = feedback2;
    document.getElementById("feedback3").value = feedback3;
    document.getElementById("ot_id").value = ot_id;

		/* for bubble propogation */
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
		/* end stopping bubble propogation */
}

// setSelectValue (id, val) {}is in footer
</script>
<?php
$pageTitle = "Pain Assessment and Management"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";?>
