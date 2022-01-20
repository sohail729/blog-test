<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
    */

    public function rules()
    {
        $rules = [];    
        $rules['title']    =   'required|string|unique:posts,title,'.$this->route('post')->id;
        $rules['slug']     =   'required|string|unique:posts,slug,'.$this->route('post')->id;
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
