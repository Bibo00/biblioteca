<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('home');
    }

    public function ricerca($Anno){
        $user = new User;
        $arr = array("Anno" => $Anno);
        $ris = $user->where($arr);
        $jsonris = json_encode($ris);
        print_r($jsonris);
        return $jsonris;
    }
}