<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabortaristFormRequest extends FormRequest
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
        $rules =[
            'firstname' => 'required',
            'username' => 'required|unique:receptionists,username,' . $this->update_id,
            'gender' => 'required',
            'branch_id' => 'required'
        ];

        if ($this->update_id == null) {
            $rules['password'] = 'required';
        }

        return $rules;
    }
}
