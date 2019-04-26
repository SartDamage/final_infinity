<?php
	include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
	include $_SERVER['DOCUMENT_ROOT']."/session.php";
	include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
/**
 * Example of JSON data for calendar
 *
 * @package zabuto_calendar
 */
 
 $useridinstance=$_REQUEST['userid'];
 $usermonth=$_REQUEST['month'];
  $useryear=$_REQUEST['year'];
 //attendance json parser
 
$db = getDB();
	$statement=$db->prepare("SELECT * from attendance_manager where user_id=:user_id_get and MONTH(att_time)=:monthinget and YEAR(att_time)=:yearinget order by att_time ASC");
        /*user_id=:user_id_get and */
	$statement->bindParam(':user_id_get',$useridinstance, PDO::PARAM_STR);
	$statement->bindParam(':monthinget',$usermonth, PDO::PARAM_STR);
	$statement->bindParam(':yearinget',$useryear, PDO::PARAM_STR);
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
            $date_user_dependent = substr($results[$i]["att_time"],0,10);
            $time_user_dependent = implode("-",array_reverse(explode("-", substr($results[$i]["att_time"],11,18))));
            $user_id = $results[$i]['user_id'];
            if($date_user_dependent==$date_in_list && $user_id_from_main==$user_id ){
                if ($results[$i]["att_time"] <> "undefined") {
                        $time_user_dependent = implode("-", array_reverse(explode("-", substr($results[$i]["att_time"], 11, 18))));
                        array_push($all_time_for_date, $time_user_dependent);
                    } else {
                        array_push($all_time_for_date, "0");
                    }
            }
        }





        $first = reset($all_time_for_date);
        $last = end($all_time_for_date);
        $date_one_user = new \stdClass();
        $date_one_user->user_name = $user_id_from_main;
        $date_one_user-> date_att = $date_in_list;
        $date_one_user-> in_time_att = $first;
        if ($first <> "") {
            $date_one_user->in_time_att = $first;
        } else {
            $date_one_user->in_time_att = "0";
        }

        if ($first == $last) {
            $date_one_user->out_time_att = "0";
        } else {
            $date_one_user->out_time_att = $last;
        }
        array_push($super_main_attendence_id_array,$date_one_user);
        //echo "<br>#############################<br>#############################<br>";
        //echo json_encode($super_main_attendence_id_array)."@@@".$date_in_list."@@@".$user_id_from_main."<br>";
        //echo "<br>#############################<br>#############################<br>";

        }
}
//echo "<br>@@@@@@@@@@@@@@@@<br>@@@@@@@@@@@@@@@@<br>";
$array_main = $super_main_attendence_id_array;
//echo json_encode($array_main);
//print_r($super_main_attendence_id_array);
 //echo $_REQUEST['userid'];
 $datearrforcal=array();
 $attabforcal=array();
 $attsinglelog=array();
$timearrforcal=array();
$outtimeforcal=array();
//echo json_encode($super_main_attendence_id_array);
 foreach ($super_main_attendence_id_array as $normval)
 {
	 
	$dateinarr= $normval->date_att;
	$timearr=$normval->in_time_att;
	$outtimearr=$normval->out_time_att;
	if($timearr==true and $outtimearr==true)
	{
       
		array_push($datearrforcal,$dateinarr);
	}
	elseif($timearr==false || $outtimearr==false)
	{
	if($timearr==false && $outtimearr==false)
	{
		array_push($attabforcal,$dateinarr);
		}else{
		array_push($attsinglelog,$dateinarr);
		}
		}
	else{
		
	//array_push($attabforcal,$dateinarr);
	//array_push($timearrforcal,$timearr);
	//array_push($outtimeforcal,$outtimearr);
	}
	 }
	// print_r($attabforcal);
	 //print_r($datearrforcal);
	//print_r($attabforcal);
                                        //current month loop calculator
		$list=array();

			for($d=1; $d<=31; $d++)
				{
					$time=mktime(12, 0, 0, $usermonth, $d, $useryear);          
					if (date('m', $time)==$usermonth)       
					$list[]=date('Y-m-d-D', $time);
				}
						$dateruntime=sizeof($list);
/* g */

$db = getDB();
$publicholi=array("red","green");
$statement1=$db->prepare("SELECT * from public_holidays ");
$statement1->execute();
$results1=$statement1->fetchAll(PDO::FETCH_ASSOC);
foreach($results1 as $publicholi)
{
 $pushdatepub= $publicholi['fromdate'];		
array_push($publicholi,$pushdatepub);
}

//finding attendance

//$date = date('Y/m/d');
//echo $date;
 
 
 
 
 

if (!empty($_REQUEST['year']) && !empty($_REQUEST['month'])) {
    $year = intval($_REQUEST['year']);
    $month = intval($_REQUEST['month']);
    $lastday = intval(strftime('%d', mktime(0, 0, 0, ($month == 12 ? 1 : $month + 1), 0, ($month == 12 ? $year + 1 : $year))));

    $dates = array();
    for ($i = 0; $i <= $dateruntime-1; $i++) {
        
         $realdate= substr($list[$i],0,10);
		 $day_ofcurr=substr($list[$i],11,13);
		 //sunday check
			if($day_ofcurr=="Sun")
			{
				$date = $realdate;
				$dates[$i] = array(
					'date' => $date,
					'badge' => ($i & 1) ? true : false,
					'title' => 'Public Holiday ' . $date,
					'body' => '<p class="lead">Non Working Sunday--Holiday</p><p>If you didnt sign in and were present contact HR <strong></strong></p>',
					'footer' => 'Contact HR for further query',
				);
				if (!empty($_REQUEST['grade'])) {
				
					if(in_array($realdate,$datearrforcal)){
						$dates[$i]['badge'] = true;
						$dates[$i]['classname'] = 'grade-4'; //rand(1, 4);
					}else{
						$dates[$i]['badge'] = false;
						$dates[$i]['classname'] = 'grade-4'; //rand(1, 4);
					}
				}
				if (!empty($_REQUEST['action'])) {
					$dates[$i]['title'] = 'Action for ' . $date;
					$dates[$i]['body'] = '<p>The footer of this modal window consists of two buttons. One button to close the modal window without further action.</p>';
					$dates[$i]['body'] .= '<p>The other button [Go ahead!] fires myFunction(). The content for the footer was obtained with the AJAX request.</p>';
					$dates[$i]['body'] .= '<p>The ID needed for the function can be retrieved with jQuery: <code>dateId = $(this).closest(\'.modal\').attr(\'dateId\');</code></p>';
					$dates[$i]['body'] .= '<p>The second argument is true in this case, so the function can handle closing the modal window: <code>myFunction(dateId, true);</code></p>';
					$dates[$i]['footer'] = '
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="dateId = $(this).closest(\'.modal\').attr(\'dateId\'); myDateFunction(dateId, true);">Go ahead!</button>
					';
				}
			}
			elseif(in_array($realdate, $publicholi))
			{
		$date = $realdate;
		
		
		$dates[$i] = array(
            'date' => $date,
            'badge' => ($i & 1) ? true : false,
            'title' => 'Public Holiday on ' . $date,
            'body' => '<p class="lead">This is public Holiday :'.$date.'</p><p><strong></strong></p>',
            'footer' => 'Contact HR for further query',
        );

        if (!empty($_REQUEST['grade'])) {
		
            $dates[$i]['badge'] = false;
            $dates[$i]['classname'] = 'grade-4'; //rand(1, 4);

        }

        if (!empty($_REQUEST['action'])) {
            $dates[$i]['title'] = 'Action for ' . $date;
            $dates[$i]['body'] = '<p>The footer of this modal window consists of two buttons. One button to close the modal window without further action.</p>';
            $dates[$i]['body'] .= '<p>The other button [Go ahead!] fires myFunction(). The content for the footer was obtained with the AJAX request.</p>';
            $dates[$i]['body'] .= '<p>The ID needed for the function can be retrieved with jQuery: <code>dateId = $(this).closest(\'.modal\').attr(\'dateId\');</code></p>';
            $dates[$i]['body'] .= '<p>The second argument is true in this case, so the function can handle closing the modal window: <code>myFunction(dateId, true);</code></p>';
            $dates[$i]['footer'] = '
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="dateId = $(this).closest(\'.modal\').attr(\'dateId\'); myDateFunction(dateId, true);">Go ahead!</button>
            ';
        }
				
				
				}
			//present days check
			elseif(in_array($realdate, $datearrforcal))
			{
		$date = $realdate;
		
		
		$dates[$i] = array(
            'date' => $date,
            'badge' => ($i & 1) ? true : false,
            'title' => 'Present on ' . $date,
            'body' => '<p class="lead">You completed your shift on :'.$date.'</p><p><strong></strong></p>',
            'footer' => 'Contact HR for further query',
        );

        if (!empty($_REQUEST['grade'])) {
		
            $dates[$i]['badge'] = false;
            $dates[$i]['classname'] = 'grade-1'; //rand(1, 4);

        }

        if (!empty($_REQUEST['action'])) {
            $dates[$i]['title'] = 'Action for ' . $date;
            $dates[$i]['body'] = '<p>The footer of this modal window consists of two buttons. One button to close the modal window without further action.</p>';
            $dates[$i]['body'] .= '<p>The other button [Go ahead!] fires myFunction(). The content for the footer was obtained with the AJAX request.</p>';
            $dates[$i]['body'] .= '<p>The ID needed for the function can be retrieved with jQuery: <code>dateId = $(this).closest(\'.modal\').attr(\'dateId\');</code></p>';
            $dates[$i]['body'] .= '<p>The second argument is true in this case, so the function can handle closing the modal window: <code>myFunction(dateId, true);</code></p>';
            $dates[$i]['footer'] = '
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="dateId = $(this).closest(\'.modal\').attr(\'dateId\'); myDateFunction(dateId, true);">Go ahead!</button>
            ';
        }
				
				
				}
				
				//single signin check
				elseif(in_array($realdate, $attsinglelog))
			{
		$date = $realdate;
		
		
		$dates[$i] = array(
            'date' => $date,
            'badge' => ($i & 1) ? true : false,
            'title' => 'Single Sign-In ' . $date,
            'body' => '<p class="lead">You Signed In only once</p><p>If you didnt sign in and were present contact HR <strong></strong></p>',
            'footer' => 'Contact HR for further query',
        );

        if (!empty($_REQUEST['grade'])) {
		
            $dates[$i]['badge'] = false;
            $dates[$i]['classname'] = 'purple'; //rand(1, 4);

        }

        if (!empty($_REQUEST['action'])) {
            $dates[$i]['title'] = 'Action for ' . $date;
            $dates[$i]['body'] = '<p>The footer of this modal window consists of two buttons. One button to close the modal window without further action.</p>';
            $dates[$i]['body'] .= '<p>The other button [Go ahead!] fires myFunction(). The content for the footer was obtained with the AJAX request.</p>';
            $dates[$i]['body'] .= '<p>The ID needed for the function can be retrieved with jQuery: <code>dateId = $(this).closest(\'.modal\').attr(\'dateId\');</code></p>';
            $dates[$i]['body'] .= '<p>The second argument is true in this case, so the function can handle closing the modal window: <code>myFunction(dateId, true);</code></p>';
            $dates[$i]['footer'] = '
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="dateId = $(this).closest(\'.modal\').attr(\'dateId\'); myDateFunction(dateId, true);">Go ahead!</button>
            ';
        }
				
				
				}
					//elseif(!in_array($realdate, $attabforcal) && $date)
					elseif(!in_array($realdate, $datearrforcal) && $realdate<date("Y-m-d"))
			{
		$date = $realdate;
		
		
		$dates[$i] = array(
            'date' => $date,
            'badge' => ($i & 1) ? true : false,
            'title' => '',
            'body' => '<p class="lead">If You didn\'t Signed-In </p><p>If you didn\'t sign in and were present contact HR <strong></strong></p>',
            'footer' => 'Contact HR for further query',
        );

        if (!empty($_REQUEST['grade'])) {
		
            $dates[$i]['badge'] = true;
            $dates[$i]['classname'] = 'grade-2'; //rand(1, 4);

        }

        if (!empty($_REQUEST['action'])) {
            $dates[$i]['title'] = 'Action for ' . $date;
            $dates[$i]['body'] = '<p>The footer of this modal window consists of two buttons. One button to close the modal window without further action.</p>';
            $dates[$i]['body'] .= '<p>The other button [Go ahead!] fires myFunction(). The content for the footer was obtained with the AJAX request.</p>';
            $dates[$i]['body'] .= '<p>The ID needed for the function can be retrieved with jQuery: <code>dateId = $(this).closest(\'.modal\').attr(\'dateId\');</code></p>';
            $dates[$i]['body'] .= '<p>The second argument is true in this case, so the function can handle closing the modal window: <code>myFunction(dateId, true);</code></p>';
            $dates[$i]['footer'] = '
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="dateId = $(this).closest(\'.modal\').attr(\'dateId\'); myDateFunction(dateId, true);">Go ahead!</button>
            ';
        }
				
				
				}
				else{
				
					
					}
	}
    echo json_encode($dates);

} else {
    echo json_encode(array());
}
