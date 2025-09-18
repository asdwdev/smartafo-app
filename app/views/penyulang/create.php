<?php startBlock('content') ?>
<h3>TAMBAH DATA PENYULANG</h3>

<form method="POST" action="/penyulang">
    <label>Kode Penyulang: <input type="text" name="kode_penyulang"></label><br><br>
    <label>Nama Penyulang: <input type="text" name="nama_penyulang" required></label><br><br>
    <label>Tegangan (kV): <input type="text" name="tegangan_kv"></label><br><br>

    <label>Gardu Induk:
        <select name="gi_id" required>
            <?php foreach ($garduInduk as $gi): ?>
                <option value="<?= $gi['gi_id'] ?>"><?= $gi['nama_gi'] ?></option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Submit</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>