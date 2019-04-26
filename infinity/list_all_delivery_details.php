<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/*$db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc ");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$data_for_search=json_encode($results);
//return $json;
$db=null;

//echo $json;*/
//$db=null;
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

#txt-search{
	border-radius:24px;
}
.thead-teal{height:45px;}
input[type=search]::-webkit-search-cancel-button {
    -webkit-appearance: searchfield-cancel-button;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link{color: #fff!important;
    background-color: #8BC34A;}
	#exTab3 .nav-pills>li>a {
    border-radius: 5px 5px 0 0;
    padding: 15px;
}
.nav-item a {color: #8BC34A!important;}
.dataTables_scrollHeadInner{
  width:auto!important;
}
</style>

<?php/* include $_SERVER['DOCUMENT_ROOT'].'/nav_sidebar.php';*/?>
<?php/* include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_dr.php";*/?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php'; ?>

<body style="background-color:#E0F2F1;">
	<div id="main">

		<?php include $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>

		<div class="container">
      <a href="#" onclick="goBack()" class="float" title="Click, to go back">
        <i class="fa fa-times my-float"></i>
      </a>
    <br>
      <div class="card card-outline-info mb-3">
        <div class="card-block heading_bar">
        <h5><!--title--> <!--(make according to dr id (on completion line *98))--></h5><!--<?php/* echo $userDetails->username;*/ ?>-->
        </div>
        <a href="#" onclick="goBack()" class="float" title="Click, to go back">
          <i class="fa fa-times my-float"></i>
        </a>
      </div>
     <div class="card card-outline-info mb-3" id="topDiv">
        <div class="card-block heading_bar">
        <div class="container">
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
      </div>
  <div class="card card-outline-info mb-3" id="update_block" >
      <div class="card-block" id="print">
        <form class="form" id="update_Delivery_details" name="update_Delivery_details" action="" method="post" enctype="multipart/form-data" >
          <center>
            <a href="" onclick="goNormal()" class="float" title="Click, to go back">
              <i class="fa fa-times my-float"></i>
            </a>
            <div class="container" id="reg-form-container" >


             <div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
               <div class="card-block" id="print">
                 <div class="form-header-group ">
                     <div class="header-text httal htvam">
                     <div class="row">
                     <hr class="seperator" width="97%">
                     </div>
                     <div class="row justify-content-md-center">
                       <div class="col-md-auto">
                       <h6>Delivery Details</h6>
                       </div>
                     </div>
                     <div class="row">
                     <hr class="seperator" width="97%">
                     </div>
                     </div>
                 </div>
                 <br>
                   <div class="form-group row justify-content-center"><!--ID-->
                     <label for="regID" id="regID_label" class="col-2 col-form-label ">Reg. ID</label>
                     <div class="col-3">
                     <input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="regId" value="" id="regId"  readonly>
                     </div>
                     <label for="patID" id="patID_label" class="col-2 col-form-label " style="/* display:none; */">Pat. ID</label>
                     <div class="col-3" style="/* display:none; */">
                     <input class="form-control noerror" type="text" tabindex="-1" placeholder="patID" name="delivery_patID" value="" id="delivery_patID"  readonly>
                     <input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
                     </div>
                   </div>

                   <div class="form-group row justify-content-center"><!--ID-->
                     <label for="ipd_opd_id" id="ipd_opd_id_label" class="col-2 col-form-label ">IPD/OPD ID</label>
                     <div class="col-3">
                     <input class="form-control noerror" type="text" tabindex="-1" placeholder="ipd_opd_id" name="ipd_opd_id" value="" id="ipd_opd_id"  readonly>
                     </div>
                     <label for="UHID" id="UHID_label" class="col-2 col-form-label " style="/* display:none; */">UHID</label>
                     <div class="col-3" style="/* display:none; */">
                     <input class="form-control noerror" type="text" tabindex="-1" placeholder="UHID" name="UHID" value="" id="UHID"  readonly>
                     <input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
                     </div>
                   </div>

                   <div class="form-group row justify-content-center"><!--name-->
                     <label for="name" id="name" class="col-2 col-form-label required">Patient Name :</label>
                     <div class="col-8">
                     <input class="form-control noerror" type="text" tabindex="-1" placeholder="name" name="patient_name" value="" id="patient_name"  >
                     </div>
                   </div>
                   <div class="form-group row justify-content-center">
                     <label class="col-2 col-form-label required" for="sample_status" >Gravida :</label>
                     <div class="col-3">
                       <input class="form-control" type="text" value="" tabindex="-1" placeholder="gravida" name="delivery_gravida" id="delivery_gravida" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
                     </div>
                     <label for="dob" class="col-2 col-form-label required">Age</label>
                     <div class="col-3 ">
                       <input name="delivery_age" class="form-control noerror" tabindex="-1" type="text" value="" placeholder="Age" id="delivery_age"  >
                     </div>
                   </div>
                   <div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
                    <label for="address-input" class="col-2 col-form-label required">Address</label>
                     <div class="col-3">
                       <textarea class="form-control" id="address" tabindex="-1" placeholder="Enter address here" name="address" style="width: 100%; resize: none;" ></textarea>
                     </div>
                     <label for="tel-input-staff" class="col-2 col-form-label required noerror">Contact No.</label><!--Contact no-->
                     <div class="col-3">
                     <input class="form-control" type="text" value="" tabindex="-1" placeholder="contact no." name="delivery_contact" id="delivery_contact" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
                     </div>
                   </div>
                   <!-------------------->
                   <div class="">
                   <div class="form-group row justify-content-center">
                     <label class="col-2 col-form-label required" for="gender" >Gender</label>
                     <div class="col-3">
                     <select name="gender" class="form-control" id="delivery_gender" style="height: 44px;" onclick='dropdown_sub(this.name,"sub_test-0")'>
                           <option value="" disabled selected> Select Gender</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                     </select>
                     </div>
                     <label class="col-2 col-form-label required" for="method_delivery" >Method Delivery :</label>
                     <div class="col-3">
                     <select name="method_delivery" class="form-control"  id="method_delivery" style="height: 44px;" data-amount="500">
                           <option value="" disabled selected> Select Method</option>
                           <option>Caesarean</option>
                           <option>FTND</option>
                     </select>
                     </div>
                   </div>
                   <div class="form-group row justify-content-center">
                     <label class="col-2 col-form-label required" for="delivery_weight" >Weight</label>
                     <div class="col-3">
                     <input class="form-control" type="text" value=""  placeholder="Weight" name="delivery_weight" id="delivery_weight" autocomplete="" onkeypress="return isNumberKey(event)" maxlength="10" >
                     </div>
                     <label class="col-2 col-form-label required" for="Born_child" >No. Of Born Child :</label>
                     <div class="col-3">
                     <input class="form-control" type="text" value=""  placeholder="No. Of Born Child" name="Born_child" id="Born_child" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >

                     </div>
                   </div>
                   <div class="form-group row justify-content-center">
                     <label class="col-2 col-form-label required" for="wks" >Wks :</label>
                     <div class="col-3">
                     <input class="form-control" type="text" value=""  placeholder="wks" name="wks" id="wks" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10" >
                     </div>
                     <label class="col-2 col-form-label required" for="date_time" >Date/Time :</label>
                     <div class="col-3">
                       <div class="row">
                         <div class="col-6">
                           <input class="form-control" type="text" value="" name="delivery_date" id="delivery_date" placeholder="Date" autocomplete="off" maxlength="10"/>
                           <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                         </div>
                         <div class="col-6">
                           <input class="form-control" type="time" value="" name="delivery_time" id="delivery_time" autocomplete="off" maxlength="10" style="font-size: 12px">
                           <input type="text" id="ot_id" name="ot_id" value="" hidden/>
                         </div>
                       </div>
                   </div>
                   </div>
                   <div class="form-group row justify-content-center"><!--Date of birth--><!--Contact no-->
                     <label class="col-2 col-form-label required" for="doctor_assigned" >Doctor by :</label>
                     <div class="col-8">
                     <select name="dr_name" class="form-control" id="dr_name" style="height: 44px;" onclick='dropdown_sub(this.name,"sub_test-0")' >
                           <option value="" disabled selected> Select Assisting Doctor/s</option>
                           <?php
                               $db = getDB();
                               $statement=$db->prepare("SELECT ID,firstname,lastname FROM  staff_ledger WHERE designation = 'Operating Surgeon'");
                               $statement->execute();
                               $results=$statement->fetchAll();
                               //$json=json_encode($results);
                               //return $json;
                               //$str = 'In My Cart : 11 12 items';
                               foreach($results as $row) {
                               echo "<option value=" . $row['ID'] . ">".$row['firstname'].' '. $row['lastname'] . "</option>";
                               }
                               $db=null;
                           /* */?>


                     </select>
                     </div>

                   </div>




                 <div class="row justify-content-center">
                   <div class="col-md-2"><br>
                     <input type="submit" class="btn btn-success " name="save_update_delivery" value="update" style="width:150px; "/>
                   </div>

                 </div>

                 </div>
               </div>
             </div>
           </div>
          </center>
        </from>
</div>
</div>



      <div class="card card-outline-info mb-3 margin_bot_8">
        <div class="card-block">
        <!----------------------@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-------------------------------->
        <div id="exTab3" class="">
          <ul class="nav nav-pills">
          <li class="nav-item">
          <a class="nav-link active" href="#1b" data-tab="1b" data-toggle="tab">Pending</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#2b" data-tab="2b" data-toggle="tab" id="generate">Completed</a>
          </li>

          <!--<li class="nav-item">
          <a class="nav-link " href="#4b" data-tab="4b" data-toggle="tab">All reports</a>
          </li>-->
          </ul>
          <div class="tab-content clearfix">
            <div class="tab-pane border border-teal active" id="1b">
            <br>
            <table id="myTable_pending_patients" class="table table-striped table-hover" width="100%">
                  <thead class="thead-teal">
                  <tr class="head_row">
                    <th class="no-sort">Sr.no</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Gravida</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Method Delivery</th>
                    <th>Gender</th>
                    <th>Weight</th>
                    <th>No. of Born Child</th>
                    <th>WKS</th>
                    <th>Date/Time</th>
                    <th>Doctor By</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
            </div>
            <div class="tab-pane border border-teal" id="2b">
              <br>
              <table id="myTable_counsulted" class="table table-striped table-hover ">
                <thead class="thead-teal">
                    <tr class="head_row">
                      <th class="no-sort">Sr.no</th>
                      <th>Patient Name</th>
                      <th>Age</th>
                      <th>Gravida</th>
                      <th>Address</th>
                      <th>Phone No</th>
                      <th>Method Delivery</th>
                      <th>Gender</th>
                      <th>Weight</th>
                      <th>No. of Born Child</th>
                      <th>WKS</th>
                      <th>Date/Time</th>
                      <th>Doctor By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
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
////////////////////////////////reload for closing update//////////
function NormalRelaod(){

  $("#update_block").show();

}
//////////////////////////////////////////////////////////////////

///////////////validation for update AJ///////////////////////////
function validationUpdate(){
  debugger;
var test1 = document.getElementById("delivery_patID").value;
var test2 = document.getElementById("UHID").value;
var test3 = document.getElementById("regId").value;
var test4 = document.getElementById("ipd_opd_id").value;
var test5 = document.getElementById("patient_name").value;
var test6 = document.getElementById("delivery_gravida").value;
var test7 = document.getElementById("delivery_age").value;
var test8 = document.getElementById("wks").value;
var test9 = document.getElementById("method_delivery").value;
var test10 = document.getElementById("dr_name").value;
var test11 = document.getElementById("delivery_date").value;
var test12 = document.getElementById("delivery_time").value;
var test13 = document.getElementById("delivery_gender").value;
var test14 = document.getElementById("delivery_weight").value;
var test15 = document.getElementById("Born_child").value;
var test16 =document.getElementById("dr_name").value;
var test17 =document.getElementById("ot_id").value;

if (test1 == "" ){
    swalError("patID must be filled out");//alert
$("#delivery_patID").focus();
$("#delivery_patID").addClass('error').removeClass('noerror');
    return false;
}else if (test2 == ""){
    swalError(" UHID field is required!");//alert
    $("#UHID").focus();
    $("#UHID").addClass('error').removeClass('noerror');
     return false;
   }else if (test3 == ""){
       swalError("regId  is required!");//alert
       $("#regId").focus();
       $("#regId").addClass('error').removeClass('noerror');
        return false;
}else if (test4 == " ") {
    swalError("Opd/Ipd field is required!");//alert
$("#ipd_opd_id").focus();
$("#ipd_opd_id").addClass('error').removeClass('noerror');
    return false;
}else if (test5 == "" ) {
   swalError("Patient Name field is required!");//alert
$("#patient_name").focus();
$("#patient_name").addClass('error').removeClass('noerror');
    return false;
}else if (test6 == "" ) {
     swalError("Gravida field is required!");//alert
  $("#delivery_gravida").focus();
  $("#delivery_gravida").addClass('error').removeClass('noerror');
      return false;
}else if (test7 == "" ) {
         swalError("Age field required!");//alert
      $("#delivery_age").focus();
      $("#delivery_age").addClass('error').removeClass('noerror');
          return false;
}else if (test8 == "" ) {
        swalError("Weeks field is required!");//alert
        $("#wks").focus();
        $("#wks").addClass('error').removeClass('noerror');
                  return false;
}else if (test9 == "" ) {
    swalError("Method Delivery field is required!");//alert
    $("#method_delivery").focus();
    $("#method_delivery").addClass('error').removeClass('noerror');
      return false;
}else if (test10 == "" ) {
   swalError("Doctor by field is required!");//alert
   $("#dr_name").focus();
   $("#dr_name").addClass('error').removeClass('noerror');
          return false;
}else if (test11 == "" ) {
    swalError("Delivery Date field is required!");//alert
    $("#delivery_date").focus();
    $("#delivery_date").addClass('error').removeClass('noerror');
      return false;
}else if (test12 == "" ) {
    swalError("Delivery Time field is required!");//alert
    $("#delivery_time").focus();
    $("#delivery_time").addClass('error').removeClass('noerror');
      return false;
}else if (test13 == "" ) {
        swalError("Gender field is required!");//alert
        $("#delivery_gender").focus();
        $("#delivery_gender").addClass('error').removeClass('noerror');
          return false;
}else if (test14 == "" ) {
            swalError("Weight field is required!");//alert
            $("#delivery_weight").focus();
            $("#delivery_weight").addClass('error').removeClass('noerror');
              return false;
}else if (test15 == "" ) {
    swalError("Born Child field is required!");//alert
    $("#Born_child").focus();
    $("#Born_child").addClass('error').removeClass('noerror');
      return false;
}else if (test16 == "" ) {
    swalError("Doctor Name field is required!");//alert
    $("#dr_name").focus();
    $("#dr_name").addClass('error').removeClass('noerror');
      return false;
    }else if (test16 == "" ) {
        swalError("Ot Id field is required!");//alert
        $("#ot_id").focus();
        $("#ot_id").addClass('error').removeClass('noerror');
          return false;
}else{ return true;}
}



///////////////////////////////////////////////////////////////

////////////////////////date picker Aj/////////////////////////

$(document).ready(function(){
      var date_input=$('input[name="delivery_date"]'); //our date input has the name "date"
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

///////////////////////////////////////////////////////////////////////////////////////////
  function ajaxcall(from_date,to_date){
  //var url="getter/get_dates.php";

  var url="<?php echo BASE_URL;?>get_list_all_delivery_details.php";
  $.ajax({ url: url,
            data: {'token':1,'from_date':from_date,'to_date':to_date},
            type: 'POST',
            dataType:'json',
            success: function(output) {

                      if ( $.fn.DataTable.isDataTable('#myTable_counsulted') ) {
                        $('#myTable_counsulted').DataTable().destroy();
                      }

                      $('#myTable_counsulted tbody').empty();
                      if ( $.fn.DataTable.isDataTable('#myTable_pending_patients') ) {
                        $('#myTable_pending_patients').DataTable().destroy();
                      }

                      $('#myTable_pending_patients tbody').empty();
                      parseJsonToTable(output);

                 },
    error: function(request, status, error){
      console.log(error);
    }


  });
  }
  $("#to_date").on("change",function(){
    //debugger;
     var to_date = document.getElementById("to_date").value;
     var from_date = document.getElementById("from_date").value;
    //var from_date = $("#from_date").datepicker('getDate');
  //  $.datepicker.formatDate('yy-mm-dd', from_date);
    //var to_date = $("#to_date").datepicker('getDate');
    //$.datepicker.formatDate('yy-mm-dd', to_date);

      //from_date += " 00:00:00.000";
      //to_date += " 23:59:59.997";
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
      //to_date += " 23:59:59.997";
      console.log(from_date);
        ajaxcall(from_date,to_date);


  });

$(document).ready(function() {
  $("#update_block").hide();
});
$( "#update_Delivery_details" ).on( "submit", function( event ) {

  event.preventDefault();// avoid to execute the actual submit of the form.

  var formData = $( "form" ).serialize();

  console.log(formData);
    var url = "addpatient_delivery.php"; // the script where you handle the form input.

    var test2=validationUpdate();
    if(test2){
      $.ajax({
           type: "POST",
           url: url,
           data: formData, // serializes the form's elements.
           success: function(data)
           {
             console.log("data add test :: "+data);
             if(data!=1){
            swalSuccess("Details updated ");
             }else if(data==""){
               swalError("Error occured!");
             }
      setTimeout(function(){location.reload();},3000)
           },
           error: function (request, status, error) {
            swalError(request.responseText);
          },
         });
       }
});



//$(document).ready(function(){


		$.ajax({
			   type: "POST",
			   url: "get_list_all_delivery_details.php",//from global_variable
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
	 for (var i = 0; i < json.length; i++) {
	        if(json[i].type==="Capsule")
            {
                var iconfal="<i class='fas fa-capsules'></i>";
            }else if ( json[i].type==="Tablet"){
                var iconfal="<i class='fas fa-tablets'></i>";
            }else{
                var iconfal="<i class='fas fa-prescription-bottle'></i>";
            }
//////////////////variable declaration for NA generate in datatable AJ////////////////////////

            var weight=json[i].weight;
            var gender = json[i].child_gender;
            var NOBChild= json[i].no_child_born;

             if( weight != "" && weight !="null" && weight != null){
             color_row = "";
             }else if(weight=="null" || weight == ""){
             color_row="style='background-color: #ff7d7d7a;'";
             }else{
             color_row="style='background-color: #ff7d7d7a;'";
             }
//////////////////////////for NA value AJ///////////////////////

           if(weight == "" || weight =="null" || weight == null){
              weight = "N.A";
            }
            if(gender == "" || gender =="null" || gender == null){
               gender = "N.A";
             }
             if(NOBChild == "" || NOBChild =="null" || NOBChild == null){
                gender = "N.A";
              }
					//var date = json[i].whenentered;
					//var date = date.substring(0,11);
					//var date= date.split("-").reverse().join("-");
					//var dob = json[i].dob;
					//var dob = date.substring(0,11);
					//var name= json[i].firstname + "  " + json[i].lastname;
					tr = $('<tr class="tbl_row" id="'+json[i].type+'" " data-pat_id="'+json[i].type+'" '+color_row+' >');
					tr.append("<td></td>");
					tr.append("<td>" + json[i].patient_name+ "</td>");
					tr.append("<td>" + json[i].age_of_wife + "</td>");
					tr.append("<td>" + json[i].gravida +"</td>");
					tr.append("<td>" + json[i].address+ "</td>");
					tr.append("<td>" + json[i].contact + " </td>");
					tr.append("<td>" + json[i].method + " </td>");
					tr.append("<td>" + gender + " </td>");
					tr.append("<td>" + weight + " </td>");
					tr.append("<td>" + NOBChild + " </td>");
					tr.append("<td>" + json[i].wks + " </td>");
					tr.append("<td>" + json[i].date_of_dl +'/'+ json[i].time_of_dl + " </td>");
          tr.append("<td>" + json[i].doctorName +" </td>");
					tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="Update entry" style="width:50px"  data-pid="' + json[i].pID + '" data-pNmae="' + json[i].patient_name +'" data-gravida="'+ json[i].gravida +'" data-age="' + json[i].age_of_wife+'" data-address="'+ json[i].address +'" data-contact="'+ json[i].contact +'" data-child_gender="'+
          json[i].child_gender +'" data-method="'+ json[i].method +'" data-weight="'+ json[i].weight +'" data-no_child_born="'+ json[i].no_child_born +'" data-wks="'+ json[i].wks +'" data-date_of_dl="'+ json[i].date_of_dl +'" data-time_of_dl="' + json[i].time_of_dl + '" data-doctor="'+ json[i].doctor +'" data-PatientUHID="'+
           json[i].PatientUHID +'" data-RegID="'+ json[i].RegID +'" data-ipd_opd_id="'+ json[i].ipd_opd_id +'" data-ot_id="'+ json[i].ot_id+'"><i class="fa fa-pencil fa-2" aria-hidden="true"></i></button>');
              console.log( json[i].weight);
   //for distributing the pending and updated table

            if(json[i].weight == null || json[i].weight == ""){
                                 $('#myTable_pending_patients').append(tr);
                               }else {
                                 $('#myTable_counsulted').append(tr);
                               }

                                }
                            var t1=$('#myTable_counsulted').DataTable({
                              "order": [[ 3, "desc" ], [ 0, 'desc' ]],
                              dom: "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
                              "buttons": [
                              //	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
                                          {
                                           extend: 'print',
                                           exportOptions: {
                                           columns: [0, 1, 2, 3, 4,5,6,7,8,9,10,11,12] //Your Colume value those you want
                                               }
                                             },
                                             {
                                                 extend: 'excel',
                                                 exportOptions: {
                                                 columns: [0,1, 2, 3, 4,5,6,7,8,9,10,11,12] //Your Colume value those you want
                                             }
                                           }
                                          ],
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
                                "lengthMenu": [[ 5, 15, 20, 25, 50, -1], [ 5, 15, 20, 25, 50, "All"]]
                           });
                           t1.on( 'order.dt search.dt', function () {
                               t1.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                  cell.innerHTML = i + 1;
                                  t1.cell(cell).invalidate('dom');
                               } );
                            } ).draw();


                                $('div.dataTables_filter input').focus();

                                 var t2 = $('#myTable_pending_patients').DataTable({
                                   "scrollX": true,
                                  "scrollCollapse": true,
                                   "order": [[ 9, "desc" ],],
                                   "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
                                   "buttons": [
                                   //	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
                                               {
                                                extend: 'print',
                                                exportOptions: {
                                                columns: [0, 1, 2, 3, 4,5,6,7,8,9,10,11,12] //Your Colume value those you want
                                                    }
                                                  },
                                                  {
                                                      extend: 'excel',
                                                      exportOptions: {
                                                      columns: [0,1, 2, 3, 4,5,6,7,8,9,10,11,12] //Your Colume value those you want
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
                                   cell.innerHTML = i + 1;
                                   t2.cell(cell).invalidate('dom');
                                } );
                             } ).draw();
                          $('div.dataTables_filter input').focus();
}

//});
//upate button
function clickedupdate(e){
	$(document).ready(function() {
    $("#update_block").show();
    $('html, body').animate({
        scrollTop: $("#topDiv").offset().top
    }, 500);
});



		var pID = e.getAttribute("data-pid");
    var PatientUHID = e.getAttribute("data-PatientUHID");
    var RegID = e.getAttribute("data-RegID");
    var ipd_opd_id = e.getAttribute("data-ipd_opd_id");
    var pname= e.getAttribute("data-pNmae");
    var gravida= e.getAttribute("data-gravida");
    var age= e.getAttribute("data-age");
    var address= e.getAttribute("data-address");
    var contact= e.getAttribute("data-contact");
    var child_gender= e.getAttribute("data-child_gender");
    var method= e.getAttribute("data-method");
    var weight= e.getAttribute("data-weight");
    var no_child_born= e.getAttribute("data-no_child_born");
    var wks=e.getAttribute("data-wks");
    var date_of_dl=e.getAttribute("data-date_of_dl");
    var time_of_dl=e.getAttribute("data-time_of_dl");
    var doctor=e.getAttribute("data-doctor");
    var ot_id=e.getAttribute("data-ot_id");


		document.getElementById("delivery_patID").value =pID;
  	document.getElementById("UHID").value =PatientUHID;
    document.getElementById("regId").value =RegID;
    document.getElementById("ipd_opd_id").value =ipd_opd_id;
    document.getElementById("patient_name").value =pname;
    document.getElementById("delivery_gravida").value =gravida;
    document.getElementById("delivery_age").value =age;
    document.getElementById("address").value =address;
    document.getElementById("delivery_contact").value =contact;
    document.getElementById("delivery_gender").value =child_gender;
    document.getElementById("method_delivery").value =method;
    document.getElementById("delivery_weight").value =weight;
    document.getElementById("Born_child").value =no_child_born;
    document.getElementById("wks").value =wks;
    document.getElementById("delivery_date").value =date_of_dl;
    document.getElementById("delivery_time").value =time_of_dl;
   document.getElementById("dr_name").value =doctor;
   document.getElementById("ot_id").value=ot_id;



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
$pageTitle = "Delivery patients section"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
