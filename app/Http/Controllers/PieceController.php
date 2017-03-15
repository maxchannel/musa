<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Piece;
use App\Type;
use App\Author;
use App\Technique;
use App\PieceMounting;
use App\PieceLoan;
use App\PieceArea;
use App\PieceCube;
use App\PieceAcquisition;
use App\PieceTechnique;
use App\Intervention;
use App\Institution;
use App\PieceAuthor;
use App\Http\Requests\NewPieceRequest;
use App\Http\Requests\EditPieceRequest;
use App\Http\Requests\NewLoanRequest;

class PieceController extends Controller
{
	public function profile($id)
	{
		$piece = Piece::find($id);

        return view('profile.piece', compact('piece'));
    }

	public function tabular()
	{
		$pieces = Piece::orderBy('created_at','DESC')->paginate(25);

        return view('list.piece', compact('pieces'));
    }

	public function create()
	{
		$types = Type::orderBy('id', 'ASC')->lists('name', 'id');
		$techs = Technique::orderBy('name', 'ASC')->lists('name', 'id');
		$authors = Author::orderBy('name', 'ASC')->lists('name', 'id');

		return view('add.piece', compact('types', 'techs', 'authors'));
	}

	public function store(NewPieceRequest $request)
	{
		$piece = new Piece;
		$piece->type_id = 1;
		$piece->title = $request->input('title');
		$piece->description = $request->input('description');
		$piece->year = $request->input('year');
		$piece->user_id = \Auth::user()->id;
		$piece->save();

		$author = new PieceAuthor;
		$author->piece_id = $piece->id;
		$author->author_id = $request->input('author_id');
		$author->save();

		$author = new PieceAcquisition;
		$author->piece_id = $piece->id;
		$author->forma = "Donación";
		$author->save();

		if($request->input('type_id') == 1)//Pintura
		{
			//Marco
			$montaje = new PieceArea;
		    $montaje->piece_id = $piece->id;
		    $montaje->type = 'Con Marco';
		    $montaje->width = $request->input('marco_width');
		    $montaje->height = $request->input('marco_height');
		    $montaje->save();

		    //Sin Marco
		    $montaje = new PieceArea;
		    $montaje->piece_id = $piece->id;
		    $montaje->type = 'Sin Marco';
		    $montaje->width = $request->input('sin_width');
		    $montaje->height = $request->input('sin_height');
		    $montaje->save();

		    $author = new PieceTechnique;
    		$author->piece_id = $piece->id;
    		$author->technique_id = $request->input('technique_id');
    		$author->save();
    		
		}elseif($request->input('type_id') == 3)//Escultura
		{
			$montaje = new PieceCube;
		    $montaje->piece_id = $piece->id;
		    $montaje->width = $request->input('cube_width');
		    $montaje->height = $request->input('cube_height');
		    $montaje->long = $request->input('cube_long');
		    $montaje->save();
		}

		return \Redirect::back()->with('message', 'Guardado con éxito');
	}

	public function loan()
	{
		$insts = Institution::orderBy('name', 'ASC')->lists('name', 'id');
		$pieces = Piece::orderBy('title', 'ASC')->lists('title', 'id');

		return view('add.loan', compact('pieces', 'insts'));
	}

	public function loanStore(NewLoanRequest $request)
	{
		$p_loan = new PieceLoan;
		$p_loan->institution_id = $request->input('institution_id');
		$p_loan->piece_id = $request->input('piece_id');
		$p_loan->start = $request->input('start');
		$p_loan->end = $request->input('end');
		$p_loan->save();

		//Seteando que la pieza fue prestada
		$piece = Piece::find($request->input('piece_id'));
		$piece->loan = 1;
		$piece->save();

		return \Redirect::back()->with('message', 'Guardado con éxito');
	}

	public function edit($id)
	{
    	$piece = Piece::find($id);
        $this->notFoundUnless($piece);

        return view('edit.piece', compact('piece'));
    }

	public function update($id, EditPieceRequest $request)
	{
        $piece = Piece::find($id);
        $piece->fill($request->all());
		$piece->save();

        return \Redirect::back()->with('message', 'Guardado con éxito');
    }

}
