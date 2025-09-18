<?php

namespace App\Controllers;

use App\Models\GarduDistribusi;
use App\Models\GarduInduk;
use App\Models\Penyulang;
use App\Core\Request;

class GarduDistribusiController
{
    protected $model;
    protected $giModel;
    protected $penyulangModel;

    public function __construct()
    {
        $this->model = new GarduDistribusi();
        $this->giModel = new GarduInduk();
        $this->penyulangModel = new Penyulang();
    }

    public function index()
    {
        $gardus = $this->model->all();
        return view("gardu-distribusi/index", compact('gardus'));
    }

    public function create()
    {
        $garduInduks = $this->giModel->all();
        $penyulangs  = $this->penyulangModel->all();
        return view("gardu-distribusi/create", compact('garduInduks', 'penyulangs'));
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'gi_id'        => 'nullable|numeric',
            'penyulang_id' => 'nullable|numeric',
            'kode_gardu'   => 'nullable|regex:/^[A-Za-z0-9_-]+$/|max:64|unique:gardu_distribusi,kode_gardu',
            'nama_gardu'   => 'required|max:128',
            'alamat'       => 'nullable|max:500',
            'lat'          => 'nullable|numeric|between:-90,90',
            'lon'          => 'nullable|numeric|between:-180,180',
            'keterangan'   => 'nullable|max:1000',
        ]);

        if (!$valid) {
            $errors = $data;
            $garduInduks = $this->giModel->all();
            $penyulangs  = $this->penyulangModel->all();
            return view("gardu-distribusi/create", [
                'errors' => $errors,
                'old' => $request->all(),
                'garduInduks' => $garduInduks,
                'penyulangs'  => $penyulangs
            ]);
        }

        // normalisasi kosong → null
        foreach (['gi_id', 'penyulang_id', 'lat', 'lon', 'alamat', 'kode_gardu', 'keterangan'] as $field) {
            if ($data[$field] === '') {
                $data[$field] = null;
            }
        }

        $this->model->create($data);
        header("Location: /gardu-distribusi");
        exit;
    }

    public function show($id)
    {
        $gardu = $this->model->find($id, "gd_id");
        return view("gardu-distribusi/show", compact('gardu'));
    }

    public function edit($id)
    {
        $gardu = $this->model->find($id, "gd_id");
        $garduInduks = $this->giModel->all();
        $penyulangs  = $this->penyulangModel->all();

        return view("gardu-distribusi/edit", compact('gardu', 'garduInduks', 'penyulangs', 'id'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'gi_id'        => 'nullable|numeric',
            'penyulang_id' => 'nullable|numeric',
            'kode_gardu'   => "nullable|regex:/^[A-Za-z0-9_-]+$/|max:64|unique:gardu_distribusi,kode_gardu,$id,gd_id",
            'nama_gardu'   => 'required|max:128',
            'alamat'       => 'nullable|max:500',
            'lat'          => 'nullable|numeric|between:-90,90',
            'lon'          => 'nullable|numeric|between:-180,180',
            'keterangan'   => 'nullable|max:1000',
        ]);

        if (!$valid) {
            $errors = $data;
            $gardu = $this->model->find($id, "gd_id");
            $garduInduks = $this->giModel->all();
            $penyulangs  = $this->penyulangModel->all();
            return view("gardu-distribusi/edit", compact('errors', 'gardu', 'garduInduks', 'penyulangs', 'id'));
        }

        foreach (['gi_id', 'penyulang_id', 'lat', 'lon', 'alamat', 'kode_gardu', 'keterangan'] as $field) {
            if ($data[$field] === '') {
                $data[$field] = null;
            }
        }

        $this->model->update($id, $data, "gd_id");
        header("Location: /gardu-distribusi");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "gd_id");
        header("Location: /gardu-distribusi");
        exit;
    }
}
