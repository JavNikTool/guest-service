<?php

namespace App\Http\Requests\Guest;

use App\Http\Requests\Base\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'country_id' => 'nullable|integer|exists:countries,id',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('guests', 'email')->ignore($this->route('guest')),
            ],
            'phone' => [
                'required',
                'string',
                'max:15',
                Rule::unique('guests', 'phone')->ignore($this->route('guest')),
            ],
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Имя является обязательным полем',
            'name.string' => 'Имя должно быть строкой',
            'name.max' => 'Имя не должно превышать 255 символов',

            'surname.required' => 'Фамилия является обязательным полем',
            'surname.string' => 'Фамилия должна быть строкой',
            'surname.max' => 'Фамилия не должна превышать 255 символов',

            'email.required' => 'Адрес электронной почты является обязательным полем',
            'email.string' => 'Адрес электронной почты должен быть строкой',
            'email.email' => 'Адрес электронной почты должен быть валидным',
            'email.max' => 'Адрес электронной почты не должен превышать 255 символов',
            'email.unique' => 'Такой адрес электронной почты уже существует',

            'phone.required' => 'Телефон является обязательным полем',
            'phone.string' => 'Телефон должен быть строкой',
            'phone.max' => 'Телефон не должен превышать 15 символов',
            'phone.unique' => 'Такой телефон уже существует',

            'country_id.string' => 'Страна должна быть строкой',
        ];
    }
}
