<?php
	include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
	include $_SERVER['DOCUMENT_ROOT']."/session.php";
	include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";

 	$db = getDB();
	$statement=$db->prepare("SELECT * from attendance_manager order by att_time ASC");
	$statement->execute();
	$att_list=$statement->fetchAll(PDO::FETCH_ASSOC);

	$no_att_records= sizeof($att_list);
	$count="";
	$first=1;
	$test=0;
	$master_user_list=array();
	$user_indi=array();
	for($i=1;$i<$no_att_records;$i++)
	{
		$user_id_main=$att_list[$i]['user_id'];//current user in loop
		
		if (in_array($user_id_main, $master_user_list)){
			
			//no content
			
		}else{
			array_push($master_user_list,$user_id_main);
			$no_of_users_in_master_list= sizeof($master_user_list);
			
			$att_date=array(); //all dates of current user in loop
			for($j=1;$j<$no_att_records;$j++)
			{
		        if($user_id_main ==$att_list[$j]['user_id']){
				
					$date_sep=$att_list[$j]['att_time'];
					
					//$datesep = substr($att_list[$j]["att_time"],0,10);
					//$datesep = implode("-",array_reverse($datesep);
					$datesep = substr($att_list[$j]["att_time"],0,10);
					array_push($att_date,$datesep); 
				}
			}
			
			
			(int)$timeperdate= sizeof($att_date);
			(int)$date_seg=0;
			$timearr=array();
			
			
			for($ki=1;$ki<$no_att_records;$ki++)
			{
				$date_inloopt_raw=$att_list[$ki]['att_time'];
				$date_inloopt=substr($date_inloopt_raw,0,10);
				$timeinloopt=substr($date_inloopt_raw,11,19);
				if($user_id_main==$att_list[$ki]['user_id'] && $date_inloopt==$att_date[$date_seg]){
					$date_one_user = new \stdClass();
					$userfinal="";
					$intimefinal="";
					$outtimefinal="";
					if (in_array($date_inloopt, $timearr)){
						$temp_date=(int)$date_seg+1;
						if(!empty($att_date[$date_seg+1])){
							if($date_inloopt != ($att_date[$date_seg+1])){
								$outtimefinal=$timeinloopt;
								$test++;
							}
						}else{
							$outtimefinal=$timeinloopt;
						}
					}else{
						array_push($timearr,$date_inloopt);
						$userfinal=$user_id_main;
						//echo "<br>";
						$intimefinal=$timeinloopt;
					}
					 if($userfinal !="" && $intimefinal !=""){
						$date_one_user->user_name = $userfinal;
						$date_one_user-> date_att = $date_inloopt;
						$date_one_user-> in_time_att = $intimefinal;
/* 						echo $userfinal." ";
						echo $date_inloopt." ";
						echo $intimefinal." "; */
					 }
					 /* echo $outtimefinal." "; */
					 $date_one_user-> out_time_att = $outtimefinal;
					$date_seg++;
					
				}
				if($intimefinal<>""){
					array_push($user_indi,$date_one_user); 
					}
			}
		}
	}
	echo json_encode($user_indi);
	function has_next($array) {
    if (is_array($array)) {
        if (next($array) === false) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
	}	
?>	