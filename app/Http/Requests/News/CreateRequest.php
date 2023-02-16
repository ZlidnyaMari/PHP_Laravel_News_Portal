<?php

declare(strict_types=1);

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\NewsStatus;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_ids' => ['required', 'array'],
            'category-ids.*' => ['exists:categories, id'],
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'author' => ['nullable', 'string', 'min:3', 'max:20'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'image' => ['sometimes'],
            'description' => ['nullable', 'string'],
            //
        ];
    }

    public function getCategoriesdIds()
    {
        return (array) $this->validated('category_ids');
    }
}
