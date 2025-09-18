<?php startBlock('content') ?>
<h3>MASTER GARDU INDUK</h3>

<p><a href="/gardu-induk/create">+ Tambah Gardu Induk</a></p>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color:red; font-weight:bold; margin-bottom:10px;">
        <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<table border="1" width="100%">
    <tr>
        <th>KODE GI</th>
        <th>NAMA GI</th>
        <th>AREA</th>
        <th>ALAMAT</th>
        <th>LAT</th>
        <th>LON</th>
        <th>AKSI</th>
    </tr>

    <?php if (!empty($garduInduks)): ?>
        <?php foreach ($garduInduks as $gi): ?>
            <tr>
                <td><?= htmlspecialchars($gi['kode_gi'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($gi['nama_gi'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($gi['area'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($gi['alamat'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($gi['lat'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($gi['lon'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="/gardu-induk/<?= $gi['gi_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/gardu-induk/<?= $gi['gi_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Belum ada gardu induk.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>