<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class postRequest extends FormRequest
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

            'category_id'=>[
                'required',
            ],

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
        'yt_frame'=>[
                'nullable',
                'string'
            ],

        'meta_title'=>[
                'nullable',
                'max:255'
            ],
        'meta_description'=>[
                'nullable',
                'max:255'
            ],
        'meta_keyword'=>[
                'nullable',
                'max:255'
            ],
        'status'=>[
                'nullable'
            ],

        ];

        return $rules;
    }
}
