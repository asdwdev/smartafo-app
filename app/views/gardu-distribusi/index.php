<?php startBlock('content') ?>
<h3>MASTER GARDU DISTRIBUSI</h3>
<a href="/gardu-distribusi/create">+ Add new record</a>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Gardu</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- contoh dummy -->
        <tr>
            <td>1</td>
            <td>GD-01</td>
            <td>Karawang</td>
            <td>Operasi</td>
            <td>
                <a href="/gardu-distribusi/1/edit">Edit</a> |
                <form method="POST" action="/gardu-distribusi/1" style="display:inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>