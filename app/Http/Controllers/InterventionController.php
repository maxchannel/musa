<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PieceIntervention;
use App\Piece;
use App\Http\Requests\NewInterventionRequest;
use Illuminate\Http\Request;

class InterventionController extends Controller 
{
	public function create()
	{
		$pieces = Piece::orderBy('title', 'ASC')->lists('title', 'id');

		return view('add.intervention', compact('pieces'));
	}

	public function store(NewInterventionRequest $request)
	{
		$piece = new PieceIntervention;
        $piece->fill($request->all());
		$piece->save();

        return \Redirect::back()->with('message', 'Guardado con éxito');
	}

}
