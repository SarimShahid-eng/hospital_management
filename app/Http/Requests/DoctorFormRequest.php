<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DoctorFormRequest extends FormRequest
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
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
            'branch_id' => 'required',
            'firstname' => 'required',
            'username' => 'required|unique:doctors,username,' . $this->update_id,
            'gender' => 'required',
            'timing_from' => 'required',
            'timing_to' => 'required',
            'specialization' => 'required',
            'consultancy_fee' => 'required',
            'procedure_percentage' => 'required',
            'doctor_sharing' => 'required',
            'designation' => 'required',
            'degree' => 'required',
            'contact1' => 'required',
            'contact2' => 'required',
            // 'email' => 'email|unique:doctors,email,' . $this->update_id,
        ];

        if ($this->update_id == null) {
            $rules['password'] = 'required';
        }

        return $rules;
    }
}
