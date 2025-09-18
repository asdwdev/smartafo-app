<?php

namespace App\Controllers;

use App\Models\Jurusan;
use App\Core\Request;

class JurusanController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Jurusan();
    }

    public function index()
    {
        $jurusans = $this->model->all();
        return view("jurusan/index", compact('jurusans'));
    }

    public function create()
    {
        return view("jurusan/create");
    }

    public function store(Request $request)
    {
        $data = [
            'gd_id'         => $request->input('gd_id'),
            'trafo_gardu_id' => $request->input('trafo_gardu_id'),
            'nama_jurusan'  => $request->input('nama_jurusan'),
            'keterangan'    => $request->input('keterangan'),
        ];

        $this->model->create($data);
        header("Location: /jurusan");
        exit;
    }

    public function show($id)
    {
        $jurusan = $this->model->find($id, "jurusan_id");
        return view("jurusan/show", compact('jurusan'));
    }

    public function edit($id)
    {
        $jurusan = $this->model->find($id, "jurusan_id");
        return view("jurusan/edit", compact('jurusan', 'id'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'gd_id'         => $request->input('gd_id'),
            'trafo_gardu_id' => $request->input('trafo_gardu_id'),
            'nama_jurusan'  => $request->input('nama_jurusan'),
            'keterangan'    => $request->input('keterangan'),
        ];

        $this->model->update($id, $data, "jurusan_id");
        header("Location: /jurusan");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "jurusan_id");
        header("Location: /jurusan");
        exit;
    }
}
