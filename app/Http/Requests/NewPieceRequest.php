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

		$rules['title'] = 'required|max:30';
		$rules['type_id'] = 'required';

		if($this->request->get('type_id') == 1)//Si es pintura
		{
			$rules['technique_id'] = 'required|numeric';
		}

		return $rules;
	}

}
