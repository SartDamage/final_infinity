<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
<?php// include 'nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<style>
.card-columns {
  @include media-breakpoint-only(lg) {
    column-count: 2;
  }
  @include media-breakpoint-only(xl) {
    column-count: 2;
  }
	-webkit-column-count: 1; /* Chrome, Safari, Opera */
	-moz-column-count: 1; /* Firefox */
    column-count: 1;
	display: inline-block;
	width: 100%;
}
.chart-container{
	min-height:227px;
}
.chart-container .main_chart{
	min-height:500px;
}
.show_in_mob{
	display:none;
}
</style>
<body>
	<div id="main">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
		<div class="container" style="margin-top:10px;">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Dashboard</h4>
					<p class="card-text"><small class="text-muted">Contains information for management of hospital on day to day basis updated every day on 6 pm</small></p>
				</div>
			</div>
		<!--<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>-->
		</div>
		<!---------------------------------->
		<div class="container show_in_desk" style="margin-top:10px;">

					<div class="card"><!--daily patientcount chart line-->
						<div class="card-block">
							<h4 class="card-title">&nbsp;&nbsp;Visual representation for no. of patients entering hospital daily </h4>
						</div>
						<div class="chart-container main_chart" style="position: relative; width:85%;margin:auto;">
							<canvas id="myChart"></canvas>
						</div>
						<div class="card-block">
						<p class="card-text">Click on the following link to go to list of all registered patients.</p>
						<a href="/list_all_patients.php" class="btn btn-primary">List of all patients</a>
						</div>
					</div>
		</div>
		<div class="container show_in_desk" style="margin-top:20px;margin-bottom:100px;">
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="card-columns">
						<!--<div>
							<div class="card p-2">--><!-- daily present absent count -->
								<!--<h4 class="card-title">Daily attendence</h4>
								<div class="chart-container" style="position: relative;margin:auto;">
								<canvas id="bar-chart-horizontal"></canvas>
								</div>
							</div>
						</div>-->
						<div class="col-md-12">
							<div class="card p-2 "><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution of various departments </h4>
									<div class="chart-container" id="chart_container" style="position: relative; width:86%;margin:auto;">
										<canvas id="myChart_pie"  style="height:170px;"></canvas>
									</div>
									<center>
										<p class="card-text">
											<small class="text-muted">Revenue contribution on day to day basis by department monthly
											</small>
										</p>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card"><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis </h4>
									<div class="chart-container" style="position: relative;margin:auto;">
										<canvas id="chart_revenue_breakup" class="chartjs-render-monitor" style="display: block;"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">Revenue contribution on day to day basis by department monthly</small></p></center>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card"><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis OPD</h4>
									<div class="chart-container" style="position: relative;margin:auto;">
										<canvas id="chart_revenue_breakup_opd" class="chartjs-render-monitor" style="display: block;"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">Revenue contribution on day to day basis by department monthly</small></p></center>
								</div>
							</div>
						</div>
            <div class="col-md-12">
              <div class="card"><!-- revenue chart pie-->
                <div class="card-block">
                  <h4 class="card-title">Visual representation for no. of patients entering hospital daily in OT</h4>
                  <div class="chart-container" style="position: relative;margin:auto;">
                    <canvas id="chart_revenue_breakup_opd_new"  style="display: block;"></canvas>
                  </div>
                  <center><p class="card-text"><small class="text-muted">No. of patients entering hospital daily Add with OT</small></p></center>
                </div>
              </div>
            </div>
						<!--<div>
							<div class="card card-inverse card-primary p-2 text-center ">
								<blockquote class="card-blockquote">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
								<footer>
									<small>
									Someone famous in <cite title="Source Title">Source Title</cite>
									</small>
								</footer>
								</blockquote>
							</div>
						</div>-->
					</div>
				</div>
				<div class="col-md-6 col-lg-6 ">
					<div class="card-columns">
						<div class="col-sm-12">
							<div class="card p-2">
							<div class="card-block">
								<h4 class="card-title">Monthly expenses scale <a class="btn btn-outline-primary pull-right" href="/add_expense.php">Add expense</a></h4>
								<br>
								<div class="chart-container" id="exp_chart" style="position: relative;margin:auto;">
									<canvas id="chart1" class="chartjs-render-monitor" style="display: block;"></canvas>
								</div>
								<center><p class="card-text"><small class="text-muted">Expense v/s Income</small></p></center>
							</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="card"><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis IPD</h4>
									<div class="chart-container" style="position: relative;margin:auto;">
										<canvas id="chart_revenue_breakup_ipd" class="chartjs-render-monitor" style="display: block;"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">Revenue contribution on day to day basis by department monthly</small></p></center>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="card"><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis Pathology</h4>
									<div class="chart-container" style="position: relative;margin:auto;">
										<canvas id="chart_revenue_breakup_patho" class="chartjs-render-monitor" style="display: block;"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">Revenue contribution on day to day basis by department monthly</small></p></center>
								</div>
							</div>
						</div>
            <div class="col-sm-12">
							<div class="card"><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis in OT</h4>
									<div class="chart-container" style="position: relative;margin:auto;">
										<canvas id="chart_revenue_in_ot" class="chartjs-render-monitor" style="display: block; width: 387px; height: 193px;" width="387" height="220"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">Revenue contribution on day to day basis by department monthly</small></p></center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">

				</div>
			</div>
		</div>



		<div class="container show_in_mob" style="margin-top:10px;">
			<hr>
			<div class="row justify-content-md-center">
				<div class="col-md-4"><!--count ipd-->
					<div class="card mb-3 violet pointer" style="/* width: 18rem; */">
					<a class="reset-this" id="ipd_bed"  data-toggle="tooltip" data-placement="bottom" title="Go to List IPD patients" >
					  <div class="card-body">
						<h5 class="card-title"># IPD Patients Admitted today<i class="fas fa-cog  pull-right "  id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="change Test Rates"></i></h5>
						<h6 class="card-subtitle mb-2 text-muted">patients addmited on day : <?php echo date("d-m-Y");?> </h6>
						<!--<p class="card-text">					</p>-->
						<div class="row">
							<div class="col-4">
								<i class="fal fa-procedures fa-fw fa-4x"></i>
							</div>
							<div class="col-8">
								<span class="important" id="available_bed" data-toggle="tooltip" data-placement="bottom" title="Patients admitted today">
							<?php
								$db = getDB();
								$stmt = $db->prepare("SELECT (SELECT count(*) FROM patientipd WHERE DATE(`admit_date_time`) = CURRENT_DATE - INTERVAL 0 DAY) as ipd_active_count");
								/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
								$stmt->execute();
								$data=$stmt->fetchALL();
								foreach($data as $row) {
										echo $row["ipd_active_count"];
									}
								?>
								</span>
								<span class="important">/</span>
								<span class="less_important" id="total_beds" data-toggle="tooltip" data-placement="bottom" title="Active Patient's">
									<?php
										$stmt="";
										$stmt = $db->prepare("SELECT (SELECT count(*) FROM patientipd WHERE `discharge_date_time` is null)  as ipd_active");
										/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
										$stmt->execute();
										$data=$stmt->fetchALL();
										foreach($data as $row) {
												echo $row["ipd_active"];
											}
									?>
								</span>
							</div>
						</div>
						<!--<a href="#" class="card-link">Another link</a>-->
					  </div>
					  </a>
					</div>
				</div>
				<div class="col-md-4"><!--count opd-->
					<div class="card mb-3 pale_green pointer" style="/* width: 18rem; */"  >
						<a class="reset-this" id="test_reports"  data-toggle="tooltip" data-placement="bottom" title="go to all opd patients list">
							<div class="card-body">
								<h5 class="card-title"># OPD patients Visit today </h5>
								<h6 class="card-subtitle mb-2 text-muted"># of OPD visits on : <?php echo date("d-m-Y");?></h6>
								<!--<p class="card-text">					</p>-->
								<div class="row">
									<div class="col-4">
										<i class="fal fa-user-md fa-fw fa-4x"></i>
									</div>
									<div class="col-8">

										<span class="important" id="tests_today" data-toggle="tooltip" data-placement="bottom" title="Patients entered today">
											<?php $db = getDB();
											$stmt = $db->prepare("SELECT (SELECT count(*) FROM patientopd where DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL 1 DAY) as count_opd");
											/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
											$stmt->execute();
											$data=$stmt->fetchALL();
											foreach($data as $row) {
													echo $row["count_opd"];
												}
											?>
										</span>
									</div>
								</div>
						<!--<a href="#" class="card-link">Another link</a>-->
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4"><!-- @@ count pathology @@ -->
					<div class="card mb-3 pale_light_blue pointer" style="/* width: 18rem; */">
					<a id="report_pending" data-toggle="tooltip" data-placement="bottom" title="go to reports">
					  <div class="card-body">
						<h5 class="card-title">Report Count</h5>
						<h6 class="card-subtitle mb-2 text-muted">Number of report for : <?php echo date("d/m/Y");?></h6>
						<p class="card-text">					</p>
						<div class="row">
							<div class="col-4">
								<i class="fal fa-vials fa-fw fa-4x"></i>
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
			</div>
			<hr>
			<div class="row justify-content-md-center">
			<div class="col-md-4"><!--IPD annual revenue-->
				<div class="card mb-3 pale_red pointer" style="/* width: 18rem; */">
				<a class="reset-this" id="total_yearly_revenue"  data-toggle="tooltip" data-placement="bottom" title="Go to Invoicing" >
				  <div class="card-body">
					<h5 class="card-title">Total revenue From IPD</h5>
					<h6 class="card-subtitle mb-2 text-muted">revenue from IPD for year <?php  echo date("Y") ;  ?></h6><!--."-".substr(date('Y',strtotime('+1 year')), 2,3)-->
					<p class="card-text">					</p>
					<div class="row">
						<div class="col-lg-6 col-md-8">
						<i class="fal fa-procedures fa-fw fa-4x"></i>
							<i class="fa-stack fa-2-3x fa-fw " style="margin-top:-26%">
								<i class="fal fa-sticky-note fa-stack-2x"></i>
								<i class="fal fa-rupee-sign fa-stack-1x"></i>
							</i>
						</div>
						<div class="col-lg-6 col-md-4">
							<div class="pull-right">
								<span class="important" id="net_collection"  data-toggle="tooltip" data-placement="bottom" title="Amount collected">
									₹<?php $db = getDB();
									$stmt = $db->prepare("SELECT pr.instance_id,pr.Registered_ID,pr.paid,pr.amount,pr.discount,pr.advance  FROM `ipd_bill` as pr where (YEAR(pr.WhenEntered) = YEAR(NOW()))");
									/*   AND DAY(pr.WhenEntered) = DAY(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and DAY(pr.WhenEntered) = DAY(NOW())*/
									$stmt->execute();
									$count=$stmt->rowCount();
									$data=$stmt->fetchALL();
									$collection2 = 0;
									$discount2 = 0;
									$pending2 = 0;
									$total_balance2 = 0;
									foreach($data as $row) {
										$collection2 += (floatval($row['paid'])+floatval($row['advance']));
										$total_balance2 = (floatval($row['amount'])-floatval($row['discount'])-floatval($row['advance'])-floatval($row['paid']));
										$discount2 += (floatval($row['discount']));
										}
										echo floatval($collection2);
									?>
								</span>
								<span class="important">/</span>
								<span class="less_important" id="net_balance"  data-toggle="tooltip" data-placement="bottom" title="Amount pending">
									₹<?php
										echo floatval($total_balance2);
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

			<div class="col-md-4"><!--OPD annual revenue-->
				<div class="card mb-3 pale_red pointer" style="/* width: 18rem; */">
				<a class="reset-this" id="total_yearly_revenue_opd"  data-toggle="tooltip" data-placement="bottom" title="Go to Invoicing" >
				  <div class="card-body">
					<h5 class="card-title">Total revenue From OPD</h5>
					<h6 class="card-subtitle mb-2 text-muted">revenue from OPD for year <?php  echo date("Y") ;  ?></h6><!--."-".substr(date('Y',strtotime('+1 year')), 2,3)-->
					<p class="card-text">					</p>
					<div class="row">
						<div class="col-lg-6 col-md-8">
						<i class="fal fa-user-md fa-fw fa-4x"></i>
							<i class="fa-stack fa-2-3x fa-fw " style="margin-top:-26%">
								<i class="fal fa-sticky-note fa-stack-2x"></i>
								<i class="fal fa-rupee-sign fa-stack-1x"></i>
							</i>
						</div>
						<div class="col-lg-6 col-md-8">
							<div class="pull-right">
								<span class="important" id="net_collection"  data-toggle="tooltip" data-placement="bottom" title="Amount collected">
									₹<?php $db = getDB();
									$stmt = $db->prepare("SELECT pr.PatientId,pr.RegistrationID,pr.paid,pr.TotalAmount,pr.discount,pr.advance  FROM `opd_reciepts` as pr where YEAR(pr.WhenEntered) = YEAR(NOW())");
									/*   AND DAY(pr.WhenEntered) = DAY(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and DAY(pr.WhenEntered) = DAY(NOW())*/
									$stmt->execute();
									$count=$stmt->rowCount();
									$data=$stmt->fetchALL();
									$collectionl = 0;
									$discount1 = 0;
									$pending1 = 0;
									$total_balance1 = 0;
									foreach($data as $row) {
										$collectionl += (floatval($row['paid'])+floatval($row['advance']));
										$total_balance1 = (floatval($row['TotalAmount'])-floatval($row['discount'])-floatval($row['advance'])-floatval($row['paid']));
										$discount1 += (floatval($row['discount']));
										}
										echo floatval($collectionl);
									?>
								</span>
								<span class="important">/</span>
								<span class="less_important" id="net_balance"  data-toggle="tooltip" data-placement="bottom" title="Amount pending">
									₹<?php $db = getDB();
									$stmt = $db->prepare("SELECT pr.PatientId,pr.RegistrationID,pr.paid,pr.TotalAmount,pr.discount,pr.advance  FROM `opd_reciepts` as pr where YEAR(pr.WhenEntered) = YEAR(NOW())");
									/*   AND DAY(pr.WhenEntered) = DAY(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()) and DAY(pr.WhenEntered) = DAY(NOW())*/
									$stmt->execute();
									$count=$stmt->rowCount();
									$data=$stmt->fetchALL();
									$collectionl = 0;
									$discount1 = 0;
									$pending1 = 0;
									$total_balance1 = 0;
									foreach($data as $row) {
										$collectionl += (floatval($row['paid'])+floatval($row['advance']));
										$total_balance1 = (floatval($row['TotalAmount'])-floatval($row['discount'])-floatval($row['advance'])-floatval($row['paid']));
										$discount1 += (floatval($row['discount']));
										}
										echo floatval($total_balance1);
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

			<div class="col-md-4"><!--pathology_annual_revenue-->
				<div class="card mb-3 pale_red pointer" style="/* width: 18rem; */">
				<a class="reset-this" id="total_yearly_revenue_patho"  data-toggle="tooltip" data-placement="bottom" title="Go to Invoicing" >
				  <div class="card-body">
					<h5 class="card-title">Total revenue From Pathology</h5>
					<h6 class="card-subtitle mb-2 text-muted">revenue from pathology for year <?php  echo date("Y") ;  ?></h6><!--."-".substr(date('Y',strtotime('+1 year')), 2,3)-->
					<p class="card-text">					</p>
					<div class="row">
						<div class="col-lg-6 col-md-8">
						<i class="fal fa-vials fa-4x"></i>
							<i class="fa-stack fa-2-3x fa-fw " style="margin-top:-26%">
								<i class="fal fa-sticky-note fa-stack-2x"></i>
								<i class="fal fa-rupee-sign fa-stack-1x"></i>
							</i>
						</div>
						<div class="col-lg-6 col-md-8">
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
      <div class="row">
      <div class="col-md-12">
        <div class="card"><!-- revenue chart pie-->
          <div class="card-block">
            <h4 class="card-title">Monthly revenue contribution on day to day basis OPD</h4>
            <div class="chart-container" style="position: relative;margin:auto;">
              <canvas id="chart_revenue_breakup_opd_new" class="chartjs-render-monitor" style="display: block;"></canvas>
            </div>
            <center><p class="card-text"><small class="text-muted">Revenue contribution on day to day basis by department monthly</small></p></center>
          </div>
        </div>
      </div>

      </div>
			</div>
			<hr>
			<!--<div class="row justify-content-md-center">
				<div class="col-md-4">
					<div class="card mb-3 pale_dark_blue pointer" style="/* width: 18rem; */">
					<a id="report_pending_net_monthly" data-toggle="tooltip" data-placement="bottom" title="go to reports">
					  <div class="card-body">
						<h5 class="card-title">Monthly Report Count</h5>
						<h6 class="card-subtitle mb-2 text-muted">Number of report in  year </h6>
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
				<div class="col-md-4">
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
			</div>-->
		</div>
<script src="/dependencies/js/admin_dashboard.js">

/*-----------------------------------------------------*/
/* new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["Present", "Absent", "Half-day"],
      datasets: [
        {
          label: "Attendence ",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [24,2,0]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'no. of people'
      }
    },

}); */
/*------------------------------------------------------*/


/*---------------------------------------------------------*/
	</script>
<?php
$pageTitle = "Admin Dashboard HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>
