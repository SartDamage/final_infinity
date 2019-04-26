<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=0;} */
$db = getDB();
$statement=$db->prepare("SELECT bn.ID,pipd.`patientID`,pipd.`RegID`,pipd.`admit_date_time`,pipd.`discharge_date_time`,pipd.`tests_Assigned`,pipd.`doctor_assigned`,pipd.`amount_deposit`,pipd.`charges`,pipd.`symptoms`,pipd.`precription`,pipd.`diagnosis`,pipd.`isMLC`,pipd.`MLC_type`,pipd.`MLC_place`,pipd.`MLC_station`,pipd.`bedno`,pipd.`wardno`,pipd.`bed_type`,pipd.`ReferredBy`,pipd.`detailcharges`,pipd.`WhenEntered`,pipd.`EnteredBy`,pipd.`WhenModified`,pipd.`ModifiedBy`,prm.`RegistrationID`,prm.`FirstName`,prm.`LastName`,prm.`Age`,prm.`Gender`,prm.`Mobile`,prm.`avatar`,prm.`Email`,prm.`Address`,prm.`IsActive` FROM patientipd AS pipd LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = pipd.RegID JOIN bed_number as bn on pipd.bedno=bn.ID where 1 order by pipd.whenentered DESC");
/* $statement->bindParam(':start', $start, PDO::PARAM_INT);
$statement->bindParam(':rows',$limit_entries_per_page, PDO::PARAM_INT); */
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>