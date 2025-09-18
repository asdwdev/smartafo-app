<?php startBlock('content') ?>
<h3>EDIT DATA TRAFO TEKNIS</h3>

<form method="POST" action="/trafo-teknis/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>No Seri:
        <input type="text" name="no_seri" value="<?= $trafo['no_seri'] ?? '' ?>">
    </label><br><br>

    <label>Merk:
        <input type="text" name="merk" value="<?= $trafo['merk'] ?? '' ?>">
    </label><br><br>

    <label>Kapasitas (kVA):
        <input type="text" name="kapasitas_kva" value="<?= $trafo['kapasitas_kva'] ?? '' ?>">
    </label><br><br>

    <label>Impedansi (%):
        <input type="text" name="impedansi_persen" value="<?= $trafo['impedansi_persen'] ?? '' ?>">
    </label><br><br>

    <label>Pemilik:
        <input type="text" name="pemilik" value="<?= $trafo['pemilik'] ?? '' ?>">
    </label><br><br>

    <label>Jenis Minyak:
        <input type="text" name="jenis_minyak" value="<?= $trafo['jenis_minyak'] ?? '' ?>">
    </label><br><br>

    <label>Tegangan Primer (kV):
        <input type="text" name="tegangan_primer_kv" value="<?= $trafo['tegangan_primer_kv'] ?? '' ?>">
    </label><br><br>

    <label>Tegangan Sekunder (V):
        <input type="text" name="tegangan_sekunder_v" value="<?= $trafo['tegangan_sekunder_v'] ?? '' ?>">
    </label><br><br>

    <label>Kelas Isolasi:
        <input type="text" name="kelas_isolasi" value="<?= $trafo['kelas_isolasi'] ?? '' ?>">
    </label><br><br>

    <label>Catatan:
        <textarea name="catatan"><?= $trafo['catatan'] ?? '' ?></textarea>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>