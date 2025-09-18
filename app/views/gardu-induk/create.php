<?php startBlock('content') ?>
<h3>TAMBAH DATA GARDU INDUK</h3>

<form method="POST" action="/gardu-induk">
    <label>Kode GI: <input type="text" name="kode_gi"></label><br><br>
    <label>Nama GI: <input type="text" name="nama_gi" required></label><br><br>
    <label>Area: <input type="text" name="area"></label><br><br>
    <label>Alamat: <textarea name="alamat"></textarea></label><br><br>
    <label>Latitude: <input type="text" name="lat"></label><br><br>
    <label>Longitude: <input type="text" name="lon"></label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Submit</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>