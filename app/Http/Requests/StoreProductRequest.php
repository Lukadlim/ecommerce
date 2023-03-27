<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' =>        'required|string|not_regex:/\d/',
            'description' => 'nullable|string',
            'price' =>       'required|integer',
            'image' =>       'nullable|image',
            'stock' =>       'required|integer',
        ];
    }
}

