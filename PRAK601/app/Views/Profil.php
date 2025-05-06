<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>Profil Praktikan</h2>

<div style="background-color: #f1f1f1; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <ul style="list-style-type: none; padding: 0;">
        <li><strong>Nama Lengkap:</strong> <?= esc($profil['nama']) ?></li>
        <li><strong>NIM:</strong> <?= esc($profil['nim']) ?></li>
        <li><strong>Asal Prodi:</strong> <?= esc($profil['prodi']) ?></li>
        <li><strong>Hobi:</strong> <?= esc($profil['hobi']) ?></li>
        <li><strong>Skill:</strong> <?= esc(implode(', ', $profil['skill'])) ?></li>
    </ul>

    <?php if (!empty($profil['gambar'])): ?>
        <div style="text-align: center; margin-top: 20px;">
            <strong>Foto Profil:</strong>
            <br>
            <img src="<?= base_url('images/' . $profil['gambar']) ?>" alt="Foto Profil" width="200" style="border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
