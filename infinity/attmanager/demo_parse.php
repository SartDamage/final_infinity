<?php
	include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
	include $_SERVER['DOCUMENT_ROOT']."/session.php";
	include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";

	
 	$db = getDB();
	$statement=$db->prepare("SELECT * from attendance_manager order by att_time ASC limit 500");
	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//print_r($results);
	$main_attendence_array = array();
	$super_main_attendence_id_array = array();/*all user id in att record */
	$main_attendence_id_array = array();/*all user id in att record */
	$att_records	= sizeof($results);
	for($i=1;$i<$att_records;$i++){
			$user_id_main=$results[$i]['user_id'];//current user in loop
		
			if (in_array($user_id_main, $main_attendence_id_array)){
				
				//no content
				
			}else{
				array_push($main_attendence_id_array,$user_id_main);
			}
		}
/* 	echo "<br>--------------------------------------------------------<br>";
	echo "<br>--------------------------------------------------------<br>";
	echo json_encode($main_attendence_id_array);
	echo "<br>----------------------------<br>----------------------------<br>";
	echo "<br>----------------------------<br>----------------------------<br>"; */
	$att_date=array();
	foreach($main_attendence_id_array as $row){
			for($i=1;$i<$att_records;$i++)
			{
				if($results[$i]['user_id']===$row){
					$date_user_dependent = substr($results[$i]["att_time"],0,10);
					if (in_array($date_user_dependent, $att_date)){
					}else{
						array_push($att_date,$date_user_dependent);
					}
				}
			}
		}
	/* echo "<br>--------------------------------------------------------<br>";
	echo "<br>--------------------------------------------------------<br>";
	echo json_encode($att_date);
	echo "<br>----------------------------<br>----------------------------<br>";
	echo "<br>----------------------------<br>----------------------------<br>"; */
	
	foreach($main_attendence_id_array as $user_id_from_main){
			foreach($att_date as $date_in_list){
					
					$all_time_for_date=array();
					for($i=1;$i<$att_records;$i++){
							$date_user_dependent =  substr($results[$i]["att_time"],0,10);
							$time_user_dependent = implode("-",array_reverse(explode("-", substr($results[$i]["att_time"],11,18))));
							$user_id = $results[$i]['user_id'];
							if($date_user_dependent==$date_in_list && $user_id_from_main==$user_id ){
									if($results[$i]["att_time"]<>"undefined"){
										$time_user_dependent = implode("-",array_reverse(explode("-", substr($results[$i]["att_time"],11,18))));
										array_push($all_time_for_date,$time_user_dependent);
										
									}else{
										array_push($all_time_for_date,"0");
									}
								}
						}
						

					
					
					
					$first = reset($all_time_for_date);
					$last = end($all_time_for_date);
					$date_one_user = new \stdClass();
					$date_one_user->user_name = $user_id_from_main;
					$date_one_user-> date_att = $date_in_list;
					if ($first<>""){
						$date_one_user-> in_time_att = $first;
					}else{
						$date_one_user-> in_time_att = "0";
					}
					
					if($first==$last){
						$date_one_user-> out_time_att = "0";
					}else{
						$date_one_user-> out_time_att = $last;
					}
					array_push($super_main_attendence_id_array,$date_one_user);
					//echo "<br>#############################<br>#############################<br>";
					//echo json_encode($super_main_attendence_id_array)."@@@".$date_in_list."@@@".$user_id_from_main."<br>";
					//echo "<br>#############################<br>#############################<br>";
					
				}
		}
		//echo "<br>@@@@@@@@@@@@@@@@<br>@@@@@@@@@@@@@@@@<br>";
		echo json_encode($super_main_attendence_id_array);
		//echo "<br>@@@@@@@@@@@@@@@@<br>@@@@@@@@@@@@@@@@<br>";

	?>