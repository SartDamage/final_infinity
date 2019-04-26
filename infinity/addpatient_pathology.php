<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$RegID=$form['regID'];
	$PatID=$form['patID'];
	$dr_assigned=$form['dr_assigned-0'];
	$LabID="1";//$form['dr_assigned'];
	if(isset($form['total'])){$total=$form["total"];}
	if(isset($form['advance'])){$advance=$form["advance"];}
	if(isset($form['balance'])){$balance=$form["balance"];}
	//$RegID=$form['RegID'];
	$AdminID=$form['ctl00_AdminID'];
	$is_ipd_patient=$form['is_ipd_patient'];
	$db = getDB();
	
	$statement=$db->prepare("INSERT INTO `pathopatientregistrationparent` (`PathoRegID`,`RegistrationID`,`WhenEntered`,`EnteredBy`) VALUES (:PatID,:RegID,NOW(),:AdminID)");
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
	if($is_ipd_patient==""){
			$statement->execute();
			$stat_row_count=$statement->rowCount();
		}else{
			$stat_row_count=2;
		}
	
if (($stat_row_count>0))
   {/* Update worked because query affected X amount of rows. */
	
		for ($x = 0; $x <= 4; $x++) {
		 $main_test="main_test-".$x;
		 $sub_test="sub_test-".$x;
		 $sample_status="sample_status-".$x;
			 if ((isset($form[$main_test])) && (isset($form[$sub_test])) && (isset($form[$sample_status]))){
					$main_test=$form[$main_test];
					$sub_test=$form[$sub_test];
					$sample_status=$form[$sample_status];
			 $stat=$db->prepare("INSERT INTO `pathopatientregistrationmaster`(RegistrationID,TestCategory,TestName,Department,ConsultedBy,LabID,SampleCollected,EnteredBy) VALUES(:RegID,:main_test,:sub_test,:PatID,:dr_assigned,:LabID,:sample_status,:AdminID)");
			 $stat->bindParam(':RegID', $RegID, PDO::PARAM_STR);
			 $stat->bindParam(':PatID', $PatID, PDO::PARAM_STR);
			 $stat->bindParam(':main_test', $main_test, PDO::PARAM_INT);
			 $stat->bindParam(':sub_test', $sub_test, PDO::PARAM_INT);
			 $stat->bindParam(':dr_assigned', $dr_assigned, PDO::PARAM_STR);
			 $stat->bindParam(':LabID', $LabID, PDO::PARAM_INT);
			 $stat->bindParam(':sample_status', $sample_status, PDO::PARAM_STR);
			 $stat->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
			 /* $statement->execute(); */
				 if ($stat->execute() && ($stat->rowCount()>0)){/* Update worked because query affected X amount of rows. */
					$get_data=$db->prepare("SELECT * FROM `patientregistrationmaster` WHERE `RegistrationID`=:RegID;");
					$get_data->bindParam(':RegID', $RegID, PDO::PARAM_STR);
					$get_data->execute();
					$results=$get_data->fetchAll();
					if($get_data->rowCount() > 0){
						echo json_encode($results);
					}else{
						echo "unsuccesful";
					}
					//echo "Pathology test entered successfully.";
				}else{
					echo false;
					$error = $stat->errorInfo();
				}
			}else{}
		}
}else{
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