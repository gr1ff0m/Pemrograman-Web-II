<?php
// ===== FILE: Member.php =====
require_once "Model.php";
$members = getAllMember();

if (isset($_GET['hapus'])) {
    deleteMember($_GET['hapus']);
    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Data Member</title></head>
<body>
<h2>Data Member</h2>
<a href="FormMember.php">Tambah Member</a>
<table border="1" cellpadding="5">
    <tr><th>Nama</th><th>Nomor</th><th>Alamat</th><th>Aksi</th></tr>
    <?php while ($m = $members->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($m['nama_member']) ?></td>
            <td><?= htmlspecialchars($m['nomor_member']) ?></td>
            <td><?= htmlspecialchars($m['alamat']) ?></td>
            <td>
                <a href="FormMember.php?id=<?= $m['id_member'] ?>">Edit</a> |
                <a href="?hapus=<?= $m['id_member'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body></html>