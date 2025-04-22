<?php
// Data awal mahasiswa
$mahasiswa = [
    [
        "nama" => "Andi",
        "nim" => "2101001",
        "uts" => 87,
        "uas" => 65
    ],
    [
        "nama" => "Budi",
        "nim" => "2101002",
        "uts" => 76,
        "uas" => 79
    ],
    [
        "nama" => "Tono",
        "nim" => "2101003",
        "uts" => 50,
        "uas" => 41
    ],
    [
        "nama" => "Jessica",
        "nim" => "2101004",
        "uts" => 60,
        "uas" => 75
    ]
];

// Proses perhitungan nilai akhir dan huruf
for ($i = 0; $i < count($mahasiswa); $i++) {
    $uts = $mahasiswa[$i]['uts'];
    $uas = $mahasiswa[$i]['uas'];
    $nilaiAkhir = (0.4 * $uts) + (0.6 * $uas);
    $mahasiswa[$i]['nilai_akhir'] = round($nilaiAkhir, 1);

    // Menentukan nilai huruf
    if ($nilaiAkhir >= 80) {
        $mahasiswa[$i]['nilai_huruf'] = 'A';
    } elseif ($nilaiAkhir >= 70) {
        $mahasiswa[$i]['nilai_huruf'] = 'B';
    } elseif ($nilaiAkhir >= 60) {
        $mahasiswa[$i]['nilai_huruf'] = 'C';
    } elseif ($nilaiAkhir >= 50) {
        $mahasiswa[$i]['nilai_huruf'] = 'D';
    } else {
        $mahasiswa[$i]['nilai_huruf'] = 'E';
    }
}

// Tampilkan dalam bentuk tabel
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Nama</th><th>NIM</th><th>UTS</th><th>UAS</th><th>Nilai Akhir</th><th>Nilai Huruf</th></tr>";

foreach ($mahasiswa as $mhs) {
    echo "<tr>
            <td>{$mhs['nama']}</td>
            <td>{$mhs['nim']}</td>
            <td>{$mhs['uts']}</td>
            <td>{$mhs['uas']}</td>
            <td>{$mhs['nilai_akhir']}</td>
            <td>{$mhs['nilai_huruf']}</td>
          </tr>";
}
echo "</table>";
?>