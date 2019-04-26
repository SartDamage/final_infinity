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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvg/1.5/canvg.js"></script>
<script>
    function demoFromHTML() {
        var pdf = new jsPDF('1', 'mm', [250, 90]);
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#barcode2')[0];

        // we support special element handlers. Register them with jQuery-style
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 100,
            bottom: 10,
            left: 10,
            width: 522
        };
        var canvas = document.getElementById('barcode2');
        var imgData = canvas.toDataURL();
        pdf.addImage(imgData, 'JPEG', 10, 10);
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF
                //          this allow the insertion of new lines after html
                pdf.save('Test.pdf');
            }, margins
        );
    }
</script>
<style>
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
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<div class="container">
					<div class="row justify-content-md-center">
						<a class="btn btn-outline-teal" href="./stock/add_new_stock.php">Add New Stock</a>
					</div>
				</div>
			  </div>
			</div>

			<div class="card card-outline-info mb-3" id="update_block" >
			<div class="card-block" id="print">
				<form class="form" id="add_ward_form" name="add_ward_form" action="" method="post" enctype="multipart/form-data" >
					<center>
					<div class="form-group row justify-content-md-center" style="margin-top: 1rem;">
					<div class="col-md-3"><label> Brand: <span id="name_of_brand"></span></label></div>
					<div class="col-md-3"><label> Model: <span  id="Name_of_model"></span></label></div>
					</div>
					<div class="form-group row justify-content-md-center" style="margin-top: 1rem;"><!-- dostor assigned -->
						<label for="add_stock_type_main" id="add_ward_form_label" class="col-1 col-form-label">Update Price : </label>
						<div class="col-md-2">
							<!--<input class="form-control noerror" type="text" placeholder="Ward Name" name="ctl00_ward_name" id="add_stock_type_main">-->
							<input class="form-control noerror" type="text" placeholder="Update Price" name="add_price_up" id="add_price_up">
							<input class="form-control noerror" type="hidden" placeholder="Type name" name="add_stock_type_AdminID" id="add_stock_type_AdminID" value="<?php echo $userDetails->ID;?>">
							<input class="form-control noerror"  placeholder="Type name" name="add_type_ID" id="add_type_ID" value="" hidden>
						</div>
						<label for="add_stock_type_main" id="add_ward_form_label" class="col-1 col-form-label">Update Quantity : </label>
						<div class="col-md-2" ">


							<input class="form-control noerror" type="text" placeholder="Current Quantity" name="add_quantity_upd" id="add_quantity_upd" readonly>
						</div>
						<label> + </label>
						<div class="col-md-2" ">

						<input class="form-control noerror" type="text" placeholder="New stock" name="add_new_quan" id="add_new_quan">
						</div>

						<div class="col-md-2">

							<div class="form-group row justify-content-md-center" style="margin-bottom:0">

								<div class="col-md">
									<input class="form-control btn btn-outline-danger" type="Submit" title="update" placeholder="submit" name="update_type" id="update_type" value="Update">
								</div>
							</div>
						</div>

					</div>


					</center>
				</form>
			</div>
		</div>
		<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Print Barcode</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <div class="form-group row justify-content-md-center navbar-text pull-left" style="margin-top: 1rem;">
					<div class="col-md-3 ">
					<canvas id="barcode2"></canvas>


				  </div>
				</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default"  onclick="demoFromHTML()">Print</button>
        </div>
      </div>

    </div>
  </div>

			<div class="card card-outline-info mb-3 margin_bot_8">
			  <div class="card-block">
			  <table class="table table-striped table-hover" id="myTable">
					<thead class="thead-teal">

						<tr class="head_row">
						<th class="no-sort">&nbsp;&nbsp;&nbsp;</th>
							<th>Type</th>

							<th>Brand</th>

							<th>Model</th>
							<th>Department</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Update</th>
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

	function print(){
		window.print();
		alert("here");
	}

	function generate_barcode(A){




		var ID = A.getAttribute("data-uid");
		var unix_timestamp= A.getAttribute("data-vid");
		var batch_no= A.getAttribute("data-wid");
		//console.log(unix_timestamp);
		JsBarcode('#barcode2',unix_timestamp +" "+batch_no,{height:100,width:5,font:"Roboto",displayValue:true,margin:1,fontSize:50});
		//JsBarcode('#barcode2',"test",{height:200,width:10,font:"Roboto",displayValue:true,margin:0,fontSize:50});
	}
var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
		// the script where you handle the form input.
		$.ajax({
			   type: "POST",
			   url: "/stock/get_all_stock_pharmacy.php",//from global_variable
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
				 var iconfal="<i class='fas fa-prescription-bottle'></i>";
				 }
					//var date = json[i].whenentered;
					//var date = date.substring(0,11);
					//var date= date.split("-").reverse().join("-");
					//var dob = json[i].dob;
					//var dob = date.substring(0,11);
					//var name= json[i].firstname + "  " + json[i].lastname;
					tr = $('<tr class="tbl_row" id="'+json[i].type+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].type+'">');

					tr.append("<td align='center'>"+iconfal+"</td>");

					tr.append("<td>" + json[i].type + "</td>");
					tr.append("<td>" + json[i].brand+ "</td>");
/* 					tr.append("<td>" + json[i].contact + "</td>");
					tr.append("<td>" + json[i].email + "</td>"); */
					tr.append("<td>" + json[i].model_no+ "</td>");
					tr.append("<td>" + json[i].department + "</td>");
					tr.append("<td>" + json[i].number_stock + "</td>");
					tr.append("<td>₹" + json[i].price + " </td>");
					tr.append('<td class=""><center><button type="button" onclick="clickedupdate(this)" class="btn btn-outline-info" title="Update entry" style="width:100px"  data-uid="' + json[i].id + '"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>&nbsp;Update</button><button type="button" onclick="generate_barcode(this)" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" title="Generate Barcode" style="width:80px"  data-uid="' + json[i].id + '" data-vid="' + json[i].unix_timestamp + '" data-wid="' + json[i].batch_no + '"><i class="fa fa-barcode" aria-hidden="true"></i>&nbsp;</button><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="clickeddelete(this)" class="btn btn-outline-danger" title="Delete entry" style="width:100px"  data-uid="' + json[i].ID + '"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i>&nbsp;delete</button>--></center></td>');
					$('table').append(tr);
				}
				$('#myTable').DataTable({
					 "order": [[ 3, "desc" ], [ 0, 'desc' ]],
					 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
           "buttons": [
           //	/* 'csv','csv', */ 'excel'/* , 'pdf', */, 'print'
                       {
                        extend: 'print',
                        exportOptions: {
                        columns: [ 1, 2, 3, 4,5,6] //Your Colume value those you want
                            }
                          },
                          {
                              extend: 'excel',
                              exportOptions: {
                              columns: [1, 2, 3, 4,5,6] //Your Colume value those you want
                          }
                        }
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

</script>
<?php
$pageTitle = "List of all Stocks"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
