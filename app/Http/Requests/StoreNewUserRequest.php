<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreNewUserRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|min:6|max:25'
        ];
    }
}
