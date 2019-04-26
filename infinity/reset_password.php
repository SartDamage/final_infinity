<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';

if(isset($_GET['key']) && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $pass = hash('sha256', $pass);
 $db = getDB();
	$statement=$db->prepare("select email,password from staff_ledger where email=:email and password=:pass");
	$statement->bindParam(':email', $email, PDO::PARAM_STR );
	$statement->bindParam(':pass', $pass, PDO::PARAM_STR );
	$statement->execute();
	$result=$statement->fetchAll(PDO::FETCH_ASSOC );
	$count = $statement->rowCount();
  if($count==1)
  {
    ?>
    <form method="post" action="submit_new.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form>
    <?php
  }
}
?>