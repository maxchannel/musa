<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewPieceRequest extends Request 
{

	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		$rules = [];

		$rules['title'] = 'required';
		$rules['type_id'] = 'required';

		if($this->request->get('type_id') == 1)//Si es pintura
		{
			$rules['technique_id'] = 'required|numeric';
			$rules['marco_width'] = 'required|numeric';
			$rules['marco_height'] = 'required|numeric';
			$rules['sin_width'] = 'required|numeric';
			$rules['sin_height'] = 'required|numeric';
		}

		return $rules;
	}

}
