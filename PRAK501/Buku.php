<?php
// Buku.php
require 'Model.php';

$buku = getAllBooks($pdo);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteBook($pdo, $id);
    header("Location: Buku.php");
}

if (isset($_POST['delete_all'])) {
    deleteAllBooks($pdo);
    header("Location: Buku.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Buku</h1>
    <a href="FormBuku.php">Tambah Buku</a>
    <form method="POST">
        <button type="submit" name="delete_all">Hapus Semua Buku</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku as $b): ?>
                <tr>
                    <td><?php echo $b['id_buku']; ?></td>
                    <td><?php echo $b['judul_buku']; ?></td>
                    <td><?php echo $b['penulis']; ?></td>
                    <td><?php echo $b['penerbit']; ?></td>
                    <td>
                        <a href="FormBuku.php?id=<?php echo $b['id_buku']; ?>">Edit</a>
                        <a href="?delete=<?php echo $b['id_buku']; ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
