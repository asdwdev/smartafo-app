<?php startBlock('content') ?>
<h3>TAMBAH DATA KUBIKEL TEKNIS</h3>

<form method="POST" action="/kubikel-teknis">
    <label>No Seri: <input type="text" name="no_seri"></label><br><br>
    <label>Merk: <input type="text" name="merk"></label><br><br>
    <label>Jenis: <input type="text" name="jenis"></label><br><br>
    <label>Fungsi: <input type="text" name="fungsi"></label><br><br>
    <label>Tegangan (kV): <input type="text" name="tegangan_kv"></label><br><br>
    <label>Kapasitas (A): <input type="text" name="kapasitas_a"></label><br><br>
    <label>Impedansi (%): <input type="text" name="impedansi_persen"></label><br><br>
    <label>Catatan: <textarea name="catatan"></textarea></label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Submit</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>