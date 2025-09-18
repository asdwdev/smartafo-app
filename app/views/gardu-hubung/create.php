<?php startBlock('content') ?>
<h3>TAMBAH DATA GARDU HUBUNG</h3>

<form method="POST" action="/gardu-hubung">
    <label>Kode GH: <input type="text" name="kode_gh"></label><br><br>
    <label>Nama GH: <input type="text" name="nama_gh" required></label><br><br>
    <label>Alamat: <input type="text" name="alamat"></label><br><br>
    <label>Latitude: <input type="text" name="lat"></label><br><br>
    <label>Longitude: <input type="text" name="lon"></label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Submit</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>