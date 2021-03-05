<?php


namespace services\cron;

use core\imap\MailReaderConnect;
use PhpImap\Exceptions\ConnectionException;

class SaveEmailAttachment
{
    private $imap;
    private $emails;
    private $attachmentNum = 0;
    const EMAIL_NOT_FOUND = 'Nincs találat';

    public function __construct()
    {
        try{
            $this->searchMail();
            if($this->checkResult()){
                $this->countAttachment();
            }

        }catch (ConnectionException $e){
            echo $e->getMessage();
        }
    }

    private function searchMail(){
        $this->imap = new MailReaderConnect('ONE');
        $this->emails = $this->imap->searchMailbox('FROM ' . \Constant::EMAIL_FROM);


    }

    private function checkResult(){
        if(!$this->emails){
            echo self::EMAIL_NOT_FOUND;
            return false;
        }else{
            return true;
        }
    }

    private function countAttachment(){
        foreach ($this->emails as $email){
            $email = $this->imap->getMail($email);
            if($email->hasAttachments()) {
                $this->attachmentNum++;
            }
        }
        echo $this->attachmentNum . ' csatolmány mentve';
    }
}