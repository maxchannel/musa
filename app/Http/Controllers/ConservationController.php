<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Institution;
use App\Piece;
use App\File;
use App\Fileable;
use App\PieceConservation;
use Illuminate\Http\Request;
use App\Http\Requests\NewConservationRequest;

class ConservationController extends Controller 
{
	public function index()
	{
        $insts = Institution::orderBy('name', 'ASC')->lists('name', 'id');
		$pieces = Piece::orderBy('title', 'ASC')->lists('title', 'id');

        return view('add.conservation', compact('loan', 'insts', 'pieces'));
    }

    public function store(NewConservationRequest $request)
	{
		$piece_conservation = new PieceConservation;
        $piece_conservation->fill($request->all());
		$piece_conservation->save();

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
                    $fileable->fileable_type = 'App\PieceConservation';
                    $fileable->fileable_id = $piece_conservation->id;
                    $fileable->save();  

                    ///Move file to images/post
                    $file->move('files/files/', $newName); 
                }else 
                {
                    \Session::flash('image-message', 'Los archivos deben pesar máximo 10Mb');
                }
            }
        }else
        {
            return \Redirect::back()->with('image-message', 'Debes seleccionar al menos 1 imágen');
        }
        //File

        return \Redirect::back()->with('message', 'Guardado con éxito');
	}

}
