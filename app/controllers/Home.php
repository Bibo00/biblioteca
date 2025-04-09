<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('home');
    }

    public function ricerca($data){
        $user = new User;
        if(!is_numeric($data)){
            $data = str_replace("-", " ", $data);
            $arr = array("Titolo" => "%" . $data . "%");
        } else {
            $arr = array("IdL" => $data);
        }
        
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