<?php

namespace App\Controllers;

class PenyulangController
{
    public function index()
    {
        return view("penyulang/index");
    }

    public function create()
    {
        // nanti bisa ambil daftar GI dari DB
        $garduInduk = [
            ['gi_id' => 1, 'nama_gi' => 'Duri Kosambi'],
            ['gi_id' => 2, 'nama_gi' => 'Kebon Jeruk'],
        ];

        return view("penyulang/create", compact('garduInduk'));
    }

    public function store()
    {
        return "✅ Penyulang baru berhasil disimpan!";
    }

    public function show($id)
    {
        return "📄 Detail Penyulang ID: " . $id;
    }

    public function edit($id)
    {
        $garduInduk = [
            ['gi_id' => 1, 'nama_gi' => 'Duri Kosambi'],
            ['gi_id' => 2, 'nama_gi' => 'Kebon Jeruk'],
        ];

        return view("penyulang/edit", compact('id', 'garduInduk'));
    }

    public function update($id)
    {
        return "✏️ Update Penyulang ID: " . $id;
    }

    public function destroy($id)
    {
        return "🗑️ Penyulang ID $id berhasil dihapus!";
    }
}
