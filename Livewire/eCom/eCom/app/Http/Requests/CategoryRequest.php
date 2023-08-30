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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'string|required',
            'slug'=>'string|required',
            'image'=>'mimes:jpg,jpeg,png,webp|nullable',
            'description'=>'required',
            'meta_title'=>'string|required',
            'meta_description'=>'required',
            'meta_keywords'=>'string|required',
        ];
    }
}
