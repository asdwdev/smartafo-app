<?php startBlock('content') ?>
<h3>TAMBAH DATA GARDU HUBUNG</h3>

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

<form method="POST" action="/gardu-hubung">
    <label>Kode GH:
        <input type="text" name="kode_gh"
            value="<?= htmlspecialchars($old['kode_gh'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <label>Nama GH:
        <input type="text" name="nama_gh"
            value="<?= htmlspecialchars($old['nama_gh'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            required>
    </label><br><br>

    <label>Alamat:
        <input type="text" name="alamat"
            value="<?= htmlspecialchars($old['alamat'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <label>Latitude:
        <input type="text" name="lat"
            value="<?= htmlspecialchars((string)($old['lat'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <label>Longitude:
        <input type="text" name="lon"
            value="<?= htmlspecialchars((string)($old['lon'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Submit</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>