<?php startBlock('content') ?>
<h3>Tambah Kubikel</h3>

<form method="POST" action="/kubikel">
    <p>No Seri: <input type="text" name="no_seri" required></p>
    <p>Merk: <input type="text" name="merk"></p>
    <p>Jenis: <input type="text" name="jenis"></p>
    <p>Fungsi: <input type="text" name="fungsi"></p>
    <p>Tegangan (kV): <input type="number" step="0.001" name="tegangan_kv"></p>
    <p>Kapasitas (A): <input type="number" step="0.01" name="kapasitas_a"></p>
    <p>Impedansi (%): <input type="number" step="0.001" name="impedansi_persen"></p>
    <p>Catatan: <textarea name="catatan"></textarea></p>
    <p><button type="submit">Simpan</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>