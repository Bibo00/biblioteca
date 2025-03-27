<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model;
        $data = array("Anno" => 5);
        $ris = $model->where($data);
        foreach ($ris as $row) {
            echo "<label> classe: " . $row['Anno'] . $row['Sezione'];
        }

        $this->view('home');
    }
}