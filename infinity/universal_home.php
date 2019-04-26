<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
?>
<style>
.accordion {background-color: #eee;color: #444;cursor: pointer;padding: 18px;width: 100%;text-align: left;border: none;outline: none;transition: 0.4s;}
/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) *//* .active, .accordion:hover , .main-menu>li>a{background-color: #5fa2db;color:white!important;} *//* Style the accordion panel. Note: hidden by default */.panel {padding: 0 18px;background-color: white;display: none;overflow: hidden;}</style>
<?php include  $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
  <link href="/dist/css/style_list_all_patients.css" rel="stylesheet">
  <script>

 $('a').click(function(){
        $('a').removeClass("active");
        $(this).addClass("active");
    });
  </script>
 <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if (isset($_SESSION['uid']) && $_SESSION['uid'] == "0"){//
		$url='/permission_denied.php';//give appropriate page
		header("Location: $url");		
		}else if(isset($_SESSION['uid']) && ( $_SESSION['uid'] == "1"  ||  $_SESSION['uid'] == "6" ||  $_SESSION['uid'] == "10"||  $_SESSION['uid'] == "12" ||  $_SESSION['uid'] == "14" ||  $_SESSION['uid'] == "17")){
			require $_SERVER['DOCUMENT_ROOT']."/list_all_patients_body.php";
		}else if(isset($_SESSION['uid']) &&   $_SESSION['uid'] == "2" ){
			include $_SERVER['DOCUMENT_ROOT']."/list_all_patients_body_tobeusedinhms.php";
		// $url='http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";
		// header("Location: $url");
		}
	}else{
		$url = $_SERVER['DOCUMENT_ROOT'].'/login.php';
		header("Location: $url");
	}
	
	die();
?>