<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/*$db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc ");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$data_for_search=json_encode($results);
//return $json;
$db=null;

//echo $json;*/
//$db=null;
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
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

#txt-search{
	border-radius:24px;
}
.thead-teal{height:45px;}
input[type=search]::-webkit-search-cancel-button {
    -webkit-appearance: searchfield-cancel-button;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link{color: #fff!important;
    background-color: #8BC34A;}
	#exTab3 .nav-pills>li>a {
    border-radius: 5px 5px 0 0;
    padding: 15px;
}
.nav-item a {color: #8BC34A!important;}
</style>

<?php/* include $_SERVER['DOCUMENT_ROOT'].'/nav_sidebar.php';*/?>
<?php/* include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_dr.php";*/?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php'; ?>

<body style="background-color:#E0F2F1;">
	<div id="main">
		
		<?php include $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';?>
		
		<div class="container">
      <a href="#" onclick="goBack()" class="float" title="Click, to go back">
        <i class="fa fa-times my-float"></i>
      </a>
    <br>
      <div class="card card-outline-info mb-3">
        <div class="card-block heading_bar">
        <h5><!--title--> <!--(make according to dr id (on completion line *98))--></h5><!--<?php/* echo $userDetails->username;*/ ?>-->
        </div>
      </div>
      <div class="card card-outline-info mb-3">
        <div class="card-block">
          <form role="form" action="" method="post">
            <div class="row">
                <div class="col-1"></div> 
                                <div class="col-1">
                                  <label for="from_date" id="date_label" class="col-form-label"><b>From:</b></label>
                                </div>
                                    <div id="from_date" class="col-3 input-group date">
                                    <input class="" type="text" id="from_date" name="from_date" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                                

                                <div class="col-2"></div>
                                <div class="col-1">
                                    <label for="to_date" id="date_label" class="col-form-label"><b>To:</b></label>
                                </div>

                                <div id="to_date" class="col-3 input-group date">
                                    <input class="" type="text" id="to_date" name="to_date"  />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
            </div>
          </form>
          <div id="filter-records"></div>
        </div>
      </div>            
      <div class="card card-outline-info mb-3 margin_bot_8">
        <div class="card-block">
        <!----------------------@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-------------------------------->
        <div id="exTab3" class="">
          <ul class="nav nav-pills">
          <li class="nav-item">
          <a class="nav-link active" href="#1b" data-tab="1b" data-toggle="tab">Pending</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#2b" data-tab="2b" data-toggle="tab" id="generate">Completed</a>
          </li>
         
          <!--<li class="nav-item">
          <a class="nav-link " href="#4b" data-tab="4b" data-toggle="tab">All reports</a>
          </li>-->
          </ul>
          <div class="tab-content clearfix">
            <div class="tab-pane border border-teal active" id="1b">
            <br>
            <table id="myTable_pending_patients" class="table table-striped table-hover dt-responsive nowrap" width="100%">
                  <thead class="thead-teal">
                  <tr class="head_row">
                    <th class="no-sort">Sr.no</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Garnida</th>
                    <!--<th>Email</th>-->
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Method Delivery</th>
                    <th>Gender</th>
                    <th>Weight</th>
                    <th>No. of Born Child</th>
                    <th>3KS</th>
                    <th>Date/Time</th>
                    <th>Doctor By</th>

                    
                  </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
              </table>
            </div>
            <div class="tab-pane border border-teal" id="2b">
              <br>
            <!--<h3>Reports generated and payment may or may not be done print not taken.</h3>-->
              <table id="myTable_counsulted" class="table table-striped table-hover nowrap" width="100%">
                <thead class="thead-teal">
                  <tr class="head_row">
                    <th class="no-sort">Sr.no</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Garnida</th>
                    <!--<th>Email</th>-->
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Method Delivery</th>
                    <th>Gender</th>
                    <th>Weight</th>
                    <th>No. of Born Child</th>
                    <th>3KS</th>
                    <th>Date/Time</th>
                    <th>Doctor By</th>

                    
                  </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
              </table>
            </div>
            <div class="tab-pane border border-teal" id="1b">
              <br>
              
            </div>
            <!--<div class="tab-pane border border-teal" id="4b">
              <h3>will contain all reports irrespective of time,payment.</h3>
            </div>-->
          </div>
        </div>
        <!----------------------@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-------------------------------->

        </div>
    </div>
  </div>
  
  
<script>

  $(document).ready(function(){
      var date_input=$('input[name="from_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    });

    $(document).ready(function(){
      var date_input=$('input[name="to_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    });

    $(document).ready(function() {
    $('#myTable_counsulted').DataTable({
      "scrollX": true,

    });

        $('#myTable_pending_patients').DataTable({
      
      "scrollX": true,

    });
} );
    
</script>

		
<?php
$pageTitle = "OPD patients section"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>