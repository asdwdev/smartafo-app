<?php

namespace App\Controllers;

use App\Models\GarduHubung;
use App\Core\Request;

class GarduHubungController
{
    protected $model;

    public function __construct()
    {
        $this->model = new GarduHubung();
    }

    public function index()
    {
        $garduHubungs = $this->model->all();
        return view("gardu-hubung/index", compact('garduHubungs'));
    }

    public function create()
    {
        return view("gardu-hubung/create");
    }

    public function store(Request $request)
    {
        $data = [
            'kode_gh' => $request->input('kode_gh'),
            'nama_gh' => $request->input('nama_gh'),
            'alamat'  => $request->input('alamat'),
            'lat'     => $request->input('lat'),
            'lon'     => $request->input('lon'),
        ];

        $this->model->create($data);
        header("Location: /gardu-hubung");
        exit;
    }

    public function show($id)
    {
        $garduHubung = $this->model->find($id, "gh_id");
        return view("gardu-hubung/show", compact('garduHubung'));
    }

    public function edit($id)
    {
        $garduHubung = $this->model->find($id, "gh_id");
        return view("gardu-hubung/edit", compact('garduHubung', 'id'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'kode_gh' => $request->input('kode_gh'),
            'nama_gh' => $request->input('nama_gh'),
            'alamat'  => $request->input('alamat'),
            'lat'     => $request->input('lat'),
            'lon'     => $request->input('lon'),
        ];

        if ($this->model->update($id, $data, "gh_id")) {
            header("Location: /gardu-hubung");
            exit;
        } else {
            var_dump("Gagal update", $data, $id);
        }
    }

    public function destroy($id)
    {
        $this->model->delete($id, "gh_id");
        header("Location: /gardu-hubung");
        exit;
    }
}
