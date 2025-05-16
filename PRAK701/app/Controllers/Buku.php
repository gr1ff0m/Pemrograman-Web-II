<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;
    protected $session;

    public function __construct()
    {
        helper(['form']);
        $this->bukuModel = new BukuModel();
        $this->session = session();

        // Cek login
        if (!$this->session->get('logged_in')) {
            // Set flashdata peringatan login
            $this->session->setFlashdata('warning', 'Login terlebih dahulu!');
            // Redirect ke login
            header('Location: ' . base_url('/login'));
            exit;
        }
    }

    public function index()
{
    $session = session();
    if (! $session->get('logged_in')) {
        die('Belum login');
    } else {
        echo 'Sudah login sebagai: ' . $session->get('username');
    }

    $data['buku'] = $this->bukuModel->findAll();
    return view('buku/index', $data);
}


    public function create()
    {
        return view('buku/create');
    }

    public function store()
    {
        $rules = [
            'judul'        => 'required|string',
            'penulis'      => 'required|string',
            'penerbit'     => 'required|string',
            'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]',
        ];

        $customMessages = [
            'judul' => [
                'required' => 'Judul harus diisi.',
                'string' => 'Judul harus berupa teks.',
            ],
            'penulis' => [
                'required' => 'Penulis harus diisi.',
                'string' => 'Penulis harus berupa teks.',
            ],
            'penerbit' => [
                'required' => 'Penerbit harus diisi.',
                'string' => 'Penerbit harus berupa teks.',
            ],
            'tahun_terbit' => [
                'required' => 'Tahun terbit harus diisi.',
                'integer' => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
                'less_than' => 'Tahun terbit harus kurang dari 2024.',
            ],
        ];

        if (!$this->validate($rules, $customMessages)) {
            return view('buku/create', [
                'validation' => $this->validator,
            ]);
        }

        $data = [
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];

        $this->bukuModel->insert($data);
        return redirect()->to('/buku')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['buku'] = $this->bukuModel->find($id);
        if (!$data['buku']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul'        => 'required|string',
            'penulis'      => 'required|string',
            'penerbit'     => 'required|string',
            'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]',
        ];

        $customMessages = [
            'judul' => [
                'required' => 'Judul harus diisi.',
                'string' => 'Judul harus berupa teks.',
            ],
            'penulis' => [
                'required' => 'Penulis harus diisi.',
                'string' => 'Penulis harus berupa teks.',
            ],
            'penerbit' => [
                'required' => 'Penerbit harus diisi.',
                'string' => 'Penerbit harus berupa teks.',
            ],
            'tahun_terbit' => [
                'required' => 'Tahun terbit harus diisi.',
                'integer' => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
                'less_than' => 'Tahun terbit harus kurang dari 2024.',
            ],
        ];

        if (!$this->validate($rules, $customMessages)) {
            $data['buku'] = $this->bukuModel->find($id);
            $data['validation'] = $this->validator;
            return view('buku/edit', $data);
        }

        $data = [
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];

        $this->bukuModel->update($id, $data);
        return redirect()->to('/buku')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        return redirect()->to('/buku')->with('success', 'Data buku berhasil dihapus.');
    }
}
