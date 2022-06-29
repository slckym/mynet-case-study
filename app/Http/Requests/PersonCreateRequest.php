<?php

namespace App\Http\Requests;

use App\Enums\GenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 *
 */
class PersonCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    function rules(): array
    {
        return [
            "name" => "required",
            "birthday" => 'required',
            "gender" => ["required", Rule::in(array_keys(GenderEnum::getGenders()))],
            "address" => "required",
            "post_code" => "required|numeric",
            "city_name" => "required",
            "country_name" => "required",
        ];
    }

    /**
     * @return array
     */
    public function person(): array
    {
        return $this->only('name', 'birthday', 'gender');
    }

    /**
     * @return array
     */
    public function address(): array
    {
        return $this->only('address', 'post_code', 'city_name', 'country_name');
    }
}
