<?php startBlock('content') ?>
<h3>MASTER TRAFO</h3>

<p><a href="/trafo/create">+ Tambah Trafo</a></p>

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
                <td><?= htmlspecialchars($t['no_seri']) ?></td>
                <td><?= htmlspecialchars($t['merk']) ?></td>
                <td><?= htmlspecialchars($t['kapasitas_kva']) ?></td>
                <td><?= htmlspecialchars($t['impedansi_persen']) ?></td>
                <td><?= htmlspecialchars($t['pemilik']) ?></td>
                <td><?= htmlspecialchars($t['jenis_minyak']) ?></td>
                <td><?= htmlspecialchars($t['tegangan_primer_kv']) ?></td>
                <td><?= htmlspecialchars($t['tegangan_sekunder_v']) ?></td>
                <td><?= htmlspecialchars($t['kelas_isolasi']) ?></td>
                <td><?= htmlspecialchars($t['catatan']) ?></td>
                <td>
                    <a href="/trafo/<?= $t['trafo_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/trafo/<?= $t['trafo_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
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