<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('home');
    }

    public function ricerca($Titolo){
        $user = new User;
        $Titolo = str_replace("-", " ", $Titolo);
        $arr = array("Titolo" => "%" . $Titolo . "%");
        
        
        $ris = $user->where($arr);
        //print_r($ris);
        //toBase64($ris);
        $jsonris = json_encode($ris);
        print_r($jsonris);
        //$this->view('home');
        return $jsonris;
    }

    public function findAll(){
        $user = new User;
        $ris = $user->findAll();
        //print_r($ris);
        //toBase64($ris);
        $jsonris = json_encode($ris);
        print_r($jsonris);
        //$this->view('home');
        return $jsonris;
    }


}