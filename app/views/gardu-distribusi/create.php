<?php startBlock('content') ?>
<h3>TAMBAH DATA GARDU DISTRIBUSI</h3>

<form method="POST" action="/gardu-distribusi">
    <label>Kode Gardu: <input type="text" name="kode_gardu"></label><br><br>
    <label>Nama Gardu: <input type="text" name="nama_gardu" required></label><br><br>
    <label>Alamat: <textarea name="alamat"></textarea></label><br><br>
    <label>Latitude: <input type="text" name="lat"></label><br><br>
    <label>Longitude: <input type="text" name="lon"></label><br><br>
    <label>Keterangan: <textarea name="keterangan"></textarea></label><br><br>

    <label>Gardu Induk:
        <select name="gi_id">
            <option value="">--Pilih GI--</option>
            <?php foreach ($garduInduks as $gi): ?>
                <option value="<?= $gi['gi_id'] ?>"><?= $gi['nama_gi'] ?></option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <label>Penyulang:
        <select name="penyulang_id">
            <option value="">--Pilih Penyulang--</option>
            <?php foreach ($penyulangs as $penyulang): ?>
                <option value="<?= $penyulang['penyulang_id'] ?>"><?= $penyulang['nama_penyulang'] ?></option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Submit</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>