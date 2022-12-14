<?php

namespace App\Http\Requests\Api\Topic;

use Illuminate\Foundation\Http\FormRequest;
use App\Enum\Api\RestRequestValidation;

class DeleteRequest extends FormRequest
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
            "id" => "required|int|exists:topics,id",
            "user_id" => "required|int|exists:users,id"
        ];
    }

    /**
     * Describes specific messages which are declared in RestRequestValidation enum file
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'id.required' => RestRequestValidation::TOPIC_ID_IS_REQUIRED->value,
            'id.int' => RestRequestValidation::TOPIC_ID_HAS_TO_BE_AN_INT->value,
            'id.exists' => RestRequestValidation::TOPIC_NOT_FOUND->value,
            'user_id.required' => RestRequestValidation::USER_ID_IS_REQUIRED->value,
            'user_id.int' => RestRequestValidation::USER_ID_HAS_TO_BE_AN_INT->value,
            'user_id.exists' => RestRequestValidation::USER_NOT_FOUND->value
        ];
    }
}
