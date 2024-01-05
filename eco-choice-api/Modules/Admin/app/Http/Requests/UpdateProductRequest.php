<?php

namespace Modules\Admin\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => [
              'required',
              'numeric',
              'exists:products,id'
            ],
            'name' => [
                'string',
                'max:255',
                'min:2',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'price' => [
                'numeric',
                'min:0',
                'nullable',
            ],
        ];
    }

    public function toArray(): array
    {
        return [
            'name' => $this->input('name'),
            'price' => $this->input('price'),
            'description' => $this->input('description'),
        ];
    }
}
