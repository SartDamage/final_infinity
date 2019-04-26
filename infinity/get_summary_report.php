<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$year = $_POST['year'];
$mainresult= array();
$db = getDB();

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as DP12 FROM add_mtp_details WHERE Date_of_discharge LIKE '%$year%' and Duration_of_pregnancy <=12");
$statement->execute();
$results1=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as DP13 FROM add_mtp_details  WHERE  Date_of_discharge LIKE '%$year%' and Duration_of_pregnancy >12");
$statement->execute();
$results2=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as AG14 FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Age < 15");
$statement->execute();
$results3=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as AG15 FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Age BETWEEN 15 AND 19;");
$statement->execute();
$results4=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as AG20 FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year' and Age BETWEEN 20 AND 24;");
$statement->execute();
$results5=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as AG25 FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Age BETWEEN 25 AND 29;");
$statement->execute();
$results6=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as AG30 FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Age BETWEEN 30 AND 34;");
$statement->execute();
$results7=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as AG35 FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Age BETWEEN 35 AND 39;");
$statement->execute();
$results8=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as AG40 FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Age BETWEEN 40 AND 44;");
$statement->execute();
$results9=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as AG45 FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Age BETWEEN 45 AND 100;");
$statement->execute();
$results10=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as Hindu FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Religion='Hindu'");
$statement->execute();
$results11=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as Muslim FROM add_mtp_details WHERE   Date_of_discharge LIKE '%$year%' and Religion='Muslim'");
$statement->execute();
$results12=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as Sikh FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Religion='Sikh'");
$statement->execute();
$results13=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as Christian FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Religion='Christian'");
$statement->execute();
$results14=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$statement=$db->prepare("SELECT COUNT(Date_of_discharge) as other FROM add_mtp_details WHERE  Date_of_discharge LIKE '%$year%' and Religion='Other'");
$statement->execute();
$results15=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement= '';

$mainresult=array('DP12'=>$results1[0]['DP12'],
                 'DP13'=>$results2[0]['DP13'],
                 'AG14'=>$results3[0]['AG14'],
                 'AG15'=>$results4[0]['AG15'],
                 'AG20'=>$results5[0]['AG20'],
                 'AG25'=>$results6[0]['AG25'],
                 'AG30'=>$results7[0]['AG30'],
                 'AG35'=>$results8[0]['AG35'],
                 'AG40'=>$results9[0]['AG40'],
                 'AG45'=>$results10[0]['AG45'],
                 'Hindu'=>$results11[0]['Hindu'],
                 'Muslim'=>$results12[0]['Muslim'],
                 'Sikh'=>$results13[0]['Sikh'],
                 'Christian'=>$results14[0]['Christian'],
                 'other'=>$results15[0]['other']);
$json=json_encode($mainresult);
//return $json;
echo $json;
//echo $regID;
$db=null;
?>
