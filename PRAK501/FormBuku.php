<?php
// FormBuku.php
require 'Model.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $book = getBookById($pdo, $id);
} else {
    $book = null;
}

if (isset($_POST['submit'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    if ($book) {
        updateBook($pdo, $id, $judul_buku, $penulis, $penerbit, $tahun_terbit);
    } else {
        addBook($pdo, $judul_buku, $penulis, $penerbit, $tahun_terbit);
    }
    header("Location: Buku.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo $book ? 'Edit Buku' : 'Tambah Buku'; ?></h1>
    <form method="POST">
        <label>Judul Buku:</label>
        <input type="text" name="judul_buku" value="<?php echo $book['judul_buku'] ?? ''; ?>" required><br>
        <label>Penulis:</label>
        <input type="text" name="penulis" value="<?php echo $book['penulis'] ?? ''; ?>" required><br>
        <label>Penerbit:</label>
        <input type="text" name="penerbit" value="<?php echo $book['penerbit'] ?? ''; ?>" required><br>
        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" value="<?php echo $book['tahun_terbit'] ?? ''; ?>" required><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
