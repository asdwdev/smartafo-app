<?php

namespace App\Controllers;

use App\Models\Kubikel;
use App\Core\Request;

class KubikelController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Kubikel();
    }

    public function index()
    {
        $kubikels = $this->model->all();
        return view("kubikel/index", compact('kubikels'));
    }

    public function create()
    {
        return view("kubikel/create");
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'no_seri'          => 'required|min:3|max:128|unique:kubikel,no_seri',
            'merk'             => 'required|max:64',
            'jenis'            => 'required|max:100',
            'fungsi'           => 'required|max:100',
            'tegangan_kv'      => 'required|numeric',
            'kapasitas_a'      => 'required|numeric',
            'impedansi_persen' => 'required|numeric',
            'catatan'          => 'nullable|max:500',
        ]);

        if (!$valid) {
            $errors = $data;
            return view("kubikel/create", compact('errors'));
        }

        // normalisasi kosong → null
        foreach (['catatan'] as $field) {
            if ($data[$field] === '') {
                $data[$field] = null;
            }
        }

        $this->model->create($data);
        header("Location: /kubikel");
        exit;
    }

    public function show($id)
    {
        $kubikel = $this->model->find($id, "kubikel_id");
        return view("kubikel/show", compact('kubikel'));
    }

    public function edit($id)
    {
        $kubikel = $this->model->find($id, "kubikel_id");
        return view("kubikel/edit", compact('kubikel', 'id'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'no_seri'          => "required|min:3|max:128|unique:kubikel,no_seri,$id,kubikel_id",
            'merk'             => 'required|max:64',
            'jenis'            => 'required|max:100',
            'fungsi'           => 'required|max:100',
            'tegangan_kv'      => 'required|numeric',
            'kapasitas_a'      => 'required|numeric',
            'impedansi_persen' => 'required|numeric',
            'catatan'          => 'nullable|max:500',
        ]);

        if (!$valid) {
            $errors  = $data;
            $kubikel = $this->model->find($id, "kubikel_id");
            return view("kubikel/edit", compact('errors', 'kubikel', 'id'));
        }

        // normalisasi kosong → null
        foreach (['catatan'] as $field) {
            if ($data[$field] === '') {
                $data[$field] = null;
            }
        }

        $this->model->update($id, $data, "kubikel_id");
        header("Location: /kubikel");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "kubikel_id");
        header("Location: /kubikel");
        exit;
    }
}
