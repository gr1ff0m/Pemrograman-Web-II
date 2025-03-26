<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone Samsung</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <?php
    $smartphones = [
        "Samsung Galaxy S22",
        "Samsung Galaxy S22+",
        "Samsung Galaxy A03",
        "Samsung Galaxy Xcover 5"
    ];

    echo "<table>";
    echo "<tr><th><b>Daftar Smartphone Samsung</b></th></tr>";

    foreach ($smartphones as $phone) {
        echo "<tr><td>$phone</td></tr>";
    }

    echo "</table>";
    ?>

</body>

</html>