<?php
require 'public/mail/PHPMailer-master/src/Exception.php';
require 'public/mail/PHPMailer-master/src/PHPMailer.php';
require 'public/mail/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class email {
    protected $master = 'nguyenthong0855@gmail.com';
    protected $pMaster = 'mkpltalsuwasrljy';
    protected $toEmail = 'nguyenthong0855@gmail.com';
    protected $name = 'Black Aries';

    public function sendCode($object) {
        $mail = new PHPMailer(true);
        try {
            $sMail = $object['mail'] ?? $this->toEmail;
            $nMail = $object['fullname'] ?? $this->toEmail;
            $code = $this->findCode();
            $content = "<h1>Please enter the verification code:</h1><p><b>$code</b></p>";

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $this->master;
            $mail->Password = $this->pMaster;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($this->master, $this->name);
            $mail->addAddress($sMail, $nMail);
            $mail->isHTML(true);
            $mail->Subject = "Verification Code";
            $mail->Body = $content;

            $mail->send();
            return $code;
        } catch (Exception $e) {
            return false;
        }
    }

    public function informRegister($object) {
        $mail = new PHPMailer(true);
        try {
            $sMail = $object['mail'] ?? $this->toEmail;
            $nMail = $object['fullname'] ?? $this->toEmail;
            $content = "
                <h1>Welcome to {$this->name}</h1>
                <p><b>Username:</b> {$object['username']}</p>
                <p><b>Password:</b> {$object['password']}</p>
            ";

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $this->master;
            $mail->Password = $this->pMaster;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($this->master, $this->name);
            $mail->addAddress($sMail, $nMail);
            $mail->isHTML(true);
            $mail->Subject = "Registration Successful";
            $mail->Body = $content;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    private function findCode() {
        return str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    }
}
?>
