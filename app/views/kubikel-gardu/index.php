<?php startBlock('content') ?>
<h3>MASTER KUBIKEL GARDU</h3>

<p><a href="/kubikel-gardu/create">+ Tambah Kubikel Gardu</a></p>

<table border="1" width="100%">
    <tr>
        <th>GD ID</th>
        <th>Kubikel ID</th>
        <th>Tgl Pasang</th>
        <th>Tgl Operasi</th>
        <th>Status RC</th>
        <th>Arah Gardu</th>
        <th>CT Info</th>
        <th>VT Info</th>
        <th>Relay Info</th>
        <th>Fuse Info</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($kubikelGardu)): ?>
        <?php foreach ($kubikelGardu as $kg): ?>
            <tr>
                <td><?= htmlspecialchars($kg['gd_id'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['kubikel_id'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['tgl_pasang'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['tgl_operasi'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['status_rc'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['arah_gardu'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['ct_info'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['vt_info'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['relay_info'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['fuse_info'] ?? '') ?></td>
                <td><?= htmlspecialchars($kg['keterangan'] ?? '') ?></td>
                <td>
                    <a href="/kubikel-gardu/<?= $kg['kubikel_gardu_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/kubikel-gardu/<?= $kg['kubikel_gardu_id'] ?>" style="display:inline" onsubmit="return confirm('Yakin hapus data?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="12">Belum ada data kubikel gardu.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>