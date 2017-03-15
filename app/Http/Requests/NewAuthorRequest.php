<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewAuthorRequest extends Request
{

	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		return [
            'name' => 'required|min:3|max:30',
        ];
	}

}
