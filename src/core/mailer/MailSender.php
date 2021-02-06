<?php

namespace core\mailer;

use PHPMailer\PHPMailer\PHPMailer;

class MailSender extends PHPMailer
{
     public $Host= MAIL_SEND_HOST;
     public $Port = MAIL_SEND_PORT;
     public $Username = MAIL_USERNAME;
     public $Password = MAIL_PASSWORD;
     public $SMTPAuth = true;
     public $SMTPSecure = self::ENCRYPTION_STARTTLS;
     public $From = MAIL_FROM;
     public $FromName = MAIL_FROMNAME;
     private $addresses = '';
     private $attachements = '';
    /**
     * MailSender constructor.
     */
    public function __construct($adresses, $subject, $body, $attachements = '')
    {
        parent::__construct();
        parent::isSMTP();
        $this->addresses = $adresses;
        $this->attachements = $attachements;
        $this->Subject = $subject;
        $this->Body = $body;
        $this->addAddressList();
        $this->addAttachementList();
        $this->sendMail();
    }


    public function addAddressList()
     {
         $this->addList($this->addresses, 'addAddress');
     }

     public function addAttachementList(){
         $this->addList($this->attachements,'addAttachement');
     }

     public function sendMail(){
         $this->send();
         if($this->ErrorInfo){
             var_dump($this->ErrorInfo); //log pl
         }else echo 'Sikeres levélküldés';
     }

     private function addList($items, $func){
         if(is_array($items)){
             foreach ($items as $item){
                 $this->$func($item);
             }
         }elseif(!empty($items)) $this->$func($items);
     }


}