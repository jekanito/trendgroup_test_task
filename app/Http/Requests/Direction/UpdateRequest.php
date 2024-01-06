<?php

namespace App\Http\Requests\Direction;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'first_currency_id' => 'required|integer|exists:currency,id',
            'second_currency_id' => 'required|integer|different:first_currency_id|exists:currency,id',
            'min_sum_for_exchange' => 'required|numeric',
            'max_sum_for_exchange' => 'required|numeric',
            'min_reserve_second_currency' => 'required|numeric',
            'limit' => 'required|numeric',
            'margin' => 'required|numeric',
            'commission' => 'required|numeric',
            'cashback' => 'required|numeric',
            'ref_bonus' => 'required|numeric'
        ];
    }
}
