<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JournalStore extends Request
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
            'titles' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public  function messages(){
        return [
          'image.required' => 'please add image (max size 2MB)',
        ];
    }
}
