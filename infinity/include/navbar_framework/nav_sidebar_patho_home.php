<nav class="main-menu sidenav print-section non-printable" id="mySidenav">
            <ul>
			<li>
				  <div class="row">
					<div class="col align-self-start">
					</div>
					<div class="col align-self-center">
					</div>
					<div class="col align-self-end">
					 <i id="cross" class="fa_sidebar fas fa-times fa-2" data-toggle="tooltip" title="Click to toggle menu" onclick="closeNav()" ></i>
					</div>
				  </div>
			</li>
			<li></li>
			<li id="avatar">
			<?php if(isset($_SESSION['uid']) && $_SESSION['uid'] == "1"){
			 echo'<center><label for="fileToUpload1" title="click here to change logo" ><img src="'.$logourl.'" alt="Avatar" id="test" style="width:180px;cursor: pointer;/*border-radius: 50%;*/" ></label></center>
				';
				/*<input id="fileToUpload1" name="fileToUpload1" type="file"  onchange="document.getElementById("test").src = window.URL.createObjectURL(this.files[0])"/>*/
			}else{
				echo '<center><label for="fileToUpload1" title="click here to change logo" ><img src="'.$logourl.'" alt="Avatar" id="test" style="width:180px;cursor: pointer;/*border-radius: 50%;*/" ></label></center>';
			}
				?>
			<!--Shree Gajanan Hospital-->
			<!--<hr>-->
			<br>
			</li>
				<li id="top" >
							<i id="bars" class="fa_sidebar fas fa-bars fa-2x" data-toggle="tooltip" title="Click to toggle menu" onclick="openNav()" disabled></i>

                </li>
				<li id="space" style="height: 2.15%;">
				</li>
				 <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	/*if (isset($_SESSION['uid']) && $_SESSION['uid'] == "1"){/****************MOSTLY USED*************/
		/*		$url='/permission_denied.php';//give appropriate page
				header("Location: $url");		 */
				///nothinh in $_SESSION['uid'] == "4"
				///nothinh in $_SESSION['uid'] == "5"
				///nothinh in $_SESSION['uid'] == "6"
				///nothinh in $_SESSION['uid'] == "7"
				///nothinh in $_SESSION['uid'] == "8"
	/*	}else*/ if(isset($_SESSION['uid']) && ($_SESSION['uid'] == "2" || $_SESSION['uid'] ==  "0")){//doctor
		echo '<li id="Dashboard" name="dashboard" >
                    <a href="/dr_panel/dr_home.php" >
                        <!--<i class="fa_sidebar fa fa-home fa-2 fa-fw"></i>-->
						<label for="dashboard" style="margin-bottom: 0px;" data-toggle="tooltip" data-placement="right" title="Go to Home">
						<i class="fa_sidebar fas fa-home fa-2"></i>
						</label>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>
                </li>
                <li class="has-subnav" title="Inpatient Management" id="Inpatient_Management">
					<!--<a href="/dr_panel/dr_ipd_pannel.php">-->
                    <a href="/list_all_patients_ipd.php">
						<label for="Inpatient_Management" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to In Patient list">
                        <i class="fa_sidebar far fa-bed fa-2 "></i>
						</label>
                        <span class="nav-text">
                            IPD Management
                        </span>
                    </a>
                </li>
				 <li class="has-subnav" title="Outpatient Management" id="Outpatient_Management">
                    <a href="/dr_panel/dr_opd_pannel.php">
						<label for="Outpatient_Management" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Out Patient list">
						<i class=" fa_sidebar far fa-stethoscope fa-2"></i>
						</label>
                        <span class="nav-text">
                            OPD Management
                        </span>
                    </a>
                </li>
				<li class="has-subnav" title="Transaction" id="transaction_list">
					<!--<a href="/list_all_user.php">-->
                    <!--<a href="/list_all_patients_ipd.php">-->
                    <a href="/list_all_expense_individual.php">
						 <label for="Expense_list" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Transaction list">
                        <i class="fa_sidebar far fa-rupee-sign fa-2 "></i>
						</label>
                        <span class="nav-text">
                            List / Add Transaction
                        </span>
                    </a>
                </li>
				<li class="has-subnav" title="Manage Database" id="database">
                    <a href="/list_all_patients.php">
						<label for="database" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Patient database">
                       <i class="fa_sidebar far fa-database fa-2 fa-fw"></i>
					   </label>
                        <span class="nav-text">
                            All Patients
                        </span>
                    </a>

                </li>';
		}else if(isset($_SESSION['uid']) && ($_SESSION['uid'] == "8" )){//recptionalist
		echo '<li id="Dashboard" name="dashboard" >
                    <a href="/dr_panel/dr_home.php" >
                        <!--<i class="fa_sidebar fa fa-home fa-2 fa-fw"></i>-->
						<label for="dashboard" style="margin-bottom: 0px;" data-toggle="tooltip" data-placement="right" title="Go to Home">
						<i class="fa_sidebar fas fa-home fa-2"></i>
						</label>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>
                </li>
                <li class="has-subnav" title="Inpatient Management" id="Inpatient_Management">
					<!--<a href="/dr_panel/dr_ipd_pannel.php">-->
                    <a href="/list_all_patients_ipd.php">
                        <label for="Inpatient_Management" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to In Patient list">
                        <i class="fa_sidebar far fa-bed fa-2 "></i>
						</label>
                        <span class="nav-text">
                            IPD Management
                        </span>
                    </a>
                </li>
				 <li class="has-subnav" title="Outpatient Management" id="Outpatient_Management">
                    <a href="/dr_panel/dr_opd_pannel.php">
						<label for="Outpatient_Management" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Out Patient list">
						<i class=" fa_sidebar far fa-stethoscope fa-2"></i>
						</label>
                        <span class="nav-text">
                            OPD Management
                        </span>
                    </a>
                </li>
				<li class="has-subnav" title="Staff list" id="Staff_list">
					<!--<a href="/list_all_user.php">-->
                    <!--<a href="/list_all_patients_ipd.php">-->
                    <a href="/list_all_employees.php"><!--?staff_role=2-->
						 <label for="Staff_list" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Staff list">
                        <i class="fa_sidebar far fa-user-md fa-2 "></i>
						</label>
                        <span class="nav-text">
                            List Staff
                        </span>
                    </a>
                </li>
				<li class="has-subnav" title="Staff list" id="Expense_list">
					<!--<a href="/list_all_user.php">-->
                    <!--<a href="/list_all_patients_ipd.php">-->
                    <a href="/list_all_expense.php">
						 <label for="Expense_list" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Expense list">
                        <i class="fa_sidebar far fa-rupee-sign fa-2 "></i>
						</label>
                        <span class="nav-text">
                            List / Add Expense
                        </span>
                    </a>
                </li>
				<li class="has-subnav" title="Staff list" id="patho_list">
					<!--<a href="/list_all_user.php">-->
                    <!--<a href="/list_all_patients_ipd.php">-->
                    <a href="/patho_reciept_list.php">
						 <label for="patho_list" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to pathology section">
                        <i class="fa_sidebar far fa-vials fa-2 "></i>
						</label>
                        <span class="nav-text">
                            Pathology section
                        </span>
                    </a>
                </li>
				<li class="has-subnav" title="Manage Database" id="database">
                    <a href="/list_all_patients.php">
                       <label for="database" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Patient database">
                       <i class="fa_sidebar far fa-database fa-2 fa-fw"></i>
					   </label>
                        <span class="nav-text">
                            All Patients
                        </span>
                    </a>

                </li>';
		}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "1"){//admin
echo '<li id="Dashboard" name="dashboard" >
                    <a href="/admin_dashboard.php">
						<label for="dashboard" style="margin-bottom: 0px;" data-toggle="tooltip" data-placement="right" title="Go to dashboard">
                        <i class="fa_sidebar fas fa-home fa-2"></i>
						</label>
                        <span class="nav-text">
                            Dashboard
                        </span>

                    </a>

                </li>
                <li class="has-subnav" title="General Management" id="manageaccounts">
                    <a href="/manage_accounts.php">
						<label for="manageaccounts" style="margin-bottom: 0px;" data-toggle="tooltip" data-placement="right" title="Go to General Management">
                        <i class="fa_sidebar far fa-address-book fa-2"></i>
						</label>
                        <!--<i class="fa_sidebar fa fa-laptop fa-2"></i>-->
                        <span class="nav-text">
                            General Management
                        </span>
                    </a>

                </li>
				<li id="hospital_setting" title="Manage Hospital" data-toggle="collapse" data-target="#sub_menu_Edit">
                    <a href="javascript:void(0)">
						<label for="manageaccounts" style="margin-bottom: 0px;" data-toggle="tooltip" data-placement="right" title="click to toggle sub-menu">
						<i class="fa_sidebar fas fa-cogs fa-2"></i>
						</label>
                        <span class="nav-text">
                            Manage Hospital &nbsp;&nbsp;&nbsp;&nbsp;
						<i class="fa fa-caret-down"></i>
                        </span>
                    </a>
                </li>
				<div id="sub_menu_Edit" class="collapse is-subnav">
					<ul>
							<!--<li class="has-subnav" title="Add Dr. Signing authority">
								<a href="/pathology_add_dr.php">
									<label for="manageaccounts" style="margin-bottom: 0px;" data-toggle="tooltip" data-placement="right" title="Go to Signatory management">
									<i class="fa_sidebar fas fa-stethoscope"></i>
									</label>
									<!--<i class="fa_sidebar fas fa-user-md"></i>-->
									<!--<span class="nav-text">Add Signatory</span>
								</a>
							</li>
							<li class="has-subnav" title="Change test Rates">
								<a href="/patho_add_test_sub.php">
								<label style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Out Sub test list">
								<i class=" fa-sidebar fa-stack fa-fw ">
									<i class=" far fa-square fa-stack-2x"></i>
									<i class="fas fa-wrench fa-stack-1x"></i>
								</label>-->
									<!--<i class=" fa fa-wrench fa-stack-1x"></i>-->
							<!--	</i>
								<span class="nav-text">Test Rates</span>
								</a>
							</li>-->
							<li class="has-subnav" title="Manage employees" id="manageemployees">
								<a href="/list_all_employees.php">
									<label for="manageaccounts" style="margin-bottom: 0px;" data-toggle="tooltip" data-placement="right" title="Go to Manage Employee">
								   <i class="fa_sidebar fas fa-user-md fa-2"></i>
								   </label>
									<span class="nav-text">
									    Employees
									</span>
								</a>

							</li>
								<li id="hrmanagement" title="HR Management">
								<a href="/admin_dashatt.php">
									<label for="managepharmacy" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to pharmacy dashboard">
									<i class="fa_sidebar fas fa-user  fa-2"></i>
									</label>
									<span class="nav-text">
										 HR Management
									</span>
								</a>
							</li>
							<li class="has-subnav" title="Manage Pathology" id="managepathology">
								<a href="/dashboard_pathology.php">
								<label for="managepathology" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Pathology Dashboard">
								   <i class="fa_sidebar fas fa-heartbeat fa-2"></i>
								</label>
									<span class="nav-text">
										 Pathology
									</span>
								</a>

							</li>
							<!--<li id="manageradiology" title="Manage Radiology">
								<a href="#">
								<label for="manageradiology" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to radiology dashboard">
									<i class="fa_sidebar fa fa-table fa-2"></i>
								</label>
									<span class="nav-text">
										 Radiology
									</span>
								</a>
							</li>-->
							<li id="managepharmacy" title="Manage Pharmacy">
								<a href="/stock/dashboard_stock.php">
									<label for="managepharmacy" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to pharmacy dashboard">
									<i class="fa_sidebar fas fa-medkit  fa-2"></i>
									</label>
									<span class="nav-text">
										 Pharmacy
									</span>
								</a>
							</li>

							<li id="manageipd" title="Manage Bed,ward etc..">
								<a href="/manage_bed_ward_type.php">
									<label for="manageipd" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to bed management">
									<i class="fa_sidebar far fa-bed  fa-2"></i>
									</label>
									<span class="nav-text">
										 Ward/Bed/Bed-type
									</span>
								</a>
							</li>

					</ul>
				</div>
                <li id="monthlystatement" title="Monthly Statements">
                   <a href="/list_all_expense.php">
						<label for="monthlystatement" style="margin-bottom:0px;" data-toggle="tooltip" data-placement="right" title="Go to Expense List">
                       <i class="fa_sidebar fas fa-chart-bar fa-2"></i>
					    </label>
                        <span class="nav-text">
                            Monthly Statements
                        </span>
                    </a>
                </li>
                <li id="stocks" title="Stocks Record\'s">
                   <a href="/stock/stock_list_all.php">
                   <!--<a href="/stock/stock_add_list_category.php">-->
                        <i class="fa_sidebar fas fa-cubes fa-2x"></i>
                        <span class="nav-text">
                            Stocks
                        </span>
                    </a>
                </li>
                <li id="documentation" title="Hospital Documentation">
                    <a href="#">
                       <i class="fa_sidebar fas fa-info fa-2"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>';
		}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "10"){//pathology
				echo '<!--<li id="top">
                    <a href="#">
						<label for="toggle" style="margin-bottom: 0px;" data-toggle="tooltip" title="click to Toggle menu">
							<i id="bars" class="fa_sidebar fas fa-bars fa-2x" onclick="openNav()"></i>
							<i id="cross" class="fa_sidebar fas fa-times fa-2" onclick="closeNav()" ></i>
						</label>
                    </a>

                </li>-->

                <li id="Home" name="home" >
                    <a href="/universal_home.php">
                        <!--<i class="fa_sidebar fa fa-home fa-2 fa-fw"></i>-->
						<label for="dashboard" style="margin-bottom: 0px;" data-toggle="tooltip" data-placement="right" title="Go to home">
						<i class="fa_sidebar far fa-home fa-2"></i>
						</label>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>

                </li>
                <li id="Dashboard" name="dashboard" >
                    <a href="/dashboard_pathology.php">
                        <!--<i class="fa_sidebar fa fa-home fa-2 fa-fw"></i>-->

						<i class="fa_sidebar far fa-chart-line fa-2" data-toggle="tooltip" data-placement="right" title="Go to dashboard"></i>

                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
                <li class="has-subnav" title="Report\'s" id="Reports">
                    <a href="/list_all_tests_registered_pathology.php">
                        <i class="fa_sidebar far fa-list-alt fa-2 " data-toggle="tooltip" data-placement="right" title="Go to Reports"></i>
                        <span class="nav-text">
                            Reports
                        </span>
                    </a>
                </li>
				 <li class="has-subnav" title="Invoice" id="invoice">
                    <a href="/patho_reciept_list.php">
						<i class=" fa-sidebar fa-stack fa-fw " data-toggle="tooltip" data-placement="right" title="Go to Invoicing">
							<i class=" fal fa-sticky-note fa-stack-2x"></i>
							<i class="fas fa-rupee-sign fa-stack-1x"></i>
						</i><!--fa-server-->
                        <span class="nav-text">
                            Invoice
                        </span>
                    </a>

                </li>
                <li class="has-subnav" title="Edit Pathology details" id="Edit" data-toggle="collapse" data-target="#sub_menu_Edit">
                    <a href="javascript:void(0)">
                       <i class="fa_sidebar far fa-edit fa-2 fa-fw" data-toggle="tooltip" data-placement="right" title="toggle sub menu"></i>
					   <!--fas fa-database-->
                        <span class="nav-text">   Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<i class="fa fa-caret-down"></i>
                        </span>
                    </a>
                </li>
				<div id="sub_menu_Edit" class="collapse is-subnav">
					<ul>
							<li class="has-subnav" title="Add Dr. Signing authority">
								<a href="/pathology_add_dr.php">
									<i class="fa_sidebar fas fa-stethoscope" data-toggle="tooltip" data-placement="right" title="Add/update Signing authority"></i>
									<!--<i class="fa_sidebar fas fa-user-md"></i>-->
									<span class="nav-text">Add Signatory</span>
								</a>
							</li>
							<li class="has-subnav" title="Change test Rates">
								<a href="/patho_add_test_sub.php">
								<i class=" fa-sidebar fa-stack fa-fw " data-toggle="tooltip" data-placement="right" title="change rates for tests">
									<i class=" far fa-square fa-stack-2x"></i>
									<i class="fas fa-wrench fa-stack-1x"></i>
									<!--<i class=" fa fa-wrench fa-stack-1x"></i>-->
								</i>
								<span class="nav-text">Test Rates</span>
								</a>
							</li>

					</ul>
				</div>
                <li class="has-subnav" title="Manage Database" id="database">
                    <a href="/Database_pathology.php">
                       <i class="fa_sidebar far fa-database fa-2 fa-fw" data-toggle="tooltip" data-placement="right" title="all test history "></i>
                        <span class="nav-text">
                            All Reports
                        </span>
                    </a>

                </li>';

		}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "4"){//undefined
		echo '<li id="Dashboard" name="dashboard">
                    <a href="admin_dashboard.php">
						<label for="dashboard" style="margin-bottom: 0px;" data-toggle="tooltip" data-placement="right" title="Go to dashboard">
                        <i class="fa_sidebar fas fa-home fa-2"></i>
						</label>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>

                <li class="has-subnav" title="General Management" id="manageaccounts">
                    <a href="manage_accounts.php">
                        <i class="fa_sidebar far fa-address-book fa-2"></i>
                        <!--<i class="fa_sidebar fa fa-laptop fa-2"></i>-->
                        <span class="nav-text">
                            General Management
                        </span>
                    </a>
                </li>
                <li class="has-subnav" title="Manage employees" id="manageemployees">
                    <a href="#">
                       <i class="fa_sidebar fas fa-user-md fa-2"></i>
                        <span class="nav-text">
                           Manage employees
                        </span>
                    </a>

                </li>
                <li class="has-subnav" title="Manage Pathology" id="managepathology">
                    <a href="/dashboard_pathology.php">
                       <i class="fa_sidebar fas fa-heartbeat fa-2"></i>
                        <span class="nav-text">
                            Manage Pathology
                        </span>
                    </a>

                </li>
                <!--<li id="manageradiology" title="Manage Radiology">
                    <a href="#">
                        <i class="fa_sidebar fa fa-table fa-2"></i>
                        <span class="nav-text">
                            Manage Radiology
                        </span>
                    </a>
                </li>-->
                <li id="managepharmacy" title="Manage Pharmacy">
                    <a href="/stock/dashboard_stock.php">
                        <i class="fa_sidebar fas fa-medkit  fa-2"></i>
                        <span class="nav-text">
                            Manage Pharmacy
                        </span>
                    </a>
                </li>
				<li id="hospital_setting" title="Manage Hospital" data-toggle="collapse" data-target="#sub_menu_Edit">
                    <a href="javascript:void(0)">
						<i class="fa_sidebar fas fa-cogs fa-2"></i>
                        <span class="nav-text">
                            Manage Hospital &nbsp;&nbsp;&nbsp;
						<i class="fa fa-caret-down"></i>
                        </span>
                    </a>
                </li>
				<div id="sub_menu_Edit" class="collapse is-subnav">
					<ul>
							<li class="has-subnav" title="Add Dr. Signing authority">
								<a href="/pathology_add_dr.php">
									<i class="fa_sidebar fas fa-stethoscope"></i>
									<!--<i class="fa_sidebar fas fa-user-md"></i>-->
									<span class="nav-text">Add Signatory</span>
								</a>
							</li>
							<li class="has-subnav" title="Change test Rates">
								<a href="/patho_add_test_sub.php">
								<i class=" fa-sidebar fa-stack fa-fw ">
									<i class=" far fa-square fa-stack-2x"></i>
									<i class="fas fa-wrench fa-stack-1x"></i>
									<!--<i class=" fa fa-wrench fa-stack-1x"></i>-->
								</i>
								<span class="nav-text">Test Rates</span>
								</a>
							</li>

					</ul>
				</div>
                <li id="monthlystatement" title="Monthly Statements">
                   <a href="/list_all_expense.php">
                       <i class="fa_sidebar fas fa-chart-bar fa-2"></i>
                        <span class="nav-text">
                            Monthly Statements
                        </span>
                    </a>
                </li>
                <li id="stocks" title="Stocks Record\'s">
                   <a href="/stock/stock_list_all.php">
                   <!--<a href="/stock/stock_add_list_category.php">-->
                        <i class="fa_sidebar fas fa-cubes fa-2x"></i>
                        <span class="nav-text">
                            Stocks
                        </span>
                    </a>
                </li>
                <li id="documentation" title="Hospital Documentation">
                    <a href="#">
                       <i class="fa_sidebar fas fa-info fa-2"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>';
				 }}
	?>
            <ul class="logout" id="logout" title="go to DARSTEK TRADING AND SOLUTION PVT LTD" style="position: sticky;bottom: 0;" disabled>
				<li>
					<br>
				</li>
				<li>
					<br>
				</li>
				<li>
					<br>
				</li>
				<li>
                   <div  class="pull-right padding" disabled>
						<span class="nav-text" style="font-size:15px;" onclick="openInNewTab('https://www.darstek.com')" disabled>
                            -Infinity by DARSTEK
						</span>
                    </div>
                </li>
            </ul>
        </nav>
