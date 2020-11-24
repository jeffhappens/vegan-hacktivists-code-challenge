<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestion extends FormRequest
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
            'question' => 'required|min:5|ends_with:?'
            /*
            * Instead of requiring a question mark, why don't we check for one and append it if it is missing?
            * I think this is a more user-friendly approach
            */
        ];
    }

    public function messages()
    {
        return [
            'question.required' => '* Questions cannot be blank',
            'question.min' => '* Questions must be at least 5 characters',
            'question.ends_with' => '* Questions must end with a "?"'
        ];
    }
}
