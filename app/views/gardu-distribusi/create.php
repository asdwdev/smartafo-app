<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Gardu Distribusi</title>
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
                    <li><a href="/gardu-distribusi">Gardu Distribusi</a></li>
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
                <h3>TAMBAH GARDU DISTRIBUSI</h3>

                <form method="POST" action="/gardu-distribusi">
                    <!-- Kolom Kiri -->
                    <div>
                        <label>Nama Gardu: <input type="text" name="nama_gardu"></label><br><br>

                        <label>Fungsi:
                            <select name="fungsi">
                                <option value="Gardu Distribusi">Gardu Distribusi</option>
                            </select>
                        </label><br><br>

                        <label>Jenis:
                            <select name="jenis">
                                <option value="">Pilih Jenis</option>
                            </select>
                        </label><br><br>

                        <label>Tipe:
                            <select name="tipe">
                                <option value="">Pilih Tipe</option>
                            </select>
                        </label><br><br>

                        <h4>Peta</h4>
                        <label>Peta Latitude: <input type="text" name="peta_lat"></label><br><br>
                        <label>Peta Longitude: <input type="text" name="peta_long"></label><br><br>
                        <label>GPS Latitude: <input type="text" name="gps_lat"></label><br><br>
                        <label>GPS Longitude: <input type="text" name="gps_long"></label><br><br>

                        <label>Jenis Pelayanan:
                            <select name="jenis_pelayanan">
                                <option value="">Pilih Jenis Pelayanan</option>
                            </select>
                        </label><br><br>

                        <label>Alamat: <input type="text" name="alamat"></label><br><br>

                        <label>Gardu Induk:
                            <select name="gardu_induk">
                                <option value="">Pilih Gardu Induk</option>
                            </select>
                        </label><br><br>

                        <label>Penyulang:
                            <select name="penyulang">
                                <option value="">Pilih Penyulang</option>
                            </select>
                        </label><br><br>
                    </div>

                    <!-- Kolom Kanan -->
                    <div>
                        <h4>Kondisi</h4>
                        <label>Kondisi Dudukan:
                            <input type="radio" name="kondisi_dudukan" value="BAIK"> Baik
                            <input type="radio" name="kondisi_dudukan" value="RUSAK"> Rusak
                            <input type="radio" name="kondisi_dudukan" value="KOSONG"> Kosong
                        </label><br><br>

                        <label>Posisi Arde:
                            <input type="radio" name="posisi_arde" value="BAIK"> Baik
                            <input type="radio" name="posisi_arde" value="RUSAK"> Rusak
                            <input type="radio" name="posisi_arde" value="KOSONG"> Kosong
                        </label><br><br>

                        <label>Kondisi Arde:
                            <input type="radio" name="kondisi_arde" value="BAIK"> Baik
                            <input type="radio" name="kondisi_arde" value="RUSAK"> Rusak
                            <input type="radio" name="kondisi_arde" value="KOSONG"> Kosong
                        </label><br><br>

                        <label>Tahun Buat: <input type="text" name="tahun_buat"></label><br><br>
                        <label>Tahun Pasang: <input type="text" name="tahun_pasang"></label><br><br>
                        <label>Tahun Operasi: <input type="text" name="tahun_operasi"></label><br><br>
                        <label>Posko: <input type="text" name="posko"></label><br><br>
                        <label>Kode Surveyor: <input type="text" name="kode_surveyor"></label><br><br>
                        <label>Tanggal Operasi: <input type="date" name="tgl_operasi"></label><br><br>
                        <label>Tanggal Bongkar: <input type="date" name="tgl_bongkar"></label><br><br>
                        <label>Tanggal Survey: <input type="date" name="tgl_survey"></label><br><br>

                        <h4>Status</h4>
                        <label>
                            <input type="radio" name="status" value="OPERASI"> Operasi
                            <input type="radio" name="status" value="BONGKAR"> Bongkar
                            <input type="radio" name="status" value="SALAH ENTRI"> Salah Entri
                        </label><br><br>
                    </div>

                    <button type="button" onclick="window.history.back()">Back</button>
                    <button type="submit">Submit</button>
                </form>
            </td>
        </tr>
    </table>

</body>

</html>