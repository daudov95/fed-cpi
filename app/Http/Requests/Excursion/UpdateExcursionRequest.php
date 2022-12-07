<?php

namespace App\Http\Requests\Excursion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExcursionRequest extends FormRequest
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
        return [
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'age' => ['required'],
            'place' => ['required'],
            'program' => ['required'],
            'duration' => ['required'],
            'including' => ['required'],
            'images.*' => ['required', 'image', 'mimes:jpg,jpeg,png'],
        ];
    }
}
