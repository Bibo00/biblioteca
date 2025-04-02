<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('home');
    }

    public function ricerca($Titolo){
        $user = new User;
        $arr = array("Titolo" => $Titolo . "%");
        $ris = $user->where($arr);
        //print_r($ris);
        $ris[0]->Copertina = base64_encode($ris[0]->Copertina);
        $jsonris = json_encode($ris);
        print_r($jsonris);
        return $jsonris;
    }
}