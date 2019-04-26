<nav class="main-menu sidenav" id="mySidenav">
            <ul>
			<li id="avatar">
			<center><label for="fileToUpload1" title="click here to change logo" ><img src="<?php echo $logourl;?>" alt="Avatar" id="test" style="width:180px;cursor: pointer;/*border-radius: 50%;*/" ></label>
				<!--<input id="fileToUpload1" name="fileToUpload1" type="file"  onchange="document.getElementById('test').src = window.URL.createObjectURL(this.files[0])"/>-->
			<!--Shree Gajanan Hospital--></center>
			<!--<hr>-->
			<br>
			</li>
			<li id="space">
			<br>
			</li>
			<li id="top">
                    <a href="#">
						<label for="toggle" style="margin-bottom: 0px;">
							<i id="bars" class="fa_sidebar fas fa-bars fa-2x" title="Click to Toggle" onclick="openNav()"></i>
							<i id="cross" class="fa_sidebar fas fa-times fa-2" title="Click to Toggle"  onclick="closeNav()" ></i>
						</label>
                    </a>
                  
                </li>
				 <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if (isset($_SESSION['uid']) && $_SESSION['uid'] == "1"){
		/*		$url='/permission_denied.php';//give appropriate page
				header("Location: $url");		 */
		}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "3" || $_SESSION['uid'] == "0"){
		echo '<li id="Dashboard" name="dashboard" data-toggle="tooltip" title="dashboard">
                    <a href="/dr_panel/dr_home.php">
                        <!--<i class="fa_sidebar fa fa-home fa-2 fa-fw"></i>-->
						<i class="fa_sidebar fas fa-home fa-2"></i>

                        <span class="nav-text">
                            Home
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav" title="Inpatient Management" id="Inpatient_Management">
                   <!--<a href="/dr_panel/dr_ipd_pannel.php">-->
                    <a href="/list_all_patients_ipd.php">
                        <i class="fa_sidebar far fa-bed fa-2 "></i>
                        <span class="nav-text">
                            IPD Management
                        </span>
                    </a>
                    
                </li>
				 <li class="has-subnav" title="Outpatient Management" id="Outpatient_Management">
                    <a href="/dr_panel/dr_opd_pannel.php">
						<i class=" fa_sidebar far fa-stethoscope fa-2"></i>
                        <span class="nav-text">
                            OPD Management
                        </span>
                    </a>
                </li>
				<li class="has-subnav" title="Manage Database" id="database">
                    <a href="/list_all_patients.php">
                       <i class="fa_sidebar far fa-database fa-2 fa-fw"></i>
                        <span class="nav-text">
                            All patients
                        </span>
                    </a>
                   
                </li>';
		}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "1"){//A
echo '<li id="Dashboard" name="dashboard" data-toggle="tooltip" title="dashboard">
                    <a href="admin_dashboard.php">
                        <i class="fa_sidebar fas fa-home fa-2"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav" title="Manage accounts" id="manageaccounts">
                    <a href="manage_accounts.php">
                        <i class="fa_sidebar far fa-address-book fa-2"></i>
                        <!--<i class="fa_sidebar fa fa-laptop fa-2"></i>-->
                        <span class="nav-text">
                            Manage accounts
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav" title="Manage employees" id="manageemployees">
                    <a href="/list_all_employees.php">
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
                    <a href="#">
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
                            Manage Hospital&nbsp;&nbsp;
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
                   <a href="#">
                       <i class="fa_sidebar fas fa-chart-bar fa-2"></i>
                        <span class="nav-text">
                            Monthly Statements
                        </span>
                    </a>
                </li>
                <li id="stocks" title="Stocks Record\'s">
                   <a href="/stock/stock_list_all.php">
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
		}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "2"){
		echo '<li id="Dashboard" name="dashboard" data-toggle="tooltip" title="dashboard">
                    <a href="admin_dashboard.php">
                        <i class="fa_sidebar fas fa-home fa-2"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav" title="Manage accounts" id="manageaccounts">
                    <a href="manage_accounts.php">
                        <i class="fa_sidebar far fa-address-book fa-2"></i>
                        <!--<i class="fa_sidebar fa fa-laptop fa-2"></i>-->
                        <span class="nav-text">
                            Manage accounts
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav" title="Manage employees" id="manageemployees">
                    <a href="/list_all_employees.php">
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
                    <a href="#">
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
                            Manage Hospital&nbsp;&nbsp;
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
                   <a href="#">
                       <i class="fa_sidebar fas fa-chart-bar fa-2"></i>
                        <span class="nav-text">
                            Monthly Statements
                        </span>
                    </a>
                </li>
                <li id="stocks" title="Stocks Record\'s">
                   <a href="/stock/stock_list_all.php">
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
            <ul class="logout" id="logout" title="DARSTEK TRADING AND SOLUTION PVT LTD" style="position: sticky;bottom: 0;" disabled>
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
						<span class="nav-text" style="font-size:15px;" disabled>				   
                                       &nbsp;&nbsp;&nbsp;-Infinity by DARSTEK
						</span>
                    </div>
                </li> 
            </ul>
        </nav>