<?php

namespace App\Controllers;
use App\Models\PraktikanModel;

class Home extends BaseController
{
    protected $praktikan;

    public function __construct()
    {
        $this->praktikan = new PraktikanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'praktikan' => $this->praktikan->getData()
        ];
        return view('beranda', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil',
            'profil' => $this->praktikan->getProfil()
        ];
        return view('profil', $data);
    }
}
