<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
if(isset($_GET['ID'])){$ID=$_GET['ID'];}else{$ID="";}
?>

<?php include './include/header.php';?>
<style>
@media screen {
    .printable{ display: none!important;}
}

@media print {
    #main { margin-left: 0px!important;}
    .printable { display: block; box-sizing: border-box; }
    .non-printable { display: none; }
    .bothprintable{ display: block; }
    input[type="text"]
     {
    font-size:30px;
     }
     .col-form-label {
          font-size: 1.3rem!important;
          line-height: normal;
      }
     .container {
    max-width: 100%!important;
    }
  }



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

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
	<div class="container" id="reg-form-container" style="padding-left:50px;margin-top:15px;">
<br>

			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5><!--List of all Patients--> <!--title--></h5>
				<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
			  </div>
			</div>
		<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
			<div class="card-block" id="print">

				<!--INSERT HERE-->

        <table  class="table table-bordered" class="Main_summ">
<thead class="text-dark">
<tr>
<th colspan="8" class="text-center">MEDICAL TERMINATION OF PRGNANCY ACT</th>
</tr>
</thead>
<tr class="text-dark">
<td>Summary report from</td>
<td>
   <select name="mtp_summary_year" class="form-control col-3" id="mtp_summary_year" onchange="getYear()" style="height: 44px; width:150px;">
        <option value="" disabled selected>Select Year</option>
      <?php
  $db = getDB();
  $statement=$db->prepare("SELECT Date_of_mtp FROM add_mtp_details WHERE 1");
  $statement->execute();
  $results=$statement->fetchAll();
  print_r($results);
  $Mainyear= array( );

foreach ($results as $key) {
  // code...
//  echo $key['Date_of_mtp'];
$date_trim=$key['Date_of_mtp'];
$date_trim=explode('-',$date_trim);
$true_date=$date_trim[0];
if(in_array($true_date, $Mainyear))
{

}
else {
  array_push($Mainyear,$true_date);
}
  //  echo "<option value=" . $key['Date_of_mtp'] . ">".$key['Date_of_mtp']."</option>";
}
  foreach($Mainyear as $row) {
 echo "<option value=" . $row . ">".$row. "</option>";
  }
  $db=null;
  ?>
  </select>
</td>
<td colspan="6">
  <select name="mtp_month" class="form-control col-6" id="mtp_month" onchange="getDate()" style="height: 44px; width:200px;">
    <option value="" disabled selected>Select Month</option>
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
</select>
</td>
</tr>
<tr>
<td colspan="8" class="text-dark">Name of hospital with detail address:<br></td>
</tr>
<tr>
<td colspan="8" class="text-dark" >MTP canteen No</td>
</tr>
<tr class="text-dark">    <td>  </td>
  <th colspan="2"class="text-center">particular</th>
  <th colspan="2">During the Month</th>
  <th colspan="3">progerssive</th>
</tr>
<tr class="text-dark">
  <th>Sr.NO</th>
  <th>particulars</th>
  <th>Gov.</th>
  <th>Non Gov.</th>
  <th>total</th>
  <th>Gov.</th>
  <th>Non Gov.</th>
  <th>total</th>
</tr>
<tr>
  <td ></td>
  <th class="text-dark ">Total no of MTP cases Done </th>
  <td id="r11" class="r11">-</td>
<td id="r12" class="r12">-</td>
<td id="r13" class="r13">-</td>
<td id="r14" class="r14">-</td>
<td id="r15" class="r15">-</td>
<td id="r16" class="r16">-</td>

</tr>
<tr>
<td rowspan="3">I</td>
<td>By during pregnancy</td>
<td id="r21" class="r21">-</td>
<td id="r22" class="r22">-</td>
<td id="r23" class="r23">-</td>
<td id="r24" class="r24">-</td>
<td id="r25" class="r25">-</td>
<td id="r26" class="r26">-</td>

</tr>
<tr>

<td>1)Before 12 weeks</td>
<td id="r31" class="r31">-</td>
<td id="r32" class="r32">-</td>
<td id="r33" class="r33">-</td>
<td id="r34" class="r34">-</td>
<td id="r35" class="r35">-</td>
<td id="r36" class="r36">-</td>

</tr>
<tr>
<td>2)Between 13 to 20 weeks</td>
<td id="r41" class="r41">-</td>
<td id="r42" class="r42">-</td>
<td id="r43" class="r43">-</td>
<td id="r44" class="r44">-</td>
<td id="r45" class="r45">-</td>
<td id="r46" class="r46">-</td>

</tr>
<tr>
<td> </td>
<th class="text-dark">Total</th>
<td id="r51" class="r51">-</td>
<td id="r52" class="r52">-</td>
<td id="r53" class="r53">-</td>
<td id="r54" class="r54">-</td>
<td id="r55" class="r55">-</td>
<td id="r56" class="r56">-</td>

</tr>
<tr>
<td rowspan="3"> </td>
<td>m v a</td>
<td id="r61" class="r61">-</td>
<td id="r62" class="r62">-</td>
<td id="r63" class="r63">-</td>
<td id="r64" class="r64">-</td>
<td id="r65" class="r65">-</td>
<td id="r66" class="r66">-</td>

</tr>
<tr>
<td>ru-498</td>
 <td id="r71" class="r71">-</td>
<td id="r72" class="r72">-</td>
<td id="r73" class="r73">-</td>
<td id="r74" class="r74">-</td>
<td id="r75" class="r75">-</td>
<td id="r76" class="r76">-</td>

</tr>
<tr>
<td>Other</td>
<td id="r81" class="r81">-</td>
<td id="r82" class="r82">-</td>
<td id="r83" class="r83">-</td>
<td id="r84" class="r84">-</td>
<td id="r85" class="r85">-</td>
<td id="r86" class="r86">-</td>

</tr>
<tr>
<td> </td>
<th class="text-dark">Total</th>
<td id="r91" class="r91">-</td>
<td id="r92" class="r92">-</td>
<td id="r93" class="r93">-</td>
<td id="r94" class="r94">-</td>
<td id="r95" class="r95">-</td>
<td id="r96" class="r96">-</td>

</tr>
<tr>
<td rowspan="9">II</td>
<td>By age group</td>
<td id="r101" class="r101">-</td>
<td id="r102" class="r102">-</td>
<td id="r103" class="r103">-</td>
<td id="r104" class="r104">-</td>
<td id="r105" class="r105">-</td>
<td id="r106" class="r106">-</td>

</tr>
<tr>
<td>1)Below 15 years</td>
<td id="r111" class="r111">-</td>
<td id="r112" class="r112">-</td>
<td id="r113" class="r113">-</td>
<td id="r114" class="r114">-</td>
<td id="r115" class="r115">-</td>
<td id="r116" class="r116">-</td>

</tr>
<tr>
<td>2)15 to 19 years</td>
<td id="r121" class="r121">-</td>
<td id="r122" class="r122">-</td>
<td id="r123" class="r123">-</td>
<td id="r124" class="r124">-</td>
<td id="r125" class="r125">-</td>
<td id="r126" class="r126">-</td>

</tr>
<tr>
<td>3)20 to 24 years</td>
<td id="r131" class="r131">-</td>
<td id="r132" class="r132">-</td>
<td id="r133" class="r133">-</td>
<td id="r134" class="r134">-</td>
<td id="r135" class="r135">-</td>
<td id="r136" class="r136">-</td>

</tr>
<tr>
<td>4)25 to 29 years</td>
<td id="r141" class="r141">-</td>
<td id="r142" class="r142">-</td>
<td id="r143" class="r143">-</td>
<td id="r144" class="r144">-</td>
<td id="r145" class="r145">-</td>
<td id="r146" class="r146">-</td>

</tr>
<tr>
<td>5)30 to 34 years</td>
<td id="r151" class="r151">-</td>
<td id="r152" class="r152">-</td>
<td id="r153" class="r153">-</td>
<td id="r154" class="r154">-</td>
<td id="r155" class="r155">-</td>
<td id="r156" class="r156">-</td>

</tr>
<tr>
<td>6)35 to 39 years</td>
<td id="r161" class="r161">-</td>
<td id="r162" class="r162">-</td>
<td id="r163" class="r163">-</td>
<td id="r164" class="r164">-</td>
<td id="r165" class="r165">-</td>
<td id="r166" class="r166">-</td>

</tr>
<tr>
<td>7)40 to 44 years</td>
<td id="r171" class="r171">-</td>
<td id="r172" class="r172">-</td>
<td id="r173" class="r173">-</td>
<td id="r174" class="r174">-</td>
<td id="r175" class="r175">-</td>
<td id="r176" class="r176">-</td>

</tr>
<tr>
<td>8)45 and above</td>
<td id="r181" class="r181">-</td>
<td id="r182" class="r182">-</td>
<td id="r183" class="r183">-</td>
<td id="r184" class="r184">-</td>
<td id="r185" class="r185">-</td>
<td id="r186" class="r186">-</td>

</tr>
<tr>
<td> </td>
<th class="text-dark">Total</th>
<td id="r191" class="r191">-</td>
<td id="r192" class="r192">-</td>
<td id="r193" class="r193">-</td>
<td id="r194" class="r194">-</td>
<td id="r195" class="r195">-</td>
<td id="r196" class="r196">-</td>

</tr>
<tr>
<td rowspan="6">III</td>
<td>By religion</td>
<td id="r201" class="r201">-</td>
<td id="r202" class="r202">-</td>
<td id="r203" class="r203">-</td>
<td id="r204" class="r204">-</td>
<td id="r205" class="r205">-</td>
<td id="r206" class="r206">-</td>


</tr>
<tr>
<td>1)Hindu</td>
<td id="r211" class="r211">-</td>
<td id="r212" class="r212">-</td>
<td id="r213" class="r213">-</td>
<td id="r214" class="r214">-</td>
<td id="r215" class="r215">-</td>
<td id="r216" class="r216">-</td>
</tr>
<tr>
<td>2)Muslim</td>
<td id="r221" class="r221">-</td>
<td id="r222" class="r222">-</td>
<td id="r223" class="r223">-</td>
<td id="r224" class="r224">-</td>
<td id="r225" class="r225">-</td>
<td id="r226" class="r226">-</td>

</tr>
<tr>
<td>3)Sikh</td>
<td id="r231" class="r231">-</td>
<td id="r232" class="r232">-</td>
<td id="r233" class="r233">-</td>
<td id="r234" class="r234">-</td>
<td id="r235" class="r235">-</td>
<td id="r236" class="r236">-</td>

</tr>
<tr>
<td>4)Christin</td>
<td id="r241" class="r241">-</td>
<td id="r242" class="r242">-</td>
<td id="r243" class="r243">-</td>
<td id="r244" class="r244">-</td>
<td id="r245" class="r245">-</td>
<td id="r246" class="r246">-</td>
</tr>
<tr>
<td>5)Other</td>
<td id="r251" class="r251">-</td>
<td id="r252" class="r252">-</td>
<td id="r253" class="r253">-</td>
<td id="r254" class="r254">-</td>
<td id="r255" class="r255">-</td>
<td id="r256" class="r256">-</td>
</tr>
<tr>
<td> </td>
<th class="text-dark">Total</th>
<td id="r261" class="r261">-</td>
<td id="r262" class="r262">-</td>
<td id="r263" class="r263">-</td>
<td id="r264" class="r264">-</td>
<td id="r265" class="r265">-</td>
<td id="r266" class="r266">-</td>

</tr>
<tr>
<td rowspan="7">IV</td>
<td>Indication Of Termination</td>
<td id="r271" class="r271">-</td>
<td id="r272" class="r272">-</td>
<td id="r273" class="r273">-</td>
<td id="r274" class="r274">-</td>
<td id="r275" class="r275">-</td>
<td id="r276" class="r276">-</td>
</tr>
<tr>
<td>1)Danger opf life</td>
<td id="r281" class="r281">-</td>
<td id="r282" class="r282">-</td>
<td id="r283" class="r283">-</td>
<td id="r284" class="r284">-</td>
<td id="r285" class="r285">-</td>
<td id="r286" class="r286">-</td>
</tr>
<tr>
<td>2)Grave injury to physical health of pregnant woman</td>
<td id="r291" class="r291">-</td>
<td id="r292" class="r292">-</td>
<td id="r293" class="r293">-</td>
<td id="r294" class="r294">-</td>
<td id="r295" class="r295">-</td>
<td id="r296" class="r296">-</td>
</tr>
<tr>
<td>3)Grave injury to mental health of pregnant woman</td>
<td id="r301" class="r301">-</td>
<td id="r302" class="r302">-</td>
<td id="r303" class="r303">-</td>
<td id="r304" class="r304">-</td>
<td id="r305" class="r305">-</td>
<td id="r306" class="r306">-</td>
</tr>
<tr>
<td>4)Pregnancy caused by Rap</td>
<td id="r311" class="r311">-</td>
<td id="r312" class="r312">-</td>
<td id="r313" class="r313">-</td>
<td id="r314" class="r314">-</td>
<td id="r315" class="r315">-</td>
<td id="r316" class="r316">-</td>
</tr>
<tr>
<td>5)Substantialis risk that if ther children was bron of would suffer such physical or mental abnormalities so as to be seriously handicapped</td>
<td id="r321" class="r321">-</td>
<td id="r322" class="r322">-</td>
<td id="r323" class="r323">-</td>
<td id="r324" class="r324">-</td>
<td id="r325" class="r325">-</td>
<td id="r326" class="r326">-</td>
</tr>
<tr>
<td>6)Failure Contraception</td>
<td id="r331" class="r331">-</td>
<td id="r332" class="r332">-</td>
<td id="r333" class="r333">-</td>
<td id="r334" class="r334">-</td>
<td id="r335" class="r335">-</td>
<td id="r336" class="r336">-</td>
</tr>
<tr>
<td> </td>
<th class="text-dark">Total</th>
<td id="r341" class="r341">-</td>
<td id="r342" class="r342">-</td>
<td id="r343" class="r343">-</td>
<td id="r344" class="r344">-</td>
<td id="r345" class="r345">-</td>
<td id="r346" class="r346">-</td>
</tr>
<tr>
<td rowspan="7">V</td>
<td>Termination with</td>
<td id="r351" class="r351">-</td>
<td id="r352" class="r352">-</td>
<td id="r353" class="r353">-</td>
<td id="r354" class="r354">-</td>
<td id="r355" class="r355">-</td>
<td id="r356" class="r356">-</td>
</tr>
<tr>
<td>1)Sterlization</td>
<td id="r361" class="r361">-</td>
<td id="r362" class="r362">-</td>
<td id="r363" class="r363">-</td>
<td id="r364" class="r364">-</td>
<td id="r365" class="r365">-</td>
<td id="r366" class="r366">-</td>
</tr>
<tr>
<td>2)IUCD insertion</td>
<td id="r371" class="r371">-</td>
<td id="r372" class="r372">-</td>
<td id="r373" class="r373">-</td>
<td id="r374" class="r374">-</td>
<td id="r375" class="r375">-</td>
<td id="r376" class="r376">-</td>
</tr>
<tr>
<td>3)No ICUD insertion</td>
<td id="r381" class="r381">-</td>
<td id="r382" class="r382">-</td>
<td id="r383" class="r383">-</td>
<td id="r384" class="r384">-</td>
<td id="r385" class="r385">-</td>
<td id="r386" class="r386">-</td>
</tr>
<tr>
<td>Married</td>
<td id="r391" class="r391">-</td>
<td id="r392" class="r392">-</td>
<td id="r393" class="r393">-</td>
<td id="r394" class="r394">-</td>
<td id="r395" class="r395">-</td>
<td id="r396" class="r396">-</td>
</tr>
<tr>
<td>Unmarried</td>
<td id="r401" class="r401">-</td>
<td id="r402" class="r402">-</td>
<td id="r403" class="r403">-</td>
<td id="r404" class="r404">-</td>
<td id="r405" class="r405">-</td>
<td id="r406" class="r406">-</td>
</tr>
<tr>
<td>Widow</td>
<td id="r411" class="r411">-</td>
<td id="r412" class="r412">-</td>
<td id="r413" class="r413">-</td>
<td id="r414" class="r414">-</td>
<td id="r415" class="r415">-</td>
<td id="r416" class="r416">-</td>
</tr>
<tr>
<td>VI</td>
<td>No of Deaths due to termination</td>
<td id="r421" class="r421">-</td>
<td id="r422" class="r422">-</td>
<td id="r423" class="r423">-</td>
<td id="r424" class="r424">-</td>
<td id="r425" class="r425">-</td>
<td id="r426" class="r426">-</td>

</tr>
</table>

                <br>
        <div class="card-block" id="print">
                    <div class="form-group row justify-content-md-center" style="margin-top: 1rem;">
                             <div class="col-md-2">

                    <div class="form-group row justify-content-md-center" style="margin-bottom:0">

                        <div class="col-md">
                  <input class="form-control btn btn-outline-danger" style="border-color: #dc3545;" type="Submit" title="print" placeholder="Print" name="print_type" id="print_type" onclick="window.print()" value="Print">
                </div>
              </div>
            </div>
          </div>
      </div>

				<!--INSERT HERE-->

			</div>
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
<script>

$(".summary_date").datepicker({
      format: "dd/mm/yyyy"
   });
 function getYear() {
       var year=document.getElementById('mtp_summary_year').value;

    $.ajax({
    			   type: "POST",
    			  url:"<?php echo BASE_URL;?>get_summary_report.php",
             data:{"year":year},
    			   success: function(data)
    			   {
    					var json = JSON.parse(data);
    					parseJsonToform(json);
    			 }
            });

 }
var $value="<?php echo $ID?>";
function parseJsonToform(json){

	//document.getElementById("tel-input").value=json.Mobile;
var DP12 =parseInt(json['DP12']);
var DP13 =parseInt(json['DP13']);
var AG14 =parseInt(json['AG14']);
var AG15 =parseInt(json['AG15']);
var AG20 =parseInt(json['AG20']);
var AG25 =parseInt(json['AG25']);
var AG30 =parseInt(json['AG30']);
var AG35 =parseInt(json['AG35']);
var AG40 =parseInt(json['AG40']);
var AG45 =parseInt(json['AG45']);
var Hindu =parseInt(json['Hindu']);
var Muslim =parseInt(json['Muslim']);
var Sikh =parseInt(json['Sikh']);
var Christian =parseInt(json['Christian']);
var other =parseInt(json['other']);

("DP12")
document.getElementById("r35").innerHTML = DP12;
document.getElementById("r45").innerHTML = DP13;
document.getElementById("r55").innerHTML = DP12 + DP13 ;
document.getElementById("r115").innerHTML =AG14;
document.getElementById("r125").innerHTML =AG15;
document.getElementById("r135").innerHTML =AG20;
document.getElementById("r145").innerHTML =AG25;
document.getElementById("r155").innerHTML =AG30;
document.getElementById("r165").innerHTML =AG35;
document.getElementById("r175").innerHTML =AG40;
document.getElementById("r185").innerHTML =AG45;
document.getElementById("r195").innerHTML =AG45+AG40+AG35+AG30+AG25+AG20+AG15+AG14;
document.getElementById("r215").innerHTML =Hindu;
document.getElementById("r225").innerHTML =Muslim;
document.getElementById("r235").innerHTML =Sikh;
document.getElementById("r245").innerHTML =Christian;
document.getElementById("r255").innerHTML =other;
document.getElementById("r265").innerHTML =other+Christian+Sikh+Muslim+Hindu;



	//setSelectValue("header_1",json.FirstName+json.LastName);
}
// setSelectValue (id, val) {}is in footer



/*function showDetails(pat_id_row) {
	var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(pat_id_row);
	var Cells = Row.getElementsByTagName("td");
	//var ID= button.getAttribute("data-uid");
	//var ID="12";
	//alert(ID);
	window.location="<?php// echo $update_patient_opd;?>ID="+pat_type+"";
}*/
/* function clickedbutton(button){
	var ID= button.getAttribute("data-uid");
	var patient_type= button.getAttribute("data-pat_type");
	if(patient_type=="OPD"){
		window.location="./OPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="IPD"){
		window.location="./IPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="Pathology"){
		window.location="./IPD_patient_detail_printable.php?ID="+ID;
	}
		if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
} */
function getDate() {
      var month=document.getElementById('mtp_month').value;

   $.ajax({
            type: "POST",
           url:"<?php echo BASE_URL;?>get_summary_report_monthly.php",
            data:{"month":month},
            success: function(data)
            {
             var json = JSON.parse(data);
             parseJsonToform1(json);
          }
           });

}
var $value="<?php echo $ID?>";
function parseJsonToform1(json){

 //document.getElementById("tel-input").value=json.Mobile;
var DP12 =parseInt(json['DP12']);
var DP13 =parseInt(json['DP13']);
var AG14 =parseInt(json['AG14']);
var AG15 =parseInt(json['AG15']);
var AG20 =parseInt(json['AG20']);
var AG25 =parseInt(json['AG25']);
var AG30 =parseInt(json['AG30']);
var AG35 =parseInt(json['AG35']);
var AG40 =parseInt(json['AG40']);
var AG45 =parseInt(json['AG45']);
var Hindu =parseInt(json['Hindu']);
var Muslim =parseInt(json['Muslim']);
var Sikh =parseInt(json['Sikh']);
var Christian =parseInt(json['Christian']);
var other =parseInt(json['other']);

("DP12")
document.getElementById("r32").innerHTML = DP12;
document.getElementById("r42").innerHTML = DP13;
document.getElementById("r52").innerHTML = DP12 + DP13 ;
document.getElementById("r112").innerHTML =AG14;
document.getElementById("r122").innerHTML =AG15;
document.getElementById("r132").innerHTML =AG20;
document.getElementById("r142").innerHTML =AG25;
document.getElementById("r152").innerHTML =AG30;
document.getElementById("r162").innerHTML =AG35;
document.getElementById("r172").innerHTML =AG40;
document.getElementById("r182").innerHTML =AG45;
document.getElementById("r192").innerHTML =AG45+AG40+AG35+AG30+AG25+AG20+AG15+AG14;
document.getElementById("r212").innerHTML =Hindu;
document.getElementById("r222").innerHTML =Muslim;
document.getElementById("r232").innerHTML =Sikh;
document.getElementById("r242").innerHTML =Christian;
document.getElementById("r252").innerHTML =other;
document.getElementById("r262").innerHTML =other+Christian+Sikh+Muslim+Hindu;



 //setSelectValue("header_1",json.FirstName+json.LastName);
}



function clickedbutton(button){
	var ID= button.getAttribute("data-uid");
	var patient_type= button.getAttribute("data-pat_type");
	if(patient_type=="OPD"){
		window.location="/OPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="IPD"){
		window.location="/IPD_patient_detail_printable.php?ID="+ID;
	}else if(patient_type=="Pathology"){
		var patho_scname= button.getAttribute("data-patho_scname");
		//window.location="/IPD_patient_detail_printable.php?ID="+ID;
		view_report(patho_scname,ID)
	}
		if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
}
function view_report(patho_scname,ID){
/* patho_scname= patho_scname.replace(/[&\/\\#,+.()$~%--'":*?<>{}]+/g, "_");
patho_scnamerevised=patho_scname.replace(/[\s]+/g, ""); */
patho_scname= patho_scname.replace(/[\s]+/g, "");
patho_scname= patho_scname.replace(/[\+\/]+/g, "_");
patho_scname= patho_scname.replace(/[&\/\\#,+()$~%.\-'":*?<>{}\s]+/g, "");
//var ID="12";
console.log("ID : "+ID);
console.log("patho_mcid : "+patho_scname);
console.log("patho_scnamerevised : "+patho_scname);
//window.location="./update_patient_form.php?ID="+ID+"";
/* for bubble propogation */
var url="/Reports/"+patho_scname+"REPORT.php?ID="+ID;
console.log(url);
//var win = window.open(url, '_blank');
$("#myModal_report").modal('show');
$('.modal-body').load(url,function(){

});
//win.focus();
if (!e) var e = window.event;
e.cancelBubble = true;
if (e.stopPropagation) e.stopPropagation();
/* end stopping bubble propogation */
}

$('#myModal_report').on('hidden.bs.modal', function (e) {
	// do something...
	 $(".modal-body").html("");
	location.reload();
})
function get5Words(str) {
    if (str != ("" || null))str =  str.split(/\s+/).slice(0,7).join(" ");
	//return str+"...";
}
</script>
<?php
$pageTitle = "MTP Monthly Summary"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
