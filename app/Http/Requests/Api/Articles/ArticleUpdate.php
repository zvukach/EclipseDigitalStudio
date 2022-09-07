<?php

namespace App\Http\Requests\Api\Articles;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         => 'filled|string',
            'description'   => 'filled|string',
            'tags'          => 'filled|array',
            'tags.*.title'  => 'required|string',
        ];
    }
}
