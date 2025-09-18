<?php

namespace App\Controllers;

class GarduHubungController
{
    public function index()
    {
        return view("gardu-hubung/index");
    }

    public function create()
    {
        return view("gardu-hubung/create");
    }

    public function store()
    {
        return "✅ Gardu Hubung baru berhasil disimpan!";
    }

    public function show($id)
    {
        return "📄 Detail Gardu Hubung ID: " . $id;
    }

    public function edit($id)
    {
        return view("gardu-hubung/edit", compact('id'));
    }

    public function update($id)
    {
        return "✏️ Update Gardu Hubung ID: " . $id;
    }

    public function destroy($id)
    {
        return "🗑️ Gardu Hubung ID $id berhasil dihapus!";
    }
}
