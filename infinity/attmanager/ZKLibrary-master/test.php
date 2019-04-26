<?php
include "zklibrary.php";
$zk = new ZKLibrary('169.254.252.181', 4370);
$zk->connect();
$zk->disableDevice();
/* $zk->enableDevice(); */
$zk->setUser(15,'999','MasRoy','',0);
$zk->enableDevice();
$users = $zk->getUser();
?>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
<thead>
  <tr>
    <td width="25">No</td>
    <td>UID</td>
    <td>ID</td>
    <td>Name</td>
    <td>Role</td>
    <td>Password</td>
  </tr>
</thead>

<tbody>
<?php
$no = 0;
foreach($users as $key=>$user)
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
  </tr>

<?php
}
?>

</tbody>
</table>
<?php

//$zk->enableDevice();
$zk->disconnect();

?>