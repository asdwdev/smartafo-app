<?php startBlock('content') ?>
<h3>MASTER USER ACCOUNT</h3>

<p><a href="/user-account/create">+ Tambah User</a></p>

<table border="1" width="100%">
    <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Email PLN</th>
        <th>Area</th>
        <th>Level</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['nip']) ?></td>
                <td><?= htmlspecialchars($user['full_name']) ?></td>
                <td><?= htmlspecialchars($user['email_pln']) ?></td>
                <td><?= htmlspecialchars($user['area']) ?></td>
                <td><?= htmlspecialchars($user['level_user']) ?></td>
                <td><?= $user['is_approved'] === 'TRUE' ? 'Approved' : 'Pending' ?></td>
                <td>
                    <a href="/user-account/<?= $user['user_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/user-account/<?= $user['user_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Belum ada user.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>