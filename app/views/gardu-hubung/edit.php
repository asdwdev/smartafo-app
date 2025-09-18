<?php startBlock('content') ?>
<h3>EDIT DATA GARDU HUBUNG</h3>

<form method="POST" action="/gardu-hubung/<?php echo $id; ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>Kode GH: <input type="text" name="kode_gh" value="GH001"></label><br><br>
    <label>Nama GH: <input type="text" name="nama_gh" value="Gardu Hubung A"></label><br><br>
    <label>Alamat: <input type="text" name="alamat" value="Jl. Raya Cengkareng"></label><br><br>
    <label>Latitude: <input type="text" name="lat" value="-6.1234567"></label><br><br>
    <label>Longitude: <input type="text" name="lon" value="106.7654321"></label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>