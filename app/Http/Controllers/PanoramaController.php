<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Piece;
use App\PiecePublication;
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

}
