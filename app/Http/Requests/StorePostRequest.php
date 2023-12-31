<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,jpg,svg,png,webp',
        ];
    }

    /**
     * Custom validation messages
     *  @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Please enter a title for the post !',
            'content.required' => 'Please enter content before submitting !',
            'image.image' => 'Please enter images of the format jpeg,jpg,svg,png,webp !',
        ];
    }
}
