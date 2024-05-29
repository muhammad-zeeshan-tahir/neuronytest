<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
            "email" => 'required|max:255',
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            "email" => 'Email',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [

        ];
    }
}
