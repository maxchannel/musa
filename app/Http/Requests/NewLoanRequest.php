<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
class NewLoanRequest extends Request 
{
	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		return [
            'piece_id' => 'required|numeric',
            'institution_id' => 'required|numeric',
            'start' => 'required',
            'end' => 'required'
        ];
	}

}
