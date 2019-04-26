<?php 
if(isset($_POST["phoneno"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    //$mysqli = new mysqli('localhost' , 'root', '', 'ganesh_memorial');
    $mysqli = new mysqli('localhost' , 'ganesh_root', 'mayur@123', 'ganesh_hms');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    
    $username = filter_var($_POST["phoneno"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
	if(isset($_POST['patient'])){
		$statement = $mysqli->prepare("SELECT Mobile FROM patientregistrationmaster WHERE Mobile=?");    
	}else{
		$statement = $mysqli->prepare("SELECT contact FROM staff_ledger WHERE contact=?");
	}

    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->bind_result($username);
    if($statement->fetch()){
        die('1');
    }else{
        die('2');
    }
}
?>