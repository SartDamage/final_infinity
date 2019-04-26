<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
 if(isset($_GET['ID'])){$ID=$_GET['ID'];}/* $ID="0";}else{}  */
?>

<?php include $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>

<!--<script src="/dist/js/jquery.printElement.min.js"></script>-->
<link href="/dist/css/report.css" rel="stylesheet" />
<link href="/dist/css/adminlayout.css" rel="stylesheet" />
<link href="/Reports/css/in_report.css" rel="stylesheet" />
<style>
body{
	background-color:white!important;
	}
.border_bottom{
	background: #999;
    height: 1px;
}
table.ref_range_tab td, th {
    text-align: center;
    border: 1px solid;
}
table.ref_range_tab {
    width: 100%;
    padding-bottom: 0px;
    border: 1px solid black;
}
.hr_special{
	margin-top: 1rem;
    margin-bottom: 1rem;
}
</style>