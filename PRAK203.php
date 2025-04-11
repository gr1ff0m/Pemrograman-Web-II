<!DOCTYPE html>
<html>

<head>
    <title>Konversi Suhu</title>
</head>

<body>
    <form method="post">
        Nilai: <input type="text" name="nilai" value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : '' ?>"><br><br>

        Dari:<br>
        <input type="radio" name="dari" value="C" <?= (isset($_POST['dari']) && $_POST['dari'] == 'C') ? 'checked' : '' ?>> Celcius<br>
        <input type="radio" name="dari" value="F" <?= (isset($_POST['dari']) && $_POST['dari'] == 'F') ? 'checked' : '' ?>> Fahrenheit<br>
        <input type="radio" name="dari" value="Re" <?= (isset($_POST['dari']) && $_POST['dari'] == 'Re') ? 'checked' : '' ?>> Rheamur<br>
        <input type="radio" name="dari" value="K" <?= (isset($_POST['dari']) && $_POST['dari'] == 'K') ? 'checked' : '' ?>> Kelvin<br><br>

        Ke:<br>
        <input type="radio" name="ke" value="C" <?= (isset($_POST['ke']) && $_POST['ke'] == 'C') ? 'checked' : '' ?>> Celcius<br>
        <input type="radio" name="ke" value="F" <?= (isset($_POST['ke']) && $_POST['ke'] == 'F') ? 'checked' : '' ?>> Fahrenheit<br>
        <input type="radio" name="ke" value="Re" <?= (isset($_POST['ke']) && $_POST['ke'] == 'Re') ? 'checked' : '' ?>> Rheamur<br>
        <input type="radio" name="ke" value="K" <?= (isset($_POST['ke']) && $_POST['ke'] == 'K') ? 'checked' : '' ?>> Kelvin<br>

        <input type="submit" name="submit" value="Konversi">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nilai = floatval($_POST['nilai']);
        $dari = $_POST['dari'];
        $ke = $_POST['ke'];
        $celcius = 0;

        // Ubah ke Celcius
        switch ($dari) {
            case 'C':
                $celcius = $nilai;
                break;
            case 'F':
                $celcius = ($nilai - 32) * 5 / 9;
                break;
            case 'Re':
                $celcius = $nilai * 5 / 4;
                break;
            case 'K':
                $celcius = $nilai - 273.15;
                break;
        }

        // Dari Celcius ke satuan yang dituju
        switch ($ke) {
            case 'C':
                $hasil = $celcius;
                break;
            case 'F':
                $hasil = ($celcius * 9 / 5) + 32;
                break;
            case 'Re':
                $hasil = $celcius * 4 / 5;
                break;
            case 'K':
                $hasil = $celcius + 273.15;
                break;
        }

        echo "<h4>Hasil Konversi: " . round($hasil, 2) . " $ke</h4>";
    }
    ?>
</body>

</html>