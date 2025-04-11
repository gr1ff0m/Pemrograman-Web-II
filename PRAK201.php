<!DOCTYPE html>
<html>

<head>
    <title>Urutkan Nama</title>
</head>

<body>
    <form method="post">
        <label>Nama 1: <input type="text" name="nama1"></label><br>
        <label>Nama 2: <input type="text" name="nama2"></label><br>
        <label>Nama 3: <input type="text" name="nama3"></label><br>
        <input type="submit" name="submit" value="Urutkan">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = [
            trim($_POST['nama1']),
            trim($_POST['nama2']),
            trim($_POST['nama3'])
        ];

        sort($nama, SORT_STRING); // Mengurutkan secara alfabetis

        echo "<table border='1' style='margin-top: 20px'>";
        echo "<tr><th>Output</th></tr>";

        foreach ($nama as $n) {
            echo "<tr><td>" . htmlspecialchars($n) . "</td></tr>";
        }

        echo "</table>";
    }
    ?>
</body>

</html>