<?php
// ===== FILE: Buku.php =====
require_once "Model.php";
$buku = getAllBuku();

if (isset($_GET['hapus'])) {
    deleteBuku($_GET['hapus']);
    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Data Buku</title></head>
<body>
<h2>Data Buku</h2>
<a href="FormBuku.php">Tambah Buku</a>
<table border="1" cellpadding="5">
    <tr><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun</th><th>Aksi</th></tr>
    <?php while ($b = $buku->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($b['judul_buku']) ?></td>
            <td><?= htmlspecialchars($b['penulis']) ?></td>
            <td><?= htmlspecialchars($b['penerbit']) ?></td>
            <td><?= $b['tahun_terbit'] ?></td>
            <td>
                <a href="FormBuku.php?id=<?= $b['id_buku'] ?>">Edit</a> |
                <a href="?hapus=<?= $b['id_buku'] ?>" onclick="return confirm('Hapus buku ini?')">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body></html>
