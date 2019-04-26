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

      <!----------------------------after clicking on View button-------------------------->


    </div>

      <div class="card card-outline-info mb-3 margin_bot_8">
        <div class="card-block">
        <table class="table table-striped table-hover display nowrap" id="myTable" style="width:100%">
          <thead class="thead-teal">

          <tr class="head_row">
                      <th class="no-sort">Sr.no</th>
                      <th>patient name</th>
                      <th>Receipt No</th>
                      <th>Advance</th>
                      <th>Balance</th>
                      <th>Total</th>
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
    })

    $(document).ready(function(){
      var date_input=$('input[name="to_date"]'); //our date input has the name "date"
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
    $("#showtl_block").hide();
});
$( "#add_ward_form" ).on( "submit", function( event ) {
  $(document).ready(function() {
    $("#update_block").hide();
});

  event.preventDefault();// avoid to execute the actual submit of the form.
  //$('#update_type').prop('disabled', true);
  var formData = $( "form" ).serialize();
  console.log(formData);
    var url = "/stock/update_stock_type.php"; // the script where you handle the form input.
      $.ajax({
           type: "GET",
           url: url,
           data: formData, // serializes the form's elements.
           success: function(data)
           {
             console.log("data add test :: "+data);
             if(data==1){
            swalSuccess("New Stock has been added");
             }else if(data!=1){
               swalError("Type already exists in selected Category","Change Category.");
             }
             location.reload();
            //location.href = "./manage_accounts.php"
           },
           error: function (request, status, error) {
            swalError(request.responseText);
          },
          cache: false,
          contentType: false,
          processData: false
         });
});

var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
    // the script where you handle the form input.
    $.ajax({
         type: "POST",
         url: "/get_all_reimbursement_details.php",//from global_variable
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
     var total_paid=[parseInt(json[i].advance)+parseInt(json[i].paid)];
     var  balance = parseInt(json[i].amount)-total_paid;
          tr = $('<tr class="tbl_row" id="'+json[i].type+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].type+'">');

          tr.append("<td>" + (i+1) + " </td>");
          tr.append("<td>" + json[i].FirstName + "&nbsp;" +json[i].LastName + " </td>");
          tr.append("<td>" + json[i].recieptID + " </td>");
          tr.append("<td>" + total_paid + " </td>");
          tr.append("<td>" + balance + " </td>");
          tr.append("<td>" + json[i].amount + " </td>");
          tr.append('<td class=""><center><button type="button" onclick="clickedview(this)" data-pat_id1="'+json[i].instance_id+'" data-reg_id="'+json[i].RegID+'" data-receipt_id="'+json[i].recieptID+'" class="btn btn-outline-info" title="view entry" style="width:100px"><i aria-hidden="true"></i>&nbsp;View</button></center></td>');
          $('table').append(tr);
        }
        $('#myTable').DataTable({
           "scrollX": true,
          "scrollCollapse": true,
           "order": [[ 3, "desc" ], [ 0, 'desc' ]],
           "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
           "buttons": [
           //	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
                       {
                        extend: 'print',
                        exportOptions: {
                        columns: [0,1, 2, 3, 4,5] //Your Colume value those you want
                            }
                          },
                          {
                              extend: 'excel',
                              exportOptions: {
                              columns: [0,1, 2, 3, 4,5 ] //Your Colume value those you want
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
        $('div.dataTables_filter input').focus();
}

  /****************************************************************/

});
/*********************/

/**********************/



function clickedview(e){
  $(document).ready(function() {
    var abc=e.getAttribute('data-pat_id1');
    var xyz=e.getAttribute('data-reg_id');
    var pqr=e.getAttribute('data-receipt_id');
    var url= "reimbursement_receipt.php?ID="+abc+"&regid="+xyz+"&receipt_id="+pqr;
    window.open(url,'_blank');

});

    var dr_ID= e.getAttribute("data-uid");
    //var ID="12";
    $('#update_type').prop('disabled', false);
    //var ID="12";
    //alert(ID);
    $.ajax({
       type: "GET",
       url: "/stock/get_all_stock_pharmacy_indi.php",
       data:{"dr_ID":dr_ID},
         success: function(data)
         {
            console.log("got data : "+data);
            var json = JSON.parse(data);
            //console.log("got data : "+json);
            console.log("got data json :"+json);
            //var bed_name=json.bed_name;
            //var bed_type=json.type;
            //var category_update=json[0].category;
            var price_update=json[0].price;
            var last_cost=json[0].number_stock;
            var id_od_element=json[0].id;
            var brand_name=json[0].brand;
            var model_name_p=json[0].model_no;

            //alert(last_cost);
            document.getElementById("add_price_up").value=price_update;
            document.getElementById("add_quantity_upd").value=last_cost;
            document.getElementById("add_type_ID").value=id_od_element;
            document.getElementById("name_of_brand").innerHTML=brand_name;
            document.getElementById("Name_of_model").innerHTML=model_name_p;
            //alert("sub test name : "+subtest_name);
            //setSelectValue("add_stock_type_main",category);
            //setSelectValue("add_type_name",bed_type);
            //setSelectValue("add_type_name",bed_type);
            //setSelectValue("add_type_ID",bed_id);
            //$('#resultQuickVar1').html(data);
            $("#add_test").prop( "disabled", true );
         },
    });
    /* for bubble propogation */
    if (!e) var e = window.event;
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
    /* end stopping bubble propogation */
}

</script>
<?php
$pageTitle = "Reimbursement Receipt list"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
