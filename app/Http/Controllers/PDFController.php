<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = ['title' => 'Laravel PDF Example', 'content' => 'This is an example of PDF generated using dompdf in Laravel.'];
        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('example.pdf');
    }
}
