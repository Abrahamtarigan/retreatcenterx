<?php
defined('BASEPATH') or exit('No direct script access allowed');

function view_pdf($html, $filename)
{

       //require_once APPPATH . 'third_party/mpdf/Mpdf.php';
       //require_once __DIR__ . '/vendor_xx/autoload.php';
       require_once APPPATH . 'third_party/mpdf/src/mpdf.php';

       $mpdf = new \Mpdf\Mpdf();

       $mpdf->WriteHTML($html);
       $mpdf->Output($filename, 'I');
}
