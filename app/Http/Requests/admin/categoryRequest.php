<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
        $rules= [
            'name'=>[
                'required',
                'string',
                'max:255'
            ], 
            'slug'=>[
                'required',
                'string',
                'max:255'
            ],
             'description'=>[
                'required'                
            ], 
            'image'=>[
                'nullable',
                'mimes:jpeg,jpg,png'
            ], 
            'meta_title'=>[
                'required',
                'max:255'
            ], 
            'meta_description'=>[
                'required',
                'max:255'
            ], 
            'meta_keyword'=>[
                'required',
                'max:255'
            ],
             'navbar_status'=>[
                'nullable'
            ],
             'status'=>[
                'nullable'
            ],

        ];

        return $rules;
    }
}
