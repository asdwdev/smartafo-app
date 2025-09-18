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
        $data = [
            'gi_id'        => $request->input('gi_id'),
            'penyulang_id' => $request->input('penyulang_id'),
            'kode_gardu'   => $request->input('kode_gardu'),
            'nama_gardu'   => $request->input('nama_gardu'),
            'alamat'       => $request->input('alamat'),
            'lat'          => $request->input('lat'),
            'lon'          => $request->input('lon'),
            'keterangan'   => $request->input('keterangan'),
        ];

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
        $data = [
            'gi_id'        => $request->input('gi_id'),
            'penyulang_id' => $request->input('penyulang_id'),
            'kode_gardu'   => $request->input('kode_gardu'),
            'nama_gardu'   => $request->input('nama_gardu'),
            'alamat'       => $request->input('alamat'),
            'lat'          => $request->input('lat'),
            'lon'          => $request->input('lon'),
            'keterangan'   => $request->input('keterangan'),
        ];

        if ($this->model->update($id, $data, "gd_id")) {
            header("Location: /gardu-distribusi");
            exit;
        } else {
            var_dump("Gagal update", $data, $id);
        }
    }

    public function destroy($id)
    {
        $this->model->delete($id, "gd_id");
        header("Location: /gardu-distribusi");
        exit;
    }
}
