<?php

namespace App\Controllers;

use App\Models\ReservationTable;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class ReservationTableController extends BaseController
{
    private function qrCodeUri($uri, $text)
    {
		$writer = new PngWriter();
        $qrCode = QrCode::create($uri)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));
        $logo = Logo::create( FCPATH .'/logo-qr.png')
            ->setResizeToWidth(30);
        $label = Label::create($text)
            ->setTextColor(new Color(0, 0, 0));
        $result = $writer->write($qrCode, $logo, $label);
        $dataUri = $result->getDataUri();
        return $dataUri;
    }

    public function index()
    {
        $model = new ReservationTable();
        $datas = $model->orderBy('created_at', 'DESC')->findAll();
        $dataPools = [];

        if (count($datas) > 0) {
            foreach ($datas as $item) {
                $item['qr_code'] = $this->qrCodeUri(site_url('/order/login/'.$item['id']), $item['id']);
                array_push($dataPools, $item);
            }
        }
        $pass = [
            'reservationTables' => $dataPools
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
