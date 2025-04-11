<!DOCTYPE html>
<html>

<head>
    <title>Form Validasi</title>
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <?php
    // Inisialisasi variabel
    $nama = $nim = $gender = "";
    $namaErr = $nimErr = $genderErr = "";
    $successMessage = "";
    $isSubmitted = $_SERVER["REQUEST_METHOD"] == "POST";

    if ($isSubmitted) {
        $valid = true;

        if (empty($_POST["nama"])) {
            $namaErr = "nama tidak boleh kosong";
            $valid = false;
        } else {
            $nama = htmlspecialchars($_POST["nama"]);
        }

        if (empty($_POST["nim"])) {
            $nimErr = "nim tidak boleh kosong";
            $valid = false;
        } else {
            $nim = htmlspecialchars($_POST["nim"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "jenis kelamin tidak boleh kosong";
            $valid = false;
        } else {
            $gender = $_POST["gender"];
        }

        if ($valid) {
            $successMessage = "<h3>Output :</h3>
            $nama<br>
            $nim<br>
            $gender<br>";
        }
    }
    ?>

    <form method="post" action="">
        Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
        <?php if ($isSubmitted && $namaErr) : ?>
            <span class="error">* <?php echo $namaErr; ?></span>
        <?php endif; ?>
        <br>

        Nim: <input type="text" name="nim" value="<?php echo $nim; ?>">
        <?php if ($isSubmitted && $nimErr) : ?>
            <span class="error">* <?php echo $nimErr; ?></span>
        <?php endif; ?>
        <br>

        Jenis Kelamin:
        <?php if ($isSubmitted && $genderErr) : ?>
            <span class="error">* <?php echo $genderErr; ?></span>
        <?php endif; ?>
        <br>
        <input type="radio" name="gender" value="Laki-Laki" <?php if ($gender == "Laki-Laki") echo "checked"; ?>> Laki-Laki<br>
        <input type="radio" name="gender" value="Perempuan" <?php if ($gender == "Perempuan") echo "checked"; ?>> Perempuan<br>
        <input type="submit" value="Submit">
    </form>

    <br>
    <?php
    // Tampilkan output setelah form
    if (!empty($successMessage)) {
        echo $successMessage;
    }
    ?>

</body>

</html>