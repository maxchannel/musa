<?php 

namespace App\Http\Controllers;
use App\Intervention;

class HomeController extends Controller
{
    public function index()
    {   
    	//$inter = Intervention::find(1);

        return view('home');
    }
}
