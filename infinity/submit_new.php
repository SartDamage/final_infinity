<?php
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $pass= hash('sha256', $pass);
  $db = getDB();
	$statement=$db->prepare("update staff_ledger set password='$pass' where email='$email'");
	$statement->bindParam(':email', $email, PDO::PARAM_STR );
	$statement->bindParam(':pass', $pass, PDO::PARAM_STR );
	$statement->execute();
	$result=$statement->fetchAll(PDO::FETCH_ASSOC );
	$count = $statement->rowCount();
}
?>