<?php

namespace App\Http\Requests\Api\Category;

use Illuminate\Foundation\Http\FormRequest;
use App\Enum\Api\RestRequestValidation;

class DeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=>'required|int|exists:categories,id',
            'user_id'=>'required|int|exists:users,id'
        ];
    }

    /**
     * Returned messages when validation went wrong
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'id.required' => RestRequestValidation::CATEGORY_ID_IS_REQUIRED->value,
            'id.int' => RestRequestValidation::CATEGORY_ID_HAS_TO_BE_AN_INT->value,
            'id.exists' => RestRequestValidation::CATEGORY_EXISTS->value,
            'user_id.required' => RestRequestValidation::USER_ID_IS_REQUIRED->value,
            'user_id.int' => RestRequestValidation::USER_ID_HAS_TO_BE_AN_INT->value,
            'user_id.exists' => RestRequestValidation::USER_HAS_TO_BE_REGISTERED_IN_DB->value,
        ];
    }
}