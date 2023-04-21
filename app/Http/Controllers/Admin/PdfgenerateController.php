<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use PDF;

class PdfgenerateController extends Controller
{
    public function generatePDF()
    {

        $pdf = PDF::loadView('admin.order.invoice');

        return $pdf->download('fundaofwebit.pdf');
    }

}
