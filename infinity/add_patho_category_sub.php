<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$AdminID=$form['ctl00_AdminID'];
	$main_test=$form['main_test'];
	$category_name=$form['ctl00_subtest_name'];
	$category_charges=$form['ctl00_subtest_price'];
$db = getDB();
$statement=$db->prepare("INSERT INTO `pathologysubcategorymaster`(`PathologySubCategoryName`, PathologyCategoryID,PathologyTestCharges,`EnteredBy`)  SELECT * FROM (SELECT :category_name,:main_test,:category_charges,:AdminID) AS tmp WHERE NOT EXISTS (SELECT `PathologySubCategoryName` FROM pathologysubcategorymaster WHERE (`PathologySubCategoryName` = :category_name1 AND PathologyCategoryID=:main_test1)) LIMIT 1");
$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':main_test', $main_test, PDO::PARAM_INT);
$statement->bindParam(':main_test1', $main_test, PDO::PARAM_INT);
$statement->bindParam(':category_name', $category_name, PDO::PARAM_INT);
$statement->bindParam(':category_name1', $category_name, PDO::PARAM_INT);
$statement->bindParam(':category_charges', $category_charges, PDO::PARAM_INT);
/* $statement->execute(); */
if ($statement->execute() && ($statement->rowCount()>0))
   {/* Update worked because query affected X amount of rows. */
	echo true;
	}
else
    {
		echo false;
		$error = $statement->errorInfo();
}
//$results=$statement->fetch(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
//return true;
$db=null;
?>