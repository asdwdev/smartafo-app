<?php

namespace App\Controllers;

use App\Models\Jurusan;
use App\Models\GarduDistribusi;
use App\Models\TrafoGardu;
use App\Core\Request;

class JurusanController
{
    protected $model;
    protected $garduModel;
    protected $trafoGarduModel;

    public function __construct()
    {
        $this->model           = new Jurusan();
        $this->garduModel      = new GarduDistribusi();
        $this->trafoGarduModel = new TrafoGardu();
    }

    public function index()
    {
        $jurusans = $this->model->all();
        return view("jurusan/index", compact('jurusans'));
    }

    public function create()
    {
        $garduDistribusi = $this->garduModel->all();
        $trafoGardu      = $this->trafoGarduModel->all();
        return view("jurusan/create", compact('garduDistribusi', 'trafoGardu'));
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'gd_id'         => 'required|numeric',
            'trafo_gardu_id' => 'nullable|numeric',
            'nama_jurusan'  => 'required|max:128',
            'keterangan'    => 'nullable',
        ]);

        if (!$valid) {
            $errors          = $data;
            $garduDistribusi = $this->garduModel->all();
            $trafoGardu      = $this->trafoGarduModel->all();
            return view("jurusan/create", compact('errors', 'garduDistribusi', 'trafoGardu'));
        }

        // cek foreign key
        if (!$this->garduModel->find($data['gd_id'], 'gd_id')) {
            $errors['gd_id'][] = "Gardu Distribusi tidak ditemukan.";
        }
        if (!empty($data['trafo_gardu_id']) && !$this->trafoGarduModel->find($data['trafo_gardu_id'], 'trafo_gardu_id')) {
            $errors['trafo_gardu_id'][] = "Trafo Gardu tidak ditemukan.";
        }

        if (!empty($errors)) {
            $garduDistribusi = $this->garduModel->all();
            $trafoGardu      = $this->trafoGarduModel->all();
            return view("jurusan/create", compact('errors', 'garduDistribusi', 'trafoGardu'));
        }

        // normalisasi kosong
        foreach (['trafo_gardu_id', 'keterangan'] as $f) {
            if ($data[$f] === '') {
                $data[$f] = null;
            }
        }

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
        $jurusan         = $this->model->find($id, "jurusan_id");
        $garduDistribusi = $this->garduModel->all();
        $trafoGardu      = $this->trafoGarduModel->all();
        return view("jurusan/edit", compact('jurusan', 'id', 'garduDistribusi', 'trafoGardu'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'gd_id'         => 'required|numeric',
            'trafo_gardu_id' => 'nullable|numeric',
            'nama_jurusan'  => 'required|max:128',
            'keterangan'    => 'nullable',
        ]);

        if (!$valid) {
            $errors          = $data;
            $jurusan         = $this->model->find($id, "jurusan_id");
            $garduDistribusi = $this->garduModel->all();
            $trafoGardu      = $this->trafoGarduModel->all();
            return view("jurusan/edit", compact('errors', 'jurusan', 'id', 'garduDistribusi', 'trafoGardu'));
        }

        // cek foreign key
        if (!$this->garduModel->find($data['gd_id'], 'gd_id')) {
            $errors['gd_id'][] = "Gardu Distribusi tidak ditemukan.";
        }
        if (!empty($data['trafo_gardu_id']) && !$this->trafoGarduModel->find($data['trafo_gardu_id'], 'trafo_gardu_id')) {
            $errors['trafo_gardu_id'][] = "Trafo Gardu tidak ditemukan.";
        }

        if (!empty($errors)) {
            $jurusan         = $this->model->find($id, "jurusan_id");
            $garduDistribusi = $this->garduModel->all();
            $trafoGardu      = $this->trafoGarduModel->all();
            return view("jurusan/edit", compact('errors', 'jurusan', 'id', 'garduDistribusi', 'trafoGardu'));
        }

        // normalisasi kosong
        foreach (['trafo_gardu_id', 'keterangan'] as $f) {
            if ($data[$f] === '') {
                $data[$f] = null;
            }
        }

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
