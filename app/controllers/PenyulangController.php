<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Penyulang;
use App\Models\GarduInduk;

class PenyulangController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Penyulang();
    }

    public function index()
    {
        $penyulangs = $this->model->all();
        return view("penyulang/index", compact('penyulangs'));
    }

    public function create()
    {
        $giModel = new GarduInduk();
        $garduInduk = $giModel->all();

        return view("penyulang/create", compact('garduInduk'));
    }

    public function store(Request $request)
    {
        $data = [
            'kode_penyulang' => $request->input('kode_penyulang'),
            'nama_penyulang' => $request->input('nama_penyulang'),
            'tegangan_kv'    => $request->input('tegangan_kv'),
            'gi_id'          => $request->input('gi_id'),
        ];

        $this->model->create($data);
        header("Location: /penyulang");
        exit;
    }

    public function show($id)
    {
        $penyulang = $this->model->find($id, "penyulang_id");
        return view("penyulang/show", compact('penyulang'));
    }

    public function edit($id)
    {
        $penyulang = $this->model->find($id, "penyulang_id");

        $giModel = new GarduInduk();
        $garduInduk = $giModel->all();

        return view("penyulang/edit", compact('penyulang', 'garduInduk', 'id'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'kode_penyulang' => $request->input('kode_penyulang'),
            'nama_penyulang' => $request->input('nama_penyulang'),
            'tegangan_kv'    => $request->input('tegangan_kv'),
            'gi_id'          => $request->input('gi_id'),
        ];

        $this->model->update($id, $data, "penyulang_id");
        header("Location: /penyulang");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "penyulang_id");
        header("Location: /penyulang");
        exit;
    }
}
