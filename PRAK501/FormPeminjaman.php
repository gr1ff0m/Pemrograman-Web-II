<?php
// FormPeminjaman.php
require 'Model.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $loan = getLoanById($pdo, $id);
} else {
    $loan = null;
}

$members = getAllMembers($pdo);
$books = getAllBooks($pdo);

if (isset($_POST['submit'])) {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if ($loan) {
        updateLoan($pdo, $id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    } else {
        addLoan($pdo, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    }
    header("Location: Peminjaman.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo $loan ? 'Edit Peminjaman' : 'Tambah Peminjaman'; ?></h1>
    <form method="POST">
        <label>Member:</label>
        <select name="id_member" required>
            <option value="">Pilih Member</option>
            <?php foreach ($members as $member): ?>
                <option value="<?php echo $member['id_member']; ?>" <?php echo ($loan && $loan['id_member'] == $member['id_member']) ? 'selected' : ''; ?>><?php echo $member['nama_member']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Buku:</label>
        <select name="id_buku" required>
            <option value="">Pilih Buku</option>
            <?php foreach ($books as $book): ?>
                <option value="<?php echo $book['id_buku']; ?>" <?php echo ($loan && $loan['id_buku'] == $book['id_buku']) ? 'selected' : ''; ?>><?php echo $book['judul_buku']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Tanggal Pinjam:</label>
        <input type="date" name="tgl_pinjam" value="<?php echo $loan['tgl_pinjam'] ?? ''; ?>" required><br>

        <label>Tanggal Kembali:</label>
        <input type="date" name="tgl_kembali" value="<?php echo $loan['tgl_kembali'] ?? ''; ?>" required><br>

        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
