<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Piece;
use App\Type;
use App\Author;
use App\File;
use App\Fileable;
use App\Image;
use App\Imagable;
use App\Technique;
use App\PieceMounting;
use App\PieceLoan;
use App\PieceArea;
use App\PieceCube;
use App\PieceAcquisition;
use App\PieceTechnique;
use App\PieceValuation;
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
		$this->notFoundUnless($piece);

        return view('profile.piece', compact('piece'));
    }

	public function tabular()
	{
		$previo = Piece::where('deleted_at',NULL);
        $sort = \Request::input('sort');

        if($sort)
        {
            if($sort == 'title')
            {
                $previo->orderBy('title','DESC');
            }elseif($sort == 'title_a')
            {
                $previo->orderBy('title','ASC');
            }elseif($sort == 'fecha')
            {
                $previo->orderBy('year','DESC');
            }elseif($sort == 'fecha_a')
            {
                $previo->orderBy('year','ASC');
            }
        }else
        {
            $previo->orderBy('title', 'DESC');
        }

		$pieces = $previo->paginate(25);
        return view('list.piece', compact('pieces'));
    }

	public function create()
	{
		$types = Type::orderBy('id', 'ASC')->lists('name', 'id');
		$techs = Technique::where('tipo','Pintura')->orderBy('name', 'ASC')->lists('name', 'id');
		$tec_grafs = Technique::where('tipo','Gráfica')->orderBy('name', 'ASC')->lists('name', 'id');
		$tec_draws = Technique::where('tipo','Dibujo')->orderBy('name', 'ASC')->lists('name', 'id');
		$authors = Author::orderBy('name', 'ASC')->lists('name', 'id');

		return view('add.piece', compact('types', 'techs', 'authors', 'tec_grafs', 'tec_draws'));
	}

	public function store(NewPieceRequest $request)
	{
		$piece = new Piece;
		$piece->type_id = 1;
		$piece->title = $request->input('title');
		$piece->description = $request->input('description');
		$piece->year = $request->input('year');
		$piece->type_id = $request->input('type_id');
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
			//Sino existe la tecnica se guarda
			foreach($request->input('tecnica1') as $tech)
			{
				Technique::firstOrCreate(['name' => $tech, 'tipo'=>'Pintura']);
			}

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
    		
		}elseif($request->input('type_id') == 2)//Gráfica
		{
			//Sino existe la tecnica se guarda
			foreach($request->input('tecnica1') as $tech)
			{
				Technique::firstOrCreate(['name' => $tech, 'tipo'=>'Gráfica']);
			}

			//Padding
			$montaje = new PieceArea;
		    $montaje->piece_id = $piece->id;
		    $montaje->type = 'Con Marco';
		    $montaje->width = $request->input('graph_width');
		    $montaje->height = $request->input('graph_height');
		    $montaje->save();

		    //Sin Marco
		    $montaje = new PieceArea;
		    $montaje->piece_id = $piece->id;
		    $montaje->type = 'Sin Marco';
		    $montaje->width = $request->input('graph_sin_width');
		    $montaje->height = $request->input('graph_sin_height');
		    $montaje->save();

		    //Marco
		    $montaje = new PieceArea;
		    $montaje->piece_id = $piece->id;
		    $montaje->type = 'Padding';
		    $montaje->width = $request->input('graph_con_width');
		    $montaje->height = $request->input('graph_con_height');
		    $montaje->save();
    		
		}elseif($request->input('type_id') == 3)//Escultura
		{
			$montaje = new PieceCube;
		    $montaje->piece_id = $piece->id;
		    $montaje->width = $request->input('cube_width');
		    $montaje->height = $request->input('cube_height');
		    $montaje->long = $request->input('cube_long');
		    $montaje->save();
		}elseif($request->input('type_id') == 4)//Fotografia
		{
			//Marco
			$montaje = new PieceArea;
		    $montaje->piece_id = $piece->id;
		    $montaje->type = 'Con Marco';
		    $montaje->width = $request->input('photo_width');
		    $montaje->height = $request->input('photo_height');
		    $montaje->save();

		    //Sin Marco
		    $montaje = new PieceArea;
		    $montaje->piece_id = $piece->id;
		    $montaje->type = 'Sin Marco';
		    $montaje->width = $request->input('photo_sin_width');
		    $montaje->height = $request->input('photo_sin_height');
		    $montaje->save();
    		
		}elseif($request->input('type_id') == 5)//Dibujo
		{
			//Sino existe la tecnica se guarda
			foreach($request->input('tecnica1') as $tech)
			{
				Technique::firstOrCreate(['name' => $tech, 'tipo'=>'Dibujo']);
			}

			//Marco
			$montaje = new PieceArea;
		    $montaje->piece_id = $piece->id;
		    $montaje->type = 'Con Marco';
		    $montaje->width = $request->input('draw_width');
		    $montaje->height = $request->input('draw_height');
		    $montaje->save();

		    //Sin Marco
		    $montaje = new PieceArea;
		    $montaje->piece_id = $piece->id;
		    $montaje->type = 'Sin Marco';
		    $montaje->width = $request->input('draw_sin_width');
		    $montaje->height = $request->input('draw_sin_height');
		    $montaje->save();
    		
		}

		//Image
        $files = \Input::file('file');
        if(!empty($files[0]))//Solo si se manda 1 imagen
        {
            foreach($files as $file) 
            {
                // Validate files from input file
                $rules = ['file' => 'mimes:jpeg,bmp,png|max:12000'];
                $validation = \Validator::make(['file'=> $file], $rules);    

                if(!$validation->fails()) 
                {
                    //Limitando el numero de imagenes
                    if($piece->images()->count() < 15)
                    {   
                        //Rename file
                        $extension = $file->getClientOriginalExtension(); 
                        $newName = str_random(15).".".$extension;    
                        $path = storage_path().'/uploads/'.$newName;

                        //Image
                        $image = new Image;
                        $image->name = $newName;
                        $image->save(); 
                        //Imagable
                        $imagable = new Imagable;
                        $imagable->imagable_type = 'App\Piece';
                        $imagable->image_id = $image->id;
                        $imagable->imagable_id = $piece->id;
                        $imagable->save(); 

                        ///Move file to images/post
                        $file->move('files/images/', $newName);
                    }
                }
            }
        }
        //Image

		
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
                    $fileable->fileable_type = 'App\PieceLoan';
                    $fileable->fileable_id = $p_loan->id;
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

    public function panorama($id)
	{
		$piece = Piece::find($id);
		$this->notFoundUnless($piece);
		$types = Type::orderBy('id', 'ASC')->lists('name', 'id');

        return view('panorama.home', compact('piece', 'types'));
    }

}
