<?php startBlock('content') ?>
<h3>Tambah Trafo</h3>

<form method="POST" action="/trafo">
    <p>No Seri: <input type="text" name="no_seri" required></p>
    <p>Merk: <input type="text" name="merk"></p>
    <p>Kapasitas (kVA): <input type="number" step="0.01" name="kapasitas_kva"></p>
    <p>Impedansi (%): <input type="number" step="0.001" name="impedansi_persen"></p>
    <p>Pemilik: <input type="text" name="pemilik"></p>
    <p>Jenis Minyak: <input type="text" name="jenis_minyak"></p>
    <p>Tegangan Primer (kV): <input type="number" step="0.001" name="tegangan_primer_kv"></p>
    <p>Tegangan Sekunder (V): <input type="number" step="0.01" name="tegangan_sekunder_v"></p>
    <p>Kelas Isolasi: <input type="text" name="kelas_isolasi"></p>
    <p>Catatan: <textarea name="catatan"></textarea></p>
    <p><button type="submit">Simpan</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>