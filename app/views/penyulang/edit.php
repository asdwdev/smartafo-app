<?php startBlock('content') ?>
<h3>EDIT DATA PENYULANG</h3>

<form method="POST" action="/penyulang/<?= $penyulang['penyulang_id'] ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>Kode Penyulang:
        <input type="text" name="kode_penyulang" value="<?= htmlspecialchars($penyulang['kode_penyulang'] ?? '') ?>">
    </label><br><br>

    <label>Nama Penyulang:
        <input type="text" name="nama_penyulang" value="<?= htmlspecialchars($penyulang['nama_penyulang'] ?? '') ?>" required>
    </label><br><br>

    <label>Tegangan (kV):
        <input type="text" name="tegangan_kv" value="<?= htmlspecialchars($penyulang['tegangan_kv'] ?? '') ?>">
    </label><br><br>

    <label>Gardu Induk:
        <select name="gi_id" required>
            <?php foreach ($garduInduk as $gi): ?>
                <option value="<?= $gi['gi_id'] ?>"
                    <?= $gi['gi_id'] == ($penyulang['gi_id'] ?? null) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($gi['nama_gi']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>