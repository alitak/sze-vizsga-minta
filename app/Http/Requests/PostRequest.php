<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title'   => ['required', 'string', 'min:3', 'max:255'],
            'intro'   => ['required', 'string', 'min:3', 'max:65535'],
            'content' => ['required', 'string', 'min:3', 'max:65535'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }
}
