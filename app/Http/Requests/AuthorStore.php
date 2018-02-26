<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AuthorStore extends Request
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
            'first' => 'required',
            'last' => 'required|min:3',
        ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first.required' => 'Name is required',
            'last.required'  => 'Last Name is required',
        ];
    }}
