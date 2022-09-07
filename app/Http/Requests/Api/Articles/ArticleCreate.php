<?php

namespace App\Http\Requests\Api\Articles;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         => 'required|string',
            'description'   => 'required|string',
            'tags'          => 'required|array',
            'tags.*.title'  => 'required|string',
        ];
    }
}
