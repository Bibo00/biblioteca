<?php

class Home extends Controller
{
    public function index()
    {
        $user = new User;
        //$data = array("Anno" => 2, "Sezione" => "B");
        $ris = $user->insert($data);
        /*foreach ($ris as $row) {
            echo "<label> classe: " . $row['Anno'] . $row['Sezione'];
        }*/

        $this->view('home');
    }

    public function ricerca($Anno){
        $user = new User;
        $arr = array("Anno" => $Anno);
        $ris = $user->where($arr);
        print_r( $ris);
        $ris = json_encode($ris);
        return $ris;
    }
}