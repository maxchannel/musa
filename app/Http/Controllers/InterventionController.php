<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PieceIntervention;
use App\Piece;
use App\File;
use App\Fileable;
use App\Http\Requests\NewInterventionRequest;
use Illuminate\Http\Request;

class InterventionController extends Controller 
{
	public function create()
	{
		$pieces = Piece::orderBy('title', 'ASC')->lists('title', 'id');

		return view('add.intervention', compact('pieces'));
	}

	public function store(NewInterventionRequest $request)
	{
		$piece_intervention = new PieceIntervention;
        $piece_intervention->fill($request->all());
		$piece_intervention->save();

		//File
        $files = \Input::file('file');
        if(!empty($files[0]))//Solo si se manda 1 imagen
        {
            foreach($files as $file) 
            {
                // Validate files from input file
                $rules = ['file' => 'max:10000'];
                $validation = \Validator::make(['file'=> $file], $rules);    

                if(!$validation->fails()) 
                {
                	$extension = $file->getClientOriginalExtension(); 
                    $newName = str_random(6).".".$extension;  

                	$f_file = new File;
                    $f_file->name = $newName;
                    $f_file->save(); 

                    $fileable = new Fileable;
                    $fileable->file_id = $f_file->id;
                    $fileable->fileable_type = 'App\PieceIntervention';
                    $fileable->fileable_id = $piece_intervention->id;
                    $fileable->save();  

                    ///Move file to images/post
                    $file->move('files/files/', $newName); 
                }else 
                {
                    \Session::flash('message', 'Los archivos deben pesar máximo 10Mb');
                }
            }
        }else
        {
            return \Redirect::back()->with('message', 'Se guardo sin Archivos');
        }
        //File
	}

}
