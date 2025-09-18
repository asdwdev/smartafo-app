<?php

namespace App\Controllers;

use App\Models\Trafo;
use App\Core\Request;

class TrafoController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Trafo();
    }

    public function index()
    {
        $trafos = $this->model->all();
        return view("trafo/index", compact('trafos'));
    }

    public function create()
    {
        return view("trafo/create");
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'no_seri'             => 'required|max:128|unique:trafo,no_seri',
            'merk'                => 'required|max:64',
            'kapasitas_kva'       => 'required|numeric',
            'impedansi_persen'    => 'required|numeric',
            'pemilik'             => 'nullable|max:64',
            'jenis_minyak'        => 'nullable|max:100',
            'tegangan_primer_kv'  => 'required|numeric',
            'tegangan_sekunder_v' => 'required|numeric',
            'kelas_isolasi'       => 'nullable|max:100',
            'catatan'             => 'nullable',
        ]);

        if (!$valid) {
            $errors = $data;
            return view("trafo/create", compact('errors'));
        }

        // normalisasi kosong → null
        foreach (['pemilik', 'jenis_minyak', 'kelas_isolasi', 'catatan'] as $field) {
            if ($data[$field] === '') {
                $data[$field] = null;
            }
        }

        $this->model->create($data);
        header("Location: /trafo");
        exit;
    }

    public function show($id)
    {
        $trafo = $this->model->find($id, "trafo_id");
        return view("trafo/show", compact('trafo'));
    }

    public function edit($id)
    {
        $trafo = $this->model->find($id, "trafo_id");
        return view("trafo/edit", compact('trafo', 'id'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'no_seri'             => "required|max:128|unique:trafo,no_seri,$id,trafo_id",
            'merk'                => 'required|max:64',
            'kapasitas_kva'       => 'required|numeric',
            'impedansi_persen'    => 'required|numeric',
            'pemilik'             => 'nullable|max:64',
            'jenis_minyak'        => 'nullable|max:100',
            'tegangan_primer_kv'  => 'required|numeric',
            'tegangan_sekunder_v' => 'required|numeric',
            'kelas_isolasi'       => 'nullable|max:100',
            'catatan'             => 'nullable',
        ]);

        if (!$valid) {
            $errors = $data;
            $trafo  = $this->model->find($id, "trafo_id");
            return view("trafo/edit", compact('errors', 'trafo', 'id'));
        }

        // normalisasi kosong → null
        foreach (['pemilik', 'jenis_minyak', 'kelas_isolasi', 'catatan'] as $field) {
            if ($data[$field] === '') {
                $data[$field] = null;
            }
        }

        $this->model->update($id, $data, "trafo_id");
        header("Location: /trafo");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "trafo_id");
        header("Location: /trafo");
        exit;
    }
}
