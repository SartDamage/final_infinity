<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);

 if (isset($_GET['id'])) {
  $start = $_GET['id'];
  $db = getDB();
$statement=$db->prepare("SELECT bn.ID FROM patientipd AS pipd 
	LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = pipd.RegID 
    JOIN bed_number as bn on pipd.bedno=bn.ID 
    where  NULLIF(`discharge_date_time`, ' ') IS NULL AND prm.RegistrationID=:start order by pipd.whenentered DESC");
 $statement->bindParam(':start', $start, PDO::PARAM_STR);
/*$statement->bindParam(':rows',$limit_entries_per_page, PDO::PARAM_INT); */
$statement->execute();
$count = $statement->rowCount();
}

//return $json;
echo $count;
$db=null;
?>