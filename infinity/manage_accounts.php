<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
?>
<?php include './include/header.php';?>

<style>
a {-webkit-transition: .25s all;transition: .25s all;}

.card {overflow: hidden;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);-webkit-transition: .25s box-shadow;transition: .25s box-shadow;}

.card:focus,.card:hover {box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);}

.card-inverse .card-img-overlay {background-color: rgba(51, 51, 51, 0.85);border-color: rgba(51, 51, 51, 0.85);}
.accord{width: -webkit-fill-available;width:100%;border-radius: 0px;}
#accordion .panel{padding:5px 0 5px 0;}
#accordion .panel-body{padding:5px;border-style: none ridge none ridge;margin: 0 8 0 8;}
#accordion .panel-body-last{padding:5px;border-style: none ridge ridge ridge;margin: 0 8 0 8;}


.panel-default>.panel-heading a:after {content: "";position: relative;top: 1px;display: inline-block;font-family: 'Glyphicons Halflings';font-style: normal;font-weight: 400;line-height: 1;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;float: right;transition: transform .25s linear;-webkit-transition: -webkit-transform .25s linear;}

.panel-default>.panel-heading a[aria-expanded="true"] {/*background-color: #eee;*/}

.panel-default>.panel-heading a[aria-expanded="true"]:after {content: "\2212";-webkit-transform: rotate(180deg);transform: rotate(180deg);}

.panel-default>.panel-heading a[aria-expanded="false"]:after {content: "\002b";-webkit-transform: rotate(90deg);transform: rotate(90deg);}

#doctors li {
   float: left;
   margin-left:50px;
}
.inline_ul li{
	float:left;
	margin-left:20px;
}
.spin{transition: all 0.3s ease-in-out 0s; }
card-block:hover .spin{
    cursor: default;
    transform: rotate(45deg);
    transition: all 0.3s ease-in-out 0s;
}
.center{
	text-align:center;
}
i{
	  transition: 0.70s;
  -webkit-transition: 0.70s;
  -moz-transition: 0.70s;
  -ms-transition: 0.70s;
  -o-transition: 0.70s;
	transition-timing-function: ease-in-out;
}
.spin:hover i{
	  transition: 0.70s;
  -webkit-transition: 0.70s;
  -moz-transition: 0.70s;
  -ms-transition: 0.70s;
  -o-transition: 0.70s;
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  transform: rotate(180deg);
}
.wiggle:hover i{
	animation: shake 0.9s cubic-bezier(.36,.07,.19,.97) both;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
  perspective: 1000px;
}
</style>
<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>

<body style="background-color:#E0F2F1;">
	<div id="main">
		<?php include './nav_bartop.php';?>
		<div class="container">
		<br>
			<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5>Welcome <?php echo $userDetails->username; ?></h5>
			  </div>
			</div>
			<br>
			<div class="card card-outline-info mb-3">
			<div class="card-block">
			<div class="container">
				<div class="accordion-option">
					<h4 class="title pull-left">General Management</h4>
					<!-- <button class="btn btn-info pull-right" type="button" data-toggle="collapse" data-target=".panel-collapse" aria-expanded="false" aria-controls="collapseOne collapseTwo collapseThree">Toggle both elements</button> -->
					<!-- <i id="bars" accordion-id="#accordion" name="Expand all menu" class=" toggle-accordion active fa fa-bars fa-2x pull-right" data-toggle="collapse" data-target=".panel-collapse" aria-expanded="false" aria-controls="collapseOne collapseTwo collapseThree" style="display: table-cell;" href="javascript:void(0)"></i> -->
					<br>
					<br>
					<!-- <a href="javascript:void(0)" class="toggle-accordion active" accordion-id="#accordion"></a> -->
				</div>
				<div class="clearfix"></div>
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<!--------------->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<a class="btn btn-outline-teal btn-lg accord" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
							<div class="container">
								<div class="pull-left" style="font-size:16px">
									<b>Patient Section</b>
								</div>
							</div>
							</a>
						</div>
						<div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
							<div class="panel-body">
								<br>
								<div class="row justify-content-md-center">
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="add_new_patient"  data-toggle="tooltip" data-placement="bottom" title="Register new patient" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Add new patient </h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
														<i class="fal fa-user-plus fa-fw fa-4x">
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_patient"  data-toggle="tooltip" data-placement="bottom" title="list of patient" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">List all patient </h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
														<i class="fal fa-users fa-fw fa-4x">
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_patient_opd"  data-toggle="tooltip" data-placement="bottom" title="list of all out patient" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">List&nbsp;out&nbsp;patient</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
														<i class="fal fa-user-md fa-fw fa-4x">
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_patient_ipd"  data-toggle="tooltip" data-placement="bottom" title="list of all in patient" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">List all in patient</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
														<i class="fal fa-procedures fa-fw fa-4x">
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
                                                                        <div class="col-sm-8 col-md-2 center">
                                                                                    <div class="card mb-3 pale_red pointer" >
                                                                                            <a class="reset-this" id="list_all_records"  data-toggle="tooltip" data-placement="bottom" title="list of all records" >
                                                                                              <div class="card-body" style="padding:1rem;">
                                                                                                    <h7 class="card-title">List all Records</h7>
                                                                                                    <br>
                                                                                                    <div class="row justify-content-md-center">
                                                                                                            <div class="col-sm-8 col-md-8 center">
                                                                                                                    <i class="fas fa-clipboard-list fa-4x">
                                                                                                                    </i>
                                                                                                            </div>
                                                                                                    </div>
                                                                                              </div>
                                                                                            </a>
                                                                                    </div>
                                                                            </div>
								</div>
							<!--<ul>
							<li><a href="./addpatientform.php">Add New Patient</a></li>-->

							<!--<li><a href="#">Deactivate Patient</a></li>-->
							<!-- <li><a href="#">update Patient</a></li> -->

							<!--<li><a href="./list_all_patients.php">List Patient all</a></li>
							<li><a href="./list_all_patients_ipd.php">List Patient IPD</a></li>
							<li><a href="./list_all_patients_opd.php">List Patient OPD</a></li>
							</ul>-->
						</div>
						</div>
					</div>
					<!-------------->
						<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<a class="btn btn-outline-teal btn-lg accord" role="button" data-toggle="collapse" data-parent="#accordion" href="#pharmacycollpase" aria-expanded="true" aria-controls="collapseFour">
							<div class="container">
								<div class="pull-left" style="font-size:16px">
									<b>Pharmacy Section</b>
								</div>
							</div>
							</a>
						</div>
						<div id="pharmacycollpase" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
							<div class="panel-body">
								<br>
								<div class="row justify-content-md-center">
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="add_new_stock"  data-toggle="tooltip" data-placement="bottom" title="Add New Stock">
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Add new Stock</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
															<i class="fal fa-prescription-bottle-alt fa-4x"></i>

													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="add_new_cat"  data-toggle="tooltip" data-placement="bottom" title="Add New Category" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Add Category</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
															<i class="fal fa-notes-medical fa-4x"></i>

													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="add_new_type"  data-toggle="tooltip" data-placement="bottom" title="Add New Stock Type" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Add Stock Type</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
															<i class="fal fa-prescription-bottle fa-4x"></i>

													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_all_stock"  data-toggle="tooltip" data-placement="bottom" title="List All Stocks" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">List all Stock </h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">


														<i class="fal fa-capsules fa-4x"></i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="add_new_invoicep"  data-toggle="tooltip" data-placement="bottom" title="Add New Invoice" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Add New Invoice </h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-10 center">


													<i class=" fa-sidebar fa-stack fa-2x">
															<i class=" fal fa-sticky-note fa-stack-2x "></i>
															<i class="fal fa-rupee-sign fa-stack-1x"></i>
															</i>
															<i class="far fa-plus fa-2x fa-right" style="position: relative;bottom:5%;"></i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="show_invoice"  data-toggle="tooltip" data-placement="bottom" title="Show Invoice" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Invoice</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
															<i class=" fa-sidebar fa-stack fa-2x">
															<i class=" fal fa-sticky-note fa-stack-2x"></i>
															<i class="fal fa-rupee-sign fa-stack-1x"></i>
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
								</div>
							<!--<ul>
							<li><a href="./addpatientform.php">Add New Patient</a></li>-->
							<!--<li><a href="#">Deactivate Patient</a></li>-->
							<!-- <li><a href="#">update Patient</a></li> -->

							<!--<li><a href="./list_all_patients.php">List Patient all</a></li>
							<li><a href="./list_all_patients_ipd.php">List Patient IPD</a></li>
							<li><a href="./list_all_patients_opd.php">List Patient OPD</a></li>
							</ul>-->
						</div>
						</div>
					</div>
					<!---------------------->
					<!---------------->

					<!-------------->
						<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<a class="btn btn-outline-teal btn-lg accord" role="button" data-toggle="collapse" data-parent="#accordion" href="#otcollpase" aria-expanded="true" aria-controls="collapseFour">
							<div class="container">
								<div class="pull-left" style="font-size:16px">
									<b>Operation Theatre Section</b>
								</div>
							</div>
							</a>
						</div>
						<div id="otcollpase" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
							<div class="panel-body">
								<br>
								<div class="row justify-content-md-center">
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_ot_patients"  data-toggle="tooltip" data-placement="bottom" title="All O.T. Patients" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">O.T. Patients</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
															<i class="fal fa-cut fa-4x"></i>

													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_delivery_details"  data-toggle="tooltip" data-placement="bottom" title="List Delivery Details" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Delivery Details</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
															<i class="fas fa-clipboard-list fa-4x"></i>

													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_mpt_details"  data-toggle="tooltip" data-placement="bottom" title="List MTP Details" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">MTP Details</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
															<i class="fal fa-list-alt fa-4x"></i>

													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_tl_details"  data-toggle="tooltip" data-placement="bottom" title="List TL Details" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">TL Details </h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">


														<i class="fal fa-list-ol fa-4x"></i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_vt_details"  data-toggle="tooltip" data-placement="bottom" title="List VT Details" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">VT Details</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-10 center">


													<i class="fas fa-list fa-4x">
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="mtp_summary"  data-toggle="tooltip" data-placement="bottom" title="MTP SUMMARY" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">MTP Summary</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
															<i class="fal fa-notes-medical fa-4x"></i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>

									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="new_suegery"  data-toggle="tooltip" data-placement="bottom" title="ADD SURGERY" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Add Surgery</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
															<i class="fal fa-notes-medical fa-4x"></i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
								</div>
							<!--<ul>
							<li><a href="./addpatientform.php">Add New Patient</a></li>-->

							<!--<li><a href="#">Deactivate Patient</a></li>-->
							<!-- <li><a href="#">update Patient</a></li> -->

							<!--<li><a href="./list_all_patients.php">List Patient all</a></li>
							<li><a href="./list_all_patients_ipd.php">List Patient IPD</a></li>
							<li><a href="./list_all_patients_opd.php">List Patient OPD</a></li>
							</ul>-->
						</div>
						</div>
					</div>
					<!---------------------->

					<!---------------------->
					<div class="panel panel-default">
					  <div class="panel-heading" role="tab" id="headingOne">
						<a class="btn btn-outline-teal btn-lg accord" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						 <div class="container">
						   <div class="pull-left" style="font-size:16px">
							 <b>Doctor Section</b>
						   </div>
						 </div>
						</a>
					  </div>
					  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<br>
							<div class="row justify-content-md-center">
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="add_new_doctor"  data-toggle="tooltip" data-placement="bottom" title="Register new doctor" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Add new Doctor </h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-10 center">
														<i class="fal fa-user-md  fa-4x fa-left"></i>
														<i class="far fa-plus fa-2x fa-right" style="position: relative;bottom:15%;"></i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="update_doctor"  data-toggle="tooltip" data-placement="bottom" title="Update doctor" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Update Doctor </h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-10 center">
														<i class="fal fa-user-md  fa-4x fa-left"></i>
														<i class="far fa-pencil fa-2x fa-right" style="position: relative;bottom:12%;"></i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="deactivate_doctor"  data-toggle="tooltip" data-placement="bottom" title="Deactivate doctor" >
										  <div class="card-body" style="padding-left:0.9rem;padding-right:0.9rem;padding-top:1rem;padding-bottom:1rem;">
											<h7 class="card-title">Deactivate&nbsp;doctor</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-7 col-md-7 center">
													<i class="fa-stack fa-2-3x" style="font-size: 1.75rem !important">
														<i class="fal fal fa-ban fa-stack-2x"></i>
														<center><i class="fal fa-user-md  fa-1x "></i></center>
													</i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="list_doctor"  data-toggle="tooltip" data-placement="bottom" title="list of all Doctors" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">List all Doctor</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-md-12">
													<center><img src="/img/fa-users-md-dark.svg" style="height:54px" alt="Kiwi standing on oval"></center>
													</i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="charges_doctor"  data-toggle="tooltip" data-placement="bottom" title="Consultation Charges Doctors" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Consult Charges</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-9 col-md-9 center">
													<i class="fal fa-user-md  fa-4x fa-left"></i>
													<i class="far fa-inr fa-2x fa-right" style="position: relative;bottom:15%;"></i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
							</div>
							<!--<center>
						  <ul id="doctors" style="margin-left:9.5%">
						  <li><a href="/add_new_staff_doctor_form.php">Add Doctor</a></li>
						  <li><a href="list_all_employees_doctor_toggle.php">Deactivate Doctor</a></li>
						  <li><a href="/list_all_employees_doctor.php">update Doctor</a></li>
						  <li><a href="/list_all_employees_doctor.php">List Doctor</a></li>
						  <li><a href="/list_all_employees_doctor_consult_charges.php">Consultation Charges Doctor</a></li>
						  </ul>
						  </center>-->
						</div>
					  </div>
					</div>
					<div class="panel panel-default">
					  <div class="panel-heading" role="tab" id="headingTwo">
						<!-- <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						  Collapsible Group Item #2
						</a>
					  </h4> -->
					  <a class="btn btn-outline-teal btn-lg accord" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						 <div class="container">
						   <div class="pull-left" style="font-size:16px">
							 <b>Pathologist section</b>
						   </div>
						 </div>
						</a>
					  </div>
					  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							<br>
							<div class="row justify-content-md-center">
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="add_new_pathologist"  data-toggle="tooltip" data-placement="bottom" title="list and/or add new pathologist" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Add Pathologist</h7>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-10 center">
												<br>
														<i class="fal fa-user-md  fa-4x fa-left"></i>
														<i class="far fa-plus fa-2x fa-right" style="position: relative;bottom:15%;"></i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="main_category"  data-toggle="tooltip" data-placement="bottom" title="List of main category" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Main Category</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-10 center">
													<br>
													<i class="fal fa-vial fa-4x fa-left"></i>
													<i class="far fa-plus fa-2x fa-right" style="position: relative;bottom:15%;"></i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="change_rates"  data-toggle="tooltip" data-placement="bottom" title="change pathology test charges" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Test Rates</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-8 center">
													<br>
													<i class="fal fa-vials fa-4x"></i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="list_patho_invoice"  data-toggle="tooltip" data-placement="bottom" title="list of all pathology test invoice" >
											<div class="card-body" style="padding-left:0.9rem;padding-right:0.9rem;padding-top:1rem;padding-bottom:1rem;">
												<h7 class="card-title">Pathology&nbsp;invoice</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-7 col-md-7 center">
														<br>
														<i class=" fa-sidebar fa-stack fa-2x">
															<i class=" fal fa-sticky-note fa-stack-2x"></i>
															<i class="fal fa-rupee-sign fa-stack-1x"></i>
														</i>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="list_patho_patients"  data-toggle="tooltip" data-placement="bottom" title="list of all pathology patients all test" >
											<div class="card-body" style="padding-left:0.9rem;padding-right:0.9rem;padding-top:1rem;padding-bottom:1rem;">
												<h7 class="card-title">Pathology&nbsp;patient</h7>
												<br>
												<div class="row justify-content-md-center">
													<div class="col-sm-8 col-md-8 center">
														<br>
														<i class="fal fa-users fa-4x"></i>
													</div>
													</i>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<!--
						  <ul class="inline_ul">
						  <li><a href="./pathology_add_dr.php">Add/List Pathologist</a></li>
						  <li><a href="./pathology_add_test_main.php">Add/List Pathology main category</a></li>
						  <li><a href="/patho_add_test_sub.php">Add/List Pathology test sub-category</a></li>
						  <li><a href="/patho_reciept_list.php">List all pathology invoice</a></li>
						  <li><a href="/list_all_tests_registered_pathology.php">List all pathology patients</a></li>
						  </ul>-->
					  </div>
					</div>
					<div class="panel panel-default"><!--staff-->
					  <div class="panel-heading" role="tab" id="headingThree">
						<a class="btn btn-outline-teal btn-lg accord " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
						 <div class="container">
						   <div class="pull-left" style="font-size:16px">
							 <b>All Staff</b>
						   </div>
						 </div>
						</a>
						<!-- <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
						  Collapsible Group Item #3
						</a>
					  </h4> -->
					  </div>
					  <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body panel-body-last">
						 <br>
							<div class="row justify-content-md-center">

								<!--var add_new_staff = document.getElementById('add_new_staff');
								var add_new_admin = document.getElementById('add_new_admin');
								var deact_user = document.getElementById('deact_user');
								var list_all_user = document.getElementById('list_all_user');-->

								<div class="col-sm-8 col-md-2 center wiggle">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="add_new_staff"  data-toggle="tooltip" data-placement="bottom" title="Register new Staff" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Add New Staff </h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-8 center">
													<i class="fal fa-user-plus fa-fw fa-4x">
													</i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center wiggle">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="add_new_admin"  data-toggle="tooltip" data-placement="bottom" title="Register new Admin" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Create Admin</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-19">
													<i class="fal fa-user-circle  fa-4x fa-left"></i>
													<i class="far fa-plus fa-2x fa-right" style="position: relative;bottom:15%;"></i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center wiggle">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="deact_user"  data-toggle="tooltip" data-placement="bottom" title="Deactivate A User" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Deactivate User</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-7 col-md-7 center">
													<i class="fa-stack fa-2-3x" style="font-size: 1.75rem !important">
														<i class="fal fal fa-ban fa-stack-2x"></i>
														<center><i class="fal fa-user  fa-1x "></i></center>
													</i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center wiggle">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="list_all_user"  data-toggle="tooltip" data-placement="bottom" title="list of all Staff" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">List all Staff</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-8 center">
													<i class="fas fa-users fa-fw fa-4x">
													</i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
							</div>

						 <!--<ul>-->
						 <!--<li><a href="/add_new_staff_admin_form.php">Create a new Admin</a></li>
						  <li><a href="/add_new_staff_form.php">Add New User</a></li>
						  <li><a href="/list_all_employees_toggle.php">Deactivate a User</a></li>
						  <li><a href="/list_all_employees.php">List all User</a></li>
						  </ul>-->
						</div>
					  </div>
					</div>
					<!--@@@22-->
					<div class="panel panel-default"><!-- System-->
					  <div class="panel-heading" role="tab" id="headingFour">
						<a class="btn btn-outline-teal btn-lg accord " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSystem" aria-expanded="true" aria-controls="collapseThree">
						 <div class="container">
						   <div class="pull-left" style="font-size:16px">
							 <b>Configure System</b>
						   </div>
						 </div>
						</a>
						<!-- <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
						  Collapsible Group Item #3
						</a>
					  </h4> -->
					  </div>
					  <div id="collapseSystem" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
						<div class="panel-body panel-body-last">
						 <br>
							<div class="row justify-content-md-center">

								<!--var add_new_staff = document.getElementById('add_new_staff');
								var add_new_admin = document.getElementById('add_new_admin');
								var deact_user = document.getElementById('deact_user');
								var list_all_user = document.getElementById('list_all_user');-->

								<div class="col-sm-8 col-md-2 center">
									<div class="card mb-3 pale_red pointer spin" >
										<a class="reset-this" id="global_setting"  data-toggle="tooltip" data-placement="bottom" title="Go to Global Setting">
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">&nbsp;&nbsp;Global Setting </h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-8 center">
													<i class="fal fa-cog fa-fw fa-4x ">
													</i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<!--<div class="col-sm-8 col-md-2 center wiggle">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="add_new_admin"  data-toggle="tooltip" data-placement="bottom" title="Register new Admin" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Create Admin</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-19">
													<i class="fal fa-user-circle  fa-4x fa-left"></i>
													<i class="far fa-plus fa-2x fa-right" style="position: relative;bottom:15%;"></i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center wiggle">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="deact_user"  data-toggle="tooltip" data-placement="bottom" title="Deactivate A User" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Deactivate User</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-7 col-md-7 center">
													<i class="fa-stack fa-2-3x" style="font-size: 1.75rem !important">
														<i class="fal fal fa-ban fa-stack-2x"></i>
														<center><i class="fal fa-user  fa-1x "></i></center>
													</i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center wiggle">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="list_all_user"  data-toggle="tooltip" data-placement="bottom" title="list of all Staff" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">List all Staff</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-8 center">
													<i class="fas fa-users fa-fw fa-4x">
													</i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-md-2 center wiggle">
									<div class="card mb-3 pale_red pointer" >
										<a class="reset-this" id="list_all_user"  data-toggle="tooltip" data-placement="bottom" title="list of all Staff" >
										  <div class="card-body" style="padding:1rem;">
											<h7 class="card-title">Set Attendance</h7>
											<br>
											<div class="row justify-content-md-center">
												<div class="col-sm-8 col-md-8 center">
													<i class="fas fa-archive fa-fw fa-4x"></i>
													</i>
												</div>
											</div>
										  </div>
										</a>
									</div>
								</div>-->
							</div>
							</div>


						 <ul>
						 <!--<li><a href="/add_new_staff_admin_form.php">Create a new Admin</a></li>
						  <li><a href="/add_new_staff_form.php">Add New User</a></li>
						  <li><a href="/list_all_employees_toggle.php">Deactivate a User</a></li>
						  <li><a href="/list_all_employees.php">List all User</a></li>
						  </ul>-->
						</div>
					  </div>
            <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<a class="btn btn-outline-teal btn-lg accord" role="button" data-toggle="collapse" data-parent="#accordion" href="#receiptcollpase" aria-expanded="true" aria-controls="collapseFour">
							<div class="container">
								<div class="pull-left" style="font-size:16px">
									<b>Receipt Section</b>
								</div>
							</div>
							</a>
						</div>
						<div id="receiptcollpase" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
							<div class="panel-body">
								<br>
								<div class="row justify-content-md-center">
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_all_demo_receipt"  data-toggle="tooltip" data-placement="bottom" title="List All Demo Receipt">
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Demo Receipt</h7>
												<br>
												<br>
												<div class="row justify-content-md-center">
                          <div class="col-sm-8 col-md-8 center">
															<i class=" fa-sidebar fa-stack fa-2x">
															<i class=" fal fa-sticky-note fa-stack-2x"></i>
															<i class="fal fa-rupee-sign fa-stack-1x"></i>
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_all_reimbursement_receipt"  data-toggle="tooltip" data-placement="bottom" title="List All Reimbursement Receipt" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Reimbursement Receipt</h7>
												<br>
												<div class="row justify-content-md-center">
                          <div class="col-sm-8 col-md-8 center">
															<i class=" fa-sidebar fa-stack fa-2x">
															<i class=" fal fa-sticky-note fa-stack-2x"></i>
															<i class="fal fa-rupee-sign fa-stack-1x"></i>
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_all_cashless_receipt"  data-toggle="tooltip" data-placement="bottom" title="List All Cashless Receipt" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">Cashless Receipt</h7>
												<br>
												<div class="row justify-content-md-center">
                          <div class="col-sm-8 col-md-8 center">
															<i class=" fa-sidebar fa-stack fa-2x">
															<i class=" fal fa-sticky-note fa-stack-2x"></i>
															<i class="fal fa-rupee-sign fa-stack-1x"></i>
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
									<div class="col-sm-8 col-md-2 center">
										<div class="card mb-3 pale_red pointer" >
											<a class="reset-this" id="list_all_receipt"  data-toggle="tooltip" data-placement="bottom" title="List All Receipt" >
											  <div class="card-body" style="padding:1rem;">
												<h7 class="card-title">All Receipt </h7>
												<br>
												<br>
												<div class="row justify-content-md-center">
                          <div class="col-sm-8 col-md-8 center">
															<i class=" fa-sidebar fa-stack fa-2x">
															<i class=" fal fa-sticky-note fa-stack-2x"></i>
															<i class="fal fa-rupee-sign fa-stack-1x"></i>
														</i>
													</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
								</div>
							<!--<ul>
							<li><a href="./addpatientform.php">Add New Patient</a></li>-->
							<!--<li><a href="#">Deactivate Patient</a></li>-->
							<!-- <li><a href="#">update Patient</a></li> -->

							<!--<li><a href="./list_all_patients.php">List Patient all</a></li>
							<li><a href="./list_all_patients_ipd.php">List Patient IPD</a></li>
							<li><a href="./list_all_patients_opd.php">List Patient OPD</a></li>
							</ul>-->
						</div>
						</div>
					</div>
					</div>
					<!--  -->
				  </div>
				</div>
				<!-- <div class="row">
					<div class="col">
						<a href="#" class="btn btn-outline-info btn-lg">
							<i class="fa fa-user fa-3x pull-left"></i>Pathology <br> Details</a>
					</div>
					<div class="col">
						<a href="#" class="btn btn-lg btn-outline-info">
							<i class="fa fa-user fa-3x pull-left"></i>&nbsp&nbsp&nbspCreate&nbsp&nbsp&nbsp&nbsp&nbsp<br>Radiologist</a>
					</div>
					<div class="col">
						<a href="#" class="btn btn-lg btn-outline-success">
							<i class="fa fa-user fa-3x pull-left"></i>&nbsp&nbsp&nbspCreate&nbsp&nbsp&nbsp&nbsp&nbsp<br>Doctor</a>
					</div>
				</div> -->
			</div>
		</div>
	</div>


	<script>
	$(document).ready(function() {
  $(".toggle-accordion").on("click", function() {
    var accordionId = $(this).attr("accordion-id"),
      numPanelOpen = $(accordionId + ' .collapse.in').length;

    $(this).toggleClass("active");

    if (numPanelOpen == 0) {
      openAllPanels(accordionId);
    } else {
      closeAllPanels(accordionId);
    }
  })
  openAllPanels = function(aId) {
    console.log("setAllPanelOpen");
    $(aId + ' .panel-collapse:not(".in")').collapse('show');
  }
  closeAllPanels = function(aId) {
    console.log("setAllPanelclose");
    $(aId + ' .panel-collapse.in').collapse('hide');
  }
});
var add_new_patient = document.getElementById('add_new_patient');
var list_patient = document.getElementById('list_patient');
var list_patient_ipd = document.getElementById('list_patient_ipd');
var list_patient_opd = document.getElementById('list_patient_opd');
var list_patient_ot = document.getElementById('list_patient_ot');


var add_new_stock=document.getElementById('add_new_stock');
var list_all_pstocks=document.getElementById('list_all_stock');
var addnew_invoice=document.getElementById('add_new_invoicep');
var pinvoice=document.getElementById('show_invoice');


var add_new_doctor = document.getElementById('add_new_doctor');
var deactivate_doctor = document.getElementById('deactivate_doctor');
var list_doctor = document.getElementById('list_doctor');


var add_new_pathologist = document.getElementById('add_new_pathologist');
var change_rates = document.getElementById('change_rates');
var list_patho_invoice = document.getElementById('list_patho_invoice');
var list_patho_patients = document.getElementById('list_patho_patients');
var charges_doctor = document.getElementById('charges_doctor');
var update_doctor = document.getElementById('update_doctor');
var main_category = document.getElementById('main_category');



var add_new_staff = document.getElementById('add_new_staff');
var add_new_admin = document.getElementById('add_new_admin');
var deact_user = document.getElementById('deact_user');
var list_all_user = document.getElementById('list_all_user');
var list_all_demo_receipt = document.getElementById('list_all_demo_receipt');
var list_all_reimbursement_receipt = document.getElementById('list_all_reimbursement_receipt');
var list_all_cashless_receipt = document.getElementById('list_all_cashless_receipt');
var list_all_receipt = document.getElementById('list_all_receipt');

/*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*/
on_click_redirect("add_new_staff","/add_new_staff_form.php");
on_click_redirect("add_new_admin","/add_new_staff_admin_form.php");
on_click_redirect("deact_user","/list_all_employees_toggle.php");
on_click_redirect("list_all_user","/list_all_employees.php");
/*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*/





on_click_redirect("add_new_patient","/addpatientform.php");
on_click_redirect("list_patient","/list_all_patients.php");
on_click_redirect("list_patient_ipd","/list_all_patients_ipd.php");
on_click_redirect("list_patient_opd","/list_all_patients_opd.php");
on_click_redirect("list_all_records","/list_all_records.php");


on_click_redirect("add_new_stock","/stock/add_new_stock.php");
on_click_redirect("add_new_cat","/stock/stock_add_list_category.php");
on_click_redirect("add_new_type","/stock/stock_add_list_type.php");
on_click_redirect("list_all_stock","/list_all_stocks.php");
on_click_redirect("add_new_invoicep","/invoice/new_pharmacyp.php");
on_click_redirect("show_invoice","/pharmacy_receiptlist.php");

on_click_redirect("list_ot_patients","/list_all_ot_reg.php");
on_click_redirect("list_delivery_details","/list_all_delivery_details.php");
on_click_redirect("list_mpt_details","/list_all_mtp_details.php");
on_click_redirect("list_tl_details","/list_all_tl_details.php");
on_click_redirect("list_vt_details","/list_all_vt_details.php");
//on_click_redirect("list_vt_details","/invoice/new_pharmacyp.php");
on_click_redirect("mtp_summary","/summary_mtp.php");
on_click_redirect("new_suegery","/add_new_Surgery.php");

on_click_redirect("add_new_doctor","/add_new_staff_doctor_form.php");
on_click_redirect("deactivate_doctor","/list_all_employees_doctor_toggle.php");
on_click_redirect("list_doctor","/list_all_employees_doctor.php");


on_click_redirect("add_new_pathologist","/pathology_add_dr.php");
on_click_redirect("change_rates","/patho_add_test_sub.php");
on_click_redirect("list_patho_invoice","/patho_reciept_list.php");
on_click_redirect("list_patho_patients","/list_all_tests_registered_pathology.php");
on_click_redirect("charges_doctor","/list_all_employees_doctor_consult_charges.php");
on_click_redirect("update_doctor","/list_all_employees_doctor.php");

on_click_redirect("main_category","/pathology_add_test_main.php");

on_click_redirect("global_setting","/daily_admin_reports/admin_global_home.php");
on_click_redirect("global_setting","/daily_admin_reports/admin_global_home.php");

on_click_redirect("list_all_demo_receipt","/list_all_demo_receipt.php");
on_click_redirect("list_all_reimbursement_receipt","/list_all_reimbursement_receipt.php");
on_click_redirect("list_all_cashless_receipt","/list_all_cashless_receipt.php");
on_click_redirect("list_all_receipt","/list_all_receipt_details.php");

function on_click_redirect(element_id,url){
	var element = document.getElementById(element_id);
	element.addEventListener("click", function myFunction() {
	event.stopPropagation();
	location.href=url;
});
}
	</script>
<?php
$pageTitle = "Manage Account's HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
