<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Its for creation only
        if (Gate::allows('userAuthority', [$this->branch_id])) {
            return true;
        }

        throw new HttpException(404, 'Not allowed');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
            'name' => 'required',
            'username' => 'required|unique:admins,username,' . $this->update_id,
            'email' => 'email|unique:admins,email,' . $this->update_id,
            'branch_id' => 'required'
        ];

        if ($this->update_id == null) {
            $rules['password'] = 'required';
        }

        return $rules;
    }
}
