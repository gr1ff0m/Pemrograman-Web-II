<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone Samsung</title>
    <style>

        table, th, td {
            border: 1px solid black;
        }

        th {
            background-color: red;
            color: black;
            font-weight: bold;
            font-size: 24px;
            text-align: left;
            padding: 20px 0px;
            font-family: 'Times New Roman', Times, serif;
        }

        td {
            padding: 2px;
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>

    <?php
    $smartphones = [
        "s1" => "Samsung Galaxy S22",
        "s2" => "Samsung Galaxy S22+",
        "s3" => "Samsung Galaxy A03",
        "s4" => "Samsung Galaxy Xcover 5"
    ];

    echo "<table>";
    echo "<tr><th><b>Daftar Smartphone Samsung</b></th></tr>";

    foreach ($smartphones as $key => $phone) {
        echo "<tr><td>$phone</td></tr>";
    }

    echo "</table>";
    ?>

</body>

</html>
