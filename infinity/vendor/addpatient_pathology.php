<?php
include $_SERVER['DOCUMENT_ROOT'].'/test/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/test/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/test/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$RegID=$form['regID'];
	$PatID=$form['patID'];
	$main_test=$form['main_test'];
	$sub_test=$form['sub_test'];
	$dr_assigned=$form['dr_assigned'];
	$LabID="1";//$form['dr_assigned'];
	$sample_status=$form['sample_status'];
	//$RegID=$form['RegID'];
	$AdminID=$form['ctl00_AdminID'];
$db = getDB();
$statement=$db->prepare("INSERT INTO `pathopatientregistrationmaster`(RegistrationID,TestCategory,TestName,Department,ConsultedBy,LabID,SampleCollected,EnteredBy) VALUES(:RegID,:main_test,:sub_test,:PatID,:dr_assigned,:LabID,:sample_status,:AdminID)");
$statement->bindParam(':RegID', $RegID, PDO::PARAM_INT);
$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
$statement->bindParam(':main_test', $main_test, PDO::PARAM_INT);
$statement->bindParam(':sub_test', $sub_test, PDO::PARAM_INT);
$statement->bindParam(':dr_assigned', $dr_assigned, PDO::PARAM_INT);
$statement->bindParam(':LabID', $LabID, PDO::PARAM_INT);
$statement->bindParam(':sample_status', $sample_status, PDO::PARAM_INT);
$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
/* $statement->execute(); */
if ($statement->execute() && ($statement->rowCount()>0))
   {/* Update worked because query affected X amount of rows. */
	echo "Pathology test entered successfully.";
	}
else
    {
		echo false;
		$error = $statement->errorInfo();
}
//$results=$statement->fetch(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
//return true;
$db=null;
?>