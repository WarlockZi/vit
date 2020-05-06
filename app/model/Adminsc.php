<?php

namespace app\model;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use app\core\Base\Model;
use app\core\App;

class Adminsc extends Model
{
	public function where($fName = '', $fAct = '', $fArt = '', $prop = [])
	{
		$where = ' WHERE ';
		$and = '';
		if ($fName) {
			$where .= " name LIKE ? ";
			$and = ' and ';
		}
//      if ($fAct) {
		$where .= $and . ' act = ?';
		$and = ' and ';
//      }
		if ($fArt) {
			$where .= $and . " art LIKE ?";
		}
		return $where;
	}

	public function params($fName = '', $fAct = '', $fArt = '', $prop = [])
	{
		$params = [];

		if ($fName) {
			array_push($params, '%' . $fName . '%');
		}
//      if ($fAct) {
		array_push($params, $fAct ? 'Y' : 'N');
//      }
		if ($fArt) {
			array_push($params, '%' . $fArt . '%');
		}

		return $params;
	}

	public function addUser()
	{
// Следующий id вопроса
		$sql = "SHOW TABLE STATUS FROM vitex_test LIKE 'user'";
		$next = $this->findBySql($sql)[0];

		ob_start();
		require APP . '/view/Adminsc/newUser.php';
		$answer = ob_get_clean();
		compact('answer');
		echo $answer;
	}

	private function setupMailer(){
// Load Composer's autoloader
		require ROOT.'/vendor/autoload.php';
		$mail = new PHPMailer(true);
		//Server settings
		$mail->SMTPDebug = 2; //SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth = true;                                   // Enable SMTP authentication
		$mail->Username = 'optvitex@gmail.com';                     // SMTP username
		$mail->Password = 'kiteLoop35';                               // SMTP password
		$mail->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port = 465; //587;  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		return $mail;
	}

	public function email($subj, $body, $altBody, $to='vvoronik@yandex.ru', $from ='VITEX')
	{
		$myGmail = 'optvitex@gmail.com';
		$mail = $this->setupMailer();
		try {
			//Recipients
			$mail->setFrom($myGmail, $from);
			$mail->addAddress($to, 'v v');     // Add a recipient
			$mail->addAddress('WG7yb2iz2IWBkW@dkimvalidator.com', 'v v');     // Add a recipient
			$mail->addReplyTo($myGmail, 'Vitex администрации');
//			$mail->addCC('cc@example.com');
//			$mail->addBCC('bcc@example.com');
			// Attachments
//			$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//			$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subj;
			$mail->Body = $body;
			$mail->AltBody = $altBody;
			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}
