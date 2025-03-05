<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ReceptionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Gate::allows('userAuthority', [$this->branch_id])) {
            return true;
        }
        throw new HttpException(404, 'Not allowed');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
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
