<?php startBlock('content') ?>
<h3>MASTER TRAFO GARDU</h3>

<p><a href="/trafo-gardu/create">+ Tambah Trafo Gardu</a></p>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color:red; font-weight:bold; margin-bottom:10px;">
        <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<table border="1" width="100%">
    <tr>
        <th>GD ID</th>
        <th>Trafo ID</th>
        <th>Tgl Pasang</th>
        <th>Tgl Operasi</th>
        <th>Status Operasi</th>
        <th>Kondisi Fisik</th>
        <th>Posisi Arde</th>
        <th>Arah Fasa</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($trafoGardus)): ?>
        <?php foreach ($trafoGardus as $tg): ?>
            <tr>
                <td><?= htmlspecialchars($tg['gd_id'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($tg['trafo_id'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($tg['tgl_pasang'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($tg['tgl_operasi'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($tg['status_operasi'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($tg['kondisi_fisik'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($tg['posisi_arde'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($tg['arah_fasa'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($tg['keterangan'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="/trafo-gardu/<?= $tg['trafo_gardu_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/trafo-gardu/<?= $tg['trafo_gardu_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="10">Belum ada data trafo gardu.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>