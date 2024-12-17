<?php
include_once '';
class email {
    protected $master='nguyenthong0855@gmail.com';
    protected $pMaster='mkpltalsuwasrljy';
    protected $toEmail ='nguyenthong0855@gmail.com';
    protected $name='Black Aries';
    protected $subject='IMFORM';
    protected $body='Hello';
    public function __construct(){
        
    }
    //Object lưu các thong tin cơ bản như fullname, email, password
    public static function sendCode($object){
        try{
            $sMail=(isset($object)&&isset($object['mail']))?$object['mail']:$this->toEmail;
            $nMail=(isset($object)&&isset($object['fullname']))?$object['fullname']:$this->toEmail;
            $code='';
            if(isset($object)&&isset($object['mail'])&&isset($object['password'])&&isset($object['fullname'])){
                $code= $this->findCode();
                $content=
                "
                  <h1> Please enter code </h1>
                  <p> <b> $code </b> </p>
                ";
            } else {
                $content="<h1>Error</h1>";
            }
            $mail->SMTPDebug= SMTP::DEBUG_SERVER;
            $mail-> isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username =$this->$master;
            $mail->Password =$this->$pMaster;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom($this->master, $this->pMaster);
            $mail->addAddress($sMail,$nMail);
            $mail->addReplyTo($this->master, 'Information');
            $mail->isHTML(true);
            $mail->Subject = (isset($object)&&isset($object['mail']))?"Code Authentication":"Error";
            $mail->Body = $content;
            $mail->AltBody = $content;    
            $mail->send();
            return $code;
        }catch(Exception $e){
            return false;
        }
    }
    //Object lưu các thong tin cơ bản như fullname, email, password
    public static function informRegister($object){
        try{
            $sMail=(isset($object)&&isset($object['mail']))?$object['mail']:$this->toEmail;
            $nMail=(isset($object)&&isset($object['fullname']))?$object['fullname']:$this->toEmail;
            $code='';
            if(isset($object)&&isset($object['mail'])&&isset($object['password'])&&isset($object['fullname'])&&isset($object['username'])){
                $code= $this->findCode();
                $content=
                "
                  <h1>Wellcome to $this->name </h1>
                  <p> <b> Your username:</b> ${$object['username']} </p>
                  <p> <b> Your password:</b> ${$object['password']} </p>
                ";
            } else {
                $content="<h1>Error</h1>";
            }
            $mail->SMTPDebug= SMTP::DEBUG_SERVER;
            $mail-> isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username =$this->$master;
            $mail->Password =$this->$pMaster;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom($this->master, $this->pMaster);
            $mail->addAddress($sMail,$nMail);
            $mail->addReplyTo($this->master, 'Information');
            $mail->isHTML(true);
            $mail->Subject = (isset($object)&&isset($object['mail']))?"Registration Notice":"Error";
            $mail->Body = $content;
            $mail->AltBody = $content;    
            $mail->send();
            return $code;
        }catch(Exception $e){
            return false;
        }
    }
    //Hàm lấy ngẫu nhiên 5 số.
    public function findCode(){
        $randomNumber = mt_rand(1, 99999);
        $code=$randomNumber."";
        if(strlen($code)<5){
            $sbefor="";
            for($i=0;$i<(5-strlen($code));$i++){
                $sbefor .="0";
            }
            $code = $sbefor . $code;
        }
        return $code;
    }
}
?>