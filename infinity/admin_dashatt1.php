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
	.badge1 {
		position:relative;
	}
	.badge1[data-badge]:after {
		content:attr(data-badge);
		position:absolute;
		top:-10px;
		right:-10px;
		font-size:.7em;
		background:green;
		color:white;
		width:18px;height:18px;
		text-align:center;
		line-height:18px;
		border-radius:50%;
		box-shadow:0 0 1px #333;
	}
	
	
	.important{
	font-size: 3em;
}
	.violet{background-color:#9c27b0;color:white;}.violet .text-muted{color: #b0a727!important;}
.dirty_ochre{background-color:#b0a727;color:white}.dirty_ochre .text-muted{color:#9e27b0!important}
.pale_green{background-color:#3cb027;color:white}.pale_green .text-muted{color:#b0273c!important}
.pale_red{background-color:#b0273c;color:white}.pale_red .text-muted{color:#3cb027!important}
.pale_light_blue{background-color:#7e8ef2;color:white}.pale_light_blue .text-muted{color:#f2b47e!important}
.pale_dark_blue{background-color:#4659d9;color:white}.pale_dark_blue .text-muted{color:#f2b47e!important}
.dark_blue{background-color:blue;color:white}.pale_dark_blue .text-muted{color:#f2b47e!important}
.pale_dirty_brown{background-color:#b06027;color:white}.pale_dirty_brown .text-muted{color:#f2b47e!important}
.squ-1{
	
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
		
			<div class="row justify-content-md-center">
				<div class="col-md-3"><!--Current sign in-->
				<div class="card mb-3 pale_green  pointer" style="/* width: 18rem; */">
				<a class="reset-this" id="addp_stock"  data-toggle="tooltip" data-placement="bottom" title="" >
				  <div class="card-body">
					<h5 class="card-title">Number of staff<i class="fal fa-plus  pull-right fa-pull-right"  id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Add new stock"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted">Staff present today: <?php echo date("d-m-Y");?> </h6>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<!--<i class="fas fa-prescription-bottle-alt fa-4x"></i>-->
							<i class="fas fa-users fa-4x"></i>
						</div>
							<div class="col-8">
							<span class="important" id="available_bed" data-toggle="tooltip" data-placement="bottom" title="Number of staff signed in today">
						 <!--put demo parse here-->
					<?php
					
					$db = getDB();
	$statement=$db->prepare("SELECT * from attendance_manager order by att_time ASC limit 500");
	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//print_r($results);
	$main_attendence_array = array();
	$super_main_attendence_id_array = array();/*all user id in att record */
	$main_attendence_id_array = array();/*all user id in att record */
	$att_records	= sizeof($results);
	for($i=1;$i<$att_records;$i++){
			$user_id_main=$results[$i]['user_id'];//current user in loop
		
			if (in_array($user_id_main, $main_attendence_id_array)){
				
				//no content
				
			}else{
				array_push($main_attendence_id_array,$user_id_main);
			}
		}
/* 	echo "<br>--------------------------------------------------------<br>";
	echo "<br>--------------------------------------------------------<br>";
	echo json_encode($main_attendence_id_array);
	echo "<br>----------------------------<br>----------------------------<br>";
	echo "<br>----------------------------<br>----------------------------<br>"; */
	$att_date=array();
	foreach($main_attendence_id_array as $row){
			for($i=1;$i<$att_records;$i++)
			{
				if($results[$i]['user_id']===$row){
					$date_user_dependent = substr($results[$i]["att_time"],0,10);
					if (in_array($date_user_dependent, $att_date)){
					}else{
						array_push($att_date,$date_user_dependent);
					}
				}
			}
		}
	/* echo "<br>--------------------------------------------------------<br>";
	echo "<br>--------------------------------------------------------<br>";
	echo json_encode($att_date);
	echo "<br>----------------------------<br>----------------------------<br>";
	echo "<br>----------------------------<br>----------------------------<br>"; */
	
	foreach($main_attendence_id_array as $user_id_from_main){
			foreach($att_date as $date_in_list){
					
					$all_time_for_date=array();
					for($i=1;$i<$att_records;$i++){
							$date_user_dependent =  substr($results[$i]["att_time"],0,10);
							$time_user_dependent = implode("-",array_reverse(explode("-", substr($results[$i]["att_time"],11,18))));
							$user_id = $results[$i]['user_id'];
							if($date_user_dependent==$date_in_list && $user_id_from_main==$user_id ){
									if($results[$i]["att_time"]<>"undefined"){
										$time_user_dependent = implode("-",array_reverse(explode("-", substr($results[$i]["att_time"],11,18))));
										array_push($all_time_for_date,$time_user_dependent);
										
									}else{
										array_push($all_time_for_date,"0");
									}
								}
						}
						

					
					
					
					$first = reset($all_time_for_date);
					$last = end($all_time_for_date);
					$date_one_user = new \stdClass();
					$date_one_user->user_name = $user_id_from_main;
					$date_one_user-> date_att = $date_in_list;
					if ($first<>""){
						$date_one_user-> in_time_att = $first;
					}else{
						$date_one_user-> in_time_att = "0";
					}
					
					if($first==$last){
						$date_one_user-> out_time_att = "0";
					}else{
						$date_one_user-> out_time_att = $last;
					}
					array_push($super_main_attendence_id_array,$date_one_user);
					//echo "<br>#############################<br>#############################<br>";
					//echo json_encode($super_main_attendence_id_array)."@@@".$date_in_list."@@@".$user_id_from_main."<br>";
					//echo "<br>#############################<br>#############################<br>";
					
				}
		}
		//echo "<br>@@@@@@@@@@@@@@@@<br>@@@@@@@@@@@@@@@@<br>";
		//echo json_encode($super_main_attendence_id_array);
		//echo "<br>@@@@@@@@@@@@@@@@<br>@@@@@@@@@@@@@@@@<br>";
		
		
		$usersortms=array();
		$allpresentcount=0;
	 	foreach ($super_main_attendence_id_array as $normsingle)
		{
			$userinloopms=$normsingle->user_name;
	        //$userinloopms=10019;
			$normsingle->date_att;
			$normsingle->in_time_att;
			$normsingle->out_time_att;
			$countdate=0;
			$halfdaycount=0;
			$presentcountt=0;
			$absentcount=0;
			//echo $userinloopms;
			if (in_array($userinloopms, $usersortms ))
		{
			
			}
			else{
				array_push($usersortms,$userinloopms);
				/* echo "<br>";
				echo $userinloopms;
				echo "{";
				echo "<br>"; */
				 $attcountperuser = new \stdClass();
				$attcountperuser->user_name = $userinloopms;
			/* 	 echo "<br>";
		 
		 echo $userinloopms;
		 echo "<br>"; */
		foreach($super_main_attendence_id_array as $monthsortloop)
		{
		
			if($monthsortloop->user_name ==$userinloopms)	
	     
		 {
		 if($monthsortloop->date_att == date("Y-m-d") and $monthsortloop->in_time_att !=0)
		 {
			 $allpresentcount++;
			 
			 }
		
				
			 }

	
		}
		/* echo "<br>";
		//echo $userinloopms."  present:".$presentcountt."  absent:".$absentcount;
		echo "<br>"; */
				//array_push($super_main_attendance_parser,$attcountperuser);
				
			}
		
		
		
		}
				echo $allpresentcount;
					
					
					
					
					
					?>
						
						
						
						
							</span>
							<span class="important">/</span>
							<span class="less_important" id="total_beds" data-toggle="tooltip" data-placement="bottom" title="Total number of staff">
						<?php
											//$category = "Surgical Instruments";
											$db = getDB();
											$stmt = $db->prepare("SELECT * from staff_ledger");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
											$count=$stmt->rowCount();
											echo $count;
												
												
											
										?>
							</span>
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				  </a>
				</div>
			</div>
				<div class="col-md-3"><!--Current sign in-->
				<div class="card mb-3 pale_light_blue pointer" style="/* width: 18rem; */">
				<a class="reset-this" id="staff_on_leave"  data-toggle="tooltip" data-placement="bottom" title="Number of staffs on leave" >
				  <div class="card-body">
					<h5 class="card-title">Staffs On leave<i class="fal fa-plus  pull-right fa-pull-right"  id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Add new stock"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted">Number of staffs on Leave: <?php echo date("d-m-Y");?> </h6>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<!--<i class="fas fa-prescription-bottle-alt fa-4x"></i>-->
							<i class="fas fa-prescription-bottle-alt fa-4x"></i>
						</div>
						<div class="col-8">
							<span class="important" id="available_bed" data-toggle="tooltip" data-placement="bottom" title="">
						 <?php
						                    $db = getDB();
											$stmt = $db->prepare("SELECT * from paid_leave_user");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
											$uidarr=array();
											$countforleave=0;
											foreach($results as $attresult)
											{
												if($attresult['fromdate']== $attresult['todate'])
												{
													if(date("Y-m-d")== $attresult['fromdate'])
													{
													$countforleave++;
													}
													}
												$attresult['name'];
												
												}
												echo $countforleave;
												
							
						 ?>
							</span>
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				  </a>
				</div>
			</div>
							<div class="col-md-3"><!--Current sign in-->
				<div class="card mb-3 dirty_ochre pointer" style="/* width: 18rem; */">
				<a class="reset-this" id="pending_approval"  data-toggle="tooltip" data-placement="bottom" title="Approve leave request" >
				  <div class="card-body">
					<h5 class="card-title" >Pending Approval<i class="fal fa-plus  pull-right fa-pull-right"   id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Pending leave approval"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted"> <?php echo date("d-m-Y");?> </h6>
					<br>
					<!--<p class="card-text">	
						</p>-->
					<div class="row">
						<div class="col-4">
							<!--<i class="fas fa-prescription-bottle-alt fa-4x"></i>-->
							<i class="far fa-clock fa-4x"></i>
						</div>
						<div class="col-8">
							<span class="important" id="available_bed" data-toggle="tooltip" data-placement="bottom" title="Number of request pending">
						<?php
						                    $db = getDB();
											$stmt = $db->prepare("SELECT * from paid_leave_user where token=0");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
											$count=$stmt->rowCount();
											echo $count;
												
												
							
						 ?>
							</span>
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				  </a>
				</div>
			</div>
					<div class="col-md-3"><!--Current sign in-->
				<div class="card mb-3 violet pointer" style="/* width: 18rem; */">
				<a class="reset-this" id="assignleave"  data-toggle="tooltip" data-placement="bottom" title="Public Holiday" >
				  <div class="card-body">
					<h5 class="card-title">Public Holiday<i class="fal fa-plus  pull-right fa-pull-right"  id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Assign Holidays"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted"> <?php echo date("d-m-Y");?> </h6>
					<br>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<!--<i class="fas fa-prescription-bottle-alt fa-4x"></i>-->
							<i class="far fa-address-card fa-4x"></i>
						</div>
						<div class="col-8">
							<span class="important" id="available_bed" data-toggle="tooltip" data-placement="bottom" title="Number of holidays">
						
							</span>
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				  </a>
				</div>
			</div>
			</div>
			
			

			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <table class="table table-striped table-hover" id="myTable">
					<thead class="thead-teal">
					
						<tr class="head_row">
						<th class="no-sort">&nbsp;&nbsp;&nbsp;</th>
							<th>User_ID</th>
							
							<th>Name</th>
							
							<th>Present Days</th>
							<th>Absent Days</th>
							<th>Half Days</th>
							<th>Holidays</th>
							
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
			  </div>
		</div>
	</div>
	
	
<script>
$(document).ready(function() {
    $("#update_block").hide();
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
			   url: "/attmanager/adminattparser.php",//from global_variable
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
		 var iconfal="";
	 if(json[i].type==="Capsule")
	 {
       var iconfal="<i class='fas fa-capsules'></i>";
		 }
		 else if ( json[i].type==="Tablet"){
		 
			 var iconfal="<i class='fas fa-tablets'></i>";
			 }
			 else{
				 var iconfal="<i class='fas fa-user'></i>";
				 }
					//var date = json[i].whenentered;
					//var date = date.substring(0,11);
					//var date= date.split("-").reverse().join("-");
					//var dob = json[i].dob;
					//var dob = date.substring(0,11);
					//var name= json[i].firstname + "  " + json[i].lastname;
					tr = $('<tr class="tbl_row" id="'+json[i].user_name+'" onclick="clickedbuttonuser(this)" data-pat_id="'+json[i].user_name+'">');
				
					tr.append("<td align='center'>"+iconfal+"</td>");
				
					tr.append("<td>" + json[i].user_name + "</td>");
					tr.append("<td>" + json[i].user_name+ "</td>");
/* 					tr.append("<td>" + json[i].contact + "</td>");
					tr.append("<td>" + json[i].email + "</td>"); */
					tr.append("<td>" + json[i].present+ "</td>");
					tr.append("<td>" + json[i].absent + "</td>");
					tr.append("<td>" + json[i].halfday + "</td>");
					tr.append("<td>" + json[i].work + " </td>");
					//tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="Update entry" style="width:100px"  data-uid="' + json[i].id + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
					$('table').append(tr);
				}
				$('#myTable').DataTable({
					 "order": [[ 3, "desc" ], [ 0, 'desc' ]],
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
				$('div.dataTables_filter input').focus();
}
	
	/****************************************************************/
	
});
/*********************/

/**********************/



function clickedupdate(e){
	$(document).ready(function() {
    $("#update_block").show();
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

function clickedbuttonuser(e){
	var dr_ID= e.getAttribute("data-pat_id");
	//alert(dr_ID);
	//var btn_this= button.getAttribute("data-uid");
	//alert(btn_this);
	//debugger;
	var url= "attmanager/attendance_dashboard.php?ID="+dr_ID;
	window.location.href = url;

	 if (!e) var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation(); 
	
}
function on_click_redirect(element_id,url){
console.log(`ID  ${element_id} and url ${url}`);
	var element = document.getElementById(element_id);
	element.addEventListener("click", function myFunction() {
	event.stopPropagation();
	location.href=url;
});

}


on_click_redirect('addp_stock','/list_all_presentusertoday.php');
on_click_redirect('assignleave','/attmanager/addholidays.php');
on_click_redirect('staff_on_leave','/list_all_usersonleave.php');
on_click_redirect('pending_approval','/list_leave_confirmation.php');

</script>
<?php
$pageTitle = "Attendance Manager"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>
