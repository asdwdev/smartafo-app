<?php startBlock('content') ?>
<h3>Edit Trafo</h3>

<form method="POST" action="/trafo/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>No Seri: <input type="text" name="no_seri" value="<?= htmlspecialchars($trafo['no_seri']) ?>" required></p>
    <p>Merk: <input type="text" name="merk" value="<?= htmlspecialchars($trafo['merk']) ?>"></p>
    <p>Kapasitas (kVA): <input type="number" step="0.01" name="kapasitas_kva" value="<?= htmlspecialchars($trafo['kapasitas_kva']) ?>"></p>
    <p>Impedansi (%): <input type="number" step="0.001" name="impedansi_persen" value="<?= htmlspecialchars($trafo['impedansi_persen']) ?>"></p>
    <p>Pemilik: <input type="text" name="pemilik" value="<?= htmlspecialchars($trafo['pemilik']) ?>"></p>
    <p>Jenis Minyak: <input type="text" name="jenis_minyak" value="<?= htmlspecialchars($trafo['jenis_minyak']) ?>"></p>
    <p>Tegangan Primer (kV): <input type="number" step="0.001" name="tegangan_primer_kv" value="<?= htmlspecialchars($trafo['tegangan_primer_kv']) ?>"></p>
    <p>Tegangan Sekunder (V): <input type="number" step="0.01" name="tegangan_sekunder_v" value="<?= htmlspecialchars($trafo['tegangan_sekunder_v']) ?>"></p>
    <p>Kelas Isolasi: <input type="text" name="kelas_isolasi" value="<?= htmlspecialchars($trafo['kelas_isolasi']) ?>"></p>
    <p>Catatan: <textarea name="catatan"><?= htmlspecialchars($trafo['catatan']) ?></textarea></p>
    <p><button type="submit">Update</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>