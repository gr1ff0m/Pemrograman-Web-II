<!DOCTYPE html>
<html>
<head>
    <title>Input Matriks</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: center;
        }
        textarea {
            width: 300px;
            height: 60px;
        }
    </style>
</head>
<body>
    <?php
    // Siapkan variabel kosong sebagai default
    $panjang = isset($_POST["panjang"]) ? (int) $_POST["panjang"] : '';
    $lebar = isset($_POST["lebar"]) ? (int) $_POST["lebar"] : '';
    $nilaiStr = isset($_POST["nilai"]) ? htmlspecialchars($_POST["nilai"]) : '';
    ?>

    <form method="post">
        <label for="panjang">Panjang :</label>
        <input type="number" name="panjang" value="<?= $panjang ?>" required><br>

        <label for="lebar">Lebar :</label>
        <input type="number" name="lebar" value="<?= $lebar ?>" required><br>

        <label for="nilai">Nilai Matriks :</label><br>
        <textarea name="nilai" required><?= $nilaiStr ?></textarea><br>

        <input type="submit" value="Cetak Matriks">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilaiArray = explode(" ", trim($_POST["nilai"]));
        $jumlahNilai = count($nilaiArray);

        echo "<h3>Output Matriks:</h3>";

        if ($jumlahNilai != $panjang * $lebar) {
            echo "<p style='color:red;'>Jumlah nilai tidak sesuai dengan ukuran matriks.</p>";
        } else {
            echo "<table>";
            $index = 0;
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . htmlspecialchars($nilaiArray[$index]) . "</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>
