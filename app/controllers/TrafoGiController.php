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
        $page = (int)($_GET['page'] ?? 1);
        $perPage = (int)($_GET['per_page'] ?? 10);
        $search = $_GET['search'] ?? '';
        
        // Validate page number
        if ($page < 1) $page = 1;
        
        // Validate per_page (max 100)
        if ($perPage > 100) $perPage = 100;
        if ($perPage < 1) $perPage = 10;

        $result = $this->model->paginate($page, $perPage, $search);
        
        $trafoGis = $result['data'];
        $pagination = $result['pagination'];
        
        return view("trafo-gi/index", compact('trafoGis', 'pagination', 'search'));
    }

    public function create()
    {
        $garduInduks = $this->giModel->all();
        $trafos = $this->trafoModel->all();
        return view("trafo-gi/create", compact('garduInduks', 'trafos'));
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'gi_id'        => 'required|exists:gardu_induk,gi_id',
            'trafo_id'     => 'required|exists:trafo,trafo_id',
            'tgl_pasang'   => 'required|date',
            'tgl_operasi'  => 'required|date',
            'status_operasi' => 'required|max:255',
            'kondisi_fisik'  => 'required|max:255',
            'posisi_arde'    => 'required|max:255',
            'arah_fasa'      => 'required|max:255',
            'keterangan'     => 'required|max:1000',
        ]);

        if (!$valid) {
            $errors = $data;
            $old = $request->all();
            $garduInduks = $this->giModel->all();
            $trafos = $this->trafoModel->all();
            return view("trafo-gi/create", compact('errors', 'old', 'garduInduks', 'trafos'));
        }

        $this->model->create($data);
        header("Location: /trafo-gi");
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
        [$valid, $data] = $request->validate([
            'gi_id'        => 'required|exists:gardu_induk,gi_id',
            'trafo_id'     => 'required|exists:trafo,trafo_id',
            'tgl_pasang'   => 'required|date',
            'tgl_operasi'  => 'required|date',
            'status_operasi' => 'required|max:255',
            'kondisi_fisik'  => 'required|max:255',
            'posisi_arde'    => 'required|max:255',
            'arah_fasa'      => 'required|max:255',
            'keterangan'     => 'required|max:1000',
        ]);

        if (!$valid) {
            $errors = $data;
            $trafoGi = $this->model->find($id, "trafo_gi_id");
            $garduInduks = $this->giModel->all();
            $trafos = $this->trafoModel->all();
            return view("trafo-gi/edit", compact('errors', 'trafoGi', 'id', 'garduInduks', 'trafos'));
        }

        $this->model->update($id, $data, "trafo_gi_id");
        header("Location: /trafo-gi");
        exit;
    }

    public function destroy($id)
    {
        // Cek relasi jika perlu (misal ada model lain terkait TrafoGi)
        // $relatedModel = new SomeRelatedModel();
        // $related = $relatedModel->whereAll('trafo_gi_id', $id);
        // if (!empty($related)) {
        //     $_SESSION['error'] = "Tidak bisa hapus, masih ada data terkait.";
        //     header("Location: /trafo-gi");
        //     exit;
        // }

        $this->model->delete($id, "trafo_gi_id");
        header("Location: /trafo-gi");
        exit;
    }
}
