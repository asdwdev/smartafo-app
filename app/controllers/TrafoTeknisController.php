<?php

namespace App\Controllers;

class TrafoTeknisController
{
    public function index()
    {
        return view("trafo-teknis/index");
    }

    public function create()
    {
        return view("trafo-teknis/create");
    }

    public function store()
    {
        return "✅ Trafo Teknis baru berhasil disimpan!";
    }

    public function show($id)
    {
        return "📄 Detail Trafo Teknis ID: " . $id;
    }

    public function edit($id)
    {
        return view("trafo-teknis/edit", compact('id'));
    }

    public function update($id)
    {
        return "✏️ Update Trafo Teknis ID: " . $id;
    }

    public function destroy($id)
    {
        return "🗑️ Trafo Teknis ID $id berhasil dihapus!";
    }
}
