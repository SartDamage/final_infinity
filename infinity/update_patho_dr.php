<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$drname=$form['ctl00_drname'];
	$drID=$form['ctl00_dr_ID'];
$db = getDB();
$statement=$db->prepare("UPDATE `pathology_dr_assigned` SET `pathologist_name`=:drname,`WhenModified`=NOW(),`modifiedby`=:AdminID WHERE `pathodrID`=:drID AND pathologist_name!=:drname1" );
$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':drname', $drname, PDO::PARAM_STR);
$statement->bindParam(':drname1', $drname, PDO::PARAM_STR);
$statement->bindParam(':drID', $drID, PDO::PARAM_INT);
$statement->execute();
if ($statement->rowCount() > 0)
   {/* Update worked because query affected X amount of rows. */
	echo 1;
	}
else
    {
		echo 0;
		$error = $statement->errorInfo();
}
//$results=$statement->fetch(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
//return true;
$db=null;
?>