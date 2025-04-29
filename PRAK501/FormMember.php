<?php
// FormMember.php
require 'Model.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $member = getMemberById($pdo, $id);
} else {
    $member = null;
}

if (isset($_POST['submit'])) {
    $nama_member = $_POST['nama_member'];
    $nomor_member = $_POST['nomor_member'];
    $alamat = $_POST['alamat'];
    $tgl_mendaftar = $_POST['tgl_mendaftar'];
    $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];

    if ($member) {
        updateMember($pdo, $id, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);
    } else {
        addMember($pdo, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);
    }
    header("Location: Member.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo $member ? 'Edit Member' : 'Tambah Member'; ?></h1>
    <form method="POST">
        <label>Nama Member:</label>
        <input type="text" name="nama_member" value="<?php echo $member['nama_member'] ?? ''; ?>" required><br>
        <label>Nomor Member:</label>
        <input type="text" name="nomor_member" value="<?php echo $member['nomor_member'] ?? ''; ?>" required><br>
        <label>Alamat:</label>
        <textarea name="alamat" required><?php echo $member['alamat'] ?? ''; ?></textarea><br>
        <label>Tanggal Mendaftar:</label>
        <input type="date" name="tgl_mendaftar" value="<?php echo $member['tgl_mendaftar'] ?? ''; ?>" required><br>
        <label>Tanggal Terakhir Bayar:</label>
        <input type="date" name="tgl_terakhir_bayar" value="<?php echo $member['tgl_terakhir_bayar'] ?? ''; ?>" required><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
