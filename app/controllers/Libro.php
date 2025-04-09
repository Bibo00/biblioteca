<?php

class Libro extends Controller
{
    public function index($id)
    {
        $_SESSION['IdL'] = $id;
        $this->view('libro');
    }

    public function closeBook()
    {
        $_SESSION['IdL'] = 0;
    }

    public function createPrestito()
    {
        $prestito = new Prestito;
        $start = date("d-m-Y");
        $deadline = date("d-m-Y", strtotime("$start +1 month"));
        $appPrestito = array('IdU' => $_SESSION['IdU'], 'IdL' => $_SESSION['IdL'], 'Data Inizio' => $start, 'Data Fine' => $deadline, 'Stato' => 0);
        $prestito->insert($appPrestito);
    }

    public function AddFav()
    {
        $fav = new Fav;
        $appFav = array('IdU' => $_SESSION['IdU'], 'IdL' => $_SESSION['IdL']);
        $fav->insert($appFav);
    }

    //METODI ESCLUSIVI DEI DOCENTI

    public function listaValigetta()
    {
        $val = new Valigetta;
        $ris = $val->where($_SESSION['IdU']);
    }

    public function showClass($val)
    {
        $user = new User;
        $ris = $user->where($val['IdC']);
    }

    public function addToVal($IdU, $IdV)
    {
        $prestito = new Prestito;

        $start = date("d-m-Y");
        $deadline = date("d-m-Y", strtotime("$start +1 month"));
        $appPrestito = array('IdU' => $IdU, 'IdL' => $_SESSION['IdL'], 'Data Inizio' => $start, 'Data Fine' => $deadline, 'Stato' => 0);
        $prestito->insert($appPrestito);

        $val = new Valigetta;
        $prestito = $prestito->where($appPrestito);
        $appValigetta = array('IdV' => $IdV, 'IdP' => $prestito['IdP']);
        $val->insert($appValigetta);
    }
}