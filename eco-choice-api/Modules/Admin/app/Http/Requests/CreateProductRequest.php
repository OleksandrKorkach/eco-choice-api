<?php

namespace Modules\Admin\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:2',
            ],
            'description' => [
                'required',
                'string',
            ],
            'price' => [
              'required',
              'numeric',
              'min:0',
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
