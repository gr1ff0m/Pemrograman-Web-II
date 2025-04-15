<?php
// Fungsi untuk membentuk segitiga gambar terbalik
function buatSegitigaGambarTerbalik($tingkat, $gambarURL)
{
    $i = $tingkat; // Mulai dari tingkat terbesar

    echo "<div style='font-family: monospace; line-height: 1.2;'>";

    // Perulangan untuk setiap baris segitiga, dimulai dari tingkat tertinggi
    while ($i >= 1) {
        $j = 1;

        // Cetak spasi agar gambar terlihat seperti segitiga
        $sisa = $tingkat - $i; // Banyaknya spasi pada baris ini
        while ($sisa > 0) {
            echo "<span style='display:inline-block; width:28px;'></span>";
            $sisa--;
        }

        // Cetak gambar sesuai dengan jumlah kolom di baris ini
        while ($j <= $i) {
            echo "<img src=\"$gambarURL\" style=\"width:28px; height:28px; margin-right:1px;\">";
            $j++;
        }

        echo "<br>";
        $i--; // Kurangi jumlah baris untuk membuat segitiga terbalik
    }

    echo "</div>";
}

// Tangani input dari form dan tampilkan output setelah form
$tingkat = 0;
$gambarURL = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tingkat = isset($_POST["tinggi"]) ? intval($_POST["tinggi"]) : 0;
    $gambarURL = isset($_POST["url"]) ? trim($_POST["url"]) : "";

    if ($tingkat > 0 && filter_var($gambarURL, FILTER_VALIDATE_URL)) {
        $output = "<h3>Output:</h3>";
        ob_start();  // Mulai menangkap output
        buatSegitigaGambarTerbalik($tingkat, $gambarURL); // Panggil fungsi untuk membuat segitiga terbalik
        $output .= ob_get_clean();  // Menyimpan output yang ditangkap dalam variabel
    } else {
        $output = "<p style='color:red;'>Input tidak valid! Pastikan URL gambar benar.</p>";
    }
} else {
    $output = "";  // Tidak ada output jika form belum disubmit
}
?>

<!-- Form input -->
<form method="post">
    <label for="tinggi">Tinggi:</label>
    <input type="number" id="tinggi" name="tinggi" min="1" required><br><br>

    <label for="url">URL Gambar:</label>
    <input type="text" id="url" name="url" required><br><br>

    <button type="submit">Cetak</button>
</form>

<!-- Output segitiga gambar terbalik -->
<?php
// Tampilkan output segitiga gambar terbalik di bawah form setelah form disubmit
echo $output;
?>