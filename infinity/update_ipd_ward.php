<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$ward_name=$form['ctl00_ward_name'];
	$drID=$form['ctl00_ward_ID'];
	$bed_count=$form['ctl00_bed_count'];
$db = getDB();
$statement=$db->prepare("UPDATE `ward_details` SET `ward_name`=:ward_name,`bed_count`=:bed_count,`bed_available`=:bed_available, `WhenModified`=NOW(), `modifiedby`=:AdminID WHERE `ID`=:drID" );
$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':ward_name', $ward_name, PDO::PARAM_INT);
//$statement->bindParam(':ward_name1', $ward_name, PDO::PARAM_INT);
$statement->bindParam(':bed_count', $bed_count, PDO::PARAM_INT);
$statement->bindParam(':bed_available', $bed_count, PDO::PARAM_INT);
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