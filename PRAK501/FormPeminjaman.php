<?php
// ===== FILE: FormPeminjaman.php =====
require_once "Model.php";

$id = $_GET['id'] ?? '';
$data = $id ? getPeminjamanById($id) : ['id_member'=>'','id_buku'=>'','tgl_pinjam'=>'','tgl_kembali'=>''];

$members = getAllMember();
$buku = getAllBuku();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = [
        'id_member' => $_POST['id_member'],
        'id_buku' => $_POST['id_buku'],
        'tgl_pinjam' => $_POST['tgl_pinjam'],
        'tgl_kembali' => $_POST['tgl_kembali']
    ];
    $id ? updatePeminjaman($id, $form) : insertPeminjaman($form);
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Form Peminjaman</title></head>
<body>
<h2><?= $id ? 'Edit' : 'Tambah' ?> Peminjaman</h2>
<form method="post">
    Member: <select name="id_member">
        <?php while ($m = $members->fetch_assoc()): ?>
            <option value="<?= $m['id_member'] ?>" <?= $data['id_member'] == $m['id_member'] ? 'selected' : '' ?>><?= htmlspecialchars($m['nama_member']) ?></option>
        <?php endwhile; ?>
    </select><br>

    Buku: <select name="id_buku">
        <?php while ($b = $buku->fetch_assoc()): ?>
            <option value="<?= $b['id_buku'] ?>" <?= $data['id_buku'] == $b['id_buku'] ? 'selected' : '' ?>><?= htmlspecialchars($b['judul_buku']) ?></option>
        <?php endwhile; ?>
    </select><br>

    Tgl Pinjam: <input type="date" name="tgl_pinjam" value="<?= $data['tgl_pinjam'] ?>"><br>
    Tgl Kembali: <input type="date" name="tgl_kembali" value="<?= $data['tgl_kembali'] ?>"><br>
    <input type="submit" value="Simpan">
</form>
</body></html>