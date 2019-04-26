<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(isset($_GET['ID'])){$ID=$_GET['ID'];}else{$ID="";}
if(isset($_GET['pat_id'])){$pat_id=$_GET['pat_id'];}else{$pat_id="";}
?>
<?php include './include/header.php';?>


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
.image_ppimageupload {
	width: 150px;
  height: 150px;
  border: 1px solid #ccc;
}

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
</style>
<!-- <script type='text/javascript' src='/invoice/js/example_opd.js'></script>
<link href="/dist/css/report.css" rel="stylesheet"/> -->

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
	<div class="container" id="reg-form-container" style="padding-left:50px;margin-top:15px;">
<br>

			<div class="card card-outline-info mb-3 ">
			  <div class="card-block heading_bar">
				<h5><!--List of all Patients--> <!--title--></h5>
				<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
			  </div>
			</div>
		<div class="card card-outline-info mb-3  section-to-print" style="margin-bottom: 6rem!important;">
			<div class="card-block" id="print">

				<!--INSERT HERE-->
				<div >
					<br>
					<center>
						<h3 class="hr_special"><?PHP ECHO $hos_name;?></h3>
					</center>
					<hr class="hr_special">
					<center><?PHP ECHO $hos_add;?>, <br>  Mob.: <?PHP ECHO $contact;?></center>
					<hr>
					<br>
				</div>
				<div>
					<h2 align="center">Discharge Summary</h2>
				</div>
        <br>
        <form class="form" id="add_ward_form" name="add_ward_form">
            <!----------inner Container for Discharge summary------------->
            <div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
                <div class="card-block" id="print">
                    <table class="table-borderless" width="100%">

                           <tr><td><strong><u>UHID:</u></strong>&nbsp; &nbsp;<label id="uhid"><label></td><tr>
                           <tr><td><strong>Name:</strong>&nbsp; &nbsp;<label id="name"></label></td></tr>
                           <tr><td><strong>Age:</strong>&nbsp; &nbsp;<label id="age"></label></td></tr>
                           <tr><td><strong>Date of admission:</strong>&nbsp; &nbsp;<label id="admit_date"></label>&nbsp; &nbsp;<strong>TOA:</strong>&nbsp; &nbsp;<label id="admit_time"></label></td>
                           <tr><td><strong>Date of Discharge:</strong>&nbsp; &nbsp;<label id="discharge_date"></label>&nbsp; &nbsp;<strong>TOD:</strong>&nbsp; &nbsp;<label id="discharge_time"></label></td></tr>
                           <tr><td><strong>Dr.Incharge:</strong>&nbsp; &nbsp;<label id="dr_name"></label></td></tr>
                           <tr><td><strong>Diagnosis:</strong>&nbsp; &nbsp;<label id="diagnosis"></label></td></tr>
                           <tr><td><strong>History and clinical findings</strong><br><textarea class="form-control" id="history_finding"
                            name="history_finding" tabindex="-1" style="width:100%;resize: none;" ></textarea></td></tr>
                           <tr><td><strong>Surgery:</strong><label id="surgery"></label></td></tr>
                           <tr><td><strong>Operated By:</strong><label id="operated_by"></label></td></tr>
                           <tr><td><strong>Anaesthetist:</strong><label id="anaesthetist"></label></td></tr>
                           <tr><td><strong>Operative Notes:</strong><br><textarea class="form-control" id="operating_notes"  name="operating_notes"  style="width:100%;resize: none;" ></textarea></td></tr>
                           <tr></tr>
                           <!----------------------investigation auto add table column------------->
                           <tr>
                                <td>
                                    <strong>
                                            Investigation:<br>
                                    </strong>
                                     <!----------------------investigation auto add table starts here column------------->
                                        <div class="test_comment_t_header">
                                           <table  class="table table-bordered">
                                                  <thead class="thead-dark">
                                                    <th></th>
                                                   <th>&nbsp;Test</th>
                                                   <th>&nbsp;Comment</th>

                                                </thead>

                                                <tr class="item-row " id="table_row_template" hidden>
                                                            <td>
              <!--<div id="sex-input" class="form-input col-12">-->
                                                            <a class="delete" href="javascript:;" title="Remove row">X</a>
                                                            </td>
                                                            <td>
                                                            <input  name="Test[]" id="test" class="form-control role-input-select drop_select_print_outline"  value=""  />
                                                       </td>
                                                       <td>
                                                          <input  name="Comment[]" id="comment" class="form-control role-input-select drop_select_print_outline"  value=""  />
                                                       </td>
                                                 </tr>
                                           </table>
                                         </div>
                                        </td>
                                      </tr>
                                      <tr >
                                         <td><a id="addrow" class="pull-right" title="Add a row"><i class="fal fa-plus-square fa-2x add_row" aria-hidden="true"></i></a></td>



                                      </tr>

                          <!-----------------radio---------Buttons-------------->

                       <tr>
                        <td colspan="3" class="blank">
                                                 <div class="form-group  row justify-content-md-center" style="margin-left:0px;margin-right:0px;margin-bottom:0px; width: 100%;">
                                                          <label class="form-check-label col-3">
                                                          <input class="option-input_radio checkbox"  type="checkbox" id="checkBoxDeliverySummary" name="checkBoxDeliverySummary"/>Delivery Notes table</label>
                             <label class="form-check-label col-3">
                            <input class="form-check-input" type="checkbox" name="Port_placement_images_upload" id="Port_placement_images_upload" name="Port_placement_images_upload">Port placement images upload</label>
                             <label class="form-check-label col-3">
                            <input class="form-check-input" type="checkbox" name="surgery_image" id="surgery_image" name="surgery_image">surgery image</label>
                             <label class="form-check-label col-3">
                            <input class="form-check-input" type="checkbox" name="Baby_Photo" id="Baby_Photo" name="Baby_Photo">Baby Photo</label>
                                               </div>
                                          </td>
                                      </tr>
                                      <!-----------------hidden box for  for Delivery Notes-------------->
                                      <tr>
                                            <td>
                        <div id="Delivery_Notes_hidden" style='display:none'>
                                                     <div class="card card-outline-info mb-3" id="s" >
                                          <div class="card-block" id="print">

                                                    <center>
                                                            <table class="table table-border">
                                                                    <tr>
                                                                            <th colspan="5"><strong>Delivery Notes:</strong></th>
                                                                    </tr>
                                                                    <tr>
                                                                            <th><strong>Type</strong></th>
                                                                            <th><strong>Date</strong></th>
                                                                            <th><strong>Time</strong></th>
                                                                            <th><strong>Sex</strong></th>
                                                                            <th><strong>Weight</strong></th>
                                                                    </tr>
                                                                    <tr>
                                                                            <td>
                                                                    <select name="type" class="form-control col-12" id="type">
                                                                    <option value="" disabled selected>Type</option>
                                                                    <option value="Vaginal Delivery">Vaginal Delivery</option>
                                                                    <option value="LSCS">LSCS</option>

                                                                </select>
                                                                </td>
                                                                            <td>
                                                                     <div id="dateofmtp" class="col-12 input-group date">
                                                                      <input class="form-control" type="text" id="dateofmtp" name="dateofmtp" oninput="myFunction()"/>
                                                                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                                     </div>

                                                                            </td>
                                                                            <td>

                                                                                              <div class="col-12">
                                                                                                      <input class="form-control" type="time" value="" tabindex="-1" name="delivery_time" id="delivery_time" autocomplete="off" maxlength="10" style="font-size: 12px">
                                                                                                  </div>

                                                                            </td>
                                                                            <td>
                                                                                    <select name="gender" class="form-control col-12" id="gender">
                                                                    <option value="" disabled selected>SEX</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                    <input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="Delivery_regId" value="Kg" id="Delivery_regId">
                                                                            </td>
                                                                    </tr>
                                                            </table>

                                                     </center>
                                                       </div>
                                               </div>
                               </div>
                                    </td>
                                      </tr>
                                      <!--------------second hidden Block for port placement Image upload--------------->
                                      <tr>
                                            <td>
                                  <div id="placement_image_hidden" style='display:none;' >
                                       <div class="card card-outline-info mb-3" id="s" >
                                          <div class="card-block" id="print">
                                            <div class="col-12">
                                              <table class=" table table-border">
                                                <tr>
                                                  <th colspan="2"><strong>PORT PLACEMENT IMAGE </strong></th>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <br>
                                                    <br>
                                                    <br>
                                                                <input type="file" class="section-notto-print" name="port_placement_in" accept="image/*" onchange="loadFile_port_placement(event)">
                                                        <!--<button type="file" class="btn btn-outline-teal" id="port_placement" name="port_placement" style="">-->
                                                        <!--<i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>Upload</button>-->
                                                    <br>
                                                    <br>
                                                  </td>
                                                  <td>
                                                    <br>
                                                    <div class="image_ppimageupload" style=" margin: auto;">
                                             <img id="port_placement_img" name="port_placement_img" src=""/>
                                                    </div>
                                                  </td>
                                                </tr>
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                                                    </td>
                                            </tr>
                                            <!----------------Surgery--Image---->
                                            <tr>
                               <td>
                                <div id="surgery_image_hidden" style='display:none; margin: auto;'>
                                                             <div class="card card-outline-info mb-3" id="s" >
                                          <div class="card-block" id="print">
                                                         <div class="col-12">
                                                            <table class=" table table-border">
                                                                    <tr>
                                                                            <th colspan="2"><strong> Surgery image </strong></th>
                                                                    </tr>
                                                                    <tr>
                                                                            <td>
                                                              <br>
                                                              <br>
                                                              <br>
                                                <input type="file" name="surgery_photo" class="section-notto-print"  accept="image/*" onchange="loadFile_surgery(event)">
                                                               <!--<button type="file" class="btn btn-outline-teal" id="button_save_reciept"  style=""> <i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>Upload</button>-->	<br><br>
                                                                    </td>
                                                                    <td>
                                                                             <br>
                                                                             <div class="image_ppimageupload" style=" margin: auto;">
                                                                        <img id="surgery_pic_img" name="surgery_pic_img" src=""/>
                                                                             </div>
                                                                    </td>
                                                               </tr>
                                                     </table>



                                                             </div>
                                                      </div>
                                                    </div>
                                  </div>
                                                    </td>
                                </tr>
                        <!-----------------------------------baby---------image-------upload-->
                         <tr>
                                            <td >
                            <div id="baby_image_upload" style='display:none; margin: auto;'>
                                                   <div class="card card-outline-info mb-3" id="s" >
                                          <div class="card-block" id="print">
                                                         <div class="col-12">
                                                            <table class=" table table-border">
                                                                    <tr>
                                                                            <th colspan="2"><strong> Baby image </strong></th>
                                                                    </tr>
                                                                    <tr>
                                                                            <td>
                                                              <br>
                                                              <br>
                                                              <br>
                                                        <input type="file" name="baby_pic" accept="image/*" class="section-notto-print" onchange="loadFile(event)">
                                                              <!-- <button type="file" class="btn btn-outline-teal" id="baby_photo"  style=""> <i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>Upload</button>-->	<br><br>
                                                                    </td>
                                                                    <td>
                                                                             <br>
                                                                             <div class="image_ppimageupload" style=" margin: auto;">
                                                                                    <img id="baby_photo" name="baby_photo" src=""/>
                                                                             </div>
                                                                    </td>
                                                               </tr>
                                                     </table>



                                                             </div>
                                                      </div>
                                                    </div>
                                  </div>
                                                    </td>
                                            </tr>
                                            <tr>
                                                    <td colspan="2">
                                                            <strong>
                                                              <u>All report attached with file:</u>
                                                            <br>
                                                        </strong>
                                                        <table class="table-borderless" width="100%">
                                                            <tr>
                                                                    <th><strong>Treatment investigation</strong></th>
                                                                    <th>&nbsp;&nbsp;</th>
                                                                    <th><strong>Medicines on discharge</strong></th>
                                                            </tr>
                                                            <tr>
                                                                    <td><textarea class="form-control" id="treatment_inves" name="treatment_inves" tabindex="-1" style="width:100%;  resize: none;" ></textarea></td>
                                      <td>&nbsp;&nbsp;</td>
                                                                    <td><textarea class="form-control" id="med_on_disc" name="med_on_disc" tabindex="-1" style="width:100%;  resize: none;" ></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                    <td colspan="3"></td>
                                                            </tr>
                                                            <tr>
                                                                    <td></td>
                                    <td>&nbsp;&nbsp;</td>
                                                                    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label >Dr.jitendra S.Ahire</label></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                            </tr>
                                  <!---------main---page--table--ends-->
                    </table>

               </div>
            </div>
            <input type="hidden" id="pat_id" name="pat_id" value="<?php echo $_GET['pat_id'];?>" />
            <input type="hidden" id="reg_id" name="reg_id" value="<?php echo $_GET['ID'];?>" />

             <!-------------footer For Discharge summary---------->
            <div>
                <hr class="hr_special">
                <center><?PHP ECHO $hos_add;?>, <br>  Mob.: <?PHP ECHO $contact;?></center>
                <hr>
				<!--INSERT HERE-->

            </div>
            <div class="row section-notto-print">
              <div class="col-5"></div>
              <div class="col-5">
                <button type="submit" class="btn btn-outline-teal" id="discharge_btn" name="discharge_btn" href="javascript:void(0)" style=""> <i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Save</button>
              </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!----------------------------------------------------------->
	<div class="modal fade" id="myModal_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
		<div class="modal-dialog modal-lg modal_for_report" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				</div>
			<!--<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Send message</button>-->
			</div>
		</div>
	</div>
</div>

<!----------------------------------------------------------->

<!-------------for Showing Delivery Notes Table ------------------>
<script>

  var loadFile = function(event) {
    var output = document.getElementById('baby_photo');
    output.src = URL.createObjectURL(event.target.files[0]);
     output.style.width = "150px";
     output.style.height = "150px";
  };

  var loadFile_surgery = function(event) {
    var output = document.getElementById('surgery_pic_img');
    output.src = URL.createObjectURL(event.target.files[0]);
     output.style.width = "150px";
     output.style.height = "150px";
  };
   var loadFile_port_placement = function(event) {
    var output = document.getElementById('port_placement_img');
    output.src = URL.createObjectURL(event.target.files[0]);
     output.style.width = "150px";
     output.style.height = "150px";
  };
//form submit
$( "form#add_ward_form" ).on( "submit", function(event) {
    event.preventDefault();
    debugger;
    //alert("reached here");
    //var formData=$( this ).serialize();
    var formData=new FormData(this);

    /*console.log("hello  "+this_data);*/
    //console.log(this_data);
    submit_form(formData);
  });


function submit_form(formData){

     $.ajax({
       type: "POST",
       url: "/setter/discharge_setter.php",
       data: formData,/* serializes the form's elements. */
       success: function(data)
       {
        swalSuccess(data);
        console.log("set_invoice_pharmacy :: "+data);
       },error: function(xhr, textStatus, errorThrown){
       swalError('request failed');
      },
      cache: false,
      contentType: false,
      processData: false
    });

}





  var comma ="";
  var surgergon_name="";
    var ID = "<?php echo $ID; ?>";
    var pat_id = "<?php echo $pat_id; ?>";
    $.ajax({
	   type: "GET",
	   url: "<?php echo BASE_URL;?>get_patient_detail_by_regID.php",
	   data: 'ID='+ID+'&patID='+pat_id,// serializes the form's elements.
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
$.ajax({
	   type: "GET",
	   url: "<?php echo BASE_URL;?>get_patient_detail_by_ipd_ID.php",
	   data: 'ID='+pat_id+'&IDnormal='+pat_id+'&isfrom=discharge_summery',// serializes the form's elements.
	   success: function(data)
	   {
			//console.log(data);
			var json = JSON.parse(data);
			parseJsonToForm_ipd(json);
	   },
		cache: false,
		contentType: false,
		processData: false
 });

 function parseJsonToForm(json){
		/* $('#First-name-input').val(json.firstname); */
                document.getElementById("uhid").innerHTML=json.UHID;
                document.getElementById("name").innerHTML=json.FirstName+" "+ json.LastName;
                document.getElementById("age").innerHTML=json.Age;
		//setSelectValue('gender', json.Gender);
}

 function parseJsonToForm_ipd(json){
                //debugger;
                document.getElementById("admit_date").innerHTML=((json.admit_date_time).split(" ")[0]).split("-").reverse().join("-");
                document.getElementById("admit_time").innerHTML=((json.admit_date_time).split(" ")[1])+" (in 24 hrs)";
                document.getElementById("discharge_date").innerHTML= json.discharge_date_time=="" || json.discharge_date_time==null ? "N.A" :((json.discharge_date_time).split(" ")[0]).split("-").reverse().join("-");
                document.getElementById("discharge_time").innerHTML= json.discharge_date_time=="" || json.discharge_date_time==null ? "N.A" :((json.discharge_date_time).split(" ")[1]);
                document.getElementById("diagnosis").innerHTML=json.diagnosis=="" || json.diagnosis==null ? "N.A" : json.diagnosis;
                document.getElementById("dr_name").innerHTML=" Dr. "+json.dr_name;
                var surgery_name="";
                var surgergon_name_array=[];
                var assist_dr_name_array=[];
                var anaesthetist_name_array=[];
                comma="";
                for(var i=0;i<json.surgery.length;i++){
                  if(i!=json.surgery.length-1){
                    comma=" , ";
                  }else{
                    comma="";
                  }
                  surgery_name += `${json.surgery[i].surgery_name} (${((json.surgery[i].admit_date_time).split(" ")[0]).split("-").reverse().join("-")}) ${comma}`;
                  surgergon_name_array.push(json.surgery[i].operating_surgeon);
                  assist_dr_name_array.push(json.surgery[i].assisting_doctor);
                  anaesthetist_name_array.push(json.surgery[i].anaesthetist);
                  //surgergon_name += get_drname(json.surgery[i].operating_surgeon)+comma;
                }
                get_drname(surgergon_name_array,"operated_by");
                get_drname(anaesthetist_name_array,"anaesthetist");
                //get_drname(assist_dr_name_array,"operated_by");
                document.getElementById("surgery").innerHTML= surgery_name;
}

var counter = 0;


 //For adding Row Dynamically
$("#addrow").on("click",function()
{
  $(".head_table").show('slow');
  if ($(".delete").length < 24)
  {
    counter++;
    var $template = $('#table_row_template');
    $clone = $template.clone().removeAttr('id').removeAttr('hidden').val("").insertAfter($template);
    if ($(".delete").length > 0)
      $(".delete").show();
  }
  else
  {
    alert("Creat new Bill maximum particulars reached")
  }
});

   //deleting dynamically created row
$( document ).on( "click", ".delete", function()
{
  $(this).parents('.item-row').remove();
  //update_total();
});
check_position_radio();
function check_position_radio()
{
  $("#checkBoxDeliverySummary").click(function ()
  {
    if ($(this).is(":checked"))
    {
      $("#Delivery_Notes_hidden").show();
    }
    else
    {
      $("#Delivery_Notes_hidden").hide();
    }
  });
  $("#Port_placement_images_upload").click(function ()
  {
    if ($(this).is(":checked"))
    {
      $("#placement_image_hidden").show();
    }
    else
    {
      $("#placement_image_hidden").hide();
    }
  });
  $("#surgery_image").click(function ()
  {
    if ($(this).is(":checked"))
    {
      $("#surgery_image_hidden").show();
    }
    else
    {
      $("#surgery_image_hidden").hide();
    }
  });
  $("#Baby_Photo").click(function ()
  {
    if ($(this).is(":checked"))
    {
      $("#baby_image_upload").show();
    }
    else
    {
      $("#baby_image_upload").hide();
    }
  });


      if ($("#checkBoxDeliverySummary").is(":checked"))
      {
        $("#Delivery_Notes_hidden").show();
      }
      else
      {
        $("#Delivery_Notes_hidden").hide();
      }


      if ($("#Port_placement_images_upload").is(":checked"))
      {
        $("#placement_image_hidden").show();
      }
      else
      {
        $("#placement_image_hidden").hide();
      }


      if ($("#surgery_image").is(":checked"))
      {
        $("#surgery_image_hidden").show();
      }
      else
      {
        $("#surgery_image_hidden").hide();
      }

      if ($("#Baby_Photo").is(":checked"))
      {
        $("#baby_image_upload").show();
      }
      else
      {
        $("#baby_image_upload").hide();
      }
}


$(".dateofmtp").datepicker({format: "dd MM yyyy - hh:ii"});
$(document).ready(function()
{
  $("#head_table").hide();
  var date_input=$('input[name="dateofmtp"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  var options={
      format: 'mm-dd-yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
      };
  date_input.datepicker(options);
  update_discharge_Form();
});

var $value="<?php echo $ID?>";

function update_discharge_Form()
{
var reg_id_tru="<?php echo $ID?>";
var patient_id_true="<?php echo $pat_id?>";
debugger;
//alert(reg_id_tru+patient_id_true);
   $.ajax({
       type: "POST",
       url: "/getter/discharge_getter.php",
       data: {'patient_id':patient_id_true,'reg_id':reg_id_tru},/* serializes the form's elements. */
       success: function(data)
       {
       var discharge_json=JSON.parse(data);
       update_discharge_form_true(discharge_json);
       },error: function(xhr, textStatus, errorThrown){
       swalError('request failed');
      },

    });





}
function check_if_checked(id_of_chbk,value_chbk){
  debugger;
  if(value_chbk=="N" || value_chbk=="off"){
    $(`${id_of_chbk}`).prop('checked', false);
  }else if(value_chbk=="on" || value_chbk=="Y"){
    $(`${id_of_chbk}`).prop('checked', true);
  }
  check_position_radio();
}
function update_discharge_form_true(json){
  debugger;
    $("#history_finding").val(json[0].pt_history);
    $("#operating_notes").val(json[0].op_notes);
    $("#med_on_disc").val(json[0].meds_discharge);
    $("#treatment_inves").val(json[0].treatment_inv);

    check_if_checked("#checkBoxDeliverySummary",json[0].checkBoxDeliverySummary_chk);
    check_if_checked("#Port_placement_images_upload",json[0].Port_placement_images_upload_chk);
    check_if_checked("#Baby_Photo",json[0].Baby_Photo_ckh);
    check_if_checked("#surgery_image",json[0].surgery_image_chk);
    $("#type").val(json[0].delivery_type);
    $("#gender").val(json[0].sex);
    $("#Delivery_regId").val(json[0].weight);
    $("#dateofmtp").val(json[0].delivery_date);
    $('#dateofmtp').datepicker('setDate', json[0].delivery_date);
    $("#delivery_time").val(json[0].delivery_time);
    if(json[0].Port_placement_images_upload_chk=="Y" || json[0].Port_placement_images_upload_chk=="on"){
      $("#port_placement_img").attr("src","/setter/"+json[0].pp_img)
      $("#port_placement_img").attr("height",'150px')
    }
    if(json[0].surgery_image_chk=="Y" || json[0].surgery_image_chk=="on"){
      debugger;
      $("#surgery_pic_img").attr("src","/setter/"+json[0].surgery_img)
      $("#surgery_pic_img").attr("height",'150px')
    }
    if(json[0].Baby_Photo_ckh=="Y" || json[0].Baby_Photo_ckh=="on"){
      $("#baby_photo").attr("src","/setter/"+json[0].baby_photo)
      $("#baby_photo").attr("height",'150px')
    }
      /*$("#Delivery_Notes_hidden").show();
      $("#placement_image_hidden").show();
        $("#surgery_image_hidden").show();
              $("#baby_image_upload").show();*/
              //debugger;
              //$("#type").val(json[0].delivery_type);


}
// $.ajax({
// 			   type: "GET",
// 			   url: <?php echo $get_patient_detail_by_regID; ?>,//from global_variable
// 			   data: {ID: $value},
// 			   success: function(data)
// 			   {
// 					var json = JSON.parse(data);
// 					//alert(json);
// 					parseJsonToform(json);
// 			 }
// });
// the script where you handle the table input.


function get5Words(str) {
    if (str != ("" || null))str =  str.split(/\s+/).slice(0,7).join(" ");
	//return str+"...";
}

$("#add_ward_form").on("submit",function(event)
{
    event.preventDefault();
    var formData=$(this).serialize();
    console.log("Form data is : "+formData);
   // alert("test");
});

function get_drname(dr_id,id_name_replace){
  for(var i=0;i<dr_id.length;i++){
    if(dr_id[i]!="" || dr_id[i]!=null){
      $.ajax({
           type: "GET",
           url: "<?php echo BASE_URL;?>get_dr_name_by_dr_id_staff_ledger.php",
           data: 'dr_ID='+dr_id[i],// serializes the form's elements.
           success: function(data)
           {
            //console.log(data);
            //debugger;
            var json = JSON.parse(data);
            //surgergon_name += `${json.firstname} ${json.lastname}`;
            var names=`${json.firstname} ${json.lastname} , `;
            if(`${json.firstname}`== 'undefined'){
              names = "";
            }
            document.getElementById(id_name_replace).innerHTML += `${names}`;
            //return
           },
          //async:true,
          cache: false,
          contentType: false,
          processData: false
       });
    }
  }

}
</script>

<?php
$pageTitle = "Discharge Summary"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
