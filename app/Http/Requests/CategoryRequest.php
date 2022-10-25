<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        switch($this->method()){
        
            case 'POST':
                {
                return[
                    'name'=>'required|string|unique:categories',
                    'slug'=>'required|unique:categories',
                    'image'=>'nullable|mimes:jpg,png',
        
                    'meta_title'=>'required|string',
                    'meta_keyword'=>'required|string',
                    'meta_description'=>'required|string',
                ];
            }
                case 'PATCH':
                case 'PUT':
                    {
                    return [
                        //

                    ];
                }
                default: break;


        }
    }
    public function messages(){
        return[
            'name.required'=>trans('validation.required'),
            'slug.required'=>trans('validation.required'),
            'image.mimes'=>trans('validation.mimes'),
            'meta_title.string'=>trans('validation.string'),
            'meta_title.required'=>trans('validation.required'),
            'meta_keyword.required'=>trans('validation.required'),
            'meta_keyword.string'=>trans('validation.string'),
            'meta_description.required'=>trans('validation.required'),
            'meta_description.string'=>trans('validation.string'),
        ];
    }
}
