<?php

class App
{
    private $controller = 'Home';
    private $method     = 'index';

    private function splitUrl()
    {
        $URL = $_GET['url'] ?? 'home';
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
        if (method_exists($controller, $URL[1])) {
            $this->method = $URL[1];
        }

        call_user_func_array([$controller, $this->method], ["Anno" => $URL[2]]);
        
        
    }
}
