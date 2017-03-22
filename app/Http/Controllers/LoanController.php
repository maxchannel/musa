<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PieceLoan;
use App\Piece;
use App\Institution;
use Illuminate\Http\Request;
use App\Http\Requests\NewLoanRequest;

class LoanController extends Controller 
{
	public function edit($id)
	{
    	$loan = PieceLoan::find($id);
        $this->notFoundUnless($loan);
        $insts = Institution::orderBy('name', 'ASC')->lists('name', 'id');
		$pieces = Piece::orderBy('title', 'ASC')->lists('title', 'id');

        return view('edit.loan', compact('loan', 'insts', 'pieces'));
    }

	public function update($id, NewLoanRequest $request)
	{
        $loan = PieceLoan::find($id);
        $loan->fill($request->all());
		$loan->save();

        return \Redirect::back()->with('message', 'Guardado con éxito');
    }


}
