<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        .success, .error {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            width: 100%;
            max-width: 500px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 900px;
            background: white;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a.button {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        a.button:hover {
            background-color: #0056b3;
        }
        .action-links a {
            margin-right: 10px;
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Daftar Buku</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="/buku/create" class="button">Tambah Buku Baru</a>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($buku)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Tidak ada data buku.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($buku as $item): ?>
                <tr>
                    <td><?= esc($item['judul']) ?></td>
                    <td><?= esc($item['penulis']) ?></td>
                    <td><?= esc($item['penerbit']) ?></td>
                    <td><?= esc($item['tahun_terbit']) ?></td>
                    <td class="action-links">
                        <a href="/buku/edit/<?= $item['id'] ?>">Edit</a>
                        <a href="/buku/delete/<?= $item['id'] ?>" onclick="return confirm('Yakin ingin menghapus buku ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
     <a href="<?= base_url('/logout') ?>" 
   style="display:inline-block; margin-top: 20px; padding: 8px 15px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 5px;">
   Logout
</a>               
</body>
</html>
