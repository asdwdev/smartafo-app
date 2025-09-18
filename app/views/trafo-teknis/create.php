<?php startBlock('content') ?>
<h3>TAMBAH DATA TRAFO TEKNIS</h3>

<form method="POST" action="/trafo-teknis">
    <label>No Seri: <input type="text" name="no_seri"></label><br><br>
    <label>Merk: <input type="text" name="merk"></label><br><br>
    <label>Kapasitas (kVA): <input type="text" name="kapasitas_kva"></label><br><br>
    <label>Impedansi (%): <input type="text" name="impedansi_persen"></label><br><br>
    <label>Pemilik: <input type="text" name="pemilik"></label><br><br>
    <label>Jenis Minyak: <input type="text" name="jenis_minyak"></label><br><br>
    <label>Tegangan Primer (kV): <input type="text" name="tegangan_primer_kv"></label><br><br>
    <label>Tegangan Sekunder (V): <input type="text" name="tegangan_sekunder_v"></label><br><br>
    <label>Kelas Isolasi: <input type="text" name="kelas_isolasi"></label><br><br>
    <label>Catatan: <textarea name="catatan"></textarea></label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Submit</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>