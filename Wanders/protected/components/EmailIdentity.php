<?php

/**
 * EmailIdentity represents the data needed to identity a email.
 * It contains the authentication method that checks if the provided
 * data can identity the email.
 */
class EmailIdentity extends CComponent
{
	/**
	 * Authenticates a email.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent email identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	public function emailAuthenticate()	//根据需要进行修改的，以后用习惯了之后可以进行高阶的修改
	{
		$mail = Yii::createComponent('application.extensions.mailer.EMailer');
		$mail->Host = 'smtp.sina.com';

    	$mail->IsSMTP();                // set mailer to use SMTP
    	$mail->Host = "smtp.sina.com";  // specify main and backup server
    	$mail->SMTPAuth = true;     // turn on SMTP authentication
    	$mail->Username = "bj15001152604@sina.com";  // SMTP username
    	$mail->Password = "361827"; // SMTP password

    	$mail->From = "bj15001152604@sina.com";
    	$mail->FromName = "漫游者";
    	$mail->AddAddress(Yii::app()->session['email'], "收件人");                 // name is optional
    	$mail->Subject = "注册链接";
   		$mail->Body    = "这里是我给你发送的内容!<a href='10.108.158.250/wanders/wanders/index.php?r=user/default/login'>点此链接注册成功</a>" ;
    	$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
    	if($mail->Send())
    	{
    		return true;
    	}else
    	{
    		return false;
    	}
	}
}


?>