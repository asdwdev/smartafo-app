<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Master Jaringan Distribusi</title>
</head>

<body>

    <h2>Administrator - Master Jaringan Distribusi</h2>
    <p>Welcome TAJIRSSA WILAYA | <a href="/logout">LOGOUT</a></p>

    <table border="1" width="100%">
        <tr>
            <!-- Sidebar -->
            <td width="20%" valign="top">
                <h3>HOME</h3>

                <h3>MASTER DATA</h3>
                <ul>
                    <li><a href="#">Gardu Induk</a></li>
                    <li><a href="#">Penyulang</a></li>
                    <li><a href="#">Gardu Hubung</a></li>
                    <li><a href="/gardu">Gardu Distribusi</a></li>
                    <li><a href="#">Trafo Gardu Induk</a></li>
                    <li><a href="#">Trafo Gardu Distribusi</a></li>
                    <li><a href="#">Jaringan</a></li>
                    <li><a href="#">Turbin</a></li>
                    <li><a href="#">Kubikel</a></li>
                </ul>

                <h3>REKAP DATA</h3>
                <ul>
                    <li><a href="#">Jml Penyulang per GI</a></li>
                    <li><a href="#">Jml Gardu per Penyulang</a></li>
                    <li><a href="#">Jml Gardu per Area</a></li>
                    <li><a href="#">Jml Trafo per Area</a></li>
                    <li><a href="#">Jml Gardu per Area</a></li>
                    <li><a href="#">Jml Trafo Terpasang per Area</a></li>
                    <li><a href="#">Jml Jaringan per Area</a></li>
                    <li><a href="#">Jml Kubikel Gardu Distribusi per Area</a></li>
                    <li><a href="#">User</a></li>
                </ul>
            </td>

            <!-- Konten Utama -->
            <td width="80%" valign="top">
                <h3>MASTER GARDU DISTRIBUSI</h3>

                <form method="GET" action="/gardu">
                    <label>AREA:
                        <select name="area">
                            <option value="">-- PILIH --</option>
                            <option value="Cengkareng">Cengkareng</option>
                            <option value="Ciputat">Ciputat</option>
                            <option value="Pondok Kopi">Pondok Kopi</option>
                        </select>
                    </label>
                    <br><br>
                    <label>NAMA PENYULANG:
                        <input type="text" name="penyulang">
                    </label>
                    <br><br>
                    <label>NAMA GARDU:
                        <input type="text" name="gardu">
                    </label>
                    <br><br>
                    <button type="submit">Cari</button>
                </form>

                <h4>Tabel Master Gardu Distribusi</h4>

                <a href="/gardu-distribusi/create">Add new record</a>
                <table border="1" width="100%">
                    <tr>
                        <th>KODE GARDU</th>
                        <th>PENYULANG</th>
                        <th>NAMA GARDU</th>
                        <th>GPS (X)</th>
                        <th>GPS (Y)</th>
                        <th>AREA</th>
                    </tr>
                    <tr>
                        <td>1220201</td>
                        <td>ABAD</td>
                        <td>TGR33</td>
                        <td>-6.19396759253015</td>
                        <td>106.75052121897</td>
                        <td>Cengkareng</td>
                    </tr>
                    <tr>
                        <td>1220202</td>
                        <td>ABAD</td>
                        <td>TGG29</td>
                        <td>-6.1540938623903</td>
                        <td>106.72549691487</td>
                        <td>Cengkareng</td>
                    </tr>
                    <tr>
                        <td>1220203</td>
                        <td>ABAD</td>
                        <td>CKX42</td>
                        <td>-6.19524905239434</td>
                        <td>106.72346772123</td>
                        <td>Cengkareng</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>