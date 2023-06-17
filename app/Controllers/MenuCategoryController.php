<?php

namespace App\Controllers;

use App\Models\MenuCategory;

class MenuCategoryController extends BaseController
{
    public function index()
    {
        $model = new MenuCategory();
        $pass = [
            'menuCategories' => $model->orderBy('created_at', 'DESC')->paginate(5),
            'pager' => $model->pager,
        ];

        return view("pages/menu-category/index", $pass);
    }

    public function store()
    {
        $model = new MenuCategory();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->insert($data);

        return redirect()->to('master/menu-categories')->with('success', 'Kategori Menu berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new MenuCategory();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->update($id, $data);

        return redirect()->to('master/menu-categories')->with('success', 'Kategori Menu berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new MenuCategory();
        $model->delete($id);

        return redirect()->to('master/menu-categories')->with('success', 'Kategori Menu berhasil dihapus');
    }
}
