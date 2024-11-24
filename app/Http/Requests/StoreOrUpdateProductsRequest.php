<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "string|required|min:3|max:100",
            "sku" => "integer"
        ];
    }

    public function messages(){
        return [
        "name.required" => "O campo Nome do Produto é obrigatório",
        "sku.integer" => "O campo código aceita somente números"
        ];
    }
}
