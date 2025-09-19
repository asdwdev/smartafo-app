<?php

namespace App\Controllers;

use App\Models\KubikelGardu;
use App\Models\GarduDistribusi;
use App\Models\Kubikel;
use App\Core\Request;

class KubikelGarduController
{
    protected $model;
    protected $garduModel;
    protected $kubikelModel;

    public function __construct()
    {
        $this->model        = new KubikelGardu();
        $this->garduModel   = new GarduDistribusi();
        $this->kubikelModel = new Kubikel();
    }

    public function index()
    {
        $kubikelGardu = $this->model->all();
        return view("kubikel-gardu/index", compact('kubikelGardu'));
    }

    public function create()
    {
        $garduDistribusi = $this->garduModel->all();
        $kubikels        = $this->kubikelModel->all();
        return view("kubikel-gardu/create", compact('garduDistribusi', 'kubikels'));
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'gd_id'       => 'required|numeric',
            'kubikel_id'  => 'required|numeric',
            'tgl_pasang'  => 'required|date',
            'tgl_operasi' => 'required|date',
            'status_rc'   => 'required|max:100',
            'arah_gardu'  => 'required|max:100',
            'ct_info'     => 'required|max:200',
            'vt_info'     => 'required|max:200',
            'relay_info'  => 'required|max:200',
            'fuse_info'   => 'required|max:200',
            'keterangan'  => 'nullable',
        ]);

        if (!$valid) {
            $errors          = $data;
            $garduDistribusi = $this->garduModel->all();
            $kubikels        = $this->kubikelModel->all();
            $old             = $request->all(); // <---- TAMBAHKAN INI
            return view("kubikel-gardu/create", compact('errors', 'garduDistribusi', 'kubikels', 'old'));
        }

        // Cek foreign key manual
        if (!$this->garduModel->find($data['gd_id'], 'gd_id')) {
            $errors['gd_id'][] = "Gardu Distribusi tidak ditemukan.";
        }
        if (!$this->kubikelModel->find($data['kubikel_id'], 'kubikel_id')) {
            $errors['kubikel_id'][] = "Kubikel tidak ditemukan.";
        }
        if (!empty($errors)) {
            $garduDistribusi = $this->garduModel->all();
            $kubikels        = $this->kubikelModel->all();
            return view("kubikel-gardu/create", compact('errors', 'garduDistribusi', 'kubikels'));
        }

        // Normalisasi field kosong jadi null
        foreach (['tgl_pasang', 'tgl_operasi', 'status_rc', 'arah_gardu', 'ct_info', 'vt_info', 'relay_info', 'fuse_info', 'keterangan'] as $f) {
            if ($data[$f] === '') {
                $data[$f] = null;
            }
        }

        $this->model->create($data);
        header("Location: /kubikel-gardu");
        exit;
    }

    public function show($id)
    {
        $kubikelGardu = $this->model->find($id, "kubikel_gardu_id");
        return view("kubikel-gardu/show", compact('kubikelGardu'));
    }

    public function edit($id)
    {
        $kubikelGardu    = $this->model->find($id, "kubikel_gardu_id");
        $garduDistribusi = $this->garduModel->all();
        $kubikels        = $this->kubikelModel->all();
        return view("kubikel-gardu/edit", compact('kubikelGardu', 'id', 'garduDistribusi', 'kubikels'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'gd_id'       => 'required|numeric',
            'kubikel_id'  => 'required|numeric',
            'tgl_pasang'  => 'required|date',
            'tgl_operasi' => 'required|date',
            'status_rc'   => 'required|max:100',
            'arah_gardu'  => 'required|max:100',
            'ct_info'     => 'required|max:200',
            'vt_info'     => 'required|max:200',
            'relay_info'  => 'required|max:200',
            'fuse_info'   => 'required|max:200',
            'keterangan'  => 'nullable',
        ]);

        if (!$valid) {
            $errors          = $data;
            $kubikelGardu    = $this->model->find($id, "kubikel_gardu_id");
            $garduDistribusi = $this->garduModel->all();
            $kubikels        = $this->kubikelModel->all();
            return view("kubikel-gardu/edit", compact('errors', 'kubikelGardu', 'id', 'garduDistribusi', 'kubikels'));
        }

        // Cek foreign key manual
        if (!$this->garduModel->find($data['gd_id'], 'gd_id')) {
            $errors['gd_id'][] = "Gardu Distribusi tidak ditemukan.";
        }
        if (!$this->kubikelModel->find($data['kubikel_id'], 'kubikel_id')) {
            $errors['kubikel_id'][] = "Kubikel tidak ditemukan.";
        }
        if (!empty($errors)) {
            $kubikelGardu    = $this->model->find($id, "kubikel_gardu_id");
            $garduDistribusi = $this->garduModel->all();
            $kubikels        = $this->kubikelModel->all();
            return view("kubikel-gardu/edit", compact('errors', 'kubikelGardu', 'id', 'garduDistribusi', 'kubikels'));
        }

        // Normalisasi field kosong jadi null
        foreach (['tgl_pasang', 'tgl_operasi', 'status_rc', 'arah_gardu', 'ct_info', 'vt_info', 'relay_info', 'fuse_info', 'keterangan'] as $f) {
            if ($data[$f] === '') {
                $data[$f] = null;
            }
        }

        $this->model->update($id, $data, "kubikel_gardu_id");
        header("Location: /kubikel-gardu");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "kubikel_gardu_id");
        header("Location: /kubikel-gardu");
        exit;
    }
}
