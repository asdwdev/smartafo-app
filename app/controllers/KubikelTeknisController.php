<?php

namespace App\Controllers;

class KubikelTeknisController
{
    public function index()
    {
        return view("kubikel-teknis/index");
    }

    public function create()
    {
        return view("kubikel-teknis/create");
    }

    public function store()
    {
        return "✅ Kubikel Teknis baru berhasil disimpan!";
    }

    public function show($id)
    {
        return "📄 Detail Kubikel Teknis ID: " . $id;
    }

    public function edit($id)
    {
        return view("kubikel-teknis/edit", compact('id'));
    }

    public function update($id)
    {
        return "✏️ Update Kubikel Teknis ID: " . $id;
    }

    public function destroy($id)
    {
        return "🗑️ Kubikel Teknis ID $id berhasil dihapus!";
    }
}
