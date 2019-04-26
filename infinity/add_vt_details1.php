<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(isset($_GET['ID'])){$ID=$_GET['ID'];}else{$ID="";}
if(isset($_GET['pat_id'])){$patient_id=$_GET['pat_id'];}else{$patient_id="";}
?>

<?php include  $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
<style>
a {
  -webkit-transition: .25s all;
  transition: .25s all;
}
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
.form .seperator, .seperator{
    border: 0px;
    border-bottom: 1px dashed #b5babd;}
form{margin-bottom:5px;}
#ipd_display{display:none;}
.form-control{
  margin-bottom: 0.5rem!important;
  border: 0px;
  border-bottom: 1px solid #868e96;
  border-radius: .1rem;}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 1px 2px 8px 0.2rem #dae0e5;}

.form .button_login:hover, .form .button_login:active, .form .button_login:focus {
    box-shadow: 3px 3px 3px 0.2rem #5C885C;}
.form .button_reset:hover, .form .button_reset:active, .form .button_reset:focus {
        box-shadow: 3px 3px 3px 0.2rem #8c6361;}
.form .seperator{
    border: 0px;
    border-bottom: 1px dashed #b5babd;}
.required {
    font-weight: bold;
}
.required:after {
    color: #e32;
    content: ' *';
    display:inline;
}
#profile_img{border-radius: 50%;width:150px;height:150px;margin:auto;}
.wrapper{display:none;}
#fileToUpload{display:none;}
.error select{
color:red;}
.noerror select{
color:#9e9e9e;}
.error::-webkit-input-placeholder {
    color: red;
}
.noerror::-webkit-input-placeholder {
    color: #9e9e9e;
}
input[type=date]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    }
@media print {

  .section-to-print, .section-to-print * {
    visibility: visible;
  }
  .section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
.hr_seperator{
  margin-right: 9%;
    margin-left: 9%;
}
.item-row{
  display:none;
}
div#hiderow {
    display: inline-block;
    position: relative;
    bottom: 48px;
    float: right;
}

a.delete {
    position: relative;
    right: 6%;
    float: right;
    bottom: 150px;
}

.form-group.row.last_row {
    width: -webkit-fill-available;
}
input:not([type='submit']), select, summary, textarea {

    background-color: #fff0!important;
    border-radius: .25rem;
  }
hr.style3 {
  border-top: 1px dashed #8c8b8b;
}

input[type=date]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    }
</style>
<?php
              $db = getDB();
              $statement=$db->prepare("SELECT MAX(`pat_id`) FROM add_vt_details");
              $statement->execute();
              $results=$statement->fetchColumn();
              $json=json_encode($results);
              //return $json;
              //$str = 'In My Cart : 11 12 items';
              preg_match_all('!\d+!', $results, $matches);
              if (preg_match_all('!\d+!', $results, $matches)) {
                $matches = $matches[0][0]+1;
              }else{$matches = 1; }
              $TL_ID= "VT".str_pad($matches, 5, "0", STR_PAD_LEFT);

              $db=null;
              $db = getDB();
              $statement=$db->prepare("SELECT count(`id`) FROM add_tl_details where YEAR(WhenEntered)=YEAR(CURDATE())");
              $statement->execute();
              $results=$statement->fetchColumn();
              $json=json_encode($results);
              //return $json;
              //$str = 'In My Cart : 11 12 items';
              $results = (int)$results+1;
              echo '<a id="123">'.$results.'</a>';
              $anually_no= $results."/".date("m");

              $db=null;
              $db = getDB();
              $statement=$db->prepare("SELECT count(`id`) FROM add_tl_details where MONTH(WhenEntered)=MONTH(CURDATE()) and YEAR(WhenEntered)=YEAR(CURDATE())");
              $statement->execute();
              $results1=$statement->fetchColumn();
              $json=json_encode($results1);
              //return $json;
              //$str = 'In My Cart : 11 12 items';
              $monthly_no = (int)$results1+1;


              $db=null;
              ?>
<?php //include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include  $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
<div class="container" id="reg-form-container" >

  <div class="card card-outline-info mb-3" style="margin-top:18px;">
    <div class="card-block heading_bar">
    <h5>Add new VT Details</h5>
    <a href="#" onclick="goBack()" class="float" title="Click, to go back">
    <i class="fa fa-times my-float"></i>
  </a>
    </div>
  </div>
  <div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
    <div class="card-block" id="print">
      <div class="form-header-group ">
          <div class="header-text httal htvam">
          <div class="row">
          <hr class="seperator" width="97%">
          </div>
          <div class="row justify-content-md-center">
            <div class="col-md-auto">
            <h6>VT Details</h6>
            </div>
          </div>
          <div class="row">
          <hr class="seperator" width="97%">
          </div>
          </div>
      </div>
      <br>

      <form class="form " name="tl_submit_form"  id="tl_submit_form" >
        <div class="form-group row justify-content-center"><!--ID-->
          <label for="regID" id="regID_label" class="col-2 col-form-label ">Reg. ID</label>
          <div class="col-3">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="regId" value="<?php echo $ID;?>" id="regId"  readonly>
          </div>
          <label for="patID" id="patID_label" class="col-2 col-form-label " style="/* display:none; */">Pat. ID</label>
          <div class="col-3" style="/* display:none; */">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="patID" name="tl_patID" value="<?php echo $TL_ID; ?>" id="tl_patID"  readonly>
          </div>
        </div>

        <div class="form-group row justify-content-center"><!--ID-->
          <label for="tl_ipd_opd_ID" id="tl_ipd_opd_ID_lable" class="col-2 col-form-label ">IPD/OPD ID</label>
          <div class="col-3">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="regID" name="tl_ipd_opd_ID" value="<?php
          if (isset($_GET['pat_id'])){echo $_GET['pat_id'];}
          else {echo $patient_id;}?>" id="tl_ipd_opd_ID"  readonly>
          </div>
          <label for="UHID" id="UHID_label" class="col-2 col-form-label " style="/* display:none; */">UHID</label>
          <div class="col-3" style="/* display:none; */">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="UHID" name="UHID" value="" id="UHID"  readonly>
          <input class="form-control noerror" type="text" tabindex="-1"  name="is_ipd_patient" value="<?php
          if (isset($_GET['pat_id'])){echo $_GET['pat_id'];}
          else {echo "";}?>" id="is_ipd_patient"  hidden>
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
          </div>
        </div>
        <!--------------------------------------->
         <div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
         <label for="tl_anually" class="col-2 col-form-label required">Anually No.</label>
          <div class="col-3">
            <input class="form-control" id="tl_anually" tabindex="-1" placeholder="Enter the Anually No" name="tl_anually" value="<?php  echo $anually_no;?>" style="width: 100%; resize: none;" readonly/>
          </div>
         <label for="tl_monthly" class="col-2 col-form-label required">Monthly No.</label>
          <div class="col-3">
            <input class="form-control" id="tl_monthly" tabindex="-1" placeholder="Enter the  Monthly No." name="tl_monthly" value="<?php echo $monthly_no; ?>" style="width: 100%; resize: none;" readonly/>
          </div>
        </div>
        <!-------------------->

        <div class="form-group row justify-content-center"><!--name-->
          <label for="tl_patient_name" id="tl_patient_name_lable" class="col-2 col-form-label required">Patient Name :</label>
          <div class="col-8">
          <input class="form-control noerror" type="text" tabindex="-1" placeholder="Name" name="tl_patient_name" value="" id="tl_patient_name" readonly/>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <label for="tl_address" class="col-2 col-form-label required">Addresss:</label>
          <div class="col-8">
            <textarea class="form-control" id="tl_address" tabindex="-1" placeholder="Enter the Addresss" name="tl_address" style="width: 100%; resize: none;" ></textarea>
          </div>

        </div>
        <!-------------------------->

        <div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
         <label for="tl_age_husband" class="col-2 col-form-label required">Age of Husband</label>
          <div class="col-3">
            <input type="number" class="form-control" id="tl_age_husband"  placeholder="Enter the age of Husband" name="tl_age_husband" style="width: 100%; resize: none;"/>
          </div>
         <label for="tl_age_wife" class="col-2 col-form-label required">Age of Wife</label>
          <div class="col-3">
            <input type="number" value="" class="form-control" id="tl_age_wife" tabindex="-1" placeholder="Enter the age of wife" name="tl_age_wife" style="width: 100%; resize: none;"/>
          </div>
        </div>
        <!-------------------->
         <div class="form-group row justify-content-center">
         <label for="tl_education_husband" class="col-2 col-form-label required">Education of Husband</label>
          <div class="col-3">
            <textarea class="form-control" id="tl_education_husband"  placeholder="Enter the education of Husband" name="tl_education_husband" style="width: 100%; resize: none;" ></textarea>
          </div>
         <label for="tl_education_wife" class="col-2 col-form-label required">Education of Wife</label>
          <div class="col-3">
            <textarea class="form-control" id="tl_education_wife"  placeholder="Enter the Education of wife" name="tl_education_wife" style="width: 100%; resize: none;" ></textarea>
          </div>
        </div>
        <!-------------------->
         <div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
         <label for="tl_living_male" class="col-2 col-form-label required">Living Male</label>
          <div class="col-3">
            <input type="number" class="form-control" id="tl_living_male" placeholder="count of living male" name="tl_living_male" style="width: 100%; resize: none;"/>
          </div>
         <label for="tl_living_female" class="col-2 col-form-label required">Living Female</label>
          <div class="col-3">
            <input type="number" class="form-control" id="tl_living_female"  placeholder="count of living female" name="tl_living_female" style="width: 100%; resize: none;"/>
          </div>
        </div>
        <!--------------------------------------->
        <div class="form-group row justify-content-center">
         <label for="tl_age_of_last_child_male" class="col-2 col-form-label required">Age of Last child male</label>
          <div class="col-3">
            <input type="number" class="form-control" id="tl_age_of_last_child_male"  placeholder="Enter the age of last male child" name="tl_age_of_last_child_male" style="width: 100%; resize: none;"/>
          </div>
         <label for="tl_age_of_last_child_female" class="col-2 col-form-label required">Age of Last child female</label>
          <div class="col-3">
            <input type="number" class="form-control" id="tl_age_of_last_child_female"  placeholder="Enter the age of last female child" name="tl_age_of_last_child_female" style="width: 100%; resize: none;" />
          </div>
        </div>
        <!--------------------------------------->
         <div class="form-group row justify-content-center"><!--Marital Status--><!--Contact no-->
         <label class="col-2 col-form-label required" for="tl_doctor" >Doctor</label>
          <select name="tl_doctor" class="form-control col-3" id="tl_doctor" style="height: 44px;">
                <option value="" disabled selected>Select Doctor</option>
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
        <label class="col-2 col-form-label required" for="tl_method" >Method</label>
          <select name="tl_methode" class="form-control col-3" id="tl_method" style="height: 44px;">
                <option value="" disabled selected>Select Method</option>
                <option value="Open TL">Open TL</option>
                <option value="Lab TL">Lab TL</option>
          </select>
        </div>

        <div class="form-group row justify-content-center">
         <label for="tl_date" class="col-2 col-form-label required">Date of TL</label>

                                    <div id="tl_date_div" class="col-3 input-group date">
                                      <input class="form-control" type="text" id="tl_date" name="tl_date" oninput="myFunction()" />
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
          <label for="tl_monthly_income" class="col-2 col-form-label required">Monthly Income</label>
          <div class="col-3">
            <input type="number" class="form-control" id="tl_monthly_income"  placeholder="Enter the Monthly Income" name="tl_monthly_income" style="width: 100%; resize: none;"/>

          </div>

        </div>
        <!------------vt remark------------------------------>

         <div class="form-group row justify-content-center">
          <label for="vt_remark" id="vt_remark_lable" class="col-2 col-form-label required">Remark :</label>
          <div class="col-8">
          <input class="form-control noerror" type="text"  placeholder="Remark" name="vt_remark" value="" id="vt_remark"/>
          </div>
        </div>
        <!-------------------->





        <!------------------->

        <!------------------->
        <!--<hr class="style3">
      <div class="row justify-content-center">
        <div class="col-md-8" style="padding:50px">
        </div>
        <div class="col-md-4" style="">
        <table id="Amount_table">
          <tr>
            <td>Total</td>
            <td>:</td>
            <td><span>₹</span></td>
            <td><input class="form-control noerror" type="number" placeholder=" 00.00" name="total" value="" id="total" maxlength="15" readonly tabindex="-1"></td>
          </tr>
          <tr>
            <td>Advance</td>
            <td>:</td>
            <td><span>₹</span></td>
            <td><input class="form-control noerror" type="number" placeholder=" 00.00" name="advance" value="" id="advance" maxlength="10" min="0.00" max="10000000.00" step="0.01" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);update_balance();"></td>
          </tr>
          <tr>
            <td>Balance</td>
            <td>:</td>
            <td><span>₹</span></td>
            <td><input class="form-control noerror" type="number" placeholder="₹ 00.00" name="balance" value="" id="balance" maxlength="15" readonly tabindex="-1"></td>
          </tr>
        </table>
        </div>
      </div>-->
      <div class="row justify-content-center">
        <div class="col-md-2"><br>
          <input type="submit" class="btn btn-success " name="vt_details_submit" id="vt_details_submit" value="Submit" style="width:150px; "/>
        </div>
        <!--<div class="col-6">
        <center>
          <input type="button" class="btn btn-danger " id="reset_btn" onclick="resetform(pat_update_form)" name="staff_registration" value="Reset" style="width:50%;"/>
        </center>
        </div>-->
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<script>

   $("#tl_date").datepicker({
        format: "dd MM yyyy"
    });

   $(document).ready(function(){
      var date_input=$('input[name="dateofmtp"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

var counter=0;
$(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
$(".addrow").on("click",function(){
     if (counter < 5){
       //alert(counter);
    counter++;
   //$('.item-row').css("display", "block");
   //$(this).parents('.item-row').next('.item-row').css("display", "block");
  $(this).parents(".item-row").find(".addrow").css("display","none");
  }else{swalSuccess("Creat new pathology form.")}
  //$(this).closest('form').next('.item-row').css('color','red');
  $(this).parents('.item-row').next('.item-row').css("display", "block");
  next(this)
  });
function next(event) {
   var list = $('.item-row');    //all containers
   //alert("item row"+list.length);
   var index = list.index($(event.target));  //current container
   //alert("current "+index);
   prev_index=index-1
   //list.eq(index).parents(".item-row").find(".addrow").css("display", "none");
   index = (index + 1) % list.length;        //increment with wrap
   var nextAmountCalculationContainer = list.eq(index);
   list.eq(index).css("display", "block");

   }

   $( document ).on( "click", ".delete", function(){
     counter--
     //$(this).parents('.item-row');
     $(this).parents('.item-row').css("display", "none");
     $(this).parents('.item-row').find('.addrow').css("display", "block");
     //$(this).find("input").val("");
     $(this).parents('.item-row').find("input[type='text']").val("0");

     $(this).parents(".item-row").find('select').val("");//.css( "color", "red" )
         update_price();
     update_balance();
    // $('#baba').val($(this).find('option:first').val());
    if ($(".delete").length < 2) $(".delete").hide(); });
/*----------------Form Fetch*************************/
var ID= "<?php echo $ID;?>";

$(document).ready( function () {
$.ajax({
     type: "GET",
     url: <?php echo $get_patient_detail_by_regID;?>,
     data: 'ID='+ID+'',// serializes the form's elements.
     success: function(data)
     {
      //console.log(data);
      var json = JSON.parse(data);
      parseJsonToForm(json);
     },
    cache: false,
    contentType: false,
    processData: false
   });
});

function parseJsonToForm(json){
    /* $('#First-name-input').val(json.firstname); */
        setSelectValue('UHID', json.UHID);
    setSelectValue('tl_patient_name', json.FirstName+" "+ json.LastName);
    //setSelectValue('tel-input-staff', json.Mobile);
    //setSelectValue('gender', json.Gender);
    setSelectValue('tl_age_wife', json.Age);
    setSelectValue('tl_address', json.Address);
}
  /*------------------------*/
// setSelectValue (id, val) {}is in footer
function resetform(formID){
  //alert("hello");
  $(formID).trigger("reset");
}
function toast(){
  swalSuccess("New user Created");
}

/* ajax form submission */
$( "form#tl_submit_form" ).on( "submit", function( event ) {
 event.preventDefault();// avoid to execute the actual submit of the form.
  var formData = new FormData(this);
  var ot_id = "<?php if(isset($_GET['opt_id'])){echo $_GET['opt_id'];}else {
    echo "";
  };
  ?>";
  formData.append('ot_id',ot_id);
  console.log("Form data is : "+$(this).serialize());
  var get_url=$(this).serialize();
  //alert("hello world");
    var url = "addpatient_vt.php"; // the script where you handle the form input.
  //validateForm(event)
  var test=validateForm(event);

  if (test==true){        //alert("hello in if loop");
      $.ajax({
           type: "POST",
           url: url,
           data: formData, // serializes the form's elements.
           success: function(data)
           {
            console.log("return Data is : "+data);
            if(data!="unsuccesful" && data !="" ){
              //swalSuccess(data);//alert
              swalSuccess("tests Successfully added");//alert
              //save_reciept(get_url);
              patientid = document.getElementById('tl_ipd_opd_ID').value;
              //var test1 = document.forms["pat_update_form"]["sub_test-0"];
              var test1 = "";
              var test2 = "";
              var test3 = "";
              var test4 = "";
              var test5 = "";
              var today = new Date();
              date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear()+' at '+ today.getHours() + ":" + today.getMinutes();
              var json = JSON.parse(data);
              console.log(`name is ${json[0].FirstName} ${json[0].LastName} :: contact no ${json[0].Mobile}`);
              send_sms.welcome_patho("welcome_patho",`${json[0].Mobile}`,`${json[0].FirstName} ${json[0].LastName}`,`${patientid}`,`${date}`,`${test1}`,`${test2}`,`${test3}`,`${test4}`,`${test5}`);
            //alert("this is ajax loop  " + data);
            //on success take form data and enter to any page you require be it IPD or OPD or Patho.
            document.getElementById("tl_submit_form").reset();
            setTimeout(function(){ location.href = "<?php echo BASE_URL;?>/index.php"; }, 3000);
              //location.href = "/list_all_tests_registered_pathology.php#1b";
            }else{
              swalError('Some error occured, please try again after some time.');
            }
           },
          cache: false,
          contentType: false,
          processData: false
         });
      }else {}
});
function save_reciept(formData){
              console.log("in save reciept ::: :: ::: "+formData);
              swalSuccess("New test Registered.");//alert
              $.ajax({
                 type: "GET",
                 url: "/invoice/set_invoice.php",
                 data: formData,// serializes the form's elements.
                 success: function(data)
                 {
                  console.log("invoice"+data);
                  //var json = JSON.parse(data);
                  //parseJsonToForm(json);
                  location.href = "/list_all_tests_registered_pathology.php#1b";
                 },
                cache: false,
                contentType: false,
                processData: false
               });
}

/* form submission end here  */
function FillBilling(f) {
  if(f.address_value.checked == true) {
    f.ICE_address.value = f.address.value;
  }
}
/* allow only numbers in input */

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

/*end*/
/*date constraints for child labour*/
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear()-14;
 if(dd<10){
        dd='0'+dd
    }
    if(mm<10){
        mm='0'+mm
    }
today = yyyy+'-'+mm+'-'+dd;
document.getElementById("age-input").setAttribute("max", today);
/*            ----------------------------                      */

function printDiv(divName) {
 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}
///////////////////////validation///////////////////////
function validateForm(){

var test1 = document.getElementById("regId").value;
var test2 = document.getElementById("tl_patID").value;
var test3 = document.getElementById("tl_patient_name").value;
var test4 = document.getElementById("tl_age_husband").value;
var test5 = document.getElementById("tl_age_wife").value;
var test6 = document.getElementById("tl_education_husband").value;
var test7 = document.getElementById("tl_education_wife").value;
var test8 = document.getElementById("tl_living_male").value;
var test9 = document.getElementById("tl_living_female").value;
var test10 = document.getElementById("tl_age_of_last_child_male").value;
var test11 = document.getElementById("tl_age_of_last_child_female").value;
var test12 = document.getElementById("tl_doctor").value;
var test13 = document.getElementById("tl_method").value;
var test14 = document.getElementById("tl_date").value;
var test15 = document.getElementById("tl_monthly_income").value;

if (test1 == "" ){
    swalError("First regID must be filled out");//alert
$("#regId").focus();
$("#regId").addClass('error').removeClass('noerror');
    return false;
}else if (test2 == ""){
    swalError(" patID field is required!");//alert
    $("#tl_patID").focus();
    $("#tl_patID").addClass('error').removeClass('noerror');
     return false;
   }else if (test3 == ""){
       swalError("Patient Name field is required!");//alert
       $("#tl_patient_name").focus();
       $("#tl_patient_name").addClass('error').removeClass('noerror');
        return false;
}else if (test4 == " ") {
    swalError("Age Husband field is required!");//alert
$("#tl_age_husband").focus();
$("#tl_age_husband").addClass('error').removeClass('noerror');
    return false;
}else if (test5 == "" ) {
   swalError("Age Wife field is required!");//alert
$("#tl_age_wife").focus();
$("#tl_age_wife").addClass('error').removeClass('noerror');
    return false;
}else if (test6 == "" ) {
     swalError("Education Husband field is required!");//alert
  $("#tl_education_husband").focus();
  $("#tl_education_husband").addClass('error').removeClass('noerror');
      return false;
}else if (test7 == "" ) {
         swalError("Education Wife field required!");//alert
      $("#tl_education_wife").focus();
      $("#tl_education_wife").addClass('error').removeClass('noerror');
          return false;
}else if (test8 == "" ) {
        swalError("living Male field is required!");//alert
        $("#tl_living_male").focus();
        $("#tl_living_male").addClass('error').removeClass('noerror');
                  return false;
}else if (test9 == "" ) {
    swalError("living Female field is required!");//alert
    $("#tl_living_female").focus();
    $("#tl_living_female").addClass('error').removeClass('noerror');
      return false;
}else if (test10 == "" ) {
   swalError("Age of last child male field is required!");//alert
   $("#tl_age_of_last_child_male").focus();
   $("#tl_age_of_last_child_male").addClass('error').removeClass('noerror');
          return false;
}else if (test11 == "" ) {
    swalError("Age of last child female field is required!");//alert
    $("#tl_age_of_last_child_female").focus();
    $("#tl_age_of_last_child_female").addClass('error').removeClass('noerror');
      return false;
}else if (test12 == "" ) {
    swalError("Doctor field is required!");//alert
    $("#tl_doctor").focus();
    $("#tl_doctor").addClass('error').removeClass('noerror');
      return false;
}else if (test13 == "" ) {
      swalError("Method field is required!");//alert
      $("#tl_method").focus();
      $("#tl_method").addClass('error').removeClass('noerror');
        return false;
}else if (test14 == "" ) {
      swalError("Date field is required!");//alert
      $("#tl_date").focus();
      $("#tl_date").addClass('error').removeClass('noerror');
        return false;
}else if (test15 == "" ) {
    swalError("Monthly Income field is required!");//alert
    $("#tl_monthly_income").focus();
    $("#tl_monthly_income").addClass('error').removeClass('noerror');
      return false;

}else{ return true;}
}

//////////////////////////////////////////////////////


function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}

function dropdown_sub_test(parentselect,childselect){
  /* document.querySelector(parentselect).onchange = function(){
     alert(this.selectedOptions[0].getAttribute('data-attr'));
  }; */
parentselect=`#${parentselect}`;
//childselect=`#${childselect}`;
  console.log(`value of ${parentselect}`);
  var amount=$(parentselect).find(':selected').attr('data-amount');
  console.log(`value of ${parentselect} :::::: amount is ${amount} :::: childselectvalue ${childselect}`);
  setValue(childselect,`${amount}`)
  update_price();
  update_balance();
}


function dropdown_sub(parentselect,childselect){
$( "select[name='"+parentselect+"']" ).change(function () {
    var main_test_name = $(this).val();


    if(main_test_name) {
        $.ajax({

            url: "get_all_patho_sub_category_by_main_category.php",
            Type: 'GET',
            data: {'dr_ID':main_test_name},
            success: function(data) {
                $('select[name="'+childselect+'"]').empty();
        $('select[name="'+childselect+'"]').append('<option value="" disabled selected> Select test</option>');
        var json = JSON.parse(data);
        for (var i = 0; i < json.length; i++) {
          $('select[name="'+childselect+'"]').append('<option  data-amount="'+json[i].PathologyTestCharges+'" value="'+json[i].PathologySubCategoryID+'" data-subtestname="'+json[i].PathologySubCategoryName+'">'+json[i].PathologySubCategoryName+'</option>');
        }
      }
        });

    }else{
        $('select[name="'+childselect+'"]').empty();
    $('select[name="'+childselect+'"]').append('<option value="" disabled selected> Select test</option>');
    }
});
}

function setValue (id, val) {
  console.log(`ID is : ${id} ::: value is : ${val}`);
  var test = $("input[id="+id+"]");
  test.val(`${val}`);
  //test.data("Value",`${val}` );
  console.log("ID is : EOL'"+id+"' ::: value is : EOL "+val);
  //document.getElementById(id).value=val;
}

function update_price() {
 var price=0;
 var amount=0;
 for(i=0;i<=4;i++){
   var name=`#sub_test_amount-${i}`;
  var len = $(`${name}`);
  //console.log(`${name}`);
  var price = Number(len.val());
 //console.log("price is "+Number(price));
  //price = roundNumber(price,2);
  //isNaN(price) ? row.find('.price').val("N/A") : row.find('.price').val(price);

  amount += price;
 }
 amount=roundNumber(amount,2);
 setValue("total",amount);
}

function update_balance() {
  var due = $("#total").val().replace("₹","") - $("#advance").val().replace("₹","");
  due = roundNumber(due,2);
  $('#balance').val(due);
  //$('.due').html(due);
}

function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    }
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}
</script>

<?php
$pageTitle = "Add VT Details"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include  $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
