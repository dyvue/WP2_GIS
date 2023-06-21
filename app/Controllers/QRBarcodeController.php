<?php

namespace App\Controllers;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class QRBarcodeController extends BaseController
{
    public function index()
    {
		$writer = new PngWriter();
        $qrCode = QrCode::create('https://dyvue.com')
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));
        $logo = Logo::create( FCPATH .'/logo-qr.png')
            ->setResizeToWidth(30);
        $label = Label::create('TBLE0001')
            ->setTextColor(new Color(0, 0, 0));
        $result = $writer->write($qrCode, $logo, $label);
        $dataUri = $result->getDataUri();
        echo '<img src="'.$dataUri.'" alt="mangan.dyvue.com" style="border: 1.5px solid #ccc;">';
    }
}
