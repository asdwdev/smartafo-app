<?php startBlock('content') ?>
<h3>EDIT TRAFO</h3>

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

<form method="POST" action="/trafo/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>No Seri:
        <input type="text" name="no_seri"
            value="<?= htmlspecialchars($_POST['no_seri'] ?? $trafo['no_seri'] ?? '') ?>" required>
    </p>
    <p>Merk:
        <input type="text" name="merk"
            value="<?= htmlspecialchars($_POST['merk'] ?? $trafo['merk'] ?? '') ?>">
    </p>
    <p>Kapasitas (kVA):
        <input type="number" step="0.01" name="kapasitas_kva"
            value="<?= htmlspecialchars($_POST['kapasitas_kva'] ?? $trafo['kapasitas_kva'] ?? '') ?>">
    </p>
    <p>Impedansi (%):
        <input type="number" step="0.001" name="impedansi_persen"
            value="<?= htmlspecialchars($_POST['impedansi_persen'] ?? $trafo['impedansi_persen'] ?? '') ?>">
    </p>
    <p>Pemilik:
        <input type="text" name="pemilik"
            value="<?= htmlspecialchars($_POST['pemilik'] ?? $trafo['pemilik'] ?? '') ?>">
    </p>
    <p>Jenis Minyak:
        <input type="text" name="jenis_minyak"
            value="<?= htmlspecialchars($_POST['jenis_minyak'] ?? $trafo['jenis_minyak'] ?? '') ?>">
    </p>
    <p>Tegangan Primer (kV):
        <input type="number" step="0.001" name="tegangan_primer_kv"
            value="<?= htmlspecialchars($_POST['tegangan_primer_kv'] ?? $trafo['tegangan_primer_kv'] ?? '') ?>">
    </p>
    <p>Tegangan Sekunder (V):
        <input type="number" step="0.01" name="tegangan_sekunder_v"
            value="<?= htmlspecialchars($_POST['tegangan_sekunder_v'] ?? $trafo['tegangan_sekunder_v'] ?? '') ?>">
    </p>
    <p>Kelas Isolasi:
        <input type="text" name="kelas_isolasi"
            value="<?= htmlspecialchars($_POST['kelas_isolasi'] ?? $trafo['kelas_isolasi'] ?? '') ?>">
    </p>
    <p>Catatan:
        <textarea name="catatan"><?= htmlspecialchars($_POST['catatan'] ?? $trafo['catatan'] ?? '') ?></textarea>
    </p>
    <p>
        <button type="button" onclick="window.history.back()">Back</button>
        <button type="submit">Update</button>
    </p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>