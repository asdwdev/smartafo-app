<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Penyulang;
use App\Models\GarduInduk;

class PenyulangController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Penyulang();
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

        $result = $this->model->paginateWithJoin($page, $perPage, $search);
        
        $penyulangs = $result['data'];
        $pagination = $result['pagination'];
        
        return view("penyulang/index", compact('penyulangs', 'pagination', 'search'));
    }



    public function create()
    {
        $giModel = new GarduInduk();
        $garduInduk = $giModel->all();

        return view("penyulang/create", compact('garduInduk'));
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'kode_penyulang' => 'required|max:32|regex:/^[A-Za-z0-9_-]+$/|unique:penyulang,kode_penyulang,NULL,penyulang_id,gi_id,' . $request->input('gi_id'),
            'nama_penyulang' => 'required|max:128|unique:penyulang,nama_penyulang,NULL,penyulang_id,gi_id,' . $request->input('gi_id'),
            'tegangan_kv'    => 'required|numeric|max_value:999.999',
            'gi_id'          => 'required|numeric',
        ]);

        if (!$valid) {
            $errors = $data;

            $giModel = new GarduInduk();
            $garduInduk = $giModel->all();

            return view("penyulang/create", compact('errors', 'garduInduk'));
        }

        $this->model->create($data);
        header("Location: /penyulang");
        exit;
    }

    public function show($id)
    {
        $penyulang = $this->model->find($id, "penyulang_id");
        return view("penyulang/show", compact('penyulang'));
    }

    public function edit($id)
    {
        $penyulang = $this->model->find($id, "penyulang_id");

        $giModel = new GarduInduk();
        $garduInduk = $giModel->all();

        return view("penyulang/edit", compact('penyulang', 'garduInduk', 'id'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'kode_penyulang' => "required|max:32|regex:/^[A-Za-z0-9_-]+$/|unique:penyulang,kode_penyulang,$id,penyulang_id,gi_id," . $request->input('gi_id'),
            'nama_penyulang' => "required|max:128|unique:penyulang,nama_penyulang,$id,penyulang_id,gi_id," . $request->input('gi_id'),
            'tegangan_kv'    => 'required|numeric|max_value:999.999',
            'gi_id'          => 'required|numeric',
        ]);

        if (!$valid) {
            $errors = $data;
            $penyulang = $this->model->find($id, "penyulang_id");

            $giModel = new GarduInduk();
            $garduInduk = $giModel->all();

            return view("penyulang/edit", compact('errors', 'penyulang', 'garduInduk', 'id'));
        }

        $this->model->update($id, $data, "penyulang_id");
        header("Location: /penyulang");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "penyulang_id");
        header("Location: /penyulang");
        exit;
    }
}
