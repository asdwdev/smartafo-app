<?php

namespace App\Controllers;

use App\Models\TrafoTeknis;
use App\Core\Request;

class TrafoTeknisController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TrafoTeknis();
    }

    public function index()
    {
        $trafos = $this->model->all();
        return view("trafo-teknis/index", compact('trafos'));
    }

    public function create()
    {
        return view("trafo-teknis/create");
    }

    public function store(Request $request)
    {
        $data = [
            'no_seri'            => $request->input('no_seri'),
            'merk'               => $request->input('merk'),
            'kapasitas_kva'      => $request->input('kapasitas_kva'),
            'impedansi_persen'   => $request->input('impedansi_persen'),
            'pemilik'            => $request->input('pemilik'),
            'jenis_minyak'       => $request->input('jenis_minyak'),
            'tegangan_primer_kv' => $request->input('tegangan_primer_kv'),
            'tegangan_sekunder_v' => $request->input('tegangan_sekunder_v'),
            'kelas_isolasi'      => $request->input('kelas_isolasi'),
            'catatan'            => $request->input('catatan'),
        ];

        $this->model->create($data);
        header("Location: /trafo-teknis");
        exit;
    }

    public function show($id)
    {
        $trafo = $this->model->find($id, "trafo_teknis_id");
        return view("trafo-teknis/show", compact('trafo'));
    }

    public function edit($id)
    {
        $trafo = $this->model->find($id, "trafo_teknis_id");
        return view("trafo-teknis/edit", compact('trafo', 'id'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'no_seri'            => $request->input('no_seri'),
            'merk'               => $request->input('merk'),
            'kapasitas_kva'      => $request->input('kapasitas_kva'),
            'impedansi_persen'   => $request->input('impedansi_persen'),
            'pemilik'            => $request->input('pemilik'),
            'jenis_minyak'       => $request->input('jenis_minyak'),
            'tegangan_primer_kv' => $request->input('tegangan_primer_kv'),
            'tegangan_sekunder_v' => $request->input('tegangan_sekunder_v'),
            'kelas_isolasi'      => $request->input('kelas_isolasi'),
            'catatan'            => $request->input('catatan'),
        ];

        if ($this->model->update($id, $data, "trafo_teknis_id")) {
            header("Location: /trafo-teknis");
            exit;
        } else {
            var_dump("Gagal update", $data, $id);
        }
    }

    public function destroy($id)
    {
        $this->model->delete($id, "trafo_teknis_id");
        header("Location: /trafo-teknis");
        exit;
    }
}
