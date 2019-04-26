<?php
	include 'am05zk.php';

$ip = '192.168.1.201';                     //ip of fingerprint scanner

$zk = new am05zk($ip);

if ($zk->connect()){
	//connection successfull
	
	//$version = $zk->get_version();       // get the firmware version
	$users = $zk->get_users();   
	$no = 0;
 $arguments =$argv[1];
  $singleuser=explode("/",$arguments);
  print_r($singleuser);
  foreach ($singleuser as $userspec) {
  		$unitdata=explode(",",$userspec);
  		echo $unitdata[0];
  		echo "/";
  		echo $unitdata[1];

  
//  $singleresults=explode(",", string);

//echo  print_r ($users);
$uid=$unitdata[0];
$userid=$unitdata[1];
$name=$unitdata[2];
$pwd="12345";
$role="14";
	$zk->set_user($uid, $userid, $name, $pwd, $role);
}
	// get list of users
	//$attendance = $zk->get_attendance(); // get all attendance records in the device
	//$zk->clear_attendance();             // clear all the attendance record in the device
	
	$zk->disconnect();
} else {
	//connection fail
}
	
	?>