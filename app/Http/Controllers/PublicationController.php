<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Publication;
use App\PiecePublication;
use App\Piece;
use Illuminate\Http\Request;
use App\Http\Requests\NewPublicationRequest;
use App\Http\Requests\NewPublicationAsocRequest;
use App\Http\Requests\EditPublicationRequest;

class PublicationController extends Controller 
{

	public function tabular()
	{
		$publications = Publication::orderBy('title','ASC')->paginate(25);

        return view('list.publication', compact('publications'));
    }

	public function create()
	{
		return view('add.publication');
	}

	public function store(NewPublicationRequest $request)
	{
		$publication = new Publication;
		$publication->fill($request->all());
		$publication->save();

		return \Redirect::back()->with('message', 'Guardado con Éxito');
	}

	public function edit($id)
	{
    	$publication = Publication::find($id);
        $this->notFoundUnless($publication);

        return view('edit.publication', compact('publication'));
    }

	public function update($id, EditPublicationRequest $request)
	{
        $publication = Publication::find($id);
        $publication->fill($request->all());
		$publication->save();

        return \Redirect::back()->with('message', 'Guardado con Éxito');
    }

    public function asoc()
	{
		$publications = Publication::orderBy('title', 'ASC')->lists('title', 'id');
		$pieces = Piece::orderBy('title', 'ASC')->lists('title', 'id');

		return view('add.publication_aso', compact('publications', 'pieces'));
	}

	public function asocStore(NewPublicationAsocRequest $request)
	{
		$publication = new PiecePublication;
		$publication->publication_id = $request->input('publication_id');
		$publication->piece_id = $request->input('piece_id');
		$publication->save();

		return \Redirect::back()->with('message', 'Guardado con éxito');
	}



}
