<?php
// Unutk mengecek apakah form sudah disubmit dan input valid
$jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;
?>

<form method="post">
    Jumlah Peserta : <input type="number" name="jumlah" min="1" required value="<?php echo $jumlah; ?>"> <br>
    <input type="submit" name="submit" value="Cetak">
</form>

<?php
if (isset($_POST['submit']) && $jumlah > 0) {
    echo "<h3>Output:</h3>";
    $i = 1;

    while ($i <= $jumlah) {
        // Warna bergantian: ganjil merah, genap hijau
        $warna = ($i % 2 == 1) ? 'red' : 'green';
        echo "<H1 style='color:$warna; font-weight:bold;'>Peserta ke-$i</H1>";
        $i++;
    }
}
?>