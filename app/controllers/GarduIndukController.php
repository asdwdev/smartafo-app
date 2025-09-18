<?php

namespace App\Controllers;

use App\Models\GarduInduk;
use App\Core\Request;

class GarduIndukController
{
    protected $model;

    public function __construct()
    {
        $this->model = new GarduInduk();
    }

    public function index()
    {
        $garduInduks = $this->model->all();
        return view("gardu-induk/index", compact('garduInduks'));
    }

    public function create()
    {
        return view("gardu-induk/create");
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'kode_gi' => 'nullable|regex:/^[A-Za-z0-9_-]+$/|unique:gardu_induk,kode_gi',
            'nama_gi' => 'required|max:255',
            'area'    => 'nullable|max:64',
            'alamat'  => 'nullable|max:500',
            'lat'     => 'nullable|numeric|between:-90,90',
            'lon'     => 'nullable|numeric|between:-180,180',
        ]);

        if (!$valid) {
            $errors = $data;
            return view("gardu-induk/create", compact('errors'));
        }

        // normalisasi kosong → null
        $data['lat'] = $data['lat'] === '' ? null : $data['lat'];
        $data['lon'] = $data['lon'] === '' ? null : $data['lon'];
        $data['area'] = $data['area'] === '' ? null : $data['area'];
        $data['alamat'] = $data['alamat'] === '' ? null : $data['alamat'];
        $data['kode_gi'] = $data['kode_gi'] === '' ? null : $data['kode_gi'];

        $this->model->create($data);
        header("Location: /gardu-induk");
        exit;
    }

    public function show($id)
    {
        $garduInduk = $this->model->find($id, "gi_id");
        return view("gardu-induk/show", compact('garduInduk'));
    }

    public function edit($id)
    {
        $garduInduk = $this->model->find($id, "gi_id");
        return view("gardu-induk/edit", compact('garduInduk', 'id'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'kode_gi' => "nullable|regex:/^[A-Za-z0-9_-]+$/|unique:gardu_induk,kode_gi,$id,gi_id",
            'nama_gi' => 'required|max:255',
            'area'    => 'nullable|max:64',
            'alamat'  => 'nullable|max:500',
            'lat'     => 'nullable|numeric|between:-90,90',
            'lon'     => 'nullable|numeric|between:-180,180',
        ]);

        if (!$valid) {
            $errors = $data;
            $garduInduk = $this->model->find($id, "gi_id");
            return view("gardu-induk/edit", compact('errors', 'garduInduk', 'id'));
        }

        // normalisasi kosong → null
        $data['lat'] = $data['lat'] === '' ? null : $data['lat'];
        $data['lon'] = $data['lon'] === '' ? null : $data['lon'];
        $data['area'] = $data['area'] === '' ? null : $data['area'];
        $data['alamat'] = $data['alamat'] === '' ? null : $data['alamat'];
        $data['kode_gi'] = $data['kode_gi'] === '' ? null : $data['kode_gi'];

        $this->model->update($id, $data, "gi_id");
        header("Location: /gardu-induk");
        exit;
    }

    public function destroy($id)
    {
        $penyulangModel = new \App\Models\Penyulang();
        $related = $penyulangModel->whereAll('gi_id', $id);

        if (!empty($related)) {
            $_SESSION['error'] = "Tidak bisa hapus, masih ada Penyulang terkait Gardu Induk ini.";
            header("Location: /gardu-induk");
            exit;
        }

        $this->model->delete($id, "gi_id");
        header("Location: /gardu-induk");
        exit;
    }
}
