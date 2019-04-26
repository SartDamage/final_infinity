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
                                    <div id="from_date_div" class="col-3 input-group date">
                                    <input class="" type="text" id="from_date" name="from_date" oninput="myFunction()" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>


                                <div class="col-2"></div>
                                <div class="col-1">
                                    <label for="to_date" id="date_label" class="col-form-label"><b>To:</b></label>
                                </div>

                                <div id="to_date_datepicker" class="col-3 input-group date">
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
           <form class="form" id="mtp_update_form" name="mtp_upadate_form" action="" method="post" enctype="multipart/form-data" >
             <a href="" onclick="goNormal()" class="float" title="Click, to go back">
               <i class="fa fa-times my-float"></i>
             </a>

               <div class="form-group row justify-content-md-center" style="margin-top: 1rem;">
                  <div class="col-md-5"><label> Patient Name: <b><span id="name_of_brand"></span></b></label><input class="form-control noerror" type="text" name="mtp_patient_name" id="mtp_patient_name" readonly/></div>
                     <div class="col-md-5"><label> Patient ID: <b><span id="name_of_brand"></span></b></label><input class="form-control noerror" type="text" name="mtpPatientID" id="mtpPatientID"readonly/></div>
               </div>




            </div>

            <div class="form-group row justify-content-md-center" style="margin-top: 1rem;">
              <label for="mtp_update_form" id="mtp_discharge_date_label" class="col-2 col-form-label">Date Of Dischage of patient</label>
                <div class="col-md-2">

                      <input class="" type="text" id="from_date_of_dischage" name="from_date"/>

              <!--<input class="form-control noerror" type="text" placeholder="Current Quantity" name="add_quantity_upd" id="add_quantity_upd" readonly>-->
                </div>

                 <label for="mtp_update_form" id="mtp_remark_label" class="col-1 col-form-label">Remark  : </label>
                       <div class="col-md-5">
              <input class="form-control noerror" type="text" name="mtp_Remark" id="mtp_remark">
              <input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
            </div>

                </div>

               <div class="form-group row justify-content-md-center" style="margin-top: 1rem;">
                     <div class="col-md-2">

                    <div class="form-group row justify-content-md-center" style="margin-bottom:0">

                       <div class="col-md">
                         <input class="form-control btn btn-outline-danger" type="Submit" title="update" placeholder="submit" name="mtp_update_type" id="mtp_update_type" value="Update">
                      </div>
                   </div>
               </div>


          </div>

        </form>
      </div>
    </div>

      <div class="card card-outline-info mb-3 margin_bot_8">
        <div class="card-block">
        <table class="table table-striped table-hover display nowrap" id="myTable" style="width:100%">
          <thead class="thead-teal">

          <tr class="head_row">
            <th class="no-sort">Sr.no</th>
            <th>Date of admission</th>
                        <th>patient name</th>
                      <th>wife/daughter of</th>
                      <th>Age</th>
                      <th>religion</th>
                      <th>Address</th>
                      <th>duration of pregnancy</th>
                      <th>reason of MTP</th>
                      <th>date of termination</th>
                      <th>date of discharge</th>
                      <th>Result and remark</th>
                      <th> opinion is formed by</th>
                      <th> pregnancy  is terminate by</th>
                      <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
    </div>
  </div>


<script>

//////////////////////////cut button in update block AJ//////
function goNormal(){
  $("#showvt_block").hide();
}

//////////////////////////////////////////////////////

////////////////////////////////////for to and from dataTables_filter

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

    var date_input=$('input[name="to_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    };
    date_input.datepicker(options);


//document.getElementById("to_date").value=moment(new Date()).format("YYYY-MM-DD");
//document.getElementById("from_date").value=moment(new Date()).format("YYYY-MM-DD");


var myDate =  moment(new Date()).format("yy-mm-dd HH:mm:ss");
console.log(myDate);
var date1 = new Date();
        date1.setHours(0,0,0,0);
var from_date = moment(date1).format("yy-mm-dd HH:mm:ss");
  //var url="getter/get_dates.php";
  //var url="<?php echo BASE_URL;?>/get_all_patients.php";;
  //$.ajax({
    //			url: url,
    //			data: {'token':1,'from_date':from_date,'to_date':myDate},
    //			type: 'POST',
    //			dataType:'json',
    //			success:function(output) {
            // if ( $.fn.DataTable.isDataTable('#myTable') ) {
            //   $('#myTable').DataTable().destroy();
            // }
            //
            // $('#myTable tbody').empty();
                    //parseJsonToTable(output);
      // 			 			},
      //		error:function(request, status, error){
      //  					console.log(error);
      //					}
    //					});

} );







////////////////////////////////////////////////////////////////////////////////

///////ajax call for data sort form and to///////////////////////////////

function ajaxcall(from_date,to_date){
//var url="getter/get_dates.php";
//to_date="test";
debugger;
var url="<?php echo BASE_URL;?>get_all_mtp_details.php";
$.ajax({  url: url,
          data: {'from_date':from_date,'to_date':to_date},
          type: 'POST',
          dataType:'json',
          success: function(output) {
                    //debugger;
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
//////////////////////////////print function /////////////////////////////

//////////////////////////////
$("#to_date").on("change",function(){
 //debugger;
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
//////////////////////for date filter in datatable////////////

$.fn.dataTable.moment( 'YYYY-MM_DD' );
$.fn.dataTable.moment( 'dddd, MMMM Do, YYYY' );


/////////////////////////////////////////////////////////////

$(document).ready(function() {
    $("#update_block").hide();
});
$( "#mtp_update_form" ).on( "submit", function( event ) {
  $(document).ready(function() {
    $("#update_block").show();
});

  event.preventDefault();// avoid to execute the actual submit of the form.
  //$('#update_type').prop('disabled', true);
  var formData = $( "form" ).serialize();
  console.log(formData);
    var url = "set_all_mtp_update.php"; // the script where you handle the form input.
      $.ajax({
           type: "POST",
           url: url,
           data: formData, // serializes the form's elements.
           success: function(data)
           {
             console.log("data add test :: "+data);
             if(data==1){
            swalSuccess("Update Successfull.");
             }else if(data!=1){
               swalError("Error Occured!");
             }
           },
           error: function (request, status, error) {
            swalError(request.responseText);
          },
         });
          resetform(mtp_update_form);
            setTimeout(function(){location.reload(); }, 2000);
});


var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
    // the script where you handle the form input.
    $.ajax({
         type: "POST",
         url: "get_all_mtp_details.php",//from global_variable
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


  /****************************************************************/

});

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

              var discharge =json[i].Date_of_discharge;
                var color_row=" ";
           if( discharge != "" && discharge !="null" && discharge != null){
               color_row = " ";
           }else if(discharge=="null" || discharge == ""){
               color_row="style='background-color: #ff7d7d7a;'";
           }else{
               color_row="style='background-color: #ff7d7d7a;'";
           }


          //var date = json[i].whenentered;
          //var date = date.substring(0,11);
          //var date= date.split("-").reverse().join("-");
          //var dob = json[i].dob;
          //var dob = date.substring(0,11);
          //var name= json[i].firstname + "  " + json[i].lastname;
          tr = $('<tr class="tbl_row" id="'+json[i].type+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].type+'" '+ color_row +' >');
          tr.append("<td>" +  + "</td>");
          tr.append("<td>" + json[i].admissionDate + "</td>");
          tr.append("<td>" + json[i].PatientName + "</td>");
          tr.append("<td>" + json[i].Wife_Daughter_of + " </td>");
          tr.append("<td>" + json[i].Age + " </td>");
          tr.append("<td>" + json[i].Religion + " </td>");
          tr.append("<td>" + json[i].Address + " </td>");
          tr.append("<td>" + json[i].Duration_of_pregnancy + " </td>");
          tr.append("<td>" + json[i].Reason_of_mtp + " </td>");
          tr.append("<td>" + json[i].Date_of_mtp + " </td>");
          tr.append("<td>" + json[i].Date_of_discharge + " </td>");
          tr.append("<td>" + json[i].Result_and_remark + " </td>");
          tr.append("<td>" + json[i].Opinion_formed_by + " </td>");
          tr.append("<td>" + json[i].Pregnancy_terminated_by + " </td>");
          tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" data-patientName="'+ json[i].PatientName+'" data-patientId="'+json[i].patientID +'" class="btn btn-outline-info" title="Update entry" style="width:100px"  data-uid="' + json[i].id + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
          $('table').append(tr);
        }
       var t2 = $('#myTable').DataTable({
           "scrollX": true,
          "scrollCollapse": true,
           "order": [[ 9, "desc" ],],
           "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
           "buttons": [
           //	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
                       {
                        extend: 'print',
                        exportOptions: {
                        columns: [ 0,1, 2, 3, 4,5,6,7,8,9,10,11,12,13] //Your Colume value those you want
                            }
                          },
                          {
                              extend: 'excel',
                              exportOptions: {
                              columns: [0,1, 2, 3, 4,5,6,7,8,9,10,11,12,13] //Your Colume value those you want
                          }
                        }
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
                }],
            /* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
            "pagingType":"simple_numbers",
             "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
        });
        t2.on( 'order.dt search.dt', function () {
            t2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
               cell.innerHTML = i+1;
               t2.cell(cell).invalidate('dom');
            } );
            } ).draw();
        $('div.dataTables_filter input').focus();
}

/*********************/

/**********************/



function clickedupdate(e){
  $(document).ready(function() {
    $("#update_block").show();
});
 var patientName =e.getAttribute("data-patientName");
 var patientId = e.getAttribute("data-patientID");

document.getElementById('mtp_patient_name').value = patientName;
document.getElementById('mtpPatientID').value = patientId;

    /* for bubble propogation */
    if (!e) var e = window.event;
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
    /* end stopping bubble propogation */
}

</script>
<?php
$pageTitle = "MTP patients section"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
