<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
//require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendEmail($from, $fromName, $to, $toName, $sub, $msg){
	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {	
		//Server settings
	//	$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'ahmedalvi29.gamil.com@gmail.com';                     //SMTP username
		$mail->Password   = 'aitwcmblhupzqmrx';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom($from, $fromName);
		$mail->addAddress($to, $toName);     //Add a recipient
		//$mail->addAddress('ellen@example.com');               //Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $sub;
		$mail->Body    = $msg;
		$mail->AltBody = $msg;

		$mail->send();
		return true;
	} catch (Exception $e) {
		return false;
	}
}

?>