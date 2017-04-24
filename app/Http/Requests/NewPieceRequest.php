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
		$rules['price'] = 'required|numeric';
		$rules['author_id'] = 'required|numeric';

		if($this->request->get('type_id') == 1)//Si es pintura
		{
			$rules['technique_id'] = 'required|numeric';
			$rules['marco_width'] = 'required|numeric';
			$rules['marco_height'] = 'required|numeric';
			$rules['sin_width'] = 'required|numeric';
			$rules['sin_height'] = 'required|numeric';
		}elseif($this->request->get('type_id') == 2)//Si es gráfica
		{
			$rules['tecnica1'] = 'required';
			$rules['graph_height'] = 'required|numeric';
			$rules['graph_width'] = 'required|numeric';
			$rules['graph_con_width'] = 'required|numeric';
			$rules['graph_con_width'] = 'required|numeric';
			$rules['graph_sin_width'] = 'required|numeric';
			$rules['graph_sin_height'] = 'required|numeric';
		}elseif($this->request->get('type_id') == 3)//Si es escultura
		{
			$rules['cube_width'] = 'required|numeric';
			$rules['cube_height'] = 'required|numeric';
			$rules['cube_long'] = 'required|numeric';
		}elseif($this->request->get('type_id') == 4)//Si es fotografia
		{
			$rules['photo_height'] = 'required|numeric';
			$rules['photo_width'] = 'required|numeric';
			$rules['photo_sin_width'] = 'required|numeric';
			$rules['photo_sin_height'] = 'required|numeric';
		}elseif($this->request->get('type_id') == 5)//Si es dibujo
		{
			$rules['draw_height'] = 'required|numeric';
			$rules['draw_width'] = 'required|numeric';
			$rules['draw_sin_width'] = 'required|numeric';
			$rules['draw_sin_height'] = 'required|numeric';
		}

		return $rules;
	}

}
