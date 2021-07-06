<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number' => 'required|integer|size:654'
        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'O preenchimento do código de OPM é obrigatório.',
            'number.size' => 'Valor máximo permitido para Código de OPM é 654.',
        ];
    }
}
