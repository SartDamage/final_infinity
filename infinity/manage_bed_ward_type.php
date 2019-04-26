<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
?>

<?php include './include/header.php';?>
<style>
.table td{padding: 0.25rem;}
input:checked + .slider {background-color: #4caf50;}
.slider{background-color: #c00;}
.dataTables_wrapper .row{width:100%;margin-left:0px;margin-right:0px;}
.pagination {display: -webkit-inline-box;}
.table td, .table th{vertical-align: middle;}
.row .dataTables_length{float: left;}
.red{background-color:red;color:#fff;}
.off_blue{background-color:#00BCD4;color:white;}.off_blue .text-muted{color: #b0273c!important;}
.violet{background-color:#9c27b0;color:white;}.violet .text-muted{color: #b0a727!important;}
.dirty_ochre{background-color:#b0a727;color:white}.dirty_ochre .text-muted{color:#9e27b0!important}
.pale_green{background-color:#3cb027;color:white}.pale_green .text-muted{color:#b0273c!important}
.pale_red{background-color:#b0273c;color:white}.pale_red .text-muted{color:#3cb027!important}
.squ-1{
	
}
.important{font-size: 3em;}
.less_important{font-size: 2em;}
.reset-this,.reset-this:hover {
    animation : none;
    animation-delay : 0;
    animation-direction : normal;
    animation-duration : 0;
    animation-fill-mode : none;
    animation-iteration-count : 1;
    animation-name : none;
    animation-play-state : running;
    animation-timing-function : ease;
    backface-visibility : visible;
    background : 0;
    background-attachment : scroll;
    background-clip : border-box;
    background-color : transparent;
    background-image : none;
    background-origin : padding-box;
    background-position : 0 0;
    background-position-x : 0;
    background-position-y : 0;
    background-repeat : repeat;
    background-size : auto auto;
    border : 0;
    border-style : none;
    border-width : medium;
    border-color : inherit;
    border-bottom : 0;
    border-bottom-color : inherit;
    border-bottom-left-radius : 0;
    border-bottom-right-radius : 0;
    border-bottom-style : none;
    border-bottom-width : medium;
    border-collapse : separate;
    border-image : none;
    border-left : 0;
    border-left-color : inherit;
    border-left-style : none;
    border-left-width : medium;
    border-radius : 0;
    border-right : 0;
    border-right-color : inherit;
    border-right-style : none;
    border-right-width : medium;
    border-spacing : 0;
    border-top : 0;
    border-top-color : inherit;
    border-top-left-radius : 0;
    border-top-right-radius : 0;
    border-top-style : none;
    border-top-width : medium;
    bottom : auto;
    box-shadow : none;
    box-sizing : content-box;
    caption-side : top;
    clear : none;
    clip : auto;
    color : inherit;
    columns : auto;
    column-count : auto;
    column-fill : balance;
    column-gap : normal;
    column-rule : medium none currentColor;
    column-rule-color : currentColor;
    column-rule-style : none;
    column-rule-width : none;
    column-span : 1;
    column-width : auto;
    content : normal;
    counter-increment : none;
    counter-reset : none;
    cursor : auto;
    direction : ltr;
    display : inline;
    empty-cells : show;
    float : none;
    font : normal;
    font-family : inherit;
    font-size : medium;
    font-style : normal;
    font-variant : normal;
    font-weight : normal;
    height : auto;
    hyphens : none;
    left : auto;
    letter-spacing : normal;
    line-height : normal;
    list-style : none;
    list-style-image : none;
    list-style-position : outside;
    list-style-type : disc;
    margin : 0;
    margin-bottom : 0;
    margin-left : 0;
    margin-right : 0;
    margin-top : 0;
    max-height : none;
    max-width : none;
    min-height : 0;
    min-width : 0;
    opacity : 1;
    orphans : 0;
    outline : 0;
    outline-color : invert;
    outline-style : none;
    outline-width : medium;
    overflow : visible;
    overflow-x : visible;
    overflow-y : visible;
    padding : 0;
    padding-bottom : 0;
    padding-left : 0;
    padding-right : 0;
    padding-top : 0;
    page-break-after : auto;
    page-break-before : auto;
    page-break-inside : auto;
    perspective : none;
    perspective-origin : 50% 50%;
    position : static;
    /* May need to alter quotes for different locales (e.g fr) */
    quotes : '\201C' '\201D' '\2018' '\2019';
    right : auto;
    tab-size : 8;
    table-layout : auto;
    text-align : inherit;
    text-align-last : auto;
    text-decoration : none;
    text-decoration-color : inherit;
    text-decoration-line : none;
    text-decoration-style : solid;
    text-indent : 0;
    text-shadow : none;
    text-transform : none;
    top : auto;
    transform : none;
    transform-style : flat;
    transition : none;
    transition-delay : 0s;
    transition-duration : 0s;
    transition-property : none;
    transition-timing-function : ease;
    unicode-bidi : normal;
    vertical-align : baseline;
    visibility : visible;
    white-space : normal;
    widows : 0;
    width : auto;
    word-spacing : normal;
    z-index : auto;
    /* basic modern patch */
    all: initial;
    all: unset;
}
.pulse{
	-webkit-animation: fa-spin 1s infinite steps(8);
    animation: fa-spin 1s infinite steps(8);
}
.wiggle_animation{
	animation: wiggle .1s infinite alternate;
}
.wiggle_animation_twice{
	animation: wiggle .1s 2 alternate;
}
@keyframes wiggle {
  0% { transform: rotate(-5deg); }
  100% { transform: rotate(5deg); }
}
.wriggle_on_hover:hover{
	animation: wiggle .1s 2 alternate;
}
</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<div id="main">
<?php include './nav_bartop.php';?>
	<div class="container" id="test-form-container" style="padding-left:50px;margin-top:15px;">
		<div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 1rem!important;">
			<div class="card-block heading_bar" id="header">
				<h5><!--title-->  <!--*(To be used in Admin)--></h5>
			</div>
			<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="card mb-3 violet" style="/* width: 18rem; */cursor:pointer">
				<a class="reset-this" id="ipd_bed"  data-toggle="tooltip" data-placement="bottom" title="Go to IP list" >
				  <div class="card-body">
					<h5 class="card-title">IPD Count<i class="fal fa-plus  pull-right" id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="add / manage Beds"></i><i class="fal fa-plus  pull-right" id="ipd_add_ward" style="cursor:alias; margin-right:10px;" data-toggle="tooltip" data-placement="right" title="add/change ward"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted">no. of beds available</h6>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<i class="fal fa-bed  fa-4x wriggle_on_hover"></i>
						</div>
						<div class="col-8">
							<span class="important" id="available_bed">
								<?php 
									$db = getDB();
									$state=$db->prepare("SELECT * FROM `bed_number` where `bed_status`<>'0' AND IsActive='1'");
									$state->execute();
									$count = $state->rowCount();
									echo $count;
								?>
							</span>
							<span class="important">/</span>
							<span class="less_important" id="total_beds">
								<?php
									$state=$db->prepare("SELECT * FROM `bed_number` where `bed_status`='0' AND IsActive='1'");
									$state->execute();
									$count = $state->rowCount();
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
			<div class="col-3">
				<div class="card mb-3 pale_green" style="/* width: 18rem; */cursor:pointer;">
				  <a class="reset-this" id="opd_list"  data-toggle="tooltip" data-placement="bottom" title="Go to OP list" >
				  <div class="card-body">
					<h5 class="card-title">OPD Count <i class="fas fa-cog  pull-right" id="opd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="manage Doctor,Charges etc.."></i></h5>
					<h6 class="card-subtitle mb-2 text-muted">no. of Patients today</h6>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<i class="fal fa-stethoscope fa-4x wriggle_on_hover" ></i>
						</div>
						<div class="col-8">
							<span class="important" id="available_bed">
								1
							</span>
							<span class="important">/</span>
							<span class="less_important" id="total_beds">
								25
							</span>
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				  </a>
				</div>
			</div>
			<div class="col-3">
				<div class="card mb-3 dirty_ochre" style="/* width: 18rem; */cursor:pointer;">
				  <a class="reset-this" id="Dr_list"  data-toggle="tooltip" data-placement="bottom" title="Go to Doctor list" >
				  <div class="card-body">
					<h5 class="card-title">Doctor Count<i class="fal fa-plus  pull-right" id="Dr_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Add Doctor"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted">Resident Doctors available</h6>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<i class="fal fa-user-md fa-4x wriggle_on_hover"></i>
						</div>
						<div class="col-7">
							<span class="important pull-right" id="no_doctor" data-toggle="tooltip" data-placement="bottom" title="No of doctors">
								<?php
									$state=$db->prepare("SELECT * FROM `staff_ledger` where `roleid`='2' AND isactive='1'");
									$state->execute();
									$count = $state->rowCount();
									echo $count;
									$db=null;
									?>
							</span>
							<!--<span class="important">/</span>
							<span class="less_important" id="total_beds">
								25
							</span>-->
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				  </a>
				</div>
			</div>
			<!--<div class="col-3">
				<div class="card mb-3 pale_red" style="/* width: 18rem; */">
				  <div class="card-body">
					<h5 class="card-title">OPD Count</h5>
					<h6 class="card-subtitle mb-2 text-muted">no. of Patients today</h6>-->
					<!--<p class="card-text">					</p>-->
					<!--<div class="row">
						<div class="col-4">
							<i class="fas fa-stethoscope fa-4x wriggle_on_hover"></i>
						</div>
						<div class="col-8">
							<span class="important" id="available_bed">
								1
							</span>
							<span class="important">/</span>
							<span class="less_important" id="total_beds">
								25
							</span>
						</div>
					</div>-->
					<!--<a href="#" class="card-link">Another link</a>-->
				  <!--</div>
				</div>
			</div>-->
			<div class="col-3">
				<div class="card mb-3 pale_red" style="/* width: 18rem; */">
				<a class="reset-this" id="ipd_rates"  data-toggle="tooltip" data-placement="bottom" title="Go to IP rate Edit" >
				  <div class="card-body">
					<h5 class="card-title">Change IPD rates<i class="fal fa-wrench fa-1x pull-right" id="wrench"  style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="manage rates for IPD"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted">Change ipd standard rates</h6>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<i class="fal fa-rupee-sign fa-4x wriggle_on_hover"></i>
						</div>
						<div class="col-8">
							<!--<span class="important" id="available_bed">
								1
							</span>
							<span class="important">/</span>
							<span class="less_important" id="total_beds">
								25
							</span>-->
							
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				  </a>
				</div>
			</div>
			<div class="col-3">
				<div class="card mb-3 off_blue" style="/* width: 18rem; */cursor:pointer">
				<a class="reset-this" id="ipd_bill_std"  data-toggle="tooltip" data-placement="bottom" title="Go to standerl bill content list" >
				  <div class="card-body">
					<h5 class="card-title">Standard Bill<i class="fal fa-plus  pull-right" id="bill_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="change / add standard ipd bill items"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted">Std. items in IPD bill</h6>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<i class="fas fa-file-alt  fa-4x wriggle_on_hover"></i>
						</div>
						<div class="col-8">
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
			  
			</div>
		</div>
	</div>
	</div>
</div>
<script>
// setSelectValue (id, val) {}is in footer
var ipd_bed = document.getElementById('ipd_bed');
var ipd_setting = document.getElementById('ipd_setting');
var ipd_rates = document.getElementById('ipd_rates'); /*IPD_rates card card_04*/

var opd_card = document.getElementById('opd_list');/*opd card*/
var opd_setting = document.getElementById('opd_setting');/*opd card*/
var Dr_list = document.getElementById('Dr_list');/*opd card*/
var Dr_setting = document.getElementById('Dr_setting');/*opd card*/

var bill_setting = document.getElementById('bill_setting');/*ipd card*/
var ipd_bill_std = document.getElementById('ipd_bill_std');/*ipd card*/
var ipd_add_ward = document.getElementById('ipd_add_ward');/*ipd card*/



opd_card.addEventListener("click", function myFunction() {
	event.stopPropagation()
	location.href="<?php echo BASE_URL;?>/list_all_patients_opd.php";
});

opd_setting.addEventListener("click", function myFunction() {
	event.stopPropagation()
	location.href="<?php echo BASE_URL;?>list_all_employees_doctor_consult_charges.php";
});

ipd_bed.addEventListener("click", function myFunction() {
	event.stopPropagation()
	location.href="<?php echo BASE_URL;?>list_all_patients_ipd.php";
});
ipd_add_ward.addEventListener("click", function myFunction() {
	event.stopPropagation()
	location.href="<?php echo BASE_URL;?>ipd_add_ward_detail.php";
});
ipd_rates.addEventListener("click", function myFunction() {
	event.stopPropagation()
	location.href="<?php echo BASE_URL;?>ipd_edit_rates.php";
    //document.getElementById("demo").innerHTML = "YOU CLICKED ME!";
});
ipd_setting.addEventListener("click", function myFunction() {
	//location.href="/list_all_patients_ipd.php";
	event.stopPropagation();
	location.href="<?php echo BASE_URL;?>ipd_add_bed.php";
});
Dr_setting.addEventListener("click", function myFunction() {
	//location.href="/list_all_patients_ipd.php";
	event.stopPropagation();
	location.href="<?php echo BASE_URL;?>add_new_staff_doctor_form.php";
});
Dr_list.addEventListener("click", function myFunction() {
	//location.href="/list_all_patients_ipd.php";
	event.stopPropagation();
	location.href="<?php echo BASE_URL;?>list_all_employees.php?staff_role=2";
});
ipd_bill_std.addEventListener("click", function myFunction() {
	//location.href="/list_all_patients_ipd.php";
	event.stopPropagation();
	location.href="<?php echo BASE_URL;?>/ipd_standard_bill_items.php";
});

/* $("#ipd_setting").on('mouseover', function(){   
    $('#ipd_bed').tooltip('hide');
	$('#ipd_setting').addClass("fa-spin")
  }).on('mouseleave', function(){
	$('#ipd_setting').removeClass("fa-spin")
    $('#ipd_bed').tooltip('show');
  }); */
  tooltip_position("#ipd_bed","#ipd_setting");
  tooltip_position("#ipd_bed","#ipd_add_ward");
  tooltip_position("#opd_list","#opd_setting");
  tooltip_position("#Dr_list","#Dr_setting");
  tooltip_position("#Dr_list","#no_doctor");
  tooltip_position("#ipd_bill_std","#bill_setting");
  /*tooltip_position("#ipd_rates","#wrench");*/
  $("#wrench").on('mouseover', function(){   
    $('#ipd_rates').tooltip('hide');
	$('#wrench').addClass("wiggle_animation_twice")
  }).on('mouseleave', function(){
	$('#wrench').removeClass("wiggle_animation_twice")
    $('#ipd_rates').tooltip('show');
  });
	$("#no_doctor").on('mouseover', function(){   
	$("#Dr_list").tooltip('hide');
	$("#no_doctor").addClass("wiggle_animation_twice")
	  }).on('mouseleave', function(){
		$("#no_doctor").removeClass("wiggle_animation_twice")
		$("#Dr_list").tooltip('show');
	  });
  function tooltip_position(parent,child){
	  $(child).on('mouseover', function(){   
    $(parent).tooltip('hide');
	$(child).addClass("fa-spin")
	  }).on('mouseleave', function(){
		$(child).removeClass("fa-spin")
		$(parent).tooltip('show');
	  });
  }
  $('[data-toggle="tooltip"]').tooltip({
    animated : 'true',
    placement : 'bottom',
    container: 'body'});

</script>
<?php
$pageTitle = "Manage Ward/Bed/Bed-type"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>