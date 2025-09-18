<?php startBlock('content') ?>
<h3>MASTER TRAFO GARDU</h3>

<p><a href="/trafo-gardu/create">+ Tambah Trafo Gardu</a></p>

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
                <td><?= htmlspecialchars($tg['gd_id']) ?></td>
                <td><?= htmlspecialchars($tg['trafo_id']) ?></td>
                <td><?= htmlspecialchars($tg['tgl_pasang']) ?></td>
                <td><?= htmlspecialchars($tg['tgl_operasi']) ?></td>
                <td><?= htmlspecialchars($tg['status_operasi']) ?></td>
                <td><?= htmlspecialchars($tg['kondisi_fisik']) ?></td>
                <td><?= htmlspecialchars($tg['posisi_arde']) ?></td>
                <td><?= htmlspecialchars($tg['arah_fasa']) ?></td>
                <td><?= htmlspecialchars($tg['keterangan']) ?></td>
                <td>
                    <a href="/trafo-gardu/<?= $tg['trafo_gardu_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/trafo-gardu/<?= $tg['trafo_gardu_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
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