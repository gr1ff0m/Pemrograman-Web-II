<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        // Load koneksi database
        $db = \Config\Database::connect();

        $data = [];

        // Cek koneksi
        if ($db->connID) {
            $data['status'] = "Koneksi database berhasil!";
        } else {
            $data['status'] = "Koneksi database gagal!";
        }

        // Coba ambil data user pertama (jika tabel users ada)
        $query = $db->query("SELECT * FROM users LIMIT 1");
        $user = $query->getRow();

        if ($user) {
            $data['user'] = $user;
        } else {
            $data['user'] = null;
        }

        // Tampilkan view dengan data koneksi dan user
        return view('home_test', $data);
    }
}
