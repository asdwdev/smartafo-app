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
        $data = [
            'kode_gi' => $request->input('kode_gi'),
            'nama_gi' => $request->input('nama_gi'),
            'area'    => $request->input('area'),
            'alamat'  => $request->input('alamat'),
            'lat'     => $request->input('lat'),
            'lon'     => $request->input('lon'),
        ];

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
        $data = [
            'kode_gi' => $request->input('kode_gi'),
            'nama_gi' => $request->input('nama_gi'),
            'area'    => $request->input('area'),
            'alamat'  => $request->input('alamat'),
            'lat'     => $request->input('lat'),
            'lon'     => $request->input('lon'),
        ];

        $this->model->update($id, $data, "gi_id");
        header("Location: /gardu-induk");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "gi_id");
        header("Location: /gardu-induk");
        exit;
    }
}
