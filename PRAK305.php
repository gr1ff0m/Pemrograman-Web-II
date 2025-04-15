<?php
function transformString($input)
{
    $length = strlen($input);
    $output = '';

    for ($i = 0; $i < $length; $i++) {
        $currentChar = $input[$i];
        $firstChar = strtoupper($currentChar);
        $remainingChars = strtolower($currentChar);

        $output .= $firstChar;

        for ($j = 1; $j < $length; $j++) {
            $output .= $remainingChars;
        }
    }

    return $output;
}

if (isset($_POST['input_string'])) {
    $input = $_POST['input_string'];
    $output = transformString($input);
} else {
    $input = '';
    $output = '';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pencetak String</title>
    <style>
        .result-box {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <form method="post">
        <label for="input_string">Masukkan String:</label>
        <input type="text" id="input_string" name="input_string" value="<?php echo htmlspecialchars($input); ?>">
        <input type="submit" value="Cetak">
    </form>

    <?php if (!empty($input)): ?>
        <h3>Input:</h3>
        <p><?php echo htmlspecialchars($input); ?></p>

        <h3>Output:</h3>
        <p><?php echo htmlspecialchars($output); ?></p>
    <?php endif; ?>
</body>

</html>