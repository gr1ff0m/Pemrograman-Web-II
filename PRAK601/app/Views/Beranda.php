<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>Selamat Datang di Halaman Beranda!</h2>

<div style="background-color: #f1f1f1; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <h3>Informasi tentang praktikan</h3>
    <p><strong>Nama Praktikan:</strong> <?= esc($praktikan['nama']) ?></p>
    <p><strong>NIM:</strong> <?= esc($praktikan['nim']) ?></p>
</div>

<?= $this->endSection() ?>
