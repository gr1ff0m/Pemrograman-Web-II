<!DOCTYPE html>
<html>

<head>
    <title>Konversi Bilangan ke Ejaan</title>
</head>

<body>

    <form method="post">
        <label>Nilai :</label><br>
        <input type="number" name="angka" min="0"><br>
        <input type="submit" name="konversi" value="Konversi">
    </form>

    <?php
    if (isset($_POST['konversi'])) {
        $angka = $_POST['angka'];

        function ejaanBilangan($angka)
        {
            if (!is_numeric($angka) || $angka < 0 || $angka > 999) {
                return "Anda Menginput Melebihi Limit Bilangan";
            } elseif ($angka == 0) {
                return "Nol";
            } elseif ($angka < 10) {
                return "Satuan";
            } elseif ($angka < 20) {
                return "Belasan";
            } elseif ($angka < 100) {
                return "Puluhan";
            } else {
                return "Ratusan";
            }
        }

        $hasil = ejaanBilangan($angka);
        echo "<h2>Hasil: $hasil</h2>";
    }
    ?>

</body>

</html>