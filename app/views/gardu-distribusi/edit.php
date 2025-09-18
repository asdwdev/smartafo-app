<?php startBlock('content') ?>
<h3>EDIT DATA GARDU DISTRIBUSI</h3>

<?php if (!empty($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $field => $fieldErrors): ?>
                <?php foreach ((array)$fieldErrors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/gardu-distribusi/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>Kode Gardu:
        <input type="text" name="kode_gardu" value="<?= $old['kode_gardu'] ?? ($gardu['kode_gardu'] ?? '') ?>">
    </label><br><br>

    <label>Nama Gardu:
        <input type="text" name="nama_gardu" value="<?= $old['nama_gardu'] ?? ($gardu['nama_gardu'] ?? '') ?>" required>
    </label><br><br>

    <label>Alamat:
        <textarea name="alamat"><?= $old['alamat'] ?? ($gardu['alamat'] ?? '') ?></textarea>
    </label><br><br>

    <label>Latitude:
        <input type="text" name="lat" value="<?= $old['lat'] ?? ($gardu['lat'] ?? '') ?>">
    </label><br><br>

    <label>Longitude:
        <input type="text" name="lon" value="<?= $old['lon'] ?? ($gardu['lon'] ?? '') ?>">
    </label><br><br>

    <label>Keterangan:
        <textarea name="keterangan"><?= $old['keterangan'] ?? ($gardu['keterangan'] ?? '') ?></textarea>
    </label><br><br>

    <label>Gardu Induk:
        <select name="gi_id">
            <option value="">--Pilih GI--</option>
            <?php foreach ($garduInduks as $gi): ?>
                <?php $selected = (isset($old['gi_id']) ? $old['gi_id'] : $gardu['gi_id'] ?? null); ?>
                <option value="<?= $gi['gi_id'] ?>" <?= $gi['gi_id'] == $selected ? 'selected' : '' ?>>
                    <?= $gi['nama_gi'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <label>Penyulang:
        <select name="penyulang_id">
            <option value="">--Pilih Penyulang--</option>
            <?php foreach ($penyulangs as $penyulang): ?>
                <?php $selected = (isset($old['penyulang_id']) ? $old['penyulang_id'] : $gardu['penyulang_id'] ?? null); ?>
                <option value="<?= $penyulang['penyulang_id'] ?>" <?= $penyulang['penyulang_id'] == $selected ? 'selected' : '' ?>>
                    <?= $penyulang['nama_penyulang'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>