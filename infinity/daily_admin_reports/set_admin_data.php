<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
$db=null;
$db = getDB();
$AdminID=$userDetails->ID;
$form = $_POST;
$hos_name=$form['hos_name'];
$hos_add=$form['hos_add'];
$hos_con=$form['hos_con'];
$hos_gst=$form['hos_gst'];
$port_email=$form['port_email'];
$host_email=$form['host_email'];
$smtp_email=$form['smtp_email'];
$email=$form['email'];
$password=base64_encode($form['password']);
$sender=$form['from_name'];
$ipd_inv_footer=$form['ipd_inv_footer'];
$opd_inv_footer=$form['opd_inv_footer'];
$patho_inv_footer=$form['patho_inv_footer'];
$pharma_inv_footer=$form['pharma_inv_footer'];
$textlocal_api=$form['textlocal_api'];
$wel_sms_temp=$form['textlocal_welcome_temp'];
$bill_sms_temp=$form['textlocal_bill_temp'];
$bill_ipd_dis_temp=$form['textlocal_ipd_dis_temp'];
$wel_ipd_sms_temp=$form['textlocal_wel_ipd_temp'];
$wel_opd_sms_temp=$form['textlocal_wel_opd_temp'];
$wel_patho_sms_temp=$form['textlocal_wel_patho_temp'];
$shiftime=$form['shiftime'];

if(isset($form['chk_uhid'])){
	$chk_uhid="1";
}
else{}
	if(isset($form['chk_ipd'])){
	$chk_ipd="1";
}
else{}
	if(isset($form['chk_opd'])){
	$chk_opd="1";
}
else{}
	if(isset($form['chk_pathology'])){
	$chk_pathology="1";
}
else{}
	if(isset($form['chk_pharmacy'])){
	$chk_pharmacy="1";
}
else{}
//echo $chk_uhid;



$AdminModuleID="";
if(isset($form['admin_set']) && $form['admin_set'] <> ""){
	$AdminModuleID=base64_decode($form['admin_set']);
};


$stadd_table_id=base64_decode($form['id']);/*staff id */
$isactive="1";

if($AdminModuleID==""){
	
	$query="INSERT INTO `adminpageconfigmaster`( `name_hospital`, `address_hospital`, `contact_hospital`, `gst_no`, `textlocal_api`,`port_email`, `host_email`, `smtp_secure`, `email`, `password`, `sender_name`, `ipd_inv_footer`, `opd_inv_footer`, `patho_inv_footer`, `pharma_inv_footer`,`wel_sms_temp`,   `bill_ipd_dis_temp`,`bill_sms_temp`, `wel_ipd_sms_temp`,`wel_opd_sms_temp`,`wel_patho_sms_temp`,

	`WhenEntered`, `EnteredBy`,`IsActive`,`shifttime`, `uhid`, `ipd`, `opd`, `pathology`, `pharmacy`,`shifttime`) VALUES
	(:hos_name, :hos_add, :hos_con, :hos_gst, :textlocal_api, :port_email, :host_email, :smtp_secure, :email, :password, :sender, :ipd_inv_footer, :opd_inv_footer, :patho_inv_footer, :pharma_inv_footer, :wel_sms_temp, :bill_ipd_dis_temp, :bill_sms_temp, :wel_ipd_sms_temp,:wel_opd_sms_temp,:wel_patho_sms_temp,
	
	NOW(),:user,:isactive,:uhid,:ipd,:opd,:pathology,:pharmacy,:shifttime
	) ON DUPLICATE KEY UPDATE 
			`name_hospital`=:hos_name_dup, `address_hospital`=:hos_add_dup,`contact_hospital`=:hos_con_dup ,`textlocal_api`=:textlocal_api, `gst_no`=:hos_gst_dup, `port_email`=:port_email_dup, `host_email`=:host_email_dup, `smtp_secure`=:smtp_secure_dup, `email`=:email_dup, `password`=:password_dup, `sender_name`=:sender_dup,  `ipd_inv_footer`=:ipd_inv_footer_dup, `opd_inv_footer`=:opd_inv_footer_dup, `patho_inv_footer`=:patho_inv_footer_dup, `pharma_inv_footer`=:pharma_inv_footer_dup,LastModified=NOW(),ModifiedBy=:user_dup,`uhid`=:uhid,`ipd`=:ipd,`opd`=:opd,`pathology`=:pathology,`pharmacy`=:pharmacy,`shifttime`=:shifttime";
			
    $statement=$db->prepare($query);
			
	$statement->bindParam(':hos_name', $hos_name);
	$statement->bindParam(':hos_add', $hos_add);
	$statement->bindParam(':hos_con', $hos_con);
	$statement->bindParam(':textlocal_api', $textlocal_api);
	$statement->bindParam(':hos_gst', $hos_gst);
	
	$statement->bindParam(':port_email', $port_email);
	$statement->bindParam(':host_email', $host_email);
	$statement->bindParam(':smtp_secure', $smtp_email);
	
	$statement->bindParam(':email', $email);
	$statement->bindParam(':password', $password);
	$statement->bindParam(':sender', $sender);
	
	$statement->bindParam(':ipd_inv_footer', $ipd_inv_footer);
	$statement->bindParam(':opd_inv_footer', $opd_inv_footer);
	$statement->bindParam(':patho_inv_footer', $patho_inv_footer);
	$statement->bindParam(':pharma_inv_footer', $pharma_inv_footer);
	
	$statement->bindParam(':user', $stadd_table_id);
	$statement->bindParam(':wel_sms_temp', $wel_sms_temp);
	$statement->bindParam(':bill_sms_temp', $bill_sms_temp);
	$statement->bindParam(':bill_ipd_dis_temp', $bill_ipd_dis_temp);
	$statement->bindParam(':wel_ipd_sms_temp', $wel_ipd_sms_temp);
	$statement->bindParam(':wel_opd_sms_temp', $wel_opd_sms_temp);
	$statement->bindParam(':wel_patho_sms_temp', $wel_patho_sms_temp);
	
	$statement->bindParam(':hos_name_dup', $hos_name);
	$statement->bindParam(':hos_add_dup', $hos_add);
	$statement->bindParam(':hos_con_dup', $hos_con);
	$statement->bindParam(':textlocal_api_dup', $textlocal_api);
	$statement->bindParam(':hos_gst_dup', $hos_gst);
	
	$statement->bindParam(':port_email_dup', $port_email);
	$statement->bindParam(':host_email_dup', $host_email);
	$statement->bindParam(':smtp_secure_dup', $smtp_email);
	
	$statement->bindParam(':email_dup', $email);
	$statement->bindParam(':password_dup', $password);
	$statement->bindParam(':sender_dup', $sender);
	
	$statement->bindParam(':user_dup', $stadd_table_id);
	$statement->bindParam(':ipd_inv_footer_dup', $ipd_inv_footer);
	$statement->bindParam(':opd_inv_footer_dup', $opd_inv_footer);
	$statement->bindParam(':patho_inv_footer_dup', $patho_inv_footer);
	$statement->bindParam(':pharma_inv_footer_dup', $pharma_inv_footer);
	$statement->bindParam(':uhid', $chk_uhid);
	$statement->bindParam(':ipd', $chk_ipd);
	$statement->bindParam(':opd', $chk_opd);
	$statement->bindParam(':pathology', $chk_pathology);
	$statement->bindParam(':pharmacy', $chk_pharmacy);
	$statement->bindParam(':shifttime', $shiftime);
	
	
	$statement->bindParam(':isactive', $isactive);
}else if($AdminModuleID <> ""){
	$query="UPDATE `adminpageconfigmaster` SET `name_hospital`=:hos_name,`address_hospital`=:hos_add, `contact_hospital`=:hos_con,`gst_no`=:hos_gst, `textlocal_api`=:textlocal_api, `port_email`=:port_email,`host_email`=:host_email,`smtp_secure`=:smtp_secure,`email`=:email,`password`=:password,`sender_name`=:sender,  `ipd_inv_footer`=:ipd_inv_footer, `opd_inv_footer`=:opd_inv_footer, `patho_inv_footer`=:patho_inv_footer, `pharma_inv_footer`=:pharma_inv_footer, `wel_sms_temp`=:wel_sms_temp, `bill_sms_temp`=:bill_sms_temp, `bill_ipd_dis_temp`=:bill_ipd_dis_temp, `wel_ipd_sms_temp`=:wel_ipd_sms_temp,`wel_opd_sms_temp`=:wel_opd_sms_temp,`wel_patho_sms_temp`=:wel_patho_sms_temp,`LastModified`=NOW(),`ModifiedBy`=:user,`uhid`=:uhid,`ipd`=:ipd,`opd`=:opd,`pathology`=:pathology,`pharmacy`=:pharmacy,`shifttime`=:shifttime WHERE `AdminModuleID`=:admin_modal_id";
	$statement=$db->prepare($query);
			
	$statement->bindParam(':hos_name', $hos_name);
	$statement->bindParam(':hos_add', $hos_add);
	$statement->bindParam(':hos_con', $hos_con);
	$statement->bindParam(':textlocal_api', $textlocal_api);
	$statement->bindParam(':hos_gst', $hos_gst);
	
	$statement->bindParam(':port_email', $port_email);
	$statement->bindParam(':host_email', $host_email);
	$statement->bindParam(':smtp_secure', $smtp_email);
	
	$statement->bindParam(':email', $email);
	$statement->bindParam(':password', $password);
	$statement->bindParam(':sender', $sender);
	
	$statement->bindParam(':ipd_inv_footer', $ipd_inv_footer);
	$statement->bindParam(':opd_inv_footer', $opd_inv_footer);
	$statement->bindParam(':patho_inv_footer', $patho_inv_footer);
	$statement->bindParam(':pharma_inv_footer', $pharma_inv_footer);
	
	$statement->bindParam(':user', $stadd_table_id);
	$statement->bindParam(':wel_sms_temp', $wel_sms_temp);
	$statement->bindParam(':bill_sms_temp', $bill_sms_temp);
	$statement->bindParam(':bill_ipd_dis_temp', $bill_ipd_dis_temp);
	$statement->bindParam(':wel_ipd_sms_temp', $wel_ipd_sms_temp);
	$statement->bindParam(':wel_opd_sms_temp', $wel_opd_sms_temp);
	$statement->bindParam(':wel_patho_sms_temp', $wel_patho_sms_temp);
		$statement->bindParam(':uhid', $chk_uhid);
		$statement->bindParam(':ipd', $chk_ipd);
		$statement->bindParam(':opd', $chk_opd);
		$statement->bindParam(':pathology', $chk_pathology);
		$statement->bindParam(':pharmacy', $chk_pharmacy);
		$statement->bindParam(':shifttime', $shiftime);

	
	$statement->bindParam(':admin_modal_id', $AdminModuleID);
}
	$statement->execute();
	$db=null;
	$db = getDB();
	if ($statement->rowCount() > 0)
    {
        echo "Saved";
		
    }
	else{echo "Error";}
	$db=null;
?>	