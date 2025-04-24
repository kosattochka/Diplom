<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'alias' => ['required', 'string', 'filled'],
            'name' => ['required', 'string', 'filled'],
            'phone' => ['required', 'string', 'filled'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'guests' => ['required', 'numeric', 'min:1'],
            'child' => ['required', 'numeric', 'min:0']
        ];
    }
}
