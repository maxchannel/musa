<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Piece;
use Illuminate\Http\Request;

class PDFController extends Controller 
{
	public function before($id)
	{
		$piece = Piece::find($id);
		//Aderidos
		$basic = \Request::input('basic');
		$montaje = \Request::input('montaje');
		$adqui = \Request::input('adqui');
		$pub = \Request::input('pub');
		$images = \Request::input('images');
		$loan = \Request::input('loan');
		$inter = \Request::input('inter');
		$exhi = \Request::input('exhi');
		$conser = \Request::input('conser');
		$ava = \Request::input('ava');

		$pdf = \PDF::loadView('pdf.piece', ['modo'=>1,'piece'=>$piece, 'montaje'=>$montaje, 
			'pub'=>$pub, 'adqui'=>$adqui, 'images'=>$images, 'loan'=>$loan, 'inter'=>$inter, 
			'exhi'=>$exhi, 'conser'=>$conser, 'basic'=>$basic, 'ava'=>$ava])->setPaper('letter', 'portrait');
        return $pdf->stream();
	}

}
