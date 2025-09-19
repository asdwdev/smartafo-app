<?php startBlock('content') ?>
<h3>Edit Jurusan</h3>

<form method="POST" action="/jurusan/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>
        Gardu Distribusi:
        <select name="gd_id" required>
            <option value="">-- Pilih Gardu Distribusi --</option>
            <?php foreach ($garduDistribusi as $gd): ?>
                <option value="<?= $gd['gd_id'] ?>"
                    <?= $gd['gd_id'] == $jurusan['gd_id'] ? 'selected' : '' ?>>
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
                <option value="<?= $tg['trafo_gardu_id'] ?>"
                    <?= $tg['trafo_gardu_id'] == $jurusan['trafo_gardu_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($tg['nama_trafo'] ?? 'Trafo ' . $tg['trafo_gardu_id']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        Nama Jurusan:
        <input type="text" name="nama_jurusan" value="<?= htmlspecialchars($jurusan['nama_jurusan']) ?>" required>
    </p>

    <p>
        Keterangan:
        <textarea name="keterangan"><?= htmlspecialchars($jurusan['keterangan']) ?></textarea>
    </p>

    <p>
        <button type="submit">Update</button>
    </p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>