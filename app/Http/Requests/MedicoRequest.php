<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
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
            'nome' => ['required', 'min:3', 'max:50'],
            'data_nascimento' => ['required'],
            'crm' => ['required', 'unique:medico,crm,'.$this->route('id')],
            'area_id' => ['required'],
        ];
    }

    public function messages() {
        return [
            'required' => 'O campo :attribute é obrigatório!',
        ];
    }

}
