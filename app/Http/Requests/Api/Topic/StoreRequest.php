<?php

namespace App\Http\Requests\Api\Topic;

use Illuminate\Foundation\Http\FormRequest;
use App\Enum\Api\RestRequestValidation;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:topics'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'int'],
            'user_id' => ['required', 'int']
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
            'name.required' => RestRequestValidation::NAME_IS_REQUIRED->value,
            'name.string' => RestRequestValidation::NAME_FIELD_HAS_TO_BE_A_STRING->value,
            'name.unique' => RestRequestValidation::NAME_FIELD_HAS_TO_BE_UNIQUE->value,
            'description.required' => RestRequestValidation::DESCRIPTION_IS_REQUIRED->value,
            'description.string' => RestRequestValidation::DESCRIPTION_HAS_TO_BE_A_STRING->value,
            'user_id.required' => RestRequestValidation::USER_ID_IS_REQUIRED->value,
            'user_id.int' => RestRequestValidation::USER_ID_HAS_TO_BE_AN_INT->value,
            'category.required' => RestRequestValidation::CATEGORY_ID_IS_REQUIRED->value,
            'category.int' => RestRequestValidation::CATEGORY_ID_HAS_TO_BE_AN_INT->value
        ];
    }
}