<?php startBlock('content') ?>
<h3>TAMBAH TRAFO</h3>

<?php if (!empty($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $field => $fieldErrors): ?>
                <?php foreach ((array)$fieldErrors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/trafo">
    <p>No Seri: <input type="text" name="no_seri" value="<?= htmlspecialchars($_POST['no_seri'] ?? '') ?>" required></p>
    <p>Merk: <input type="text" name="merk" value="<?= htmlspecialchars($_POST['merk'] ?? '') ?>"></p>
    <p>Kapasitas (kVA): <input type="number" step="0.01" name="kapasitas_kva" value="<?= htmlspecialchars($_POST['kapasitas_kva'] ?? '') ?>"></p>
    <p>Impedansi (%): <input type="number" step="0.001" name="impedansi_persen" value="<?= htmlspecialchars($_POST['impedansi_persen'] ?? '') ?>"></p>
    <p>Pemilik: <input type="text" name="pemilik" value="<?= htmlspecialchars($_POST['pemilik'] ?? '') ?>"></p>
    <p>Jenis Minyak: <input type="text" name="jenis_minyak" value="<?= htmlspecialchars($_POST['jenis_minyak'] ?? '') ?>"></p>
    <p>Tegangan Primer (kV): <input type="number" step="0.001" name="tegangan_primer_kv" value="<?= htmlspecialchars($_POST['tegangan_primer_kv'] ?? '') ?>"></p>
    <p>Tegangan Sekunder (V): <input type="number" step="0.01" name="tegangan_sekunder_v" value="<?= htmlspecialchars($_POST['tegangan_sekunder_v'] ?? '') ?>"></p>
    <p>Kelas Isolasi: <input type="text" name="kelas_isolasi" value="<?= htmlspecialchars($_POST['kelas_isolasi'] ?? '') ?>"></p>
    <p>Catatan: <textarea name="catatan"><?= htmlspecialchars($_POST['catatan'] ?? '') ?></textarea></p>
    <p>
        <button type="button" onclick="window.history.back()">Back</button>
        <button type="submit">Simpan</button>
    </p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>