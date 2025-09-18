<?php startBlock('content') ?>
<h3>EDIT DATA KUBIKEL TEKNIS</h3>

<form method="POST" action="/kubikel-teknis/<?php echo $id; ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>No Seri: <input type="text" name="no_seri" value="KUB001"></label><br><br>
    <label>Merk: <input type="text" name="merk" value="ABB"></label><br><br>
    <label>Jenis: <input type="text" name="jenis" value="Load Break Switch"></label><br><br>
    <label>Fungsi: <input type="text" name="fungsi" value="Proteksi"></label><br><br>
    <label>Tegangan (kV): <input type="text" name="tegangan_kv" value="20.000"></label><br><br>
    <label>Kapasitas (A): <input type="text" name="kapasitas_a" value="630"></label><br><br>
    <label>Impedansi (%): <input type="text" name="impedansi_persen" value="5.000"></label><br><br>
    <label>Catatan: <textarea name="catatan">Kubikel utama GI Cengkareng</textarea></label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>