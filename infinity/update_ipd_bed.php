<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$ward_name=$form['add_ward_name_main'];
	$bed_type_id=$form['add_bed_type'];
	$bed_name=$form['ctl00_bed_name'];
	$drID=$form['ctl00_bed_ID'];
$db = getDB();
$statement=$db->prepare("UPDATE `bed_number` SET `ward_id`=:ward_name,`bed_type`=:bed_type,`bed_name`=:bed_name, `WhenModified`=NOW(), `modifiedby`=:AdminID WHERE `ID`=:drID" );

$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':ward_name', $ward_name, PDO::PARAM_INT);
$statement->bindParam(':bed_type', $bed_type_id, PDO::PARAM_INT);
$statement->bindParam(':bed_name', $bed_name, PDO::PARAM_INT);
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