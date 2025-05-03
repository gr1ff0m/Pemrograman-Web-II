<?php
// ===== FILE: FormMember.php =====
require_once "Model.php";

$id = $_GET['id'] ?? '';
$data = $id ? getMemberById($id) : ['nama_member'=>'','nomor_member'=>'','alamat'=>'','tgl_mendaftar'=>'','tgl_terakhir_bayar'=>''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = [
        'nama' => $_POST['nama'],
        'nomor' => $_POST['nomor'],
        'alamat' => $_POST['alamat'],
        'tgl_daftar' => $_POST['tgl_daftar'],
        'tgl_bayar' => $_POST['tgl_bayar']
    ];
    $id ? updateMember($id, $form) : insertMember($form);
    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Form Member</title></head>
<body>
<h2><?= $id ? 'Edit' : 'Tambah' ?> Member</h2>
<form method="post">
    Nama: <input type="text" name="nama" value="<?= htmlspecialchars($data['nama_member']) ?>"><br>
    Nomor: <input type="text" name="nomor" value="<?= htmlspecialchars($data['nomor_member']) ?>"><br>
    Alamat: <textarea name="alamat"><?= htmlspecialchars($data['alamat']) ?></textarea><br>
    Tgl Daftar: <input type="datetime-local" name="tgl_daftar" value="<?= date('Y-m-d\TH:i', strtotime($data['tgl_mendaftar'])) ?>"><br>
    Tgl Bayar: <input type="date" name="tgl_bayar" value="<?= $data['tgl_terakhir_bayar'] ?>"><br>
    <input type="submit" value="Simpan">
</form>
</body></html>