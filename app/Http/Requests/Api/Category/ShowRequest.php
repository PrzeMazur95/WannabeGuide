<?php

namespace App\Http\Requests\Api\Category;

use Illuminate\Foundation\Http\FormRequest;
use App\Enum\Api\RestRequestValidation;

class ShowRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|int|exists:categories,id'
        ];
    }

    /**
     * Return specific messages which are declared in RestRequestValidation enum file
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'id.required' => RestRequestValidation::CATEGORY_ID_IS_REQUIRED->value,
            'id.int' => RestRequestValidation::CATEGORY_ID_HAS_TO_BE_AN_INT->value,
            'id.exists' => RestRequestValidation::CATEGORY_EXISTS->value,
        ];
    }

}
