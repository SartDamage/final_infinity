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
      <div class="card card-outline-info mb-12">
        <div class="card-block heading_bar row">
          <div class="d-flex justify-content-around">
          <select name="vt_year" class="form-control col-3" id="vt_year" onchange="getYear()" style="height: 44px; width:200px;">
               <option value="" disabled selected>Year</option>
             <?php
         $db = getDB();
         $statement=$db->prepare("SELECT DISTINCT YEAR(WhenEntered) as akki FROM add_vt_details WHERE 1");
         $statement->execute();
         $results=$statement->fetchAll();


         foreach($results as $row) {
        echo "<option value=" . $row['akki'] . ">".$row['akki']. "</option>";
         }
         $db=null;
         ?>
         </select>
         <select name="vt_month" class="form-control col-3" id="vt_month" onchange="getMonth();" style="height: 44px; width:200px;">
           <option value="" disabled selected>Month</option>
       </select>



     </div>
        </div>
      </div>
     <!----------------------------after clicking on View button-------------------------->

     <div class="card card-outline-info mb-3" id="showvt_block" >
        <div class="card-block" id="print">
           <form class="form" id="add_ward_form" name="add_ward_form" action="" method="post" enctype="multipart/form-data" >
           <center>
           <div id="printableArea">
               <div class="form-group row justify-content-center"><!--ID-->
          <label for="regID" id="regID_label" class="col-2 col-form-label ">Reg. ID</label>
          <div class="col-3">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="vt_regId" value="" id="vt_regId"  readonly>
          </div>
          <label for="patID" id="patID_label" class="col-2 col-form-label " style="/* display:none; */">Pat. ID</label>
          <div class="col-3" style="/* display:none; */">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="patID" name="patID" value=" " id="patID"  readonly>
          <input class="form-control noerror" type="text" tabindex="-1"  name="is_ipd_patient" value=""  hidden>
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
          </div>
        </div>

        <div class="form-group row justify-content-center"><!--ID-->
          <label for="regID" id="regID_label" class="col-2 col-form-label ">IPD/OPD ID</label>
          <div class="col-3">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="IPDID" value="" id="IPDID"  readonly>
          </div>
          <label for="patID" id="patID_label" class="col-2 col-form-label " style="/* display:none; */">UHID</label>
          <div class="col-3" style="/* display:none; */">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="patID" name="pUHID" value="" id="pUHID"  readonly>
          <input class="form-control noerror" type="text" tabindex="-1"  name="is_ipd_patient" value="<?php
          if (isset($_GET['pat_id'])){echo $_GET['pat_id'];}
          else {echo "";}?>" id="is_ipd_patient"  hidden>
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
          </div>
        </div>
        <!--------------------------------------->
         <div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
         <label for="vt_anually_no" class="col-2 col-form-label required">Anually No.</label>
          <div class="col-3">
            <input class="form-control" id="vt_anually_no" tabindex="-1" placeholder="Enter the Anually No" name="vt_anually_no" style="width: 100%; resize: none;" readonly/>
          </div>
         <label for="vt_monthly_no" class="col-2 col-form-label required">Monthly No.</label>
          <div class="col-3">
            <input class="form-control" id="vt_monthly_no" tabindex="-1" placeholder="Enter the  Monthly No." name="vt_monthly_no" style="width: 100%; resize: none;" readonly/>
          </div>
        </div>
        <!-------------------->

       <div class="form-group row justify-content-center"><!---patientname-->
          <label for="vt_patient_name" id="name" class="col-2 col-form-label required">Patient Name :</label>
          <div class="col-8">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="Name" name="vt_patient_name" value="" id="vt_patient_name" readonly=""/ >
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <label for="vt_address" class="col-2 col-form-label required">Address:</label>
          <div class="col-8">
            <textarea class="form-control" id="vt_address" tabindex="-1" placeholder="Enter the Addresss" name="vt_address" style="width: 100%; resize: none;" readonly=""></textarea>
          </div>

        </div>
        <!------------Age of husband and wife-------------->

       <div class="form-group row justify-content-center">
         <label for="vt_age_of_husband" class="col-2 col-form-label required">Age of Husband</label>
          <div class="col-3">
            <input type="number" class="form-control" id="vt_age_of_husband"  placeholder="Enter the age of Husband" name="vt_age_of_husband" style="width: 100%; resize: none;" readonly=""/>
          </div>
         <label for="vt_age_of_wife" class="col-2 col-form-label required">Age of Wife</label>
          <div class="col-3">
            <input type="number" class="form-control" id="vt_age_of_wife" tabindex="-1" placeholder="Enter the age of wife" name="vt_age_of_wife" style="width: 100%; resize: none;" readonly="" />
          </div>
        </div>
        <!---------------vt education of husband and and wife----->

         <div class="form-group row justify-content-center">
         <label for="vt_education_of_husband" class="col-2 col-form-label required">Education of Husband</label>
          <div class="col-3">
            <textarea class="form-control" id="vt_education_of_husband" tabindex="-1" placeholder="Enter the education of Husband" name="vt_education_of_husband" style="width: 100%; resize: none;" readonly=""></textarea>
          </div>
         <label for="vt_education_of_wife" class="col-2 col-form-label required">Education of Wife</label>
          <div class="col-3">
            <textarea class="form-control" id="vt_education_of_wife" tabindex="-1" placeholder="Enter the Education of wife" name="vt_education_of_wife" style="width: 100%; resize: none;" readonly=""></textarea>
          </div>
        </div>
        <!-----------Living male and female--------->
         <div class="form-group row justify-content-center">
         <label for="vt_living_male" class="col-2 col-form-label required">Living Male</label>
          <div class="col-3">
            <input type="number" class="form-control" id="vt_living_male" tabindex="-1" placeholder="count of living male" name="vt_living_male" style="width: 100%; resize: none;" readonly="" />
          </div>
         <label for="vt_living_Female" class="col-2 col-form-label required">Living Female</label>
          <div class="col-3">
            <input type="number" class="form-control" id="vt_living_Female" tabindex="-1" placeholder=" count of living female" name="vt_living_Female" style="width: 100%; resize: none;" readonly="" />
          </div>
        </div>
       <!-----------------age of last child male---------------------->
        <div class="form-group row justify-content-center">
         <label for="vt_age_of_last_child_male" class="col-2 col-form-label required">Age of Last Child Male</label>
          <div class="col-3">
            <input type="number" class="form-control" id="vt_age_of_last_child_male" tabindex="-1" placeholder="age of last male child" name="vt_age_of_last_child_male" style="width: 100%; resize: none;" readonly="" />
          </div>
         <label for="vt_age_of_last_child_female" class="col-2 col-form-label required">Age of Last Child Female</label>
          <div class="col-3">
            <input type="number" class="form-control" id="vt_age_of_last_child_female" tabindex="-1" placeholder="Enter the age of last female child" name="vt_age_of_last_child_female" style="width: 100%; resize: none;" readonly="" />
          </div>
        </div>
        <!--------------------------------------->
         <div class="form-group row justify-content-center">
         <label for="vt_doctor" class="col-2 col-form-label required">Doctor</label>
          <div class="col-3">
            <input type="text" class="form-control" id="vt_doctor" tabindex="-1" name="vt_doctor" style="width: 100%; resize: none;" readonly/>
          </div>
         <label for="vt_methode" class="col-2 col-form-label required">Method</label>
          <div class="col-3">
            <input type="text" class="form-control" id="vt_methode" tabindex="-1"  name="vt_methode" style="width: 100%; resize: none;" readonly />
          </div>
        </div>

        <div class="form-group row justify-content-center">
         <label for="vt_date" class="col-2 col-form-label required">Date of TL</label>
          <div class="col-3">
            <input type="text" class="form-control" id="vt_date" tabindex="-1"  name="vt_date" style="width: 100%; resize: none;" readonly />
          </div>
          <label for="address-input" class="col-2 col-form-label required">Monthly Income</label>
          <div class="col-3">
            <input type="text" class="form-control" id="vt_monthly_income" tabindex="-1" name="vt_monthly_income" style="width: 100%; resize: none;" readonly/>
          </div>
        </div>
         <div class="form-group row justify-content-center">
               <label for="vt_remark" class="col-2 col-form-label required">Remark:</label>
                 <div class="col-8">
                  <textarea class="form-control" id="vt_remark" name="vt_remark" tabindex="-1"  style="width: 100%; resize: none;" readonly ></textarea>
            </div>

        </div>
           <div class="form-group row justify-content-md-center" style="margin-top: 1rem;">
                  <div class="col-md-2">

                    <div class="form-group row justify-content-md-center" style="margin-bottom:0">

                <div class="col-md">
                  <input class="form-control btn btn-outline-danger" style="border-color: #dc3545;" type="Submit" title="print" placeholder="Print" onclick="printDiv('printableArea')" name="vt_print" id="vt_print" value="Print">
                </div>
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
                        <th class="no-sort">Sr.no</th>
                        <th>Date of TL</th>
                        <th>Anually No.</th>
                        <th>Monthly No.</th>
                        <th>patient name</th>
                        <th>Address</th>
                        <th>Age of husband</th>
                        <th>Age of wife</th>
                        <th>Education of husband</th>
                        <th>Education of wife</th>
                        <th>living male</th>
                        <th>living female</th>
                        <th>last child male</th>
                        <th>last child female</th>
                        <th>Monthly Income</th>
                        <th>method</th>
                        <th>Dr.Name</th>
                        <th>Remark</th>
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
//global variable t2 for tablets
var t2;
//////////////////////////////ptint fuction/////////////////////

function printDiv(divName) {
  debugger;
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

///////////////////////////////////////////////////////////////
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
});


$(document).ready(function(){
    $("#showvt_block").hide();
});


$( "#add_ward_form" ).on( "submit", function( event ){

            $(document).ready(function() {
              $("#showvt_block").hide();
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

                   });
});


var $value=0;

//get year function
function getYear(){

            var year=document.getElementById('vt_year').value;
             $.ajax({
               type: "POST",
               url:"<?php echo BASE_URL;?>get_list_all_vt_selectmonth.php",
               data:{"years":year},
               success: function(data)
                {
                 var json = JSON.parse(data);
                 var option_months='';
                 for(i=0;i<json.length;i++){
                   if(json[i]['akki'] == 1){
                     option_months+='<option value="1">January</option>';
                   }
                   if(json[i]['akki'] == 2){
                    option_months+='<option value="2">February</option>';
                   }
                   if(json[i]['akki'] == 3){
                      option_months+='<option value="3">March</option>';
                    }
                    if(json[i]['akki'] == 4){
                       option_months+='<option value="4">April</option>';
                    }
                    if(json[i]['akki'] == 5){
                       option_months+='<option value="5">May</option>';
                    }
                    if(json[i]['akki'] == 6){
                       option_months+='<option value="6">June</option>';
                    }
                    if(json[i]['akki'] == 7){
                        option_months+='<option value="7">July</option>';
                    }
                    if(json[i]['akki'] == 8){
                       option_months+='<option value="8">August</option>';
                    }
                    if(json[i]['akki'] == 9){
                      option_months+='<option value="9">September</option>';
                    }
                    if(json[i]['akki'] == 10){
                      option_months+='<option value="10">October</option>';
                    }
                    if(json[i]['akki'] == 11){
                      option_months+='<option value="11">November</option>';
                    }
                    if(json[i]['akki'] == 12){
                      option_months+='<option value="12">December</option>';
                    }
                 }
                 $('#vt_month').find('option').remove();
                 $('#vt_month').append($(option_months));
                }



             });
            $.ajax({
                    type: "POST",
                    url:"<?php echo BASE_URL;?>get_list_all_vt_year.php",
                    data:{"years":year},
                    success: function(data)
                     {
                      var json = JSON.parse(data);
                      if(t2 != '' ){
                        t2.destroy();
                       $('#myTable tbody').empty();
                     }

                      parseJsonToTable(json);

                      }
                  });



}

//get month function
function getMonth(){

              var month=document.getElementById('vt_month').value;
              var year=document.getElementById('vt_year').value;
              if (year==''){
                swalError('please select Year !!');

              }
              else{
              $.ajax({
                      type: "POST",
                      url:"<?php echo BASE_URL;?>get_list_all_vt_month.php",
                      data:{"month":month,"year":year},
                      success: function(data)
                       {
                        var json = JSON.parse(data);
                        if(t2 != '' ){
                          t2.destroy();
                         $('#myTable tbody').empty();
                       }

                        parseJsonToTable(json);

                        }
                    });

                }



}





    $.ajax({
         type: "POST",
         url: "get_list_all_vt.php",//from global_variable
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


/*********************/

/**********************/

$.fn.dataTable.moment( 'DD MMMM YYYY' );
$.fn.dataTable.moment( 'dddd, MMMM Do, YYYY' );

function clickedview(e){
  $(document).ready(function() {
    $("#showvt_block").show();
});
var pid = e.getAttribute("data-pID");
var RegID = e.getAttribute("data-RegID");
var PatientUHID = e.getAttribute("data-UHID");
var ipd_opd_id = e.getAttribute("data-ipd_opd_id");
var date_of_tl = e.getAttribute("data-date_of_tl");
var anually_no= e.getAttribute("data-anually_no");
var monthly_no= e.getAttribute("data-monthly_no");
var patient_name= e.getAttribute("data-patient_name");
var address_patient= e.getAttribute("data-address_patient");
var age_of_husband= e.getAttribute("data-age_of_husband");
var age_of_wife= e.getAttribute("data-age_of_wife");
var education_of_husband= e.getAttribute("data-education_of_husband");
var education_of_wife= e.getAttribute("data-education_of_wife");
var living_male= e.getAttribute("data-living_male");
var livinmg_female= e.getAttribute("data-livinmg_female");
var age_of_Last_child_male= e.getAttribute("data-age_of_Last_child_male");
var age_of_Last_child_female= e.getAttribute("data-age_of_Last_child_female");
var monthly_income= e.getAttribute("data-monthly_income");
var method= e.getAttribute("data-method");
var assistingDoctorName= e.getAttribute("data-assistingDoctorName");
var method = e.getAttribute("data-method");
var remark = e.getAttribute("data-remark");
    //var ID="12";
    document.getElementById("patID").value =pid;
    document.getElementById("vt_regId").value =RegID;
    document.getElementById("IPDID").value =ipd_opd_id;
    document.getElementById("pUHID").value =PatientUHID;
    document.getElementById("vt_anually_no").value =anually_no;
    document.getElementById("vt_monthly_no").value =monthly_no;
    document.getElementById("vt_patient_name").value =patient_name;
    document.getElementById("vt_address").value =address_patient;
    document.getElementById("vt_age_of_husband").value =age_of_husband;
    document.getElementById("vt_age_of_wife").value =age_of_wife;
    document.getElementById("vt_education_of_husband").value =education_of_husband;
    document.getElementById("vt_education_of_wife").value =education_of_wife;
    document.getElementById("vt_living_male").value =living_male;
    document.getElementById("vt_living_Female").value =livinmg_female;
    document.getElementById("vt_age_of_last_child_male").value =age_of_Last_child_male;
    document.getElementById("vt_age_of_last_child_female").value =age_of_Last_child_female;
    document.getElementById("vt_doctor").value =assistingDoctorName;
    document.getElementById("vt_date").value =date_of_tl;
     document.getElementById("vt_monthly_income").value =monthly_income;
     document.getElementById("vt_methode").value =method;
     document.getElementById("vt_remark").value =remark;



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

function parseJsonToTable(json)
{

   for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
     var iconfal="";
   if(json[i].type==="Capsule")
   {
       var iconfal="<i class='fas fa-capsules'></i>";
     }
     else if ( json[i].type==="Tablet"){

       var iconfal="<i class='fas fa-tablets'></i>";
       }
       else{
         var iconfal="<i class='fas fa-prescription-bottle'></i>";
         }

         var srno = i+1;

          //var date = json[i].whenentered;
          //var date = date.substring(0,11);
          //var date= date.split("-").reverse().join("-");
          //var dob = json[i].dob;
          //var dob = date.substring(0,11);
          //var name= json[i].firstname + "  " + json[i].lastname;

          tr = $('<tr class="tbl_row" id="'+json[i].type+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].type+'">');

          /*tr.append("<td align='center'>"+iconfal+"</td>");*/

          tr.append("<td>" + + "</td>");
          tr.append("<td>" + json[i].date_of_vt + "</td>");
          tr.append("<td>" + json[i].anually_no + "</td>");
          tr.append("<td>" + json[i].monthly_no+ "</td>");
          tr.append("<td>" + json[i].patient_name + "</td>");
          tr.append("<td>" + json[i].address_patient + "</td>");
          tr.append("<td>" + json[i].age_of_husband + " </td>");
          tr.append("<td>" + json[i].age_of_wife + " </td>");
          tr.append("<td>" + json[i].education_of_husband + " </td>");
          tr.append("<td>" + json[i].education_of_wife + " </td>");
          tr.append("<td>" + json[i].living_male + " </td>");
          tr.append("<td>" + json[i].livinmg_female + " </td>");
          tr.append("<td>" + json[i].age_of_Last_child_male + " </td>");
          tr.append("<td>" + json[i].age_of_Last_child_female + " </td>");
          tr.append("<td>₹" + json[i].monthly_income + " </td>");
          tr.append("<td>" + json[i].method + " </td>");
          tr.append("<td>" + json[i].assistingDoctorName + " </td>");
          tr.append("<td>₹" + json[i].remark + " </td>");
          tr.append('<td class=""><center><button type="button" onclick="clickedview(this);" data-pID="'+ json[i].patientID +'" data-RegID="'+ json[i].RegID +'" data-UHID="'+ json[i].PatientUHID +'" data-ipd_opd_id="'+ json[i].ipd_opd_id+'" data-date_of_tl="'+ json[i].date_of_tl +'" data-anually_no="'+ json[i].anually_no + '" data-monthly_no="'+ json[i].monthly_no +'" data-patient_name="'+ json[i].patient_name
          +'" data-address_patient="'+ json[i].address_patient +'" data-age_of_husband="'+ json[i].age_of_husband +'" data-age_of_wife="'+ json[i].age_of_wife +'" data-education_of_husband="'+ json[i].education_of_husband +'" data-education_of_wife="'+ json[i].education_of_wife +'"  data-living_male="'+ json[i].living_male +'" data-livinmg_female="'+ json[i].livinmg_female +'" data-age_of_Last_child_male="'+ json[i].age_of_Last_child_male +
          '" data-age_of_Last_child_female="'+ json[i].age_of_Last_child_female +'" data-monthly_income="'+ json[i].monthly_income +'" data-method="'+ json[i].method +'" data-assistingDoctorName="'
          + json[i].assistingDoctorName +'" data-remark="'+ json[i].remark +'"  class="btn btn-outline-info" title="view entry" style="width:100px"><i aria-hidden="true"></i>&nbsp;View</button></center></td>');
          $('table').append(tr);

        }
      t2 =  $('#myTable').DataTable({
           "scrollX": true,
          "scrollCollapse": true,
           "order": [[ 1, "desc" ],],
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
                }],
            /* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
            "pagingType":"simple_numbers",
             "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
        });
        t2.on( 'order.dt search.dt', function () {
            t2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
               cell.innerHTML = i+1;
            } );
            } ).draw();
        $('div.dataTables_filter input').focus();
}

  /****************************************************************/




</script>
<?php
$pageTitle = "VT patients section"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
