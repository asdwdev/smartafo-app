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
        $data = [
            'no_seri'          => $request->input('no_seri'),
            'merk'             => $request->input('merk'),
            'jenis'            => $request->input('jenis'),
            'fungsi'           => $request->input('fungsi'),
            'tegangan_kv'      => $request->input('tegangan_kv'),
            'kapasitas_a'      => $request->input('kapasitas_a'),
            'impedansi_persen' => $request->input('impedansi_persen'),
            'catatan'          => $request->input('catatan'),
        ];

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
        $data = [
            'no_seri'          => $request->input('no_seri'),
            'merk'             => $request->input('merk'),
            'jenis'            => $request->input('jenis'),
            'fungsi'           => $request->input('fungsi'),
            'tegangan_kv'      => $request->input('tegangan_kv'),
            'kapasitas_a'      => $request->input('kapasitas_a'),
            'impedansi_persen' => $request->input('impedansi_persen'),
            'catatan'          => $request->input('catatan'),
        ];

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
