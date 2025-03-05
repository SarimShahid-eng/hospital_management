<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AppointmentRequest extends FormRequest
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
            'firstname' => 'required',
            'username' => 'required',
            'branch_id' => 'required',
            'gender' => 'required',
            'cnic_no' => 'required|min:13|max:13',
            'phone_no' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'dob' => 'required',
            "doctor_id" => "required|array",
            'address' => 'required',
            'main_total' => 'required',
            'total' => 'required',
        ];

        // if ($this->update_id == null) {
        //     $rules['password'] = 'required';
        // }

        return $rules;
    }
    //     public function withValidator($validator)
    // {
    //     if ($this->loopCounter == 0) {
    //         $validator->after(function ($validator) {
    //             $validator->errors()->add('service_required', 'Please select at least one service');
    //         });
    //     }
    // }
    // public function messages()
    // {
    //     return [
    //         'service_required.required' => 'Please select at least one service',
    //         'doctor_id.required'=>'Please select at least one doctor',
    //         // Other custom messages here...
    //     ];
    // }
}
