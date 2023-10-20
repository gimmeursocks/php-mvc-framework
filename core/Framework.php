<?php
namespace Core;

class Framework{
    public Router $router;
    public UrlEngine $urlEngine;
    public View $view;
    public Request $request;
  
    public function __construct(){
        $this->router = new Router();
        $this->urlEngine = new UrlEngine();
        $this->view = new View();
        $this->request = new Request();
    }

    public function run(){
        //run the match function to get the class and method
        $callable = $this->match($this->urlEngine->method(), $this->urlEngine->path());
        //if not in map array call 404 page
        if (!$callable){
            return $this->view->_404();
        }
        //call the class, pass the method
        //add the default namespace to the controller
        $class = "App\\Controllers\\".$callable['class'];
        if (!class_exists($class)){
            throw new \Exception('Class does not exist', 500);
        }

        $class = new $class();
        $method = $callable['method'];

        //if arguments not passed in an array
        //is_callable treats the second arg as bool
        if (!is_callable(array($class, $method))){        
            throw new \Exception("$method is not a valid method in class $callable[class]", 500);
        }    

        //run the method
        $class->$method($this->request);
        return;
    }

    private function match($method, $url){
        foreach ($this->router::getMap()[$method] as $uri=>$call){
            //does the $url have a trailing slash? if yes, remove it
            //make sure the only string present is not the slash
            if (substr($url, -1) === '/' && $uri != '/'){
                //remove the slash
                $url = substr($url, 0, -1);
            }
            //either use url_subfolder or configure your server directory
            $uri = URL_SUBFOLDER . $uri;
            if ($url == $uri){
                return $call;
            }
        }
        return false;
    }
}