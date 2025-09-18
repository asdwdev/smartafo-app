<?php

namespace App\Controllers;

class GarduDistribusiController
{
    public function index()
    {
        return view("gardu-distribusi/index");
    }

    public function create()
    {
        return view("gardu-distribusi/create");
    }

    public function store()
    {
        return "✅ Gardu baru berhasil disimpan!";
    }

    public function show($id)
    {
        return "📄 Detail Gardu ID: " . $id;
    }

    public function edit($id)
    {
        return view("gardu-distribusi/edit", compact('id'));
    }

    public function update($id)
    {
        return "✏️ Update Gardu ID: " . $id;
    }

    public function destroy($id)
    {
        return "🗑️ Gardu ID $id berhasil dihapus!";
    }
}
