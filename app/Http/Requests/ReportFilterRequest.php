<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportFilterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [ // Need to be nullable, because they are all optional filters
            'municipality' => 'nullable',
            'type' => 'nullable|in:dog,cat,bird,other',
            'other_type' => 'required_if:animaltype,other',
            'report_type' => 'nullable|in:taxi,stray,pet',
            'city' => 'nullable',
            'date' => 'nullable|date',
            'status' => 'nullable|in:open,closed,in_progress',
        ];
    }
}
