<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$main_test=$form['main_test'];
	$category_name=$form['ctl00_subtest_name'];
	$category_charges=$form['ctl00_subtest_price'];
	$cat_ID=$form['ctl00_cat_ID'];
$db = getDB();
$statement=$db->prepare("UPDATE `pathologysubcategorymaster` SET `PathologySubCategoryName`=:category_name,`PathologyCategoryID`=:main_test,`PathologyTestCharges`=:category_charges,`LastModified`=NOW(),`ModifiedBy`=:AdminID WHERE `PathologySubCategoryID`=:cat_id");
$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':main_test', $main_test, PDO::PARAM_INT);
$statement->bindParam(':category_name', $category_name, PDO::PARAM_STR);
$statement->bindParam(':cat_id', $cat_ID, PDO::PARAM_INT);
$statement->bindParam(':category_charges', $category_charges, PDO::PARAM_INT);
$statement->execute();
if ($statement->rowCount() > 0)
   {/* Update worked because query affected X amount of rows. */
	echo 1;
	}
else
    {
		echo 0;
		$error = $statement->errorInfo();
}
//$results=$statement->fetch(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
//return true;
$db=null;
?>