<?php

namespace App\Controllers;

use App\Models\GarduHubung;
use App\Core\Request;

class GarduHubungController
{
    protected $model;

    public function __construct()
    {
        $this->model = new GarduHubung();
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
        
        $garduHubungs = $result['data'];
        $pagination = $result['pagination'];
        
        return view("gardu-hubung/index", compact('garduHubungs', 'pagination', 'search'));
    }

    public function create()
    {
        return view("gardu-hubung/create");
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'kode_gh' => 'required|regex:/^[A-Za-z0-9_-]+$/|unique:gardu_hubung,kode_gh',
            'nama_gh' => 'required|max:255',
            'alamat'  => 'required|max:500',
            'lat'     => 'required|numeric|between:-90,90',
            'lon'     => 'required|numeric|between:-180,180',
        ]);

        if (!$valid) {
            $errors = $data;
            return view("gardu-hubung/create", [
                'errors' => $errors,
                'old' => $request->all()
            ]);
        }

        $this->model->create($data);
        header("Location: /gardu-hubung");
        exit;
    }

    public function show($id)
    {
        $garduHubung = $this->model->find($id, "gh_id");
        return view("gardu-hubung/show", compact('garduHubung'));
    }

    public function edit($id)
    {
        $garduHubung = $this->model->find($id, "gh_id");
        return view("gardu-hubung/edit", compact('garduHubung', 'id'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'kode_gh' => "required|regex:/^[A-Za-z0-9_-]+$/|unique:gardu_hubung,kode_gh,$id,gh_id",
            'nama_gh' => 'required|max:255',
            'alamat'  => 'required|max:500',
            'lat'     => 'required|numeric|between:-90,90',
            'lon'     => 'required|numeric|between:-180,180',
        ]);

        if (!$valid) {
            $errors = $data;
            $garduHubung = $this->model->find($id, "gh_id");
            return view("gardu-hubung/edit", compact('errors', 'garduHubung', 'id'));
        }

        $this->model->update($id, $data, "gh_id");
        header("Location: /gardu-hubung");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "gh_id");
        header("Location: /gardu-hubung");
        exit;
    }
}
