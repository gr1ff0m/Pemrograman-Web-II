<?php
// ===== FILE: FormBuku.php =====
require_once "Model.php";

$id = $_GET['id'] ?? '';
$data = $id ? getBukuById($id) : ['judul_buku'=>'','penulis'=>'','penerbit'=>'','tahun_terbit'=>''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = [
        'judul' => $_POST['judul'],
        'penulis' => $_POST['penulis'],
        'penerbit' => $_POST['penerbit'],
        'tahun' => (int)$_POST['tahun']
    ];
    $id ? updateBuku($id, $form) : insertBuku($form);
    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Form Buku</title></head>
<body>
<h2><?= $id ? 'Edit' : 'Tambah' ?> Buku</h2>
<form method="post">
    Judul: <input type="text" name="judul" value="<?= htmlspecialchars($data['judul_buku']) ?>"><br>
    Penulis: <input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']) ?>"><br>
    Penerbit: <input type="text" name="penerbit" value="<?= htmlspecialchars($data['penerbit']) ?>"><br>
    Tahun: <input type="number" name="tahun" value="<?= $data['tahun_terbit'] ?>"><br>
    <input type="submit" value="Simpan">
</form>
</body></html>