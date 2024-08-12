<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'required | max:255',
            'message' => 'required',
            'file' => 'file|mimes:png,jpg,pdf'
        ];
    }
}
