<?php startBlock('content') ?>
<h3>Tambah Jurusan</h3>

<form method="POST" action="/jurusan">
    <p>
        Gardu Distribusi:
        <select name="gd_id" required>
            <option value="">-- Pilih Gardu Distribusi --</option>
            <?php foreach ($garduDistribusi as $gd): ?>
                <option value="<?= $gd['gd_id'] ?>">
                    <?= htmlspecialchars($gd['nama_gardu'] ?? 'GD ' . $gd['gd_id']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        Trafo Gardu:
        <select name="trafo_gardu_id">
            <option value="">-- Pilih Trafo Gardu (opsional) --</option>
            <?php foreach ($trafoGardu as $tg): ?>
                <option value="<?= $tg['trafo_gardu_id'] ?>">
                    <?= htmlspecialchars($tg['nama_trafo'] ?? 'Trafo ' . $tg['trafo_gardu_id']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        Nama Jurusan:
        <input type="text" name="nama_jurusan" required>
    </p>

    <p>
        Keterangan:
        <textarea name="keterangan"></textarea>
    </p>

    <p>
        <button type="submit">Simpan</button>
    </p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>