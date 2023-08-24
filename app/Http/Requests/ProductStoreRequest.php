<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'quantity' => ['nullable', 'string', 'max:255'],
            'period' => ['nullable', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'description' => ['required', 'string'],
            'product_categories_id' => ['required', 'integer'],
            'product_type_id' => ['required', 'integer'],
            'owner_id' => ['required', 'integer'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}
