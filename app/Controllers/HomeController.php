<?php
namespace App\Controllers;

class HomeController{
    public static function home(){
        return view('home/index',["ok" => strtok($_SERVER["REQUEST_URI"],'?')]);
    }

    public static function mail(){
        return \App\Models\EmailSender::sendEmail("bobteen1@gmail.com","wassap","hello");
    }
}