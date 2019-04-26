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
.bottom{
	position: fixed;
    bottom: 10%;
    right: 30%;
}
</style>
</head>
<br><br>
<div class="container-fluid 403">
	<img class="error_img" src="/img/403.gif">
</div>
<center><strong>Permission Denied<sup>*</sup></strong></center>
<br>
<div class="container-fluid 403">
	<center><button class="btn btn-outline-success" onclick="location.href='/';">go to login</button></center>
</div>
<div class="bottom">
<center><sup>*</sup> you do not have enough clearence to login. Contact your admin for further details.</center>
</div>
<?php
$session_uid='';
$_SESSION['uid']=''; 
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();
$pageTitle = "IPD patient's list HMS"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';?>