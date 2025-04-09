<?php

class App
{
    private $controller = 'Login';
    private $method     = 'index';
    private $data = [];

    private function splitUrl()
    {
        $URL = $_GET['url'] ?? 'login';
        //$URL = trim("/ ", $URL);
        $URL = explode("/", $URL);
        //print_r($URL);
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitUrl();
        $filename = "../app/controllers/".ucfirst($URL[0]).".php";
        
        if(file_exists($filename))
        {
            require $filename;
            $this->controller = ucfirst($URL[0]);
            
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }
        
        $controller = new $this->controller;
        if(count($URL) > 1){
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
            }
            if(count($URL) > 2){
                $this->data = $URL[2];
            }
        }
        

        call_user_func_array([$controller, $this->method], [$this->data]);
        
        
    }
}
