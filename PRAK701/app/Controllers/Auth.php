<?php

namespace App\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);
        $request = \Config\Services::request();
        $session = session();
            if ($this->request->getPost() != null) {
                $rules = [
                'username' => 'required',
                'password' => 'required|min_length[3]|max_length[255]',
            ];

            if (!$this->validate($rules)) {
                return view('auth/login', [
                    'validation' => $this->validator,
                ]);
            } else {
                $model = new UserModel();
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                $user = $model->where('username', $username)->first();
                //echo "<pre>";
               // print_r($password);
               // echo "</pre>";
               // exit;
                log_message('error', 'Username: ' . $username);
                log_message('error', 'User dari DB: ' . print_r($user, true));

                if ($user) {
                    if (password_verify($password, $user['password'])) {
                        $sessData = [
                            'id'        => $user['id'],
                            'username'  => $user['username'],
                            'logged_in' => true
                        ];
                        $session->set($sessData);
                        $session->setFlashdata('success', 'Login berhasil! Selamat datang, ' . $user['username']);
                        return redirect()->to('/buku');
                    } else {
                        $session->setFlashdata('warning', 'Password salah');
                        return redirect()->to('/login');
                    }
                } else {
                    $session->setFlashdata('warning', 'Username tidak ditemukan');
                    return redirect()->to('/login');
                }
            }
        }

        // Jika belum post, tampilkan view login
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
