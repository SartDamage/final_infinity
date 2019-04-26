<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
		try{	
			
			$db = getDB();
			$stmt = $db->prepare("SELECT * FROM `revenue_details_eternity` ORDER BY date desc limit 30");
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
				$paid_opd=$row['opd_paid'];
				$paid_patho=$row['patho_paid'];
				
				$amount_patho=$row['patho_amount'];
				$amount_opd=$row['opd_amount'];
				$amount_ipd=$row['ipd_amount'];
				
				$balance_ipd=$row['ipd_balance'];
				$balance_opd=$row['opd_balance'];
				$balance_patho=$row['patho_balance'];
				
				$paid = (floatval($row['ipd_paid'])+floatval($row['opd_paid'])+floatval($row['patho_paid']));
				$amount = (floatval($row['ipd_amount'])+floatval($row['opd_amount'])+floatval($row['patho_amount']));
				/* $advance = (floatval($row['SUM(TotalAmount)'])-floatval($row['SUM(advance)'])-floatval($row['SUM(paid)'])); */
				$discount = (floatval($row['ipd_discount'])+floatval($row['opd_discount'])+floatval($row['patho_discount']));
				$balance = (floatval($row['ipd_balance'])+floatval($row['opd_balance'])+floatval($row['patho_balance']));
				$date = $row['date'];			

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
			                     
			$revenue_collection->date_exp = $date;		
			//$revenue_collection->month = $month;
			
			$data_patho[]= $revenue_collection;
				
				}


			$myJSON = json_encode($data_patho);
			echo $myJSON;	//echo $single_collection;
		}catch(PDOException $e) {echo $e;}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
$db=null;
?>