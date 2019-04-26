<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);


		try{
			$db = getDB();
				$data_all;
				for($i=30;$i>=0;$i--){
				$stmt = $db->prepare("SELECT
				(SELECT count(*) FROM patientot WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as ot_active_count,
				(SELECT count(*) FROM add_mtp_details WHERE DATE(`When_entered`) = CURRENT_DATE - INTERVAL $i DAY ) as mtp_count,
				(SELECT count(*) FROM add_vt_details where DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as vt_count,
				(SELECT count(*) FROM add_tl_details where DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as tl_count,
				(SELECT count(*) FROM add_delivery_details where DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as deliver_count,
				(SELECT (CURRENT_DATE - INTERVAL $i DAY)) AS date;");
				//$stmt->bindParam(':rows',$no_of_entries_displayed_admin_dashboard_patient_count, PDO::PARAM_INT);
				$stmt->execute();
				$count=$stmt->rowCount();
				$data=$stmt->fetchALL();

					foreach($data as $row) {

						$ot_active_count=$row["ot_active_count"];
						$mtp_count=$row["mtp_count"];
						$vt_count=$row["vt_count"];
						$tl_count=$row["tl_count"];
						$deliver_count=$row["deliver_count"];
						$date=$row["date"];

						$patient_count_all = new \stdClass();
						$patient_count_all->ot_active_count = "$ot_active_count";
						$patient_count_all->mtp_count = "$mtp_count";
						$patient_count_all->vt_count = "$vt_count";
						$patient_count_all->tl_count = "$tl_count";
						$patient_count_all->deliver_count = "$deliver_count";
						$patient_count_all->date = "$date";

						$data_all[]= $patient_count_all;
						//echo $data_all;
					}
				}

				$myJSON = json_encode($data_all);
				echo $myJSON;
				/*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*/

		}catch(PDOException $e) {}
$db = null;

//return $json;
$db=null;
?>
