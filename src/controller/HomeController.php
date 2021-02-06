<?php

namespace controller;
use core\mailer\MailSender;

class HomeController
{

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $adresses = array('stephany85@gmail.com', '33renatafigler33@gmail.com');
        $subject = 'Teszt';
        $body = 'Ez egy teszt levél.';
        new MailSender($adresses, $subject, $body);
    }
}