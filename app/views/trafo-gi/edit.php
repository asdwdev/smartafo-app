<?php startBlock('content') ?>
<h3>Edit Trafo GI</h3>

<form method="POST" action="/trafo-gi/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>Gardu Induk:
        <select name="gi_id" required>
            <?php foreach ($garduInduks as $gi): ?>
                <option value="<?= $gi['gi_id'] ?>" <?= $trafoGi['gi_id'] == $gi['gi_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($gi['nama_gi']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>Trafo:
        <select name="trafo_id" required>
            <?php foreach ($trafos as $t): ?>
                <option value="<?= $t['trafo_id'] ?>" <?= $trafoGi['trafo_id'] == $t['trafo_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($t['no_seri']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>Tgl Pasang: <input type="date" name="tgl_pasang" value="<?= htmlspecialchars($trafoGi['tgl_pasang']) ?>"></p>
    <p>Tgl Operasi: <input type="date" name="tgl_operasi" value="<?= htmlspecialchars($trafoGi['tgl_operasi']) ?>"></p>
    <p>Status Operasi: <input type="text" name="status_operasi" value="<?= htmlspecialchars($trafoGi['status_operasi']) ?>"></p>
    <p>Kondisi Fisik: <input type="text" name="kondisi_fisik" value="<?= htmlspecialchars($trafoGi['kondisi_fisik']) ?>"></p>
    <p>Posisi Arde: <input type="text" name="posisi_arde" value="<?= htmlspecialchars($trafoGi['posisi_arde']) ?>"></p>
    <p>Arah Fasa: <input type="text" name="arah_fasa" value="<?= htmlspecialchars($trafoGi['arah_fasa']) ?>"></p>
    <p>Keterangan: <textarea name="keterangan"><?= htmlspecialchars($trafoGi['keterangan']) ?></textarea></p>

    <p><button type="submit">Update</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>