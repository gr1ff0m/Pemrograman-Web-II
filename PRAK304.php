<?php
session_start();

// Tangani aksi dari tombol
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['jumlah_bintang'])) {
        $_SESSION['jumlah_bintang'] = 0;
    }

    if (isset($_POST['tambah'])) {
        $_SESSION['jumlah_bintang']++;
    } elseif (isset($_POST['kurang']) && $_SESSION['jumlah_bintang'] > 0) {
        $_SESSION['jumlah_bintang']--;
    } elseif (isset($_POST['set_jumlah'])) {
        $input = intval($_POST['jumlah_input']);
        if ($input >= 0) {
            $_SESSION['jumlah_bintang'] = $input;
        }
    }
}

// Ambil jumlah jika sudah diset
$jumlah = isset($_SESSION['jumlah_bintang']) ? $_SESSION['jumlah_bintang'] : null;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tampilkan Bintang</title>
</head>

<body>

    <!-- Form untuk input jumlah -->
    <form method="post">
        <label for="jumlah_input">Masukkan jumlah bintang yang diinginkan:</label>
        <input type="number" id="jumlah_input" name="jumlah_input" min="0" value="<?= $jumlah !== null ? $jumlah : '' ?>"> <br>
        <button type="submit" name="set_jumlah">Submit</button>
    </form>

    <hr>

    <!-- Tampilkan bintang hanya jika sudah ada jumlah -->
    <?php if ($jumlah !== null): ?>
        <h3>Jumlah Bintang: <?= $jumlah ?></h3>
        <div>
            <?php for ($i = 0; $i < $jumlah; $i++): ?>
                <img src="star-images-9441.png" alt="bintang" width="30" height="30">
            <?php endfor; ?>
        </div>

        <!-- Tombol tambah dan kurang setelah output -->
        <form method="post" style="margin-top: 10px;">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php else: ?>
        <p><em>Belum ada bintang. Silakan masukkan jumlah terlebih dahulu.</em></p>
    <?php endif; ?>
</body>

</html>