<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            // customize validation
            "name" => "required|max:55",
            "address" => "required|max:55",
            "contact" => "required|max:11",
            "service_name" => "max:55",
            "email" => "required|unique:users|min:5|max:60|email",
            "password" => "required|min:5|confirmed"
        ];
    }
}
