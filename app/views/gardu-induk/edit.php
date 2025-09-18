<?php startBlock('content') ?>
<h3>EDIT DATA GARDU INDUK</h3>

<form method="POST" action="/gardu-induk/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>Kode GI:
        <input type="text" name="kode_gi" value="<?= $garduInduk['kode_gi'] ?? '' ?>">
    </label><br><br>

    <label>Nama GI:
        <input type="text" name="nama_gi" value="<?= $garduInduk['nama_gi'] ?? '' ?>" required>
    </label><br><br>

    <label>Area:
        <input type="text" name="area" value="<?= $garduInduk['area'] ?? '' ?>">
    </label><br><br>

    <label>Alamat:
        <textarea name="alamat"><?= $garduInduk['alamat'] ?? '' ?></textarea>
    </label><br><br>

    <label>Latitude:
        <input type="text" name="lat" value="<?= $garduInduk['lat'] ?? '' ?>">
    </label><br><br>

    <label>Longitude:
        <input type="text" name="lon" value="<?= $garduInduk['lon'] ?? '' ?>">
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>