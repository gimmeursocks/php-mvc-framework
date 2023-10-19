<?php


namespace Core;


class View{
    /**
     * @throws \Exception
     */
    public function render($view, $params = []){
        if (is_readable(APP_ROOT."/views/$view.php")){
            return $this->generateView("shared/template", array("body"=>file_get_contents(APP_ROOT."/views/$view.php"))+$params);
        }
        else{
            return $this->_404();
        }
    }

    /**
     * @throws \Exception
     */
    private function generateView($view, $params){
        ob_start();
        require_once APP_ROOT."/views/$view.php";
        $content = ob_get_contents();
        ob_end_clean();
        
        foreach ($params as $key => $value){
            $content = str_replace("{{".$key."}}",$value, $content);
        }

        echo $content;         

        return true;
    }

    public function _404(){
        http_response_code(404);
        return $this->render('error/404');
    }
}