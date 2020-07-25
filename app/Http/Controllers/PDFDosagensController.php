<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;

use Illuminate\Http\Request;
use App\Models\DosagensModel;
use App\Http\Controllers\Controller;

class PDFDosagensController extends Controller
{
    public function GeraPDFDosagem(){

        $data = DosagensModel::get();

        $fileName = 'Dosagens.pdf';

        $mpdf = new Mpdf([

            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10,

        ]);

        $html = \View::make('pdf.dosagens')->with('data', $data);
        $html = $html->render();

        $mpdf->SetHeader('SudesteOnline|Lista de Dosagens|{PAGENO}');
        $mpdf->setFooter('Sudeste Automação da Informação Ltda.');

        $stylesheet = file_get_contents(url('/css/mpdf.css'));

        $mpdf->WriteHTML($stylesheet,1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }
}
