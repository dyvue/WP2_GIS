<?php

namespace App\Controllers;

use App\Models\Menu;

class MenuController extends BaseController
{
    public function index()
    {
        $model = new Menu();
        $pass = [
            'model' => $model,
            'menus' => $model->orderBy('is_best_seller', 'DESC')->orderBy('updated_at', 'DESC')->paginate(10),
            'pager' => $model->pager,
        ];

        return view('pages/menu/index', $pass);
    }

    public function create()
    {
        return view('pages/menu/create');
    }

    public function store()
    {
        $model = new Menu();
        $data = [
            'menu_category_id' => $this->request->getPost('menu_category_id'),
            'name' => $this->request->getPost('name'),
            'photo' => $this->request->getPost('photo'),
            'price' => $this->request->getPost('price'),
            'is_available' => $this->request->getPost('is_available') ? true : false,
        ];

        $model->insert($data);

        return redirect()->to('master/menus')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new Menu();
        $data['menu'] = $model->find($id);

        return view('pages/menu/edit', $data);
    }

    public function update($id)
    {
        $model = new Menu();
        $data = [
            'menu_category_id' => $this->request->getPost('menu_category_id'),
            'name' => $this->request->getPost('name'),
            'photo' => $this->request->getPost('photo'),
            'price' => $this->request->getPost('price'),
            'is_available' => $this->request->getPost('is_available') ? true : false,
        ];

        $model->update($id, $data);

        return redirect()->to('master/menus')->with('success', 'Menu berhasil diperbarui');
    }

    public function setStatus($id)
    {
        $model = new Menu();
        $find = $model->find($id);
        $data = [
            'is_available' => !$find['is_available'],
        ];

        $model->update($id, $data);

        return redirect()->to('master/menus')->with('success', 'Menu status berhasil diperbarui');
    }

    public function setBestSeller($id)
    {
        $model = new Menu();
        $find = $model->find($id);
        $data = [
            'is_best_seller' => !$find['is_best_seller'],
        ];

        $model->update($id, $data);

        return redirect()->to('master/menus')->with('success', 'Menu berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new Menu();
        $model->delete($id);

        return redirect()->to('master/menus')->with('success', 'Menu berhasil dihapus');
    }
}
