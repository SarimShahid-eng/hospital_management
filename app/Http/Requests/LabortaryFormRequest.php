<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LabortaryFormRequest extends FormRequest
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

        // return [
        //     // 'labortary_test' => 'required|array|min:3',
        //     // 'abbreviation' => 'required|array|min:3',
        //     // 'fees' => 'required|array|min:3',
        //     // "name"    => "sometimes|required|array|min:3",
        //     // 'unit' => 'required|array|min:3',
        //     // 'range' => 'required|array|min:3',

        //     'labortary_test' => ['required','array'],
        //     'abbreviation' => ['required','array'],
        //     'fees' => ['required','array'],
        //     'name' => ['required','array'],
        //     'unit' => ['required','array'],
        //     'range' => ['required','array'],


        //     // 'labortary_test' => 'required|array',
        //     // 'abbreviation' => 'required|array',
        //     // 'fees' => 'required|array',
        //     // "name"    => "required|array",
        //     // 'unit' => 'required|array',
        //     // 'range' => 'required|array',
        // ];
        return [
            'labortary_test' => ['required'],
            'abbreviation' => ['required'],
            'fees' => ['required', 'numeric'],
            'name' => ['sometimes',  'required', 'array'],
            'name.*' => ['sometimes',  'required', 'string'],
            'unit' => ['required', 'array'],
            'unit.*' => ['required', 'string'],
            'range' => ['required', 'array'],
            'range.*' => ['required', 'string'],
            'branch_id' => 'required'
        ];
    }
}
