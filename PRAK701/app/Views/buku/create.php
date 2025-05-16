<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Buku Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            margin-top: 15px;
        }
        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        form button {
            margin-top: 25px;
            padding: 12px 20px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #1c5980;
        }
        .validation-errors {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .back-link {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #2980b9;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Tambah Buku Baru</h1>

<?php if (isset($validation)): ?>
    <div class="validation-errors">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="/buku/store" method="post">
    <?= csrf_field() ?>
    
    <label for="judul">Judul</label>
    <input type="text" id="judul" name="judul" value="<?= set_value('judul') ?>" required>
    
    <label for="penulis">Penulis</label>
    <input type="text" id="penulis" name="penulis" value="<?= set_value('penulis') ?>" required>
    
    <label for="penerbit">Penerbit</label>
    <input type="text" id="penerbit" name="penerbit" value="<?= set_value('penerbit') ?>" required>
    
    <label for="tahun_terbit">Tahun Terbit</label>
    <input type="number" id="tahun_terbit" name="tahun_terbit" value="<?= set_value('tahun_terbit') ?>" min="1801" max="2023" required>
    
    <button type="submit">Simpan</button>
</form>

<a href="/buku" class="back-link">&larr; Kembali ke Daftar Buku</a>

</body>
</html>
