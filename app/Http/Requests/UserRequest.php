<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = $this->segment(3);

        return [
            // a validação de campo unique pode ser feita das duas formas apresentadas tanto em 're' quanto em 'email'
            'name'          => 'required|min:10|max:60',
            'graduation_id' => 'required|integer',
            're'            => "required|min:6|max:7|".Rule::unique('users', 're')->ignore($id),
            // se a lógica for "o policial logado pode alterar somente seus próprios dados", então deve ser declarado: 're' => "required|min:6|max:7|unique:users,re,". auth()->id(), 
            'warname'       => 'required|min:2|max:15',
            'cpf'           => 'nullable|integer',
            'rg'            => 'nullable|string',
            'birthdate'     => 'nullable|date',
            'admissiondate' => 'nullable|date',
            'email'         => "required|email|unique:users,email,{$id}",
            'password'      => 'min:8',
            'activeservice' => 'required|boolean',
            'opm_id'        => 'required|integer',
        ];
    }


    public function messages()
    {
        return [
            'name.required'          => 'Preenchimento obrigatório do nome.',
            'name.min'               => 'O campo nome deve conter no mínimo :min caracteres.',
            'name.max'               => 'O campo nome está restrito a :max caracteres.',
            'graduation_id.required' => 'Preenchimento obrigatório da graduação do policial.',
            're.required'            => 'Preenchimento obrigatório do RE.',
            're.min'                 => 'RE deve conter 6 ou 7 caracteres.',
            're.max'                 => 'RE deve conter no máximo :max caracteres.',
            're.unique'              => 'RE já está sendo utilizado por outro usuário.',
            'warname.required'       => 'Preenchimento obrigatório do nome de guerra.',
            'warname.min'            => 'O nome de guerra deve possuir mínimo de 2 e máximo de :max caracteres.',
            'warname.max'            => 'O nome de guerra deve possuir no máximo :max caracteres.',
            'cpf.integer'            => 'Forneça somente números para preenchimento do CPF.',
            'birthdate.date'         => 'A data de nascimento deve conter uma data válida.',
            'admissiondate.date'     => 'A data de admissão deve conter uma data válida.',
            'email.required'         => 'Preenchimento obrigatório do e-mail.',
            'email.email'            => 'Deve ser informado um email válido.',
            'email.unique'           => 'E-mail já está sendo usado por outro usuário.',
            'password.min'           => 'A senha deve conter no mínimo :min caracteres.',
            'activeservice.required' => 'Servico ativo de preenchimento obrigatório',
            'opm_id.required'        => 'Preenchimento obrigatório da OPM.',
        ];
    }
}
