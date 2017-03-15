<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Piece;
use App\Author;

class SearchController extends Controller 
{

    public function search()
    {
        $query = \Request::input('query');

        //Piece
        $obra = Piece::orderBy('created_at', 'DESC');
        $obra->where('title','like', '%'.$query.'%');
        $results_piece = $obra->get();
        //Piece

        //Author
        $obra = Author::orderBy('created_at', 'DESC');
        $obra->where('name','like', '%'.$query.'%');
        $results_author = $obra->get();
        //Author

        return view('search.search', compact('results_piece', 'results_author', 'query'));
    }
}
