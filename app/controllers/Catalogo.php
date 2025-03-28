<?php

class Catalogo extends Controller
{
    public function index()
    {
        $user = new User;
        $ris = $user->findAll();
        $this->view('catalogo');
    }
}