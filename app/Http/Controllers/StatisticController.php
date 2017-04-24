<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Piece;
use Illuminate\Http\Request;

class StatisticController extends Controller 
{
	public function basic()
    {
    	$pinturas = Piece::where('type_id',1)->count();
    	$graphs = Piece::where('type_id',2)->count();
    	$sculs = Piece::where('type_id',3)->count();
    	$photos = Piece::where('type_id',4)->count();
    	$draws = Piece::where('type_id',5)->count();

    	return view('public.statistic', compact('nots', 'pinturas', 'sculs', 'graphs', 'photos', 'draws'));
    }

}
