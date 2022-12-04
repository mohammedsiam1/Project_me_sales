<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'first_name'=>'required|string',
                        'last_name'=>'required|string',
                        'email'=>'required|unique:users',
                        'role'=>'required|numeric',
                        'password'=>'required|max:15|min:8',
                        'phone'=>'required',
                       
                    ];
                }
            case 'PUT':
            case 'POST': {
                    return [
                        'first_name'=>'required|string',
                        'last_name'=>'required|string',
                        'role'=>'required|numeric',
                        'phone'=>'required',
                    ];
                }
        }
    }
}
