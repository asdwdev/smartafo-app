<?php

namespace App\Controllers;

use App\Models\TrafoGardu;
use App\Models\GarduDistribusi;
use App\Models\Trafo;
use App\Core\Request;

class TrafoGarduController
{
    protected $model;
    protected $gdModel;
    protected $trafoModel;

    public function __construct()
    {
        $this->model = new TrafoGardu();
        $this->gdModel = new GarduDistribusi();
        $this->trafoModel = new Trafo();
    }

    public function index()
    {
        $trafoGardus = $this->model->all();
        return view("trafo-gardu/index", compact('trafoGardus'));
    }

    public function create()
    {
        $garduDistribusis = $this->gdModel->all();
        $trafos = $this->trafoModel->all();
        return view("trafo-gardu/create", compact('garduDistribusis', 'trafos'));
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'gd_id'         => 'required|numeric',
            'trafo_id'      => 'required|numeric',
            'tgl_pasang'    => 'required|regex:/^\d{4}-\d{2}-\d{2}$/',
            'tgl_operasi'   => 'required|regex:/^\d{4}-\d{2}-\d{2}$/',
            'status_operasi' => 'required|max:100',
            'kondisi_fisik' => 'required|max:100',
            'posisi_arde'   => 'required|max:100',
            'arah_fasa'     => 'required|max:32',
            'keterangan'    => 'required',
        ]);

        if (!$valid) {
            $errors = $data;
            $garduDistribusis = $this->gdModel->all();
            $trafos = $this->trafoModel->all();
            return view("trafo-gardu/create", compact('errors', 'garduDistribusis', 'trafos'));
        }

        // normalisasi kosong → null
        foreach (['tgl_pasang', 'tgl_operasi', 'status_operasi', 'kondisi_fisik', 'posisi_arde', 'arah_fasa', 'keterangan'] as $field) {
            if ($data[$field] === '') {
                $data[$field] = null;
            }
        }

        $this->model->create($data);
        header("Location: /trafo-gardu");
        exit;
    }

    public function show($id)
    {
        $trafoGardu = $this->model->find($id, "trafo_gardu_id");
        return view("trafo-gardu/show", compact('trafoGardu'));
    }

    public function edit($id)
    {
        $trafoGardu = $this->model->find($id, "trafo_gardu_id");
        $garduDistribusis = $this->gdModel->all();
        $trafos = $this->trafoModel->all();

        return view("trafo-gardu/edit", compact('trafoGardu', 'id', 'garduDistribusis', 'trafos'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'gd_id'         => 'required|numeric',
            'trafo_id'      => 'required|numeric',
            'tgl_pasang'    => 'required|regex:/^\d{4}-\d{2}-\d{2}$/',
            'tgl_operasi'   => 'required|regex:/^\d{4}-\d{2}-\d{2}$/',
            'status_operasi' => 'required|max:100',
            'kondisi_fisik' => 'required|max:100',
            'posisi_arde'   => 'required|max:100',
            'arah_fasa'     => 'required|max:32',
            'keterangan'    => 'required',
        ]);

        if (!$valid) {
            $errors = $data;
            $trafoGardu = $this->model->find($id, "trafo_gardu_id");
            $garduDistribusis = $this->gdModel->all();
            $trafos = $this->trafoModel->all();
            return view("trafo-gardu/edit", compact('errors', 'trafoGardu', 'id', 'garduDistribusis', 'trafos'));
        }

        // normalisasi kosong → null
        foreach (['tgl_pasang', 'tgl_operasi', 'status_operasi', 'kondisi_fisik', 'posisi_arde', 'arah_fasa', 'keterangan'] as $field) {
            if ($data[$field] === '') {
                $data[$field] = null;
            }
        }

        $this->model->update($id, $data, "trafo_gardu_id");
        header("Location: /trafo-gardu");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "trafo_gardu_id");
        header("Location: /trafo-gardu");
        exit;
    }
}
