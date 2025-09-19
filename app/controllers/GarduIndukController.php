<?php

namespace App\Controllers;

use App\Models\GarduInduk;
use App\Core\Request;

class GarduIndukController
{
    protected $model;

    public function __construct()
    {
        $this->model = new GarduInduk();
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
        
        $garduInduks = $result['data'];
        $pagination = $result['pagination'];
        
        return view("gardu-induk/index", compact('garduInduks', 'pagination', 'search'));
    }

    public function create()
    {
        return view("gardu-induk/create");
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'kode_gi' => 'required|regex:/^[A-Za-z0-9_-]+$/|unique:gardu_induk,kode_gi',
            'nama_gi' => 'required|max:255',
            'area'    => 'required|max:64',
            'alamat'  => 'required|max:500',
            'lat'     => 'required|numeric|between:-90,90',
            'lon'     => 'required|numeric|between:-180,180',
        ]);

        if (!$valid) {
            $errors = $data;
            $old = $request->all();
            return view("gardu-induk/create", compact('errors', 'old'));
        }

        $this->model->create($data);
        header("Location: /gardu-induk");
        exit;
    }

    public function show($id)
    {
        $garduInduk = $this->model->find($id, "gi_id");
        return view("gardu-induk/show", compact('garduInduk'));
    }

    public function edit($id)
    {
        $garduInduk = $this->model->find($id, "gi_id");
        return view("gardu-induk/edit", compact('garduInduk', 'id'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'kode_gi' => "required|regex:/^[A-Za-z0-9_-]+$/|unique:gardu_induk,kode_gi,$id,gi_id",
            'nama_gi' => 'required|max:255',
            'area'    => 'required|max:64',
            'alamat'  => 'required|max:500',
            'lat'     => 'required|numeric|between:-90,90',
            'lon'     => 'required|numeric|between:-180,180',
        ]);

        if (!$valid) {
            $errors = $data;
            $garduInduk = $this->model->find($id, "gi_id");
            return view("gardu-induk/edit", compact('errors', 'garduInduk', 'id'));
        }

        $this->model->update($id, $data, "gi_id");
        header("Location: /gardu-induk");
        exit;
    }

    public function destroy($id)
    {
        $penyulangModel = new \App\Models\Penyulang();
        $related = $penyulangModel->whereAll('gi_id', $id);

        if (!empty($related)) {
            $_SESSION['error'] = "Tidak bisa hapus, masih ada Penyulang terkait Gardu Induk ini.";
            header("Location: /gardu-induk");
            exit;
        }

        $this->model->delete($id, "gi_id");
        header("Location: /gardu-induk");
        exit;
    }
}
