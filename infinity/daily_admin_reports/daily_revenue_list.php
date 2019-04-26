<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
		try{	
			
			$db = getDB();
			$stmt = $db->prepare("SELECT * FROM daily_collection ORDER BY date desc limit 30");
			/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetchALL();
			
			$collection = 0;
			$discount = 0;
			$pending = 0;
			$total_balance = 0;
			foreach($data as $row) {
				$paid = (floatval($row['ipd_paid'])+floatval($row['opd_paid'])+floatval($row['patho_paid']));
				$advance = (floatval($row['ipd_advance'])+floatval($row['opd_advance'])+floatval($row['patho_advance']));
				/* $advance = (floatval($row['SUM(TotalAmount)'])-floatval($row['SUM(advance)'])-floatval($row['SUM(paid)'])); */
				$discount = (floatval($row['ipd_discount'])+floatval($row['opd_discount'])+floatval($row['patho_discount']));
				$daily_expense = $row['daily_expense'];			
				$date = $row['date'];			

			$revenue_collection = new \stdClass();
			$revenue_collection->total_paid = "$paid";
			$revenue_collection->Total_balance = "$advance";
			$revenue_collection->discount = "$discount";
			$revenue_collection->expense = "$daily_expense";
			$revenue_collection->date_exp = "$date";		
			//$revenue_collection->month = $month;
			
			$data_patho[]= $revenue_collection;
				
				}


			$myJSON = json_encode($data_patho);
			echo $myJSON;	//echo $single_collection;
		}catch(PDOException $e) {echo $e;}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
$db=null;
?>