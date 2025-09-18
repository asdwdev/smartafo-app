<?php startBlock('content') ?>
<h3>Edit Trafo Gardu</h3>

<form method="POST" action="/trafo-gardu/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>Gardu Distribusi:
        <select name="gd_id" required>
            <?php foreach ($garduDistribusis as $gd): ?>
                <option value="<?= $gd['gd_id'] ?>" <?= $trafoGardu['gd_id'] == $gd['gd_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($gd['nama_gardu']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>Trafo:
        <select name="trafo_id" required>
            <?php foreach ($trafos as $t): ?>
                <option value="<?= $t['trafo_id'] ?>" <?= $trafoGardu['trafo_id'] == $t['trafo_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($t['no_seri']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>Tgl Pasang: <input type="date" name="tgl_pasang" value="<?= htmlspecialchars($trafoGardu['tgl_pasang']) ?>"></p>
    <p>Tgl Operasi: <input type="date" name="tgl_operasi" value="<?= htmlspecialchars($trafoGardu['tgl_operasi']) ?>"></p>
    <p>Status Operasi: <input type="text" name="status_operasi" value="<?= htmlspecialchars($trafoGardu['status_operasi']) ?>"></p>
    <p>Kondisi Fisik: <input type="text" name="kondisi_fisik" value="<?= htmlspecialchars($trafoGardu['kondisi_fisik']) ?>"></p>
    <p>Posisi Arde: <input type="text" name="posisi_arde" value="<?= htmlspecialchars($trafoGardu['posisi_arde']) ?>"></p>
    <p>Arah Fasa: <input type="text" name="arah_fasa" value="<?= htmlspecialchars($trafoGardu['arah_fasa']) ?>"></p>
    <p>Keterangan: <textarea name="keterangan"><?= htmlspecialchars($trafoGardu['keterangan']) ?></textarea></p>

    <p><button type="submit">Update</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>