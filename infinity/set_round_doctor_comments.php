<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form = $_POST;
$patientID =$form['ctl00_ptID'];
$target_dir = "upload/doctor_round_img/";
$encoded_data = $form['base64'];

	if($form['Df_date_real'] != "" || $form['Df_date_real'] != null)
	              {

										$round_date = $form['Df_date_real'];
										$round_time = $form['Df_time_real'];
										$round_comments = $form['Df_comment_real'];
										////////for image storage Aj//////////////////

										$binary_data = base64_decode($encoded_data);
										$name =date('YmdHis').time().".jpg";
										$target_file = $target_dir . $name;
										$newfilename =$name;
										$uploadOk = 1;
										if ($uploadOk == 0) {
										$errmsg = "Sorry, your file was not uploaded.";
										} else
										{
										file_put_contents($target_dir.$newfilename,$binary_data);
										}

										////////////////////////////////////////////

										//echo 'id='.$patientID.'date='.$round_date.'time='.$round_time.'comments'.$round_comments;
										if($round_date=="" || $round_date == null){

										}else{


										$db = getDB();
										$statement=$db->prepare("INSERT INTO `round_doctor_comments`
										(`Patient_id`,
										`round_date`,
										`round_time`,
										`round_comments`,
										`avatar`)
										VALUES
										(:Patient_id,
										:round_date,
										:round_time,
										:round_comments,
										:newfilename)
										ON DUPLICATE KEY UPDATE `Patient_id`=:Patient_id1,`round_date`=:round_date1,`round_comments`=:round_comments1,`round_time`=:round_time1 ,`avatar`=:newfilename1 ");
										$statement->bindParam(':Patient_id', $patientID);
										$statement->bindParam(':Patient_id1', $patientID);
										$statement->bindParam(':round_date', $round_date);
										$statement->bindParam(':round_date1', $round_date);
										$statement->bindParam(':round_time', $round_time);
										$statement->bindParam(':round_time1', $round_time);
										$statement->bindParam(':round_comments',$round_comments);
										$statement->bindParam(':round_comments1',$round_comments);
										$statement->bindParam(':newfilename',$newfilename);
										$statement->bindParam(':newfilename1',$newfilename);

										$statement->execute();
										// if ($statement->execute())
										// {
										//   echo "Success";
										// }
										// else
										// {
										// 	echo "Couldn't Enter";
										//   // failure
										// }
										}
										//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
										//$json=json_encode($results);
										//return $json;
										//echo $json;
										$db=null;

									}





?>
