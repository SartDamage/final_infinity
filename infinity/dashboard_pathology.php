<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
<?php
	function get_month($month){
		switch($month){
			case "01":
				return "January";
				break;
			case "02":
				return "February";
				break;
			case "03":
				return "March";
				break;
			case "04":
				return "April";
				break;
			case "05":
				return "May";
				break;
			case "06":
				return "June";
				break;
			case "07":
				return "July";
				break;
			case "08":
				return "August";
				break;
			case "09":
				return "September";
				break;
			case "10":
				return "October";
				break;
			case "11":
				return "November";
				break;
			case "12":
				return "December";
			
		}
	}
?>
<style>
.table td{padding: 0.25rem;}
input:checked + .slider {
    background-color: #4caf50;
}
.slider{
	background-color: #c00;
}
.dataTables_wrapper .row{
	width:100%;
	margin-left:0px;
	margin-right:0px;
}
.pagination {
    display: -webkit-inline-box;
}
.table td, .table th{vertical-align: middle;}
.row .dataTables_length{
	    float: left;
}
.red{
	background-color:red;
	color:#fff;
}
.off_blue{
	background-color:#00BCD4;
	color:white;
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
.most-important{
	font-size: 5em;
}
.important{
	font-size: 3em;
}
.less_important{
	font-size: 1em;
}
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
.fa-left{
    position: inherit;
    top: 4%;
    left: 27%;
}
.fa-right{
	position: inherit;
    top: 4%;
    right: -17%;
}
.fa-rotate-45-anti{
	-ms-transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
}
.fa-rotate-45{
	-ms-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}
.fa-rotate-30{
	-ms-transform: rotate(30deg);
    -webkit-transform: rotate(30deg);
    transform: rotate(30deg);
}
.fa-rotate-180{
	-ms-transform: rotate(180deg);
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}
.fa-rotate-270{
	-ms-transform: rotate(270deg);
    -webkit-transform: rotate(270deg);
    transform: rotate(270deg);
}
.pointer{
	cursor:pointer;
}
.fa-stack {
    display: inline-block;
    height: 2em;
    line-height: 2em;
    position: relative;
    /* vertical-align: middle; */
	vertical-align: top;
    width: 2em;
}
#display_on_empty_test{display:none;}
#display_on_empty_expense{display:none;}
.div_no_entry{    
	text-align: center;
    vertical-align: middle;
	}
</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<div id="main">
<?php include $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
	<div class="container" id="test-form-container" style="padding-left:50px;margin-top:15px;">
		<div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 1rem!important;">
			<div class="card-block heading_bar" id="header">
				<h5><!--title--></h5>
			</div>
			<a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-4">
				<div class="card mb-3 violet pointer" style="/* width: 18rem; */">
				<a class="reset-this" id="ipd_bed"  data-toggle="tooltip" data-placement="bottom" title="Go to Invoicing" >
				  <div class="card-body">
					<h5 class="card-title">IPD patients Admitted today<i class="fas fa-cog  pull-right "  id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="change Test Rates"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted">Total collection of the day : <?php echo date("d-m-Y");?> </h6>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<i class="fal fa-rupee-sign  fa-4x"></i>
						</div>
						<div class="col-8">
							<span class="important" id="available_bed" data-toggle="tooltip" data-placement="bottom" title="Amount collected">
						₹<?php 	
							$db = getDB();
							$stmt = $db->prepare("SELECT pr.PatientId,pr.RegistrationID,pr.paid,pr.TotalAmount,pr.discount,pr.advance  FROM `pathology_reciepts` as pr where YEAR(pr.WhenEntered) = YEAR(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and DAY(pr.WhenEntered) = DAY(NOW()) ");
							/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
							$stmt->execute();
							$count=$stmt->rowCount();
							$data=$stmt->fetchALL();
							$collection = 0;
							$discount = 0;
							$pending = 0;
							$total_balance = 0;
							foreach($data as $row) {
								
								//echo $row;
								//echo "individual :- ".$row['paid']."\n";
								//echo " ::::::: \n::::::::";
								$collection += (floatval($row['paid'])+floatval($row['advance']));
								//$total_balance = (floatval($row['TotalAmount'])-floatval($row['discount'])-floatval($row['advance'])-floatval($row['paid']));
								//$total_balance = 
								$total_balance += (floatval($row['TotalAmount'])-floatval($row['advance'])-floatval($row['paid']));
								$discount += (floatval($row['discount'])); 
								//echo "-----------\n------------";
								}
								echo floatval($collection);
							?>
							</span>
							<span class="important">/</span>
							<span class="less_important" id="total_beds" data-toggle="tooltip" data-placement="bottom" title="Amount pending">
								₹<?php
									echo $total_balance;
								?>
							</span>
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				  </a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-3 pale_green pointer" style="/* width: 18rem; */"  >
					<a class="reset-this" id="test_reports"  data-toggle="tooltip" data-placement="bottom" title="go to Reports page">
						<div class="card-body">
							<h5 class="card-title">Diagnosis test Count <i class="fal fa-plus  pull-right "  id="add_test" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Add new patient"></i></h5>
							<h6 class="card-subtitle mb-2 text-muted"># of tests registered on : <?php echo date("d-m-Y");?></h6>
							<!--<p class="card-text">					</p>-->
							<div class="row">
								<div class="col-4">
									<i class="fal fa-flask fa-4x"></i>
								</div>
								<div class="col-8">
									
									<span class="important" id="tests_today" data-toggle="tooltip" data-placement="bottom" title="Test registered today">
										<?php $db = getDB();
										$stmt = $db->prepare("SELECT *  FROM `pathopatientregistrationmaster` as pprm where YEAR(pprm.WhenEntered) = YEAR(NOW()) AND MONTH(pprm.WhenEntered) = MONTH(NOW()) and DAY(pprm.WhenEntered) = DAY(NOW()) ");
										/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
										$stmt->execute();
										$count=$stmt->rowCount();
											echo floatval($count);
										?>
									</span>
									<span class="important">/</span>
									<span class="less_important" id="total_tests" data-toggle="tooltip" data-placement="bottom" title="Test registered this month">
										<?php $db = getDB();
									$stmt = $db->prepare("SELECT *  FROM `pathopatientregistrationmaster` as pprm where YEAR(pprm.WhenEntered) = YEAR(NOW()) AND MONTH(pprm.WhenEntered) = MONTH(NOW())");
									/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
									$stmt->execute();
									$count=$stmt->rowCount();
									$data=$stmt->fetchALL();
									$collection = 0;
									$discount = 0;
									$pending = 0;
									$total_balance = 0;
									/*foreach($data as $row) {}*/
									echo floatval($count);
									?>
									</span>
								</div>
							</div>
					<!--<a href="#" class="card-link">Another link</a>-->
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-3 dirty_ochre pointer" style="/* width: 18rem; */">
				<a id="patient_count" class="reset-this" data-toggle="tooltip" data-placement="bottom" title="go all patient list">
				  <div class="card-body">
					<h5 class="card-title">Patient Count <i class="fal fa-plus  pull-right "  id="add_patient" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Register new patient"></i></h5>
					<h6 class="card-subtitle mb-2 text-muted">Patient registered on <?php echo date("d-m-Y"); ?></h6>
					<!--<p class="card-text">					</p>-->
					<div class="row">
						<div class="col-4">
							<i class="fa-stack fa-2-3x ">
								<i class="fal fa-square fa-stack-2x"></i>
								<i class="fas fa-male  fa-1x fa-left"></i>
								<i class="fas fa-female fa-1x fa-right"></i>
							</i>
							
						</div>
						<div class="col-8">
							<span class="important" id="available_bed" data-toggle="tooltip" data-placement="bottom" title="patients registered today">
								<?php 
								$db = getDB();
								$stmt = $db->prepare("SELECT *  FROM `pathopatientregistrationparent` as pprm where YEAR(pprm.WhenEntered) = YEAR(NOW()) AND MONTH(pprm.WhenEntered) = MONTH(NOW()) and DAY(pprm.WhenEntered) = DAY(NOW()) ");
								/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
								$stmt->execute();
								$count=$stmt->rowCount();
									echo floatval($count);
								?>
							</span>
							<span class="important">/</span>
							<span class="less_important" id="total_beds" data-toggle="tooltip" data-placement="bottom" title="patients registered this month">
								<?php 
								$db = getDB();
								$stmt = $db->prepare("SELECT *  FROM `pathopatientregistrationparent` as pprm where YEAR(pprm.WhenEntered) = YEAR(NOW()) AND MONTH(pprm.WhenEntered) = MONTH(NOW())");
								/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
								$stmt->execute();
								$count=$stmt->rowCount();
									echo floatval($count);
								?>
							</span>
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				</a>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card mb-3 pale_red pointer" style="/* width: 18rem; */">
				<a class="reset-this" id="total_yearly_revenue"  data-toggle="tooltip" data-placement="bottom" title="Go to Invoicing" >
				  <div class="card-body">
					<h5 class="card-title">Total revenue </h5>
					<h6 class="card-subtitle mb-2 text-muted">Total revenue generated from pathology for year <?php  echo date("Y") ;  ?></h6><!--."-".substr(date('Y',strtotime('+1 year')), 2,3)-->
					<p class="card-text">					</p>
					<div class="row">
						<div class="col-4">
							<i class="fa-stack fa-2-3x fa-fw ">
								<i class="fal fa-sticky-note fa-stack-2x"></i>
								<i class="fal fa-rupee-sign fa-stack-1x"></i>
							</i>
							<!--<i class="fal fa-money-bill-alt fa-3x -anti"></i>
							<i class="fal fa-money-bill-alt fa-rotate-45 fa-stack-2x "></i>-->
							
						</div>
						<div class="col-8">
							<div class="pull-right">
								<span class="important" id="net_collection"  data-toggle="tooltip" data-placement="bottom" title="Amount collected"> 
									₹<?php $db = getDB();
									$stmt = $db->prepare("SELECT pr.PatientId,pr.RegistrationID,pr.paid,pr.TotalAmount,pr.discount,pr.advance  FROM `pathology_reciepts` as pr where YEAR(pr.WhenEntered) = YEAR(NOW())  ");
									/*   AND DAY(pr.WhenEntered) = DAY(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and DAY(pr.WhenEntered) = DAY(NOW())*/
									$stmt->execute();
									$count=$stmt->rowCount();
									$data=$stmt->fetchALL();
									$collection = 0;
									$discount = 0;
									$pending = 0;
									$total_balance = 0;
									foreach($data as $row) {
										$collection += (floatval($row['paid'])+floatval($row['advance']));
										$total_balance += (floatval($row['TotalAmount'])-floatval($row['advance'])-floatval($row['paid']));
										$discount += (floatval($row['discount'])); 
										}
										echo floatval($collection);
									?>
								</span>
								<span class="important">/</span>
								<span class="less_important" id="net_balance"  data-toggle="tooltip" data-placement="bottom" title="Amount pending">
									₹<?php $db = getDB();
									$stmt = $db->prepare("SELECT pr.PatientId,pr.RegistrationID,pr.paid,pr.TotalAmount,pr.discount,pr.advance  FROM `pathology_reciepts` as pr where YEAR(pr.WhenEntered) = YEAR(NOW())  ");
									/*   AND DAY(pr.WhenEntered) = DAY(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and DAY(pr.WhenEntered) = DAY(NOW())*/
									$stmt->execute();
									$count=$stmt->rowCount();
									$data=$stmt->fetchALL();
									$collection = 0;
									$discount = 0;
									$pending = 0;
									$total_balance = 0;
									foreach($data as $row) {
										$collection += (floatval($row['paid'])+floatval($row['advance']));
										$total_balance += (floatval($row['TotalAmount'])-floatval($row['advance'])-floatval($row['paid'])-floatval($row['discount']));
										$discount += (floatval($row['discount'])); 
										}
										echo floatval($total_balance);
									?>
								</span>
							</div>
						</div>
					</div>
					<!--<a href="#" class="card-link">Another link</a>-->
				  </div>
				</a>
				</div>
			</div>
			<div class="col-md-4"><!-- @@ Today @@ -->
				<div class="card mb-3 pale_light_blue pointer" style="/* width: 18rem; */">
				<a id="report_pending" data-toggle="tooltip" data-placement="bottom" title="go to reports">
				  <div class="card-body">
					<h5 class="card-title">Report Count</h5>
					<h6 class="card-subtitle mb-2 text-muted">Number of report for : <?php echo date("d/m/Y");?></h6>
					<p class="card-text">					</p>
					<div class="row">
						<div class="col-4">
							<i class="fal fa-notes-medical fa-4x"></i>
						</div>
						<div class="col-8">
							<span class="important" id="tests_today_report_created" data-toggle="tooltip" data-placement="bottom" title="Reports Completed today">
										<?php 	
											$db = getDB();
											$stmt = $db->prepare("SELECT pr.Report_generated  FROM `pathopatientregistrationmaster` as pr where YEAR(pr.WhenEntered) = YEAR(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and DAY(pr.WhenEntered) = DAY(NOW()) and `Report_generated`='1' ");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$count=$stmt->rowCount();
											foreach($data as $row) {}
												echo floatval($count);
										?>
									</span>
									<span class="important">/</span>
							<span class="less_important" id="pending_report"  data-toggle="tooltip" data-placement="bottom" title="Reports Pending Today">
										<?php 	
											$db = getDB();
											$stmt = $db->prepare("SELECT pr.Report_generated  FROM `pathopatientregistrationmaster` as pr where YEAR(pr.WhenEntered) = YEAR(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and DAY(pr.WhenEntered) = DAY(NOW()) and `Report_generated`='0' ");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$count=$stmt->rowCount();
											foreach($data as $row) {}
												echo floatval($count);
										?>
							</span>
						</div>
					</div>
				  </div>
				 </a>
				</div>
			</div>
			<div class="col-md-4"><!-- @@ Monthly @@ -->
				<div class="card mb-3 pale_dark_blue pointer" style="/* width: 18rem; */">
				<a id="report_pending_net_monthly" data-toggle="tooltip" data-placement="bottom" title="go to reports">
				  <div class="card-body">
					<h5 class="card-title">Monthly Report Count</h5>
					<h6 class="card-subtitle mb-2 text-muted">Number of report in  year <?php  echo date("-Y");?>, <?php  echo get_month(date("m"));?></h6>
					<p class="card-text">					</p>
					<div class="row">
						<div class="col-4">
							<i class="fal fa-notes-medical fa-4x"></i>
						</div>
						<div class="col-8">
							<span class="important" id="tests_report_created" data-toggle="tooltip" data-placement="bottom" title="Reports Completed this month">
										<?php 	
											$db = getDB();
											$stmt = $db->prepare("SELECT pr.Report_generated  FROM `pathopatientregistrationmaster` as pr where YEAR(pr.WhenEntered) = YEAR(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and `Report_generated`='1' ");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$count=$stmt->rowCount();
											foreach($data as $row) {}
												echo floatval($count);
										?>
									</span>
									<span class="important">/</span>
							<span class="less_important" id="pending_report_monthly"  data-toggle="tooltip" data-placement="bottom" title="Reports pending this month">
										<?php 	
											$db = getDB();
											$stmt = $db->prepare("SELECT pr.Report_generated  FROM `pathopatientregistrationmaster` as pr where YEAR(pr.WhenEntered) = YEAR(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and `Report_generated`='0' ");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$count=$stmt->rowCount();
											foreach($data as $row) {}
												echo floatval($count);
										?>
							</span>
						</div>
					</div>
				  </div>
				 </a>
				</div>
			</div>
			<div class="col-md-4"><!-- @@ Annually @@ -->
				<div class="card mb-3 dark_blue pointer" style="/* width: 18rem; */">
				<a id="report_pending_net_annual" data-toggle="tooltip" data-placement="bottom" title="go to reports">
				  <div class="card-body">
					<h5 class="card-title">Annual Report Count</h5>
					<h6 class="card-subtitle mb-2 text-muted">Number of report in  year <?php  echo date("-Y");?></h6>
					<p class="card-text">					</p>
					<div class="row">
						<div class="col-4">
							<i class="fal fa-notes-medical fa-4x"></i>
						</div>
						<div class="col-8">
							<span class="important" id="tests_report_created_annual" data-toggle="tooltip" data-placement="bottom" title="Reports Completed this year">
										<?php 	
											$db = getDB();
											$stmt = $db->prepare("SELECT pr.Report_generated  FROM `pathopatientregistrationmaster` as pr where YEAR(pr.WhenEntered) = YEAR(NOW()) and `Report_generated`='1' ");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$count=$stmt->rowCount();
											foreach($data as $row) {}
												echo floatval($count);
										?>
									</span>
									<span class="important">/</span>
							<span class="less_important" id="pending_report_annual"  data-toggle="tooltip" data-placement="bottom" title="Reports pending this year">
										<?php 	
											$db = getDB();
											$stmt = $db->prepare("SELECT pr.Report_generated  FROM `pathopatientregistrationmaster` as pr where YEAR(pr.WhenEntered) = YEAR(NOW()) and `Report_generated`='0' ");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$count=$stmt->rowCount();
											foreach($data as $row) {}
												echo floatval($count);
										?>
							</span>
						</div>
					</div>
				  </div>
				 </a>
				</div>
			</div>
			<div class="col-md-4">
			</div>
			
		</div>
		<hr class="seperator">
		<hr class="seperator">
		<div class="row" style="margin-bottom: 8%;">
				<div class="col-md-6">
					<div class="card p-2">
					<div class="card-block">
						<h4 class="card-title">Monthly expenses scale </h4>
						</div>
						<div id="display_on_empty_expense" class="div_no_entry" > No Records to show</div>
						<canvas id="chart1" class="chartjs-render-monitor" style="display: block;"></canvas>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card p-2">
					<div class="card-block">
						<h4 class="card-title">Test registration ( monthly )</h4>
						</div>
						<div id="display_on_empty_test"  class="div_no_entry" > No Records to show</div>
						<canvas id="chart2" class="chartjs-render-monitor" style="display: block;"></canvas>
					</div>
				</div>
		</div>
	</div>
	</div>
</div>
<script>
/*------------------------------------------------------*/
$.ajax({
		url: "./monthly_collection_patho.php",
		success: function(resource) {
			console.log(resource);
			if(resource==""||resource==null){$("#display_on_empty_test").css("display", "block");}
			else{
				$("#display_on_empty_test").css("display", "none");
			var resource = JSON.parse(resource);
			var ipdnumber = [];
			var opdnumber = [];
			var pathonumber = [];
			var date_array = [];
			
		 for (var i = 0; i < resource.length; i++)  {
				ipdnumber.push(resource[i].paid);
				opdnumber.push(resource[i].total);
				var date = resource[i].date;
				date_array.push(date);
				var balance = resource[i].total-resource[i].paid;
				pathonumber.push(balance);
			}
			
			var chartdata = {
				labels: date_array,
				datasets : [
					{
						label: 'Total paid',
						data: ipdnumber,
						backgroundColor: 'rgba(54, 162, 235, 0.09)',
						borderColor: 'rgba(153, 102, 155, 0.75)',
						hoverBackgroundColor: 'rgba(60, 170, 240, 1)',
						hoverBorderColor: 'rgba(160, 170, 240, 1)',
					},
					{
						label: 'Total Amount',
						data: opdnumber,
						backgroundColor: 'rgba(250, 162, 235,0.09)',
						borderColor: 'rgba(250,102,155,.8)',
						hoverBorderColor: 'rgba(250,102,155,1)',
					},{
						label: 'Balance',
						data: pathonumber,
						backgroundColor: 'rgba(50, 250, 235,0.09)',
						borderColor: 'rgba(50,250,155,.8)',
						hoverBorderColor: 'rgba(50,250,155,1)',
					}
				]
			};
			var options_line_graph={
		scales: {
            yAxes: [{
                ticks: {beginAtZero:true},
				scaleLabel: {display: true,
							labelString: 'Amount in ₹',}
			}],
			xAxes: [{
				scaleLabel: {display: true,
							labelString: 'date',}
			}]
        },
		elements: {
			line: {
				tension: 0.25, // disables bezier curves
            }
        }
    }
			var ctx = $("#chart1");
			var line_chart_pat_count = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				options:options_line_graph,
				
			});
}},
		error: function(resource) {
			console.log(resource);
		}
});

/*---------------------------------------------------------*/
/*------------------------------------------------------*/
$.ajax({
		url: "./monthly_test_registration.php",
		success: function(resource) {
			console.log(resource);
			if(resource==""||resource==null){$("#display_on_empty_test").css("display", "block");}
			else{
				$("#display_on_empty_test").css("display", "none");
			var resource = JSON.parse(resource);
			var ipdnumber = [];
			var opdnumber = [];
			var pathonumber = [];
			var date_array = [];
			
		 for (var i = 0; i < resource.length; i++)  {
				ipdnumber.push(resource[i].count);
				//opdnumber.push(resource[i].total);
				var date = resource[i].date;
				date_array.push(date);
				//var balance = resource[i].total-resource[i].paid;
				//pathonumber.push(balance);
			}
			
			var chartdata = {
				labels: date_array,
				datasets : [
					{
						label: 'Total Diagnosis registered',
						data: ipdnumber,
						backgroundColor: 'rgba(250,110, 25,0.1)',
						borderColor: 'rgba(250,110, 25,1)',
						//borderColor: 'rgba(153, 102, 155)',
						hoverBackgroundColor: 'rgba(60, 170, 240, 1)',
						hoverBorderColor: 'rgba(160, 170, 240, 1)',
					}
				]
			};
			var options_line_graph={
		scales: {
            yAxes: [{
                ticks: {beginAtZero:true},
				scaleLabel: {display: true,
							labelString: 'no. of tests',}
			}],
			xAxes: [{
				scaleLabel: {display: true,
							labelString: 'date',}
			}]
        },
		elements: {
			line: {
				tension: 0.25, // disables bezier curves
            }
        }		
    }
			var ctx2 = $("#chart2");
			var line_chart_pat_count2 = new Chart(ctx2, {
				type: 'line',
				data: chartdata,
				options:options_line_graph,	
			});
		}
		},
		error: function(resource) {
			console.log(resource);
		}
});

/*---------------------------------------------------------*/

// setSelectValue (id, val) {}is in footer
var ipd_bed = document.getElementById('ipd_bed');
var ipd_setting = document.getElementById('ipd_setting');
/* ipd_bed.addEventListener("click", function myFunction() {
	event.stopPropagation()
	location.href="/patho_reciept_list.php";
}); */
/* ipd_setting.addEventListener("click", function myFunction() {
	event.stopPropagation();
	location.href="/patho_add_test_sub.php";
}); */
on_click_redirect('ipd_bed','/patho_reciept_list.php');//collection monthly
on_click_redirect('ipd_setting','/patho_add_test_sub.php');//collection monthly
on_click_redirect('add_test','/universal_home.php');//test count 
on_click_redirect('test_reports','/list_all_tests_registered_pathology.php#1b');//test count 
on_click_redirect('report_pending','/list_all_tests_registered_pathology.php#1b');//test count 
//on_click_redirect('report_pending_monthly','/list_all_tests_registered_pathology.php#1b');//test count 
on_click_redirect('patient_count','/universal_home.php');//patient_count
on_click_redirect('add_patient','/addpatientform_pathology_parent.php');//patient_count
on_click_redirect('total_yearly_revenue','/patho_reciept_list.php');//patient_count
//on_click_redirect('report_pending_net','/patho_reciept_list.php');//patient_count
on_click_redirect('report_pending_net_monthly','/list_all_tests_registered_pathology.php#1b');//test count
on_click_redirect('report_pending_net_annual','/list_all_tests_registered_pathology.php#1b');//test count

function on_click_redirect(element_id,url){
console.log(`ID  ${element_id} and url ${url}`);
	var element = document.getElementById(element_id);
	element.addEventListener("click", function myFunction() {
	event.stopPropagation();
	location.href=url;
});
}

tooltip_nesting('#ipd_bed',"#ipd_setting")//Total_collection
tooltip_nesting("#test_reports",'#add_test')//test_count
tooltip_nesting("#patient_count",'#add_patient')//patient_count
tooltip_nesting("#total_yearly_revenue",'#net_collection')//patient_count
tooltip_nesting("#report_pending",'#tests_today_report_created')//patient_count
tooltip_nesting("#report_pending_net_monthly",'#tests_report_created')//patient_count_net
tooltip_nesting("#report_pending_net_annual",'#tests_report_created_annual')//patient_count_net
//tooltip_nesting("#report_pending_net",'#tests_report_created')//patient_count

  $('[data-toggle="tooltip"]').tooltip({
    animated : 'true',
    placement : 'bottom',
    container: 'body'});

function tooltip_nesting(child,parent){
	$(parent).on('mouseover', function(){   
    $(child).tooltip('hide');
	$(parent).addClass("fa-spin")
  }).on('mouseleave', function(){
	$(parent).removeClass("fa-spin")
    $(child).tooltip('show');
  });
  
  $(".important").on('mouseover', function(){
	$(".less_important").tooltip('hide');
		$(child).tooltip('hide');
	}).on('mouseleave', function(){
		//$(".less_important").tooltip('show');
		$(child).tooltip('hide');
	});
	$(".less_important").on('mouseover', function(){
		//$(".less_important").tooltip('hide');
		$(child).tooltip('hide');
	}).on('mouseleave', function(){
		//$(".less_important").tooltip('show');
		$(child).tooltip('hide');
	});
}
</script>
<?php
$pageTitle = "Dashboard"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>