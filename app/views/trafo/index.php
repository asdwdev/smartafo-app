<?php startBlock('content') ?>
<h3>MASTER TRAFO</h3>

<p><a href="/trafo/create">+ Tambah Trafo</a></p>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color:red; font-weight:bold; margin-bottom:10px;">
        <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<table border="1" width="100%">
    <tr>
        <th>No Seri</th>
        <th>Merk</th>
        <th>Kapasitas (kVA)</th>
        <th>Impedansi (%)</th>
        <th>Pemilik</th>
        <th>Jenis Minyak</th>
        <th>Teg. Primer (kV)</th>
        <th>Teg. Sekunder (V)</th>
        <th>Kelas Isolasi</th>
        <th>Catatan</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($trafos)): ?>
        <?php foreach ($trafos as $t): ?>
            <tr>
                <td><?= htmlspecialchars($t['no_seri'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($t['merk'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($t['kapasitas_kva'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($t['impedansi_persen'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($t['pemilik'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($t['jenis_minyak'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($t['tegangan_primer_kv'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($t['tegangan_sekunder_v'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($t['kelas_isolasi'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($t['catatan'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="/trafo/<?= $t['trafo_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/trafo/<?= $t['trafo_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="11">Belum ada data trafo.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>