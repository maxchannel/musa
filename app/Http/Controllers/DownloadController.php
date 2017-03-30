<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DownloadController extends Controller 
{

	public function start($filename)
	{
        $file_path = 'files/files/'.$filename;
        if(file_exists($file_path))//if exists
        {
            return \Response::download($file_path, $filename, [
                'Content-Length: '.filesize($file_path)
            ]);
        }else//if not exists
        {
            // Error
            exit('Requestsed file does not exist on our server!');
        }
    }

}
