<?php startBlock('content') ?>
<h3>MASTER GARDU HUBUNG</h3>

<p><a href="/gardu-hubung/create">+ Tambah Gardu Hubung</a></p>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color:red; font-weight:bold; margin-bottom:10px;">
        <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<table border="1" width="100%">
    <tr>
        <th>KODE GH</th>
        <th>NAMA GH</th>
        <th>ALAMAT</th>
        <th>LAT</th>
        <th>LON</th>
        <th>AKSI</th>
    </tr>
    <?php if (!empty($garduHubungs)): ?>
        <?php foreach ($garduHubungs as $gh): ?>
            <tr>
                <td><?= htmlspecialchars($gh['kode_gh'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($gh['nama_gh'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($gh['alamat'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($gh['lat'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($gh['lon'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="/gardu-hubung/<?= $gh['gh_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/gardu-hubung/<?= $gh['gh_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Belum ada gardu hubung.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>