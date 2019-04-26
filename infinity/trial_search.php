<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc ");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$data=json_encode($results);
//return $json;
$data;
$db=null;
?>
<?php include './include/header.php';?>
<style>
a {
  -webkit-transition: .25s all;
  transition: .25s all;
}
.table td, .table th{vertical-align:middle;padding: 0.25rem!important;}
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
<?php include './nav_sidebar.php';?>

<body style="background-color:#E0F2F1;">
	<div id="main">
		<?php include './nav_bartop.php';?>
		<div class="container">
		<br>
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5>Welcome <?php echo $userDetails->username; ?></h5>
			  </div>
			</div>
			<br>
			<div class="card card-outline-info mb-3 margin_bot_8">
				<div class="card-block">
					<form role="form">
						<div class="form-group">
							<input type="input" class="input-lg" id="txt-search" placeholder="Type your search character">
						</div>
					</form>
					<div id="filter-records"></div>
				</div>
			</div>
	</div>
</div>
<script>
function showDetails(pat_id_row) {
	var pat_type = document.getElementById(pat_id_row).getAttribute("data-pat_id");
    //var pat_type = pat_id_row.getAttribute("data-pat_id");
	var Row = document.getElementById(pat_id_row);
	var Cells = Row.getElementsByTagName("td");
    alert("" +Cells[1].innerText+ "'s patient ID is " + pat_type + ".");
	}	
function clickedbutton(button){
		var btn_this= button.getAttribute("data-uid");
		alert(btn_this);
		/* for bubble propogation */
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
		/* end stopping bubble propogation */
	}
	var json=<?php echo $data;?>;
	$('#txt-search').keyup(function(){
		//alert("keyupcalled");
			//alert (json);
            var searchField = $(this).val();
			if(searchField === '')  {
				$('#filter-records').html('');
				return;
			}
			//alert(searchField);
            var regex = new RegExp(searchField, "i");
            var output = '<table class="table table-striped table-hover"><thead ><tr class=""><th>Registration ID</th><th>Name</th><th>Gender</th><th>Age</th><th>Contact</th><th>First Visit</th><th>Options</th></tr></thead>';
            var count = 1;
			  $.each(json, function(key, val){
				if ((val.FirstName.search(regex) != -1) || (val.RegistrationID.search(regex) != -1) || (val.LastName.search(regex) != -1) || (val.Mobile.search(regex)!= -1)) {
					//
					var date = val.WhenEntered;
					var date = date.substring(0,11);
					//
				  output += '<tr class="tbl_row" id="'+val.RegistrationID+'" onclick="showDetails(this.id)" data-pat_id="'+val.RegistrationID+'">';
				  output += "<td>" + val.RegistrationID + "</td>";
				  output += "<td>" + val.FirstName + "  " + val.LastName + "</td>";
				  output += "<td>" + val.Gender + "</td>";
				  output += "<td >" + val.Age + "</td>"
				  output += "<td>" + val.Mobile + "</td>"
				  output += "<td>" + date + "</td>"
				  output += '<td class="center"><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal" title="transfer to "style="width:100px"  data-uid=' + val.RegistrationID + '><i class="fa fa-sign-in fa-2" aria-hidden="true"></i> &nbspSelect</button></td>'
				  //output += '</table>';
				  if(count%2 == 0){
					output += '</tr><tr>'
				  }
				  count++;
				}
			  });
			  output += '</table>';
			  $('#filter-records').html(output);
        });
</script>
<?php
$pageTitle = "list users Account's HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './footer.php';?>
