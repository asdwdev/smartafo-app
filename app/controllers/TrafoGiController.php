<?php

namespace App\Controllers;

use App\Models\TrafoGi;
use App\Models\GarduInduk;
use App\Models\Trafo;
use App\Core\Request;

class TrafoGiController
{
    protected $model;
    protected $giModel;
    protected $trafoModel;

    public function __construct()
    {
        $this->model = new TrafoGi();
        $this->giModel = new GarduInduk();
        $this->trafoModel = new Trafo();
    }

    public function index()
    {
        $trafoGis = $this->model->all();
        return view("trafo-gi/index", compact('trafoGis'));
    }

    public function create()
    {
        $garduInduks = $this->giModel->all();
        $trafos = $this->trafoModel->all();
        return view("trafo-gi/create", compact('garduInduks', 'trafos'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $errors = [];
        if (!$request->input('gi_id')) {
            $errors[] = "Gardu Induk wajib dipilih.";
        }
        if (!$request->input('trafo_id')) {
            $errors[] = "Trafo wajib dipilih.";
        }

        if (!empty($errors)) {
            $_SESSION['error'] = implode(" ", $errors);
            header("Location: /trafo-gi/create");
            exit;
        }

        $data = [
            'gi_id'          => $request->input('gi_id'),
            'trafo_id'       => $request->input('trafo_id'),
            'tgl_pasang'     => $request->input('tgl_pasang') ?: null,
            'tgl_operasi'    => $request->input('tgl_operasi') ?: null,
            'status_operasi' => $request->input('status_operasi'),
            'kondisi_fisik'  => $request->input('kondisi_fisik'),
            'posisi_arde'    => $request->input('posisi_arde'),
            'arah_fasa'      => $request->input('arah_fasa'),
            'keterangan'     => $request->input('keterangan'),
        ];

        try {
            $this->model->create($data);
            header("Location: /trafo-gi");
        } catch (\Exception $e) {
            $_SESSION['error'] = "Gagal simpan Trafo GI: " . $e->getMessage();
            header("Location: /trafo-gi/create");
        }
        exit;
    }

    public function show($id)
    {
        $trafoGi = $this->model->find($id, "trafo_gi_id");
        return view("trafo-gi/show", compact('trafoGi'));
    }

    public function edit($id)
    {
        $trafoGi = $this->model->find($id, "trafo_gi_id");
        $garduInduks = $this->giModel->all();
        $trafos = $this->trafoModel->all();

        return view("trafo-gi/edit", compact('trafoGi', 'id', 'garduInduks', 'trafos'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $errors = [];
        if (!$request->input('gi_id')) {
            $errors[] = "Gardu Induk wajib dipilih.";
        }
        if (!$request->input('trafo_id')) {
            $errors[] = "Trafo wajib dipilih.";
        }

        if (!empty($errors)) {
            $_SESSION['error'] = implode(" ", $errors);
            header("Location: /trafo-gi/{$id}/edit");
            exit;
        }

        $data = [
            'gi_id'          => $request->input('gi_id'),
            'trafo_id'       => $request->input('trafo_id'),
            'tgl_pasang'     => $request->input('tgl_pasang') ?: null,
            'tgl_operasi'    => $request->input('tgl_operasi') ?: null,
            'status_operasi' => $request->input('status_operasi'),
            'kondisi_fisik'  => $request->input('kondisi_fisik'),
            'posisi_arde'    => $request->input('posisi_arde'),
            'arah_fasa'      => $request->input('arah_fasa'),
            'keterangan'     => $request->input('keterangan'),
        ];

        try {
            $this->model->update($id, $data, "trafo_gi_id");
            header("Location: /trafo-gi");
        } catch (\Exception $e) {
            $_SESSION['error'] = "Gagal update Trafo GI: " . $e->getMessage();
            header("Location: /trafo-gi/{$id}/edit");
        }
        exit;
    }

    public function destroy($id)
    {
        try {
            $this->model->delete($id, "trafo_gi_id");
        } catch (\Exception $e) {
            $_SESSION['error'] = "Gagal hapus Trafo GI: " . $e->getMessage();
        }
        header("Location: /trafo-gi");
        exit;
    }
}
