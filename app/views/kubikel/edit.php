<?php startBlock('content') ?>
<h3>Edit Kubikel</h3>

<form method="POST" action="/kubikel/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>No Seri: <input type="text" name="no_seri" value="<?= htmlspecialchars($kubikel['no_seri']) ?>" required></p>
    <p>Merk: <input type="text" name="merk" value="<?= htmlspecialchars($kubikel['merk']) ?>"></p>
    <p>Jenis: <input type="text" name="jenis" value="<?= htmlspecialchars($kubikel['jenis']) ?>"></p>
    <p>Fungsi: <input type="text" name="fungsi" value="<?= htmlspecialchars($kubikel['fungsi']) ?>"></p>
    <p>Tegangan (kV): <input type="number" step="0.001" name="tegangan_kv" value="<?= htmlspecialchars($kubikel['tegangan_kv']) ?>"></p>
    <p>Kapasitas (A): <input type="number" step="0.01" name="kapasitas_a" value="<?= htmlspecialchars($kubikel['kapasitas_a']) ?>"></p>
    <p>Impedansi (%): <input type="number" step="0.001" name="impedansi_persen" value="<?= htmlspecialchars($kubikel['impedansi_persen']) ?>"></p>
    <p>Catatan: <textarea name="catatan"><?= htmlspecialchars($kubikel['catatan']) ?></textarea></p>
    <p><button type="submit">Update</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>