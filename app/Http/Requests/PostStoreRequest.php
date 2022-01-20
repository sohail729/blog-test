<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
        $rules['title']    =   'required|string|unique:posts,title';
        $rules['slug']     =   'required|string|unique:posts,slug'; 
        $rules['content']     =   'required'; 
        $rules['category_id']     =   'required'; 
        
        return $rules;
    }

    public function messages()
    {
        //Custom Error Messages
        $messages = [];   
        return $messages;
    }

    public function attributes()
    {
        // Custom Attribute Names
        return [
            'category_id' => 'category'
        ];
    }
}
