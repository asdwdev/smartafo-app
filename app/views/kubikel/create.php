<?php startBlock('content') ?>
<h3>Tambah Kubikel</h3>

<?php if (!empty($errors)): ?>
    <div style="color:red; margin-bottom:10px;">
        <ul>
            <?php foreach ($errors as $field => $msgs): ?>
                <?php foreach ($msgs as $msg): ?>
                    <li><?= htmlspecialchars($msg) ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/kubikel">
    <p>No Seri: <input type="text" name="no_seri" value="<?= htmlspecialchars($_POST['no_seri'] ?? '') ?>" required></p>
    <p>Merk: <input type="text" name="merk" value="<?= htmlspecialchars($_POST['merk'] ?? '') ?>"></p>
    <p>Jenis: <input type="text" name="jenis" value="<?= htmlspecialchars($_POST['jenis'] ?? '') ?>"></p>
    <p>Fungsi: <input type="text" name="fungsi" value="<?= htmlspecialchars($_POST['fungsi'] ?? '') ?>"></p>
    <p>Tegangan (kV): <input type="number" step="0.001" name="tegangan_kv" value="<?= htmlspecialchars($_POST['tegangan_kv'] ?? '') ?>"></p>
    <p>Kapasitas (A): <input type="number" step="0.01" name="kapasitas_a" value="<?= htmlspecialchars($_POST['kapasitas_a'] ?? '') ?>"></p>
    <p>Impedansi (%): <input type="number" step="0.001" name="impedansi_persen" value="<?= htmlspecialchars($_POST['impedansi_persen'] ?? '') ?>"></p>
    <p>Catatan: <textarea name="catatan"><?= htmlspecialchars($_POST['catatan'] ?? '') ?></textarea></p>
    <p><button type="submit">Simpan</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>