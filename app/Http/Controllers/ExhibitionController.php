<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exhibition;
use App\Type;
use App\Author;
use App\Piece;
use App\PieceExhibition;
use App\Technique;
use Illuminate\Http\Request;
use App\Http\Requests\NewExhibitionRequest;
use App\Http\Requests\NewExhibitionAsocRequest;

class ExhibitionController extends Controller 
{
	public function profile($id)
	{
		$piece = Exhibition::find($id);

        return view('profile.piece', compact('piece'));
    }

	public function tabular()
	{
		$exhibitions = Exhibition::orderBy('created_at','DESC')->paginate(25);

        return view('list.exhibition', compact('exhibitions'));
    }

	public function create()
	{
		return view('add.exhibition');
	}

	public function store(NewExhibitionRequest $request)
	{
		$exhibition = new Exhibition;
		$exhibition->title = $request->input('title');
		$exhibition->user_id = \Auth::user()->id;
		$exhibition->save();

		return \Redirect::back()->with('message', 'Guardado con éxito');
	}

	public function edit($id)
	{
    	$exhibition = Exhibition::find($id);
        $this->notFoundUnless($exhibition);

        return view('edit.exhibition', compact('exhibition'));
    }

	public function update($id, NewExhibitionRequest $request)
	{
        $exhibition = Exhibition::find($id);
        $exhibition->fill($request->all());
		$exhibition->save();

        return \Redirect::back()->with('message', 'Guardado con éxito');
    }

	public function asoc()
	{
		$exhibitions = Exhibition::orderBy('title', 'ASC')->lists('title', 'id');
		$pieces = Piece::orderBy('title', 'ASC')->lists('title', 'id');

		return view('add.exhibition_aso', compact('exhibitions', 'pieces'));
	}

	public function asocStore(NewExhibitionAsocRequest $request)
	{
		$exhibition = new PieceExhibition;
		$exhibition->exhibition_id = $request->input('exhibition_id');
		$exhibition->piece_id = $request->input('piece_id');
		$exhibition->save();

		return \Redirect::back()->with('message', 'Guardado con éxito');
	}

}
