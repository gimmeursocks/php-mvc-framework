<?php
namespace App\Controllers;

class HomeController{
    public static function home(){
        return view('home/index');
    }

    public static function mail(){
        return \App\Models\EmailSender::sendEmail("bobteen1@gmail.com","wassap","hello");
    }

    public static function form_test(){
        return view('mm');
    }

    public static function post_test(){
        echo "POST_WORKING";
    }
}