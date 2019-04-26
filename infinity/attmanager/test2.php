<?php
include "zklibrary.php";
$zk = new ZKLibrary('192.168.1.201', 4370);
$zk->connect();
//$zk->disableDevice();
//$zk->clearAttendance();
$users = $zk->getUser();
//$cmd=LEVEL_USER;
//$zk->setUser(3, '100', 'sqwer', '', 14);
$attendance=$zk->getAttendance();


?>

	
<?php
$no = 0;
echo "@";
$updatekey="";
$i_array = explode(',',$argv[1]);
 foreach($i_array as $key1=>$value1)
  {
  $updatekey=$value1;
	  }
	  
foreach($attendance as $key=>$user)
{
  $no++;
 
  if($key>$updatekey)
	  
  {
	  
	 //echo json_encode($user);
	 echo $key;
	 echo "!";
	 echo $user[0];
	 echo "!";
	 echo $user[1];
	  echo "!";
	 echo $user[2];
	  echo "!";
	 echo $user[3];
	 echo ",";
	 
	 //print_r($user);
	
	 
	  
	  
	  }
}
 //echo $key;
echo "p";
//echo $no;
?>


 

<?php

?>


<?php

$zk->enableDevice();
$zk->disconnect();

?>
