<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);?>
<!--  -->

<!--  -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
<style>
.form_header{
    border-bottom: dashed 1px #d1d0d0;
    padding-bottom: 10px;}
form{margin-bottom:5px;}
#ipd_display{display:none;}
.form-control{
	margin-bottom: 0.5rem!important;
	border: 0px;
	border-bottom: 1px solid #868e96;
	border-radius: .1rem;}
.form-control:focus{
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 4px 4px 0px 0rem #dae0e5;}
.radio:focus {
    color: #495057;
    background-color: #fff;
    border-color: #868e96;
    outline: 0;
    box-shadow: 0px 0px 20px 0rem #dae0e5;}

a {
  -webkit-transition: .25s all;
  transition: .25s all;
}

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
	
.form .button_login:hover, .form .button_login:active, .form .button_login:focus {
    box-shadow: 3px 3px 3px 0.2rem #5C885C;}
.form .seperator, .seperator{
    border: 0px;
    border-bottom: 1px dashed #b5babd;}
.required {
    font-weight: bold;
}
.required:after {
    color: #e32;
    content: ' *';
    display:inline;
}
.error select{
color:red;}
.noerror select{
color:#9e9e9e;}
.error::-webkit-input-placeholder {
    color: red;
}
.noerror::-webkit-input-placeholder {
    color: #9e9e9e;
}
input:not([type='submit']), select, summary, textarea {

    background-color: #fff0!important;
    border-radius: .25rem;
	}
</style>
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if (isset($_SESSION['uid']) && $_SESSION['uid'] == "0"){//
		$url='/permission_denied.php';//give appropriate page
		header("Location: $url");		
		}else if(isset($_SESSION['uid']) && ( $_SESSION['uid'] == "1"  ||  $_SESSION['uid'] == "6" ||  $_SESSION['uid'] == "10"||  $_SESSION['uid'] == "12" ||  $_SESSION['uid'] == "14" ||  $_SESSION['uid'] == "17")){
		 include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';
		echo '<div id="main">';
		 include $_SERVER['DOCUMENT_ROOT'].'/nav_bartop.php';

		 include $_SERVER['DOCUMENT_ROOT'].'/addpatientform_body.php';
		 
		 
		}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "3"){
			
		$url='http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";
		header("Location: $url");
		}
	}else{
		$url = $_SERVER['DOCUMENT_ROOT'].'/login.php';
		header("Location: $url");
	}
	
	die();
?>



