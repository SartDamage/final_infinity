<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT pr.PatientId,pr.RegistrationID,pr.paid,pr.TotalAmount,pr.discount,pr.advance  FROM `pathology_reciepts` as pr where YEAR(pr.WhenEntered) = YEAR(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW())");
			/*   AND DAY(pr.WhenEntered) = DAY(NOW()) */
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetchALL();
			$collection = 0;
			$discount = 0;
			$pending = 0;
			$total_balance = 0;
			foreach($data as $row) {
				
				//echo $row;
				//echo "individual :- ".$row['paid']."\n";
				//echo " ::::::: \n::::::::";
				$collection += (floatval($row['paid'])+floatval($row['advance']));
				//$total_balance = (floatval($row['TotalAmount'])-floatval($row['discount'])-floatval($row['advance'])-floatval($row['paid']));
				//$total_balance = 
				$total_balance += (floatval($row['TotalAmount'])-floatval($row['advance'])-floatval($row['paid']));
				$discount += (floatval($row['discount'])); 
				//echo "-----------\n------------";
				}
			$revenue_collection = new \stdClass();
			$revenue_collection->total_paid_pathology = floatval($collection);
			$revenue_collection->Total_balance_pathology = floatval($total_balance);
			$revenue_collection->discount_pathology = floatval($discount);

			$myJSON = json_encode($revenue_collection);
			
			
			//echo $myJSON;	//echo $single_collection;
			
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$statement=$db->prepare("SELECT pr.PatientId,pr.RegistrationID,pr.paid,pr.TotalAmount,pr.discount,pr.advance  FROM `opd_reciepts` as pr where YEAR(pr.WhenEntered) = YEAR(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW())");
			
			$statement->execute();
			$count1=$statement->rowCount();
			$data1=$statement->fetchALL();
			$collection1 = 0;
			$discount1 = 0;
			$pending1 = 0;
			$total_balance1 = 0;
			foreach($data1 as $row) {
				
				//echo $row;
				//echo "individual :- ".$row['paid']."\n";
				//echo " ::::::: \n::::::::";
				$collection1 += (floatval($row['paid'])+floatval($row['advance']));
				$total_balance1 = (floatval($row['TotalAmount'])-floatval($row['discount'])-floatval($row['advance'])-floatval($row['paid']));
				$discount1 += (floatval($row['discount'])); 
				//echo "-----------\n------------";
				}
			$revenue_collection_opd = new \stdClass();
			$revenue_collection_opd->total_paid_opd = floatval($collection1);
			$revenue_collection_opd->Total_balance_opd = floatval($total_balance1);
			$revenue_collection_opd->discount_opd = floatval($discount1);

			$myJSON_opd = json_encode($revenue_collection_opd);			
			
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
			$statement=$db->prepare("SELECT pr.instance_id,pr.Registered_ID,pr.paid,pr.amount,pr.discount,pr.advance  FROM `ipd_bill` as pr where (YEAR(pr.WhenEntered) = YEAR(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW())) ");
			
			$statement->execute();
			$count2=$statement->rowCount();
			$data1=$statement->fetchALL();
			$collection1 = 0;
			$discount1 = 0;
			$pending1 = 0;
			$total_balance1 = 0;
			foreach($data1 as $row) {
				
				//echo $row;
				//echo "individual :- ".$row['paid']."\n";
				//echo " ::::::: \n::::::::";
				$collection1 += (floatval($row['paid'])+floatval($row['advance']));
				$total_balance1 = (floatval($row['amount'])-floatval($row['discount'])-floatval($row['advance'])-floatval($row['paid']));
				$discount1 += (floatval($row['discount'])); 
				//echo "-----------\n------------";
				}
			$revenue_collection_ipd = new \stdClass();
			$revenue_collection_ipd->total_paid_ipd = floatval($collection1);
			$revenue_collection_ipd->Total_balance_ipd = floatval($total_balance1);
			$revenue_collection_ipd->discount_ipd = floatval($discount1);

			$myJSON_ipd = json_encode($revenue_collection_ipd);			
			
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
			$statement=$db->prepare("SELECT pr.instance_id,pr.Registered_ID,pr.paid,pr.amount,pr.discount,pr.advance  FROM `pharmacy_bill` as pr where (YEAR(pr.WhenEntered) = YEAR(NOW()) AND MONTH(pr.WhenEntered) = MONTH(NOW()));");
			
			$statement->execute();
			$count3=$statement->rowCount();
			$data1=$statement->fetchALL();
			$collection1 = 0;
			$discount1 = 0;
			$pending1 = 0;
			$total_balance1 = 0;
			foreach($data1 as $row) {
				
				//echo $row;
				//echo "individual :- ".$row['paid']."\n";
				//echo " ::::::: \n::::::::";
				$collection1 += (floatval($row['paid'])+floatval($row['advance']));
				$total_balance1 = (floatval($row['amount'])-floatval($row['discount'])-floatval($row['advance'])-floatval($row['paid']));
				$discount1 += (floatval($row['discount'])); 
				//echo "-----------\n------------";
				}
			$revenue_collection_pharma = new \stdClass();
			$revenue_collection_pharma->total_paid_pharma = floatval($collection1);
			$revenue_collection_pharma->Total_balance_pharma = floatval($total_balance1);
			$revenue_collection_pharma->discount_pharma = floatval($discount1);

			$myJSON_ipd = json_encode($revenue_collection_pharma);			
			
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        $max_count = max($count,$count1,$count2,$count3);
			if($max_count){
						$stuff =array(
						$revenue_collection,$revenue_collection_opd,$revenue_collection_ipd,$revenue_collection_pharma
						);
				$json=json_encode($stuff);
				echo $json;
			}else {
				$json=false;
			}
		}catch(PDOException $e) {echo $e;}

//print $json;
//return $json;
$db=null;
?>