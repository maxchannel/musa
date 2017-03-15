<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Http\Requests\NewAuthorRequest;
use App\Http\Requests\EditAuthorRequest;

class AuthorController extends Controller 
{

	public function tabular()
	{
		$authors = Author::orderBy('name','ASC')->paginate(25);

        return view('list.author', compact('authors'));
    }

	public function create()
	{
		return view('add.author');
	}

	public function store(NewAuthorRequest $request)
	{
		$piece = new Author;
		$piece->fill($request->all());
		$piece->save();

		return \Redirect::back()->with('message', 'Registro exitoso, ahora puedes iniciar sesión');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
    	$piece = Author::find($id);
        $this->notFoundUnless($piece);

        return view('edit.author', compact('piece'));
    }

	public function update($id, EditAuthorRequest $request)
	{
        $piece = Author::find($id);
        $piece->fill($request->all());
		$piece->save();

        return \Redirect::back()->with('message', 'Registro exitoso, ahora puedes iniciar sesión');
    }

	public function destroy($id)
	{
		//
	}

}