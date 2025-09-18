<?php startBlock('content') ?>
<h3>Tambah Jurusan</h3>

<form method="POST" action="/jurusan">
    <p>GD ID: <input type="number" name="gd_id" required></p>
    <p>Trafo Gardu ID: <input type="number" name="trafo_gardu_id"></p>
    <p>Nama Jurusan: <input type="text" name="nama_jurusan" required></p>
    <p>Keterangan: <textarea name="keterangan"></textarea></p>
    <p><button type="submit">Simpan</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>