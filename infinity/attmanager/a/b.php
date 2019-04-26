<?php
	include 'am05zk.php';

$ip = '169.254.252.181';                     //ip of fingerprint scanner

$zk = new am05zk($ip);

if ($zk->connect()){
	//connection successfull
	
	//$version = $zk->get_version();       // get the firmware version
	$users = $zk->get_users();   
	$no = 0;
foreach($users as $key=>$user)
{
	$no++;

}
echo  print_r ($users);
$uid="15";
$userid="ST0099";
$name="doe";
$pwd="";
$role="0";
	$zk->set_user($uid, $userid, $name, $pwd, $role);
	// get list of users
	//$attendance = $zk->get_attendance(); // get all attendance records in the device
	//$zk->clear_attendance();             // clear all the attendance record in the device
	
	$zk->disconnect();
} else {
	//connection fail
}
	
	?>