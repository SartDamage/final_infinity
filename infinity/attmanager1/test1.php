<?php
include "zklibrary.php";
$zk = new ZKLibrary('169.254.252.181', 4370);
$zk->connect();
//$zk->disableDevice();
//$zk->clearAttendance();
$users = $zk->getUser();
//$zk->setUser(8, '100', 'sqwer', '', 0);
$attendance=$zk->getAttendance();
//echo json_encode($attendance);

?>

	
<?php
$no = 0;

foreach($attendance as $key=>$user)
{
  echo $no++;
?>


<?php
}
?>


<?php

$zk->enableDevice();
$zk->disconnect();

?>
