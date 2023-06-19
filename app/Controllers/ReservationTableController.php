<?php

namespace App\Controllers;

use App\Models\ReservationTable;

class ReservationTableController extends BaseController
{
    public function index()
    {
        $model = new ReservationTable();
        $pass = [
            'reservationTables' => $model->orderBy('created_at', 'DESC')->findAll()
        ];

        return view("pages/reservation-table/index", $pass);
    }

    public function store()
    {
        $model = new ReservationTable();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->insert($data);

        return redirect()->to('master/reservation-tables')->with('success', 'Meja berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new ReservationTable();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->update($id, $data);

        return redirect()->to('master/reservation-tables')->with('success', 'Meja berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new ReservationTable();
        $model->delete($id);

        return redirect()->to('master/reservation-tables')->with('success', 'Meja berhasil dihapus');
    }
}
