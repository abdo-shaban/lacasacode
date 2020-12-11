<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'   => ['required', 'max:255'],
            'last_name'    => ['required', 'max:255'],
            'country_code' => ['required', 'max:4'],
            'phone_number' => ['required', 'min:10', 'max:15', 'regex:/^\+[1-9]\d{1,14}$/', 'unique:users,phone_number'],
            'gender'       => ['required', 'in:male,female'],
            'birthdate'    => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:today'],
            'avatar'       => ['required', 'mimes:jpg,jpeg,png'],
            'email'        => ['nullable', 'email', 'unique:users,email'],
        ];
    }

    public function messages()
    {
        return [
            'in'                        => 'inclusion',
            'mimes'                     => 'invalid_content_type',
            'unique'                    => 'taken',
            'required'                  => 'blank',
            'email'                     => 'invalid',
            'min'                       =>  'too_short :min',
            'max'                       =>  'too_long :max',
            'birthdate.before_or_equal' => 'in_the_future',
        ];
    }
}
