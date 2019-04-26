  <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
 if(isset($_GET['ID'])){$ID=$_GET['ID'];$ID_encoded=base64_encode($_GET['ID']);}else{$ID="0";}
?>
<?php include './include/header.php';?>

<style>
.form_header{
    border-bottom: dashed 1px #d1d0d0;
    padding-bottom: 10px;}
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
.card-block:hover{    box-shadow: 3px 3px 3px 0.2rem #868e96;}
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
body{background-color:#ffffff!important;}
@media print {

	body * { visibility: hidden; }
	.section-notto-print, .section-notto-print * {
		visibility:none;
		display:none;
	}
	#qrcode{
		    margin-top: 5%;
	}
  .section-to-print, .section-to-print * {
    visibility: visible;
  }
  .section-to-print {
	padding:10px!important;
	margin-top:5px;
    position: absolute;
    left: 0;
    top: 0;
  }
  .cke_top{
		visibility:none;
		display:none!important;
	}
}
.main div.content {
  all: revert;
}
.add_row:hover {
    transition: 0.70s;
    -webkit-transition: 0.70s;
    -moz-transition: 0.70s;
    -ms-transition: 0.70s;
    -o-transition: 0.70s;
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
}.rgt{    padding: 0 0 0 30px;}

/*****@@@@@@@@material input@@@@@@@@*********/
.group        {
  position:relative;
  margin-bottom:45px;
}
.material_input		{
  font-size:18px;
  padding:10px 10px 10px 5px;
  display:block;
  width:100%;
  border:none;
  border-bottom:1px solid #757575;
}
.material_input:focus     { outline:none; }
.label_material_input          {
  color:#999;
  font-size:18px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:5px;
  top:10px;
  transition:0.2s ease all;
}

/* active state */
.material_input:focus ~ .label_material_input, .material_input:valid ~ .label_material_input     {
  top:-20px;
  font-size:14px;
  /* color:#5264AE; */
  color:#689F38;
}
.material_input:read-only ~ .label_material_input, .material_input:valid ~ .label_material_input     {
  top:-20px;
  font-size:14px;
  /* color:#5264AE; */
  color:#asdasd;
}
/* BOTTOM BARS ================================= */
.bar_label  { position:relative; display:block; width:100%; }
.bar_label:before, .bar_label:after   {
  content:'';
  height:2px;
  width:0;
  bottom:1px;
  position:absolute;
  /* background:#5264AE;  */
  background:#689F38;
  transition:0.2s ease all;
}
.bar_label:before {
  left:50%;
}
.bar_label:after {
  right:50%;
}

/* active state */
.material_input:focus ~ .bar_label:before, .material_input:focus ~ .bar_label:after {
  width:50%;
}
/* HIGHLIGHTER ================================== */
.highlight {
  position:absolute;
  height:60%;
  width:100px;
  top:25%;
  left:0;
  pointer-events:none;
  opacity:0.5;
}

/* active state */
.material_input:focus ~ .highlight {
  animation:inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@keyframes inputHighlighter {
  /* from  { background:#5264AE; } */
  from  { background:#689F38; }
  to    { width:0; background:transparent; }
}
/*Radio =============*/
@keyframes click-wave {
  0% {
    height: 20px;
    width: 20px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 100px;
    width: 100px;
    margin-left: -40px;
    margin-top: -40px;
    opacity: 0;
  }
}

.option-input_radio {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  /* top: 13.33333px; */
  top: 5.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 20px;
  width: 20px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input_radio:hover {
  background: #9faab7;
}
.option-input_radio:checked {
  background: #689F38;
}
.option-input_radio:checked::before {
  height: 20px;
  width: 20px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 16.66667px;
  text-align: center;
  line-height: 20px;
}
.option-input_radio:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #689F38;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input_radio.radio {
  border-radius: 50%;
}
.option-input_radio.radio::after {
  border-radius: 50%;
}
.allergy{color:red;}
</style>
<link href="/dist/css/patient_consulting_form.css" rel="stylesheet" />
<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
<div class="container section-to-print" id="reg-form-container" style="/* padding-left:50px; */margin-top:15px;">
	<form method="post" action="" id="ipd_patient_detail_Form">
<!--<div class="aspNetHidden">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTQzNDAxMTA0Nw8WAh4TVmFsaWRhdGVSZXF1ZXN0TW9kZQIBZGQd2lJur4DW7GoAkDrLrc2rVNfd4J3194YVWYOc3verbw==" />
</div>-->

<!--<div class="aspNetHidden">

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="" />
</div>-->
			<div class="row justify-content-between"style="padding-left:50px;padding-right:50px;">

				<div id="previous" class="col-md-1 section-notto-print btn btn-outline-primary">Previous</div>
				<div id="next" class="col-md-1 section-notto-print btn btn-outline-primary">Next</div>
			</div>
			<hr class="section-notto-print">
			<br class="section-to-print">
			<br class="section-to-print">
			<br class="section-to-print">
        <div class="hmms_report section-to-print" id="get_text_qr">
            <div class="hmms_hdr row justify-content-center ">
                <div class="hmms_hdr_lft col-md-6">
                    <div class="row justify-content-center ">
                        <div class="col-md-12">
							<div class="row justify-content-center">
								<div class="col-md-4">Patient ID</div>
								<div class="col-md-1"> : </div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblpatid"><?php /*echo $ID;*/?><img id="barcode_img"/></span></div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-4">Patient Name</div>
								<div class="col-md-1"> : </div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblptname"></span></div>
							</div>
							<!--<tr>
								<td>Ref. By</td>
								<td>:</td>
								<td class="font-RobotoBold"><span id="ctl00_lblrefdr"></span></td>
							</tr> -->
							<div class="row justify-content-center">
								<div class="col-md-4">Cons. Dr.</div>
								<div class="col-md-1"> : </div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lbldr"></span></div>
							</div>
                        </div>
                    </div>
                </div>
                <div class="hmms_hdr_rgt col-md-6">
                   <div class="row justify-content-center ">
                        <div class="col-md-12">
							<div class="row justify-content-center">
								<div class="col-md-4">Reg. ID</div>
								<div class="col-md-1">:</div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblregID"></span></div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-4">Date Admitted</div>
								<div class="col-md-1">:</div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblvisitdate"></span></div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-4">Age/Sex</div>
								<div class="col-md-1">:</div>
								<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblage_sex"></span></div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-4">Patient Label</div>
								<div class="col-md-1">:</div>
								<div class="col-md-7 font-RobotoLight"><img id="barcode1"/></div>
							</div>
							<div class="row justify-content-center">
								<!--<br>-->
							</div>
						</div>
					</div>
				</div>
                <div class="col-md-12 header_pat_details">
					<div class="hmms_hdr row justify-content-center ">
						<div class="rgt col-md-6">
							<div class="row justify-content-center ">
								<div class="col-md-12">
									<div class="row justify-content-center">
										<div class="col-md-4">Ward No.</div>
										<div class="col-md-1"> : </div>
										<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblward"></span></div>
									</div>
									<div class="row justify-content-center">
										<div class="col-md-4">Bed No.</div>
										<div class="col-md-1"> : </div>
										<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblbed"></span></div>
									</div>
									<div class="row justify-content-center">
										<div class="col-md-4">Bed type.</div>
										<div class="col-md-1"> : </div>
										<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblbed_type"></span></div>
									</div>
									<div class="row justify-content-center">
										<div class="col-md-4">Is MLC</div>
										<div class="col-md-1"> : </div>
										<div class="col-md-7 font-RobotoLight"><span id="ctl00_lblmlc"></span></div>
									</div>
								</div>
							</div>
						</div>
						<div class="lft col-md-6">
							<div class="row justify-content-center ">
								<div class="col-md-12">
									<div class="row justify-content-center">
										<div class="col-md-4">Discharge date/time.</div>
										<div class="col-md-1"> : </div>
										<div class="col-md-7 font-RobotoLight"><span id="ctl00_lbldischargedt"></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="ctl00_AdminID" id="AdminID" value="<?php echo $userDetails->ID;?>"/>
				<input type="hidden" name="ctl00_ptID" id="ctl00_ptID" value="<?php echo $ID; ?>" />
				<div class="hmms_hdr col-md-12">
					<div class="">
						<div class="hmms_title">In Patient Case Form</div>
					</div>
					<div class="row justify-content-center " style="margin:0px!important;"><!--/* profile_tbl */-->
						<div class="col-md-12/* width-100 */">
							<div class="row justify-content-center ">
								<div class="col-md-12">
									 <div class="group">
										<input type="text" id="past_history" name="past_history" class="material_input" required>
										<span class="highlight"></span>
										<span class="bar_label"></span>
										<label class="label_material_input" for="past_history">Past History of Patient</label>
									  </div>
								</div>
								<div class="col-md-12">
									 <div class="group">
										<input type="text" id="immunization" name="immunization" class="material_input" required>
										<span class="highlight"></span>
										<span class="bar_label"></span>
										<label class="label_material_input" for="past_history">Immunization </label>
									  </div>
								</div>
								<div class="col-md-12">
									<div>
										Personal History :
									</div>
									<div class="row justify-content-center">
										<label class="col-md-2">
											<input type="checkbox" class="option-input_radio checkbox" name="smok" id="smok"  />
											Smoking
										</label>
										<label class="col-md-2">
											<input type="checkbox" class="option-input_radio checkbox" name="alco" id="alco" />
											Alcohol
										</label>
										<label class="col-md-2">
											<input type="checkbox" class="option-input_radio checkbox" name="chew" id="chew" />
											Chewing
										</label>
										<label class="col-md-2">
											<input type="checkbox" class="option-input_radio checkbox" name="veg" id="veg" />
											Vegetarian
										</label>
										<label class="col-md-2">
											<input type="checkbox" class="option-input_radio checkbox" name="non_veg" id="non_veg" />
											Non vegetarian
										</label>
									</div>
								</div>
								<div class="col-md-12">
									 <div class="group" style="margin-top:45px;">
										<input type="text" id="allergy" name="allergy" class="material_input" required>
										<span class="highlight"></span>
										<span class="bar_label"></span>
										<label class="label_material_input allergy" for="allergy" ><b>H/O Allergy</b> </label>
									  </div>
								</div>
								<div class="col-md-12 font-RobotoBold /* width-30 */"><h5>Symptoms <small>:</small></h5></div>
								<div class="col-md-12">
									<textarea name="ctl00_ptsymptoms" rows="6" type="text"  id="ctl00_ptsymptoms" class="text-area-opd-detail  width-100 clearable" ></textarea></div>
									<div class="col-md-12"> <br></div>
								<div class="col-md-12 font-RobotoBold /* width-30 */"><h5>Provisional Diagnosis <small> :</small></h5> </div>
								<div class="col-md-12"  >
									<textarea name="ctl00_diagnosis" rows="6" type="text"  id="ctl00_diagnosis" class="text-area-opd-detail  width-100 clearable" ></textarea></div>
									<div class="col-md-12"> <br></div>
								<div class="col-md-12 font-RobotoBold /* width-30 */"><h5>Prescription<small> :</small></h5></div>
								<div class="col-md-12" >
									<textarea name="ctl00_ptprescription" rows="6" type="text"  id="ctl00_ptprescription" class="text-area-opd-detail /* width-100 */ clearable"></textarea>
								</div>
								<div class="col-md-12" id="table_scroll_1"> <br></div>
								<div class="col-md-12 font-RobotoBold /* width-30 */"><h5>Advice Notes <small>:</small></h5></div>
								<div class="col-md-12" >
									<textarea name="ctl00_ptpdischarge" rows="6" type="text"  id="ctl00_ptpdischarge" class="text-area-opd-detail /* width-100 */ clearable"></textarea>
								</div>
								<div class="col-md-12"> <br></div>
								<div class="col-md-12 font-RobotoBold /* width-30 */"><h5>Daily Findings <small>:</small></h5></div>
								<div class="col-md-12">
									<br>
              <div id="table_scroll">
               <table class="table table-bordered">
                 <thead class="thead-dark">

                   <th>Date</th>
                   <th>Time</th>
                   <th>comments</th>
                    <th>Uplod</th>
                    <th>save</th>

                 </thead>
                 <tr>
                   <td>
                   	<input name="Df_date_real" class="form-control noerror" type="date" value=""  id="Df_date_real" >
                   </td>
                   <td>
                     	<input type="time"  class="form-control-plaintext" id="Df_time_real" name="Df_time_real" >
                   </td>
                    <td>
                       	<textarea class="form-control-plaintext"  tabindex="-1" placeholder="Enter the comment" name="Df_comment_real" id="Df_comment_real" style="width: 100%; resize: none;" ></textarea>
                    </td>
                    <td>
                      <INPUT TYPE="button" name="Df_upload_real"class="btn btn-success" Value="Upload" onClick="getfile()"/>
                    </td>
                    <td>
                       <button type="submit" class="btn btn-success" name="Df_save_real" id="ctl00_btnSave">Save</button>
                    </td>

                 </tr>
              </table>
            </div>


           <br>
           <br>
           <br>
     <!-- ///// this is just for grtting count of entrie to show the border of table -->
               <?php
               $db = getDB();

               $statement=$db->prepare("SELECT * FROM `round_doctor_comments`
                             WHERE `Patient_id`=:ID");
               $statement->bindParam(':ID',$ID , PDO::PARAM_STR );
               $statement->execute();
               $result=$statement->fetchAll(PDO::FETCH_ASSOC );
               $count = $statement->rowCount();

             echo"<input type='text' id='count_entry' name='count_entry' value='".$count."' hidden/>"
               ?>
								<table class="table table-bordered" id="update_block">
									<thead class="thead-dark">

										<th>Date</th>
										<th>Time</th>
										<th>comments</th>
                    <th>View</th>
                    <th>update</th>
									</thead>
                  <?php
            			$db = getDB();

            			$statement=$db->prepare("SELECT * FROM `round_doctor_comments`
            										WHERE `Patient_id`=:ID ORDER BY `round_doctor_comments`.`id` ASC");
            			$statement->bindParam(':ID',$ID , PDO::PARAM_STR );
            			$statement->execute();
            			$result=$statement->fetchAll(PDO::FETCH_ASSOC );

            			foreach ($result as $row1){

            						           echo '<tr class="item-row " id="table_row" ><td><input name="Df_date[]" class="form-control noerror" type="date" value="'.$row1['round_date'].'"  id="Df_date"></td><td>	<input type="time"  class="form-control-plaintext" id="Df_time" name="Df_time[]" value="'
                                   .$row1['round_time'].'"></td><td><textarea class="form-control-plaintext" id="Df_comment" tabindex="-1" placeholder="Enter the comment" name="Df_comment[]" style="width: 100%; resize: none;" readonly>'
                                   .$row1['round_comments'].'</textarea></td>
                                   </td><td><button type="button" id="Df_View[]" class="btn btn-success" name="Df_View[]"  onClick="getMyImage(this)" data-view="'.$row1['avatar'].'">View</button></td><td>
                                   <button type="button" class="btn btn-success" name="Df_update[]" id="Df_update[]" onClick="scroll_me(this)"
                                    data-date="'.$row1['round_date'].'" data-time="'.$row1['round_time'].'" data-comment="'.$row1['round_comments'].'">Update</button></td></tr>';


            				}
            		  ?>

                  <!--for opening the file choose option  -->
								</table>

                  <input type="file" name="my_file" id="my_file" accept="image/*" onchange="readFile(event)" hidden>
							</div>
								<div class="col-md-12" >

								</div>
							</div>
						</div>
					</div>
					<div class="row justify-content-center section-notto-print" style="margin:0px!important;">
						<div class="hmms-rptnote">
							<span></span>
						</div>
						<div class="hmms-click section-notto-print" style="padding-right:5px;">
							<button type="button" class="spin btn btn-outline-danger" id="button_print"><i class="fal fa-print fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Print </button>
						</div>
						<div class="hmms-click section-notto-print">
							<button type="submit" class="spin btn btn-outline-teal section-notto-print" id="ctl00_btnSave" name="ctl00_btnSave"  href="javascript:void(0)" style=""> <i class="fal fa-save fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Save</button>
						</div>
						<div class="hmms-reset section-notto-print">
							<button type="button" class="spin btn btn-outline-danger section-notto-print" id="ctl00_btnReset" onclick="javascript: reset_text_box();"> <i class="fal fa-repeat-alt fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Clear </button>
						</div>
					</div>
				</div>
			</div>

<!-- ////just for adding base 64 url/////////////////////// -->
<input type="text" value="" id="base64" name="base64" hidden/>

			<div class="row justify-content-center">
				<div id="qrcode"></div>
			</div>
		</div>
    </form>


					<br><br>
</div>
</div>
<script src="/ckeditor/ckeditor.js"></script>


<script>
debugger;
var count=document.getElementById("count_entry").value;
if(count == 0 || count == null){

    $("#update_block").hide();

}else {

      $("#update_block").show();

}
////////////////////get my image function Aj//////////////////////////

function getMyImage(e){
debugger;
var nameofimage = e.getAttribute("data-view");
var win=window.open("upload/doctor_round_img/"+nameofimage,'_blank');
  win.focus();
}
//////////////////////////////////////////////////////////////////////////


var count_dynamic =0;   ///counter for dynamic row
//adding row dynamically for daily findings
function getfile(){
debugger;
  $('#my_file').click();
}


     //deleting dynamically created row
$( document ).on( "click", ".delete", function(){
  $(this).parents('.item-row').remove();

  count_dynamic = count_dynamic -1;


  });

 $("#Daily_finding_date").datepicker({

        format: "dd MM yyyy - hh:ii"
    });



</script>
<script>

/////////////////////////// scroll Aj////////////////////
function scroll_me(e) {
  debugger;
   var date =e.getAttribute('data-date');
   var time =e.getAttribute('data-time');
   var comment=e.getAttribute('data-comment');

   document.getElementById("Df_date_real").value=date;
   document.getElementById("Df_time_real").value=time;
   document.getElementById("Df_comment_real").value=comment;


    $('html, body').animate({
        scrollTop: $("#table_scroll_1").offset().top
    }, 500);
}

////////////////////////////////////////////////////////////




var patient_round_id;
$(document).ready(function() {

  $('.material_input').blur(function() {
    // check if the input has any value (if we've typed into it)
    if ($(this).val())
      $(this).addClass('used');
    else
      $(this).removeClass('used');
  });

});
/*CKEDITOR.replace( 'ctl00_ptsymptoms', {customConfig: '/ckeditor/config.js'});
CKEDITOR.replace( 'ctl00_diagnosis', {customConfig: '/ckeditor/config.js'});
CKEDITOR.replace( 'ctl00_ptprescription', {customConfig: '/ckeditor/config.js'});
CKEDITOR.replace( 'ctl00_ptpdischarge', {customConfig: '/ckeditor/config.js'});
*/
/**------set patient data symptom,diagnosis,prescription according to patID------**/

var ID= "<?php echo $ID;?>";
var ID_encode= "<?php echo $ID_encoded;?>";
<?php
	$userDetails=$userClass->userDetails($session_id);
	$var = $userDetails->roleid;
	if($var == "8" || $var == "15"){
		echo '$("form :input").attr("readonly", true);';
		echo "\n";
		}
	?>
function pad(number, length) {

    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
    return str;
}
$("#next").on('click',function(){
	//var string = "border-radius:10px 20px 30px 40px";
	var numbers = ID.match(/\d+/g).map(Number);
	numbers = Number(numbers)+1;
	numbers = pad(numbers,8);
	numbers =`IPD${numbers}`;
	console.log(`the numbers are ${numbers}`);
	var url_next=`/IPD_patient_detail_printable.php?ID=${numbers}`;
	$.ajax({
		   type: "GET",
		   url: '/get_patient_detail_by_ipd_ID.php',
		   data: 'IDnormal='+numbers+'&ID='+numbers+'',
		   success: function(data)
		   {
				if(data!=""){
					window.location.replace(url_next);
				}else{swalError("Patient list finished");}
			},
			cache: false,
			contentType: false,
			processData: false
		 });
	//window.location=`/OPD_patient_detail_printable.php?ID=${incrementID}`;
});
$("#button_print").on('click',function(){
	//swalSuccess("print");
	window.print();
});


$("#previous").on('click',function(){
	//var string = "border-radius:10px 20px 30px 40px";
	var numbers = ID.match(/\d+/g).map(Number);
	numbers = Number(numbers)-1;
	numbers = pad(numbers,8);
	numbers =`IPD${numbers}`;
	console.log(`the numbers are ${numbers}`);
	var url_next=`/IPD_patient_detail_printable.php?ID=${numbers}`;
	$.ajax({
		   type: "GET",
		   url: '/get_patient_detail_by_ipd_ID.php',
		   data: 'IDnormal='+numbers+'&ID='+numbers+'',
		   success: function(data)
		   {
				if(data!=""){
					window.location.replace(url_next);
					//window.location=url_next;
				}else{swalError("Patient list finished");}
			},
			cache: false,
			contentType: false,
			processData: false
		 });
	//window.location=`/OPD_patient_detail_printable.php?ID=${incrementID}`;
});
if (ID=="0"){swal({
              title: "Patient data not available",
              text: "Please reload the page, to try again",
              icon: "warning",
              //timer: 2000,
			  button:false
	});}
else{
$( "form#ipd_patient_detail_Form" ).on( "submit", function( event ) {
	event.preventDefault();// avoid to execute the actual submit of the form.

			//var formData = $("form#ipd_patient_detail_Form").serialize()
			console.log("formData : "+$("form#ipd_patient_detail_Form").serialize());
			//alert("Submitted");

			/*CKEDITOR.instances.ctl00_ptsymptoms.updateElement();
			CKEDITOR.instances.ctl00_diagnosis.updateElement();
			CKEDITOR.instances.ctl00_ptprescription.updateElement();
			CKEDITOR.instances.ctl00_ptpdischarge.updateElement();*/

			console.log("formData : "+$("form#ipd_patient_detail_Form").serialize());
			var formData = $("form#ipd_patient_detail_Form").serialize();
			if(validateform()){
				$.ajax({
			   type: "POST",
			   url:"/set_ipd_case_paper.php",
			   data: formData,
			   success: function(data)
			   {
				console.log("data : "+data);
				swalSuccess("Patient Data Updated.");
        setTimeout(myFunction,500);

			   },
			   cache : false,
			   processData: false,
			   error: function(xhr, status, error) {
				  var err = eval("(" + xhr.responseText + ")");
				  console.log(err.Message);
				}
			 });
			}

		/* }); */
	});

  function myFunction(){
    location.reload();
  }
/**----- get patient data from patientregistrationmaster+patientopd+patientdetails -----**/

	$.ajax({
		   type: "GET",
		   url: '/get_patient_detail_by_ipd_ID.php',
		   data: 'ID='+ID_encode+'',
		   success: function(data)
		   {
				console.log("data :: "+data);
				if(data!=""){
					var json = JSON.parse(data);
					parseJsonToForm(json);
				}else{
					console.log("hello");
					//window.location="/gibberish.php";
				}

		   },error: function (error) {
			alert('error; ' + eval(error));
			},
			cache: false,
			contentType: false,
			processData: false
		 });
		 function parseJsonToForm(json){

			var name = json.FirstName+"&nbsp"+json.LastName;
			var age_sex = json.Age+" / "+json.Gender;
			var doctor_assigned = "";
			var date_visit = json.admit_date_time;
			var time = date_visit.substring(11,19);
			var date_visit = date_visit.substring(0,11);
			var date_visit= date_visit.split("-").reverse().join("-").replace(" ","");

			var ddatetime=json.discharge_date_time;
			if(!(json.discharge_date_time)){dtime="N.A.";ddatetime="N.A."}else{
			var dtime = ddatetime.substring(11,19);
			var ddatetime = ddatetime.substring(0,11);
			var ddatetime= ddatetime.split("-").reverse().join("-").replace(" ","");
			}
			if(!(json.doctor_assigned)){doctor_assigned="N.A.";}else{doctor_assigned = json.doctor_assigned;}
			if(isNaN(doctor_assigned)){
							setInnerValue('ctl00_lbldr',doctor_assigned);
			}else{
				var doctor_assigned = get_dr_name(doctor_assigned);
			}
			var is_MLC = json.isMLC;
			var bed_no = json.bed_name;
			var wardno = json.ward_name;
			var bed_type = json.bed_type;
      patient_round_id=json.patientID;
			console.log(name+"::"+age_sex+"::"+doctor_assigned+"::"+date_visit+"::"+json.patientID);
			//document.getElementById(ctl00_lblpatid).innerHTML=json.patientID;
			//setInnerValue('ctl00_lblpatid', json.patientID);
			setInnerValue('ctl00_lblptname', name);
			setInnerValue('ctl00_lblmlc', is_MLC);
			setInnerValue('ctl00_lblbed', bed_no);
			setInnerValue('ctl00_lblward', wardno);
			setInnerValue('ctl00_lblbed_type', bed_type);
			setInnerValue('ctl00_lbldischargedt', `${ddatetime} at ${dtime} IST`);

			setInnerValue('ctl00_lblregID', json.RegID);
			JsBarcode('#barcode1', json.RegID,{height:20,font:"Roboto",displayValue:true,margin:0,fontSize:10});
			JsBarcode('#barcode_img',json.patientID,{height:20,font:"Roboto",displayValue:true,margin:0,fontSize:13});
			setInnerValue('ctl00_lblvisitdate', `${date_visit}`);
			setInnerValue('ctl00_lblage_sex', age_sex);
			var symptom_for_qr ="";
			var diagnosis_for_qr ="";
			var prescription_for_qr ="";
			if(!(json.symptoms)){}else{
			setSelectValue('ctl00_ptsymptoms',json.symptoms);
			symptom_for_qr = json.symptoms;
			}
			if(!(json.diagnosis)){}else{
			setSelectValue('ctl00_diagnosis',json.diagnosis);
			diagnosis_for_qr = json.diagnosis;
			}
			if(!(json.precription)){}else{
			setSelectValue('ctl00_ptprescription',json.precription);
			prescription_for_qr = json.precription;
			}
			if(!(json.past_history)){}else{
			setSelectValue('past_history',json.past_history);
			past_history = json.past_history;
			}
			if(!(json.immunization)){}else{
			setSelectValue('immunization',json.immunization);
			immunization = json.immunization;
			}
			if(!(json.allergy)){}else{
			setSelectValue('allergy',json.allergy);
			allergy = json.allergy;
			}
			if(!(json.discharge_note)){}else{
			setSelectValue('ctl00_ptpdischarge',json.discharge_note);
			discharge_note = json.discharge_note;
			}
			if(!(json.smok)){}else{
			if(json.smok == "on");{
				document.getElementById("smok").checked = true;
			}
			smok = json.smok;
			}
			if(!(json.alco)){}else{
			if(json.alco == "on");{
				document.getElementById("alco").checked = true;
			}
			alco = json.alco;
			}
			if(!(json.chew)){}else{
			if(json.chew == "on");{
				document.getElementById("chew").checked = true;
			}
			chew = json.chew;
			}
			if(!(json.veg)){}else{
			if(json.veg == "on");{
				document.getElementById("veg").checked = true;
			}
			veg = json.veg;
			}
			if(!(json.non_veg)){}else{
			if(json.non_veg == "on");{
				document.getElementById("non_veg").checked = true;
			}
			non_veg = json.non_veg;
			}
			var textContent = "Patient Name : "+json.FirstName+" "+json.LastName+" ::: Registration ID : "+json.RegID+"\n Dr. Assigned : "+doctor_assigned+"  ::: Date : "+date_visit+"\n Symptom : "+symptom_for_qr+"\n Diagnosis : "+diagnosis_for_qr+"\n Prescription : "+prescription_for_qr+" Past history "+past_history;
			console.log("value is : "+textContent);

/* var qrcode = new QRCode("qrcode", {
    text: textContent,
    width: 200,
    height: 200,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
}); */
	}
/* 	function parseJsonToForm(json){
			var name = json.FirstName+"&nbsp"+json.LastName;
			var age_sex = json.Age+" / "+json.Gender;
			var doctor_assigned = "";
			var date_visit = json.visit_date;
			//var date_visit = date_visit.substring(0,11);
			//var date = json[i].WhenEntered;
			var time = date_visit.substring(11,19);
			var date_visit = date_visit.substring(0,11);
			var date_visit= date_visit.split("-").reverse().join("-");
			if(!(json.doctor_assigned)){doctor_assigned="N.A.";}else{doctor_assigned = json.doctor_assigned;}
			console.log(name+"::"+age_sex+"::"+doctor_assigned+"::"+date_visit+"::"+json.patientID);
			//document.getElementById(ctl00_lblpatid).innerHTML=json.patientID;
			setInnerValue('ctl00_lblpatid', json.patientID);
			setInnerValue('ctl00_lblptname', name);
			setInnerValue('ctl00_lbldr',doctor_assigned);
			setInnerValue('ctl00_lblregID', json.RegID);
			JsBarcode('#barcode1', json.RegID,{height:20,font:"Roboto",displayValue:true,margin:0,fontSize:10});
			setInnerValue('ctl00_lblvisitdate', date_visit);
			setInnerValue('ctl00_lblage_sex', age_sex);
			if(!(json.symptom)){}else{
//			setSelectValue('ctl00_ptsymptoms',json.symptom);
			}
			if(!(json.diagnosis)){}else{
			setSelectValue('ctl00_diagnosis',json.diagnosis);
			}
			if(!(json.prescription)){}else{
			setSelectValue('ctl00_ptprescription',json.prescription);
			}
			var body = document.getElementById("get_text_qr");
var textContent =  body.innerText;
console.log(textContent);
//console.log("value is : "+$("#get_text_qr textarea").val());

var qrcode = new QRCode("qrcode", {
    text: textContent,
    width: 250,
    height: 250,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});
	} */



	/* setSelectValue (id, val) {}is in footer*/

	function setInnerValue (id, val) {/*function to st inner HTML of elements */
		console.log("ID is : '"+id+"' ::: inner value is : "+val);
		document.getElementById(id).innerHTML=val;
	}

	function reset_text_box() /*Function to clear text*/
	{

 		$("#ctl00_ptsymptoms").val("");
		$("#ctl00_diagnosis").val("");
		$("#ctl00_ptprescription").val("");
		$("#ctl00_ptpdischarge").val("");
		/*CKEDITOR.instances.ctl00_ptsymptoms.setData('<p></p>');
		CKEDITOR.instances.ctl00_diagnosis.setData('<p></p>');
		CKEDITOR.instances.ctl00_ptprescription.setData('<p></p>');
		CKEDITOR.instances.ctl00_ptpdischarge.setData('<p></p>');*/
	}

	/**
	 * Clearable text inputs
	 */
	/* function tog(v){return v?'addClass':'removeClass';}
		$(document).on('input', '.clearable', function(){
			$(this)[tog(this.value)]('x');
		}).on('mousemove', '.x', function( e ){
			$(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
		}).on('touchstart click', '.onX', function( ev ){
			ev.preventDefault();
			$(this).removeClass('x onX').val('').change();
		});$('.clearable').trigger("input");*/

// Uncomment the line above if you pre-fill values from LS or server

		function get_dr_name(doctor_name){
			var dr_name = "";
			console.log("doctoe_name  :: "+doctor_name);
			$.ajax({
							   type: "GET",
							   url:"get_dr_name_by_dr_id_staff_ledger.php",
							   data: { 'dr_ID' : doctor_name},
							   success: function(data)
							   {
								data = JSON.parse(data);
								//console.log("data : "+data);
								//swalSuccess("Patient Data Updated.");
								dr_name = `Dr. ${data.firstname} ${data.lastname}`;
								console.log("Dr_name :: "+`Dr. ${data.firstname} ${data.lastname}`);
								setInnerValue('ctl00_lbldr',dr_name);
							   },
							   error: function(xhr, status, error) {
								  var err = eval("(" + xhr.responseText + ")");
								  alert(err.Message);
								}
							 });
		}
	}
		function validateform(){
			var symptoms = document.forms["ipd_patient_detail_Form"]["ctl00_ptsymptoms"].value;
			var diagnosis = document.forms["ipd_patient_detail_Form"]["ctl00_diagnosis"].value;
			var prescription = document.forms["ipd_patient_detail_Form"]["ctl00_ptprescription"].value;
			var discharge = document.forms["ipd_patient_detail_Form"]["ctl00_ptpdischarge"].value;
			console.log(`${symptoms} : ${diagnosis} : ${prescription} : ${discharge}`);
			if( (symptoms == "" )){
				swalInfo("Symptom not noted","Fields Empty");
				$("#ctl00_ptsymptoms").focus();
				//CKEDITOR.instances.ctl00_ptsymptoms.focus();
				return false
			}else if((diagnosis == "" )){
				swalInfo("diagnosis not noted","Fields Empty");
				$("#ctl00_diagnosis").focus();
				//CKEDITOR.instances.ctl00_diagnosis.focus();
				return false;
			}else if( (prescription=="") ){
				swalInfo("Prescription not noted,\n Enter N.A. if not applicable","Fields Empty");
				$("#ctl00_ptprescription").focus();
				//CKEDITOR.instances.ctl00_ptprescription.focus();
				return false;
			}else if( (discharge=="") ){
				swalInfo("Discharge Note not made,\n Enter N.A. if not applicable","Fields Empty");
				$("#ctl00_ptpdischarge").focus();
				//CKEDITOR.instances.ctl00_ptpdischarge.txtComment.focus();
				return false;
			}else{return true;}
		}
    $("#ctl00_btnSave").on('click',function(){
      //round_time=document.getElementByName('Df_time[]').value;
      // round_date=document.getElementById('Df_date').value;
      // round_comments=document.getElementById('Df_comment').value;
      //console.log(patient_round_id+'round_time='+round_time+'date'+round_date+'comments'+round_comments);
      //var time=round_time.split(':');
      //console.log(time[0]);

      var formData = $("form#ipd_patient_detail_Form").serialize();
      debugger;
      $.ajax({
       type: "POST",
       url:"/set_round_doctor_comments.php",
       data: formData,
       success: function(data)
       {
      console.log("data : "+data);

       },
    });
    });
// $(document).ready(function() {
//   console.log('lksfdhoiiiiiiiii......................'+patient_round_id);
//   		//CKEDITOR.instances.ctl00_ptpdischarge.focus();
//       $.ajax({
//            type: "GET",
//            url: '/get_round_doctor_comments.php',
//            data: 'ID='+patient_round_id+'',
//            success: function(data)
//            {
//
//               //window.location.replace(url_next);
//               console.log("date="+data);''
//               document.getElementById('Df_date').value=data[0].round_date;
//           },
//   });
// });
/////////////////////////////////converting base64_decode Aj////////////////////

function readFile() {
   debugger;
  if (this.files && this.files[0]) {

    var FR= new FileReader();

    FR.addEventListener("load", function(e) {
      var trim_img = e.target.result;
      var trim_img1=trim_img.split(',');
      var x = document.getElementById("base64").value;
       x =  trim_img1[1];
      document.getElementById("base64").value = x;
    });

    FR.readAsDataURL( this.files[0] );
  }


}
document.getElementById("my_file").addEventListener("change", readFile);


////////////////////////////////////////////////////////////////////////////////
</script>
<?php
$pageTitle = "IPD case Paper"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);

?>
<script>
$(document).ready(function() {

});</script>
<?php include './include/footer.php';?>
