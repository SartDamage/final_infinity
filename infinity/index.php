<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/userClass.php";
$userClass = new userClass();
$errorMsgReg='';
$errorMsgLogin='';
/* Login Form */
if (!empty($_POST['loginSubmit']))
{
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
{
	$uid=$userClass->userLogin($usernameEmail,$password);
/*if($uid=="2")
{
$url=$_SERVER['DOCUMENT_ROOT']."/universal_home.php";
header("Location: $url"); // Page redirecting to home.php
}
else if($uid=="1"){
	$url=$_SERVER['DOCUMENT_ROOT']."/universal_home.php";
header("Location: $url"); // Page redirecting to home.php
}
else if($uid=="3"){
	$url=$_SERVER['DOCUMENT_ROOT']."/dr_panel/dr_home.php";
header("Location: $url"); // Page redirecting to home.php
}*/
/* else
{
$errorMsgLogin="Please check login details.";
} */
}
}
?>
<?php
ob_start (); // Buffer output
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><!--title--></title>
<!--bootstrap css-->
	<link rel="stylesheet" href="/dependencies/css/bootstrap.min.css">
	<link rel="stylesheet" media="print" href="/dependencies/css/bootstrap.min.css">
	<!--OPtional CDN-->
	<!--<link rel="stylesheet" href="./dependencies/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">-->
  <!--bootstrap JS-Popper-slimjs-->
	<script src="/dependencies/js/jquery-3.2.1.slim.min.js"></script>
	<!-- CDN OPtion<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
	<script src="/dependencies/js/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- cdn option<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
	<script src="/dependencies/js/bootstrap.min.js"></script>
	<!-- CDN option<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>-->
<!--font awesome-->
	<!--<link rel="stylesheet" src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>-->
	<script src="/dist/js/jquery-3.2.1.min.js"></script>
	<script src="/dist/js/jquery-ui.min.js"></script>
	<script src="/dist/js/charts.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<!-- CDN option
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  -->
<!-- CDN option
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>-->
  <link href="/dist/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" rel="stylesheet">-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style>
#mySidenav	{
	overflow-y:overlay;
}
.col-form-label {
    font-size: 0.8rem;
    line-height: normal;
}
body{
	font-family: 'Roboto', sans-serif;
}
.margin_bot_8{margin-bottom: 8rem!important;}
.navbar_custom_bg {    background-color: #009788!important;}
.bg-teal {
    background-color: #008080!important;
}
.fa_sidebar-2x {
font-size: 2em;
}
.fa_sidebar {
position: relative;
display: table-cell;
width: 60px;
height: 36px;
text-align: center;
vertical-align: middle;
font-size:20px;
}
/*.main-menu:hover,nav.main-menu.expanded {
width:250px;
overflow:visible;
}*/
.main-menu {
background:#fbfbfb;
/*border-right:1px solid #e5e5e5;*/
box-shadow: 3px 5px 10px 2px #a4a4a4;
position:fixed;
/*top:59;*/
bottom:0;
height:100%;
/*left:30;*/
width:249px;
overflow:hidden;
-webkit-transition:width .2s linear;
transition:width .2s linear;
-webkit-transform:translateZ(0) scale(1,1);
z-index:1000;
}
.main-menu>ul {
margin:7px 0;
}
.main-menu li {
position:relative;
display:block;
width:250px;
}
.main-menu li>a {
position:relative;
display:table;
border-collapse:collapse;
border-spacing:0;
color:#999;
font-family: arial;
font-size: 14px;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .1s linear;
transition:all .1s linear;
}
.main-menu .nav-icon {
position:relative;
display:table-cell;
width:60px;
height:36px;
text-align:center;
vertical-align:middle;
font-size:18px;
}
.main-menu .nav-text {
position:relative;
display:table-cell;
vertical-align:middle;
width:190px;
}
.main-menu>ul.logout {
position:absolute;
left:0;
bottom:0;
}
.no-touch .scrollable.hover {
overflow-y:hidden;
}
.no-touch .scrollable.hover:hover {
overflow-y:auto;
overflow:visible;
}
a:hover,a:focus {
text-decoration:none;
}
nav {
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
}
nav ul,nav li {
outline:0;
margin:0;
padding:0;
}
.main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#5fa2db;
}
.area {
float: left;
background: #e2e2e2;
width: 100%;
height: 100%;
}
.float_form_entry{
	top: 8px!important;
    z-index: 99;
    right: 7px!important;
}
#toggle {
    display: none;
    position: fixed-bottom;
    top: -100%;
    left: -100%;
    cursor: pointer;
}
#main{
-webkit-transition:width 1s linear;
transition:width 1s linear;
-webkit-transform:translateZ(999) scale(1,1);
}
html {
  position: relative;
  min-height: 100%;
  max-width:100%;
}
body {
	background-color:#E0F2F1;
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
}
.card-block{
    flex: 1 1 auto;
    padding: 1.25rem;
}
.radio-inline{padding:5px;}
.form .button_login {
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .button_login:hover,.form .button_login:active,.form .button_login:focus {
  background: #43A047;
}
.form .button_reset {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #e41500;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .button_reset:hover,.form .button_reset:active,.form .button_reset:focus {
  background: #e41521;
}
#bars{display:none;}
#top{left:194px;}
#main{margin-left:250px;}
#avatar{display:block;}
#space{display:none;}
/* for slider toggle */
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}
.switch input {display:none;}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #2196F3;
}
input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
#txt-search {
    width: 350px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAAEnQAABJ0Ad5mH3gAAAACYktHRAD/h4/MvwAAAAl2cEFnAAABKgAAASkAUBZlMQAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxMy0wNC0xMFQwNjo1OTowNy0wNzowMI5BiVEAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTMtMDQtMTBUMDY6NTk6MDctMDc6MDD/HDHtAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAABF0RVh0VGl0bGUAc2VhcmNoLWljb27Cg+x9AAACKklEQVQ4T6WUSavqQBCFK+2sII7gShFXLpUsBBHFf+1KcAQFwaWiolsnnBDn++4p0iHRqPDuByFJd/Wp6qrqVn5+IQP3+52m0ymtVis6Ho885na7KRgMUiKR4O9vmEQHgwGNx2NyOp0khCBFUXgcJo/Hg67XK8ViMcpkMjz+Dl200+nQZrMhh8PBE4gYQgDidrudvzEOm2KxyP9WsCginM1mHKEUS6VSFA6HOWI4G41GPAfx2+1GgUCAVFXVZMwovwY/lUqFPB4PiyFn+XxemzbT6/VovV6z8Ol0olwux+LPCBQFEQKIvhME2WyWbWGHFCD/VghUGVvE1rDlb6TTabbFmuVyqY2aEWgbFALeI5GINvyeUCjEtlgju+IZoRWfkS30CURoxFJUNjMEt9stf38CNjJKIFvNiMBJgTebzcZt843hcMhCELWqPBDxeJwulwtvC/3X7/e1qVfgFD0rC5tMJrUZM8Lr9VI0GmVBRDCfz6nZbHI/Sna7HXW7XZpMJtxSiBIP1lmhH9NqtaqfGKQDTmQREBnSgwfmMqfYYblc1o+2xHShtNttLgSiee4EmMEp3hDBPJzikimVSuRyuTTLJ1GwWCz4pCB3UhiL/X4/Hw50C5zjLSM+n898weCogxdRIzAGxigAdtNqtV6EC4UC+Xy+z6Kf2O/31Gg0TMK4ZBDxf4uCw+FA9XpdF0aaUOg/iQLcHbVaTb/p0Cl/FgXIJ/oYnaCqKv0DC6dltH6Ks84AAAAASUVORK5CYII=');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
#txt-search:focus {
    width: 100%;
    outline: 0px;
    box-shadow: 0 0 10px #9ecaed;
}
.hidden {display:none;}
/* slider toggle css end */
.table .thead-teal th {
    color: #fff;
    background-color: #009788;
    border-color: #009788;
	color: white;
	}
.float:hover{
	background-color: #D32F2F;
    color: white;
	box-shadow: 3px 3px 1px 0px #999;
}
.my-float{
	margin-top:18%;
	font-size:1.5em
}
.float{
	position:absolute;
	width:40px;
	height:40px;
	top:87px;;
	z-index:99;
	right:26px;
	/*background-color:#0C9;*/
	background-color:#C00;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}
#txt-search{
	border-radius:24px;
}
.head_row{
	height:44px;
}
.fa-2{
	font-size:1.5em;
}
.form-float {
    position: absolute;
    width: 40px;
    height: 40px;
    top: 6%;
    z-index: 99;
    left: 19%;
    /* background-color: #0C9; */
    background-color: #C00;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    box-shadow: 2px 2px 3px #999;
}
/************/
.clearable{
  background: #fff url(data:image/gif;base64,R0lGODlhBwAHAIAAAP///5KSkiH5BAAAAAAALAAAAAAHAAcAAAIMTICmsGrIXnLxuDMLADs=) no-repeat right -10px center;
  border: 1px solid #999;
  padding: 3px 18px 3px 4px; /* Use the same right padding (18) in jQ! */
  border-radius: 3px;
  transition: background 0.4s;
}
.clearable.x  { background-position: right 5px center; }
.clearable.onX{ cursor: pointer; }
.clearable::-ms-clear {display: none; width:0; height:0;}
/***********/
/**************pagenation**************/
.pagination {
    display: inline-block;
}
.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}
.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
/*************************************/
input[type="button" i]:disabled, input[type="submit" i]:disabled, input[type="reset" i]:disabled, input[type="file" i]:disabled::-webkit-file-upload-button, button:disabled, select:disabled, optgroup:disabled, option:disabled, select[disabled] > option {
    color: graytext!important;
	background: #75af77!important;
}
.button_bottom_form{
	border-radius: 40px;
	padding: 8px!important;
}
</style>
	<!-- end  style for sidevar-->
</head>
<body>
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if (isset($_SESSION['uid']) && $_SESSION['uid'] == "1"){
	$url=BASE_URL.'admin_dashboard.php';
	}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "10"){
		$url=BASE_URL.'dashboard_pathology.php';
	}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "2"){
		$url=BASE_URL.'dr_panel/dr_home.php';
	}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "8"){
		$url=BASE_URL.'dr_panel/dr_home.php';
	}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "3"){
		$url=BASE_URL.'dr_panel/dr_home.php';
	}else if(isset($_SESSION['uid']) && $_SESSION['uid'] == "4"){
		$url=BASE_URL.'include/403.php';
	}else{
		$url = $_SERVER['DOCUMENT_ROOT'].'/include/403.php';
	}
	header("Location: $url");
	die();
} else {include $_SERVER['DOCUMENT_ROOT'].'/login.php';}?>
  </body>
</html>
