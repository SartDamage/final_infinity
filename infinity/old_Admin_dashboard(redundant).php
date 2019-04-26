<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
?>
<?php include './include/header.php';?>
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

</style>
<body>
	<div id="main">
		<?php include 'nav_bartop.php';?>
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
		<div class="container" style="margin-top:10px;">

					<div class="card"><!--daily patientcount chart line-->
						<div class="card-block">
							<h4 class="card-title">&nbsp;&nbsp;Visual representation for no. of patients entering hospital daily </h4>
						</div>
						<div class="chart-container" style="position: relative; width:85%;margin:auto;">
							<canvas id="myChart"></canvas>
						</div>
						<div class="card-block">
						<p class="card-text">Click on the following link to go to list of all registered patients.</p>
						<a href="./list_all_patients.php" class="btn btn-primary">Go To all patients</a>
						</div>
					</div>
		</div>
		<div class="container" style="margin-top:20px;margin-bottom:100px;">
			<div class="row">
				<div class="col-lg-6">
					<div class="card-columns">
						<!--<div>
							<div class="card p-2">--><!-- daily present absent count -->
								<!--<h4 class="card-title">Daily attendence</h4>
								<div class="chart-container" style="position: relative;margin:auto;">
								<canvas id="bar-chart-horizontal"></canvas>
								</div>
							</div>
						</div>-->
						<div>
							<div class="card p-2 "><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis </h4>
									<div class="chart-container" id="chart_container" style="position: relative; width:85%;margin:auto;">
										<canvas id="myChart_pie"  height="170px"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">revenue contribution on day to day basis by department monthly</small></p></center>
								</div>
							</div>
						</div>
						<div>
							<div class="card"><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis </h4>
									<div class="chart-container" style="position: relative;margin:auto;">
										<canvas id="chart_revenue_breakup" class="chartjs-render-monitor" style="display: block;"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">revenue contribution on day to day basis by department monthly</small></p></center>
								</div>
							</div>
						</div>
						<div>
							<div class="card"><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis OPD</h4>
									<div class="chart-container" style="position: relative;margin:auto;">
										<canvas id="chart_revenue_breakup_opd" class="chartjs-render-monitor" style="display: block;"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">revenue contribution on day to day basis by department monthly</small></p></center>
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
				<div class="col-lg-6">
					<div class="card-columns">
						<div>
							<div class="card p-2">
							<div class="card-block">
								<h4 class="card-title">Monthly expenses scale <a class="btn btn-outline-primary pull-right" href="/add_expense.php">Add expense</a></h4>
								<br>
								</div>
								<canvas id="chart1" class="chartjs-render-monitor" style="display: block;"></canvas>
							</div>
						</div>
						<div>
							<div class="card"><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis IPD</h4>
									<div class="chart-container" style="position: relative;margin:auto;">
										<canvas id="chart_revenue_breakup_ipd" class="chartjs-render-monitor" style="display: block;"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">revenue contribution on day to day basis by department monthly</small></p></center>
								</div>
							</div>
						</div>
						<div>
							<div class="card"><!-- revenue chart pie-->
								<div class="card-block">
									<h4 class="card-title">Monthly revenue contribution on day to day basis Pathology</h4>
									<div class="chart-container" style="position: relative;margin:auto;">
										<canvas id="chart_revenue_breakup_patho" class="chartjs-render-monitor" style="display: block;"></canvas>
									</div>
									<center><p class="card-text"><small class="text-muted">revenue contribution on day to day basis by department monthly</small></p></center>
								</div>
							</div>
						</div>
						<!--<div>
							<div class="card text-center p-2">
								<div class="card-block">
								<h4 class="card-title">Card title</h4>
								<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
								</div>
							</div>
						</div>-->
						<!--<div>
							<div class="card p-2 text-right">
								<blockquote class="card-blockquote">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
								<footer>
									<small class="text-muted">
									Someone famous in <cite title="Source Title">Source Title</cite>
									</small>
								</footer>
								</blockquote>
							</div>
						</div>-->
						<!--<div>
							<div class="card p-2">
								<div class="card-block">
									<h4 class="card-title">Card title</h4>
									<p class="card-text"></p>
									<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
								</div>
							</div>
						</div>-->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					
				</div>
			</div>
		</div>	
	</div>
<script>
				$.ajax({
		url: "./ipd_opd_count.php",
		success: function(resource) {
			///console.log(resource);
			var resource = JSON.parse(resource);
			var ipdnumber = [];
			var opdnumber = [];
			var pathonumber = [];
			var date_array = [];
			
		 for (var i = 0; i < resource.length; i++)  {
				/* date_array.push(resource[i].date); */
				ipdnumber.push(resource[i].ipd_count);
				opdnumber.push(resource[i].opd_count);
				/* var split = str.split('-');
					return {
						year: +split[0],
						month: +split[1],
						day: +split[2]
					}; */
				var date = resource[i].date;
				var time = date.substring(11,19);
				var date = date.substring(0,11);
				var date = date.split("-");/* .reverse().join("-"); */
				var mm ="";
						switch (date[1]) {
							case "01":
								mm = "Jan";
								break;
							case "02":
								mm = "Feb";
								break;
							case "03":
								mm = "Mar";
								break;
							case "04":
								mm = "Apr";
								break;
							case "05":
								mm = "May";
								break;
							case "06":
								mm = "Jun";
								break;
							case "07":
								mm = "Jul";
							case "08":
								mm = "Aug";
							case "09":
								mm = "Sep";
							case "10":
								mm = "Oct";
							case "11":
								mm = "Nov";
							case "12":
								mm = "Dec";
						}
				//console.log("date :: "+date+"   :::   mm is :"+mm);
				var dd_mmm = date[2]+"-"+mm;
				date_array.push(dd_mmm);
				pathonumber.push(resource[i].patho_count);
			}
			
			var chartdata = {
				labels: date_array,
				datasets : [
					{
						label: '# of IPD patients ',
						data: ipdnumber,
						backgroundColor: 'rgba(54, 162, 235, 0.09)',
						borderColor: 'rgba(153, 102, 155, 0.75)',
						hoverBackgroundColor: 'rgba(60, 170, 240, 1)',
						hoverBorderColor: 'rgba(160, 170, 240, 1)',
					},
					{
						label: '# of OPD patients visit',
						data: opdnumber,
						backgroundColor: 'rgba(250, 162, 235,0.09)',
						borderColor: 'rgba(250,102,155,.8)',
						hoverBorderColor: 'rgba(250,102,155,1)',
					},{
						label: '# of Pathology tests',
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
							labelString: 'No. of Patients',}
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

        

			var ctx = $("#myChart");

			var line_chart_pat_count = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				options:options_line_graph,
				
			});
		},
		error: function(resource) {
			//console.log(resource);
		}
});
/**********@@@@@@@@@@@@@@@@ Expenditure vs income graph @@@@@@ line graph @@@@@@@@@@@@@***********/
$.ajax({
		 url: "/daily_admin_reports/daily_revenue_list.php",
		success: function(resource) {
				if(resource!="" || resource !=null){
					console.log(`resource is this ${resource}`);
					var resource = JSON.parse(resource);
					console.log(`resource is ${resource}`);
					var revenue_array = [];
					var balance_array = [];
					var advance_array = [];
					var expense_array = [];
					var date_array = [];
					
					 for (var i = resource.length-1; i >= 0; i--)  {
						 //alert(i);
						 var date = resource[i].date_exp;
						 //console.log(`date ${resource[i].date_exp}`);
				//var time = date.substring(11,19);
				//var date = date.substring(0,11);
				var date = date.split("-");/* .reverse().join("-"); */
				var mm ="";
						switch (date[1]) {
							case "01":
								mm = "Jan";
								break;
							case "02":
								mm = "Feb";
								break;
							case "03":
								mm = "Mar";
								break;
							case "04":
								mm = "Apr";
								break;
							case "05":
								mm = "May";
								break;
							case "06":
								mm = "Jun";
								break;
							case "07":
								mm = "Jul";
							case "08":
								mm = "Aug";
							case "09":
								mm = "Sep";
							case "10":
								mm = "Oct";
							case "11":
								mm = "Nov";
							case "12":
								mm = "Dec";
						}
				//console.log("date :: "+date+"   :::   mm is :"+mm);
				var dd_mmm = date[2]+"-"+mm;
				revenue_array.push(resource[i].total_paid);
				balance_array.push(resource[i].Total_balance);
				advance_array.push(resource[i].discount);
				expense_array.push(resource[i].expense);
				date_array.push(dd_mmm);
				
		/* url: "/daily_admin_reports/daily_revenue_list_old_not_used.php",
		success: function(resource) {
			if(resource){
				
			console.log(`resource is ${resource}`);
			
			var resource = JSON.parse(resource);
			
			var revenue_array = [];
			var expenditure_array = [];
			//var pathonumber = [];
			var date_array = [];

				for(var j=0;j < 30;j++){
					console.log(`j value is ${j}`);
					
				if (resource.details_opd[j]){
					total_paid_opd=0;
					var total_paid_opd = resource.details_opd[j].total_paid_opd;
					var date_opd = resource.details_opd[j].date_opd;
					var month_opd = resource.details_opd[j].month_opd;
				}else total_paid_opd=0;
				
				if (resource.details_ipd[j]){
					total_paid_ipd=0;
					var total_paid_ipd = resource.details_ipd[j].total_paid_ipd;
					var date_ipd = resource.details_ipd[j].date_opd;
					var month_ipd = resource.details_ipd[j].month_opd;
				}else total_paid_ipd=0;
				
				if (resource.details_patho[j]){
					total_paid_pathology=0;
					var total_paid_pathology = resource.details_patho[j].total_paid_pathology;
					var date_patho = resource.details_patho[j].date_opd;
					var month_patho = resource.details_patho[j].month_opd;
				}else {total_paid_pathology=0;}
				
				
				if(resource.details_opd[j]){}else{date = Number(date)+1 ;if(date>27 && month=="February"){date=1;month="March";}else if(date>30 && month =="April"){date=1;month="May";}else if(date>30 && month =="June"){date=1;month="July";}else if(date>30 && month=="September"){date=1;month="October"}else if(date>30 && month=="November"){date=1;month="December"}else if(date>31 && month=="December"){date=1;month="January";}else if(date>31 && month=="March"){date=1;month="April"}else if(date>31 && month=="May"){date=1;month="June"}else if(date>31 && month=="July"){date=1;month="August"}else if(date>31 && month=="August"){date=1;month="September"}}
				
				revenue_array.push(`${total_paid_opd + total_paid_ipd + total_paid_pathology}`);
				console.log(` net revenue opd ${total_paid_opd} ::: ipd  ${total_paid_ipd} ::: patho ${total_paid_pathology}`);
				date_array.push(`${date}-${month}`);
				console.log(`${date}-${month}`);
				 */
				
				//console.log(`value is OPD :: ${total_paid_opd} \n value is IPD:: ${total_paid_ipd} \n value is patho:: ${total_paid_pathology}`)
				}
				//console.log(`array ${revenue_array}`)
				//console.log(`array ${date_array}`)
			

			/***@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@**/
			var ctx_line = document.getElementById("chart1").getContext("2d");
		var cfg = {
			type: 'line',
			data: {
				labels: date_array,
				datasets: [{
					label: "Expenses",
					data: expense_array,
					backgroundColor: ["rgba(205,149,62,0.5)"],
					},{
					label: "Revenue",
					data: revenue_array,
					backgroundColor: ["rgba(124,255,124,0.5)"],
					},{
					label: "Balance",
					data: balance_array,
					backgroundColor: ["rgba(54,55,24,0.5)"],
					},{
					label: "Discount",
					data: advance_array,
					backgroundColor: ["rgba(254,255,124,0.5)"],
					}]
				},
					
			options: {
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "date"}}]}
			}
		};
		var chart = new Chart(ctx_line, cfg);
			
		}
	}
});

/**********@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@***********/
/*-------------------Pie chart-------------------------*/
$.ajax({
		url: "/daily_admin_reports/total_revenue_collection.php",
		success: function(resource) {
			if(resource){
			var resource = JSON.parse(resource);
			var total_paid = 0;
			var Total_balance = 0;
			var discount = 0;				
				discount_pathology=resource[0].discount_pathology;
				Total_balance_pathology=resource[0].Total_balance_pathology;
				total_paid_pathology=resource[0].total_paid_pathology;
				
				discount_opd=resource[1].discount_opd;
				Total_balance_opd=resource[1].Total_balance_opd;
				total_paid_opd=resource[1].total_paid_opd;
				
				discount_ipd=resource[2].discount_ipd;
				Total_balance_ipd=resource[2].Total_balance_ipd;
				total_paid_ipd=resource[2].total_paid_ipd;
				
				total_collection_pharmacy="3600";
				
				
				var ctx_pie = document.getElementById("myChart_pie").getContext('2d');
				var myPieChart = new Chart(ctx_pie,{
					type: 'doughnut',
					data:{
						labels:["IPD collection in ₹","OPD collection in ₹","Pathology collection in ₹","Pharmacy collection in ₹"],
						datasets:[{
						label:"Total revenue contribution on day to day basis",
						data:[total_paid_ipd,total_paid_opd,total_paid_pathology,total_collection_pharmacy],
						backgroundColor:[
							"rgb(255, 99, 132)",
							"rgb(54, 162, 235)",
							"rgb(255, 125, 86)",
							"rgb(255, 205, 86)"
							]
						}]
					}
				});
			}else{
				document.getElementById("chart_container").innerHTML = "<br><center>No Entry for today !</center><br><br>";
				//document.getElementById("myChart_pie").style.display="none";
				
				discount_pathology="0";
				discount_opd="0";
				discount_ipd="0";
				total_paid_pathology="0";
				total_paid_opd="0";
				total_paid_ipd="0";
				total_collection_pharmacy="0";
			}



		},
		error: function(resource) {
			//console.log(resource);
		}
});

/*-------------------------------------------------chart--
															Monthly revenue contribution on day to day basis
															Monthly revenue contribution on day to day basis IPD
															Monthly revenue contribution on day to day basis OPD
															Monthly revenue contribution on day to day basis patho*/
$.ajax({
		 url: "/daily_admin_reports/daily_overall_revenue_list.php",
		success: function(resource) {
				if(resource!=""){
					console.log(`resource is this${resource}`);
					var resource = JSON.parse(resource);
					console.log(`resource is ${resource}`);
					var total_revenue_array = [];
					var total_balance_array = [];
					var total_advance_array = [];
					
					var total_ipd_revenue_array = [];
					var total_ipd_balance_array = [];
					var total_ipd_advance_array = [];
					
					var total_opd_revenue_array = [];
					var total_opd_balance_array = [];
					var total_opd_advance_array = [];
					
					var total_patho_revenue_array = [];
					var total_patho_balance_array = [];
					var total_patho_advance_array = [];
					var date_array = [];
					
					 for (var i = resource.length-1; i >= 0; i--)  {

						 var date = resource[i].date_exp;
						 console.log(`date ${resource[i].date_exp}`);

				var date = date.split("-");
				var mm ="";
						switch (date[1]) {
							case "01":
								mm = "Jan";
								break;
							case "02":
								mm = "Feb";
								break;
							case "03":
								mm = "Mar";
								break;
							case "04":
								mm = "Apr";
								break;
							case "05":
								mm = "May";
								break;
							case "06":
								mm = "Jun";
								break;
							case "07":
								mm = "Jul";
							case "08":
								mm = "Aug";
							case "09":
								mm = "Sep";
							case "10":
								mm = "Oct";
							case "11":
								mm = "Nov";
							case "12":
								mm = "Dec";
						}

				var dd_mmm = date[2]+"-"+mm;
				/*revenue_array.push(resource[i].total_paid);
				balance_array.push(resource[i].Total_balance);
				advance_array.push(resource[i].discount);*/
				
				total_revenue_array.push(resource[i].total_paid);
				total_balance_array.push(resource[i].Total_balance);
				total_advance_array.push(resource[i].discount);
				
				total_ipd_revenue_array.push(resource[i].paid_ipd);
				total_ipd_balance_array.push(resource[i].balance_ipd);
				total_ipd_advance_array.push(resource[i].amount_ipd);
				
				total_opd_revenue_array.push(resource[i].paid_opd);
				total_opd_balance_array.push(resource[i].balance_opd);
				total_opd_advance_array.push(resource[i].amount_opd);
				
				total_patho_revenue_array.push(resource[i].paid_patho);
				total_patho_balance_array.push(resource[i].balance_patho);
				total_patho_advance_array.push(resource[i].amount_patho);
				
				date_array.push(dd_mmm);
									 }
			/***@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@**/

			var ctx_line_patho = document.getElementById("chart_revenue_breakup_patho").getContext("2d");
			var ctx_line_patho_cfg = {
			type: 'line',
			data: {
				labels: date_array,
				datasets: [{
					label: "patho collection",
					data: total_patho_revenue_array,
					backgroundColor: ["rgba(139,16,0,0.5)"],
					},{
					label: "patho balance",
					data: total_patho_balance_array,
					backgroundColor: ["rgba(39,127,150,0.5)"],
					},{
					label: "patho bill amount",
					data: total_patho_advance_array,
					backgroundColor: ["rgba(32,181,171,0.5)"],
					}]
				},
					
			options: {
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "date"}}]}
			}
		};
		
			var ctx_line_ipd = document.getElementById("chart_revenue_breakup_ipd").getContext("2d");
			var ctx_line_ipd_cfg = {
			type: 'line',
			data: {
				labels: date_array,
				datasets: [{
					label: "IPD collection",
					data: total_ipd_revenue_array,
					backgroundColor: ["rgba(139,16,0,0.5)"],
					},{
					label: "IPD balance",
					data: total_ipd_balance_array,
					backgroundColor: ["rgba(39,127,150,0.5)"],
					},{
					label: "IPD bill amount",
					data: total_ipd_advance_array,
					backgroundColor: ["rgba(32,181,171,0.5)"],
					}]
				},
					
			options: {
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "date"}}]}
			}
		};
		
			var ctx_line_opd = document.getElementById("chart_revenue_breakup_opd").getContext("2d");
			var ctx_line_opd_cfg = {
			type: 'line',
			data: {
				labels: date_array,
				datasets: [{
					label: "OPD collection",
					data: total_opd_revenue_array,
					backgroundColor: ["rgba(243,142,43,0.5)"],
					},{
					label: "OPD balance",
					data: total_opd_balance_array,
					backgroundColor: ["rgba(39,127,150,0.5)"],
					},{
					label: "OPD bill amount",
					data: total_opd_advance_array,
					backgroundColor: ["rgba(32,181,171,0.5)"],
					}]
				},
					
			options: {
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "date"}}]}
			}
		};
			
			var ctx_line = document.getElementById("chart_revenue_breakup").getContext("2d");
		var cfg = {
			type: 'line',
			data: {
				labels: date_array,
				datasets: [{
					label: "Total paid",
					data: total_revenue_array,
					backgroundColor: ["rgba(205,149,62,0.5)"],
					},{
					label: "Total Balance",
					data: total_balance_array,
					backgroundColor: ["rgba(124,255,124,0.5)"],
					},{
					label: "Total Discount",
					data: total_advance_array,
					backgroundColor: ["rgba(54,55,24,0.5)"],
					}]
				},
					
			options: {
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "date"}}]}
			}
		};
		var chart = new Chart(ctx_line, cfg);
		var charts = new Chart(ctx_line_ipd,ctx_line_ipd_cfg);
		var chartopd = new Chart(ctx_line_opd,ctx_line_opd_cfg);
		var chartpatho = new Chart(ctx_line_patho,ctx_line_patho_cfg);
			/***@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@**/
			
		}
	}
});





/**********@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@***********/
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

<?php include './include/footer.php';?>
