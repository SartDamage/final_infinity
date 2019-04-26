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
				(SELECT count(*) FROM patientipd WHERE DATE(`admit_date_time`) = CURRENT_DATE - INTERVAL $i DAY) as ipd_active_count, 
				(SELECT count(*) FROM patientipd WHERE DATE(`discharge_date_time`) = CURRENT_DATE - INTERVAL $i DAY ) as ipd_discharged, 
				(SELECT count(*) FROM patientopd where DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as count_opd,
				(SELECT count(*) FROM pathopatientregistrationmaster where DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as patho_count,
				(SELECT (CURRENT_DATE - INTERVAL $i DAY)) AS date;");
				//$stmt->bindParam(':rows',$no_of_entries_displayed_admin_dashboard_patient_count, PDO::PARAM_INT);
				$stmt->execute();
				$count=$stmt->rowCount();
				$data=$stmt->fetchALL();

					foreach($data as $row) {
						
						$ipd_active_count=$row["ipd_active_count"];
						$ipd_discharged=$row["ipd_discharged"];
						$count_opd=$row["count_opd"];
						$patho_count=$row["patho_count"];
						$date=$row["date"];
						
						$patient_count_all = new \stdClass();
						$patient_count_all->ipd_active_count = "$ipd_active_count";
						$patient_count_all->ipd_discharged = "$ipd_discharged";
						$patient_count_all->opd_count = "$count_opd";
						$patient_count_all->patho_count = "$patho_count";
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