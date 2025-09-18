<?php startBlock('content') ?>
<h3>EDIT DATA PENYULANG</h3>

<form method="POST" action="/penyulang/<?php echo $id; ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>Kode Penyulang: <input type="text" name="kode_penyulang" value="PNY001"></label><br><br>
    <label>Nama Penyulang: <input type="text" name="nama_penyulang" value="ABAD"></label><br><br>
    <label>Tegangan (kV): <input type="text" name="tegangan_kv" value="20.000"></label><br><br>

    <label>Gardu Induk:
        <select name="gi_id">
            <?php foreach ($garduInduk as $gi): ?>
                <option value="<?= $gi['gi_id'] ?>" <?= $gi['gi_id'] == 1 ? 'selected' : '' ?>>
                    <?= $gi['nama_gi'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>