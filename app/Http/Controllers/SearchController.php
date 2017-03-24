<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Piece;
use App\Author;
use App\Exhibition;
use App\Institution;
use App\User;

class SearchController extends Controller 
{

    public function search()
    {
        $query = \Request::input('query');
        $mode = \Request::input('mode');

        //Solo de un tipo de obra
        $tipos = Piece::where('type_id', $query)->orderBy('created_at', 'DESC')->paginate(25);
        //Solo de un tipo de obra 

        //User
        $user = User::orderBy('created_at', 'DESC');
        $user->where('name','like', '%'.$query.'%');
        $results_users = $user->get();
        //User     

        //Piece
        $obra = Piece::orderBy('created_at', 'DESC');
        $obra->where('title','like', '%'.$query.'%');
        $obra->orWhere('year', $query);
        $results_piece = $obra->get();
        //Piece     

        //Author
        $obra2 = Author::orderBy('created_at', 'DESC');
        $obra2->where('name','like', '%'.$query.'%');
        $results_author = $obra2->get();
        //Author     

        //Exhibition
        $exhi = Exhibition::orderBy('created_at', 'DESC');
        $exhi->where('title','like', '%'.$query.'%');
        $results_exis = $exhi->get();
        //Exhibition     

        //Institution
        $insti = Institution::orderBy('created_at', 'DESC');
        $insti->where('name','like', '%'.$query.'%');
        $results_insti = $insti->get();
        //Institution
        

        return view('search.search', compact('results_piece', 'results_author', 'query', 'results_exis', 'results_insti',
            'results_users', 'tipos'));
    }
}
