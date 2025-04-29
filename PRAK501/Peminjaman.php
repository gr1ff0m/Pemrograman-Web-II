<?php
// Peminjaman.php
require 'Model.php';

$peminjaman = getAllLoans($pdo);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteLoan($pdo, $id);
    header("Location: Peminjaman.php");
}

if (isset($_POST['delete_all'])) {
    deleteAllLoans($pdo);
    header("Location: Peminjaman.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Peminjaman</h1>
    <a href="FormPeminjaman.php">Tambah Peminjaman</a>
    <form method="POST">
        <button type="submit" name="delete_all">Hapus Semua Peminjaman</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>Nama Member</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peminjaman as $loan): ?>
                <tr>
                    <td><?php echo $loan['id_peminjaman']; ?></td>
                    <td><?php echo getMemberById($pdo, $loan['id_member'])['nama_member']; ?></td>
                    <td><?php echo getBookById($pdo, $loan['id_buku'])['judul_buku']; ?></td>
                    <td><?php echo $loan['tgl_pinjam']; ?></td>
                    <td><?php echo $loan['tgl_kembali']; ?></td>
                    <td>
                        <a href="FormPeminjaman.php?id=<?php echo $loan['id_peminjaman']; ?>">Edit</a>
                        <a href="?delete=<?php echo $loan['id_peminjaman']; ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
