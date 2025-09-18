<?php

namespace App\Controllers;

use App\Models\KubikelGardu;
use App\Core\Request;

class KubikelGarduController
{
    protected $model;

    public function __construct()
    {
        $this->model = new KubikelGardu();
    }

    public function index()
    {
        $kubikelGardu = $this->model->all();
        return view("kubikel-gardu/index", compact('kubikelGardu'));
    }

    public function create()
    {
        return view("kubikel-gardu/create");
    }

    public function store(Request $request)
    {
        $data = [
            'gd_id'       => $request->input('gd_id'),
            'kubikel_id'  => $request->input('kubikel_id'),
            'tgl_pasang'  => $request->input('tgl_pasang'),
            'tgl_operasi' => $request->input('tgl_operasi'),
            'status_rc'   => $request->input('status_rc'),
            'arah_gardu'  => $request->input('arah_gardu'),
            'ct_info'     => $request->input('ct_info'),
            'vt_info'     => $request->input('vt_info'),
            'relay_info'  => $request->input('relay_info'),
            'fuse_info'   => $request->input('fuse_info'),
            'keterangan'  => $request->input('keterangan'),
        ];

        $this->model->create($data);
        header("Location: /kubikel-gardu");
        exit;
    }

    public function show($id)
    {
        $kubikelGardu = $this->model->find($id, "kubikel_gardu_id");
        return view("kubikel-gardu/show", compact('kubikelGardu'));
    }

    public function edit($id)
    {
        $kubikelGardu = $this->model->find($id, "kubikel_gardu_id");
        return view("kubikel-gardu/edit", compact('kubikelGardu', 'id'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'gd_id'       => $request->input('gd_id'),
            'kubikel_id'  => $request->input('kubikel_id'),
            'tgl_pasang'  => $request->input('tgl_pasang'),
            'tgl_operasi' => $request->input('tgl_operasi'),
            'status_rc'   => $request->input('status_rc'),
            'arah_gardu'  => $request->input('arah_gardu'),
            'ct_info'     => $request->input('ct_info'),
            'vt_info'     => $request->input('vt_info'),
            'relay_info'  => $request->input('relay_info'),
            'fuse_info'   => $request->input('fuse_info'),
            'keterangan'  => $request->input('keterangan'),
        ];

        $this->model->update($id, $data, "kubikel_gardu_id");
        header("Location: /kubikel-gardu");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id, "kubikel_gardu_id");
        header("Location: /kubikel-gardu");
        exit;
    }
}
