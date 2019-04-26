<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/session.php';
$userDetails = $userClass->userDetails($session_id);
$usernamethrget=$_GET['ID'];


?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>

<link rel="stylesheet" type="text/css" href="style.css">
<script src="./zabuto_calendar.min.js"></script>

<link rel="stylesheet" type="text/css" href="./zabuto_calendar.min.css">
<style>
	div.zabuto_calendar .badge-event,
div.zabuto_calendar div.legend span.badge-event {
  background:#ef0000 ;
  color: #fff;
  text-shadow: none;
}
    .grade-1 {
        background-color: #00FF00;
    }

    .grade-2 {
        background-color: #ef0000;
    }

    .grade-3 {
        background-color: #FFEB00;
    }

    .grade-4 {
        background-color: #A9A9A9;
    }

    .purple {
        background-color: #4282F9;
    }
</style>
<style>
    .table td{padding: 0.25rem;}
    input:checked + .slider {
        background-color: #4caf50;
    }
    .slider{
        background-color: #c00;
    }
    .dataTables_wrapper .row{
        width:100%;
        margin-left:0px;
        margin-right:0px;
    }
    .pagination {
        display: -webkit-inline-box;
    }
    .table td, .table th{vertical-align: middle;}
    .row .dataTables_length{
        float: left;
    }
    .red{
        background-color:red;
        color:#fff;
    }
    .off_blue{
        background-color:#00BCD4;
        color:white;
    }
    .violet{background-color:#9c27b0;color:white;}.violet .text-muted{color: #b0a727!important;}
    .dirty_ochre{background-color:#b0a727;color:white}.dirty_ochre .text-muted{color:#9e27b0!important}
    .pale_green{background-color:#3cb027;color:white}.pale_green .text-muted{color:#b0273c!important}
    .pale_red{background-color:#b0273c;color:white}.pale_red .text-muted{color:#3cb027!important}
    .pale_light_blue{background-color:#7e8ef2;color:white}.pale_light_blue .text-muted{color:#f2b47e!important}
    .pale_dark_blue{background-color:#4659d9;color:white}.pale_dark_blue .text-muted{color:#f2b47e!important}
    .dark_blue{background-color:blue;color:white}.pale_dark_blue .text-muted{color:#f2b47e!important}
    .pale_dirty_brown{background-color:#b06027;color:white}.pale_dirty_brown .text-muted{color:#f2b47e!important}
    .squ-1{

    }
    .most-important{
        font-size: 5em;
    }
    .important{
        font-size: 3em;
    }
    .less_important{
        font-size: 1em;
    }
    .reset-this,.reset-this:hover {
        animation : none;
        animation-delay : 0;
        animation-direction : normal;
        animation-duration : 0;
        animation-fill-mode : none;
        animation-iteration-count : 1;
        animation-name : none;
        animation-play-state : running;
        animation-timing-function : ease;
        backface-visibility : visible;
        background : 0;
        background-attachment : scroll;
        background-clip : border-box;
        background-color : transparent;
        background-image : none;
        background-origin : padding-box;
        background-position : 0 0;
        background-position-x : 0;
        background-position-y : 0;
        background-repeat : repeat;
        background-size : auto auto;
        border : 0;
        border-style : none;
        border-width : medium;
        border-color : inherit;
        border-bottom : 0;
        border-bottom-color : inherit;
        border-bottom-left-radius : 0;
        border-bottom-right-radius : 0;
        border-bottom-style : none;
        border-bottom-width : medium;
        border-collapse : separate;
        border-image : none;
        border-left : 0;
        border-left-color : inherit;
        border-left-style : none;
        border-left-width : medium;
        border-radius : 0;
        border-right : 0;
        border-right-color : inherit;
        border-right-style : none;
        border-right-width : medium;
        border-spacing : 0;
        border-top : 0;
        border-top-color : inherit;
        border-top-left-radius : 0;
        border-top-right-radius : 0;
        border-top-style : none;
        border-top-width : medium;
        bottom : auto;
        box-shadow : none;
        box-sizing : content-box;
        caption-side : top;
        clear : none;
        clip : auto;
        color : inherit;
        columns : auto;
        column-count : auto;
        column-fill : balance;
        column-gap : normal;
        column-rule : medium none currentColor;
        column-rule-color : currentColor;
        column-rule-style : none;
        column-rule-width : none;
        column-span : 1;
        column-width : auto;
        content : normal;
        counter-increment : none;
        counter-reset : none;
        cursor : auto;
        direction : ltr;
        display : inline;
        empty-cells : show;
        float : none;
        font : normal;
        font-family : inherit;
        font-size : medium;
        font-style : normal;
        font-variant : normal;
        font-weight : normal;
        height : auto;
        hyphens : none;
        left : auto;
        letter-spacing : normal;
        line-height : normal;
        list-style : none;
        list-style-image : none;
        list-style-position : outside;
        list-style-type : disc;
        margin : 0;
        margin-bottom : 0;
        margin-left : 0;
        margin-right : 0;
        margin-top : 0;
        max-height : none;
        max-width : none;
        min-height : 0;
        min-width : 0;
        opacity : 1;
        orphans : 0;
        outline : 0;
        outline-color : invert;
        outline-style : none;
        outline-width : medium;
        overflow : visible;
        overflow-x : visible;
        overflow-y : visible;
        padding : 0;
        padding-bottom : 0;
        padding-left : 0;
        padding-right : 0;
        padding-top : 0;
        page-break-after : auto;
        page-break-before : auto;
        page-break-inside : auto;
        perspective : none;
        perspective-origin : 50% 50%;
        position : static;
        /* May need to alter quotes for different locales (e.g fr) */
        quotes : '\201C' '\201D' '\2018' '\2019';
        right : auto;
        tab-size : 8;
        table-layout : auto;
        text-align : inherit;
        text-align-last : auto;
        text-decoration : none;
        text-decoration-color : inherit;
        text-decoration-line : none;
        text-decoration-style : solid;
        text-indent : 0;
        text-shadow : none;
        text-transform : none;
        top : auto;
        transform : none;
        transform-style : flat;
        transition : none;
        transition-delay : 0s;
        transition-duration : 0s;
        transition-property : none;
        transition-timing-function : ease;
        unicode-bidi : normal;
        vertical-align : baseline;
        visibility : visible;
        white-space : normal;
        widows : 0;
        width : auto;
        word-spacing : normal;
        z-index : auto;
        /* basic modern patch */
        all: initial;
        all: unset;
    }
    .pulse{
        -webkit-animation: fa-spin 1s infinite steps(8);
        animation: fa-spin 1s infinite steps(8);
    }
    .fa-left{
        position: inherit;
        top: 4%;
        left: 27%;
    }
    .fa-right{
        position: inherit;
        top: 4%;
        right: -17%;
    }
    .fa-rotate-45-anti{
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    .fa-rotate-45{
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    .fa-rotate-30{
        -ms-transform: rotate(30deg);
        -webkit-transform: rotate(30deg);
        transform: rotate(30deg);
    }
    .fa-rotate-180{
        -ms-transform: rotate(180deg);
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .fa-rotate-270{
        -ms-transform: rotate(270deg);
        -webkit-transform: rotate(270deg);
        transform: rotate(270deg);
    }
    .pointer{
        cursor:pointer;
    }
    .fa-stack {
        display: inline-block;
        height: 2em;
        line-height: 2em;
        position: relative;
        /* vertical-align: middle; */
        vertical-align: top;
        width: 2em;
    }
    #display_on_empty_test{display:none;}
    #display_on_empty_expense{display:none;}
    .div_no_entry{    
        text-align: center;
        vertical-align: middle;
    }
</style>

<?php // include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/navbar_framework/nav_sidebar_patho_home.php"; ?>
<div id="main">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/nav_bartop.php'; ?>
    <div class="container" id="test-form-container" style="padding-left:50px;margin-top:15px;">
        <div class="card card-outline-info mb-3 container-heading" style="margin-bottom: 1rem!important;">
            <div class="card-block heading_bar" id="header">
                <h5><!--title--></h5>
            </div>
            <a href="#" onclick="goBack()" class="float float_form_entry" title="Click, to go back">
                <i class="fa fa-times my-float"></i>
            </a>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-6"><!--Pharmacy-->
                <div class="card mb-3 violet pointer" style="/* width: 18rem; */">
                    <a class="reset-this" id="present_days"  data-toggle="tooltip" data-placement="bottom" title="Number of days present" >
                        <div class="card-body">
                            <h5 class="card-title">Days Present<i class="fal fa-plus  pull-right fa-pull-right"  id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Check attendance"></i></h5>
                            <h6 class="card-subtitle mb-2 text-muted">No of days present till:<?php echo date("d-m-Y"); ?> </h6>
                            <!--<p class="card-text">					</p>-->
                            <div class="row">
                                <div class="col-4">
                                    <i class="fas fa-user-alt fa-4x"></i>
                                </div>
                                <div class="col-8">
                                    <span class="important" id="days_present" data-toggle="tooltip" data-placement="bottom" title="Days Present">
                                        <?php
                                        $cval = "";
										/* if()
										{
											}
											else
											{
												} */
												if(isset($_GET['ID']))
												{
													$usernameid1=$_GET['ID'];
													}
													else{
                                        $usernameid1 = $userDetails->user_id;
													}
                                        $db = getDB();
                                        $statement = $db->prepare("SELECT * from attendance_manager where user_id=:category AND MONTH(att_time)=MONTH(NOW()) order by att_time ");
                                        $statement->bindParam(':category', $usernameid1, PDO::PARAM_STR);
                                        $statement->execute();
                                        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                                        $main_attendence_array = array();
                                        $super_main_attendence_id_array = array(); /* all user id in att record */
                                        $main_attendence_id_array = array(); /* all user id in att record */
                                        $att_records = sizeof($results);
                                        for ($i = 1; $i < $att_records; $i++) {
                                            $user_id_main = $results[$i]['user_id']; //current user in loop

                                            if (in_array($user_id_main, $main_attendence_id_array)) {

                                                //no content
                                            } else {
                                                array_push($main_attendence_id_array, $user_id_main);
                                            }
                                        }
                                        $att_date = array();
                                        foreach ($main_attendence_id_array as $row) {
                                            for ($i = 1; $i < $att_records; $i++) {
                                                if ($results[$i]['user_id'] === $row) {
                                                    $date_user_dependent = implode("-", array_reverse(explode("-", substr($results[$i]["att_time"], 0, 10))));
                                                    if (in_array($date_user_dependent, $att_date)) {
                                                        
                                                    } else {
                                                        array_push($att_date, $date_user_dependent);
                                                    }
                                                }
                                            }
                                        }
                                        foreach ($main_attendence_id_array as $user_id_from_main) {
                                            foreach ($att_date as $date_in_list) {

                                                $all_time_for_date = array();
                                                for ($i = 1; $i < $att_records; $i++) {
                                                    $date_user_dependent = implode("-", array_reverse(explode("-", substr($results[$i]["att_time"], 0, 10))));
                                                    $time_user_dependent = implode("-", array_reverse(explode("-", substr($results[$i]["att_time"], 11, 18))));
                                                    $user_id = $results[$i]['user_id'];
                                                    if ($date_user_dependent == $date_in_list && $user_id_from_main == $user_id) {
                                                        $time_user_dependent = implode("-", array_reverse(explode("-", substr($results[$i]["att_time"], 11, 18))));
                                                        array_push($all_time_for_date, $time_user_dependent);
                                                    }
                                                }





                                                $first = reset($all_time_for_date);
                                                $last = end($all_time_for_date);
                                                $date_one_user = new \stdClass();
                                                $date_one_user->user_name = $user_id_from_main;
                                                $date_one_user->date_att = $date_in_list;
                                                $date_one_user->in_time_att = $first;
                                                if ($first == $last) {
                                                    $date_one_user->out_time_att = false;
                                                } else {
                                                    $date_one_user->out_time_att = $last;
                                                }
                                                array_push($super_main_attendence_id_array, $date_one_user);
                                                //echo "<br>#############################<br>#############################<br>";
                                                //echo json_encode($super_main_attendence_id_array)."@@@".$date_in_list."@@@".$user_id_from_main."<br>";
                                                //echo "<br>#############################<br>#############################<br>";
                                            }
                                        }
                                        //echo "<br>@@@@@@@@@@@@@@@@<br>@@@@@@@@@@@@@@@@<br>";
                                        //echo json_encode($super_main_attendence_id_array);
                                        $presentcount = array();
                                        $halfday = array();
                                        foreach ($super_main_attendence_id_array as $normval) {
                                            $constanttime = strtotime('08:00:00');
                                            $dateinarr = $normval->date_att;
                                            $timearr = $normval->in_time_att;
                                            $checkTimein = strtotime($timearr);
                                            $outtimearr = $normval->out_time_att;
                                            $checkTimeout = strtotime($outtimearr);
                                            $realdiff = $checkTimeout - $checkTimein;
                                            $subdate_h = date('H', $realdiff);
                                            $subdate_m = date('i', $realdiff);
											$subdate= (int)($subdate_h*60 )+$subdate_m;
											
                                            //$diffdate = substr($subdate, 0, 2);

											//echo "<br>$subdate";
                                            if ($subdate >= $minimum_hours) {
                                                array_push($presentcount, $dateinarr);
                                            }else{
												array_push($halfday, $dateinarr);
											}
                                            /* if($timearr==true and $outtimearr== true)
                                              {
                                              array_push($presentcount,$dateinarr);

                                              } */
                                        }
                                        $attfordash = sizeof($presentcount);
										//echo json_encode($subdate);
                                        echo $attfordash;
                                        ?>
                                    </span>
									<span class="important">/</span>
                                    <span class="less_important" id="total_beds" data-toggle="tooltip" data-placement="bottom" title="Half days">
                                        <?php 
										$db = getDB();
                                        $statement = $db->prepare("SELECT ID from staff_ledger where user_id=:useridget ");
                                        $statement->bindParam(':useridget', $usernamethrget, PDO::PARAM_STR);
                                        $statement->execute();
                                        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
										//print_r($results);
										$valuefornxt="";
										foreach($results as $resulfr)
										{
											$valuefornxt=$resulfr['ID'];
											}
											echo $valuefornxt;
										/* $countidgorleave= $results['0']['ID'];
										$count=$statement->rowCount();
										echo $countidgorleave; */
										
											?>
                                    </span>
                                </div>
                            </div>
                            <!--<a href="#" class="card-link">Another link</a>-->
                        </div>
                    </a>
                </div>
            </div>
            <!--<div class="col-md-4">
                <div class="card mb-3 pale_green pointer" style="/* width: 18rem; */">
                    <a class="reset-this" id="ipd_bed"  data-toggle="tooltip" data-placement="bottom" title="Number of days absent" >
                        <div class="card-body">
                            <h5 class="card-title">Days Absent<i class="fal fa-plus  pull-right fa-pull-right"  id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Check Attendance"></i></h5>
                            <h6 class="card-subtitle mb-2 text-muted">No of days absent till: <?/* php echo date("d-m-Y");  */?> </h6>
                           
                            <div class="row">
                                <div class="col-4">
                                    <i class="fas fa-warehouse fa-4x"></i>
                                </div>
                                <div class="col-8">
                                    <span class="important" id="available_bed" data-toggle="tooltip" data-placement="bottom" title="Number of absent days">
										
                                    </span>
                                    <span class="important">/</span>
                                    <span class="less_important" id="total_beds" data-toggle="tooltip" data-placement="bottom" title="Number of paid leave available">
                                        <?php
                                       
                                        ?>
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                    </a>
                </div>
            </div>-->
            <div class="col-md-6"><!--Pharmacy Stock-->
                <div class="card mb-3 pale_green pointer" style="/* width: 18rem; */">
                    <a class="reset-this" id="paid_leave_remaining"  data-toggle="tooltip" data-placement="bottom" title="Number of leaves available" >
                        <div class="card-body">
                            <h5 class="card-title">Remaining Paid Leave<i class="fal fa-plus  pull-right fa-pull-right"  id="ipd_setting" style="cursor:alias;" data-toggle="tooltip" data-placement="right" title="Request for leave"></i></h5>
                            <h6 class="card-subtitle mb-2 text-muted"> <?php echo date("d-m-Y"); ?> </h6>
                            <!--<p class="card-text">					</p>-->
                            <div class="row">
                                <div class="col-4">
                                    <i class="fas fa-file-invoice fa-4x"></i>
                                </div>
                                <div class="col-8">
                                    <span class="important" id="available_bed" data-toggle="tooltip" data-placement="bottom" title="In Stock">
                                    </span>
                                </div>
                            </div>
                            <!--<a href="#" class="card-link">Another link</a>-->
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12"><!--categories-->
            <div class="row">
                <div class="col-md-12">
                    <div id="my-calendar"></div>
                    <script type="application/javascript">
                        var userglobal=<?php echo $usernameid1; ?>;
                        //alert(userglobal);
                        $(document).ready(function () {
                        $("#my-calendar").zabuto_calendar({

                        legend: [

                        {type: "block", label: "Present", classname: 'grade-1'},
                        {type: "block", label: "Absent", classname: 'grade-2'},
                        {type: "block", label: "Single Sign-in", classname: 'purple'},
                        {type: "block", label: "Paid Leave", classname: 'grade-3'},
                        {type: "block", label: "Public Holidays", classname: 'grade-4'},

                        /*  {type: "block", label: "Regular event", classname: 'purple'},
                        {type: "text", label: "Bad"},
                        {type: "list", list: ["grade-1", "grade-2", "grade-3", "grade-4"]},
                        {type: "text", label: "Good"} */
                        ],
                        nav_icon: {
                                prev: '<i class="fas fa-chevron-circle-left fa-2x"></i>',
                                next: '<i class="fas fa-chevron-circle-right fa-2x"></i>'
                              },
                        ajax: {
                        url: "show_datacopy.php?grade="+userglobal+"&userid="+userglobal,
                        modal: true
                        }
                        });
                        });
                    </script>
                </div>
                <div class="col-md-12 col-md-offset-1">
                </div>
            </div>
            <!--<a href="#" class="card-link">Another link</a>-->
        </div>
        <hr class="seperator">
        <hr class="seperator">

    </div>
</div>
<?php
	
	
	?>
<script>
    /*------------------------------------------------------*/


    /*---------------------------------------------------------*/
    /*------------------------------------------------------*/


    /*---------------------------------------------------------*/
   var idfrmgt1= <?php echo $valuefornxt;?>;
   //alert(idfrmgt1);
// setSelectValue (id, val) {}is in footer
    var ipd_bed = document.getElementById('ipd_bed');
    var ipd_bed = document.getElementById('addp_stock');
    var ipd_setting = document.getElementById('ipd_setting');
    /* ipd_bed.addEventListener("click", function myFunction() {
     event.stopPropagation()
     location.href="/patho_reciept_list.php";
     }); */
    /* ipd_setting.addEventListener("click", function myFunction() {
     event.stopPropagation();
     location.href="/patho_add_test_sub.php";
     }); */
    /* on_click_redirect('ipd_bed','/list_all_stocks.php');//collection monthly
     on_click_redirect('addp_stock','/stock/add_new_stock.php');
     on_click_redirect('phar_invoice','/pharmacy_receiptlist.php');
     
     on_click_redirect('stock_cat','/stock/stock_add_list_category.php');
     on_click_redirect('ipd_setting','/patho_add_test_sub.php');//collection monthly
     on_click_redirect('add_test','/universal_home.php');//test count 
     on_click_redirect('low_stock_alert','/list_all_stocks.php');//test count 
     //on_click_redirect('report_pending_monthly','/list_all_tests_registered_pathology.php#1b');//test count 
     on_click_redirect('patient_count','/universal_home.php');//patient_count
     on_click_redirect('add_patient','/addpatientform_pathology_parent.php');//patient_count
     on_click_redirect('total_yearly_revenue','/patho_reciept_list.php');//patient_count
     //on_click_redirect('report_pending_net','/patho_reciept_list.php');//patient_count
     on_click_redirect('report_pending_net_monthly','/list_all_tests_registered_pathology.php#1b');//test count
     on_click_redirect('report_pending_net_annual','/list_all_tests_registered_pathology.php#1b');//test count
     */
	 on_click_redirect('paid_leave_remaining','/list_one_user_leave.php?ID='+idfrmgt1);
    function on_click_redirect(element_id, url) {
        console.log(`ID  ${element_id} and url ${url}`);
        var element = document.getElementById(element_id);
        element.addEventListener("click", function myFunction() {
            event.stopPropagation();
            location.href = url;
        });
    }

    tooltip_nesting('#ipd_bed', "#ipd_setting")//Total_collection
    tooltip_nesting('#present_days', "#days_present")//Total_collection
    tooltip_nesting("#test_reports", '#add_test')//test_count
    tooltip_nesting("#patient_count", '#add_patient')//patient_count
    tooltip_nesting("#total_yearly_revenue", '#net_collection')//patient_count
    tooltip_nesting("#report_pending", '#tests_today_report_created')//patient_count
    tooltip_nesting("#report_pending_net_monthly", '#tests_report_created')//patient_count_net
    tooltip_nesting("#report_pending_net_annual", '#tests_report_created_annual')//patient_count_net
//tooltip_nesting("#report_pending_net",'#tests_report_created')//patient_count

    $('[data-toggle="tooltip"]').tooltip({
        animated: 'true',
        placement: 'bottom',
        container: 'body'});

    function tooltip_nesting(child, parent) {
        $(parent).on('mouseover', function () {
            $(child).tooltip('hide');
            $(parent).addClass("fa-spin")
        }).on('mouseleave', function () {
            $(parent).removeClass("fa-spin")
            $(child).tooltip('show');
        });

        $(".important").on('mouseover', function () {
            $(".less_important").tooltip('hide');
            $(child).tooltip('hide');
        }).on('mouseleave', function () {
            //$(".less_important").tooltip('show');
            $(child).tooltip('hide');
        });
        $(".less_important").on('mouseover', function () {
            //$(".less_important").tooltip('hide');
            $(child).tooltip('hide');
        }).on('mouseleave', function () {
            //$(".less_important").tooltip('show');
            $(child).tooltip('hide');
        });
    }
</script>
<?php
$userattid = $userDetails->user_id;
$pageTitle = "Attendance Dashboard"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents(); // Get all the page's HTML into a string
ob_end_clean(); // Wipe the buffer
// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace('<!--title-->', $pageTitle . $userattid, $pageContents);
?>	

<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>