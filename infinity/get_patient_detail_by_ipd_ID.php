<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
function array_push_assoc($array, $key, $value)
{
	$array->$key=$value;
	return $array;
}

$form=$_GET;
if (isset($form['ID'])){
$ID=$form['ID'];
if(!isset($form['IDnormal'])){
	$ID=base64_decode($ID);
}else{$ID=$form['IDnormal'];}
}else{$ID="";echo "No input ID";}
if(isset($form['isfrom'])){
	$query="SELECT
	bt.`bed_type`,bn.`bed_name`,wd.`ward_name`,CONCAT(sl.`firstname`,' ',sl.`lastname`) dr_name,
	popd.`doctor_assigned`,popd.`patientID`,popd.`RegID`,popd.`discharge_date_time`,popd.`admit_date_time`,
	popd.`symptoms`,popd.`precription`,popd.`diagnosis`,popd.`isMLC`,popd.`MLC_type`,popd.`MLC_place`,popd.`MLC_station`,
	popd.`bedno`,popd.`wardno`,popd.`ReferredBy`, popd.`symptoms`,popd.`precription`,popd.`diagnosis`,popd.`past_history`,
	popd.`immunization`,popd.`smok`,popd.`alco`,popd.`chew`,popd.`veg`,popd.`non_veg`,popd.`allergy`,popd.`discharge_note`,
	prm.`FirstName`,prm.`LastName`,prm.`Age`,prm.`Gender`,prm.`Mobile`
	FROM `patientipd` AS popd
INNER JOIN patientdetails AS pd ON popd.`RegID`=pd.`RegID`
INNER JOIN patientregistrationmaster AS prm ON pd.`RegID`=prm.`RegistrationID`
INNER JOIN bed_type as bt on bt.`ID`=popd.`bed_type`
INNER JOIN ward_details wd on wd.`ID`=popd.`wardno`
INNER JOIN bed_number bn on bn.`ID`=popd.`bedno`
INNER JOIN staff_ledger sl on popd.`doctor_assigned`= sl.`ID`
WHERE popd.`patientID`=:ID";
}
else
{
	$query="SELECT
	bt.`bed_type`,bn.`bed_name`,wd.`ward_name`,CONCAT(sl.`firstname`,' ',sl.`lastname`) dr_name,
	popd.`doctor_assigned`,popd.`patientID`,popd.`RegID`,popd.`discharge_date_time`,popd.`admit_date_time`,
	popd.`symptoms`,popd.`precription`,popd.`diagnosis`,popd.`isMLC`,popd.`MLC_type`,popd.`MLC_place`,popd.`MLC_station`,
	popd.`bedno`,popd.`wardno`,popd.`ReferredBy`, popd.`symptoms`,popd.`precription`,popd.`diagnosis`,popd.`past_history`,
	popd.`immunization`,popd.`smok`,popd.`alco`,popd.`chew`,popd.`veg`,popd.`non_veg`,popd.`allergy`,popd.`discharge_note`,
	prm.`FirstName`,prm.`LastName`,prm.`Age`,prm.`Gender`,prm.`Mobile`
	FROM `patientipd` AS popd
INNER JOIN patientdetails AS pd ON popd.`RegID`=pd.`RegID`
INNER JOIN patientregistrationmaster AS prm ON pd.`RegID`=prm.`RegistrationID`
INNER JOIN bed_type as bt on bt.`ID`=popd.`bed_type`
INNER JOIN ward_details wd on wd.`ID`=popd.`wardno`
INNER JOIN bed_number bn on bn.`ID`=popd.`bedno`
INNER JOIN staff_ledger sl on popd.`doctor_assigned`= sl.`ID`
WHERE popd.`patientID`=:ID";
}
		try{
			$db = getDB();/* popd.bed_type, */
			$stmt = $db->prepare($query);
			$stmt->bindParam("ID", $ID,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;
			if($count){
				if(isset($form['isfrom'])){
					$db = getDB();/* popd.bed_type, */
					$stmt = $db->prepare("SELECT pot.*,sl.`surgery` surgery_name FROM `patientot` pot
						INNER JOIN `surgery_list` AS sl ON pot.`surgery`=sl.`ID`
						 WHERE pot.`patientID`=:ID ORDER BY pot.`ID`");
					$stmt->bindParam("ID", $ID,PDO::PARAM_STR) ;
					$stmt->execute();
					$count=$stmt->rowCount();
					$ot_list=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$db = null;
					//$ot_list=json_encode($ot_list);
					$ind_ot_list=array();
					foreach($ot_list as $row_ot)
					{
						$ind_ot_list[]=array($row_ot);
					}
					$name = "surgery";
					array_push_assoc($data,$name,$ot_list);
				}
				$json=json_encode($data);
			}else {
				$json=false;
			}
			echo $json;
		}catch(PDOException $e) {echo $e;}

//return $json;
$db=null;
?>
