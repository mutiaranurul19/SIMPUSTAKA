<?php

namespace App\Controllers;

use App\Models\RakModel;

class RakController extends BaseController
{
    protected $rak;

    public function __construct()
    {
        $this->rak = new RakModel();
    }

    public function index()
    {
        $data['rak'] = $this->rak->findAll();
        return view('rak/index', $data);
    }

    public function create()
    {
        return view('rak/create');
    }

    public function store()
    {
        $this->rak->save([
            'nama_rak' => $this->request->getPost('nama_rak'),
            'lokasi' => $this->request->getPost('lokasi')
        ]);

        return redirect()->to('/rak');
    }

    public function edit($id)
    {
        $data['rak'] = $this->rak->find($id);
        return view('rak/edit', $data);
    }

    public function update($id)
    {
        $this->rak->update($id, [
            'nama_rak' => $this->request->getPost('nama_rak'),
            'lokasi' => $this->request->getPost('lokasi')
        ]);

        return redirect()->to('/rak');
    }

    public function delete($id)
    {
        $this->rak->delete($id);
        return redirect()->to('/rak');
    }
}