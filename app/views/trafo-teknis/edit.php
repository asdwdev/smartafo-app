<?php startBlock('content') ?>
<h3>EDIT DATA TRAFO TEKNIS</h3>

<form method="POST" action="/trafo-teknis/<?php echo $id; ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>No Seri: <input type="text" name="no_seri" value="TRF001"></label><br><br>
    <label>Merk: <input type="text" name="merk" value="Schneider"></label><br><br>
    <label>Kapasitas (kVA): <input type="text" name="kapasitas_kva" value="2000"></label><br><br>
    <label>Impedansi (%): <input type="text" name="impedansi_persen" value="5.000"></label><br><br>
    <label>Pemilik: <input type="text" name="pemilik" value="PLN"></label><br><br>
    <label>Jenis Minyak: <input type="text" name="jenis_minyak" value="Mineral"></label><br><br>
    <label>Tegangan Primer (kV): <input type="text" name="tegangan_primer_kv" value="20.000"></label><br><br>
    <label>Tegangan Sekunder (V): <input type="text" name="tegangan_sekunder_v" value="400"></label><br><br>
    <label>Kelas Isolasi: <input type="text" name="kelas_isolasi" value="A"></label><br><br>
    <label>Catatan: <textarea name="catatan">Trafo utama GI XYZ</textarea></label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>