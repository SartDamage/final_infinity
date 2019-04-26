<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
//include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
//$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$email = $form['usernameEmail'];
	$password = $form['password'];
	$password = hash('sha256', $password);
$db = getDB();
$statement=$db->prepare("UPDATE `staff_ledger` SET `password`=:hash_password,`WhenModified`=NOW()  WHERE `email`=:email");
	/* INSERT INTO `ward_details`(`ward_name`, `bed_type`,`bed_available`, `EnteredBy`)  SELECT * FROM (SELECT :category_name,:bed_available,:bed_type, :AdminID) AS tmp WHERE NOT EXISTS (
    SELECT `ward_name` FROM ward_details WHERE `ward_name` = :category_name) LIMIT 1;"
	 */
$statement->bindParam(':hash_password', $password, PDO::PARAM_INT);
$statement->bindParam(':email', $email, PDO::PARAM_INT);

$statement->execute();
$count = $statement->rowCount();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
echo $count;
$db=null;
?>