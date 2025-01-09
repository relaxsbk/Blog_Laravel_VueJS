<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
        ];
    }
}
