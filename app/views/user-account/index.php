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
    <tr>
        <td>123456</td>
        <td>Budi Santoso</td>
        <td>budi@pln.co.id</td>
        <td>Jakarta</td>
        <td>Admin</td>
        <td>Approved</td>
        <td>
            <a href="/user-account/1">Detail</a> |
            <a href="/user-account/1/edit">Edit</a> |
            <form method="POST" action="/user-account/1" style="display:inline">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>