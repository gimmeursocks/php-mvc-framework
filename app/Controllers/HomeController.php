<?php
namespace App\Controllers;

class HomeController{
    public static function test(){
        return view('home/index');
    }

    public function rekt(){
        return \App\Models\EmailSender::sendEmail("bobteen1@gmail.com","wassap","hello");
    }
    
}