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
        $data = [
            'gd_id'         => $request->input('gd_id'),
            'trafo_id'      => $request->input('trafo_id'),
            'tgl_pasang'    => $request->input('tgl_pasang'),
            'tgl_operasi'   => $request->input('tgl_operasi'),
            'status_operasi' => $request->input('status_operasi'),
            'kondisi_fisik' => $request->input('kondisi_fisik'),
            'posisi_arde'   => $request->input('posisi_arde'),
            'arah_fasa'     => $request->input('arah_fasa'),
            'keterangan'    => $request->input('keterangan'),
        ];

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
        $data = [
            'gd_id'         => $request->input('gd_id'),
            'trafo_id'      => $request->input('trafo_id'),
            'tgl_pasang'    => $request->input('tgl_pasang'),
            'tgl_operasi'   => $request->input('tgl_operasi'),
            'status_operasi' => $request->input('status_operasi'),
            'kondisi_fisik' => $request->input('kondisi_fisik'),
            'posisi_arde'   => $request->input('posisi_arde'),
            'arah_fasa'     => $request->input('arah_fasa'),
            'keterangan'    => $request->input('keterangan'),
        ];

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
