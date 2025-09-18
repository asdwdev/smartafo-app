<?php startBlock('content') ?>
<h3>MASTER TRAFO TEKNIS</h3>

<p><a href="/trafo-teknis/create">+ Tambah Trafo Teknis</a></p>

<table border="1" width="100%">
    <tr>
        <th>No Seri</th>
        <th>Merk</th>
        <th>Kapasitas (kVA)</th>
        <th>Tegangan Primer (kV)</th>
        <th>Tegangan Sekunder (V)</th>
        <th>Pemilik</th>
        <th>Aksi</th>
    </tr>
    <tr>
        <td>TRF001</td>
        <td>Schneider</td>
        <td>2000</td>
        <td>20.000</td>
        <td>400</td>
        <td>PLN</td>
        <td>
            <a href="/trafo-teknis/1">Detail</a> |
            <a href="/trafo-teknis/1/edit">Edit</a> |
            <form method="POST" action="/trafo-teknis/1" style="display:inline">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>