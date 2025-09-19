<?php

namespace App\Controllers;

use App\Models\GarduDistribusi;
use App\Models\GarduInduk;
use App\Models\Penyulang;
use App\Core\Request;

class GarduDistribusiController
{
    protected $model;
    protected $giModel;
    protected $penyulangModel;

    public function __construct()
    {
        $this->model = new GarduDistribusi();
        $this->giModel = new GarduInduk();
        $this->penyulangModel = new Penyulang();
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
        
        $gardus = $result['data'];
        $pagination = $result['pagination'];
        
        return view("gardu-distribusi/index", compact('gardus', 'pagination', 'search'));
    }

    public function create()
    {
        $garduInduks = $this->giModel->all();
        $penyulangs  = $this->penyulangModel->all();

        return view("gardu-distribusi/create", compact('garduInduks', 'penyulangs'));
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'gi_id'        => 'required|numeric',
            'penyulang_id' => 'required|numeric',
            'kode_gardu'   => 'required|regex:/^[A-Za-z0-9_-]+$/|max:64|unique:gardu_distribusi,kode_gardu',
            'nama_gardu'   => 'required|max:128',
            'alamat'       => 'required|max:500',
            'lat'          => 'required|numeric|between:-90,90',
            'lon'          => 'required|numeric|between:-180,180',
            'keterangan'   => 'required|max:1000',
        ]);

        if (!$valid) {
            $errors = $data;
            $garduInduks = $this->giModel->all();
            $penyulangs  = $this->penyulangModel->all();

            return view("gardu-distribusi/create", [
                'errors'      => $errors,
                'old'         => $request->all(),
                'garduInduks' => $garduInduks,
                'penyulangs'  => $penyulangs
            ]);
        }

        $this->model->create($data);
        header("Location: /gardu-distribusi");
        exit;
    }

    public function show($id)
    {
        $gardu = $this->model->find($id, "gd_id");
        if (!$gardu) {
            header("Location: /gardu-distribusi");
            exit;
        }

        return view("gardu-distribusi/show", compact('gardu'));
    }

    public function edit($id)
    {
        $gardu = $this->model->find($id, "gd_id");
        if (!$gardu) {
            header("Location: /gardu-distribusi");
            exit;
        }

        $garduInduks = $this->giModel->all();
        $penyulangs  = $this->penyulangModel->all();

        return view("gardu-distribusi/edit", compact('gardu', 'garduInduks', 'penyulangs', 'id'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'gi_id'        => 'required|numeric',
            'penyulang_id' => 'required|numeric',
            'kode_gardu'   => "required|regex:/^[A-Za-z0-9_-]+$/|max:64|unique:gardu_distribusi,kode_gardu,$id,gd_id",
            'nama_gardu'   => 'required|max:128',
            'alamat'       => 'required|max:500',
            'lat'          => 'required|numeric|between:-90,90',
            'lon'          => 'required|numeric|between:-180,180',
            'keterangan'   => 'required|max:1000',
        ]);

        if (!$valid) {
            $errors = $data;
            $gardu = $this->model->find($id, "gd_id");
            $garduInduks = $this->giModel->all();
            $penyulangs  = $this->penyulangModel->all();

            return view("gardu-distribusi/edit", compact('errors', 'gardu', 'garduInduks', 'penyulangs', 'id'));
        }

        $this->model->update($id, $data, "gd_id");
        header("Location: /gardu-distribusi");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "gd_id");
        header("Location: /gardu-distribusi");
        exit;
    }
}
