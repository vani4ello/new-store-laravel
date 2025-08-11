<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Src\Order\DTO\NewOrderDTO;

class StoreCheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Залишаємо тільки потрібні поля
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], // Додаємо 'unique' для перевірки унікальності email
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
            // Додаємо валідацію для чекбоксів
            'terms' => ['accepted'], // 'accepted' вимагає, щоб значення було 'on', 'yes', '1' або true.
            'subscribe' => ['nullable', 'boolean'], // 'nullable' і 'boolean' для необов'язкового чекбокса
        ];
    }

    public function toDto(): NewOrderDTO
    {
        return NewOrderDTO::fromRequest($this);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'customer_name.required' => 'Будь ласка, вкажіть ваше ім\'я.',
            'customer_email.required' => 'Будь ласка, вкажіть вашу електронну пошту.',
            'customer_email.email' => 'Введіть коректну електронну пошту.',
            'customer_email.unique' => 'Користувач з таким email вже зареєстрований.',
            'password.required' => 'Будь ласка, вкажіть пароль.',
            'password.min' => 'Пароль має містити щонайменше 8 символів.',
            'password.confirmed' => 'Паролі не співпадають.',
            'terms.accepted' => 'Ви повинні погодитись з правилами сайту для продовження.',
        ];
    }
}