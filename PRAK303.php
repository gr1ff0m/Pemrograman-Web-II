<?php
// Fungsi untuk menampilkan deret dan mengganti bilangan tertentu dengan gambar bintang
function tampilkanDeret($batasBawah, $batasAtas)
{
    $i = $batasBawah;

    // Perulangan menggunakan do-while
    do {
        // Mengecek apakah bilangan + 7 merupakan kelipatan 5
        if (($i + 7) % 5 == 0) {
            // Jika ya, tampilkan gambar bintang kecil
            echo "<img src='star-images-9441.png' width='15' height='15'> ";
        } else {
            // Jika tidak, tampilkan bilangan
            echo $i . " ";
        }
        // Menambah nilai perulangan
        $i++;
    } while ($i <= $batasAtas); // Perulangan berlanjut hingga batas atas
}

// Menampilkan form input
echo '
<form method="post" action="">
    <label for="batasBawah">Batas Bawah: </label>
    <input type="number" name="batasBawah" value="' . (isset($_POST['batasBawah']) ? $_POST['batasBawah'] : '') . '" required><br>
    
    <label for="batasAtas">Batas Atas: </label>
    <input type="number" name="batasAtas" value="' . (isset($_POST['batasAtas']) ? $_POST['batasAtas'] : '') . '" required><br>
    
    <input type="submit" value="cetak">
</form>';

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai input dari form
    $batasBawah = (int) $_POST['batasBawah'];
    $batasAtas = (int) $_POST['batasAtas'];

    // Menampilkan deret dengan gambar bintang di bawah form
    echo "<br>Deret bilangan: <br>";
    tampilkanDeret($batasBawah, $batasAtas);
}
