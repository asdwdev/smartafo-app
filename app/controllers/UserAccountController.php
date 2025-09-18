<?php

namespace App\Controllers;

class UserAccountController
{
    public function index()
    {
        return view("user-account/index");
    }

    public function create()
    {
        return view("user-account/create");
    }

    public function store()
    {
        return "✅ User baru berhasil disimpan!";
    }

    public function show($id)
    {
        return "📄 Detail User ID: " . $id;
    }

    public function edit($id)
    {
        return view("user-account/edit", compact('id'));
    }

    public function update($id)
    {
        return "✏️ Update User ID: " . $id;
    }

    public function destroy($id)
    {
        return "🗑️ User ID $id berhasil dihapus!";
    }
}
