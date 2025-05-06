<?php

namespace App\Models;
use CodeIgniter\Model;

class PraktikanModel extends Model
{
    public function getData()
    {
        return [
            'nama' => 'Avantio Fierza Patria',
            'nim'  => '2310817310001'
        ];
    }

    public function getProfil()
    {
        return [
            'nama' => 'Avantio Fierza Patria',
            'nim'  => '2310817310001',
            'prodi' => 'Teknologi Informasi',
            'hobi' => 'Membaca, Coding',
            'skill' => ['PHP', 'JavaScript', 'HTML/CSS'],
            'gambar' => '1.jpg'
        ];
    }
}
