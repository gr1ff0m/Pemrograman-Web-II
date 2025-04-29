<?php
// Member.php
require 'Model.php';

// Mengambil semua data member
$members = getAllMembers($pdo);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteMember($pdo, $id);
    header("Location: Member.php"); // Redirect ke Member.php setelah hapus
}

if (isset($_POST['delete_all'])) {
    deleteAllMembers($pdo);
    header("Location: Member.php"); // Redirect setelah hapus semua
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Member</h1>
    <a href="FormMember.php">Tambah Member</a>
    <form method="POST">
        <button type="submit" name="delete_all">Hapus Semua Member</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID Member</th>
                <th>Nama Member</th>
                <th>Nomor Member</th>
                <th>Alamat</th>
                <th>Tgl mendaftar</th>
                <th>Tgl terakhir bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach (getAllMembers($pdo) as $member): ?>
    <tr>
        <td><?= $member['id_member']; ?></td>
        <td><?= $member['nama_member']; ?></td>
        <td><?= $member['nomor_member']; ?></td>
        <td><?= $member['alamat']; ?></td>
        <td><?= $member['tgl_mendaftar']; ?></td>
        <td><?= $member['tgl_terakhir_bayar']; ?></td>
        <td>
            <a href="FormMember.php?id=<?= $member['id_member']; ?>">Edit</a>
            <a href="Member.php?delete=<?= $member['id_member']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
