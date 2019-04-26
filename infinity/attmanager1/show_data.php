<?php
	include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
	include $_SERVER['DOCUMENT_ROOT']."/session.php";
	include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
/**
 * Example of JSON data for calendar
 *
 * @package zabuto_calendar
 */

if (!empty($_REQUEST['year']) && !empty($_REQUEST['month'])) {
    $year = intval($_REQUEST['year']);
    $month = intval($_REQUEST['month']);
    $lastday = intval(strftime('%d', mktime(0, 0, 0, ($month == 12 ? 1 : $month + 1), 0, ($month == 12 ? $year + 1 : $year))));

    $dates = array();
    for ($i = 0; $i <= (rand(0, 1)); $i++) {
        $date = '2018-10-18';//$year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad(rand(1, $lastday), 2, '0', STR_PAD_LEFT);
        $dates[$i] = array(
            'date' => $date,
            'badge' => ($i & 1) ? true : false,
            'title' => 'Absent on ' . $date,
            'body' => '<p class="lead">Your where absent on this day</p><p>If you didnt sign in and were present contact HR <strong></strong></p>',
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

    echo json_encode($dates);

} else {
    echo json_encode(array());
}
