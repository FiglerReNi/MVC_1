<?php


namespace controller;


use core\twig\TwigConfigure;

class PageNotFoundController
{
    public static function getPageNotFoundPath()
    {
        echo TwigConfigure::getTwigEnvironmet()->render('pagenotfound.twig');
    }
}