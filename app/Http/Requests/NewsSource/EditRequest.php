<?php

declare(strict_types=1);

namespace App\Http\Requests\NewsSource;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'news_id' => ['required'],
            'name' => ['required', 'min:3', 'max:200'],
            'url' => ['required','url'],
        ];
    }

    public function getNewsId()
    {
        return $this->validated('news_id');
    }
}
