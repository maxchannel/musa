<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserNotification;
use Illuminate\Http\Request;

class PublicController extends Controller 
{
	public function notifications()
    {
        //Cambiando a visto
        if(\Auth::user()->getNotifications() > 0)
        {
            UserNotification::where('user_id', \Auth::user()->id)->update(array('v' => 1));
        }
        $nots = UserNotification::where('user_id', \Auth::user()->id)->orderBy('created_at','DESC')->paginate(20);

        return view('public.notifications', compact('nots'));
    }

    public function destroy_not($id)
    {
        $n = UserNotification::find($id);
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
