<?php startBlock('content') ?>
<h3>EDIT DATA GARDU INDUK</h3>

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

<form method="POST" action="/gardu-induk/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>Kode GI:
        <input type="text" name="kode_gi"
            value="<?= htmlspecialchars($garduInduk['kode_gi'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <label>Nama GI:
        <input type="text" name="nama_gi"
            value="<?= htmlspecialchars($garduInduk['nama_gi'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            required>
    </label><br><br>

    <label>Area:
        <input type="text" name="area"
            value="<?= htmlspecialchars($garduInduk['area'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <label>Alamat:
        <textarea name="alamat"><?= htmlspecialchars($garduInduk['alamat'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    </label><br><br>

    <label>Latitude:
        <input type="text" name="lat"
            value="<?= htmlspecialchars((string)($garduInduk['lat'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <label>Longitude:
        <input type="text" name="lon"
            value="<?= htmlspecialchars((string)($garduInduk['lon'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>