<?php
	include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session.php';
	include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	//Load Composer's autoloader
	require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

	//include( $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
	//include $_SERVER['DOCUMENT_ROOT'].'/session.php';
	$form = $_GET;

	$db = getDB();
	$statement=$db->prepare("SELECT * FROM adminpageconfigmaster");
	$statement->execute();
	$admin_base=$statement->fetch();
	//$json=json_encode($results);
	//echo $json;
	$username = "";
	if(isset($admin_base) && $admin_base!="") {$username = $admin_base["email"];}
	$password = "";
	if(isset($admin_base) && $admin_base!="") {$password = base64_decode($admin_base["password"]);}
	$sender_name = "";
	if(isset($admin_base) && $admin_base!="") {$sender_name = $admin_base["sender_name"];}
	$smtp_secure = "";
	if(isset($admin_base) && $admin_base!="") {$smtp_secure = $admin_base["smtp_secure"];}
	$host = "";
	if(isset($admin_base) && $admin_base!="") {$host = $admin_base["host_email"];}
	$port = "";
	if(isset($admin_base) && $admin_base!="") {$port = $admin_base["port_email"];}
	$db=null;

if( isset($form['usernameEmail'] ))
{
  $email=$form['usernameEmail'];
  $db = getDB();
	$statement=$db->prepare("SELECT firstname,lastname,email,password FROM staff_ledger WHERE email=:email");
	$statement->bindParam(':email', $email, PDO::PARAM_STR );
	$statement->execute();
	$result=$statement->fetchAll(PDO::FETCH_ASSOC );
	$count = $statement->rowCount();
	//	  echo "some error";
  if($count==1)
  {
	foreach ($result as $row)
    {
      $email=$row['email'];
	  $pass =$row['password'];
	  $firstname =$row['firstname'];
	  $lastname =$row['lastname'];
      //$pass=md5($row['password']);
    }
	//$link_url="http://localhost/forgot_pass.php?key=".base64_encode($email)."&reset=".$pass;
	$link_url= BASE_URL."forgot_password_reset.php?key=".base64_encode($email)."&reset=".$pass;
    //$link="<a class='btn btn-outline-primary' href='http://localhost/forgot_pass.php?key=".base64_encode($email)."&reset=".$pass."'>Click To Reset password</a>";
    $link="<a class='btn btn-outline-primary' href='".BASE_URL."forgot_password_reset.php?key=".base64_encode($email)."&reset=".$pass."'>Click To Reset password</a>";
	
	$mail_body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Set up a new password for [Product Name]</title>
    
    
  </head>
  <body style="-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;" bgcolor="#F2F4F6"><style type="text/css">
body {
width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none;
}
@media only screen and (max-width: 600px) {
  .email-body_inner {
    width: 100% !important;
  }
  .email-footer {
    width: 100% !important;
  }
}
@media only screen and (max-width: 500px) {
  .button {
    width: 100% !important;
  }
}
</style>
    <span class="preheader" style="box-sizing: border-box; display: none !important; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden;">Use this link to reset your password. The link is only valid for 24 hours.</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#F2F4F6">
      <tr>
        <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
            <tr>
              <td class="email-masthead" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;" align="center">
                <a href="https://www.darstek.com" class="email-masthead_name" style="box-sizing: border-box; color: #bbbfc3; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
        Hospital Management Services
      </a>
              </td>
            </tr>
            
            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;" bgcolor="#FFFFFF">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#FFFFFF">
                  
                  <tr>
                    <td class="content-cell" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
                      <h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Hi '.$firstname.',</h1>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">You recently requested to reset your password for your HMS staff account. Use the button below to reset it. <strong style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">This password reset is only valid for the next 24 hours.</strong></p>
                      
                      <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
                        <tr>
                          <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                            
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                              <tr>
                                <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                  <table border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                                    <tr>
                                      <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                        <a href='.$link_url.' class="button button--green" target="_blank" style="-webkit-text-size-adjust: none; background: #22BC66; border-color: #22bc66; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; text-decoration: none;">Reset your password</a>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
					  <br>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">If you did not request for the password reset, no further action is required,ignore this email or <a href="'.BASE_URL.'" style="box-sizing: border-box; color: #3869D4; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">contact support</a> if you have questions.</p>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks,
                        <br />The HMS Team</p>
                      
                      <table class="body-sub" style="border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;">
                        <tr>
                          <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                            <p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                            <p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">'.$link.'</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                  <tr>
                    <td class="content-cell" align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
                      <p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">© 2018 Hospital management services. All rights reserved.</p>
                      <p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">
                        Darstek trading and solution Pvt Ltd
                        <br />Thane
                        <br />400601
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>';
	
    $mail = new PHPMailer(true);
	//$mail->SMTPSecure = false;
	//$mail->SMTPAutoTLS = false;
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username =  $username;/*"yam.karki@darstek.com";*/
    // GMAIL password
    $mail->Password =  $password;/*"Password@123";*/
    $mail->SMTPSecure =  $smtp_secure;/*"ssl";  */
    // sets GMAIL as the SMTP server
    $mail->Host =  $host;/*"mail.darstek.com";*/
	//$mail->SMTPDebug = 4;
    // set the SMTP port for the GMAIL server
    $mail->Port =  $port;/*"465";*/
    $mail->From=  $username;/*'yam.karki@darstek.com';*/
    $mail->FromName=  $sender_name;/*'yam karki';*/
    $mail->AddAddress($email, $firstname." ".$lastname);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = $mail_body;
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
		)
	);
    if($mail->Send()){
      echo "1";
    }else{
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{echo "0";}
}
	?>