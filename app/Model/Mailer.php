<?php
namespace Model;
use \PHPMailer;
class Mailer {
	private $mail;
	public function __construct(){
		$mail = new PHPMailer(true);
		$errors = array('vide');
		$app = getApp();
		$mail->SMTPdebug=3;
		$mail->isSMTP();                									// connexion directe au serveur SMTP
		$mail->isHTML();                									// utilisation format HTML
		$mail->Host = $app->getConfig('php_mailer_host'); 	// config								// serveur de messagerie
		$mail->Charset = "UTF-8";       									// type caractères
		$mail->Port = $app->getConfig('php_mailer_port');  //config            									// port obligatoire de google
		$mail->SMTPAuth = true;         									// fournit login/password au serveur
		$mail->SMTPSecure = 'ssl';      									// certifcat SSL
		$mail->Username = $app->getConfig('php_mailer_email');						// utilsateur SMTP
		$mail->Password = $app->getConfig('php_mailer_password');										// mot de passe SMTP
		$mail->setFrom($mail->Username, 'vodin');				// expéditeur
		$this->mail = $mail;
	}	
	
	public function send($to, $subject, $body){
		
		$this->mail->addAddress($to);      							// destinataire
		$this->mail->Subject = $subject;	// sujet du mail
		$this->mail->Body = '
			<html>
				<head>
					<meta charset="utf-8"/>
					<style>h1{color:green;}</style>
				</head>
				<body>'.$body.'
				</body>
			</html>';
		try {
			 // - test si envoi mail OK
			set_time_limit(60);
			if (!$this->mail->send()) {
				$errors[] = 'Erreur envoi : '.$mail->ErrorInfo;
			} else {
				$errors[] = 'Envoi ok ';
			}
		} catch (phpmailerException $e) {
			$errors[] = $e->errorMessage();
		} catch (Exception $e) {
			$errors[] = $e->getMessage();
		}
		// soit le email envoyé OK, soit message en erreur... afficher $errors ds une div ???
		return $errors;
		
	}
}
?>