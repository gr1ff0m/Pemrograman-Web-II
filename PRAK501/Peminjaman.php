<?php
// ===== FILE: Peminjaman.php =====
require_once "Model.php";
$peminjaman = getAllPeminjaman();

if (isset($_GET['hapus'])) {
    deletePeminjaman($_GET['hapus']);
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Data Peminjaman</title></head>
<body>
<h2>Data Peminjaman</h2>
<a href="FormPeminjaman.php">Tambah Peminjaman</a>
<table border="1" cellpadding="5">
    <tr><th>Nama Member</th><th>Judul Buku</th><th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Aksi</th></tr>
    <?php while ($p = $peminjaman->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($p['nama_member']) ?></td>
            <td><?= htmlspecialchars($p['judul_buku']) ?></td>
            <td><?= $p['tgl_pinjam'] ?></td>
            <td><?= $p['tgl_kembali'] ?></td>
            <td>
                <a href="FormPeminjaman.php?id=<?= $p['id_peminjaman'] ?>">Edit</a> |
                <a href="?hapus=<?= $p['id_peminjaman'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body></html>