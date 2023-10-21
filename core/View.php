<?php
namespace Core;

class View{
    public function render($view, $params = []){
        if (is_readable(APP_ROOT."/views/$view.php")){
            return $this->generateView($view, $params);
        }
        else{
            return $this->_404();
        }
    }

    private function generateView($view, $params){
        ob_start();
        require_once APP_ROOT."/views/$view.php";
        $content = ob_get_contents();
        ob_end_clean();
        
        foreach ($params as $key => $value){
            $content = str_replace("{{".$key."}}",$value, $content);
        }

        echo $this->integrateTemplate($content);

        return true;
    }

    private function integrateTemplate($body){
        ob_start();
        require_once APP_ROOT."/views/shared/template.php";
        $content = ob_get_contents();
        ob_end_clean();
        
        $content = str_replace("{{body}}", $body, $content);
        
        return $content;
    }

    public function _404(){
        http_response_code(404);
        return $this->render('error/404');
    }
}