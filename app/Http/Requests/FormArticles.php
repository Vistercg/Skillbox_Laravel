<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FormArticles extends FormRequest
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
            'slug' => [
                'required',
                'regex:/[a-z][a-z0-9_-]/',
                Rule::unique('articles', 'slug')->ignore($this->article)
            ],
            'title' => 'required | min:5 | max: 100',
            'shortBody' => 'required | max: 255',
            'body' => 'required',
            'checkbox' => 'accepted'
        ];
    }
}
