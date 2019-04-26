<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$Form=$_GET;
if(isset($Form['staff_role'])){
	$staff_role=$Form['staff_role'];
}else{$staff_role="";}
$db = getDB();
$statement=$db->prepare("SELECT * FROM adminpageconfigmaster");
$statement->execute();
$results=$statement->fetch();
//$json=json_encode($results);
//echo $json;
$db=null;
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
    <!-- Compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">-->

    <!-- Compiled and minified JavaScript -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>-->
<style>
.center_text{
	text-align:center;
}
<!---------------material css -------------------->
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
<!---------------material css -------------------->
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
.cent{
	text-align:center;
}
.temp_email{
	width:70%;
}
</style>
<?php// include 'nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>

<body style="background-color:#E0F2F1;">
	<div id="main">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
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
			<!--<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<div class="container">
					<div class="row justify-content-md-center">
						<a class="btn btn-outline-teal" href="./add_new_staff_form.php">Add New User</a>
					</div>
				</div>
			  </div>
			</div>-->

			<div class="card card-outline-info mb-3 margin_bot_8">
				  <div class="card-block">
				  <form id="admin_master" name="admin_master">
					<input type="text" name="id" id="id" hidden value="<?php echo base64_encode($userDetails->ID); ?>">
					
					<input type="text" name="admin_set" id="admin_set" hidden value="<?PHP if(isset($results) && $results!="") {echo base64_encode($results["AdminModuleID"]);}?>">
					<table class="table table-striped table-hover" id="myTable">
						<thead class="thead-teal">
							<tr class="head_row">
								<th>ID</th>
								<th class="no-sort">Parameter</th>
								<!--<th>Contact</th>
								<th class="no-sort">Email</th>-->
								<th class="no-sort">Value</th>
								<!--<th>Joined On</th>
								<th class="no-sort">Operation</th>-->
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td><td>Hospital name</td>
								<td>
									<div class="group" >      
										<input type="text"  maxlength="55" id="hos_name" name="hos_name" class="material_input name_of_hospital" placeholder="Name of Hospital" value="<?PHP if(isset($results) && $results!="") {echo $results["name_hospital"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>2</td><td>Hospital Address</td>
								<td>
									<div class="group" >      
										<input type="text"  maxlength="80" id="hos_add" name="hos_add" class="material_input address_hospital" placeholder="Address of Hospital" value="<?PHP if(isset($results) && $results!="") {echo $results["address_hospital"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>3</td><td>Hospital Contact</td>
								<td>
									<div class="group" >      
										<input type="text"  maxlength="30" id="hos_con" name="hos_con" class="material_input contact_hospital" placeholder="Contact number of Hospital" value="<?PHP if(isset($results) && $results!="") {echo $results["contact_hospital"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>4</td><td>GST no.</td>
								<td>
									<div class="group" >      
										<input type="text"  maxlength="30" id="hos_gst" name="hos_gst" class="material_input gst_hospital" placeholder="GST number" value="<?PHP if(isset($results) && $results!="") {echo $results["gst_no"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>5</td><td title="Port of email client">Port (For email client) </td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="30" id="port_email" name="port_email" class="material_input port" placeholder="Port" title="Port of email client" value="<?PHP if(isset($results) && $results!="") {echo $results["port_email"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>6</td><td title="Host of email client">Host (For email client) </td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="30" id="host_email" name="host_email" class="material_input host" placeholder="Host" title="Host of email client" value="<?PHP if(isset($results) && $results!="") {echo $results["host_email"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>7</td><td title="SMTPSecure of email client">SMTPSecure</td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="30" id="smtp_email" name="smtp_email" class="material_input smtp" placeholder="SMTPSecure" title="SMTPSecure of email client" value="<?PHP if(isset($results) && $results!="") {echo $results["smtp_secure"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>8</td><td title="This email is used as sender in all official mail sent">Email </td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="50" name="email" id="email" class="material_input email" placeholder="Email" title="This email is used as sender in all official mail sent" value="<?PHP if(isset($results) && $results!="") {echo $results["email"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>9</td><td title="Password of the mailer">User password</td>
								<td>
									<div class="group" >      
										<input type="password" maxlength="30" name="password" id="password" class="material_input password" placeholder="Password" title="Password of the mailer" value="<?PHP if(isset($results) && $results!="") {echo base64_decode($results["password"]);}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
									<br>
									&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="toggle_password()">&nbsp;&nbsp;Show Password
								</td>
							</tr>
							<tr>
								<td>10</td><td title="From name (For email )">From Name</td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="70" name="from_name" id="from_name" class="material_input from_name" placeholder="Name" title="From name (For email )" value="<?PHP if(isset($results) && $results!="") {echo $results["sender_name"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>11</td><td title="API key for SMS integration into Sysyem"><a href="https://www.textlocal.in">Textlocal</a>™ API Key</td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="42" name="textlocal_api" id="textlocal_api" class="material_input textlocal_api" placeholder="Textlocal API" title="API key for SMS integration into Sysyem" value="<?PHP if(isset($results) && $results!="") {echo $results["textlocal_api"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>12</td><td title="Template for SMS integration into Sysyem">Message template For Welcome message</td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="100" name="textlocal_welcome_temp" id="textlocal_welcome_temp" class="material_input textlocal_welcome_temp" placeholder="Welcome SMS template" title="Template for SMS integration into Sysyem" value="<?PHP if(isset($results) && $results!="") {echo $results["wel_sms_temp"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>13</td><td title="Template for SMS integration into Sysyem">Message template For Billing message</td>
								<td>
									<div class="group" >      
										<textarea maxlength="110" name="textlocal_bill_temp" id="textlocal_bill_temp" class="material_input textlocal_bill_temp" placeholder="Bill SMS template" title="Template for SMS integration into System" value="<?PHP if(isset($results) && $results!="") {echo $results["bill_sms_temp"];}?>"><?PHP if(isset($results) && $results!="") {echo $results["bill_sms_temp"];}?></textarea>
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>14</td><td title="Template for SMS integration into Sysyem">Message template For Welcome IPD</td>
								<td>
									<div class="group" >      
										<textarea maxlength="110" name="textlocal_wel_ipd_temp" id="textlocal_wel_ipd_temp" class="material_input textlocal_wel_ipd_temp" placeholder="Bill SMS template" title="Template for SMS integration into System" value="<?PHP if(isset($results) && $results!="") {echo $results["wel_ipd_sms_temp"];}?>"><?PHP if(isset($results) && $results!="") {echo $results["wel_ipd_sms_temp"];}?></textarea>
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>15</td><td title="Template for SMS integration into Sysyem">Message template For Welcome OPD</td>
								<td>
									<div class="group" >      
										<textarea maxlength="110" name="textlocal_wel_opd_temp" id="textlocal_wel_opd_temp" class="material_input textlocal_wel_opd_temp" placeholder="Bill SMS template" title="Template for SMS integration into System" value="<?PHP if(isset($results) && $results!="") {echo $results["wel_opd_sms_temp"];}?>"><?PHP if(isset($results) && $results!="") {echo $results["wel_opd_sms_temp"];}?></textarea>
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>16</td><td title="Template for SMS integration into Sysyem">Message template For Welcome Pathology</td>
								<td>
									<div class="group" >      
										<textarea maxlength="130" rows="3"  name="textlocal_wel_patho_temp" id="textlocal_wel_patho_temp" class="material_input textlocal_wel_patho_temp" placeholder="Bill SMS template" title="Template for SMS integration into System" value="<?PHP if(isset($results) && $results!="") {echo $results["wel_patho_sms_temp"];}?>"><?PHP if(isset($results) && $results!="") {echo $results["wel_patho_sms_temp"];}?></textarea>
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>17</td><td title="Template for SMS integration into Sysyem">Message template For Discharge message</td>
								<td>
									<div class="group" >      
										<textarea maxlength="130" rows="3" name="textlocal_ipd_dis_temp" id="textlocal_ipd_dis_temp" class="material_input textlocal_ipd_dis_temp" placeholder="Bill SMS template" title="Template for SMS integration into System" value="<?PHP if(isset($results) && $results!="") {echo $results["bill_ipd_dis_temp"];}?>"><?PHP if(isset($results) && $results!="") {echo $results["bill_ipd_dis_temp"];}?></textarea>
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>18</td><td title="Template for Email integration into Sysyem">Click to view and edit Email Template (Reset Password)</td>
								<td>
									<div class="group cent" >      
										<button class="btn btn-outline-primary temp_email reset_email" data-label="reset_email" id="reset_email" onclick="edit_template(this,event)">view/edit Reset Email template</button>
									</div>
								</td>
							</tr>
							<tr>
								<td>19</td><td title="Template for Email integration into Sysyem">Click to view and edit Email Template (Welcome Template)</td>
								<td>
									<div class="group cent" >      
										<button class="btn btn-outline-primary temp_email welcome_email" data-label="welcome_email" id="welcome_email" onclick="edit_template(this,event)">view/edit Welcome template</button>
									</div>
								</td>
							</tr>
							<tr>
								<td>20</td><td title="Template for Email integration into Sysyem">Click to view and edit Email Template (IPD Template)</td>
								<td>
									<div class="group cent" >      
										<button class="btn btn-outline-primary temp_email welcome_ipd" data-label="welcome_ipd" id="welcome_ipd" onclick="edit_template(this,event)">view/edit welcome IPD template</button>
									</div>
								</td>
							</tr>
							<tr>
								<td>21</td><td title="Terms and consition for ipd">IPD invoice Footer</td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="150" name="ipd_inv_footer" id="ipd_inv_footer" class="material_input ipd_inv_footer" placeholder="Text" title="ipd invoice footer" value="<?PHP if(isset($results) && $results!="") {echo $results["ipd_inv_footer"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>22</td><td title="Terms and consition for opd">OPD invoice Footer</td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="150" name="opd_inv_footer" id="opd_inv_footer" class="material_input opd_inv_footer" placeholder="Text" title="opd invoice footer" value="<?PHP if(isset($results) && $results!="") {echo $results["opd_inv_footer"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>23</td><td title="Terms and consition for Pathology">Patho invoice Footer</td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="150" name="patho_inv_footer" id="patho_inv_footer" class="material_input patho_inv_footer" placeholder="Text" title="Pathology invoice footer" value="<?PHP if(isset($results) && $results!="") {echo $results["patho_inv_footer"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>24</td><td title="Terms and consition for Pharmacy">Pharmacy invoice Footer</td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="150" name="pharma_inv_footer" id="pharma_inv_footer" class="material_input pharma_inv_footer" placeholder="Text" title="Pharmacy invoice footer" value="<?PHP if(isset($results) && $results!="") {echo $results["pharma_inv_footer"];}?>">
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
								<tr>
								<td>25</td><td title="Terms and consition for Pharmacy">Shift Time</td>
								<td>
									<div class="group" >      
										<input type="text" maxlength="150" name="shiftime" id="shifttime" class="material_input pharma_inv_footer" placeholder="Shift Time" title="Pharmacy invoice footer" value="<?PHP if(isset($results) && $results!="") {echo $results["shifttime"];}?>" >
										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
							<tr>
								<td>26</td><td title="Terms and consition for Pharmacy">Componants</td>
								<td>
									<div class="group" >      
										<input type="checkbox" name="chk_uhid" id="chk_uhid" value="" title="Pharmacy invoice footer" >UHID<br>
										<input type="checkbox" name="chk_ipd" id="chk_ipd" value="" title="Pharmacy invoice footer" >IPD<br>
										<input type="checkbox" name="chk_opd" id="chk_opd" value="" title="Pharmacy invoice footer" >OPD<br>
										<input type="checkbox" name="chk_pathology" id="chk_pathology" value="" title="Pharmacy invoice footer" >PATHOLOGY<br>
										<input type="checkbox" name="chk_pharmacy" id="chk_pharmacy" value="" title="Pharmacy invoice footer" >PHARMACY<br>

										<span class="highlight"></span>
										<span class="bar_label"></span>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<br>
					<div class="center_text">
						<button type="submit" value="submit" class="btn btn-outline-teal">Submit</button>
						&nbsp;&nbsp;&nbsp;
						<button type="submit" value="submit" class="btn btn-outline-danger">Cancel</button>
					</div>
				  </form>
				  </div>
			</div>
	</div>
	
	
<script>
var value="<?php echo $staff_role;?>";


var uhid_value_chk ="<?php echo $chk_uhid;?>";
if(uhid_value_chk=="1"){
	$("#chk_uhid").prop("checked", true);
} 

var ipd_value_chk ="<?php echo $chk_ipd;?>";
if(ipd_value_chk=="1"){
	$("#chk_ipd").prop("checked", true);
} 

var opd_value_chk ="<?php echo $chk_opd;?>";
if(opd_value_chk=="1"){
	$("#chk_opd").prop("checked", true);
} 

var pathology_value_chk ="<?php echo $chk_pathology;?>";
if(pathology_value_chk=="1"){
	$("#chk_pathology").prop("checked", true);
} 

var pharmacy_value_chk ="<?php echo $chk_pharmacy;?>";
if(pharmacy_value_chk=="1"){
	$("#chk_pharmacy").prop("checked", true);
} 



function edit_template(context,e){
	e.preventDefault();// avoid to execute the actual submit of the form.
	console.log( $("#admin_master").serialize());
	var label = $(context).attr("data-label");
	window.open('/send_email/edit_template.php?label='+label,'_blank');
	/* $.ajax({
			type: "POST",
			url: "/send_email/edit_template.php",
			data: {label:label}, // serializes the form's elements.
			success: function(data)
			{				 
			},
			cache: false,
			contentType: false,
			processData: false
		}); */
	//alert(label);
}
$( "form#admin_master" ).on( "submit", function( event ) {
	 event.preventDefault();// avoid to execute the actual submit of the form.
	 console.log( $("#admin_master").serialize());
	var formData = new FormData(this);// serializes the form's elements.
	var test=validateForm(event);
	if (test==true){
		var url="/daily_admin_reports/set_admin_data.php";
		$.ajax({
			type: "POST",
			url: url,
			data: formData, // serializes the form's elements.
			success: function(data)
			{	
				//console.log("D"+data+"thi si data");
				if(data=="Saved	"){
					swalSuccess("Data Saved");
				}else{
					swalError("Data not saved","Reload to try again");
				}
				//alert(data);
				//alert("this is ajax loop  " + data);
			  //on success take form data and enter to any page you require be it IPD or OPD or Patho.
			  //location.href = "./manage_accounts.php"
			},
			cache: false,
			contentType: false,
			processData: false
		});
	}
	
});
function ValidateEmail(mail) 
{
	var email = document.getElementById("email").value;
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
  {
    return (true)
  }
    //alert("You have entered an invalid email address!")
    return (false)
}
function toggle_password() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
window.addEventListener('DOMContentLoaded', function() {
/*   console.log('window - DOMContentLoaded - capture'); // 1st
		// the script where you handle the form input.
		$.ajax({
			   type: "POST",
			   url: "/get_all_users_by_roleid.php",//from global_variable
			   data: {uid: value}, //serializes the form's elements.
			   success: function(data)
			   {
					var json = JSON.parse(data);
				  //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
				  //location.href = "./home.php"
						console.log(json);
					//parseJsonToTable(json);
			 }
},true); */

$('#myTable').DataTable({
	"columnDefs": [ {
								  "targets"  : 'no-sort',
								  "orderable": false,
								}],
	"lengthMenu": [[30, 40, 50, -1], [30, 40, 50, "All"]],
	"pageLength": 50,
});
var json = "<?PHP if(isset($results) && $results!="") {echo $results["name_hospital"];};?>";
parseJsonToTable(json);
function parseJsonToTable(json)
{
	 /* for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
		console.log(json[i].name_hospital);
	} */
}
/*@@@@@@@@@@@@********************/
function getAge(dateString) {
var today = new Date();
var birthDate = new Date(dateString);
var age = today.getFullYear() - birthDate.getFullYear();
var m = today.getMonth() - birthDate.getMonth();
if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
	age--;
}
return age;
}
/*@@@@@@@@@@@*********************/
function showDetails(pat_id_row) {
var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
//var pat_type = pat_id_row.getAttribute("data-pat_id");
var Row = document.getElementById(pat_id_row);
var Cells = Row.getElementsByTagName("td");
//alert("" +Cells[1].innerText+ "'s Staff ID is " + pat_type + ".");
/* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
}	
function clickedbutton(button){
	var btn_this= button.getAttribute("data-uid");
	//alert(btn_this);
	var url= "./update_user.php?ID="+btn_this;
	window.location.href = url;
	// Sets the new location of the current window.
	
 /* for bubble propogation */
	if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	/* end stopping bubble propogation */
}
		
		
});
function validateForm(){
			 var hos_name = document.forms["admin_master"]["hos_name"].value;
			 $("#hos_name ,#hos_add ,#hos_gst").css("border-bottom","1px solid #757575");	
			 var hos_add = document.forms["admin_master"]["hos_add"].value;
			 var hos_gst = document.forms["admin_master"]["hos_gst"].value;
			 var port_email = document.forms["admin_master"]["port_email"].value;
			 var host_email = document.forms["admin_master"]["host_email"].value;
			 var smtp_email = document.forms["admin_master"]["smtp_email"].value;
			 var email = document.forms["admin_master"]["email"].value;
			 var password = document.forms["admin_master"]["password"].value;
			 var from_name = document.forms["admin_master"]["from_name"].value;
			 if(hos_name==""){
				 swalInfo("Name of hospital cannot be empty !")
				 $("#hos_name").focus();	
				 $("#hos_name").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else if(hos_add==""){
				 swalInfo("Hospital address cannot be empty !")
				 $("#hos_add").focus();	
				 $("#hos_add").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else if(hos_gst==""){
				 swalInfo("Gst number cannot be left empty!")
				 $("#hos_gst").focus();	
				 $("#hos_gst").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else if(port_email==""){
				 swalInfo("Email port cannot be empty !")
				 $("#port_email").focus();	
				 $("#port_email").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else if(host_email==""){
				 swalInfo("Email host cannot be empty!")
				 $("#host_email").focus();	
				 $("#host_email").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else if(smtp_email==""){
				 swalInfo("SMTP cannot be empty !")
				 $("#smtp_email").focus();	
				 $("#smtp_email").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else if(email==""){
				 swalInfo("Email cannot be left empty!")
				 $("#email").focus();	
				 $("#email").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else if(password==""){
				 swalInfo("Password cannot be empty !")
				 $("#password").focus();	
				 $("#password").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else if(from_name==""){
				 swalInfo("Sender name cannot be empty!")
				 $("#from_name").focus();	
				 $("#from_name").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else if(!ValidateEmail(email)){
				 swalInfo("Email Address is in wrong format!")
				 $("#email").focus();	
				 $("#email").css("border-bottom","1px solid #ff0404");	
				 return false;
			 }else{
				return true;
			 }
			 
			 
		}
</script>
<?php
$roleid=$userDetails->roleid;
if($roleid=="8"){
	$pageTitle = "List of all Doctor";
}else{$pageTitle = "Admin Global Register";} // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
