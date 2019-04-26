<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$db = getDB();

?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>
  <link href="/dist/css/style_list_all_patients.css" rel="stylesheet">
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/list_all_patients_body.php";?>
