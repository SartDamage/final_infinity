<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
		try{

			$db = getDB();
			$data_revenue1;
			for($i=30;$i>=0;$i--){
				$stmt = $db->prepare("SELECT
				(SELECT IFNULL((SUM(i.amount)),0) FROM ipd_bill i LEFT JOIN patientot o ON o.patientID=i.instance_id WHERE DATE(i.WhenModified) = CURRENT_DATE - INTERVAL $i DAY) as ot_ipd_amount,
				(SELECT IFNULL((SUM(i.paid)),0) FROM ipd_bill i LEFT JOIN patientot o ON o.patientID=i.instance_id WHERE DATE(i.WhenModified) = CURRENT_DATE - INTERVAL $i DAY) as ot_ipd_paid,
				(SELECT IFNULL((SUM(i.advance)),0) FROM ipd_bill i LEFT JOIN patientot o ON o.patientID=i.instance_id WHERE DATE(i.WhenEntered) = CURRENT_DATE - INTERVAL $i DAY) as ot_ipd_advance,
				(SELECT IFNULL((SUM(i.discount)),0) FROM ipd_bill i LEFT JOIN patientot o ON o.patientID=i.instance_id WHERE DATE(i.WhenEntered) = CURRENT_DATE - INTERVAL $i DAY) as ot_ipd_discount,
				(SELECT IFNULL(((SUM(i.amount))-(SUM(i.discount))-(SUM(i.paid))-(SUM(i.advance))),0) FROM ipd_bill i LEFT JOIN patientot o ON o.patientID=i.instance_id WHERE DATE(i.WhenEntered) = CURRENT_DATE - INTERVAL $i DAY) as ot_ipd_balance,

				(SELECT IFNULL((SUM(o.TotalAmount)),0)  FROM opd_reciepts o LEFT JOIN patientot p ON p.patientID=o.PatientId WHERE DATE(o.WhenEntered) = CURRENT_DATE - INTERVAL $i DAY) as ot_opd_amount,
				(SELECT IFNULL((SUM(o.paid)),0)  FROM opd_reciepts o LEFT JOIN patientot p ON p.patientID=o.PatientId WHERE DATE(o.WhenEntered) = CURRENT_DATE - INTERVAL $i DAY) as ot_opd_paid,
				(SELECT IFNULL((SUM(o.advance)),0)  FROM opd_reciepts o LEFT JOIN patientot p ON p.patientID=o.PatientId WHERE DATE(o.WhenEntered) = CURRENT_DATE - INTERVAL $i DAY) as ot_opd_advance,
				(SELECT IFNULL((SUM(o.discount)),0)  FROM opd_reciepts o LEFT JOIN patientot p ON p.patientID=o.PatientId WHERE DATE(o.WhenEntered) = CURRENT_DATE - INTERVAL $i DAY) as ot_opd_discount,
				(SELECT IFNULL(((SUM(o.TotalAmount))-(SUM(o.discount))-(SUM(o.paid))-(SUM(o.advance))),0)  FROM opd_reciepts o LEFT JOIN patientot p ON p.patientID=o.PatientId WHERE DATE(o.WhenEntered) = CURRENT_DATE - INTERVAL $i DAY) as ot_opd_balance,
				(CURRENT_DATE - INTERVAL $i DAY) as `date`;");
				/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
				$stmt->execute();
				$count=$stmt->rowCount();
				$data=$stmt->fetchALL();

				$collection = 0;
				$discount = 0;
				$pending = 0;
				$total_balance = 0;
				foreach($data as $row) {
					$ot_paid_ipd=$row['ot_ipd_paid'];
					$ot_paid_opd=(int)$row['ot_opd_paid']+(int)$row['ot_opd_advance'];

					$ot_amount_opd=$row['ot_opd_amount'];
					$ot_amount_ipd=$row['ot_ipd_amount'];

					$ot_balance_ipd=$row['ot_ipd_balance'];
					$ot_balance_opd=$row['ot_opd_balance'];

					$paid = (floatval($row['ot_ipd_paid'])+floatval($ot_paid_opd)+
                                              floatval($row['ot_opd_advance'])+floatval($row['ot_ipd_advance']));
					$amount = (floatval($row['ot_ipd_amount'])+floatval($row['ot_opd_amount']));
					$discount = (floatval($row['ot_ipd_discount'])+floatval($row['ot_opd_discount']));
					$balance = (floatval($row['ot_ipd_balance'])+floatval($row['ot_opd_balance']));
					$date = $row['date'];

					$revenue_collection = new \stdClass();
					$revenue_collection->ot_total_paid = "$paid";
					$revenue_collection->ot_total_amount = "$amount";
					$revenue_collection->ot_Total_balance = "$balance";
					$revenue_collection->ot_discount = "$discount";
					$revenue_collection->date_exp = $date;
					//$revenue_collection->month = $month;

					$data_revenue1[]= $revenue_collection;

				}
			}

			$myJSON = json_encode($data_revenue1);
			echo $myJSON;	//echo $single_collection;
		}catch(PDOException $e) {echo $e;}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$db=null;
?>
