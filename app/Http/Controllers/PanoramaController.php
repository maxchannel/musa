<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Piece;
use App\PiecePublication;
use App\PieceExhibition;
use App\PieceIntervention;
use App\PieceLoan;
use Illuminate\Http\Request;

class PanoramaController extends Controller 
{
	public function publications($id)
	{
		$piece = Piece::find($id);
		$this->notFoundUnless($piece);

        return view('panorama.publications', compact('piece'));
    }

    public function destroy_piece_publication($id)
    {
        $n = PiecePublication::find($id);
        $n->delete();

        $message = 'Eliminado';
        if($request->ajax())
        {
            return reponse()->json([
                'message'=>$message
            ]);
        }

        \Session::flash('message', $message);
    }

    public function exhibitions($id)
    {
        $piece = Piece::find($id);
        $this->notFoundUnless($piece);

        return view('panorama.exhibitions', compact('piece'));
    }

    public function destroy_piece_exhibition($id)
    {
        $n = PieceExhibition::find($id);
        $n->delete();

        $message = 'Eliminado';
        if($request->ajax())
        {
            return reponse()->json([
                'message'=>$message
            ]);
        }

        \Session::flash('message', $message);
    }

    public function loans($id)
    {
        $piece = Piece::find($id);
        $this->notFoundUnless($piece);

        return view('panorama.loans', compact('piece'));
    }

    public function destroy_piece_loan($id)
    {
        $n = PieceLoan::find($id);
        $n->delete();

        $message = 'Eliminado';
        if($request->ajax())
        {
            return reponse()->json([
                'message'=>$message
            ]);
        }

        \Session::flash('message', $message);
    }

    public function interventions($id)
    {
        $piece = Piece::find($id);
        $this->notFoundUnless($piece);

        return view('panorama.interventions', compact('piece'));
    }

    public function destroy_piece_intervention($id)
    {
        $n = PieceIntervention::find($id);
        $n->delete();

        $message = 'Eliminado';
        if($request->ajax())
        {
            return reponse()->json([
                'message'=>$message
            ]);
        }

        \Session::flash('message', $message);
    }

}
