<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
        $rules = [];    
        $rules['title']    =   'required|string|unique:categories,title,'.$this->route('category')->id;
        $rules['slug']     =   'required|string|unique:categories,slug,'.$this->route('category')->id; 
        return $rules;
    }

    public function messages()
    {
        //Custom Error Messages
        $messages = [];   
        return $messages;
    }
}
