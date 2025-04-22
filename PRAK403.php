<?php
$data_mahasiswa = [
    [
        'No' => 1,
        'Nama' => 'Ridho',
        'Mata_Kuliah' => [
            ['nama' => 'Pemrograman I', 'SKS' => 2],
            ['nama' => 'Praktikum Pemrograman I', 'SKS' => 1],
            ['nama' => 'Pengantar Lingkungan Lahan Basah', 'SKS' => 2],
            ['nama' => 'Arsitektur Komputer', 'SKS' => 3]
        ]
    ],
    [
        'No' => 2,
        'Nama' => 'Ratna',
        'Mata_Kuliah' => [
            ['nama' => 'Basis Data I', 'SKS' => 2],
            ['nama' => 'Praktikum Basis Data I', 'SKS' => 1],
            ['nama' => 'Kalkulus', 'SKS' => 3]
        ]
    ],
    [
        'No' => 3,
        'Nama' => 'Tono',
        'Mata_Kuliah' => [
            ['nama' => 'Rekayasa Perangkat Lunak', 'SKS' => 3],
            ['nama' => 'Analisis dan Perancangan Sistem', 'SKS' => 3],
            ['nama' => 'Komputasi Awan', 'SKS' => 3],
            ['nama' => 'Kecerdasan Bisnis', 'SKS' => 3]
        ]
    ]
];

// Hitung total SKS dan tambahkan keterangan
foreach ($data_mahasiswa as &$mahasiswa) {
    $total_sks = 0;
    foreach ($mahasiswa['Mata_Kuliah'] as $matkul) {
        $total_sks += $matkul['SKS'];
    }

    $mahasiswa['Total_SKS'] = $total_sks;
    $mahasiswa['Keterangan'] = ($total_sks < 7) ? 'Revisi KRS' : 'Tidak Revisi';
    $mahasiswa['Warna'] = ($total_sks < 7) ? '#FF6B6B' : '#77DD77'; // Warna pastel
}
unset($mahasiswa);

// CSS
echo "<style>
    table {
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        vertical-align: top;
    }
    th {
        background-color: #f2f2f2;
    }
</style>";

// Tabel
echo "<table>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
      </tr>";

foreach ($data_mahasiswa as $mahasiswa) {
    foreach ($mahasiswa['Mata_Kuliah'] as $index => $matkul) {
        echo "<tr>";
        echo "<td>" . ($index === 0 ? $mahasiswa['No'] : "") . "</td>";
        echo "<td>" . ($index === 0 ? $mahasiswa['Nama'] : "") . "</td>";
        echo "<td>{$matkul['nama']}</td>";
        echo "<td>{$matkul['SKS']}</td>";
        echo "<td>" . ($index === 0 ? $mahasiswa['Total_SKS'] : "") . "</td>";
        echo "<td style='background-color:" . ($index === 0 ? $mahasiswa['Warna'] : "") . ";'>" . ($index === 0 ? $mahasiswa['Keterangan'] : "") . "</td>";
        echo "</tr>";
    }
}

echo "</table>";
?>
