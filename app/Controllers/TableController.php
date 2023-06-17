<?php

namespace App\Controllers;

use App\Models\Table;

class TableController extends BaseController
{
    public function index()
    {
        $model = new Table();
        $pass = [
            'tables' => $model->orderBy('created_at', 'DESC')->paginate(5),
            'pager' => $model->pager,
        ];

        return view("pages/table/index", $pass);
    }

    public function store()
    {
        $model = new Table();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->insert($data);

        return redirect()->to('master/tables')->with('success', 'Meja berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new Table();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->update($id, $data);

        return redirect()->to('master/tables')->with('success', 'Meja berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new Table();
        $model->delete($id);

        return redirect()->to('master/tables')->with('success', 'Meja berhasil dihapus');
    }
}
