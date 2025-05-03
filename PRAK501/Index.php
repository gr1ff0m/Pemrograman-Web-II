<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Perpustakaan</h1>
        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manajemen Member</h5>
                        <p class="card-text">Tambah, ubah, dan hapus data anggota perpustakaan.</p>
                        <a href="Member.php" class="btn btn-primary">Kelola Member</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manajemen Buku</h5>
                        <p class="card-text">Kelola daftar buku yang tersedia di perpustakaan.</p>
                        <a href="Buku.php" class="btn btn-success">Kelola Buku</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manajemen Peminjaman</h5>
                        <p class="card-text">Lihat dan atur transaksi peminjaman buku.</p>
                        <a href="Peminjaman.php" class="btn btn-warning text-white">Kelola Peminjaman</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
