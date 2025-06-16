<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoutTransferRequest extends FormRequest
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
            'cash_before' => 'required',
            'km_start' => 'required',
        ];
    }
}
