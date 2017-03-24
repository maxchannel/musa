<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Piece;
use Illuminate\Http\Request;

class PDFController extends Controller 
{

	public function index($id)
	{
		$piece = Piece::find($id);

		$pdf = \PDF::loadView('pdf.piece', ['modo'=>1,'piece'=>$piece])->setPaper('letter', 'portrait');
        return $pdf->stream();
	}


}
