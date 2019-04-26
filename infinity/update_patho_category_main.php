<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$test_name=$form['ctl00_test_name'];
	$testID=$form['ctl00_test_ID'];
$db = getDB();
$statement=$db->prepare("UPDATE `pathologycategorymaster` SET `PathologyCategoryName`=:test_name,`WhenModified`=NOW(),`ModifiedBy`=:AdminID WHERE `PathologyCategoryID`=:testID AND PathologyCategoryName!=:test_name1" );
$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':test_name', $test_name, PDO::PARAM_INT);
$statement->bindParam(':test_name1', $test_name, PDO::PARAM_INT);
$statement->bindParam(':testID', $testID, PDO::PARAM_INT);
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