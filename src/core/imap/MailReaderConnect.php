<?php


namespace core\imap;

use PhpImap\Mailbox;

class MailReaderConnect extends Mailbox
{
    /**
     * MailReaderConnect constructor.
     * @param $mail
     * @throws \PhpImap\Exceptions\InvalidParameterException
     */
    public function __construct($mail)
    {
        $host = constant($mail . '_MAIL_READ_HOST');
        $port = constant($mail . '_MAIL_READ_PORT');
        $username = constant($mail . '_MAIL_USERNAME');
        $password = constant($mail . '_MAIL_PASSWORD');
        $imapPath = "{" . $host . ":" . $port . "/ssl}";
        $this->createFolder();
        parent::__construct($imapPath, $username, $password, EMAIL_ATTACHMENT);
    }

    private function createFolder()
    {
        if (!is_dir(EMAIL_ATTACHMENT)) {
            mkdir(EMAIL_ATTACHMENT);
        }
    }
}