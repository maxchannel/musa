<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Piece;
use App\PiecePublication;
use App\PieceExhibition;
use App\PieceIntervention;
use App\PieceLoan;
use App\Image;
use App\Imagable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\NewImagePanoramaRequest;

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

    public function images($id)
    {
        $piece = Piece::find($id);
        $this->notFoundUnless($piece);

        return Storage::url('file/images/imagen.png');

        return view('panorama.images', compact('piece'));
    }

    public function destroy_piece_image($id)
    {
        $image = Image::find($id);
        $image->delete();

        $message = 'Eliminado';
        if($request->ajax())
        {
            return reponse()->json([
                'message'=>$message
            ]);
        }

        \Session::flash('message', $message);
    }

    public function add_piece_image($id)
    {
        $piece = Piece::findOrFail($id);
        $this->notFoundUnless($piece);

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
                        $file->move(storage_path().'/file/images/', $newName);
                    }else
                    {
                        return \Redirect::back()->with('image-message', 'Alcanzaste el limite de 12 imágenes por anuncio');
                    }

                }else 
                {
                    \Session::flash('image-message', 'Algunos archivos no eran imágenes, Solo se procesarón las imágenes menores a 4MB');
                }
            }
        }else
        {
            return \Redirect::back()->with('image-message', 'Debes seleccionar al menos 1 imágen');
        }

        $piece->save();
        return \Redirect::back()->with(['message'=>'Se agregaron nuevas imágenes a tu pedido']);
    }

}
