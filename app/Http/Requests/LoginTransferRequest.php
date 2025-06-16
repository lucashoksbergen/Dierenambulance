<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginTransferRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'vehicle_number' => 'required',
            'materials_check' => 'required|boolean',
            'cash_after' => 'required',
            'km_end' => 'required',
        ];
    }
}
