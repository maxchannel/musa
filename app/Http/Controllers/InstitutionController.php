<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Institution;
use Illuminate\Http\Request;
use App\Http\Requests\NewInstitutionRequest;

class InstitutionController extends Controller
{
	public function profile($id)
	{
		$institution = Institution::find($id);

        return view('profile.institution', compact('piece'));
    }

	public function tabular()
	{
		$institutions = Institution::orderBy('created_at','DESC')->paginate(25);

        return view('list.institution', compact('institutions'));
    }

	public function create()
	{
		return view('add.institution');
	}

	public function store(NewInstitutionRequest $request)
	{
		$institution = new Institution;
		$institution->name = $request->input('name');
		$institution->save();

		return \Redirect::back()->with('message', 'Guardado con éxito');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
    	$institution = Institution::find($id);
        $this->notFoundUnless($institution);

        return view('edit.institution', compact('institution'));
    }

	public function update($id, NewInstitutionRequest $request)
	{
        $institution = Institution::find($id);
        $institution->fill($request->all());
		$institution->save();

        return \Redirect::back()->with('message', 'Guardado con éxito');
    }

	public function destroy($id)
	{
		//
	}

}
