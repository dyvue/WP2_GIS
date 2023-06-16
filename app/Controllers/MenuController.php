<?php

namespace App\Controllers;

use App\Models\MenuCategory;
use App\Models\Menu;

class MenuController extends BaseController
{
    public function index()
    {
        $model = new Menu();
        $pass = [
            'model' => $model,
            'menus' => $model->orderBy('created_at', 'DESC')->paginate(10),
            'pager' => $model->pager,
        ];

        return view('pages/menu/index', $pass);
    }

    public function create()
    {
        $modelCategory = new MenuCategory();
        $pass = [
            'menuCategories' => $modelCategory->orderBy('id', 'ASC')->findAll()
        ];

        return view('pages/menu/create', $pass);
    }

    public function store()
    {
        $model = new Menu();
        $data = [
            'menu_category_id' => $this->request->getPost('form-menu-category-id'),
            'name' => $this->request->getPost('form-name'),
            'price' => (int) str_replace(['Rp', '.', ','], '', $this->request->getPost('form-price')),
        ];

        $photo = $this->request->getFile('form-photo');
        if ($photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move('./img/menus', $photoName);
        }
        if (isset($photoName)) {
            $data['photo'] = $photoName;
        }

        $model->insert($data);

        return redirect()->to('master/menus')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new Menu();
        $modelCategory = new MenuCategory();
        $pass = [
            'data' => $model->find($id),
            'menuCategories' => $modelCategory->orderBy('id', 'ASC')->findAll()
        ];

        return view('pages/menu/edit', $pass);
    }

    public function update($id)
    {
        $model = new Menu();
        $data = [
            'menu_category_id' => $this->request->getPost('form-menu-category-id'),
            'name' => $this->request->getPost('form-name'),
            'price' => (int) str_replace(['Rp', '.', ','], '', $this->request->getPost('form-price')),
        ];

        $photo = $this->request->getFile('form-photo');
        if ($photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move('./img/menus', $photoName);
        }
        if (isset($photoName)) {
            $data['photo'] = $photoName;
        }

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
