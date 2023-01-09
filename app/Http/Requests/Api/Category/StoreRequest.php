<?php

namespace App\Http\Requests\Api\Category;

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
            'name'=>'required|unique:categories',
            'user_id'=>'int|required|exists:users,id'
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
            'name.required' => RestRequestValidation::NAME_IS_REQUIRED->value,
            'name.unique' => RestRequestValidation::NAME_FIELD_HAS_TO_BE_UNIQUE->value,
            'user_id.required' => RestRequestValidation::USER_ID_IS_REQUIRED->value,
            'user_id.int' => RestRequestValidation::USER_ID_HAS_TO_BE_AN_INT->value,
            'user_id.exists' => RestRequestValidation::USER_HAS_TO_BE_REGISTERED_IN_DB->value,
        ];
    }
}
