<?php
include "zklibrary.php";
$zk = new ZKLibrary('169.254.252.181', 4370);
$zk->connect();
//$zk->disableDevice();
//$zk->clearAttendance();
$users = $zk->getUser();
$zk->setUser(8, '100', 'sqwer', '', 0);
$attendance=$zk->getAttendance();


?>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
<thead>
  <tr>
    <td width="25">No</td>
    <td>no</td>
    <td>Serial Number of user</td>
    <td>User ID</td>
    <td>state</td>
    <td>Time of Attendance</td>
  </tr>
</thead>

<tbody>
	
<?php
$no = 0;

foreach($attendance as $key=>$user)
{
  $no++;
?>


  <tr>
    <td align="right"><?php echo $no;?></td>
    <td><?php echo $key;?></td>
    <td><?php echo $user[0];?></td>
    <td><?php echo $user[1];?></td>
    <td><?php echo $user[2];?></td>
    <td><?php echo $user[3];?></td>
	<?php// print_r ($users); ?> 
  </tr>

<?php
}
?>

</tbody>
</table>
<?php

$zk->enableDevice();
$zk->disconnect();

?>
