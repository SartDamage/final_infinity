<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
		try{

			$db = getDB();
			$data_revenue;
			for($i=30;$i>=0;$i--){
				$stmt = $db->prepare("SELECT
				(SELECT IFNULL((SUM(amount)),0) FROM ipd_bill WHERE DATE(`WhenModified`) = CURRENT_DATE - INTERVAL $i DAY) as ipd_amount,
				(SELECT IFNULL((SUM(paid)),0) FROM ipd_bill WHERE DATE(`WhenModified`) = CURRENT_DATE - INTERVAL $i DAY) as ipd_paid,
				(SELECT IFNULL((SUM(advance)),0) FROM ipd_bill WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as ipd_advance,
				(SELECT IFNULL((SUM(discount)),0) FROM ipd_bill WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as ipd_discount,
				(SELECT IFNULL(((SUM(amount))-(SUM(discount))-(SUM(paid))-(SUM(advance))),0) FROM ipd_bill WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as ipd_balance,

				(SELECT IFNULL((SUM(TotalAmount)),0)  FROM opd_reciepts WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as opd_amount,
				(SELECT IFNULL((SUM(paid)),0)  FROM opd_reciepts WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as opd_paid,
				(SELECT IFNULL((SUM(advance)),0)  FROM opd_reciepts WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as opd_advance,
				(SELECT IFNULL((SUM(discount)),0)  FROM opd_reciepts WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as opd_discount,
				(SELECT IFNULL(((SUM(TotalAmount))-(SUM(paid))-(SUM(advance))),0)  FROM opd_reciepts WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as opd_balance,

				(SELECT IFNULL((SUM(TotalAmount)),0)  FROM pathology_reciepts WHERE DATE(`WhenModified`) = CURRENT_DATE - INTERVAL $i DAY) as patho_amount,
				(SELECT IFNULL((SUM(paid)),0)  FROM pathology_reciepts WHERE DATE(`WhenModified`) = CURRENT_DATE - INTERVAL $i DAY) as patho_paid,
				(SELECT IFNULL((SUM(advance)),0)  FROM pathology_reciepts WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as patho_advance,
				(SELECT IFNULL((SUM(discount)),0)  FROM pathology_reciepts WHERE DATE(`WhenModified`) = CURRENT_DATE - INTERVAL $i DAY) as patho_discount,
				(SELECT IFNULL(((SUM(TotalAmount))-(SUM(paid))-(SUM(advance))-(SUM(discount))),0)  FROM pathology_reciepts WHERE DATE(`WhenEntered`) = CURRENT_DATE - INTERVAL $i DAY) as patho_balance,
				(SELECT IFNULL((SUM(amount)),0)  FROM expense WHERE DATE(`date`) = CURRENT_DATE - INTERVAL $i DAY) as daily_expense,
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
					$paid_ipd=$row['ipd_paid'];
					$paid_opd=(int)$row['opd_paid']+(int)$row['opd_advance'];
					$paid_patho=$row['patho_paid'];

					$amount_patho=$row['patho_amount'];
					$amount_opd=$row['opd_amount'];
					$amount_ipd=$row['ipd_amount'];

					$balance_ipd=$row['ipd_balance'];
					$balance_opd=$row['opd_balance'];
					$balance_patho=$row['patho_balance'];

					$paid = (floatval($row['ipd_paid'])+floatval($paid_opd)+
                                                floatval($row['patho_paid'])+floatval($row['patho_advance'])+floatval($row['opd_advance'])+floatval($row['ipd_advance']));
					$amount = (floatval($row['ipd_amount'])+floatval($row['opd_amount'])+floatval($row['patho_amount']));
					/* $advance = (floatval($row['SUM(TotalAmount)'])-floatval($row['SUM(advance)'])-floatval($row['SUM(paid)'])); */
					$discount = (floatval($row['ipd_discount'])+floatval($row['opd_discount'])+floatval($row['patho_discount']));
					$balance = (floatval($row['ipd_balance'])+floatval($row['opd_balance'])+floatval($row['patho_balance']));
					$date = $row['date'];
					$daily_expense = $row['daily_expense'];

					$revenue_collection = new \stdClass();
					$revenue_collection->total_paid = "$paid";
					$revenue_collection->total_amount = "$amount";
					$revenue_collection->Total_balance = "$balance";
					$revenue_collection->discount = "$discount";

					$revenue_collection->paid_ipd = $paid_ipd;
					$revenue_collection->paid_opd = $paid_opd;
					$revenue_collection->paid_patho = $paid_patho;
					$revenue_collection->amount_patho = $amount_patho;
					$revenue_collection->amount_opd = $amount_opd;
					$revenue_collection->amount_ipd = $amount_ipd;
					$revenue_collection->balance_patho = $balance_patho;
					$revenue_collection->balance_ipd = $balance_ipd;
					$revenue_collection->balance_opd = $balance_opd;


					$revenue_collection->daily_expense = $daily_expense;

					$revenue_collection->date_exp = $date;
					//$revenue_collection->month = $month;

					$data_revenue[]= $revenue_collection;

				}
			}

			$myJSON = json_encode($data_revenue);
			echo $myJSON;	//echo $single_collection;
		}catch(PDOException $e) {echo $e;}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$db=null;
?>
