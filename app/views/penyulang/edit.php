<?php startBlock('content') ?>
<h3>EDIT DATA PENYULANG</h3>

<?php if (!empty($errors)): ?>
    <div style="color:red; font-weight:bold; margin-bottom:10px;">
        <ul>
            <?php foreach ($errors as $fieldErrors): ?>
                <?php foreach ($fieldErrors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/penyulang/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>Kode Penyulang:
        <input type="text" name="kode_penyulang"
            value="<?= htmlspecialchars($old['kode_penyulang'] ?? $penyulang['kode_penyulang'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <label>Nama Penyulang:
        <input type="text" name="nama_penyulang"
            value="<?= htmlspecialchars($old['nama_penyulang'] ?? $penyulang['nama_penyulang'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            required>
    </label><br><br>

    <label>Tegangan (kV):
        <input type="number" name="tegangan_kv"
            value="<?= htmlspecialchars((string)($old['tegangan_kv'] ?? $penyulang['tegangan_kv'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <label>Gardu Induk:
        <select name="gi_id" required>
            <?php foreach ($garduInduk as $gi): ?>
                <option value="<?= $gi['gi_id'] ?>"
                    <?= ($old['gi_id'] ?? $penyulang['gi_id'] ?? null) == $gi['gi_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($gi['nama_gi'], ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>