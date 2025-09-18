<?php

namespace App\Controllers;

class GarduIndukController
{
    public function index()
    {
        return view("gardu-induk/index");
    }

    public function create()
    {
        return view("gardu-induk/create");
    }

    public function store()
    {
        // nanti isi logika simpan ke database
        return "✅ Gardu Induk baru berhasil disimpan!";
    }

    public function show($id)
    {
        return "📄 Detail Gardu Induk ID: " . $id;
    }

    public function edit($id)
    {
        return view("gardu-induk/edit", compact('id'));
    }

    public function update($id)
    {
        return "✏️ Update Gardu Induk ID: " . $id;
    }

    public function destroy($id)
    {
        return "🗑️ Gardu Induk ID $id berhasil dihapus!";
    }
}
