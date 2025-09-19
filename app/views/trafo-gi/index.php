<?php startBlock('content') ?>
<h3>MASTER TRAFO GI</h3>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color: red; margin-bottom: 10px;">
        <?= htmlspecialchars($_SESSION['error']);
        unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<p><a href="/trafo-gi/create">+ Tambah Trafo GI</a></p>

<table border="1" width="100%">
    <tr>
        <th>GI ID</th>
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

    <?php if (!empty($trafoGis)): ?>
        <?php foreach ($trafoGis as $tg): ?>
            <tr>
                <td><?= htmlspecialchars($tg['gi_id'] ?? '') ?></td>
                <td><?= htmlspecialchars($tg['trafo_id'] ?? '') ?></td>
                <td><?= htmlspecialchars($tg['tgl_pasang'] ?? '') ?></td>
                <td><?= htmlspecialchars($tg['tgl_operasi'] ?? '') ?></td>
                <td><?= htmlspecialchars($tg['status_operasi'] ?? '') ?></td>
                <td><?= htmlspecialchars($tg['kondisi_fisik'] ?? '') ?></td>
                <td><?= htmlspecialchars($tg['posisi_arde'] ?? '') ?></td>
                <td><?= htmlspecialchars($tg['arah_fasa'] ?? '') ?></td>
                <td><?= htmlspecialchars($tg['keterangan'] ?? '') ?></td>
                <td>
                    <a href="/trafo-gi/<?= $tg['trafo_gi_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/trafo-gi/<?= $tg['trafo_gi_id'] ?>" style="display:inline" onsubmit="return confirm('Yakin hapus data?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="10">Belum ada data trafo GI.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>