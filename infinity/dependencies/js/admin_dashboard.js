

	document.addEventListener("DOMContentLoaded", function(event) {
    if(detectmob()){
		//$(".show_in_desk").display.style="none";
		$(".show_in_desk").css("display", "none");
		$(".show_in_mob").css("display", "block");


	}else{
		$(".show_in_desk").css("display", "block");
		$(".show_in_mob").css("display", "none");
			$.ajax({
		url: "/daily_admin_reports/patient_count_past.php",
		success: function(resource) {

			var resource = JSON.parse(resource);
			var net_ipdadmit = [];
			var ipdnumber = [];
			var opdnumber = [];
			var pathonumber = [];
			var date_array = [];

		 for (var i = 0; i < resource.length; i++)  {
				/* date_array.push(resource[i].date); */
				net_ipdadmit.push(resource[i].ipd_active_count);
				ipdnumber.push(resource[i].ipd_discharged);/*discharged on said date*/
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
								break;
							case "08":
								mm = "Aug";
								break;
							case "09":
								mm = "Sep";
								break;
							case "10":
								mm = "Oct";
								break;
							case "11":
								mm = "Nov";
								break;
							case "12":
								mm = "Dec";
								break;
							default:
							    mm=date[1];
						}
				var dd_mmm = date[2]+"-"+mm;
				date_array.push(dd_mmm);
				pathonumber.push(resource[i].patho_count);
			}

			var chartdata = {
				labels: date_array,
				datasets : [
					{
						label: '# IPD patients admitted',
						data: net_ipdadmit,
						backgroundColor: 'rgba(54, 162, 235, 0.09)',
						borderColor: 'rgba(255, 0, 0, 0.75)',
						hoverBackgroundColor: 'rgba(60, 170, 240, 1)',
						hoverBorderColor: 'rgba(160, 170, 240, 1)',
					},
					{
						label: '# IPD discharged',
						data: ipdnumber,
						backgroundColor: 'rgba(54, 162, 235, 0.09)',
						borderColor: 'rgba(153, 102, 155, 0.75)',
						hoverBackgroundColor: 'rgba(60, 170, 240, 1)',
						hoverBorderColor: 'rgba(160, 170, 240, 1)',
					},
					{
						label: '# OPD patients',
						data: opdnumber,
						backgroundColor: 'rgba(250, 162, 235,0.09)',
						borderColor: 'rgba(250,102,155,.8)',
						hoverBorderColor: 'rgba(250,102,155,1)',
					},{
						label: '# Pathology tests',
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
						ticks: {beginAtZero:true,stepSize: 1},
						scaleLabel: {display: true,
									labelString: 'No. of Patients',}
					}],
					xAxes: [{
						scaleLabel: {display: true,
									labelString: 'Date',}
					}]
				},
				legend: {position:"bottom"},
				elements: {
					line: {
						tension: 0.25, /*/ disables bezier curves*/
					}
				},
				maintainAspectRatio:true,
				responsive:true


			}



			var ctx = $("#myChart");

			var line_chart_pat_count = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				options:options_line_graph,
				responsive:true,

			});
		},
		error: function(resource) {
			/*/console.log(resource);*/
		}
});
/**********@@@@@@@@@@@@@@@@ Expenditure vs income graph @@@@@@ line graph @@@@@@@@@@@@@***********/
//$.ajax({
//		 url: "/daily_admin_reports/daily_revenue_list.php",
//		success: function(resource) {
//				if(resource!="" || resource !=null){
//					//console.log(`resource is this ${resource}`);
//					var resource = JSON.parse(resource);
//					//console.log(`resource is ${resource}`);
//					var revenue_array = [];
//					var balance_array = [];
//					var advance_array = [];
//					var expense_array = [];
//					var date_array = [];
//
//					 for (var i = resource.length-1; i >= 0; i--)  {
//						 /*/alert(i);*/
//						 var date = resource[i].date_exp;
//						 var date = date.split("-");
//						 /*/console.log(`date ${resource[i].date_exp}`);
//				//var time = date.substring(11,19);
//				//var date = date.substring(0,11);
//				var date = date.split("-");*//* .reverse().join("-"); */
//				var mm ="";
//						switch (date[1]) {
//							case "01":
//								mm = "Jan";
//								break;
//							case "02":
//								mm = "Feb";
//								break;
//							case "03":
//								mm = "Mar";
//								break;
//							case "04":
//								mm = "Apr";
//								break;
//							case "05":
//								mm = "May";
//								break;
//							case "06":
//								mm = "Jun";
//								break;
//							case "07":
//								mm = "Jul";
//								break;
//							case "08":
//								mm = "Aug";
//								break;
//							case "09":
//								mm = "Sep";
//								break;
//							case "10":
//								mm = "Oct";
//								break;
//							case "11":
//								mm = "Nov";
//								break;
//							case "12":
//								mm = "Dec";
//								break;
//							default:
//							    mm=date[1];
//						}
//				/*/console.log("date :: "+date+"   :::   mm is :"+mm);*/
//				var dd_mmm = date[2]+"-"+mm;
//				revenue_array.push(resource[i].total_paid);
//				balance_array.push(resource[i].Total_balance);
//				advance_array.push(resource[i].discount);
//				expense_array.push(resource[i].expense);
//				date_array.push(dd_mmm);
//				}
//
//			/***@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@**/
//			var ctx_line = document.getElementById("chart1").getContext("2d");
//		var cfg = {
//			type: 'line',
//			data: {
//				labels: date_array,
//				datasets: [{
//					label: "Expenses",
//					data: expense_array,
//					backgroundColor: ["rgba(205,149,62,0.5)"],
//					},{
//					label: "Revenue",
//					data: revenue_array,
//					backgroundColor: ["rgba(124,255,124,0.5)"],
//					},{
//					label: "Balance",
//					data: balance_array,
//					backgroundColor: ["rgba(54,55,24,0.5)"],
//					},{
//					label: "Discount",
//					data: advance_array,
//					backgroundColor: ["rgba(254,255,124,0.5)"],
//					}]
//				},
//
//			options: {
//				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in thousand's"}}],
//					xAxes: [{scaleLabel: {display: true,labelString:  "date"}}]},
//				legend: {position:"bottom"}
//			},
//			responsive:true,
//		};
//		var chart = new Chart(ctx_line, cfg);
//
//		}else{
//			document.getElementById('chart1').style.display = 'none';
//			document.getElementById("exp_chart").innerHTML = "<br><center>No Entry for today !</center><br><br>";
//			/*/document.getElementById('exp_chart').style.display = 'none';*/
//		}
//	}
//});
$.ajax({
		 url: "/daily_admin_reports/No_of_patients_entering_in_OT.php",
		success: function(resource) {
				if(resource!=""){
					//console.log(`resource is this${resource}`);
					var resource = JSON.parse(resource);
					debugger;
					//console.log(`resource is ${resource}`);
					var total_ot_array = [];
					var total_mtp_array = [];
					var total_vt_array = [];

					var total_tl_array = [];
					var total_delivery_array = [];
					var date_array = [];

					 for (i = 0; i <= resource.length-1; i++)  {

						 var date = resource[i].date;
						 //console.log(`date ${resource[i].date_exp}`);

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
								break;
							case "08":
								mm = "Aug";
								break;
							case "09":
								mm = "Sep";
								break;
							case "10":
								mm = "Oct";
								break;
							case "11":
								mm = "Nov";
								break;
							case "12":
								mm = "Dec";
								break;
							default:
							    mm=date[1];
						}

				var dd_mmm = date[2]+"-"+mm;
				/*revenue_array.push(resource[i].total_paid);
				balance_array.push(resource[i].Total_balance);
				advance_array.push(resource[i].discount);*/

				total_ot_array.push(resource[i].ot_active_count);
				debugger;
				total_mtp_array.push(resource[i].mtp_count);
				total_vt_array.push(resource[i].vt_count);

				total_tl_array.push(resource[i].tl_count);
				total_delivery_array.push(resource[i].deliver_count);
				date_array.push(dd_mmm);
				}
				var ctx_line_opd_new = document.getElementById("chart_revenue_breakup_opd_new").getContext("2d");
				var ctx_line_opd_cfg_new = {
				type: 'line',
				data: {
					labels: date_array,
					datasets: [{
						label: "OT Count",
						data: total_ot_array,
						backgroundColor: ["rgba(243,142,43,0.5)"],
						},{
						label: "VT Count",
						data: total_vt_array,
						backgroundColor: ["rgba(128,0,0,0.5)"],
						},{
						label: "TL Count",
						data: total_tl_array,
						backgroundColor: ["rgba(39,127,150,0.5)"],
						},{
						label: "MTP Count",
						data: total_mtp_array,
						backgroundColor: ["rgba(0,0,255,0.5)"],
						},{
						label: "Delivery Count",
						data: total_delivery_array,
						backgroundColor: ["rgba(32,181,171,0.5)"],
						}]
					},

				options: {
					scales: {yAxes: [{scaleLabel: {display: true,labelString:  "No. Of Patients"}}],
						xAxes: [{scaleLabel: {display: true,labelString:  "Date"}}],},
					legend: {position:"bottom"}
				}
			};
					var chartot = new Chart(ctx_line_opd_new,ctx_line_opd_cfg_new);
			}
		},
			});
/**********@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@***********/

$.ajax({
		 url: "/daily_admin_reports/ot_revenue_list_day_to_day.php",
		success: function(resource) {
				if(resource!=""){
					//console.log(`resource is this${resource}`);
					var resource = JSON.parse(resource);
					debugger;
					//console.log(`resource is ${resource}`);
					var ot_total_paid = [];
					var ot_total_amount = [];
					var ot_total_balance = [];

					var ot_total_discount = [];
					var date_array = [];

					 for (i = 0; i <= resource.length-1; i++)  {

						 var date = resource[i].date_exp;
						 //console.log(`date ${resource[i].date_exp}`);

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
								break;
							case "08":
								mm = "Aug";
								break;
							case "09":
								mm = "Sep";
								break;
							case "10":
								mm = "Oct";
								break;
							case "11":
								mm = "Nov";
								break;
							case "12":
								mm = "Dec";
								break;
							default:
							    mm=date[1];
						}

				var dd_mmm = date[2]+"-"+mm;
				/*revenue_array.push(resource[i].total_paid);
				balance_array.push(resource[i].Total_balance);
				advance_array.push(resource[i].discount);*/

				ot_total_paid.push(resource[i].ot_total_paid);
				debugger;
				ot_total_amount.push(resource[i].ot_total_amount);
				ot_total_balance.push(resource[i].ot_Total_balance);

				ot_total_discount.push(resource[i].ot_discount);
				date_array.push(dd_mmm);
				}

						var ctx_line_ot = document.getElementById("chart_revenue_in_ot").getContext("2d");
						var ctx_line_ot_cfg = {
						type: 'line',
						data: {
							labels: date_array,
							datasets: [{
								label: "OT collection",
								data: ot_total_paid,
								backgroundColor: ["rgba(139,16,0,0.5)"],
								},{
								label: "OT balance",
								data: ot_total_balance,
								backgroundColor: ["rgba(39,127,150,0.5)"],
								},{
								label: "OT bill amount",
								data: ot_total_amount,
								backgroundColor: ["rgba(32,181,171,0.5)"],
								}]
							},

						options: {
							scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) In Thousand's"}}],
								xAxes: [{scaleLabel: {display: true,labelString:  "Date"}}]},
							legend: {position:"bottom"}
						}
					};
					var chartopdnew = new Chart(ctx_line_ot,ctx_line_ot_cfg);
			}
		},
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

				discount_pharma=resource[3].discount_pharma;
				Total_balance_pharma=resource[3].Total_balance_pharma;
				total_paid_pharma=resource[3].total_paid_pharma;


				var ctx_pie = document.getElementById("myChart_pie").getContext('2d');
				var myPieChart = new Chart(ctx_pie,{
					type: 'doughnut',
					data:{
						labels:["IPD collection in ₹","OPD collection in ₹","Pathology collection in ₹","Pharmacy collection in ₹"],
						datasets:[{
						label:"Total revenue contribution on day to day basis",
						data:[total_paid_ipd,total_paid_opd,total_paid_pathology,total_paid_pharma],
						backgroundColor:[
							"rgb(255, 99, 132)",
							"rgb(54, 162, 235)",
							"rgb(255, 125, 86)",
							"rgb(255, 205, 86)",
							]
						}]
					},
					responsive:true,
				});
			}else{
				document.getElementById("chart_container").innerHTML = "<br><center>No Entry for today !</center><br><br>";
				/*/document.getElementById("myChart_pie").style.display="none";*/

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
			/*/console.log(resource);*/
		}
});

/*--------------chart--
Monthly revenue contribution on day to day basis
Monthly revenue contribution on day to day basis IPD
Monthly revenue contribution on day to day basis OPD
Monthly revenue contribution on day to day basis patho*/
$.ajax({
		 url: "/daily_admin_reports/daily_revenue_list_day_to_day.php",
		success: function(resource) {
				if(resource!=""){
					//console.log(`resource is this${resource}`);
					var resource = JSON.parse(resource);
					//console.log(`resource is ${resource}`);
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

					var total_expense_advance_array = [];
					var date_array = [];

					 for (i = 0; i <= resource.length-1; i++)  {

						 var date = resource[i].date_exp;
						 //console.log(`date ${resource[i].date_exp}`);

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
								break;
							case "08":
								mm = "Aug";
								break;
							case "09":
								mm = "Sep";
								break;
							case "10":
								mm = "Oct";
								break;
							case "11":
								mm = "Nov";
								break;
							case "12":
								mm = "Dec";
								break;
							default:
							    mm=date[1];
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

				total_expense_advance_array.push(resource[i].daily_expense);

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
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) In Thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "Date"}}]},
				legend: {position:"bottom"}
			}
		};
		/*@@@@@@@@@@@@@@@@@@@@@@@@@@@*/

	/*@@@@@@@@@@@@@@@@@@@@@@@@@@@*/

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
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in Thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "Date"}}]},
					legend: {position:"bottom"}
			}
		};
		/*@@@@@@@@@@*/
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
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in Thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "Date"}}],},
				legend: {position:"bottom"}
			}
		};


			/*@@@@@@@@@@@@@*/
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
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in Thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "Date"}}]},
				legend: {position:"bottom"}
			}
		};
                /*@@@@@@@ Chart 2 @@@@@@*/
                var ctx_line_revenue_v_exp = document.getElementById("chart1").getContext("2d");
		var cfg_exp = {
			type: 'line',
			data: {
				labels: date_array,
				datasets: [{
					label: "Expenses",
					data: total_expense_advance_array,
					backgroundColor: ["rgba(205,149,62,0.5)"],
					},{
					label: "Revenue",
					data: total_revenue_array,
					backgroundColor: ["rgba(124,255,124,0.5)"],
					},{
					label: "Balance",
					data: total_balance_array,
					backgroundColor: ["rgba(54,55,24,0.5)"],
					},{
					label: "Discount",
					data: total_advance_array,
					backgroundColor: ["rgba(254,255,124,0.5)"],
					}]
				},

			options: {
				scales: {yAxes: [{scaleLabel: {display: true,labelString:  "(₹) in Thousand's"}}],
					xAxes: [{scaleLabel: {display: true,labelString:  "Date"}}]},
				legend: {position:"bottom"}
			},
			responsive:true,
		};
		var ctx_line_revenue_v_exp = new Chart(ctx_line_revenue_v_exp, cfg_exp);
                /*@@@@@@@@@@@@@*/
		var chart = new Chart(ctx_line, cfg);
		var charts = new Chart(ctx_line_ipd,ctx_line_ipd_cfg);
		var chartopd = new Chart(ctx_line_opd,ctx_line_opd_cfg);
		//debugger;

		var chartpatho = new Chart(ctx_line_patho,ctx_line_patho_cfg);
			/***@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@**/

		}
	}
});
		}
  });






/**********@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@***********/
