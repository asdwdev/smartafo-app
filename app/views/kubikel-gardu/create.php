<?php startBlock('content') ?>
<h3>Tambah Kubikel Gardu</h3>

<form method="POST" action="/kubikel-gardu">
    <p>GD ID: <input type="number" name="gd_id" required></p>
    <p>Kubikel ID: <input type="number" name="kubikel_id" required></p>
    <p>Tgl Pasang: <input type="date" name="tgl_pasang"></p>
    <p>Tgl Operasi: <input type="date" name="tgl_operasi"></p>
    <p>Status RC: <input type="text" name="status_rc"></p>
    <p>Arah Gardu: <input type="text" name="arah_gardu"></p>
    <p>CT Info: <input type="text" name="ct_info"></p>
    <p>VT Info: <input type="text" name="vt_info"></p>
    <p>Relay Info: <input type="text" name="relay_info"></p>
    <p>Fuse Info: <input type="text" name="fuse_info"></p>
    <p>Keterangan: <textarea name="keterangan"></textarea></p>
    <p><button type="submit">Simpan</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>