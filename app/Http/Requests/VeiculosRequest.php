<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'chassi' => 'required',
            'placa' => 'required',
            'renavam' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'placa' => 'required',
            'cor' => 'required',
        ];
    }
}