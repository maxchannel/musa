<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Institution;
use App\Piece;
use Illuminate\Http\Request;

class ConservationController extends Controller 
{
	public function index()
	{
        $insts = Institution::orderBy('name', 'ASC')->lists('name', 'id');
		$pieces = Piece::orderBy('title', 'ASC')->lists('title', 'id');

        return view('add.conservation', compact('loan', 'insts', 'pieces'));
    }

}
