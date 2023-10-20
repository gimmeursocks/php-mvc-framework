<?php
namespace Core;

class UrlEngine
{
    public function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path(){
        // echo $_SERVER["REQUEST_URI"];
        return strtok($_SERVER["REQUEST_URI"], '?');
    }
}