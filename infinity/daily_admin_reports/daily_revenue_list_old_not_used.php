<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
		try{
			$parent = array();
			
			
			
			$db = getDB();
			$stmt = $db->prepare("SELECT DAY(WhenEntered),MONTHNAME(WhenEntered),SUM(paid),SUM(TotalAmount),SUM(discount),SUM(advance) 
			FROM pathology_reciepts
			GROUP BY YEAR(WhenEntered), MONTH(WhenEntered),DAY(WhenEntered)");
			/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetchALL();
			$data_patho=array();
			$collection = 0;
			$discount = 0;
			$pending = 0;
			$total_balance = 0;
			foreach($data as $row) {
				
				//echo $row;
				//echo "individual :- ".$row['paid']."\n";
				//echo " ::::::: \n::::::::";
				$collection += (floatval($row['SUM(paid)'])+floatval($row['SUM(advance)']));
				//$total_balance = (floatval($row['TotalAmount'])-floatval($row['discount'])-floatval($row['advance'])-floatval($row['paid']));
				//$total_balance = 
				$total_balance += (floatval($row['SUM(TotalAmount)'])-floatval($row['SUM(advance)'])-floatval($row['SUM(paid)']));
				$discount += (floatval($row['SUM(discount)']));
				$date = $row['DAY(WhenEntered)'];
				$month = $row['MONTHNAME(WhenEntered)'];				

			$revenue_collection = new \stdClass();
			$revenue_collection->total_paid_pathology = floatval($collection);
			$revenue_collection->Total_balance_pathology = floatval($total_balance);
			$revenue_collection->discount_pathology = floatval($discount);
			$revenue_collection->date_opd = $date;		
			$revenue_collection->month_opd = $month;
			
			$data_patho[] = $revenue_collection;
				
				}


			$myJSON = json_encode($revenue_collection);
			//echo $myJSON;	//echo $single_collection;
			
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$statement=$db->prepare("SELECT DAY(WhenEntered),MONTHNAME(WhenEntered),SUM(paid),SUM(TotalAmount),SUM(discount),SUM(advance) 
FROM opd_reciepts 
GROUP BY YEAR(WhenEntered), MONTH(WhenEntered),DAY(WhenEntered)");
			
			$statement->execute();
			$count1=$statement->rowCount();
			$data1=$statement->fetchALL(PDO::FETCH_ASSOC );
			$data_opd =array();

			$collection1 = 0;
			$discount1 = 0;
			$pending1 = 0;
			$total_balance1 = 0;

			foreach($data1 as $row) {
				
				//echo $row;
				//echo "individual :- ".$row['paid']."\n";
				//echo " ::::::: \n::::::::";
				$collection1 = (floatval($row['SUM(paid)'])+floatval($row['SUM(advance)']));
				$total_balance1 = (floatval($row['SUM(TotalAmount)'])-floatval($row['SUM(discount)'])-floatval($row['SUM(advance)'])-floatval($row['SUM(paid)']));
				$discount1 = (floatval($row['SUM(discount)']));
				$date = $row['DAY(WhenEntered)'];
				$month = $row['MONTHNAME(WhenEntered)'];
			$revenue_collection_opd = new \stdClass();
			$revenue_collection_opd->total_paid_opd = floatval($collection1);
			$revenue_collection_opd->Total_balance_opd = floatval($total_balance1);
			$revenue_collection_opd->discount_opd = floatval($discount1);		
			$revenue_collection_opd->date_opd = $date;		
			$revenue_collection_opd->month_opd = $month;		
			$data_opd[] = $revenue_collection_opd;
			}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
			$statemen=$db->prepare("SELECT DAY(WhenEntered),MONTHNAME(WhenEntered),SUM(paid),SUM(amount),SUM(discount),SUM(advance) 
FROM ipd_bill 
GROUP BY YEAR(WhenEntered), MONTH(WhenEntered),DAY(WhenEntered)");
			
			$statemen->execute();
			$count1=$statemen->rowCount();
			$data1=$statemen->fetchALL();
			$data_ipd = array();
			$collection1 = 0;
			$discount1 = 0;
			$pending1 = 0;
			$total_balance1 = 0;
			foreach($data1 as $row) {
				
				//echo $row;
				//echo "individual :- ".$row['paid']."\n";
				//echo " ::::::: \n::::::::";
				$collection1 += (floatval($row['SUM(paid)'])+floatval($row['SUM(advance)']));
				$total_balance1 = (floatval($row['SUM(amount)'])-floatval($row['SUM(discount)'])-floatval($row['SUM(advance)'])-floatval($row['SUM(paid)']));
				$discount1 += (floatval($row['SUM(discount)']));
				$date = $row['DAY(WhenEntered)'];
				$month = $row['MONTHNAME(WhenEntered)'];				
				//echo "-----------\n------------";
				
				$revenue_collection_ipd = new \stdClass();
				$revenue_collection_ipd->total_paid_ipd = floatval($collection1);
				$revenue_collection_ipd->Total_balance_ipd = floatval($total_balance1);
				$revenue_collection_ipd->discount_ipd = floatval($discount1);
				$revenue_collection_ipd->date_opd = $date;		
				$revenue_collection_ipd->month_opd = $month;
				$data_ipd[] = $revenue_collection_ipd;
				}


			$myJSON_ipd = json_encode($revenue_collection_ipd);			
			
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
			if($count){
						$stuff =array(
						$revenue_collection,$revenue_collection_opd,$revenue_collection_ipd
						);
				$json=json_encode($stuff);
				//echo $json;
			}else {
				$json=false;
			}
			
		$parent = array(
					"details_opd"=>$data_opd,
					"details_ipd"=>$data_ipd,
					"details_patho"=>$data_patho,
			);
		echo json_encode($parent);
		}catch(PDOException $e) {echo $e;}

//print $json;
//return $json;
$db=null;
?>