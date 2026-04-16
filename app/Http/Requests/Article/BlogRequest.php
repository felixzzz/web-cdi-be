<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'thumbnail' => 'nullable|file|max:5120',
            'title_en' => 'required',
            // 'slug_en' => 'required|string|max:255',
            'content_en' => 'required',
            'title_id' => 'required',
            // 'slug_id' => 'required|string|max:255',
            'content_id' => 'required',
            'status' => 'required'
        ];
    }
}
