<?php

require("vendor/autoload.php");
include_once("phpqrcode/qrlib.php");

class QrModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function decodificarQrDesdeArchivo($archivo)
    {
        $qrcode = new \Zxing\QrReader($archivo);
        $text = $qrcode->text();

        return $text;
    }

    public function generarQr($idViaje)
    {
        $direccion = 'public/imgQr/';
        $nombreydir = $direccion . $idViaje . '.png';
        $datos = "/proforma/verFormulario?idViaje=$idViaje";
        QRcode::png($datos, $nombreydir, 'H', 10, 3);
    }

}